<?php
class ResearchGroupControllerCore extends FrontController
{
	public $php_self = 'calls-list';

	
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
		$this->setTemplate(_PS_THEME_DIR_.'calls-list.tpl');
	}
}

