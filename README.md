# JT Bootstrap Buttons

A Joomla 5 and 6 compatible site module for rendering one or more Bootstrap 5 buttons using Joomla core form fields and Bootstrap-compatible frontend classes.

## Features

- Multiple repeatable buttons via Joomla subform fields
- Bootstrap 5 color variants
- Outline variants (ignored automatically for the `link` variant)
- Small / default / large sizes
- URL field configured with Joomla URL field behaviour (`type="url"`, `validate="url"`, `relative="true"`)
- Optional `_blank` target with `rel="noopener noreferrer"`
- Left / center / right alignment
- English and Turkish language files

## Notes

- The module uses Joomla's modern module structure with `services/provider.php`, a dispatcher, helper class and namespaced source files.
- Relative URLs are supported through Joomla's URL field configuration.
- Existing saved anchor links such as `#section-id`, plus `mailto:` and `tel:` links, are additionally preserved by the module's render-time normalization for backward compatibility.
- The helper rejects unsupported schemes and malformed values before rendering links.
- Frontend styling assumes a Bootstrap 5-capable site template.

## Requirements

- Joomla 5.x or 6.x
- A frontend template that supports Bootstrap 5 styling

## Installation

1. Download the latest module ZIP package from the Releases section.
2. In the Joomla Administrator panel, go to **System -> Install -> Extensions**.
3. Upload the ZIP package and complete the installation.
4. Go to **Content -> Site Modules** (or **System -> Manage -> Site Modules**, depending on your Joomla version).
5. Open **JT Bootstrap Buttons**, assign it to a module position, and publish it.

## Usage

1. Create or edit a **JT Bootstrap Buttons** module.
2. Add one or more buttons in the repeatable button field.
3. For each button, define:
   - Text
   - URL
   - Style variant
   - Size
   - Optional target behavior
4. Set the alignment option if needed.
5. Save and check the frontend output.

## Updates

This module supports Joomla update servers. New package releases are published through the GitHub Releases page.

## Package details

- Author: JoomTheme
- Email: support@joomtheme.com
- Website: https://joomtheme.com
- Version: 1.0.3
- License: GNU General Public License version 2 or later
