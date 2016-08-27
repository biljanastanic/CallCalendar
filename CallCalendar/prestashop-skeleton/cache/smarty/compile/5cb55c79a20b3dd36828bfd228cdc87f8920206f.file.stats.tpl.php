<?php /* Smarty version Smarty-3.1.8, created on 2013-05-06 11:39:43
         compiled from "/www/htdocs/mrtc/testIDT/adm/themes/idt-user/template/controllers/stats/stats.tpl" */ ?>
<?php /*%%SmartyHeaderCode:45086282951877a5f6174e6-51884516%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5cb55c79a20b3dd36828bfd228cdc87f8920206f' => 
    array (
      0 => '/www/htdocs/mrtc/testIDT/adm/themes/idt-user/template/controllers/stats/stats.tpl',
      1 => 1348647539,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '45086282951877a5f6174e6-51884516',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module_name' => 0,
    'module_instance' => 0,
    'hook' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51877a5f6652c9_66481272',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51877a5f6652c9_66481272')) {function content_51877a5f6652c9_66481272($_smarty_tpl) {?>

<div>
	<?php if ($_smarty_tpl->tpl_vars['module_name']->value){?>
		<?php if ($_smarty_tpl->tpl_vars['module_instance']->value&&$_smarty_tpl->tpl_vars['module_instance']->value->active){?>
			<?php echo $_smarty_tpl->tpl_vars['hook']->value;?>

		<?php }else{ ?>
			<?php echo smartyTranslate(array('s'=>'Module not found'),$_smarty_tpl);?>

		<?php }?>
	<?php }else{ ?>
		<h3 class="space"><?php echo smartyTranslate(array('s'=>'Please select a module in the left column.'),$_smarty_tpl);?>
</h3>
	<?php }?>
</div>
</div>
</div>


<?php }} ?>