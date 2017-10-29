var myApp = angular.module("myApp", []).config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
});

myApp.controller("ctrlPlace", function($scope) {

    $scope.items = [];

    axios.get('place/1').then(response => {
            $scope.items = response.data;
            $scope.$digest();
        })
        .catch(error => {
            console.log(error);
        });
});