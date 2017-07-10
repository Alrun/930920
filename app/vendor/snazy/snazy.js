(function() {
	// When the window has finished loading create our google map below
	google.maps.event.addDomListener(window, 'load', init);

	function init() {
		// Basic options for a simple Google Map
		// For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
		var mapOptions = {
		// How zoomed in you want the map to start at (always required)
		zoom: 17,

		// The latitude and longitude to center the map (always required)
		center: new google.maps.LatLng(59.943023, 30.434577), // New York

		// How you would like to style the map. 
		// This is where you would paste any style found on Snazzy Maps.
		styles: [
			{
				"featureType": "all",
				"elementType": "labels.text.fill",
				"stylers": [
				{
					"saturation": 36
				},
				{
					"color": "#000000"
				},
				{
					"lightness": 40
				}
				]
			},
			{
				"featureType": "all",
				"elementType": "labels.text.stroke",
				"stylers": [
				{
					"visibility": "on"
				},
				{
					"color": "#000000"
				},
				{
					"lightness": 16
				}
				]
			},
			{
				"featureType": "all",
				"elementType": "labels.icon",
				"stylers": [
				{
					"visibility": "off"
				}
				]
			},
			{
				"featureType": "administrative",
				"elementType": "geometry.fill",
				"stylers": [
				{
					"color": "#000000"
				},
				{
					"lightness": 20
				}
				]
			},
			{
				"featureType": "administrative",
				"elementType": "geometry.stroke",
				"stylers": [
				{
					"color": "#000000"
				},
				{
					"lightness": 17
				},
				{
					"weight": 1.2
				}
				]
			},
			{
				"featureType": "administrative",
				"elementType": "labels.text.fill",
				"stylers": [
				{
					"color": "#8b9198"
				}
				]
			},
			{
				"featureType": "landscape",
				"elementType": "geometry",
				"stylers": [
				{
					"color": "#000000"
				},
				{
					"lightness": 20
				}
				]
			},
			{
				"featureType": "landscape",
				"elementType": "geometry.fill",
				"stylers": [
				{
					"color": "#323336"
				}
				]
			},
			{
				"featureType": "landscape.man_made",
				"elementType": "geometry.stroke",
				"stylers": [
				{
					"color": "#000000"
				}
				]
			},
			{
				"featureType": "poi",
				"elementType": "all",
				"stylers": [
				{
					"visibility": "off"
				}
				]
			},
			{
				"featureType": "poi",
				"elementType": "geometry",
				"stylers": [
				{
					"color": "#000000"
				},
				{
					"lightness": 21
				}
				]
			},
			{
				"featureType": "poi",
				"elementType": "geometry.fill",
				"stylers": [
				{
					"color": "#2e2f31"
				}
				]
			},
			{
				"featureType": "road",
				"elementType": "geometry",
				"stylers": [
				{
					"color": "#2e2e2e"
				}
				]
			},
			{
				"featureType": "road",
				"elementType": "labels.text.fill",
				"stylers": [
				{
					"color": "#7a7c80"
				}
				]
			},
			{
				"featureType": "road.highway",
				"elementType": "geometry.fill",
				"stylers": [
				{
					"color": "#000000"
				},
				{
					"lightness": 17
				}
				]
			},
			{
				"featureType": "road.highway",
				"elementType": "geometry.stroke",
				"stylers": [
				{
					"color": "#202022"
				},
				{
					"lightness": 29
				},
				{
					"weight": 0.2
				}
				]
			},
			{
				"featureType": "road.arterial",
				"elementType": "geometry",
				"stylers": [
				{
					"color": "#000000"
				},
				{
					"lightness": 18
				}
				]
			},
			{
				"featureType": "road.arterial",
				"elementType": "geometry.fill",
				"stylers": [
				{
					"color": "#1f1f1f"
				}
				]
			},
			{
				"featureType": "road.arterial",
				"elementType": "geometry.stroke",
				"stylers": [
				{
					"color": "#202022"
				}
				]
			},
			{
				"featureType": "road.local",
				"elementType": "geometry",
				"stylers": [
				{
					"color": "#000000"
				},
				{
					"lightness": 16
				}
				]
			},
			{
				"featureType": "road.local",
				"elementType": "geometry.fill",
				"stylers": [
				{
					"color": "#131313"
				}
				]
			},
			{
				"featureType": "road.local",
				"elementType": "geometry.stroke",
				"stylers": [
				{
					"color": "#202022"
				}
				]
			},
			{
				"featureType": "transit",
				"elementType": "geometry",
				"stylers": [
				{
					"color": "#000000"
				},
				{
					"lightness": 19
				}
				]
			},
			{
				"featureType": "water",
				"elementType": "geometry",
				"stylers": [
				{
					"color": "#000000"
				},
				{
					"lightness": 17
				}
				]
			},
			{
				"featureType": "water",
				"elementType": "geometry.fill",
				"stylers": [
				{
					"color": "#2a5468"
				}
				]
			}
			]
			};

		// Get the HTML DOM element that will contain your map 
		// We are using a div with id="map" seen below in the <body>
		var mapElement = document.getElementById('map');

		// Create the Google Map using our element and options defined above
		var map = new google.maps.Map(mapElement, mapOptions);

		// Let's also add a marker while we're at it
		var marker = new google.maps.Marker({
			position: new google.maps.LatLng(59.943023, 30.434577),
			map: map,
			title: 'Snazzy!'
		});
	}
}());          