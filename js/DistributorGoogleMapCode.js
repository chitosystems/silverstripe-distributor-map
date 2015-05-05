$(document).ready(function () {
    if($("#mapWrapper").length > 0)
        initialize('mapWrapper');
});

function initialize(id) {
    "use strict";
    var image = '$Module/images/map-icon.png';
    var overlayTitle = 'Distributors';
    var locations = [$Distributors];

    /*** DON'T CHANGE ANYTHING PASSED THIS LINE ***/
    id = (id === undefined) ? 'mapWrapper' : id;

    var map = new google.maps.Map(document.getElementById(id), {
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        scrollwheel: false,
        zoomControl: true,
        zoomControlOptions: {
            style: google.maps.ZoomControlStyle.LARGE,
            position: google.maps.ControlPosition.LEFT_CENTER
        },
        streetViewControl: true,
        scaleControl: false,
        zoom: 14,
        styles: [
            {
                "featureType": "water",
                "stylers": [
                    {
                        "color": "#6196AD"
                    },
                ]
            },
            {
                "featureType": "road",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "#FCFFF5"
                    },
                ]
            },
            {
                "featureType": "road",
                "elementType": "geometry.stroke",
                "stylers": [
                    {
                        "color": "#808080"
                    },
                    {
                        "lightness": 54
                    }
                ]
            },
            {
                "featureType": "landscape.man_made",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "#dde1d4"
                    }
                ]
            },
            {
                "featureType": "poi.park",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "#73AB7D"
                    }
                ]
            },
            {
                "featureType": "road",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#767676"
                    }
                ]
            },
            {
                "featureType": "road",
                "elementType": "labels.text.stroke",
                "stylers": [
                    {
                        "color": "#ffffff"
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "#7e7341"
                    }
                ]
            },

            {
                "featureType": "landscape.natural",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "visibility": "on"
                    },
                    {
                        "color": "#dee6e6"
                    }
                ]
            },
            {
                "featureType": "poi.park",
                "stylers": [
                    {
                        "visibility": "on"
                    }
                ]
            },
            {
                "featureType": "poi.sports_complex",
                "stylers": [
                    {
                        "visibility": "on"
                    }
                ]
            },
            {
                "featureType": "poi.medical",
                "stylers": [
                    {
                        "visibility": "on"
                    }
                ]
            },
            {
                "featureType": "poi.business",
                "stylers": [
                    {
                        "visibility": "simplified"
                    }
                ]
            }
        ]

    });

    var myLatlng;
    var marker, i;
    var bounds = new google.maps.LatLngBounds();
    var infowindow = new google.maps.InfoWindow({content: "loading..."});

    for (i = 0; i < locations.length; i++) {


        if (locations[i][2] !== undefined && locations[i][3] !== undefined) {
            var content = '<div class="infoWindow">' + Base64Handler.decode(locations[i][4]) +'</div>';
            (function (content) {
                myLatlng = new google.maps.LatLng(locations[i][2], locations[i][3]);

                marker = new google.maps.Marker({
                    position: myLatlng,
                    icon: image,
                    title: locations[i][0],
                    map: map
                });

                google.maps.event.addListener(marker, 'click', (function () {
                    return function () {
                        infowindow.setContent(content);
                        infowindow.open(map, this);
                    };

                })(this, i));

                if (locations.length > 1) {
                    bounds.extend(myLatlng);
                    map.fitBounds(bounds);
                } else {
                    map.setCenter(myLatlng);
                }

            })(content);
        } else {

            var geocoder = new google.maps.Geocoder();
            var info = locations[i][0];
            var addr = locations[i][1];
            var latLng = locations[i][1];

            (function (info, addr) {

                geocoder.geocode({

                    'address': latLng

                }, function (results) {

                    myLatlng = results[0].geometry.location;

                    marker = new google.maps.Marker({
                        position: myLatlng,
                        icon: image,
                        title: locations[i][0],
                        map: map
                    });
                    var $content = '<div class="infoWindow">' + info + '<br>' + addr + '</div>';
                    google.maps.event.addListener(marker, 'click', (function () {
                        return function () {
                            infowindow.setContent($content);
                            infowindow.open(map, this);
                        };
                    })(this, i));

                    if (locations.length > 1) {
                        bounds.extend(myLatlng);
                        map.fitBounds(bounds);
                    } else {
                        map.setCenter(myLatlng);
                    }
                });
            })(info, addr);

        }
    }
}