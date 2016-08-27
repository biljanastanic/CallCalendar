<?php /* Smarty version Smarty-3.1.8, created on 2013-05-28 13:55:51
         compiled from "/www/htdocs/mrtc/testIDT/modules/editorial/editorial.tpl" */ ?>
<?php /*%%SmartyHeaderCode:84979562851a49b473d5350-57840212%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ddc07ccb439610a410e631408088f5327d62ff77' => 
    array (
      0 => '/www/htdocs/mrtc/testIDT/modules/editorial/editorial.tpl',
      1 => 1367584693,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84979562851a49b473d5350-57840212',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'image_path' => 0,
    'editorial' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51a49b47464115_42319594',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a49b47464115_42319594')) {function content_51a49b47464115_42319594($_smarty_tpl) {?>

<!-- Module Editorial -->
<div id="editorial_block_center" class="editorial_block">
	<img class="home-img" src="<?php echo $_smarty_tpl->tpl_vars['image_path']->value;?>
" />
	<?php if ($_smarty_tpl->tpl_vars['editorial']->value->body_paragraph){?><div class="rte"><?php echo stripslashes($_smarty_tpl->tpl_vars['editorial']->value->body_paragraph);?>
</div>
	<?php }elseif($_smarty_tpl->tpl_vars['editorial']->value->body_paragraph){?><div class="rte"><?php echo stripslashes($_smarty_tpl->tpl_vars['editorial']->value->body_paragraph);?>
</div><?php }?>
</div>
<!-- /Module Editorial -->
<?php }} ?>