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
			'id' => Context::getContext()->shop->id,
			'partners' => Partner::getPartnersByShop($this->context->language->id, Context::getContext()->shop->id),
			'img_url' =>_PS_IMG_
		));
			
		$this->setTemplate(_PS_THEME_DIR_.'partners.tpl');
	}
}


