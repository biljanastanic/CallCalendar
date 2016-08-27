<?php /* Smarty version Smarty-3.1.8, created on 2013-05-06 16:43:35
         compiled from "/www/htdocs/mrtc/testIDT/adm/themes/idt-user/template/controllers/cms_content/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17902036135187c197dea129-18333726%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55d6581806d68e58511d9f15748ca54a4a934923' => 
    array (
      0 => '/www/htdocs/mrtc/testIDT/adm/themes/idt-user/template/controllers/cms_content/content.tpl',
      1 => 1348647537,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17902036135187c197dea129-18333726',
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
  'unifunc' => 'content_5187c197e13d12_58352946',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5187c197e13d12_58352946')) {function content_5187c197e13d12_58352946($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['cms_breadcrumb']->value)){?>
	<div class="cat_bar">
		<span style="color: #3C8534;"><?php echo smartyTranslate(array('s'=>'Current category'),$_smarty_tpl);?>
 :</span>&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['cms_breadcrumb']->value;?>

	</div>
<?php }?>

<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php }} ?>