<?php /* Smarty version Smarty-3.1.8, created on 2013-05-27 13:04:44
         compiled from "/www/htdocs/mrtc/testIDT/themes/es/organization.tpl" */ ?>
<?php /*%%SmartyHeaderCode:134559934351a33dccf32f68-48140161%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d21ca928af38f4af255199f1662939df3764d56' => 
    array (
      0 => '/www/htdocs/mrtc/testIDT/themes/es/organization.tpl',
      1 => 1367842488,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134559934351a33dccf32f68-48140161',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'areas' => 0,
    'area' => 0,
    'divisions' => 0,
    'division' => 0,
    'groups' => 0,
    'group' => 0,
    'research_leader' => 0,
    'img_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51a33dcd2c8292_92934161',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a33dcd2c8292_92934161')) {function content_51a33dcd2c8292_92934161($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_regex_replace')) include '/www/htdocs/mrtc/testIDT/tools/smarty/plugins/modifier.regex_replace.php';
if (!is_callable('smarty_modifier_escape')) include '/www/htdocs/mrtc/testIDT/tools/smarty/plugins/modifier.escape.php';
?><div class="centre-column">
	<h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
	<?php if (isset($_smarty_tpl->tpl_vars['areas']->value)&&$_smarty_tpl->tpl_vars['areas']->value){?>
		<h2>Research Areas</h2>
		<ul> 
		<?php  $_smarty_tpl->tpl_vars['area'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['area']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['areas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['area']->key => $_smarty_tpl->tpl_vars['area']->value){
$_smarty_tpl->tpl_vars['area']->_loop = true;
?>
			<li>
				<a class="standardLink" href="research-areas/<?php echo $_smarty_tpl->tpl_vars['area']->value['id_initiative'];?>
-<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['area']->value['name'],"/[^A-Za-z0-9]/","_");?>
">
					<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['area']->value['name'], 'htmlall', 'UTF-8');?>

				</a>
			</li>
		<?php } ?>
		</ul> 
	<?php }?>

	<?php if (isset($_smarty_tpl->tpl_vars['divisions']->value)&&$_smarty_tpl->tpl_vars['divisions']->value){?>
		<h2>Divisions</h2>
		<ul> 
		<?php  $_smarty_tpl->tpl_vars['division'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['division']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['divisions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['division']->key => $_smarty_tpl->tpl_vars['division']->value){
$_smarty_tpl->tpl_vars['division']->_loop = true;
?>
			<li>
				<a class="standardLink" href="divisions/<?php echo $_smarty_tpl->tpl_vars['division']->value['id_initiative'];?>
-<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['division']->value['name'],"/[^A-Za-z0-9]/","_");?>
">
					<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['division']->value['name'], 'htmlall', 'UTF-8');?>

				</a>
			</li>
		<?php } ?>
		</ul> 
	<?php }?>

	<?php if (isset($_smarty_tpl->tpl_vars['groups']->value)&&$_smarty_tpl->tpl_vars['groups']->value){?>
		<h2>Research Groups</h2>
		<ul> 
		<?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value){
$_smarty_tpl->tpl_vars['group']->_loop = true;
?>
			<li>
				<a class="standardLink" href="research-groups/<?php echo $_smarty_tpl->tpl_vars['group']->value['id_initiative'];?>
-<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['group']->value['name'],"/[^A-Za-z0-9]/","_");?>
">
					<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['group']->value['name'], 'htmlall', 'UTF-8');?>

				</a>
			</li>
		<?php } ?>
		</ul> 
	<?php }?>
	<br>
</div>

<div class = "right-column">
	<div style="margin-bottom: 20px">
		<div style="margin-left:93px; margin-bottom: -45px; position:relative; z-index:2;">
			<img src="img/staff/<?php echo $_smarty_tpl->tpl_vars['research_leader']->value['id_customer'];?>
-staff.jpg" style="width:105px;"/>
		</div>
		<div style="position:relative;float:left;z-index:1;">
			<img class="logo" src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
research-leader.png"/>
			<h3>
				<a href="staff/<?php echo $_smarty_tpl->tpl_vars['research_leader']->value['id_customer'];?>
-<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['research_leader']->value['firstname'],"/[^A-Za-z0-9]/","_");?>
_<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['research_leader']->value['lastname'],"/[^A-Za-z0-9]/","_");?>
">
					<?php echo $_smarty_tpl->tpl_vars['research_leader']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['research_leader']->value['lastname'];?>
, <?php echo $_smarty_tpl->tpl_vars['research_leader']->value['title'];?>

				</a>			
				</h3>
			Email: <?php echo $_smarty_tpl->tpl_vars['research_leader']->value['email'];?>

			<br>Room: <?php echo $_smarty_tpl->tpl_vars['research_leader']->value['room'];?>

			<br>Phone: <?php echo $_smarty_tpl->tpl_vars['research_leader']->value['phone'];?>

		</div>
		<br class="clearBoth">
	</div>
</div>
<?php }} ?>