<?php
class ResearchGroupControllerCore extends FrontController
{
	public $php_self = 'research-group';
 	protected $research_group;

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
			'group' => $object,
			'divisions' => Initiative::getRelatedInitiativesByType($this->context->language->id, Context::getContext()->shop->id, $id, 'Division'),
			'members' => Customer::getCustomers(null, $id, null, $this->context->language->id,null,1),
			'leaders' => Customer::getCustomers(null, $id, null, $this->context->language->id, 1),
			'projects' => Project::getInitiativeRelatedProjects($id),
			'publications' => Publication::getInitiativeRelatedPublications($id, $this->context->language->id, 6),
			'id' => Context::getContext()->shop->id,
			'base_url' => __PS_BASE_URI__,
			'img_url' =>_PS_IMG_
		));
		
		$this->setTemplate(_PS_THEME_DIR_.'research-group.tpl');
	}
}

