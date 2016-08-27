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
class FundingAgencyCore extends ObjectModel
{
	public $id;
	
	public $id_funding_agency;
	
	/** @var string Name */
	public $name;
	
	/** @var string Name */
	public $acronym;
	
	public $url;
 	
	public $id_image = 'default';

	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table' => 'funding_agency',
		'primary' => 'id_funding_agency',
		'multilang' => true,
		'fields' => array(
		'url' => array('type' => self::TYPE_STRING, 'validate' => 'isUrl','size' => 128),
			// Lang fields
			'name' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'required' => true, 'size' =>255),
			'acronym' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isString', 'size' => 32),
		),
	);
	
	public function __construct($id_category = null, $id_lang = null, $id_shop = null)
	{
		parent::__construct($id_category, $id_lang, $id_shop);
		$this->id_image = ($this->id && file_exists(_PS_FUNDING_AGENCIES_IMG_DIR_.(int)$this->id.'.jpg')) ? (int)$this->id : false;
		$this->image_dir = _PS_FUNDING_AGENCIES_IMG_DIR_;
	}

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
	public static function getFundingAgencies($id_lang)
	{
	if (!$id_lang)
			$id_lang = Configuration::get('PS_LANG_DEFAULT');
			
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT DISTINCT fa.`id_funding_agency`, fal.`name`, fal.`acronym`
		FROM `'._DB_PREFIX_.'funding_agency` AS fa
		LEFT JOIN `'._DB_PREFIX_.'funding_agency_lang` AS fal ON (fa.`id_funding_agency` = fal.`id_funding_agency` AND fal.`id_lang` = '.(int)$id_lang.')
		ORDER BY fa.`id_funding_agency` ASC');
	}

	public function getFundingAgencyById($id_funding_agency = null, $id_lang = null)
	{
		if(!$id_funding_agency)
			$id_funding_agency=(int)$this->id;
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');

		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT DISTINCT fa.*, fal.`name`, fal.`acronym`
		FROM `'._DB_PREFIX_.'funding_agency` AS fa
		LEFT JOIN `'._DB_PREFIX_.'funding_agency_lang` AS fal ON (fa.`id_funding_agency` = fal.`id_funding_agency` AND fal.`id_lang` = '.(int)$id_lang.')
		WHERE fa.`id_funding_agency` = '.$id_funding_agency);

	}

	public static function getTopFundingAgencies($id_lang, $count = 3)
	{
		if (!$id_lang)
			$id_lang = Configuration::get('PS_LANG_DEFAULT');
			
		$sql = '
		SELECT COUNT( * ) AS count, fa.`url`, fal.`name` , fal.`acronym` , fa.`id_funding_agency` , pfa.`id_project`
		FROM `'._DB_PREFIX_.'funding_agency` AS fa
		LEFT JOIN `'._DB_PREFIX_.'funding_agency_lang` AS fal ON ( fa.`id_funding_agency` = fal.`id_funding_agency` AND fal.`id_lang` = '.(int)$id_lang.')
		JOIN `'._DB_PREFIX_.'project_funding_agency` AS pfa ON ( fa.`id_funding_agency` = pfa.`id_funding_agency`)
		GROUP BY pfa.`id_funding_agency`
		ORDER BY count DESC
		LIMIT '. $count;
		
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
	}

	/**
	* Get the current type name
	*
	* @return string Type
	*/
	public static function getProjectFundingAgencies($id_project, $id_lang = null)
	{
		if (!$id_lang)
			$id_lang = Configuration::get('PS_LANG_DEFAULT');

		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT fa.*,fal.`name`, fal.`acronym`
		FROM `'._DB_PREFIX_.'project_funding_agency` pfa
		LEFT JOIN `'._DB_PREFIX_.'funding_agency` fa ON pfa.`id_funding_agency` = fa.`id_funding_agency`
		LEFT JOIN `'._DB_PREFIX_.'funding_agency_lang` fal ON (fa.`id_funding_agency` = fal.`id_funding_agency` AND fal.`id_lang` = '.(int)$id_lang.')
		WHERE pfa.`id_project` = '.(int)$id_project);
	}
	
	public function delete()
	{
		$this->deleteImage();
		if (parent::delete())
		{
			return true;
		}
	}

	
}
