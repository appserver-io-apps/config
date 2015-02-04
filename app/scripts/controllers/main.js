'use strict';

/**
 * @ngdoc function
 * @name configApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the configApp
 */
angular.module('configApp')
  .controller('MainCtrl', function ($scope) {
    $scope.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma'
    ];
  });
