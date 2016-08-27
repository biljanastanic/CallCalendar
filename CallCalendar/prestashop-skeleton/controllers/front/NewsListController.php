<?php
class NewsListControllerCore extends FrontController
{
	public $php_self = 'newslist';

	
	public function initContent()
	{
		parent::initContent();
		
		$this->context->smarty->assign(array(
			'base_url' => __PS_BASE_URI__,
		));

		$this->setTemplate(_PS_THEME_DIR_.'news-list.tpl');
	} 
}

