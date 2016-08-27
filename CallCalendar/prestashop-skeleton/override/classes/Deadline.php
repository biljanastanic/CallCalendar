<?php
/*

CREATE TABLE `ps_deadline` (
  `id_deadline` int(11) NOT NULL AUTO_INCREMENT,
  `id_call` int(11) NOT NULL,
  `deadline` date NOT NULL,
  `type` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_deadline`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

CREATE TABLE `ps_deadline_lang` (
  `id_deadline` int(11) NOT NULL AUTO_INCREMENT,
  `id_lang` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id_deadline`,`id_lang`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;


*/
class DeadlineCore extends ObjectModel
{
	public $id;

	public $id_deadline;
	
	public $id_call;

 	public $deadline; //date

 	public $type;

 	public $name;
	
	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table' => 'deadline',
		'primary' => 'id_deadline',
		'multilang' => true,
		'fields' => array(
	
			'id_call' => array('type' => self::TYPE_INT,  'required' => true,'validate' => 'isUnsignedId'),
			'deadline' => 	array('type' => self::TYPE_DATE, 'required' => true),		
			'type' =>	array('type' => self::TYPE_BOOL),

			//Lang fields
			'name' => 				array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isString', 'required' => true, 'size' => 255),
			

		),
	);

	/**
	 * 
	 * Static function for getting all the deadlines
	 * 
	 */
	public static function getDeadlines($id_lang = 0, $id_deadline = null)
	{
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		
		$sql = 'SELECT DISTINCT d.*, dl.`name`, cl.`title` 
		FROM `'._DB_PREFIX_.'deadline` d
		LEFT JOIN `'._DB_PREFIX_.'deadline_lang` AS dl ON (d.`id_deadline` = dl.`id_deadline` AND dl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'call` c ON d.`id_call` = c.`id_call`
		LEFT JOIN `'._DB_PREFIX_.'call_lang` cl ON (d.`id_call` = cl.`id_call` AND cl.`id_lang` = '.(int)$id_lang.')';		
		
		$sql.='WHERE 1 ';
		if ($id_call)
		{
			$sql .= ' AND d.`id_call` = ' . (int)$id_status;
		}
		$sql .= ' ORDER BY cl.`title` ASC';//psl.`name` ASC, 
		//echo $sql . '<br>'; 
		$calls = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
		
		return $calls;
	}



	/**
	 * 
	 * Get specific deadilne by id
	 * 
	 */
	public static function getDeadlineById($id_deadline = null, $id_lang = 0)
	{
		if(!$id_call) $id_call=$this->id;
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');

		$sql = 'SELECT DISTINCT d.*, dl.`name`, cl.`title` AS call
		FROM `'._DB_PREFIX_.'deadline` d
		LEFT JOIN `'._DB_PREFIX_.'deadline_lang` AS dl ON (d.`id_deadline` = dl.`id_deadline` AND dl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'call` c ON d.`id_call` = c.`id_call`
		LEFT JOIN `'._DB_PREFIX_.'call_lang` cl ON (c.`id_call` = cl.`id_call` AND cl.`id_lang` = '.(int)$id_lang.')	
		
		WHERE d.`id_deadline` = '.$id_deadline;

		$deadline = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($sql);

		return $deadline;
	}
	
	

	
}
