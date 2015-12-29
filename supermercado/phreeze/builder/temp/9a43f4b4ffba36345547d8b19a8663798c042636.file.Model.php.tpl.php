<?php /* Smarty version Smarty-3.1.18, created on 2015-12-21 15:00:08
         compiled from "/var/www/html/phreeze/builder/code/phreeze.php/libs/Model/Model.php.tpl" */ ?>
<?php /*%%SmartyHeaderCode:142147352956783e28731c17-24645855%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a43f4b4ffba36345547d8b19a8663798c042636' => 
    array (
      0 => '/var/www/html/phreeze/builder/code/phreeze.php/libs/Model/Model.php.tpl',
      1 => 1445574211,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '142147352956783e28731c17-24645855',
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
  'unifunc' => 'content_56783e287699e0_93782251',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56783e287699e0_93782251')) {function content_56783e287699e0_93782251($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_studlycaps')) include '/var/www/html/phreeze/libs/smarty/plugins/modifier.studlycaps.php';
?><<?php ?>?php
/** @package    <?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['connection']->value->DBName);?>
::Model */

/** import supporting libraries */
require_once("DAO/<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
DAO.php");
require_once("<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
Criteria.php");

/**
 * The <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
 class extends <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
DAO which provides the access
 * to the datastore.
 *
 * @package <?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['connection']->value->DBName);?>
::Model
 * @author ClassBuilder
 * @version 1.0
 */
class <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
 extends <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
DAO
{

	/**
	 * Override default validation
	 * @see Phreezable::Validate()
	 */
	public function Validate()
	{
		// example of custom validation
		// $this->ResetValidationErrors();
		// $errors = $this->GetValidationErrors();
		// if ($error == true) $this->AddValidationError('FieldName', 'Error Information');
		// return !$this->HasValidationErrors();

		return parent::Validate();
	}

	/**
	 * @see Phreezable::OnSave()
	 */
	public function OnSave($insert)
	{
		// the controller create/update methods validate before saving.  this will be a
		// redundant validation check, however it will ensure data integrity at the model
		// level based on validation rules.  comment this line out if this is not desired
		if (!$this->Validate()) throw new Exception('Unable to Save <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
: ' .  implode(', ', $this->GetValidationErrors()));

		// OnSave must return true or Phreeze will cancel the save operation
		return true;
	}

}

?<?php ?>>
<?php }} ?>
