# JT Bootstrap Buttons

A Joomla 6 compatible site module for rendering one or more Bootstrap 5 buttons using Joomla core Bootstrap classes.

## Included features

- Multiple repeatable buttons via Joomla subform fields
- Official Bootstrap 5 color variants
- Outline variants (ignored automatically for the `link` variant)
- Small / default / large sizes
- URL field configured with Joomla's URL form field behaviour (`type="url"`, `validate="url"`, `relative="true"`)
- Optional `_blank` target with `rel="noopener noreferrer"`
- Left / center / right alignment
- Support fieldset in module options
- English and Turkish language files

## Notes

- The module uses Joomla's modern module structure with `services/provider.php`, a dispatcher, helper class and namespaced source files.
- Relative URLs are supported through Joomla's URL field configuration.
- Existing saved anchor links such as `#section-id`, plus `mailto:` and `tel:` links, are additionally preserved by the module's render-time normalization for backward compatibility.
- The helper rejects unsupported schemes and malformed values before rendering links.

## Package details

- Author: JoomTheme
- Email: support@joomtheme.com
- Website: https://joomtheme.com
- Version: 1.0.3
- License: GNU General Public License version 2 or later
