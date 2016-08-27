<?php
class SearchIdtControllerCore extends FrontController
{
	public $php_self = 'search-idt';

	public function initContent()
	{
		parent::initContent();

		$this->context->smarty->assign(array(
			'title' => 'Search'
		));

		$this->setTemplate(_PS_THEME_DIR_.'search-idt.tpl');
	}
}

