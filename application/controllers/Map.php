<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by IntelliJ IDEA.
 * User: Adam
 * Date: 4/9/2018
 * Time: 3:40 PM
 */
class Map extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Machine');
		$this->load->model('Product');
		$this->load->model('Cluster');
		$this->load->helper('url_helper');
	}

	public function view()
	{
		if (!file_exists(APPPATH . 'views/pages/map.php')) {
			show_404();
		}

		$data['page_title'] = "Vending Visitor";
		$data['clusters'] = $this->Cluster->getAllClusters();

		$this->load->view('templates/header', $data);
		$this->load->view('pages/map', $data);
		$this->load->view('templates/footer.php', $data);
	}

	/**
	 * Only used for testing
	 */
	public function testProductID()
	{
		if (!file_exists(APPPATH . 'views/pages/machine.php')) {
			show_404();
		}
		$data['page_title'] = "VV Testing";
		$data['machines'] = $this->Machine->getMachinesWithProduct(11);

		$this->load->view('templates/header', $data);
		$this->load->view('pages/machinetest', $data);
		$this->load->view('templates/footer.php', $data);
	}

	public function testMap()
	{
		if (!file_exists(APPPATH . 'views/pages/maptest.php')) {
			show_404();
		}
		$data['page_title'] = "VV Testing";
		$data['clusters'] = $this->Cluster->getAllClusters();

		$this->load->view('templates/header', $data);
		$this->load->view('pages/maptest', $data);
		$this->load->view('templates/footer.php', $data);
	}
}
