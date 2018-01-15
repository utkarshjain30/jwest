<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banners extends CI_Controller {
	
	 function __construct(){
        parent::__construct(); // needed when adding a constructor to a controller
		$this->login->check_admin_login();
	
    }

	public function index()
	{
	
		$data['title']		=	'Banners';
		$data['heading']	=	'Banners';
		$data['icon']		=	'fa fa-picture-o';
		$data['banners']      =   $this->lib->get_table('banners',array('id'=>'asc'),NULL,50);
		
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/banners',$data);
		$this->load->view('admin/includes/footer',$data);
	}

	public function update(){

		$data=$this->input->post();
		if (!is_dir('static/images/banners/')) {
			mkdir('static/images/banners/',777);
		}
		//echo '<pre>';
		//print_r($_FILES['banner1']);exit;
		if($_FILES['banner'.$data['id']]['name']){
			//echo 'yes';exit;
			$path = 'static/images/banners/';
			$upload_file	=	$this->lib->upload_file($path,'banner'.$data['id']);
			$img_orignal	=	getimagesize($upload_file);
			
			//$width			=	$this->lib->get_settings('slider_w');
			//$height			=	$this->lib->get_settings('slider_h');
			//$resized		=	$this->lib->image_resize($upload_file,NULL,$height);
			// if($img_orignal[0]<$width OR $img_orignal[1]<$height){
			// 	$this->lib->redirect_msg('Image size is less than required size: '.$width.'x'.$height,'danger','admin/sliders');
			// }
			
			if($upload_file){
				$data['banner_image'] =	$upload_file;
			}else{
				unset($data['product_featured_image']);
			}	

					
		}

		$update	=	$this->lib->update('banners',$data,'id',$data['id']);

		if($update){
			$this->lib->redirect_msg('Banner updated successfully','success','admin/banners');
		}else{
			$this->lib->redirect_msg('Something went wrong with server, Please try again in sometime','danger','admin/banners');
		}
		
	}

}
?>