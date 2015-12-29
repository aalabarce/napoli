<?php /* Smarty version Smarty-3.1.18, created on 2015-12-21 15:00:09
         compiled from "/var/www/html/phreeze/builder/code/phreeze.savant/_app_config.php.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4842866456783e29361a86-79322021%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95f305eb1c7ae5ec767fa983a000e785f8eca110' => 
    array (
      0 => '/var/www/html/phreeze/builder/code/phreeze.savant/_app_config.php.tpl',
      1 => 1445574211,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4842866456783e29361a86-79322021',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'appname' => 0,
    'includePhar' => 0,
    'includePath' => 0,
    'tables' => 0,
    'table' => 0,
    'tableInfos' => 0,
    'singular' => 0,
    'plural' => 0,
    'tbl' => 0,
    'constraint' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56783e294739f2_31837577',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56783e294739f2_31837577')) {function content_56783e294739f2_31837577($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_studlycaps')) include '/var/www/html/phreeze/libs/smarty/plugins/modifier.studlycaps.php';
if (!is_callable('smarty_modifier_lcfirst')) include '/var/www/html/phreeze/libs/smarty/plugins/modifier.lcfirst.php';
?><<?php ?>?php
/**
 * @package <?php echo $_smarty_tpl->tpl_vars['appname']->value;?>

 *
 * APPLICATION-WIDE CONFIGURATION SETTINGS
 *
 * This file contains application-wide configuration settings.  The settings
 * here will be the same regardless of the machine on which the app is running.
 *
 * This configuration should be added to version control.
 *
 * No settings should be added to this file that would need to be changed
 * on a per-machine basic (ie local, staging or production).  Any
 * machine-specific settings should be added to _machine_config.php
 */

/**
 * APPLICATION ROOT DIRECTORY
 * If the application doesn't detect this correctly then it can be set explicitly
 */
if (!GlobalConfig::$APP_ROOT) GlobalConfig::$APP_ROOT = realpath("./");

/**
 * check is needed to ensure asp_tags is not enabled
 */
if (ini_get('asp_tags')) 
	die('<h3>Server Configuration Problem: asp_tags is enabled, but is not compatible with Savant.</h3>'
	. '<p>You can disable asp_tags in .htaccess, php.ini or generate your app with another template engine such as Smarty.</p>');

/**
 * INCLUDE PATH
 * Adjust the include path as necessary so PHP can locate required libraries
 */
set_include_path(
		GlobalConfig::$APP_ROOT . '/libs/' . PATH_SEPARATOR .
<?php if (($_smarty_tpl->tpl_vars['includePhar']->value=='1')) {?>
		'phar://' . GlobalConfig::$APP_ROOT . '/libs/phreeze-3.3.8.phar' . PATH_SEPARATOR .
<?php }?>
		GlobalConfig::$APP_ROOT . '/<?php echo $_smarty_tpl->tpl_vars['includePath']->value;?>
' . PATH_SEPARATOR .
		GlobalConfig::$APP_ROOT . '/vendor/phreeze/phreeze/libs/' . PATH_SEPARATOR .
		get_include_path()
);

/**
 * COMPOSER AUTOLOADER
 * Uncomment if Composer is being used to manage dependencies
 */
// $loader = require 'vendor/autoload.php';
// $loader->setUseIncludePath(true);

/**
 * SESSION CLASSES
 * Any classes that will be stored in the session can be added here
 * and will be pre-loaded on every page
 */
require_once "App/ExampleUser.php";

/**
 * RENDER ENGINE
 * You can use any template system that implements
 * IRenderEngine for the view layer.  Phreeze provides pre-built
 * implementations for Smarty, Savant and plain PHP.
 */
require_once 'verysimple/Phreeze/SavantRenderEngine.php';
GlobalConfig::$TEMPLATE_ENGINE = 'SavantRenderEngine';
GlobalConfig::$TEMPLATE_PATH = GlobalConfig::$APP_ROOT . '/templates/';

/**
 * ROUTE MAP
 * The route map connects URLs to Controller+Method and additionally maps the
 * wildcards to a named parameter so that they are accessible inside the
 * Controller without having to parse the URL for parameters such as IDs
 */
GlobalConfig::$ROUTE_MAP = array(

	// default controller when no route specified
	'GET:' => array('route' => 'Default.Home'),
		
	// example authentication routes
	'GET:loginform' => array('route' => 'SecureExample.LoginForm'),
	'POST:login' => array('route' => 'SecureExample.Login'),
	'GET:secureuser' => array('route' => 'SecureExample.UserPage'),
	'GET:secureadmin' => array('route' => 'SecureExample.AdminPage'),
	'GET:logout' => array('route' => 'SecureExample.Logout'),
<?php  $_smarty_tpl->tpl_vars['table'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['table']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tables']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['table']->key => $_smarty_tpl->tpl_vars['table']->value) {
$_smarty_tpl->tpl_vars['table']->_loop = true;
?><?php if (isset($_smarty_tpl->tpl_vars['tableInfos']->value[$_smarty_tpl->tpl_vars['table']->value->Name])) {?>
	<?php $_smarty_tpl->tpl_vars['singular'] = new Smarty_variable($_smarty_tpl->tpl_vars['tableInfos']->value[$_smarty_tpl->tpl_vars['table']->value->Name]['singular'], null, 0);?>
	<?php $_smarty_tpl->tpl_vars['plural'] = new Smarty_variable($_smarty_tpl->tpl_vars['tableInfos']->value[$_smarty_tpl->tpl_vars['table']->value->Name]['plural'], null, 0);?>

	// <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>

	'GET:<?php echo mb_strtolower($_smarty_tpl->tpl_vars['plural']->value, 'UTF-8');?>
' => array('route' => '<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
.ListView'),
	'GET:<?php echo mb_strtolower($_smarty_tpl->tpl_vars['singular']->value, 'UTF-8');?>
/<?php if ($_smarty_tpl->tpl_vars['table']->value->PrimaryKeyIsAutoIncrement()) {?>(:num)<?php } else { ?>(:any)<?php }?>' => array('route' => '<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
.SingleView', 'params' => array('<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['table']->value->GetPrimaryKeyName()));?>
' => 1)),
	'GET:api/<?php echo mb_strtolower($_smarty_tpl->tpl_vars['plural']->value, 'UTF-8');?>
' => array('route' => '<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
.Query'),
	'POST:api/<?php echo mb_strtolower($_smarty_tpl->tpl_vars['singular']->value, 'UTF-8');?>
' => array('route' => '<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
.Create'),
	'GET:api/<?php echo mb_strtolower($_smarty_tpl->tpl_vars['singular']->value, 'UTF-8');?>
/<?php if ($_smarty_tpl->tpl_vars['table']->value->PrimaryKeyIsAutoIncrement()) {?>(:num)<?php } else { ?>(:any)<?php }?>' => array('route' => '<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
.Read', 'params' => array('<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['table']->value->GetPrimaryKeyName()));?>
' => 2)),
	'PUT:api/<?php echo mb_strtolower($_smarty_tpl->tpl_vars['singular']->value, 'UTF-8');?>
/<?php if ($_smarty_tpl->tpl_vars['table']->value->PrimaryKeyIsAutoIncrement()) {?>(:num)<?php } else { ?>(:any)<?php }?>' => array('route' => '<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
.Update', 'params' => array('<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['table']->value->GetPrimaryKeyName()));?>
' => 2)),
	'DELETE:api/<?php echo mb_strtolower($_smarty_tpl->tpl_vars['singular']->value, 'UTF-8');?>
/<?php if ($_smarty_tpl->tpl_vars['table']->value->PrimaryKeyIsAutoIncrement()) {?>(:num)<?php } else { ?>(:any)<?php }?>' => array('route' => '<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
.Delete', 'params' => array('<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['table']->value->GetPrimaryKeyName()));?>
' => 2)),
<?php }?><?php } ?>

	// catch any broken API urls
	'GET:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'PUT:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'POST:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'DELETE:api/(:any)' => array('route' => 'Default.ErrorApi404')
);

/**
 * FETCHING STRATEGY
 * You may uncomment any of the lines below to specify always eager fetching.
 * Alternatively, you can copy/paste to a specific page for one-time eager fetching
 * If you paste into a controller method, replace $G_PHREEZER with $this->Phreezer
 */
<?php  $_smarty_tpl->tpl_vars['tbl'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tbl']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tables']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tbl']->key => $_smarty_tpl->tpl_vars['tbl']->value) {
$_smarty_tpl->tpl_vars['tbl']->_loop = true;
?>
<?php  $_smarty_tpl->tpl_vars['constraint'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['constraint']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tbl']->value->Constraints; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['constraint']->key => $_smarty_tpl->tpl_vars['constraint']->value) {
$_smarty_tpl->tpl_vars['constraint']->_loop = true;
?>
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("<?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['tbl']->value->Name);?>
","<?php echo $_smarty_tpl->tpl_vars['constraint']->value->Name;?>
",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
<?php } ?>
<?php } ?>
?<?php ?>><?php }} ?>
