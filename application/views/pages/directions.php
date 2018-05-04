<div id="map"></div>
<style>
	/* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
	#map {
		height: 92%;
	}

	/* Optional: Makes the sample page fill the window. */
	html, body {
		height: 100%;
		margin: 0;
		padding: 0;
	}
</style>
<script>
	function initMap() {
		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 16,
			center: {lat: 35.307, lng: -80.734}
		});

		var directionsService = new google.maps.DirectionsService;
		var directionsDisplay = new google.maps.DirectionsRenderer;
		directionsDisplay.setMap(map);
		var destination = {
			lat: <?php /** @var Cluster $destination */
			echo $destination->Latitude?>, lng: <?php echo $destination->Longitude?>};

		var userLocationWindow = new google.maps.InfoWindow();
		let origin = {lat: 35.301511, lng: -80.7313364};

		let content = '<?php echo $destination->Content?>';
		let marker = new google.maps.Marker({
			position: destination,
			map: map
		});
		marker.addListener('click', function () {
			let infoWindow = new google.maps.InfoWindow({
				content: content
			});
			infoWindow.open(map, marker);
		});
		let request;

		// Try HTML5 geolocation.
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function (position) {
				var pos = {
					lat: position.coords.latitude,
					lng: position.coords.longitude
				};

				userLocationWindow.setPosition(pos);
				userLocationWindow.setContent('You Are Here');
				userLocationWindow.open(map);
				map.setCenter(pos);

				request = {
					origin: pos,
					destination: destination,
					travelMode: 'WALKING'
				};
				directionsService.route(request, function (result, status) {
					if (status == 'OK') {
						directionsDisplay.setDirections(result);
					} else {
						window.alert('Directions request failed due to ' + status);
					}
				});
			}, function () {
				request = {
					origin: origin,
					destination: destination,
					travelMode: 'WALKING'
				};
				directionsService.route(request, function (result, status) {
					if (status == 'OK') {
						directionsDisplay.setDirections(result);
					} else {
						window.alert('Directions request failed due to ' + status);
					}
				});
				handleLocationError(true, userLocationWindow, map.getCenter());
			});
		} else {
			request = {
				origin: origin,
				destination: destination,
				travelMode: 'WALKING'
			};
			directionsService.route(request, function (result, status) {
				if (status == 'OK') {
					directionsDisplay.setDirections(result);
				} else {
					window.alert('Directions request failed due to ' + status);
				}
			});
			handleLocationError(false, userLocationWindow, map.getCenter());
		}
	}

	function handleLocationError(browserHasGeolocation, infoWindow, pos) {
		infoWindow.setPosition(pos);
		infoWindow.setContent(browserHasGeolocation ?
			'Error: The Geolocation service failed.' :
			'Error: Your browser doesn\'t support geolocation.');
		infoWindow.open(map);
	}

</script>
<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_gkMmgchWRJw8AYEcsOaEeJGZnoXA9KY&callback=initMap">
</script>
