<?php

/**
 * Created by IntelliJ IDEA.
 * User: Adam
 * Date: 4/20/2018
 * Time: 11:01 PM
 */
class Cluster extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function getAllClusters()
	{
		$sql = 'SELECT * FROM Clusters';
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function getClusterByID($id)
	{
		$sql = 'SELECT * FROM Clusters WHERE id = ?';
		$query = $this->db->query($sql, array($id));
		return $query->row();
	}

	public function getClustersByBuilding($building)
	{
		$sql = 'SELECT * FROM Clusters WHERE Building LIKE ?';
		$query = $this->db->query($sql, array('%' . $building . '%'));
		return $query->result();
	}

	public function getClusterByMachine($machineID)
	{
		$sql = 'SELECT Clusters.* FROM Machines INNER JOIN Clusters ON Machines.ClusterID = Clusters.id WHERE Machines.id = ?';
		$query = $this->db->query($sql, array($machineID));
		return $query->row();
	}
}
