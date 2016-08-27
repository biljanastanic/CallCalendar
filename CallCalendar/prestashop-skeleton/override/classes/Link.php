<?php

class Link extends LinkCore
{
	public function getCMSLink($cms, $alias = null, $ssl = false, $id_lang = null)
	{
		$base = (($ssl && $this->ssl_enable) ? _PS_BASE_URL_SSL_ : _PS_BASE_URL_);

		if (!$id_lang)
			$id_lang = Context::getContext()->language->id;
		$url = $base.__PS_BASE_URI__.$this->getLangLink($id_lang);

		if (!is_object($cms))
			$cms = new CMS($cms, $id_lang);

		// Set available keywords
		$params = array();
		$params['id'] = $cms->id;
		$params['rewrite'] = (!$alias) ? (is_array($cms->link_rewrite) ? $cms->link_rewrite[(int)$id_lang] : $cms->link_rewrite) : $alias;

		return $url.Dispatcher::getInstance()->createUrl('cms_rule', $id_lang, $params, $this->allow);
	}
		
	public function getResearchGroupLink($research_group, $alias = null, $id_lang = null)
	{
		if (!$id_lang)
			$id_lang = Context::getContext()->language->id;
		$url = _PS_BASE_URL_.__PS_BASE_URI__.$this->getLangLink($id_lang);

		if (!is_object($research_group))
			$research_group = new Initiative($initiative, $id_lang);

		// Set available keywords
		$params = array();
		$params['id'] = $research_group->id;
		$params['rewrite'] = 'sss';// (!$alias) ? $research_group->link_rewrite : $alias;

		return $url.Dispatcher::getInstance()->createUrl('manufacturer_rule', $id_lang, $params, $this->allow);
	}

	public function getLanguageLink($id_lang, Context $context = null)
	{
		if (!$context)
			$context = Context::getContext();

		$params = $_GET;
		unset($params['isolang'], $params['controller']);

		if (!$this->allow)
			$params['id_lang'] = $id_lang;
		else
			unset($params['id_lang']);

		$controller = Dispatcher::getInstance()->getController();
		if (!empty(Context::getContext()->controller->php_self))
			$controller = Context::getContext()->controller->php_self;

		if ($controller == 'product' && isset($params['id_product']))
			return $this->getProductLink((int)$params['id_product'], null, null, null, (int)$id_lang);
		elseif ($controller == 'category' && isset($params['id_category']))
			return $this->getCategoryLink((int)$params['id_category'], null, (int)$id_lang);
		elseif ($controller == 'supplier' && isset($params['id_supplier']))
			return $this->getSupplierLink((int)$params['id_supplier'], null, (int)$id_lang);
		elseif ($controller == 'manufacturer' && isset($params['id_manufacturer']))
			return $this->getManufacturerLink((int)$params['id_manufacturer'], null, (int)$id_lang);
		elseif ($controller == 'cms' && isset($params['id_cms']))
			return $this->getCMSLink((int)$params['id_cms'], null, false, (int)$id_lang);
		elseif ($controller == 'cms' && isset($params['id_cms_category']))
			return $this->getCMSCategoryLink((int)$params['id_cms_category'], null, (int)$id_lang);
		elseif ($controller == 'research-group' && isset($params['id_research_group']))
			return $this->getManufacturerLink((int)$params['id_research_group'], null, (int)$id_lang);

		return $this->getPageLink($controller, false, $id_lang, $params);
	}

}

