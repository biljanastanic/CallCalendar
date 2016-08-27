<?php
class ProjectsListControllerCore extends FrontController
{
	public $php_self = 'projects-list';

	
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

		
		$id_status = Tools::getValue('status');
		$id_member = Tools::getValue('member');
		$id_funding_agency = Tools::getValue('funding');
		$id_partner = Tools::getValue('partner');

		$statuses = ProjectStatus::getProjectStatuses($this->context->language->id);

		$projects = array();
		$number_of_projects = 0;
		
		if ($id_status == "any")
			$projects = Project::getProjects($this->context->language->id, null, null, $id_member, null, $id_funding_agency,$id_partner);
		else
			$projects = Project::getProjects($this->context->language->id, null, null, $id_member, $id_status, $id_funding_agency,null);
		$number_of_projects = count($projects);	

		$this->context->smarty->assign(array(
			'id' => Context::getContext()->shop->id,
			'title' => 'Projects',
			'id_member' => $id_member,
			'id_status' => $id_status,
			'id_funding_agency' => $id_funding_agency,
			'projects' => $projects,
			'number_of_projects' => $number_of_projects,
			'statuses' => $statuses,
			'people' => Customer::getCustomers(Context::getContext()->shop->id),
			'funding_agencies' => FundingAgency::getFundingAgencies($this->context->language->id),
			'top_funding_agencies' => FundingAgency::getTopFundingAgencies($this->context->language->id, 6),
			'base_url' => __PS_BASE_URI__
		));

		$this->setTemplate(_PS_THEME_DIR_.'projects-list.tpl');
	}
}		





