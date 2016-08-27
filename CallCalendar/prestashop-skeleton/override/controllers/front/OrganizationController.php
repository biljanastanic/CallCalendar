<?php
class OrganizationControllerCore extends FrontController
{
	public $php_self = 'organization';

	
	public function setMedia()
	{
		parent::setMedia();
	}
	
	public function initContent()
	{
		parent::initContent();
		
		$this->context->smarty->assign(array(
			'id' => Context::getContext()->shop->id,
			'title' => 'Organization',
			'areas' => Initiative::getInitiatives($this->context->language->id, null, Context::getContext()->shop->id, 'Research area', true),
			'divisions' => Initiative::getInitiatives($this->context->language->id, null, Context::getContext()->shop->id, 'Division', true),
			'groups' => Initiative::getInitiatives($this->context->language->id, null, Context::getContext()->shop->id, 'Research group', true),
			'research_leader' => Customer::getShopLeader(Context::getContext()->shop->id, $this->context->language->id),
			'base_url' => __PS_BASE_URI__,
		));

		$this->setTemplate(_PS_THEME_DIR_.'organization.tpl');
	}
}

