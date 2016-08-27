<?php
/*
--
-- Table structure for table `ps_partner`
--
--

CREATE TABLE IF NOT EXISTS `ps_partner` (
  `id_partner` int(11) NOT NULL AUTO_INCREMENT,
  `id_country` int(11) DEFAULT NULL,
  `id_partner_type` int(11) DEFAULT NULL,
   `url` varchar(255) COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_partner`),
  KEY `FK_partner_id_partner_type` (`id_partner_type`),
  KEY `FK_partner_id_country` (`id_country`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;

-- Table structure for table `ps_partner_lang`

CREATE TABLE IF NOT EXISTS `ps_partner_lang` (
  `id_partner` int(11) NOT NULL AUTO_INCREMENT,
  `id_lang` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `acronym` varchar(32) COLLATE utf8_general_ci DEFAULT NULL,
  `city` varchar(64) COLLATE utf8_general_ci DEFAULT NULL,
  `partner_info` TEXT COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_partner`,`id_lang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;



*/
class PartnerCore extends ObjectModel
{
	public $id;
	
	public $id_partner;

	public $id_country;

	public $id_partner_type;

 	public $name;
	
	public $acronym;

	public $city;
	
	public $partner_info;
	
	public $url;
	
	public $inputPartnerContacts;

	public $id_image = 'default';

	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table' => 'partner',
		'primary' => 'id_partner',
		'multilang' => true,
		'fields' => array(
			'id_partner_type' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
			'id_country' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
			'url' => 				array('type' => self::TYPE_STRING, 'lang' => false, 'validate' => 'isUrl', 'size' => 255),
			
			// Lang fields
			'name' => 				array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isString', 'size' => 255),
			'acronym' => 			array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isString', 'size' => 32),
			'city' => 				array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isString', 'size' => 64),
			'partner_info' => 		array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isCleanHtml')
		),
	);
	
		public function __construct($id_category = null, $id_lang = null, $id_shop = null)
	{
		parent::__construct($id_category, $id_lang, $id_shop);
		$this->id_image = ($this->id && file_exists(_PS_PARTNERS_IMG_DIR_.(int)$this->id.'.jpg')) ? (int)$this->id : false;
		$this->image_dir = _PS_PARTNERS_IMG_DIR_;
	}
		public function add($autodate = true, $null_values = true)
	{
		$this->updateContacts($this->inputPartnerContacts);
		$success = parent::add($autodate, $null_values);

		return $success;
	}	
	
	public function update($nullValues = false)
	{
		$this->updateContacts($this->inputPartnerContacts);
	 	return parent::update(true);
	}
		public function delete()
	{
		$this->deleteImage();
		if (parent::delete())
		{
			$this->cleanContacts();
		
			return true;
		}
		return false;
	}
	
	public static function getPartners($id_lang = null)
	{
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT DISTINCT p.*, pl.`name`, pl.`acronym`, pl.`city`,  cl.`name` AS country, ptl.`name` AS type, pl.partner_info
		FROM `'._DB_PREFIX_.'partner` p
		LEFT JOIN `'._DB_PREFIX_.'partner_lang` AS pl ON (p.`id_partner` = pl.`id_partner` AND pl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'partner_type` pt ON p.`id_partner_type` = pt.`id_partner_type`
		LEFT JOIN `'._DB_PREFIX_.'partner_type_lang` ptl ON (pt.`id_partner_type` = ptl.`id_partner_type` AND  ptl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'country_lang` cl ON (p.`id_country` = cl.`id_country` AND  cl.`id_lang` = '.(int)$id_lang.')
		ORDER BY pl.`name`, p.`id_partner` ASC');
	}
	public static function getPartnersByShop($id_lang = null,$id_shop)
	{
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		select * from (SELECT p.*, pl.`name`, pl.`acronym`, pl.`city`,  cl.`name` AS country, ptl.`name` AS type, pl.partner_info,group_concat(distinct cast(pie.id_shop as char)  separator "-") as shop
		FROM `'._DB_PREFIX_.'partner` p
		LEFT JOIN `'._DB_PREFIX_.'partner_lang` AS pl ON (p.`id_partner` = pl.`id_partner` AND pl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'partner_type` pt ON p.`id_partner_type` = pt.`id_partner_type`
		LEFT JOIN `'._DB_PREFIX_.'partner_type_lang` ptl ON (pt.`id_partner_type` = ptl.`id_partner_type` AND  ptl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'country_lang` cl ON (p.`id_country` = cl.`id_country` AND  cl.`id_lang` = '.(int)$id_lang.')
		LEFT join ps_project_partner ppp on ppp.id_partner=p.id_partner
		LEFT join (select pi.id_project, i.id_shop from `'._DB_PREFIX_.'project_initiative` pi
										left join `'._DB_PREFIX_.'initiative` i on i.id_initiative=pi.id_initiative
										) as pie on pie.id_project=ppp.id_project
		group by p.id_partner) x
		where x.shop is NULL or x.shop like ("%'.(int)$id_shop.'%")
		ORDER BY x.`name`, x.`id_partner` ASC');
	}


	public static function getPartner($id_partner,$id_lang = null)
	{
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT DISTINCT p.*, pl.`name`, pl.`acronym`, pl.`city`,  cl.`name` AS country, ptl.`name` AS type, pl.partner_info
		FROM `'._DB_PREFIX_.'partner` p
		LEFT JOIN `'._DB_PREFIX_.'partner_lang` AS pl ON (p.`id_partner` = pl.`id_partner` AND pl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'partner_type` pt ON p.`id_partner_type` = pt.`id_partner_type`
		LEFT JOIN `'._DB_PREFIX_.'partner_type_lang` ptl ON (pt.`id_partner_type` = ptl.`id_partner_type` AND  ptl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'country_lang` cl ON (p.`id_country` = cl.`id_country` AND  cl.`id_lang` = '.(int)$id_lang.')
		WHERE p.`id_partner`='.$id_partner.'
		ORDER BY pl.`name`, p.`id_partner` ASC');
	}

	public static function getPartnersByType($partner_type,$id_lang = null)
	{
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT DISTINCT p.*, pl.`name`, pl.`acronym`, pl.`city`,  cl.`name` AS country, ptl.`name` AS type, pl.partner_info
		FROM `'._DB_PREFIX_.'partner` p
		LEFT JOIN `'._DB_PREFIX_.'partner_lang` AS pl ON (p.`id_partner` = pl.`id_partner` AND pl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'partner_type_lang` ptl ON p.`id_partner_type` = ptl.`id_partner_type`
		LEFT JOIN `'._DB_PREFIX_.'country_lang` cl ON (p.`id_country` = cl.`id_country` AND  cl.`id_lang` = '.(int)$id_lang.')
		WHERE p.id_partner_type='.$partner_type.'
		ORDER BY pl.`name`, p.`id_partner` ASC');
	}
	public function getPartnersByTypeName($partner_type,$id_shop,$id_lang = null)
	{
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		select * from (SELECT p.*, pl.`name`, pl.`acronym`, pl.`city`,  cl.`name` AS country, ptl.`name` AS type, pl.partner_info,group_concat(distinct cast(pie.id_shop as char)  separator "-") as shop
		FROM `'._DB_PREFIX_.'partner` p
		LEFT JOIN `'._DB_PREFIX_.'partner_lang` AS pl ON (p.`id_partner` = pl.`id_partner` AND pl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'partner_type_lang` ptl ON (p.`id_partner_type` = ptl.`id_partner_type` AND  ptl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'country_lang` cl ON (p.`id_country` = cl.`id_country` AND  cl.`id_lang` = '.(int)$id_lang.')
		INNER join ps_project_partner ppp on ppp.id_partner=p.id_partner
		LEFT join (select pi.id_project, i.id_shop from `'._DB_PREFIX_.'project_initiative` pi
										left join `'._DB_PREFIX_.'initiative` i on i.id_initiative=pi.id_initiative
										) as pie on pie.id_project=ppp.id_project
		where ptl.name="'.$partner_type.'"								
		group by p.id_partner) x
		where x.shop is NULL or x.shop like ("%'.(int)$id_shop.'%") 
		ORDER BY x.`name`, x.`id_partner` ASC');
	}
	public function getTypeAndCountry($id_lang = null){
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT DISTINCT cl.`name` AS country, ptl.`name` AS type
		FROM `'._DB_PREFIX_.'partner` p
		LEFT JOIN `'._DB_PREFIX_.'partner_type` pt ON p.`id_partner_type` = pt.`id_partner_type`
		LEFT JOIN `'._DB_PREFIX_.'partner_type_lang` ptl ON (pt.`id_partner_type` = ptl.`id_partner_type` AND  ptl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'country_lang` cl ON (p.`id_country` = cl.`id_country` AND  cl.`id_lang` = '.(int)$id_lang.')');
	}
	public function getPartnerContacts($id_partner = null){
		if (!$id_partner)
			$id_partner = (int)$this->id_partner;
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT c.*
		FROM `'._DB_PREFIX_.'partner_contact` pc
		LEFT JOIN `'._DB_PREFIX_.'customer` c on c.id_customer=pc.id_contact		
		WHERE pc.id_partner='.$id_partner);
	}
	
	public function cleanContacts()
	{
		Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'partner_contact` WHERE `id_partner` = '.(int)$this->id);
	}
	

	private function updateContacts($contact_ids){
	if ($contact_ids && !empty($contact_ids))
		{
			$exploded = explode('-', substr($contact_ids, 0, -1));
			foreach ($exploded as $item)
				$contacts[] = $item;
		}
	
	$this->cleanContacts();
	if($contacts and !empty($contacts))
	{
	foreach ($contacts as $contact)
		{
			$row = array('id_partner' => (int)$this->id, 'id_contact' => (int)$contact);
			Db::getInstance()->insert('partner_contact', $row);
		}
	}
	}
}
