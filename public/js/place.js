myApp.controller("ctrlPlace", function($scope) {

    $scope.places = [];
    $scope.foodTypes = [];
    $scope.foodTypesSelected = [];

    $scope.consultarPuestos = function(foodType) {

        if (foodType.isChecked) {
            $scope.foodTypesSelected.push(foodType.id);
        } else {
            var toDel = $scope.foodTypesSelected.indexOf(foodType);
            $scope.foodTypesSelected.splice(toDel);
        }

        $scope.actualizarPuestos();

    }

    $scope.actualizarPuestos = function() {

        var data;

        if ($scope.foodTypesSelected.length == 0) {
            data = 0;
        } else {
            data = $scope.foodTypesSelected;
        }

        console.log(data);

        axios.get('place/' + data).then(response => {
                $scope.places = response.data;
                $scope.$digest();
            })
            .catch(error => {
                console.log(error);
            });
    }

    $scope.actualizarPuestos();

    axios.get('foodType').then(response => {
            $scope.foodTypes = response.data;
            $scope.$digest();
        })
        .catch(error => {
            console.log(error);
        });
});