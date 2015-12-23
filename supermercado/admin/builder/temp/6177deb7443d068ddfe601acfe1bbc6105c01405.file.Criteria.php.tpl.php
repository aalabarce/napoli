<?php /* Smarty version Smarty-3.1.18, created on 2015-12-21 15:00:08
         compiled from "/var/www/html/phreeze/builder/code/phreeze.php/libs/Model/Criteria.php.tpl" */ ?>
<?php /*%%SmartyHeaderCode:116485254956783e2876f990-27133800%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6177deb7443d068ddfe601acfe1bbc6105c01405' => 
    array (
      0 => '/var/www/html/phreeze/builder/code/phreeze.php/libs/Model/Criteria.php.tpl',
      1 => 1445574211,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '116485254956783e2876f990-27133800',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'connection' => 0,
    'singular' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56783e287b7180_66974382',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56783e287b7180_66974382')) {function content_56783e287b7180_66974382($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_studlycaps')) include '/var/www/html/phreeze/libs/smarty/plugins/modifier.studlycaps.php';
?><<?php ?>?php
/** @package    <?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['connection']->value->DBName);?>
::Model */

/** import supporting libraries */
require_once("DAO/<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
CriteriaDAO.php");

/**
 * The <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
Criteria class extends <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
DAOCriteria and is used
 * to query the database for objects and collections
 * 
 * @inheritdocs
 * @package <?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['connection']->value->DBName);?>
::Model
 * @author ClassBuilder
 * @version 1.0
 */
class <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
Criteria extends <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
CriteriaDAO
{
	
	/**
	 * GetFieldFromProp returns the DB column for a given class property
	 * 
	 * If any fields that are not part of the table need to be supported
	 * by this Criteria class, they can be added inside the switch statement
	 * in this method
	 * 
	 * @see Criteria::GetFieldFromProp()
	 */
	/*
	public function GetFieldFromProp($propname)
	{
		switch($propname)
		{
			 case 'CustomProp1':
			 	return 'my_db_column_1';
			 case 'CustomProp2':
			 	return 'my_db_column_2';
			default:
				return parent::GetFieldFromProp($propname);
		}
	}
	*/
	
	/**
	 * For custom query logic, you may override OnPrepare and set the $this->_where to whatever
	 * sql code is necessary.  If you choose to manually set _where then Phreeze will not touch
	 * your where clause at all and so any of the standard property names will be ignored
	 *
	 * @see Criteria::OnPrepare()
	 */
	/*
	function OnPrepare()
	{
		if ($this->MyCustomField == "special value")
		{
			// _where must begin with "where"
			$this->_where = "where db_field ....";
		}
	}
	*/

}
?<?php ?>><?php }} ?>
