'use strict';

/**
 * @ngdoc function
 * @name configApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the configApp
 */
angular.module('configApp').controller('MainCtrl', function ($scope, fileService) {

    var editor;

    $scope.aceLoaded = function(_editor) {
        // save editor ref to main context
        editor = _editor;
        // load configuration file and set content to editor
        fileService.getContents('appserver/appserver.xml').then(function(response) {
            _editor.setValue(response.data);
        });
    };

    $scope.save = function() {
        var content = editor.getValue();
        // load configuration file and set content to editor
        fileService.setContents(content, 'appserver/appserver.xml').then(function(response) {
            console.log('saved successfully');
        });
    };

});
