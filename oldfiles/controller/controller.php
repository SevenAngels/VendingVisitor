<?php
/**
 * Created by IntelliJ IDEA.
 * User: Adam
 * Date: 4/9/2018
 * Time: 2:05 PM
 * @param $className
 */
function __autoload($className)
{
	require_once '../model/' . $className . '.php';
}

__autoload('DBHelper');
$url = "index.php";
switch ($_GET["action"]) {
	case "displayAllProducts":
		$url = displayAllProducts();
}
http_redirect("../view/catalog.html");

function displayAllProducts()
{
	$dbHelper = new DBHelper();
	$_REQUEST["productArray"] = $dbHelper->selectAllProducts();
	return "catalog.html";
}
