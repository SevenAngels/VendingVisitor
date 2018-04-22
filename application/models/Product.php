<?php

/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 4/8/2018
 * Time: 1:53 AM
 */
class Product extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	/**
	 * @return mixed Array of all products in the database
	 */
	public function getAllProducts()
	{
		$query = $this->db->get('Products');
		return $query->result();
	}

	/**
	 * @param $name String which represents the name of the product to be searched for
	 * @return mixed Array of products whose names contain the param string
	 */
	public function getProductsByName($name)
	{
		$sql = 'SELECT * FROM Products WHERE Name LIKE ? ORDER BY Price';
		$query = $this->db->query($sql, array('%' . $name . '%'));
		return $query->result();
	}

	/**
	 * @param $id int the id of the product to be selected
	 * @return mixed Array which represents the row of the correct product
	 */
	public function getProductByID($id)
	{
		$sql = 'SELECT * FROM Products WHERE id = ?';
		$query = $this->db->query($sql, array($id));
		return $query->row();
	}
}
