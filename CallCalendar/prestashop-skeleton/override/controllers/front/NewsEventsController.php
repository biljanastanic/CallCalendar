<?php
class NewsEventsControllerCore extends FrontController
{
	public $php_self = 'news-events';

	
	public function setMedia()
	{
		parent::setMedia();

		$this->addjqueryPlugin('metadata');
	}
	
	public function canonicalRedirection($canonicalURL = '')
	{
	}
	
	public function initContent()
	{
	
		parent::initContent();
		
		$id = Tools::getValue('id');
			
		$item=NewsAndEvents::getNewsAndEventsById($id,$this->context->language->id);
		
		if (file_exists(_PS_NEWS_AND_EVENTS_DIR_.(int)$id.'.pdf'))
			$attached_files = __PS_BASE_URI__.'news_events_files/'.$id.'.pdf';
		elseif (file_exists(_PS_NEWS_AND_EVENTS_DIR_.(int)$id.'.zip'))
			$attached_files = __PS_BASE_URI__.'news_events_files/'.$id.'.zip';
		elseif (file_exists(_PS_NEWS_AND_EVENTS_DIR_.(int)$id.'.rar'))
			$attached_files = __PS_BASE_URI__.'news_events_files/'.$id.'.rar';
		else 
			$attached_files = 0;
		
		$this->context->smarty->assign(array(
			'title' => 'News and Events',
			'base_url' => __PS_BASE_URI__,
			'item'=>$item,
			'attached_files'=>$attached_files,
			'contact'=>Customer::getCustomerById($item['id_contact']),
			'speakers'=> NewsAndEvents::getSpeakers((int)$id),
		));

		$this->setTemplate(_PS_THEME_DIR_.'news-events.tpl');
	} 
}

