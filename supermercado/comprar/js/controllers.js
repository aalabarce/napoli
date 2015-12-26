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
}])

.controller('RubroDetailCtrl', ['$scope', '$routeParams', '$http', '$rootScope', '$location', '$sce', function($scope, $routeParams, $http, $rootScope, $location, $sce) {
  //Do something
  $scope.idRubro = $routeParams.rubroId;
  
  // ***** START API ***** Get all Rubros for filter
  $scope.getAllRubros = function() {
    $http({
        method: 'GET',
        url: $rootScope.serverURL + "/api/productos?rubro=" + $scope.idRubro
    })
    .success(function(data, status){

        // Add 'todos' to api result before spliting the array. Set id to 'all' for genting all titles in getTitlesFromGender
        //data.unshift({'nombre': 'Todos', 'id': 'all'});
        
        // Save the result in var
        $scope.productos = data.rows;

        console.log($scope.productos[0].descripcion, status);  //remove for production
    })
    .error(function(data, status){
        console.log(data, status); //remove for production
    });
  }
  $scope.getAllRubros();
  // ***** END API *****

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
  
  $rootScope.addToCart("3630", "17665", "300b4D MEGATUBE QUESO", "88", "1", "7", "4");

}])

.controller('CarritoCtrl', ['$scope', '$routeParams', '$http', '$rootScope', '$location', '$sce', function($scope, $routeParams, $http, $rootScope, $location, $sce) {
  //Do something
  $scope.saveCart = JSON.parse(localStorage["cart"]);
  $scope.deleteFromCart = function (index) {
  	//alert(index);
	$scope.saveCart.splice(index, 1);
	localStorage["cart"] = JSON.stringify($scope.saveCart);
  }

}])

.controller('CheckoutCtrl', ['$scope', '$routeParams', '$http', '$rootScope', '$location', '$sce', function($scope, $routeParams, $http, $rootScope, $location, $sce) {
  //Do something
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

}])