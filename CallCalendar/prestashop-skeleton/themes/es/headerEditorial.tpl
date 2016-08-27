<!DOCTYPE html>
<html lang="{$lang_iso}">
	<head>
		<title>IDT - ES</title>
{if isset($meta_description) AND $meta_description}
		<meta name="description" content="{$meta_description|escape:html:'UTF-8'}" />
{/if}
{if isset($meta_keywords) AND $meta_keywords}
		<meta name="keywords" content="{$meta_keywords|escape:html:'UTF-8'}" />
{/if}
		<meta http-equiv="X-UA-Compatible" content="IE=8" />
		<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
		<meta http-equiv="content-language" content="{$meta_language}" />
		<meta name="generator" content="PrestaShop" />
		<meta name="robots" content="{if isset($nobots)}no{/if}index,{if isset($nofollow) && $nofollow}no{/if}follow" />
		<link rel="icon" type="image/vnd.microsoft.icon" href="{$favicon_url}?{$img_update_time}" />
		<link rel="shortcut icon" type="image/x-icon" href="{$favicon_url}?{$img_update_time}" />
		
		<script type="text/javascript">
			var baseDir = '{$content_dir}';
			var baseUri = '{$base_uri}';
			var static_token = '{$static_token}';
			var token = '{$token}';
			var priceDisplayPrecision = {$priceDisplayPrecision*$currency->decimals};
			var priceDisplayMethod = {$priceDisplay};
			var roundMode = {$roundMode};
		</script>
{if isset($css_files)}
	{foreach from=$css_files key=css_uri item=media}
	<link href="{$css_uri}" rel="stylesheet" type="text/css" media="{$media}" />
	{/foreach}
{/if}
{if isset($js_files)}
	{foreach from=$js_files item=js_uri}
	<script type="text/javascript" src="{$js_uri}"></script>
	{/foreach}
{/if}
		{$HOOK_HEADER}
	</head>
	
	<body {if isset($page_name)}id="{$page_name|escape:'htmlall':'UTF-8'}"{/if} class="{if $hide_left_column}hide-left-column{/if} {if $hide_right_column}hide-right-column{/if}">
	{if !$content_only}
		{if isset($restricted_country_mode) && $restricted_country_mode}
		<div id="restricted-country">
			<p>{l s='You cannot place a new order from your country.'} <span class="bold">{$geolocation_country}</span></p>
		</div>
		{/if}
		<div id="page" class="container_9 clearfix">

			<!-- Header -->
			<div id="header" class="grid_9 alpha omega">
				<div>
					<a id="header_logo" href="http://www.mdh.se" title="Mälardalen University">
						<img class="logo" src="{$img_dir}logo.png" />
					</a>
				</div>
				<div style="margin-left:576px;margin-top:35px">
					<a id="menu_logo" href="{$base_dir}" title="{$shop_name|escape:'htmlall':'UTF-8'}">
						<img class="logo" src="{$img_dir}profile-logo.png" style="" />
					</a>
				</div>
				<div id="header-links">
					<span class="block link">
						<a class="standardLink" href="http://www.mdh.se">MDH</a>
					</span>
					<div class="blockItemSeparator blockItemSeparatorIndex0">
						<span class="blockItemSeparatorInner"> | </span>
					</div>
					<span class="block link">
						<a class="standardLink" href="http://www.mdh.se/idt">IDT</a>
					</span>
					<div class="blockItemSeparator blockItemSeparatorIndex0">
						<span class="blockItemSeparatorInner"> | </span>
					</div>
					<span class="block link">
						<span class="selected">ES</span>
					</span>
					<div class="blockItemSeparator blockItemSeparatorIndex0">
						<span class="blockItemSeparatorInner"> | </span>
					</div>
					<span class="block link">
						<a class="standardLink" href="http://www.ipr.mdh.se/">IPR</a>
					</span>
					<div class="blockItemSeparator blockItemSeparatorIndex0">
						<span class="blockItemSeparatorInner"> | </span>
					</div>
					<span class="block link">
						<a class="standardLink" href="/prestashop-skeleton/back-office">Internal IDT</a>
					</span>
				</div>
				<div class="block search">
					<div class="searchWrapper">
				<script>
				  (function() {
					var cx = '013528101041874485034:wnjvbls9tbu';
					var gcse = document.createElement('script');
					gcse.type = 'text/javascript';
					gcse.async = true;
					gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
						'//www.google.com/cse/cse.js?cx=' + cx;
					var s = document.getElementsByTagName('script')[0];
					s.parentNode.insertBefore(gcse, s);
				  })();
				</script>
				<gcse:search></gcse:search>
					</div>
				</div>

				<div id="header_right" class="grid_6 omega">
					{$HOOK_TOP}
				</div>
			</div>

			<div id="columns" class="grid_9 alpha omega clearfix">
				<!-- Left -->
				<div id="left_column" class="column grid_2 alpha">
					{$HOOK_LEFT_COLUMN}
				</div>

				<!-- Center -->
				<div id="center_column" class=" grid_5">
	{/if}
