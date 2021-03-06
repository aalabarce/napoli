'use strict';

/* Controllers */

angular.module('supermercadoNapoliControllers', [])

.controller('HomeCtrl', ['$scope', '$routeParams', '$http', '$rootScope', '$location', '$sce', function($scope, $routeParams, $http, $rootScope, $location, $sce) {
  //Do something
  window.scrollTo(0,0);

  // ***** START API ***** Get all Rubros for filter
  $scope.getAllRubros = function() {
    $http({
        method: 'GET',
        url: $rootScope.serverURL + "/api/rubros"
    })
    .success(function(data, status){

        // Add 'todos' to api result before spliting the array. Set id to 'all' for genting all titles in getTitlesFromGender
        //data.unshift({'nombre': 'Todos', 'id': 'all'});
        
        // Save the result in var
        $scope.rubros = data.rows;

        console.log($scope.rubros[0].nombre, status);  //remove for production
    })
    .error(function(data, status){
        console.log(data, status); //remove for production
    });
  }
  $scope.getAllRubros();
  // ***** END API *****

  //Si el usuario envio el pedido, es redirigido a Home con un parametro en la URL. Si llega ese parametro, eliminar el carrito.
  if($routeParams.form) {
  	localStorage["cart"].clear(); //Vacio el carrito
  }

  /*$scope.goToRubro = function(id) {
  	$location.path("/rubro/" + id).replace();
  }*/

}])

.controller('RubroDetailCtrl', ['$scope', '$routeParams', '$http', '$rootScope', '$location', '$sce', function($scope, $routeParams, $http, $rootScope, $location, $sce) {
  //Do something
  $scope.idRubro = $routeParams.rubroId;
  
  // ***** START API ***** Get all Rubros for filter
  $scope.getAllRubros = function() {
  $scope.showPreloader = true; // Show preloader gif
    $http({
        method: 'GET',
        url: $rootScope.serverURL + "/api/productos?rubro=" + $scope.idRubro
    })
    .success(function(data, status){

        // Add 'todos' to api result before spliting the array. Set id to 'all' for genting all titles in getTitlesFromGender
        //data.unshift({'nombre': 'Todos', 'id': 'all'});
        
        // Save the result in var
        $scope.showPreloader = false; // Hide preloader gif
        $scope.productos = data.rows;

        console.log($scope.productos[0].descripcion, status);  //remove for production
    })
    .error(function(data, status){
    	$scope.showPreloader = false; // Hide preloader gif
        console.log(data, status); //remove for production
    });
  }
  $scope.getAllRubros();
  // ***** END API *****

  $scope.buyProduct = function (id) {
  	var cantidadEsteProducto = document.getElementById('cantidad' + id).value;
    for(var i=0;i<$scope.productos.length;i++){
    	if($scope.productos[i].id == id){
        	$rootScope.addToCart($scope.productos[i].id, $scope.productos[i].codProveedor, $scope.productos[i].descripcion, $scope.productos[i].unidadMedida, $scope.productos[i].uxb, $scope.productos[i].rubro, cantidadEsteProducto);
        	break;
    	}
    }
  }

  $scope.getRubrofromID = function(id) {


	for(var i=0;i<$rootScope.allRubros.length;i++){
	  if($rootScope.allRubros[i].id == id){
	    $scope.nameRubro = $rootScope.allRubros[i].nombre;
	    break;
	  }
	}

  }

  $scope.getRubrofromID($scope.idRubro);

}])

.controller('BuscarCtrl', ['$scope', '$routeParams', '$http', '$rootScope', '$location', '$sce', function($scope, $routeParams, $http, $rootScope, $location, $sce) {
  //Do something
  
  // ***** START INPUT SEARCH RESULT ***** */*/*/*/*/NOT FINISHED (API NOT DEVELOPED)/*/*/*/*/*/
  // Get value from input search and get data from API
  $scope.showCarousel = true;
  $scope.$watch('searchInputText', function(newValue, oldValue) {
    /*
    if (newValue !== oldValue) { // Ignore the initial load when watching model changes
      window.scrollTo(0,0);
      if($rootScope.searchInputText) {
        $scope.showCarousel = false;
      }
      else {
        $scope.showCarousel = true;
      }
      */
      $scope.searchBuscador = $rootScope.searchInputText;
      $scope.getFilterProducts(); // This function will be call when $rootScope.searchInputText changes.
    //}
  });
  // ***** END INPUT SEARCH RESULT *****

  // ***** START API ***** Get All titles with filters
  $scope.filterTitles = true; // Set var to true for not showing error message
  $scope.getFilterProducts = function() {
    $scope.showPreloader = true; // Show preloader gif
    if($scope.searchBuscador) { // If the search input is not empty
      $http({
          method: 'GET',
          url: $rootScope.serverURL + "/api/productos?filter=" + $scope.searchBuscador
      })
      .success(function(data, status){
          $scope.filterProducts = data.rows;
          $scope.showPreloader = false; // Hide preloader gif
          console.log(data, status);  //remove for production
      })
      .error(function(data, status){
          $scope.filterProducts = ""; // Set var to lenght cero for showing error message
          $scope.showPreloader = false; // Hide preloader gif
          console.log(data, status); //remove for production
      });
    } else { // When the search input is empty
      $location.path("/").replace();
    }
  }
  // ***** END API *****

  $scope.buyProduct = function (id) {
  	var cantidadEsteProducto = document.getElementById('cantidad' + id).value;;
    for(var i=0;i<$scope.filterProducts.length;i++){
    	if($scope.filterProducts[i].id == id){
        	$rootScope.addToCart($scope.filterProducts[i].id, $scope.filterProducts[i].codProveedor, $scope.filterProducts[i].descripcion, $scope.filterProducts[i].unidadMedida, $scope.filterProducts[i].uxb, $scope.filterProducts[i].rubro, cantidadEsteProducto);
        	break;
    	}
    }
  }

  $scope.getRubrofromID = function(id) {


	for(var i=0;i<$rootScope.allRubros.length;i++){
	  if($rootScope.allRubros[i].id == id){
	    return $rootScope.allRubros[i].nombre;
	    break;
	  }
	}

  }

}])

.controller('CarritoCtrl', ['$scope', '$routeParams', '$http', '$rootScope', '$location', '$sce', function($scope, $routeParams, $http, $rootScope, $location, $sce) {
  //Do something
  $scope.saveCart = JSON.parse(localStorage["cart"]);
  
  $scope.deleteFromCart = function (index) {
  	//alert(index);
	$scope.saveCart.splice(index, 1);
	localStorage["cart"] = JSON.stringify($scope.saveCart);
  }

  $scope.updateCart = function (index) {
  	var newCantidad = document.getElementById('cantidad' + index).value;
	$scope.saveCart[index].unidades = newCantidad;
	localStorage["cart"] = JSON.stringify($scope.saveCart);
  }

  $scope.goToCheckout = function () {
  	$location.path("/checkout").replace();
  }


  $scope.getRubrofromID = function(id) {


	for(var i=0;i<$rootScope.allRubros.length;i++){
	  if($rootScope.allRubros[i].id == id){
	    return $rootScope.allRubros[i].nombre;
	    break;
	  }
	}

  }
  
}])

.controller('CheckoutCtrl', ['$scope', '$routeParams', '$http', '$rootScope', '$location', '$sce', function($scope, $routeParams, $http, $rootScope, $location, $sce) {
  //Do something

  $scope.getRubrofromID = function(id) {
	for(var i=0;i<$rootScope.allRubros.length;i++){
	  if($rootScope.allRubros[i].id == id){
	    return $rootScope.allRubros[i].nombre;
	    break;
	  }
	}
  }

  $scope.sendPedido = function () {
  	//$scope.name = document.getElementById('nameForm').value;
  	//$scope.email = document.getElementById('emailForm').value;
  	//$scope.tel = document.getElementById('telForm').value;
  	//$scope.direc = document.getElementById('direcForm').value;

  	$scope.sendCart = JSON.parse(localStorage["cart"]);
  	$scope.htmlCart = "<br /><br /><table><thead><tr><th>ID</th><th>Codigo Proveedor</th><th>Descripcion</th><th>Unidad de medida</th><th>uxb</th><th>Rubro</th><th>Cantidad</th></tr></thead>";
    $scope.htmlCart += "<tbody>"
    for(var i=0;i<$scope.sendCart.length;i++){

    	var rubroName = $scope.getRubrofromID($scope.sendCart[i].id);

		$scope.htmlCart += "<tr><td>" + $scope.sendCart[i].id + "</td><td>" + $scope.sendCart[i].codProveedor + "</td><td>" + $scope.sendCart[i].descripcion + "</td><td>" + $scope.sendCart[i].unidadMedida + "</td><td>" + $scope.sendCart[i].uxb + "</td><td>" + rubroName + "</td><td>" + $scope.sendCart[i].unidades + "</td></tr>";
    }

 	$scope.hrmlCart += "</tbody></table>"
  	//var table = "<table><thead><tr><th>ID</th><th>Codigo Proveedor</th><th>Descripcion</th><th>Unidad de medida</th><th>uxb</th><th>Rubro</th><th>Cantidad</th></tr></thead>";

  	document.getElementById('pedidoForm').value = $sce.trustAsHtml($scope.htmlCart);
  	//$scope.pedido = document.getElementById('pedidoForm').value;


  	//var postData = { 'nameForm': $scope.name, 'emailForm': $scope.email, 'telForm': $scope.tel, 'direcForm': $scope.direc, 'pedidoForm': $scope.pedido };
	

    //$http.post('contacto.php', postData) .success(function(data) { });

  }

}])

.controller('HeaderCtrl', ['$scope', '$http', '$rootScope', '$modal', '$location', '$routeParams', function($scope, $http, $rootScope, $modal, $location, $routeParams) {
  $rootScope.searchInputText = ""; // Set var to emty string, because if not is 'undefined'
  $scope.change = function () {
  	//alert($scope.searchInput);
    if (angular.isUndefined($scope.searchInput) || $scope.searchInput == null) {
      $rootScope.searchInputText = "";
    }
    else {
      $rootScope.searchInputText = $scope.searchInput;
      $location.path("/buscar").replace();
    }
  }

  /*
  $scope.$watch('searchInputText', function(newValue, oldValue) {
    if (newValue !== oldValue) { 
      $scope.searchInput = $rootScope.searchInputText;
    }
  });
	*/
  $scope.cancelSearch = function() {
    $rootScope.searchInputText = "";
  }

  $scope.goToCarrito = function () {
  	$location.path("/carrito").replace();
  }

}])