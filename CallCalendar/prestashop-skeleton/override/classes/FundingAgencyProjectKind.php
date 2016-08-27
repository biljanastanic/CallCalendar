<?php
/*

--
-- Table structure for table `ps_funding_agency`
--
--

CREATE TABLE IF NOT EXISTS `ps_funding_agency` (
  `id_funding_agency` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(128) COLLATE utf8_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id_funding_agency`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=1 ;

-- Table structure for table `ps_funding_agency_lang`

CREATE TABLE IF NOT EXISTS `ps_funding_agency_lang` (
  `id_funding_agency` int(11) NOT NULL AUTO_INCREMENT,
  `id_lang` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `acronym` varchar(32) COLLATE utf8_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id_funding_agency`,`id_lang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;



*/
class FundingAgencyProjectKindCore extends ObjectModel
{
	public $id;
	
	public $id_funding_agency;
	
	public $id_funding_agency_project_kind;
	
	/** @var string Name */
	public $name;
	
 	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table' => 'funding_agency_project_kind',
		'primary' => 'id_funding_agency_project_kind',
		'multilang' => true,
		'fields' => array(
		'id_funding_agency' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
			// Lang fields
			'name' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'required' => true, 'size' =>255)
		),
	);
	
	public function __construct($id_category = null, $id_lang = null, $id_shop = null)
	{
		parent::__construct($id_category, $id_lang, $id_shop);
	}

	public function add($autodate = true, $null_values = true)
	{
		$success = parent::add($autodate, $null_values);
		return $success;
	}	
	
		/**
	* Get all available project kinds
	*
	* @return array types
	*/
	public static function getFundingAgencyProjectKinds($id_lang)
	{
	if (!$id_lang)
			$id_lang = Configuration::get('PS_LANG_DEFAULT');
			
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT DISTINCT fapk.`id_funding_agency_project_kind`, fapkl.`name`, fal.`name` as funding_agency
		FROM `'._DB_PREFIX_.'funding_agency_project_kind` AS fapk
		LEFT JOIN `'._DB_PREFIX_.'funding_agency_project_kind_lang` AS fapkl ON (fapk.`id_funding_agency_project_kind` = fapkl.`id_funding_agency_project_kind` AND fapkl.`id_lang` = '.(int)$id_lang.')	
		LEFT JOIN `'._DB_PREFIX_.'funding_agency_lang` AS fal ON (fapk.`id_funding_agency` = fal.`id_funding_agency` AND fal.`id_lang` = '.(int)$id_lang.')
		ORDER BY fal.`name`,fapk.`id_funding_agency_project_kind` ASC');
	}


		/**
	* Get project kinds for specific funding agency
	*
	* @return array types
	*/
	public static function getFundingAgencyProjectKindsByFundingAgency($id_lang,$id_fa)
	{
	if (!$id_lang)
			$id_lang = Configuration::get('PS_LANG_DEFAULT');
			
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT DISTINCT fapk.`id_funding_agency_project_kind`, fapkl.`name`, fal.`name` as funding_agency
		FROM `'._DB_PREFIX_.'funding_agency_project_kind` AS fapk
		LEFT JOIN `'._DB_PREFIX_.'funding_agency_project_kind_lang` AS fapkl ON (fapk.`id_funding_agency_project_kind` = fapkl.`id_funding_agency_project_kind` AND fapkl.`id_lang` = '.(int)$id_lang.')	
		LEFT JOIN `'._DB_PREFIX_.'funding_agency_lang` AS fal ON (fapk.`id_funding_agency` = fal.`id_funding_agency` AND fal.`id_lang` = '.(int)$id_lang.')
		WHERE fapk.id_funding_agency='.$id_fa.' 
		ORDER BY fal.`name`,fapk.`id_funding_agency_project_kind` ASC');
	}


	
}
