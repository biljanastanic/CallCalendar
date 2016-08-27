<?php /* Smarty version Smarty-3.1.13, created on 2014-10-24 20:26:55
         compiled from "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC9\data\localweb\prestashop-skeleton\themes\es\projects-list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10995544a7f0578b0d6-06786746%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba7a8279851e21f7b03e7f5cf21886be812d135f' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC9\\data\\localweb\\prestashop-skeleton\\themes\\es\\projects-list.tpl',
      1 => 1414175207,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10995544a7f0578b0d6-06786746',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_544a7f064059c4_57646366',
  'variables' => 
  array (
    'title' => 0,
    'statuses' => 0,
    'status' => 0,
    'id_status' => 0,
    'people' => 0,
    'member' => 0,
    'id_member' => 0,
    'funding_agencies' => 0,
    'funding_agency' => 0,
    'id_funding_agency' => 0,
    'number_of_projects' => 0,
    'projects' => 0,
    'project' => 0,
    'base_url' => 0,
    'top_funding_agencies' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544a7f064059c4_57646366')) {function content_544a7f064059c4_57646366($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC9\\data\\localweb\\prestashop-skeleton\\tools\\smarty\\plugins\\modifier.escape.php';
if (!is_callable('smarty_modifier_replace')) include 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC9\\data\\localweb\\prestashop-skeleton\\tools\\smarty\\plugins\\modifier.replace.php';
if (!is_callable('smarty_modifier_regex_replace')) include 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC9\\data\\localweb\\prestashop-skeleton\\tools\\smarty\\plugins\\modifier.regex_replace.php';
?><script type="text/javascript">
//<![CDATA[
$(document).ready(function()
{
	$("table").tablesorter(); 
	$( "#get_projects" ).click(function() 
	{	
		url = 'projects?';
		if ($( "#selectStatus" ).val() != "") 
			url = url + 'status=' + $( "#selectStatus" ).val()
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
-<?php if ($_smarty_tpl->tpl_vars['project']->value['acronym']!=''){?><?php echo smarty_modifier_regex_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['project']->value['acronym'],"ö","o"),"Ö","O"),"ü","u"),"Ü","U"),"ä","a"),"Ä","A"),"å","a"),"Å","A"),"é","e"),"É","E"),"á","a"),"Á","A"),"/[^A-Za-z0-9]/","_");?>

					<?php }else{ ?><?php echo smarty_modifier_regex_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['project']->value['name'],"ö","o"),"Ö","O"),"ü","u"),"Ü","U"),"ä","a"),"Ä","A"),"å","a"),"Å","A"),"é","e"),"É","E"),"á","a"),"Á","A"),"/[^A-Za-z0-9]/","_");?>
<?php }?>">
						<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['project']->value['name'], 'htmlall', 'UTF-8');?>

					</a>
				</td>
				<td class="projects-list-status">
					<a href="projects/<?php echo $_smarty_tpl->tpl_vars['project']->value['id_project'];?>
-<?php if ($_smarty_tpl->tpl_vars['project']->value['acronym']!=''){?><?php echo smarty_modifier_regex_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['project']->value['acronym'],"ö","o"),"Ö","O"),"ü","u"),"Ü","U"),"ä","a"),"Ä","A"),"å","a"),"Å","A"),"é","e"),"É","E"),"á","a"),"Á","A"),"/[^A-Za-z0-9]/","_");?>

					<?php }else{ ?><?php echo smarty_modifier_regex_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['project']->value['name'],"ö","o"),"Ö","O"),"ü","u"),"Ü","U"),"ä","a"),"Ä","A"),"å","a"),"Å","A"),"é","e"),"É","E"),"á","a"),"Á","A"),"/[^A-Za-z0-9]/","_");?>
<?php }?>">
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
	<img class="logo" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
img/headers/funding-agencies.png" />
	<div style="font-size:11px; padding-top:10px">
		Our research is funded by a number of different funding agencies. The most common ones are listed below.
	</div>	
	<?php  $_smarty_tpl->tpl_vars['funding_agency'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['funding_agency']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['top_funding_agencies']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['funding_agency']->key => $_smarty_tpl->tpl_vars['funding_agency']->value){
$_smarty_tpl->tpl_vars['funding_agency']->_loop = true;
?>
		<?php if (file_exists("img/funding-agencies/".((string)$_smarty_tpl->tpl_vars['funding_agency']->value['id_funding_agency']).".jpg")){?>
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
		<?php }?>
	<?php } ?>
</div>

<?php }} ?>