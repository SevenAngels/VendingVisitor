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
								<p class="card-text"><?php echo $product->Name ?><br>$<?php echo number_format(
										($product->Price / 100), 2, '.', ' ') ?></p>
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
