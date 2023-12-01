<?php
/**
 * @package    [PACKAGE_NAME]
 *
 * @author     [AUTHOR] <[AUTHOR_EMAIL]>
 * @copyright  [AUTHOR_URL]
 * @license    [LICENSE]
 * @link       [AUTHOR_URL]
 */

defined('_JEXEC') or die;

use function YOOtheme\app;
use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Factory;
use Joomla\CMS\Uri\Uri;
use YOOtheme\Application;
use YOOtheme\Path;

if (!class_exists('plgSystemKickKwadratHelper')) {
    require_once __DIR__ . '/helper.php';
}

/**
 * KickKwadrat plugin.
 *
 * @package   plg_system_kickkwadrat
 * @since     1.0.0
 */
class plgSystemKickKwadrat extends CMSPlugin
{
	/**
	 * Application object
	 *
	 * @var    CMSApplication
	 * @since  1.0.0
	 */
	protected $app;

	/**
	 * Database object
	 *
	 * @var    DatabaseDriver
	 * @since  1.0.0
	 */
	protected $db;

	/**
	 * Affects constructor behavior. If true, language files will be loaded automatically.
	 *
	 * @var    boolean
	 * @since  1.0.0
	 */
	protected $autoloadLanguage = true;

	/**
	 * onAfterInitialise.
	 *
	 * @return  void
	 *
	 * @since   1.0.0
	 */
	public function onAfterInitialise ()
	{
        try {
            plgSystemKickKwadratHelper::validatePlatform();
        } catch (\RuntimeException $e) {
            plgSystemKickKwadratHelper::adminNotice($e->getMessage());

            return;
        }

        if (!class_exists(Application::class, false)) {
            return;
        }

		Path::setAlias('~kickkwadrat', __DIR__);
		Path::setAlias('~kickkwadrat_url', Uri::root(true) . '/plugins/system/kickkwadrat');

       /* $config = plgSystemKickKwadratHelper::fetchConfig();
        $modules = ['core', 'condition', 'api', 'auth', 'storage'];

        foreach (['access', 'form', 'source', 'icon', 'dynamic', 'layout', 'element'] as $addon) {
            $enabled = $config[$addon]['state'] ?? true;

            if ($enabled) {
                $modules[] = $addon;
            }
        }

        foreach ($modules as $module) {
            app()->load('~kickkwadrat/modules/{' . $module . '{,-joomla}}/bootstrap.php');
        }*/


		app()->load('~kickkwadrat/modules/*/bootstrap.php');
	}

    public function onExtensionBeforeUpdate(string $type, ?SimpleXMLElement $manifest)
    {
        if ($manifest) {
            plgSystemKickKwadratHelper::preinstallThemeCheck($manifest);
        }
    }

    public function onExtensionBeforeInstall(string $method, string $type, ?SimpleXMLElement $manifest)
    {
        if ($manifest) {
            plgSystemKickKwadratHelper::preinstallThemeCheck($manifest);
        }
    }
}
