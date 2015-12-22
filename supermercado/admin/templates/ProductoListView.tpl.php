<?php
	$this->assign('title','Administrador de Productos | Productos');
	$this->assign('nav','productos');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/productos.js").wait(function(){
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
	<i class="icon-th-list"></i> Productos
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="productoCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Id">Id<% if (page.orderBy == 'Id') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_CodProveedor">Cod Proveedor<% if (page.orderBy == 'CodProveedor') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Descripcion">Descripcion<% if (page.orderBy == 'Descripcion') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_UnidadMedida">Unidad Medida<% if (page.orderBy == 'UnidadMedida') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Uxb">Uxb<% if (page.orderBy == 'Uxb') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_Rubro">Rubro<% if (page.orderBy == 'Rubro') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('id')) %>">
				<td><%= _.escape(item.get('id') || '') %></td>
				<td><%= _.escape(item.get('codProveedor') || '') %></td>
				<td><%= _.escape(item.get('descripcion') || '') %></td>
				<td><%= _.escape(item.get('unidadMedida') || '') %></td>
				<td><%= _.escape(item.get('uxb') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('rubro') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="productoModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idInputContainer" class="control-group">
					<label class="control-label" for="id">Id</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="id"><%= _.escape(item.get('id') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="codProveedorInputContainer" class="control-group">
					<label class="control-label" for="codProveedor">Cod Proveedor</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="codProveedor" placeholder="Cod Proveedor" value="<%= _.escape(item.get('codProveedor') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="descripcionInputContainer" class="control-group">
					<label class="control-label" for="descripcion">Descripcion</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="descripcion" placeholder="Descripcion" value="<%= _.escape(item.get('descripcion') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="unidadMedidaInputContainer" class="control-group">
					<label class="control-label" for="unidadMedida">Unidad Medida</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="unidadMedida" placeholder="Unidad Medida" value="<%= _.escape(item.get('unidadMedida') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="uxbInputContainer" class="control-group">
					<label class="control-label" for="uxb">Uxb</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="uxb" placeholder="Uxb" value="<%= _.escape(item.get('uxb') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="rubroInputContainer" class="control-group">
					<label class="control-label" for="rubro">Rubro</label>
					<div class="controls inline-inputs">
						<select id="rubro" name="rubro"></select>
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteProductoButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteProductoButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Producto</button>
						<span id="confirmDeleteProductoContainer" class="hide">
							<button id="cancelDeleteProductoButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteProductoButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="productoDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Producto
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="productoModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveProductoButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="productoCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newProductoButton" class="btn btn-primary">Add Producto</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
