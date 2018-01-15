<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fresh_arrivals extends CI_Controller {

	public function index()
	{
		$this->load->view('front/includes/header');
		$this->load->view('front/fresh_arrivals');
		$this->load->view('front/includes/footer');
	}
}
