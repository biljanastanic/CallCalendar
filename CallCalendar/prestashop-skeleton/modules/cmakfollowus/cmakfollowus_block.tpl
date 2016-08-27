{*
*	-----------------------------------------------------------------------------
*	cmakFollowUS
*  - Create and customize RSS feeds of new products
*	 - Add feeds to meta alternate in html header
*	 - Create and customize links to social networks
*  - Display a customized block with feed and links to social networks
* 
*	Copyright (C) 2012 www.cmak.fr
*	You can freely use this script in your Web pages.
*	You may adapt this script for your own needs, provided these opening credit
*	lines are kept intact.

* Social Icon Pack  from komodomedia.com
* 
*	The cmakFollowUS script is distributed free
*	For updates, please visit:
*	http://www.cmak.fr/
* http://cmakfollowus.googlecode.com/
*
*	Questions & comments please send to cmak.fr (at) gmail.com
*	-----------------------------------------------------------------------------
*}
<div id="cmakfollowus_block" class="block">
	<h4>{$cmakfwustitle}</h4>
	{if $cmakfwuscaption == 1}<ul class="block_content">{elseif $cmakfwuscaption == 2}<div class="block_content"><p style="line-height:4px;">&nbsp;</p><p style="text-align:center;">{elseif $cmakfwuscaption == 3}<ul class="block_content bullet">{/if}
	{foreach from=$cmakfwuslinks item=cmakfwuslink}
	{if $cmakfwuscaption != 2}<li>{/if}
		{capture name="cmakfwusimgsrc"}{$cmakfwuspath}image/{if $cmakfwuslink.rssoption_lang != '' && $cmakfwuslink.rssoption_disprice != ''}rss/{/if}{$cmakfwuslink.image}_{if $cmakfwuscaption == 2}32{else}16{/if}.png{/capture}
		{if $cmakfwuslink.rssoption_lang != '' && $cmakfwuslink.rssoption_disprice != '' && $cmakfwuslink.rssoption_agregator != ''}
			{capture name="cmakfwusurl"}{$cmakfwuslink.rssoption_agregator}{/capture}
		{elseif $cmakfwuslink.rssoption_lang != '' && $cmakfwuslink.rssoption_disprice != '' && $cmakfwuslink.rssoption_agregator == ''}
			{capture name="cmakfwusurl"}{$cmakfwuspath}rss.php?{$cmakfwuslink.id}{/capture}
		{elseif $cmakfwuslink.rssoption_lang == '' && $cmakfwuslink.rssoption_disprice == '' && $cmakfwuslink.rssoption_agregator == ''}
			{capture name="cmakfwusurl"}{$cmakfwuslink.url}{/capture}
		{/if}
		
		{if $cmakfwuscaption != 3}<a href="{$smarty.capture.cmakfwusurl}"{if $cmakfwuslink.newwindow == 1} onclick="window.open(this.href);return false;"{/if}><img src="{$smarty.capture.cmakfwusimgsrc}" style="vertical-align:middle" alt="{$cmakfwuslink.$cmakfwustext}" title="{$cmakfwuslink.$cmakfwustext}" /></a> {/if}
		{if $cmakfwuscaption != 2}<a href="{$smarty.capture.cmakfwusurl}" title="{$cmakfwuslink.$cmakfwustext}"{if $cmakfwuslink.newwindow == 1} onclick="window.open(this.href);return false;"{/if}>{$cmakfwuslink.$cmakfwustext}</a>{/if}
	{if $cmakfwuscaption != 2}</li>{/if}
	{foreachelse}
		{if $cmakfwuscaption != 2}<li>{/if}{$cmakfwusnolink}{if $cmakfwuscaption != 2}</li>{/if}
	{/foreach}
	{if $cmakfwuscaption == 2}</p></div>{else}</ul>{/if}
</div>
