<?php /* Smarty version Smarty-3.1.13, created on 2014-10-24 18:42:16
         compiled from "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC9\data\localweb\prestashop-skeleton\themes\es\person.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24972544a8168502c81-61566019%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6fcca0f9ceeeb72eff77c054e6a2c31331416d8f' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC9\\data\\localweb\\prestashop-skeleton\\themes\\es\\person.tpl',
      1 => 1396003352,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24972544a8168502c81-61566019',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'person' => 0,
    'img_url' => 0,
    'divisions' => 0,
    'base_url' => 0,
    'division' => 0,
    'i' => 0,
    'groups' => 0,
    'group' => 0,
    'publications' => 0,
    'projects' => 0,
    'phd_students_main' => 0,
    'phd_students_assistant' => 0,
    'msc_theses' => 0,
    'publication' => 0,
    'author' => 0,
    'project' => 0,
    'phd_student' => 0,
    'position' => 0,
    'is_phd_student' => 0,
    'msc_thesis' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_544a816a1170d1_65578270',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544a816a1170d1_65578270')) {function content_544a816a1170d1_65578270($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC9\\data\\localweb\\prestashop-skeleton\\tools\\smarty\\plugins\\modifier.escape.php';
if (!is_callable('smarty_modifier_replace')) include 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC9\\data\\localweb\\prestashop-skeleton\\tools\\smarty\\plugins\\modifier.replace.php';
if (!is_callable('smarty_modifier_regex_replace')) include 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC9\\data\\localweb\\prestashop-skeleton\\tools\\smarty\\plugins\\modifier.regex_replace.php';
if (!is_callable('smarty_modifier_date_format')) include 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC9\\data\\localweb\\prestashop-skeleton\\tools\\smarty\\plugins\\modifier.date_format.php';
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
<div class="centre-column-single">
	<h1>
		<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['person']->value['firstname'], 'htmlall', 'UTF-8');?>
 <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['person']->value['lastname'], 'htmlall', 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['person']->value['title']!=''){?>, <span style="color:#666;font-style:italic;font-size:0.8em;"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['person']->value['title'], 'htmlall', 'UTF-8');?>
</span><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['person']->value['external']){?><span style="color:#ff0000;font-style:italic;font-size:0.6em;"> (external)</span>
		<?php }elseif(!$_smarty_tpl->tpl_vars['person']->value['active']){?><span style="color:#ff0000;font-style:italic;font-size:0.6em;"> (not working at IDT anymore)</span>
		<?php }?>
	</h1>
	<div class="centre-block">
		<?php if (file_exists("img/staff/".((string)$_smarty_tpl->tpl_vars['person']->value['id_customer'])."-staff.jpg")){?>
			<div class="div-photo">
				<img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
staff/<?php echo $_smarty_tpl->tpl_vars['person']->value['id_customer'];?>
-staff.jpg?time=<?php echo time();?>
" >
			</div>
		<?php }?>	
		<div class="person-meta-data">
			<?php if (isset($_smarty_tpl->tpl_vars['person']->value['email'])&&$_smarty_tpl->tpl_vars['person']->value['email']!=''){?>
				<div class="div-label-2">
					<b>E-mail:</b>
				</div>
				<div class="div-content-2">
					<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['person']->value['email'], 'htmlall', 'UTF-8');?>

				</div>
			<?php }?>
			
			<?php if (isset($_smarty_tpl->tpl_vars['person']->value['room'])&&$_smarty_tpl->tpl_vars['person']->value['room']!=''){?>
				<div class="div-label-2">
					<b>Room:</b>
				</div>
				<div class="div-content-2">
					<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['person']->value['room'], 'htmlall', 'UTF-8');?>

				</div>
			<?php }?>
			
			<?php if (isset($_smarty_tpl->tpl_vars['person']->value['phone'])&&$_smarty_tpl->tpl_vars['person']->value['phone']!=''){?>
				<div class="div-label-2">
					<b>Phone:</b>
				</div>
				<div class="div-content-2">
					<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['person']->value['phone'], 'htmlall', 'UTF-8');?>

				</div>
			<?php }?>
			
			<?php if (isset($_smarty_tpl->tpl_vars['person']->value['phone_alt'])&&$_smarty_tpl->tpl_vars['person']->value['phone_alt']!=''){?>
				<div class="div-label-2">
					<b>Phone (alt):</b>
				</div>
				<div class="div-content-2">
					<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['person']->value['phone_alt'], 'htmlall', 'UTF-8');?>

				</div>
			<?php }?>			
			
		
			<?php if (isset($_smarty_tpl->tpl_vars['divisions']->value)&&count($_smarty_tpl->tpl_vars['divisions']->value)>0){?>
				<div class="div-label-2">
					<?php if (isset($_smarty_tpl->tpl_vars['divisions']->value)&&count($_smarty_tpl->tpl_vars['divisions']->value)==1){?>
					<b>Division:</b>
					<?php }else{ ?>
					<b>Divisions:</b>
					<?php }?>
					</div>
				<div class="div-content-2">
					<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
					<?php  $_smarty_tpl->tpl_vars['division'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['division']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['divisions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['division']->key => $_smarty_tpl->tpl_vars['division']->value){
$_smarty_tpl->tpl_vars['division']->_loop = true;
?>
						<a class="standardLink" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
divisions/<?php echo $_smarty_tpl->tpl_vars['division']->value['id_initiative'];?>
-<?php echo smarty_modifier_regex_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['division']->value['name'],"ö","o"),"Ö","O"),"ü","u"),"Ü","U"),"ä","a"),"Ä","A"),"å","a"),"Å","A"),"é","e"),"É","E"),"á","a"),"Á","A"),"/[^A-Za-z0-9]/","_");?>
"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['division']->value['name'], 'htmlall', 'UTF-8');?>
</a><?php if (count($_smarty_tpl->tpl_vars['divisions']->value)!=$_smarty_tpl->tpl_vars['i']->value){?><br><?php }?>
						<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>							
					<?php } ?>
				</div>
			<?php }?>	
			<?php if (isset($_smarty_tpl->tpl_vars['groups']->value)&&count($_smarty_tpl->tpl_vars['groups']->value)>0){?>
				<div class="div-label-2">
					<?php if (isset($_smarty_tpl->tpl_vars['groups']->value)&&count($_smarty_tpl->tpl_vars['groups']->value)==1){?>
					<b>Research group:</b>
					<?php }else{ ?>
					<b>Research groups:</b>
					<?php }?>
					</div>
				<div class="div-content-2">
					<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
					<?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value){
$_smarty_tpl->tpl_vars['group']->_loop = true;
?>
						<a class="standardLink" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
research-groups/<?php echo $_smarty_tpl->tpl_vars['group']->value['id_initiative'];?>
-<?php echo smarty_modifier_regex_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['group']->value['name'],"ö","o"),"Ö","O"),"ü","u"),"Ü","U"),"ä","a"),"Ä","A"),"å","a"),"Å","A"),"é","e"),"É","E"),"á","a"),"Á","A"),"/[^A-Za-z0-9]/","_");?>
"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['group']->value['name'], 'htmlall', 'UTF-8');?>
</a><?php if (count($_smarty_tpl->tpl_vars['group']->value)!=$_smarty_tpl->tpl_vars['i']->value){?><br><?php }?>
						<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>							
					<?php } ?>
				</div>
			<?php }?>	
			
			<?php if ((isset($_smarty_tpl->tpl_vars['person']->value['url'])&&$_smarty_tpl->tpl_vars['person']->value['url']!='')||(isset($_smarty_tpl->tpl_vars['person']->value['url_private'])&&$_smarty_tpl->tpl_vars['person']->value['url_private']!='')||(isset($_smarty_tpl->tpl_vars['person']->value['url_linkedin'])&&$_smarty_tpl->tpl_vars['person']->value['url_linkedin']!='')){?>
				<div class="div-label-2">
					<b>Web:</b>
				</div>
				<div class="div-content-2">
					<?php if (isset($_smarty_tpl->tpl_vars['person']->value['url_private'])&&$_smarty_tpl->tpl_vars['person']->value['url_private']!=''){?>
						<a class="standardLink" href="<?php echo $_smarty_tpl->tpl_vars['person']->value['url_private'];?>
">
							Personal homepage
						</a>
						<br>
					<?php }?>
					<?php if (isset($_smarty_tpl->tpl_vars['person']->value['url'])&&$_smarty_tpl->tpl_vars['person']->value['url']!=''){?>
						<a class="standardLink" href="<?php echo $_smarty_tpl->tpl_vars['person']->value['url'];?>
">
							Official university homepage
						</a>
						<br>
					<?php }?>
					<?php if (isset($_smarty_tpl->tpl_vars['person']->value['url_linkedin'])&&$_smarty_tpl->tpl_vars['person']->value['url_linkedin']!=''){?>
						<a class="standardLink" href="<?php echo $_smarty_tpl->tpl_vars['person']->value['url_linkedin'];?>
">
							Linkedin page
						</a>
					<?php }?>
					<br>
				</div>
			<?php }?>
			
			<br class="clearBoth">
		</div>
		
		
		<br class="clearBoth">
	</div>

	<div id="tabs">
		<ul>
			<?php if (isset($_smarty_tpl->tpl_vars['person']->value['biography'])&&$_smarty_tpl->tpl_vars['person']->value['biography']!=''){?>
				<li><a href="#tabs-1">Biography</a></li>
			<?php }?>
			<?php if (isset($_smarty_tpl->tpl_vars['person']->value['research'])&&$_smarty_tpl->tpl_vars['person']->value['research']!=''){?>
				<li><a href="#tabs-2">Research</a></li>
			<?php }?>
			<?php if (isset($_smarty_tpl->tpl_vars['publications']->value)&&count($_smarty_tpl->tpl_vars['publications']->value)>0){?>
				<li><a href="#tabs-3">Publications</a></li>
			<?php }?>
			<?php if (isset($_smarty_tpl->tpl_vars['projects']->value)&&count($_smarty_tpl->tpl_vars['projects']->value)>0){?>
				<li><a href="#tabs-4">Projects</a></li>
			<?php }?>
			<?php if ((isset($_smarty_tpl->tpl_vars['phd_students_main']->value)&&count($_smarty_tpl->tpl_vars['phd_students_main']->value)>0)||(isset($_smarty_tpl->tpl_vars['phd_students_assistant']->value)&&count($_smarty_tpl->tpl_vars['phd_students_assistant']->value)>0)){?>
				<li><a href="#tabs-5">PhD students</a></li>
			<?php }?>
			<?php if (isset($_smarty_tpl->tpl_vars['msc_theses']->value)&&count($_smarty_tpl->tpl_vars['msc_theses']->value)>0){?>
				<li><a href="#tabs-6">MSc theses</a></li>
			<?php }?>
		</ul>
	
	<?php if (isset($_smarty_tpl->tpl_vars['person']->value['biography'])&&$_smarty_tpl->tpl_vars['person']->value['biography']!=''){?>
		<div id="tabs-1">
			<?php echo $_smarty_tpl->tpl_vars['person']->value['biography'];?>

		</div>	
	<?php }?>
	
	<?php if (isset($_smarty_tpl->tpl_vars['person']->value['research'])&&$_smarty_tpl->tpl_vars['person']->value['research']!=''){?>
		<div id="tabs-2">
			<?php echo $_smarty_tpl->tpl_vars['person']->value['research'];?>

		</div>	
	<?php }?>
	
	<?php if (isset($_smarty_tpl->tpl_vars['publications']->value)&&count($_smarty_tpl->tpl_vars['publications']->value)>0){?>
		<div id="tabs-3">
		<p>
			<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
publications?author=<?php echo $_smarty_tpl->tpl_vars['person']->value['id_customer'];?>
">[Show all publications]</a>
		</p>
		<?php if (isset($_smarty_tpl->tpl_vars['person']->value['url_scholar'])&&$_smarty_tpl->tpl_vars['person']->value['url_scholar']!=''){?>
			<p>
				<a href="<?php echo $_smarty_tpl->tpl_vars['person']->value['url_scholar'];?>
">[Google Scholar author page]</a>
			</p>
		<?php }?>	
		
		<span style="display:block;margin-bottom:10px">
			<u>Latest publications:</u>
		</span>	
		
			<?php  $_smarty_tpl->tpl_vars['publication'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['publication']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['publications']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['publication']->key => $_smarty_tpl->tpl_vars['publication']->value){
$_smarty_tpl->tpl_vars['publication']->_loop = true;
?>
				<p>
					<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
publications/<?php echo $_smarty_tpl->tpl_vars['publication']->value['id_publication'];?>
-<?php echo smarty_modifier_regex_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['publication']->value['title'],"ö","o"),"Ö","O"),"ü","u"),"Ü","U"),"ä","a"),"Ä","A"),"å","a"),"Å","A"),"é","e"),"É","E"),"á","a"),"Á","A"),"/[^A-Za-z0-9]/","_");?>
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
-<?php echo smarty_modifier_regex_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['author']->value['firstname'],"ö","o"),"Ö","O"),"ü","u"),"Ü","U"),"ä","a"),"Ä","A"),"å","a"),"Å","A"),"é","e"),"É","E"),"á","a"),"Á","A"),"/[^A-Za-z0-9]/","_");?>
_<?php echo smarty_modifier_regex_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['author']->value['lastname'],"ö","o"),"Ö","O"),"ü","u"),"Ü","U"),"ä","a"),"Ä","A"),"å","a"),"Å","A"),"é","e"),"É","E"),"á","a"),"Á","A"),"/[^A-Za-z0-9]/","_");?>
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
<?php if ($_smarty_tpl->tpl_vars['publication']->value['publication_venue_instance']){?> (<?php echo $_smarty_tpl->tpl_vars['publication']->value['publication_venue_instance'];?>
)<?php }?>
					<?php }?>
				</p>
			<?php } ?>
		</div>
	<?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['projects']->value)&&count($_smarty_tpl->tpl_vars['projects']->value)>0){?>
		<div id="tabs-4">
			<table id="person-table" class="tablesorter" style="width:705px;"> 
				<thead> 
					<tr> 
						<th class="person-projects-list-title" style="width:400px;padding-left:3px">Project Title</th> 
						<th class="person-projects-list-status" style="width:80px;padding-left:3px">Status</th> 
					</tr> 
				</thead> 
				<tbody> 
					<?php  $_smarty_tpl->tpl_vars['project'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['project']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['projects']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['project']->key => $_smarty_tpl->tpl_vars['project']->value){
$_smarty_tpl->tpl_vars['project']->_loop = true;
?>
					<tr>
						<td class="person-projects-list-title">
							<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
projects/<?php echo $_smarty_tpl->tpl_vars['project']->value['id_project'];?>
-<?php echo smarty_modifier_regex_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['project']->value['name'],"ö","o"),"Ö","O"),"ü","u"),"Ü","U"),"ä","a"),"Ä","A"),"å","a"),"Å","A"),"é","e"),"É","E"),"á","a"),"Á","A"),"/[^A-Za-z0-9]/","_");?>
">
								<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['project']->value['name'], 'htmlall', 'UTF-8');?>

							</a>
						</td>
						<td class="person-projects-list-status">
							<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
projects/<?php echo $_smarty_tpl->tpl_vars['person']->value['id_customer'];?>
-<?php echo smarty_modifier_regex_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['project']->value['name'],"ö","o"),"Ö","O"),"ü","u"),"Ü","U"),"ä","a"),"Ä","A"),"å","a"),"Å","A"),"é","e"),"É","E"),"á","a"),"Á","A"),"/[^A-Za-z0-9]/","_");?>
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
	
	<?php if ((isset($_smarty_tpl->tpl_vars['phd_students_main']->value)&&count($_smarty_tpl->tpl_vars['phd_students_main']->value)>0)||(isset($_smarty_tpl->tpl_vars['phd_students_assistant']->value)&&count($_smarty_tpl->tpl_vars['phd_students_assistant']->value)>0)){?>
		<div id="tabs-5">
			<?php if (isset($_smarty_tpl->tpl_vars['phd_students_main']->value)&&count($_smarty_tpl->tpl_vars['phd_students_main']->value)>0){?>
				<div style="margin-bottom:8px"> 
					PhD students supervised as main supervisor:
					<br class="clearBoth">
				</div>
				<p>
				<?php  $_smarty_tpl->tpl_vars['phd_student'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['phd_student']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['phd_students_main']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['phd_student']->key => $_smarty_tpl->tpl_vars['phd_student']->value){
$_smarty_tpl->tpl_vars['phd_student']->_loop = true;
?>
					<a class="standardLink" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
staff/<?php echo $_smarty_tpl->tpl_vars['phd_student']->value['id_customer'];?>
-<?php echo smarty_modifier_regex_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['phd_student']->value['firstname'],"ö","o"),"Ö","O"),"ü","u"),"Ü","U"),"ä","a"),"Ä","A"),"å","a"),"Å","A"),"é","e"),"É","E"),"á","a"),"Á","A"),"/[^A-Za-z0-9]/","_");?>
_<?php echo smarty_modifier_regex_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['phd_student']->value['lastname'],"ö","o"),"Ö","O"),"ü","u"),"Ü","U"),"ä","a"),"Ä","A"),"å","a"),"Å","A"),"é","e"),"É","E"),"á","a"),"Á","A"),"/[^A-Za-z0-9]/","_");?>
">
						<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['phd_student']->value['firstname'], 'htmlall', 'UTF-8');?>
 <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['phd_student']->value['lastname'], 'htmlall', 'UTF-8');?>

					</a>
					<?php $_smarty_tpl->tpl_vars['is_phd_student'] = new Smarty_variable(0, null, 0);?> 	
					<?php  $_smarty_tpl->tpl_vars['position'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['position']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['phd_student']->value['positions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['position']->key => $_smarty_tpl->tpl_vars['position']->value){
$_smarty_tpl->tpl_vars['position']->_loop = true;
?>
						<?php if ($_smarty_tpl->tpl_vars['position']->value['name']=='Doctoral student'||$_smarty_tpl->tpl_vars['position']->value['name']=='Industrial Doctoral Student'){?>
							<?php $_smarty_tpl->tpl_vars['is_phd_student'] = new Smarty_variable(1, null, 0);?> 									
						<?php }?> 
					<?php } ?>
					
					<?php if ($_smarty_tpl->tpl_vars['phd_student']->value['active']==0||$_smarty_tpl->tpl_vars['phd_student']->value['away']==1||$_smarty_tpl->tpl_vars['is_phd_student']->value==0){?>
						(former)
					<?php }?>
					<br>
				<?php } ?>
				</p>
			<?php }?>
			<?php if (isset($_smarty_tpl->tpl_vars['phd_students_assistant']->value)&&count($_smarty_tpl->tpl_vars['phd_students_assistant']->value)>0){?>
				<div style="margin-bottom:8px"> 
					PhD students supervised as assistant supervisor:
					<br class="clearBoth">
				</div>
				<p>
				<?php  $_smarty_tpl->tpl_vars['phd_student'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['phd_student']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['phd_students_assistant']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['phd_student']->key => $_smarty_tpl->tpl_vars['phd_student']->value){
$_smarty_tpl->tpl_vars['phd_student']->_loop = true;
?>
					<a class="standardLink" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
staff/<?php echo $_smarty_tpl->tpl_vars['phd_student']->value['id_customer'];?>
-<?php echo smarty_modifier_regex_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['phd_student']->value['firstname'],"ö","o"),"Ö","O"),"ü","u"),"Ü","U"),"ä","a"),"Ä","A"),"å","a"),"Å","A"),"é","e"),"É","E"),"á","a"),"Á","A"),"/[^A-Za-z0-9]/","_");?>
_<?php echo smarty_modifier_regex_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['phd_student']->value['lastname'],"ö","o"),"Ö","O"),"ü","u"),"Ü","U"),"ä","a"),"Ä","A"),"å","a"),"Å","A"),"é","e"),"É","E"),"á","a"),"Á","A"),"/[^A-Za-z0-9]/","_");?>
">
						<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['phd_student']->value['firstname'], 'htmlall', 'UTF-8');?>
 <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['phd_student']->value['lastname'], 'htmlall', 'UTF-8');?>

					</a>
					<?php $_smarty_tpl->tpl_vars['is_phd_student'] = new Smarty_variable(0, null, 0);?> 	
					<?php  $_smarty_tpl->tpl_vars['position'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['position']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['phd_student']->value['positions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['position']->key => $_smarty_tpl->tpl_vars['position']->value){
$_smarty_tpl->tpl_vars['position']->_loop = true;
?>
						<?php if ($_smarty_tpl->tpl_vars['position']->value['name']=='Doctoral student'||$_smarty_tpl->tpl_vars['position']->value['name']=='Industrial Doctoral Student'){?>
							<?php $_smarty_tpl->tpl_vars['is_phd_student'] = new Smarty_variable(1, null, 0);?> 									
						<?php }?> 
					<?php } ?>
					
					<?php if ($_smarty_tpl->tpl_vars['phd_student']->value['active']==0||$_smarty_tpl->tpl_vars['phd_student']->value['away']==1||$_smarty_tpl->tpl_vars['is_phd_student']->value==0){?>
						(former)
					<?php }?>
					<br>
				<?php } ?>
				</p>
			<?php }?>			
		</div>
	<?php }?>	
	
	<?php if (isset($_smarty_tpl->tpl_vars['msc_theses']->value)&&count($_smarty_tpl->tpl_vars['msc_theses']->value)>0){?>
		<div id="tabs-6">
			MSc theses supervised (or examined): 
			<table id="person-table" class="tablesorter" style="width:705px;"> 
				<thead> 
					<tr> 
						<th class="person-projects-list-title" style="width:300px;padding-left:3px">Thesis Title</th> 
						<th class="person-projects-list-status" style="width:80px;padding-left:3px">Status</th> 
					</tr> 
				</thead> 
				<tbody> 
					<?php  $_smarty_tpl->tpl_vars['msc_thesis'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['msc_thesis']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['msc_theses']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['msc_thesis']->key => $_smarty_tpl->tpl_vars['msc_thesis']->value){
$_smarty_tpl->tpl_vars['msc_thesis']->_loop = true;
?>
					<tr>
						<td class="msc-thesis-title">
							<a href="http://www.idt.mdh.se/examensarbete/index.php?choice=show&lang=en&id=<?php echo $_smarty_tpl->tpl_vars['msc_thesis']->value['id'];?>
">
								<?php echo $_smarty_tpl->tpl_vars['msc_thesis']->value['title'];?>

							</a>
						</td>
						<td class="msc-thesis-status">
							<a href="http://www.idt.mdh.se/examensarbete/index.php?choice=show&lang=en&id=<?php echo $_smarty_tpl->tpl_vars['msc_thesis']->value['id'];?>
">
								<?php echo $_smarty_tpl->tpl_vars['msc_thesis']->value['status'];?>

							</a>
						</td>
					</tr>
					<?php } ?>
				</tbody> 
			</table>
		</div>
	<?php }?>	
	</div>
	
</div><?php }} ?>