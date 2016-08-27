<?php

define('_PS_ADMIN_DIR_', getcwd());
include(_PS_ADMIN_DIR_.'/../config/config.inc.php');
/* Getting cookie or logout */
require_once(dirname(__FILE__).'/init.php');

$query = Tools::getValue('q', false);
if (!$query OR $query == '' OR strlen($query) < 1)
	die();

$sql = 'SELECT id_partner, name
		FROM `'._DB_PREFIX_.'partner_lang`
		WHERE id_lang=1 and name like("%'.pSQL($query).'%")';
		
$items = Db::getInstance()->executeS($sql);

if ($items)
	foreach ($items AS $item)
		echo trim($item['name']).'|'.(int)($item['id_partner'])."\n";
