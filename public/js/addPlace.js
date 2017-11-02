myApp.controller("ctrlPlaceAdd", function($scope) {

    $scope.foodTypes = [];
    $scope.place = {};
    $scope.foodTypesSelected = [];
    var map;
    var geocoder;
    var infowindow;
    var myMarker;

    $scope.initMaps = function() {
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 14,
            center: { lat: 25.721, lng: -100.3 }
        });
        geocoder = new google.maps.Geocoder;
        infowindow = new google.maps.InfoWindow;

        myMarker = new google.maps.Marker({
            position: new google.maps.LatLng(25.721, -100.3),
            draggable: true
        });



        google.maps.event.addListener(myMarker, 'dragend', function(evt) {
            var lat = evt.latLng.lat().toFixed(3);
            var lng = evt.latLng.lng().toFixed(3);
            $scope.geocodeLatLng(geocoder, map, infowindow, lat, lng);
        });


        map.setCenter(myMarker.position);
        myMarker.setMap(map);
    }


    $scope.geocodeLatLng = function(geocoder, map, infowindow, plat, plng) {
        var latlng = { lat: parseFloat(plat), lng: parseFloat(plng) };
        geocoder.geocode({ 'location': latlng }, function(results, status) {
            if (status === 'OK') {
                if (results[1]) {
                    map.setZoom(11);
                    infowindow.setContent(results[1].formatted_address);
                    infowindow.open(map, myMarker);
                    $scope.place.address = results[1].formatted_address;
                    $scope.place.latitude = plat;
                    $scope.place.longitude = plng;
                    $scope.$digest();
                } else {
                    window.alert('No results found');
                }
            } else {
                window.alert('Geocoder failed due to: ' + status);
            }
        });
    };

    $scope.agregar = function() {

        if ($scope.foodTypesSelected.length == 0) {
            alertify.set('notifier', 'position', 'top-right');
            alertify.notify('Debe seleccionar al menos un tipo de comida', 'error', 5, function() {
                //console.log('dismissed');
            });
            return;
        }

        var formData = new FormData();
        var imagefile = document.querySelector('#file');

        formData.append('image', imagefile.files[0]);
        formData.append('name', $scope.place.name);
        formData.append('address', $scope.place.address);
        formData.append('latitude', $scope.place.latitude);
        formData.append('longitude', $scope.place.longitude);
        formData.append('description', $scope.place.description);
        formData.append('foodType', $scope.foodTypesSelected);

        var strPlace = JSON.stringify($scope.place);
        axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
        axios.post('addPlace/add', formData)
            .then(response => {
                $scope.place = {};
                $scope.foodTypesSelected = [];
                $scope.$digest();
                alertify.set('notifier', 'position', 'top-right');
                alertify.notify('Puesto agregado exitosamente', 'success', 5, function() {
                    //console.log('dismissed');
                });
            })
            .catch(error => {
                console.log(error);
            });
    };

    $scope.actualizarTipos = function(foodType) {

        if (foodType.isChecked) {
            $scope.foodTypesSelected.push(foodType.id);
        } else {
            var toDel = $scope.foodTypesSelected.indexOf(foodType);
            $scope.foodTypesSelected.splice(toDel);
        }

    };

    axios.get('foodType').then(response => {
            $scope.foodTypes = response.data;
            $scope.$digest();
        })
        .catch(error => {
            console.log(error);
        });

});

myApp.directive('validFile', function() {
    return {
        require: 'ngModel',
        link: function(scope, el, attrs, ngModel) {
            ngModel.$render = function() {
                ngModel.$setViewValue(el.val());
            };

            el.bind('change', function() {
                scope.$apply(function() {
                    ngModel.$render();
                });
            });
        }
    };
});