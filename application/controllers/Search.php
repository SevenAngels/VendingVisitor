<?php

/**
 * Created by IntelliJ IDEA.
 * User: Adam
 * Date: 4/21/2018
 * Time: 11:17 PM
 */
class Search extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Machine');
		$this->load->model('Product');
		$this->load->helper('url_helper');
	}

	public function searchForProduct()
	{
		if (!file_exists(APPPATH . 'views/pages/searchresults.php')) {
			show_404();
		}
		$query = $this->input->get('query');
		$data['page_title'] = "Search Results - $query";
		$data['results'] = $this->Product->getProductsByName($query);
		$data['query'] = $query;

		$this->load->view('templates/header', $data);
		$this->load->view('pages/searchresults.php', $data);
	}
}
