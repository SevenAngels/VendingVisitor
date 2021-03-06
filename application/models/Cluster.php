<?php

/**
 * Created by Adam Ritchie
 * README!
 *
 * A Cluster is a group of one or more Machines.
 *
 * Objects returned by the functions in this class will have the following fields.
 * Field names are exact and case sensitive. So to use, you would do e.g. $cluster->Building
 *
 * id            int
 * Building      String
 * Description   String          (description of the location, e.g. Main Level near computers)
 *
 * Latitude      DECIMAL?        MySQL db stores as DECIMAL, not sure what it is stored as in PHP object
 * Longitude     DECIMAL?        but it works, so hurray?
 *
 * NumFood       int             (number of food machines located at this cluster)
 * NumDrink      int             (I'm sure you can extrapolate what this one means)
 * NumCoffee     int
 */
class Cluster extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	/**
	 * @return array of all Clusters
	 */
	public function getAllClusters()
	{
		$sql = 'SELECT * FROM Clusters';
		$query = $this->db->query($sql);
		$clusters = $query->result();
		$results = array();
		foreach ($clusters as $cluster) {
			$cluster = $this->getCounts($cluster);
			array_push($results, $cluster);
		}
		return $results;
	}

	/**
	 * @param $id int ID of the Cluster to be selected
	 * @return Cluster with the correct ID, or null if not found
	 */
	public function getClusterByID($id)
	{
		$sql = 'SELECT * FROM Clusters WHERE id = ?';
		$query = $this->db->query($sql, array($id));
		$cluster = $query->row();
		$cluster = $this->getCounts($cluster);
		return $cluster;
	}

	/**
	 * @param $building String building search query
	 * @return array of Clusters with a Building name containing or matching the query
	 */
	public function getClustersByBuilding($building)
	{
		$sql = 'SELECT * FROM Clusters WHERE Building LIKE ?';
		$query = $this->db->query($sql, array('%' . $building . '%'));
		$clusters = $query->result();
		$result = array();
		foreach ($clusters as $cluster) {
			$cluster = $this->getCounts($cluster);
			array_push($result, $cluster);
		}
		return $result;
	}

	/**
	 * @param $machineID int ID of a machine
	 * @return Cluster which contains the specified machine
	 */
	public function getClusterByMachine($machineID)
	{
		$sql = 'SELECT Clusters.* FROM Machines INNER JOIN Clusters ON Machines.ClusterID = Clusters.id WHERE Machines.id = ?';
		$query = $this->db->query($sql, array($machineID));
		$cluster = $query->row();
		$cluster = $this->getCounts($cluster);
		return $cluster;
	}

	private function getCounts($cluster)
	{
		$sql = "SELECT COUNT(*) AS NumFood FROM Machines WHERE ClusterID = $cluster->id AND Type = 'Snack'";
		$cluster->NumFood = $this->db->query($sql)->row()->NumFood;
		$sql = "SELECT COUNT(*) AS NumDrink FROM Machines WHERE ClusterID = $cluster->id AND Type = 'Drink'";
		$cluster->NumDrink = $this->db->query($sql)->row()->NumDrink;
		$sql = "SELECT COUNT(*) AS NumCoffee FROM Machines WHERE ClusterID = $cluster->id AND Type = 'Coffee'";
		$cluster->NumCoffee = $this->db->query($sql)->row()->NumCoffee;
		return $cluster;
	}
}
