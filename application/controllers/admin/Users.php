<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		$this->login->check_admin_login();
		$this->load->model('user_model');
		$data['title']		=	'Manage users';
		$data['heading']	=	'Manage users';
		$data['icon']		=	'fa fa-users';
		
		$data['users']		=	$this->lib->get_table('users',array('user_id'=>'desc'),NULL,50);
		$data['filter']		=	$this->input->get('filter');
		
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/users',$data);
		$this->load->view('admin/includes/footer',$data);
	}
	
	
	public function details($user_id){
		if(!$user_id){
			show_404();
		}
		$this->load->model('user_model');
		$user_info			=	$this->user_model->user_details(base64_decode($user_id));
		if(!$user_info){
			$this->lib->redirect_msg('User does not exist','warning','admin/users');
		}
		
		
		
		$data['title']		=	'User detail';
		$data['heading']	=	'User detail';
		$data['icon']		=	'fa fa-users';
		
		$data['users']		=	$user_info;
		
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/users_details',$data);
		$this->load->view('admin/includes/footer',$data);
	}
	
	public function gift_card($user_id){
		$user_id				=	base64_decode($user_id);
		$this->load->model('user_model');
		if($this->user_model->giftcard_eligblity($user_id)){
			$data['user_id']	=	base64_encode($user_id);
			$this->load->view('admin/ajax/add_giftcard',$data);
			
		}else{
			$this->lib->display_alert('This user not eligible for promo gift card','warning','warning');
			exit();
		}
	}
	
	public function save_giftcard(){
		$data	=	$this->input->post();
		if(!$data){
			$this->lib->redirect_msg('Invalid request','warning','admin/users');
		}
		
		$insert['user_id']		=	base64_decode($data['user_id']);
		$insert['promo_string']=	$data['promo_string'];
		$insert['sent_on']		=	time();
		
		$query	=	$this->db->insert('giftcard_promo',$insert);
		if($query){
			$this->lib->redirect_msg('Promotional Gift added to user account','success','admin/users/details/'.$data['user_id']);
			
		}else{
			$this->lib->redirect_msg('Error in adding gift card, please try again soon','warning','admin/users/details/'.$data['user_id']);
			exit();
		}
		
	
	}
	
}
