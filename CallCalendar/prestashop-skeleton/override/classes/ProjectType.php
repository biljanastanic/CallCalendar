<?php
/*

-- --------------------------------------------------------

--
-- Table structure for table `ps_project_type`
--
--

CREATE TABLE IF NOT EXISTS `ps_project_type` (
  `id_project_type` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_project_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=1 ;

-- Table structure for table `ps_project_type_lang`

CREATE TABLE IF NOT EXISTS `ps_project_type_lang` (
  `id_project_type` int(11) NOT NULL AUTO_INCREMENT,
  `id_lang` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id_project_type`,`id_lang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;



*/
class ProjectTypeCore extends ObjectModel
{
 	/** @var string Name */
	public $name;

	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table' => 'project_type',
		'primary' => 'id_project_type',
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
	public static function getProjectTypes($id_lang)
	{
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT pt.`id_project_type`, ptl.`name`
		FROM `'._DB_PREFIX_.'project_type` pt
		LEFT JOIN `'._DB_PREFIX_.'project_type_lang` ptl ON (pt.`id_project_type` = ptl.`id_project_type` AND ptl.`id_lang` = '.(int)$id_lang.')
		ORDER BY pt.`id_project_type` ASC');
	}

	/**
	* Get the current type name
	*
	* @return string Type
	*/
	public static function getProjectType($id_project_type, $id_lang = null)
	{
		if (!$id_lang)
			$id_lang = Configuration::get('PS_LANG_DEFAULT');

		return Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('
			SELECT ptl.`name`
			FROM `'._DB_PREFIX_.'project_type` pt
			LEFT JOIN `'._DB_PREFIX_.'id_project_type_lang` ptl ON (pt.`id_project_type` = ptl.`id_project_type`)
			WHERE pt.`id_project_type` = '.(int)$id_project_type.'
			AND ptl.`id_lang` = '.(int)$id_lang
		);
	}
}


