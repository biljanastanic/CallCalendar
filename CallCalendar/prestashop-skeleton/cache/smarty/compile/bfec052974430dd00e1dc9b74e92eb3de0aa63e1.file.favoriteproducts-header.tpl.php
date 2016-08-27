<?php /* Smarty version Smarty-3.1.8, created on 2012-09-26 11:31:40
         compiled from "/www/htdocs/mrtc/testIDT/modules/favoriteproducts/views/templates/hook/favoriteproducts-header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16241223995062cb7c031081-21062956%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bfec052974430dd00e1dc9b74e92eb3de0aa63e1' => 
    array (
      0 => '/www/htdocs/mrtc/testIDT/modules/favoriteproducts/views/templates/hook/favoriteproducts-header.tpl',
      1 => 1348647606,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16241223995062cb7c031081-21062956',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5062cb7c0c7455_35418095',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5062cb7c0c7455_35418095')) {function content_5062cb7c0c7455_35418095($_smarty_tpl) {?>
<script type="text/javascript">
	var favorite_products_url_add = '<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('favoriteproducts','actions',array('process'=>'add'),true);?>
';
	var favorite_products_url_remove = '<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('favoriteproducts','actions',array('process'=>'remove'),true);?>
';
<?php if (isset($_GET['id_product'])){?>
	var favorite_products_id_product = '<?php echo intval($_GET['id_product']);?>
';
<?php }?> 
</script>
<?php }} ?>