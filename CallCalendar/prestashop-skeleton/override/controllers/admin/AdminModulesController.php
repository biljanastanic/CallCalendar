<?php

class AdminModulesController extends AdminModulesControllerCore
{
	public function __construct()
	{
		$this->multishop_context = Shop::CONTEXT_SHOP;
		parent::__construct();
	}
}

