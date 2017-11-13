 myApp.controller("ctrlPlaceView", function($scope) {

    $scope.foodTypes = [];
    $scope.place = {};
    $scope.comments = [];
    $scope.comment = {};
    $scope.foodTypesSelected = [];
    var map;
    var geocoder;
    var infowindow;
    var myMarker;
    var latitude;
    var longitude;
    var idPlace = localStorage.idPlace;

    axios.get('place/' + idPlace).then(response => {
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

    $scope.agregar = function() {

        var formData = new FormData();
        var now = new Date();

        formData.append('comment', $scope.comment.comment);
        formData.append('date', now);
        formData.append('place_id', idPlace);
        formData.append('users_id', 1);

        var strComment = JSON.stringify($scope.comment);
        console.log(strComment, formData);
        axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
        axios.post('comments/add', formData)
            .then(response => {
                $scope.comment = {};
                $scope.$digest();
                alertify.set('notifier', 'position', 'top-right');
                alertify.notify('Comentario agregado exitosamente.', 'success', 5, function() {
                    //console.log('dismissed');
                });
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




 