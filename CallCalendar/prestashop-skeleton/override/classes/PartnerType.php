<?php
/*


-- --------------------------------------------------------

--
-- Table structure for table `ps_partner_type`
--
--

CREATE TABLE IF NOT EXISTS `ps_partner_type` (
  `id_partner_type` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_partner_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=3 ;

-- Table structure for table `ps_partner_type_lang`

CREATE TABLE IF NOT EXISTS `ps_partner_type_lang` (
  `id_partner_type` int(11) NOT NULL AUTO_INCREMENT,
  `id_lang` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_partner_type`,`id_lang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=3 ;


*/
class PartnerTypeCore extends ObjectModel
{
 	/** @var string Name */
	public $name;

	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table' => 'partner_type',
		'primary' => 'id_partner_type',
		'multilang' => true,
		'fields' => array(
			// Lang fields
			'name' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'required' => true, 'size' => 128),
		),
	);
	
	public function add($autodate = true, $null_values = true)
	{
		$success = parent::add($autodate, $null_values);
		return $success;
	}	
	
	/**
	* Get all available types
	*
	* @return array types
	*/
	public static function getPartnerTypes($id_lang)
	{
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT pt.`id_partner_type`, ptl.`name`
		FROM `'._DB_PREFIX_.'partner_type` pt
		LEFT JOIN `'._DB_PREFIX_.'partner_type_lang` ptl ON (pt.`id_partner_type` = ptl.`id_partner_type` AND ptl.`id_lang` = '.(int)$id_lang.')
		ORDER BY pt.`id_partner_type` ASC');
	}

	/**
	* Get the current type name
	*
	* @return string Type
	*/
	public static function getPartnerType($id_partner_type, $id_lang = null)
	{
		if (!$id_lang)
			$id_lang = Configuration::get('PS_LANG_DEFAULT');

		return Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('
			SELECT pt.`id_partner_type`, ptl.`name`
			FROM `'._DB_PREFIX_.'partner_type` pt
			LEFT JOIN `'._DB_PREFIX_.'partner_type_lang` ptl ON (pt.`id_partner_type` = ptl.`id_partner_type` AND ptl.`id_lang` = '.(int)$id_lang.')
			WHERE pt.`id_partner_type` = '.(int)$id_partner_type.'
			AND ptl.`id_lang` = '.(int)$id_lang
		);
	}
}


