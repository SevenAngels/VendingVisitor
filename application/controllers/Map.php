<?php

/**
 * Created by IntelliJ IDEA.
 * User: Adam
 * Date: 4/9/2018
 * Time: 3:40 PM
 */
class Map extends CI_Controller
{
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
	 * Only used for map testing
	 */
	public function browse()
	{
		if (!file_exists(APPPATH . 'views/pages/maptest.php')) {
			show_404();
		}
		$data = [];

		$this->load->view('templates/header', $data);
		$this->load->view('pages/maptest', $data);

	}

	/**
	 * TODO: create this function to return the necessary content for the infoWindow of a specific cluster of machines
	 * @param $index
	 */
	public function infoWindow($index)
	{

	}
}
