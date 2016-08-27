<?php /* Smarty version Smarty-3.1.8, created on 2013-05-03 20:04:52
         compiled from "/www/htdocs/mrtc/testIDT/themes/ipr/mobile/authentication-choice.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16133866995183fc44344750-08964599%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cbdd1a149339619eaf0dee2d5e744f99bc1a5d8e' => 
    array (
      0 => '/www/htdocs/mrtc/testIDT/themes/ipr/mobile/authentication-choice.tpl',
      1 => 1348647628,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16133866995183fc44344750-08964599',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'back' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5183fc4446ed63_43106929',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5183fc4446ed63_43106929')) {function content_5183fc4446ed63_43106929($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/www/htdocs/mrtc/testIDT/tools/smarty/plugins/modifier.escape.php';
?><div data-role="content" id="content">
	
	<form action="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('authentication',true);?>
" method="post" id="create-account_form" class="std login_form">
		<h2><?php echo smartyTranslate(array('s'=>'Create your account'),$_smarty_tpl);?>
</h2>
		<div class="form_content clearfix">
			<h4><?php echo smartyTranslate(array('s'=>'Enter your e-mail address to create an account'),$_smarty_tpl);?>
.</h4>
			<fieldset>
				<span><input type="email" id="email_create" placeholder="<?php echo smartyTranslate(array('s'=>'E-mail address'),$_smarty_tpl);?>
" name="email_create" value="<?php if (isset($_POST['email_create'])){?><?php echo stripslashes(smarty_modifier_escape($_POST['email_create'], 'htmlall', 'UTF-8'));?>
<?php }?>" class="account_input" /></span>
			</fieldset>
			<?php if (isset($_smarty_tpl->tpl_vars['back']->value)){?><input type="hidden" class="hidden" name="back" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['back']->value, 'htmlall', 'UTF-8');?>
" /><?php }?>
			<button type="submit" id="SubmitCreate" name="SubmitCreate" class="ui-btn-hidden submit_button" aria-disabled="false" data-theme="a"><?php echo smartyTranslate(array('s'=>'Create your account'),$_smarty_tpl);?>
</button>
			<input type="hidden" class="hidden" name="SubmitCreate" value="<?php echo smartyTranslate(array('s'=>'Create your account'),$_smarty_tpl);?>
" />
		</div>
	</form>

	<hr width="99%" align="center" size="2" class=""/>

	<form action="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('authentication',true);?>
" method="post" class="login_form">
		<h2><?php echo smartyTranslate(array('s'=>'Already registered ?'),$_smarty_tpl);?>
</h2>
		<fieldset>
			<input type="email" id="email" name="email" placeholder="<?php echo smartyTranslate(array('s'=>'E-mail address'),$_smarty_tpl);?>
" value="<?php if (isset($_POST['email'])){?><?php echo stripslashes(smarty_modifier_escape($_POST['email'], 'htmlall', 'UTF-8'));?>
<?php }?>" class="account_input" />
		</fieldset>
		
		<fieldset>
			<input type="password" id="passwd" name="passwd" placeholder="<?php echo smartyTranslate(array('s'=>'Password'),$_smarty_tpl);?>
" value="<?php if (isset($_POST['passwd'])){?><?php echo stripslashes(smarty_modifier_escape($_POST['passwd'], 'htmlall', 'UTF-8'));?>
<?php }?>" class="account_input" />
			<p class="forget_pwd"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('password');?>
" data-ajax="false"><?php echo smartyTranslate(array('s'=>'Forgot your password?'),$_smarty_tpl);?>
</a></p>
		</fieldset>
		<button type="submit" class="ui-btn-hidden submit_button" id="SubmitLogin" name="SubmitLogin" aria-disabled="false" data-theme="a"><?php echo smartyTranslate(array('s'=>'Log in'),$_smarty_tpl);?>
</button>
	</form> 
</div><!-- /content -->



<?php }} ?>