<?php
class AdminApplicationsControllerCore extends AdminController
{
	/** @var array project_types list */		
	protected $project_types_array = array();
	protected $application_statuses_array = array();
	protected $calls_array = array();

	public function __construct()
	{
		$this->table = 'application';
		$this->className = 'Application';
		$this->lang = true;
		//$this->addRowAction('view');
		$this->addRowAction('edit');
		$this->addRowAction('delete');
		$this->allow_export = true;
	 	$this->bulk_actions = array('delete' => array('text' => $this->l('Delete selected'), 'confirm' => $this->l('Delete selected items?')));
		$this->multishop_context = Shop::CONTEXT_ALL;

		$this->context = Context::getContext();

		$project_types = ProjectType::getProjectTypes($this->context->language->id);
		$application_statuses = ApplicationStatus::getApplicationStatuses($this->context->language->id);
		$calls = Call::getCalls($this->context->language->id);
		if (!$project_types)
			$this->errors[] = Tools::displayError('No project type');
		else if(!$application_statuses)
			$this->errors[] = Tools::displayError('No application status');
		else if(!$calls)
			$this->errors[] = Tools::displayError('No calls');
		else
			{
			foreach ($project_types as $project_type)
				$this->project_types_array[$project_type['name']] = $project_type['name'];
			
			foreach ($application_statuses as $application_status)
				$this->application_statuses_array[$application_status['name']] = $application_status['name'];

			foreach ($calls as $call)
				$this->calls_array[$call['title']] = $call['title'];
			
			}
	
		$this->fields_list = array(
			'id_application' => array(
				'title' => $this->l('ID'),
				'width' => 25
			),
			'application_name' => array(
				'title' => $this->l('Name'),
				'width' => 'auto',
				'filter_key' => 'b!name'
			),	
			'acronym' => array(
				'title' => $this->l('Acronym'),
				'width' => '25',
				'filter_key' => 'b!acronym'
			),
			'call_name' => array(
				'title' => $this->l('Call'),
				'type'  => 'select',
				'list' => $this->calls_array,
				'filter_key' => 'cl!title',
				'width' => 'auto'
			),
			'application_status' => array(
				'title' => $this->l('Status'),
				'type'  => 'select',
				'list' => $this->application_statuses_array,
				'filter_key' => 'asl!name',
				'width' => 'auto'
			)
        );

        if ($_GET['action']=='createProject'){
	 		$this->createProject();
		}

		parent::__construct();
	}

	public function setMedia()
	{
		parent::setMedia();
		$this->addJqueryPlugin('fancybox');
		$this->addJqueryUi('ui.sortable');
        if ($this->display == 'edit' || $this->display == 'add' || $this->display == 'list')
		{
			$this->addjQueryPlugin(array('autocomplete'));
            $this->addJS(array(_PS_JS_DIR_.'admin-projects1.js'));
		}
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
	
	public function initProcess()
	{
		$this->id_object = Tools::getValue('id_'.$this->table);

		parent::initProcess();
	}

	
	public function renderList()
	{
	 	$this->_select = 'b.name as application_name,cl.`title` AS call_name, asl.`name` AS application_status';
		$this->_join = 'LEFT JOIN `'._DB_PREFIX_.'call` c ON a.`id_call` = c.`id_call`
		LEFT JOIN `'._DB_PREFIX_.'call_lang` cl ON (cl.`id_call` = c.`id_call` AND cl.`id_lang` = '.(int)$this->context->language->id.')
		LEFT JOIN `'._DB_PREFIX_.'application_status` aps ON a.`id_application_status` = aps.`id_application_status`
		LEFT JOIN `'._DB_PREFIX_.'application_status_lang` asl ON (asl.`id_application_status` = aps.`id_application_status` AND asl.`id_lang` = '.(int)$this->context->language->id.')';
		$this->_orderBy="application_name";
	 	return parent::renderList();
	}

	public function renderForm()
	{
		if (!($application = $this->loadObject(true)))
			return;

		$project_types = ProjectType::getProjectTypes($this->context->language->id);
		
		$application_statuses = ApplicationStatus::getApplicationStatuses($this->context->language->id);
		
		$calls = Call::getCalls($this->context->language->id);

		$leaders = $application->getLeaders();

		$members = $application->getMembers();
	
		$associated = $application->getAssociated();

		$partners = Partner::getPartners($this->context->language->id);
		$partner_types=PartnerType::getPartnerTypes($this->context->language->id);
		
		
		$this->fields_form = array(
			'legend' => array(
				'title' => $this->l('Applications'),
				'image' => '../img/admin/note.png'
			),
			'input' => array(
				array(
					'type' => 'select',
					'label' => $this->l('Call:'),
					'name' => 'id_call',
					'required' => true,
					'options' => array(
						'query' => $calls,
						'id' => 'id_call',
						'name' => 'title',
						'default' => array(
							'value' => '',
							'label' => $this->l('-- Choose --')
						)
					)
				),
				array(
					'type' => 'text',
					'label' => $this->l('Name:'),
					'name' => 'name',
					'size' => 100,
					'required' => true,
					'lang' => true,
					'hint' => $this->l('Invalid characters:').' <>;=#{}'
				),
				array(
					'type' => 'text',
					'label' => $this->l('Acronym:'),
					'name' => 'acronym',
					'size' => 20,
					'required' => true,
					'lang' => true,
					'hint' => $this->l('Invalid characters:').' <>;=#{}'
				),
				array(
					'type' => 'date',
					'label' => $this->l('Select start date:'),
					'name' => 'date_start',
					'size' => 20,
					'required' => false
				),
				array(
					'type' => 'date',
					'label' => $this->l('Select end date:'),
					'name' => 'date_end',
					'size' => 20,
					'required' => false
				),		
				array(
					'type' => 'select',
					'label' => $this->l('Project Type:'),
					'name' => 'id_project_type',
					'required' => true,
					'options' => array(
						'query' => $project_types,
						'id' => 'id_project_type',
						'name' => 'name',
						'default' => array(
							'value' => '',
							'label' => $this->l('-- Choose --')
						)
					)
				),
				array(
					'type' => 'select',
					'label' => $this->l('Application Status:'),
					'name' => 'id_application_status',
					'required' => true,
					'options' => array(
						'query' => $application_statuses,
						'id' => 'id_application_status',
						'name' => 'name',
						'default' => array(
							'value' => '',
							'label' => $this->l('-- Choose --')
						)
					)
				),
				array(
					'type' => 'text',
					'label' => $this->l('Money requested:'),
					'name' => 'money_requested',
					'size' => 20,
					'required' => false,
					'desc'=>"Input the money requested for the project as an integer value (not displayed on the web)"
				),
				array(
					'type' => 'text',
					'label' => $this->l('MDH part of the total budget:'),
					'name' => 'mdhPartBudget',
					'size' => 20,
					'required' => false,
					'desc'=>"Input the MDH part of the total budget of the project as an integer value (not displayed on the web)"
				),
				array(
					'type' => 'text',
					'label' => $this->l('URL:'),
					'name' => 'url',
					'size' => 100,
					'required' => false,
					'hint' => "Url should start with http:// or https:// (e.g. http://www.mdh.se or http://mdh.se)."

				),				
				array(
					'type' => 'project_leaders',
					'label' => $this->l('Project Leader(s):'),
					'project' => (int)Tools::getValue('id_application'),
					'values' => $leaders,
					'required' => false,
					'desc' => $this->l('Select project leader(s)')
				),
				array(
					'type' => 'project_members',
					'label' => $this->l('Project Members:'),
					'project' => (int)Tools::getValue('id_application'),
					'values' => $members,
					'required' => false,
					'desc' => $this->l('Select project members')
				),
				array(
					'type' => 'project_associated',
					'label' => $this->l('Associated People:'),
					'project' => (int)Tools::getValue('id_application'),
					'values' => $associated,
					'required' => false,
					'desc' => $this->l('Select the people that are associated to this project')
				),
				array(
					'type' => 'textarea',
					'label' => $this->l('Keywords:'),
					'name' => 'keywords',
					'lang' => true,
					'cols' => 100,
					'rows' => 10,
					'class' => 'rte',
					'hint' => $this->l('Invalid characters:').' <>;=#{}'
				),
				array(
					'type' => 'textarea',
					'label' => $this->l('Overview:'),
					'name' => 'overview',
					'lang' => true,
					'autoload_rte' => true,
					'cols' => 100,
					'rows' => 10,
					'class' => 'rte',
					'hint' => $this->l('Invalid characters:').' <>;=#{}'
				),
				array(
					'type' => 'partner',
					'label' => $this->l('Related Partners:'),
					'name' => 'partnerBox',
					'values' => $partners,
					'partner_types'=>$partner_types,
					'required' => false,
					'desc' => $this->l('Select the partner(s) this project is related to')
				),
				array(
					'type' => 'create_project',
					'label' => $this->l('Create Project'),
				)
				
			)
		);

		foreach ($this->_languages as $language)
		{
			$this->fields_value['keywords_'.$language['id_lang']] = htmlentities(stripslashes($this->getFieldValue(
				$application,
				'keywords',
				$language['id_lang']
			)), ENT_COMPAT, 'UTF-8');

			$this->fields_value['overview_'.$language['id_lang']] = htmlentities(stripslashes($this->getFieldValue(
				$application,
				'overview',
				$language['id_lang']
			)), ENT_COMPAT, 'UTF-8');
			
		}

		$related_partners = $application->getApplicationRelatedPartners();
		$related_partners_ids = array();
		if (is_array($related_partners))
			foreach ($related_partners as $related_partner)
				$related_partners_ids[] = $related_partner['id_partner'];
				
		if (is_array($partners))
		foreach ($partners as $partner)
			$this->fields_value['partnerBox_'.$partner['id_partner']] = 
				Tools::getValue('partnerBox_'.$partner['id_partner'], in_array($partner['id_partner'], $related_partners_ids));


		$this->fields_form['submit'] = array(
			'title' => $this->l('   Save   '),
			'class' => 'button'
		);


				
		return parent::renderForm();
	}


	public function createProject() 
	{

		//TODO maybe do some validation or checks 
		Application::createProject(Tools::getValue('id_application'));

	}
	
}


