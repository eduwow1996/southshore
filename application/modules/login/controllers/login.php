<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function index(){
        $this->login_page('index');
	}

	public function auth(){
		$data = array();
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$result = $this->MY_Model->auth_user($username);
		if($result){
			if(password_verify($password,$result->password)){
				$this->set_session($result);
				$data_audit = array(
					'content' => $result->fullname.' has logged in',
					'date_generated' => date("Y-m-d h:m:s"),
					'user_id' => $result->user_id,
				);
				$this->audit($data_audit);
				redirect(base_url());
			} else {
				$data['msg'] = 'Invalid Password';
				$this->login_page('index',$data);
			}
		} else {
			$data['msg'] = 'Invalid Username';
			$this->login_page('index',$data);
		}
	}

	public function set_session($data){
		$data_session = array(
			'logged_in' => true,
			'user_id' => $data->user_id,
			'user_type' => $data->user_type,
			'full_name' => $data->fullname,
		);
		$this->session->set_userdata($data_session);
	}

	public function create_admin(){
		$data = array(
			'username' => 'administrator',
			'fullname' => 'Administrator',
			'password' => password_hash('admin@123',PASSWORD_DEFAULT),
			'user_type' => '0',
			'user_status' => '1',
		);
		$this->MY_Model->insert('tbl_users',$data);
	}
}
