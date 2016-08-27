<?php
/*

CREATE TABLE `ps_funding_program` (
  `id_funding_program` int(11) NOT NULL AUTO_INCREMENT,
  `id_funding_agency` int(11) NOT NULL,
  PRIMARY KEY (`id_funding_program`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `ps_funding_program_lang` (
  `id_funding_program` int(11) NOT NULL AUTO_INCREMENT,
  `id_lang` int(11) NOT NULL,
  `name` varchar(32) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id_funding_program`,`id_lang`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;



*/
class FundingProgramCore extends ObjectModel
{
	public $id;
	
	public $id_funding_program;

	public $id_funding_agency;

 	public $name;

	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table' => 'funding_program',
		'primary' => 'id_funding_program',
		'multilang' => true,
		'fields' => array(
			'id_funding_agency' => array('type' => self::TYPE_INT,  'required' => true,'validate' => 'isUnsignedId'),
			// Lang fields
			'name' => 				array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isString', 'required' => true, 'size' => 255)
		),
	);

	/**
	 * 
	 * Static function for getting all the funding programs
	 * 
	 */
	public static function getFundingPrograms($id_lang = 0, $id_funding_agency = null)
	{
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		
		$sql = 'SELECT DISTINCT fp.*, fpl.`name` fal.`name` AS funding_agency
		FROM `'._DB_PREFIX_.'funding_program` fp
		LEFT JOIN `'._DB_PREFIX_.'funding_program_lang` AS fpl ON (fp.`id_funding_program` = fpl.`id_funding_program` AND fpl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'funding_agency` fa ON fp.`id_funding_agency` = fa.`id_funding_agency`
		LEFT JOIN `'._DB_PREFIX_.'funding_agency_lang` fal ON (fal.`id_funding_agency` = fa.`id_funding_agency` AND fal.`id_lang` = '.(int)$id_lang.')';		
		$sql.='WHERE 1 ';
		if ($id_funding_agency)
		{
			$sql .= ' AND fp.`id_funding_agency` = ' . (int)$id_funding_agency;
		}
		$sql .= ' ORDER BY fpl.`name` ASC';

		$funding_programs = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
		return $funding_programs;
	}
	
	/**
	 * 
	 * Get specific funding program by id
	 * 
	 */
	public static function getFundingProgramById($id_funding_program = null, $id_lang = 0)
	{
		if(!$id_funding_program) $id_funding_program=$this->id;
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		
		$sql = '
		SELECT fp.*, fpl.`name`, fal.`name` AS funding_agency
		FROM `'._DB_PREFIX_.'funding_program` fp
		LEFT JOIN `'._DB_PREFIX_.'funding_program_lang` AS fpl ON (fp.`id_funding_program` = fpl.`id_funding_program` AND fpl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'funding_agency` fa ON fp.`id_funding_agency` = fa.`id_funding_agency`
		LEFT JOIN `'._DB_PREFIX_.'funding_agency_lang` fal ON (fal.`id_funding_agency` = fa.`id_funding_agency` AND fal.`id_lang` = '.(int)$id_lang.')
		WHERE fp.`id_funding_program` = '.$id_funding_program;

		$funding_program = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($sql);
		return $funding_program;
	}
	
	/**
	 * 
	 * Get funding program
	 * 
	 */
	public static function getFundingProgram($id_funding_program=null, $id_lang = 0)
	{
		if(!$id_funding_program) $id_funding_program=$this->id;
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT DISTINCT fp.*, fpl.`name`, fal.`name` AS funding_agency
		FROM `'._DB_PREFIX_.'funding_program` fp
		LEFT JOIN `'._DB_PREFIX_.'funding_program_lang` AS fpl ON (fp.`id_funding_program` = fpl.`id_funding_program` AND fpl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'funding_agency` fa ON fp.`id_funding_agency` = fa.`id_funding_agency`
		LEFT JOIN `'._DB_PREFIX_.'funding_agency_lang` fal ON (fal.`id_funding_agency` = fa.`id_funding_agency` AND fal.`id_lang` = '.(int)$id_lang.')		
		WHERE p.`id_funding_program` = '.$id_funding_program.'
		ORDER BY fal.`name`, fp.`id_funding_program` DESC');
	}
	

	
	public function add($autodate = true, $null_values = true)
	{
		$success = parent::add($autodate, $null_values);
		return $success;
	}

}


