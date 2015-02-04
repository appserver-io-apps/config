'use strict';

/**
 * @ngdoc function
 * @name configApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the configApp
 */
angular.module('configApp').controller('MainCtrl', function ($scope, fileService) {

    $scope.aceLoaded = function(_editor) {
        // load configuration file and set content to editor
        fileService.getContents('appserver/appserver.xml').then(function(response) {
            console.log(response);
            _editor.setValue(response.data);
        });
    };

});
