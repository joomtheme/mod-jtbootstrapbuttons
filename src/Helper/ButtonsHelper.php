<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_jtbootstrapbuttons
 *
 * @author      JoomTheme <support@joomtheme.com>
 * @copyright   (C) 2026 JoomTheme
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @link        https://joomtheme.com
 * @since       1.0.2
 */

namespace JoomTheme\Module\BootstrapButtons\Site\Helper;

defined('_JEXEC') || die;

use Joomla\Registry\Registry;

final class ButtonsHelper
{
    private const ALLOWED_VARIANTS = [
        'primary',
        'secondary',
        'success',
        'danger',
        'warning',
        'info',
        'light',
        'dark',
        'link',
    ];

    private const ALLOWED_SIZES = ['sm', 'lg'];

    private const ALLOWED_TARGETS = ['', '_blank'];

    private const ALLOWED_ALIGNMENTS = ['start', 'center', 'end'];

    private const ALLOWED_GAPS = ['0', '1', '2', '3', '4', '5'];

    /**
     * Build normalized button data.
     *
     * @param   Registry  $params  Module parameters.
     *
     * @return  array<int, array<string, mixed>>
     */
    public function getButtons(Registry $params): array
    {
        $items   = (array) $params->get('buttons', []);
        $buttons = [];

        foreach ($items as $item) {
            $button = is_array($item) ? $item : (array) $item;
            $text   = trim((string) ($button['text'] ?? ''));

            if ($text === '') {
                continue;
            }

            $variant = trim((string) ($button['variant'] ?? 'primary'));
            $variant = in_array($variant, self::ALLOWED_VARIANTS, true) ? $variant : 'primary';

            $outline = !empty($button['outline']) && $variant !== 'link';
            $size    = trim((string) ($button['size'] ?? ''));
            $size    = in_array($size, self::ALLOWED_SIZES, true) ? $size : '';

            $fullWidth = !empty($button['full_width']);
            $disabled  = !empty($button['disabled']);
            $target    = trim((string) ($button['target'] ?? ''));
            $target    = in_array($target, self::ALLOWED_TARGETS, true) ? $target : '';
            $title     = trim((string) ($button['title'] ?? ''));
            $url       = $this->normalizeUrl((string) ($button['url'] ?? ''));

            $class = 'btn btn-' . ($outline ? 'outline-' : '') . $variant;

            if ($size !== '') {
                $class .= ' btn-' . $size;
            }

            if ($fullWidth) {
                $class .= ' w-100';
            }

            $attributes = [
                'class' => trim($class),
                'title' => $title,
            ];

            if ($title !== '') {
                $attributes['aria-label'] = $title;
            }

            if ($disabled) {
                $attributes['disabled']      = true;
                $attributes['aria-disabled'] = 'true';
            }

            if ($url !== '' && !$disabled && $target !== '') {
                $attributes['target'] = $target;

                if ($target === '_blank') {
                    $attributes['rel'] = 'noopener noreferrer';
                }
            }

            $buttons[] = [
                'text'       => $text,
                'url'        => $url,
                'attributes' => $attributes,
                'isLink'     => $url !== '' && !$disabled,
            ];
        }

        return $buttons;
    }

    /**
     * Build Bootstrap wrapper classes.
     *
     * @param   Registry  $params  Module parameters.
     *
     * @return  string
     */
    public function getWrapperClass(Registry $params): string
    {
        $alignment = (string) $params->get('alignment', 'start');
        $gap       = (string) $params->get('gap', '2');

        if (!in_array($alignment, self::ALLOWED_ALIGNMENTS, true)) {
            $alignment = 'start';
        }

        if (!in_array($gap, self::ALLOWED_GAPS, true)) {
            $gap = '2';
        }

        return 'd-flex flex-wrap justify-content-' . $alignment . ' gap-' . $gap;
    }

    /**
     * Normalize and validate URL values.
     *
     * @param   string  $url  Input URL.
     *
     * @return  string
     */
    private function normalizeUrl(string $url): string
    {
        $url = trim($url);

        if ($url === '') {
            return '';
        }

        if (preg_match('/[[:cntrl:][:space:]<>"]/u', $url)) {
            return '';
        }

        if (str_starts_with($url, '#')) {
            return $url;
        }

        $scheme = parse_url($url, PHP_URL_SCHEME);

        if ($scheme === null || $scheme === false) {
            return preg_match('/^(?!\/\/)(?![a-zA-Z][a-zA-Z0-9+.-]*:)[^[:space:]<>"]+$/u', $url) ? $url : '';
        }

        $scheme = strtolower($scheme);

        if (in_array($scheme, ['http', 'https'], true)) {
            return filter_var($url, FILTER_VALIDATE_URL) ? $url : '';
        }

        if ($scheme === 'mailto') {
            if (!preg_match('/^mailto:([^?]+)(?:\?.*)?$/i', $url, $matches)) {
                return '';
            }

            return filter_var($matches[1], FILTER_VALIDATE_EMAIL) ? $url : '';
        }

        if ($scheme === 'tel') {
            return preg_match('/^tel:\+?[0-9().\-]+(?:;[a-z0-9=\-]+)*$/i', $url) ? $url : '';
        }

        return '';
    }
}
