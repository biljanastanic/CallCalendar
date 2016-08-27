<?php /* Smarty version Smarty-3.1.13, created on 2014-10-24 14:31:20
         compiled from "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC9\data\localweb\prestashop-skeleton\modules\blocklink\blocklink.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12588544a4698e7be33-42688391%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c061c44544307606318e4cbb489f33f315941e0' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC9\\data\\localweb\\prestashop-skeleton\\modules\\blocklink\\blocklink.tpl',
      1 => 1367857385,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12588544a4698e7be33-42688391',
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
  'unifunc' => 'content_544a46990e3803_34997419',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544a46990e3803_34997419')) {function content_544a46990e3803_34997419($_smarty_tpl) {?>

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