<?php

require_once "Customizing/global/plugins/Services/UIComponent/UserInterfaceHook/HelpMe/classes/class.ilHelpMePlugin.php";
require_once "Services/Form/classes/class.ilPropertyFormGUI.php";
require_once "Services/Form/classes/class.ilTextInputGUI.php";
require_once "Services/Form/classes/class.ilEMailInputGUI.php";
require_once "Services/Form/classes/class.ilSelectInputGUI.php";
require_once "Services/Form/classes/class.ilTextAreaInputGUI.php";
require_once "Customizing/global/plugins/Services/UIComponent/UserInterfaceHook/HelpMe/classes/HelpMe/class.ilHelpMeSupport.php";
require_once "Customizing/global/plugins/Services/UIComponent/UserInterfaceHook/HelpMe/classes/HelpMe/class.ilHelpMeRecipient.php";

/**
 * HelpMe GUI
 *
 * @ilCtrl_isCalledBy ilHelpMeGUI: ilUIPluginRouterGUI
 */
class ilHelpMeGUI {

	/**
	 * @var ilCtrl
	 */
	protected $ctrl;
	/**
	 * @var ilHelpMePlugin
	 */
	protected $pl;
	/**
	 * @var ilTemplate
	 */
	protected $tpl;
	/**
	 * @var ilObjUser
	 */
	protected $usr;


	function __construct() {
		/**
		 * @var ilCtrl     $ilCtrl
		 * @var ilObjUser  $ilUser
		 * @var ilTemplate $tpl
		 */

		global $ilCtrl, $ilUser, $tpl;

		$this->ctrl = $ilCtrl;
		$this->pl = ilHelpMePlugin::getInstance();
		$this->tpl = $tpl;
		$this->usr = $ilUser;
	}


	/**
	 *
	 */
	function executeCommand() {
		if (!$this->pl->currentUserHasRole()) {
			die();
		}

		$cmd = $this->ctrl->getCmd();

		switch ($cmd) {
			case "addSupport":
			case "newSupport":
				$this->{$cmd}();
				break;

			default:
				break;
		}
	}


	/**
	 * @return ilPropertyFormGUI
	 */
	protected function getSupportForm() {
		$config = $this->pl->getConfig();
		$configPriorities = $this->pl->getConfigPrioritiesArray();

		$form = new ilPropertyFormGUI();

		$form->setFormAction($this->ctrl->getFormAction($this, "", "", true));

		$form->addCommandButton("newSupport", $this->txt("srsu_submit"), "il_help_me_submit");
		$form->addCommandButton("", $this->txt("srsu_cancel"), "il_help_me_cancel");

		$form->setId("il_help_me_form");
		$form->setShowTopButtons(false);

		$form->setTitle($this->txt("srsu_support"));
		$form->setDescription($config->getInfo());

		$title = new ilTextInputGUI($this->txt("srsu_title"), "srsu_title");
		$title->setRequired(true);
		$form->addItem($title);

		$email = new ilEMailInputGUI($this->txt("srsu_email_address"), "srsu_email");
		$email->setRequired(true);
		$email->setValue($this->usr->getEmail());
		$form->addItem($email);

		$phone = new ilTextInputGUI($this->txt("srsu_phone"), "srsu_phone");
		$phone->setRequired(true);
		$form->addItem($phone);

		$priority = new ilSelectInputGUI($this->txt("srsu_priority"), "srsu_priority");
		$priority->setRequired(true);
		$priority->setOptions($configPriorities);
		$form->addItem($priority);

		$description = new ilTextAreaInputGUI($this->txt("srsu_description"), "srsu_description");
		$description->setRequired(true);
		$form->addItem($description);

		$reproduce_steps = new ilTextAreaInputGUI($this->txt("srsu_reproduce_steps"), "srsu_reproduce_steps");
		$reproduce_steps->setRequired(true);
		$form->addItem($reproduce_steps);

		return $form;
	}


	protected function showForm($form) {
		$html = $form->getHTML();

		if ($this->ctrl->isAsynch()) {
			echo $html;

			exit();
		} else {
			$this->tpl->setContent($html);
		}
	}


	protected function addSupport() {
		$form = $this->getSupportForm();

		$this->showForm($form);
	}


	protected function newSupport() {
		$form = $this->getSupportForm();
		$form->setValuesByPost();

		if (!$form->checkInput()) {
			$this->showForm($form);

			return;
		}

		$config = $this->pl->getConfig();
		$configPriorities = $this->pl->getConfigPriorities();

		$support = new ilHelpMeSupport();

		$title = $form->getInput("srsu_title");
		$support->setTitle($title);

		$email = $form->getInput("srsu_email");
		$support->setEmail($email);

		$phone = $form->getInput("srsu_phone");
		$support->setPhone($phone);

		$priority_id = $form->getInput("srsu_priority");
		foreach ($configPriorities as $priority) {
			if ($priority->getId() === $priority_id) {
				$support->setPriority($priority);
				break;
			}
		}

		$description = $form->getInput("srsu_description");
		$support->setDescription($description);

		$reproduce_steps = $form->getInput("srsu_reproduce_steps");
		$support->setReproduceSteps($reproduce_steps);

		$recipient = ilHelpMeRecipient::getRecipient($config->getRecipient(), $support, $config);
		if ($recipient->sendSupport()) {

		} else {

		}

		$this->showForm($form);
	}


	/**
	 * @param string $a_var
	 *
	 * @return string
	 */
	protected function txt($a_var) {
		return $this->pl->txt($a_var);
	}
}
