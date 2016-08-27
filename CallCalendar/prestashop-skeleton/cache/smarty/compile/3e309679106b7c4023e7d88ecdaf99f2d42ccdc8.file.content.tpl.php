<?php /* Smarty version Smarty-3.1.8, created on 2013-05-06 16:43:49
         compiled from "/www/htdocs/mrtc/testIDT/adm/themes/idt-user/template/controllers/modules/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14424399405187c1a5519a18-89687535%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e309679106b7c4023e7d88ecdaf99f2d42ccdc8' => 
    array (
      0 => '/www/htdocs/mrtc/testIDT/adm/themes/idt-user/template/controllers/modules/content.tpl',
      1 => 1348647538,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14424399405187c1a5519a18-89687535',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module_content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5187c1a5608d38_13603500',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5187c1a5608d38_13603500')) {function content_5187c1a5608d38_13603500($_smarty_tpl) {?>


<?php if (isset($_smarty_tpl->tpl_vars['module_content']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['module_content']->value;?>

<?php }else{ ?>
	<?php if (!isset($_GET['configure'])){?>
		<?php echo $_smarty_tpl->getSubTemplate ('controllers/modules/js.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<?php if (isset($_GET['select'])&&$_GET['select']=='favorites'){?>
			<?php echo $_smarty_tpl->getSubTemplate ('controllers/modules/favorites.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<?php }else{ ?>
			<?php echo $_smarty_tpl->getSubTemplate ('controllers/modules/page.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<?php }?>
	<?php }?>
<?php }?>
<?php }} ?>