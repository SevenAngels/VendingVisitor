<?php
/** @var String $query The query that was entered by the user */
/** @var array(Product) $results The results of the search query */
?>

<h1>Search Results for <?php echo $query ?></h1>
<ul>
	<?php
	foreach ($results as $product): ?>
		<li>
			<img src="/assets/imgs/products/<?php echo $product->ImageName ?>">
			<?php echo "$product->Name $";
			echo $product->Price / 100 ?>
			<a href="/index.php/products/viewProduct/<?php echo $product->id ?>">
				<button type="button" class="btn btn-sm btn-outline-secondary">View Product Info</button>
			</a>
		</li>
	<?php endforeach; ?>
</ul>
