<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sizes extends CI_Controller {
	
	 function __construct(){
        parent::__construct(); // needed when adding a constructor to a controller
		$this->login->check_admin_login();
	
    }

	public function index()
	{
		$data['title']		=	'Sizes';
		$data['heading']	=	'Sizes';
		$data['icon']		=	'fa fa-arrows-alt';
		
		$data['sizes']      =   $this->lib->get_table('product_sizes',array('id'=>'asc'),NULL,50);

		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/sizes',$data);
		$this->load->view('admin/includes/footer',$data);
	}

	public function add(){
		$this->login->check_admin_login();
		$data	=	$this->input->post();
		if(!$data){
			$this->lib->redirect_msg('Please enter Size details to add','warning','admin/sizes');
		}
		
		$insert	=	$this->db->insert('product_sizes',$data);
		if($insert){
			$this->lib->redirect_msg('Size added successfully','success','admin/sizes');
		}else{
			$this->lib->redirect_msg('Unable to add size due to server error','warning','admin/sizes');
		}
			
	}

	public function del($id){
		$this->login->check_admin_login();
		if(!$id){
			$this->lib->redirect_msg('Invalid request type','warning','admin/sizes');
		}
		
		$update	=	$this->lib->del('product_sizes','id',$id);
		if($update){
			$this->lib->redirect_msg('Size trashed successfully','success','admin/sizes');
		}else{
			$this->lib->redirect_msg('Error in trashing this size','danger','admin/sizes');
		}
	}
	
	public function edit($id){

		$this->login->check_admin_login();
		if(!$id){
			$this->lib->redirect_msg('Invalid request type','warning','admin/sizes');
		}
		
		$data['sizes']	=	$this->lib->get_row_array('product_sizes',array('id'=>$id));
		if(!$data){
		echo "No Size found, please refresh page and try again";
		exit();
		
		}
		
		$this->load->view('admin/ajax/edit_size',$data);
		
		
	}
	
	public function save(){
		$this->login->check_admin_login();
		$data	=	$this->input->post();
		if(!$data){
			$this->lib->redirect_msg('Invalid request type','warning','admin/sizes');
		}
		
		$update	=	$this->lib->update('product_sizes',$data,'id',$data['id']);
		if($update){
			$this->lib->redirect_msg('Size updated successfully','success','admin/sizes');
		}else{
			$this->lib->redirect_msg('Error in updating Size, please try again soon','warning','admin/sizes');
		}
		
		
	}


}
