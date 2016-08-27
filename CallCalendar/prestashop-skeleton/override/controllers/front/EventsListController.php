<?php
class EventsListControllerCore extends FrontController
{
	public $php_self = 'eventslist';

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
			$id_project = null;

		}
		else if ($exploded[1] == 'division')
		{
			$id_initiative = $exploded[2];
			$id_area = null;
			$id_division = $exploded[2];
			$id_group = null;
			$id_project = null;
		}
		else if ($exploded[1] == 'group')
		{
			$id_initiative = $exploded[2];
			$id_area = null;
			$id_division = null;
			$id_group = $exploded[2];
			$id_project = null;
		}
		else if ($exploded[1] == 'project')
		{
			$id_initiative = null;
			$id_area = null;
			$id_division = null;
			$id_group = null;
			$id_project = $exploded[2];
		}
							 
		$id_type = Tools::getValue('type');			 
		$profile = Initiative::getInitiativeById(Initiative::getInitiativeByShop(Context::getContext()->shop->id));
		$events_list=NewsAndEvents::getNewsAndEvents(Context::getContext()->shop->id, $id_initiative,$id_project,null,null, $id_type, null, null, $this->context->language->id,true);
		
		foreach($events_list as $index=>$event)
		{
		$events_list[$index]['speakers_array']=NewsAndEvents::getSpeakers((int)$events_list[$index]['id_news_and_events']);
		$events_list[$index]['contact_person']=Customer::getCustomerById((int)$events_list[$index]['id_contact']);

		}
		$this->context->smarty->assign(array(
			'id_initiative' => $id_initiative,
			'id_area' => $id_area,
			'id_group' => $id_group,
			'id_division' => $id_division,
			'id_project' => $id_project,
			'id_type' => $id_type,
			'events_list' => $events_list,
			'events_types' => NewsAndEventsType::getEventTypes($this->context->language->id),
			'profile_name' => $profile['name'],
			'title' => 'Event list',
			'initiatives' => Initiative::getInitiatives(),
			'areas' => Initiative::getInitiatives($this->context->language->id, null, Context::getContext()->shop->id, 'Research area', true),
			'divisions' => Initiative::getInitiatives($this->context->language->id, null, Context::getContext()->shop->id, 'Division', true),
			'groups' => Initiative::getInitiatives($this->context->language->id, null, Context::getContext()->shop->id, 'Research group', true),
			'projects' => Project::getProjects(),
			'base_url' => __PS_BASE_URI__,
		));

		$this->setTemplate(_PS_THEME_DIR_.'events-list.tpl');
	}
}

