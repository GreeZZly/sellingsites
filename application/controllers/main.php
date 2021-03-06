<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->load->helper(array('form', 'url', 'rss'));
		$this->load->library('form_validation');
		// $this->load->helper('rss');
		// $data['feeds']=array();
		// try{
		// 	$data['feeds'] = RSS_Read("http://www.semenzuev.com/feeds/posts/default?alt=rss");
		// }
		// catch(Exception $e){
		// 	$data['feeds'] = array(
		// 						    array(
		// 						            "title" => "Что означает Landing page?",
		// 						            "link" => "http://www.semenzuev.com/2014/03/leading-page.html",
		// 						            "date" => "Mon, 24 Mar 2014 14:19:00 +0000"
		// 						        ),
		// 						    array(
		// 						            "title" => "Как использовать твиттер?",
		// 						            "link" => "http://www.semenzuev.com/2014/01/blog-post_30.html",
		// 						            "date" => "Thu, 30 Jan 2014 10:46:00 +0000"
		// 						        ),
		// 						    array(
		// 						            "title" => "5 советов для выживания в 'джунглях' интернета?!",
		// 						            "link" => "http://www.semenzuev.com/2014/01/5.html",
		// 						            "date" => "Tue, 21 Jan 2014 07:16:00 +0000"
		// 						        )
		// 		);

		// }
		
		// foreach ($data['feeds'] as $key => $value) {
		// 	// 'Wed, 15 Jan 2014 14:37:00 +0000'
		// 	//$value['new_date']  =implode(" ",sscanf($value['date'], "%d %s %d"));

		// 	list($dayw,$day,$mon,$year) = sscanf($value['date'], "%s %d %s %d");
		// 	$value['date'] = $day." ".$mon." ".$year;
		// 	echo $value['date'];
		// }
		
		//print_r($data['feeds']);


		$this->load->view('main/htmlheader');
		$this->load->view('main/header');
		$this->load->view('main/navbar');
		// $this->load->view('main/pusto_mesto');
		$this->load->view('main/hero');
		// $this->load->view('main/clients');
		$this->load->view('main/why');
		$this->load->view('main/masterclass');
		$this->load->view('main/pholio');
		$this->load->view('main/thanks');
		$this->load->view('main/price');
		// $this->load->view('main/3steps');
		$this->load->view('main/form');
		$this->load->view('main/partners');
		$this->load->view('main/blog');
		$this->load->view('main/minimap');

		$this->load->view('main/footer');
		$this->load->view('main/htmlfooter');
	}

	public function test() {
		$this->load->helper('rss');

		$feeds = RSS_Read("http://www.semenzuev.com/feeds/posts/default?alt=rss");
		// for($i=0;$i<3;$i++)
		// 	print_r($feeds[$i]);	
		// foreach ($feeds as $feed){
		//     print_r($feed); // вывод содержимого массива, каждой записи
		// }
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
			$config['mailtype'] = 'text';
			$this->email->initialize($config);
			
			$this->email->clear();
			$this->email->from('info@sellingsites.pro');
			$this->email->to('egor@sellingsites.pro, semen@sellingsites.pro'); 	
			$this->email->subject('Новый заказ!');
			$this->email->message("Поступил заказ от \nИмя: ".$data['name']."\nEmail: ".$data['email']."\nТелефон: ".$data['phone']."\nКомпания: ".$data['company']."");	

			$this->email->send();

			$this->email->clear();
			$this->email->from('info@sellingsites.pro');
			$this->email->to($data['email']); 	
			$this->email->subject('SELLINGSITES.PRO');
			$this->email->message("Приветствуем вас, ".$data['name']."\n\nСпасибо, что проявили интерес к нашей компании.\n\nМы уверены, что разработка продающего сайта и последующая его реклама силами наших специалистов позволит Вам получать больше новых клиентов.\n\nНаш менеджер свяжется с Вами в течение рабочего дня, чтобы обсудить детали.\n\nДо связи!\n\nКоманда SELLINGSITES.PRO");	

			$this->email->send();

			$this->load->view('main/htmlheader');
			$this->load->view('main/formsuccess');
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
			// redirect('/', 'refresh');

			// echo $this->email->print_debugger();
		}
	}
	
}

