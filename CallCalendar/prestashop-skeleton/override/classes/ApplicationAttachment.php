<?php
/*

CREATE TABLE `ps_application_attachment` (
  `id_application_attachment` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_application` int(10) unsigned NOT NULL,
  `id_attachment` int(10) unsigned NOT NULL,
  `description` text NOT NULL,
  `date_of_upload` date NOT NULL,
  PRIMARY KEY (`id_application_attachment`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

*/
class ApplicationAttachmentCore extends ObjectModel
{
	public $id_application_attachment;
	
	public $id_application;

	public $id_attachment;

	public $description;

	public $date_of_upload;

	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table' => 'application_attachment',
		'primary' => 'id_application_attachment',
		'multilang' => false,
		'fields' => array(
			'id_application' => array('type' => self::TYPE_INT,  'required' => true,'validate' => 'isUnsignedId'),
			'id_attachment' => array('type' => self::TYPE_INT,  'required' => true,'validate' => 'isUnsignedId'),
			'id_application_attachment' => array('type' => self::TYPE_INT,  'required' => false,'validate' => 'isUnsignedId'),
			'description' => 				array('type' => self::TYPE_HTML, 'required' => true, 'validate' => 'isCleanHtml'),
			'date_of_upload' => 	array('type' => self::TYPE_DATE, 'required' => true, 'validate' => 'isDate'),
		),
	);

	
	/**
	 * 
	 * Get all application's attachemts
	 * 
	 */
	public static function getAttachments($id_lang = 0, $id_application, $include = true)
	{

		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');

		return Db::getInstance()->executeS('
			SELECT a.`id_attachment`, a.`file_name`, a.`file`, a.`mime`, al.`name`, al.`description`
			FROM '._DB_PREFIX_.'attachment a
			LEFT JOIN '._DB_PREFIX_.'attachment_lang al ON (a.id_attachment = al.id_attachment AND al.id_lang = '.(int)$id_lang.')
			WHERE a.id_attachment '.($include ? 'IN' : 'NOT IN').' (
				SELECT aa.id_attachment
				FROM '._DB_PREFIX_.'application_attachment aa
				WHERE id_application = '.(int)$id_application.'
			)'
		);
	}
	
}
