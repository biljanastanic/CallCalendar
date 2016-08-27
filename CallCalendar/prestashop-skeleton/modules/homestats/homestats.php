<?php

if (!defined('_PS_VERSION_'))
	exit;

class HomeStats extends Module
{
	public function __construct()
	{
		$this->name = 'homestats';
		$this->tab = 'front_office_features';
		$this->version = '1.0';
		$this->author = 'PrestaShop';
		$this->need_instance = 0;

		parent::__construct();

		$this->displayName = $this->l('Homepage statistics');
		$this->description = $this->l('Homepage statistics.');
		$path = dirname(__FILE__);
		if (strpos(__FILE__, 'Module.php') !== false)
			$path .= '/../modules/'.$this->name;
		include_once $path.'/HomeStatsClass.php';
	}

	public function install()
	{
		if (!parent::install() || !$this->registerHook('displayHome') || !$this->registerHook('displayHeader'))
			return false;
	}

	public function hookDisplayHome($params)
	{
		$id_shop = (int)$this->context->shop->id;
		$homestats = HomeStatsClass::getByIdShop($id_shop);

    	$this->smarty->assign(array(
				'homestats' => $homestats
			));
		return $this->display(__FILE__, 'homestats.tpl');
	}

	public function hookDisplayHeader()
	{
		$this->context->controller->addCSS(($this->_path).'homestats.css', 'all');
	}
}
