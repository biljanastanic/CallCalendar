<?php /* Smarty version Smarty-3.1.8, created on 2013-05-28 14:59:18
         compiled from "/www/htdocs/es/themes/ipr/projects-list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:170883859351a4aa26ba4f63-16152825%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7f080e458e5d6be45e710bbe8c6f6d3ee4ff4a0' => 
    array (
      0 => '/www/htdocs/es/themes/ipr/projects-list.tpl',
      1 => 1367835856,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '170883859351a4aa26ba4f63-16152825',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'statuses' => 0,
    'status' => 0,
    'id_status' => 0,
    'people' => 0,
    'member' => 0,
    'id_member' => 0,
    'areas' => 0,
    'area' => 0,
    'id_area' => 0,
    'divisions' => 0,
    'division' => 0,
    'id_division' => 0,
    'groups' => 0,
    'group' => 0,
    'id_group' => 0,
    'funding_agencies' => 0,
    'funding_agency' => 0,
    'id_funding_agency' => 0,
    'number_of_projects' => 0,
    'projects' => 0,
    'project' => 0,
    'img_dir' => 0,
    'top_funding_agencies' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51a4aa26ebeaf1_49012722',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a4aa26ebeaf1_49012722')) {function content_51a4aa26ebeaf1_49012722($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/www/htdocs/es/tools/smarty/plugins/modifier.escape.php';
if (!is_callable('smarty_modifier_regex_replace')) include '/www/htdocs/es/tools/smarty/plugins/modifier.regex_replace.php';
?><script type="text/javascript">
//<![CDATA[
$(document).ready(function()
{
	$("table").tablesorter(); 
	$( "#get_projects" ).click(function() 
	{	
		url = 'projects?';
		if ($( "#selectStatus" ).val() != "") 
			url = url + '&status=' + $( "#selectStatus" ).val()
		if ($( "#selectScope" ).val() != "") 
			url = url + '&scope=' + $( "#selectScope" ).val()
		if ($( "#selectMember" ).val() != "") 
			url = url + '&member=' + $( "#selectMember" ).val()
		if ($( "#selectFunding" ).val() != "") 
			url = url + '&funding=' + $( "#selectFunding" ).val()
		document.location.href = url;
	});
});
//]]> 
</script>

<div class="centre-column">
	<h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
	<form id="projectFilterForm" action="">
		<div>
			<?php echo smartyTranslate(array('s'=>'Status:'),$_smarty_tpl);?>

			<select id="selectStatus" class="selectStatus" name="selectStatus" style="left:100px;position:absolute;width:165px;margin-top:-2px">
				<option value="any">--- all ---</option>
				<?php  $_smarty_tpl->tpl_vars['status'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['status']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['statuses']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['status']->key => $_smarty_tpl->tpl_vars['status']->value){
$_smarty_tpl->tpl_vars['status']->_loop = true;
?>
					<option value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['status']->value['id_project_status'], 'htmlall', 'UTF-8');?>
"
					<?php if ($_smarty_tpl->tpl_vars['id_status']->value==$_smarty_tpl->tpl_vars['status']->value['id_project_status']){?>selected="selected"<?php }?>
					><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['status']->value['name'], 'htmlall', 'UTF-8');?>
</option>
				<?php } ?>
			</select>
			
			<span style="left:290px;position:absolute;width:50px"><?php echo smartyTranslate(array('s'=>'Member:'),$_smarty_tpl);?>
</span>
			<select id="selectMember" class="selectMember" name="selectMember" style="left:349px;position:absolute;width:185px;margin-top:-2px">
				<option value="">--- all ---</option>
				<?php  $_smarty_tpl->tpl_vars['member'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['member']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['people']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['member']->key => $_smarty_tpl->tpl_vars['member']->value){
$_smarty_tpl->tpl_vars['member']->_loop = true;
?>
					<option value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['member']->value['id_customer'], 'htmlall', 'UTF-8');?>
"
					<?php if ($_smarty_tpl->tpl_vars['id_member']->value==$_smarty_tpl->tpl_vars['member']->value['id_customer']){?>selected="selected"<?php }?>
					><?php echo smarty_modifier_escape($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['member']->value['firstname'],35), 'htmlall', 'UTF-8');?>
 <?php echo smarty_modifier_escape($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['member']->value['lastname'],34), 'htmlall', 'UTF-8');?>
</option>
				<?php } ?>			
			</select>
		</div>
		<div style="margin-top:10px">
		<?php echo smartyTranslate(array('s'=>'Scope:'),$_smarty_tpl);?>

		<select id="selectScope" class="selectScope" name="selectScope" style="left:100px;position:absolute;width:434px;margin-top:-2px">
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
		</select>
		</div>
		<div style="margin-top:10px">
		<?php echo smartyTranslate(array('s'=>'Funding Agency:'),$_smarty_tpl);?>

		<select id="selectFunding" class="selectFunding" name="selectFunding" style="left:100px;position:absolute;width:434px;margin-top:-2px">
			<option value="">--- all ---</option>
			<?php if ($_smarty_tpl->tpl_vars['funding_agencies']->value){?>
				<?php  $_smarty_tpl->tpl_vars['funding_agency'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['funding_agency']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['funding_agencies']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['funding_agency']->key => $_smarty_tpl->tpl_vars['funding_agency']->value){
$_smarty_tpl->tpl_vars['funding_agency']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['funding_agency']->value['id_funding_agency'];?>
" 
					<?php if ($_smarty_tpl->tpl_vars['id_funding_agency']->value==$_smarty_tpl->tpl_vars['funding_agency']->value['id_funding_agency']){?>selected="selected"<?php }?>
					><?php echo smarty_modifier_escape($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['funding_agency']->value['name'],70), 'htmlall', 'UTF-8');?>
</option>
				<?php } ?>
			<?php }?>
		</select>
		</div>		
		<div style="margin-top:10px;padding-left:220px">
			<input type="button" id="get_projects" class="get_projects" value="Get projects">
		</div>
	</form>
	<br>
	<?php if (!$_smarty_tpl->tpl_vars['number_of_projects']->value){?>
		No projects found.
	<?php }else{ ?>
	
	<table id="projects-table" class="tablesorter"> 
		<thead> 
			<tr> 
				<th class="projects-list-title" style="padding-left:3px">Project Title</th> 
				<th class="projects-list-status" style="width:80px;padding-left:3px">Status</th> 
			</tr> 
		</thead> 
		<tbody> 
			<?php  $_smarty_tpl->tpl_vars['project'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['project']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['projects']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['project']->key => $_smarty_tpl->tpl_vars['project']->value){
$_smarty_tpl->tpl_vars['project']->_loop = true;
?>
			<tr>
				<td class="projects-list-title">
					<a href="projects/<?php echo $_smarty_tpl->tpl_vars['project']->value['id_project'];?>
-<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['project']->value['name'],"/[^A-Za-z0-9]/","_");?>
">
						<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['project']->value['name'], 'htmlall', 'UTF-8');?>

					</a>
				</td>
				<td class="projects-list-status">
					<a href="projects/<?php echo $_smarty_tpl->tpl_vars['project']->value['id_project'];?>
-<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['project']->value['name'],"/[^A-Za-z0-9]/","_");?>
">
						<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['project']->value['status'], 'htmlall', 'UTF-8');?>

					</a>
				</td>
			</tr>
			<?php } ?>
		</tbody> 
	</table> 
	<?php }?>
</div>

<div class = "right-column">
	<img class="logo" src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
funding-agencies.png" />
	<div style="font-size:11px; padding-top:10px">
		Our research is funded by a number of different funding agencies. The most common ones are listed below.
	</div>	
	<?php  $_smarty_tpl->tpl_vars['funding_agency'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['funding_agency']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['top_funding_agencies']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['funding_agency']->key => $_smarty_tpl->tpl_vars['funding_agency']->value){
$_smarty_tpl->tpl_vars['funding_agency']->_loop = true;
?>
		<div class="row-logo">
			<div class="logo">
				<?php if ($_smarty_tpl->tpl_vars['funding_agency']->value['url']!=''){?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['funding_agency']->value['url'];?>
" target="_blank">
				<?php }?>
					<img class="logo" src="img/funding-agencies/<?php echo $_smarty_tpl->tpl_vars['funding_agency']->value['id_funding_agency'];?>
.jpg" />
				<?php if ($_smarty_tpl->tpl_vars['funding_agency']->value['url']!=''){?>
				</a>
				<?php }?>
			</div>	
		</div>
	<?php } ?>
</div>

<?php }} ?>