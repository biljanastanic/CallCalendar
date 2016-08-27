<?php /* Smarty version Smarty-3.1.8, created on 2013-06-04 08:52:59
         compiled from "/www/htdocs/es/themes/es/project.tpl" */ ?>
<?php /*%%SmartyHeaderCode:38887918051ad8ecb786b23-10847025%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba5ac84eaca5b62a8def352abf167bbdea65ef30' => 
    array (
      0 => '/www/htdocs/es/themes/es/project.tpl',
      1 => 1369407693,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '38887918051ad8ecb786b23-10847025',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'project' => 0,
    'divisions' => 0,
    'base_url' => 0,
    'division' => 0,
    'i' => 0,
    'research_groups' => 0,
    'research_group' => 0,
    'members' => 0,
    'publications' => 0,
    'member' => 0,
    'publication' => 0,
    'author' => 0,
    'partner' => 0,
    'leader' => 0,
    'img_dir' => 0,
    'funding_agencies' => 0,
    'funding_agency' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51ad8ecc1cb628_95172395',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51ad8ecc1cb628_95172395')) {function content_51ad8ecc1cb628_95172395($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/www/htdocs/es/tools/smarty/plugins/modifier.escape.php';
if (!is_callable('smarty_modifier_regex_replace')) include '/www/htdocs/es/tools/smarty/plugins/modifier.regex_replace.php';
if (!is_callable('smarty_modifier_replace')) include '/www/htdocs/es/tools/smarty/plugins/modifier.replace.php';
if (!is_callable('smarty_modifier_date_format')) include '/www/htdocs/es/tools/smarty/plugins/modifier.date_format.php';
?><?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?><?php echo smartyTranslate(array('s'=>'Research project'),$_smarty_tpl);?>
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
	<h1><?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
</h1>
	<?php if (isset($_smarty_tpl->tpl_vars['project']->value['focus'])&&$_smarty_tpl->tpl_vars['project']->value['focus']!=''){?>
		<div class="centre-block">
			<div class="div-label">
				<h3>Focus:</h3>
			</div>
			<div class="div-content">
				<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['project']->value['focus'], 'htmlall', 'UTF-8');?>

			</div>
			<br class="clearBoth">
		</div>
	<?php }?>

	<?php if (isset($_smarty_tpl->tpl_vars['divisions']->value)&&count($_smarty_tpl->tpl_vars['divisions']->value)>0){?>
		<div class="centre-block">
			<div class="div-label">
				<?php if (isset($_smarty_tpl->tpl_vars['divisions']->value)&&count($_smarty_tpl->tpl_vars['divisions']->value)==1){?>
				<h3>Division:</h3>
				<?php }else{ ?>
				<h3>Divisions:</h3>
				<?php }?>
				</div>
			<div class="div-content">
				<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
				<?php  $_smarty_tpl->tpl_vars['division'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['division']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['divisions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['division']->key => $_smarty_tpl->tpl_vars['division']->value){
$_smarty_tpl->tpl_vars['division']->_loop = true;
?>
					<a class="standardLink" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
divisions/<?php echo $_smarty_tpl->tpl_vars['division']->value['id_initiative'];?>
-<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['division']->value['name'],"/[^A-Za-z0-9]/","_");?>
"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['division']->value['name'], 'htmlall', 'UTF-8');?>
</a><?php if (count($_smarty_tpl->tpl_vars['divisions']->value)!=$_smarty_tpl->tpl_vars['i']->value){?><br><?php }?>
					<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>							
				<?php } ?>
			</div>
			<br class="clearBoth">
		</div>
	<?php }?>	
	
	<?php if (isset($_smarty_tpl->tpl_vars['research_groups']->value)&&count($_smarty_tpl->tpl_vars['research_groups']->value)>0){?>
		<div class="centre-block">
			<div class="div-label">
				<?php if (isset($_smarty_tpl->tpl_vars['research_groups']->value)&&count($_smarty_tpl->tpl_vars['research_groups']->value)==1){?>
				<h3>Research Group:</h3>
				<?php }else{ ?>
				<h3>Research Groups:</h3>
				<?php }?>
				</div>
			<div class="div-content">
				<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
				<?php  $_smarty_tpl->tpl_vars['research_group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['research_group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['research_groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['research_group']->key => $_smarty_tpl->tpl_vars['research_group']->value){
$_smarty_tpl->tpl_vars['research_group']->_loop = true;
?>
					<a class="standardLink" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
research-groups/<?php echo $_smarty_tpl->tpl_vars['research_group']->value['id_initiative'];?>
-<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['research_group']->value['name'],"/[^A-Za-z0-9]/","_");?>
"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['research_group']->value['name'], 'htmlall', 'UTF-8');?>
</a><?php if (count($_smarty_tpl->tpl_vars['research_groups']->value)!=$_smarty_tpl->tpl_vars['i']->value){?><br><?php }?>
					<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>							
				<?php } ?>
			</div>
			<br class="clearBoth">
		</div>
	<?php }?>	
	
	<?php if (isset($_smarty_tpl->tpl_vars['project']->value['status'])&&$_smarty_tpl->tpl_vars['project']->value['status']!=''){?>
		<div class="centre-block">
			<div class="div-label">
				<h3>Status:</h3>
			</div>
			<div class="div-content">
				<?php echo $_smarty_tpl->tpl_vars['project']->value['status'];?>

			</div>
			<br class="clearBoth">
		</div>
	<?php }?>

	<?php if (isset($_smarty_tpl->tpl_vars['project']->value['date_start'])&&$_smarty_tpl->tpl_vars['project']->value['date_start']!="0000-00-00"){?>
		<div class="centre-block">
			<div class="div-label">
				<h3>Start date:</h3>
			</div>
			<div class="div-content">
				<?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['project']->value['date_start'],'-00',''),'0000','');?>

			</div>
			<br class="clearBoth">
		</div>
	<?php }?>

	<?php if (isset($_smarty_tpl->tpl_vars['project']->value['date_end'])&&$_smarty_tpl->tpl_vars['project']->value['date_end']!="0000-00-00"){?>
		<div class="centre-block">
			<div class="div-label">
				<h3>End date:</h3>
			</div>
			<div class="div-content">
				<?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['project']->value['date_end'],'-00',''),'0000','');?>

			</div>
			<br class="clearBoth">
		</div>
	<?php }?>
	
	<?php if (isset($_smarty_tpl->tpl_vars['project']->value['url'])&&$_smarty_tpl->tpl_vars['project']->value['url']!=''){?>
	<div class="centre-block">
			<div class="div-label">
				<h3>Url:</h3>
			</div>
			<div class="div-content">
				<a href="<?php echo $_smarty_tpl->tpl_vars['project']->value['url'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['project']->value['url'];?>
</a>
			</div>
			<br class="clearBoth">
		</div>
				<?php }?>
	<div id="tabs">
		<ul>
			<?php if (isset($_smarty_tpl->tpl_vars['project']->value['overview'])&&$_smarty_tpl->tpl_vars['project']->value['overview']!=''){?>
				<li><a href="#tabs-1">Overview</a></li>
			<?php }?>
			<?php if (isset($_smarty_tpl->tpl_vars['members']->value)&&count($_smarty_tpl->tpl_vars['members']->value)>0){?>
				<li><a href="#tabs-2">Members</a></li>
			<?php }?>
			<?php if (isset($_smarty_tpl->tpl_vars['publications']->value)&&count($_smarty_tpl->tpl_vars['publications']->value)>0){?>
				<li><a href="#tabs-3">Latest Publications</a></li>
			<?php }?>
			<?php if (isset($_smarty_tpl->tpl_vars['project']->value['partners'])&&count($_smarty_tpl->tpl_vars['project']->value['partners'])>0){?>
				<li><a href="#tabs-4">Partners</a></li>
			<?php }?>			
		</ul>
	
	<?php if (isset($_smarty_tpl->tpl_vars['project']->value['overview'])&&$_smarty_tpl->tpl_vars['project']->value['overview']!=''){?>
		<div id="tabs-1">
			<?php echo $_smarty_tpl->tpl_vars['project']->value['overview'];?>

		</div>	
	<?php }?>
	
	<?php if (isset($_smarty_tpl->tpl_vars['members']->value)){?>
		<div id="tabs-2">
			<table id="project-table" class="tablesorter"> 
				<thead> 
					<tr> 
						<th class="staff-list-lastname">First Name</th> 
						<th class="staff-list-firstname">Last Name</th> 
						<th class="staff-list-title">Title</th> 
					</tr> 
				</thead> 
				<tbody> 
					<?php  $_smarty_tpl->tpl_vars['member'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['member']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['members']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['member']->key => $_smarty_tpl->tpl_vars['member']->value){
$_smarty_tpl->tpl_vars['member']->_loop = true;
?>
					<tr>
						<td class="staff-list-firstname">
							<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
staff/<?php echo $_smarty_tpl->tpl_vars['member']->value['id_customer'];?>
-<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['member']->value['firstname'],"/[^A-Za-z0-9]/","_");?>
_<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['member']->value['lastname'],"/[^A-Za-z0-9]/","_");?>
">
								<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['member']->value['firstname'], 'htmlall', 'UTF-8');?>

							</a>
						</td>
						<td class="staff-list-lastname">
							<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
staff/<?php echo $_smarty_tpl->tpl_vars['member']->value['id_customer'];?>
-<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['member']->value['firstname'],"/[^A-Za-z0-9]/","_");?>
_<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['member']->value['lastname'],"/[^A-Za-z0-9]/","_");?>
">
								<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['member']->value['lastname'], 'htmlall', 'UTF-8');?>

							</a>
						</td>
						<td class="staff-list-title">
							<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
staff/<?php echo $_smarty_tpl->tpl_vars['member']->value['id_customer'];?>
-<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['member']->value['firstname'],"/[^A-Za-z0-9]/","_");?>
_<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['member']->value['lastname'],"/[^A-Za-z0-9]/","_");?>
">
								<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['member']->value['title'], 'htmlall', 'UTF-8');?>

							</a>
						</td>
					</tr>
					<?php } ?>
				</tbody> 
			</table>
		</div>	
	<?php }?>


	<?php if (isset($_smarty_tpl->tpl_vars['publications']->value)&&count($_smarty_tpl->tpl_vars['publications']->value)>0){?>
		<div id="tabs-3">
		<p>
			<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
publications?scope=id_project_<?php echo $_smarty_tpl->tpl_vars['project']->value['id_project'];?>
">[Show all publications]</a>
		</p>
			<?php  $_smarty_tpl->tpl_vars['publication'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['publication']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['publications']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['publication']->key => $_smarty_tpl->tpl_vars['publication']->value){
$_smarty_tpl->tpl_vars['publication']->_loop = true;
?>
				<p>
					<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
publications/<?php echo $_smarty_tpl->tpl_vars['publication']->value['id_publication'];?>
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
						<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
staff/<?php echo $_smarty_tpl->tpl_vars['author']->value['id_customer'];?>
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
		</div>
	<?php }?>
	
	
		<?php if (isset($_smarty_tpl->tpl_vars['project']->value['partners'])&&count($_smarty_tpl->tpl_vars['project']->value['partners'])>0){?>
		<div id="tabs-4">
			<table id="project-table" class="tablesorter"> 
				<thead> 
					<tr> 
						<th class="partner-list-name">Partner</th> 
						<th class="partner-list-type">Type</th> 
					</tr> 
				</thead> 
				<tbody> 
					<?php  $_smarty_tpl->tpl_vars['partner'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['partner']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['project']->value['partners']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['partner']->key => $_smarty_tpl->tpl_vars['partner']->value){
$_smarty_tpl->tpl_vars['partner']->_loop = true;
?>
					<tr>
						<td class=partner-list-name">
							<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['partner']->value['name'], 'htmlall', 'UTF-8');?>

						</td>
						<td class="partner-list-type">
							<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['partner']->value['type'], 'htmlall', 'UTF-8');?>

						</td>
					</tr>
					<?php } ?>
				</tbody> 
			</table>
		</div>	
	<?php }?>

	</div>
		 
</div>

<div class = "right-column">
	<?php if (isset($_smarty_tpl->tpl_vars['leader']->value[0])){?>
	<div style="margin-bottom: 20px">
		<div style="margin-left:90px; margin-bottom: -45px; position:relative; z-index:2;">
			<img src="../img/staff/<?php echo $_smarty_tpl->tpl_vars['leader']->value[0]['id_customer'];?>
-staff.jpg" style="width:105px;"/>
		</div>
		<div style="position:relative;float:left;z-index:1;">
			<img class="logo" src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
project-leader.png"/>
			<h3>
				<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
staff/<?php echo $_smarty_tpl->tpl_vars['leader']->value[0]['id_customer'];?>
-<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['leader']->value[0]['firstname'],"/[^A-Za-z0-9]/","_");?>
_<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['leader']->value[0]['lastname'],"/[^A-Za-z0-9]/","_");?>
">
					<?php echo $_smarty_tpl->tpl_vars['leader']->value[0]['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['leader']->value[0]['lastname'];?>
, <?php echo $_smarty_tpl->tpl_vars['leader']->value[0]['title'];?>

				</a>			
				</h3>
			Email: <?php echo $_smarty_tpl->tpl_vars['leader']->value[0]['email'];?>

			<br>Room: <?php echo $_smarty_tpl->tpl_vars['leader']->value[0]['room'];?>

			<br>Phone: <?php echo $_smarty_tpl->tpl_vars['leader']->value[0]['phone'];?>

		</div>
		<br class="clearBoth">
	</div>
	<?php }?>	
	<?php if (isset($_smarty_tpl->tpl_vars['funding_agencies']->value)&&count($_smarty_tpl->tpl_vars['funding_agencies']->value)>0){?>
	<div style="margin-bottom: 20px">
		<img class="logo" src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
funding-agencies.png" />
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