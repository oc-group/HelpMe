<?php

require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../../Notifications4Plugins/vendor/autoload.php";

use srag\DIC\HelpMe\Util\LibraryLanguageInstaller;
use srag\Plugins\HelpMe\Config\Config;
use srag\Plugins\HelpMe\Project\Project;
use srag\Plugins\HelpMe\Utils\HelpMeTrait;
use srag\RemovePluginDataConfirm\HelpMe\PluginUninstallTrait;

/**
 * Class ilHelpMePlugin
 *
 * @author studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class ilHelpMePlugin extends ilUserInterfaceHookPlugin {

	use PluginUninstallTrait;
	use HelpMeTrait;
	const PLUGIN_ID = "srsu";
	const PLUGIN_NAME = "HelpMe";
	const PLUGIN_CLASS_NAME = self::class;
	const REMOVE_PLUGIN_DATA_CONFIRM_CLASS_NAME = HelpMeRemoveDataConfirm::class;
	/**
	 * @var self|null
	 */
	protected static $instance = null;


	/**
	 * @return self
	 */
	public static function getInstance(): self {
		if (self::$instance === null) {
			self::$instance = new self();
		}

		return self::$instance;
	}


	/**
	 * ilHelpMePlugin constructor
	 */
	public function __construct() {
		parent::__construct();
	}


	/**
	 * @return string
	 */
	public function getPluginName(): string {
		return self::PLUGIN_NAME;
	}


	/**
	 * @inheritdoc
	 */
	public function updateLanguages(array $a_lang_keys = null) {
		parent::updateLanguages($a_lang_keys);

		LibraryLanguageInstaller::getInstance()->withPlugin(self::plugin())->withLibraryLanguageDirectory(__DIR__
			. "/../vendor/srag/removeplugindataconfirm/lang")->updateLanguages();

		LibraryLanguageInstaller::getInstance()->withPlugin(self::plugin())->withLibraryLanguageDirectory(__DIR__
			. "/../vendor/srag/custominputguis/src/ScreenshotsInputGUI/lang")->updateLanguages();
	}


	/**
	 * @inheritdoc
	 */
	protected function deleteData()/*: void*/ {
		self::dic()->database()->dropTable(Config::TABLE_NAME, false);
		self::dic()->database()->dropTable(Project::TABLE_NAME, false);
	}
}
