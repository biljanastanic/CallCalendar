<?php
class NewsEventsControllerCore extends FrontController
{
	public $php_self = 'news-events';

	
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
			'title' => 'News and Events',
			'base_url' => __PS_BASE_URI__,
		));

		$this->setTemplate(_PS_THEME_DIR_.'news-events.tpl');
	} 
}

