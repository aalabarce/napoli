<?php /* Smarty version Smarty-3.1.18, created on 2015-12-21 15:00:08
         compiled from "/var/www/html/phreeze/builder/code/phreeze.php/libs/Model/DAO/ModelMap.php.tpl" */ ?>
<?php /*%%SmartyHeaderCode:65337085056783e289142f0-54858645%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4495c1d4a571e1c510dc5cc1abd62d8ec00f411c' => 
    array (
      0 => '/var/www/html/phreeze/builder/code/phreeze.php/libs/Model/DAO/ModelMap.php.tpl',
      1 => 1445574211,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65337085056783e289142f0-54858645',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'connection' => 0,
    'singular' => 0,
    'table' => 0,
    'column' => 0,
    'enumval' => 0,
    'set' => 0,
    'constraint' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56783e28a53dc1_36719272',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56783e28a53dc1_36719272')) {function content_56783e28a53dc1_36719272($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_studlycaps')) include '/var/www/html/phreeze/libs/smarty/plugins/modifier.studlycaps.php';
if (!is_callable('smarty_modifier_replace')) include '/var/www/html/phreeze/libs/smarty/plugins/modifier.replace.php';
?><<?php ?>?php
/** @package    <?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['connection']->value->DBName);?>
::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
Map is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
DAO to the <?php echo $_smarty_tpl->tpl_vars['table']->value->Name;?>
 datastore.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * You can override the default fetching strategies for KeyMaps in _config.php.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package <?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['connection']->value->DBName);?>
::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
Map implements IDaoMap, IDaoMap2
{

	private static $KM;
	private static $FM;
	
	/**
	 * {@inheritdoc}
	 */
	public static function AddMap($property,FieldMap $map)
	{
		self::GetFieldMaps();
		self::$FM[$property] = $map;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public static function SetFetchingStrategy($property,$loadType)
	{
		self::GetKeyMaps();
		self::$KM[$property]->LoadType = $loadType;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetFieldMaps()
	{
		if (self::$FM == null)
		{
			self::$FM = Array();
<?php  $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['table']->value->Columns; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['column']->key => $_smarty_tpl->tpl_vars['column']->value) {
$_smarty_tpl->tpl_vars['column']->_loop = true;
?>			self::$FM["<?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
"] = new FieldMap("<?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
","<?php echo $_smarty_tpl->tpl_vars['table']->value->Name;?>
","<?php echo $_smarty_tpl->tpl_vars['column']->value->Name;?>
",<?php if ($_smarty_tpl->tpl_vars['column']->value->Key=="PRI") {?>true<?php } else { ?>false<?php }?>,<?php echo $_smarty_tpl->tpl_vars['column']->value->GetPhreezeType();?>
,<?php if ($_smarty_tpl->tpl_vars['column']->value->IsEnum()) {?>array(<?php  $_smarty_tpl->tpl_vars['enumval'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['enumval']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['column']->value->GetEnumValues(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['enumval']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['enumval']->key => $_smarty_tpl->tpl_vars['enumval']->value) {
$_smarty_tpl->tpl_vars['enumval']->_loop = true;
 $_smarty_tpl->tpl_vars['enumval']->index++;
 $_smarty_tpl->tpl_vars['enumval']->first = $_smarty_tpl->tpl_vars['enumval']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['enumvals']['first'] = $_smarty_tpl->tpl_vars['enumval']->first;
?><?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['enumvals']['first']) {?>,<?php }?>"<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['enumval']->value,'"','\"');?>
"<?php } ?>)<?php } elseif ($_smarty_tpl->tpl_vars['column']->value->Size) {?><?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['column']->value->Size,',','.');?>
<?php } else { ?>null<?php }?>,<?php if ($_smarty_tpl->tpl_vars['column']->value->Default) {?>"<?php echo $_smarty_tpl->tpl_vars['column']->value->Default;?>
"<?php } else { ?>null<?php }?>,<?php if ($_smarty_tpl->tpl_vars['column']->value->Extra=='auto_increment') {?>true<?php } else { ?>false<?php }?>);
<?php } ?>
		}
		return self::$FM;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetKeyMaps()
	{
		if (self::$KM == null)
		{
			self::$KM = Array();
<?php  $_smarty_tpl->tpl_vars['set'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['set']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['table']->value->Sets; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['set']->key => $_smarty_tpl->tpl_vars['set']->value) {
$_smarty_tpl->tpl_vars['set']->_loop = true;
?>			self::$KM["<?php echo $_smarty_tpl->tpl_vars['set']->value->Name;?>
"] = new KeyMap("<?php echo $_smarty_tpl->tpl_vars['set']->value->Name;?>
", "<?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['set']->value->KeyColumnNoPrefix);?>
", "<?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['set']->value->SetTableName);?>
", "<?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['set']->value->SetKeyColumnNoPrefix);?>
", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
<?php } ?>
<?php  $_smarty_tpl->tpl_vars['constraint'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['constraint']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['table']->value->Constraints; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['constraint']->key => $_smarty_tpl->tpl_vars['constraint']->value) {
$_smarty_tpl->tpl_vars['constraint']->_loop = true;
?>			self::$KM["<?php echo $_smarty_tpl->tpl_vars['constraint']->value->Name;?>
"] = new KeyMap("<?php echo $_smarty_tpl->tpl_vars['constraint']->value->Name;?>
", "<?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['constraint']->value->KeyColumnNoPrefix);?>
", "<?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['constraint']->value->ReferenceTableName);?>
", "<?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['constraint']->value->ReferenceKeyColumnNoPrefix);?>
", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
<?php } ?>
		}
		return self::$KM;
	}

}

?<?php ?>><?php }} ?>
