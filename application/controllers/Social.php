<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social extends CI_Controller {

	public function index()
	{
		$this->load->view('front/includes/header');
		$this->load->view('front/social_junction.php');
		$this->load->view('front/includes/footer');
	}
}
