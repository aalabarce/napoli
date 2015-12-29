<?php /* Smarty version Smarty-3.1.18, created on 2015-12-21 15:00:08
         compiled from "/var/www/html/phreeze/builder/code/phreeze.backbone/styles/style.css" */ ?>
<?php /*%%SmartyHeaderCode:3725537256783e28e690f5-46460437%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '192d09b8ea6006c00475ee9732e1061a3adc8c6c' => 
    array (
      0 => '/var/www/html/phreeze/builder/code/phreeze.backbone/styles/style.css',
      1 => 1445574211,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3725537256783e28e690f5-46460437',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56783e28e819c4_83339008',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56783e28e819c4_83339008')) {function content_56783e28e819c4_83339008($_smarty_tpl) {?>/*!
 * application style overrides and customizations
 */

/* note that this gets overridden by bootstrap-responsive.min.css when screen size changes */
body {
	padding-top: 60px;
	padding-bottom: 40px;
}

h1 {
	margin-bottom: 8px;
}

hr {
	margin: 10px 0px 10px 0px;
}

p.buttonContainer {

}

table.collection tr:hover {
    cursor: pointer;
}

table.collection th:hover {
    cursor: pointer;
    opacity: 0.5;
}

.date-picker input
{
	width: 80px;
}

.date-picker i
{
	color: #999;
	margin-top: 2px;
	margin-left: -1px;
}

.bootstrap-timepicker-component input
{
	width: 70px;
}

.bootstrap-timepicker-component i
{
	color: #999;
	margin-top: 3px;
	margin-left: 0px;
}

.searchContainer input, searchContainer button
{
	margin-top: 8px;
}

.searchContainer input
{
	margin-top: 8px;
}

/* search filter button */
.input-append button.add-on {
    height: inherit !important;
    color: #999999;
    padding-left: 10px;
    padding-right: 10px;
    margin-top: 8px;
}

span.loader {
	margin: 0px;
	display: inline-block;
	width: 150px;
}

span.loader .bar {
	display: inline-block;
	width: 100%;
	height: 30px;
}

/* form controls */
span.help-inline {
	font-size: .9em;
	font-style: italic;
	padding-top: 5px;
	color: #999;
}

/* fixes spacing glitch with combo-box followed by an empty inline help */
span.help-inline:empty {
	display: none;
}
<?php }} ?>
