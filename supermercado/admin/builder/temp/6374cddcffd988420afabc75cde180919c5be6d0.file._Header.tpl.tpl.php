<?php /* Smarty version Smarty-3.1.18, created on 2015-12-21 15:00:08
         compiled from "/var/www/html/phreeze/builder/code/phreeze.savant/templates/_Header.tpl.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4209229956783e28e87712-45577042%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6374cddcffd988420afabc75cde180919c5be6d0' => 
    array (
      0 => '/var/www/html/phreeze/builder/code/phreeze.savant/templates/_Header.tpl.tpl',
      1 => 1445574211,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4209229956783e28e87712-45577042',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'appname' => 0,
    'selectedTables' => 0,
    'table' => 0,
    'tableInfos' => 0,
    'max_items_in_topnav' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56783e28f06447_96724944',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56783e28f06447_96724944')) {function content_56783e28f06447_96724944($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-Frame-Options" content="deny">
		<base href="<<?php ?>?php $this->eprint($this->ROOT_URL); ?<?php ?>>" />
		<title><<?php ?>?php $this->eprint($this->title); ?<?php ?>></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['appname']->value;?>
" />
		<meta name="author" content="phreeze builder | phreeze.com" />

		<!-- Le styles -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<link href="styles/style.css" rel="stylesheet" />
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link href="bootstrap/css/font-awesome.min.css" rel="stylesheet" />
		<!--[if IE 7]>
		<link rel="stylesheet" href="bootstrap/css/font-awesome-ie7.min.css">
		<![endif]-->
		<link href="bootstrap/css/datepicker.css" rel="stylesheet" />
		<link href="bootstrap/css/timepicker.css" rel="stylesheet" />
		<link href="bootstrap/css/bootstrap-combobox.css" rel="stylesheet" />
		
		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			<script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Le fav and touch icons -->
		<link rel="shortcut icon" href="images/favicon.ico" />
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch-icon-114-precomposed.png" />
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72-precomposed.png" />
		<link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon-57-precomposed.png" />

		<script type="text/javascript" src="scripts/libs/LAB.min.js"></script>
		<script type="text/javascript">
			$LAB.script("//code.jquery.com/jquery-1.8.2.min.js").wait()
				.script("bootstrap/js/bootstrap.min.js")
				.script("bootstrap/js/bootstrap-datepicker.js")
				.script("bootstrap/js/bootstrap-timepicker.js")
				.script("bootstrap/js/bootstrap-combobox.js")
				.script("scripts/libs/underscore-min.js").wait()
				.script("scripts/libs/underscore.date.min.js")
				.script("scripts/libs/backbone-min.js")
				.script("scripts/app.js")
				.script("scripts/model.js").wait()
				.script("scripts/view.js").wait()
		</script>

	</head>

	<body>

			<div class="navbar navbar-inverse navbar-fixed-top">
				<div class="navbar-inner">
					<div class="container">
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
						<a class="brand" href="./"><?php echo $_smarty_tpl->tpl_vars['appname']->value;?>
</a>
						<div class="nav-collapse collapse">
							<ul class="nav">
<?php  $_smarty_tpl->tpl_vars['table'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['table']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['selectedTables']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['table']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['table']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['ddForEach']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['table']->key => $_smarty_tpl->tpl_vars['table']->value) {
$_smarty_tpl->tpl_vars['table']->_loop = true;
 $_smarty_tpl->tpl_vars['table']->iteration++;
 $_smarty_tpl->tpl_vars['table']->last = $_smarty_tpl->tpl_vars['table']->iteration === $_smarty_tpl->tpl_vars['table']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['ddForEach']['index']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['ddForEach']['last'] = $_smarty_tpl->tpl_vars['table']->last;
?><?php if (isset($_smarty_tpl->tpl_vars['tableInfos']->value[$_smarty_tpl->tpl_vars['table']->value->Name])) {?>
<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['ddForEach']['index']==$_smarty_tpl->tpl_vars['max_items_in_topnav']->value&&!$_smarty_tpl->getVariable('smarty')->value['foreach']['ddForEach']['last']) {?>
							</ul>
							<ul class="nav">
								<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">More <b class="caret"></b></a>
								<ul class="dropdown-menu">
<?php }?>
								<li <<?php ?>?php if ($this->nav=='<?php echo mb_strtolower($_smarty_tpl->tpl_vars['tableInfos']->value[$_smarty_tpl->tpl_vars['table']->value->Name]['plural'], 'UTF-8');?>
') { echo 'class="active"'; } ?<?php ?>>><a href="./<?php echo mb_strtolower($_smarty_tpl->tpl_vars['tableInfos']->value[$_smarty_tpl->tpl_vars['table']->value->Name]['plural'], 'UTF-8');?>
"><?php echo $_smarty_tpl->tpl_vars['tableInfos']->value[$_smarty_tpl->tpl_vars['table']->value->Name]['plural'];?>
</a></li>
<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['ddForEach']['last']&&$_smarty_tpl->getVariable('smarty')->value['foreach']['ddForEach']['index']!=$_smarty_tpl->tpl_vars['max_items_in_topnav']->value) {?>
								</ul>
								</li>
<?php }?>
<?php }?><?php } ?>
							</ul>
							<ul class="nav pull-right">
								<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-lock"></i> Login <i class="caret"></i></a>
								<ul class="dropdown-menu">
									<li><a href="./loginform">Login</a></li>
									<li class="divider"></li>
									<li><a href="./secureuser">Example User Page <i class="icon-lock"></i></a></li>
									<li><a href="./secureadmin">Example Admin Page <i class="icon-lock"></i></a></li>
								</ul>
								</li>
							</ul>
						</div><!--/.nav-collapse -->
					</div>
				</div>
			</div><?php }} ?>
