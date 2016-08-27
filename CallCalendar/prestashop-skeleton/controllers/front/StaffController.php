<?php

//overriden 

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

		$exploded = explode('_', substr(Tools::getValue('filter'), 0));
		if ($exploded[1] == 'initiative')
		{
			$id_initiative = $exploded[2];
			$id_project = null;
		}
		else 
		{
			$id_initiative = null;
			$id_project = $exploded[2];
		}
		
		$this->context->smarty->assign(array(
			'id_initiative' => $id_initiative,
			'id_project' => $id_project,
			'people' => Customer::getCustomers(Context::getContext()->shop->id, $id_initiative, $id_project),
			'id' => Context::getContext()->shop->id,
			'title' => Context::getContext()->shop->name.' Staff',
			'initiatives' => Initiative::getInitiatives(),
			'projects' => Project::getProjects(),
			'base_url' => $protocol_content.Tools::getHttpHost().__PS_BASE_URI__,
		));

		$this->setTemplate(_PS_THEME_DIR_.'staff.tpl');
	}
}

