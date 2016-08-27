<?php

class AdminCustomersController extends AdminCustomersControllerCore
{
	protected $positions_array = array();
	protected $profiles_array = array();
	protected $delete_mode;

	protected $_defaultOrderBy = 'date_add';
	protected $_defaultOrderWay = 'DESC';
	protected $can_add_customer = true;

	public function __construct()
	{
		$this->required_database = true;
		$this->required_fields = array('newsletter','optin');
		$this->table = 'customer';
		$this->className = 'Customer';
		$this->lang = false;
		$this->deleted = true;
		$this->multishop_context = Shop::CONTEXT_ALL;
		$this->addRowAction('edit');
		//$this->addRowAction('view');
		$this->addRowAction('delete');
		$this->bulk_actions = array('delete' => array('text' => $this->l('Delete selected'), 'confirm' => $this->l('Delete selected items?')));

		$this->context = Context::getContext();
		
		$this->fieldImageSettings = array(
 			'name' => 'image',
 			'dir' => 'staff'
 		);

		$this->default_form_language = $this->context->language->id;
						
		$this->fields_list = array(
			'id_customer' => array(
				'title' => $this->l('ID'),
				'align' => 'center',
				'width' => 20
			),
			'lastname' => array(
				'title' => $this->l('Last Name'),
				'width' => 'auto'
			),
			'firstname' => array(
				'title' => $this->l('First name'),
				'width' => 'auto'
			),
            'organisation' => array(
				'title' => $this->l('Organisation'),
				'width' => 150,
				'align' => 'right'
			)
		);

		$this->shopLinkType = 'shop';
		$this->shopShareDatas = Shop::SHARE_CUSTOMER;

		AdminController::__construct();
}
	
			public function setMedia()
		{
			parent::setMedia();
			$this->addJqueryUI('ui.slider');
			$this->addJqueryUI('ui.datepicker');
		
        if ($this->display == 'edit' || $this->display == 'add' || $this->display == 'list')
		{
			$this->addjQueryPlugin(array('autocomplete','timepicker'));
			$this->addJS(array(_PS_JS_DIR_.'admin-supervision_2.js'));
			
		}
		}
		
	public function renderList()
	{
	 		
						
		if (Tools::isSubmit('submitBulkdelete'.$this->table) || Tools::isSubmit('delete'.$this->table))
		$this->tpl_list_vars = array(
			'delete_customer' => true,
			'REQUEST_URI' => $_SERVER['REQUEST_URI'],
			'POST' => $_POST
		);
		
		return AdminController::renderList();

	}
	
	public function initContent()
	{
		if ($this->action == 'select_delete')
			$this->context->smarty->assign(array(
				'delete_form' => true,
				'url_delete' => htmlentities($_SERVER['REQUEST_URI']),
				'boxes' => $this->boxes,
			));

		if (!$this->can_add_customer && !$this->display)
			$this->informations[] = $this->l('You have to select a profile if you want to create a customer');

		AdminController::initContent();
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

		
		$roles = Role::getRoles($this->context->language->id);
		$projects = Project::getProjects($this->context->language->id);
		
		$groups = Group::getGroups($this->default_form_language, true);
		$this->fields_form = array(
			'tinymce' => true,			
			'legend' => array(
				'title' => $this->l('People'),
				'image' => '../img/admin/tab-customers.gif'
			),
			'input' => array(
				array(
					'type' => 'text',
					'label' => $this->l('First name:'),
					'name' => 'firstname',
					'size' => 33,
					'required' => true,
					'hint' => $this->l('Forbidden characters:').' 0-9!<>,;?=+()@#"?{}_$%:'
				),
				array(
					'type' => 'text',
					'label' => $this->l('Last name:'),
					'name' => 'lastname',
					'size' => 33,
					'required' => true,
					'hint' => $this->l('Invalid characters:').' 0-9!<>,;?=+()@#"?{}_$%:'
				),
				array(
					'type' => 'photo_file',
					'label' => $this->l('Photo:'),
					'name' => 'image',
					'display_image' => true,
					'required' => false,
					'desc' => $this->l('Upload your photo from your computer. <a href="#">asdf</a>'),
				),
				array(
					'type' => 'text',
					'label' => $this->l('E-mail address:'),
					'name' => 'email',
					'size' => 33,
					'required' => true
				),
				array(
					'type' => 'text',
					'label' => $this->l('Signature:'),
					'name' => 'username',
					'size' => 100,
					'required' => false
				),
				array(
					'type' => 'text',
					'label' => $this->l('Phone:'),
					'name' => 'phone',
					'size' => 33,
					'required' => false,
				),
				array(
					'type' => 'text',
					'label' => $this->l('Phone (alt):'),
					'name' => 'phone_alt',
					'size' => 33,
					'required' => false,
				),
				array(
					'type' => 'text',
					'label' => $this->l('Room:'),
					'name' => 'room',
					'size' => 33,
					'required' => false,
				),
				array(
					'type' => 'textarea',
					'label' => $this->l('Postal address:'),
					'name' => 'address_postal',
					'cols' => 100,
					'rows' => 4,
					'required' => false,
				),	
				array(
					'type' => 'textarea',
					'label' => $this->l('Visiting address:'),
					'name' => 'address_visiting',
					'cols' => 100,
					'rows' => 4,
					'required' => false,
				),	
				array(
					'type' => 'textarea',
					'label' => $this->l('Home address:'),
					'name' => 'address_home',
					'cols' => 100,
					'rows' => 4,
					'required' => false,
				),					
				array(
					'type' => 'text',
					'label' => $this->l('MDH URL:'),
					'name' => 'url',
					'size' => 100,
					'required' => false,
					'hint' => "Url should start with http:// or https:// (e.g. http://www.mdh.se or http://mdh.se)."
				),
				array(
					'type' => 'text',
					'label' => $this->l('Private URL:'),
					'name' => 'url_private',
					'size' => 100,
					'required' => false,
					'hint' => "Url should start with http:// or https:// (e.g. http://www.mdh.se or http://mdh.se)."

				),
				array(
					'type' => 'text',
					'label' => $this->l('LinkedIn URL:'),
					'name' => 'url_linkedin',
					'size' => 100,
					'required' => false,
					'hint' => "Url should start with http:// or https:// (e.g. http://www.mdh.se or http://mdh.se)."

				),
				array(
					'type' => 'text',
					'label' => $this->l('Google Scholar URL:'),
					'name' => 'url_scholar',
					'size' => 100,
					'required' => false,
					'hint' => "Url should start with http:// or https:// (e.g. http://www.mdh.se or http://mdh.se)."

				),
				array(
					'type' => 'text',
					'label' => $this->l('ORCID ID:'),
					'name' => 'orcid',
					'size' => 20,
					'required' => false,
					'desc' => "ORCID ID is a 16 digit number obtained from orcid.org. Input format: <b>0000-0002-7382-8437</b>"
				),
				array(
					'type' => 'text',
					'label' => $this->l('MDH-ID:'),
					'name' => 'mdh_id',
					'size' => 20,
					'required' => false,
					'desc' => "MDH-ID is based on letters of your first and last name and is in format <b>abc01</b>"
				),				
				array(
					'type' => 'textarea',
					'label' => $this->l('Research'),
					'name' => 'research',
					'autoload_rte' => true,
					'lang' => true,
					'rows' => 5,
					'cols' => 40
				),				
				array(
					'type' => 'textarea',
					'label' => $this->l('Biography'),
					'name' => 'biography',
					'autoload_rte' => true,
					'lang' => true,
					'rows' => 5,
					'cols' => 40
				),				
				array(
					'type' => 'radio',
					'label' => $this->l('On leave:'),
					'name' => 'away',
					'required' => false,
					'class' => 't',
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'active_on',
							'value' => 1,
							'label' => $this->l('Enabled')
						),
						array(
							'id' => 'active_off',
							'value' => 0,
							'label' => $this->l('Disabled')
						)
					)
				),
				array(
					'type' => 'radio',
					'label' => $this->l('External:'),
					'name' => 'external',
					'required' => false,
					'class' => 't',
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'active_on',
							'value' => 1,
							'label' => $this->l('Enabled')
						),
						array(
							'id' => 'active_off',
							'value' => 0,
							'label' => $this->l('Disabled')
						)
					)
				),
				array(
					'type' => 'radio',
					'label' => $this->l('Status:'),
					'name' => 'active',
					'required' => false,
					'class' => 't',
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'active_on',
							'value' => 1,
							'label' => $this->l('Enabled')
						),
						array(
							'id' => 'active_off',
							'value' => 0,
							'label' => $this->l('Disabled')
						)
					),
					'desc' => $this->l('Active or quitted')
				),	
				array(
					'type' => 'text',
					'label' => $this->l('Home organisation:'),
					'name' => 'organisation',
					'size' => 33,
					'required' => false,
				),
				array(
					'type' => 'radio',
					'label' => $this->l('Subscription:'),
					'name' => 'subscription',
					'required' => false,
					'class' => 't',
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'active_on',
							'value' => 1,
							'label' => $this->l('Enabled')
						),
						array(
							'id' => 'active_off',
							'value' => 0,
							'label' => $this->l('Disabled')
						)
					),
					'desc' => $this->l('Subscription to notifications about new calls:')
				),	
				array(
					'type' => 'textarea',
					'label' => $this->l('Keywords:'),
					'name' => 'keywords',
					'lang' => true,
					'desc' => 'Split keywords with comma ( , )',
					'required' => false,
					'lang' => true,
					'cols' => 100,
					'rows' => 10,
					'class' => 'rte'
				)				
			)
		);

		$this->fields_form['submit'] = array(
			'title' => $this->l('   Save   '),
			'class' => 'button'
		);

		$image = ImageManager::thumbnail(_PS_STAFF_IMG_DIR_.'/'.$obj->id.'.jpg', $this->table.'_'.(int)$obj->id.'.'.$this->imageType, 150, $this->imageType, false);

		$this->fields_value = array(
			'image' => $image ? $image : false,
			'size' => $image ? filesize(_PS_STAFF_IMG_DIR_.'/'.$obj->id.'.jpg') / 1000 : false
		);

		foreach ($this->_languages as $language)
		{
			$this->fields_value['research_'.$language['id_lang']] = htmlentities(stripslashes($this->getFieldValue(
				$obj,
				'research',
				$language['id_lang']
			)), ENT_COMPAT, 'UTF-8');
			
			$this->fields_value['biography_'.$language['id_lang']] = htmlentities(stripslashes($this->getFieldValue(
				$obj,
				'biography',
				$language['id_lang']
			)), ENT_COMPAT, 'UTF-8');
			$this->fields_value['keywords_'.$language['id_lang']] = htmlentities(stripslashes($this->getFieldValue(
				$obj,
				'keywords',
				$language['id_lang']
			)), ENT_COMPAT, 'UTF-8');
		}

	
		
		return AdminController::renderForm();
	}

	public function postProcess()
	{
		if (Tools::isSubmit('forcedeleteImage'))
		{
			$this->processForceDeleteImage();
			Tools::redirectAdmin(self::$currentIndex.'&token='.Tools::getAdminTokenLite('AdminCustomers').'&conf=7');
		}
	
		
		return AdminController::postProcess();
	}
	
	public function processForceDeleteImage()
	{
		$customer = $this->loadObject();
		if (Validate::isLoadedObject($customer))
			$customer->deleteImage(true);
	}
	
	protected function postImage($id)
	{
		$ret = parent::postImage($id);
		if (($id_customer = (int)Tools::getValue('id_customer')) &&
			isset($_FILES) && count($_FILES) && $_FILES['image']['name'] != null &&
			file_exists(_PS_STAFF_IMG_DIR_.$id_customer.'.jpg'))
		{
			$images_types = ImageType::getImagesTypes('staff');
			foreach ($images_types as $k => $image_type)
			{
				ImageManager::resize(
					_PS_STAFF_IMG_DIR_.$id_customer.'.jpg',
					_PS_STAFF_IMG_DIR_.$id_customer.'-'.stripslashes($image_type['name']).'.jpg',
					(int)$image_type['width'], (int)$image_type['height']
				);
			}
		}

		return $ret;
	}
	
	public function beforeAdd($customer)
	{
		$customer->id_shop = $this->context->shop->id;
	}

	public function processDelete()
	{
		if ($this->delete_mode == 'real')
		{
			$this->deleted = false;
			Discount::deleteByIdCustomer((int)Tools::getValue('id_customer'));
		}
		elseif ($this->delete_mode == 'deleted')
			$this->deleted = true;
		else
		{
			$this->errors[] = Tools::displayError('Unknown delete mode:').' '.$this->deleted;
			return;
		}

		parent::processDelete();
	}

	public function processAdd()
	{
		if (Tools::getValue('submitFormAjax'))
			$this->redirect_after = false;
		// Check that the new email is not already in use
		$customer_email = strval(Tools::getValue('email'));
		$customer = new Customer();
		if (Validate::isEmail($customer_email))
			$customer->getByEmail($customer_email);
		if ($customer->id)
		{
			$this->errors[] = Tools::displayError('An account already exists for this e-mail address:').' '.$customer_email;
			$this->display = 'edit';
			return $customer;
		}
		elseif ($customer = parent::processAdd())
		{
			$this->context->smarty->assign('new_customer', $customer);
			return $customer;
		}
		return false;
	}

	public function processUpdate()
	{
		if (Validate::isLoadedObject($this->object))
		{
			$customer_email = strval(Tools::getValue('email'));

			// check if e-mail already used
			if ($customer_email != $this->object->email)
			{
				$customer = new Customer();
				$customer->getByEmail($customer_email);
				if ($customer->id)
					$this->errors[] = Tools::displayError('An account already exists for this e-mail address:').' '.$customer_email;
			}

			return parent::processUpdate();
		}
		else
			$this->errors[] = Tools::displayError('An error occurred while loading object.').'
				<b>'.$this->table.'</b> '.Tools::displayError('(cannot load object)');
	}

	public function processSave()
	{
		// Check the requires fields which are settings in the BO
		$customer = new Customer();
		$this->errors = array_merge($this->errors, $customer->validateFieldsRequiredDatabase());

		return AdminController::processSave();
	}

	protected function afterDelete($object, $old_id)
	{
		$customer = new Customer($old_id);
		$addresses = $customer->getAddresses($this->default_form_language);
		foreach ($addresses as $k => $v)
		{
			$address = new Address($v['id_address']);
			$address->id_customer = $object->id;
			$address->save();
		}
		return true;
	}
}

