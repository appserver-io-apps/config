'use strict';

/**
 * @ngdoc function
 * @name configApp.controller:AboutCtrl
 * @description
 * # AboutCtrl
 * Controller of the configApp
 */
angular.module('configApp')
  .controller('AboutCtrl', function ($scope) {
    $scope.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma'
    ];
  });
