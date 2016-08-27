<?php

class AdminHomeController extends AdminHomeControllerCore
{
	public function initContent()
	{
		$smarty = $this->context->smarty;

		$this->warnDomainName();

		$protocol = Tools::usingSecureMode()?'https':'http';
		$smarty->assign('protocol', $protocol);
		$isoUser = $this->context->language->iso_code;
		$smarty->assign('isoUser', $isoUser);
		
		$tpl_vars['employee'] = $this->context->employee;
		$tpl_vars['customers_service'] = $this->getCustomersService();
		$tpl_vars['tips_optimization'] = $this->_displayOptimizationTips();

		$smarty->assign($tpl_vars);
	}
}

