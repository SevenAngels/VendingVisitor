<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
			<h1 class="jumbotron-heading">
<?php /** @var Machine $machine */ ?>
				<?php if ($machine->Type == 'Drink') echo $machine->Brand; else echo 'Snack' ?> Machine<br></h1>
            <p class="lead text-muted">
				Located in <?php echo $machine->Building ?>:<br>
				<?php echo $machine->Description ?><br> <br>
				Accepts: Cash<?php if ($machine->Niner == 1) echo ', 49er Card';
				if ($machine->Credit == 1) echo
				', Credit/Debit Card' ?><br> <br></p>
        </div>
    </section>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row"><?php foreach ($machine->Contents as $product): ?>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img src="/assets/imgs/products/<?php echo $product->ImageName ?>"
                        alt="<?php echo $product->ImageName ?>" class="rounded mx-auto d-block" height="300">
                            <div class="card-body">
                                <p class="card-text"><?php echo $product->Name ?><br>$<?php echo $product->Price / 100 ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
			                                <a href="/index.php/products/viewProduct/<?php echo $product->id ?>">
				                            <button type="button" class="btn btn-sm btn-outline-secondary">View Product Info</button>
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
	//TODO add infoWindow to this marker
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 18,
            center: {lat: <?php echo $machine->Latitude?>, lng: <?php echo $machine->Longitude?>}
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
        
        let marker = new google.maps.Marker({
            position: {lat: <?php echo $machine->Latitude?>, lng: <?php echo $machine->Longitude?>},
            map: map
        });
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_gkMmgchWRJw8AYEcsOaEeJGZnoXA9KY&callback=initMap">
</script>
