<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function index(){
        $this->load_page('index');
	}

	public function logout(){
		$data_session = array('logged_in','user_id','user_type','full_name',);
		$this->session->unset_userdata($data_session);
		redirect(base_url('login'));
	}
}
