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
		$machines = $this->Machine->getMachinesWithProduct($id);
		$output = array();
		foreach ($machines as $machine) {
			$machine = $this->getInfoWindow($machine);
			array_push($output, $machine);
		}
		$data['machines'] = $output;
		$data['active'] = 'Browse';
		$this->load->view('templates/header.php', $data);
		$this->load->view('pages/product.php', $data);
		$this->load->view('templates/footer.php', $data);
	}

	private function getInfoWindow($machine)
	{ //TODO fix button link to get directions
		$content =
			"<section class=\"jumbotron text-center\"><div class=\"container\"><h1 class=\"jumbotron-heading\">$machine->Building</h1></div><p class=\"lead text-muted\">$machine->Description<br>";
		if ($machine->Type == 'Drink') {
			$content = $content . "$machine->Brand Machine";
		} else {
			$content = $content . "$machine->Type Machine";
		}
		$content = $content . "</p><a href=\"/index.php/machines/viewMachine/$machine->id\"><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">View Machine Contents</button></a><br><br><a href=\"#\"><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">Get Directions</button></a></section>";
		$machine->Content = $content;
		return $machine;
	}
}
