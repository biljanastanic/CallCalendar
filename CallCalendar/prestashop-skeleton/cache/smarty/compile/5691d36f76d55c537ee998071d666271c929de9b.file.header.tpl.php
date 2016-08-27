<?php /* Smarty version Smarty-3.1.13, created on 2014-11-30 18:22:36
         compiled from "C:\xampp\htdocs\CallCalendar\prestashop-skeleton\back-office\themes\idt\template\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29293547b525cef8e51-35971245%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5691d36f76d55c537ee998071d666271c929de9b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CallCalendar\\prestashop-skeleton\\back-office\\themes\\idt\\template\\header.tpl',
      1 => 1417109203,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29293547b525cef8e51-35971245',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'iso' => 0,
    'display_header' => 0,
    'controller_name' => 0,
    'iso_user' => 0,
    'country_iso_code' => 0,
    'help_box' => 0,
    'round_mode' => 0,
    'shop_context' => 0,
    'shop_name' => 0,
    'autorefresh_notifications' => 0,
    'currentIndex' => 0,
    'css_files' => 0,
    'css_uri' => 0,
    'media' => 0,
    'js_files' => 0,
    'js_uri' => 0,
    'img_dir' => 0,
    'displayBackOfficeHeader' => 0,
    'base_url' => 0,
    'brightness' => 0,
    'bo_color' => 0,
    'bo_width' => 0,
    'link' => 0,
    'show_new_orders' => 0,
    'show_new_customers' => 0,
    'show_new_messages' => 0,
    'displayBackOfficeTop' => 0,
    'tab' => 0,
    'tabs' => 0,
    't' => 0,
    't2' => 0,
    'install_dir_exists' => 0,
    'is_multishop' => 0,
    'shop_list' => 0,
    'multishop_context' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_547b525d1069a9_95577206',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547b525d1069a9_95577206')) {function content_547b525d1069a9_95577206($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include 'C:\\xampp\\htdocs\\CallCalendar\\prestashop-skeleton\\tools\\smarty\\plugins\\modifier.escape.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
" lang="<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
">
<head>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<meta name="robots" content="NOFOLLOW, NOINDEX" />
	<title>IDT Internal</title>
<?php if ($_smarty_tpl->tpl_vars['display_header']->value){?>
	<script type="text/javascript">
		var help_class_name = '<?php echo $_smarty_tpl->tpl_vars['controller_name']->value;?>
';
		var iso_user = '<?php echo $_smarty_tpl->tpl_vars['iso_user']->value;?>
';
		var country_iso_code = '<?php echo $_smarty_tpl->tpl_vars['country_iso_code']->value;?>
';
		var _PS_VERSION_ = '<?php echo @constant('_PS_VERSION_');?>
';

		var helpboxes = <?php echo $_smarty_tpl->tpl_vars['help_box']->value;?>
;
		var roundMode = <?php echo $_smarty_tpl->tpl_vars['round_mode']->value;?>
;
			<?php if (isset($_smarty_tpl->tpl_vars['shop_context']->value)){?>
				<?php if ($_smarty_tpl->tpl_vars['shop_context']->value==Shop::CONTEXT_ALL){?>
				var youEditFieldFor = "<?php echo smartyTranslate(array('s'=>'A modification of this field will be applied for all shops','slashes'=>1),$_smarty_tpl);?>
";
					<?php }elseif($_smarty_tpl->tpl_vars['shop_context']->value==Shop::CONTEXT_GROUP){?>
				var youEditFieldFor = "<?php echo smartyTranslate(array('s'=>'A modification of this field will be applied for all shops of group ','slashes'=>1),$_smarty_tpl);?>
<b><?php echo $_smarty_tpl->tpl_vars['shop_name']->value;?>
</b>";
					<?php }else{ ?>
				var youEditFieldFor = "<?php echo smartyTranslate(array('s'=>'A modification of this field will be applied for the shop ','slashes'=>1),$_smarty_tpl);?>
<b><?php echo $_smarty_tpl->tpl_vars['shop_name']->value;?>
</b>";
				<?php }?>
				<?php }else{ ?>
			var youEditFieldFor = '';
			<?php }?>
		
		var autorefresh_notifications = '<?php echo $_smarty_tpl->tpl_vars['autorefresh_notifications']->value;?>
';
		var new_order_msg = '<?php echo smartyTranslate(array('s'=>'A new order has been placed on your shop.','slashes'=>1),$_smarty_tpl);?>
';
		var order_number_msg = '<?php echo smartyTranslate(array('s'=>'Order number: ','slashes'=>1),$_smarty_tpl);?>
';
		var total_msg = '<?php echo smartyTranslate(array('s'=>'Total: ','slashes'=>1),$_smarty_tpl);?>
';
		var from_msg = '<?php echo smartyTranslate(array('s'=>'From: ','slashes'=>1),$_smarty_tpl);?>
';
		var see_order_msg = '<?php echo smartyTranslate(array('s'=>'View this order','slashes'=>1),$_smarty_tpl);?>
';
		var new_customer_msg = '<?php echo smartyTranslate(array('s'=>'A new customer registered on your shop.','slashes'=>1),$_smarty_tpl);?>
';
		var customer_name_msg = '<?php echo smartyTranslate(array('s'=>'Customer name: ','slashes'=>1),$_smarty_tpl);?>
';
		var see_customer_msg = '<?php echo smartyTranslate(array('s'=>'View this customer','slashes'=>1),$_smarty_tpl);?>
';
		var new_msg = '<?php echo smartyTranslate(array('s'=>'A new message posted on your shop.','slashes'=>1),$_smarty_tpl);?>
';
		var excerpt_msg = '<?php echo smartyTranslate(array('s'=>'Excerpt: ','slashes'=>1),$_smarty_tpl);?>
';
		var see_msg = '<?php echo smartyTranslate(array('s'=>'Read this message','slashes'=>1),$_smarty_tpl);?>
';
		var token_admin_orders = '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0][0]->getAdminTokenLiteSmarty(array('tab'=>'AdminOrders','slashes'=>1),$_smarty_tpl);?>
';
		var token_admin_customers = '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0][0]->getAdminTokenLiteSmarty(array('tab'=>'AdminCustomers','slashes'=>1),$_smarty_tpl);?>
';
		var token_admin_customer_threads = '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0][0]->getAdminTokenLiteSmarty(array('tab'=>'AdminCustomerThreads','slashes'=>1),$_smarty_tpl);?>
';
		var currentIndex = '<?php echo $_smarty_tpl->tpl_vars['currentIndex']->value;?>
';
	</script>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['css_files']->value)){?>
	<?php  $_smarty_tpl->tpl_vars['media'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['media']->_loop = false;
 $_smarty_tpl->tpl_vars['css_uri'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['css_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['media']->key => $_smarty_tpl->tpl_vars['media']->value){
$_smarty_tpl->tpl_vars['media']->_loop = true;
 $_smarty_tpl->tpl_vars['css_uri']->value = $_smarty_tpl->tpl_vars['media']->key;
?>
		<link href="<?php echo $_smarty_tpl->tpl_vars['css_uri']->value;?>
" rel="stylesheet" type="text/css" media="<?php echo $_smarty_tpl->tpl_vars['media']->value;?>
" />
	<?php } ?>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['js_files']->value)){?>
	<?php  $_smarty_tpl->tpl_vars['js_uri'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js_uri']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['js_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['js_uri']->key => $_smarty_tpl->tpl_vars['js_uri']->value){
$_smarty_tpl->tpl_vars['js_uri']->_loop = true;
?>
		<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_uri']->value;?>
"></script>
	<?php } ?>
<?php }?>

	<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
favicon.ico" />
<?php if (isset($_smarty_tpl->tpl_vars['displayBackOfficeHeader']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['displayBackOfficeHeader']->value;?>

<?php }?>
	<!--[if IE]>
	<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
css/admin-ie.css" />
	<![endif]-->
	<?php if (isset($_smarty_tpl->tpl_vars['brightness']->value)){?>
	<style type="text/css">
		div#header_infos, div#header_infos a#header_shopname, div#header_infos a#header_logout, div#header_infos a#header_foaccess {color:<?php echo $_smarty_tpl->tpl_vars['brightness']->value;?>
}
	</style>
	<?php }?>
</head>
<body style="<?php if (isset($_smarty_tpl->tpl_vars['bo_color']->value)&&$_smarty_tpl->tpl_vars['bo_color']->value){?>background:<?php echo $_smarty_tpl->tpl_vars['bo_color']->value;?>
;<?php }?><?php if (isset($_smarty_tpl->tpl_vars['bo_width']->value)&&$_smarty_tpl->tpl_vars['bo_width']->value>0){?>text-align:center;<?php }?>">
<?php if ($_smarty_tpl->tpl_vars['display_header']->value){?>
<div id="ajax_running"><img src="../img/admin/ajax-loader-yellow.gif" alt="" /> <?php echo smartyTranslate(array('s'=>'Loading...'),$_smarty_tpl);?>
</div>

<div id="top_container" <?php if ($_smarty_tpl->tpl_vars['bo_width']->value>0){?>style="margin:auto;width:<?php echo $_smarty_tpl->tpl_vars['bo_width']->value;?>
px"<?php }?>>
<div id="container">

	<div id="header">
		<div id="header_infos">
			<a id="header_shopname" href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminHome'), 'htmlall', 'UTF-8');?>
"><span><?php echo $_smarty_tpl->tpl_vars['shop_name']->value;?>
 Internal</span></a><div id="notifs_icon_wrapper">
			<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['show_new_orders']->value;?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1==1){?>
				<div id="orders_notif" class="notifs">
						<span id="orders_notif_number_wrapper" class="number_wrapper">
							<span id="orders_notif_value">0</span>
						</span>
					<div id="orders_notif_wrapper" class="notifs_wrapper">
						<h3><?php echo smartyTranslate(array('s'=>'Last orders'),$_smarty_tpl);?>
</h3>
						<p class="no_notifs"><?php echo smartyTranslate(array('s'=>'No new orders has been placed on your shop'),$_smarty_tpl);?>
</p>
						<ul id="list_orders_notif"></ul>
						<p><a href="index.php?controller=AdminOrders&amp;token=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0][0]->getAdminTokenLiteSmarty(array('tab'=>'AdminOrders'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Show all orders'),$_smarty_tpl);?>
</a></p>
					</div>
				</div>
			<?php }?>
			<?php if (($_smarty_tpl->tpl_vars['show_new_customers']->value==1)){?>
				<div id="customers_notif" class="notifs notifs_alternate">
						<span id="customers_notif_number_wrapper" class="number_wrapper">
							<span id="customers_notif_value">0</span>
						</span>
					<div id="customers_notif_wrapper" class="notifs_wrapper">
						<h3><?php echo smartyTranslate(array('s'=>'Last customers'),$_smarty_tpl);?>
</h3>
						<p class="no_notifs"><?php echo smartyTranslate(array('s'=>'No new customers registered on your shop'),$_smarty_tpl);?>
</p>
						<ul id="list_customers_notif"></ul>
						<p><a href="index.php?controller=AdminCustomers&amp;token=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0][0]->getAdminTokenLiteSmarty(array('tab'=>'AdminCustomers'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Show all customers'),$_smarty_tpl);?>
</a></p>
					</div>
				</div>
			<?php }?>
			<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['show_new_messages']->value;?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2==1){?>
				<div id="customer_messages_notif" class="notifs">
						<span id="customer_messages_notif_number_wrapper" class="number_wrapper">
							<span id="customer_messages_notif_value">0</span>
						</span>
					<div id="customer_messages_notif_wrapper" class="notifs_wrapper">
						<h3><?php echo smartyTranslate(array('s'=>'Last messages'),$_smarty_tpl);?>
</h3>
						<p class="no_notifs"><?php echo smartyTranslate(array('s'=>'No new messages posted on your shop'),$_smarty_tpl);?>
</p>
						<ul id="list_customer_messages_notif"></ul>
						<p><a href="index.php?tab=AdminCustomerThreads&amp;token=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0][0]->getAdminTokenLiteSmarty(array('tab'=>'AdminCustomerThreads'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Show all messages'),$_smarty_tpl);?>
</a></p>
					</div>
				</div>
			<?php }?>
		</div>
		<div id="employee_links">
			<a href="index.php?logout" id="header_logout"><?php echo smartyTranslate(array('s'=>'logout'),$_smarty_tpl);?>
</a>
			<br>
		</div>
		<?php if (isset($_smarty_tpl->tpl_vars['displayBackOfficeTop']->value)){?>
			<?php echo $_smarty_tpl->tpl_vars['displayBackOfficeTop']->value;?>

		<?php }?>
	</div> 

	<ul id="menu">
		<?php if (!$_smarty_tpl->tpl_vars['tab']->value){?>
			<div class="mainsubtablist" style="display:none">
			</div>
		<?php }?>
		<?php  $_smarty_tpl->tpl_vars['t'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['t']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tabs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['t']->key => $_smarty_tpl->tpl_vars['t']->value){
$_smarty_tpl->tpl_vars['t']->_loop = true;
?>
			<?php if ($_smarty_tpl->tpl_vars['t']->value['active']){?>
				<li class="submenu_size maintab <?php if ($_smarty_tpl->tpl_vars['t']->value['current']){?>active<?php }?>" id="maintab<?php echo $_smarty_tpl->tpl_vars['t']->value['id_tab'];?>
">
					<span class="title">
						<img src="<?php echo $_smarty_tpl->tpl_vars['t']->value['img'];?>
" alt="" /><?php if ($_smarty_tpl->tpl_vars['t']->value['name']==''){?><?php echo $_smarty_tpl->tpl_vars['t']->value['class_name'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['t']->value['name'];?>
<?php }?>
					</span>
					<ul class="submenu">
						<?php  $_smarty_tpl->tpl_vars['t2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['t2']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['t']->value['sub_tabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['t2']->key => $_smarty_tpl->tpl_vars['t2']->value){
$_smarty_tpl->tpl_vars['t2']->_loop = true;
?>
							<?php if ($_smarty_tpl->tpl_vars['t2']->value['active']){?>
								<li><a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['t2']->value['href'], 'htmlall', 'UTF-8');?>
"><?php if ($_smarty_tpl->tpl_vars['t2']->value['name']==''){?><?php echo $_smarty_tpl->tpl_vars['t2']->value['class_name'];?>
<?php }else{ ?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['t2']->value['name'], 'htmlall', 'UTF-8');?>
<?php }?></a></li>
							<?php }?>
						<?php } ?>
					</ul>
				</li>
			<?php }?>
		<?php } ?>
	</ul>
<?php }?>
	<div id="main">
		<div id="content">
		<?php if ($_smarty_tpl->tpl_vars['display_header']->value&&$_smarty_tpl->tpl_vars['install_dir_exists']->value){?>
			<div style="background-color: #FFEBCC;border: 1px solid #F90;line-height: 20px;margin: 0px 0px 10px;padding: 10px 20px;">
				<?php echo smartyTranslate(array('s'=>'For security reasons, you must also:'),$_smarty_tpl);?>
  <?php echo smartyTranslate(array('s'=>'delete the /install folder'),$_smarty_tpl);?>

			</div>
		<?php }?>

		<?php if ($_smarty_tpl->tpl_vars['display_header']->value&&$_smarty_tpl->tpl_vars['is_multishop']->value&&$_smarty_tpl->tpl_vars['shop_list']->value&&($_smarty_tpl->tpl_vars['multishop_context']->value&Shop::CONTEXT_GROUP||$_smarty_tpl->tpl_vars['multishop_context']->value&Shop::CONTEXT_SHOP)){?>
			<div class="multishop_toolbar">
				<span class="text_multishop"><?php echo smartyTranslate(array('s'=>'Profile:'),$_smarty_tpl);?>
</span>
				<?php echo $_smarty_tpl->tpl_vars['shop_list']->value;?>

			</div>
		<?php }?>
<?php }} ?>