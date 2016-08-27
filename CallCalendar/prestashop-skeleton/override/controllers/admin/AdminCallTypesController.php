<?php
class AdminCallTypesControllerCore extends AdminController
{
	public function __construct()
	{
		$this->context = Context::getContext();
		$this->table = 'call_type';
		$this->className = 'CallType';
		$this->multishop_context = Shop::CONTEXT_ALL;
		$this->lang = true;
		$this->addRowAction('edit');
		$this->addRowAction('delete');
		$this->addRowActionSkipList('delete', array(1));

		$this->bulk_actions = array(
			'delete' => array('text' => $this->l('Delete selected'), 
			'confirm' => $this->l('Delete selected items?'))
			);
	
		$this->fields_list = array(
			'id_call_type' => array(
						'title' => $this->l('ID'), 
						'align' => 'center', 
						'width' => 25
						),
			'name' => array('title' => $this->l('Name'))
			);
			
		$this->identifier = 'id_call_type';

		$this->fields_form = array(
			'legend' => array(
				'title' => $this->l('Call Types'),
				'image' => '../img/admin/date.png'
			),
			'input' => array(
				array(
					'type' => 'text',
					'label' => $this->l('Name:'),
					'name' => 'name',
					'size' => 33,
					'required' => true,
					'lang' => true,
				)
			),
			'submit' => array(
				'title' => $this->l('Save   '),
				'class' => 'button'
			)
		);

		$list_call_type = array();
		foreach (CallType::getCallTypes($this->context->language->id) as $call_type)
			$list_call_type[] = array('value' => $call_type['id_call_type'], 'name' => $call_type['name']);

		parent::__construct();
	}

}


