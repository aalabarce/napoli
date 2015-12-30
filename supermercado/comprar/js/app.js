'use strict';

/* App Module */

//angular.module('bloodWindow', ['ui.router', 'bloodWindowAnimations', 'bloodWindowControllers', 'bloodWindowServices' ])

angular.module('supermercadoNapoli', ['ngRoute', 'ui.bootstrap', 'supermercadoNapoliControllers', 'smoothScroll' ])

    .config(['$routeProvider', '$locationProvider', function($routeProvider, $locationProvider) {
      $routeProvider.
        when('/', {
          templateUrl: 'templates/content.home.html',
          controller: 'HomeCtrl'
        }).
        when('/rubro/:rubroId', {
          templateUrl: 'templates/content.rubro.detail.html',
          controller: 'RubroDetailCtrl'
        }).
        when('/buscar', {
          templateUrl: 'templates/content.buscar.html',
          controller: 'BuscarCtrl'
        }).
        when('/carrito', {
          templateUrl: 'templates/content.carrito.html',
          controller: 'CarritoCtrl'
        }).
        when('/checkout', {
          templateUrl: 'templates/content.checkout.html',
          controller: 'CheckoutCtrl'
        }).
        otherwise({
          redirectTo: '/'
        });

        /*
        // ELIMINATE "#" FROM URL. Check browser support
        if(window.history && window.history.pushState){
            //$locationProvider.html5Mode(true); will cause an error $location in HTML5 mode requires a  tag to be present! Unless you set baseUrl tag after head tag like so: <head> <base href="/">

         // to know more about setting base URL visit: https://docs.angularjs.org/error/$location/nobase

         // if you don't wish to set base URL then use this
         $locationProvider.html5Mode({
                 enabled: true,
                 requireBase: false
          });
        }
        */
    }])

    .run(['$rootScope', '$location', '$http', function($rootScope, $location, $http) {
      
      //if($location.path())
      if($location.host() == "walrussolutions.com") { // For production
        $rootScope.serverURL = "/napoli_admin"; // URL for real app
        $rootScope.imagesSrc = "/uploads";
      } else { // For development
        $rootScope.serverURL = "/napoli_admin"; // URL for working local
        $rootScope.imagesSrc = "/uploads";
      }

      $rootScope.getAllRubrosFromAPI = function() {
        $http({
            method: 'GET',
            url: $rootScope.serverURL + "/api/rubros"
        })
        .success(function(data, status){

            // Save the result in var
            $rootScope.allRubros = data.rows;

        })
        .error(function(data, status){
            console.log(data, status); //remove for production
        });
      }
      $rootScope.getAllRubrosFromAPI();

      $rootScope.addToCart = function(id, codProveedor, descripcion, unidadMedida, uxb, rubro, unidades) {
          //localStorage.setItem(id, JSON.stringify(newProdcut));
          //var newProdcut = {"id": "' + id +'", "codProveedor": "' + codProveedor + '", "descripcion": "' + descripcion + '", "unidadMedida": "' + unidadMedida + '", "uxb": "' + uxb + '", "rubro": "' + rubro + '"};
          if(localStorage["cart"]) {
              var cart = JSON.parse(localStorage["cart"]);
          } else {
              var cart = [];
          }
            var newProdcut = {"id": id, "codProveedor": codProveedor, "descripcion": descripcion, "unidadMedida": unidadMedida, "uxb": uxb, "rubro": rubro, "unidades": unidades};
            cart.push(newProdcut);
            localStorage["cart"] = JSON.stringify(cart);

            var retrievedObject = JSON.parse(localStorage["cart"]);
        console.log('retrievedObject: ', retrievedObject);

      };

    }]);
