<?php
/**
 * Created by IntelliJ IDEA.
 * User: Adam
 * Date: 4/9/2018
 * Time: 8:20 PM
 */
foreach ($products as $product): ?>
	<img src="/assets/imgs/products/<?php echo $product['ImageName'] ?>" alt="<?php echo $product['ImageName'] ?>">
	<?php echo $product['Name'] ?>
	<br>

<?php endforeach; ?>

</body>
</html>
