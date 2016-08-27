<?php /* Smarty version Smarty-3.1.13, created on 2014-11-30 18:22:36
         compiled from "C:\xampp\htdocs\CallCalendar\prestashop-skeleton\back-office\themes\idt\template\helpers\list\list_action_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20554547b525c86d049-72185669%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c5ba09e401a5eb121d7f4cecae2f53fb59a8ba1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CallCalendar\\prestashop-skeleton\\back-office\\themes\\idt\\template\\helpers\\list\\list_action_edit.tpl',
      1 => 1417109203,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20554547b525c86d049-72185669',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_547b525c87ca41_29128661',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547b525c87ca41_29128661')) {function content_547b525c87ca41_29128661($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" class="edit" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
	<img src="../img/admin/edit.gif" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>