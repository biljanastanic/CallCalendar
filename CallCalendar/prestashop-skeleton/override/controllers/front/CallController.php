<?php
class CallControllerCore extends FrontController
{
	public $php_self = 'call';
 	protected $call;

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
		
        
		$object = Call::getCallById($id);
		$funding_agency = FundingAgency::getFundingAgencyById($object['id_funding_agency']);
		$attachments = CallAttachment::getAttachments(null, $id, true);
        
		$this->context->smarty->assign(array(
			'id' => Context::getContext()->shop->id,
			'call' => $object,
			'leaders' => Call::getCallsContacts($id, $this->context->language->id),
			'funding_agency' => $funding_agency,
			'attachments' => $attachments,
			'base_url' => __PS_BASE_URI__,
		));

		$this->setTemplate(_PS_THEME_DIR_.'call.tpl');
		
	}
}


