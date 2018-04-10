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

	public function getAllProducts()
	{
		$query = $this->db->get('Products');
		return $query->result_array();
	}
}
