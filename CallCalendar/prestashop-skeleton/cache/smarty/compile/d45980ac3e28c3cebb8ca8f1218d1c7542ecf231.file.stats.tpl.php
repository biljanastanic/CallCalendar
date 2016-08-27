<?php /* Smarty version Smarty-3.1.8, created on 2013-01-22 09:44:59
         compiled from "/www/htdocs/mrtc/testIDT/adm/themes/default/template/controllers/stats/stats.tpl" */ ?>
<?php /*%%SmartyHeaderCode:105343718450fe518b1ede59-29438484%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd45980ac3e28c3cebb8ca8f1218d1c7542ecf231' => 
    array (
      0 => '/www/htdocs/mrtc/testIDT/adm/themes/default/template/controllers/stats/stats.tpl',
      1 => 1348647539,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '105343718450fe518b1ede59-29438484',
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
  'unifunc' => 'content_50fe518b23bb61_98548794',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50fe518b23bb61_98548794')) {function content_50fe518b23bb61_98548794($_smarty_tpl) {?>

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