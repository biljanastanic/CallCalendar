<?php /* Smarty version Smarty-3.1.13, created on 2014-12-01 18:12:08
         compiled from "C:\xampp\htdocs\CallCalendar\prestashop-skeleton\themes\es\call.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11345547b38b8832f92-16754825%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb16743cc70a225a4c18a7e06c71553e2519915d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CallCalendar\\prestashop-skeleton\\themes\\es\\call.tpl',
      1 => 1417453903,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11345547b38b8832f92-16754825',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_547b38b88daf37_14383244',
  'variables' => 
  array (
    'call' => 0,
    'funding_agencies' => 0,
    'base_url' => 0,
    'funding_agency' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547b38b88daf37_14383244')) {function content_547b38b88daf37_14383244($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'C:\\xampp\\htdocs\\CallCalendar\\prestashop-skeleton\\tools\\smarty\\plugins\\modifier.replace.php';
?><?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?><?php echo smartyTranslate(array('s'=>'Research call'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<script type="text/javascript">
	$(document).ready(function()
	{
		$( "#tabs" ).tabs({
			collapsible: true
		});
		$(".tablesorter").tablesorter(); 
	});
</script>
<div class="centre-column">
	<h1><?php echo $_smarty_tpl->tpl_vars['call']->value['title'];?>
</h1>
	<!--<?php if (isset($_smarty_tpl->tpl_vars['call']->value['focus'])&&$_smarty_tpl->tpl_vars['call']->value['focus']!=''){?>
		<div class="centre-block">
			<div class="div-label">
				<h3>Focus:</h3>
			</div>
			<div class="div-content">
				<?php echo $_smarty_tpl->tpl_vars['call']->value['focus'];?>

			</div>
			<br class="clearBoth">
		</div>
	<?php }?>	-->

	

	<?php if (isset($_smarty_tpl->tpl_vars['call']->value['status'])&&$_smarty_tpl->tpl_vars['call']->value['status']!=''){?>
		<div class="centre-block">
			<div class="div-label">
				<h3>Status:</h3>
			</div>
			<div class="div-content">
				<?php echo $_smarty_tpl->tpl_vars['call']->value['status'];?>

			</div>
			<br class="clearBoth">
		</div>
	<?php }?>
	
	<?php if (isset($_smarty_tpl->tpl_vars['call']->value['type'])&&$_smarty_tpl->tpl_vars['call']->value['type']!=''){?>
		<div class="centre-block">
			<div class="div-label">
				<h3>Type:</h3>
			</div>
			<div class="div-content">
				<?php echo $_smarty_tpl->tpl_vars['call']->value['type'];?>

			</div>
			<br class="clearBoth">
		</div>
	<?php }?>

	<?php if (isset($_smarty_tpl->tpl_vars['call']->value['type'])&&$_smarty_tpl->tpl_vars['call']->value['type']!=''){?>
		<div class="centre-block">
			<div class="div-label">
				<h3>Funding agency:</h3>
			</div>
			<div class="div-content">
				<?php echo $_smarty_tpl->tpl_vars['call']->value['agency'];?>

			</div>
			<br class="clearBoth">
		</div>
	<?php }?>

	<?php if (isset($_smarty_tpl->tpl_vars['call']->value['planed_project_start'])&&$_smarty_tpl->tpl_vars['call']->value['planed_project_start']!="0000-00-00"){?>
		<div class="centre-block">
			<div class="div-label">
				<h3>Start date:</h3>
			</div>
			<div class="div-content">
				<?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['call']->value['planed_project_start'],'-00',''),'0000','');?>

			</div>
			<br class="clearBoth">
		</div>
	<?php }?>

	<?php if (isset($_smarty_tpl->tpl_vars['call']->value['budget'])&&$_smarty_tpl->tpl_vars['call']->value['budget']!="0"){?>
		<div class="centre-block">
			<div class="div-label">
				<h3>Budget:</h3>
			</div>
			<div class="div-content">
				<?php echo $_smarty_tpl->tpl_vars['call']->value['budget'];?>
 <!-- |replace:'-00':''|replace:'0000':''} -->
			</div>
			<br class="clearBoth">
		</div>
	<?php }?>

	<?php if (isset($_smarty_tpl->tpl_vars['call']->value['repeating'])){?>
		<div class="centre-block">
			<div class="div-label">
				<h3>Repeating:</h3>
			</div>
			<div class="div-content">
				<?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['call']->value['repeating'],'0','NO'),'1','YES');?>

			</div>
			<br class="clearBoth">
		</div>
	<?php }?>
	
	<?php if (isset($_smarty_tpl->tpl_vars['call']->value['url_to_call'])&&$_smarty_tpl->tpl_vars['call']->value['url_to_call']!=''){?>
	<div class="centre-block">
			<div class="div-label">
				<h3>Url:</h3>
			</div>
			<div class="div-content">
				<a href="<?php echo $_smarty_tpl->tpl_vars['call']->value['url_to_call'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['call']->value['url_to_call'];?>
</a>
			</div>
			<br class="clearBoth">
		</div>
	<?php }?>
	<div id="tabs">
		<ul>
			<?php if (isset($_smarty_tpl->tpl_vars['call']->value['description'])&&$_smarty_tpl->tpl_vars['call']->value['description']!=''){?>
				<li><a href="#tabs-1">Description</a></li>
			<?php }?>	
			<?php if (isset($_smarty_tpl->tpl_vars['call']->value['requirements'])&&count($_smarty_tpl->tpl_vars['call']->value['requirements'])>0){?>
				<li><a href="#tabs-2">Requirements</a></li>
			<?php }?>
		</ul>
	
	<?php if (isset($_smarty_tpl->tpl_vars['call']->value['description'])&&$_smarty_tpl->tpl_vars['call']->value['description']!=''){?>
		<div id="tabs-1">
			<?php echo $_smarty_tpl->tpl_vars['call']->value['description'];?>

		</div>	
	<?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['call']->value['requirements'])&&$_smarty_tpl->tpl_vars['call']->value['requirements']!=''){?>
		<div id="tabs-2">
			<?php echo $_smarty_tpl->tpl_vars['call']->value['requirements'];?>

		</div>	
	<?php }?>

	</div>
		 
</div>

<div class = "right-column">
	<?php if (isset($_smarty_tpl->tpl_vars['funding_agencies']->value)&&count($_smarty_tpl->tpl_vars['funding_agencies']->value)>0){?>
	<div style="margin-bottom: 20px">
		<img class="logo" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
img/headers/funding-agencies.png" />
		<?php  $_smarty_tpl->tpl_vars['funding_agency'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['funding_agency']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['funding_agencies']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['funding_agency']->key => $_smarty_tpl->tpl_vars['funding_agency']->value){
$_smarty_tpl->tpl_vars['funding_agency']->_loop = true;
?>
		<div class="row-logo">
			<div class="logo">
				<?php if ($_smarty_tpl->tpl_vars['funding_agency']->value['url']!=''){?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['funding_agency']->value['url'];?>
" target="_blank">
				<?php }?>
					<img class="logo" src="../img/funding-agencies/<?php echo $_smarty_tpl->tpl_vars['funding_agency']->value['id_funding_agency'];?>
.jpg" />
				<?php if ($_smarty_tpl->tpl_vars['funding_agency']->value['url']!=''){?>
				</a>
				<?php }?>
			</div>	
		</div>
		<?php } ?>
	</div>	
	<?php }?>
</div>

<?php }} ?>