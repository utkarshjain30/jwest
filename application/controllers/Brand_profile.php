<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand_profile extends CI_Controller {

	public function index()
	{
		$this->load->view('front/includes/header');
		$this->load->view('front/brand_profile');
		$this->load->view('front/includes/footer');
	}
}
