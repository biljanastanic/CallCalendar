<?php /* Smarty version Smarty-3.1.8, created on 2013-05-06 08:33:36
         compiled from "/www/htdocs/mrtc/testIDT/themes/ipr/mobile/sitemap.tpl" */ ?>
<?php /*%%SmartyHeaderCode:166367494051874ec03e05d1-41324726%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a097b0af4374d1c9d83b46f19de1a6ab312a4865' => 
    array (
      0 => '/www/htdocs/mrtc/testIDT/themes/ipr/mobile/sitemap.tpl',
      1 => 1348647629,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '166367494051874ec03e05d1-41324726',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'categoriesTree' => 0,
    'i' => 0,
    'child' => 0,
    'controller_name' => 0,
    'link' => 0,
    'PS_CATALOG_MODE' => 0,
    'display_manufacturer_link' => 0,
    'PS_DISPLAY_SUPPLIERS' => 0,
    'display_supplier_link' => 0,
    'voucherAllowed' => 0,
    'categoriescmsTree' => 0,
    'cms' => 0,
    'display_store' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51874ec075ae37_44188975',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51874ec075ae37_44188975')) {function content_51874ec075ae37_44188975($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/www/htdocs/mrtc/testIDT/tools/smarty/plugins/modifier.escape.php';
?>
<div id="hook_mobile_top_site_map">
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayMobileTopSiteMap"),$_smarty_tpl);?>

</div>
<hr width="99%" align="center" size="2" class=""/>

<?php if (isset($_smarty_tpl->tpl_vars['categoriesTree']->value['children'])){?>
	<h2><?php echo smartyTranslate(array('s'=>'Our offers'),$_smarty_tpl);?>
</h2>

	<ul data-role="listview" data-inset="true">
		<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 4+1 - (0) : 0-(4)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
			<?php if (isset($_smarty_tpl->tpl_vars['categoriesTree']->value['children'][$_smarty_tpl->tpl_vars['i']->value])){?>
				<li data-icon="arrow-d">
					<a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['categoriesTree']->value['children'][$_smarty_tpl->tpl_vars['i']->value]['link'], 'htmlall', 'UTF-8');?>
" title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['categoriesTree']->value['children'][$_smarty_tpl->tpl_vars['i']->value]['desc'], 'htmlall', 'UTF-8');?>
" data-ajax="false">
						<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['categoriesTree']->value['children'][$_smarty_tpl->tpl_vars['i']->value]['name'], 'htmlall', 'UTF-8');?>

					</a>
				</li>
			<?php }?>
		<?php }} ?>
		<li>
			<?php echo smartyTranslate(array('s'=>'All categories'),$_smarty_tpl);?>

			<ul data-role="listview" data-inset="true">
				<?php  $_smarty_tpl->tpl_vars['child'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['child']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categoriesTree']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['child']->key => $_smarty_tpl->tpl_vars['child']->value){
$_smarty_tpl->tpl_vars['child']->_loop = true;
?>
					<?php echo $_smarty_tpl->getSubTemplate ("./category-tree-branch.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('node'=>$_smarty_tpl->tpl_vars['child']->value,'last'=>'true'), 0);?>

				<?php } ?>
			</ul>
		</li>
	</ul>
<?php }?>

<hr width="99%" align="center" size="2" class=""/>
<h2><?php echo smartyTranslate(array('s'=>'Sitemap'),$_smarty_tpl);?>
</h2>
<ul data-role="listview" data-inset="true" id="category">
	<?php if ($_smarty_tpl->tpl_vars['controller_name']->value!='index'){?><li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('index',true);?>
" data-ajax="false"><?php echo smartyTranslate(array('s'=>'Home'),$_smarty_tpl);?>
</a></li><?php }?>
	<li><?php echo smartyTranslate(array('s'=>'Our offers'),$_smarty_tpl);?>

		<ul data-role="listview" data-inset="true">
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('new-products');?>
" title="<?php echo smartyTranslate(array('s'=>'New products'),$_smarty_tpl);?>
" data-ajax="false"><?php echo smartyTranslate(array('s'=>'New products'),$_smarty_tpl);?>
</a></li>
			<?php if (!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value){?>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('prices-drop');?>
" title="<?php echo smartyTranslate(array('s'=>'Price drop'),$_smarty_tpl);?>
" data-ajax="false"><?php echo smartyTranslate(array('s'=>'Price drop'),$_smarty_tpl);?>
</a></li>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('best-sales',true);?>
" title="<?php echo smartyTranslate(array('s'=>'Top sellers'),$_smarty_tpl);?>
" data-ajax="false"><?php echo smartyTranslate(array('s'=>'Top sellers'),$_smarty_tpl);?>
</a></li>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['display_manufacturer_link']->value||$_smarty_tpl->tpl_vars['PS_DISPLAY_SUPPLIERS']->value){?><li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('manufacturer');?>
" data-ajax="false"><?php echo smartyTranslate(array('s'=>'Manufacturers'),$_smarty_tpl);?>
</a></li><?php }?>
			<?php if ($_smarty_tpl->tpl_vars['display_supplier_link']->value||$_smarty_tpl->tpl_vars['PS_DISPLAY_SUPPLIERS']->value){?><li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('supplier');?>
" data-ajax="false"><?php echo smartyTranslate(array('s'=>'Suppliers'),$_smarty_tpl);?>
</a></li><?php }?>
		</ul>
	</li>
	<li><?php echo smartyTranslate(array('s'=>'Your Account'),$_smarty_tpl);?>

		<ul data-role="listview" data-inset="true">
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true);?>
" data-ajax="false"><?php echo smartyTranslate(array('s'=>'Your Account'),$_smarty_tpl);?>
</a></li>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('identity',true);?>
" data-ajax="false"><?php echo smartyTranslate(array('s'=>'Personal information'),$_smarty_tpl);?>
</a></li>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('addresses',true);?>
" data-ajax="false"><?php echo smartyTranslate(array('s'=>'Addresses'),$_smarty_tpl);?>
</a></li>
			<?php if ($_smarty_tpl->tpl_vars['voucherAllowed']->value){?><li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('discount',true);?>
" data-ajax="false"><?php echo smartyTranslate(array('s'=>'Discounts'),$_smarty_tpl);?>
</a></li><?php }?>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('history',true);?>
" data-ajax="false"><?php echo smartyTranslate(array('s'=>'Order history'),$_smarty_tpl);?>
</a></li>
		</ul>
	</li>
	<li><?php echo smartyTranslate(array('s'=>'Pages'),$_smarty_tpl);?>

		<ul data-role="listview" data-inset="true">
			<?php if (isset($_smarty_tpl->tpl_vars['categoriescmsTree']->value['children'])){?>
				<?php  $_smarty_tpl->tpl_vars['child'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['child']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categoriescmsTree']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['child']->key => $_smarty_tpl->tpl_vars['child']->value){
$_smarty_tpl->tpl_vars['child']->_loop = true;
?>
					<?php if ((isset($_smarty_tpl->tpl_vars['child']->value['children'])&&count($_smarty_tpl->tpl_vars['child']->value['children'])>0)||count($_smarty_tpl->tpl_vars['child']->value['cms'])>0){?>
						<?php echo $_smarty_tpl->getSubTemplate ("./category-cms-tree-branch.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('node'=>$_smarty_tpl->tpl_vars['child']->value), 0);?>

					<?php }?>
				<?php } ?>
			<?php }?>
			<?php  $_smarty_tpl->tpl_vars['cms'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cms']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categoriescmsTree']->value['cms']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cms']->key => $_smarty_tpl->tpl_vars['cms']->value){
$_smarty_tpl->tpl_vars['cms']->_loop = true;
?>
			<li><a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['cms']->value['link'], 'htmlall', 'UTF-8');?>
" title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['cms']->value['meta_title'], 'htmlall', 'UTF-8');?>
" data-ajax="false"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['cms']->value['meta_title'], 'htmlall', 'UTF-8');?>
</a></li>
			<?php } ?>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('contact',true);?>
" data-ajax="false"><?php echo smartyTranslate(array('s'=>'Contact'),$_smarty_tpl);?>
</a></li>
			<?php if ($_smarty_tpl->tpl_vars['display_store']->value){?><li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('stores');?>
" title="<?php echo smartyTranslate(array('s'=>'Our stores'),$_smarty_tpl);?>
" data-ajax="false"><?php echo smartyTranslate(array('s'=>'Our stores'),$_smarty_tpl);?>
</a></li><?php }?>
		</ul>
	</li>
</ul>
<?php }} ?>