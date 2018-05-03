<?php

/**
 * Created by Adam Ritchie
 * README!
 *
 * A Machine is an individual vending machine, including location info and Product contents.
 *
 * Objects returned by the functions in this class will have the following fields:
 * Field names are exact and case sensitive. So to use, you would do e.g. $machine->Brand
 *
 * id           int
 * Brand        String          (Coca-Cola, Dasani, etc.)
 * Type         String          (Food, Drink, or Coffee)
 * Niner        int             (1 or 0)
 * Credit       int             (1 or 0)
 * Contents     array(Product)  (see Product.php)
 *
 * Building     String
 * Description  String          (description of the location, e.g. Main Level near computers)
 *
 * Latitude     DECIMAL?        MySQL db stores as DECIMAL, not sure what it is stored as in PHP object
 * Longitude    DECIMAL?        but it works, so hurray?
 */
class Machine extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	/**
	 * @param $clusterID int ID of the Cluster from which machines will be selected
	 * @return array of Machines contained within the specified cluster
	 */
	public function getMachinesByCluster($clusterID)
	{
		$sql = 'SELECT Machines.*, Clusters.Building, Clusters.Description, Clusters.Latitude, Clusters.Longitude 
				FROM Machines INNER JOIN Clusters ON Machines.ClusterID = Clusters.id WHERE Machines.ClusterID = ?';
		$query = $this->db->query($sql, array($clusterID));
		$machines = array();
		foreach ($query->result() as $machine) {
			$machine->Contents = $this->getContentsForMachine($machine->id);
			array_push($machines, $machine);
		}
		return $machines;
	}

	/**
	 * @param $id int ID of the Machine to be selected
	 * @return Machine with the matching ID, or null if not found
	 */
	public function getMachineByID($id)
	{
		$sql = 'SELECT Machines.*, Clusters.Building, Clusters.Description, Clusters.Latitude, Clusters.Longitude 
				FROM Machines INNER JOIN Clusters ON Machines.ClusterID = Clusters.id WHERE Machines.id = ?';
		$query = $this->db->query($sql, array($id));
		$machine = $query->row();
		$machine->Contents = $this->getContentsForMachine($machine->id);
		return $machine;
	}

	/**
	 * @param $productID int ID of the Product to be searched for
	 * @return array of Machines which contain the specified Product, no more than one per cluster
	 */
	public function getMachinesWithProduct($productID)
	{
		$sql = 'SELECT Machines.*, Clusters.Building, Clusters.Description, Clusters.Latitude, Clusters.Longitude 
				FROM Machines INNER JOIN Clusters ON Machines.ClusterID = Clusters.id INNER JOIN Contents ON 
				Machines.id = Contents.MachineID WHERE Contents.ProductID = ?';
		$query = $this->db->query($sql, array($productID));
		$results = array();
		foreach ($query->result() as $machine) {
			$machine->Contents = $this->getContentsForMachine($machine->id);
			array_push($results, $machine);
		}
		return $results;
	}

	/**
	 * @return array of Machines which accept 49er Card as payment method
	 */
	public function getNinerCardMachines()
	{
		$sql = 'SELECT Machines.*, Clusters.Building, Clusters.Description, Clusters.Latitude, Clusters.Longitude 
				FROM Machines INNER JOIN Clusters ON Machines.ClusterID = Clusters.id WHERE Machines.Niner = 1';
		$query = $this->db->query($sql);
		$results = array();
		foreach ($query->result() as $machine) {
			$machine->Contents = $this->getContentsForMachine($machine->id);
			array_push($results, $machine);
		}
		return $results;
	}

	/**
	 * @return array of Machines which accept credit/debit card as payment
	 */
	public function getCreditCardMachines()
	{
		$sql = 'SELECT Machines.*, Clusters.Building, Clusters.Description, Clusters.Latitude, Clusters.Longitude 
				FROM Machines INNER JOIN Clusters ON Machines.ClusterID = Clusters.id WHERE Machines.Credit = 1';
		$query = $this->db->query($sql);
		$results = array();
		foreach ($query->result() as $machine) {
			$machine->Contents = $this->getContentsForMachine($machine->id);
			array_push($results, $machine);
		}
		return $results;
	}


	/* Private Functions, only used within the class */
	private function getContentsForMachine($machineID)
	{
		$sql = 'SELECT * FROM Products INNER JOIN Contents ON Products.id = Contents.ProductID WHERE MachineID = ?';
		$query = $this->db->query($sql, array($machineID));
		$contents = array();
		foreach ($query->result() as $product) {
			array_push($contents, $product);
		}
		return $contents;
	}
}
