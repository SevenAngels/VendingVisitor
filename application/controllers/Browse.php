<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by IntelliJ IDEA.
 * User: Adam
 * Date: 4/9/2018
 * Time: 7:54 PM
 */
class Browse extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product');
		$this->load->helper('url_helper');
	}

	public function all()
	{

		$data['page_title'] = 'Vending Visitor - Browse';
		$data['products'] = $this->Product->getAllProducts();

		$this->load->view('templates/header.php', $data);
		$this->load->view('pages/browse.php', $data);
	}
}
