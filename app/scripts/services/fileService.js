'use strict';

/**
 * @ngdoc service
 * @name configApp.fileService
 * @description
 * # fileService
 * Service in the configApp.
 */
angular.module('configApp')
  .service('fileService', function ($http) {

        var apiBaseUrl = '/config/service/';

        function call(action, method, params) {
            var req = {
                method: method,
                url: apiBaseUrl + action + '.do',
                data: params
            };
            if (method === 'GET') {
                req.params = params;
            } else {
                req.data = params;
            }
            return $http(req);
        }

        function getContents(filename) {
            var params = {
                'filename': filename
            };
            return call('file', 'GET', params);
        }

        function setContents(content, filename) {
            var params = {
                'content': content,
                'filename': filename
            }
            return call('file', 'POST', params)
        }

        return {
            getContents: getContents,
            setContents: setContents
        };
  });
