<?php
class AdminDeadlinesControllerCore extends AdminController
{
		
	protected $calls_array = array();

	public function __construct()
	{
		$this->table = 'deadline';
		$this->className = 'Deadline';
		$this->lang = true;
		$this->allow_export = true;
		//$this->addRowAction('view');
		$this->addRowAction('edit');
		$this->addRowAction('delete');
	 	$this->bulk_actions = array('delete' => array('text' => $this->l('Delete selected'), 'confirm' => $this->l('Delete selected items?')));
		$this->multishop_context = Shop::CONTEXT_ALL;

		$this->context = Context::getContext();

		$calls = Call::getCalls($this->context->language->id);

		if (!$calls)
			$this->errors[] = Tools::displayError('No calls');
		else
			{
			foreach ($calls as $call)
				$this->calls_array[$call['title']] = $call['title'];
			
			}
	
		$this->fields_list = array(
			'id_deadline' => array(
				'title' => $this->l('ID'),
				'width' => 25
			),
			'name' => array(
				'title' => $this->l('Name'),
				'width' => 'auto',
				'filter_key' => 'b!name'
			),	
			'call_title' => array(
				'title' => $this->l('Call'),
				'type'  => 'select',
				'list' => $this->calls_array,
				'filter_key' => 'cl!title',
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
	 	$this->_select = 'b.name as name, cl.`title` AS call_title';
		$this->_join = 'LEFT JOIN `'._DB_PREFIX_.'call` c ON a.`id_call` = c.`id_call`
		LEFT JOIN `'._DB_PREFIX_.'call_lang` cl ON (cl.`id_call` = c.`id_call` AND cl.`id_lang` = '.(int)$this->context->language->id.')'; 
		$this->_orderBy="name";
	 	return parent::renderList();
	}

	public function renderForm()
	{
		if (!($deadline = $this->loadObject(true)))
			return;
		
		$calls = Call::getCalls($this->context->language->id);
		
		$this->fields_form = array(
			'legend' => array(
				'title' => $this->l('Deadlines'),
				'image' => '../img/admin/date.png'
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
					'type' => 'date',
					'label' => $this->l('Select deadline date:'),
					'name' => 'deadline',
					'size' => 20,
					'required' => true
				),	
				array(
					'type' => 'radio',
					'label' => $this->l('Type of deadline:'),
					'name' => 'type',
					'required' => true,
					'class' => 't',
					'is_bool' => false,
					'values' => array(
						array(
							'id' => 'active_on',
							'value' => 1,
							'label' => $this->l('Internal')
						),
						array(
							'id' => 'active_off',
							'value' => 0,
							'label' => $this->l('External')
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


