<?php
class AdminApplicationStatusesControllerCore extends AdminController
{
	public function __construct()
	{
		$this->context = Context::getContext();
		$this->table = 'application_status';
		$this->className = 'ApplicationStatus';
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
			'id_application_status' => array(
						'title' => $this->l('ID'), 
						'align' => 'center', 
						'width' => 25
						),
			'name' => array('title' => $this->l('Name'))
			);
			
		$this->identifier = 'id_application_status';

		$this->fields_form = array(
			'legend' => array(
				'title' => $this->l('Application Status'),
				'image' => '../img/admin/note.png'
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

		$list_application_status = array();
		foreach (ApplicationStatus::getApplicationStatuses($this->context->language->id) as $application_status)
			$list_application_status[] = array('value' => $application_status['id_application_status'], 'name' => $application_status['name']);

		parent::__construct();
	}

}


