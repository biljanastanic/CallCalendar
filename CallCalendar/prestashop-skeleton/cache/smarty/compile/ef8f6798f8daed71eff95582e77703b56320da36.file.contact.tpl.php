<?php /* Smarty version Smarty-3.1.8, created on 2013-05-28 13:29:54
         compiled from "/www/htdocs/mrtc/testIDT/themes/ipr/contact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:34797611151a49532e0bcc3-44396165%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef8f6798f8daed71eff95582e77703b56320da36' => 
    array (
      0 => '/www/htdocs/mrtc/testIDT/themes/ipr/contact.tpl',
      1 => 1367842827,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '34797611151a49532e0bcc3-44396165',
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
  'unifunc' => 'content_51a49532f23e84_61665100',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a49532f23e84_61665100')) {function content_51a49532f23e84_61665100($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_regex_replace')) include '/www/htdocs/mrtc/testIDT/tools/smarty/plugins/modifier.regex_replace.php';
if (!is_callable('smarty_modifier_escape')) include '/www/htdocs/mrtc/testIDT/tools/smarty/plugins/modifier.escape.php';
?><div class="centre-column-single">
	<h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>

	<h2>Research Leader</h2>
	<div style="width:757px; text-align:center">
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
		<div style="width:230px; text-align:center; float:left;margin:10px 10px 30px 10px">
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
	
	<iframe width="750" height="620" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.se/maps?f=q&amp;source=s_q&amp;hl=sv&amp;geocode=&amp;q=Smedjegatan+37,+Eskilstuna&amp;aq=&amp;sll=77.583471,-81.748881&amp;sspn=0.004794,0.026157&amp;ie=UTF8&amp;hq=&amp;hnear=Smedjegatan+37,+632+20+Eskilstuna&amp;ll=59.37147,16.503513&amp;spn=0.00284,0.006539&amp;t=m&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="https://maps.google.se/maps?f=q&amp;source=embed&amp;hl=sv&amp;geocode=&amp;q=Smedjegatan+37,+Eskilstuna&amp;aq=&amp;sll=77.583471,-81.748881&amp;sspn=0.004794,0.026157&amp;ie=UTF8&amp;hq=&amp;hnear=Smedjegatan+37,+632+20+Eskilstuna&amp;ll=59.37147,16.503513&amp;spn=0.00284,0.006539&amp;t=m&amp;z=14&amp;iwloc=A" style="text-align:left">how on Google Maps</a></small>
		
	</p>


	<div style="width:230px; text-align:center; margin:10px 10px 30px 10px;"><a href="http://www.mdh.se/polopoly_fs/1.1268!/Menu/general/column-content/attachment/LokalguideEVT13%2C%20201301.pdf">Campus map for Eskilstuna <img src="themes/es/img/guide_eskilstuna.png" /></a></div>
	<br class="clearBoth">
	</div>
	
	<h2>Directions for International Visitors</h2>
	<p><a href="http://www.swedavia.com/airports/stockholm-arlanda-airport/">Arlanda Airport, Stockholm</a> (100 km from Västerås): Train to Eskilstuna</p>
	<p><a href="http://www.stockholmvasteras.se/">Stockholm/Västerås Airport</a> (50 km from Eskilstuna): Train to Eskilstuna</p>
	<p><a href="http://www.swedavia.se/bromma/">Stockholm/Bromma Airport</a>: Train to Eskilstuna</p>
	<p><a href="http://www.skavsta.se/">Stockholm/Skavsta Airport</a>: Train to Eskilstuna</p>
	<p>SJ Train <a href="http://www.sj.se">time table</a></p>

	<h2>Other Info</h2>
	<p>More about Eskilstuna: <a href="http://www.eskilstuna.se/">Eskilstuna kommun</a> (Swedish) </p>
	<p>Hotels in Eskilstuna <a href="http://www.booking.com/searchresults.html?aid=310018;label=se-eskilstuna-IR%2Ahn2EkUoDh_3yimcIy4QS18696119470%3Apl%3Ata%3Ap1%3Ap2%3Aac%3Aap1t1%3Aneg;sid=531b77c01ce8bb481afdbdfa296ffe33;dcid=1;city=-2478361;class_interval=1;csflt=%7B%7D;idf=1;interval_of_time=undef;offset=0;order=popularity;review_score_group=empty;rfh=0;score_min=0;si=ai%2Cco%2Cci%2Cre%2Cdi;src=searchresults;ssb=empty;ssne_untouched=V%C3%A4ster%C3%A5s&lang=en-us">via booking.com</a></p>
	<p>Organisational number: 202100-2916</p>

	<table class="contact_address_table">
		<tr>
			<td>
				<div class="contact_address"><strong>Visiting adress</strong><br /> Mälardalen University/IDT<br /> Smedjegatan 37<br /> 63105 Eskilstuna<br /> Sweden</div>
			</td>
			<td>
				<div class="contact_address"><strong>Postal adress</strong><br /> Mälardalen University/IDT<br /> PO Box 325<br /> 63105 Eskilstuna<br /> Sweden</div>
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