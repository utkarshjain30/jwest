<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {
	
	 function __construct(){
        parent::__construct(); // needed when adding a constructor to a controller
		$this->login->check_admin_login();
	
    }

	public function index()
	{
		
		
		$data['title']		=	'Blog Posts';
		$data['heading']	=	'Blog Posts';
		$data['icon']		=	'fa fa-edit';
		
		$data['all_posts']	=	$this->lib->get_table('blog_post');
				
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/posts',$data);
		$this->load->view('admin/includes/footer',$data);
	}

	public function create(){

		
	}
}
