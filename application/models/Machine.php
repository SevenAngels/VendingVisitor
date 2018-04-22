<?php

/**
 * Created by IntelliJ IDEA.
 * User: Adam
 * Date: 4/20/2018
 * Time: 11:10 PM
 */
class Machine extends CI_Model
{
	//TODO Unit test functions in this model
	public function __construct()
	{
		$this->load->database();
	}

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
	}

	public function getMachineByID($id)
	{
		$sql = 'SELECT Machines.*, Clusters.Building, Clusters.Description, Clusters.Latitude, Clusters.Longitude 
				FROM Machines INNER JOIN Clusters ON Machines.ClusterID = Clusters.id WHERE Machines.id = ?';
		$query = $this->db->query($sql, array($id));
		$machine = $query->row();
		$machine->Contents = $this->getContentsForMachine($machine->id);
		return $machine;
	}

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

	private function getClusterByID($clusterID)
	{
		$sql = 'SELECT * FROM Clusters WHERE id = ?';
		$query = $this->db->query($sql, array($clusterID));
		return $query->row();
	}
}
