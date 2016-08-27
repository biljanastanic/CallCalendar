<?php /* Smarty version Smarty-3.1.8, created on 2012-09-26 11:31:40
         compiled from "/www/htdocs/mrtc/testIDT/modules/feeder/feederHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13369316845062cb7c112969-53497229%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f08647a632971c6afa2e604c948dd1dbac7c8288' => 
    array (
      0 => '/www/htdocs/mrtc/testIDT/modules/feeder/feederHeader.tpl',
      1 => 1348647606,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13369316845062cb7c112969-53497229',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'meta_title' => 0,
    'feedUrl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5062cb7c13ff38_72826656',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5062cb7c13ff38_72826656')) {function content_5062cb7c13ff38_72826656($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/www/htdocs/mrtc/testIDT/tools/smarty/plugins/modifier.escape.php';
?>

<link rel="alternate" type="application/rss+xml" title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_title']->value, 'html', 'UTF-8');?>
" href="<?php echo $_smarty_tpl->tpl_vars['feedUrl']->value;?>
" /><?php }} ?>