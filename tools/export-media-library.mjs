#!/usr/bin/env node

/**
 * Read-only WordPress Media Library exporter and mapping comparator.
 *
 * This script only performs GET requests against /wp-json/wp/v2/media. It
 * never creates, updates, deletes, or otherwise mutates WordPress data.
 */

import { readFile, writeFile } from 'node:fs/promises';
import path from 'node:path';
import process from 'node:process';
import { fileURLToPath } from 'node:url';

const scriptDirectory = path.dirname(fileURLToPath(import.meta.url));

function printHelp() {
  console.log(`VanPhucCare read-only Media Library export

Usage:
  WP_BASE_URL=https://staging.example.com node tools/export-media-library.mjs \
    --output /tmp/vanphuccare-media-library.json \
    --mapping tools/media-mapping.json \
    --report /tmp/vanphuccare-media-report.json

Options:
  --url <url>          WordPress site URL. Defaults to WP_BASE_URL.
  --per-page <number>  REST page size, 1-100. Defaults to 100.
  --output <file>      JSON export path. Defaults to /tmp/vanphuccare-media-library.json.
  --mapping <file>     Mapping config to compare after export.
  --report <file>      Mapping report path. Defaults beside the export file.
  --help               Show this help.

Optional authentication uses environment variables, without storing them in
the export: WP_USERNAME and WP_APP_PASSWORD. A WordPress Application Password
is recommended when the REST endpoint requires authentication.
`);
}

function parseArgs(argv) {
  const options = {
    url: process.env.WP_BASE_URL || '',
    perPage: 100,
    output: '/tmp/vanphuccare-media-library.json',
    mapping: '',
    report: '',
  };

  for (let index = 0; index < argv.length; index += 1) {
    const argument = argv[index];
    if (argument === '--help' || argument === '-h') {
      printHelp();
      process.exit(0);
    }
    if (!argument.startsWith('--')) {
      throw new Error(`Unexpected argument: ${argument}`);
    }

    const [name, inlineValue] = argument.split('=', 2);
    const value = inlineValue ?? argv[++index];
    if (!value) throw new Error(`Missing value for ${name}`);

    if (name === '--url') options.url = value;
    else if (name === '--per-page') options.perPage = Number(value);
    else if (name === '--output') options.output = value;
    else if (name === '--mapping') options.mapping = value;
    else if (name === '--report') options.report = value;
    else throw new Error(`Unknown option: ${name}`);
  }

  if (!options.url) throw new Error('Missing WordPress URL. Use --url or WP_BASE_URL.');
  if (!Number.isInteger(options.perPage) || options.perPage < 1 || options.perPage > 100) {
    throw new Error('--per-page must be an integer between 1 and 100.');
  }

  options.url = options.url.replace(/\/+$/, '');
  options.output = path.resolve(process.cwd(), options.output);
  if (options.mapping) options.mapping = path.resolve(process.cwd(), options.mapping);
  if (options.report) options.report = path.resolve(process.cwd(), options.report);
  else if (options.mapping) options.report = path.join(path.dirname(options.output), 'vanphuccare-media-mapping-report.json');

  return options;
}

function basenameFromUrl(sourceUrl) {
  try {
    const pathname = new URL(sourceUrl).pathname;
    return decodeURIComponent(pathname.split('/').pop() || '');
  } catch {
    return '';
  }
}

function basenameFromAttachment(attachment) {
  const storedFile = attachment.media_details?.file || '';
  return storedFile ? path.posix.basename(storedFile) : basenameFromUrl(attachment.source_url || attachment.guid?.rendered || '');
}

function normalizeFilename(filename) {
  return path.posix.basename(String(filename || '').replaceAll('\\', '/')).toLowerCase();
}

function isImageAttachment(attachment) {
  return attachment.media_type === 'image' || String(attachment.mime_type || attachment.mime || '').startsWith('image/');
}

function toExportAttachment(attachment) {
  return {
    id: attachment.id,
    filename: basenameFromAttachment(attachment),
    source_url: attachment.source_url || '',
    mime_type: attachment.mime_type || attachment.mime || '',
    media_type: attachment.media_type || '',
    date: attachment.date || '',
    slug: attachment.slug || '',
    title: attachment.title?.rendered || '',
    alt_text: attachment.alt_text || '',
    caption: attachment.caption?.rendered || '',
    description: attachment.description?.rendered || '',
    metadata: {
      media_details: attachment.media_details || {},
      meta: attachment.meta || {},
      guid: attachment.guid?.rendered || '',
    },
  };
}

async function fetchMediaLibrary(options) {
  const endpoint = `${options.url}/wp-json/wp/v2/media`;
  const headers = { accept: 'application/json' };
  const username = process.env.WP_USERNAME || '';
  const applicationPassword = process.env.WP_APP_PASSWORD || '';
  if (username && applicationPassword) {
    headers.authorization = `Basic ${Buffer.from(`${username}:${applicationPassword}`).toString('base64')}`;
  }

  const attachments = [];
  let page = 1;
  let pagesFetched = 0;
  let totalPages = null;
  let totalItems = null;

  while (totalPages === null || page <= totalPages) {
    const requestUrl = new URL(endpoint);
    requestUrl.searchParams.set('page', String(page));
    requestUrl.searchParams.set('per_page', String(options.perPage));
    requestUrl.searchParams.set('orderby', 'id');
    requestUrl.searchParams.set('order', 'asc');
    requestUrl.searchParams.set('_fields', 'id,date,slug,source_url,media_type,mime_type,title,alt_text,caption,description,media_details,meta,guid');

    const response = await fetch(requestUrl, { method: 'GET', headers });
    const responseText = await response.text();
    if (!response.ok) {
      throw new Error(`REST request failed (${response.status} ${response.statusText}) at ${requestUrl}\n${responseText.slice(0, 1000)}`);
    }

    let pageItems;
    try {
      pageItems = JSON.parse(responseText);
    } catch {
      throw new Error(`REST response was not valid JSON at ${requestUrl}`);
    }
    if (!Array.isArray(pageItems)) throw new Error(`REST response did not return an attachment array at ${requestUrl}`);

    pagesFetched += 1;
    attachments.push(...pageItems.map(toExportAttachment));
    const responseTotalPages = Number(response.headers.get('x-wp-totalpages')) || 0;
    totalPages = responseTotalPages || (pageItems.length < options.perPage ? page : page + 1);
    totalItems = Number(response.headers.get('x-wp-total')) || null;

    console.error(`Fetched media page ${page}/${totalPages}: ${pageItems.length} records`);
    if (pageItems.length === 0) break;
    if (responseTotalPages === 0 && pageItems.length < options.perPage) break;
    page += 1;
    if (page > 10000) throw new Error('Aborted after 10,000 pages; REST pagination appears invalid.');
  }

  return {
    generated_at: new Date().toISOString(),
    read_only: true,
    source: {
      base_url: options.url,
      endpoint,
      per_page: options.perPage,
      pages_fetched: pagesFetched,
      total_api_items: totalItems,
      attachment_items_exported: attachments.length,
    },
    attachments,
  };
}

function findSizeVariantCandidates(filename, attachments) {
  const normalized = normalizeFilename(filename);
  const extensionIndex = normalized.lastIndexOf('.');
  if (extensionIndex < 1) return [];
  const stem = normalized.slice(0, extensionIndex);
  const extension = normalized.slice(extensionIndex);
  const escapedStem = stem.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
  const variantPattern = new RegExp(`^${escapedStem}-(?:\\d+x\\d+|scaled)${extension.replace('.', '\\.')}$`, 'i');
  return attachments.filter((attachment) => {
    const candidate = normalizeFilename(attachment.filename);
    return variantPattern.test(candidate);
  });
}

function candidateSummary(attachments) {
  return attachments.map((attachment) => ({
    id: attachment.id,
    filename: attachment.filename,
    source_url: attachment.source_url,
    mime_type: attachment.mime_type,
  }));
}

function expandEntry(entry) {
  if (entry.filename) return [{ filename: entry.filename, locations: entry.locations || [] }];
  return (entry.filenames || []).map((filename) => ({ filename: `${entry.prefix || ''}${filename}`, locations: entry.locations || [] }));
}

async function compareMapping(exportData, mappingPath) {
  const mapping = JSON.parse(await readFile(mappingPath, 'utf8'));
  const imageAttachments = exportData.attachments.filter(isImageAttachment);
  const byExact = new Map();
  const byNormalized = new Map();
  for (const attachment of imageAttachments) {
    const exactKey = attachment.filename;
    const normalizedKey = normalizeFilename(attachment.filename);
    byExact.set(exactKey, [...(byExact.get(exactKey) || []), attachment]);
    byNormalized.set(normalizedKey, [...(byNormalized.get(normalizedKey) || []), attachment]);
  }

  const items = [];
  for (const entry of mapping.entries || []) {
    for (const target of expandEntry(entry)) {
      const requestedFilename = path.posix.basename(target.filename.replaceAll('\\', '/'));
      const exactCandidates = byExact.get(requestedFilename) || [];
      const normalizedCandidates = byNormalized.get(normalizeFilename(requestedFilename)) || [];
      const verifiedId = Number(entry.verified_attachment_id) || 0;
      const verifiedAttachment = verifiedId ? imageAttachments.find((attachment) => attachment.id === verifiedId) : null;
      let status = 'unmatched_requires_manual_id';
      let selected = null;
      let candidates = [];

      if (verifiedId) {
        if (verifiedAttachment) {
          status = normalizeFilename(verifiedAttachment.filename) === normalizeFilename(requestedFilename)
            ? 'verified_manual_attachment_id'
            : 'verified_manual_id_filename_mismatch';
          selected = verifiedAttachment;
        } else {
          status = 'configured_attachment_id_not_in_export';
        }
      } else if (exactCandidates.length === 1) {
        status = 'matched_unique_filename';
        selected = exactCandidates[0];
      } else if (normalizedCandidates.length === 1) {
        status = 'matched_unique_filename_case_insensitive';
        selected = normalizedCandidates[0];
      } else if (normalizedCandidates.length > 1) {
        status = 'duplicate_filename_requires_manual_id';
        candidates = candidateSummary(normalizedCandidates);
      } else {
        const sizeVariants = findSizeVariantCandidates(requestedFilename, imageAttachments);
        if (sizeVariants.length) {
          status = 'size_variant_only_requires_manual_id';
          candidates = candidateSummary(sizeVariants);
        }
      }

      items.push({
        key: entry.key,
        requested_filename: target.filename,
        locations: target.locations,
        status,
        attachment_id: selected?.id || null,
        source_url: selected?.source_url || null,
        mime_type: selected?.mime_type || null,
        candidates,
      });
    }
  }

  const count = (status) => items.filter((item) => item.status === status).length;
  return {
    generated_at: new Date().toISOString(),
    read_only: true,
    mapping_file: mappingPath,
    summary: {
      mapping_entries: mapping.entries?.length || 0,
      filename_targets: items.length,
      matched_unique_filename: count('matched_unique_filename'),
      matched_unique_filename_case_insensitive: count('matched_unique_filename_case_insensitive'),
      verified_manual_attachment_id: count('verified_manual_attachment_id'),
      duplicate_filename_requires_manual_id: count('duplicate_filename_requires_manual_id'),
      size_variant_only_requires_manual_id: count('size_variant_only_requires_manual_id'),
      unmatched_requires_manual_id: count('unmatched_requires_manual_id'),
      configured_attachment_id_not_in_export: count('configured_attachment_id_not_in_export'),
      verified_manual_id_filename_mismatch: count('verified_manual_id_filename_mismatch'),
    },
    items,
  };
}

async function main() {
  const options = parseArgs(process.argv.slice(2));
  const exportData = await fetchMediaLibrary(options);
  await writeFile(options.output, `${JSON.stringify(exportData, null, 2)}\n`, 'utf8');
  console.log(`Wrote read-only Media Library export: ${options.output}`);
  console.log(`Exported ${exportData.attachments.length} attachment records.`);

  if (options.mapping) {
    const report = await compareMapping(exportData, options.mapping);
    await writeFile(options.report, `${JSON.stringify(report, null, 2)}\n`, 'utf8');
    console.log(`Wrote mapping report: ${options.report}`);
    console.log(JSON.stringify(report.summary, null, 2));
  }
}

main().catch((error) => {
  console.error(`Media Library export failed: ${error.message}`);
  process.exitCode = 1;
});
