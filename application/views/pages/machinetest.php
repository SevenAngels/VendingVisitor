<?php

/** @var Machine $machines */
foreach ($machines as $machine): ?>
	<div class="machine">
		Machine ID: <?php echo $machine->id ?> <br>
		Building: <?php echo $machine->Building ?> <br>
		Location Description: <?php echo $machine->Description ?> <br>
		Latitude: <?php echo $machine->Latitude ?> <br>
		Longitude: <?php echo $machine->Longitude ?> <br>
		Machine Branding: <?php echo $machine->Brand ?> <br>
		Machine Type: <?php echo $machine->Type ?> <br>
		Takes Niner Card: <?php if ($machine->Niner == 1) echo 'Yes'; else echo 'No' ?> <br>
		Takes Credit/Debit Card: <?php if ($machine->Credit == 1) echo 'Yes'; else echo 'No' ?> <br>
		Contains: <?php foreach ($machine->Contents as $product): ?>
			<ul>
				<li>
					<img src="/assets/imgs/products/<?php echo $product->ImageName ?>">
					<?php echo $product->Name ?> $<?php echo $product->Price / 100 ?>
				</li>
			</ul>
		<?php endforeach; ?>
	</div>
<?php endforeach;
