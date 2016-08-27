<?php

define('_PS_ADMIN_DIR_', getcwd());
include(_PS_ADMIN_DIR_.'/../config/config.inc.php');
/* Getting cookie or logout */
require_once(dirname(__FILE__).'/init.php');

$query = Tools::getValue('q', false);
if (!$query OR $query == '' OR strlen($query) < 1)
	die();

$excludeIds = Tools::getValue('excludeIds', false);
if ($excludeIds && $excludeIds != 'NaN')
{
	$excludeIds = implode(',', array_map('intval', explode('-', $excludeIds)));
}
else
	$excludeIds = '';
	
$sql = 'SELECT id_customer, firstname, lastname
		FROM `'._DB_PREFIX_.'customer` c
		WHERE deleted = 0 AND (firstname LIKE \'%'.pSQL($query).'%\' OR concat(firstname," ",lastname) like \''.pSQL($query).'%\')'.
    (!empty($excludeIds) ? ' AND id_customer NOT IN ('.$excludeIds.') ' : ' ');
$items = Db::getInstance()->executeS($sql);

if ($items)
	foreach ($items AS $item)
		echo trim($item['firstname'].' '.$item['lastname']).'|'.(int)($item['id_customer'])."\n";

$sql = 'SELECT id_customer, firstname, lastname
		FROM `'._DB_PREFIX_.'customer` c
		WHERE deleted = 0 AND (lastname LIKE \'%'.pSQL($query).'%\' OR concat(lastname," ",firstname) like \''.pSQL($query).'%\')'.
		(!empty($excludeIds) ? ' AND id_customer NOT IN ('.$excludeIds.') ' : ' ');
$items = Db::getInstance()->executeS($sql);

if ($items)
	foreach ($items AS $item)
		echo trim($item['lastname'].' '.$item['firstname']).'|'.(int)($item['id_customer'])."\n";

