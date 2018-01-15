<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
	
	 function __construct(){
        parent::__construct(); // needed when adding a constructor to a controller
		$this->login->check_admin_login();
	
    }

public function index()
	{
		
		$data['title']						=	'Settings';
		$data['heading']					=	'Settings';
		$data['icon']						=	'fa fa-sliders';
		$data['sitename']					=	$this->lib->get_settings('sitename');
		$data['email']						=	$this->lib->get_settings('email');
		$data['landline']					=	$this->lib->get_settings('landline');
		$data['mobile']						=	$this->lib->get_settings('mobile');
		$data['facebook']					=	$this->lib->get_settings('facebook');
		$data['twitter']					=	$this->lib->get_settings('twitter');
		$data['instagram']					=	$this->lib->get_settings('instagram');
		$data['skype']						=	$this->lib->get_settings('skype');
		$data['corporate_office_address']					=	$this->lib->get_settings('corporate_office_address');
		$data['address']					=	$this->lib->get_settings('address');
		$data['logo']						=	$this->lib->get_settings('logo');
		$data['email_name']					=	$this->lib->get_settings('sending_email_name');
		$data['free_sub_days']				=	$this->lib->get_settings('free_sub_days');
		$data['meta_detail']				=	$this->lib->get_settings('meta_detail');
		$data['home_title']					=	$this->lib->get_settings('home_title');
		$data['additional_device_cost']		=	$this->lib->get_settings('additional_device_cost');
		
		
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/settings',$data);
		$this->load->view('admin/includes/footer',$data);
	}
	
	public function save_settings($module='sitename'){
		$data	=	$this->input->post('value');
		
		$update	=	$this->lib->update('config',array('value'=>$data),'name',$module);
		if($update){
		echo "<span class='text-success'><i class='fa fa-check-circle'></i> ".$module." Saved!</span>";
		}
		
		
	}
	
	
}
