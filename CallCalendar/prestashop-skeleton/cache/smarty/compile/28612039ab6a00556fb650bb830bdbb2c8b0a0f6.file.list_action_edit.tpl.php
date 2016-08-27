<?php /* Smarty version Smarty-3.1.8, created on 2013-05-28 13:48:27
         compiled from "/www/htdocs/mrtc/testIDT/adm/themes/idt-user/template/helpers/list/list_action_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:103203519951a4998b5a48d8-67627094%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '28612039ab6a00556fb650bb830bdbb2c8b0a0f6' => 
    array (
      0 => '/www/htdocs/mrtc/testIDT/adm/themes/idt-user/template/helpers/list/list_action_edit.tpl',
      1 => 1348647540,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '103203519951a4998b5a48d8-67627094',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51a4998b5c1f54_41740773',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a4998b5c1f54_41740773')) {function content_51a4998b5c1f54_41740773($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" class="edit" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
	<img src="../img/admin/edit.gif" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>