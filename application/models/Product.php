<?php

/**
 * Created by Adam Ritchie
 * README!
 *
 * A Product is a food or drink item contained in a Machine.
 *
 * Objects returned by the functions in this class will have the following fields:
 * Field names are exact and case sensitive. So to use, you would do e.g. $product->Name
 *
 * id            int
 * Name          String
 * Price         int               (in CENTS! e.g. 275)
 * Type          String            (Food, Drink)
 * ImageName     String            (e.g:. amp.png - to use <img src="/assets/imgs/products/[ImageName]">)
 */
class Product extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	/**
	 * @return array of all Products
	 */
	public function getAllProducts()
	{
		$sql = "SELECT Products.* FROM Products ORDER BY Name";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function getAllSnacks()
	{
		$sql = "SELECT Products.* FROM Products WHERE Type = 'Snack' ORDER BY Name ";
		return $this->db->query($sql)->result();
	}

	public function getAllDrinks()
	{
		$sql = "SELECT Products.* FROM Products WHERE Type = 'Drink' ORDER BY Name";
		return $this->db->query($sql)->result();
	}

	/**
	 * @param $name String search query
	 * @return array of Products with names containing or matching search query
	 */
	public function getProductsByName($name)
	{
		$sql = 'SELECT * FROM Products WHERE Name LIKE ? ORDER BY Price';
		$query = $this->db->query($sql, array('%' . $name . '%'));
		return $query->result();
	}

	/**
	 * @param $id int the ID of the product
	 * @return Product the Product with the correct ID, or null if not found
	 */
	public function getProductByID($id)
	{
		$sql = 'SELECT * FROM Products WHERE id = ?';
		$query = $this->db->query($sql, array($id));
		return $query->row();
	}
}
