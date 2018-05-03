<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by IntelliJ IDEA.
 * User: Adam
 * Date: 4/9/2018
 * Time: 7:54 PM
 */
class Products extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product');
		$this->load->model('Machine');
		$this->load->helper('url_helper');
	}

	public function viewAll()
	{

		$data['page_title'] = 'Vending Visitor - Browse';
		$data['products'] = $this->Product->getAllProducts();
		$data['active'] = 'Browse';

		$this->load->view('templates/header.php', $data);
		$this->load->view('pages/browse.php', $data);
		$this->load->view('templates/footer.php', $data);
	}

	public function viewSnacks()
	{
		$data['page_title'] = 'Vending Visitor - Browse';
		$data['products'] = $this->Product->getAllSnacks();
		$data['active'] = 'Browse';

		$this->load->view('templates/header.php', $data);
		$this->load->view('pages/browse.php', $data);
		$this->load->view('templates/footer.php', $data);
	}

	public function viewDrinks()
	{
		$data['page_title'] = 'Vending Visitor - Browse';
		$data['products'] = $this->Product->getAllDrinks();
		$data['active'] = 'Browse';

		$this->load->view('templates/header.php', $data);
		$this->load->view('pages/browse.php', $data);
		$this->load->view('templates/footer.php', $data);
	}

	public function viewProduct($id)
	{
		$data['page_title'] = 'Vending Visitor - Browse';
		$data['product'] = $this->Product->getProductByID($id);
		$data['machines'] = $this->Machine->getMachinesWithProduct($id);
		$data['active'] = 'Browse';
		$this->load->view('templates/header.php', $data);
		$this->load->view('pages/product.php', $data);
		$this->load->view('templates/footer.php', $data);
	}
}
