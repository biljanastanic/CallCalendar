<?php

class PositionCore extends ObjectModel
{
 	/** @var string Name */
	public $name;

	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table' => 'position',
		'primary' => 'id_position',
		'multilang' => true,
		'fields' => array(
			// Lang fields
			'name' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'required' => true, 'size' => 255),
		),
	);

	protected static $_cache_accesses = array();


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
	public static function getPositions($id_lang)
	{
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT p.`id_position`, `name`
		FROM `'._DB_PREFIX_.'position` p
		LEFT JOIN `'._DB_PREFIX_.'position_lang` pl ON (p.`id_position` = pl.`id_position` AND `id_lang` = '.(int)$id_lang.')
		ORDER BY pl.`name` ASC');
	}

	/**
	* Get the current type name
	*
	* @return string Type
	*/
	public static function getPosition($id_position, $id_lang = null)
	{
		if (!$id_lang)
			$id_lang = Configuration::get('PS_LANG_DEFAULT');

		return Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('
			SELECT `name`
			FROM `'._DB_PREFIX_.'position` p
			LEFT JOIN `'._DB_PREFIX_.'id_position_lang` pl ON (p.`id_position` = pl.`id_position`)
			WHERE p.`id_position` = '.(int)$id_position.'
			AND pl.`id_lang` = '.(int)$id_lang
		);
	}
}


