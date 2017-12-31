<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function index()
	{
		$this->load->view('front/includes/header');
		$this->load->view('front/about');
		$this->load->view('front/includes/footer');
	}
}
