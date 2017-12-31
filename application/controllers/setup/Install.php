<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Install extends CI_Controller {

	public function index()
	{
		$check_install	=	$this->lib->get_settings('installed');
		if($check_install==1){
			$this->lib->redirect_msg('Seems like Your setup is completed','success','home');
		}
		$this->load->view('setup/install');
	}
}
