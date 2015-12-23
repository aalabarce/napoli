<?php /* Smarty version Smarty-3.1.18, created on 2015-12-21 15:00:08
         compiled from "/var/www/html/phreeze/builder/code/phreeze.savant/templates/_Footer.tpl.tpl" */ ?>
<?php /*%%SmartyHeaderCode:63626182956783e28f0fc36-42652354%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9bc7a524bf3f7943bd428574ad4897e40a54fdf6' => 
    array (
      0 => '/var/www/html/phreeze/builder/code/phreeze.savant/templates/_Footer.tpl.tpl',
      1 => 1445574211,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '63626182956783e28f0fc36-42652354',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'appname' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56783e28f1b929_09491845',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56783e28f1b929_09491845')) {function content_56783e28f1b929_09491845($_smarty_tpl) {?>	<!-- footer -->
	<div class="container">
		<hr>
		<footer>
			<p class="muted"><small>&copy; <<?php ?>?php echo date('Y'); ?<?php ?>> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['appname']->value, ENT_QUOTES, 'UTF-8', true);?>
</small></p>
		</footer>
	</div>
	</body>
</html><?php }} ?>
