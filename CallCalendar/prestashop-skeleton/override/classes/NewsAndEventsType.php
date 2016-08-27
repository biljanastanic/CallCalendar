<?php
/*
--
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `ps_news_and_events_type` (
`id_news_and_events_type` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `ps_news_and_events_type_lang` (
`id_news_and_events_type` int(11) NOT NULL,
  `id_lang` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

*/
class NewsAndEventsTypeCore extends ObjectModel
{
	public $id;
	
	public $id_news_and_events_type;

	public $name;
	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table' => 'news_and_events_type',
		'primary' => 'id_news_and_events_type',
		'multilang' => true,
		'fields' => array(
			'name' 							=> array('type' => self::TYPE_STRING, 'validate' => 'isString','lang' => true, 'size' => 255,'required'=> true)
			)
	);
	public static function getNewsAndEventsTypes($id_lang)
	{
		if (!$id_lang)
		$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');

		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('SELECT navtl.* FROM `'._DB_PREFIX_.'news_and_events_type_lang` navtl where navtl.`id_lang` = '.(int)$id_lang);
	
	}
	public static function getEventTypes($id_lang)
	{
		if (!$id_lang)
		$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');

		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('SELECT navtl.* FROM `'._DB_PREFIX_.'news_and_events_type_lang` navtl where navtl.name!="News" and navtl.`id_lang` = '.(int)$id_lang);
	
	}
		public function update($nullValues = false)
	{
	 	return parent::update(true);
	}
	
	public function add($autodate = true, $null_values = true)
	{
		$success = parent::add($autodate, $null_values);
		return $success;
	}	
	
	
	public static function getNewsAndEventsType($id_lang,$id_type)
	{
		if (!$id_lang)
		$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');

		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('SELECT navtl.* FROM `'._DB_PREFIX_.'news_and_events_type_lang` navtl where navtl.`id_lang` = '.(int)$id_lang.' and navtl.`id_news_and_events_type`='.(int)$id_type);
	
	}
	
	public static function getNewsAndEventsTypeByName($id_lang,$name)
	{
		if (!$id_lang)
		$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');

		return Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('SELECT navtl.* FROM `'._DB_PREFIX_.'news_and_events_type_lang` navtl where navtl.`id_lang` = '.(int)$id_lang.' and navtl.`name`="'.$name.'"');
	
	}
}

