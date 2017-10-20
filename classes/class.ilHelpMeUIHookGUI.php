<?php
require_once "Services/UIComponent/classes/class.ilUIHookPluginGUI.php";
require_once "Customizing/global/plugins/Services/UIComponent/UserInterfaceHook/HelpMe/classes/class.ilHelpMePlugin.php";
require_once "Services/jQuery/classes/class.iljQueryUtil.php";
require_once "Services/UIComponent/Modal/classes/class.ilModalGUI.php";
require_once "Services/UIComponent/Button/classes/class.ilSubmitButton.php";
require_once "Services/UIComponent/Button/classes/class.ilButton.php";

/**
 * HelpMe UIHook-GUI
 */
class ilHelpMeUIHookGUI extends ilUIHookPluginGUI {

	/**
	 * @var ilCtrl
	 */
	protected $ctrl;
	/**
	 * @var ilHelpMeUIHookGUI
	 */
	protected $pl;
	/**
	 * @var ilTemplate
	 */
	protected $tpl;


	function __construct() {
		/**
		 * var ilCtrl $ilCtrl
		 * var ilTemplate $tpl
		 */

		global $ilCtrl, $tpl;

		$this->ctrl = $ilCtrl;
		$this->pl = ilHelpMePlugin::getInstance();
		$this->tpl = $tpl;
	}


	/**
	 * @param string $a_comp
	 * @param string $a_part
	 * @param array  $a_par
	 */
	function getHTML($a_comp, $a_part, $a_par = array()) {
		if ($a_comp === "Services/MainMenu" && $a_part === "main_menu_search") {
			if ($this->pl->currentUserHasRole()) {

				$tpl = $this->pl->getTemplate("il_help_me_button.html", true, true);

				iljQueryUtil::initjQuery();
				$this->tpl->addJavaScript("Services/Form/js/Form.js");
				$this->tpl->addJavaScript("Customizing/global/plugins/Services/UIComponent/UserInterfaceHook/HelpMe/js/html2canvas.min.js");
				$this->tpl->addJavaScript("Customizing/global/plugins/Services/UIComponent/UserInterfaceHook/HelpMe/js/ilHelpMe.js");

				$tpl->setCurrentBlock("il_help_me_button");
				$tpl->setVariable("SUPPORT_TXT", $this->txt("srsu_support"));
				$tpl->setVariable("SUPPORT_LINK", $this->ctrl->getLinkTargetByClass([
					"ilUIPluginRouterGUI",
					"ilHelpMeGUI"
				], "addSupport", "", true));
				$html = $tpl->get();

				return [ "mode" => ilUIHookPluginGUI::PREPEND, "html" => $html ];
			}
		}

		if ($a_par["tpl_id"] === "tpl.adm_content.html") {
			if ($this->pl->currentUserHasRole()) {
				ilModalGUI::initJS();

				$modal = ilModalGUI::getInstance();
				$modal->setType(ilModalGUI::TYPE_LARGE);
				$modal->setHeading($this->txt("srsu_support"));

				$modal->setId("il_help_me_modal");

				$html = $modal->getHTML();

				return [ "mode" => ilUIHookPluginGUI::APPEND, "html" => $html ];
			}
		}
	}


	/**
	 * @param string $a_var
	 *
	 * @return string
	 */
	protected function txt($a_var) {
		return $this->getPluginObject()->txt($a_var);
	}
}
