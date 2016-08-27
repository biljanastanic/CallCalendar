<?php /* Smarty version Smarty-3.1.13, created on 2014-10-24 15:07:56
         compiled from "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC9\data\localweb\prestashop-skeleton\back-office\themes\idt\template\helpers\list\list_action_delete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:848544a4f2c09c8f3-66991185%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '775912f8e4c11df1d1507183dfc1f3da403d0f7b' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC9\\data\\localweb\\prestashop-skeleton\\back-office\\themes\\idt\\template\\helpers\\list\\list_action_delete.tpl',
      1 => 1348647540,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '848544a4f2c09c8f3-66991185',
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
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_544a4f2c13cf18_95547442',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544a4f2c13cf18_95547442')) {function content_544a4f2c13cf18_95547442($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" class="delete" <?php if (isset($_smarty_tpl->tpl_vars['confirm']->value)){?>onclick="if (confirm('<?php echo $_smarty_tpl->tpl_vars['confirm']->value;?>
')){ return true; }else{ event.stopPropagation(); event.preventDefault();};"<?php }?> title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
	<img src="../img/admin/delete.gif" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>