<?php /* Smarty version Smarty-3.1.8, created on 2013-05-27 14:40:34
         compiled from "/www/htdocs/mrtc/testIDT/adm/themes/idt/template/controllers/stats/stats.tpl" */ ?>
<?php /*%%SmartyHeaderCode:111798379851a35442dc6743-30728891%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '37f7e50ecd752e679151fb8ff0b567c6a249146d' => 
    array (
      0 => '/www/htdocs/mrtc/testIDT/adm/themes/idt/template/controllers/stats/stats.tpl',
      1 => 1366892414,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '111798379851a35442dc6743-30728891',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module_name' => 0,
    'module_instance' => 0,
    'hook' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51a35442e15af7_08706396',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a35442e15af7_08706396')) {function content_51a35442e15af7_08706396($_smarty_tpl) {?>

<div>
	<?php if ($_smarty_tpl->tpl_vars['module_name']->value){?>
		<?php if ($_smarty_tpl->tpl_vars['module_instance']->value&&$_smarty_tpl->tpl_vars['module_instance']->value->active){?>
			<?php echo $_smarty_tpl->tpl_vars['hook']->value;?>

		<?php }else{ ?>
			<?php echo smartyTranslate(array('s'=>'Module not found'),$_smarty_tpl);?>

		<?php }?>
	<?php }else{ ?>
		<h3 class="space"><?php echo smartyTranslate(array('s'=>'Please select a module in the left column.'),$_smarty_tpl);?>
</h3>
	<?php }?>
		<h3 class="space">Please visit <a href="http://statcounter.com/" style="color:#3A6EA7">statcounter.com</a> for more detailed stats (username:idt@mdh.se, password is the same that you used to login to this page).</h3>
</div>
</div>
</div>


<?php }} ?>