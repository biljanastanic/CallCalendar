<?php /* Smarty version Smarty-3.1.8, created on 2013-05-27 18:37:56
         compiled from "/www/htdocs/mrtc/testIDT/adm/themes/idt/template/controllers/home/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:139541607151a38be4470850-81554583%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ec84b89b7dff3858c338873f06572e24d4c3434' => 
    array (
      0 => '/www/htdocs/mrtc/testIDT/adm/themes/idt/template/controllers/home/content.tpl',
      1 => 1367933304,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '139541607151a38be4470850-81554583',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tips_optimization' => 0,
    'customers_service' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51a38be448e9f8_75810322',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a38be448e9f8_75810322')) {function content_51a38be448e9f8_75810322($_smarty_tpl) {?><div class="pageTitleHome">
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