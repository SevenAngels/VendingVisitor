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
		let activeInfoWindow = new google.maps.InfoWindow({
			content: ''
		});
		let arr = [];
		<?php /** @var array $clusters */
		for($i = 0; $i < count($clusters); $i++): ?>
		<?php $cluster = $clusters[$i] ?>
		arr[<?php echo $i ?>] = {
			id: <?php echo $cluster->id ?>,
			Building: '<?php echo $cluster->Building ?>',
			Description: '<?php echo $cluster->Description ?>',
			Latitude: <?php echo $cluster->Latitude ?>,
			Longitude: <?php echo $cluster->Longitude ?>,
			NumFood: <?php echo $cluster->NumFood ?>,
			NumDrink: <?php echo $cluster->NumDrink ?>,
			NumCoffee: <?php echo $cluster->NumCoffee ?>,
			Content: '<?php echo $cluster->Content ?>'
		};
		<?php endfor; ?>

		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 17,
			center: {lat: 35.307, lng: -80.734}
		});

        var swBound = new google.maps.LatLng(35.2986767, -80.7459698);
        var neBound = new google.maps.LatLng(35.3148539, -80.7223077);

        var bounds = new google.maps.LatLngBounds(swBound, neBound);

        map.fitBounds(bounds);

        google.maps.event.addListener(map, 'dragend', function() {
            if (bounds.contains(map.getCenter())) return;

            // We're out of bounds - Move the map back within the bounds
            var c = map.getCenter(),
            x = c.lng(),
            y = c.lat(),
            maxX = bounds.getNorthEast().lng(),
            maxY = bounds.getNorthEast().lat(),
            minX = bounds.getSouthWest().lng(),
            minY = bounds.getSouthWest().lat();

            if (x < minX) x = minX;
            if (x > maxX) x = maxX;
            if (y < minY) y = minY;
            if (y > maxY) y = maxY;

            map.setCenter(new google.maps.LatLng(y, x));
        });

		for (let i = 0; i < arr.length; i++) {
			let marker = new google.maps.Marker({
				position: {lat: arr[i].Latitude, lng: arr[i].Longitude},
				map: map
			}); //TODO add directions button and service to infoWindow

            var markerLatLng = new google.maps.LatLng(arr[i].Latitude, arr[i].Longitude);
            //bounds.extend(markerLatLng);
			marker.addListener('click', function () {
				activeInfoWindow.close();
				activeInfoWindow = new google.maps.InfoWindow({
					content: arr[i].Content
				});
				activeInfoWindow.open(map, marker);
			});
		}

		let userLocation = new google.maps.InfoWindow();

		// Try HTML5 geolocation.
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function (position) {
				var pos = {
					lat: position.coords.latitude,
					lng: position.coords.longitude
				};

				userLocation.setPosition(pos);
				userLocation.setContent('You Are Here');
				if (bounds.contains(pos)) {
					userLocation.open(map);
					map.setCenter(pos);
				}
			}, function () {
				handleLocationError(true, userLocation, map.getCenter());
			});
		} else {
			// Browser doesn't support Geolocation
			handleLocationError(false, userLocation, map.getCenter());
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
