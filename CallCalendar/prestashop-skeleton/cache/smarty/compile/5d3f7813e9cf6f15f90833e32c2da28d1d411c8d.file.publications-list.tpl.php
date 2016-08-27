<?php /* Smarty version Smarty-3.1.8, created on 2013-05-28 16:41:24
         compiled from "/www/htdocs/es/themes/es/publications-list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:148444089751a4c2147c4524-39871386%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d3f7813e9cf6f15f90833e32c2da28d1d411c8d' => 
    array (
      0 => '/www/htdocs/es/themes/es/publications-list.tpl',
      1 => 1367841248,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '148444089751a4c2147c4524-39871386',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'publication_types' => 0,
    'publication_type' => 0,
    'id_type' => 0,
    'date' => 0,
    'y' => 0,
    'areas' => 0,
    'research_area' => 0,
    'id_area' => 0,
    'area' => 0,
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
    'author' => 0,
    'id_author' => 0,
    'number_of_publications' => 0,
    'publications' => 0,
    'publication' => 0,
    'i' => 0,
    'img_dir' => 0,
    'latest_publications' => 0,
    'latest_publication' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51a4c214b157e2_00600515',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a4c214b157e2_00600515')) {function content_51a4c214b157e2_00600515($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/www/htdocs/es/tools/smarty/plugins/modifier.escape.php';
if (!is_callable('smarty_modifier_date_format')) include '/www/htdocs/es/tools/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_regex_replace')) include '/www/htdocs/es/tools/smarty/plugins/modifier.regex_replace.php';
if (!is_callable('smarty_modifier_replace')) include '/www/htdocs/es/tools/smarty/plugins/modifier.replace.php';
?><script type="text/javascript">
//<![CDATA[
$(document).ready(function()
{
	$( "#get_publications" ).click(function() 
	{	
		url = 'publications?bibtex=false';
		if ($( "#selectType" ).val() != "") 
			url = url + '&type=' + $( "#selectType" ).val()
		if ($( "#selectDate" ).val() != "") 
			url = url + '&date=' + $( "#selectDate" ).val()
		if ($( "#selectScope" ).val() != "") 
			url = url + '&scope=' + $( "#selectScope" ).val()
		if ($( "#selectAuthor" ).val() != "") 
			url = url + '&author=' + $( "#selectAuthor" ).val()
		document.location.href = url;
	});
	$( "#get_bibtex" ).click(function() 
	{
		url = 'publications?bibtex=true';
		if ($( "#selectType" ).val() != "") 
			url = url + '&type=' + $( "#selectType" ).val()
		if ($( "#selectDate" ).val() != "") 
			url = url + '&date=' + $( "#selectDate" ).val()
		if ($( "#selectScope" ).val() != "") 
			url = url + '&scope=' + $( "#selectScope" ).val()
		if ($( "#selectAuthor" ).val() != "") 
			url = url + '&author=' + $( "#selectAuthor" ).val()
		document.location.href = url;
	});

});
//]]> 
</script>

<div class="centre-column">
	<h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
	<form id="publicationFilterForm" action="">
		<div>
			<?php echo smartyTranslate(array('s'=>'Type:'),$_smarty_tpl);?>

			<select id="selectType" class="selectType" name="selectType" style="left:50px;position:absolute;width:210px;margin-top:-2px">
				<option value="">--- all ---</option>
				<?php  $_smarty_tpl->tpl_vars['publication_type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['publication_type']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['publication_types']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['publication_type']->key => $_smarty_tpl->tpl_vars['publication_type']->value){
$_smarty_tpl->tpl_vars['publication_type']->_loop = true;
?>
					<option value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['publication_type']->value['id_publication_type'], 'htmlall', 'UTF-8');?>
"
					<?php if ($_smarty_tpl->tpl_vars['id_type']->value==$_smarty_tpl->tpl_vars['publication_type']->value['id_publication_type']){?>selected="selected"<?php }?>
					><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['publication_type']->value['name'], 'htmlall', 'UTF-8');?>
</option>
				<?php } ?>
			</select>
			<span style="left:284px;position:absolute;width:50px"><?php echo smartyTranslate(array('s'=>'Date:'),$_smarty_tpl);?>
</span>
			<select id="selectDate" class="selectDate" name="selectDate" style="left:324px;position:absolute;width:210px;margin-top:-2px">
				<option value="">--- all ---</option>
				<option value="last_6m" <?php if ($_smarty_tpl->tpl_vars['date']->value=="last_6m"){?>selected="selected"<?php }?>>last 6 months</option>
				<option value="last_12m" <?php if ($_smarty_tpl->tpl_vars['date']->value=="last_12m"){?>selected="selected"<?php }?>>last 12 months</option>
				<option value="future" <?php if ($_smarty_tpl->tpl_vars['date']->value=="future"){?>selected="selected"<?php }?>>to be published</option>
				<option value="">-----------</option>
				<?php $_smarty_tpl->tpl_vars['y'] = new Smarty_variable(smarty_modifier_date_format(time(),'%Y'), null, 0);?>
				<?php while ($_smarty_tpl->tpl_vars['y']->value>1982){?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['y']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['date']->value==$_smarty_tpl->tpl_vars['y']->value){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['y']->value;?>
</option>
					<?php echo $_smarty_tpl->tpl_vars['y']->value--;?>

				<?php }?>
			</select>
		</div>
		<div style="margin-top:10px">
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
					<option value="id_area_<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['research_area']->value['id_initiative'], 'htmlall', 'UTF-8');?>
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
		</div>
		<div style="margin-top:10px">
		<?php echo smartyTranslate(array('s'=>'Author:'),$_smarty_tpl);?>

		<select id="selectAuthor" class="selectAuthor" name="selectAuthor" style="left:50px;position:absolute;width:484px;margin-top:-2px">
			<option value="">--- all ---</option>
			<?php  $_smarty_tpl->tpl_vars['author'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['author']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['people']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['author']->key => $_smarty_tpl->tpl_vars['author']->value){
$_smarty_tpl->tpl_vars['author']->_loop = true;
?>
				<option value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['author']->value['id_customer'], 'htmlall', 'UTF-8');?>
"
				<?php if ($_smarty_tpl->tpl_vars['id_author']->value==$_smarty_tpl->tpl_vars['author']->value['id_customer']){?>selected="selected"<?php }?>
				><?php echo smarty_modifier_escape($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['author']->value['firstname'],35), 'htmlall', 'UTF-8');?>
 <?php echo smarty_modifier_escape($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['author']->value['lastname'],34), 'htmlall', 'UTF-8');?>
</option>
			<?php } ?>			
		</select>
		</div>
		<div style="margin-top:10px;padding-left:225px">
			<input type="button" id="get_publications" class="get_publications" value="Get publications">
			<!--input type="button" id="get_bibtex" class="get_bibtex" value="Get BibTeX entries"-->
		</div>
	</form>
	<br>
	<?php if (!$_smarty_tpl->tpl_vars['number_of_publications']->value){?>
		No publications found.
	<?php }?>

	<?php if (isset($_smarty_tpl->tpl_vars['publication_types']->value)){?>
		<?php  $_smarty_tpl->tpl_vars['publication_type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['publication_type']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['publication_types']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['publication_type']->key => $_smarty_tpl->tpl_vars['publication_type']->value){
$_smarty_tpl->tpl_vars['publication_type']->_loop = true;
?>
			<?php if (isset($_smarty_tpl->tpl_vars['publications']->value[$_smarty_tpl->tpl_vars['publication_type']->value['id_publication_type']])&&$_smarty_tpl->tpl_vars['publications']->value[$_smarty_tpl->tpl_vars['publication_type']->value['id_publication_type']]){?>
				<hr>
				<h2><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['publication_type']->value['name'], 'htmlall', 'UTF-8');?>
</h2>
				<?php  $_smarty_tpl->tpl_vars['publication'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['publication']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['publications']->value[$_smarty_tpl->tpl_vars['publication_type']->value['id_publication_type']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['publication']->key => $_smarty_tpl->tpl_vars['publication']->value){
$_smarty_tpl->tpl_vars['publication']->_loop = true;
?>
					<p>
					<a href="publications/<?php echo $_smarty_tpl->tpl_vars['publication']->value['id_publication'];?>
-<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['publication']->value['title'],"/[^A-Za-z0-9]/","_");?>
">
						<b>
							<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['publication']->value['title'], 'htmlall', 'UTF-8');?>

							<?php if (preg_match_all('/[^\s]/u',smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['publication']->value['date_publish'],'-00',''),'0000',''), $tmp)>4){?>
								(<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['publication']->value['date_publish'],'%b %Y');?>
)
							<?php }elseif(preg_match_all('/[^\s]/u',smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['publication']->value['date_publish'],'-00',''),'0000',''), $tmp)==4){?>
								(<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['publication']->value['date_publish'],'-00','');?>
)
							<?php }?>		
						</b>
					</a>
					</br>
					<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
					<?php  $_smarty_tpl->tpl_vars['author'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['author']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['publication']->value['authors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['author']->key => $_smarty_tpl->tpl_vars['author']->value){
$_smarty_tpl->tpl_vars['author']->_loop = true;
?>
						<a href="staff/<?php echo $_smarty_tpl->tpl_vars['author']->value['id_customer'];?>
-<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['author']->value['firstname'],"/[^A-Za-z0-9]/","_");?>
_<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['author']->value['lastname'],"/[^A-Za-z0-9]/","_");?>
">
							<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['author']->value['firstname'], 'htmlall', 'UTF-8');?>
 <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['author']->value['lastname'], 'htmlall', 'UTF-8');?>
<?php if (count($_smarty_tpl->tpl_vars['publication']->value['authors'])!=$_smarty_tpl->tpl_vars['i']->value){?>,<?php }?>
						</a>
						<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>							
					<?php } ?>
					</br>
					<?php if ($_smarty_tpl->tpl_vars['publication']->value['book_title']){?>
						<?php echo $_smarty_tpl->tpl_vars['publication']->value['book_title'];?>

					<?php }else{ ?>
						<?php echo $_smarty_tpl->tpl_vars['publication']->value['publication_venue_instance_title'];?>

					<?php }?>
					</p>
				<?php } ?>
			<?php }?>
		<?php } ?>
	<?php }?>

</div>

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
				<?php if (preg_match_all('/[^\s]/u',smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['latest_publication']->value['date_publish'],'-00',''),'0000',''), $tmp)==10){?>
					<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['latest_publication']->value['date_publish'],'%Y-%m-%d');?>

				<?php }elseif(preg_match_all('/[^\s]/u',smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['latest_publication']->value['date_publish'],'-00',''),'0000',''), $tmp)==7){?>
					<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['latest_publication']->value['date_publish'],'%b %Y');?>

				<?php }elseif(preg_match_all('/[^\s]/u',smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['latest_publication']->value['date_publish'],'-00',''),'0000',''), $tmp)==4){?>
					<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['latest_publication']->value['date_publish'],'-00','');?>

				<?php }?>		
			</div>	
			<div class="title">
				<a href="publications/<?php echo $_smarty_tpl->tpl_vars['latest_publication']->value['id_publication'];?>
-<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['latest_publication']->value['title'],"/[^A-Za-z0-9]/","_");?>
">
					<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['latest_publication']->value['title'], 'htmlall', 'UTF-8');?>

				</a>	
 			</div>	
		</div>
	<?php } ?>
</div><?php }} ?>