<?php /* Smarty version Smarty-3.1.18, created on 2015-12-21 15:00:08
         compiled from "/var/www/html/phreeze/builder/code/phreeze.php/libs/Model/DAO/ModelCriteriaDAO.php.tpl" */ ?>
<?php /*%%SmartyHeaderCode:209822826656783e287bcee4-39126545%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f972e49d8db939341941c4b65da9365902568b8' => 
    array (
      0 => '/var/www/html/phreeze/builder/code/phreeze.php/libs/Model/DAO/ModelCriteriaDAO.php.tpl',
      1 => 1445574211,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '209822826656783e287bcee4-39126545',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'connection' => 0,
    'singular' => 0,
    'table' => 0,
    'column' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56783e2885b3b4_88553125',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56783e2885b3b4_88553125')) {function content_56783e2885b3b4_88553125($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_studlycaps')) include '/var/www/html/phreeze/libs/smarty/plugins/modifier.studlycaps.php';
?><<?php ?>?php
/** @package    <?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['connection']->value->DBName);?>
::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Criteria.php");

/**
 * <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
Criteria allows custom querying for the <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
 object.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the ModelCriteria class which is extended from this class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @inheritdocs
 * @package <?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['connection']->value->DBName);?>
::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
CriteriaDAO extends Criteria
{

<?php  $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['table']->value->Columns; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['column']->key => $_smarty_tpl->tpl_vars['column']->value) {
$_smarty_tpl->tpl_vars['column']->_loop = true;
?>	public $<?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
_Equals;
	public $<?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
_NotEquals;
	public $<?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
_IsLike;
	public $<?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
_IsNotLike;
	public $<?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
_BeginsWith;
	public $<?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
_EndsWith;
	public $<?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
_GreaterThan;
	public $<?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
_GreaterThanOrEqual;
	public $<?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
_LessThan;
	public $<?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
_LessThanOrEqual;
	public $<?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
_In;
	public $<?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
_IsNotEmpty;
	public $<?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
_IsEmpty;
	public $<?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
_BitwiseOr;
	public $<?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
_BitwiseAnd;
<?php } ?>

}

?<?php ?>><?php }} ?>
