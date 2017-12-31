<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index()
	{
		$this->load->view('admin/login');
	}
	
	
	
	public function validate(){
		$data	=	$this->input->post();
		if($data['email']=='' OR $data['password']==''){
			$this->lib->redirect_msg('Email/password can not be blank!','danger','admin/login');
		}
		$this->load->model('login_model');
		
		$data['password']	=	sha1($data['password']);
		$data['email']			=	$data['email'];
		
		$login	=	$this->login_model->login_validate(array('email'=>$data['email'],'password'=>$data['password']));
		
		if(!$login){
			$this->lib->redirect_msg('Invalid email/password combination!','danger','admin/login');
		}else{
			if(isset($data['redirect']) && $data['redirect']!=''){
				redirect(base_url($data['redirect']));
				
			}else{
				redirect(base_url('admin/'));
			}
			
			exit();
		}
		
		
	}
	
	public function forget_password(){
		$this->load->view('admin/ajax/pass_reset');
	}
	
	public function reset_password(){
		$email	=	$this->input->post('email');
		if(!$email){
			$this->lib->redirect_msg('Invalid request, please try again soon!','danger','admin/login');
		}
		
		$check	=	$this->lib->get_row_array('admin',array('email'=>$email));
		if(!$check){
			$this->lib->redirect_msg('Email address you have specified, does not exist in record, please try again soon!','danger','admin/login');
		}else{
			$rand		=	rand(rand(10000,50000),rand(50001,99999999));
			$data['password']	=	sha1($rand);
			
			$update	=	$this->lib->update('admin',$data,'email',$email);
			if(!$update){
				$this->lib->redirect_msg('Error in resetting password, please try again soon','danger','admin/login');
			}
			// email
			
			$mdata['name']	=	"Appoinment scheduler";
			$mdata['from']	=	$this->lib->get_settings('email');
			$mdata['to']	=	$email;
			$mdata['message']	=	"Hi ".$check->name."<br>You have requested new password on Appoinment scheduling application, Your new password is : ".$rand.".<br> Please login and change your password to make it more secure and don't share it with anyone.<br>Regards<br>Admin Team";
			$mdata['subject']		=	"New password request ".$this->lib->get_settings('sitename');
			$email_send	=	$this->lib->send_formatted_mail($mdata);
			if($email_send){
				$this->lib->redirect_msg('Password instruction sent you in email, please check email to login','success','admin/login');
			}else{
				$this->lib->redirect_msg('Could not sent you email, please try resetting it again','danger','admin/login');
			}
			
			
		}
	}
}
