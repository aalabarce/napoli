<?php /* Smarty version Smarty-3.1.18, created on 2015-12-21 15:00:09
         compiled from "/var/www/html/phreeze/builder/code/phreeze.savant/templates/ListView.tpl.tpl" */ ?>
<?php /*%%SmartyHeaderCode:146551933556783e2906cc28-16468464%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b029a95e2f3e65f7efb6828e7f91a3ec5999d4c' => 
    array (
      0 => '/var/www/html/phreeze/builder/code/phreeze.savant/templates/ListView.tpl.tpl',
      1 => 1445574211,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '146551933556783e2906cc28-16468464',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'appname' => 0,
    'plural' => 0,
    'singular' => 0,
    'table' => 0,
    'column' => 0,
    'enumVal' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56783e2934d6b5_81404590',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56783e2934d6b5_81404590')) {function content_56783e2934d6b5_81404590($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_lcfirst')) include '/var/www/html/phreeze/libs/smarty/plugins/modifier.lcfirst.php';
if (!is_callable('smarty_modifier_studlycaps')) include '/var/www/html/phreeze/libs/smarty/plugins/modifier.studlycaps.php';
if (!is_callable('smarty_modifier_underscore2space')) include '/var/www/html/phreeze/libs/smarty/plugins/modifier.underscore2space.php';
?><<?php ?>?php
	$this->assign('title','<?php echo $_smarty_tpl->tpl_vars['appname']->value;?>
 | <?php echo $_smarty_tpl->tpl_vars['plural']->value;?>
');
	$this->assign('nav','<?php echo mb_strtolower($_smarty_tpl->tpl_vars['plural']->value, 'UTF-8');?>
');

	$this->display('_Header.tpl.php');
?<?php ?>>

<script type="text/javascript">
	$LAB.script("scripts/app/<?php echo mb_strtolower($_smarty_tpl->tpl_vars['plural']->value, 'UTF-8');?>
.js").wait(function(){
		$(document).ready(function(){
			page.init();
		});
		
		// hack for IE9 which may respond inconsistently with document.ready
		setTimeout(function(){
			if (!page.isInitialized) page.init();
		},1000);
	});
</script>

<div class="container">

<h1>
	<i class="icon-th-list"></i> <?php echo $_smarty_tpl->tpl_vars['plural']->value;?>

	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="<?php echo smarty_modifier_lcfirst($_smarty_tpl->tpl_vars['singular']->value);?>
CollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
<?php  $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['table']->value->Columns; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['columnsForEach']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['column']->key => $_smarty_tpl->tpl_vars['column']->value) {
$_smarty_tpl->tpl_vars['column']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['columnsForEach']['index']++;
?>
<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['columnsForEach']['index']==5) {?><!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
<?php }?>
				<th id="header_<?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
"><?php echo smarty_modifier_underscore2space($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
<<?php ?>% if (page.orderBy == '<?php echo smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
') { %<?php ?>> <i class='icon-arrow-<<?php ?>%= page.orderDesc ? 'up' : 'down' %<?php ?>>' /><<?php ?>% } %<?php ?>></th>
<?php } ?>
<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['columnsForEach']['index']>=5) {?>-->
<?php }?>
			</tr>
		</thead>
		<tbody>
		<<?php ?>% items.each(function(item) { %<?php ?>>
			<tr id="<<?php ?>%= _.escape(item.get('<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['table']->value->GetPrimaryKeyName()));?>
')) %<?php ?>>">
<?php  $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['table']->value->Columns; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['columnsForEach']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['column']->key => $_smarty_tpl->tpl_vars['column']->value) {
$_smarty_tpl->tpl_vars['column']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['columnsForEach']['index']++;
?>
<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['columnsForEach']['index']==5) {?><!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['column']->value->Type=="date") {?>
				<td><<?php ?>%if (item.get('<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
')) { %<?php ?>><<?php ?>%= _date(app.parseDate(item.get('<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
'))).format('MMM D, YYYY') %<?php ?>><<?php ?>% } else { %<?php ?>>NULL<<?php ?>% } %<?php ?>></td>
<?php } elseif ($_smarty_tpl->tpl_vars['column']->value->Type=="datetime"||$_smarty_tpl->tpl_vars['column']->value->Type=="timestamp") {?>
				<td><<?php ?>%if (item.get('<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
')) { %<?php ?>><<?php ?>%= _date(app.parseDate(item.get('<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
'))).format('MMM D, YYYY h:mm A') %<?php ?>><<?php ?>% } else { %<?php ?>>NULL<<?php ?>% } %<?php ?>></td>
<?php } elseif ($_smarty_tpl->tpl_vars['column']->value->Type=="time") {?>
				<td><<?php ?>%if (item.get('<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
')) { %<?php ?>><<?php ?>%= _date(app.parseDate(item.get('<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
'))).format('h:mm A') %<?php ?>><<?php ?>% } else { %<?php ?>>NULL<<?php ?>% } %<?php ?>></td>
<?php } else { ?>
				<td><<?php ?>%= _.escape(item.get('<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
') || '') %<?php ?>></td>
<?php }?>
<?php } ?>
<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['columnsForEach']['index']>=5) {?>-->
<?php }?>
			</tr>
		<<?php ?>% }); %<?php ?>>
		</tbody>
		</table>

		<<?php ?>%=  view.getPaginationHtml(page) %<?php ?>>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="<?php echo smarty_modifier_lcfirst($_smarty_tpl->tpl_vars['singular']->value);?>
ModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
<?php  $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['table']->value->Columns; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['columnsForEach']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['column']->key => $_smarty_tpl->tpl_vars['column']->value) {
$_smarty_tpl->tpl_vars['column']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['columnsForEach']['index']++;
?>
				<div id="<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
InputContainer" class="control-group">
					<label class="control-label" for="<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
"><?php echo smarty_modifier_underscore2space($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
</label>
					<div class="controls inline-inputs">
<?php if ($_smarty_tpl->tpl_vars['column']->value->Extra=='auto_increment') {?>
						<span class="input-xlarge uneditable-input" id="<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
"><<?php ?>%= _.escape(item.get('<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
') || '') %<?php ?>></span>
<?php } elseif ($_smarty_tpl->tpl_vars['column']->value->Key=="MUL"&&$_smarty_tpl->tpl_vars['column']->value->Constraints) {?>
						<select id="<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
" name="<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
"></select>
<?php } elseif ($_smarty_tpl->tpl_vars['column']->value->IsEnum()) {?>
						<select id="<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
" name="<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
">
							<option value=""></option>
<?php  $_smarty_tpl->tpl_vars['enumVal'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['enumVal']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['column']->value->GetEnumValues(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['enumVal']->key => $_smarty_tpl->tpl_vars['enumVal']->value) {
$_smarty_tpl->tpl_vars['enumVal']->_loop = true;
?>
							<option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['enumVal']->value, ENT_QUOTES, 'UTF-8', true);?>
"<<?php ?>% if (item.get('<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
')=='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['enumVal']->value, ENT_QUOTES, 'UTF-8', true);?>
') { %<?php ?>> selected="selected"<<?php ?>% } %<?php ?>>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['enumVal']->value, ENT_QUOTES, 'UTF-8', true);?>
</option>
<?php } ?>
						</select>
<?php } elseif ($_smarty_tpl->tpl_vars['column']->value->Type=="date"||$_smarty_tpl->tpl_vars['column']->value->Type=="datetime"||$_smarty_tpl->tpl_vars['column']->value->Type=="timestamp") {?>
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
" type="text" value="<<?php ?>%= _date(app.parseDate(item.get('<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
'))).format('YYYY-MM-DD') %<?php ?>>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
<?php if ($_smarty_tpl->tpl_vars['column']->value->Type=="datetime"||$_smarty_tpl->tpl_vars['column']->value->Type=="timestamp") {?>
						<div class="input-append bootstrap-timepicker-component">
							<input id="<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
-time" type="text" class="timepicker-default input-small" value="<<?php ?>%= _date(app.parseDate(item.get('<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
'))).format('h:mm A') %<?php ?>>" />
							<span class="add-on"><i class="icon-time"></i></span>
						</div>
<?php }?>
<?php } elseif ($_smarty_tpl->tpl_vars['column']->value->Type=='time') {?>
						<div class="input-append bootstrap-timepicker-component">
							<input id="<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
" type="text" class="timepicker-default input-small" value="<<?php ?>%= _date(app.parseDate(item.get('<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
'))).format('h:mm A') %<?php ?>>" />
							<span class="add-on"><i class="icon-time"></i></span>
						</div>
<?php } elseif ($_smarty_tpl->tpl_vars['column']->value->Type=='text'||$_smarty_tpl->tpl_vars['column']->value->Type=='tinytext'||$_smarty_tpl->tpl_vars['column']->value->Type=='mediumtext'||$_smarty_tpl->tpl_vars['column']->value->Type=='longtext') {?>
						<textarea class="input-xlarge" id="<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
" rows="3"><<?php ?>%= _.escape(item.get('<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
') || '') %<?php ?>></textarea>
<?php } elseif (false) {?>
						<select id="<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
"><option>something</option><option>2</option></select>
<?php } else { ?>
						<input type="text" class="input-xlarge" id="<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
" placeholder="<?php echo smarty_modifier_underscore2space($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix);?>
" value="<<?php ?>%= _.escape(item.get('<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
') || '') %<?php ?>>">
<?php }?>
						<span class="help-inline"></span>
					</div>
				</div>
<?php } ?>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="delete<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
ButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="delete<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
Button" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
</button>
						<span id="confirmDelete<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
Container" class="hide">
							<button id="cancelDelete<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
Button" class="btn btn-mini">Cancel</button>
							<button id="confirmDelete<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
Button" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="<?php echo smarty_modifier_lcfirst($_smarty_tpl->tpl_vars['singular']->value);?>
DetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>

				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="<?php echo smarty_modifier_lcfirst($_smarty_tpl->tpl_vars['singular']->value);?>
ModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="save<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
Button" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="<?php echo smarty_modifier_lcfirst($_smarty_tpl->tpl_vars['singular']->value);?>
CollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="new<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
Button" class="btn btn-primary">Add <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
</button>
	</p>

</div> <!-- /container -->

<<?php ?>?php
	$this->display('_Footer.tpl.php');
?<?php ?>>
<?php }} ?>
