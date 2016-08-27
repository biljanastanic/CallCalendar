<?php /* Smarty version Smarty-3.1.8, created on 2013-06-10 10:27:56
         compiled from "/www/htdocs/es/modules/editorial/editorial.tpl" */ ?>
<?php /*%%SmartyHeaderCode:51573905251b58e0ce1c2f1-21311531%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e1ce2ecfddca26d4c867f6d620e0a45f7f6ee46' => 
    array (
      0 => '/www/htdocs/es/modules/editorial/editorial.tpl',
      1 => 1367584693,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '51573905251b58e0ce1c2f1-21311531',
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
  'unifunc' => 'content_51b58e0ce670d0_83364170',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51b58e0ce670d0_83364170')) {function content_51b58e0ce670d0_83364170($_smarty_tpl) {?>

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