<?php

class Helper extends HelperCore
{
	public static function renderShopList()
	{
		if (!Shop::isFeatureActive() || Shop::getTotalShops(false, null) < 2)
			return null;

		$tree = Shop::getTree();
		$context = Context::getContext();

		// Get default value
		$shop_context = Shop::getContext();
		if ($shop_context == Shop::CONTEXT_ALL || ($context->controller->multishop_context_group == false && $shop_context == Shop::CONTEXT_GROUP))
			$value = '';
		else if ($shop_context == Shop::CONTEXT_GROUP)
			$value = 'g-'.Shop::getContextShopGroupID();
		else
			$value = 's-'.Shop::getContextShopID();

		// Generate HTML
		$url = $_SERVER['REQUEST_URI'].(($_SERVER['QUERY_STRING']) ? '&' : '?').'setShopContext=';
		$html = '<select class="shopList chosen" onchange="location.href = \''.$url.'\'+$(this).val();">';

		$html .= '<option value="" class="first">'.Translate::getAdminTranslation('All profiles').'</option>';
		foreach ($tree as $gID => $group_data)
		{
			if ((!isset($context->controller->multishop_context) || $context->controller->multishop_context & Shop::CONTEXT_GROUP))
				$html .= '<option class="group" value="g-'.$gID.'" '.(($value == 'g-'.$gID) ? 'selected="selected"' : '').' '.($context->controller->multishop_context_group == false ? 'disabled="disabled"' : '').'>'.Translate::getAdminTranslation('Group:').' '.htmlspecialchars($group_data['name']).'</option>';
			else
				$html .= '<optgroup class="group" label="'.Translate::getAdminTranslation('Group:').' '.htmlspecialchars($group_data['name']).'" '.($context->controller->multishop_context_group == false ? 'disabled="disabled"' : '').'>';

			if (!isset($context->controller->multishop_context) || $context->controller->multishop_context & Shop::CONTEXT_SHOP)
				foreach ($group_data['shops'] as $sID => $shopData)
					if ($shopData['active'])
						$html .= '<option value="s-'.$sID.'" class="shop" '.(($value == 's-'.$sID) ? 'selected="selected"' : '').'>&raquo; '.($context->controller->multishop_context_group == false ? htmlspecialchars($group_data['name']).' - ' : '').$shopData['name'].'</option>';

			if (!(!isset($context->controller->multishop_context) || $context->controller->multishop_context & Shop::CONTEXT_GROUP))
				$html .= '</optgroup>';
		}
		$html .= '</select>';

		return $html;
	}
}

