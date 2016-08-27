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
	
	public function canonicalRedirection($canonicalURL = '')
	{
	}
	
	public function initContent()
	{ 
		parent::initContent();

		$open_positions = OpenPosition::getOpenPositions($this->context->language->id, Context::getContext()->shop->id);
		$past_open_positions = OpenPosition::getOpenPositions($this->context->language->id, Context::getContext()->shop->id, true);


		$this->context->smarty->assign(array(
			'id' => Context::getContext()->shop->id,
			'title' => 'Open Positions',
			'open_positions' => $open_positions,
			'past_open_positions' => $past_open_positions,
			'base_url' => __PS_BASE_URI__,
		));

		$this->setTemplate(_PS_THEME_DIR_.'open-positions-list.tpl');
	}			
}		