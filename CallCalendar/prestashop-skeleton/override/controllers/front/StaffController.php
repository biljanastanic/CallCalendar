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

		$this->context->smarty->assign(array(
			'people' => Customer::getCustomers(Context::getContext()->shop->id, null, $id_project, $this->context->language->id, null, 1),
			'id' => Context::getContext()->shop->id,
			'title' => 'People',
			'projects' => Project::getProjects($this->context->language->id,Context::getContext()->shop->id),
			'base_url' => __PS_BASE_URI__,
		));

		$this->setTemplate(_PS_THEME_DIR_.'staff.tpl');
	}
}

	