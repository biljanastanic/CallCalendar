<?php /* Smarty version Smarty-3.1.8, created on 2012-09-26 11:31:41
         compiled from "/www/htdocs/mrtc/testIDT/modules/blockadvertising/blockadvertising.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10137923665062cb7d13e114-12496934%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '207a0484d954b7edf07afea4960a0e1ec8f3f23c' => 
    array (
      0 => '/www/htdocs/mrtc/testIDT/modules/blockadvertising/blockadvertising.tpl',
      1 => 1348647596,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10137923665062cb7d13e114-12496934',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'adv_link' => 0,
    'adv_title' => 0,
    'image' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5062cb7d166264_47467413',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5062cb7d166264_47467413')) {function content_5062cb7d166264_47467413($_smarty_tpl) {?>

<!-- MODULE Block advertising -->
<div class="advertising_block">
	<a href="<?php echo $_smarty_tpl->tpl_vars['adv_link']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['adv_title']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['adv_title']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['adv_title']->value;?>
" width="155"  height="163" /></a>
</div>
<!-- /MODULE Block advertising -->
<?php }} ?>