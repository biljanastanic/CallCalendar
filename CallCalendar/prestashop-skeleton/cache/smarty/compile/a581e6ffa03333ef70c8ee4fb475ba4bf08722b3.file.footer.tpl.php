<?php /* Smarty version Smarty-3.1.13, created on 2014-11-30 18:22:37
         compiled from "C:\xampp\htdocs\CallCalendar\prestashop-skeleton\back-office\themes\idt\template\footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7842547b525d2086d8-72999447%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a581e6ffa03333ef70c8ee4fb475ba4bf08722b3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CallCalendar\\prestashop-skeleton\\back-office\\themes\\idt\\template\\footer.tpl',
      1 => 1417109203,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7842547b525d2086d8-72999447',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'display_footer' => 0,
    'timer_start' => 0,
    'iso_is_fr' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_547b525d223c65_87011509',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547b525d223c65_87011509')) {function content_547b525d223c65_87011509($_smarty_tpl) {?>

					<div style="clear:both;height:0;line-height:0">&nbsp;</div>
					</div>
					<div style="clear:both;height:0;line-height:0">&nbsp;</div>
				</div>
		<?php if ($_smarty_tpl->tpl_vars['display_footer']->value){?>
				<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayBackOfficeFooter"),$_smarty_tpl);?>

				<div id="footer">
					<div class="footerLeft">
						<span><?php echo smartyTranslate(array('s'=>'Load time: '),$_smarty_tpl);?>
<?php echo number_format(microtime(true)-$_smarty_tpl->tpl_vars['timer_start']->value,3,'.','');?>
s</span>
					</div>
					<div class="footerRight">
						<?php if ($_smarty_tpl->tpl_vars['iso_is_fr']->value){?>
							<span>Questions / Renseignements / Formations :</span> <strong>+33 (0)1.40.18.30.04</strong> de 09h &agrave; 18h
						<?php }?>
					</div>
				</div>
			</div>
		</div>
		<div id="ajax_confirmation" style="display:none"></div>
		
		<div id="ajaxBox" style="display:none"></div>
		<?php }?>
		<div id="scrollTop"><a href="#top"></a></div>
	</body>
</html>
<?php }} ?>