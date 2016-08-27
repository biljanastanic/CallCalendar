<?php
class ProjectControllerCore extends FrontController
{
	public $php_self = 'project';
 	protected $project;

	public function setMedia()
	{
		parent::setMedia();

		$this->addjqueryPlugin('metadata');
		$this->addjqueryPlugin('tablesorter');
	}

	public function canonicalRedirection($canonicalURL = '')
	{
	}
	
	public function initContent()
	{
		parent::initContent();

		$id = Tools::getValue('id');
		
        
		$object = Project::getProjectById($id);
		
        
		$this->context->smarty->assign(array(
			'id' => Context::getContext()->shop->id,
			'members' => Customer::getCustomers(null, null, $id, $this->context->language->id,null,1),
			'leaders' => Customer::getCustomers(null, null, $id, $this->context->language->id, 1),
			'funding_agencies' => FundingAgency::getProjectFundingAgencies($id, $this->context->language->id),
			'project' => $object,
			'base_url' => __PS_BASE_URI__,
		));

		$this->setTemplate(_PS_THEME_DIR_.'project.tpl');
		
	}
}


