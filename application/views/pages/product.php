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
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img src="/assets/imgs/products/<?php echo $product->ImageName ?>"
                             alt="<?php echo $product->ImageName ?>" class="rounded mx-auto d-block" height="300">
                            <div class="card-body">
                                <?php echo 'Price = $' . $product->Price / 100 . "\n";?><br>
                                <?php echo 'Type = ' . $product->Type . "\n"; ?>
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
		var infoWindow;
		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 16,
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
