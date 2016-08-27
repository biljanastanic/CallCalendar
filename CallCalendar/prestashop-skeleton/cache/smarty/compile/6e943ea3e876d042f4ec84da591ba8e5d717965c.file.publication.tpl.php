<?php /* Smarty version Smarty-3.1.8, created on 2013-05-28 14:46:01
         compiled from "/www/htdocs/es/themes/ipr/publication.tpl" */ ?>
<?php /*%%SmartyHeaderCode:120545083551a4a7099089f3-83269566%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e943ea3e876d042f4ec84da591ba8e5d717965c' => 
    array (
      0 => '/www/htdocs/es/themes/ipr/publication.tpl',
      1 => 1367841269,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120545083551a4a7099089f3-83269566',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'publication' => 0,
    'img_dir' => 0,
    'fulltext' => 0,
    'base_url' => 0,
    'author' => 0,
    'i' => 0,
    'bibtex' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51a4a709aea402_69512735',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a4a709aea402_69512735')) {function content_51a4a709aea402_69512735($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/www/htdocs/es/tools/smarty/plugins/modifier.escape.php';
if (!is_callable('smarty_modifier_date_format')) include '/www/htdocs/es/tools/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_regex_replace')) include '/www/htdocs/es/tools/smarty/plugins/modifier.regex_replace.php';
?><script type="text/javascript">
 	$(function() {
 		var url = $( '#fulltext-url' ).attr('href');
 		$( "#dialog-confirm" ).dialog({
			autoOpen: false,
			resizable: false,
			width:640,
			height:600,
			modal: true,
			buttons: {
				"I understand and accept": function() {
					window.location = url;
				},
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			}
		});
		
		$("#fulltext").click(function() {
			$( "#dialog-confirm" ).dialog( "open" );
		});
	});
	
</script>
<div id="dialog-confirm" title="Copyright Disclaimer">
	<p style="margin-top:20px">
		You are required to read and agree to the below before accessing a full-text version of an article in the IDE article repository.
	</p>
	<p>
		The full-text document you are about to access is subject to national and international copyright laws. In most cases (but not necessarily all) the consequence is that personal use is allowed given that the copyright owner is duly acknowledged and respected. All other use (typically) require an explicit permission (often in writing) by the copyright owner.
	</p>
	<p>
		For the reports in this repository we specifically note that
		<ul style="list-style-type:disc;">
			<li style="padding-left:20px">
				the use of articles under IEEE copyright is governed by the IEEE copyright policy (available at <a target="new" href="http://www.ieee.org/web/publications/rights/copyrightpolicy.html">http://www.ieee.org/web/publications/rights/copyrightpolicy.html</a>)
			</li>
			<br>
			<li style="padding-left:20px">
				the use of articles under ACM copyright is governed by the ACM copyright policy (available at <a target="new" href="http://www.acm.org/pubs/copyright_policy/">http://www.acm.org/pubs/copyright_policy/</a>)
			</li>
			<br>
			<li style="padding-left:20px">
				technical reports and other articles issued by M‰lardalen University is free for personal use. For other use, the explicit consent of the authors is required
			</li>
			<br>
			<li style="padding-left:20px">
				in other cases, please contact the copyright owner for detailed information
			</li>
		</ul>
	</p>
	
	<p>
		By accepting I agree to acknowledge and respect the rights of the copyright owner of the document I am about to access.
	</p>

	<p>
		If you are in doubt, feel free to contact <a href="mailto:webmaster@ide.mdh.se">webmaster@ide.mdh.se</a>
	</p>
</div>
<div class="centre-column-single">
	<h1><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['publication']->value['title'], 'htmlall', 'UTF-8');?>
</h1>

	<?php if ($_smarty_tpl->tpl_vars['publication']->value['best_paper']){?>
		<div class="div-best-paper">
			<img class="logo" src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
best-paper.png" style="" />
		</div>
		<br class="clearBoth">
	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['fulltext']->value&&$_smarty_tpl->tpl_vars['publication']->value['date_publish']<smarty_modifier_date_format(time(),'%Y-%m-%d')){?>
		<div class="centre-block">
			<div class="div-label">
				<h3>Fulltext:</h3>
			</div>
			<div class="div-content">
				<a id="fulltext-url" href="<?php echo $_smarty_tpl->tpl_vars['fulltext']->value;?>
"></a>
				<img id="fulltext" border="0" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/img/pdf.gif" style="cursor:pointer">
			</div>
			<br class="clearBoth">
		</div>
	<?php }?>

	<?php if (isset($_smarty_tpl->tpl_vars['publication']->value['authors'])){?>
		<div class="centre-block">
			<div class="div-label">
				<h3>Authors:</h3>
			</div>
			<div class="div-content">
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
			</div>
			<br class="clearBoth">
		</div>
	<?php }?>
	
	<?php if (isset($_smarty_tpl->tpl_vars['publication']->value['note'])&&$_smarty_tpl->tpl_vars['publication']->value['note']!=''){?>
		<div class="centre-block">
			<div class="div-label">
				<h3>Note:</h3>
			</div>
			<div class="div-content">
				<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['publication']->value['note'], 'htmlall', 'UTF-8');?>
				
			</div>
			<br class="clearBoth">
		</div>
	<?php }?>
	
	<?php if (isset($_smarty_tpl->tpl_vars['publication']->value['doi'])&&$_smarty_tpl->tpl_vars['publication']->value['doi']!=''){?>
		<div class="centre-block">
			<div class="div-label">
				<h3>DOI:</h3>
			</div>
			<div class="div-content">
				<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['publication']->value['doi'], 'htmlall', 'UTF-8');?>
				
			</div>
			<br class="clearBoth">
		</div>
	<?php }?>
	
	<?php if (isset($_smarty_tpl->tpl_vars['publication']->value['abstract'])&&$_smarty_tpl->tpl_vars['publication']->value['abstract']!=''){?>
		<hr>
		<h2>Abstract</h2>
		<div class="centre-block">
			<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['publication']->value['abstract'], 'htmlall', 'UTF-8');?>
				
			<br class="clearBoth">
		</div>
	<?php }?>

	<hr>
	<h2>Bibtex</h2>
	<div class="centre-block">
		<?php echo $_smarty_tpl->tpl_vars['bibtex']->value;?>
				
		<br class="clearBoth">
	</div>
	
</div>



<?php }} ?>