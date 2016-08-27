<?php
class CallsListControllerCore extends FrontController
{
	public $php_self = 'calls-list';

	
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
		$id_type = Tools::getValue('type');
		$id_funding_agency = Tools::getValue('funding');

		$statuses = CallStatus::getCallStatuses($this->context->language->id);
		$types = CallType::getCallTypes($this->context->language->id);

		$calls = array();
		$number_of_calls = 0;
		
		if ($id_status == "any")
			$calls = Call::getCalls($this->context->language->id, null, $id_funding_agency, $id_type);
		else
			$calls = Call::getCalls($this->context->language->id, $id_status, $id_funding_agency, $id_type);
		$number_of_calls = count($calls);	

		$this->context->smarty->assign(array(
			'id' => Context::getContext()->shop->id,
			'title' => 'Calls',
			'id_status' => $id_status,
			'id_type' => $id_type,
			'id_funding_agency' => $id_funding_agency,
			'calls' => $calls,
			'number_of_calls' => $number_of_calls,
			'statuses' => $statuses,
			'types' => $types,
			'funding_agencies' => FundingAgency::getFundingAgencies($this->context->language->id),
			'top_funding_agencies' => FundingAgency::getTopFundingAgencies($this->context->language->id, 6),
			'base_url' => __PS_BASE_URI__
		));

		$this->setTemplate(_PS_THEME_DIR_.'calls-list.tpl');
	}
}		





