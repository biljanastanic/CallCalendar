<?php /* Smarty version Smarty-3.1.8, created on 2013-01-24 11:04:09
         compiled from "/www/htdocs/mrtc/testIDT/themes/mrtc/researchgroup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1374170306510107194394f0-39960604%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e05c0414e4263b5b6bbf1ba5bd23137acbad8866' => 
    array (
      0 => '/www/htdocs/mrtc/testIDT/themes/mrtc/researchgroup.tpl',
      1 => 1359021165,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1374170306510107194394f0-39960604',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'img_dir' => 0,
    'title' => 0,
    'members' => 0,
    'member' => 0,
    'introduction' => 0,
    'projects' => 0,
    'project' => 0,
    'publications' => 0,
    'publication' => 0,
    'img_url' => 0,
    'leader' => 0,
    'smtg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51010719d0caa6_09749460',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51010719d0caa6_09749460')) {function content_51010719d0caa6_09749460($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/www/htdocs/mrtc/testIDT/tools/smarty/plugins/modifier.escape.php';
?><?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?><?php echo smartyTranslate(array('s'=>'Research Group'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<script type="text/javascript">
//<![CDATA[

//]]>
</script>
<style type="text/css">
table#rg_members{
	width:535px;
	border:0;
    cellspacing:0;
	cellpadding:0;
    align:left;
	margin-bottom:10px;}
	
table#rg_members tr{
background:transparent;
border:0;}
table#rg_members td{
background:transparent;
border:0;
valign:top; 
}
.leader_sign {
height:180px;
width:100%;
background-image: url(<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
right_column_back.png);
background-position:bottom;
}

.leader_sign td
{
border:0;
}
</style>
<div id="res_groups">
	<h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
		<table id="rg_members">  
			<tr>
				<td  width="80" valign="top" >
				Members:
				</td>
				<td>
					<?php if (isset($_smarty_tpl->tpl_vars['members']->value)){?>
				<ul>
				<?php  $_smarty_tpl->tpl_vars['member'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['member']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['members']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['member']->key => $_smarty_tpl->tpl_vars['member']->value){
$_smarty_tpl->tpl_vars['member']->_loop = true;
?>
					<li>
					<a href="#"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['member']->value['firstname'], 'htmlall', 'UTF-8');?>
&#32;<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['member']->value['lastname'], 'htmlall', 'UTF-8');?>
</a>
					<!---<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['member']->value['firstname'], 'htmlall', 'UTF-8');?>
&#32;<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['member']->value['lastname'], 'htmlall', 'UTF-8');?>
-->
					</li>
				<?php } ?>
				</ul>
				<?php }?>
				</td>
			</tr>
			<tr><td colspan="2" style="BORDER-BOTTOM: solid 1px #aabac4;" align="center">&nbsp;</td></tr>
			<tr style="background-color:transparent">
			<td colspan="2">
			<h1>Introduction</h1>
			<?php if (isset($_smarty_tpl->tpl_vars['introduction']->value)){?>
			<?php echo $_smarty_tpl->tpl_vars['introduction']->value;?>

			<?php }?>
			</td>
			</tr>
			<tr><td colspan="2" style="BORDER-BOTTOM: solid 1px #aabac4;" align="center">&nbsp;</td></tr>
			<tr style="background-color:transparent">
			<td colspan="2">
			<h1>Ongoing projects <a href="#" style="font-size:70%">[Show all projects]</a></h1>
			<?php if (isset($_smarty_tpl->tpl_vars['projects']->value)){?>
				<ul>
				<?php  $_smarty_tpl->tpl_vars['project'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['project']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['projects']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['project']->key => $_smarty_tpl->tpl_vars['project']->value){
$_smarty_tpl->tpl_vars['project']->_loop = true;
?>
					<li><a href="#"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['project']->value['acronym'], 'htmlall', 'UTF-8');?>
 - <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['project']->value['title'], 'htmlall', 'UTF-8');?>
</a>
					</li>
				<?php } ?>
				</ul>
			<?php }?>
			</td>
			</tr>
			<tr><td colspan="2" style="BORDER-BOTTOM: solid 1px #aabac4;" align="center">&nbsp;</td></tr>
			<tr style="background-color:transparent;">
			<td colspan="2">
			<h1>Latest group publications <a href="#" style="font-size:70%">[Show all publications]</a></h1>
			<?php if (isset($_smarty_tpl->tpl_vars['projects']->value)){?>
				<ul >
				<?php  $_smarty_tpl->tpl_vars['publication'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['publication']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['publications']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['publication']->key => $_smarty_tpl->tpl_vars['publication']->value){
$_smarty_tpl->tpl_vars['publication']->_loop = true;
?>
					<li><a href="#"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['publication']->value['title'], 'htmlall', 'UTF-8');?>
</a>
					</li>
				<?php } ?>
				</ul>
			<?php }?>
			</td>
			</tr>
	</table>
	
</div>
<div class="right-column">
<table class="leader_sign" >
<tr style="background:transparent;">
<td width="38%" style="vertical-align:bottom;padding-left:10px;">
<a style="color:white;">GROUP LEADER</a>
<td width="60%" style="vertical-align:bottom;padding-right:10px;">
<object data="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
staff/<?php echo $_smarty_tpl->tpl_vars['leader']->value[0]['id_customer'];?>
-staff.jpg" width="100%">
<img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
default.gif" width="100%"/>
</object>
</td>
<td width="2%"></td>
</td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr style="background-color:transparent;">
<td style="border:0;"><a><?php echo $_smarty_tpl->tpl_vars['leader']->value[0]['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['leader']->value[0]['lastname'];?>
,<?php echo $_smarty_tpl->tpl_vars['leader']->value[0]['title'];?>
</a></td>
</tr>
<tr style="background-color:transparent;">
<td style="border:0;">Email:<?php echo $_smarty_tpl->tpl_vars['leader']->value[0]['email'];?>
</td>
</tr>
<tr style="background-color:transparent;">
<td style="border:0;">Room:<?php echo $_smarty_tpl->tpl_vars['leader']->value[0]['room'];?>
</td>
</tr>
<tr style="background-color:transparent;">
<td style="border:0;">Phone:<?php echo $_smarty_tpl->tpl_vars['leader']->value[0]['phone'];?>
</td>
</tr>
</table>
<p style="display:none"><?php echo $_smarty_tpl->tpl_vars['smtg']->value;?>
</p>
</div><?php }} ?>