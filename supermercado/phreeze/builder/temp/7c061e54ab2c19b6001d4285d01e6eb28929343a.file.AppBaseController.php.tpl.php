<?php /* Smarty version Smarty-3.1.18, created on 2015-12-21 15:00:08
         compiled from "/var/www/html/phreeze/builder/code/phreeze.backbone/libs/Controller/AppBaseController.php.tpl" */ ?>
<?php /*%%SmartyHeaderCode:152625697656783e2870a929-43836712%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c061e54ab2c19b6001d4285d01e6eb28929343a' => 
    array (
      0 => '/var/www/html/phreeze/builder/code/phreeze.backbone/libs/Controller/AppBaseController.php.tpl',
      1 => 1445574211,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '152625697656783e2870a929-43836712',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'appname' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56783e28727c08_83229826',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56783e28727c08_83229826')) {function content_56783e28727c08_83229826($_smarty_tpl) {?><<?php ?>?php
/** @package    <?php echo $_smarty_tpl->tpl_vars['appname']->value;?>
::Controller */

/** import supporting libraries */
require_once("verysimple/Phreeze/Controller.php");

/**
 * AppBaseController is a base class Controller class from which
 * the front controllers inherit.  it is not necessary to use this
 * class or any code, however you may use if for application-wide
 * functions such as authentication
 *
 * @package <?php echo $_smarty_tpl->tpl_vars['appname']->value;?>
::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class AppBaseController extends Controller
{

	static $DEFAULT_PAGE_SIZE = 10;

	/**
	 * Init is called by the base controller before the action method
	 * is called.  This provided an oportunity to hook into the system
	 * for all application actions.  This is a good place for authentication
	 * code.
	 */
	protected function Init()
	{
		// TODO: add app-wide bootsrap code
		
		// EXAMPLE: require authentication to access the app
		/*
		if ( !in_array($this->GetRouter()->GetUri(),array('login','loginform','logout')) )
		{
			require_once("App/ExampleUser.php");
			$this->RequirePermission(ExampleUser::$PERMISSION_ADMIN,'SecureExample.LoginForm');
		}
		//*/
	}

	/**
	 * Returns the number of records to return per page
	 * when pagination is used
	 */
	protected function GetDefaultPageSize()
	{
		return self::$DEFAULT_PAGE_SIZE;
	}

	/**
	 * Returns the name of the JSONP callback function (if allowed)
	 */
	protected function JSONPCallback()
	{
		// TODO: uncomment to allow JSONP
		// return RequestUtil::Get('callback','');

		return '';
	}

	/**
	 * Return the default SimpleObject params used when rendering objects as JSON
	 * @return array
	 */
	protected function SimpleObjectParams()
	{
		return array('camelCase'=>true);
	}

	/**
	 * Helper method to get values from stdClass without throwing errors
	 * @param stdClass $json
	 * @param string $prop
	 * @param string $default
	 */
	protected function SafeGetVal($json, $prop, $default='')
	{
		return (property_exists($json,$prop))
			? $json->$prop
			: $default;
	}

	/**
	 * Helper utility that calls RenderErrorJSON
	 * @param Exception
	 */
	protected function RenderExceptionJSON(Exception $exception)
	{
		$this->RenderErrorJSON($exception->getMessage(),null,$exception);
	}

	/**
	 * Output a Json error message to the browser
	 * @param string $message
	 * @param array key/value pairs where the key is the fieldname and the value is the error
	 */
	protected function RenderErrorJSON($message, $errors = null, $exception = null)
	{
		$err = new stdClass();
		$err->success = false;
		$err->message = $message;
		$err->errors = array();

		if ($errors != null)
		{
			foreach ($errors as $key=>$val)
			{
				$err->errors[lcfirst($key)] = $val;
			}
		}

		if ($exception)
		{
			$err->stackTrace = explode("\n#", substr($exception->getTraceAsString(),1) );
		}

		@header('HTTP/1.1 401 Unauthorized');
		$this->RenderJSON($err,RequestUtil::Get('callback'));
	}

}
?<?php ?>><?php }} ?>
