<?php /* Smarty version Smarty-3.1.18, created on 2015-12-21 15:00:09
         compiled from "/var/www/html/phreeze/builder/code/phreeze.backbone/_machine_config.php.tpl" */ ?>
<?php /*%%SmartyHeaderCode:75910819356783e294acb44-68487874%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a07c88b2409b334d05d9fc116e0bc050bbee6670' => 
    array (
      0 => '/var/www/html/phreeze/builder/code/phreeze.backbone/_machine_config.php.tpl',
      1 => 1445574211,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '75910819356783e294acb44-68487874',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'appname' => 0,
    'connection' => 0,
    'appRoot' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56783e294ee8c8_68410954',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56783e294ee8c8_68410954')) {function content_56783e294ee8c8_68410954($_smarty_tpl) {?><<?php ?>?php
/**
 * @package <?php echo $_smarty_tpl->tpl_vars['appname']->value;?>

 *
 * MACHINE-SPECIFIC CONFIGURATION SETTINGS
 *
 * The configuration settings in this file can be changed to suit the
 * machine on which the app is running (ex. local, staging or production).
 *
 * This file should not be added to version control, rather a template
 * file should be added instead and then copied for each install
 */

require_once 'verysimple/Phreeze/ConnectionSetting.php';
require_once("verysimple/HTTP/RequestUtil.php");

/** database connection settings */
GlobalConfig::$CONNECTION_SETTING = new ConnectionSetting();
GlobalConfig::$CONNECTION_SETTING->ConnectionString = "<?php echo $_smarty_tpl->tpl_vars['connection']->value->Host;?>
<?php if ($_smarty_tpl->tpl_vars['connection']->value->Port) {?>:<?php echo $_smarty_tpl->tpl_vars['connection']->value->Port;?>
<?php }?>";
GlobalConfig::$CONNECTION_SETTING->DBName = "<?php echo $_smarty_tpl->tpl_vars['connection']->value->DBName;?>
";
GlobalConfig::$CONNECTION_SETTING->Username = "<?php echo $_smarty_tpl->tpl_vars['connection']->value->Username;?>
";
GlobalConfig::$CONNECTION_SETTING->Password = "<?php echo $_smarty_tpl->tpl_vars['connection']->value->Password;?>
";
GlobalConfig::$CONNECTION_SETTING->Type = "<?php echo $_smarty_tpl->tpl_vars['connection']->value->Type;?>
";
GlobalConfig::$CONNECTION_SETTING->Charset = "utf8";
GlobalConfig::$CONNECTION_SETTING->Multibyte = true;
// GlobalConfig::$CONNECTION_SETTING->BootstrapSQL = "SET SQL_BIG_SELECTS=1";

/** the root url of the application with trailing slash, for example http://localhost/<?php echo mb_strtolower($_smarty_tpl->tpl_vars['appname']->value, 'UTF-8');?>
/ */
GlobalConfig::$ROOT_URL = RequestUtil::GetServerRootUrl() . '<?php echo $_smarty_tpl->tpl_vars['appRoot']->value;?>
';

/** timezone */
// date_default_timezone_set("UTC");

/** functions for php 5.2 compatibility */
if (!function_exists('lcfirst')) {
	function lcfirst($string) {
		return substr_replace($string, strtolower(substr($string, 0, 1)), 0, 1);
	}
}

// if Multibyte support is specified then we need to check if multibyte functions are available
// if you receive this error then either install multibyte extensions or set Multibyte to false
if (GlobalConfig::$CONNECTION_SETTING->Multibyte && !function_exists('mb_strlen'))
	die('<html>Multibyte extensions are not installed but Multibyte is set to true in _machine_config.php</html>');

/** level 2 cache */
// require_once('verysimple/Util/MemCacheProxy.php');
// GlobalConfig::$LEVEL_2_CACHE = new MemCacheProxy(array('localhost'=>'11211'));
// GlobalConfig::$LEVEL_2_CACHE_TEMP_PATH = sys_get_temp_dir();
// GlobalConfig::$LEVEL_2_CACHE_TIMEOUT = 5; // default is 5 seconds which will not be highly noticable to the user

/** additional machine-specific settings */

?<?php ?>><?php }} ?>
