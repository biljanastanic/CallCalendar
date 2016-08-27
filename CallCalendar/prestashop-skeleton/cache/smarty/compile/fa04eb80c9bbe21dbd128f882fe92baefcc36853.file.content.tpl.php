<?php /* Smarty version Smarty-3.1.8, created on 2013-04-26 12:27:29
         compiled from "/www/htdocs/mrtc/testIDT/adm/themes/idt/template/controllers/not_found/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2093731260517a569157c9f9-78887535%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa04eb80c9bbe21dbd128f882fe92baefcc36853' => 
    array (
      0 => '/www/htdocs/mrtc/testIDT/adm/themes/idt/template/controllers/not_found/content.tpl',
      1 => 1348647538,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2093731260517a569157c9f9-78887535',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'controller' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_517a5691606798_67642536',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_517a5691606798_67642536')) {function content_517a5691606798_67642536($_smarty_tpl) {?>
<h1><?php echo smartyTranslate(array('s'=>'The controller %s is missing or invalid.','sprintf'=>$_smarty_tpl->tpl_vars['controller']->value),$_smarty_tpl);?>
</h1>
<ul>
<li><a href="index.php"><?php echo smartyTranslate(array('s'=>'Go to Dashboard'),$_smarty_tpl);?>
</a></li>
<li><a href="#" onclick="window.history.back();"><?php echo smartyTranslate(array('s'=>'Back to previous page'),$_smarty_tpl);?>
</a></li>
</ul>
<?php }} ?>