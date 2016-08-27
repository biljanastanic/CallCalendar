<?php
class EventsListControllerCore extends FrontController
{
	public $php_self = 'eventslist';

	
	public function initContent()
	{
		parent::initContent();
		
		$this->context->smarty->assign(array(
			'base_url' => __PS_BASE_URI__,
		));

		$this->setTemplate(_PS_THEME_DIR_.'events-list.tpl');
	} 
}

