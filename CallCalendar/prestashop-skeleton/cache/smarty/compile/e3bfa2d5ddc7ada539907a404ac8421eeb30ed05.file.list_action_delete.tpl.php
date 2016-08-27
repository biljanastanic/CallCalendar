<?php /* Smarty version Smarty-3.1.8, created on 2013-05-28 14:25:18
         compiled from "/www/htdocs/es/adm/themes/idt/template/helpers/list/list_action_delete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:66610398351a4a22e2de384-54784333%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3bfa2d5ddc7ada539907a404ac8421eeb30ed05' => 
    array (
      0 => '/www/htdocs/es/adm/themes/idt/template/helpers/list/list_action_delete.tpl',
      1 => 1348647540,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '66610398351a4a22e2de384-54784333',
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
  'unifunc' => 'content_51a4a22e316618_37434887',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a4a22e316618_37434887')) {function content_51a4a22e316618_37434887($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" class="delete" <?php if (isset($_smarty_tpl->tpl_vars['confirm']->value)){?>onclick="if (confirm('<?php echo $_smarty_tpl->tpl_vars['confirm']->value;?>
')){ return true; }else{ event.stopPropagation(); event.preventDefault();};"<?php }?> title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
	<img src="../img/admin/delete.gif" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>