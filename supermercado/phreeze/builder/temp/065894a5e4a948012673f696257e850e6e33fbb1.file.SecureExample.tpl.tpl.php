<?php /* Smarty version Smarty-3.1.18, created on 2015-12-21 15:00:09
         compiled from "/var/www/html/phreeze/builder/code/phreeze.savant/templates/SecureExample.tpl.tpl" */ ?>
<?php /*%%SmartyHeaderCode:111196078256783e290386a9-72989435%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '065894a5e4a948012673f696257e850e6e33fbb1' => 
    array (
      0 => '/var/www/html/phreeze/builder/code/phreeze.savant/templates/SecureExample.tpl.tpl',
      1 => 1445574211,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '111196078256783e290386a9-72989435',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'appname' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56783e29065bd4_57901655',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56783e29065bd4_57901655')) {function content_56783e29065bd4_57901655($_smarty_tpl) {?><<?php ?>?php
	$this->assign('title','<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['appname']->value, ENT_QUOTES, 'UTF-8', true);?>
 Secure Example');
	$this->assign('nav','secureexample');

	$this->display('_Header.tpl.php');
?<?php ?>>

<div class="container">

	<<?php ?>?php if ($this->feedback) { ?<?php ?>>
		<div class="alert alert-error">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<<?php ?>?php $this->eprint($this->feedback); ?<?php ?>>
		</div>
	<<?php ?>?php } ?<?php ?>>
	
	<!-- #### this view/tempalate is used for multiple pages.  the controller sets the 'page' variable to display differnet content ####  -->
	
	<<?php ?>?php if ($this->page == 'login') { ?<?php ?>>
	
		<div class="hero-unit">
			<h1>Login Example</h1>
			<p>This is an example of Phreeze authentication.  The default credentials are <strong>demo/pass</strong> and <strong>admin/pass</strong>.</p>
			<p>
				<a href="secureuser" class="btn btn-primary btn-large">Visit User Page</a>
				<a href="secureadmin" class="btn btn-primary btn-large">Visit Admin Page</a>
				<<?php ?>?php if (isset($this->currentUser)) { ?<?php ?>>
					<a href="logout" class="btn btn-primary btn-large">Logout</a>
				<<?php ?>?php } ?<?php ?>>
			</p>
		</div>
	
		<form class="well" method="post" action="login">
			<fieldset>
			<legend>Enter your credentials</legend>
				<div class="control-group">
				<input id="username" name="username" type="text" placeholder="Username..." />
				</div>
				<div class="control-group">
				<input id="password" name="password" type="password" placeholder="Password..." />
				</div>
				<div class="control-group">
				<button type="submit" class="btn btn-primary">Login</button>
				</div>
			</fieldset>
		</form>
	
	<<?php ?>?php } else { ?<?php ?>>
	
		<div class="hero-unit">
			<h1>Secure <<?php ?>?php $this->eprint($this->page == 'userpage' ? 'User' : 'Admin'); ?<?php ?>> Page</h1>
			<p>This page is accessible only to <<?php ?>?php $this->eprint($this->page == 'userpage' ? 'authenticated users' : 'administrators'); ?<?php ?>>.  
			You are currently logged in as '<strong><<?php ?>?php $this->eprint($this->currentUser->Username); ?<?php ?>></strong>'</p>
			<p>
				<a href="secureuser" class="btn btn-primary btn-large">Visit User Page</a>
				<a href="secureadmin" class="btn btn-primary btn-large">Visit Admin Page</a>
				<a href="logout" class="btn btn-primary btn-large">Logout</a>
			</p>
		</div>
	<<?php ?>?php } ?<?php ?>>

</div> <!-- /container -->

<<?php ?>?php
	$this->display('_Footer.tpl.php');
?<?php ?>><?php }} ?>
