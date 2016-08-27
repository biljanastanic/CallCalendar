<?php /* Smarty version Smarty-3.1.8, created on 2013-05-28 13:47:10
         compiled from "/www/htdocs/mrtc/testIDT/adm/themes/idt-user/template/helpers/list/list_action_enable.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12656340651a4993e25b791-35101282%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6b9a77d7f7a722eb0d84799e8db93ea1fc15479' => 
    array (
      0 => '/www/htdocs/mrtc/testIDT/adm/themes/idt-user/template/helpers/list/list_action_enable.tpl',
      1 => 1348647540,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12656340651a4993e25b791-35101282',
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
  'unifunc' => 'content_51a4993e2e3d67_04117063',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a4993e2e3d67_04117063')) {function content_51a4993e2e3d67_04117063($_smarty_tpl) {?>

<a href="<?php echo $_smarty_tpl->tpl_vars['url_enable']->value;?>
" <?php if (isset($_smarty_tpl->tpl_vars['confirm']->value)){?>onclick="return confirm('<?php echo $_smarty_tpl->tpl_vars['confirm']->value;?>
');"<?php }?> title="<?php if ($_smarty_tpl->tpl_vars['enabled']->value){?><?php echo smartyTranslate(array('s'=>'Enabled'),$_smarty_tpl);?>
<?php }else{ ?><?php echo smartyTranslate(array('s'=>'Disabled'),$_smarty_tpl);?>
<?php }?>">
	<img src="../img/admin/<?php if ($_smarty_tpl->tpl_vars['enabled']->value){?>enabled.gif<?php }else{ ?>disabled.gif<?php }?>" alt="<?php if ($_smarty_tpl->tpl_vars['enabled']->value){?><?php echo smartyTranslate(array('s'=>'Enabled'),$_smarty_tpl);?>
<?php }else{ ?><?php echo smartyTranslate(array('s'=>'Disabled'),$_smarty_tpl);?>
<?php }?>" />
</a>
<?php }} ?>