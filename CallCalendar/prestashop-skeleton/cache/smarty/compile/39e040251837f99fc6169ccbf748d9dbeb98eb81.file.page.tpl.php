<?php /* Smarty version Smarty-3.1.13, created on 2014-10-24 14:55:34
         compiled from "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC9\data\localweb\prestashop-skeleton\adm\themes\idt-user\template\controllers\modules\page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16345544a4c46634639-87358219%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '39e040251837f99fc6169ccbf748d9dbeb98eb81' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC9\\data\\localweb\\prestashop-skeleton\\adm\\themes\\idt-user\\template\\controllers\\modules\\page.tpl',
      1 => 1348647538,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16345544a4c46634639-87358219',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'categoryFiltered' => 0,
    'currentIndex' => 0,
    'token' => 0,
    'nb_modules_favorites' => 0,
    'nb_modules' => 0,
    'list_modules_categories' => 0,
    'module_category_key' => 0,
    'module_category' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_544a4c467a21e4_94957015',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544a4c467a21e4_94957015')) {function content_544a4c467a21e4_94957015($_smarty_tpl) {?>

<div id="productBox">

	<?php echo $_smarty_tpl->getSubTemplate ('controllers/modules/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<?php echo $_smarty_tpl->getSubTemplate ('controllers/modules/filters.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<ul class="view-modules">
		<li class="button normal-view-disabled"><img src="themes/default/img/modules_view_layout_sidebar.png" alt="<?php echo smartyTranslate(array('s'=>'Normal view'),$_smarty_tpl);?>
" border="0" /><span><?php echo smartyTranslate(array('s'=>'Normal view'),$_smarty_tpl);?>
</span></li>
		<li class="button favorites-view"><a  href="index.php?controller=<?php echo htmlentities($_GET['controller']);?>
&token=<?php echo htmlentities($_GET['token']);?>
&select=favorites"><img src="themes/default/img/modules_view_table_select_row.png" alt="<?php echo smartyTranslate(array('s'=>'Favorites view'),$_smarty_tpl);?>
" border="0" /><span><?php echo smartyTranslate(array('s'=>'Favorites view'),$_smarty_tpl);?>
</span></a></li>
	
	</ul>

	<div id="container">
		<!--start sidebar module-->
		<div class="sidebar">
			<div class="categorieTitle">
				<h3><?php echo smartyTranslate(array('s'=>'Categories'),$_smarty_tpl);?>
</h3>
				<div class="subHeadline">&nbsp;</div>
				<ul class="categorieList">
					<li <?php if (isset($_smarty_tpl->tpl_vars['categoryFiltered']->value['favorites'])){?>style="background-color:#EBEDF4"<?php }?> class="categoryModuleFilterLink">
							<div class="categorieWidth"><a href="<?php echo $_smarty_tpl->tpl_vars['currentIndex']->value;?>
&token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
&filterCategory=favorites"><span><b><?php echo smartyTranslate(array('s'=>'Favorites'),$_smarty_tpl);?>
</b></span></a></div>
							<div class="count"><b><?php echo $_smarty_tpl->tpl_vars['nb_modules_favorites']->value;?>
</b></div>
					</li>
					<li <?php if (count($_smarty_tpl->tpl_vars['categoryFiltered']->value)<=0){?>style="background-color:#EBEDF4"<?php }?> class="categoryModuleFilterLink">
							<div class="categorieWidth"><a href="<?php echo $_smarty_tpl->tpl_vars['currentIndex']->value;?>
&token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
&unfilterCategory=yes"><span><b><?php echo smartyTranslate(array('s'=>'Total'),$_smarty_tpl);?>
</b></span></a></div>
							<div class="count"><b><?php echo $_smarty_tpl->tpl_vars['nb_modules']->value;?>
</b></div>
					</li>
					<?php  $_smarty_tpl->tpl_vars['module_category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['module_category']->_loop = false;
 $_smarty_tpl->tpl_vars['module_category_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list_modules_categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['module_category']->key => $_smarty_tpl->tpl_vars['module_category']->value){
$_smarty_tpl->tpl_vars['module_category']->_loop = true;
 $_smarty_tpl->tpl_vars['module_category_key']->value = $_smarty_tpl->tpl_vars['module_category']->key;
?>
						<li <?php if (isset($_smarty_tpl->tpl_vars['categoryFiltered']->value[$_smarty_tpl->tpl_vars['module_category_key']->value])){?>style="background-color:#EBEDF4"<?php }?> class="categoryModuleFilterLink">
							<div class="categorieWidth"><a href="<?php echo $_smarty_tpl->tpl_vars['currentIndex']->value;?>
&token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
&<?php if (isset($_smarty_tpl->tpl_vars['categoryFiltered']->value[$_smarty_tpl->tpl_vars['module_category_key']->value])){?>un<?php }?>filterCategory=<?php echo $_smarty_tpl->tpl_vars['module_category_key']->value;?>
"><span><?php echo $_smarty_tpl->tpl_vars['module_category']->value['name'];?>
</span></a></div>
							<div class="count"><?php echo $_smarty_tpl->tpl_vars['module_category']->value['nb'];?>
</div>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>

		<div id="moduleContainer">
			<?php echo $_smarty_tpl->getSubTemplate ('controllers/modules/list.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		</div>
	</div>

</div>
<?php }} ?>