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

namespace JoomTheme\Module\BootstrapButtons\Site\Dispatcher;

defined('_JEXEC') || die;

use Joomla\CMS\Dispatcher\AbstractModuleDispatcher;
use Joomla\CMS\Helper\HelperFactoryAwareInterface;
use Joomla\CMS\Helper\HelperFactoryAwareTrait;

final class Dispatcher extends AbstractModuleDispatcher implements HelperFactoryAwareInterface
{
    use HelperFactoryAwareTrait;

    protected function getLayoutData(): array
    {
        $data = parent::getLayoutData();
        $helper = $this->getHelperFactory()->getHelper('ButtonsHelper');

        $data['buttons'] = $helper->getButtons($data['params']);
        $data['wrapperClass'] = $helper->getWrapperClass($data['params']);

        return $data;
    }
}
