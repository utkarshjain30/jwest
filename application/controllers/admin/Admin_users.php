<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_users extends CI_Controller {

	public function index()
	{
		$this->login->check_admin_login();
		
		$data['title']			=	'Manage Admin users';
		$data['heading']	=	'Manage Admin users';
		$data['icon']		=	'fa fa-users';
		
		$data['admin']=	$this->lib->get_by_id('admin','status',1);
		
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/admin',$data);
		$this->load->view('admin/includes/footer',$data);
	}
	
	public function add(){
		$this->login->check_admin_login();
		$data	=	$this->input->post();
		if(!$data){
			$this->lib->redirect_msg('Please enter speciality details to add','warning','admin/admin_users');
		}
		$data['password']	=	sha1($data['password']);
		
		$insert	=	$this->db->insert('admin',$data);
		if($insert){
			$this->lib->redirect_msg('Record added successfully','success','admin/admin_users');
		}else{
			$this->lib->redirect_msg('Unable to add record due to server error','warning','admin/admin_users');
		}
		
		
	}
	
	public function del($id){
		$this->login->check_admin_login();
		if(!$id){
			$this->lib->redirect_msg('Invalid request type','warning','admin/admin_users');
		}
		
		$update	=	$this->lib->update('admin',array('status'=>0),'id',$id);
		if($update){
			$this->lib->redirect_msg('Record trashed successfully','success','admin/admin_users');
		}else{
			$this->lib->redirect_msg('Error in trashing this record','danger','admin/admin_users');
		}
	}
	
	public function edit($id){

		$this->login->check_admin_login();
		if(!$id){
			$this->lib->redirect_msg('Invalid request type','warning','admin/specility');
		}
		
		$data['admin']	=	$this->lib->get_row_array('admin',array('id'=>$id));
		if(!$data){
		echo "No Specility found, please refresh page and try again";
		exit();
		
		}
		
		$this->load->view('admin/ajax/edit_admin',$data);
		
		
	}
	
	public function save(){
		$this->login->check_admin_login();
		$data	=	$this->input->post();
		if(!$data){
			$this->lib->redirect_msg('Invalid request type','warning','admin/admin_users');
		}
		
		if($data['password']==''){
		unset($data['password']);	
		}
		
		
		if($data['password']!=''){
			$pass					=	$data['password'];
			$data['password']	=	sha1($data['password']);
		}
		
		$update	=	$this->lib->update('admin',$data,'id',$data['id']);
		if($update){
			if(!empty($data['password'])){
				$mdata['name']	=	"Appoinment scheduler";
				$mdata['from']		=	$this->lib->get_settings('email');
				$mdata['to']		=	$data['email'];
				$mdata['message']	=	"Hi ".$data['name']."<br>Admin have updated your account details and new password is ".$pass."<br>Please login to admin panel and change password ASAP to make it secure. Ignore if this change is made by you<br>Thanks and regards<br>Admin team";
				$mdata['subject']		=	"Account details updated ".$this->lib->get_settings('sitename');
				$email_send		=	$this->lib->send_formatted_mail($mdata);
			}
			
			
			$this->lib->redirect_msg('Specility updated successfully','success','admin/admin_users');
		}else{
			$this->lib->redirect_msg('Error in updating speciality, please try again soon','warning','admin/admin_users');
		}
		
		
	}
}
