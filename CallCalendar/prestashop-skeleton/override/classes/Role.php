<?php
class RoleCore extends ObjectModel
{
	public $id;

	public $id_role;

	/** @var string Name */
	public $name;

	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table' => 'role',
		'primary' => 'id_role',
		'multilang' => true,
		'fields' => array(
			// Lang fields
			'name' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'required' => true, 'size' => 32)
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
	public static function getRoles($id_lang)
	{
		if (is_null($id_lang))
			$id_lang = Context::getContext()->language->id;
		
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT r.`id_role`, rl.`name`
		FROM `'._DB_PREFIX_.'role` r
		LEFT JOIN `'._DB_PREFIX_.'role_lang` rl ON (r.`id_role` = rl.`id_role` AND `id_lang` = '.(int)$id_lang.')
		ORDER BY r.`id_role` ASC');
	}

	/**
	* Get the current type name
	*
	* @return string Type
	*/
	public static function getRole($id_role, $id_lang = null)
	{
		if (is_null($id_lang))
			$id_lang = Context::getContext()->language->id;

		return Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('
			SELECT rl.`name`
			FROM `'._DB_PREFIX_.'role` r
			LEFT JOIN `'._DB_PREFIX_.'id_role_lang` rl ON (r.`id_role` = rl.`id_role`)
			WHERE r.`id_role` = '.(int)$id_role.'
			AND rl.`id_lang` = '.(int)$id_lang
		);
	}
}


