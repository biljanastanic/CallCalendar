<?php
class ResearchAreaControllerCore extends FrontController
{
	public $php_self = 'research_area';
 	protected $research_area;

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
			
		$object = Initiative::getInitiativeById($id);
		
		$this->context->smarty->assign(array(
			'id_initiative' => $id,
			'area' => $object,
			'members' => Customer::getCustomers(null, $id, null, $this->context->language->id,null,1),
			'leader' => Customer::getCustomers(null, $id, null, $this->context->language->id, 1),
			'projects' => Project::getInitiativeRelatedProjects($id),
			'publications' => Publication::getInitiativeRelatedPublications($id, $this->context->language->id, 6),
			'id' => Context::getContext()->shop->id,
			'base_url' => __PS_BASE_URI__,
			'img_url' =>_PS_IMG_
		));

		$this->setTemplate(_PS_THEME_DIR_.'research-area.tpl');
	}
}


