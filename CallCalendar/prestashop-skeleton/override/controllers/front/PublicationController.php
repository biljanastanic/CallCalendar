<?php
class PublicationControllerCore extends FrontController
{
	public $php_self = 'publication';
 	protected $publication;

	public function canonicalRedirection($canonicalURL = '')
	{
	}
	
	public function initContent()
	{
		parent::initContent();

		$id = Tools::getValue('id');
			
		$object = Publication::getPublicationById($id);
		
		if (file_exists(_PS_PUBLICATIONS_DIR_.(int)$id.'.pdf'))
			$fulltext = __PS_BASE_URI__.'pdf_publications/'.$id.'.pdf';
		else 
			$fulltext = 0;

		$publication_shops=Publication::getPublicationShop($id);
		$correctShop=false;
		foreach($publication_shops as $pshop)
		{
		if($pshop['id_shop']==Context::getContext()->shop->id)
		$correctShop=true;
		}
		
		if(!$correctShop and count($publication_shops)>0)
		{
			if($_SERVER[HTTP_HOST]=="www.es.mdh.se")
				$shop_address="www.ipr.mdh.se"; 
				else $shop_address="www.es.mdh.se";
			
			$new_location="http://$shop_address$_SERVER[REQUEST_URI]";
			header("HTTP/1.1 301 Moved Permanently"); 
			header('Location: '.$new_location);
				
		}
		else{
		$this->context->smarty->assign(array(
			'id' => Context::getContext()->shop->id,
			'fulltext' => $fulltext,
			'publication' => $object,
			'researchGroup'=>Publication::getPublicationRelatedInitiatives($id,'Research group'),
			'bibtex' => Publication::getBibtex($id),
			'base_url' => __PS_BASE_URI__,
		));

		$this->setTemplate(_PS_THEME_DIR_.'publication.tpl');
		}
	}
}




