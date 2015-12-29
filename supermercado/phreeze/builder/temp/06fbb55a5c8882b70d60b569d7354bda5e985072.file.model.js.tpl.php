<?php /* Smarty version Smarty-3.1.18, created on 2015-12-21 15:00:08
         compiled from "/var/www/html/phreeze/builder/code/phreeze.backbone/scripts/model.js.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28058537656783e28ae1953-44194527%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06fbb55a5c8882b70d60b569d7354bda5e985072' => 
    array (
      0 => '/var/www/html/phreeze/builder/code/phreeze.backbone/scripts/model.js.tpl',
      1 => 1445574211,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28058537656783e28ae1953-44194527',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'appname' => 0,
    'enableLongPolling' => 0,
    'tables' => 0,
    'table' => 0,
    'tableInfos' => 0,
    'singular' => 0,
    'column' => 0,
    'plural' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56783e28bc7c19_07366781',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56783e28bc7c19_07366781')) {function content_56783e28bc7c19_07366781($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_studlycaps')) include '/var/www/html/phreeze/libs/smarty/plugins/modifier.studlycaps.php';
if (!is_callable('smarty_modifier_lcfirst')) include '/var/www/html/phreeze/libs/smarty/plugins/modifier.lcfirst.php';
?>/**
 * backbone model definitions for <?php echo $_smarty_tpl->tpl_vars['appname']->value;?>

 */

/**
 * Use emulated HTTP if the server doesn't support PUT/DELETE or application/json requests
 */
Backbone.emulateHTTP = false;
Backbone.emulateJSON = false;

var model = {};

/**
 * long polling duration in miliseconds.  (5000 = recommended, 0 = disabled)
 * warning: setting this to a low number will increase server load
 */
model.longPollDuration = <?php if ($_smarty_tpl->tpl_vars['enableLongPolling']->value!='0') {?>5000<?php } else { ?>0<?php }?>;

/**
 * whether to refresh the collection immediately after a model is updated
 */
model.reloadCollectionOnModelUpdate = true;


/**
 * a default sort method for sorting collection items.  this will sort the collection
 * based on the orderBy and orderDesc property that was used on the last fetch call
 * to the server. 
 */
model.AbstractCollection = Backbone.Collection.extend({
	totalResults: 0,
	totalPages: 0,
	currentPage: 0,
	pageSize: 0,
	orderBy: '',
	orderDesc: false,
	lastResponseText: null,
	lastRequestParams: null,
	collectionHasChanged: true,
	
	/**
	 * fetch the collection from the server using the same options and 
	 * parameters as the previous fetch
	 */
	refetch: function() {
		this.fetch({ data: this.lastRequestParams })
	},
	
	/* uncomment to debug fetch event triggers
	fetch: function(options) {
            this.constructor.__super__.fetch.apply(this, arguments);
	},
	// */
	
	/**
	 * client-side sorting baesd on the orderBy and orderDesc parameters that
	 * were used to fetch the data from the server.  Backbone ignores the
	 * order of records coming from the server so we have to sort them ourselves
	 */
	comparator: function(a,b) {
		
		var result = 0;
		var options = this.lastRequestParams;
		
		if (options && options.orderBy) {
			
			// lcase the first letter of the property name
			var propName = options.orderBy.charAt(0).toLowerCase() + options.orderBy.slice(1);
			var aVal = a.get(propName);
			var bVal = b.get(propName);
			
			if (isNaN(aVal) || isNaN(bVal)) {
				// treat comparison as case-insensitive strings
				aVal = aVal ? aVal.toLowerCase() : '';
				bVal = bVal ? bVal.toLowerCase() : '';
			} else {
				// treat comparision as a number
				aVal = Number(aVal);
				bVal = Number(bVal);
			}
			
			if (aVal < bVal) {
				result = options.orderDesc ? 1 : -1;
			} else if (aVal > bVal) {
				result = options.orderDesc ? -1 : 1;
			}
		}
		
		return result;

	},
	/**
	 * override parse to track changes and handle pagination
	 * if the server call has returned page data
	 */
	parse: function(response, options) {

		// the response is already decoded into object form, but it's easier to
		// compary the stringified version.  some earlier versions of backbone did
		// not include the raw response so there is some legacy support here
		var responseText = options && options.xhr ? options.xhr.responseText : JSON.stringify(response);
		this.collectionHasChanged = (this.lastResponseText != responseText);
		this.lastRequestParams = options ? options.data : undefined;
		
		// if the collection has changed then we need to force a re-sort because backbone will
		// only resort the data if a property in the model has changed
		if (this.lastResponseText && this.collectionHasChanged) this.sort({ silent:true });
		
		this.lastResponseText = responseText;
		
		var rows;

		if (response.currentPage) {
			rows = response.rows;
			this.totalResults = response.totalResults;
			this.totalPages = response.totalPages;
			this.currentPage = response.currentPage;
			this.pageSize = response.pageSize;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		} else {
			rows = response;
			this.totalResults = rows.length;
			this.totalPages = 1;
			this.currentPage = 1;
			this.pageSize = this.totalResults;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}

		return rows;
	}
});

<?php  $_smarty_tpl->tpl_vars['table'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['table']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tables']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['table']->key => $_smarty_tpl->tpl_vars['table']->value) {
$_smarty_tpl->tpl_vars['table']->_loop = true;
?><?php if (isset($_smarty_tpl->tpl_vars['tableInfos']->value[$_smarty_tpl->tpl_vars['table']->value->Name])) {?>
<?php $_smarty_tpl->tpl_vars['singular'] = new Smarty_variable($_smarty_tpl->tpl_vars['tableInfos']->value[$_smarty_tpl->tpl_vars['table']->value->Name]['singular'], null, 0);?>
<?php $_smarty_tpl->tpl_vars['plural'] = new Smarty_variable($_smarty_tpl->tpl_vars['tableInfos']->value[$_smarty_tpl->tpl_vars['table']->value->Name]['plural'], null, 0);?>
/**
 * <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
 Backbone Model
 */
model.<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
Model = Backbone.Model.extend({
	urlRoot: 'api/<?php echo mb_strtolower($_smarty_tpl->tpl_vars['singular']->value, 'UTF-8');?>
',
	idAttribute: '<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['table']->value->GetPrimaryKeyName()));?>
',
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
	<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
: '',
<?php } ?>
	defaults: {
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
		'<?php echo smarty_modifier_lcfirst(smarty_modifier_studlycaps($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix));?>
': <?php if ($_smarty_tpl->tpl_vars['column']->value->NameWithoutPrefix==$_smarty_tpl->tpl_vars['table']->value->GetPrimaryKeyName()) {?>null<?php } elseif ($_smarty_tpl->tpl_vars['column']->value->Type=="date"||$_smarty_tpl->tpl_vars['column']->value->Type=="datetime") {?>new Date()<?php } else { ?>''<?php }?><?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['columnsForEach']['last']) {?>,<?php }?>

<?php } ?>
	}
});

/**
 * <?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
 Backbone Collection
 */
model.<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
Collection = model.AbstractCollection.extend({
	url: 'api/<?php echo mb_strtolower($_smarty_tpl->tpl_vars['plural']->value, 'UTF-8');?>
',
	model: model.<?php echo $_smarty_tpl->tpl_vars['singular']->value;?>
Model
});

<?php }?><?php } ?><?php }} ?>
