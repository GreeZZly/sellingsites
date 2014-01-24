<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

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
	public function order() {
		$this->load->helper(array('form', 'url'));
		$this->load->library('email');
		$this->load->library('form_validation');

		$config['mailtype'] = 'html';
		$this->email->initialize($config);

		$this->form_validation->set_rules('name', 'Name', 'required|min_length[2]|max_length[16]|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean');
		$this->form_validation->set_rules('phone', 'Phone number', 'required|numeric');
		// $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('main/htmlheader');
			$this->load->view('main/form');
			$this->load->view('main/htmlfooter');
		}
		else
		{	
			$data = array('name' =>$this->input->post('name'),
							'email' => $this->input->post('email'),
							'phone' => $this->input->post('phone'),
							'company' => $this->input->post('company')
				);
			// print_r($data);
			$this->email->clear();
			$this->email->from('sellingsites');
			$this->email->to('egor@sellingsites.pro'); 	
			$this->email->subject('Новый заказ!');
			$this->email->message("Поступил заказ от \nИмя: ".$data['name']."\nEmail: ".$data['email']."\nТелефон: ".$data['phone']."\nКомпания: ".$data['company']."");	

			$this->email->send();
			$this->load->view('main/formsuccess');
			// echo $this->email->print_debugger();
		}
	}
	
}