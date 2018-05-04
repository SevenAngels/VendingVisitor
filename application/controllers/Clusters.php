<?php

/**
 * Created by IntelliJ IDEA.
 * User: Adam
 * Date: 4/26/2018
 * Time: 11:27 PM
 */
class Clusters extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cluster');
		$this->load->model('Machine');
		$this->load->helper('url_helper');
	}

	public function viewCluster($clusterID)
	{
		if (!file_exists(APPPATH . 'views/pages/cluster.php')) {
			show_404();
		}
		$data['page_title'] = 'Vending Visitor - Cluster';
		$cluster = $this->Cluster->getClusterByID($clusterID);
		$data['cluster'] = $this->getInfoWindow($cluster);
		$data['active'] = '';

		$this->load->view('templates/header.php', $data);

		//If cluster contains only one machine, load the machine page instead of cluster page
		if ($data['cluster']->NumFood + $data['cluster']->NumDrink == 1) {
			$data['machine'] = $this->Machine->getMachinesByCluster($clusterID)[0];
			$this->load->view('pages/machine.php', $data);
		} else {
			$data['machines'] = $this->Machine->getMachinesByCluster($clusterID);

			$this->load->view('pages/cluster.php', $data);
		}
		$this->load->view('templates/footer.php', $data);
	}

	private function getInfoWindow($cluster) //TODO add link to directions in infoWindow button once the service is done
	{
		$content =
			"<section class=\"jumbotron text-center\"><div class=\"container\"><h1 class=\"jumbotron-heading\">$cluster->Building</h1></div><p class=\"lead text-muted\">$cluster->Description</p><a href=\"#\"><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">Get Directions</button></a></section>";
		$cluster->Content = $content;
		return $cluster;
	}

}
