<?php /* Smarty version Smarty-3.1.8, created on 2013-02-12 10:24:18
         compiled from "/www/htdocs/mrtc/testIDT/themes/mrtc/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1653285458511a0a42c07099-52226318%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '00df35cb4dd31e295ba5b41f84e32d1ad5c65463' => 
    array (
      0 => '/www/htdocs/mrtc/testIDT/themes/mrtc/index.tpl',
      1 => 1358810647,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1653285458511a0a42c07099-52226318',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HOOK_HOME' => 0,
    'img_dir' => 0,
    'latest_publications' => 0,
    'latest_publication' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_511a0a42ca4225_45506902',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_511a0a42ca4225_45506902')) {function content_511a0a42ca4225_45506902($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/www/htdocs/mrtc/testIDT/tools/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_escape')) include '/www/htdocs/mrtc/testIDT/tools/smarty/plugins/modifier.escape.php';
?>

<?php echo $_smarty_tpl->tpl_vars['HOOK_HOME']->value;?>


<div class="right-column">
	<img class="logo" src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
latest_publications.png" />
	<?php  $_smarty_tpl->tpl_vars['latest_publication'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['latest_publication']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['latest_publications']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['latest_publication']->key => $_smarty_tpl->tpl_vars['latest_publication']->value){
$_smarty_tpl->tpl_vars['latest_publication']->_loop = true;
?>
		<div class="row">
			<div class="date">
				<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['latest_publication']->value['date'],"%Y-%m-%d");?>

			</div>	
			<div class="title">
				<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['latest_publication']->value['title'], 'htmlall', 'UTF-8');?>

			</div>	
		</div>
	<?php } ?>
</div><?php }} ?>