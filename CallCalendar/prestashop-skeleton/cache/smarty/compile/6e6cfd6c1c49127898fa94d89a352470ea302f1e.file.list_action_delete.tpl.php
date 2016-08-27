<?php /* Smarty version Smarty-3.1.8, created on 2013-05-27 18:37:52
         compiled from "/www/htdocs/mrtc/testIDT/adm/themes/idt/template/helpers/list/list_action_delete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28052804051a38be0b33d95-94131955%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e6cfd6c1c49127898fa94d89a352470ea302f1e' => 
    array (
      0 => '/www/htdocs/mrtc/testIDT/adm/themes/idt/template/helpers/list/list_action_delete.tpl',
      1 => 1348647540,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28052804051a38be0b33d95-94131955',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'confirm' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51a38be0b702f6_03286817',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a38be0b702f6_03286817')) {function content_51a38be0b702f6_03286817($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" class="delete" <?php if (isset($_smarty_tpl->tpl_vars['confirm']->value)){?>onclick="if (confirm('<?php echo $_smarty_tpl->tpl_vars['confirm']->value;?>
')){ return true; }else{ event.stopPropagation(); event.preventDefault();};"<?php }?> title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
	<img src="../img/admin/delete.gif" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>