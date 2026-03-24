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
 *
 * @var   array<int, array<string, mixed>>  $buttons
 * @var   string                            $wrapperClass
 */

defined('_JEXEC') || die;
?>
<?php if ($buttons !== []) : ?>
    <div class="mod-jtbootstrapbuttons <?php echo htmlspecialchars($wrapperClass, ENT_QUOTES, 'UTF-8'); ?>">
        <?php foreach ($buttons as $button) : ?>
            <?php
            $attr = '';

            foreach ($button['attributes'] as $name => $value) {
                if ($value === '' || $value === null || $value === false) {
                    continue;
                }

                if ($value === true) {
                    $attr .= ' ' . $name;
                    continue;
                }

                $attr .= ' ' . $name . '="' . htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8') . '"';
            }
            ?>
            <?php if (!empty($button['isLink'])) : ?>
                <a href="<?php echo htmlspecialchars((string) $button['url'], ENT_QUOTES, 'UTF-8'); ?>"<?php echo $attr; ?>><?php echo htmlspecialchars((string) $button['text'], ENT_QUOTES, 'UTF-8'); ?></a>
            <?php else : ?>
                <button type="button"<?php echo $attr; ?>><?php echo htmlspecialchars((string) $button['text'], ENT_QUOTES, 'UTF-8'); ?></button>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
