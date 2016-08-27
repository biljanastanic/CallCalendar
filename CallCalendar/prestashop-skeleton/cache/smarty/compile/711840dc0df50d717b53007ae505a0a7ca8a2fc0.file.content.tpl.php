<?php /* Smarty version Smarty-3.1.13, created on 2014-12-01 13:45:30
         compiled from "C:\xampp\htdocs\CallCalendar\prestashop-skeleton\back-office\themes\idt\template\controllers\home\content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22012547c62ea5d0654-68578032%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '711840dc0df50d717b53007ae505a0a7ca8a2fc0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CallCalendar\\prestashop-skeleton\\back-office\\themes\\idt\\template\\controllers\\home\\content.tpl',
      1 => 1417109202,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22012547c62ea5d0654-68578032',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tips_optimization' => 0,
    'customers_service' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_547c62ea6fd324_17567072',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547c62ea6fd324_17567072')) {function content_547c62ea6fd324_17567072($_smarty_tpl) {?><div class="pageTitleHome">
	<span><h3><?php echo smartyTranslate(array('s'=>'Dashboard'),$_smarty_tpl);?>
</h3></span>
</div>
<div id="dashboard">
<div id="homepage">
	<div id="column_left">
		<?php echo $_smarty_tpl->tpl_vars['tips_optimization']->value;?>

	</div>

	<div id="column_right">
		<?php echo $_smarty_tpl->tpl_vars['customers_service']->value;?>

	</div>
</div>
	<div class="clear">&nbsp;</div>
	
	</div>
<?php }} ?>