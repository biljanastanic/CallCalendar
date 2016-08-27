<?php /* Smarty version Smarty-3.1.8, created on 2013-05-27 17:44:25
         compiled from "/www/htdocs/mrtc/testIDT/adm/themes/idt/template/controllers/cms_content/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:140274257151a37f59110a40-80362950%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f3aafdd38eaed7ac96615107bc44ece1fd173b5' => 
    array (
      0 => '/www/htdocs/mrtc/testIDT/adm/themes/idt/template/controllers/cms_content/content.tpl',
      1 => 1348647537,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '140274257151a37f59110a40-80362950',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cms_breadcrumb' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51a37f59129798_27787638',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a37f59129798_27787638')) {function content_51a37f59129798_27787638($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['cms_breadcrumb']->value)){?>
	<div class="cat_bar">
		<span style="color: #3C8534;"><?php echo smartyTranslate(array('s'=>'Current category'),$_smarty_tpl);?>
 :</span>&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['cms_breadcrumb']->value;?>

	</div>
<?php }?>

<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php }} ?>