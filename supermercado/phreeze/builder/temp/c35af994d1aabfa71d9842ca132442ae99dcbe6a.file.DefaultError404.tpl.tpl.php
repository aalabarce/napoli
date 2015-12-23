<?php /* Smarty version Smarty-3.1.18, created on 2015-12-21 15:00:08
         compiled from "/var/www/html/phreeze/builder/code/phreeze.savant/templates/DefaultError404.tpl.tpl" */ ?>
<?php /*%%SmartyHeaderCode:130018547856783e28f225a4-90340769%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c35af994d1aabfa71d9842ca132442ae99dcbe6a' => 
    array (
      0 => '/var/www/html/phreeze/builder/code/phreeze.savant/templates/DefaultError404.tpl.tpl',
      1 => 1445574211,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '130018547856783e28f225a4-90340769',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'appname' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56783e28f2eb93_09574712',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56783e28f2eb93_09574712')) {function content_56783e28f2eb93_09574712($_smarty_tpl) {?><<?php ?>?php
	$this->assign('title','<?php echo $_smarty_tpl->tpl_vars['appname']->value;?>
 | File Not Found');
	$this->assign('nav','home');

	$this->display('_Header.tpl.php');
?<?php ?>>

<div class="container">

	<h1>Oh Snap!</h1>

	<!-- this is used by app.js for scraping -->
	<!-- ERROR The page you requested was not found /ERROR -->

	<p>The page you requested was not found.  Please check that you typed the URL correctly.</p>

</div> <!-- /container -->

<<?php ?>?php
	$this->display('_Footer.tpl.php');
?<?php ?>><?php }} ?>
