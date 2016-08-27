<?php /* Smarty version Smarty-3.1.8, created on 2013-05-27 11:18:07
         compiled from "/www/htdocs/mrtc/testIDT/themes/es/contact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:68238848251a324cf081d13-97517935%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc198c0bab8e9bfc869b7938df1fe4747c634e0d' => 
    array (
      0 => '/www/htdocs/mrtc/testIDT/themes/es/contact.tpl',
      1 => 1367842415,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '68238848251a324cf081d13-97517935',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'base_url' => 0,
    'research_leader' => 0,
    'research_group_leaders' => 0,
    'research_group_leader' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51a324cf19ae37_58255454',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a324cf19ae37_58255454')) {function content_51a324cf19ae37_58255454($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_regex_replace')) include '/www/htdocs/mrtc/testIDT/tools/smarty/plugins/modifier.regex_replace.php';
if (!is_callable('smarty_modifier_escape')) include '/www/htdocs/mrtc/testIDT/tools/smarty/plugins/modifier.escape.php';
?>

<div class="centre-column-single">
	<h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>

	<h2>Research Leader</h2>
	<div style="width:727px; text-align:center; margin:10px 10px 30px 10px; ">
		<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
staff/<?php echo $_smarty_tpl->tpl_vars['research_leader']->value['id_customer'];?>
-<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['research_leader']->value['firstname'],"/[^A-Za-z0-9]/","_");?>
_<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['research_leader']->value['lastname'],"/[^A-Za-z0-9]/","_");?>
">
			<img src="../img/staff/<?php echo $_smarty_tpl->tpl_vars['research_leader']->value['id_customer'];?>
-staff.jpg" />
			<div style="text-align:center;"><?php echo $_smarty_tpl->tpl_vars['research_leader']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['research_leader']->value['lastname'];?>
</div>
		</a>
	</div>
	<h2>Research Group Leaders</h2>
	<div> 
		<?php  $_smarty_tpl->tpl_vars['research_group_leader'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['research_group_leader']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['research_group_leaders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['research_group_leader']->key => $_smarty_tpl->tpl_vars['research_group_leader']->value){
$_smarty_tpl->tpl_vars['research_group_leader']->_loop = true;
?>
		<div style="width:230px; text-align:center; float:left;margin:10px 10px 30px 10px;">
			<div style="text-align:center; height:40px">
				<a href="research-groups/<?php echo $_smarty_tpl->tpl_vars['research_group_leader']->value['id_initiative'];?>
-<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['research_group_leader']->value['name'],"/[^A-Za-z0-9]/","_");?>
">
					<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['research_group_leader']->value['name'], 'htmlall', 'UTF-8');?>

				</a>
				<br class="clearBoth">
			</div>	
			<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
staff/<?php echo $_smarty_tpl->tpl_vars['research_group_leader']->value['id_customer'];?>
-<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['research_group_leader']->value['firstname'],"/[^A-Za-z0-9]/","_");?>
_<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['research_group_leader']->value['lastname'],"/[^A-Za-z0-9]/","_");?>
">
				<img src="../img/staff/<?php echo $_smarty_tpl->tpl_vars['research_group_leader']->value['id_customer'];?>
-staff.jpg" />
				<div style="text-align:center;"><?php echo $_smarty_tpl->tpl_vars['research_group_leader']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['research_group_leader']->value['lastname'];?>
</div>
			</a>
		</div>
		<?php } ?>
		<br class="clearBoth">
	</div> 

	
	
	

	<h2>Map and Directions</h2>
	<p>
		<iframe src="https://maps.google.se/maps?q=M%C3%A4lardalens+h%C3%B6gskola,+V%C3%A4ster%C3%A5s&amp;hl=en&amp;ie=UTF8&amp;sll=61.606396,21.225586&amp;sspn=39.013818,135.263672&amp;oq=m%C3%A4larda&amp;hq=M%C3%A4lardalens+h%C3%B6gskola,&amp;hnear=V%C3%A4ster%C3%A5s&amp;t=m&amp;ll=59.6186,16.540657&amp;spn=0.010809,0.026157&amp;z=14&amp;iwloc=A&amp;cid=4267164619311386926&amp;output=embed" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" width="750" height="620"></iframe>
		<br />
		<small>
			<a style="color: text-align: left;" href="https://maps.google.se/maps?q=M%C3%A4lardalens+h%C3%B6gskola,+V%C3%A4ster%C3%A5s&amp;hl=sv&amp;ie=UTF8&amp;sll=61.606396,21.225586&amp;sspn=39.013818,135.263672&amp;oq=m%C3%A4larda&amp;hq=M%C3%A4lardalens+h%C3%B6gskola,&amp;hnear=V%C3%A4ster%C3%A5s&amp;t=m&amp;ll=59.6186,16.540657&amp;spn=0.010809,0.026157&amp;z=14&amp;iwloc=A&amp;cid=4267164619311386926&amp;source=embed">
				Show on Google Maps
			</a>
		</small>
	</p>
	
	<div>
	<div style="width:230px; text-align:center; float:left;margin:10px 10px 30px 10px;"><a href="http://www.mdh.se/polopoly_fs/1.1269!/Menu/general/column-content/attachment/LokalguideVVT13%20201301.pdf">Campus map for Västerås <img src="themes/es/img/guide_vasteras.png" /></a></div>
	
	<div style="width:230px; text-align:center; float:left;margin:10px 10px 30px 10px;"><a href="http://www.mdh.se/polopoly_fs/1.1268!/Menu/general/column-content/attachment/LokalguideEVT13%2C%20201301.pdf">Campus map for Eskilstuna <img src="themes/es/img/guide_eskilstuna.png" /></a></div>
	<br class="clearBoth">
	</div>
	
	<h2>Directions for International Visitors</h2>
	<p><a href="http://www.swedavia.com/airports/stockholm-arlanda-airport/">Arlanda Airport, Stockholm</a> (100 km from Västerås): <a href="http://www.swebus.se/Flygtransfer/">Swebus Bus</a> to Västerås</p>
	<p><a href="http://www.stockholmvasteras.se/">Stockholm/Västerås Airport</a> (3 km from Västerås city centre): <a href="http://www.flygtaxi.se/">Flygtaxi Taxi</a> to Västerås</p>
	<p><a href="http://www.swedavia.se/bromma/">Stockholm/Bromma Airport</a>: Train to Västerås</p>
	<p><a href="http://www.skavsta.se/">Stockholm/Skavsta Airport</a>: Train to Västerås</p>
	<p>SJ Train <a href="http://www.sj.se">time table</a></p>

	<h2>Other Info</h2>
	<p>More about Västerås: <a href="http://visitvasteras.se/">Visit Västerås</a> (Swedish) <a href="http://www.vasterasmalarstaden.se/en/">Västerås Mälarstaden</a> (English)</p>
	<p>Hotels in Västerås <a href="http://www.booking.com/searchresults.sv.html?aid=310018;label=se-vasteras-IR%2Ahn2EkUoDh_3yimcIy4QS18696119470%3Apl%3Ata%3Ap1%3Ap2%3Aac%3Aap1t1%3Aneg;sid=531b77c01ce8bb481afdbdfa296ffe33;dcid=1;city=-2534274;redirected_from_city=1;src=city">via booking.com</a></p>
	<p>Organisational number: 202100-2916</p>
	
	<table class="contact_address_table">
		<tr>
			<td>
				<div class="contact_address"><strong>Visiting adress</strong><br /> Mälardalen University/IDT<br /> Högskoleplan 1<br /> 72218 Västerås<br /> Sweden</div>
			</td>
			<td>
				<div class="contact_address"><strong>Postal adress</strong><br /> Mälardalen University/IDT<br /> PO Box 883<br /> SE-72123 Västerås<br /> Sweden</div>
			</td>
			<td>
				<div class="contact_address"><strong>Invoice adress</strong><br /> Mälardalen University/IDT<br /> PO Box 1020<br /> 72126 Västerås<br /> Sweden</div>
			</td>
			<td>
				<div class="contact_address"><strong>Delivery adress</strong><br /> Mälardalen University/IDT<br /> Gurksaltargatan 9<br /> 72218 Västerås<br /> Sweden</div>
			</td>
		</tr>
	</table>

</div>

<?php }} ?>