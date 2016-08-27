<?php /* Smarty version Smarty-3.1.8, created on 2013-05-28 15:14:55
         compiled from "/www/htdocs/es/themes/ipr/staff.tpl" */ ?>
<?php /*%%SmartyHeaderCode:198418376651a4adcfd810b3-81253998%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7a8cd4be02b8325aaec6345a5058403447e307f5' => 
    array (
      0 => '/www/htdocs/es/themes/ipr/staff.tpl',
      1 => 1367848017,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '198418376651a4adcfd810b3-81253998',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'areas' => 0,
    'area' => 0,
    'id_area' => 0,
    'divisions' => 0,
    'division' => 0,
    'id_division' => 0,
    'groups' => 0,
    'group' => 0,
    'id_group' => 0,
    'projects' => 0,
    'project' => 0,
    'id_project' => 0,
    'people' => 0,
    'person' => 0,
    'img_dir' => 0,
    'base_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51a4add0197c84_76912076',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a4add0197c84_76912076')) {function content_51a4add0197c84_76912076($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/www/htdocs/es/tools/smarty/plugins/modifier.escape.php';
if (!is_callable('smarty_modifier_regex_replace')) include '/www/htdocs/es/tools/smarty/plugins/modifier.regex_replace.php';
?><script type="text/javascript">
//<![CDATA[
$(document).ready(function()
{
	$("table").tablesorter(); 
	$('.selectScope').change(function()
	{
		document.location.href = 'staff?scope=' + $(this).val();
	});

});
//]]> 
</script>

<div class="centre-column">
	<h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
	<form id="staffFilterForm" action="">
		<?php echo smartyTranslate(array('s'=>'Scope:'),$_smarty_tpl);?>

		<select id="selectScope" class="selectScope" name="selectScope" style="left:50px;position:absolute;width:484px;margin-top:-2px">
			<option value="">--- all ---</option>
			<?php if ($_smarty_tpl->tpl_vars['areas']->value){?>
				<option value="" style="font-weight:bold">--- RESEARCH AREAS ---</option>
				<?php  $_smarty_tpl->tpl_vars['area'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['area']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['areas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['area']->key => $_smarty_tpl->tpl_vars['area']->value){
$_smarty_tpl->tpl_vars['area']->_loop = true;
?>
					<option value="id_area_<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['area']->value['id_initiative'], 'htmlall', 'UTF-8');?>
" 
					<?php if ($_smarty_tpl->tpl_vars['id_area']->value==$_smarty_tpl->tpl_vars['area']->value['id_initiative']){?>selected="selected"<?php }?>
					><?php echo smarty_modifier_escape($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['area']->value['name'],70), 'htmlall', 'UTF-8');?>
</option>
				<?php } ?>
			<?php }?>
	
			<?php if ($_smarty_tpl->tpl_vars['divisions']->value){?>
				<option value="" style="font-weight:bold">--- DIVISIONS ---</option>
				<?php  $_smarty_tpl->tpl_vars['division'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['division']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['divisions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['division']->key => $_smarty_tpl->tpl_vars['division']->value){
$_smarty_tpl->tpl_vars['division']->_loop = true;
?>
					<option value="id_division_<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['division']->value['id_initiative'], 'htmlall', 'UTF-8');?>
"
					<?php if ($_smarty_tpl->tpl_vars['id_division']->value==$_smarty_tpl->tpl_vars['division']->value['id_initiative']){?>selected="selected"<?php }?>
					><?php echo smarty_modifier_escape($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['division']->value['name'],70), 'htmlall', 'UTF-8');?>
</option>
				<?php } ?>
			<?php }?>
	
			<?php if ($_smarty_tpl->tpl_vars['groups']->value){?>
				<option value="" style="font-weight:bold">--- RESEARCH GROUPS ---</option>
				<?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value){
$_smarty_tpl->tpl_vars['group']->_loop = true;
?>
					<option value="id_group_<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['group']->value['id_initiative'], 'htmlall', 'UTF-8');?>
"
					<?php if ($_smarty_tpl->tpl_vars['id_group']->value==$_smarty_tpl->tpl_vars['group']->value['id_initiative']){?>selected="selected"<?php }?>
					><?php echo smarty_modifier_escape($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['group']->value['name'],70), 'htmlall', 'UTF-8');?>
</option>
				<?php } ?>
			<?php }?>
	
			<?php if ($_smarty_tpl->tpl_vars['projects']->value){?>
				<option value="" style="font-weight:bold">--- PROJECTS ---</option>
				<?php  $_smarty_tpl->tpl_vars['project'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['project']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['projects']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['project']->key => $_smarty_tpl->tpl_vars['project']->value){
$_smarty_tpl->tpl_vars['project']->_loop = true;
?>
					<option value="id_project_<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['project']->value['id_project'], 'htmlall', 'UTF-8');?>
"
					<?php if ($_smarty_tpl->tpl_vars['id_project']->value==$_smarty_tpl->tpl_vars['project']->value['id_project']){?>selected="selected"<?php }?>
					><?php echo smarty_modifier_escape($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['project']->value['name'],70), 'htmlall', 'UTF-8');?>
</option>
				<?php } ?>				
			<?php }?>
		</select>		
	</form>
	<br>
	<?php if (isset($_smarty_tpl->tpl_vars['people']->value)){?>
	<table id="staff-table" class="tablesorter"> 
		<thead> 
			<tr> 
				<th class="staff-list-lastname">First Name</th> 
				<th class="staff-list-firstname">Last Name</th> 
				<th class="staff-list-title">Title</th> 
				<th class="staff-list-phone">Phone</th> 
			</tr> 
		</thead> 
		<tbody> 
			<?php  $_smarty_tpl->tpl_vars['person'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['person']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['people']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['person']->key => $_smarty_tpl->tpl_vars['person']->value){
$_smarty_tpl->tpl_vars['person']->_loop = true;
?>
			<tr>
				<td class="staff-list-firstname">
					<a href="staff/<?php echo $_smarty_tpl->tpl_vars['person']->value['id_customer'];?>
-<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['person']->value['firstname'],"/[^A-Za-z0-9]/","_");?>
_<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['person']->value['lastname'],"/[^A-Za-z0-9]/","_");?>
">
						<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['person']->value['firstname'], 'htmlall', 'UTF-8');?>

					</a>
				</td>
				<td class="staff-list-lastname">
					<a href="staff/<?php echo $_smarty_tpl->tpl_vars['person']->value['id_customer'];?>
-<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['person']->value['firstname'],"/[^A-Za-z0-9]/","_");?>
_<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['person']->value['lastname'],"/[^A-Za-z0-9]/","_");?>
">
						<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['person']->value['lastname'], 'htmlall', 'UTF-8');?>

					</a>
				</td>
				<td class="staff-list-title">
					<a href="staff/<?php echo $_smarty_tpl->tpl_vars['person']->value['id_customer'];?>
-<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['person']->value['firstname'],"/[^A-Za-z0-9]/","_");?>
_<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['person']->value['lastname'],"/[^A-Za-z0-9]/","_");?>
">
						<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['person']->value['title'], 'htmlall', 'UTF-8');?>

					</a>
				</td>
				<td class="staff-list-phone">
					<a href="staff/<?php echo $_smarty_tpl->tpl_vars['person']->value['id_customer'];?>
-<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['person']->value['firstname'],"/[^A-Za-z0-9]/","_");?>
_<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['person']->value['lastname'],"/[^A-Za-z0-9]/","_");?>
">
						<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['person']->value['phone'], 'htmlall', 'UTF-8');?>

					</a>
				</td>
			</tr>
			<?php } ?>
		</tbody> 
	</table> 
	<?php }?>
</div>

<div class="right-column">
	<img class="logo" src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
research-groups.png" />
	<?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value){
$_smarty_tpl->tpl_vars['group']->_loop = true;
?>
		<div class="row-group">
			<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
research-groups/<?php echo $_smarty_tpl->tpl_vars['group']->value['id_initiative'];?>
-<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['group']->value['name'],"/[^A-Za-z0-9]/","_");?>
">
				<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['group']->value['name'], 'htmlall', 'UTF-8');?>

			</a>
		</div>
	<?php } ?>
</div><?php }} ?>