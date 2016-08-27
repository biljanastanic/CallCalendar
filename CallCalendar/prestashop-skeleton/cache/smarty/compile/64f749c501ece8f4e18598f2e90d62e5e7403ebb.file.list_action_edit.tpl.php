<?php /* Smarty version Smarty-3.1.8, created on 2013-05-27 18:37:52
         compiled from "/www/htdocs/mrtc/testIDT/adm/themes/idt/template/helpers/list/list_action_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:153597833951a38be0af79f7-60336871%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64f749c501ece8f4e18598f2e90d62e5e7403ebb' => 
    array (
      0 => '/www/htdocs/mrtc/testIDT/adm/themes/idt/template/helpers/list/list_action_edit.tpl',
      1 => 1348647540,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '153597833951a38be0af79f7-60336871',
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
  'unifunc' => 'content_51a38be0b161e2_66395841',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a38be0b161e2_66395841')) {function content_51a38be0b161e2_66395841($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" class="edit" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
	<img src="../img/admin/edit.gif" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>