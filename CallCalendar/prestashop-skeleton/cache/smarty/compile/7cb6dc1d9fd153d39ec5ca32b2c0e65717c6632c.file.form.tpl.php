<?php /* Smarty version Smarty-3.1.13, created on 2014-10-24 20:42:14
         compiled from "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC9\data\localweb\prestashop-skeleton\back-office\themes\idt\template\controllers\employees\helpers\form\form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11959544a9d86aa7597-57855281%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7cb6dc1d9fd153d39ec5ca32b2c0e65717c6632c' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC9\\data\\localweb\\prestashop-skeleton\\back-office\\themes\\idt\\template\\controllers\\employees\\helpers\\form\\form.tpl',
      1 => 1348647538,
      2 => 'file',
    ),
    '088486b7b13f53ff45d2418d3970b826c43108df' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC9\\data\\localweb\\prestashop-skeleton\\back-office\\themes\\idt\\template\\helpers\\form\\form.tpl',
      1 => 1413891938,
      2 => 'file',
    ),
    'c1eed8a0d2b38a01856d6fac608d40a45c458b1c' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC9\\data\\localweb\\prestashop-skeleton\\back-office\\themes\\idt\\template\\helpers\\form\\form_profile.tpl',
      1 => 1367935120,
      2 => 'file',
    ),
    'eff55ff1f1a048be6ec3c05ca749c68f4c0bb571' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC9\\data\\localweb\\prestashop-skeleton\\back-office\\themes\\idt\\template\\helpers\\form\\form_funding_agency.tpl',
      1 => 1369758529,
      2 => 'file',
    ),
    'f1e41a759c48bc24c69673d6d68f1dabaa5ff2a4' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC9\\data\\localweb\\prestashop-skeleton\\back-office\\themes\\idt\\template\\helpers\\form\\form_project.tpl',
      1 => 1413309234,
      2 => 'file',
    ),
    'f06de43eaec4ebc2ab174e4e5c316050b21ecb4f' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC9\\data\\localweb\\prestashop-skeleton\\back-office\\themes\\idt\\template\\helpers\\form\\form_project_leaders.tpl',
      1 => 1352108091,
      2 => 'file',
    ),
    '75d105489944bf187991cc162a0a87798ad6fea3' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC9\\data\\localweb\\prestashop-skeleton\\back-office\\themes\\idt\\template\\helpers\\form\\form_project_members.tpl',
      1 => 1352107197,
      2 => 'file',
    ),
    'd4492246acd3fbbc79d18831fe0ae41775ba6f44' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC9\\data\\localweb\\prestashop-skeleton\\back-office\\themes\\idt\\template\\helpers\\form\\form_project_associated.tpl',
      1 => 1352106503,
      2 => 'file',
    ),
    '44af5ec9d8c5b83fc2a7fa3a25702a3f3ffab32d' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC9\\data\\localweb\\prestashop-skeleton\\back-office\\themes\\idt\\template\\helpers\\form\\form_category.tpl',
      1 => 1348647540,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11959544a9d86aa7597-57855281',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'show_toolbar' => 0,
    'toolbar_btn' => 0,
    'toolbar_scroll' => 0,
    'title' => 0,
    'fields' => 0,
    'table' => 0,
    'name_controller' => 0,
    'current' => 0,
    'submit_action' => 0,
    'token' => 0,
    'style' => 0,
    'form_id' => 0,
    'identifier' => 0,
    'f' => 0,
    'required_fields' => 0,
    'fieldset' => 0,
    'key' => 0,
    'field' => 0,
    'input' => 0,
    'fields_value' => 0,
    'contains_states' => 0,
    'languages' => 0,
    'language' => 0,
    'defaultFormLanguage' => 0,
    'value_text' => 0,
    'optiongroup' => 0,
    'option' => 0,
    'field_value' => 0,
    'value' => 0,
    'id_checkbox' => 0,
    'select' => 0,
    'k' => 0,
    'v' => 0,
    'asso_shop' => 0,
    'p' => 0,
    'hookName' => 0,
    'tinymce' => 0,
    'iso' => 0,
    'ad' => 0,
    'firstCall' => 0,
    'vat_number' => 0,
    'allowEmployeeFormLang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_544a9d8b529197_02821026',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544a9d8b529197_02821026')) {function content_544a9d8b529197_02821026($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC9\\data\\localweb\\prestashop-skeleton\\tools\\smarty\\plugins\\modifier.escape.php';
?>

<?php if ($_smarty_tpl->tpl_vars['show_toolbar']->value){?>
	<?php echo $_smarty_tpl->getSubTemplate ("toolbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('toolbar_btn'=>$_smarty_tpl->tpl_vars['toolbar_btn']->value,'toolbar_scroll'=>$_smarty_tpl->tpl_vars['toolbar_scroll']->value,'title'=>$_smarty_tpl->tpl_vars['title']->value), 0);?>

	<div class="leadin"></div>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['fields']->value['title'])){?><h2><?php echo $_smarty_tpl->tpl_vars['fields']->value['title'];?>
</h2><?php }?>

<form id="<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
_form" class="defaultForm <?php echo $_smarty_tpl->tpl_vars['name_controller']->value;?>
" action="<?php echo $_smarty_tpl->tpl_vars['current']->value;?>
&<?php if (!empty($_smarty_tpl->tpl_vars['submit_action']->value)){?><?php echo $_smarty_tpl->tpl_vars['submit_action']->value;?>
=1<?php }?>&token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" method="post" enctype="multipart/form-data" <?php if (isset($_smarty_tpl->tpl_vars['style']->value)){?>style="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
"<?php }?>>
	<?php if ($_smarty_tpl->tpl_vars['form_id']->value){?>
		<input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['identifier']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['identifier']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['form_id']->value;?>
" />
	<?php }?>
	<?php  $_smarty_tpl->tpl_vars['fieldset'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fieldset']->_loop = false;
 $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fieldset']->key => $_smarty_tpl->tpl_vars['fieldset']->value){
$_smarty_tpl->tpl_vars['fieldset']->_loop = true;
 $_smarty_tpl->tpl_vars['f']->value = $_smarty_tpl->tpl_vars['fieldset']->key;
?>
		<fieldset id="fieldset_<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
">
			<?php if ($_smarty_tpl->tpl_vars['table']->value=="publication"&&$_smarty_tpl->tpl_vars['name_controller']->value!='adminmrtcreports'){?>
			<?php if ($_smarty_tpl->tpl_vars['required_fields']->value){?>
				<div class="margin-small"><sup>*</sup> <?php echo smartyTranslate(array('s'=>'Required field'),$_smarty_tpl);?>
</div>
			<?php }?>
				<div class="margin-small"><sup>§</sup> <?php echo smartyTranslate(array('s'=>'Diva required field for the selected publication type'),$_smarty_tpl);?>
</div>
				<br/>
			<?php }?>
			<?php  $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['fieldset']->value['form']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field']->key => $_smarty_tpl->tpl_vars['field']->value){
$_smarty_tpl->tpl_vars['field']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['field']->key;
?>
				<?php if ($_smarty_tpl->tpl_vars['key']->value=='legend'){?>
					<legend>
						<?php if (isset($_smarty_tpl->tpl_vars['field']->value['image'])){?><img src="<?php echo $_smarty_tpl->tpl_vars['field']->value['image'];?>
" alt="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['field']->value['title'], 'htmlall', 'UTF-8');?>
" /><?php }?>
						<?php echo $_smarty_tpl->tpl_vars['field']->value['title'];?>

					</legend>
				<?php }elseif($_smarty_tpl->tpl_vars['key']->value=='description'&&$_smarty_tpl->tpl_vars['field']->value){?>
					<p class="description"><?php echo $_smarty_tpl->tpl_vars['field']->value;?>
</p>
				<?php }elseif($_smarty_tpl->tpl_vars['key']->value=='input'){?>
					<?php  $_smarty_tpl->tpl_vars['input'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['input']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['field']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['input']->key => $_smarty_tpl->tpl_vars['input']->value){
$_smarty_tpl->tpl_vars['input']->_loop = true;
?>
						<?php if ($_smarty_tpl->tpl_vars['input']->value['type']=='hidden'){?>
							<input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']], 'htmlall', 'UTF-8');?>
" />
						<?php }else{ ?>
							<?php if ($_smarty_tpl->tpl_vars['input']->value['name']=='id_state'){?>
								<div id="contains_states" <?php if ($_smarty_tpl->tpl_vars['contains_states']->value){?>style="display:none;"<?php }?>>
							<?php }?>
							
								<?php if (isset($_smarty_tpl->tpl_vars['input']->value['label'])){?><label><?php echo $_smarty_tpl->tpl_vars['input']->value['label'];?>
 </label><?php }?>
							
							
								<div class="margin-form">
								
	<?php if ($_smarty_tpl->tpl_vars['input']->value['type']=='select_theme'){?>
		<select name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['input']->value['multiple'])){?>multiple="multiple" <?php }?><?php if (isset($_smarty_tpl->tpl_vars['input']->value['onchange'])){?>onchange="<?php echo $_smarty_tpl->tpl_vars['input']->value['onchange'];?>
"<?php }?>>
			<?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['input']->value['options']['query']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['option']->value;?>
"
					<?php if (isset($_smarty_tpl->tpl_vars['input']->value['multiple'])){?>
						<?php  $_smarty_tpl->tpl_vars['field_value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field_value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field_value']->key => $_smarty_tpl->tpl_vars['field_value']->value){
$_smarty_tpl->tpl_vars['field_value']->_loop = true;
?>
							<?php echo $_smarty_tpl->tpl_vars['field_value']->value;?>

							<?php if ($_smarty_tpl->tpl_vars['field_value']->value==$_smarty_tpl->tpl_vars['option']->value){?>selected="selected"<?php }?>
						<?php } ?>
					<?php }else{ ?>
						<?php if ($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']]==$_smarty_tpl->tpl_vars['option']->value){?>selected="selected"<?php }?>
					<?php }?>
				><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['option']->value, 'htmlall', 'UTF-8');?>
</option>
			<?php } ?>
		</select>
	<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='default_tab'){?>
	<select name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
">
		<?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['input']->value['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>
			<optgroup label="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['option']->value['name'], 'htmlall', 'UTF-8');?>
"></optgroup>
			<?php  $_smarty_tpl->tpl_vars['children'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['children']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['option']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['children']->key => $_smarty_tpl->tpl_vars['children']->value){
$_smarty_tpl->tpl_vars['children']->_loop = true;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['children']->value['id_tab'];?>
" <?php if ($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']]==$_smarty_tpl->tpl_vars['children']->value['id_tab']){?>selected="selected"<?php }?>>&nbsp;&nbsp;<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['children']->value['name'], 'htmlall', 'UTF-8');?>
</option>
			<?php } ?>
		<?php } ?>
	</select>
	<?php }else{ ?>
		
								<?php if ($_smarty_tpl->tpl_vars['input']->value['type']=='text'||$_smarty_tpl->tpl_vars['input']->value['type']=='tags'){?>
									<?php if (isset($_smarty_tpl->tpl_vars['input']->value['lang'])){?>
										<div class="translatable">
											<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value){
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
												<div class="lang_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
" style="display:<?php if ($_smarty_tpl->tpl_vars['language']->value['id_lang']==$_smarty_tpl->tpl_vars['defaultFormLanguage']->value){?>block<?php }else{ ?>none<?php }?>; float: left;">
													<?php if ($_smarty_tpl->tpl_vars['input']->value['type']=='tags'){?>
														
														<script type="text/javascript">
															$().ready(function () {
																var input_id = '<?php if (isset($_smarty_tpl->tpl_vars['input']->value['id'])){?><?php echo $_smarty_tpl->tpl_vars['input']->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
<?php }?>';
																$('#'+input_id).tagify({addTagPrompt: '<?php echo smartyTranslate(array('s'=>'Add tag','js'=>1),$_smarty_tpl);?>
'});
																$('#<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
_form').submit( function() {
																	$(this).find('#'+input_id).val($('#'+input_id).tagify('serialize'));
																});
															});
														</script>
														
													<?php }?>
													<?php $_smarty_tpl->tpl_vars['value_text'] = new Smarty_variable($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']][$_smarty_tpl->tpl_vars['language']->value['id_lang']], null, 0);?>
													<input type="text"
															name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
"
															id="<?php if (isset($_smarty_tpl->tpl_vars['input']->value['id'])){?><?php echo $_smarty_tpl->tpl_vars['input']->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
<?php }?>"
															value="<?php if (isset($_smarty_tpl->tpl_vars['input']->value['string_format'])&&$_smarty_tpl->tpl_vars['input']->value['string_format']){?><?php echo smarty_modifier_escape(sprintf($_smarty_tpl->tpl_vars['input']->value['string_format'],$_smarty_tpl->tpl_vars['value_text']->value), 'htmlall', 'UTF-8');?>
<?php }else{ ?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['value_text']->value, 'htmlall', 'UTF-8');?>
<?php }?>"
															class="<?php if ($_smarty_tpl->tpl_vars['input']->value['type']=='tags'){?>tagify <?php }?><?php if (isset($_smarty_tpl->tpl_vars['input']->value['class'])){?><?php echo $_smarty_tpl->tpl_vars['input']->value['class'];?>
<?php }?>"
															<?php if (isset($_smarty_tpl->tpl_vars['input']->value['size'])){?>size="<?php echo $_smarty_tpl->tpl_vars['input']->value['size'];?>
"<?php }?>
															<?php if (isset($_smarty_tpl->tpl_vars['input']->value['maxlength'])){?>maxlength="<?php echo $_smarty_tpl->tpl_vars['input']->value['maxlength'];?>
"<?php }?>
															<?php if (isset($_smarty_tpl->tpl_vars['input']->value['readonly'])&&$_smarty_tpl->tpl_vars['input']->value['readonly']){?>readonly="readonly"<?php }?>
															<?php if (isset($_smarty_tpl->tpl_vars['input']->value['disabled'])&&$_smarty_tpl->tpl_vars['input']->value['disabled']){?>disabled="disabled"<?php }?>
															<?php if (isset($_smarty_tpl->tpl_vars['input']->value['autocomplete'])&&!$_smarty_tpl->tpl_vars['input']->value['autocomplete']){?>autocomplete="off"<?php }?> />
													<?php if (!empty($_smarty_tpl->tpl_vars['input']->value['hint'])){?><span class="hint" name="help_box"><?php echo $_smarty_tpl->tpl_vars['input']->value['hint'];?>
<span class="hint-pointer">&nbsp;</span></span><?php }?>
												</div>
											<?php } ?>
										</div>
									<?php }else{ ?>
										<?php if ($_smarty_tpl->tpl_vars['input']->value['type']=='tags'){?>
											
											<script type="text/javascript">
												$().ready(function () {
													var input_id = '<?php if (isset($_smarty_tpl->tpl_vars['input']->value['id'])){?><?php echo $_smarty_tpl->tpl_vars['input']->value['id'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
<?php }?>';
													$('#'+input_id).tagify();
													$('#'+input_id).tagify({addTagPrompt: '<?php echo smartyTranslate(array('s'=>'Add tag'),$_smarty_tpl);?>
'});
													$('#<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
_form').submit( function() {
														$(this).find('#'+input_id).val($('#'+input_id).tagify('serialize'));
													});
												});
											</script>
											
										<?php }?>
										<?php $_smarty_tpl->tpl_vars['value_text'] = new Smarty_variable($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']], null, 0);?>
										<input type="text"
												name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
"
												id="<?php if (isset($_smarty_tpl->tpl_vars['input']->value['id'])){?><?php echo $_smarty_tpl->tpl_vars['input']->value['id'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
<?php }?>"
												value="<?php if (isset($_smarty_tpl->tpl_vars['input']->value['string_format'])&&$_smarty_tpl->tpl_vars['input']->value['string_format']){?><?php echo smarty_modifier_escape(sprintf($_smarty_tpl->tpl_vars['input']->value['string_format'],$_smarty_tpl->tpl_vars['value_text']->value), 'htmlall', 'UTF-8');?>
<?php }else{ ?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['value_text']->value, 'htmlall', 'UTF-8');?>
<?php }?>"
												class="<?php if ($_smarty_tpl->tpl_vars['input']->value['type']=='tags'){?>tagify <?php }?><?php if (isset($_smarty_tpl->tpl_vars['input']->value['class'])){?><?php echo $_smarty_tpl->tpl_vars['input']->value['class'];?>
<?php }?>"
												<?php if (isset($_smarty_tpl->tpl_vars['input']->value['size'])){?>size="<?php echo $_smarty_tpl->tpl_vars['input']->value['size'];?>
"<?php }?>
												<?php if (isset($_smarty_tpl->tpl_vars['input']->value['maxlength'])){?>maxlength="<?php echo $_smarty_tpl->tpl_vars['input']->value['maxlength'];?>
"<?php }?>
												<?php if (isset($_smarty_tpl->tpl_vars['input']->value['class'])){?>class="<?php echo $_smarty_tpl->tpl_vars['input']->value['class'];?>
"<?php }?>
												<?php if (isset($_smarty_tpl->tpl_vars['input']->value['readonly'])&&$_smarty_tpl->tpl_vars['input']->value['readonly']){?>readonly="readonly"<?php }?>
												<?php if (isset($_smarty_tpl->tpl_vars['input']->value['disabled'])&&$_smarty_tpl->tpl_vars['input']->value['disabled']){?>disabled="disabled"<?php }?>
												<?php if (isset($_smarty_tpl->tpl_vars['input']->value['autocomplete'])&&!$_smarty_tpl->tpl_vars['input']->value['autocomplete']){?>autocomplete="off"<?php }?> />
										<?php if (isset($_smarty_tpl->tpl_vars['input']->value['suffix'])){?><?php echo $_smarty_tpl->tpl_vars['input']->value['suffix'];?>
<?php }?>
										<?php if (!empty($_smarty_tpl->tpl_vars['input']->value['hint'])){?><span class="hint" name="help_box"><?php echo $_smarty_tpl->tpl_vars['input']->value['hint'];?>
<span class="hint-pointer">&nbsp;</span></span><?php }?>
									<?php }?>
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='select'){?>
									<?php if (isset($_smarty_tpl->tpl_vars['input']->value['options']['query'])&&!$_smarty_tpl->tpl_vars['input']->value['options']['query']&&isset($_smarty_tpl->tpl_vars['input']->value['empty_message'])){?>
										<?php echo $_smarty_tpl->tpl_vars['input']->value['empty_message'];?>

										<?php $_smarty_tpl->createLocalArrayVariable('input', null, 0);
$_smarty_tpl->tpl_vars['input']->value['required'] = false;?>
										<?php $_smarty_tpl->createLocalArrayVariable('input', null, 0);
$_smarty_tpl->tpl_vars['input']->value['desc'] = null;?>
									<?php }else{ ?>
										<select name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
" class=""
												id="<?php if (isset($_smarty_tpl->tpl_vars['input']->value['id'])){?><?php echo $_smarty_tpl->tpl_vars['input']->value['id'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
<?php }?>"
												<?php if (isset($_smarty_tpl->tpl_vars['input']->value['multiple'])){?>multiple="multiple" <?php }?>
												<?php if (isset($_smarty_tpl->tpl_vars['input']->value['size'])){?>size="<?php echo $_smarty_tpl->tpl_vars['input']->value['size'];?>
"<?php }?>
												<?php if (isset($_smarty_tpl->tpl_vars['input']->value['onchange'])){?>onchange="<?php echo $_smarty_tpl->tpl_vars['input']->value['onchange'];?>
"<?php }?>>
											<?php if (isset($_smarty_tpl->tpl_vars['input']->value['options']['default'])){?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['input']->value['options']['default']['value'];?>
"><?php echo $_smarty_tpl->tpl_vars['input']->value['options']['default']['label'];?>
</option>
											<?php }?>
											<?php if (isset($_smarty_tpl->tpl_vars['input']->value['options']['optiongroup'])){?>
												<?php  $_smarty_tpl->tpl_vars['optiongroup'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['optiongroup']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['input']->value['options']['optiongroup']['query']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['optiongroup']->key => $_smarty_tpl->tpl_vars['optiongroup']->value){
$_smarty_tpl->tpl_vars['optiongroup']->_loop = true;
?>
													<optgroup label="<?php echo $_smarty_tpl->tpl_vars['optiongroup']->value[$_smarty_tpl->tpl_vars['input']->value['options']['optiongroup']['label']];?>
">
														<?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['optiongroup']->value[$_smarty_tpl->tpl_vars['input']->value['options']['options']['query']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>
															<option value="<?php echo $_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['options']['options']['id']];?>
"
																<?php if (isset($_smarty_tpl->tpl_vars['input']->value['multiple'])){?>
																	<?php  $_smarty_tpl->tpl_vars['field_value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field_value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field_value']->key => $_smarty_tpl->tpl_vars['field_value']->value){
$_smarty_tpl->tpl_vars['field_value']->_loop = true;
?>
																		<?php if ($_smarty_tpl->tpl_vars['field_value']->value==$_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['options']['options']['id']]){?>selected="selected"<?php }?>
																	<?php } ?>
																<?php }else{ ?>
																	<?php if ($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']]==$_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['options']['options']['id']]){?>selected="selected"<?php }?>
																<?php }?>
															><?php echo $_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['options']['options']['name']];?>
</option>
														<?php } ?>
													</optgroup>
												<?php } ?>
											<?php }else{ ?>
												<?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['input']->value['options']['query']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>
													<?php if (is_object($_smarty_tpl->tpl_vars['option']->value)){?>
														<option value="<?php echo $_smarty_tpl->tpl_vars['option']->value->{$_smarty_tpl->tpl_vars['input']->value['options']['id']};?>
"
															<?php if (isset($_smarty_tpl->tpl_vars['input']->value['multiple'])){?>
																<?php  $_smarty_tpl->tpl_vars['field_value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field_value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field_value']->key => $_smarty_tpl->tpl_vars['field_value']->value){
$_smarty_tpl->tpl_vars['field_value']->_loop = true;
?>
																	<?php if ($_smarty_tpl->tpl_vars['field_value']->value==$_smarty_tpl->tpl_vars['option']->value->{$_smarty_tpl->tpl_vars['input']->value['options']['id']}){?>
																		selected="selected"
																	<?php }?>
																<?php } ?>
															<?php }else{ ?>
																<?php if ($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']]==$_smarty_tpl->tpl_vars['option']->value->{$_smarty_tpl->tpl_vars['input']->value['options']['id']}){?>
																	selected="selected"
																<?php }?>
															<?php }?>
														><?php echo $_smarty_tpl->tpl_vars['option']->value->{$_smarty_tpl->tpl_vars['input']->value['options']['name']};?>
</option>
													<?php }else{ ?>
														<option value="<?php echo $_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['options']['id']];?>
"
															<?php if (isset($_smarty_tpl->tpl_vars['input']->value['multiple'])){?>
																<?php  $_smarty_tpl->tpl_vars['field_value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field_value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field_value']->key => $_smarty_tpl->tpl_vars['field_value']->value){
$_smarty_tpl->tpl_vars['field_value']->_loop = true;
?>
																	<?php if ($_smarty_tpl->tpl_vars['field_value']->value==$_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['options']['id']]){?>
																		selected="selected"
																	<?php }?>
																<?php } ?>
															<?php }else{ ?>
																<?php if ($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']]==$_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['options']['id']]){?>
																	selected="selected"
																<?php }?>
															<?php }?>
														><?php echo $_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['options']['name']];?>
</option>

													<?php }?>
												<?php } ?>
											<?php }?>
										</select>
										<?php if (!empty($_smarty_tpl->tpl_vars['input']->value['hint'])){?><span class="hint" name="help_box"><?php echo $_smarty_tpl->tpl_vars['input']->value['hint'];?>
<span class="hint-pointer">&nbsp;</span></span><?php }?>
									<?php }?>
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='radio'){?>
									<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['input']->value['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
										<input type="radio"	name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
"id="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['value']->value['value'], 'htmlall', 'UTF-8');?>
"
												<?php if ($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']]==$_smarty_tpl->tpl_vars['value']->value['value']){?>checked="checked"<?php }?>
												<?php if (isset($_smarty_tpl->tpl_vars['input']->value['disabled'])&&$_smarty_tpl->tpl_vars['input']->value['disabled']){?>disabled="disabled"<?php }?> />
										<label <?php if (isset($_smarty_tpl->tpl_vars['input']->value['class'])){?>class="<?php echo $_smarty_tpl->tpl_vars['input']->value['class'];?>
"<?php }?> for="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">
										 <?php if (isset($_smarty_tpl->tpl_vars['input']->value['is_bool'])&&$_smarty_tpl->tpl_vars['input']->value['is_bool']==true){?>
											<?php if ($_smarty_tpl->tpl_vars['value']->value['value']==1){?>
												<img src="../img/admin/enabled.gif" alt="<?php echo $_smarty_tpl->tpl_vars['value']->value['label'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['value']->value['label'];?>
" />
											<?php }else{ ?>
												<img src="../img/admin/disabled.gif" alt="<?php echo $_smarty_tpl->tpl_vars['value']->value['label'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['value']->value['label'];?>
" />
											<?php }?>
										 <?php }else{ ?>
											<?php echo $_smarty_tpl->tpl_vars['value']->value['label'];?>

										 <?php }?>
										</label>
										<?php if (isset($_smarty_tpl->tpl_vars['input']->value['br'])&&$_smarty_tpl->tpl_vars['input']->value['br']){?><br /><?php }?>
										<?php if (isset($_smarty_tpl->tpl_vars['value']->value['p'])&&$_smarty_tpl->tpl_vars['value']->value['p']){?><p><?php echo $_smarty_tpl->tpl_vars['value']->value['p'];?>
</p><?php }?>
									<?php } ?>
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='textarea'){?>
									<?php if (isset($_smarty_tpl->tpl_vars['input']->value['lang'])){?>
										<div class="translatable">
											<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value){
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
												<div class="lang_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
" style="display:<?php if ($_smarty_tpl->tpl_vars['language']->value['id_lang']==$_smarty_tpl->tpl_vars['defaultFormLanguage']->value){?>block<?php }else{ ?>none<?php }?>; float: left;">
													<textarea cols="<?php echo $_smarty_tpl->tpl_vars['input']->value['cols'];?>
" rows="<?php echo $_smarty_tpl->tpl_vars['input']->value['rows'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['input']->value['autoload_rte'])&&$_smarty_tpl->tpl_vars['input']->value['autoload_rte']){?>class="rte autoload_rte"<?php }?> ><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']][$_smarty_tpl->tpl_vars['language']->value['id_lang']], 'htmlall', 'UTF-8');?>
</textarea>
												</div>
											<?php } ?>
										</div>
									<?php }else{ ?>
										<textarea name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
" cols="<?php echo $_smarty_tpl->tpl_vars['input']->value['cols'];?>
" rows="<?php echo $_smarty_tpl->tpl_vars['input']->value['rows'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['input']->value['autoload_rte'])&&$_smarty_tpl->tpl_vars['input']->value['autoload_rte']){?>class="rte autoload_rte"<?php }?>><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']], 'htmlall', 'UTF-8');?>
</textarea>
									<?php }?>
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='checkbox'){?>
									<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['input']->value['values']['query']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
										<?php $_smarty_tpl->tpl_vars['id_checkbox'] = new Smarty_variable((($_smarty_tpl->tpl_vars['input']->value['name']).('_')).($_smarty_tpl->tpl_vars['value']->value[$_smarty_tpl->tpl_vars['input']->value['values']['id']]), null, 0);?>
										<input type="checkbox"
											name="<?php echo $_smarty_tpl->tpl_vars['id_checkbox']->value;?>
"
											id="<?php echo $_smarty_tpl->tpl_vars['id_checkbox']->value;?>
"
											<?php if (isset($_smarty_tpl->tpl_vars['value']->value['val'])){?>value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['value']->value['val'], 'htmlall', 'UTF-8');?>
"<?php }?>
											<?php if (isset($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['id_checkbox']->value])&&$_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['id_checkbox']->value]){?>checked="checked"<?php }?> />
										<label for="<?php echo $_smarty_tpl->tpl_vars['id_checkbox']->value;?>
" class="t"><strong><?php echo $_smarty_tpl->tpl_vars['value']->value[$_smarty_tpl->tpl_vars['input']->value['values']['name']];?>
</strong></label><br />
									<?php } ?>
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='photo_file'){?>
									<?php if (isset($_smarty_tpl->tpl_vars['input']->value['display_image'])&&$_smarty_tpl->tpl_vars['input']->value['display_image']){?>
										<?php if (isset($_smarty_tpl->tpl_vars['fields_value']->value['image'])&&$_smarty_tpl->tpl_vars['fields_value']->value['image']){?>
											<div id="staff_image">
												<?php echo $_smarty_tpl->tpl_vars['fields_value']->value['image'];?>

												<p align="center"><?php echo smartyTranslate(array('s'=>'File size'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['fields_value']->value['size'];?>
kb</p>
												<a href="<?php echo $_smarty_tpl->tpl_vars['current']->value;?>
&<?php echo $_smarty_tpl->tpl_vars['identifier']->value;?>
=<?php echo $_smarty_tpl->tpl_vars['form_id']->value;?>
&token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
&deleteImage=1">
													<img src="../img/admin/delete.gif" alt="<?php echo smartyTranslate(array('s'=>'Delete'),$_smarty_tpl);?>
" /> <?php echo smartyTranslate(array('s'=>'Delete'),$_smarty_tpl);?>

												</a>
												<br>
												<a href="../img/staff/<?php echo $_smarty_tpl->tpl_vars['form_id']->value;?>
.jpg">
													<img src="../img/admin/arrow-right.png" style="vertical-align:middle;padding-bottom:3px"/> <?php echo smartyTranslate(array('s'=>'Link to original resolution image'),$_smarty_tpl);?>

												</a>
											</div><br />
										<?php }?>
									<?php }?>
									<input type="file" name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['input']->value['id'])){?>id="<?php echo $_smarty_tpl->tpl_vars['input']->value['id'];?>
"<?php }?> />
									<?php if (!empty($_smarty_tpl->tpl_vars['input']->value['hint'])){?><span class="hint" name="help_box"><?php echo $_smarty_tpl->tpl_vars['input']->value['hint'];?>
<span class="hint-pointer">&nbsp;</span></span><?php }?>
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='funding_agency_logo_file'){?>
									<?php if (isset($_smarty_tpl->tpl_vars['input']->value['display_image'])&&$_smarty_tpl->tpl_vars['input']->value['display_image']){?>
										<?php if (isset($_smarty_tpl->tpl_vars['fields_value']->value['image'])&&$_smarty_tpl->tpl_vars['fields_value']->value['image']){?>
											<div id="funding_agency_image">
												<?php echo $_smarty_tpl->tpl_vars['fields_value']->value['image'];?>

												<p align="center"><?php echo smartyTranslate(array('s'=>'File size'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['fields_value']->value['size'];?>
kb</p>
												<a href="<?php echo $_smarty_tpl->tpl_vars['current']->value;?>
&<?php echo $_smarty_tpl->tpl_vars['identifier']->value;?>
=<?php echo $_smarty_tpl->tpl_vars['form_id']->value;?>
&token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
&deleteImage=1">
													<img src="../img/admin/delete.gif" alt="<?php echo smartyTranslate(array('s'=>'Delete'),$_smarty_tpl);?>
" /> <?php echo smartyTranslate(array('s'=>'Delete'),$_smarty_tpl);?>

												</a>
											</div><br />
										<?php }?>
									<?php }?>
									<input type="file" name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['input']->value['id'])){?>id="<?php echo $_smarty_tpl->tpl_vars['input']->value['id'];?>
"<?php }?> />
									<?php if (!empty($_smarty_tpl->tpl_vars['input']->value['hint'])){?><span class="hint" name="help_box"><?php echo $_smarty_tpl->tpl_vars['input']->value['hint'];?>
<span class="hint-pointer">&nbsp;</span></span><?php }?>
					
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='partner_logo_file'){?>
									<?php if (isset($_smarty_tpl->tpl_vars['input']->value['display_image'])&&$_smarty_tpl->tpl_vars['input']->value['display_image']){?>
										<?php if (isset($_smarty_tpl->tpl_vars['fields_value']->value['image'])&&$_smarty_tpl->tpl_vars['fields_value']->value['image']){?>
											<div id="partner_image">
												<?php echo $_smarty_tpl->tpl_vars['fields_value']->value['image'];?>

												<p align="center"><?php echo smartyTranslate(array('s'=>'File size'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['fields_value']->value['size'];?>
kb</p>
												<a href="<?php echo $_smarty_tpl->tpl_vars['current']->value;?>
&<?php echo $_smarty_tpl->tpl_vars['identifier']->value;?>
=<?php echo $_smarty_tpl->tpl_vars['form_id']->value;?>
&token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
&deleteImage=1">
													<img src="../img/admin/delete.gif" alt="<?php echo smartyTranslate(array('s'=>'Delete'),$_smarty_tpl);?>
" /> <?php echo smartyTranslate(array('s'=>'Delete'),$_smarty_tpl);?>

												</a>
											</div><br />
										<?php }?>
									<?php }?>
									<input type="file" name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['input']->value['id'])){?>id="<?php echo $_smarty_tpl->tpl_vars['input']->value['id'];?>
"<?php }?> />
									<?php if (!empty($_smarty_tpl->tpl_vars['input']->value['hint'])){?><span class="hint" name="help_box"><?php echo $_smarty_tpl->tpl_vars['input']->value['hint'];?>
<span class="hint-pointer">&nbsp;</span></span><?php }?>
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='publication_pdf'){?>
								<?php if (isset($_smarty_tpl->tpl_vars['input']->value['pdf'])&&$_smarty_tpl->tpl_vars['input']->value['pdf']){?>
											<div id="publication_pdf_link">
												<a href="<?php echo $_smarty_tpl->tpl_vars['input']->value['pdf'];?>
" target="_blank">
													<img src="../img/pdf.gif" alt="<?php echo smartyTranslate(array('s'=>'Open'),$_smarty_tpl);?>
" /> <?php echo smartyTranslate(array('s'=>'Open'),$_smarty_tpl);?>

												</a>
											</div><br />
										<?php }?>
								<?php if (!isset($_smarty_tpl->tpl_vars['input']->value['onlyPDF'])||(isset($_smarty_tpl->tpl_vars['input']->value['onlyPDF'])&&!$_smarty_tpl->tpl_vars['input']->value['onlyPDF'])){?>
									<input type="file" name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['input']->value['id'])){?>id="<?php echo $_smarty_tpl->tpl_vars['input']->value['id'];?>
"<?php }?> />
								<?php }?>
									<?php if (!empty($_smarty_tpl->tpl_vars['input']->value['hint'])){?><span class="hint" name="help_box"><?php echo $_smarty_tpl->tpl_vars['input']->value['hint'];?>
<span class="hint-pointer">&nbsp;</span></span><?php }?>
								
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='file_uploading'){?>
								<?php if (isset($_smarty_tpl->tpl_vars['input']->value['file_path'])&&$_smarty_tpl->tpl_vars['input']->value['file_path']){?>
											<div id="news_and_events_file_link">
												<a href="<?php echo $_smarty_tpl->tpl_vars['input']->value['file_path'];?>
" target="_blank">
													<img src="../img/file_icon.png" alt="<?php echo smartyTranslate(array('s'=>'Open'),$_smarty_tpl);?>
" /> <?php echo smartyTranslate(array('s'=>'Open'),$_smarty_tpl);?>

												</a>
											</div><br />
										<?php }?>
								<input type="file" name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['input']->value['id'])){?>id="<?php echo $_smarty_tpl->tpl_vars['input']->value['id'];?>
"<?php }?> />
								<?php if (!empty($_smarty_tpl->tpl_vars['input']->value['hint'])){?><span class="hint" name="help_box"><?php echo $_smarty_tpl->tpl_vars['input']->value['hint'];?>
<span class="hint-pointer">&nbsp;</span></span><?php }?>
								
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='diva_label'){?>
								<div>
								<a <?php if (isset($_smarty_tpl->tpl_vars['input']->value['style'])){?>style="<?php echo $_smarty_tpl->tpl_vars['input']->value['style'];?>
"<?php }?>>
								<?php if (isset($_smarty_tpl->tpl_vars['input']->value['value'])){?>
												<?php echo $_smarty_tpl->tpl_vars['input']->value['value'];?>

										<?php }?></a></div><br />
	
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='file'){?>
									<?php if (isset($_smarty_tpl->tpl_vars['input']->value['display_image'])&&$_smarty_tpl->tpl_vars['input']->value['display_image']){?>
										<?php if (isset($_smarty_tpl->tpl_vars['fields_value']->value['image'])&&$_smarty_tpl->tpl_vars['fields_value']->value['image']){?>
											<div id="image">
												<?php echo $_smarty_tpl->tpl_vars['fields_value']->value['image'];?>

												<p align="center"><?php echo smartyTranslate(array('s'=>'File size'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['fields_value']->value['size'];?>
kb</p>
												<a href="<?php echo $_smarty_tpl->tpl_vars['current']->value;?>
&<?php echo $_smarty_tpl->tpl_vars['identifier']->value;?>
=<?php echo $_smarty_tpl->tpl_vars['form_id']->value;?>
&token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
&deleteImage=1">
													<img src="../img/admin/delete.gif" alt="<?php echo smartyTranslate(array('s'=>'Delete'),$_smarty_tpl);?>
" /> <?php echo smartyTranslate(array('s'=>'Delete'),$_smarty_tpl);?>

												</a>
											</div><br />
										<?php }?>
									<?php }?>
									<input type="file" name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['input']->value['id'])){?>id="<?php echo $_smarty_tpl->tpl_vars['input']->value['id'];?>
"<?php }?> />
									<?php if (!empty($_smarty_tpl->tpl_vars['input']->value['hint'])){?><span class="hint" name="help_box"><?php echo $_smarty_tpl->tpl_vars['input']->value['hint'];?>
<span class="hint-pointer">&nbsp;</span></span><?php }?>
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='password'){?>
									<input type="password"
											name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
"
											size="<?php echo $_smarty_tpl->tpl_vars['input']->value['size'];?>
"
											value=""
											<?php if (isset($_smarty_tpl->tpl_vars['input']->value['autocomplete'])&&!$_smarty_tpl->tpl_vars['input']->value['autocomplete']){?>autocomplete="off"<?php }?> />
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='birthday'){?>
									<?php  $_smarty_tpl->tpl_vars['select'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['select']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['input']->value['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['select']->key => $_smarty_tpl->tpl_vars['select']->value){
$_smarty_tpl->tpl_vars['select']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['select']->key;
?>
										<select name="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" class="">
											<option value="">-</option>
											<?php if ($_smarty_tpl->tpl_vars['key']->value=='months'){?>
												
												<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['select']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
													<option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['k']->value==$_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['key']->value]){?>selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
</option>
												<?php } ?>
											<?php }else{ ?>
												<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['select']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
													<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['v']->value==$_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['key']->value]){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</option>
												<?php } ?>
											<?php }?>

										</select>
									<?php } ?>
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='group'){?>
									<?php $_smarty_tpl->tpl_vars['groups'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['values'], null, 0);?>
									<?php echo $_smarty_tpl->getSubTemplate ('helpers/form/form_group.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='initiative'){?>
									<?php $_smarty_tpl->tpl_vars['initiatives'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['values'], null, 0);?>
									<?php $_smarty_tpl->tpl_vars['initiative_types'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['initiative_types'], null, 0);?>
									<?php echo $_smarty_tpl->getSubTemplate ('helpers/form/form_initiative.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='profile'){?>
									<?php $_smarty_tpl->tpl_vars['initiatives'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['values'], null, 0);?>
									<?php /*  Call merged included template "helpers/form/form_profile.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('helpers/form/form_profile.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '11959544a9d86aa7597-57855281');
content_544a9d891dd597_26921601($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "helpers/form/form_profile.tpl" */?>
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='customer_initiative'){?>
									<?php $_smarty_tpl->tpl_vars['initiatives'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['values'], null, 0);?>
									<?php $_smarty_tpl->tpl_vars['roles'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['roles'], null, 0);?>
									<?php $_smarty_tpl->tpl_vars['initiative_types'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['initiative_types'], null, 0);?>
									<?php echo $_smarty_tpl->getSubTemplate ('helpers/form/form_customer_initiative.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='partner'){?>
									<?php $_smarty_tpl->tpl_vars['partners'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['values'], null, 0);?>
									<?php $_smarty_tpl->tpl_vars['partner_types'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['partner_types'], null, 0);?>
									<?php echo $_smarty_tpl->getSubTemplate ('helpers/form/form_partner.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='partner_contact'){?>
									<?php $_smarty_tpl->tpl_vars['id_partner'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['id_partner'], null, 0);?>
									<?php $_smarty_tpl->tpl_vars['contacts'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['contacts'], null, 0);?>
									<?php echo $_smarty_tpl->getSubTemplate ('helpers/form/form_partner_contact.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='funding_agency'){?>
									<?php $_smarty_tpl->tpl_vars['funding_agencies'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['values'], null, 0);?>
									<?php $_smarty_tpl->tpl_vars['project_kinds'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['project_kinds'], null, 0);?>
									<?php /*  Call merged included template "helpers/form/form_funding_agency.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('helpers/form/form_funding_agency.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '11959544a9d86aa7597-57855281');
content_544a9d8945df96_95561387($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "helpers/form/form_funding_agency.tpl" */?>
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='project'){?>
									<?php $_smarty_tpl->tpl_vars['projects'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['values'], null, 0);?>
									<?php /*  Call merged included template "helpers/form/form_project.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('helpers/form/form_project.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '11959544a9d86aa7597-57855281');
content_544a9d8959a618_02600281($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "helpers/form/form_project.tpl" */?>
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='supervision_main'){?>
									<?php $_smarty_tpl->tpl_vars['id_supervisor'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['supervisor'], null, 0);?>
									<?php $_smarty_tpl->tpl_vars['ms_students'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['students'], null, 0);?>
									<?php echo $_smarty_tpl->getSubTemplate ('helpers/form/form_supervision_main.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='supervision_assistant'){?>
									<?php $_smarty_tpl->tpl_vars['id_supervisor'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['supervisor'], null, 0);?>
									<?php $_smarty_tpl->tpl_vars['as_students'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['students'], null, 0);?>
									<?php echo $_smarty_tpl->getSubTemplate ('helpers/form/form_supervision_assistant.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='news_contact'){?>
									<?php $_smarty_tpl->tpl_vars['id_contact'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['value'], null, 0);?>
									<?php $_smarty_tpl->tpl_vars['contact_name'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['contact_name'], null, 0);?>
									<?php echo $_smarty_tpl->getSubTemplate ('helpers/form/form_news_contact.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
	
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='event_speakers'){?>
									<?php $_smarty_tpl->tpl_vars['speakers'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['value'], null, 0);?>
									<?php $_smarty_tpl->tpl_vars['id_news_and_event'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['news_and_event'], null, 0);?>
									<?php echo $_smarty_tpl->getSubTemplate ('helpers/form/form_event_speaker.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
	
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='customer_position'){?>
									<?php $_smarty_tpl->tpl_vars['positions'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['positions'], null, 0);?>
									<?php $_smarty_tpl->tpl_vars['customer_positions'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['customer_positions'], null, 0);?>
									<?php $_smarty_tpl->tpl_vars['position_select_label'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['position_select_label'], null, 0);?>
									<?php echo $_smarty_tpl->getSubTemplate ('helpers/form/form_customer_position.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='course_developer'){?>
									<?php $_smarty_tpl->tpl_vars['id_course'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['course'], null, 0);?>
									<?php $_smarty_tpl->tpl_vars['course_developers'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['course_developers'], null, 0);?>
									<?php echo $_smarty_tpl->getSubTemplate ('helpers/form/form_course_developer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='course_instructor'){?>
									<?php $_smarty_tpl->tpl_vars['id_course_instance'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['course_instance'], null, 0);?>
									<?php $_smarty_tpl->tpl_vars['course_instructors'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['course_instructors'], null, 0);?>
									<?php $_smarty_tpl->tpl_vars['course_roles'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['course_roles'], null, 0);?>
									<?php echo $_smarty_tpl->getSubTemplate ('helpers/form/form_course_staff.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='project_leaders'){?>
									<?php $_smarty_tpl->tpl_vars['id_project'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['project'], null, 0);?>
									<?php $_smarty_tpl->tpl_vars['leaders'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['values'], null, 0);?>
									<?php /*  Call merged included template "helpers/form/form_project_leaders.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('helpers/form/form_project_leaders.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '11959544a9d86aa7597-57855281');
content_544a9d899ad596_99212609($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "helpers/form/form_project_leaders.tpl" */?>
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='project_members'){?>
									<?php $_smarty_tpl->tpl_vars['id_project'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['project'], null, 0);?>
									<?php $_smarty_tpl->tpl_vars['members'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['values'], null, 0);?>
									<?php /*  Call merged included template "helpers/form/form_project_members.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('helpers/form/form_project_members.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '11959544a9d86aa7597-57855281');
content_544a9d89b9d713_22659340($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "helpers/form/form_project_members.tpl" */?>
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='project_associated'){?>
									<?php $_smarty_tpl->tpl_vars['id_project'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['project'], null, 0);?>
									<?php $_smarty_tpl->tpl_vars['associated'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['values'], null, 0);?>
									<?php /*  Call merged included template "helpers/form/form_project_associated.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('helpers/form/form_project_associated.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '11959544a9d86aa7597-57855281');
content_544a9d89d81d12_91064608($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "helpers/form/form_project_associated.tpl" */?>
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='people'){?>
									<?php $_smarty_tpl->tpl_vars['people'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['values'], null, 0);?>
									<?php $_smarty_tpl->tpl_vars['id_person'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['person'], null, 0);?>
									<?php echo $_smarty_tpl->getSubTemplate ('helpers/form/form_customer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='publication_authors'){?>
									<?php $_smarty_tpl->tpl_vars['id_publication'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['publication'], null, 0);?>
									<?php $_smarty_tpl->tpl_vars['authors'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['values'], null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars['quick_link_mdh'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['quick_link_mdh'], null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars['quick_link_ext'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['quick_link_ext'], null, 0);?>
									<?php echo $_smarty_tpl->getSubTemplate ('helpers/form/form_publication_authors.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                                <?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='publication_venue'){?>
                                    <?php $_smarty_tpl->tpl_vars['instance'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['instance'], null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars['quick_link'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['quick_link'], null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars['edit_link'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['edit_link'], null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars['countries'] = new Smarty_variable($_smarty_tpl->tpl_vars['input']->value['countries'], null, 0);?>                                    
									<?php echo $_smarty_tpl->getSubTemplate ('helpers/form/form_publication_venue.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
    
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='shop'){?>
									<?php echo $_smarty_tpl->tpl_vars['input']->value['html'];?>

								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='categories'){?>
									<?php /*  Call merged included template "helpers/form/form_category.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('helpers/form/form_category.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('categories'=>$_smarty_tpl->tpl_vars['input']->value['values']), 0, '11959544a9d86aa7597-57855281');
content_544a9d8a1b2615_59481829($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "helpers/form/form_category.tpl" */?>
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='categories_select'){?>
									<?php echo $_smarty_tpl->tpl_vars['input']->value['category_tree'];?>

								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='asso_shop'&&isset($_smarty_tpl->tpl_vars['asso_shop']->value)&&$_smarty_tpl->tpl_vars['asso_shop']->value){?>
										<?php echo $_smarty_tpl->tpl_vars['asso_shop']->value;?>

								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='color'){?>
									<input type="color"
										size="<?php echo $_smarty_tpl->tpl_vars['input']->value['size'];?>
"
										data-hex="true"
										<?php if (isset($_smarty_tpl->tpl_vars['input']->value['class'])){?>class="<?php echo $_smarty_tpl->tpl_vars['input']->value['class'];?>
"
										<?php }else{ ?>class="color mColorPickerInput"<?php }?>
										name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
"
										value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']], 'htmlall', 'UTF-8');?>
" />
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='date'){?>
									<input type="text"
										size="<?php echo $_smarty_tpl->tpl_vars['input']->value['size'];?>
"
										data-hex="true"
										<?php if (isset($_smarty_tpl->tpl_vars['input']->value['class'])){?>class="<?php echo $_smarty_tpl->tpl_vars['input']->value['class'];?>
"
										<?php }else{ ?>class="datepicker"<?php }?>
										name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
"
										value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']], 'htmlall', 'UTF-8');?>
" />
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='datetime'){?>
										<input type="text"
										size="<?php echo $_smarty_tpl->tpl_vars['input']->value['size'];?>
"
										data-hex="true"
										<?php if (isset($_smarty_tpl->tpl_vars['input']->value['class'])){?>class="<?php echo $_smarty_tpl->tpl_vars['input']->value['class'];?>
"
										<?php }else{ ?>class="datetimepicker"<?php }?>
										name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
"
										value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']], 'htmlall', 'UTF-8');?>
" />
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='free'){?>
									<?php echo $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']];?>

								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['input']->value['type']!='radio'){?> <sup id="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_required" <?php if (!isset($_smarty_tpl->tpl_vars['input']->value['required'])||(isset($_smarty_tpl->tpl_vars['input']->value['required'])&&!$_smarty_tpl->tpl_vars['input']->value['required'])){?>style="display:none"<?php }?>>*</sup><?php }?>
								<?php if (isset($_smarty_tpl->tpl_vars['input']->value['divaRequired'])&&$_smarty_tpl->tpl_vars['input']->value['divaRequired']&&$_smarty_tpl->tpl_vars['input']->value['type']!='radio'){?> <sup id="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_diva" <?php if (isset($_smarty_tpl->tpl_vars['input']->value['divaVisible'])&&$_smarty_tpl->tpl_vars['input']->value['divaVisible']==false){?>style="display:none"<?php }?>>§</sup><?php }?>
								
	<?php }?>

								
									<?php if (isset($_smarty_tpl->tpl_vars['input']->value['desc'])){?>
										<p class="preference_description">
											<?php if (is_array($_smarty_tpl->tpl_vars['input']->value['desc'])){?>
												<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['input']->value['desc']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
													<?php if (is_array($_smarty_tpl->tpl_vars['p']->value)){?>
														<span id="<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value['text'];?>
</span><br />
													<?php }else{ ?>
														<?php echo $_smarty_tpl->tpl_vars['p']->value;?>
<br />
													<?php }?>
												<?php } ?>
											<?php }else{ ?>
												<?php echo $_smarty_tpl->tpl_vars['input']->value['desc'];?>

											<?php }?>
										</p>
									<?php }?>
								
								<?php if (isset($_smarty_tpl->tpl_vars['input']->value['lang'])&&isset($_smarty_tpl->tpl_vars['languages']->value)){?><div class="clear"></div><?php }?>
								</div>
								<div class="clear"></div>
							
							<?php if ($_smarty_tpl->tpl_vars['input']->value['name']=='id_state'){?>
								</div>
							<?php }?>
						<?php }?>
					<?php } ?>
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAdminForm'),$_smarty_tpl);?>

					<?php if (isset($_smarty_tpl->tpl_vars['name_controller']->value)){?>
						<?php $_smarty_tpl->_capture_stack[0][] = array('hookName', 'hookName', null); ob_start(); ?>display<?php echo ucfirst($_smarty_tpl->tpl_vars['name_controller']->value);?>
Form<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>$_smarty_tpl->tpl_vars['hookName']->value),$_smarty_tpl);?>

					<?php }elseif(isset($_GET['controller'])){?>
						<?php $_smarty_tpl->_capture_stack[0][] = array('hookName', 'hookName', null); ob_start(); ?>display<?php echo htmlentities(ucfirst($_GET['controller']));?>
Form<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>$_smarty_tpl->tpl_vars['hookName']->value),$_smarty_tpl);?>

					<?php }?>
				<?php }elseif($_smarty_tpl->tpl_vars['key']->value=='submit'){?>
					<div class="margin-form">
						<input type="submit"
							id="<?php if (isset($_smarty_tpl->tpl_vars['field']->value['id'])){?><?php echo $_smarty_tpl->tpl_vars['field']->value['id'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['table']->value;?>
_form_submit_btn<?php }?>"
							value="<?php echo $_smarty_tpl->tpl_vars['field']->value['title'];?>
"
							name="<?php if (isset($_smarty_tpl->tpl_vars['field']->value['name'])){?><?php echo $_smarty_tpl->tpl_vars['field']->value['name'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['submit_action']->value;?>
<?php }?><?php if (isset($_smarty_tpl->tpl_vars['field']->value['stay'])&&$_smarty_tpl->tpl_vars['field']->value['stay']){?>AndStay<?php }?>"
							<?php if (isset($_smarty_tpl->tpl_vars['field']->value['class'])){?>class="<?php echo $_smarty_tpl->tpl_vars['field']->value['class'];?>
"<?php }?> />
					</div>
				<?php }elseif($_smarty_tpl->tpl_vars['key']->value=='desc'){?>
					<p class="clear">
						<?php if (is_array($_smarty_tpl->tpl_vars['field']->value)){?>
							<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['field']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['p']->key;
?>
								<?php if (is_array($_smarty_tpl->tpl_vars['p']->value)){?>
									<span id="<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value['text'];?>
</span><br />
								<?php }else{ ?>
									<?php echo $_smarty_tpl->tpl_vars['p']->value;?>

									<?php if (isset($_smarty_tpl->tpl_vars['field']->value[$_smarty_tpl->tpl_vars['k']->value+1])){?><br /><?php }?>
								<?php }?>
							<?php } ?>
						<?php }else{ ?>
							<?php echo $_smarty_tpl->tpl_vars['field']->value;?>

						<?php }?>
					</p>
				<?php }?>
				
			<?php } ?>
			<?php if ($_smarty_tpl->tpl_vars['required_fields']->value){?>
				<div class="small"><sup>*</sup> <?php echo smartyTranslate(array('s'=>'Required field'),$_smarty_tpl);?>
</div>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['table']->value=="publication"&&$_smarty_tpl->tpl_vars['name_controller']->value!='adminmrtcreports'){?>
				<div class="small"><sup>§</sup> <?php echo smartyTranslate(array('s'=>'Diva required field for the selected publication type'),$_smarty_tpl);?>
</div>
			<?php }?>
		</fieldset>
		
		<?php if (isset($_smarty_tpl->tpl_vars['fields']->value[$_smarty_tpl->tpl_vars['f']->value+1])){?><br /><?php }?>
	<?php } ?>
</form>



<?php if (isset($_smarty_tpl->tpl_vars['tinymce']->value)&&$_smarty_tpl->tpl_vars['tinymce']->value){?>
	<script type="text/javascript">

	var iso = '<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
';
	var pathCSS = '<?php echo @constant('_THEME_CSS_DIR_');?>
';
	var ad = '<?php echo $_smarty_tpl->tpl_vars['ad']->value;?>
';

	$(document).ready(function(){
        
			tinySetup({
				editor_selector :"autoload_rte",
				theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull|cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,undo,redo",
				theme_advanced_buttons2 : "link,unlink,anchor,image,cleanup,code,|,forecolor,backcolor,|,hr,removeformat,visualaid,|,charmap,media,|,ltr,rtl,|,fullscreen",
				theme_advanced_buttons3 : "",
				theme_advanced_buttons4 : ""
			});
        
    });
	</script>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['firstCall']->value){?>
	<script type="text/javascript">
		var module_dir = '<?php echo @constant('_MODULE_DIR_');?>
';
		var id_language = <?php echo $_smarty_tpl->tpl_vars['defaultFormLanguage']->value;?>
;
		var languages = new Array();
		var vat_number = <?php if ($_smarty_tpl->tpl_vars['vat_number']->value){?>1<?php }else{ ?>0<?php }?>;
		// Multilang field setup must happen before document is ready so that calls to displayFlags() to avoid
		// precedence conflicts with other document.ready() blocks
		<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value){
$_smarty_tpl->tpl_vars['language']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['language']->key;
?>
			languages[<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
] = {
				id_lang: <?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
,
				iso_code: '<?php echo $_smarty_tpl->tpl_vars['language']->value['iso_code'];?>
',
				name: '<?php echo $_smarty_tpl->tpl_vars['language']->value['name'];?>
',
				is_default: '<?php echo $_smarty_tpl->tpl_vars['language']->value['is_default'];?>
'
			};
		<?php } ?>
		// we need allowEmployeeFormLang var in ajax request
		allowEmployeeFormLang = <?php echo $_smarty_tpl->tpl_vars['allowEmployeeFormLang']->value;?>
;
		displayFlags(languages, id_language, allowEmployeeFormLang);

		$(document).ready(function() {
			<?php if (isset($_smarty_tpl->tpl_vars['fields_value']->value['id_state'])){?>
				if ($('#id_country') && $('#id_state'))
				{
					ajaxStates(<?php echo $_smarty_tpl->tpl_vars['fields_value']->value['id_state'];?>
);
					$('#id_country').change(function() {
						ajaxStates();
					});
				}
			<?php }?>

			if ($(".datepicker").length > 0)
				$(".datepicker").datepicker({
					prevText: '',
					nextText: '',
					dateFormat: 'yy-mm-dd'
				});
			if ($(".datetimepicker").length > 0)
				$(".datetimepicker").datetimepicker({
				addSliderAccess: true, 
				timeFormat: 'HH:mm',
				dateFormat: 'yy-mm-dd',
				sliderAccessArgs: { touchonly: false }
				});
			if(news_contact)
				news_contact.onReady();
				});

	
	$(document).ready(function(){
		$('select[name=id_profile]').change(function(){
			ifSuperAdmin($(this));

			$.ajax({
				url: "<?php echo $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminEmployees');?>
",
				cache: false,
				data : {
					ajax : '1',
					action : 'getTabByIdProfile',
					id_profile : $(this).val()
				},
				dataType : 'json',
				success : function(resp,textStatus,jqXHR)
				{
					if (resp != false)
					{
						$('select[name=default_tab]').html('');
						$.each(resp, function(key, r){
							if (r.id_parent == 0)
							{
								$('select[name=default_tab]').append('<optgroup label="'+r.name+'"></optgroup>');
								$.each(r.children, function(k, value){
									$('select[name=default_tab]').append('<option value="'+r.id_tab+'">'+value.name+'</option>')
								});
							}
						});
					}
				}
			});
		});
		ifSuperAdmin($('select[name=id_profile]'));
	});

	function ifSuperAdmin(el)
	{
		var val = $(el).val();

		if (!val || val == <?php echo @constant('_PS_ADMIN_PROFILE_');?>
)
		{
			$('.assoShop input[type=checkbox]').attr('disabled', true);
			$('.assoShop input[type=checkbox]').attr('checked', true);
		}
		else
			$('.assoShop input[type=checkbox]').attr('disabled', false);
	}

	</script>
<?php }?>
<?php }} ?><?php /* Smarty version Smarty-3.1.13, created on 2014-10-24 20:42:17
         compiled from "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC9\data\localweb\prestashop-skeleton\back-office\themes\idt\template\helpers\form\form_profile.tpl" */ ?>
<?php if ($_valid && !is_callable('content_544a9d891dd597_26921601')) {function content_544a9d891dd597_26921601($_smarty_tpl) {?>

<?php if (count($_smarty_tpl->tpl_vars['initiatives']->value)&&isset($_smarty_tpl->tpl_vars['initiatives']->value)){?>
<div style="max-height:250px;width:60em;overflow:auto;margin-bottom:20px;">
<table cellspacing="0" cellpadding="0" class="table" style="width:100%;">
	<tr>
		<th>
			<input type="checkbox" name="checkme" id="checkme" class="noborder" onclick="checkDelBoxes(this.form, 'initiativeBox[]', this.checked)" />
		</th>
		<th><?php echo smartyTranslate(array('s'=>'ID'),$_smarty_tpl);?>
</th>
		<th>Profile name</th>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['initiative'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['initiative']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['initiatives']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['initiative']->key => $_smarty_tpl->tpl_vars['initiative']->value){
$_smarty_tpl->tpl_vars['initiative']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['initiative']->key;
?>
		<tr <?php if ($_smarty_tpl->tpl_vars['key']->value%2){?>class="alt_row"<?php }?>>
			<td>
				<?php $_smarty_tpl->tpl_vars['id_checkbox'] = new Smarty_variable((('initiativeBox').('_')).($_smarty_tpl->tpl_vars['initiative']->value['id_initiative']), null, 0);?>
				<input type="checkbox" name="initiativeBox[]" class="initiativeBox" id="<?php echo $_smarty_tpl->tpl_vars['id_checkbox']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['initiative']->value['id_initiative'];?>
" <?php if ($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['id_checkbox']->value]){?>checked="checked"<?php }?> />
			</td>
			<td><?php echo $_smarty_tpl->tpl_vars['initiative']->value['id_initiative'];?>
</td>
			<td><label for="<?php echo $_smarty_tpl->tpl_vars['id_checkbox']->value;?>
" class="t"><?php echo $_smarty_tpl->tpl_vars['initiative']->value['name'];?>
</label></td>
		</tr>
	<?php } ?>
</table>
</div>
<?php }else{ ?>
<p><?php echo smartyTranslate(array('s'=>'No profile created'),$_smarty_tpl);?>
</p>
<?php }?>

<?php }} ?><?php /* Smarty version Smarty-3.1.13, created on 2014-10-24 20:42:17
         compiled from "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC9\data\localweb\prestashop-skeleton\back-office\themes\idt\template\helpers\form\form_funding_agency.tpl" */ ?>
<?php if ($_valid && !is_callable('content_544a9d8945df96_95561387')) {function content_544a9d8945df96_95561387($_smarty_tpl) {?>

<?php if (count($_smarty_tpl->tpl_vars['funding_agencies']->value)&&isset($_smarty_tpl->tpl_vars['funding_agencies']->value)){?>
<div class="tableContainer">
<table cellspacing="0" cellpadding="0" class="table" style="width:100%;">
<thead class="TableFixedHeader">
	<tr>
		<th>
			<input type="checkbox" name="checkme" id="checkme" class="noborder" onclick="checkDelBoxes(this.form, 'fundingAgencyBox[]', this.checked)" />
		</th>
		<th><?php echo smartyTranslate(array('s'=>'ID'),$_smarty_tpl);?>
</th>
		<th><?php echo smartyTranslate(array('s'=>'Funding Agency name'),$_smarty_tpl);?>
</th>
	</tr>
	</thead>
	<tbody class="TableScrollContent">
	<?php  $_smarty_tpl->tpl_vars['funding_agency'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['funding_agency']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['funding_agencies']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['funding_agency']->key => $_smarty_tpl->tpl_vars['funding_agency']->value){
$_smarty_tpl->tpl_vars['funding_agency']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['funding_agency']->key;
?>
		<tr <?php if ($_smarty_tpl->tpl_vars['key']->value%2){?>class="alt_row"<?php }?>>
			<td>
				<?php $_smarty_tpl->tpl_vars['id_checkbox'] = new Smarty_variable((('fundingAgencyBox').('_')).($_smarty_tpl->tpl_vars['funding_agency']->value['id_funding_agency']), null, 0);?>
				<input type="checkbox" name="fundingAgencyBox[]" class="fundingAgencyBox" id="<?php echo $_smarty_tpl->tpl_vars['id_checkbox']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['funding_agency']->value['id_funding_agency'];?>
" <?php if ($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['id_checkbox']->value]){?>checked="checked"<?php }?> />
			</td>
			<td><?php echo $_smarty_tpl->tpl_vars['funding_agency']->value['id_funding_agency'];?>
</td>
			<td><label for="<?php echo $_smarty_tpl->tpl_vars['id_checkbox']->value;?>
" class="t"><?php echo $_smarty_tpl->tpl_vars['funding_agency']->value['name'];?>
</label></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
</div>
<?php }else{ ?>
<p><?php echo smartyTranslate(array('s'=>'No funding agencies created'),$_smarty_tpl);?>
</p>
<?php }?><?php }} ?><?php /* Smarty version Smarty-3.1.13, created on 2014-10-24 20:42:17
         compiled from "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC9\data\localweb\prestashop-skeleton\back-office\themes\idt\template\helpers\form\form_project.tpl" */ ?>
<?php if ($_valid && !is_callable('content_544a9d8959a618_02600281')) {function content_544a9d8959a618_02600281($_smarty_tpl) {?>

<?php if (count($_smarty_tpl->tpl_vars['projects']->value)&&isset($_smarty_tpl->tpl_vars['projects']->value)){?>

<script type="text/javascript">
        function doSearch() {
    		var searchText = new Array();
            searchText['id']= document.getElementById('searchID').value.toLowerCase();
            searchText['name']= document.getElementById('searchName').value.toLowerCase();
            searchText['type']=  document.getElementById('searchType').value.toLowerCase();
    		var targetTable = document.getElementById('dataTable');
    		//var targetTableColCount;

    		//Loop through table rows
    		for (var rowIndex = 2; rowIndex < targetTable.rows.length; rowIndex++) {
    			var rowData = new Array();

                if (navigator.appName == 'Microsoft Internet Explorer'){
    					rowData['id'] = targetTable.rows.item(rowIndex).cells.item(1).innerText.toLowerCase();
                		rowData['name'] = targetTable.rows.item(rowIndex).cells.item(2).innerText.toLowerCase();
                		rowData['type'] = targetTable.rows.item(rowIndex).cells.item(3).innerText.toLowerCase();
                
                }else
                {
    					rowData['id'] = targetTable.rows.item(rowIndex).cells.item(1).textContent.toLowerCase();    
    					rowData['name'] = targetTable.rows.item(rowIndex).cells.item(2).textContent.toLowerCase();    
    					rowData['type'] = targetTable.rows.item(rowIndex).cells.item(3).textContent.toLowerCase();    
                    
                }
    			if (rowData['id'].indexOf(searchText['id']) == -1 || rowData['name'].indexOf(searchText['name']) == -1 || rowData['type'].indexOf(searchText['type']) == -1)
    				targetTable.rows.item(rowIndex).style.display = 'none';
    			else
    				targetTable.rows.item(rowIndex).style.display = 'table-row';
    		}
    	}
    </script>

<div  class="tableContainerFixed">
<table cellspacing="0" cellpadding="0" class="table" style="width:100%;" id="dataTable">
<thead class="TableFixedHeader">
	<tr>
		<th>
			<input type="checkbox" name="checkme" id="checkme" class="noborder" onclick="checkDelBoxes(this.form, 'projectBox[]', this.checked)" />
		</th>
		<th><?php echo smartyTranslate(array('s'=>'ID'),$_smarty_tpl);?>
</th>
		<th><?php echo smartyTranslate(array('s'=>'Project name'),$_smarty_tpl);?>
</th>
		<th><?php echo smartyTranslate(array('s'=>'Project type'),$_smarty_tpl);?>
</th>
	</tr>
    <tr>
    <th></th>
    <th><input type="text" id="searchID" onkeyup="doSearch()" style="width:15px"/></th>
    <th><input type="text" id="searchName"  onkeyup="doSearch()" /></th>
    <th><input type="text" id="searchType" onkeyup="doSearch()" /></th>
    </tr>
	</thead>
	<tbody class="TableScrollContent">
	<?php  $_smarty_tpl->tpl_vars['project'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['project']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['projects']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['project']->key => $_smarty_tpl->tpl_vars['project']->value){
$_smarty_tpl->tpl_vars['project']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['project']->key;
?>
		<tr <?php if ($_smarty_tpl->tpl_vars['key']->value%2){?>class="alt_row"<?php }?>>
			<td>
				<?php $_smarty_tpl->tpl_vars['id_checkbox'] = new Smarty_variable((('projectBox').('_')).($_smarty_tpl->tpl_vars['project']->value['id_project']), null, 0);?>
				<input type="checkbox" name="projectBox[]" class="projectBox" id="<?php echo $_smarty_tpl->tpl_vars['id_checkbox']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['project']->value['id_project'];?>
" <?php if ($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['id_checkbox']->value]){?>checked="checked"<?php }?> />
			</td>
			<td><?php echo $_smarty_tpl->tpl_vars['project']->value['id_project'];?>
</td>
			<td><label for="<?php echo $_smarty_tpl->tpl_vars['id_checkbox']->value;?>
" class="t"><?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
</label></td>
			<td><label for="<?php echo $_smarty_tpl->tpl_vars['id_checkbox']->value;?>
" class="t"><?php echo $_smarty_tpl->tpl_vars['project']->value['type'];?>
</label></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
</div>
<?php }else{ ?>
<p><?php echo smartyTranslate(array('s'=>'No projects created'),$_smarty_tpl);?>
</p>
<?php }?><?php }} ?><?php /* Smarty version Smarty-3.1.13, created on 2014-10-24 20:42:17
         compiled from "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC9\data\localweb\prestashop-skeleton\back-office\themes\idt\template\helpers\form\form_project_leaders.tpl" */ ?>
<?php if ($_valid && !is_callable('content_544a9d899ad596_99212609')) {function content_544a9d899ad596_99212609($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC9\\data\\localweb\\prestashop-skeleton\\tools\\smarty\\plugins\\modifier.escape.php';
?><table>
	<tr>
		<td style="padding-bottom:5px;">
			<input type="hidden" name="inputLeaders" id="inputLeaders" value="<?php  $_smarty_tpl->tpl_vars['person'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['person']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['leaders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['person']->key => $_smarty_tpl->tpl_vars['person']->value){
$_smarty_tpl->tpl_vars['person']->_loop = true;
?><?php echo $_smarty_tpl->tpl_vars['person']->value['id_customer'];?>
-<?php } ?>" />
			<input type="hidden" id="id_project" value="<?php echo $_smarty_tpl->tpl_vars['id_project']->value;?>
" />
			<input type="hidden" name="nameLeaders" id="nameLeaders" value="<?php  $_smarty_tpl->tpl_vars['person'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['person']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['leaders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['person']->key => $_smarty_tpl->tpl_vars['person']->value){
$_smarty_tpl->tpl_vars['person']->_loop = true;
?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['person']->value['firstname'], 'htmlall', 'UTF-8');?>
 <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['person']->value['lastname'], 'htmlall', 'UTF-8');?>
¤<?php } ?>" />
			<input type="hidden" name="leaderIdsFromDb" id="leaderIdsFromDb" value="<?php  $_smarty_tpl->tpl_vars['person'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['person']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['leaders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['person']->key => $_smarty_tpl->tpl_vars['person']->value){
$_smarty_tpl->tpl_vars['person']->_loop = true;
?><?php echo $_smarty_tpl->tpl_vars['person']->value['id_customer'];?>
-<?php } ?>" />
			<input type="hidden" name="leaderNamesFromDb" id="leaderNamesFromDb" value="<?php  $_smarty_tpl->tpl_vars['person'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['person']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['leaders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['person']->key => $_smarty_tpl->tpl_vars['person']->value){
$_smarty_tpl->tpl_vars['person']->_loop = true;
?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['person']->value['firstname'], 'htmlall', 'UTF-8');?>
 <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['person']->value['lastname'], 'htmlall', 'UTF-8');?>
¤<?php } ?>" />
			
			<div id="ajax_choose_customer">
				<p style="clear:both;margin-top:0;">
					<input type="text" value="" id="leader_autocomplete_input" />
					<?php echo smartyTranslate(array('s'=>'Begin typing the first letters of the leaders name, then select the person from the drop-down list'),$_smarty_tpl);?>

				</p>
				<p class="preference_description"><?php echo smartyTranslate(array('s'=>'(Do not forget to save afterwards)'),$_smarty_tpl);?>
</p>
			</div>
			<div id="divLeaders">
				<?php  $_smarty_tpl->tpl_vars['person'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['person']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['leaders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['person']->key => $_smarty_tpl->tpl_vars['person']->value){
$_smarty_tpl->tpl_vars['person']->_loop = true;
?>
					<span class="leader"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['person']->value['firstname'], 'htmlall', 'UTF-8');?>
 <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['person']->value['lastname'], 'htmlall', 'UTF-8');?>

						<span class="delLeader" name="<?php echo $_smarty_tpl->tpl_vars['person']->value['id_customer'];?>
" style="cursor: pointer;">
							<img src="../img/admin/delete.gif" class="middle" alt="" />
						</span>
					</span>
					<br />
				<?php } ?>
			</div>
		</td>
	</tr>
</table>
			
			<?php }} ?><?php /* Smarty version Smarty-3.1.13, created on 2014-10-24 20:42:17
         compiled from "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC9\data\localweb\prestashop-skeleton\back-office\themes\idt\template\helpers\form\form_project_members.tpl" */ ?>
<?php if ($_valid && !is_callable('content_544a9d89b9d713_22659340')) {function content_544a9d89b9d713_22659340($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC9\\data\\localweb\\prestashop-skeleton\\tools\\smarty\\plugins\\modifier.escape.php';
?><table>
	<tr>
		<td style="padding-bottom:5px;">
			<input type="hidden" name="inputMembers" id="inputMembers" value="<?php  $_smarty_tpl->tpl_vars['person'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['person']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['members']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['person']->key => $_smarty_tpl->tpl_vars['person']->value){
$_smarty_tpl->tpl_vars['person']->_loop = true;
?><?php echo $_smarty_tpl->tpl_vars['person']->value['id_customer'];?>
-<?php } ?>" />
			<input type="hidden" id="id_project" value="<?php echo $_smarty_tpl->tpl_vars['id_project']->value;?>
" />
			<input type="hidden" name="nameMembers" id="nameMembers" value="<?php  $_smarty_tpl->tpl_vars['person'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['person']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['members']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['person']->key => $_smarty_tpl->tpl_vars['person']->value){
$_smarty_tpl->tpl_vars['person']->_loop = true;
?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['person']->value['firstname'], 'htmlall', 'UTF-8');?>
 <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['person']->value['lastname'], 'htmlall', 'UTF-8');?>
¤<?php } ?>" />
			<input type="hidden" name="memberIdsFromDb" id="memberIdsFromDb" value="<?php  $_smarty_tpl->tpl_vars['person'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['person']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['members']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['person']->key => $_smarty_tpl->tpl_vars['person']->value){
$_smarty_tpl->tpl_vars['person']->_loop = true;
?><?php echo $_smarty_tpl->tpl_vars['person']->value['id_customer'];?>
-<?php } ?>" />
			<input type="hidden" name="memberNamesFromDb" id="memberNamesFromDb" value="<?php  $_smarty_tpl->tpl_vars['person'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['person']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['members']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['person']->key => $_smarty_tpl->tpl_vars['person']->value){
$_smarty_tpl->tpl_vars['person']->_loop = true;
?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['person']->value['firstname'], 'htmlall', 'UTF-8');?>
 <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['person']->value['lastname'], 'htmlall', 'UTF-8');?>
¤<?php } ?>" />
			
			<div id="ajax_choose_customer">
				<p style="clear:both;margin-top:0;">
					<input type="text" value="" id="member_autocomplete_input" />
					<?php echo smartyTranslate(array('s'=>'Begin typing the first letters of the members name, then select the person from the drop-down list'),$_smarty_tpl);?>

				</p>
				<p class="preference_description"><?php echo smartyTranslate(array('s'=>'(Do not forget to save afterwards)'),$_smarty_tpl);?>
</p>
			</div>
			<div id="divMembers">
				<?php  $_smarty_tpl->tpl_vars['person'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['person']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['members']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['person']->key => $_smarty_tpl->tpl_vars['person']->value){
$_smarty_tpl->tpl_vars['person']->_loop = true;
?>
					<span class="member"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['person']->value['firstname'], 'htmlall', 'UTF-8');?>
 <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['person']->value['lastname'], 'htmlall', 'UTF-8');?>

						<span class="delMember" name="<?php echo $_smarty_tpl->tpl_vars['person']->value['id_customer'];?>
" style="cursor: pointer;">
							<img src="../img/admin/delete.gif" class="middle" alt="" />
						</span>
					</span>
					<br />
				<?php } ?>
			</div>
		</td>
	</tr>
</table>
			
			<?php }} ?><?php /* Smarty version Smarty-3.1.13, created on 2014-10-24 20:42:17
         compiled from "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC9\data\localweb\prestashop-skeleton\back-office\themes\idt\template\helpers\form\form_project_associated.tpl" */ ?>
<?php if ($_valid && !is_callable('content_544a9d89d81d12_91064608')) {function content_544a9d89d81d12_91064608($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC9\\data\\localweb\\prestashop-skeleton\\tools\\smarty\\plugins\\modifier.escape.php';
?><table>
	<tr>
		<td style="padding-bottom:5px;">
			<input type="hidden" name="inputAssociated" id="inputAssociated" value="<?php  $_smarty_tpl->tpl_vars['person'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['person']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['associated']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['person']->key => $_smarty_tpl->tpl_vars['person']->value){
$_smarty_tpl->tpl_vars['person']->_loop = true;
?><?php echo $_smarty_tpl->tpl_vars['person']->value['id_customer'];?>
-<?php } ?>" />
			<input type="hidden" id="id_project" value="<?php echo $_smarty_tpl->tpl_vars['id_project']->value;?>
" />
			<input type="hidden" name="nameAssociated" id="nameAssociated" value="<?php  $_smarty_tpl->tpl_vars['person'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['person']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['associated']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['person']->key => $_smarty_tpl->tpl_vars['person']->value){
$_smarty_tpl->tpl_vars['person']->_loop = true;
?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['person']->value['firstname'], 'htmlall', 'UTF-8');?>
 <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['person']->value['lastname'], 'htmlall', 'UTF-8');?>
¤<?php } ?>" />
			<input type="hidden" name="associatedIdsFromDb" id="associatedIdsFromDb" value="<?php  $_smarty_tpl->tpl_vars['person'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['person']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['associated']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['person']->key => $_smarty_tpl->tpl_vars['person']->value){
$_smarty_tpl->tpl_vars['person']->_loop = true;
?><?php echo $_smarty_tpl->tpl_vars['person']->value['id_customer'];?>
-<?php } ?>" />
			<input type="hidden" name="associatedNamesFromDb" id="associatedNamesFromDb" value="<?php  $_smarty_tpl->tpl_vars['person'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['person']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['associated']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['person']->key => $_smarty_tpl->tpl_vars['person']->value){
$_smarty_tpl->tpl_vars['person']->_loop = true;
?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['person']->value['firstname'], 'htmlall', 'UTF-8');?>
 <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['person']->value['lastname'], 'htmlall', 'UTF-8');?>
¤<?php } ?>" />
			
			<div id="ajax_choose_customer">
				<p style="clear:both;margin-top:0;">
					<input type="text" value="" id="associated_autocomplete_input" />
					<?php echo smartyTranslate(array('s'=>'Begin typing the first letters of the associated persons name, then select the person from the drop-down list'),$_smarty_tpl);?>

				</p>
				<p class="preference_description"><?php echo smartyTranslate(array('s'=>'(Do not forget to save afterwards)'),$_smarty_tpl);?>
</p>
			</div>
			<div id="divAssociated">
				<?php  $_smarty_tpl->tpl_vars['person'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['person']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['associated']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['person']->key => $_smarty_tpl->tpl_vars['person']->value){
$_smarty_tpl->tpl_vars['person']->_loop = true;
?>
					<span class="associated"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['person']->value['firstname'], 'htmlall', 'UTF-8');?>
 <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['person']->value['lastname'], 'htmlall', 'UTF-8');?>

						<span class="delAssociated" name="<?php echo $_smarty_tpl->tpl_vars['person']->value['id_customer'];?>
" style="cursor: pointer;">
							<img src="../img/admin/delete.gif" class="middle" alt="" />
						</span>
					</span>
					<br />
				<?php } ?>
			</div>
		</td>
	</tr>
</table>
			
			<?php }} ?><?php /* Smarty version Smarty-3.1.13, created on 2014-10-24 20:42:18
         compiled from "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC9\data\localweb\prestashop-skeleton\back-office\themes\idt\template\helpers\form\form_category.tpl" */ ?>
<?php if ($_valid && !is_callable('content_544a9d8a1b2615_59481829')) {function content_544a9d8a1b2615_59481829($_smarty_tpl) {?><?php if (!is_callable('smarty_function_implode')) include 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC9\\data\\localweb\\prestashop-skeleton\\tools\\smarty\\plugins\\function.implode.php';
?>
<?php if (count($_smarty_tpl->tpl_vars['categories']->value)&&isset($_smarty_tpl->tpl_vars['categories']->value)){?>
	<script type="text/javascript">
		var inputName = '<?php echo $_smarty_tpl->tpl_vars['categories']->value['input_name'];?>
';
		var use_radio = <?php if ($_smarty_tpl->tpl_vars['categories']->value['use_radio']){?>1<?php }else{ ?>0<?php }?>;
		var selectedCat = '<?php echo smarty_function_implode(array('value'=>$_smarty_tpl->tpl_vars['categories']->value['selected_cat']),$_smarty_tpl);?>
';
		var selectedLabel = '<?php echo $_smarty_tpl->tpl_vars['categories']->value['trads']['selected'];?>
';
		var home = '<?php echo $_smarty_tpl->tpl_vars['categories']->value['trads']['Root']['name'];?>
';
		var use_radio = <?php if ($_smarty_tpl->tpl_vars['categories']->value['use_radio']){?>1<?php }else{ ?>0<?php }?>;
		var use_context = <?php if (isset($_smarty_tpl->tpl_vars['categories']->value['use_context'])){?>1<?php }else{ ?>0<?php }?>;
		$(document).ready(function(){
			buildTreeView(use_context);
		});
	</script>

	<div class="category-filter">
		<span><a href="#" id="collapse_all" ><?php echo $_smarty_tpl->tpl_vars['categories']->value['trads']['Collapse All'];?>
</a>
		 |</span>
		 <span><a href="#" id="expand_all" ><?php echo $_smarty_tpl->tpl_vars['categories']->value['trads']['Expand All'];?>
</a>
		<?php if (!$_smarty_tpl->tpl_vars['categories']->value['use_radio']){?>
		 |</span>
		 <span></span><a href="#" id="check_all" ><?php echo $_smarty_tpl->tpl_vars['categories']->value['trads']['Check All'];?>
</a>
		 |</span>
		 <span></span><a href="#" id="uncheck_all" ><?php echo $_smarty_tpl->tpl_vars['categories']->value['trads']['Uncheck All'];?>
</a></span>
		 <?php }?>
		<?php if ($_smarty_tpl->tpl_vars['categories']->value['use_search']){?>
			<span style="margin-left:20px">
				<?php echo $_smarty_tpl->tpl_vars['categories']->value['trads']['search'];?>
 :
				<form method="post" id="filternameForm">
					<input type="text" name="search_cat" id="search_cat">
				</form>
			</span>
		<?php }?>
	</div>

	<?php $_smarty_tpl->tpl_vars['home_is_selected'] = new Smarty_variable(false, null, 0);?>

	<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value['selected_cat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value){
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
		<?php if (is_array($_smarty_tpl->tpl_vars['cat']->value)){?>
			<?php if ($_smarty_tpl->tpl_vars['cat']->value['id_category']!=$_smarty_tpl->tpl_vars['categories']->value['trads']['Root']['id_category']){?>
				<input <?php if (in_array($_smarty_tpl->tpl_vars['cat']->value['id_category'],$_smarty_tpl->tpl_vars['categories']->value['disabled_categories'])){?>disabled="disabled"<?php }?> type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['categories']->value['input_name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['id_category'];?>
" >
			<?php }else{ ?>
				<?php $_smarty_tpl->tpl_vars['home_is_selected'] = new Smarty_variable(true, null, 0);?>
			<?php }?>
		<?php }else{ ?>
			<?php if ($_smarty_tpl->tpl_vars['cat']->value!=$_smarty_tpl->tpl_vars['categories']->value['trads']['Root']['id_category']){?>
				<input <?php if (in_array($_smarty_tpl->tpl_vars['cat']->value,$_smarty_tpl->tpl_vars['categories']->value['disabled_categories'])){?>disabled="disabled"<?php }?> type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['categories']->value['input_name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['cat']->value;?>
" >
			<?php }else{ ?>
				<?php $_smarty_tpl->tpl_vars['home_is_selected'] = new Smarty_variable(true, null, 0);?>
			<?php }?>
		<?php }?>
	<?php } ?>
	<ul id="categories-treeview" class="filetree">
		<li id="<?php echo $_smarty_tpl->tpl_vars['categories']->value['trads']['Root']['id_category'];?>
" class="hasChildren">
			<span class="folder">
				<?php if ($_smarty_tpl->tpl_vars['categories']->value['top_category']->id!=$_smarty_tpl->tpl_vars['categories']->value['trads']['Root']['id_category']){?>
					<input type="<?php if (!$_smarty_tpl->tpl_vars['categories']->value['use_radio']){?>checkbox<?php }else{ ?>radio<?php }?>"
							name="<?php echo $_smarty_tpl->tpl_vars['categories']->value['input_name'];?>
"
							value="<?php echo $_smarty_tpl->tpl_vars['categories']->value['trads']['Root']['id_category'];?>
"
							<?php if ($_smarty_tpl->tpl_vars['home_is_selected']->value){?>checked<?php }?>
							onclick="clickOnCategoryBox($(this));" />
						<span class="category_label"><?php echo $_smarty_tpl->tpl_vars['categories']->value['trads']['Root']['name'];?>
</span>
				<?php }else{ ?>
					&nbsp;
				<?php }?>
			</span>
			<ul>
				<li><span class="placeholder">&nbsp;</span></li>
		  	</ul>
		</li>
	</ul>
	<?php if ($_smarty_tpl->tpl_vars['categories']->value['use_radio']){?>
	<script type="text/javascript">
		searchCategory();
	</script>
	<?php }?>
<?php }?>
<?php }} ?>