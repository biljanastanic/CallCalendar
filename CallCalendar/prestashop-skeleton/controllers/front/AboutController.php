<?php
class AboutController extends FrontController
{
	public $php_self = 'about';
	
	public function initContent()
	{
		parent::initContent();

		$profile = Initiative::getInitiativeById(Initiative::getInitiativeByShop(Context::getContext()->shop->id));
		$this->context->smarty->assign(array(
			'id' => Context::getContext()->shop->id,
			'profile_name' => $profile['name'],
			'title' => 'About ' . $profile['name'],
			'base_url' => __PS_BASE_URI__,
		));

		$this->setTemplate(_PS_THEME_DIR_.'about.tpl');
	}
}
