 myApp.controller("ctrlPlaceView", function($scope) {

    $scope.foodTypes = [];
    $scope.place = {};
    $scope.comments = [];
    $scope.foodTypesSelected = [];
    var map;
    var geocoder;
    var infowindow;
    var myMarker;
    var latitude;
    var longitude;

    axios.get('place/1').then(response => {
                $scope.place = response.data[0];
                latitude=parseFloat($scope.place.latitude);
                longitude=parseFloat($scope.place.longitude);
                console.log(latitude +' ' + longitude );
                $scope.$digest();
            })
            .catch(error => {
                console.log(error);
            });

    $scope.initMaps = function() {
        console.log(latitude, longitude);
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

        /*google.maps.event.addListener(myMarker, 'dragend', function(evt) {
            var lat = evt.latLng.lat().toFixed(3);
            var lng = evt.latLng.lng().toFixed(3);
            $scope.geocodeLatLng(geocoder, map, infowindow, lat, lng);
        }); */


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

    axios.get('foodType').then(response => {
            $scope.foodTypes = response.data;
            $scope.$digest();
        })
        .catch(error => {
            console.log(error);
        });

     axios.get('comments/1').then(response => {
                $scope.comments = response.data;
                $scope.$digest();
            })
            .catch(error => {
                console.log(error);
            });

});




 