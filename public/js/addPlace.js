myApp.controller("ctrlPlace", function($scope) {

    $scope.foodTypes = [];
    $scope.place = {};

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 14,
        center: { lat: 25.721, lng: -100.3 }
    });
    var geocoder = new google.maps.Geocoder;
    var infowindow = new google.maps.InfoWindow;

    var myMarker = new google.maps.Marker({
        position: new google.maps.LatLng(25.721, -100.3),
        draggable: true
    });

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
        console.log($scope.place);

        var strPlace = JSON.stringify($scope.place);
        axios.post('addPlace/' + strPlace).then(response => {
                console.log(response);
            })
            .catch(error => {
                console.log(error);
            });
    };

    $scope.getBase64 = function(file) {
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function() {
            //$scope.place.image = reader.result;
            //console.log(reader.result);
        };
        reader.onerror = function(error) {
            console.log('Error: ', error);
        };
    };

    $scope.getFile = function() {
        var files = document.getElementById('file').files;
        if (files.length > 0) {
            $scope.getBase64(files[0]);
        }
    };


    google.maps.event.addListener(myMarker, 'dragend', function(evt) {
        var lat = evt.latLng.lat().toFixed(3);
        var lng = evt.latLng.lng().toFixed(3);
        $scope.geocodeLatLng(geocoder, map, infowindow, lat, lng);
    });


    map.setCenter(myMarker.position);
    myMarker.setMap(map);

    axios.get('foodType').then(response => {
            $scope.foodTypes = response.data;
            $scope.$digest();
        })
        .catch(error => {
            console.log(error);
        });

});