<?php
/*

--
-- Table structure for table `ps_project_status`
--
--

CREATE TABLE IF NOT EXISTS `ps_project_status` (
  `id_project_status` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_project_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=5 ;

-- Table structure for table `ps_project_status_lang`

CREATE TABLE IF NOT EXISTS `ps_project_status_lang` (
  `id_project_status` int(11) NOT NULL AUTO_INCREMENT,
  `id_lang` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id_project_status`,`id_lang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;




*/
class ProjectStatusCore extends ObjectModel
{
 	/** @var string Name */
	public $name;

	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table' => 'project_status',
		'primary' => 'id_project_status',
		'multilang' => true,
		'fields' => array(
			// Lang fields
			'name' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'required' => true, 'size' => 32),
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
	public static function getProjectStatuses($id_lang = null)
	{
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
	
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT ps.`id_project_status`, psl.`name` AS name
		FROM `'._DB_PREFIX_.'project_status` ps
		LEFT JOIN `'._DB_PREFIX_.'project_status_lang` psl ON (ps.`id_project_status` = psl.`id_project_status` AND psl.`id_lang` = '.(int)$id_lang.')
		ORDER BY ps.`id_project_status` ASC');
	}

	/**
	* Get the current type name
	*
	* @return string Type
	*/
	public static function getProjectStatus($id_project_status, $id_lang = null)
	{
		if (!$id_lang)
			$id_lang = Configuration::get('PS_LANG_DEFAULT');

		return Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('
			SELECT psl.`name`
			FROM `'._DB_PREFIX_.'project_status` ps
			LEFT JOIN `'._DB_PREFIX_.'id_project_status_lang` psl ON (ps.`id_project_status` = psl.`id_project_status`)
			WHERE ps.`id_project_status` = '.(int)$id_project_status.'
			AND psl.`id_lang` = '.(int)$id_lang
		);
	}
	
	public static function getProjectStatusIdByName($id_lang = null, $status_name)
	{
		if (!$id_lang)
			$id_lang = Configuration::get('PS_LANG_DEFAULT');

		return Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('
			SELECT ps.`id_status`
			FROM `'._DB_PREFIX_.'project_status` ps
			LEFT JOIN `'._DB_PREFIX_.'id_project_status_lang` psl ON (ps.`id_project_status` = psl.`id_project_status`)
			WHERE psl.`name` = "'.$status_name.'"
			AND psl.`id_lang` = '.(int)$id_lang
		);
	}
}


