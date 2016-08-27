<?php
class AdminFundingProgramsControllerCore extends AdminController
{
	protected $funding_agencies_array = array();

	public function __construct()
	{
		$this->table = 'funding_program';
		$this->className = 'FundingProgram';
		$this->lang = true;
		//$this->addRowAction('view');
		$this->addRowAction('edit');
		$this->addRowAction('delete');
		$this->allow_export = true;
	 	$this->bulk_actions = array('delete' => array('text' => $this->l('Delete selected'), 'confirm' => $this->l('Delete selected items?')));
		$this->multishop_context = Shop::CONTEXT_ALL;

		$this->context = Context::getContext();

		$funding_agencies = FundingAgency::getFundingAgencies($this->context->language->id);
		if (!$funding_agencies)
			$this->errors[] = Tools::displayError('No funding agency');
		else
			{
			foreach ($funding_agencies as $funding_agency)
				$this->funding_agencies_array[$funding_agency['name']] = $funding_agency['name'];	
			}
	
		$this->fields_list = array(
			'id_funding_program' => array(
				'title' => $this->l('ID'),
				'width' => 25
			),
			'funding_program_name' => array(
				'title' => $this->l('Name'),
				'width' => 'auto',
				'filter_key' => 'b!name'
			),	
			
			'funding_agency' => array(
				'title' => $this->l('Funding Agency'),
				'type'  => 'select',
				'list' => $this->funding_agencies_array,
				'filter_key' => 'fal!name',
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
	 	$this->_select = 'b.name as funding_program_name, fal.`name` AS funding_agency';
		$this->_join = 'LEFT JOIN `'._DB_PREFIX_.'funding_agency` fa ON a.`id_funding_agency` = fa.`id_funding_agency`
		LEFT JOIN `'._DB_PREFIX_.'funding_agency_lang` fal ON (fal.`id_funding_agency` = fa.`id_funding_agency` AND fal.`id_lang` = '.(int)$this->context->language->id.')';
		$this->_orderBy="funding_program_name";
	 	return parent::renderList();
	}

	public function renderForm()
	{
		if (!($funding_program = $this->loadObject(true)))
			return;

		$funding_agencies = FundingAgency::getFundingAgencies($this->context->language->id);
        
		$this->fields_form = array(
			'legend' => array(
				'title' => $this->l('Funding Programs'),
				'image' => '../img/admin/tab-payment.gif'
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

				
		return parent::renderForm();
	}

}


