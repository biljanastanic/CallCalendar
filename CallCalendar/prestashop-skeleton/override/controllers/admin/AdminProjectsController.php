<?php
class AdminProjectsControllerCore extends AdminController
{
	/** @var array project_types list */		
	protected $project_types_array = array();
	protected $project_statuses_array = array();
	protected $profiles_array = array();

	public function __construct()
	{
		$this->table = 'project';
		$this->className = 'Project';
		$this->lang = true;
		//$this->addRowAction('view');
		$this->addRowAction('edit');
		$this->addRowAction('delete');
		$this->allow_export = true;
	 	$this->bulk_actions = array('delete' => array('text' => $this->l('Delete selected'), 'confirm' => $this->l('Delete selected items?')));
		$this->multishop_context = Shop::CONTEXT_ALL;

		$this->context = Context::getContext();

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
	
		$this->fields_list = array(
			'id_project' => array(
				'title' => $this->l('ID'),
				'width' => 25
			),
			'project_name' => array(
				'title' => $this->l('Name'),
				'width' => 'auto',
				'filter_key' => 'b!name'
			),	
			'acronym' => array(
				'title' => $this->l('Acronym'),
				'width' => '25',
				'filter_key' => 'b!acronym'
			),
			'project_type' => array(
				'title' => $this->l('Type'),
				'type'  => 'select',
				'list' => $this->project_types_array,
				'filter_key' => 'ptl!name',
				'width' => 'auto'
			),
			'project_status' => array(
				'title' => $this->l('Status'),
				'type'  => 'select',
				'list' => $this->project_statuses_array,
				'filter_key' => 'psl!name',
				'width' => 'auto'
			)
        );

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
	 	$this->_select = 'b.name as project_name,ptl.`name` AS project_type, psl.`name` AS project_status';
		$this->_join = 'LEFT JOIN `'._DB_PREFIX_.'project_type` pt ON a.`id_project_type` = pt.`id_project_type`
		LEFT JOIN `'._DB_PREFIX_.'project_type_lang` ptl ON (ptl.`id_project_type` = pt.`id_project_type` AND ptl.`id_lang` = '.(int)$this->context->language->id.')
		LEFT JOIN `'._DB_PREFIX_.'project_status` ps ON a.`id_project_status` = ps.`id_project_status`
		LEFT JOIN `'._DB_PREFIX_.'project_status_lang` psl ON (psl.`id_project_status` = ps.`id_project_status` AND psl.`id_lang` = '.(int)$this->context->language->id.')';
		$this->_orderBy="project_name";
	 	return parent::renderList();
	}

	public function renderForm()
	{
		if (!($project = $this->loadObject(true)))
			return;

		$project_types = ProjectType::getProjectTypes($this->context->language->id);
		
		$project_statuses = ProjectStatus::getProjectStatuses($this->context->language->id);
		
		$funding_agencies = FundingAgency::getFundingAgencies($this->context->language->id);
		
		$project_kinds=FundingAgencyProjectKind::getFundingAgencyProjectKinds($this->context->language->id);
		
		$leaders = $project->getLeaders();

		$members = $project->getMembers();
	
		$associated = $project->getAssociated();
		
		
        $partners = Partner::getPartners($this->context->language->id);
		$partner_types=PartnerType::getPartnerTypes($this->context->language->id);
        
		$this->fields_form = array(
			'legend' => array(
				'title' => $this->l('projects'),
				'image' => '../img/admin/table.gif'
			),
			'input' => array(
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
					'type'=>'text',
					'label' => $this->l('Registry number:'),
					'name'=>'registry_number',
					'size' => 100,
					'required' => false,
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
					'label' => $this->l('Project Status:'),
					'name' => 'id_project_status',
					'required' => true,
					'options' => array(
						'query' => $project_statuses,
						'id' => 'id_project_status',
						'name' => 'name',
						'default' => array(
							'value' => '',
							'label' => $this->l('-- Choose --')
						)
					)
				),
				array(
					'type' => 'text',
					'label' => $this->l('Total budget of the project:'),
					'name' => 'totalBudget',
					'size' => 20,
					'required' => false,
					'desc'=>"Input the total budget of the project as an integer value (not displayed on the web)"
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
					'project' => (int)Tools::getValue('id_project'),
					'values' => $leaders,
					'required' => false,
					'desc' => $this->l('Select project leader(s)')
				),
				array(
					'type' => 'project_members',
					'label' => $this->l('Project Members:'),
					'project' => (int)Tools::getValue('id_project'),
					'values' => $members,
					'required' => false,
					'desc' => $this->l('Select project members')
				),
				array(
					'type' => 'project_associated',
					'label' => $this->l('Associated People:'),
					'project' => (int)Tools::getValue('id_project'),
					'values' => $associated,
					'required' => false,
					'desc' => $this->l('Select the people that are associated to this project')
				),
				array(
					'type' => 'funding_agency',
					'label' => $this->l('Related Funding Agencies:'),
					'name' => 'fundingAgencyBox',
					'values' => $funding_agencies,
					'project_kinds'=>$project_kinds,
					'required' => false,
					'desc' => $this->l('Select the funding agencies this project is related to')
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
					'type' => 'textarea',
					'label' => $this->l('Results:'),
					'name' => 'results',
					'lang' => true,
					'autoload_rte' => true,
					'cols' => 100,
					'rows' => 10,
					'class' => 'rte',
					'hint' => $this->l('Invalid characters:').' <>;=#{}'
				),
				array(
					'type' => 'textarea',
					'label' => $this->l('Future Work:'),
					'name' => 'future_work',
					'autoload_rte' => true,
					'lang' => true,
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
				)
				
			)
		);

		foreach ($this->_languages as $language)
		{
			$this->fields_value['keywords_'.$language['id_lang']] = htmlentities(stripslashes($this->getFieldValue(
				$project,
				'keywords',
				$language['id_lang']
			)), ENT_COMPAT, 'UTF-8');

			$this->fields_value['overview_'.$language['id_lang']] = htmlentities(stripslashes($this->getFieldValue(
				$project,
				'overview',
				$language['id_lang']
			)), ENT_COMPAT, 'UTF-8');
			
			$this->fields_value['results_'.$language['id_lang']] = htmlentities(stripslashes($this->getFieldValue(
				$project,
				'results',
				$language['id_lang']
			)), ENT_COMPAT, 'UTF-8');
			
			$this->fields_value['future_work_'.$language['id_lang']] = htmlentities(stripslashes($this->getFieldValue(
				$project,
				'future_work',
				$language['id_lang']
			)), ENT_COMPAT, 'UTF-8');
		}

		// Added values of object 
		
		$related_funding_agencies= $project->getProjectRelatedFundingAgencies();
		
		$related_funding_agencies_ids = array();
		
		
		if (is_array($related_funding_agencies))
			foreach ($related_funding_agencies as $related_funding_agency)
				$related_funding_agencies_ids[] = $related_funding_agency['id_funding_agency'];
		
		if (is_array($funding_agencies))
		foreach ($funding_agencies as $funding_agency)
			$this->fields_value['fundingAgencyBox_'.$funding_agency['id_funding_agency']] = 
				Tools::getValue('fundingAgencyBox_'.$funding_agency['id_funding_agency'], in_array($funding_agency['id_funding_agency'], $related_funding_agencies_ids));
        
        
        
        $related_partners = $project->getProjectRelatedPartners();
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
	
	
	/*public function renderView()
	{
		$this->context = Context::getContext();
		if (!($project = $this->loadObject(true)))
			return;
			
		$this->tpl_view_vars = array(
			'project' => $project->getProject($project->id,$this->context->language->id),
			'language' => $this->context->language,
			'partnerList' => $this->renderProjectPartnersList($project),
			'fundingAgenciesList' => $this->renderProjectFundingList($project) ,
			'initiativesList' => $this->renderProjectInitiativeList($project)
		);

		return parent::renderView();
	}
		
	public function renderProjectPartnersList($project){
	
	$partner_types_array=array();
		$partner_types = PartnerType::getPartnerTypes($this->context->language->id);
		if (!$partner_types)
			$this->errors[] = Tools::displayError('No partner types');
		else
			foreach ($partner_types as $partner_type)
				$partner_types_array[$partner_type['name']] = $partner_type['name'];
		

		$partner_fields_display = (array(
			'id_partner' => array('title' => $this->l('ID'),'width' => 25),
			'name' => array('title' => $this->l('Name'),'width' => 'auto'),	
			'acronym' => array('title' => $this->l('Acronym'),'width' => 25),
			'type' => array('title' => $this->l('Type'),'type'  => 'select','list' => $partner_types_array,'filter_key' => 'ptl!name','width' => 'auto'),		
			'city' => array('title' => $this->l('City'),'width' => 'auto'),
			'country' => array('title' => $this->l('Country'),'width' => 'auto')
		));

		$partner_list = Project::getProjectRelatedPartners($project->id);
if($partner_list ){
		$helper = new HelperList();
		$helper->currentIndex = Context::getContext()->link->getAdminLink('AdminPartners', false);
		$helper->token = Tools::getAdminTokenLite('AdminPartners');
		$helper->shopLinkType = '';
		$helper->table = 'partner';
		$helper->identifier = 'id_partner';
		$helper->actions = array('edit', 'view');
		$helper->show_toolbar = false;

		return $helper->generateList($partner_list, $partner_fields_display);
		}
		return "No related partners ";
	}
	public function renderProjectFundingList($project){
	

		$funding_fields_display = (array(
			'id_funding_agency' => array('title' => $this->l('ID'),'width' => 25),
			'name' => array('title' => $this->l('Name'),'width' => 'auto'),	
			'acronym' => array('title' => $this->l('Acronym'),'width' => '25'),	
			'url' => array('title' => $this->l('Url'),'width' => 'auto')
			));

		$funding_list = FundingAgency::getProjectFundingAgencies($project->id);
		if($funding_list){
		$helper = new HelperList();
		$helper->currentIndex = Context::getContext()->link->getAdminLink('AdminFundingAgencies', false);
		$helper->token = Tools::getAdminTokenLite('AdminFundingAgencies');
		$helper->shopLinkType = '';
		$helper->table = 'funding_agency';
		$helper->identifier = 'id_funding_agency';
		$helper->actions = array('edit', 'view');
		$helper->show_toolbar = false;

		return $helper->generateList($funding_list, $funding_fields_display);
		}
		return "No related funding agencies";
	}

	public function renderProjectInitiativeList($project){
	
		$initiative_types_array= array();
		$initiative_types = InitiativeType::getInitiativeTypes($this->context->language->id);
		if (!$initiative_types)
			$this->errors[] = Tools::displayError('No initiative type');
		else
			foreach ($initiative_types as $initiative_type)
				$initiative_types_array[$initiative_type['name']] = $initiative_type['name'];

		$initiative_fields_display = array(
			'id_initiative' => array('title' => $this->l('ID'),	'width' => 25),
			'name' => array('title' => $this->l('Name'),'width' => 'auto'),	
			'acronym' => array(	'title' => $this->l('Acronym'),'width' => '25'),	
			'initiative_type' => array('title' => $this->l('Type'),'type'  => 'select','list' => $initiative_types_array,'filter_key' => 'itl!name','width' => 'auto'),	
			'date_add' => array('title' => $this->l('Creation date'),'width' => 150,'type' => 'date','align' => 'right'),
			'active' => array('title' => $this->l('Enabled'),'width' => 70,'active' => 'status','type' => 'bool','align' => 'center','orderby' => false)
		);

		$initiative_list = Project::getProjectRelatedInitiativesById($project->id);
		if($initiative_list){
		$helper = new HelperList();
		$helper->currentIndex = Context::getContext()->link->getAdminLink('AdminInitiatives', false);
		$helper->token = Tools::getAdminTokenLite('AdminInitiatives');
		$helper->shopLinkType = '';
		$helper->table = 'initiative';
		$helper->identifier = 'id_initiative';
		$helper->actions = array('edit', 'view');
		$helper->show_toolbar = false;

		return $helper->generateList($initiative_list, $initiative_fields_display);
		}
		return "No related initiatives ".$project->id;
	}
*/

}


