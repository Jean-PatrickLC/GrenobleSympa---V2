var map;
var tabMarkers = [];
var Cercle;

function marker() {
	$.getJSON("Lieux.php", function (data) {

		$.each(data, function (key, val) {


			var marker1 = new google.maps.Marker({
				position: {
					lat: val[2],
					lng: val[1]
				},
				//icon: "https://png.icons8.com/ios/40/000000/map-pin.png",
				map: map,
				title: val[0]
			});
			tabMarkers.push(marker1);

			
		});


		// redraw des markers
		var origine = Cercle.getCenter(),
			rayon = Cercle.getRadius(),
			i, nb = tabMarkers.length;



		for (i = 0; i < nb; i++) {
			drawMarker(tabMarkers[i], origine, rayon);
		}


	});
}





var oRedIcone, oGreenIcone, oShadow;

function drawMarker(marker, origine, rayon) {
	// calcul distance
	var distance = google.maps.geometry.spherical.computeDistanceBetween(origine, marker.getPosition());

	// ici on joue sur la couleur du marker
	var icone = (distance > rayon) ? oRedIcone : oGreenIcone;
	// affectation icone qui va bien
	marker.setOptions({
		'icon': icone
	});
	
	var contentString = '<div id="content">' +
		'<div id="siteNotice">' +
		'</div>' +
		'<p> '+marker.title+'</p>' +
		'<div id="bodyContent">' +
		'<p>adresse</p>' +
		'</div>' +
		'</div>';

	var infowindow = new google.maps.InfoWindow({
		content: contentString
	});

	marker.addListener('click', function () {
		infowindow.open(map, marker);
	});

	
	// ajout distance au survol
	/*var km = (distance / 1000).toFixed(3) + ' km';
	marker.setOptions({
		'title': km
	});*/

	
}




function initMap() {

	// création de l'ombre
	oShadow = new google.maps.MarkerImage(
		'http://maps.google.com/mapfiles/shadow50.png',
		new google.maps.Size(37, 34),
		new google.maps.Point(0, 0),
		new google.maps.Point(10, 34)
	);
	// création de l'icone hors limite
	oRedIcone = new google.maps.MarkerImage(
		'http://maps.google.com/mapfiles/marker.png',
		new google.maps.Size(20, 34),
		new google.maps.Point(0, 0),
		new google.maps.Point(10, 34)
	);
	// création de l'icone dans limite
	oGreenIcone = new google.maps.MarkerImage(
		'http://maps.google.com/mapfiles/marker_green.png',
		new google.maps.Size(20, 34),
		new google.maps.Point(0, 0),
		new google.maps.Point(10, 34));


	var directionsService = new google.maps.DirectionsService;
	var directionsDisplay = new google.maps.DirectionsRenderer;
	map = new google.maps.Map(document.getElementById('map'), {
		zoom: 13,
		center: {
			lat: 45.188529,
			lng: 5.724524
		}
	});
	directionsDisplay.setMap(map);



	Cercle = new google.maps.Circle({
		'center': {
			lat: 45.188529,
			lng: 5.724524
		},
		'map': map,
		'radius': 500,
		'fillColor': '#c1c1c1',
		'fillOpacity': .5,
		'strokeWeight': 1,
		'strokeColor': '#888',
		'clickable': false,
		'editable': true,
		'strokeOpacity': 3.0
	});
	// evenement sur changement de la position du centre du cercle
	google.maps.event.addListener(Cercle, 'center_changed', function () {
		// redraw des markers
		var origine = this.getCenter(),
			rayon = this.getRadius(),
			i, nb = tabMarkers.length;
		for (i = 0; i < nb; i++) {
			drawMarker(tabMarkers[i], origine, rayon);
		}
	});
	// evenement double click pour création des markers
	google.maps.event.addListener(map, 'dblclick', function (data) {
		// création d'un marqueur
		var oMarker = new google.maps.Marker({
			'position': data.latLng,
			'map': this
		});

		var oMarker = new google.maps.Marker({
			'position': data.latLng,
			'map': this
		});
		// test affichage
		var origine = Cercle.getCenter(),
			rayon = Cercle.getRadius();
		// redraw le marker
		drawMarker(oMarker, origine, rayon);
		// empile le marker
		tabMarkers.push(oMarker);
	});


	marker();



	document.getElementById('submit').addEventListener('click', function () {
		calculateAndDisplayRoute(directionsService, directionsDisplay);
	});
}

function calculateAndDisplayRoute(directionsService, directionsDisplay) {
	var waypts = [];
	var checkboxArray = document.getElementById('waypoints');
	for (var i = 0; i < checkboxArray.length; i++) {
		if (checkboxArray.options[i].selected) {
			waypts.push({
				location: checkboxArray[i].value,
				stopover: true
			});
		}
	}

	directionsService.route({
		origin: document.getElementById('start').value,
		destination: document.getElementById('end').value,
		waypoints: waypts,
		optimizeWaypoints: true,
		travelMode: document.getElementById('mode').value
	}, function (response, status) {
		if (status === 'OK') {
			directionsDisplay.setDirections(response);
			var route = response.routes[0];
			var summaryPanel = document.getElementById('directions-panel');
			summaryPanel.innerHTML = '';
			// For each route, display summary information.
			for (var i = 0; i < route.legs.length; i++) {
				var routeSegment = i + 1;
				summaryPanel.innerHTML += '<b>Route Segment: ' + routeSegment +
					'</b><br>';
				summaryPanel.innerHTML += route.legs[i].start_address + ' to ';
				summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
				summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';
			}
		} else {
			window.alert('Directions request failed due to ' + status);
		}

	});
}