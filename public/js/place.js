myApp.controller("ctrlPlace", function($scope) {

    $scope.places = [];

    axios.get('place/1').then(response => {
            $scope.places = response.data;
            $scope.$digest();
        })
        .catch(error => {
            console.log(error);
        });
});