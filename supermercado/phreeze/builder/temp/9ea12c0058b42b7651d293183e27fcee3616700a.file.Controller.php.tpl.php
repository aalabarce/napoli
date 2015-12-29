<?php /* Smarty version Smarty-3.1.18, created on 2015-12-21 15:00:08
         compiled from "/var/www/html/phreeze/builder/code/phreeze.backbone/libs/Controller/Controller.php.tpl" */ ?>
<?php /*%%SmartyHeaderCode:142653051156783e283eca15-65209252%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ea12c0058b42b7651d293183e27fcee3616700a' => 
    array (
      0 => '/var/www/html/phreeze/builder/code/phreeze.backbone/libs/Controller/Controller.php.tpl',
      1 => 1445574211,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '142653051156783e283eca15-65209252',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'appname' => 0,
    'singular' => 0,
    'table' => 0,
    'column' => 0,
    'plural' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56783e286f3822_99241766',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56783e286f3822_99241766')) {function content_56783e286f3822_99241766($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_studlycaps')) include '/var/www/html/phreeze/libs/smarty/plugins/modifier.studlycaps.php';
if (!is_callable('smarty_modifier_lcfirst')) include '/var/www/html/phreeze/libs/smarty/plugins/modifier.lcfirst.php';
?><<?php ?>?php
/** @package    <?php echo $_smarty_tpl->tpl_vars['appname']->value;?>
::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
.php");

/**
 * <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
Controller is the controller class for the <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
 object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package <?php echo $_smarty_tpl->tpl_vars['appname']->value;?>
::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
Controller extends AppBaseController
{

	/**
	 * Override here for any controller-specific functionality
	 *
	 * @inheritdocs
	 */
	protected function Init()
	{
		parent::Init();

		// TODO: add controller-wide bootstrap code
		
		// TODO: if authentiation is required for this entire controller, for example:
		// $this->RequirePermission(ExampleUser::$PERMISSION_USER,'SecureExample.LoginForm');
	}

	/**
	 * Displays a list view of <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
 objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
 records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
Criteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('<?php  $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['table']->value->Columns; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['column']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['column']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['column']->key => $_smarty_tpl->tpl_vars['column']->value) {
$_smarty_tpl->tpl_vars['column']->_loop = true;
 $_smarty_tpl->tpl_vars['column']->iteration++;
 $_smarty_tpl->tpl_vars['column']->last = $_smarty_tpl->tpl_vars['column']->iteration === $_smarty_tpl->tpl_vars['column']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['filterForEach']['last'] = $_smarty_tpl->tpl_vars['column']->last;
?><?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['filterForEach']['last']) {?>,<?php }?><?php } ?>'
				, '%'.$filter.'%')
			);

			// TODO: this is generic query filtering based only on criteria properties
			foreach (array_keys($_REQUEST) as $prop)
			{
				$prop_normal = ucfirst($prop);
				$prop_equals = $prop_normal.'_Equals';

				if (property_exists($criteria, $prop_normal))
				{
					$criteria->$prop_normal = RequestUtil::Get($prop);
				}
				elseif (property_exists($criteria, $prop_equals))
				{
					// this is a convenience so that the _Equals suffix is not needed
					$criteria->$prop_equals = RequestUtil::Get($prop);
				}
			}

			$output = new stdClass();

			// if a sort order was specified then specify in the criteria
 			$output->orderBy = RequestUtil::Get('orderBy');
 			$output->orderDesc = RequestUtil::Get('orderDesc') != '';
 			if ($output->orderBy) $criteria->SetOrder($output->orderBy, $output->orderDesc);

			$page = RequestUtil::Get('page');

			if ($page != '')
			{
				// if page is specified, use this instead (at the expense of one extra count query)
				$pagesize = $this->GetDefaultPageSize();

				$<?php echo mb_strtolower($_smarty_tpl->tpl_vars['plural']->value, 'UTF-8');?>
 = $this->Phreezer->Query('<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $<?php echo mb_strtolower($_smarty_tpl->tpl_vars['plural']->value, 'UTF-8');?>
->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $<?php echo mb_strtolower($_smarty_tpl->tpl_vars['plural']->value, 'UTF-8');?>
->TotalResults;
				$output->totalPages = $<?php echo mb_strtolower($_smarty_tpl->tpl_vars['plural']->value, 'UTF-8');?>
->TotalPages;
				$output->pageSize = $<?php echo mb_strtolower($_smarty_tpl->tpl_vars['plural']->value, 'UTF-8');?>
->PageSize;
				$output->currentPage = $<?php echo mb_strtolower($_smarty_tpl->tpl_vars['plural']->value, 'UTF-8');?>
->CurrentPage;
			}
			else
			{
				// return all results
				$<?php echo mb_strtolower($_smarty_tpl->tpl_vars['plural']->value, 'UTF-8');?>
 = $this->Phreezer->Query('<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
',$criteria);
				$output->rows = $<?php echo mb_strtolower($_smarty_tpl->tpl_vars['plural']->value, 'UTF-8');?>
->ToObjectArray(true, $this->SimpleObjectParams());
				$output->totalResults = count($output->rows);
				$output->totalPages = 1;
				$output->pageSize = $output->totalResults;
				$output->currentPage = 1;
			}


			$this->RenderJSON($output, $this->JSONPCallback());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method retrieves a single <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
 record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['table']->value->GetPrimaryKeyName()));?>
');
			$<?php echo mb_strtolower($_smarty_tpl->tpl_vars['singular']->value, 'UTF-8');?>
 = $this->Phreezer->Get('<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
',$pk);
			$this->RenderJSON($<?php echo mb_strtolower($_smarty_tpl->tpl_vars['singular']->value, 'UTF-8');?>
, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
 record and render response as JSON
	 */
	public function Create()
	{
		try
		{
			<?php if ($_smarty_tpl->tpl_vars['table']->value->IsView) {?>// TODO: views are read-only by default.  uncomment at your own discretion
			throw new Exception('Database views are read-only and cannot be updated');
			<?php }?>
			
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$<?php echo mb_strtolower($_smarty_tpl->tpl_vars['singular']->value, 'UTF-8');?>
 = new <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

<?php  $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['table']->value->Columns; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['column']->key => $_smarty_tpl->tpl_vars['column']->value) {
$_smarty_tpl->tpl_vars['column']->_loop = true;
?>
<?php if ($_smarty_tpl->tpl_vars['column']->value->Extra=='auto_increment') {?>
			// this is an auto-increment.  uncomment if updating is allowed
			// $<?php echo mb_strtolower($_smarty_tpl->tpl_vars['singular']->value, 'UTF-8');?>
-><?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
 = $this->SafeGetVal($json, '<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
');

<?php } else { ?>
<?php if ($_smarty_tpl->tpl_vars['column']->value->Type=="date"||$_smarty_tpl->tpl_vars['column']->value->Type=="datetime"||$_smarty_tpl->tpl_vars['column']->value->Type=="timestamp") {?>
			$<?php echo mb_strtolower($_smarty_tpl->tpl_vars['singular']->value, 'UTF-8');?>
-><?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
 = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, '<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
')));
<?php } elseif ($_smarty_tpl->tpl_vars['column']->value->Type=="time") {?>
			$<?php echo mb_strtolower($_smarty_tpl->tpl_vars['singular']->value, 'UTF-8');?>
-><?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
 = date('H:i:s',strtotime('1970-01-01 ' . $this->SafeGetVal($json, '<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
')));
<?php } else { ?>
			$<?php echo mb_strtolower($_smarty_tpl->tpl_vars['singular']->value, 'UTF-8');?>
-><?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
 = $this->SafeGetVal($json, '<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
');
<?php }?>
<?php }?>
<?php } ?>

			$<?php echo mb_strtolower($_smarty_tpl->tpl_vars['singular']->value, 'UTF-8');?>
->Validate();
			$errors = $<?php echo mb_strtolower($_smarty_tpl->tpl_vars['singular']->value, 'UTF-8');?>
->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
<?php if (!$_smarty_tpl->tpl_vars['table']->value->PrimaryKeyIsAutoIncrement()) {?>
				// since the primary key is not auto-increment we must force the insert here
<?php }?>
				$<?php echo mb_strtolower($_smarty_tpl->tpl_vars['singular']->value, 'UTF-8');?>
->Save(<?php if (!$_smarty_tpl->tpl_vars['table']->value->PrimaryKeyIsAutoIncrement()) {?>true<?php }?>);
				$this->RenderJSON($<?php echo mb_strtolower($_smarty_tpl->tpl_vars['singular']->value, 'UTF-8');?>
, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
 record and render response as JSON
	 */
	public function Update()
	{
		try
		{
			<?php if ($_smarty_tpl->tpl_vars['table']->value->IsView) {?>// TODO: views are read-only by default.  uncomment at your own discretion
			throw new Exception('Database views are read-only and cannot be updated');
			<?php }?>
			
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$pk = $this->GetRouter()->GetUrlParam('<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['table']->value->GetPrimaryKeyName()));?>
');
			$<?php echo mb_strtolower($_smarty_tpl->tpl_vars['singular']->value, 'UTF-8');?>
 = $this->Phreezer->Get('<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

<?php  $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['table']->value->Columns; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['column']->key => $_smarty_tpl->tpl_vars['column']->value) {
$_smarty_tpl->tpl_vars['column']->_loop = true;
?>
<?php if ($_smarty_tpl->tpl_vars['column']->value->Key=="PRI") {?>
			// this is a primary key.  uncomment if updating is allowed
			// $<?php echo mb_strtolower($_smarty_tpl->tpl_vars['singular']->value, 'UTF-8');?>
-><?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
 = $this->SafeGetVal($json, '<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
', $<?php echo mb_strtolower($_smarty_tpl->tpl_vars['singular']->value, 'UTF-8');?>
-><?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
);

<?php } elseif ($_smarty_tpl->tpl_vars['column']->value->Extra=='auto_increment') {?>
			// this is an auto-increment.  uncomment if updating is allowed
			// $<?php echo mb_strtolower($_smarty_tpl->tpl_vars['singular']->value, 'UTF-8');?>
-><?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
 = $this->SafeGetVal($json, '<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
', $<?php echo mb_strtolower($_smarty_tpl->tpl_vars['singular']->value, 'UTF-8');?>
-><?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
);

<?php } else { ?>
<?php if ($_smarty_tpl->tpl_vars['column']->value->Type=="date"||$_smarty_tpl->tpl_vars['column']->value->Type=="datetime"||$_smarty_tpl->tpl_vars['column']->value->Type=="timestamp") {?>
			$<?php echo mb_strtolower($_smarty_tpl->tpl_vars['singular']->value, 'UTF-8');?>
-><?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
 = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, '<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
', $<?php echo mb_strtolower($_smarty_tpl->tpl_vars['singular']->value, 'UTF-8');?>
-><?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
)));
<?php } elseif ($_smarty_tpl->tpl_vars['column']->value->Type=="time") {?>
			$<?php echo mb_strtolower($_smarty_tpl->tpl_vars['singular']->value, 'UTF-8');?>
-><?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
 = date('Y-m-d H:i:s',strtotime('1970-01-01 ' . $this->SafeGetVal($json, '<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
', $<?php echo mb_strtolower($_smarty_tpl->tpl_vars['singular']->value, 'UTF-8');?>
-><?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
)));
<?php } else { ?>
			$<?php echo mb_strtolower($_smarty_tpl->tpl_vars['singular']->value, 'UTF-8');?>
-><?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
 = $this->SafeGetVal($json, '<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
', $<?php echo mb_strtolower($_smarty_tpl->tpl_vars['singular']->value, 'UTF-8');?>
-><?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
);
<?php }?>
<?php }?>
<?php } ?>

			$<?php echo mb_strtolower($_smarty_tpl->tpl_vars['singular']->value, 'UTF-8');?>
->Validate();
			$errors = $<?php echo mb_strtolower($_smarty_tpl->tpl_vars['singular']->value, 'UTF-8');?>
->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$<?php echo mb_strtolower($_smarty_tpl->tpl_vars['singular']->value, 'UTF-8');?>
->Save();
				$this->RenderJSON($<?php echo mb_strtolower($_smarty_tpl->tpl_vars['singular']->value, 'UTF-8');?>
, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{

<?php if (!$_smarty_tpl->tpl_vars['table']->value->PrimaryKeyIsAutoIncrement()) {?>
			// this table does not have an auto-increment primary key, so it is semantically correct to
			// issue a REST PUT request, however we have no way to know whether to insert or update.
			// if the record is not found, this exception will indicate that this is an insert request
			if (is_a($ex,'NotFoundException'))
			{
				return $this->Create();
			}
<?php }?>

			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
 record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
			<?php if ($_smarty_tpl->tpl_vars['table']->value->IsView) {?>// TODO: views are read-only by default.  uncomment at your own discretion
			throw new Exception('Database views are read-only and cannot be updated');
			<?php }?>
			
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['table']->value->GetPrimaryKeyName()));?>
');
			$<?php echo mb_strtolower($_smarty_tpl->tpl_vars['singular']->value, 'UTF-8');?>
 = $this->Phreezer->Get('<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
',$pk);

			$<?php echo mb_strtolower($_smarty_tpl->tpl_vars['singular']->value, 'UTF-8');?>
->Delete();

			$output = new stdClass();

			$this->RenderJSON($output, $this->JSONPCallback());

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}
}

?<?php ?>>
<?php }} ?>
