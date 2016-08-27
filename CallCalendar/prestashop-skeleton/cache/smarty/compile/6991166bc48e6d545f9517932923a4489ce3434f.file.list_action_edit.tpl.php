<?php /* Smarty version Smarty-3.1.8, created on 2012-09-27 15:36:21
         compiled from "/www/htdocs/mrtc/testIDT/adm/themes/default/template/helpers/list/list_action_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:174404455050645655782ec2-65237507%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6991166bc48e6d545f9517932923a4489ce3434f' => 
    array (
      0 => '/www/htdocs/mrtc/testIDT/adm/themes/default/template/helpers/list/list_action_edit.tpl',
      1 => 1348647540,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '174404455050645655782ec2-65237507',
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
  'unifunc' => 'content_5064565579b9d9_80900596',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5064565579b9d9_80900596')) {function content_5064565579b9d9_80900596($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" class="edit" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
	<img src="../img/admin/edit.gif" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>