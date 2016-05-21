angular.module('jsonService', ['ngResource'])
.factory('JsonService', function($resource) {
  return $resource('php/retrieve-all-thoughts.php');
});