<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function index()
	{
		$this->load->view('front/includes/header');
		$this->load->view('front/contact');
		$this->load->view('front/includes/footer');
	}
}
