<?php
class PersonControllerCore extends FrontController
{
	public $php_self = 'person';
 	protected $person;

	public function setMedia()
	{
		parent::setMedia();

		$this->addjqueryPlugin('metadata');
		$this->addjqueryPlugin('tablesorter');
	}

 	public function canonicalRedirection($canonicalURL = '')
	{
	}
	
	public function initContent()
	{
		parent::initContent();

		$id = Tools::getValue('id');
			
		$object = Customer::getCustomerById($id); //echo print_r($object);
		if($object['firstname']==null)
        {
            
            header('HTTP/1.1 404 Not Found');
			header('Status: 404 Not Found');
			Controller::getController('PageNotFoundController')->run();
            exit();
        }
        
		$this->context->smarty->assign(array(
			'person' => $object,
			'id' => Context::getContext()->shop->id,
            'projects' => Project::getProjects($this->context->language->id, null, null, $id),
			'base_url' => __PS_BASE_URI__,
			'img_url' =>_PS_IMG_
		));
			
		$this->setTemplate(_PS_THEME_DIR_.'person.tpl');
		
    
	}
}


