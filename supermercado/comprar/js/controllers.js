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
}])

.controller('CarritoCtrl', ['$scope', '$routeParams', '$http', '$rootScope', '$location', '$sce', function($scope, $routeParams, $http, $rootScope, $location, $sce) {
  //Do something
}])

.controller('CheckoutCtrl', ['$scope', '$routeParams', '$http', '$rootScope', '$location', '$sce', function($scope, $routeParams, $http, $rootScope, $location, $sce) {
  //Do something
}])