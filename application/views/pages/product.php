<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">
<?php
/** @var Product $product to be displayed */
/*echo 'ID = ' . $product->id . "\n";*/
echo $product->Name . "\n"; ?>
            </h1>
        </div>
    </section>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img src="/assets/imgs/products/<?php echo $product->ImageName ?>"
                             alt="<?php echo $product->ImageName ?>" class="rounded mx-auto d-block" height="300">
                            <div class="card-body">
								<?php echo '$' . number_format(
										($product->Price / 100), 2, '.', ' ') ?><br>
								<?php echo 'Type: ' . $product->Type . "\n"; ?>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>


<div id="map"></div>
<style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
        height: 95%;
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

		var machines = [];
		<?php for ($i = 0; $i < count($machines); $i++): ?>
		<?php $machine = $machines[$i] ?>
		machines[<?php echo $i?>] = {
			id: <?php echo $machine->id ?>,
			Latitude: <?php echo $machine->Latitude ?>,
			Longitude: <?php echo $machine->Longitude ?>,
			Building: '<?php echo $machine->Building ?>',
			Content: '<?php echo $machine->Content ?>'
		};
		<?php endfor; ?>

		let activeInfoWindow = new google.maps.InfoWindow({
			content: ''
		});
		for (let i = 0; i < machines.length; i++) {
			let marker = new google.maps.Marker({
				position: {lat: machines[i].Latitude, lng: machines[i].Longitude},
				map: map
			});
			marker.addListener('click', function () {
				activeInfoWindow.close();
				activeInfoWindow = new google.maps.InfoWindow({
					content: machines[i].Content
				});
				activeInfoWindow.open(map, marker);
			});
		}
	}
</script>
<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_gkMmgchWRJw8AYEcsOaEeJGZnoXA9KY&callback=initMap">
</script>
