<?php /* Smarty version Smarty-3.1.8, created on 2013-05-24 14:03:13
         compiled from "/www/htdocs/mrtc/testIDT/themes/es/open-positions-list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1479990427519f5701cf3ef8-08831484%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb55391b85d54acb06909025e920880da130efd2' => 
    array (
      0 => '/www/htdocs/mrtc/testIDT/themes/es/open-positions-list.tpl',
      1 => 1367592507,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1479990427519f5701cf3ef8-08831484',
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
  'unifunc' => 'content_519f5701d907e3_63307715',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_519f5701d907e3_63307715')) {function content_519f5701d907e3_63307715($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/www/htdocs/mrtc/testIDT/tools/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_escape')) include '/www/htdocs/mrtc/testIDT/tools/smarty/plugins/modifier.escape.php';
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