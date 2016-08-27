<?php /* Smarty version Smarty-3.1.13, created on 2014-10-24 15:01:30
         compiled from "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC9\data\localweb\prestashop-skeleton\adm\themes\idt\template\controllers\cms_content\content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20599544a4daabd31a0-04253553%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80ed245ce16162b1087d6deb0ec740eecd56322f' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC9\\data\\localweb\\prestashop-skeleton\\adm\\themes\\idt\\template\\controllers\\cms_content\\content.tpl',
      1 => 1348647537,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20599544a4daabd31a0-04253553',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cms_breadcrumb' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_544a4daac196a4_18164955',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544a4daac196a4_18164955')) {function content_544a4daac196a4_18164955($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['cms_breadcrumb']->value)){?>
	<div class="cat_bar">
		<span style="color: #3C8534;"><?php echo smartyTranslate(array('s'=>'Current category'),$_smarty_tpl);?>
 :</span>&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['cms_breadcrumb']->value;?>

	</div>
<?php }?>

<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php }} ?>