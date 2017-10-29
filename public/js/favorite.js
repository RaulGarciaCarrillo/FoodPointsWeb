myApp.controller("ctrlFavorite", function($scope) {

    $scope.places = [];

    axios.get('favorite/1').then(response => {
            $scope.places = response.data;
            $scope.$digest();
        })
        .catch(error => {
            console.log(error);
        });
});