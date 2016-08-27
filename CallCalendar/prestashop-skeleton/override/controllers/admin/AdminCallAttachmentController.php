<?php
class AdminCallAttachmentControllerCore extends AdminController
{
		
	protected $calls_array = array();
	protected $attachments_array = array();

	public function __construct()
	{
		$this->table = 'call_attachment';
		$this->className = 'CallAttachment';
		$this->lang = false;
		//$this->addRowAction('view');
		$this->addRowAction('edit');
		$this->addRowAction('delete');
	 	$this->bulk_actions = array('delete' => array('text' => $this->l('Delete selected'), 'confirm' => $this->l('Delete selected items?')));
		$this->multishop_context = Shop::CONTEXT_ALL;

		$this->context = Context::getContext();

		$calls = Call::getCalls($this->context->language->id);
		
		//TODO add attachments to print of calls
		//$attachments = CallAttachment::getAttachments($this->context->language->id,)

		if (!$calls)
			$this->errors[] = Tools::displayError('No calls');
		else
			{
			foreach ($calls as $call){
				$this->calls_array[$call['title']] = $call['title'];
				$attachments = CallAttachment::getAttachments($this->context->language->id,$call['id_call'],false);

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
			'call_title' => array(
				'title' => $this->l('Call'),
				'type'  => 'select',
				'list' => $this->calls_array,
				'filter_key' => 'cl!title',
				'width' => 'auto'
			),
			'date_of_upload' => array(
				'title' => $this->l('Date of upload'),
				'type'  => 'date',
				'filter_key' => 'ca!date_of_upload',
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
	 	$this->_select = 'al.`name`, cl.`title` AS call_title';
		$this->_join = 'LEFT JOIN `'._DB_PREFIX_.'call` c ON a.`id_call` = c.`id_call`
		LEFT JOIN `'._DB_PREFIX_.'call_lang` cl ON (cl.`id_call` = c.`id_call` AND cl.`id_lang` = '.(int)$this->context->language->id.')
		LEFT JOIN `'._DB_PREFIX_.'attachment_lang` al ON (al.`id_attachment` = a.`id_attachment` AND al.`id_lang` = '.(int)$this->context->language->id.')'; //TODO add funding agency
		//$this->_orderBy="name";
	 	return parent::renderList();
	}

	public function renderForm()
	{
		if (!($deadline = $this->loadObject(true)))
			return;
		
		$calls = Call::getCalls($this->context->language->id);
		
		$attachments = CallAttachment::getAttachments($this->context->language->id,'id_call',false);
		
		$this->fields_form = array(
			'legend' => array(
				'title' => $this->l('Call Attachment'),
				'image' => '../img/admin/date.png'
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


