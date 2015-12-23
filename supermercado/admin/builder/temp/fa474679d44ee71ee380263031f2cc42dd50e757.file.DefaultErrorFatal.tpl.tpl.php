<?php /* Smarty version Smarty-3.1.18, created on 2015-12-21 15:00:08
         compiled from "/var/www/html/phreeze/builder/code/phreeze.savant/templates/DefaultErrorFatal.tpl.tpl" */ ?>
<?php /*%%SmartyHeaderCode:168713125056783e28f33dc9-92470673%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa474679d44ee71ee380263031f2cc42dd50e757' => 
    array (
      0 => '/var/www/html/phreeze/builder/code/phreeze.savant/templates/DefaultErrorFatal.tpl.tpl',
      1 => 1445574211,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '168713125056783e28f33dc9-92470673',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'appname' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56783e29009980_04906567',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56783e29009980_04906567')) {function content_56783e29009980_04906567($_smarty_tpl) {?><<?php ?>?php
	$this->assign('title','<?php echo $_smarty_tpl->tpl_vars['appname']->value;?>
');
	$this->assign('nav','home');

	$this->display('_Header.tpl.php');
?<?php ?>>

<div class="container">

	<h1>Oh Snap!</h1>

	<!-- this is used by app.js for scraping -->
	<!-- ERROR <<?php ?>?php $this->eprint($this->message); ?<?php ?>> /ERROR -->

	<h3 onclick="$('#stacktrace').show('slow');" class="well" style="cursor: pointer;"><<?php ?>?php $this->eprint($this->message); ?<?php ?>></h3>

	<p>You may want to try returning to the the previous page and verifying that
	all fields have been filled out correctly.</p>

	<p>If you continue to experience this error please contact support.</p>

	<div id="stacktrace" class="well hide">
		<p style="font-weight: bold;">Stack Trace:</p>
		<<?php ?>?php if ($this->stacktrace) { ?<?php ?>>
			<p style="white-space: nowrap; overflow: auto; padding-bottom: 15px; font-family: courier new, courier; font-size: 8pt;"><pre><<?php ?>?php $this->eprint($this->stacktrace); ?<?php ?>></pre></p>
		<<?php ?>?php } ?<?php ?>>
	</div>

</div> <!-- /container -->

<<?php ?>?php
	$this->display('_Footer.tpl.php');
?<?php ?>><?php }} ?>
