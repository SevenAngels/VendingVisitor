<?php

/**
 * Created by IntelliJ IDEA.
 * User: Adam
 * Date: 4/9/2018
 * Time: 3:40 PM
 */
class Map extends CI_Controller
{
	public function view($page = 'map')
	{
		if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
			show_404();
		}

		$data['page_title'] = "Vending Visitor";

		$this->load->view('templates/header', $data);
		$this->load->view('pages/' . $page, $data);
	}
}
