<?php
class AdminNewsAndEventsScopesControllerCore extends AdminController
{
	public function __construct()
	{
		$this->context = Context::getContext();
		$this->table = 'news_and_events_scope';
		$this->className = 'NewsAndEventsScope';
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
			'id_news_and_events_scope' => array(
						'title' => $this->l('ID'), 
						'align' => 'center', 
						'width' => 25
						),
			'name' => array('title' => $this->l('Name'))
			);
			
		$this->identifier = 'id_news_and_events_scope';

		$this->fields_form = array(
			'legend' => array(
				'title' => $this->l('News and events scopes'),
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

		parent::__construct();
	}

}


