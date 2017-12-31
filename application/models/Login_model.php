<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
	/*
	*	Info : Contains methods to Handle user login.
	*	This model is not loaded default in autoload
	*	Developed by Dheeraj jha For JugniTV
	*	Support and Help Dheeraj@thedijje.com
	*
	*/
		
		public function login_validate($data){
			if($data['email']=='' OR $data['password']=='' OR strlen($data['password'])<40){
			return false;	
			}
			$data['status']	=	1;
			
			$check		=	$this->lib->get_multi_where('admin',$data);
			if($check){
				foreach($check as $admin){
					$sess	=	array(
						'id'			=>	$admin->id,
						'name'		=>	$admin->name,
						'email'		=>	$admin->email,
						'is_login'	=>	TRUE,
						'last_login'=>	time()
					);
									
				}
			
			$this->session->set_userdata('admin',$sess);
			$this->lib->update('admin',array('last_login'=>time()),'id',$sess['id']);
			return TRUE;	
				
			}else{
			return FALSE;
			}
			
			
			
		}
		
		public function check_admin_login(){
			$adm_data	=	$this->session->userdata('admin');
			if(!isset($adm_data) OR !$adm_data['is_login'] OR !$adm_data['email']){
				$this->lib->redirect_msg('To access this page, you need to login first!','danger','admin/login?redirect='.uri_string());

			}
			
		}
	
}