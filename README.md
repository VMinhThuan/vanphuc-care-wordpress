# VanPhucCare WordPress Theme

Custom WordPress theme for VanPhucCare.

## Overview

This repository contains the source for the `vanphuccare` custom theme. It is a lightweight WordPress theme foundation with no page-builder or plugin dependencies.

## Structure

- `assets/` contains theme CSS, JavaScript, images, and fonts.
- `inc/` contains setup, asset loading, menu registration, and shared helpers.
- `template-parts/` contains reusable template markup.
- `languages/` is reserved for translation files.

## Local development

Place this directory in `wp-content/themes/` of a local WordPress installation, then activate **VanPhucCare** from Appearance → Themes. Develop against a supported local WordPress environment; this repository does not include WordPress core or plugins.

## Installation

1. Copy or clone this repository as `wp-content/themes/vanphuccare`.
2. Activate the theme in the WordPress admin area.
3. Configure navigation menus in Appearance → Menus.

## Development conventions

- Follow WordPress Coding Standards.
- Prefix custom PHP functions with `vanphuccare_`.
- Use WordPress APIs for URLs, escaping, hooks, and asset loading.
- Add reusable markup to `template-parts/` only when it has a real use.
- Keep business data and credentials out of the theme.

## Git workflow

Use focused branches and small, reviewable commits. Do not commit environment files, dependencies, generated logs, or credentials.
