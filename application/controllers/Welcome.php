<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->model('Payment_model', 'payment');
		$this->load->model('Welcome_model', 'welcome');

	}
	public function index()
	{
		$data['title'] = 'Home';
		$data['santri'] = $this->welcome->getAll();
		
		$this->load->view('partials/_header', $data); 
		$this->load->view('home/index', $data); 
		$this->load->view('partials/_footer');
	}

	public function detail($id)
	{
		$data['title'] = 'Detail';
		$data['detail'] = $this->welcome->getDetail($id);
		$data['pembayaran'] = $this->welcome->getPayment($id);
		
		$this->load->view('partials/_header', $data);
		$this->load->view('home/detail', $data); 
		$this->load->view('partials/_footer');
	}
}
