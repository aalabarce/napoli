<?php /* Smarty version Smarty-3.1.18, created on 2015-12-21 15:00:08
         compiled from "/var/www/html/phreeze/builder/code/phreeze.backbone/scripts/app/objectname.js.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17695621756783e28bd74f7-79355942%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce6eb2945e385aaa7d6d2f7cb06554169530adb6' => 
    array (
      0 => '/var/www/html/phreeze/builder/code/phreeze.backbone/scripts/app/objectname.js.tpl',
      1 => 1445574211,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17695621756783e28bd74f7-79355942',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'plural' => 0,
    'singular' => 0,
    'table' => 0,
    'column' => 0,
    'constraint' => 0,
    'tableInfos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56783e28e4e211_28593655',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56783e28e4e211_28593655')) {function content_56783e28e4e211_28593655($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_lcfirst')) include '/var/www/html/phreeze/libs/smarty/plugins/modifier.lcfirst.php';
if (!is_callable('smarty_modifier_studlycaps')) include '/var/www/html/phreeze/libs/smarty/plugins/modifier.studlycaps.php';
?>/**
 * View logic for <?php echo $_smarty_tpl->tpl_vars['plural']->value;?>

 */

/**
 * application logic specific to the <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
 listing page
 */
var page = {

	<?php echo smarty_modifier_lcfirst($_smarty_tpl->tpl_vars['plural']->value);?>
: new model.<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
Collection(),
	collectionView: null,
	<?php echo smarty_modifier_lcfirst($_smarty_tpl->tpl_vars['singular']->value);?>
: null,
	modelView: null,
	isInitialized: false,
	isInitializing: false,

	fetchParams: { filter: '', orderBy: '', orderDesc: '', page: 1 },
	fetchInProgress: false,
	dialogIsOpen: false,

	/**
	 *
	 */
	init: function() {
		// ensure initialization only occurs once
		if (page.isInitialized || page.isInitializing) return;
		page.isInitializing = true;

		if (!$.isReady && console) console.warn('page was initialized before dom is ready.  views may not render properly.');

		// make the new button clickable
		$("#new<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
Button").click(function(e) {
			e.preventDefault();
			page.showDetailDialog();
		});

		// let the page know when the dialog is open
		$('#<?php echo smarty_modifier_lcfirst($_smarty_tpl->tpl_vars['singular']->value);?>
DetailDialog').on('show',function() {
			page.dialogIsOpen = true;
		});

		// when the model dialog is closed, let page know and reset the model view
		$('#<?php echo smarty_modifier_lcfirst($_smarty_tpl->tpl_vars['singular']->value);?>
DetailDialog').on('hidden',function() {
			$('#modelAlert').html('');
			page.dialogIsOpen = false;
		});

		// save the model when the save button is clicked
		$("#save<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
Button").click(function(e) {
			e.preventDefault();
			page.updateModel();
		});

		// initialize the collection view
		this.collectionView = new view.CollectionView({
			el: $("#<?php echo smarty_modifier_lcfirst($_smarty_tpl->tpl_vars['singular']->value);?>
CollectionContainer"),
			templateEl: $("#<?php echo smarty_modifier_lcfirst($_smarty_tpl->tpl_vars['singular']->value);?>
CollectionTemplate"),
			collection: page.<?php echo smarty_modifier_lcfirst($_smarty_tpl->tpl_vars['plural']->value);?>

		});

		// initialize the search filter
		$('#filter').change(function(obj) {
			page.fetchParams.filter = $('#filter').val();
			page.fetchParams.page = 1;
			page.fetch<?php echo $_smarty_tpl->tpl_vars['plural']->value;?>
(page.fetchParams);
		});
		
		// make the rows clickable ('rendered' is a custom event, not a standard backbone event)
		this.collectionView.on('rendered',function(){

			// attach click handler to the table rows for editing
			$('table.collection tbody tr').click(function(e) {
				e.preventDefault();
				var m = page.<?php echo smarty_modifier_lcfirst($_smarty_tpl->tpl_vars['plural']->value);?>
.get(this.id);
				page.showDetailDialog(m);
			});

			// make the headers clickable for sorting
 			$('table.collection thead tr th').click(function(e) {
 				e.preventDefault();
				var prop = this.id.replace('header_','');

				// toggle the ascending/descending before we change the sort prop
				page.fetchParams.orderDesc = (prop == page.fetchParams.orderBy && !page.fetchParams.orderDesc) ? '1' : '';
				page.fetchParams.orderBy = prop;
				page.fetchParams.page = 1;
 				page.fetch<?php echo $_smarty_tpl->tpl_vars['plural']->value;?>
(page.fetchParams);
 			});

			// attach click handlers to the pagination controls
			$('.pageButton').click(function(e) {
				e.preventDefault();
				page.fetchParams.page = this.id.substr(5);
				page.fetch<?php echo $_smarty_tpl->tpl_vars['plural']->value;?>
(page.fetchParams);
			});
			
			page.isInitialized = true;
			page.isInitializing = false;
		});

		// backbone docs recommend bootstrapping data on initial page load, but we live by our own rules!
		this.fetch<?php echo $_smarty_tpl->tpl_vars['plural']->value;?>
({ page: 1 });

		// initialize the model view
		this.modelView = new view.ModelView({
			el: $("#<?php echo smarty_modifier_lcfirst($_smarty_tpl->tpl_vars['singular']->value);?>
ModelContainer")
		});

		// tell the model view where it's template is located
		this.modelView.templateEl = $("#<?php echo smarty_modifier_lcfirst($_smarty_tpl->tpl_vars['singular']->value);?>
ModelTemplate");

		if (model.longPollDuration > 0)	{
			setInterval(function () {

				if (!page.dialogIsOpen)	{
					page.fetch<?php echo $_smarty_tpl->tpl_vars['plural']->value;?>
(page.fetchParams,true);
				}

			}, model.longPollDuration);
		}
	},

	/**
	 * Fetch the collection data from the server
	 * @param object params passed through to collection.fetch
	 * @param bool true to hide the loading animation
	 */
	fetch<?php echo $_smarty_tpl->tpl_vars['plural']->value;?>
: function(params, hideLoader) {
		// persist the params so that paging/sorting/filtering will play together nicely
		page.fetchParams = params;

		if (page.fetchInProgress) {
			if (console) console.log('supressing fetch because it is already in progress');
		}

		page.fetchInProgress = true;

		if (!hideLoader) app.showProgress('loader');

		page.<?php echo smarty_modifier_lcfirst($_smarty_tpl->tpl_vars['plural']->value);?>
.fetch({

			data: params,

			success: function() {

				if (page.<?php echo smarty_modifier_lcfirst($_smarty_tpl->tpl_vars['plural']->value);?>
.collectionHasChanged) {
					// TODO: add any logic necessary if the collection has changed
					// the sync event will trigger the view to re-render
				}

				app.hideProgress('loader');
				page.fetchInProgress = false;
			},

			error: function(m, r) {
				app.appendAlert(app.getErrorMessage(r), 'alert-error',0,'collectionAlert');
				app.hideProgress('loader');
				page.fetchInProgress = false;
			}

		});
	},

	/**
	 * show the dialog for editing a model
	 * @param model
	 */
	showDetailDialog: function(m) {

		// show the modal dialog
		$('#<?php echo smarty_modifier_lcfirst($_smarty_tpl->tpl_vars['singular']->value);?>
DetailDialog').modal({ show: true });

		// if a model was specified then that means a user is editing an existing record
		// if not, then the user is creating a new record
		page.<?php echo smarty_modifier_lcfirst($_smarty_tpl->tpl_vars['singular']->value);?>
 = m ? m : new model.<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
Model();

		page.modelView.model = page.<?php echo smarty_modifier_lcfirst($_smarty_tpl->tpl_vars['singular']->value);?>
;

		if (page.<?php echo smarty_modifier_lcfirst($_smarty_tpl->tpl_vars['singular']->value);?>
.id == null || page.<?php echo smarty_modifier_lcfirst($_smarty_tpl->tpl_vars['singular']->value);?>
.id == '') {
			// this is a new record, there is no need to contact the server
			page.renderModelView(false);
		} else {
			app.showProgress('modelLoader');

			// fetch the model from the server so we are not updating stale data
			page.<?php echo smarty_modifier_lcfirst($_smarty_tpl->tpl_vars['singular']->value);?>
.fetch({

				success: function() {
					// data returned from the server.  render the model view
					page.renderModelView(true);
				},

				error: function(m, r) {
					app.appendAlert(app.getErrorMessage(r), 'alert-error',0,'modelAlert');
					app.hideProgress('modelLoader');
				}

			});
		}

	},

	/**
	 * Render the model template in the popup
	 * @param bool show the delete button
	 */
	renderModelView: function(showDeleteButton)	{
		page.modelView.render();

		app.hideProgress('modelLoader');

		// initialize any special controls
		try {
			$('.date-picker')
				.datepicker()
				.on('changeDate', function(ev){
					$('.date-picker').datepicker('hide');
				});
		} catch (error) {
			// this happens if the datepicker input.value isn't a valid date
			if (console) console.log('datepicker error: '+error.message);
		}
		
		$('.timepicker-default').timepicker({ defaultTime: 'value' });

<?php  $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['table']->value->Columns; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['column']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['column']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['column']->key => $_smarty_tpl->tpl_vars['column']->value) {
$_smarty_tpl->tpl_vars['column']->_loop = true;
 $_smarty_tpl->tpl_vars['column']->iteration++;
 $_smarty_tpl->tpl_vars['column']->last = $_smarty_tpl->tpl_vars['column']->iteration === $_smarty_tpl->tpl_vars['column']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['columnsForEach']['last'] = $_smarty_tpl->tpl_vars['column']->last;
?>
<?php if ($_smarty_tpl->tpl_vars['column']->value->Key=="MUL"&&$_smarty_tpl->tpl_vars['column']->value->Constraints) {?>
<?php $_smarty_tpl->tpl_vars['constraint'] = new Smarty_variable($_smarty_tpl->tpl_vars['table']->value->Constraints[$_smarty_tpl->tpl_vars['column']->value->Constraints[0]], null, 0);?>
		// populate the dropdown options for <?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>

		// TODO: load only the selected value, then fetch all options when the drop-down is clicked
		var <?php echo htmlspecialchars(smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix)), ENT_QUOTES, 'UTF-8', true);?>
Values = new model.<?php echo $_smarty_tpl->tpl_vars['tableInfos']->value[$_smarty_tpl->tpl_vars['constraint']->value->ReferenceTableName]['singular'];?>
Collection();
		<?php echo htmlspecialchars(smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix)), ENT_QUOTES, 'UTF-8', true);?>
Values.fetch({
			success: function(c){
				var dd = $('#<?php echo htmlspecialchars(smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix)), ENT_QUOTES, 'UTF-8', true);?>
');
				dd.append('<option value=""></option>');
				c.forEach(function(item,index) {
					dd.append(app.getOptionHtml(
						item.get('<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['constraint']->value->ReferenceKeyColumnNoPrefix));?>
'),
						item.get('<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['constraint']->value->ReferenceTable->GetDescriptorName()));?>
'), // TODO: change fieldname if the dropdown doesn't show the desired column
						page.<?php echo smarty_modifier_lcfirst($_smarty_tpl->tpl_vars['singular']->value);?>
.get('<?php echo htmlspecialchars(smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix)), ENT_QUOTES, 'UTF-8', true);?>
') == item.get('<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['constraint']->value->ReferenceKeyColumnNoPrefix));?>
')
					));
				});
				
				if (!app.browserSucks()) {
					dd.combobox();
					$('div.combobox-container + span.help-inline').hide(); // TODO: hack because combobox is making the inline help div have a height
				}

			},
			error: function(collection,response,scope) {
				app.appendAlert(app.getErrorMessage(response), 'alert-error',0,'modelAlert');
			}
		});

<?php } elseif ($_smarty_tpl->tpl_vars['column']->value->IsEnum()) {?>
	if (!app.browserSucks()) {
		$('#<?php echo htmlspecialchars(smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix)), ENT_QUOTES, 'UTF-8', true);?>
').combobox();
		$('div.combobox-container + span.help-inline').hide(); // TODO: hack because combobox is making the inline help div have a height
	}

<?php }?>
<?php } ?>

		if (showDeleteButton) {
			// attach click handlers to the delete buttons

			$('#delete<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
Button').click(function(e) {
				e.preventDefault();
				$('#confirmDelete<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
Container').show('fast');
			});

			$('#cancelDelete<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
Button').click(function(e) {
				e.preventDefault();
				$('#confirmDelete<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
Container').hide('fast');
			});

			$('#confirmDelete<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
Button').click(function(e) {
				e.preventDefault();
				page.deleteModel();
			});

		} else {
			// no point in initializing the click handlers if we don't show the button
			$('#delete<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
ButtonContainer').hide();
		}
	},

	/**
	 * update the model that is currently displayed in the dialog
	 */
	updateModel: function() {
		// reset any previous errors
		$('#modelAlert').html('');
		$('.control-group').removeClass('error');
		$('.help-inline').html('');

		// if this is new then on success we need to add it to the collection
		var isNew = page.<?php echo smarty_modifier_lcfirst($_smarty_tpl->tpl_vars['singular']->value);?>
.isNew();

		app.showProgress('modelLoader');

		page.<?php echo smarty_modifier_lcfirst($_smarty_tpl->tpl_vars['singular']->value);?>
.save({
<?php  $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['table']->value->Columns; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['column']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['column']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['column']->key => $_smarty_tpl->tpl_vars['column']->value) {
$_smarty_tpl->tpl_vars['column']->_loop = true;
 $_smarty_tpl->tpl_vars['column']->iteration++;
 $_smarty_tpl->tpl_vars['column']->last = $_smarty_tpl->tpl_vars['column']->iteration === $_smarty_tpl->tpl_vars['column']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['columnsForEach']['last'] = $_smarty_tpl->tpl_vars['column']->last;
?>
<?php if ($_smarty_tpl->tpl_vars['column']->value->Extra!='auto_increment') {?>
			'<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
': <?php if ($_smarty_tpl->tpl_vars['column']->value->Type=="datetime"||$_smarty_tpl->tpl_vars['column']->value->Type=="timestamp") {?>$('input#<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
').val()+' '+$('input#<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
-time').val()<?php } else { ?>$('<?php if ((($_smarty_tpl->tpl_vars['column']->value->Key=="MUL"&&$_smarty_tpl->tpl_vars['column']->value->Constraints)||$_smarty_tpl->tpl_vars['column']->value->IsEnum())) {?>select<?php } elseif ($_smarty_tpl->tpl_vars['column']->value->Type=='text'||$_smarty_tpl->tpl_vars['column']->value->Type=='tinytext'||$_smarty_tpl->tpl_vars['column']->value->Type=='mediumtext'||$_smarty_tpl->tpl_vars['column']->value->Type=='longtext') {?>textarea<?php } else { ?>input<?php }?>#<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
').val()<?php }?><?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['columnsForEach']['last']) {?>,<?php }?>
<?php }?>

<?php } ?>
		}, {
			wait: true,
			success: function(){
				$('#<?php echo smarty_modifier_lcfirst($_smarty_tpl->tpl_vars['singular']->value);?>
DetailDialog').modal('hide');
				setTimeout("app.appendAlert('<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
 was sucessfully " + (isNew ? "inserted" : "updated") + "','alert-success',3000,'collectionAlert')",500);
				app.hideProgress('modelLoader');

				// if the collection was initally new then we need to add it to the collection now
				if (isNew) { page.<?php echo smarty_modifier_lcfirst($_smarty_tpl->tpl_vars['plural']->value);?>
.add(page.<?php echo smarty_modifier_lcfirst($_smarty_tpl->tpl_vars['singular']->value);?>
) }

				if (model.reloadCollectionOnModelUpdate) {
					// re-fetch and render the collection after the model has been updated
					page.fetch<?php echo $_smarty_tpl->tpl_vars['plural']->value;?>
(page.fetchParams,true);
				}
		},
			error: function(model,response,scope){

				app.hideProgress('modelLoader');

				app.appendAlert(app.getErrorMessage(response), 'alert-error',0,'modelAlert');

				try {
					var json = $.parseJSON(response.responseText);

					if (json.errors) {
						$.each(json.errors, function(key, value) {
							$('#'+key+'InputContainer').addClass('error');
							$('#'+key+'InputContainer span.help-inline').html(value);
							$('#'+key+'InputContainer span.help-inline').show();
						});
					}
				} catch (e2) {
					if (console) console.log('error parsing server response: '+e2.message);
				}
			}
		});
	},

	/**
	 * delete the model that is currently displayed in the dialog
	 */
	deleteModel: function()	{
		// reset any previous errors
		$('#modelAlert').html('');

		app.showProgress('modelLoader');

		page.<?php echo smarty_modifier_lcfirst($_smarty_tpl->tpl_vars['singular']->value);?>
.destroy({
			wait: true,
			success: function(){
				$('#<?php echo smarty_modifier_lcfirst($_smarty_tpl->tpl_vars['singular']->value);?>
DetailDialog').modal('hide');
				setTimeout("app.appendAlert('The <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
 record was deleted','alert-success',3000,'collectionAlert')",500);
				app.hideProgress('modelLoader');

				if (model.reloadCollectionOnModelUpdate) {
					// re-fetch and render the collection after the model has been updated
					page.fetch<?php echo $_smarty_tpl->tpl_vars['plural']->value;?>
(page.fetchParams,true);
				}
			},
			error: function(model,response,scope) {
				app.appendAlert(app.getErrorMessage(response), 'alert-error',0,'modelAlert');
				app.hideProgress('modelLoader');
			}
		});
	}
};

<?php }} ?>
