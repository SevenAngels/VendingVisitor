<h1><?php /** @var Cluster $cluster */
	echo $cluster->Building ?></h1>

<h2><?php echo $cluster->Description ?></h2>
<h2>Machines at this location:</h2>
<?php /** @var array $machines */
foreach ($machines as $machine): ?>
	<h3>Machine Type: <?php echo $machine->Type ?></h3>
	<?php if ($machine->Type == 'Drink'): ?>
		<p>Machine Brand: <?php echo $machine->Brand ?></p>
	<?php endif; ?>
	<p>Takes 49er Card: <?php if ($machine->Niner == 1) {
			echo 'Yes';
		} else {
			echo 'No';
		} ?> <br>
		Takes Credit/Debit Card: <?php if ($machine->Credit == 1) {
			echo 'Yes';
		} else {
			echo 'No';
		} ?>
	</p>
	<a href="/index.php/machines/viewMachine/<?php echo $machine->id ?>">
		<button type="button" class="btn btn-sm btn-outline-secondary">View Machine Contents</button>
	</a>
<?php endforeach; ?>
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
		let cluster = {
			id: <?php echo $cluster->id ?>,
			Building: '<?php echo $cluster->Building ?>',
			Description: '<?php echo $cluster->Description ?>',
			Latitude: <?php echo $cluster->Latitude ?>,
			Longitude: <?php echo $cluster->Longitude ?>,
			NumFood: <?php echo $cluster->NumFood ?>,
			NumDrink: <?php echo $cluster->NumDrink ?>,
			NumCoffee: <?php echo $cluster->NumCoffee ?>,
		};
		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 18,
			center: {lat: cluster.Latitude, lng: cluster.Longitude}
		});
		let marker = new google.maps.Marker({
			position: {lat: cluster.Latitude, lng: cluster.Longitude},
			map: map
		});
	}
</script>
<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_gkMmgchWRJw8AYEcsOaEeJGZnoXA9KY&callback=initMap">
</script>


