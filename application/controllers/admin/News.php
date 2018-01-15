<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
	
	 function __construct(){
        parent::__construct(); // needed when adding a constructor to a controller
		$this->login->check_admin_login();
	
    }

	public function index()
	{
		$data['title']		=	'News';
		$data['heading']	=	'News';
		$data['icon']		=	'fa fa-newspaper-o';
		
		$data['news']      =   $this->lib->get_table('news',array('id'=>'asc'),NULL,50);

		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/news',$data);
		$this->load->view('admin/includes/footer',$data);
	}

	public function add(){
		$this->login->check_admin_login();
		$data	=	$this->input->post();
		if(!$data){
			$this->lib->redirect_msg('Please enter News details to add','warning','admin/news');
		}
		
		$insert	=	$this->db->insert('news',$data);
		if($insert){
			$this->lib->redirect_msg('News added successfully','success','admin/news');
		}else{
			$this->lib->redirect_msg('Unable to add news due to server error','warning','admin/news');
		}
			
	}

	public function del($id){
		$this->login->check_admin_login();
		if(!$id){
			$this->lib->redirect_msg('Invalid request type','warning','admin/news');
		}
		
		$update	=	$this->lib->del('news','id',$id);
		if($update){
			$this->lib->redirect_msg('News trashed successfully','success','admin/news');
		}else{
			$this->lib->redirect_msg('Error in trashing this news','danger','admin/news');
		}
	}
	
	public function edit($id){

		$this->login->check_admin_login();
		if(!$id){
			$this->lib->redirect_msg('Invalid request type','warning','admin/news');
		}
		
		$data['new']	=	$this->lib->get_row_array('news',array('id'=>$id));
		if(!$data){
		echo "No news found, please refresh page and try again";
		exit();
		
		}
		
		$this->load->view('admin/ajax/edit_news',$data);
		
		
	}
	
	public function save(){
		$this->login->check_admin_login();
		$data	=	$this->input->post();
		if(!$data){
			$this->lib->redirect_msg('Invalid request type','warning','admin/news');
		}
		
		$update	=	$this->lib->update('news',$data,'id',$data['id']);
		if($update){
			$this->lib->redirect_msg('News updated successfully','success','admin/news');
		}else{
			$this->lib->redirect_msg('Error in updating News, please try again soon','warning','admin/news');
		}
		
		
	}


}
