<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function index()
	{
		$this->load->view('front/includes/header');
		$this->load->view('front/contact');
		$this->load->view('front/includes/footer');
	}

	public function save(){
		//$this->login->check_admin_login();
		$data	=	$this->input->post();		

		if(!$data){
			$this->lib->redirect_msg('Please Fill Contact Form','warning','contact');
		}
		$this->load->library('user_agent');

		if ($this->agent->is_browser())
		{
		        $agent = $this->agent->browser().' '.$this->agent->version();
		}
		elseif ($this->agent->is_robot())
		{
		        $agent = $this->agent->robot();
		}
		elseif ($this->agent->is_mobile())
		{
		        $agent = $this->agent->mobile();
		}
		else
		{
		        $agent = 'Unidentified User Agent';
		}

		$data['u_agent'] = $agent.'/'.$this->agent->platform();
		// Platform info (Windows, Linux, Mac, etc.)
		$data['contact_status'] = 3;
		$data['contact_sent_on'] = 	time();
		$data['contact_ip_address'] =	$this->input->ip_address();
		$insert	  =	$this->db->insert('contacts',$data);
		if($insert){
			$mail_html = '<p>Following are the Contact Form Details:-<br><br>
			<strong>Name: </strong>'.$data['contact_name'].'<br>
			<strong>Email: </strong>'.$data['contact_email'].'<br>
			<strong>Phone: </strong>'.$data['contact_phone'].'<br>
			<strong>Subject: </strong>'.$data['contact_subject'].'<br>
			<strong>Message: </strong>'.$data['contact_message'];
			$this->load->library('email');
			$this->email->from('info@jwest.in', 'JWest Store');
			$this->email->to('utkarshjain0078@gmail.com');
			//$this->email->cc('another@another-example.com');
			//$this->email->bcc('them@their-example.com');
			$this->email->subject('Contact Form | Jwest Store');
			$this->email->message($mail_html);
			$this->email->send();
			$this->lib->redirect_msg('Message Sent Successfully','success','contact');
		}else{
			$this->lib->redirect_msg('Unable to sent message due to server error','warning','contact');
		}
			
	}
}
