<?php /* Smarty version Smarty-3.1.8, created on 2013-02-07 10:18:39
         compiled from "/www/htdocs/mrtc/testIDT/themes/mrtc/staff.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16216816085113716f5659e8-68894308%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e90c44566429243447f530aba3c6e55c396a94a' => 
    array (
      0 => '/www/htdocs/mrtc/testIDT/themes/mrtc/staff.tpl',
      1 => 1359022267,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16216816085113716f5659e8-68894308',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base_url' => 0,
    'title' => 0,
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
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5113716f75f305_82059448',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5113716f75f305_82059448')) {function content_5113716f75f305_82059448($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/www/htdocs/mrtc/testIDT/tools/smarty/plugins/modifier.escape.php';
?><script type="text/javascript">
//<![CDATA[
$(document).ready(function()
{
	$('.selectStaffFilter').change(function()
	{
		document.location.href = '<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
' + 'index.php?controller=staff&filter=' + $(this).val();
	});
});
//]]> 
</script>

<div id="staff-list">
	<h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
	<form id="staffFilterForm" action="">
		<?php echo smartyTranslate(array('s'=>'Filter:'),$_smarty_tpl);?>

		<select id="selectStaffFilter" class="selectStaffFilter" name="selectStaffFilter">
			<option value="">All MRTC Staff</option>
			<option value="">---------------- DIVISIONS ----------------</option>
			<?php  $_smarty_tpl->tpl_vars['division'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['division']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['divisions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['division']->key => $_smarty_tpl->tpl_vars['division']->value){
$_smarty_tpl->tpl_vars['division']->_loop = true;
?>
				<option value="id_division_<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['division']->value['id_initiative'], 'htmlall', 'UTF-8');?>
"
				<?php if ($_smarty_tpl->tpl_vars['id_division']->value==$_smarty_tpl->tpl_vars['division']->value['id_initiative']){?>selected="selected"<?php }?>
				><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['division']->value['name'], 'htmlall', 'UTF-8');?>
</option>
			<?php } ?>
			<option value=""></option>
			<option value="">---------------- GROUPS ----------------</option>
			<?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value){
$_smarty_tpl->tpl_vars['group']->_loop = true;
?>
				<option value="id_group_<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['group']->value['id_initiative'], 'htmlall', 'UTF-8');?>
"
				<?php if ($_smarty_tpl->tpl_vars['id_group']->value==$_smarty_tpl->tpl_vars['group']->value['id_initiative']){?>selected="selected"<?php }?>
				><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['group']->value['name'], 'htmlall', 'UTF-8');?>
</option>
			<?php } ?>
			<option value=""></option>
			<option value="">----------------- PROJECTS ------------------</option>
			<?php  $_smarty_tpl->tpl_vars['project'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['project']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['projects']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['project']->key => $_smarty_tpl->tpl_vars['project']->value){
$_smarty_tpl->tpl_vars['project']->_loop = true;
?>
				<option value="id_project_<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['project']->value['id_project'], 'htmlall', 'UTF-8');?>
"
				<?php if ($_smarty_tpl->tpl_vars['id_project']->value==$_smarty_tpl->tpl_vars['project']->value['id_project']){?>selected="selected"<?php }?>
				><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['project']->value['name'], 'htmlall', 'UTF-8');?>
</option>
			<?php } ?>			
		</select>
		
	</form>
	<?php if (isset($_smarty_tpl->tpl_vars['people']->value)){?>
	<table id="staff-table" class="tablesorter"> 
		<thead> 
			<tr> 
				<th class="staff-list-firstname">Last Name</th> 
				<th class="staff-list-lastname">First Name</th> 
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
					<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['person']->value['firstname'], 'htmlall', 'UTF-8');?>

				</td>
				<td class="staff-list-lastname">
					<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['person']->value['lastname'], 'htmlall', 'UTF-8');?>

				</td>
				<td class="staff-list-title">
					<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['person']->value['title'], 'htmlall', 'UTF-8');?>

				</td>
				<td class="staff-list-phone">
					<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['person']->value['phone'], 'htmlall', 'UTF-8');?>

				</td>
			</tr>
			<?php } ?>
		</tbody> 
	</table> 
	<?php }?>
</div>

<div class="right-column">
	<img class="logo" src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
research_groups.png" />
	<?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value){
$_smarty_tpl->tpl_vars['group']->_loop = true;
?>
		<div class="row">
			<a href="http://www.mrtc.mdh.se/testIDT/mrtc/researchgroup/<?php echo $_smarty_tpl->tpl_vars['group']->value['id_initiative'];?>
_<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['group']->value['name'], 'htmlall', 'UTF-8');?>
">
			<!--<a href="http://www.mrtc.mdh.se/testIDT/mrtc/researchgroup?research_group_id=<?php echo $_smarty_tpl->tpl_vars['group']->value['id_initiative'];?>
">-->
				<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['group']->value['name'], 'htmlall', 'UTF-8');?>

			</a>
		</div>
	<?php } ?>
</div><?php }} ?>