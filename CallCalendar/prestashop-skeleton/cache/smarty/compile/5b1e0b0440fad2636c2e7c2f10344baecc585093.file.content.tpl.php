<?php /* Smarty version Smarty-3.1.13, created on 2014-10-24 14:56:23
         compiled from "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC9\data\localweb\prestashop-skeleton\adm\themes\idt\template\controllers\home\content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21930544a4c77607464-49434783%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b1e0b0440fad2636c2e7c2f10344baecc585093' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC9\\data\\localweb\\prestashop-skeleton\\adm\\themes\\idt\\template\\controllers\\home\\content.tpl',
      1 => 1367933304,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21930544a4c77607464-49434783',
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
  'unifunc' => 'content_544a4c77670c64_44462401',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544a4c77670c64_44462401')) {function content_544a4c77670c64_44462401($_smarty_tpl) {?><div class="pageTitleHome">
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
<div id="PartnerMapsSync">
<a href="#" onclick="javascript:window.open('../fusion.php','Partners Map synchronization','width=500,height=350')">Synchronise Partners with google Maps</a></div>
</div>
	<div class="clear">&nbsp;</div>
	
	</div>
<?php }} ?>