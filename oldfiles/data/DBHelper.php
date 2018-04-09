<?php

/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 4/8/2018
 * Time: 12:29 AM
 */
class DBHelper
{
	public $serverIP = "35.196.103.33";
	public $username = "root";
	public $password = "gAztYFbKbkyKT7qgvkHEdW4AHZj59zwW";
	public $dbname = "vendingdata";
	public $conn;

	public function __construct()
	{
		try {
			$this->conn = new PDO("mysql:host=$this->serverIP;dbname=$this->dbname", $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo "DB connection successful";
		} catch (PDOException $e) {
			echo "DB connection failed";
		}
	}

	public function selectAllProducts(): array
	{
		$sql = "SELECT id, Name FROM Products";

		$results = $this->conn->query($sql);

		$products = array();

		foreach ($results as $row) {
			$product = new Product();
			$product->setId($row['id']);
			$product->setName($row['Name']);

			$products[] = $product;
		}

		return $products;
	}
}

$dbh = new DBHelper();
$dbh->selectAllProducts();
