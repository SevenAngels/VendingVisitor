<?php
/**
 * Created by IntelliJ IDEA.
 * User: Adam
 * Date: 4/9/2018
 * Time: 8:20 PM
 */

/** @var array $products SQL query result for all products to be displayed */
foreach ($products as $product): ?>
	<img src="/assets/imgs/products/<?php echo $product->ImageName ?>" alt="<?php echo $product->ImageName ?>">
	<?php echo $product->Name ?>
	<br>

<?php endforeach; ?>

</body>
</html>
