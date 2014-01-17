<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->load->view('main/htmlheader');
		$this->load->view('main/header');
		$this->load->view('main/navbar');
		$this->load->view('main/pusto_mesto');
		$this->load->view('main/hero');
		$this->load->view('main/clients');
		$this->load->view('main/why');
		$this->load->view('main/masterclass');
		$this->load->view('main/pholio');
		$this->load->view('main/thanks');
		$this->load->view('main/3steps');
		$this->load->view('main/form');
		$this->load->view('main/partners');
		$this->load->view('main/blog');
		$this->load->view('main/minimap');
		$this->load->view('main/footer');
		$this->load->view('main/htmlfooter');
	}
}