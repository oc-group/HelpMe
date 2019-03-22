<?php

use srag\ActiveRecordConfig\HelpMe\ActiveRecordConfigGUI;
use srag\Plugins\HelpMe\Config\ConfigFormGUI;
use srag\Plugins\HelpMe\Project\Project;
use srag\Plugins\HelpMe\Project\ProjectFormGUI;
use srag\Plugins\HelpMe\Project\ProjectsTableGUI;
use srag\Plugins\HelpMe\Utils\HelpMeTrait;

/**
 * Class ilHelpMeConfigGUI
 *
 * @author studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class ilHelpMeConfigGUI extends ActiveRecordConfigGUI {

	use HelpMeTrait;
	const PLUGIN_CLASS_NAME = ilHelpMePlugin::class;
	const TAB_PROJECTS = "projects";
	const CMD_ADD_PROJECT = "addProject";
	const CMD_CREATE_PROJECT = "createProject";
	const CMD_EDIT_PROJECT = "editProject";
	const CMD_UPDATE_PROJECT = "updateProject";
	const CMD_REMOVE_PROJECT_CONFIRM = "removeProjectConfirm";
	const CMD_REMOVE_PROJECT = "removeProject";
	/**
	 * @var array
	 */
	protected static $tabs = [ self::TAB_CONFIGURATION => ConfigFormGUI::class, self::TAB_PROJECTS => ProjectsTableGUI::class ];
	/**
	 * @var array
	 */
	protected static $custom_commands = [
		self::CMD_ADD_PROJECT,
		self::CMD_CREATE_PROJECT,
		self::CMD_EDIT_PROJECT,
		self::CMD_UPDATE_PROJECT,
		self::CMD_REMOVE_PROJECT,
		self::CMD_REMOVE_PROJECT_CONFIRM
	];


	/**
	 * @param Project|null $project
	 *
	 * @return ProjectFormGUI
	 */
	protected function getProjectForm(/*?*/
		Project $project = null): ProjectFormGUI {
		$form = new ProjectFormGUI($this, self::TAB_PROJECTS, $project);

		return $form;
	}


	/**
	 *
	 */
	protected function addProject()/*: void*/ {
		self::dic()->tabs()->activateTab(self::TAB_PROJECTS);

		$form = $this->getProjectForm();

		self::output()->output($form);
	}


	/**
	 *
	 */
	protected function createProject()/*: void*/ {
		self::dic()->tabs()->activateTab(self::TAB_PROJECTS);

		$form = $this->getProjectForm();

		if (!$form->storeForm()) {
			self::output()->output($form);

			return;
		}

		ilUtil::sendSuccess(self::plugin()->translate("added_project", self::LANG_MODULE_CONFIG, [ $form->getProject()->getProjectName() ]), true);

		$this->redirectToTab(self::TAB_PROJECTS);
	}


	/**
	 *
	 */
	protected function editProject()/*: void*/ {
		self::dic()->tabs()->activateTab(self::TAB_PROJECTS);

		$project_id = intval(filter_input(INPUT_GET, "srsu_project_id"));
		$project = self::projects()->getProjectById($project_id);

		$form = $this->getProjectForm($project);

		self::output()->output($form);
	}


	/**
	 *
	 */
	protected function updateProject()/*: void*/ {
		self::dic()->tabs()->activateTab(self::TAB_PROJECTS);

		$project_id = intval(filter_input(INPUT_GET, "srsu_project_id"));
		$project = self::projects()->getProjectById($project_id);

		$form = $this->getProjectForm($project);

		if (!$form->storeForm()) {
			self::output()->output($form);

			return;
		}

		ilUtil::sendSuccess(self::plugin()->translate("saved_project", self::LANG_MODULE_CONFIG, [ $form->getProject()->getProjectName() ]), true);

		$this->redirectToTab(self::TAB_PROJECTS);
	}


	/**
	 *
	 */
	protected function removeProjectConfirm()/*: void*/ {
		self::dic()->tabs()->activateTab(self::TAB_PROJECTS);

		$project_id = intval(filter_input(INPUT_GET, "srsu_project_id"));
		$project = self::projects()->getProjectById($project_id);

		$confirmation = new ilConfirmationGUI();

		self::dic()->ctrl()->setParameter($this, "srsu_project_id", $project->getProjectId());
		$confirmation->setFormAction(self::dic()->ctrl()->getFormAction($this));
		self::dic()->ctrl()->setParameter($this, "srsu_project_id", null);

		$confirmation->setHeaderText(self::plugin()->translate("remove_project_confirm", self::LANG_MODULE_CONFIG, [ $project->getProjectName() ]));

		$confirmation->addItem("srsu_project_id", $project->getProjectId(), $project->getProjectName());

		$confirmation->setConfirm($this->txt("remove"), self::CMD_REMOVE_PROJECT);
		$confirmation->setCancel($this->txt("cancel"), $this->getCmdForTab(self::TAB_PROJECTS));

		self::output()->output($confirmation);
	}


	/**
	 *
	 */
	protected function removeProject()/*: void*/ {
		$project_id = intval(filter_input(INPUT_GET, "srsu_project_id"));
		$project = self::projects()->getProjectById($project_id);

		$project->delete();

		ilUtil::sendSuccess(self::plugin()->translate("removed_project", self::LANG_MODULE_CONFIG, [ $project->getProjectName() ]), true);

		$this->redirectToTab(self::TAB_PROJECTS);
	}
}
