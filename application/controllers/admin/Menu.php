<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
	
	 function __construct(){
        parent::__construct(); // needed when adding a constructor to a controller
		$this->login->check_admin_login();
	
    }

	public function index()
	{
	
		$data['title']		=	'Menu';
		$data['heading']	=	'Menu';
		$data['icon']		=	'fa fa-bars';
		$data['menus'] =	$this->lib->get_by_id('menus','parent_menu',0,NULL,array('menu_order'=>'ASC'));
		
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/menu',$data);
		$this->load->view('admin/includes/footer',$data);
	}

	public function add(){
		$this->login->check_admin_login();
		$data	=	$this->input->post();
		if(!$data){
			$this->lib->redirect_msg('Please enter Menu details to add','warning','admin/menu');
		}
		
		$insert	=	$this->db->insert('menus',$data);
		if($insert){
			$this->lib->redirect_msg('Menu added successfully','success','admin/menu');
		}else{
			$this->lib->redirect_msg('Unable to add menu due to server error','warning','admin/menu');
		}
			
	}

	public function del($id){
		$this->login->check_admin_login();
		if(!$id){
			$this->lib->redirect_msg('Invalid request type','warning','admin/menu');
		}

		$update	=	$this->lib->del('menus','id',$id);
		if($update){
			$this->lib->redirect_msg('Menu trashed successfully','success','admin/menu');
		}else{
			$this->lib->redirect_msg('Error in trashing this menu','danger','admin/menu');
		}
	}

	public function edit($id){

		$this->login->check_admin_login();
		if(!$id){
			$this->lib->redirect_msg('Invalid request type','warning','admin/menu');
		}
		
		$data['menus']	=	$this->lib->get_row_array('menus',array('id'=>$id));
		if(!$data){
		echo "No Menu found, please refresh page and try again";
		exit();
		
		}
		
		$this->load->view('admin/ajax/edit_menu',$data);
		
		
	}
	
	public function save(){
		$this->login->check_admin_login();
		$data	=	$this->input->post();
		if(!$data){
			$this->lib->redirect_msg('Invalid request type','warning','admin/menu');
		}
		
		$update	=	$this->lib->update('menus',$data,'id',$data['id']);
		if($update){
			$this->lib->redirect_msg('Category updated successfully','success','admin/menu');
		}else{
			$this->lib->redirect_msg('Error in updating Category, please try again soon','warning','admin/menu');
		}
		
		
	}
}
