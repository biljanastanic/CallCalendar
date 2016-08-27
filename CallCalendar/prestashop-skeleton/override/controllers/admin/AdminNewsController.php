<?php
class AdminNewsControllerCore extends AdminController
{
	protected $profiles_array = array();
	
	public function __construct()
	{
		$this->context = Context::getContext();
		$this->table = 'news_and_events';
		$this->className = 'NewsAndEvents';
		$this->multishop_context = Shop::CONTEXT_ALL;
		$this->lang = true;
		$this->addRowAction('edit');
		$this->addRowAction('delete');
		$this->addRowActionSkipList('delete', array(1));

		$news_and_events_scopes=NewsAndEventsScope::getNewsAndEventsScopes($this->context->language->id);
			
		$this->fieldFileSettings = array(
 			'name' => 'news_and_events_file'
 		);
		
		if (!$news_and_events_scopes)
			$this->errors[] = Tools::displayError('No scopes');
		else {
			foreach ($news_and_events_scopes as $news_and_events_scope)
				$this->news_and_events_scopes_array[$news_and_events_scope['name']] = $news_and_events_scope['name'];		
		}
		$this->bulk_actions = array(
			'delete' => array('text' => $this->l('Delete selected'), 
			'confirm' => $this->l('Delete selected items?'))
			);

		$this->fields_list = array(
			'id_news_and_events' => array(
						'title' => $this->l('ID'), 
						'align' => 'center', 
						'width' => 25
						),
			'title' => array(
						'title' => $this->l('Title'), 
						'width' => 'auto',
						'filter_key' => 'navl!title'
						),
			'scope' => array(
						'title' => $this->l('Scope'), 
						'type'  => 'select',
						'list' => $this->news_and_events_scopes_array,
						'filter_key' => 'navs!name',
						'width' => 'auto'
						),
			'date_add' => array(
				'title' => $this->l('Date added'),
				'width' => 150,
				'type' => 'datetime',
				'align' => 'right'
			)
			);
			
		$this->identifier = 'id_news_and_events';

		parent::__construct();
	}
	
	public function initToolbar()
	{
		if ($this->display == 'add' || $this->display == 'edit')
			$this->toolbar_btn['save-and-stay'] = array(
				'short' => 'SaveAndStay',
				'href' => '#',
				'desc' => $this->l('Save and stay'),
				'force_desc' => true,
			);
	
		parent::initToolbar();
	}
		
	public function processUpdate(){
	if (!($newsevent = $this->loadObject(true)))
			return;
	$this->uploadFile($newsevent->id,_PS_TMP_PUB_DIR_,_PS_NEWS_AND_EVENTS_DIR_);
	
	return parent::processUpdate();
	}
	
	public function processAdd(){
	if (!($newsevent = $this->loadObject(true)))
			return;
	
	if (!($object= parent::processAdd()))
			return $object;
			
	//after the object is created, upload the file with name based on object's id		
	$this->uploadFile($object->id,_PS_TMP_PUB_DIR_,_PS_NEWS_AND_EVENTS_DIR_);
	
	return $object;
	}
	
	public function renderList()
	{
	 	$this->_select = 'navl.title,navl.content, navt.name as type, navs.name as scope';
		$this->_join = 
		'LEFT JOIN `'._DB_PREFIX_.'news_and_events_lang` AS navl ON (a.`id_news_and_events` = navl.`id_news_and_events` AND navl.`id_lang` = '.(int)$this->context->language->id.')
		JOIN `'._DB_PREFIX_.'news_and_events_type_lang` AS navt ON (a.`id_news_and_events_type` = navt.`id_news_and_events_type` AND navt.`id_lang` = '.(int)$this->context->language->id.' and navt.name="News")
		LEFT JOIN `'._DB_PREFIX_.'news_and_events_scope_lang` AS navs ON (a.`id_news_and_events_scope` = navs.`id_news_and_events_scope` AND navs.`id_lang` = '.(int)$this->context->language->id.')';

	 	return parent::renderList();
	}
	
	public function renderForm()
	{
		if (!($obj = $this->loadObject(true)))
			return;
		
		$news_and_events_scopes=NewsAndEventsScope::getNewsAndEventsScopes($this->context->language->id);
		$projects = Project::getProjects($this->context->language->id);
		if($obj->id_contact)$contact=Customer::getCustomerById($obj->id_contact);
		
			$news_arr=NewsAndEventsType::getNewsAndEventsTypeByName($this->context->language->id,"News");

		$this->fields_form = array(
			'legend' => array(
				'title' => $this->l('News'),
				'image' => '../img/admin/table.gif'
			),
			'input' => array(
				array(
					'type' => 'select',
					'label' => $this->l('Scope:'),
					'name' => 'id_news_and_events_scope',
					'required' => true,//for news only
					'options' => array(
						'query' => $news_and_events_scopes,
						'id' => 'id_news_and_events_scope',
						'name' => 'name',
						'default' => array(
							'value' => '',
							'label' => $this->l('-- Choose --')
						)
					)
				),
				array(
					'type' => 'hidden', 
					'name' => 'id_news_and_events_type',
					'value' =>'1' // id for News in new_and_events_type table
					),
				array(
					'type' => 'text',
					'label' => $this->l('Title:'),
					'name' => 'title',
					'size' => 100,
					'required' => true,
					'lang' => true,
					'hint' => $this->l('Invalid characters:').' <>;=#{}'
				),
				array(
					'type'=>'textarea',
					'label' => $this->l('Description:'),
					'name'=>'content',
					'required' => true,
					'lang' => true,
					'cols' => 105,
					'rows' => 10,
					'class' => 'rte',
					'autoload_rte' => true

				),
					array(
					'type' => 'file_uploading',
					'label' => $this->l('Attach file:'),
					'name' => 'news_and_events_file',
					'file_path' => (file_exists($obj->file_dir.(int)$obj->id.'.pdf')) ? _PS_NEWS_AND_EVENTS_URI_.$obj->id.'.pdf':((file_exists($obj->file_dir.(int)$obj->id.'.rar')) ? _PS_NEWS_AND_EVENTS_URI_.$obj->id.'.rar':
					((file_exists($obj->file_dir.(int)$obj->id.'.zip')) ? _PS_NEWS_AND_EVENTS_URI_.$obj->id.'.zip':false)),
					'required' => false,
					'desc' => $this->l('Upload pdf,rar or zip from your computer')
				),		
				array(
					'type' => 'news_contact',
					'label' => $this->l('Contact:'),
					'name' => 'id_contact',
					'news_and_event' => $obj->id,
					'value' => $obj->id_contact,
					'contact_name'=>$contact?$contact['firstname']." ".$contact['lastname']:"",
					'desc'=>"Select the contact person.",
					'required' => true
				),
				array(
					'type' => 'project',
					'label' => $this->l('Related projects:'),
					'name' => 'projectBox',
					'values' => $projects,
					'required' => false,
					'desc' => $this->l('Select the project(s) this news/event is related to')
				)						
			),
			'submit' => array(
				'title' => $this->l('Save   '),
				'class' => 'button'
			)
		);
		$this->fields_value['id_news_and_events_type']=$news_arr['id_news_and_events_type'];
		
		$related_projects = $obj->getNewsAndEventsRelatedProjects();
		$related_projects_ids = array();
		
	if (is_array($related_projects))
			foreach ($related_projects as $related_project)
				$related_projects_ids[] = $related_project['id_project'];
		
		if (is_array($projects))
			foreach ($projects as $project)
				$this->fields_value['projectBox_'.$project['id_project']] = 
					Tools::getValue('projectBox_'.$project['id_project'], in_array($project['id_project'], $related_projects_ids));


		$this->fields_form['submit'] = array(
			'title' => $this->l('   Save   '),
			'class' => 'button'
		);

				
		return parent::renderForm();
	}
	
		public function setMedia()
		{
		parent::setMedia();
        if ($this->display == 'edit' || $this->display == 'add' || $this->display == 'list')
		{

		$this->addjQueryPlugin(array('autocomplete'));		
		$this->addJS(array(_PS_JS_DIR_.'admin-news.js'));
			
		}
		}


/*	public function postProcess()
	{
		if ($this->display == 'edit' || $this->display == 'add')
		{
		
			$this->addjQueryPlugin(array(
				'autocomplete'
			));
		
		$this->addJS(array(
				_PS_JS_DIR_.'admin-news.js'
			));
			
		}

	
		return AdminController::postProcess();
	}*/
}
