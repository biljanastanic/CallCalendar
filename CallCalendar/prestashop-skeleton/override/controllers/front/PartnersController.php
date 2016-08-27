<?php
class PartnersControllerCore extends FrontController
{
	public $php_self = 'partners';

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
			'title' => 'Partners',
			'partners' => Partner::getPartnersByShop($this->context->language->id, Context::getContext()->shop->id),
			'base_url' => __PS_BASE_URI__
		));

		$this->setTemplate(_PS_THEME_DIR_.'partners.tpl');
	}
}

