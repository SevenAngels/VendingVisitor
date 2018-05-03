<?php
/** @var Product $product to be displayed */
echo 'ID = ' . $product->id . "\n";
echo 'Name = ' . $product->Name . "\n";
echo 'Price = $' . $product->Price / 100 . "\n";
echo 'Type = ' . $product->Type . "\n";
?>

<img src="/assets/imgs/products/<?php echo $product->ImageName ?>">

<div id="map"></div>
<style>
	/* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
	#map {
		height: 30%;
		width: 30%;
	}

	html, body {
		height: 100%;
		width: 100%;
		margin: 0;
		padding: 0;
	}
</style>
<script>
	function initMap() {
		var infoWindow;
		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 17,
			center: {lat: 35.307, lng: -80.734}
		});
		let marker; //TODO make info window content more robust
		<?php /** @var array $machines */
		foreach($machines as $machine): ?>
		marker = new google.maps.Marker({
			position: {lat: <?php echo $machine->Latitude?>, lng: <?php echo $machine->Longitude?>},
			map: map
		});
		marker.addListener('click', function () {
			new google.maps.InfoWindow({
				content: '<p><?php echo $machine->Building?></p>' +
				'<a href="/index.php/machines/viewMachine/<?php echo $machine->id?>">' +
				'<button type="button" class="btn btn-sm btn-outline-secondary">View Machine Info</button></a>'
			}).open(map, marker);
		});
		<?php endforeach; ?>
	}
</script>
<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_gkMmgchWRJw8AYEcsOaEeJGZnoXA9KY&callback=initMap">
</script>
