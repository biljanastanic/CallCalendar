<?php /* Smarty version Smarty-3.1.8, created on 2013-05-27 18:07:04
         compiled from "/www/htdocs/mrtc/testIDT/adm/themes/idt/template/controllers/modules/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:79774621651a384a875ec93-33613462%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd980891c07969c08da9ecfb925696089828b1dff' => 
    array (
      0 => '/www/htdocs/mrtc/testIDT/adm/themes/idt/template/controllers/modules/header.tpl',
      1 => 1348647538,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '79774621651a384a875ec93-33613462',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'add_permission' => 0,
    'currentIndex' => 0,
    'token' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51a384a87f4216_56477163',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a384a87f4216_56477163')) {function content_51a384a87f4216_56477163($_smarty_tpl) {?>

	<div class="toolbar-placeholder">
		<div class="toolbarBox toolbarHead">
	
			<ul class="cc_button">
				<?php if ($_smarty_tpl->tpl_vars['add_permission']->value=='1'){?>
				<li>
					<a id="desc-module-new" class="toolbar_btn" href="#top_container" onclick="$('#module_install').slideToggle();" title="<?php echo smartyTranslate(array('s'=>'Add new module'),$_smarty_tpl);?>
">
						<span class="process-icon-new-module" ></span>
						<div><?php echo smartyTranslate(array('s'=>'Add new module'),$_smarty_tpl);?>
</div>
					</a>
				</li>
				<?php }?>
			</ul>


			<div class="pageTitle">
				<h3><span id="current_obj" style="font-weight: normal;"><span class="breadcrumb item-0">Module</span> : <span class="breadcrumb item-1"><?php echo smartyTranslate(array('s'=>'List of modules'),$_smarty_tpl);?>
</span></span></h3>
			</div>

		</div>
	</div>

<?php if ($_smarty_tpl->tpl_vars['add_permission']->value=='1'){?>
	<div id="module_install" style="width:500px;margin-top:5px;<?php if (!isset($_POST['downloadflag'])){?>display: none;<?php }?>">
		<fieldset>
			<legend><img src="../img/admin/add.gif" alt="<?php echo smartyTranslate(array('s'=>'Add a new module'),$_smarty_tpl);?>
" class="middle" /> <?php echo smartyTranslate(array('s'=>'Add a new module'),$_smarty_tpl);?>
</legend>
			<p><?php echo smartyTranslate(array('s'=>'The module must be either a zip file or a tarball.'),$_smarty_tpl);?>
</p>
			<div style="float:left;margin-right:50px">
				<form action="<?php echo $_smarty_tpl->tpl_vars['currentIndex']->value;?>
&token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" method="post" enctype="multipart/form-data">
					<label style="width: 100px"><?php echo smartyTranslate(array('s'=>'Module file'),$_smarty_tpl);?>
</label>
					<div class="margin-form" style="padding-left: 140px">
						<input type="file" name="file" />
						<p><?php echo smartyTranslate(array('s'=>'Upload a module from your computer.'),$_smarty_tpl);?>
</p>
					</div>
					<div class="margin-form" style="padding-left: 140px">
						<input type="submit" name="download" value="<?php echo smartyTranslate(array('s'=>'Upload this module'),$_smarty_tpl);?>
" class="button" />
					</div>
				</form>
			</div>
		</fieldset>
		<br />
	</div>
<?php }?>

<?php }} ?>