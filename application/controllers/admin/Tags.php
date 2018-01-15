<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tags extends CI_Controller {
	
	 function __construct(){
        parent::__construct(); // needed when adding a constructor to a controller
		$this->login->check_admin_login();
	
    }

	public function index()
	{
		$data['title']		=	'Tags';
		$data['heading']	=	'Tags';
		$data['icon']		=	'fa fa-arrows-alt';
		
		$data['tags']      =   $this->lib->get_table('product_tags',array('id'=>'asc'),NULL,50);

		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/tags',$data);
		$this->load->view('admin/includes/footer',$data);
	}

	public function add(){
		$this->login->check_admin_login();
		$data	=	$this->input->post();
		if(!$data){
			$this->lib->redirect_msg('Please enter Tag details to add','warning','admin/tags');
		}
		
		$insert	=	$this->db->insert('product_tags',$data);
		if($insert){
			$this->lib->redirect_msg('Tag added successfully','success','admin/tags');
		}else{
			$this->lib->redirect_msg('Unable to add tag due to server error','warning','admin/tags');
		}
			
	}

	public function del($id){
		$this->login->check_admin_login();
		if(!$id){
			$this->lib->redirect_msg('Invalid request type','warning','admin/tags');
		}
		
		$update	=	$this->lib->del('product_tags','id',$id);
		if($update){
			$this->lib->redirect_msg('Tag trashed successfully','success','admin/tags');
		}else{
			$this->lib->redirect_msg('Error in trashing this tag','danger','admin/tags');
		}
	}
	
	public function edit($id){

		$this->login->check_admin_login();
		if(!$id){
			$this->lib->redirect_msg('Invalid request type','warning','admin/tags');
		}
		
		$data['tags']	=	$this->lib->get_row_array('product_tags',array('id'=>$id));
		if(!$data){
		echo "No Tag found, please refresh page and try again";
		exit();
		
		}
		
		$this->load->view('admin/ajax/edit_tags',$data);
		
		
	}
	
	public function save(){
		$this->login->check_admin_login();
		$data	=	$this->input->post();
		if(!$data){
			$this->lib->redirect_msg('Invalid request type','warning','admin/tags');
		}
		
		$update	=	$this->lib->update('product_tags',$data,'id',$data['id']);
		if($update){
			$this->lib->redirect_msg('Tag updated successfully','success','admin/tags');
		}else{
			$this->lib->redirect_msg('Error in updating Tag, please try again soon','warning','admin/tags');
		}
			
	}

}
