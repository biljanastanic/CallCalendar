<?php /* Smarty version Smarty-3.1.8, created on 2013-05-28 14:19:52
         compiled from "/www/htdocs/es/adm/themes/idt/template/controllers/home/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1953591551a4a0e8689390-92051403%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '128ce017e6ebeda81b9e14990680cb55869bc109' => 
    array (
      0 => '/www/htdocs/es/adm/themes/idt/template/controllers/home/content.tpl',
      1 => 1367933304,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1953591551a4a0e8689390-92051403',
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
  'unifunc' => 'content_51a4a0e86d5f37_61994968',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a4a0e86d5f37_61994968')) {function content_51a4a0e86d5f37_61994968($_smarty_tpl) {?><div class="pageTitleHome">
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