<?php
/** @var String $query The query that was entered by the user */
/** @var array(Product) $results The results of the search query */
?>

<h1>Search Results for <?php echo $query ?></h1>
<ul>
	<?php
	foreach ($results as $product): ?>
		<li>
			<a href="/index.php/inventory/viewProduct/<?php echo $product->id ?>">
				<img src="/assets/imgs/products/<?php echo $product->ImageName ?>">
				<?php echo "$product->Name $";
				echo $product->Price / 100 ?>
			</a>
		</li>
	<?php endforeach; ?>
</ul>
