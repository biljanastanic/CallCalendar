<?php /* Smarty version Smarty-3.1.8, created on 2013-05-28 14:25:18
         compiled from "/www/htdocs/es/adm/themes/idt/template/helpers/list/list_action_enable.tpl" */ ?>
<?php /*%%SmartyHeaderCode:156018872751a4a22e335593-01632875%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '719543394607aafae55da08f201d1d46d548cba4' => 
    array (
      0 => '/www/htdocs/es/adm/themes/idt/template/helpers/list/list_action_enable.tpl',
      1 => 1363171080,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '156018872751a4a22e335593-01632875',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url_enable' => 0,
    'confirm' => 0,
    'enabled' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51a4a22e39ef14_78841814',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a4a22e39ef14_78841814')) {function content_51a4a22e39ef14_78841814($_smarty_tpl) {?>

<!--a href="<?php echo $_smarty_tpl->tpl_vars['url_enable']->value;?>
" <?php if (isset($_smarty_tpl->tpl_vars['confirm']->value)){?>onclick="return confirm('<?php echo $_smarty_tpl->tpl_vars['confirm']->value;?>
');"<?php }?> title="<?php if ($_smarty_tpl->tpl_vars['enabled']->value){?><?php echo smartyTranslate(array('s'=>'Enabled'),$_smarty_tpl);?>
<?php }else{ ?><?php echo smartyTranslate(array('s'=>'Disabled'),$_smarty_tpl);?>
<?php }?>"-->
	<img src="../img/admin/<?php if ($_smarty_tpl->tpl_vars['enabled']->value){?>enabled.gif<?php }else{ ?>disabled.gif<?php }?>" alt="<?php if ($_smarty_tpl->tpl_vars['enabled']->value){?><?php echo smartyTranslate(array('s'=>'Enabled'),$_smarty_tpl);?>
<?php }else{ ?><?php echo smartyTranslate(array('s'=>'Disabled'),$_smarty_tpl);?>
<?php }?>" />
<!--/a-->
<?php }} ?>