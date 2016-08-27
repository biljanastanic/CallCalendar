<?php /* Smarty version Smarty-3.1.8, created on 2013-05-28 14:59:15
         compiled from "/www/htdocs/es/themes/ipr/open-positions-list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:85397082751a4aa230fba33-30846354%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a78ae7c385e84fa0b44eb9b35481c29d94ec39c' => 
    array (
      0 => '/www/htdocs/es/themes/ipr/open-positions-list.tpl',
      1 => 1367592507,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85397082751a4aa230fba33-30846354',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'open_positions' => 0,
    'open_position' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51a4aa231762e5_24078047',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a4aa231762e5_24078047')) {function content_51a4aa231762e5_24078047($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/www/htdocs/es/tools/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_escape')) include '/www/htdocs/es/tools/smarty/plugins/modifier.escape.php';
?><script type="text/javascript">
//<![CDATA[
$(document).ready(function()
{
	$("table").tablesorter(); 
});
//]]> 
</script>

<div class="centre-column-single">
	<h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
	<br>
	<?php if (isset($_smarty_tpl->tpl_vars['open_positions']->value)&&count($_smarty_tpl->tpl_vars['open_positions']->value)>0){?>
		<?php  $_smarty_tpl->tpl_vars['open_position'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['open_position']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['open_positions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['open_position']->key => $_smarty_tpl->tpl_vars['open_position']->value){
$_smarty_tpl->tpl_vars['open_position']->_loop = true;
?>
			<div class="date">
				<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['open_position']->value['date'],"%Y-%m-%d");?>

			</div>	
			<div class="title">
				<a href="<?php echo $_smarty_tpl->tpl_vars['open_position']->value['url'];?>
">
					<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['open_position']->value['title'], 'htmlall', 'UTF-8');?>

				</a>	
			</div>	
		<?php } ?>
	<?php }else{ ?>
		<br>
		There are currently no open positions.
	<?php }?>
</div>
		<?php }} ?>