<?php /* Smarty version Smarty-3.1.8, created on 2013-05-24 10:23:31
         compiled from "/www/htdocs/mrtc/testIDT/themes/es/research-group.tpl" */ ?>
<?php /*%%SmartyHeaderCode:941236020519f2383156fb0-02327166%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79dbbc0be1056101eef56ba9697b8e4444a093b5' => 
    array (
      0 => '/www/htdocs/mrtc/testIDT/themes/es/research-group.tpl',
      1 => 1367842701,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '941236020519f2383156fb0-02327166',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'group' => 0,
    'divisions' => 0,
    'base_url' => 0,
    'division' => 0,
    'i' => 0,
    'members' => 0,
    'projects' => 0,
    'publications' => 0,
    'member' => 0,
    'project' => 0,
    'person' => 0,
    'publication' => 0,
    'author' => 0,
    'leader' => 0,
    'img_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_519f2383776b13_51122335',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_519f2383776b13_51122335')) {function content_519f2383776b13_51122335($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/www/htdocs/mrtc/testIDT/tools/smarty/plugins/modifier.escape.php';
if (!is_callable('smarty_modifier_regex_replace')) include '/www/htdocs/mrtc/testIDT/tools/smarty/plugins/modifier.regex_replace.php';
if (!is_callable('smarty_modifier_replace')) include '/www/htdocs/mrtc/testIDT/tools/smarty/plugins/modifier.replace.php';
if (!is_callable('smarty_modifier_date_format')) include '/www/htdocs/mrtc/testIDT/tools/smarty/plugins/modifier.date_format.php';
?><?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?><?php echo smartyTranslate(array('s'=>'Research Group'),$_smarty_tpl);?>
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
	<h1><?php echo $_smarty_tpl->tpl_vars['group']->value['name'];?>
</h1>
	<?php if (isset($_smarty_tpl->tpl_vars['group']->value['focus'])&&$_smarty_tpl->tpl_vars['group']->value['focus']!=''){?>
		<div class="centre-block">
			<div class="div-label">
				<h3>Focus:</h3>
			</div>
			<div class="div-content">
				<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['group']->value['focus'], 'htmlall', 'UTF-8');?>

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
	
	<div id="tabs">
		<ul>
			<?php if (isset($_smarty_tpl->tpl_vars['group']->value['description'])&&$_smarty_tpl->tpl_vars['group']->value['description']!=''){?>
				<li><a href="#tabs-1">Overview</a></li>
			<?php }?>
			<?php if (isset($_smarty_tpl->tpl_vars['members']->value)&&count($_smarty_tpl->tpl_vars['members']->value)>0){?>
				<li><a href="#tabs-2">Members</a></li>
			<?php }?>
			<?php if (isset($_smarty_tpl->tpl_vars['projects']->value)&&count($_smarty_tpl->tpl_vars['projects']->value)>0){?>
				<li><a href="#tabs-3">Projects</a></li>
			<?php }?>
			<?php if (isset($_smarty_tpl->tpl_vars['publications']->value)&&count($_smarty_tpl->tpl_vars['publications']->value)>0){?>
				<li><a href="#tabs-4">Latest Publications</a></li>
			<?php }?>
		</ul>

	<?php if (isset($_smarty_tpl->tpl_vars['group']->value['description'])&&$_smarty_tpl->tpl_vars['group']->value['description']!=''){?>
		<div id="tabs-1">
			<?php echo $_smarty_tpl->tpl_vars['group']->value['description'];?>

		</div>	
	<?php }?>
	
	<?php if (isset($_smarty_tpl->tpl_vars['members']->value)){?>
		<div id="tabs-2">
			<table id="organization-table" class="tablesorter"> 
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
	
	<?php if (isset($_smarty_tpl->tpl_vars['projects']->value)&&count($_smarty_tpl->tpl_vars['projects']->value)>0){?>
		<div id="tabs-3">
			<table id="organization-table" class="tablesorter" style="width:495px;"> 
				<thead> 
					<tr> 
						<th class="projects-list-title" style="width:300px;padding-left:3px">Project Title</th> 
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
							<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
projects/<?php echo $_smarty_tpl->tpl_vars['project']->value['id_project'];?>
-<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['project']->value['name'],"/[^A-Za-z0-9]/","_");?>
">
								<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['project']->value['name'], 'htmlall', 'UTF-8');?>

							</a>
						</td>
						<td class="projects-list-status">
							<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
projects/<?php echo $_smarty_tpl->tpl_vars['person']->value['id_customer'];?>
-<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['project']->value['name'],"/[^A-Za-z0-9]/","_");?>
">
								<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['project']->value['status'], 'htmlall', 'UTF-8');?>

							</a>
						</td>
					</tr>
					<?php } ?>
				</tbody> 
			</table>
		</div>
	<?php }?>	
	
	<?php if (isset($_smarty_tpl->tpl_vars['publications']->value)&&count($_smarty_tpl->tpl_vars['publications']->value)>0){?>
		<div id="tabs-4">
		<p>
			<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
publications?scope=id_group_<?php echo $_smarty_tpl->tpl_vars['group']->value['id_initiative'];?>
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
group-leader.png"/>
			<h3>
				<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
staff/<?php echo $_smarty_tpl->tpl_vars['leader']->value[0]['id_customer'];?>
-<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['leader']->value[0]['firstname'],"/[^A-Za-z0-9]/","_");?>
_<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['leader']->value[0]['lastname'],' ','_');?>
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
</div>
<?php }} ?>