<?php
class ContactController extends FrontController
{
	public $php_self = 'contact';
	
	public function initContent()
	{
		parent::initContent();

	
		$profile = Initiative::getInitiativeById(Initiative::getInitiativeByShop(Context::getContext()->shop->id));
		$this->context->smarty->assign(array(
			'id' => Context::getContext()->shop->id,
			'profile_name' => $profile['name'],
			'title' => 'Contact Us',
			'research_leader' => Customer::getShopLeader(Context::getContext()->shop->id, $this->context->language->id),
			'research_group_leaders' => Initiative::getInitiativeLeadersByType($this->context->language->id, Context::getContext()->shop->id, 'Research group'),
			'base_url' => __PS_BASE_URI__,
		));

		$this->setTemplate(_PS_THEME_DIR_.'contact.tpl');
	}
}
