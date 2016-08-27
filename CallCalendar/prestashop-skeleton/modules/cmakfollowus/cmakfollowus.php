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

if (!defined('_PS_VERSION_'))
	exit;

class CmaKFollowUs extends Module
{
	/* @var boolean error */
	protected $error = false;
	public function __construct()
	{
		$this->name = 'cmakfollowus';
		$this->tab = 'front_office_features';
		$this->version = 1.1;
		$this->author = 'cmak.fr';
		$this->need_instance = 0;
		
		$this->_directory = dirname(__FILE__);
		parent::__construct();
		
		$this->displayName = $this->l('Follow us with rss and social networks');
		$this->description = $this->l('RSS feed from new products and social networks links');
	}
	
	public function install()
	{
		if (!parent::install() OR 
			!$this->registerHook('leftcolumn') OR
			!$this->registerHook('header') OR
			!Configuration::updateValue('CMAKFOLLOWUS_BLOCKTITLE', array('1' => 'Follow us', '2' => 'Pour nous suivre')) OR 
			!Configuration::updateValue('CMAKFOLLOWUS_CAPTION',1) OR
			!Db::getInstance()->Execute('
				CREATE TABLE '._DB_PREFIX_.'cmakfollowus (
				`id_cmakfollowus` int(4) NOT NULL AUTO_INCREMENT, 
				`image` varchar(255) NOT NULL,
				`url` varchar(255) NOT NULL,
				`newwindow` tinyint(1) NOT NULL DEFAULT 1,
				`position` int(4) NOT NULL,
				`rssoption_lang` int(2) NULL,
				`rssoption_nmax` int(7) NULL,
				`rssoption_disprice` int(1) NULL,
				`rssoption_currencyid` int(2) NULL,
				`rssoption_agregator` varchar(255) NULL,
				`rssoption_showinblock` int(1) NULL,
				`rssoption_showasalternate` int(1) NULL,
				PRIMARY KEY (`id_cmakfollowus`))
				ENGINE='._MYSQL_ENGINE_.' default CHARSET=utf8') OR
			!Db::getInstance()->Execute('
				CREATE TABLE '._DB_PREFIX_.'cmakfollowus_lang (
				`id_cmakfollowus` int(4) NOT NULL,
				`id_lang` int(2) NOT NULL,
				`text` varchar(64) NOT NULL,
				PRIMARY KEY(`id_cmakfollowus`, `id_lang`))
				ENGINE='._MYSQL_ENGINE_.' default CHARSET=utf8') OR
			!$this->_defaultrss()

		) return false;
		return true;
	}


	public function uninstall()
	{
		if (!parent::uninstall() OR
		!$this->unregisterHook('leftcolumn') OR
		!$this->unregisterHook('header') OR
		!Db::getInstance()->Execute('DROP TABLE '._DB_PREFIX_.'cmakfollowus') OR
		!Db::getInstance()->Execute('DROP TABLE '._DB_PREFIX_.'cmakfollowus_lang') OR
		!Configuration::deleteByName('CMAKFOLLOWUS_BLOCKTITLE') OR
		!Configuration::deleteByName('CMAKFOLLOWUS_CAPTION')) return false;
	}
	
	function hookLeftColumn($params)
	{
		global $smarty, $cookie;
		// remove 'not showed in block' rss links
		$temp_links = $this->getLinks();
		$links = array();
		foreach($temp_links as $link)
		{
			$isrss = ($link['rssoption_disprice']!='' && $link['rssoption_currencyid']!=''); // is this a rss link ?
			$showit = (($isrss && $link['rssoption_showinblock']==1 ) || !$isrss ); // rss link must be shown ?
			if ($showit) $links[] = $link;
		}
		unset($temp_links);
		// Get options & display links list
		$smarty->assign(array(
			'cmakfwustitle' => Configuration::get('CMAKFOLLOWUS_BLOCKTITLE', $cookie->id_lang),
			'cmakfwuscaption' => Configuration::get('CMAKFOLLOWUS_CAPTION'),
			'cmakfwuspath' => $this->_path,
			'cmakfwuslinks' => $links,
			'cmakfwustext' => 'text_'.$cookie->id_lang,
			'cmakfwusnolink' => $this->l('No link to display')
		));
		return $this->display(__FILE__, 'cmakfollowus_block.tpl');
	}

	public function hookRightColumn($params)
	{
		return $this->hookLeftColumn($params);
	}

	public function hookHeader($params)
	{
		global $smarty, $cookie;
		if (!$rssList = Db::getInstance()->ExecuteS('SELECT `id_cmakfollowus` AS id, `rssoption_agregator` AS agergator
								FROM '._DB_PREFIX_.'cmakfollowus
								WHERE `rssoption_lang` IS NOT NULL AND `rssoption_disprice` IS NOT NULL AND `rssoption_showasalternate`=\'1\'
								ORDER BY `position` ASC'))
			return false;
		$alternates = array();
		$i = 0;
		foreach ($rssList as $item)
			{
				$alternates[$i]['url'] = ($item['agergator'] == '' ? Tools::getShopDomain(true, true).$this->_path.'rss.php?'.$item['id'] : $item['agergator']);
				if(!$buff = Db::getInstance()->ExecuteS('SELECT `text` FROM '._DB_PREFIX_.'cmakfollowus_lang WHERE `id_cmakfollowus`=\''.$item['id'].'\' AND `id_lang`=\''.$cookie->id_lang.'\'')) return false;
				(count($buff) > 0 ? $alternates[$i]['title'] = $buff[0]['text'] : $alternates[$i]['title'] = Configuration::get('PS_SHOP_NAME') );
				$i++;
			}
		$smarty->assign(array('cmakfwusAlternates' => $alternates));
		return $this->display(__FILE__, 'cmakfollowus_header.tpl');
	}

	/* create and replace rss links with default ones */
	private function _defaultrss()
	{
		$img = 'rss0';
		$languages = Language::getIsoIds(true);
		$result_buffer = true;
		$currency = Currency::getCurrent();
		//delete feeds from tables
		if (!Db::getInstance()->Execute('DELETE '._DB_PREFIX_.'cmakfollowus cmak, '._DB_PREFIX_.'cmakfollowus_lang cmaklang
			FROM '._DB_PREFIX_.'cmakfollowus cmak
			LEFT JOIN '._DB_PREFIX_.'cmakfollowus_lang cmaklang ON ( cmak.id_cmakfollowus = cmaklang.id_cmakfollowus )
			WHERE cmak.rssoption_nmax IS NOT NULL AND cmak.rssoption_disprice IS NOT NULL')) $result_buffer = false;
		//insert lang feed with default parameters : one feed per language and currency and one text per language
		foreach ($languages AS $langfeed)
			{
				if (Db::getInstance()->Execute('INSERT INTO '._DB_PREFIX_.'cmakfollowus
									(`image`, `position`, `rssoption_lang`, `rssoption_nmax`, `rssoption_disprice`, `rssoption_currencyid`, `rssoption_showinblock`,  `rssoption_showasalternate`) 
								VALUES (\''.$img.'\', \'1\', \''.$langfeed['id_lang'].'\', \'0\', \'1\', \''.$currency->id.'\', \'1\', \'1\')')) 
				{
					$result_buffer =  true;
					$rssId = mysql_insert_id();
					foreach ($languages as $langtext)
						if (!Db::getInstance()->Execute('INSERT INTO '._DB_PREFIX_.'cmakfollowus_lang (`id_cmakfollowus`, `id_lang`, `text`) VALUES
										('.$rssId.', '.$langtext['id_lang'].', \'New Products('.$langfeed['iso_code'].')\')')) $result_buffer =  false;
				}
			}
		if(!$this->_cleanPositions()) $result_buffer = false;
		return $result_buffer;
	}	

	private function _moveUp($id)
	{
		if ($mypos = Db::getInstance()->ExecuteS('SELECT `position` FROM '._DB_PREFIX_.'cmakfollowus WHERE `id_cmakfollowus` = \''.$id.'\''))
		{
			$mypos = $mypos[0]['position'];
			if ($prec = Db::getInstance()->ExecuteS('SELECT `id_cmakfollowus` AS `id`, `position` FROM '._DB_PREFIX_.'cmakfollowus WHERE `position` = (	SELECT MAX(`position`) 	FROM ps_cmakfollowus WHERE `position` < '.$mypos.')'))
			{
				$result = Db::getInstance()->Execute('UPDATE '._DB_PREFIX_.'cmakfollowus SET `position` = \''.$prec[0]['position'].'\' WHERE `id_cmakfollowus` = \''.$id.'\'');
				$result = ($result && Db::getInstance()->Execute('UPDATE '._DB_PREFIX_.'cmakfollowus SET `position` = \''.$mypos.'\' WHERE `id_cmakfollowus` = \''.$prec[0]['id'].'\''));
				$result = ($result && $this->_cleanPositions());
			}
			else $result = false;
		}
		else return false;
		return $result;
	}

	private function _moveDown($id)
	{
		if ($mypos = Db::getInstance()->ExecuteS('SELECT `position` FROM '._DB_PREFIX_.'cmakfollowus WHERE `id_cmakfollowus` = \''.$id.'\''))
		{
			$mypos = $mypos[0]['position'];
			if ($next = Db::getInstance()->ExecuteS('SELECT `id_cmakfollowus` AS `id`, `position` FROM '._DB_PREFIX_.'cmakfollowus WHERE `position` = ( SELECT MIN(`position`) FROM ps_cmakfollowus WHERE `position` > '.$mypos.')'))
			{
				$result = Db::getInstance()->Execute('UPDATE '._DB_PREFIX_.'cmakfollowus SET `position` = \''.$next[0]['position'].'\' WHERE `id_cmakfollowus` = \''.$id.'\'');
				$result = ($result && Db::getInstance()->Execute('UPDATE '._DB_PREFIX_.'cmakfollowus SET `position` = \''.$mypos.'\' WHERE `id_cmakfollowus` = \''.$next[0]['id'].'\''));
				$result = ($result && $this->_cleanPositions());
			}
			else $result = false;
		}
		else return false;
		return $result;
	}

	private function _cleanPositions()
	{
		$result_buffer = true;
		if(!$linkList = Db::getInstance()->ExecuteS('SELECT id_cmakfollowus AS id FROM '._DB_PREFIX_.'cmakfollowus ORDER BY position ASC')) $result_buffer = false;
		if ($result_buffer)
			{
				$pos = 1;
				foreach ($linkList as $linkItem)
				{
					Db::getInstance()->Execute('UPDATE '._DB_PREFIX_.'cmakfollowus SET position=\''.$pos.'\' WHERE id_cmakfollowus=\''.$linkItem['id'].'\'');
					$pos++;
				}
			}
		return $result_buffer;
	}


	public function updateCog()
	{
		$languages = Language::getLanguages();
		$result = array();
		foreach ($languages as $language)
			$result[$language['id_lang']] = $_POST['blockTitle_'.$language['id_lang']];
		if (!Configuration::updateValue('CMAKFOLLOWUS_BLOCKTITLE', $result))
			return false;
		return Configuration::updateValue('CMAKFOLLOWUS_CAPTION', $_POST['caption']);
	}

	public function rssAdd()
	{
		if(!$position = Db::getInstance()->ExecuteS('SELECT MAX(`position`) AS `position` FROM '._DB_PREFIX_.'cmakfollowus')) return false;
		$position = $position[0]['position'] + 1;
		//$agregator = (isset($_POST['rssUseAgregator']) AND isset($_POST['rssAgregator']) AND $_POST['rssUseAgregator'] == 'on' ? '\''.pSQL($_POST['rssAgregator']).'\'' : 'NULL' );
		if ( isset($_POST['rssUseAgregator']) AND isset($_POST['rssAgregator']) AND $_POST['rssUseAgregator'] == 'on' )
			$agregator =  '\''.pSQL($_POST['rssAgregator']).'\'';
		else
			$agregator = 'NULL';
		if(!Db::getInstance()->Execute('INSERT INTO '._DB_PREFIX_.'cmakfollowus 
							(`image`, `newwindow`, `position`, `rssoption_lang`, `rssoption_nmax`, `rssoption_disprice`, `rssoption_showinblock`, `rssoption_showasalternate`, `rssoption_currencyid`, `rssoption_agregator`) 
						VALUES	(\''.pSQL($_POST['rssImage']).'\',
							\''.(isset($_POST['rssNewWindow']) AND $_POST['rssNewWindow'] == 'on' ? 1 : 0).'\',
							\''.$position.'\', \''.$_POST['rssLang'].'\', \''.(isset($_POST['rssnMax']) ? $_POST['rssnMax'] : 0).'\',
							\''.(isset($_POST['rssDisPrice']) AND $_POST['rssDisPrice'] == 'on' ? 1 : 0).'\',
							\''.(isset($_POST['rssShowInBlock']) AND $_POST['rssShowInBlock'] == 'on' ? 1 : 0).'\',
							\''.(isset($_POST['rssShowAsAlternate']) AND $_POST['rssShowAsAlternate'] == 'on' ? 1 : 0).'\',
							\''.$_POST['rssCurrencyId'].'\', 
							'.$agregator.' )') OR !$lastId = mysql_insert_id())
			return false;
		$languages = Language::getLanguages();
		$defaultLanguage = (int)(Configuration::get('PS_LANG_DEFAULT'));
		if (!$languages)
			return false;
		foreach ($languages as $language)
			if (!empty($_POST['rssTitle_'.$language['id_lang']]))
			{
				if (!Db::getInstance()->Execute('INSERT INTO '._DB_PREFIX_.'cmakfollowus_lang (`id_cmakfollowus`, `id_lang`, `text`) VALUES ('.(int)($lastId).', '.(int)($language['id_lang']).', \''.pSQL($_POST['rssTitle_'.$language['id_lang']]).'\')'))
					return false;
			}
			else
				if (!Db::getInstance()->Execute('INSERT INTO '._DB_PREFIX_.'cmakfollowus_lang  (`id_cmakfollowus`, `id_lang`, `text`) VALUES ('.(int)($lastId).', '.(int)($language['id_lang']).', \''.pSQL($_POST['rssTitle_'.$defaultLanguage]).'\')'))
					return false;
		$this->_cleanPositions();
		return true;
	}

	public function rssUpdate()
	{
		if ( isset($_POST['rssUseAgregator']) AND isset($_POST['rssAgregator']) )
			$agregator =  '\''.pSQL($_POST['rssAgregator']).'\'';
		else
			$agregator = 'NULL';
		if(!Db::getInstance()->Execute('UPDATE '._DB_PREFIX_.'cmakfollowus SET
							`image` = \''.pSQL($_POST['rssImage']).'\',
							`newwindow` = \''.(isset($_POST['rssNewWindow']) ? 1 : 0).'\',
							`rssoption_lang` = \''.$_POST['rssLang'].'\',
							`rssoption_nmax` = \''.(isset($_POST['rssnMax']) ? $_POST['rssnMax'] : 0).'\',
							`rssoption_disprice` = \''.(isset($_POST['rssDisPrice']) ? 1 : 0).'\',
							`rssoption_showinblock` = \''.(isset($_POST['rssShowInBlock']) ? 1 : 0).'\',
							`rssoption_showasalternate` = \''.(isset($_POST['rssShowAsAlternate']) ? 1 : 0).'\',
							`rssoption_currencyid` = \''.$_POST['rssCurrencyId'].'\', 
							`rssoption_agregator` = '.$agregator.'
						WHERE `id_cmakfollowus` = \''.$_POST['rssId'].'\'') )

			return false;
		$languages = Language::getLanguages();
		$defaultLanguage = (int)(Configuration::get('PS_LANG_DEFAULT'));
		if (!$languages)
			 return false;
		if (!Db::getInstance()->Execute('DELETE FROM '._DB_PREFIX_.'cmakfollowus_lang WHERE `id_cmakfollowus` = '.(int)($_POST['rssId'])))
			return false ;
		foreach ($languages AS $language)
			if (!empty($_POST['rssTitle_'.$language['id_lang']]))
			{
				if (!Db::getInstance()->Execute('INSERT INTO '._DB_PREFIX_.'cmakfollowus_lang VALUES ('.(int)($_POST['rssId']).', '.(int)($language['id_lang']).', \''.pSQL($_POST['rssTitle_'.$language['id_lang']]).'\')'))
					return false;
			}
			else
				if (!Db::getInstance()->Execute('INSERT INTO '._DB_PREFIX_.'cmakfollowus_lang VALUES ('.(int)($_POST['rssId']).', '.(int)($language['id_lang']).', \''.pSQL($_POST['rssTitle_'.$defaultLanguage]).'\')'))
					return false;
		return true;
	}

	public function linkAdd()
	{
		if(!$position = Db::getInstance()->ExecuteS('SELECT MAX(`position`) AS `position` FROM '._DB_PREFIX_.'cmakfollowus')) return false;
		$position = $position[0]['position'] + 1;
		if (!Db::getInstance()->Execute('INSERT INTO '._DB_PREFIX_.'cmakfollowus (`position`, `image`, `url`, `newwindow`)
						VALUES (\''.$position.'\', \''.pSQL($_POST['linkImage']).'\', \''.pSQL($_POST['linkUrl']).'\', '.((isset($_POST['linkNewWindow']) AND $_POST['linkNewWindow']) == 'on' ? 1 : 0).')') OR !$lastId = mysql_insert_id())
			return false;
		$languages = Language::getLanguages();
		$defaultLanguage = (int)(Configuration::get('PS_LANG_DEFAULT'));
		if (!$languages)
			return false;
		foreach ($languages AS $language)
			if (!empty($_POST['linkTitle_'.$language['id_lang']]))
			{
				if (!Db::getInstance()->Execute('INSERT INTO '._DB_PREFIX_.'cmakfollowus_lang VALUES ('.(int)($lastId).', '.(int)($language['id_lang']).', \''.pSQL($_POST['linkTitle_'.$language['id_lang']]).'\')'))
					return false;
			}
			else
				if (!Db::getInstance()->Execute('INSERT INTO '._DB_PREFIX_.'cmakfollowus_lang VALUES ('.(int)($lastId).', '.(int)($language['id_lang']).', \''.pSQL($_POST['linkTitle_'.$defaultLanguage]).'\')'))
					return false;
		$this->_cleanPositions();
		return true;
	}

	public function linkUpdate()
	{
		if (!Db::getInstance()->Execute('UPDATE '._DB_PREFIX_.'cmakfollowus SET 
							`image` = \''.pSQL($_POST['linkImage']).'\', 
							`url`=\''.pSQL($_POST['linkUrl']).'\', 
							`newwindow`='.(isset($_POST['linkNewWindow']) ? 1 : 0).' 
						WHERE `id_cmakfollowus`='.(int)($_POST['linkId'])))
			return false;
		$languages = Language::getLanguages();
		$defaultLanguage = (int)(Configuration::get('PS_LANG_DEFAULT'));
		if (!$languages)
			 return false;
		if (!Db::getInstance()->Execute('DELETE FROM '._DB_PREFIX_.'cmakfollowus_lang WHERE `id_cmakfollowus` = '.(int)($_POST['linkId'])))
			return false ;
		foreach ($languages AS $language)
			if (!empty($_POST['linkTitle_'.$language['id_lang']]))
			{
				if (!Db::getInstance()->Execute('INSERT INTO '._DB_PREFIX_.'cmakfollowus_lang VALUES ('.(int)($_POST['linkId']).', '.(int)($language['id_lang']).', \''.pSQL($_POST['linkTitle_'.$language['id_lang']]).'\')'))
					return false;
			}
			else
				if (!Db::getInstance()->Execute('INSERT INTO '._DB_PREFIX_.'cmakfollowus_lang VALUES ('.(int)($_POST['linkId']).', '.(int)($language['id_lang']).', \''.pSQL($_POST['linkTitle_'.$defaultLanguage]).'\')'))
					return false;
		return true;
	}


	public function itemDelete($id)
	{
		if(!Db::getInstance()->Execute('DELETE '._DB_PREFIX_.'cmakfollowus c, '._DB_PREFIX_.'cmakfollowus_lang l
						FROM '._DB_PREFIX_.'cmakfollowus c
						LEFT JOIN '._DB_PREFIX_.'cmakfollowus_lang l ON ( c.id_cmakfollowus = l.id_cmakfollowus )
						WHERE c.id_cmakfollowus = \''.$id.'\'')

			) return false;
		$this->_cleanPositions();
		return true;
	}

	public function getLinks()
	{
		$result = array();
		if (!$links = Db::getInstance()->ExecuteS('SELECT `id_cmakfollowus` AS id, `image`, `url`, `newwindow`, `position`,
								`rssoption_nmax`, `rssoption_lang`, `rssoption_disprice`, `rssoption_currencyid`, `rssoption_agregator`, `rssoption_showinblock`, `rssoption_showasalternate`
								FROM '._DB_PREFIX_.'cmakfollowus ORDER BY `position` ASC'))
			return false;
		$i = 0;
		foreach ($links AS $link)
		{
			$result[$i]['id'] = $link['id'];
			$result[$i]['position'] = $link['position'];
			$result[$i]['url'] = $link['url'];
			$result[$i]['image'] = $link['image'];
			$result[$i]['newwindow'] = $link['newwindow'];
			$result[$i]['rssoption_nmax'] = $link['rssoption_nmax'];
			$result[$i]['rssoption_lang'] = $link['rssoption_lang'];
			$result[$i]['rssoption_disprice'] = $link['rssoption_disprice'];
			$result[$i]['rssoption_currencyid'] = $link['rssoption_currencyid'];
			$result[$i]['rssoption_agregator'] = $link['rssoption_agregator'];
			$result[$i]['rssoption_showinblock'] = $link['rssoption_showinblock'];
			$result[$i]['rssoption_showasalternate'] = $link['rssoption_showasalternate'];
			// multilingual text
			if (!$texts = Db::getInstance()->ExecuteS('SELECT `id_lang`, `text` FROM '._DB_PREFIX_.'cmakfollowus_lang WHERE `id_cmakfollowus`='.(int)($link['id'])))
				return false;
			foreach ($texts AS $text)
				$result[$i]['text_'.$text['id_lang']] = $text['text'];
			$i++;
		}
		return $result;
	}

	public function getImage($linkId, $size = 'small')
	{
		if (!$imgName = Db::getInstance()->ExecuteS('SELECT `image`, `rssoption_disprice`, `rssoption_agregator` FROM '._DB_PREFIX_.'cmakfollowus WHERE `id_cmakfollowus` = \''.$linkId.'\'')) return false;
		else 
		{
			if ($imgName[0]['rssoption_disprice']=='' && $imgName[0]['rssoption_agregator']=='') $subDir = ''; else $subDir = 'rss/';
			return $this->_path.'image/'.$subDir.$imgName[0]['image'].'_'.($size == 'small' ? '16' : '32').'.png';
		}
	}

	private function _isRss($id)
	{
		$hop = Db::getInstance()->ExecuteS('SELECT `rssoption_disprice`, `rssoption_currencyid` FROM '._DB_PREFIX_.'cmakfollowus WHERE `id_cmakfollowus` = \''.$id.'\'');
		if ($hop[0]['rssoption_disprice']=='' && $hop[0]['rssoption_currencyid']=='') return false; else return true;
	}

	private function _list()
	{
		$liste = $this->getLinks();
		global $currentIndex, $cookie, $adminObj;
		$languages = Language::getLanguages();
		if (!$liste) $this->_html .= $this->l('No link to display').'</br >'; 
		else
		{
			// store list of links in javascript array liste[id][] used to fill in the form when action is 'edit'
			$this->_html .= '
			<script type="text/javascript">
				var currentUrl = \''.$currentIndex.'&configure='.$this->name.'\';
				var token=\''.$adminObj->token.'\';
				var liste = new Array();';
			foreach ($liste as $link)
			{
				$this->_html .= '
					liste['.$link['id'].'] = new Array(
						\''.$link['position'].'\',
						\''.addslashes($link['url']).'\',
						\''.addslashes($link['image']).'\',
						\''.$link['newwindow'].'\',
						\''.$link['rssoption_nmax'].'\',
						\''.$link['rssoption_lang'].'\',
						\''.$link['rssoption_disprice'].'\',
						\''.$link['rssoption_currencyid'].'\',
						\''.addslashes($link['rssoption_agregator']).'\',
						\''.$link['rssoption_showinblock'].'\',
						\''.$link['rssoption_showasalternate'].'\'';

				foreach ($languages as $language)
					if (isset($link['text_'.$language['id_lang']]))
						$this->_html .= ', \''.addslashes($link['text_'.$language['id_lang']]).'\'';
					else
						$this->_html .= ', \'\'';
				$this->_html .= ');';
			}
			$this->_html .= '</script>
					';
			// display the links in html table
			$nLinks = Db::getInstance()->ExecuteS('SELECT count(id_cmakfollowus) as nLinks FROM '._DB_PREFIX_.'cmakfollowus');
			$nLinks = (int)$nLinks[0]['nLinks'];
			$i = 0;
			// javascript : go to edit / delete and move links
			$this->_html .= '<script type="text/javascript" src="'.$this->_path.'cmakfollowus.js"></script>';					
			$this->_html .= '<table class="table"><tr><th> </th><th>#</th><th>'.$this->l('Title').'</th><th>'.$this->l('Url').'</th><th>'.$this->l('Action').'</th></tr>';
			foreach ($liste as $link)
				{
					$this->_html .= '<tr>
					<td><img src="'.$this->getImage($link['id'], 'small').'" alt="" title="" /></td>
					<td>';
					if ($i > 0) $this->_html .= '<img src="'.$this->_path.'up.gif" alt="'.$this->l('Move up').'" title="'.$this->l('Move up').'" onClick="moveUp('.$link['id'].')" style="cursor: pointer"  />';
					if ($i > 0 && $i < ($nLinks - 1)) $this->_html .= '<br>';
					if ($i < ($nLinks - 1)) $this->_html .= '<img src="'.$this->_path.'down.gif" alt="'.$this->l('Move down').'" title="'.$this->l('Move down').'" onClick="moveDown('.$link['id'].')" style="cursor: pointer"  /></td>';
					$this->_html .= '<td>'.$link['text_'.$cookie->id_lang].'</td>
					<!--td>'.$link['url'].'</td-->
					<td>'.($link['rssoption_disprice'] != '' && $link['rssoption_nmax'] != '' 
							? '<a href="'.Tools::getShopDomain(true, true).$this->_path.'rss.php?'.$link['id'].'" title="'.$this->l('Local Feed URL').'" target="_new"><img src="'.$this->_path.'feed-local.png" title="'.$this->l('Local Feed URL').'"></a>'.(
								$link['rssoption_agregator'] != '' 
									? ' <a href="'.$link['rssoption_agregator'].'" title="'.$this->l('Agregator Feed URL').'" target="_new"><img src="'.$this->_path.'feed-agregator.png" title="'.$this->l('Agregator Feed URL').'"></a>
									<img src="'.$this->_path.'help.png" style="cursor: pointer" onClick="window.open(\''.$this->_path.'help/help_fr.html#agregator\');"> ' 
									: '' ) 
							: $link['url']
						).'</td>
					<td><img src="'.$this->_path.'edit.png" alt="'.$this->l('Edit').'" title="'.$this->l('Edit').'" style="cursor: pointer" onClick="'.($this->_isRss($link['id']) ? 'rss' : 'link').'Edit(\''.$link['id'].'\')" />
					    <img src="'.$this->_path.'delete.png" alt="'.$this->l('Delete').'" title="'.$this->l('Delete').'" style="cursor: pointer"
						onClick="'.($this->_isRss($link['id']) ? 'rss' : 'link').'Delete(\''.$link['id'].'\', \''.$this->l('Delete').' '.$link['text_'.$cookie->id_lang].' ?\')" /></td>
					</tr>';
					$i++;
				}
			$this->_html .= '</table>';
			$i = 0;
			$nb = count($languages);
			$idLng = 0;
			while($i < $nb)
			{
				if ($languages[$i]['id_lang'] == (int)Configuration::get('PS_LANG_DEFAULT'))
				{
					$idLng = $i;
				}
				$i++;
			}
			$this->_html .= '
			<input type="hidden" id="languageFirst" value="'.$languages[$idLng]['id_lang'].'" />
			<input type="hidden" id="languageNb" value="'.sizeof($languages).'" />';
		} //if ($liste)
	}

	/* List images located in image dir. Look for name_32.png files */
	private function _listImages($subdir='')
	{ 
		$i=0;
		$dir = $this->_directory.'/image/';
		if ($subdir !='') $dir .= $subdir.'/';
		$imagesTemp = array();
		$images = array();
		if($handle = opendir($dir))
		{
			while(false !== ($scan = readdir($handle)))
			{
				if(is_file($dir.$scan)) //item must be a file
				{
					// file must be png image (extension checked)
					$ext = strtolower(substr($scan, strrpos($scan, '.') + 1));
					if (($ext=="png") && substr($scan, strpos($scan, '_')+1, 2)=='32')
					{
						$imagesTemp[$i] = $scan;
						$i++;
					}
				}
			}
			sort($imagesTemp);
			$i=0;
			foreach ($imagesTemp as $item)
			{
				$images[$i]['src'] = $this->_path.'image/'.($subdir!=''?$subdir.'/':'').$item;
				$images[$i]['srcsmall'] = $this->_path.'image/'.($subdir!=''?$subdir.'/':'').str_replace('_32.', '_16.', $item);
				$images[$i]['name'] = substr($item, 0, strrpos($item, '_'));
				$i++;
			}
		}
		if ($i > 0 ) return $images; else return false;
	}
	
	private function _displayForm()
	{
		global $cookie;
		/* Language */
		$defaultLanguage = (int)(Configuration::get('PS_LANG_DEFAULT'));
		$blocktitle = Configuration::get('CMAKFOLLOWUS_BLOCKTITLE');
		$languages = Language::getLanguages(false);
		$activeLanguages = Language::getIsoIds(true);
		$currencies = Currency::getCurrencies(false, 1);
		$defaultCurrency = Currency::getDefaultCurrency()->id;
		
		$rssImages = $this->_listImages('rss');
		$linkImages = $this->_listImages();
		$divLangName = 'rssTitle¤linkTitle¤blockTitle';
		/* Javascript : disabling inputs and creating images list for dynamic dispay in forms. Image0 is for reseting pics with js*/
		$this->_html .= '
		<script type="text/javascript">
			id_language = Number('.$defaultLanguage.');
			function setAgregatorFieldEdit()
				{ getE("agregator").disabled=(getE("use_agregator").checked)?false:true;
				}
			var linkImages = new Array();
			linkImage0 = new Array(\''.$linkImages[0]['srcsmall'].'\',\''.$linkImages[0]['src'].'\')';
		foreach ( $linkImages as $linkimage ) $this->_html .= '
			linkImages[\''.$linkimage['name'].'\'] = new Array(\''.$linkimage['srcsmall'].'\',\''.$linkimage['src'].'\');';
		$this->_html .= '
			var rssImages = new Array();
			rssImage0 = new Array(\''.$rssImages[0]['srcsmall'].'\',\''.$rssImages[0]['src'].'\')';
		foreach ( $rssImages as $rssimage ) $this->_html .= '
			rssImages[\''.$rssimage['name'].'\'] = new Array(\''.$rssimage['srcsmall'].'\',\''.$rssimage['src'].'\');';
		
		$this->_html .= '
			</script>';

		$this->_html .= '<fieldset><legend><img src="'.$this->_path.'list.png" alt="" title="" />'.$this->l('Links list').'</legend>';
		$this->_html .= $this->_list().'</fieldset>';

		$this->_html .= '
		<fieldset class="space" id="rssField">
			<legend><img src="'.$this->_path.'rss.png" alt="" title="" /> '.$this->l('New-products RSS').'</legend>
			<form id="rssForm" name="rssForm" method="post" action="'.Tools::safeOutput($_SERVER['REQUEST_URI']).'">
				<label>'.$this->l('Feed title').'</label>
				<div class="margin-form">';
		foreach ($languages as $language)
			$this->_html .= '
				<div id="rssTitle_'.$language['id_lang'].'" style="display: '.($language['id_lang'] == $defaultLanguage ? 'block' : 'none').'; float: left;">
				<input type="text" name="rssTitle_'.$language['id_lang'].'" id="rssTitleInput_'.$language['id_lang'].'"
					 value="'.(($this->error AND isset($_POST['rssTitle'])) ? $_POST['rssTitle'] : Configuration::get('CMAKFOLLOWUS_RSSTITLE', $language['id_lang'])).'" /><sup> *</sup>
				</div>';
		$this->_html .= $this->displayFlags($languages, $defaultLanguage, $divLangName, 'rssTitle', true);
		$this->_html .= '
				<div class="clear"></div></div> 
				<label>'.$this->l('Language').'</label>
				<div class="margin-form">
					<select name="rssLang" id="rssLang">';
		foreach ($activeLanguages as $activeLanguage)		
			$this->_html .= '<option value="'.$activeLanguage['id_lang'].'" '.($activeLanguage['id_lang'] == $defaultLanguage ? 'selected' : '' ).'>'.$activeLanguage['iso_code'].'</option>';
		$this->_html .= '
					</select> '.$this->l('is the language to display in the rss feed ').'			
				</div>
				<label>'.$this->l('Max num. of products in feed').'</label>
				<div class="margin-form"><input type="text" name="rssnMax" id="rssnMax" value="'.(($this->error AND isset($_POST['rssnMax'])) ? $_POST['rssnMax'] : '').'" /> 
					'.$this->l('Set to 0 for unlimited number of new-products. See \'Products\' configuration in \'Preferences\' tab').'</div> 
				<label>'.$this->l('Display prices').'</label>
				<div class="margin-form"><input type="checkbox" name="rssDisPrice" id="rssDisPrice" '.(($this->error AND isset($_POST['rssDisPrice'])) ? 'checked="checked"' : '').' /></div>
				<label>'.$this->l('Currency').'</label>
				<div class="margin-form"><select id="rssCurrencyId" name="rssCurrencyId">';
		foreach ($currencies as $currency)
		$this->_html .= '	<option value="'.$currency['id_currency'].'"'.($currency['id_currency'] == $defaultCurrency ? ' selected' : '').'>'.$currency['iso_code'].'</option>';
		$this->_html .= '	</select>
				</div>

				<label>'.$this->l('Use agregator url').'</label>
				<div class="margin-form"><input type="checkbox" name="rssUseAgregator" id="rssUseAgregator" '.(($this->error AND isset($_POST['rssUseAgregator'])) ? 'checked="checked"' : '').' onChange="setAgregatorFieldEdit()" />
					<input type="text" name="rssAgregator" id="rssAgregator" value="'.(($this->error AND isset($_POST['rssAgregator'])) ? $_POST['rssAgregator'] : '').'" />
					'.$this->l('The url of a feed published by a feed manager like feedburner').'</div> 

				<label>'.$this->l('Show link in block').'</label>
				<div class="margin-form"><input type="checkbox" name="rssShowInBlock" id="rssShowInBlock" '.(($this->error AND isset($_POST['rssShowInBlock'])) ? 'checked="checked"' : '').' /></div>
				<div class="clear"></div>

				<label>'.$this->l('Show link as alternate').'</label>
				<div class="margin-form"><input type="checkbox" name="rssShowAsAlternate" id="rssShowAsAlternate" '.(($this->error AND isset($_POST['rssShowAsAlternate'])) ? 'checked="checked"' : '').' /></div>
				<div class="clear"></div>

				<label>'.$this->l('Open in a new window').'</label>
				<div class="margin-form"><input type="checkbox" name="rssNewWindow" id="rssNewWindow" '.(($this->error AND isset($_POST['rssNewWindow'])) ? 'checked="checked"' : '').' /></div>
				<div class="clear"></div>

				<label><img src="'.$rssImages[0]['srcsmall'].'" alt="" title="" id="simgRss" style="vertical-align:middle" /><img src="'.$rssImages[0]['src'].'" alt="" title="" id="imgRss" style="vertical-align:middle" /></label>
				<div class="margin-form">
					<select name="rssImage" id="rssImage" onChange="getE(\'imgRss\').src=rssImages[this.value][1]; getE(\'simgRss\').src=rssImages[this.value][0];">';
					foreach ($rssImages as $image) $this->_html .='<option value="'.$image['name'].'">'.$image['name'].'</option>';
					$this->_html .= '
					</select>
				</div>
				<div class="clear"></div>
				<div class="margin-form">
					<input type="hidden" name="rssId" id="rssId" value="'.($this->error AND isset($_POST['rssId']) ? $_POST['rssId'] : '').'" />
					<input type="submit" class="button" name="submitRssAdd" id="submitRssAdd" value="'.$this->l('Add this feed').'" />
					<input type="submit" disabled class="button disable" name="submitRssUpdate" id="submitRssUpdate" value="'.$this->l('Edit this feed').'" />
					<input type="reset" class="button" name="submitRssReset" id="submitRssReset" value="'.$this->l('Reset').'" onClick="rssFormReset();" />
				</div>
			</form>
		</fieldset>
		<fieldset class="space">
			<legend id="linkField"><img src="'.$this->_path.'link.png" alt="" title="" /> '.$this->l('Links to social networks').'</legend>
			<form id="linkForm" method="post" action="'.Tools::safeOutput($_SERVER['REQUEST_URI']).'">
				<label>'.$this->l('Link title').'</label>
				<div class="margin-form">';
			foreach ($languages as $language)
				$this->_html .= '
					<div id="linkTitle_'.$language['id_lang'].'" style="display: '.($language['id_lang'] == $defaultLanguage ? 'block' : 'none').'; float: left;">
						<input type="text" name="linkTitle_'.$language['id_lang'].'" id="linkTitleInput_'.$language['id_lang'].'" 
							value="'.(($this->error AND isset($_POST['linkTitle_'.$language['id_lang']])) ? $_POST['linkTitle_'.$language['id_lang']] : '').'" /><sup> *</sup>
					</div>';
			$this->_html .= $this->displayFlags($languages, $defaultLanguage, $divLangName, 'linkTitle', true);
			$this->_html .= '
					<div class="clear"></div>
				</div>
				<label>'.$this->l('Link url').'</label>
				<div class="margin-form"><input type="text" name="linkUrl" id="linkUrl" value="'.(($this->error AND isset($_POST['linkUrl'])) ? $_POST['linkUrl'] : '').'" /><sup> *</sup></div>
				<div class="clear"></div>
				<label>'.$this->l('Open in a new window').'</label>
				<div class="margin-form"><input type="checkbox" name="linkNewWindow" id="linkNewWindow" '.(($this->error AND isset($_POST['linkNewWindow'])) ? 'checked="checked"' : '').' /></div>

				<div class="clear"></div>

				<label><img src="'.$linkImages[0]['srcsmall'].'" alt="" title="" id="simgLink" style="vertical-align:middle" /><img src="'.$linkImages[0]['src'].'" alt="" title="" id="imgLink" style="vertical-align:middle" /></label>
				<div class="margin-form">
					<select name="linkImage" id="linkImage" onChange="getE(\'imgLink\').src=linkImages[this.value][1]; getE(\'simgLink\').src=linkImages[this.value][0]">';
					foreach ($linkImages as $image) $this->_html .='<option value="'.$image['name'].'">'.$image['name'].'</option>';
					$this->_html .= '
					</select>
				</div>
				<div class="clear"></div>
				<div class="margin-form">
					<input type="hidden" name="linkId" id="linkId" value="'.($this->error AND isset($_POST['linkId']) ? $_POST['linkId'] : '').'" />
					<input type="submit" class="button" name="submitLinkAdd" id="submitLinkAdd" value="'.$this->l('Add this link').'" />
					<input type="submit" class="button disable" disabled name="submitLinkUpdate" id="submitLinkUpdate" value="'.$this->l('Edit this link').'" />
					<input type="reset" class="button" name="submitLinkReset" id="submitLinkReset" value="'.$this->l('Reset').'" onClick="linkFormReset()" />
				</div>

			</form>
		</fieldset>
		<fieldset class="space" id="cogField">
			<legend><img src="'.$this->_path.'cog.png" alt="" title="" /> '.$this->l('Configuration').'</legend>
			<form id="cogForm" method="post" action="'.Tools::safeOutput($_SERVER['REQUEST_URI']).'">
				<label>'.$this->l('Block title').'</label>
				<div class="margin-form">';
				foreach ($languages as $language)
				$this->_html .= '
				<div id="blockTitle_'.$language['id_lang'].'" style="display: '.($language['id_lang'] == $defaultLanguage ? 'block' : 'none').'; float: left;">
				<input type="text" name="blockTitle_'.$language['id_lang'].'" value="'.(($this->error AND isset($_POST['blockTitle'])) ? $_POST['blockTitle'] : Configuration::get('CMAKFOLLOWUS_BLOCKTITLE', $language['id_lang'])).'" /><sup> *</sup>
				</div>';
				$this->_html .= $this->displayFlags($languages, $defaultLanguage, $divLangName, 'blockTitle', true);
				$this->_html .= '
				<div class="clear"></div>
				</div>
				<label>'.$this->l('Block links display').'</label>
				<div class="margin-form">
					<select name="caption" id="caption" size="1">
						<option value="1"'.(Configuration::get('CMAKFOLLOWUS_CAPTION')==1 ? ' selected' : '').'>'.$this->l('Image and text').'</option>
						<option value="2"'.(Configuration::get('CMAKFOLLOWUS_CAPTION')==2 ? ' selected' : '').'>'.$this->l('Image only').'</option>
						<option value="3"'.(Configuration::get('CMAKFOLLOWUS_CAPTION')==3 ? ' selected' : '').'>'.$this->l('Text only').'</option>
					</select>
				</div>
				<div class="margin-form">
					<input type="submit" class="button" name="submitCog" id="submitCog" value="'.$this->l('Update Configuration').'" />
				</div>
			</form>
		</fieldset>';

	}

	public function getContent()
	{
		$this->_html = '';
		// Display DEBUG information
		//global $currentIndex;
		//$this->_html .= '<p><textarea cols="100">this->_path : '.$this->_path."\nVariables _REQUEST : \n".print_r($_REQUEST, true)."\ncurrentIndex : ".$currentIndex.'</textarea></p>';

		// Display Module name and information
		$this->_html .= '<h2>'.$this->displayName.'</h2><h3 class="blue">'.$this->description.'</h3>';
		$this->_html .= '<hr><center><form action="https://www.paypal.com/cgi-bin/webscr" method="post">
										This extension if free to use, brought to you by <a href="http://www.cmak.fr/" onclick="window.open(this.href);return false;" title="www.cmak.fr"><b>cmak.fr</b></a>
										for questions, feedback and feature request please contact <b><a href="mailto:cmak.fr@gmail.com?subject=CmakFollowUS">cmak.fr@gmail.com</a></b>
										<input type="hidden" name="cmd" value="_s-xclick">
										<input type="hidden" name="hosted_button_id" value="F4HMBL8CB7TRS">
										<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
										<img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
										</form>';
		$this->_html .= 'The social networking icons are crafted under CC licence by <b>
										<a rel="cc:attributionURL" property="cc:attributionName" href="http://komodomedia.com"  onclick="window.open(this.href);return false;">Komodo Media, Rogie King</a></b>
										/ <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/"  onclick="window.open(this.href);return false;"><img src="'.$this->_path.'cc-logo.png" title="CC BY-SA 3.0"></a></center><hr />';

		if (isset($_POST['submitLinkUpdate']))
		{
			if (empty($_POST['linkTitle_'.Configuration::get('PS_LANG_DEFAULT')]) OR empty($_POST['linkUrl']))
				$this->_html .= $this->displayError($this->l('You must fill in all fields'));
			elseif (!Validate::isUrl(str_replace('http://', '', $_POST['linkUrl'])))
				$this->_html .= $this->displayError($this->l('Bad URL'));
			else
				if (empty($_POST['linkId']) OR !is_numeric($_POST['linkId']) OR !$this->linkUpdate())
					$this->_html .= $this->displayError($this->l('An error occurred during link updating.'));
				else
					$this->_html .= $this->displayConfirmation($this->l('The link has been updated.'));
		}
		elseif (isset($_POST['submitRssUpdate']))
		{
			if (empty($_POST['rssTitle_'.Configuration::get('PS_LANG_DEFAULT')]) )
				$this->_html .= $this->displayError($this->l('You must fill in all fields'));
			else
				if (empty($_POST['rssId']) OR !is_numeric($_POST['rssId']) OR !$this->rssUpdate())
					$this->_html .= $this->displayError($this->l('An error occurred during RSS updating.'));
				else
					$this->_html .= $this->displayConfirmation($this->l('The RSS has been updated.'));
		}
		elseif (isset($_POST['submitLinkAdd']))
		{
			if ($this->linkAdd())
				$this->_html .= $this->displayConfirmation($this->l('Link has been added.'));
			else
				$this->_html .= $this->displayError($this->l('An error occurred during link add.'));
		}
		elseif (isset($_POST['submitRssAdd']))
		{
			if ($this->rssAdd())
				$this->_html .= $this->displayConfirmation($this->l('RSS has been added.'));
			else
				$this->_html .= $this->displayError($this->l('An error occurred during RSS add.'));
		}
		elseif (isset($_POST['submitCog']))
		{
			if ($this->updateCog())
				$this->_html .= $this->displayConfirmation($this->l('Configuration has been updated.'));
			else
				$this->_html .= $this->displayError($this->l('An error occurred during configuration set-up.'));
		}
		elseif (isset($_REQUEST['delid']))
		{
			if (is_numeric($_REQUEST['delid']) AND $this->itemDelete($_REQUEST['delid']))
				$this->_html .= $this->displayConfirmation($this->l('Item has been deleted.'));
			else
				$this->_html .= $this->displayError($this->l('An error occurred during deletion.'));
		}
		elseif (isset($_REQUEST['moveupid']))
		{
			if ($this->_moveUp($_REQUEST['moveupid']))
				$this->_html .= $this->displayConfirmation($this->l('Sort order has been updated.'));
			else
				$this->_html .= $this->displayError($this->l('An error occurred during sort order set-up.'));
		}
		elseif (isset($_REQUEST['movedownid']))
		{
			if ($this->_moveDown($_REQUEST['movedownid']))
				$this->_html .= $this->displayConfirmation($this->l('Sort order has been updated.'));
			else
				$this->_html .= $this->displayError($this->l('An error occurred during sort order set-up.'));
		}

		$this->_displayForm();
		return $this->_html;
	}
}
