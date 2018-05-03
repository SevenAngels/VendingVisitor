<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading"><?php /** @var Cluster $cluster */ echo $cluster->Building ?></h1>
            <p class="lead text-muted"><?php echo $cluster->Description ?></p>
        </div>
    </section>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <?php /** @var array $machines */
                    foreach ($machines as $machine): ?>
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <h5 class="card-header">
	                            <?php echo $machine->Type ?> Machine</h5>
                                    <div class="card-body">
	                                    <!-- <?php if ($machine->Type == 'Drink'): ?>
		                                <p>Machine Brand: <?php echo $machine->Brand ?></p>
	                                    <?php endif; ?> -->
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
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="btn-group">
	                                                    <a href="/index.php/machines/viewMachine/<?php echo $machine->id ?>">
		                                                <button type="button" class="btn btn-sm btn-outline-secondary">View Machine Contents</button>
	                                                    </a>
                                                    </div>
                                                </div>
                                    </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
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


