<?php
/*

CREATE TABLE `ps_call_attachment` (
  `id_call` int(10) unsigned NOT NULL,
  `id_attachment` int(10) unsigned NOT NULL,
  `date_of_upload` date NOT NULL,
  `id_call_attachment` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_call_attachment`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

*/
class CallAttachmentCore extends ObjectModel
{
	public $id;
	
	public $id_call;

	public $id_attachment;

	public $date_of_upload;
	
	public $id_call_attachment;

 	
	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table' => 'call_attachment',
		'primary' => 'id_call_attachment',
		'multilang' => false,
		'fields' => array(
	
			'id_call' => array('type' => self::TYPE_INT,  'required' => true,'validate' => 'isUnsignedId'),
			'id_attachment' => array('type' => self::TYPE_INT,  'required' => true,'validate' => 'isUnsignedId'),
			'id_call_attachment' => array('type' => self::TYPE_INT,  'required' => false,'validate' => 'isUnsignedId'),

			
			'date_of_upload' => 	array('type' => self::TYPE_DATE,'required' => true, 'validate' => 'isDate'),


		),
	);



	/**
	 * 
	 * Static function for getting all call's attachments
	 * 
	 */
	public static function getAttachments($id_lang = 0, $id_call, $include = true)
	{

		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');

		return Db::getInstance()->executeS('
			SELECT a.`id_attachment`, a.`file_name`, a.`file`, a.`mime`, al.`name`, al.`description`
			FROM '._DB_PREFIX_.'attachment a
			LEFT JOIN '._DB_PREFIX_.'attachment_lang al ON (a.id_attachment = al.id_attachment AND al.id_lang = '.(int)$id_lang.')
			WHERE a.id_attachment '.($include ? 'IN' : 'NOT IN').' (
				SELECT ca.id_attachment
				FROM '._DB_PREFIX_.'call_attachment ca
				WHERE id_call = '.(int)$id_call.'
			)'
		);
	}
	
}
