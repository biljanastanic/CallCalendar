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

{foreach from=$cmakfwusAlternates item=cmakfwusAlternate}
		<link rel="alternate" type="application/rss+xml" title="{$cmakfwusAlternate.title|escape:html:'UTF-8'}" href="{$cmakfwusAlternate.url}" />
{foreachelse}
{/foreach}
