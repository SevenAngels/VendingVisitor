<?php
/**
 * Created by IntelliJ IDEA.
 * User: Adam
 * Date: 4/20/2018
 * Time: 12:55 PM
 */
/** @var Product $product to be displayed */
echo 'ID = ' . $product->id . "\n";
echo 'Name = ' . $product->Name . "\n";
echo 'Price = $' . $product->Price / 100 . "\n";
echo 'Type = ' . $product->Type . "\n";
?>

<img src="/assets/imgs/products/<?php echo $product->ImageName ?>">
