//API MAP


function initMap() {
    var map = new google.maps.Map(document.getElementById('carte'), {
        zoom: 6,
        center: {lat: 47.7169121, lng: 3.2951878}
    });
    // https://developers.google.com/maps/documentation/javascript/examples/geocoding-simple?hl=fr
    // Permet de trouver la position depuis une ville entrée
    var geocoder = new google.maps.Geocoder();
    document.getElementById('chercher').addEventListener('click', function() {
        geocodeAddress(geocoder, map);
    });
function geocodeAddress(geocoder, resultsMap) {
    var address = document.getElementById('ville').value;
        geocoder.geocode({'address': address}, function(results, status) {
            if (status === 'OK') {
                resultsMap.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: resultsMap,
                    position: results[0].geometry.location
                });
            } else {
                alert('La géolocalisation n\'a pas fonctionné pour la raison suivante : ' + status);
            }
        });
    }
    // Ce morceau vient de : https://developers.google.com/maps/documentation/javascript/examples/map-geolocation?hl=fr
    var infoWindow = new google.maps.InfoWindow({map: map}); // Try HTML5 geolocation.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            var imageMarker = 'http://maps.google.com/mapfiles/ms/icons/red.png';
            infoWindow.setPosition(pos);
            infoWindow.setContent('Vous êtes ici');
            map.setCenter(pos);
        }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
        });
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
    }
    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Erreur: Le service de géolocalisation a échoué.' :
            'Erreur: Votre navigateur ne permet pas de vous géolocaliser.');
    }
    // Marqueur pour l'épicerie de Diges
    // https://developers.google.com/maps/documentation/javascript/examples/icon-simple?hl=fr
    var image = src="/MaPetiteEpicerieW-V2.1.1/public/assets/img/marker.png";
    var epicerie1 = new google.maps.Marker({
        position: {lat: 47.7169121, lng: 3.2951878},
        map: map,
        icon: image
    });
        epicerie1.addListener('click', function() {
        infowindowDiges.open(map, epicerie1);
    });
    
    var infowindowDiges = new google.maps.InfoWindow({
        content: 'Ma Petite Epicerie Diges<a data-toggle="modal" data-target="#myModal"><p>Voir cet épicier</p></a>'
    });
   
   // Marqueur pour l'épicerie de Limoges
    var epicerie2 = new google.maps.Marker({
        position: {lat: 45.869205, lng: 1.268338},
        map: map,
        icon: image
    });
    epicerie2.addListener('click', function() {
        infowindowLimoges.open(map, epicerie2);
    });
    var infowindowLimoges = new google.maps.InfoWindow({
        content: 'Ma Petite Epicerie Limoges<a data-toggle="modal" data-target="#myModal"><p>Voir cet épicier</p></a>'
    });

  
    // Marqueur pour l'épicerie Issoires
    var epicerie3 = new google.maps.Marker({
        position: {lat: 45.549999, lng: 3.259999},
        map: map,
        icon: image
    });
    epicerie3.addListener('click', function() {
        infowindowIssoires.open(map, epicerie3);
    });
    var infowindowIssoires = new google.maps.InfoWindow({
        content: 'Ma Petite Epicerie Issoires<a data-toggle="modal" data-target="#myModal"><p>Voir cet épicier</p></a>'
    });

}

    // Pour le calcul d'itiniraire : https://developers.google.com/maps/documentation/javascript/examples/directions-simple?hl=fr
    // Pour faire un bouton "naviger vers", j'aurais poussé un lien type <a href="https://maps.google.com/?q=LAT:LON">Naviguer vers</a> , ça lance le gps de lui même sur mobile.
    // Marqueur pour l'épicerie
    // https://developers.google.com/maps/documentation/javascript/examples/icon-simple?hl=fr
