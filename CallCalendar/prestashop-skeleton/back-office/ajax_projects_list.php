<?php

define('_PS_ADMIN_DIR_', getcwd());
include(_PS_ADMIN_DIR_.'/../config/config.inc.php');
/* Getting cookie or logout */
require_once(dirname(__FILE__).'/init.php');

$query = Tools::getValue('q', false);
if (!$query OR $query == '' OR strlen($query) < 1)
	die();

$sql = 'SELECT p.id_project, pl.name, ptl.name as type
		FROM `'._DB_PREFIX_.'project p
        left join  `'._DB_PREFIX_.'project_lang pl on (p.id_project=pl.id_project and pl.id_lang=1)
        left join  `'._DB_PREFIX_.'project_type_lang ptl (on p.id_project_type=ptl.id_project_type and ptl.id_lang=1)
		WHERE pl.name like("%'.pSQL($query).'%") or pl.acronym like("%'.pSQL($query).'%")';
		
$items = Db::getInstance()->executeS($sql);

if ($items)
	foreach ($items AS $item)
		echo trim($item['name']).'|'.(int)($item['id_project']).'|'.trim($item['type'])"\n";
