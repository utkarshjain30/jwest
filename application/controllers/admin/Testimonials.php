<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonials extends CI_Controller {
	
	 function __construct(){
        parent::__construct(); // needed when adding a constructor to a controller
		$this->login->check_admin_login();
	
    }

	public function index()
	{
	
		$data['title']		=	'Testimonials';
		$data['heading']	=	'Testimonials';
		$data['icon']		=	'fa fa-comments';
		$data['testimonials']      =   $this->lib->get_table('testimonials',array('id'=>'asc'),NULL,50);
		
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/all_testimonials',$data);
		$this->load->view('admin/includes/footer',$data);
	}

	public function add_new()
	{
		$data['title']		=	'Add Testimonial';
		$data['heading']	=	'Add Testimonial';
		$data['icon']		=	'fa fa-comments';
		$data['testimonial_image_h']		=	$this->lib->get_settings('testimonial_image_h');
		$data['testimonial_image_w']		=	$this->lib->get_settings('testimonial_image_w');		
		$data['testimonials']		=	$this->lib->get_table('testimonials',array('id'=>'asc'),NULL,50);
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/testimonials.php',$data);
		$this->load->view('admin/includes/footer',$data);
	}


	public function add(){
		$data = $this->input->post();
		if(!$data){
			$this->lib->redirect_msg('Invalid request, please try again soon','danger','admin/testimonials');	
		}
		
		if (!is_dir('static/images/testimonials/')) {
			mkdir('static/images/testimonials/',777);
		}
			
		if($_FILES!=''){
			
			$path           =   'static/images/testimonials/';
			$upload_file	=	$this->lib->upload_file($path,'customer_image');
			$img_orignal	=	getimagesize($upload_file);
			$width			=	$this->lib->get_settings('testimonial_image_w');
			$height			=	$this->lib->get_settings('testimonial_image_h');
			$resized		=	$this->lib->image_resize($upload_file,NULL,$height);
			
		
		}else{
			$this->lib->redirect_msg('Unable to read image, please try again with correct fornat','success','admin/testimonials');
		}
		
		$data['customer_image']	=	$upload_file;
		$data['added_on'] 		=   time();

		$insert	=	$this->db->insert('testimonials',$data);
		if($insert){
			$this->lib->redirect_msg('Testimonial added successfully','success','admin/testimonials');
		}else{
			$this->lib->redirect_msg('Something went wrong with server, Please try again in sometime','danger','admin/testimonials');
		}
	}

}
?>