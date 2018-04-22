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
		$this->load->helper('url_helper');
	}

	public function view()
	{
		if (!file_exists(APPPATH . 'views/pages/map.php')) {
			show_404();
		}

		$data['page_title'] = "Vending Visitor";

		$this->load->view('templates/header', $data);
		$this->load->view('pages/map', $data);
	}

	/**
	 * Only used for testing
	 */
	public function testProductID()
	{
		if (!file_exists(APPPATH . 'views/pages/machinetest.php')) {
			show_404();
		}
		$data['page_title'] = "VV Testing";
		$data['machines'] = $this->Machine->getMachinesWithProduct(11);

		$this->load->view('templates/header', $data);
		$this->load->view('pages/machinetest', $data);
	}
}
