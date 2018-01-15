<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	/*
	*	Info : Contains methods to Handle user login.
	*	This model is not loaded default in autoload
	*	Developed by Dheeraj jha For JugniTV
	*	Support and Help Dheeraj@thedijje.com
	*
	*/
	
	function __construct() {
        $this->tableName = 'users';
        $this->primaryKey = 'id';
    }
	
	public function save_user($data){
		$this->load->helper('string');
		
		$user_info['user_name']			=	$data['user_name'];
		$user_info['user_email']			=	$data['user_email'];
		
		
		if($this->check_user_exist($data['user_email'])){
			$user_info						=	$this->check_user_exist($data['user_email']);
			return $user_info->user_id;
		}
		
		$password							=	random_string('alnum',8);
		$user_info['user_password']	=	password_hash($password,PASSWORD_DEFAULT,array('cost'=>14));
		$user_info['created_on']		=	time();
		$user_info['user_status']		=	3;
		$query	=	$this->db->insert('users',$user_info);
		if($query){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}
	
	public function check_user_exist($email){
		$check_user	=	$this->lib->get_row_array('users',array('user_email'=>$email));
		if($check_user){
			return $check_user;
		}else{
			return false;
		}
	}
	
	public function checkUser($data = array()){
        $this->db->select($this->primaryKey);
        $this->db->from($this->tableName);
        $this->db->where(array('oauth_provider'=>$data['oauth_provider'],'oauth_uid'=>$data['oauth_uid']));
        $prevQuery = $this->db->get();
        $prevCheck = $prevQuery->num_rows();
        
        if($prevCheck > 0){
            $prevResult = $prevQuery->row_array();
            $data['modified'] = date("Y-m-d H:i:s");
            $update = $this->db->update($this->tableName,$data,array('id'=>$prevResult['id']));
            $userID = $prevResult['id'];
        }else{
            $data['created'] = date("Y-m-d H:i:s");
            $data['modified'] = date("Y-m-d H:i:s");
            $insert = $this->db->insert($this->tableName,$data);
            $userID = $this->db->insert_id();
        }

        return $userID?$userID:FALSE;
    }
	
}