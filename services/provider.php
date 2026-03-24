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

defined('_JEXEC') || die;

use Joomla\CMS\Extension\Service\Provider\HelperFactory;
use Joomla\CMS\Extension\Service\Provider\Module;
use Joomla\CMS\Extension\Service\Provider\ModuleDispatcherFactory;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;

return new class () implements ServiceProviderInterface {
    public function register(Container $container): void
    {
        $container->registerServiceProvider(new ModuleDispatcherFactory('\\JoomTheme\\Module\\BootstrapButtons'));
        $container->registerServiceProvider(new HelperFactory('\\JoomTheme\\Module\\BootstrapButtons\\Site\\Helper'));
        $container->registerServiceProvider(new Module());
    }
};
