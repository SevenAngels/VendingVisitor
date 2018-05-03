<?php

/** @var Machine $machine */ ?>
Machine ID: <?php echo $machine->id ?> <br>
Building: <?php echo $machine->Building ?> <br>
Location Description: <?php echo $machine->Description ?> <br>
Machine Branding: <?php echo $machine->Brand ?> <br>
Machine Type: <?php echo $machine->Type ?> <br>
Takes Niner Card: <?php if ($machine->Niner == 1) echo 'Yes'; else echo 'No' ?> <br>
Takes Credit/Debit Card: <?php if ($machine->Credit == 1) echo 'Yes'; else echo 'No' ?> <br> <br>
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
		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 18,
			center: {lat: <?php echo $machine->Latitude?>, lng: <?php echo $machine->Longitude?>}
		});
		let marker = new google.maps.Marker({
			position: {lat: <?php echo $machine->Latitude?>, lng: <?php echo $machine->Longitude?>},
			map: map
		});
	}
</script>
<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_gkMmgchWRJw8AYEcsOaEeJGZnoXA9KY&callback=initMap">
</script>
Contents: <?php foreach ($machine->Contents as $product): ?>
	<ul>
		<li>
			<img src="/assets/imgs/products/<?php echo $product->ImageName ?>">
			<?php echo $product->Name ?> $<?php echo $product->Price / 100 ?>
			<a href="/index.php/products/viewProduct/<?php echo $product->id ?>">
				<button type="button" class="btn btn-sm btn-outline-secondary">View Product Info</button>
			</a>
		</li>
	</ul>
<?php endforeach; ?>
