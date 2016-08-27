<?php
class AdminPartnersControllerCore extends AdminController
{
	/** @var array partner_types list */		
	protected $partner_types_array = array();
		
	public function __construct()
	{
		$this->table = 'partner';
		$this->className = 'Partner';
		$this->lang = true;
		$this->addRowAction('view');
		$this->addRowAction('edit');
		$this->addRowAction('delete');
	 	$this->bulk_actions = array('delete' => array('text' => $this->l('Delete selected'), 'confirm' => $this->l('Delete selected items?')));
		$this->multishop_context = Shop::CONTEXT_ALL;

		
		$this->fieldImageSettings = array(
 			'name' => 'image',
 			'dir' => 'partners'
 		);
		$this->context = Context::getContext();

		$partner_types = PartnerType::getPartnerTypes($this->context->language->id);
		if (!$partner_types)
			$this->errors[] = Tools::displayError('No partner types');
		else
			foreach ($partner_types as $partner_type)
				$this->partner_types_array[$partner_type['name']] = $partner_type['name'];
		

		$this->fields_list = array(
			'id_partner' => array('title' => $this->l('ID'),'width' => 25),
			'name' => array('title' => $this->l('Name'), 'filter_key' => 'b!name', 'width' => 'auto'),	
			'acronym' => array('title' => $this->l('Acronym'), 'filter_key' => 'b!acronym','width' => 25),
			'partner_type' => array('title' => $this->l('Type'),'type'  => 'select','list' => $this->partner_types_array,'filter_key' => 'ptl!name','width' => 'auto'),		
			'city' => array('title' => $this->l('City'),'width' => 'auto'),
			'country' => array('title' => $this->l('Country'),'filter_key' => 'cl!name','width' => 'auto')
			);

		parent::__construct();
	}

	public function setMedia()
	{
		parent::setMedia();
		$this->addJqueryPlugin('fancybox');
		$this->addJqueryUi('ui.sortable');
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
	
		public function postProcess()
	{
			if (Tools::isSubmit('forcedeleteImage'))
		{
			$this->processForceDeleteImage();
			Tools::redirectAdmin(self::$currentIndex.'&token='.Tools::getAdminTokenLite('AdminPartners').'&conf=7');
		}
	
		if ($this->display == 'edit' || $this->display == 'add')
		{
			$this->addjQueryPlugin(array(
				'autocomplete',
			));
			$this->addJS(array(
				_PS_JS_DIR_.'admin-partners.js'
			));
			
		}
			return AdminController::postProcess();
	}
	
	public function renderList()
	{
	 	$this->_select = 'ptl.`name` AS partner_type, cl.`name` AS country';
		$this->_join = 'LEFT JOIN `'._DB_PREFIX_.'partner_type` pt ON a.`id_partner_type` = pt.`id_partner_type`
		LEFT JOIN `'._DB_PREFIX_.'partner_type_lang` ptl ON (ptl.`id_partner_type` = pt.`id_partner_type` AND ptl.`id_lang` = '.(int)$this->context->language->id.')
		LEFT JOIN `'._DB_PREFIX_.'country_lang` cl ON (a.`id_country` = cl.`id_country` AND  cl.`id_lang` = '.(int)$this->context->language->id.')';

	 	return parent::renderList();
	}
	

	public function renderForm()
	{
		if (!($partner = $this->loadObject(true)))
			return;

		$partner_types = PartnerType::getPartnerTypes($this->context->language->id);
		$partner_contacts= $partner->getPartnerContacts($partner->id);
		$this->fields_form = array(
			'legend' => array(
				'title' => $this->l('Partners'),
				'image' => '../img/admin/table.gif'
			),
			'input' => array(
				array(
					'type' => 'text',
					'label' => $this->l('Name:'),
					'name' => 'name',
					'size' => 64,
					'required' => true,
					'lang' => true,
					'hint' => $this->l('Invalid characters:').' <>;=#{}'
				),
				array(
					'type' => 'text',
					'label' => $this->l('Acronym:'),
					'name' => 'acronym',
					'size' => 16,
					'required' => true,
					'lang' => true,
					'hint' => $this->l('Invalid characters:').' <>;=#{}'
				),
				array(
					'type' => 'select',
					'label' => $this->l('Partner Type:'),
					'name' => 'id_partner_type',
					'required' => true,
					'options' => array(
						'query' => $partner_types,
						'id' => 'id_partner_type',
						'name' => 'name',
						'default' => array(
							'value' => '',
							'label' => $this->l('-- Choose --')
						)
					)
				),
				array(
					'type' => 'partner_contact',
					'label' => $this->l('Partner contacts:'),
					'id_partner' => (int)$partner->id,
					'contacts' => $partner_contacts,
					'required' => false
				),
				array(
					'type' => 'text',
					'label' => $this->l('City:'),
					'name' => 'city',
					'lang' => true,
					'size' => 64,
					'required' => true,
					'hint' => $this->l('Invalid characters:').' <>;=#{}'
				),
				array(
					'type' => 'select',
					'label' => $this->l('Country:'),
					'name' => 'id_country',
					'required' => true,
					'default_value' => (int)$this->context->country->id,
					'options' => array(
						'query' => Country::getCountries($this->context->language->id, false),
						'id' => 'id_country',
						'name' => 'name',
					),
					'desc' => $this->l('Country where the partner is located')
				),
				array(
					'type' => 'text',
					'label' => $this->l('URL:'),
					'name' => 'url',
					'size' => 64,
					'required' => false,
					'hint' => "Url should start with http:// or https:// (e.g. http://www.mdh.se or http://mdh.se)."

				),
				array(
					'type' => 'partner_logo_file',
					'label' => $this->l('Logotype:'),
					'name' => 'image',
					'display_image' => true,
					'required' => false,
					'desc' => $this->l('Upload logo from your computer')
				),	
				array(
					'type' => 'textarea',
					'label' => $this->l('Partner Info:'),
					'name' => 'partner_info',
					'cols' => 100,
					'rows' => 4,
					'required' => false,
					'lang' => true
				)					
			)
		);
		
		$this->fields_form['submit'] = array(
			'title' => $this->l('   Save   '),
			'class' => 'button'
		);
		$image = ImageManager::thumbnail(_PS_PARTNERS_IMG_DIR_.'/'.$partner->id.'.jpg', $this->table.'_'.(int)$partner->id.'.'.$this->imageType, 150, $this->imageType, true);

		$this->fields_value = array(
			'image' => $image ? $image : false,
			'size' => $image ? filesize(_PS_PARTNERS_IMG_DIR_.'/'.$partner->id.'.jpg') / 1000 : false
		);

				
		return parent::renderForm();
	}

	public function processForceDeleteImage()
	{
		$partner = $this->loadObject();
		if (Validate::isLoadedObject($partner))
			$partner->deleteImage(true);
	}
	
	public function renderView()
	{
		$this->context = Context::getContext();
		if (!($partner = $this->loadObject(true)))
			return;
		$this->tpl_view_vars = array(
			'partner' => $partner->getPartner($partner->id),
			'language' => $this->context->language,
			'projectList' => $this->renderPartnerProjectsList($partner)
		);

		return parent::renderView();
	}
	
	protected $project_types_array = array();
	protected $project_status_array = array();
	
	public function renderPartnerProjectsList($partner){
	
		$project_types = ProjectType::getProjectTypes($this->context->language->id);
		$project_statuses = ProjectStatus::getProjectStatuses($this->context->language->id);
		if (!$project_types)
			$this->errors[] = Tools::displayError('No project type');
		else if(!$project_statuses)
			$this->errors[] = Tools::displayError('No project status');
		else
			{
			foreach ($project_types as $project_type)
				$this->project_types_array[$project_type['name']] = $project_type['name'];
			
			foreach ($project_statuses as $project_status)
				$this->project_statuses_array[$project_status['name']] = $project_status['name'];
			
			}
	
		$project_fields_display = (array(
			'id_project' => array('title' => $this->l('ID'),'width' => 25),
			'name' => array('title' => $this->l('Name'),'width' => 'auto'),	
			'acronym' => array('title' => $this->l('Acronym'),'width' => '25'),
			'type' => array('title' => $this->l('Type'),'type'  => 'select','list' => $this->project_types_array,'filter_key' => 'ptl!name','width' => 'auto'),
			'status' => array('title' => $this->l('Status'),'type'  => 'select','list' => $this->project_statuses_array,'filter_key' => 'psl!name','width' => 'auto'),		
			'date_start' => array('title' => $this->l('Creation date'),'width' => 150,'type' => 'date','align' => 'right'),
			'date_end' => array('title' => $this->l('Update date'),'width' => 150,'type' => 'date','align' => 'right'),
			'registry_number' => array('title' => $this->l('Registry Number'),'width' => 'auto'),		
			'keywords' => array('title' => $this->l('Keywords'),'width' => 'auto'),
			'partners' => array('title' => $this->l('Partners'),'width' => 'auto'),
			'overview' => array('title' => $this->l('Overview'),'width' => 'auto'),
			'results' => array('title' => $this->l('Results'),'width' => 'auto'),
			'future_work' => array('title' => $this->l('Future Work'),'width' => 'auto')
			));

		$project_list =  Project::getPartnerRelatedProjects($partner->id);

		$helper = new HelperList();
		$helper->currentIndex = Context::getContext()->link->getAdminLink('AdminProjects', false);
		$helper->token = Tools::getAdminTokenLite('AdminProjects');
		$helper->shopLinkType = '';
		$helper->table = 'project';
		$helper->identifier = 'id_project';
		$helper->actions = array('edit', 'view');
		$helper->show_toolbar = false;

		return $helper->generateList($project_list, $project_fields_display);
	}
}


