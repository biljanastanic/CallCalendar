<?php /* Smarty version Smarty-3.1.8, created on 2013-04-18 10:02:40
         compiled from "/www/htdocs/mrtc/testIDT/themes/es/search-idt.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1860129536516fa8a025d453-67729265%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd48baf9c2ec53a1712a9d68739368dd69feacd84' => 
    array (
      0 => '/www/htdocs/mrtc/testIDT/themes/es/search-idt.tpl',
      1 => 1366209613,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1860129536516fa8a025d453-67729265',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_516fa8a0287f43_55912575',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_516fa8a0287f43_55912575')) {function content_516fa8a0287f43_55912575($_smarty_tpl) {?><div id="search">
	<h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
</div>

<div id="search" class="centre-column">
<script>
  (function() {
    var cx = '013528101041874485034:wnjvbls9tbu';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//www.google.com/cse/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search></gcse:search>
</div>

<div class="right-column">

</div>
<?php }} ?>