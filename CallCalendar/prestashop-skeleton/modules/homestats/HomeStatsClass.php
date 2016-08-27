<?php

class HomeStatsClass extends ObjectModel
{
	/** @var integer editorial id*/
	public $id;
	
	/** @var integer editorial id shop*/
	public $id_shop;
	
	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'fields' => array(
			'id_shop' =>				array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => true),
		)
	);
	
	static public function getByIdShop($id_shop)
	{
		return 'asdf';
	}
}
