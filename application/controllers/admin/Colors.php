<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colors extends CI_Controller {
	
	 function __construct(){
        parent::__construct(); // needed when adding a constructor to a controller
		$this->login->check_admin_login();
	
    }

	public function index()
	{
			
		$data['title']		=	'Colors';
		$data['heading']	=	'Colors';
		$data['icon']		=	'fa fa-paint-brush';
		
		$data['colors']      =   $this->lib->get_table('product_colors',array('id'=>'asc'),NULL,50);

		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/colors',$data);
		$this->load->view('admin/includes/footer',$data);
	}


	public function add(){
		$this->login->check_admin_login();
		$data	=	$this->input->post();
		if(!$data){
			$this->lib->redirect_msg('Please enter color details to add','warning','admin/colors');
		}
		
		$insert	=	$this->db->insert('product_colors',$data);
		if($insert){
			$this->lib->redirect_msg('Color added successfully','success','admin/colors');
		}else{
			$this->lib->redirect_msg('Unable to add size due to server error','warning','admin/colors');
		}
			
	}

	public function del($id){
		$this->login->check_admin_login();
		if(!$id){
			$this->lib->redirect_msg('Invalid request type','warning','admin/colors');
		}
		
		$update	=	$this->lib->del('product_colors','id',$id);
		if($update){
			$this->lib->redirect_msg('Color trashed successfully','success','admin/colors');
		}else{
			$this->lib->redirect_msg('Error in trashing this color','danger','admin/colors');
		}
	}
	
	public function edit($id){

		$this->login->check_admin_login();
		if(!$id){
			$this->lib->redirect_msg('Invalid request type','warning','admin/colors');
		}
		
		$data['colors']	=	$this->lib->get_row_array('product_colors',array('id'=>$id));
		if(!$data){
		echo "No Color found, please refresh page and try again";
		exit();
		
		}
		
		$this->load->view('admin/ajax/edit_color',$data);
		
	}
	
	public function save(){
		$this->login->check_admin_login();
		$data	=	$this->input->post();
		if(!$data){
			$this->lib->redirect_msg('Invalid request type','warning','admin/colors');
		}
		
		$update	=	$this->lib->update('product_colors',$data,'id',$data['id']);
		if($update){
			$this->lib->redirect_msg('Color updated successfully','success','admin/colors');
		}else{
			$this->lib->redirect_msg('Error in updating Color, please try again soon','warning','admin/colors');
		}
		
	}


}
