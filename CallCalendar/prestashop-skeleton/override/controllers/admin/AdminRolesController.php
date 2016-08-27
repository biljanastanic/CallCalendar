<?php
class AdminRolesControllerCore extends AdminController
{
	public function __construct()
	{
		$this->context = Context::getContext();
		$this->table = 'role';
		$this->className = 'Role';
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
			'id_role' => array(
						'title' => $this->l('ID'), 
						'align' => 'center', 
						'width' => 25
						),
			'name' => array('title' => $this->l('Name'))
			);
			
		$this->identifier = 'id_role';

		// $this->fields_form = array(
			// 'legend' => array(
				// 'title' => $this->l('Initiative Type'),
				// 'image' => '../img/admin/table.gif'
			// ),
			// 'input' => array(
				// array(
					// 'type' => 'text',
					// 'label' => $this->l('Name:'),
					// 'name' => 'name',
					// 'size' => 33,
					// 'required' => true,
					// 'lang' => true,
				// )
			// ),
			// 'submit' => array(
				// 'title' => $this->l('Save   '),
				// 'class' => 'button'
			// )
		// );

		$list_role = array();
		foreach (Role::getRoles($this->context->language->id) as $role)
			$list_role[] = array('value' => $role['id_role'], 'name' => $role['name']);

		parent::__construct();
	}

	public function setMedia()
	{
		parent::setMedia();
		$this->addJqueryPlugin('fancybox');
		$this->addJqueryUi('ui.sortable');
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
	
	public function renderForm()
	{
		if (!($role = $this->loadObject(true)))
			return;

		$this->fields_form = array(
			'legend' => array(
				'title' => $this->l('Roles'),
				'image' => '../img/admin/table.gif'
			),
			'submit' => array(
				'title' => $this->l('   Save   '),
				'class' => 'button'
			),
			'input' => array(
				array(
					'type' => 'text',
					'label' => $this->l('Name:'),
					'name' => 'name',
					'size' => 32,
					'required' => true,
					'lang' => true,
					'hint' => $this->l('Invalid characters:').' <>;=#{}',
					'desc' => $this->l('Staff role in initiatives or projects')
				)	
			)
		);

		return parent::renderForm();
	}
}


