<?php
/**
 * Created by IntelliJ IDEA.
 * User: Adam
 * Date: 4/9/2018
 * Time: 8:20 PM
 */

/** @var array $products SQL query result for all products to be displayed Hello*/
?>
<main role="main">
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <?php foreach ($products as $product): ?>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                        <img src="/assets/imgs/products/<?php echo $product->ImageName ?>" alt="<?php echo $product->ImageName ?>" class="rounded mx-auto d-block" height="300" width="120" >
                             <div class="card-body">
                                <p class="card-text"><?php echo $product->Name ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Directions</button>
                                        </div>
                                        <small class="text-muted">9 mins</small>
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


