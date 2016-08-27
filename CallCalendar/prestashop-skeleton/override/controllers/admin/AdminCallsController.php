<?php
class AdminCallsControllerCore extends AdminController
{
	/** @var array call_types list */		
	protected $call_types_array = array();
	protected $call_statuses_array = array();
	protected $funding_agenices_array = array();

	public function __construct()
	{
		$this->table = 'call';
		$this->className = 'Call';
		$this->lang = true;
		//$this->addRowAction('view');
		$this->addRowAction('edit');
		$this->addRowAction('delete');
		$this->allow_export = true;
	 	$this->bulk_actions = array('delete' => array('text' => $this->l('Delete selected'), 'confirm' => $this->l('Delete selected items?')));
		$this->multishop_context = Shop::CONTEXT_ALL;

		$this->context = Context::getContext();

		$call_types = CallType::getCallTypes($this->context->language->id);
		$call_statuses = CallStatus::getCallStatuses($this->context->language->id);
		$funding_agencies = FundingAgency::getFundingAgencies($this->context->language->id);

		if (!$call_types)
			$this->errors[] = Tools::displayError('No call type');
		else if(!$call_statuses)
			$this->errors[] = Tools::displayError('No call status');
		else if(!$funding_agencies)
			$this->errors[] = Tools::displayError('No funding agencies');
		else
			{
			foreach ($call_types as $call_type)
				$this->call_types_array[$call_type['name']] = $call_type['name'];
			
			foreach ($call_statuses as $call_status)
				$this->call_statuses_array[$call_status['name']] = $call_status['name'];

			foreach ($funding_agencies as $funding_agency)
				$this->funding_agenices_array[$funding_agency['name']] = $funding_agency['name'];
			
			}
	
		$this->fields_list = array(
			'id_call' => array(
				'title' => $this->l('ID'),
				'width' => 25
			),
			'title' => array(
				'title' => $this->l('Title'),
				'width' => 'auto',
				'filter_key' => 'b!title'
			),	
			'call_type' => array(
				'title' => $this->l('Type'),
				'type'  => 'select',
				'list' => $this->call_types_array,
				'filter_key' => 'ctl!name',
				'width' => 'auto'
			),
			'call_status' => array(
				'title' => $this->l('Status'),
				'type'  => 'select',
				'list' => $this->call_statuses_array,
				'filter_key' => 'csl!name',
				'width' => 'auto'
			),
			'funding_agency' => array(
				'title' => $this->l('Funding Agency'),
				'type'  => 'select',
				'list' => $this->funding_agenices_array,
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

			$this->addJS(array(_PS_JS_DIR_.'admin-calls.js'));

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
	 	$this->_select = 'b.title as call_title, ctl.`name` AS call_type, csl.`name` AS call_status, fal.`name` AS funding_agency';
		$this->_join = 'LEFT JOIN `'._DB_PREFIX_.'call_type` ct ON a.`id_call_type` = ct.`id_call_type`
		LEFT JOIN `'._DB_PREFIX_.'call_type_lang` ctl ON (ctl.`id_call_type` = ct.`id_call_type` AND ctl.`id_lang` = '.(int)$this->context->language->id.')
		LEFT JOIN `'._DB_PREFIX_.'call_status` cs ON a.`id_call_status` = cs.`id_call_status`
		LEFT JOIN `'._DB_PREFIX_.'call_status_lang` csl ON (csl.`id_call_status` = cs.`id_call_status` AND csl.`id_lang` = '.(int)$this->context->language->id.')
		LEFT JOIN `'._DB_PREFIX_.'funding_agency` fa ON a.`id_funding_agency` = fa.`id_funding_agency`
		LEFT JOIN `'._DB_PREFIX_.'funding_agency_lang` fal ON (fal.`id_funding_agency` = fa.`id_funding_agency` AND fal.`id_lang` = '.(int)$this->context->language->id.')'; //TO DO add funding agency
		$this->_orderBy="call_title";
	 	return parent::renderList();
	}

	public function renderForm()
	{
		if (!($call = $this->loadObject(true)))
			return;

		$call_types = CallType::getCallTypes($this->context->language->id);
		
		$call_statuses = CallStatus::getCallStatuses($this->context->language->id);
		
		$funding_agencies = FundingAgency::getFundingAgencies($this->context->language->id);

		$contacts = $call->getContacts();
		

		$this->fields_form = array(
			'legend' => array(
				'title' => $this->l('Calls'),
				'image' => '../img/admin/date.png'
			),
			'input' => array(
				array(
					'type' => 'text',
					'label' => $this->l('Title:'),
					'name' => 'title',
					'size' => 100,
					'required' => true,
					'lang' => true,
					'hint' => $this->l('Invalid characters:').' <>;=#{}',
				),
				array(
					'type' => 'textarea',
					'label' => $this->l('Description:'),
					'name' => 'description',
					'lang' => true,
					'autoload_rte' => true,
					'cols' => 100,
					'rows' => 10,
					'class' => 'rte',
					'required' => true,
					'hint' => $this->l('Invalid characters:').' <>;=#{}'
				),
				array(
					'type' => 'textarea',
					'label' => $this->l('Keywords:'),
					'name' => 'keywords',
					'lang' => true,
					'cols' => 100,
					'rows' => 10,
					'class' => 'rte',
					'required' => true,
					'desc' => 'Split keywords with comma ( , )',
					'hint' => $this->l('Invalid characters:').' <>;=#{}'
				),
				array(
					'type'=>'textarea',
					'label' => $this->l('Reqirements:'),
					'name'=>'requirements',
					'lang' => true,
					'autoload_rte' => true,
					'cols' => 100,
					'rows' => 10,
					'class' => 'rte',
					'required' => false,
					'hint' => $this->l('Invalid characters:').' <>;=#{}'
				),					
				array(
					'type' => 'select',
					'label' => $this->l('Call Type:'),
					'name' => 'id_call_type',
					'required' => true,
					'options' => array(
						'query' => $call_types,
						'id' => 'id_call_type',
						'name' => 'name',
						'default' => array(
							'value' => '',
							'label' => $this->l('-- Choose --')
						)
					)
				),
				array(
					'type' => 'select',
					'label' => $this->l('Call Status:'),
					'name' => 'id_call_status',
					'required' => true,
					'options' => array(
						'query' => $call_statuses,
						'id' => 'id_call_status',
						'name' => 'name',
						'default' => array(
							'value' => '',
							'label' => $this->l('-- Choose --')
						)
					)
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
				),
				array(
					'type' => 'date',
					'label' => $this->l('Select planned project start date:'),
					'name' => 'planed_project_start',
					'size' => 20,
					'required' => false
				),
				array(
					'type' => 'text',
					'label' => $this->l('Budget of the call:'),
					'name' => 'budget',
					'size' => 20,
					'required' => false,
					// 'desc'=>"Input the budget of the call as an integer value (not displayed on the web)"
				),
				array(
					'type' => 'text',
					'label' => $this->l('URL:'),
					'name' => 'url_to_call',
					'size' => 100,
					'required' => false,
					'hint' => "Url should start with http:// or https:// (e.g. http://www.mdh.se or http://mdh.se)."

				),	
				array(
					'type' => 'project_leaders',
					'label' => $this->l('Contact person(s):'),
					'project' => (int)Tools::getValue('id_call'),
					'values' => $contacts,
					'required' => false,
					'desc' => $this->l('Select contact person(s)')
				),	
				array(
					'type' => 'radio',
					'label' => $this->l('Repeating:'),
					'name' => 'repeating',
					'required' => false,
					'class' => 't',
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'active_on',
							'value' => 1,
							'label' => $this->l('True')
						),
						array(
							'id' => 'active_off',
							'value' => 0,
							'label' => $this->l('False')
						)
					)
				)
				
			)
		);

		foreach ($this->_languages as $language)
		{
			$this->fields_value['description_'.$language['id_lang']] = htmlentities(stripslashes($this->getFieldValue(
				$call,
				'description',
				$language['id_lang']
			)), ENT_COMPAT, 'UTF-8');

			$this->fields_value['keywords_'.$language['id_lang']] = htmlentities(stripslashes($this->getFieldValue(
				$call,
				'keywords',
				$language['id_lang']
			)), ENT_COMPAT, 'UTF-8');

			$this->fields_value['requirements_'.$language['id_lang']] = htmlentities(stripslashes($this->getFieldValue(
				$call,
				'requirements',
				$language['id_lang']
			)), ENT_COMPAT, 'UTF-8');
		}


		
		$this->fields_form['submit'] = array(
			'title' => $this->l('   Save   '),
			'class' => 'button'
		);

				
		return parent::renderForm();
	}

	/**
	 * 
	 * Overriding function for sending mail notifications when new call is created
	 * 
	 */
	public function processAdd()
	{
		parent::processAdd();

		include_once(_PS_SWIFT_DIR_.'Swift.php');
		include_once(_PS_SWIFT_DIR_.'Swift/Connection/SMTP.php');
		include_once(_PS_SWIFT_DIR_.'Swift/Connection/NativeMail.php');
		include_once(_PS_SWIFT_DIR_.'Swift/Plugin/Decorator.php');

		$callKeywords = array_diff( array_map('trim', explode ( ',' , Tools::getValue('keywords_'.$this->context->language->id))), array(''));

		$customers = Customer::getCustomers();
		foreach ($customers as $customer) {
			
			//if researcher is not subscribed for receiving notification, skip him
			if($customer["subscription"] == 0 || $customer["subscription"] == NULL) {
				continue;
			}

			$customerKeywords = array_diff( array_map('trim', explode ( ',' , strtolower($customer["keywords"]))), array(''));

			foreach ($callKeywords as $keyword) {
				if( in_array(strtolower($keyword), $customerKeywords)) {
					
					//send mail
					$researchersMail = $customer["email"];
					$callTitle = Tools::getValue('title_'.$this->context->language->id);
					//$url =
					$subject = 'New funding call available';
					$message = 'There is new funding call available and you may be intersted. Please visit http://www.es.mdh.se/calls and check out new call - '.$callTitle; 

					try{
						$result = Mail::sendMailTest("1", "smtp.gmail.com", $message, $subject, "text/html", $researchersMail, "do-not-reply@mdh.se", "testnotificationmailes@gmail.com", "es1234567", "465", "ssl");	
					} catch (Swift_ConnectionException $e)
					{
						$result = $e->getMessage();
					}
					catch (Swift_Message_MimeException $e)
					{
						$result = $e->getMessage();
					}

					//TODO do something with result, maybe log it somewhere
					
					
					break;
				}
			}


	}





}

}
