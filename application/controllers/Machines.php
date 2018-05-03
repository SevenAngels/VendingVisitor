<?php

/**
 * Created by IntelliJ IDEA.
 * User: Adam
 * Date: 4/26/2018
 * Time: 11:06 PM
 */
class Machines extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Machine');
		$this->load->helper('url_helper');
	}

	public function viewMachine($machineID)
	{
		if (!file_exists(APPPATH . 'views/pages/machine.php')) {
			show_404();
		}
		$data['page_title'] = 'Vending Visitor - Machine';
		$data['machine'] = $this->Machine->getMachineByID($machineID);
		$data['active'] = '';

		$this->load->view('templates/header.php', $data);
		$this->load->view('pages/machine.php', $data);
		$this->load->view('templates/footer.php', $data);
	}
}
