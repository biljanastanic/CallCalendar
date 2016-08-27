<?php
/*
--
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `ps_news_and_events_scope` (
`id_news_and_events_scope` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `ps_news_and_events_scope_lang` (
`id_news_and_events_scope` int(11) NOT NULL,
  `id_lang` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
*/
class NewsAndEventsScopeCore extends ObjectModel
{
	public $id;
	
	public $id_news_and_events_scope;

 	public $name;
	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table' => 'news_and_events_scope',
		'primary' => 'id_news_and_events_scope',
		'multilang' => true,
		'fields' => array(
			'name' 							=> array('type' => self::TYPE_STRING, 'validate' => 'isString','lang' => true, 'size' => 255,'required'=> true)
			)
	);
	public function update($nullValues = false)
	{
	 	return parent::update(true);
	}
	
	public function add($autodate = true, $null_values = true)
	{
		$success = parent::add($autodate, $null_values);
		return $success;
	}	
	
	public static function getNewsAndEventsScopes($id_lang)
	{
		if (!$id_lang)
		$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');

		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('SELECT distinct navsl.* FROM `'._DB_PREFIX_.'news_and_events_scope_lang` navsl where navsl.`id_lang` = '.(int)$id_lang);
	
	}
	
	public static function getNewsAndEventsScope($id_lang,$id_scope)
	{
		if (!$id_lang)
		$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');

		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('SELECT distinct navsl.* FROM `'._DB_PREFIX_.'news_and_events_scope_lang` navsl where navsl.`id_lang` = '.(int)$id_lang.' and navsl.`id_news_and_events_scope`='.(int)$id_scope);
	
	}
}
