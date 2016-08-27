<?php /* Smarty version Smarty-3.1.8, created on 2013-05-06 08:33:36
         compiled from "/www/htdocs/mrtc/testIDT/themes/ipr/mobile/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:159157669351874ec0396306-98296476%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5625d96dac453d3a698f82f12f3f83bc9a38dda4' => 
    array (
      0 => '/www/htdocs/mrtc/testIDT/themes/ipr/mobile/index.tpl',
      1 => 1348647628,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159157669351874ec0396306-98296476',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51874ec03bea66_38702610',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51874ec03bea66_38702610')) {function content_51874ec03bea66_38702610($_smarty_tpl) {?>
	<div data-role="content" id="content">
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"DisplayMobileIndex"),$_smarty_tpl);?>

		<?php echo $_smarty_tpl->getSubTemplate ('./sitemap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div><!-- /content -->
<?php }} ?>