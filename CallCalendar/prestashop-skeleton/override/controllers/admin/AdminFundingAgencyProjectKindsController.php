<?php
class AdminFundingAgencyProjectKindsControllerCore extends AdminController
{

	protected $list_funding_agencies = array();
	
	public function __construct()
	{
		$this->context = Context::getContext();
		$this->table = 'funding_agency_project_kind';
		$this->className = 'FundingAgencyProjectKind';
		$this->lang = true;
		$this->allow_export = true;
		//$this->addRowAction('view');
		$this->addRowAction('edit');
		$this->addRowAction('delete');
	 	$this->bulk_actions = array('delete' => array('text' => $this->l('Delete selected'), 'confirm' => $this->l('Delete selected items?')));
		$this->multishop_context = Shop::CONTEXT_ALL;

	
		$funding_agencies=FundingAgency::getFundingAgencies($this->context->language->id);
		foreach ($funding_agencies as $funding_agency)
		$this->list_funding_agencies[$funding_agency['name']] = $funding_agency['name'];	

		$this->fields_list = array(
			'id_funding_agency_project_kind' => array(
				'title' => $this->l('ID'),
				'width' => 25
			),
			'funding_agency' => array(
				'title' => $this->l('Funding Agency'),
				'type'  => 'select',
				'list' => $this->list_funding_agencies,
				'filter_key' => 'fal!name',
				'width' => 'auto'
			),
			'name' => array(
				'title' => $this->l('Project Kind'),
				'width' => 'auto',
				'filter_key' => 'b!name'
			)
		);

			
		$this->identifier = 'id_funding_agency_project_kind';



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

		public function renderList()
	{
	 	$this->_select = 'a.id_funding_agency_project_kind,b.name, fal.name as funding_agency';
		$this->_join = 'LEFT JOIN `'._DB_PREFIX_.'funding_agency_lang` fal ON (fal.`id_funding_agency` = a.`id_funding_agency` AND fal.`id_lang` = '.(int)$this->context->language->id.')';
	 	return parent::renderList();
	}
	
	public function renderForm()
	{
		if (!($obj = $this->loadObject(true)))
			return;
		
		$funding_agencies = FundingAgency::getFundingAgencies($this->context->language->id);

		$this->fields_form = array(
			'tinymce' => true,			
			'legend' => array(
				'title' => $this->l('Funding Agency Project Kind'),
				'image' => '../img/admin/tab-payment.gif'
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
					'type' => 'select',
					'label' => $this->l('Funding Agency:'),
					'name' => 'id_funding_agency',
					'required' => true,
					'options' => array(
						'query' => $funding_agencies,
						'id' => 'id_funding_agency',
						'name' => 'name',
						'default' => array(
							'value' => '',
							'label' => $this->l('-- Choose --')
						)
					)
				)
			)
		);

		$this->fields_form['submit'] = array(
			'title' => $this->l('   Save   '),
			'class' => 'button'
		);
		
		return AdminController::renderForm();
	}
	
}



