 myApp.controller("ctrlPlaceView", function($scope) {

    $scope.foodTypes = [];
    $scope.place = {};
    $scope.comments = [];
    $scope.comment = {};
    $scope.user = {};
    $scope.foodTypesSelected = [];
    var map;
    var geocoder;
    var infowindow;
    var myMarker;
    var latitude;
    var longitude;
    var idPlace = localStorage.idPlace;

    axios.get('placeView/' + idPlace).then(response => {
                $scope.place = response.data[0];
                console.log($scope.place);
                latitude=parseFloat($scope.place.latitude);
                longitude=parseFloat($scope.place.longitude);
                console.log(latitude +' ' + longitude );
                $scope.$digest();
                $scope.initMaps();
            })
            .catch(error => {
                console.log(error);
            });

    $scope.initMaps = function() {
        
        if(latitude === undefined) {
            latitude = 25;
        }

        if(longitude === undefined){
            longitude = -100;
        }

        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 14,
            center: { lat: latitude, lng: longitude }
        });
        geocoder = new google.maps.Geocoder;
        infowindow = new google.maps.InfoWindow;

        myMarker = new google.maps.Marker({
            position: new google.maps.LatLng(latitude, longitude),
            draggable: false
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

    axios.get('foodTypePlace/' + idPlace).then(response => {
            $scope.foodTypes = response.data;
            $scope.$digest();
        })
        .catch(error => {
            console.log(error);
        });

     axios.get('comments/' + idPlace).then(response => {
                $scope.comments = response.data;

                $scope.$digest();
            })
            .catch(error => {
                console.log(error);
            });

     axios.get('profile/1').then(response => {
            $scope.user = response.data[0];
            if ($scope.user.image == null) {
                $scope.user.image = "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";
            }
            $scope.$digest();
        })
        .catch(error => {
            console.log(error);
        });

    $scope.agregar = function() {

        var formData = new FormData();

        formData.append('comment', $scope.comment.comment);
        formData.append('place_id', idPlace);
        formData.append('users_id', 1);

        axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
        axios.post('comments/add', formData)
            .then(response => {
                $scope.comment = {};
                $scope.$digest();
                alertify.set('notifier', 'position', 'top-right');
                alertify.notify('Comentario agregado exitosamente.', 'success', 5, function() {  
                    //console.log('dismissed');
                });
                $scope.comments = response.data;
                $scope.$digest();
            })
            .catch(error => {
                console.log(error);
                 alertify.set('notifier', 'position', 'top-right');
                alertify.notify(error, 'error', 5, function() {
                    //console.log('dismissed');
                });
            });
    };

});




 