<?php /* Smarty version Smarty-3.1.13, created on 2014-10-24 17:18:32
         compiled from "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC9\data\localweb\prestashop-skeleton\back-office\themes\idt\template\controllers\home\content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11597544a4e05a52ef6-15981808%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '34a1c425d8e5882e2f15cbb9f157089c698e9432' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC9\\data\\localweb\\prestashop-skeleton\\back-office\\themes\\idt\\template\\controllers\\home\\content.tpl',
      1 => 1414163893,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11597544a4e05a52ef6-15981808',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_544a4e05a7a036_50440806',
  'variables' => 
  array (
    'tips_optimization' => 0,
    'customers_service' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544a4e05a7a036_50440806')) {function content_544a4e05a7a036_50440806($_smarty_tpl) {?><div class="pageTitleHome">
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