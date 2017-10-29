myApp.controller("ctrlUser", function($scope) {

    $scope.items = [];

    axios.get('profile/1').then(response => {
            $scope.items = response.data;
            $scope.$digest();
        })
        .catch(error => {
            console.log(error);
        });
});