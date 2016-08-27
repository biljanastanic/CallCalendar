<?php
class PublicationsListControllerCore extends FrontController
{
	public $php_self = 'publications-list';

	public function initContent()
	{
		parent::initContent();

		$this->context->smarty->assign(array(
			'base_url' => $protocol_content.Tools::getHttpHost().__PS_BASE_URI__,
		));
		$this->setTemplate(_PS_THEME_DIR_.'publications-list.tpl');
	}
}

