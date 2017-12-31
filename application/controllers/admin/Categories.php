<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {
	
	 function __construct(){
        parent::__construct(); // needed when adding a constructor to a controller
		$this->login->check_admin_login();
	
    }

	public function index()
	{
		
		$data['title']		=	'Categories';
		$data['heading']	=	'Categories';
		$data['icon']		=	'fa fa-list';
		$data['categories'] =	$this->lib->get_by_id('categories','parent_category',0,NULL,array('category_name'=>'ASC'));
		//$data['categories']	=	$this->lib->get_table('categories');

		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/categories',$data);
		$this->load->view('admin/includes/footer',$data);
	}

	public function add(){
		$this->login->check_admin_login();
		$data	=	$this->input->post();
		if(!$data){
			$this->lib->redirect_msg('Please enter Category details to add','warning','admin/categories');
		}
		
		$insert	=	$this->db->insert('categories',$data);
		if($insert){
			$this->lib->redirect_msg('Category added successfully','success','admin/categories');
		}else{
			$this->lib->redirect_msg('Unable to add category due to server error','warning','admin/categories');
		}
			
	}

	public function del($id){
		$this->login->check_admin_login();
		if(!$id){
			$this->lib->redirect_msg('Invalid request type','warning','admin/categories');
		}
		
		$category_check	=	$this->lib->get_row_array('categories',array('id'=>$id));

		if($category_check->parent_category == 0){

			$data_update = $this->lib->get_by_id('categories','parent_category',$id);			
			foreach($data_update as $du){

				$this->lib->update('categories',array('parent_category'=>0),'id',$du->id);

			}

		}

		$update	=	$this->lib->del('categories','id',$id);
		if($update){
			$this->lib->redirect_msg('Category trashed successfully','success','admin/categories');
		}else{
			$this->lib->redirect_msg('Error in trashing this category','danger','admin/categories');
		}
	}
	
	public function edit($id){

		$this->login->check_admin_login();
		if(!$id){
			$this->lib->redirect_msg('Invalid request type','warning','admin/categories');
		}
		
		$data['categories']	=	$this->lib->get_row_array('categories',array('id'=>$id));
		if(!$data){
		echo "No Category found, please refresh page and try again";
		exit();
		
		}
		
		$this->load->view('admin/ajax/edit_category',$data);
		
		
	}
	
	public function save(){
		$this->login->check_admin_login();
		$data	=	$this->input->post();
		if(!$data){
			$this->lib->redirect_msg('Invalid request type','warning','admin/categories');
		}
		
		$update	=	$this->lib->update('categories',$data,'id',$data['id']);
		if($update){
			$this->lib->redirect_msg('Category updated successfully','success','admin/categories');
		}else{
			$this->lib->redirect_msg('Error in updating Category, please try again soon','warning','admin/categories');
		}
		
		
	}


}
