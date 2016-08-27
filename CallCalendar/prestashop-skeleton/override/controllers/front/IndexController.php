<?php

class IndexController extends IndexControllerCore
{
	public $php_self = 'index';

		public function setMedia()
	{
		parent::setMedia();

		$this->addJS(_PS_JS_DIR_.'chart/jquery.jqplot.min.js');
		$this->addJS(_PS_JS_DIR_.'chart/excanvas.min.js');
		$this->addJS(_PS_JS_DIR_.'chart/jqplot.cursor.min.js');
		$this->addJS(_PS_JS_DIR_.'chart/jqplot.dateAxisRenderer.min.js');
		$this->addJS(_PS_JS_DIR_.'chart/jqplot.highlighter.min.js');
		$this->addJS(_PS_JS_DIR_.'chart/jqplot.categoryAxisRenderer.min.js');
		$this->addJS(_PS_JS_DIR_.'chart/jqplot.barRenderer.min.js');
		$this->addJS(_PS_JS_DIR_.'chart/jqplot.pointLabels.min.js');
		$this->addCSS(_PS_CSS_DIR_.'jquery.jqplot.min.css', 'all'); 
	}
	
	public function initContent()
	{
		parent::initContent();

	}
}

