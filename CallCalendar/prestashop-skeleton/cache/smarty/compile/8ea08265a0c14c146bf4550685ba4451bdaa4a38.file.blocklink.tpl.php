<?php /* Smarty version Smarty-3.1.13, created on 2014-11-30 18:04:54
         compiled from "C:\xampp\htdocs\CallCalendar\prestashop-skeleton\modules\blocklink\blocklink.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16832547b4e364997f1-61415935%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8ea08265a0c14c146bf4550685ba4451bdaa4a38' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CallCalendar\\prestashop-skeleton\\modules\\blocklink\\blocklink.tpl',
      1 => 1417109250,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16832547b4e364997f1-61415935',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base_url' => 0,
    'blocklink_links' => 0,
    'lang' => 0,
    'blocklink_link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_547b4e36506e02_00697307',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547b4e36506e02_00697307')) {function content_547b4e36506e02_00697307($_smarty_tpl) {?>

<!-- Block links module -->
<div id="links_block_left" class="block">
	<ul class="block_content bullet">
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">Home</a></li>
	<?php  $_smarty_tpl->tpl_vars['blocklink_link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['blocklink_link']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['blocklink_links']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['blocklink_link']->key => $_smarty_tpl->tpl_vars['blocklink_link']->value){
$_smarty_tpl->tpl_vars['blocklink_link']->_loop = true;
?>
		<?php if (isset($_smarty_tpl->tpl_vars['blocklink_link']->value[$_smarty_tpl->tpl_vars['lang']->value])){?> 
			<li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blocklink_link']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
"<?php if ($_smarty_tpl->tpl_vars['blocklink_link']->value['newWindow']){?> onclick="window.open(this.href);return false;"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blocklink_link']->value[$_smarty_tpl->tpl_vars['lang']->value], ENT_QUOTES, 'UTF-8', true);?>
</a></li>
		<?php }?>
	<?php } ?>
	</ul>
</div>
<div id="extraNavigation">
	<ul>
		<li>
			<span class="block link">
				<a class="standardLink" href="http://www.mdh.se/">MDH Home</a>
			</span>
		</li>
		<li>
			<span class="block link">
				<a class="standardLink" href="http://www.mdh.se/idt">IDT Home</a>
			</span>
		</li>
		<li>
			<span class="block link">
				<a class="standardLink" href="http://www.mdh.se/idt/utbildning">IDT Education</a>
			</span>
		</li>
	</ul>
</div>
<!-- /Block links module -->
<?php }} ?>