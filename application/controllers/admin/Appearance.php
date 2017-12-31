<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appearance extends CI_Controller {
	
	 function __construct(){
        parent::__construct(); // needed when adding a constructor to a controller
		$this->login->check_admin_login();
	
    }

	public function index()
	{
		
		
		$data['title']			=	'Customise Appearance';
		$data['heading']	=	'Customise Appearance';
		$data['icon']		=	'fa fa-paint-brush';
		

		
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/appearance',$data);
		$this->load->view('admin/includes/footer',$data);
	}
}
