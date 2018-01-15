<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company_profile extends CI_Controller {

	public function index()
	{
		$this->load->view('front/includes/header');
		$this->load->view('front/company_profile');
		$this->load->view('front/includes/footer');
	}
}
