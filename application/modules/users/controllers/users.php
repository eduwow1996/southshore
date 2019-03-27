<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

	public function index(){
		$data['users'] = $this->MY_Model->getRows('tbl_users','*',array('user_type' => 1),'','','');
        $this->load_page('index',$data);
	}

	public function create_users(){
		$fullname = $this->input->post('fullname');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = array(
			'username' => $username,
			'fullname' => $fullname,
			'password' => password_hash($password,PASSWORD_DEFAULT),
			'user_status' => 0,
			'user_status' => 1
		);
		if($this->MY_Model->insert('tbl_users',$data)){
			echo 1;
		}
	}

}
