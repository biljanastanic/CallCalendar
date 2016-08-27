<?php
class AdminApplicationAttachmentsControllerCore extends AdminController
{
		
	protected $applications_array = array();
	protected $attachments_array = array();

	public function __construct()
	{
		$this->table = 'application_attachment';
		$this->className = 'ApplicationAttachment';
		$this->lang = false;
		$this->addRowAction('edit');
		$this->addRowAction('delete');
	 	$this->bulk_actions = array('delete' => array('text' => $this->l('Delete selected'), 'confirm' => $this->l('Delete selected items?')));
		$this->multishop_context = Shop::CONTEXT_ALL;

		$this->context = Context::getContext();

		$applications = Application::getApplications($this->context->language->id);
		
		if (!$applications)
			$this->errors[] = Tools::displayError('No applications');
		else
			{
			foreach ($applications as $application){
				$this->applications_array[$application['name']] = $application['name'];
				$attachments = ApplicationAttachment::getAttachments($this->context->language->id,$application['id_application'],false);
				
				foreach ($attachments as $attachment){
				
				$this->attachments_array [$attachment['name']] = $attachment['name'];
				}

				}

			}
	
		$this->fields_list = array(
			'name' => array(
				'title' => $this->l('Attachment'),
				'type'  => 'select',
				'list' => $this->attachments_array,
				'filter_key' => 'al!name',
				'width' => 'auto'
			),
			'application_name' => array(
				'title' => $this->l('Application'),
				'type'  => 'select',
				'list' => $this->applications_array,
				'filter_key' => 'apl!name',
				'width' => 'auto'
			),
			'date_of_upload' => array(
				'title' => $this->l('Date of upload'),
				'type'  => 'date',
				'filter_key' => 'aa!date_of_upload',
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
	 	$this->_select = 'al.`name`, apl.`name` AS application_name';
		$this->_join = 'LEFT JOIN `'._DB_PREFIX_.'application` ap ON a.`id_application` = ap.`id_application`
		LEFT JOIN `'._DB_PREFIX_.'application_lang` apl ON (apl.`id_application` = ap.`id_application` AND apl.`id_lang` = '.(int)$this->context->language->id.')
		LEFT JOIN `'._DB_PREFIX_.'attachment_lang` al ON (al.`id_attachment` = a.`id_attachment` AND al.`id_lang` = '.(int)$this->context->language->id.')'; //TODO add funding agency
		//$this->_orderBy="name";
	 	return parent::renderList();
	}

	public function renderForm()
	{
		if (!($deadline = $this->loadObject(true)))
			return;
		
		$applications = Application::getApplications($this->context->language->id);

		$attachments = ApplicationAttachment::getAttachments($this->context->language->id,'id_application',false);
		
		
		$this->fields_form = array(
			'legend' => array(
				'title' => $this->l('Application Attachment'),
				'image' => '../img/admin/date.png'
			),
			
			'input' => array(			
				array(
					'type' => 'select',
					'label' => $this->l('Application:'),
					'name' => 'id_application',
					'required' => true,
					'options' => array(
						'query' => $applications,
						'id' => 'id_application',
						'name' => 'name',
						'default' => array(
							'value' => '',
							'label' => $this->l('-- Choose --')
						)
					)
				),
				
				array(
					'type' => 'select',
					'label' => $this->l('Attachment:'),
					'name' => 'id_attachment',
					'required' => true,
					'options' => array(
						'query' => $attachments,
						'id' => 'id_attachment',
						'name' => 'name',
						'default' => array(
							'value' => '',
							'label' => $this->l('-- Choose --')
						)
					)
				),
				array(
					'type' => 'textarea',
					'label' => $this->l('Description:'),
					'name' => 'description',
					'autoload_rte' => true,
					'cols' => 100,
					'rows' => 10,
					'class' => 'rte',
					'required' => true,
					'hint' => $this->l('Invalid characters:').' <>;=#{}'
				),
				array(
					'type' => 'date',
					'label' => $this->l('Date of upload:'),
					//'label' => getdate(),
					'name' => 'date_of_upload',
					'size' => 20,
					'required' => true
				),
				
				
			)
		);

		$this->fields_value['date_of_upload'] = date("Y-m-d");
		
		$this->fields_form['submit'] = array(
			'title' => $this->l('   Save   '),
			'class' => 'button'
		);

				
		return parent::renderForm();
	}
	


}


