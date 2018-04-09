<?php

/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 4/8/2018
 * Time: 1:53 AM
 */
class Product
{
	private $id;
	private $name;
	private $price;
	private $type;
	private $imageName;


	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getPrice()
	{
		return $this->price;
	}

	public function setPrice($price)
	{
		$this->price = $price;
	}

	public function getType()
	{
		return $this->type;
	}

	public function setType($type)
	{
		$this->type = $type;
	}

	public function getImageName()
	{
		return $this->imageName;
	}

	public function setImageName($imageName)
	{
		$this->imageName = $imageName;
	}


}
