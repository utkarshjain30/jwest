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
		
		$data['products']   =   $this->lib->get_table('products',array('id'=>'desc'),NULL,50);
		
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/all_products',$data);
		$this->load->view('admin/includes/footer',$data);
	}

	public function add_new()
	{
		$data['title']							=	'Add Product';
		$data['heading']						=	'Add Product';
		$data['icon']							=	'fa fa-shopping-bag';
		$data['product_featured_image_h']		=	$this->lib->get_settings('product_featured_image_h');
		$data['product_featured_image_w']		=	$this->lib->get_settings('product_featured_image_w');		
		$data['products']						=	$this->lib->get_table('products',array('id'=>'asc'),NULL,50);
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/products.php',$data);
		$this->load->view('admin/includes/footer',$data);
	}

	public function add(){
		$data = $this->input->post();
		if(!$data){
			$this->lib->redirect_msg('Invalid request, please try again soon','danger','admin/products');	
		}
		
		//print_r($data);exit;

		//$pc = implode(",",$data['product_categories']);
		$pcol = implode(",",$data['product_colors']);
		//$pt = implode(",",$data['product_tags']);
		$ps = implode(",",$data['product_size']);

		if (!is_dir('static/images/products/featured/')) {
			mkdir('static/images/products/featured/',777);
		}

		if (!is_dir('static/images/products/gallery_images/')) {
			mkdir('static/images/products/gallery_images/',777);
		}
		
		// echo "<pre>";
		// print_r($_FILES);exit;

		if($_FILES!=''){
			
			$path           =   'static/images/products/featured/';
			$upload_file	=	$this->lib->upload_file($path,'product_featured_image');
			$img_orignal	=	getimagesize($upload_file);
			$width			=	$this->lib->get_settings('product_featured_image_w');
			$height			=	$this->lib->get_settings('product_featured_image_h');
			$resized		=	$this->lib->image_resize($upload_file,NULL,$height);
			
			$data['product_featured_image']	=	$upload_file;

			//$data['product_tags'] 		=   $pt;
			$data['product_colors'] 	=   $pcol;
			//$data['product_categories'] =   $pc;
			$data['product_size']       =   $ps;
			$data['added_on'] 			=   time();
			$added_by 					=	$this->session->userdata('admin');
			$data['added_by'] 			=	$added_by['id'];

			$insert	=	$this->db->insert('products',$data);
			$new_data['product_id'] 		=	$this->db->insert_id();
		}else{
			$this->lib->redirect_msg('Unable to read image, please try again with correct fornat','success','admin/products');
		}
		
		if($insert){
			
			$this->load->library('upload');
    		$number_of_files_uploaded = count($_FILES['product_gallery_images']['name']);
    		$final_files_data = array();
    // Faking upload calls to $_FILE
    for ($i = 0; $i < $number_of_files_uploaded; $i++) :
      $_FILES['userfile']['name']     = $_FILES['product_gallery_images']['name'][$i];
      $_FILES['userfile']['type']     = $_FILES['product_gallery_images']['type'][$i];
      $_FILES['userfile']['tmp_name'] = $_FILES['product_gallery_images']['tmp_name'][$i];
      $_FILES['userfile']['error']    = $_FILES['product_gallery_images']['error'][$i];
      $_FILES['userfile']['size']     = $_FILES['product_gallery_images']['size'][$i];
	  $time=time();
      $target_dir = 'static/images/products/gallery_images/';
      //print_r(basename($_FILES['userfile']['name']));exit;
      $target_file = md5($time.random_string('alnum',8))."_".str_replace(" ","-",substr(basename($_FILES['userfile']['name']),-5));
	  //print_r($target_file);exit;
	  //$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	  $config = array(
      	'file_name'     => $target_file,
      	'allowed_types' => 'jpg|jpeg|png|gif',
        'upload_path'   => 'static/images/products/gallery_images/'
      );

      $this->upload->initialize($config);
      //$this->upload->do_upload();
      if ( ! $this->upload->do_upload()){
        $error = array('error' => $this->upload->display_errors());
      }
      $final_files_data[] = $this->upload->data();
      endfor;
      // echo '<pre>';
      // print_r($final_files_data);exit;
      $new_insert_array = array();
	  	foreach($final_files_data as $fd){
	  		$gallery_data['product_id']	=   $new_data['product_id']; 
	  		$gallery_data['image']		=	'static/images/products/gallery_images/'.$fd['file_name'];
			$insert1		    	=	$this->db->insert('products_gallery_images',$gallery_data);
			$new_insert_array[] = $this->db->insert_id();
	  	}
	  	
	  	$new_insert_data['product_gallery_images'] = implode(",",$new_insert_array);
      	$update	=	$this->lib->update('products',$new_insert_data,'id',$new_data['product_id']);	

			$this->lib->redirect_msg('Product added successfully','success','admin/products');
		}else{
			$this->lib->redirect_msg('Something went wrong with server, Please try again in sometime','danger','admin/products');
		}
	}

	public function edit($id){
		$this->login->check_admin_login();
		if(!$id){
			$this->lib->display_alert('Invalid request!','danger','admin/products');
		}
		$data['title']		=	'Edit Product';
		$data['heading']	=	'Edit Product';
		$data['icon']		=	'fa fa-book';
		$data['product_featured_image_h']		=	$this->lib->get_settings('product_featured_image_h');
		$data['product_featured_image_w']		=	$this->lib->get_settings('product_featured_image_w');		
		$data['cat_info']	=	$this->lib->get_row_array('products',array('id'=>base64_decode($id)));
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/product_edit',$data);
		$this->load->view('admin/includes/footer',$data);	
	}

	public function save(){

		$data		=	$this->input->post();
		if(!$data){
			$this->lib->display_alert('Invalid request!','danger','admin/products');
		}
		
		$this->load->helper('string');
		// echo '<pre>';
		// print_r($data);
		$data['id']	= base64_decode($data['id']);
		//exit;
		$product_detail = $this->lib->get_row_array('products',array('id'=>$data['id']));

	   	if(($_FILES['product_featured_image']['name'])){
			if (!is_dir('static/images/products/featured/')) {
				mkdir('static/images/products/featured/',0777);
			}
		
			$path='static/images/products/featured/';
			$upload_file=$this->lib->upload_file($path,'product_featured_image');
			if($upload_file){
				$data['product_featured_image']=$upload_file;
			}
		}else{
			unset($data['product_featured_image']);
		}
		
		if(count(array_filter($_FILES['product_gallery_images']['name'], 'strlen')) > 0){
	
			$this->load->library('upload');
    		$number_of_files_uploaded = count($_FILES['product_gallery_images']['name']);
    		$final_files_data = array();
		    
		    // Faking upload calls to $_FILE
		    for ($i = 0; $i < $number_of_files_uploaded; $i++):

				$_FILES['userfile']['name']     = $_FILES['product_gallery_images']['name'][$i];
				$_FILES['userfile']['type']     = $_FILES['product_gallery_images']['type'][$i];
				$_FILES['userfile']['tmp_name'] = $_FILES['product_gallery_images']['tmp_name'][$i];
				$_FILES['userfile']['error']    = $_FILES['product_gallery_images']['error'][$i];
				$_FILES['userfile']['size']     = $_FILES['product_gallery_images']['size'][$i];
				
				$time=time();
				
				$target_dir = 'static/images/products/gallery_images/';
				
				$target_file = md5($time.random_string('alnum',8))."_".str_replace(" ","-",substr(basename($_FILES['userfile']['name']),-5));
				
				$config = array(
					'file_name'     => $target_file,
					'allowed_types' => 'jpg|jpeg|png|gif',
					'upload_path'   => 'static/images/products/gallery_images/'
				);

				$this->upload->initialize($config);
				
				if ( ! $this->upload->do_upload()){
					$error = array('error' => $this->upload->display_errors());
				}
				
				$final_files_data[] = $this->upload->data();
			
			endfor;
			
			$new_insert_array = array();

		  	foreach($final_files_data as $fd){
		  		$gallery_data['product_id']	=   $data['id']; 
		  		$gallery_data['image']		=	'static/images/products/gallery_images/'.$fd['file_name'];
				$insert1		    	=	$this->db->insert('products_gallery_images',$gallery_data);
				$new_insert_array[] = $this->db->insert_id();
		  	}
		  	
		  	$product_gallery_images_ids = implode(",",$new_insert_array);
	      		
		  	$new_insert_data['product_gallery_images'] = $product_detail->product_gallery_images.','.$product_gallery_images_ids;

	      	$update	=	$this->lib->update('products',$new_insert_data,'id',$data['id']);			

		}else{
			unset($data['product_gallery_images']);
		}
		
		
		$pcol = implode(",",$data['product_colors']);
		$data['product_colors'] 	=   $pcol;
	
		$ps = implode(",",$data['product_size']);
		$data['product_size']       =   $ps;
		
		
		$update	= $this->lib->update('products',$data,'id',$data['id']);
		if($update){
			$this->lib->redirect_msg('Update Product successfully completed!','success','admin/products');
		}else{
			$this->lib->redirect_msg('Update not completed! please try again soon','danger','admin/products');
		}
		
	}

	public function del($id){
		$this->login->check_admin_login();
		if(!$id){
			$this->lib->redirect_msg('Invalid request type','warning','admin/products');
		}

		$update	=	$this->lib->del('products','id',$id);
		if($update){
			$this->lib->redirect_msg('Product trashed successfully','success','admin/products');
		}else{
			$this->lib->redirect_msg('Error in trashing this product','danger','admin/products');
		}
	}

	public function gallery_delete($id){
		
		$this->login->check_admin_login();
		
		if(!$id){
			$this->lib->redirect_msg('Invalid request type','warning','admin/products');
		}

		//$delete	=	$this->lib->del('products_gallery_images','id',$id);	

		//if($delete){

			$gallery = $this->lib->get_row_array('products_gallery_images',array('id'=> $id));

			$products = $this->lib->get_row_array('products',array('id'=> $gallery->product_id));

			$string1 = $products->product_gallery_images;
			
			$check_id = $id;

			$ids = explode(",",$string1);
			$pro_ids = array();
			foreach($ids as $pgi){
				if($pgi == $check_id){
					unset($pgi);
				}else{
					$pro_ids[] = $pgi;
				}
			}
			//print_r($pro_ids);exit;
			$new_ids['product_gallery_images'] = implode(",",$pro_ids);	

			$update	= $this->lib->update('products',$new_ids,'id',$gallery->product_id);

		//}

	}


}
