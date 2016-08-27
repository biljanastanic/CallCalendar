<?php
class StaffControllerCore extends FrontController
{
	public $php_self = 'staff';

	
	public function setMedia()
	{
		parent::setMedia();

		$this->addjqueryPlugin('metadata');
		$this->addjqueryPlugin('tablesorter');
	}
	
	public function initContent()
	{
		parent::initContent();

		$id_centre_hidden = Tools::getValue('id_centre_hidden');

		$exploded = explode('_', substr(Tools::getValue('filter'), 0));
		if ($exploded[1] == 'initiative')
		{
			$id_initiative = $exploded[2];
			$id_division = null;
			$id_group = null;
			$id_project = null;
		}
		else if ($exploded[1] == 'division')
		{
			$id_initiative = $exploded[2];
			$id_division = $exploded[2];
			$id_group = null;
			$id_project = null;
		}
		else if ($exploded[1] == 'group')
		{
			$id_initiative = $exploded[2];
			$id_division = null;
			$id_group = $exploded[2];
			$id_project = null;
		}
		else if ($exploded[1] == 'project')
		{
			$id_initiative = $exploded[2];
			$id_division = null;
			$id_group = null;
			$id_project = $exploded[2];
		}
		
		$this->context->smarty->assign(array(
			'id_initiative' => $id_initiative,
			'id_centre' => $id_centre,
			'id_group' => $id_group,
			'id_division' => $id_division,
			'id_project' => $id_project,
			'people' => Customer::getCustomers(Context::getContext()->shop->id, $id_initiative, $id_project, $this->context->language->id),
			'id' => Context::getContext()->shop->id,
//			'title' => Context::getContext()->shop->name.' Staff',
			'title' => 'People',
			'initiatives' => Initiative::getInitiatives(),
			'activities' => Initiative::getInitiatives($this->context->language->id, null, Context::getContext()->shop->id, 'activity', true),
			'divisions' => Initiative::getInitiatives($this->context->language->id, null, Context::getContext()->shop->id, 'division', true),
			'groups' => Initiative::getInitiatives($this->context->language->id, null, Context::getContext()->shop->id, 'group', true),
			'projects' => Project::getProjects(),
			'base_url' => __PS_BASE_URI__,
		));

		$this->setTemplate(_PS_THEME_DIR_.'staff.tpl');
	}
}

