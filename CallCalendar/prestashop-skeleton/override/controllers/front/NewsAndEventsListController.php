<?php
class NewsAndEventsListControllerCore extends FrontController
{
	public $php_self = 'newsandeventslist';

	public function canonicalRedirection($canonicalURL = '')
	{
	}
	
		public function setMedia()
	{
		parent::setMedia();

		$this->addjqueryPlugin('metadata');
		$this->addjqueryPlugin('tablesorter');
	}
	
	public function initContent()
	{ 
		parent::initContent();

		$exploded = explode('_', substr(Tools::getValue('scope'), 0));
		if ($exploded[1] == 'area')
		{
			$id_initiative = $exploded[2];
			$id_area = $exploded[2];
			$id_division = null;
			$id_group = null;
		}
		else if ($exploded[1] == 'division')
		{
			$id_initiative = $exploded[2];
			$id_area = null;
			$id_division = $exploded[2];
			$id_group = null;
		}
		else if ($exploded[1] == 'group')
		{
			$id_initiative = $exploded[2];
			$id_area = null;
			$id_division = null;
			$id_group = $exploded[2];
		}
				
		$id_type = Tools::getValue('type');			 
		$news_array =NewsAndEventsType::getNewsAndEventsTypeByName($this->context->language->id,"News");
		$id_news=$news_array['id_news_and_events_type'];	 

	
		$profile = Initiative::getInitiativeById(Initiative::getInitiativeByShop(Context::getContext()->shop->id));
		
		$this->context->smarty->assign(array(
			'id_initiative' => $id_initiative,
			'id_area' => $id_area,
			'id_group' => $id_group,
			'id_division' => $id_division,
			'id_type' => $id_type,
			'id_news' => $id_news,
			'news_events_list' => NewsAndEvents::getNewsAndEvents(Context::getContext()->shop->id, $id_initiative,null,null,null, $id_type, null, null, $this->context->language->id),
			'news_events_types' => NewsAndEventsType::getNewsAndEventsTypes($this->context->language->id),
			'profile_name' => $profile['name'],
			'title' => 'News and Events list',
			'initiatives' => Initiative::getInitiatives(),
			'areas' => Initiative::getInitiatives($this->context->language->id, null, Context::getContext()->shop->id, 'Research area', true),
			'divisions' => Initiative::getInitiatives($this->context->language->id, null, Context::getContext()->shop->id, 'Division', true),
			'groups' => Initiative::getInitiatives($this->context->language->id, null, Context::getContext()->shop->id, 'Research group', true),
			'base_url' => __PS_BASE_URI__,
		));

		$this->setTemplate(_PS_THEME_DIR_.'news-and-events-list.tpl');
	}
}

