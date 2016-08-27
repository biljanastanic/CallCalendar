<?php
class AdminProjectTypesControllerCore extends AdminController
{
	public function __construct()
	{
		$this->context = Context::getContext();
		$this->table = 'project_type';
		$this->className = 'ProjectType';
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
			'id_project_type' => array(
						'title' => $this->l('ID'), 
						'align' => 'center', 
						'width' => 25
						),
			'name' => array('title' => $this->l('Name'))
			);
			
		$this->identifier = 'id_project_type';

		$this->fields_form = array(
			'legend' => array(
				'title' => $this->l('Project Types'),
				'image' => '../img/admin/table.gif'
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

		$list_project_type = array();
		foreach (ProjectType::getProjectTypes($this->context->language->id) as $project_type)
			$list_project_type[] = array('value' => $project_type['id_project_type'], 'name' => $project_type['name']);

		parent::__construct();
	}

}


