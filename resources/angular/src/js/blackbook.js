var angular = require('angular');

var app = angular.module('blackbook', []);

app.controller('MainController', function($scope, $http, blacklistFilter) {
    $scope.people = [];
    $scope.search = '';

    $scope.blacklistCount = function () {
        return blacklistFilter($scope.people).length
    };

    $scope.loadPeople = function () {
        $scope.getRequest('index').then(function (response) {
            $scope.people = response.data.data;
        });
    };

    $scope.hate = function (person, $event) {
        $event.preventDefault();

        person.hates += 1;

        $scope.postRequest('hate', person.id);
    };

    $scope.unhate = function (person, $event) {
        $event.preventDefault();

        person.hates = 0;

        $scope.postRequest('unhate', person.id);
    };

    $scope.getRequest = function (action, param) {
        if(param === void 0) {
            param = '';
        }

        var url = getApiUrl(action, param);

        return $http.get(url);
    };

    $scope.postRequest = function (action, param) {
        if(param === void 0) {
            param = '';
        }

        var url = getApiUrl(action, param);

        return $http.post(url);
    };

    var getApiUrl = function (action, param) {
        return 'api\\' + action + '\\' + param;
    };

    $scope.loadPeople();
});

app.filter('blacklist', function() {
    return function(input) {
        return input.filter(function (item) {
            item.hates = Number(item.hates);
            return item.hates > 0;
        });
    };
});

module.exports = app;