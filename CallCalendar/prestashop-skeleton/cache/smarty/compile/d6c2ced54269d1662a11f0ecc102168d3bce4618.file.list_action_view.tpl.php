<?php /* Smarty version Smarty-3.1.8, created on 2013-05-06 16:43:35
         compiled from "/www/htdocs/mrtc/testIDT/adm/themes/idt-user/template/helpers/list/list_action_view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19019238085187c197c4c952-70613601%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd6c2ced54269d1662a11f0ecc102168d3bce4618' => 
    array (
      0 => '/www/htdocs/mrtc/testIDT/adm/themes/idt-user/template/helpers/list/list_action_view.tpl',
      1 => 1348647540,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19019238085187c197c4c952-70613601',
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
  'unifunc' => 'content_5187c197c675b0_96197797',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5187c197c675b0_96197797')) {function content_5187c197c675b0_96197797($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" >
	<img src="../img/admin/details.gif" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>