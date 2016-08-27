<?php /* Smarty version Smarty-3.1.8, created on 2013-05-28 15:06:35
         compiled from "/www/htdocs/es/adm/themes/idt/template/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:197909026251a4abdb142d74-82448022%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1d7b8de274fd56159a195245a4ac2ae5acaf3e39' => 
    array (
      0 => '/www/htdocs/es/adm/themes/idt/template/footer.tpl',
      1 => 1358845592,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '197909026251a4abdb142d74-82448022',
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
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51a4abdb191f82_78100532',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a4abdb191f82_78100532')) {function content_51a4abdb191f82_78100532($_smarty_tpl) {?>

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