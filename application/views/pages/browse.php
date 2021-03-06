<?php
/**
 * Created by IntelliJ IDEA.
 * User: Adam
 * Date: 4/9/2018
 * Time: 8:20 PM
 */

/** @var array $products SQL query result for all products to be displayed */
?>
<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Browse Items</h1>
        </div>
    </section>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col col-lg-2">
					<a href="/index.php/products/viewAll">
						<button type="button" class="btn btn-dark btn-lg btn-block float-right">All</button>
					</a>
                </div>
                <div class="col-lg-2">
					<a href="/index.php/products/viewSnacks">
						<button type="button" class="btn btn-dark btn-lg btn-block float-right">Snacks</button>
					</a>
                </div>
                <div class="col col-lg-2">
					<a href="/index.php/products/viewDrinks">
						<button type="button" class="btn btn-dark btn-lg btn-block float-right">Drinks</button>
					</a>
                </div>
            </div>
            <br><br>
            <div class="row">
                <?php foreach ($products as $product): ?>
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
												<button type="button" class="btn btn-sm btn-outline-secondary">View
													Product Info
												</button>
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
</body>
</html>


