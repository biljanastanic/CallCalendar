<?php
class AdminFundingAgenciesControllerCore extends AdminController
{

		
	public function __construct()
	{
		$this->context = Context::getContext();
		$this->table = 'funding_agency';
		$this->className = 'FundingAgency';
		$this->lang = true;
		$this->allow_export = true;
		//$this->addRowAction('view');
		$this->addRowAction('edit');
		$this->addRowAction('delete');
	 	$this->bulk_actions = array('delete' => array('text' => $this->l('Delete selected'), 'confirm' => $this->l('Delete selected items?')));
		$this->multishop_context = Shop::CONTEXT_ALL;

		$this->fieldImageSettings = array(
 			'name' => 'image',
 			'dir' => 'funding-agencies'
 		);

		$this->fields_list = array(
			'id_funding_agency' => array(
				'title' => $this->l('ID'),
				'width' => 25
			),
			'name' => array(
				'title' => $this->l('Name'),
				'width' => 'auto'
			),	
			'acronym' => array(
				'title' => $this->l('Acronym'),
				'width' => '25'
			),	
			'url' => array(
				'title' => $this->l('Url'),
				'width' => 'auto'
			)
		);

			
		$this->identifier = 'id_funding_agency';


		$list_funding_agencies = array();
		foreach (FundingAgency::getFundingAgencies($this->context->language->id) as $funding_agency)
			$list_funding_agencies[] = array('value' => $funding_agency['id_funding_agency'], 'name' => $funding_agency['name']);

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

	public function renderForm()
	{
		if (!($obj = $this->loadObject(true)))
			return;

		$this->fields_form = array(
			'tinymce' => true,			
			'legend' => array(
				'title' => $this->l('Funding Agency'),
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
					'type' => 'text',
					'label' => $this->l('Acronym:'),
					'name' => 'acronym',
					'size' => 16,
					'required' => true,
					'lang' => true,
					'hint' => $this->l('Invalid characters:').' <>;=#{}'
				),
				array(
					'type' => 'funding_agency_logo_file',
					'label' => $this->l('Logotype:'),
					'name' => 'image',
					'display_image' => true,
					'required' => false,
					'desc' => $this->l('Upload logo from your computer')
				),
				array(
					'type' => 'text',
					'label' => $this->l('URL:'),
					'name' => 'url',
					'size' => 64,
					'required' => false,
					'hint' => "Url should start with http:// or https:// (e.g. http://www.mdh.se or http://mdh.se)."
				)			
			)
		);

		$this->fields_form['submit'] = array(
			'title' => $this->l('   Save   '),
			'class' => 'button'
		);

		$image = ImageManager::thumbnail(_PS_FUNDING_AGENCIES_IMG_DIR_.'/'.$obj->id.'.jpg', $this->table.'_'.(int)$obj->id.'.'.$this->imageType, 150, $this->imageType, true);

		$this->fields_value = array(
			'image' => $image ? $image : false,
			'size' => $image ? filesize(_PS_FUNDING_AGENCIES_IMG_DIR_.'/'.$obj->id.'.jpg') / 1000 : false
		);
		
		return AdminController::renderForm();
	}
	
	public function postProcess()
	{
		if (Tools::isSubmit('forcedeleteImage'))
		{
			$this->processForceDeleteImage();
			Tools::redirectAdmin(self::$currentIndex.'&token='.Tools::getAdminTokenLite('AdminFundingAgencies').'&conf=7');
		}
	
		return AdminController::postProcess();
	}
	
	public function processForceDeleteImage()
	{
		$funding_agency = $this->loadObject();
		if (Validate::isLoadedObject($funding_agency))
			$funding_agency->deleteImage(true);
	}
}



