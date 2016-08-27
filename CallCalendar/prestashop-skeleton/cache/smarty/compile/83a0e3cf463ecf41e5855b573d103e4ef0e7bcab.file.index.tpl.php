<?php /* Smarty version Smarty-3.1.8, created on 2013-05-06 09:46:16
         compiled from "/www/htdocs/mrtc/testIDT/themes/es/mobile/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:153428587551875fc8e8f7c8-23117249%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83a0e3cf463ecf41e5855b573d103e4ef0e7bcab' => 
    array (
      0 => '/www/htdocs/mrtc/testIDT/themes/es/mobile/index.tpl',
      1 => 1348647628,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '153428587551875fc8e8f7c8-23117249',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51875fc8eb37c1_55651751',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51875fc8eb37c1_55651751')) {function content_51875fc8eb37c1_55651751($_smarty_tpl) {?>
	<div data-role="content" id="content">
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"DisplayMobileIndex"),$_smarty_tpl);?>

		<?php echo $_smarty_tpl->getSubTemplate ('./sitemap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div><!-- /content -->
<?php }} ?>