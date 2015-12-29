<?php /* Smarty version Smarty-3.1.18, created on 2015-12-21 15:00:09
         compiled from "/var/www/html/phreeze/builder/code/phreeze.backbone/index.php.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17303240956783e294f6c24-09014285%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a32d045b4292224dc05f459c08124a0f8784c936' => 
    array (
      0 => '/var/www/html/phreeze/builder/code/phreeze.backbone/index.php.tpl',
      1 => 1445574211,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17303240956783e294f6c24-09014285',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'appname' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56783e2950af68_68723773',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56783e2950af68_68723773')) {function content_56783e2950af68_68723773($_smarty_tpl) {?><<?php ?>?php
/** @package    <?php echo $_smarty_tpl->tpl_vars['appname']->value;?>
 */

/* GlobalConfig object contains all configuration information for the app */
include_once("_global_config.php");
include_once("_app_config.php");
@include_once("_machine_config.php");

if (!GlobalConfig::$CONNECTION_SETTING)
{
	throw new Exception('GlobalConfig::$CONNECTION_SETTING is not configured.  Are you missing _machine_config.php?');
}

/* require framework libs */
require_once("verysimple/Phreeze/Dispatcher.php");

// the global config is used for all dependency injection
$gc = GlobalConfig::GetInstance();

try
{
	Dispatcher::Dispatch(
		$gc->GetPhreezer(),
		$gc->GetRenderEngine(),
		'',
		$gc->GetContext(),
		$gc->GetRouter()
	);
}
catch (exception $ex)
{
	// This is the global error handler which will be called in the event of
	// uncaught errors.  If the endpoint appears to be an API request then
	// render it as JSON, otherwise attempt to render a friendly HTML page
	
	$url = RequestUtil::GetCurrentURL();
	$isApiRequest = (strpos($url,'api/') !== false);
	
	if ($isApiRequest)
	{
		$result = new stdClass();
		$result->success= false;
		$result->message = $ex->getMessage();
		$result->data = $ex->getTraceAsString();
		
		@header('HTTP/1.1 401 Unauthorized');
		echo json_encode($result);
	}
	else
	{
		$gc->GetRenderEngine()->assign("message",$ex->getMessage());
		$gc->GetRenderEngine()->assign("stacktrace",$ex->getTraceAsString());
		$gc->GetRenderEngine()->assign("code",$ex->getCode());
		
		try
		{
			$gc->GetRenderEngine()->display("DefaultErrorFatal.tpl");
		}
		catch (Exception $ex2)
		{
			// this means there is an error with the template, in which case we can't display it nicely
			echo "<style>* { font-family: verdana, arial, helvetica, sans-serif; }</style>\n";
			echo "<h1>Fatal Error:</h1>\n";
			echo '<h3>' . htmlentities($ex->getMessage()) . "</h3>\n";
			echo "<h4>Original Stack Trace:</h4>\n";
			echo '<textarea wrap="off" style="height: 200px; width: 100%;">' . htmlentities($ex->getTraceAsString()) . '</textarea>';
			echo "<h4>In addition to the above error, the default error template could not be displayed:</h4>\n";
			echo '<textarea wrap="off" style="height: 200px; width: 100%;">' . htmlentities($ex2->getMessage()) . "\n\n" . htmlentities($ex2->getTraceAsString()) . '</textarea>';
		}
	}
}

?<?php ?>><?php }} ?>
