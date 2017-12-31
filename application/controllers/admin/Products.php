<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
	
	 function __construct(){
        parent::__construct(); // needed when adding a constructor to a controller
		$this->login->check_admin_login();
	
    }

	public function index()
	{
		
		
		$data['title']		=	'Products';
		$data['heading']	=	'Products';
		$data['icon']		=	'fa fa-shopping-bag';
		

		
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/all_products',$data);
		$this->load->view('admin/includes/footer',$data);
	}
}
