<?php
/*
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
*/
include(dirname(__FILE__).'/../../config/config.inc.php');
require_once(dirname(__FILE__).'/../../init.php');

//$id_lang = (int)($cookie->id_lang);

// ( any parameter ? ( parameter ok ? ( feed exists ? send the feed : send feeds list ) : (any feed exists ? send feeds list : send a default one ) : (any feed exists ? send feeds list : send a default one ) )
if ( isset($_SERVER['QUERY_STRING']) && is_numeric($_SERVER['QUERY_STRING']) && feedExist($_SERVER['QUERY_STRING']) )
{
	$id = $_SERVER['QUERY_STRING'];
	$cog = Db::getInstance()->ExecuteS('SELECT `rssoption_lang` AS id_lang, `rssoption_nmax` AS nmax, `rssoption_currencyid` AS id_currency, `rssoption_disprice` AS bprice, `text` AS feedtitle 
						FROM '._DB_PREFIX_.'cmakfollowus c
						LEFT JOIN '._DB_PREFIX_.'cmakfollowus_lang l  ON ( c.id_cmakfollowus = l.id_cmakfollowus AND c.rssoption_lang = l.id_lang )
						WHERE c.id_cmakfollowus = \''.$id.'\'');
	$id_lang = $cog[0]['id_lang'];
	$id_currency = $cog[0]['id_currency'];
	// workaround with Product::getNewProducts. The method returns nMax products. I get nolimit by assuming 9999999 is infinite...
	$nMax = ( $cog[0]['nmax'] == 0 ? 9999999 : $cog[0]['nmax'] );
	$bPrice = ( $cog[0]['bprice'] == 1 ? true : false );
	$feedtitle = $cog[0]['feedtitle'];
	$products = Product::getNewProducts($id_lang, 0, $nMax, false, 'date_add', 'DESC');
	sendFeed($feedtitle, $products, $id_lang, $id_currency, $bPrice );
}
else
{
	if (anyFeedExists())
		sendFeedsList();
	else 
	{	// send a default feed with default parameters
		$id_lang = Configuration::get('PS_LANG_DEFAULT');
		$nMax = 9999999;
		$id_currency = Configuration::get('PS_CURRENCY_DEFAULT');
		$products = Product::getNewProducts($id_lang, 0, $nMax, false, 'date_add', 'DESC');
		sendFeed('New Products', $products, $id_lang, $id_currency, false );
	}
}



function anyFeedExists()
{
	$buffer = true;
	if (!$count = Db::getInstance()->ExecuteS('SELECT count(`id_cmakfollowus`) AS n FROM '._DB_PREFIX_.'cmakfollowus WHERE `rssoption_nmax` IS NOT NULL AND `rssoption_disprice` IS NOT NULL')) $buffer = false;
	return ($buffer && ($count[0]['n'] > 0));
}

function feedExist($id)
{
	$buffer = true;
	if (!$count = Db::getInstance()->ExecuteS('SELECT count(`id_cmakfollowus`) AS n FROM '._DB_PREFIX_.'cmakfollowus WHERE `id_cmakfollowus` = \''.$id.'\' AND `rssoption_nmax` IS NOT NULL AND `rssoption_disprice` IS NOT NULL')) $buffer = false;
	return ($buffer && ($count[0]['n'] == 1));
}

function sendFeedsList()
{
	$feeds = Db::getInstance()->ExecuteS('SELECT c . * , l.text AS title
						FROM `'._DB_PREFIX_.'cmakfollowus` c
						LEFT JOIN `'._DB_PREFIX_.'cmakfollowus_lang` l
							ON ( c.id_cmakfollowus = l.id_cmakfollowus AND c.rssoption_lang = l.id_lang )
						WHERE `rssoption_nmax` IS NOT NULL AND `rssoption_disprice` IS NOT NULL
						ORDER BY position ASC');
	$path = _PS_BASE_URL_.substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/')).'/';
	$defaultLanguage = (int)(Configuration::get('PS_LANG_DEFAULT'));
	$crlf = "\n";
	$tab = "\t";

	header("Content-Type:text/xml; charset=utf-8");
	echo '<?xml version="1.0" encoding="UTF-8"?>'.$crlf;
	echo '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">'.$crlf;
	echo $tab.'<channel>'.$crlf;
	echo $tab.'<atom:link href="'._PS_BASE_URL_.__PS_BASE_URI__.'" rel="self" type="application/rss+xml" />'.$crlf;
	echo '<title><![CDATA['.Configuration::get('PS_SHOP_NAME').']]></title>'.$crlf;
	echo '<description><![CDATA['.Configuration::get('PS_SHOP_NAME').']]></description>'.$crlf;
	echo '<link>'._PS_BASE_URL_.__PS_BASE_URI__.'</link>'.$crlf;
	echo '<language>'.Language::getIsoById($defaultLanguage).'</language>'.$crlf;
	echo '<image>'.$crlf;
	echo $tab.'<title><![CDATA['.Configuration::get('PS_SHOP_NAME').']]></title>'.$crlf;
	echo $tab.'<url>'._PS_BASE_URL_.__PS_BASE_URI__.'img/logo.jpg</url>'.$crlf;
	echo $tab.'<link>'._PS_BASE_URL_.__PS_BASE_URI__.'</link>'.$crlf;
	echo '</image>'.$crlf;
	foreach ($feeds as $feed)
	{
		$image = $path.'image/rss/'.$feed['image'].'_32.png';
		$feedLink = ( $feed['rssoption_agregator'] !='' ? $feed['rssoption_agregator'] : $path.'rss.php?'.$feed['id_cmakfollowus']);

		echo $tab.$tab.'<item>'.$crlf;
		echo $tab.$tab.$tab.'<title><![CDATA['.$feed['title'].' ]]></title>'.$crlf;
		echo $tab.$tab.$tab.'<description><![CDATA[<img src="'.$image.'" /></p>]]></description>'.$crlf;
		echo $tab.$tab.$tab.'<link><![CDATA['.$feedLink.']]></link>'.$crlf;
		echo $tab.$tab.$tab.'<guid><![CDATA['.$feedLink.']]></guid>'.$crlf;
		echo $tab.$tab.'</item>'.$crlf;
	}	
	echo '</channel>'.$crlf.'</rss>';
}


// Send feed to stdout ($bPrice = display price (or not)

function sendFeed($feedtitle, $products, $id_lang, $id_currency, $bPrice = false)
{
	global $link;
	//global $cookie;
	$currency = new Currency((int)($id_currency));
	$crlf = "\n";
	$tab = "\t";
	header("Content-Type:text/xml; charset=utf-8");
	echo '<?xml version="1.0" encoding="UTF-8"?>'.$crlf;
	echo '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">'.$crlf;
	echo $tab.'<channel>'.$crlf;
	echo $tab.'<atom:link href="'._PS_BASE_URL_.__PS_BASE_URI__.'" rel="self" type="application/rss+xml" />'.$crlf;
	echo '<title><![CDATA['.Configuration::get('PS_SHOP_NAME').']]></title>'.$crlf;
	echo '<description><![CDATA['.$feedtitle.']]></description>'.$crlf;
	echo '<link>'._PS_BASE_URL_.__PS_BASE_URI__.'</link>'.$crlf;
	echo '<language>'.Language::getIsoById($id_lang).'</language>'.$crlf;
	echo '<image>'.$crlf;
	echo $tab.'<title><![CDATA['.Configuration::get('PS_SHOP_NAME').']]></title>'.$crlf;
	echo $tab.'<url>'._PS_BASE_URL_.__PS_BASE_URI__.'img/logo.jpg</url>'.$crlf;
	echo $tab.'<link>'._PS_BASE_URL_.__PS_BASE_URI__.'</link>'.$crlf;
	echo '</image>'.$crlf;
	foreach ($products AS $product)
	{
		$image = Image::getImages((int)($id_lang), $product['id_product']);
		$strLink = htmlspecialchars($link->getproductLink($product['id_product'], $product['link_rewrite'], Category::getLinkRewrite((int)($product['id_category_default']), $id_lang)));
		if($bPrice) $strPrice = html_entity_decode(Tools::displayPrice(Product::getPriceStatic($product['id_product']), $currency).'<br>', ENT_COMPAT, 'UTF-8');
		echo $tab.$tab.'<item>'.$crlf;
		echo $tab.$tab.$tab.'<title><![CDATA['.$product['name'].' ]]></title>'.$crlf;
		echo $tab.$tab.$tab.'<description>'.$crlf;
		echo "<![CDATA[".($bPrice ? $strPrice : '');		
		if (is_array($image) && sizeof($image))
		{
			$imageObj = new Image($image[0]['id_image']);
			echo '<img src="'._PS_BASE_URL_._THEME_PROD_DIR_.$imageObj->getExistingImgPath().'-small.jpg" title="'.str_replace('&', '', $product['name']).'" alt="'.str_replace('&', '', $product['name']).'" />'.$crlf;
		}
		echo '<p>'.$product['description_short'].'</p>]]></description>'.$crlf;
		echo $tab.$tab.$tab.'<link><![CDATA['.$strLink.']]></link>'.$crlf;
		echo $tab.$tab.$tab.'<guid><![CDATA['.$strLink.']]></guid>'.$crlf;
		echo $tab.$tab.'</item>'.$crlf;
	}
	echo '</channel>'.$crlf.'</rss>';
}
?>

