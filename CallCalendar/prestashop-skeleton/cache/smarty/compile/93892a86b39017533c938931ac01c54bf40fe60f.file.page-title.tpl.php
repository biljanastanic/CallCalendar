<?php /* Smarty version Smarty-3.1.8, created on 2013-05-03 20:45:01
         compiled from "/www/htdocs/mrtc/testIDT/themes/ipr/mobile/page-title.tpl" */ ?>
<?php /*%%SmartyHeaderCode:456551850518405ad535891-35903534%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93892a86b39017533c938931ac01c54bf40fe60f' => 
    array (
      0 => '/www/htdocs/mrtc/testIDT/themes/ipr/mobile/page-title.tpl',
      1 => 1348647629,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '456551850518405ad535891-35903534',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_title' => 0,
    'meta_title' => 0,
    'shop_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_518405ad59a094_38501780',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_518405ad59a094_38501780')) {function content_518405ad59a094_38501780($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/www/htdocs/mrtc/testIDT/tools/smarty/plugins/modifier.escape.php';
?><?php if (!isset($_smarty_tpl->tpl_vars['page_title']->value)&&isset($_smarty_tpl->tpl_vars['meta_title']->value)&&$_smarty_tpl->tpl_vars['meta_title']->value!=$_smarty_tpl->tpl_vars['shop_name']->value){?>
	<?php $_smarty_tpl->tpl_vars['page_title'] = new Smarty_variable(smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_title']->value, 'htmlall', 'UTF-8'), null, 0);?>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['page_title']->value)){?>
	<div data-role="header" class="clearfix navbartop" data-position="inline">
		<h1><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
</h1>
	</div><!-- /navbartop -->
<?php }?><?php }} ?>