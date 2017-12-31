<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sliders extends CI_Controller {

	function __construct(){
	parent::__construct(); // needed when adding a constructor to a controller
	$this->login->check_admin_login();

    }

	public function index()
	{

		$data['title']			=	'Add Slider';
		$data['heading']		=	'Add Slider';
		
		$data['icon']			=	'fa fa-clone';
		$data['slide_h']		=	$this->lib->get_settings('slider_h');
		$data['slide_w']		=	$this->lib->get_settings('slider_w');

		$data['slides']		=	$this->lib->get_table('slides',array('slide_id'=>'asc'));
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/sliders',$data);
		$this->load->view('admin/includes/footer',$data);
	}

		public function save(){
			$data=$this->input->post();
			if (!is_dir('static/images/slider/')) {
				mkdir('static/images/slider/',777);
			}
			
			if($_FILES!=''){
			
			$path='static/images/slider/';
			$upload_file	=	$this->lib->upload_file($path,'slide_image');
			$img_orignal	=	getimagesize($upload_file);
			
			$width			=	$this->lib->get_settings('slider_w');
			$height			=	$this->lib->get_settings('slider_h');
			$resized		=	$this->lib->image_resize($upload_file,NULL,$height);
			// if($img_orignal[0]<$width OR $img_orignal[1]<$height){
			// 	$this->lib->redirect_msg('Image size is less than required size: '.$width.'x'.$height,'danger','admin/sliders');
			// }
			
			
			}else{
				$this->lib->redirect_msg('Unable to read image, please try again with correct fornat','success','admin/sliders');
			}
			
			// $checkVideo			=	$this->lib->get_row_array('media_master',array('video_id'=>base64_decode($data['link_url'])));
			// if(!$checkVideo){
			// 	$this->lib->redirect_msg('Video ID is invalid','danger','admin/sliders');
			// }
			
			
			if($upload_file){
			$data['slide_image']	=	$upload_file;
			$data['slide_status']	=	1;

			$query=$this->db->insert('slides',$data);

			if($query){
			$this->lib->redirect_msg('Slide added successfully','success','admin/sliders');
		}else{
			$this->lib->redirect_msg('Something went wrong with server, Please try again in sometime','danger','admin/sliders');
		}

		}

	}

		public function update(){
		$data		=	$this->input->post();
		if(!$data){
			$this->lib->display_alert('Invalid request!','danger','admin/sliders');
		}
		$checkVideo			=	$this->lib->get_row_array('media_master',array('video_id'=>base64_decode($data['link_url'])));
		if(!$checkVideo){
			$this->lib->redirect_msg('Video ID is invalid','danger','admin/sliders');
		}
			
			
		$id			=	base64_decode($data['slide_id']);
		unset($data['slide_id']);

		$update	=	$this->lib->update('slides',$data,'slide_id',$id);
		if($update){
			$this->lib->redirect_msg('Update successfully completed!','success','admin/sliders');
		}else{
			$this->lib->redirect_msg('Update not completed! please try again soon','danger','admin/sliders');
		}

	}

		public function edit($id){
		if(!$id){
			$this->lib->display_alert('Invalid request!','danger','admin/sliders');
		}

		$data['cat_info']	=	$this->lib->get_row_array('slides',array('slide_id'=>base64_decode($id)));
		$this->load->view('admin/ajax/slide_edit',$data);


	}

		public function toogle_active($id){
		if(!$id){
			$this->lib->redirect_msg('Invalid request!','danger','admin/sliders');
		}

		$status		=	$this->lib->get_row_array('slides',array('slide_id' => base64_decode($id)));
		$row = $status->slide_status;
		 if($row==1){
		$val=0;
		}else{
		$val=1;
		}
	     $newdata = array(
			'slide_status' => $val
			);

	   $update=$this->lib->update('slides',$newdata,'slide_id',base64_decode($id));
	   if($update){
		$this->lib->redirect_msg('Status changed','success','admin/sliders');
	   }else{
			$this->lib->redirect_msg('Some Problem occurred please try again later ','danger','admin/sliders');
		}
	}

		public function del($id){
		if(!$id){
			$this->lib->redirect_msg('Invalid request!','danger','admin/sliders');
		}

		$delete	=	$this->lib->del('slides','slide_id',base64_decode($id));
		if($delete){
			$this->lib->redirect_msg('Deletion successfully completed!','success','admin/sliders');
		}else{
			$this->lib->redirect_msg('Error in deleting item, please try again soon!','warning','admin/sliders');
		}

	}

}
