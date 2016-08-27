<?php
class OpenPositionsListControllerCore extends FrontController
{
	public $php_self = 'open-positions-list';

	
	public function setMedia()
	{
		parent::setMedia();

		$this->addjqueryPlugin('metadata');
		$this->addjqueryPlugin('tablesorter');
	}
	
	public function initContent()
	{
		parent::initContent();

		$this->context->smarty->assign(array(
			'base_url' => $protocol_content.Tools::getHttpHost().__PS_BASE_URI__,
		));
		$this->setTemplate(_PS_THEME_DIR_.'open-positions-list.tpl');
	}
}

