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

    $scope.verPuesto = function(id) {
        localStorage.idPlace = id;
        window.location.href = '/viewPlace';
    };

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
                console.log(response);
                $scope.$digest();
            })
            .catch(error => {
                console.log(error);
            });
    }

    $scope.updateFavorite = function(place) {
        console.log(place);
        if(place.isFavorite == null){
            axios.get('addFavorite/' + place.id).then(response => {
                place.isFavorite = true;
                console.log(response);
                $scope.$digest();
            })
            .catch(error => {
                console.log(error);
            });
        } else{
            axios.get('removeFavorite/' + place.id).then(response => {
                place.isFavorite = false;
                console.log(response);
                $scope.$digest();
            })
            .catch(error => {
                console.log(error);
            });
        }
    };

    $scope.actualizarPuestos();

    axios.get('foodType').then(response => {
        console.log(1);
            $scope.foodTypes = response.data;
            $scope.$digest();
        })
        .catch(error => {
            console.log(error);
        });
});