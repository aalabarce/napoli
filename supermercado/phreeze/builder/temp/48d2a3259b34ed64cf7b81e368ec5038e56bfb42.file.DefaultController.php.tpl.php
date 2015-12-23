<?php /* Smarty version Smarty-3.1.18, created on 2015-12-21 15:00:08
         compiled from "/var/www/html/phreeze/builder/code/phreeze.backbone/libs/Controller/DefaultController.php.tpl" */ ?>
<?php /*%%SmartyHeaderCode:141723523556783e282f2b06-80428659%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48d2a3259b34ed64cf7b81e368ec5038e56bfb42' => 
    array (
      0 => '/var/www/html/phreeze/builder/code/phreeze.backbone/libs/Controller/DefaultController.php.tpl',
      1 => 1445574211,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141723523556783e282f2b06-80428659',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'connection' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56783e283e3900_48895611',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56783e283e3900_48895611')) {function content_56783e283e3900_48895611($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_studlycaps')) include '/var/www/html/phreeze/libs/smarty/plugins/modifier.studlycaps.php';
?><<?php ?>?php
/** @package <?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['connection']->value->DBName);?>
::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");

/**
 * DefaultController is the entry point to the application
 *
 * @package <?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['connection']->value->DBName);?>
::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class DefaultController extends AppBaseController
{

	/**
	 * Override here for any controller-specific functionality
	 */
	protected function Init()
	{
		parent::Init();

		// TODO: add controller-wide bootstrap code
		
		// TODO: if authentiation is required for this entire controller, for example:
		// $this->RequirePermission(ExampleUser::$PERMISSION_USER,'SecureExample.LoginForm');
	}

	/**
	 * Display the home page for the application
	 */
	public function Home()
	{
		$this->Render();
	}

	/**
	 * Displayed when an invalid route is specified
	 */
	public function Error404()
	{
		$this->Render();
	}

	/**
	 * Display a fatal error message
	 */
	public function ErrorFatal()
	{
		$this->Render();
	}

	public function ErrorApi404()
	{
		$this->RenderErrorJSON('An unknown API endpoint was requested.');
	}

}
?<?php ?>><?php }} ?>
