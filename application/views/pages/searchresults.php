<?php
/** @var String $query The query that was entered by the user */
/** @var array(Product) $results The results of the search query */
?>

<main role="main">
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Search Results for <?php echo $query ?></h1>
    </div>
</section>
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
	        <?php foreach ($results as $product): ?>
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

