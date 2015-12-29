<?php /* Smarty version Smarty-3.1.18, created on 2015-12-21 15:00:08
         compiled from "/var/www/html/phreeze/builder/code/phreeze.php/libs/Reporter/Reporter.php.tpl" */ ?>
<?php /*%%SmartyHeaderCode:195183048956783e28a63bd6-37311091%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf57f74df5f8742d50257b3707d8430745500dee' => 
    array (
      0 => '/var/www/html/phreeze/builder/code/phreeze.php/libs/Reporter/Reporter.php.tpl',
      1 => 1445574211,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '195183048956783e28a63bd6-37311091',
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
  'unifunc' => 'content_56783e28ad5d17_97052364',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56783e28ad5d17_97052364')) {function content_56783e28ad5d17_97052364($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_studlycaps')) include '/var/www/html/phreeze/libs/smarty/plugins/modifier.studlycaps.php';
?><<?php ?>?php
/** @package    <?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['connection']->value->DBName);?>
::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
 object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package <?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['connection']->value->DBName);?>
::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
Reporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `<?php echo $_smarty_tpl->tpl_vars['table']->value->Name;?>
` table
	public $CustomFieldExample;

<?php  $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['table']->value->Columns; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['column']->key => $_smarty_tpl->tpl_vars['column']->value) {
$_smarty_tpl->tpl_vars['column']->_loop = true;
?>
	public $<?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
;
<?php } ?>

	/*
	* GetCustomQuery returns a fully formed SQL statement.  The result columns
	* must match with the properties of this reporter object.
	*
	* @see Reporter::GetCustomQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomQuery($criteria)
	{
		$sql = "select
			'custom value here...' as CustomFieldExample
<?php  $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['table']->value->Columns; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['column']->key => $_smarty_tpl->tpl_vars['column']->value) {
$_smarty_tpl->tpl_vars['column']->_loop = true;
?>
			,`<?php echo $_smarty_tpl->tpl_vars['table']->value->Name;?>
`.`<?php echo $_smarty_tpl->tpl_vars['column']->value->Name;?>
` as <?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>

<?php } ?>
		from `<?php echo $_smarty_tpl->tpl_vars['table']->value->Name;?>
`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();
		$sql .= $criteria->GetOrder();

		return $sql;
	}
	
	/*
	* GetCustomCountQuery returns a fully formed SQL statement that will count
	* the results.  This query must return the correct number of results that
	* GetCustomQuery would, given the same criteria
	*
	* @see Reporter::GetCustomCountQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomCountQuery($criteria)
	{
		$sql = "select count(1) as counter from `<?php echo $_smarty_tpl->tpl_vars['table']->value->Name;?>
`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?<?php ?>><?php }} ?>
