<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends CI_Controller {
	
	
	public function index(){
		$data['title']		=	'User Enquiry';
		$data['heading']	=	'User Enquiry';
		$data['icon']		=	'fa fa-phone';
		$data['message']	=	$this->lib->get_table('contacts',array('contact_status'=>'desc','contact_id'=>'desc'));
		
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/contacts',$data);
		$this->load->view('admin/includes/footer',$data);
		
		
	}
	
	public function view($id){
		if(!$id){
			$this->lib->display_alert('Invalid request!','danger','info-circle');
			exit();
		}
		
		$data['contact']	=	$this->lib->get_row_array('contacts',array('contact_id'=>base64_decode($id)));
		if(!$data['contact']){
			$this->lib->display_alert('Contacts not available, either deleted or does not exist','danger','info-circle');
			exit();
		}
		$this->lib->update('contacts',array('contact_status'=>1,'contact_seen_on'=>time()),'contact_id',base64_decode($id));
		
		$this->load->view('admin/ajax/view_contact',$data);
	}
	
	public function del($id){
		if(!$id){
			echo $id;
			$this->lib->redirect_msg('Invalid request','danger','admin/contacts');
			
		}
		$del	=	$this->lib->del('contacts','contact_id',base64_decode($id));
		$this->lib->redirect_msg('Deleted successfully','success','admin/contacts');
	}
	
}