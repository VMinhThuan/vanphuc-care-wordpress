/** Build production CSS beside its sources so relative image/font URLs stay valid. */
import fs from 'node:fs';
import path from 'node:path';
import { createHash } from 'node:crypto';
import { fileURLToPath } from 'node:url';
import postcss from 'postcss';
import { transform } from 'lightningcss';

const root = path.resolve(path.dirname(fileURLToPath(import.meta.url)), '..');
const read = name => fs.readFileSync(path.join(root, name), 'utf8');
const hash = data => createHash('sha256').update(data).digest('hex').slice(0, 16);
const assets = {};

/** Keep wrapper order (media/supports/layers), and never prune unknown at-rules. */
export function selectRules(tree, accept, keepDefinitions = false) {
  const result = tree.clone();
  function visit(container) {
    for (const node of [...(container.nodes || [])]) {
      if (node.type === 'comment') { node.remove(); continue; }
      if (node.type === 'rule') {
        const selectors = node.selectors.filter(accept);
        if (selectors.length) node.selectors = selectors;
        else node.remove();
      } else if (node.type === 'atrule' && ['media', 'supports', 'layer', 'container'].includes(node.name) && node.nodes) {
        visit(node);
        if (!node.nodes.length) node.remove();
      } else if (!keepDefinitions) node.remove();
    }
  }
  visit(result);
  return result;
}

function emit(key, css) {
  const output = key.replace(/\.css$/, '.built.css');
  const { code } = transform({ filename: key, code: Buffer.from(css), minify: true });
  fs.writeFileSync(path.join(root, output), code);
  assets[key] = { file: output, version: hash(code), bytes: code.length };
}

for (const name of fs.readdirSync(path.join(root, 'assets/css')).filter(name => name.endsWith('.css') && !name.endsWith('.built.css')).sort()) {
  const key = 'assets/css/' + name;
  emit(key, read(key));
}

// Only move rules whose selectors explicitly belong to a page namespace.
// Shared utilities, variables, animations and mixed/global selectors stay in core.
const pagePatterns = {
  prenatal: /(^|[\s>+~,])\.prenatal-[\w-]+/,
  contact: /(^|[\s>+~,])\.vpc-contact-[\w-]+/,
  policy: /(^|[\s>+~,])\.(?:policy-|related-policies-|related-box-)[\w-]+/,
};
const theme = postcss.parse(read('assets/css/theme.css'), { from: 'assets/css/theme.css', map: false });
const pageFor = selector => Object.keys(pagePatterns).find(name => pagePatterns[name].test(selector));
emit('assets/css/site-core.css', selectRules(theme, selector => !pageFor(selector), true).toString());
for (const name of Object.keys(pagePatterns)) {
  emit('assets/css/page-' + name + '.css', selectRules(theme, selector => pageFor(selector) === name).toString());
}

const knowledge = postcss.parse(read('assets/css/knowledge.css'), { from: 'assets/css/knowledge.css', map: false });
// Retain every rule for components used by the article/sidebar, including responsive variants.
emit('assets/css/knowledge-components.css', selectRules(knowledge, selector =>
  /\.vpc-knowledge-(?:card|widget|banner|hotline|author)(?:$|[\s\W]|__|--)/.test(selector)
).toString());
const news = postcss.parse(read('assets/css/news.css'), { from: 'assets/css/news.css', map: false });
emit('assets/css/news-shell.css', selectRules(news, selector => selector.includes('.site-footer')).toString());

// These sheets already follow all page styles. Keep that ordering when combining.
emit('assets/css/site-overrides.css', ['footer', 'mobile-responsive', 'select-menu', 'mobile-menu']
  .map(name => read('assets/css/' + name + '.css')).join('\n'));

for (const name of fs.readdirSync(path.join(root, 'assets/js')).filter(name => name.endsWith('.js')).sort()) {
  const key = 'assets/js/' + name;
  const data = fs.readFileSync(path.join(root, key));
  assets[key] = { file: key, version: hash(data), bytes: data.length };
}
// Publish the manifest last. A failed build never advertises missing output files.
const manifest = { schema: 1, assets };
fs.writeFileSync(path.join(root, 'assets/asset-manifest.json'), JSON.stringify(manifest, null, 2) + '\n');
console.log(`Built ${Object.keys(assets).length} assets; core CSS ${assets['assets/css/site-core.css'].bytes} bytes.`);
