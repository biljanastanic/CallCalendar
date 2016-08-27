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
		if (Validate::isLoadedObject($this->research_group))
			parent::canonicalRedirection($this->context->link->getResearchGroupLink($this->research_group));
	}
	
	public function initContent()
	{
		parent::initContent();

		$id_initiative = Tools::getValue('id_research_group');
			
		$the_research_group = Initiative::getInitiativeById($id_initiative);
	
		$this->context->smarty->assign(array(
			'id_initiative' => $id_initiative,
			'members' => Customer::getCustomers(null, $id_initiative, null, $this->context->language->id,2),
			'leader' => Customer::getCustomers(null, $id_initiative, null, $this->context->language->id,1),
			'introduction' => $the_research_group['description'],
			'projects' => Project::getInitiativeRelatedProjects($id_initiative),
			'publications' => Publication::getInitiativeRelatedPublications($id_initiative),
			'id' => Context::getContext()->shop->id,
			'title' => $the_research_group['name'],
			'base_url' => __PS_BASE_URI__,
			'img_url' =>_PS_IMG_
		));

		$this->setTemplate(_PS_THEME_DIR_.'research-group.tpl');
	}
}

