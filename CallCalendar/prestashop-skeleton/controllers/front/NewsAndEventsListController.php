<?php
class NewsAndEventsListControllerCore extends FrontController
{
	public $php_self = 'newsandeventslist';

	
	public function initContent()
	{
		parent::initContent();
		
		$this->context->smarty->assign(array(
			'base_url' => __PS_BASE_URI__,
		));

		$this->setTemplate(_PS_THEME_DIR_.'news-and-events-list.tpl');
	} 
}

