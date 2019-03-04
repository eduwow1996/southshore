<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends MX_Controller {

	public function load_page($page,$data = array()){
		$this->load->view('head',$data);
		$this->load->view($page,$data);
		$this->load->view('footer',$data);
	}

	public function login_page($page,$data = array()){
		$this->load->view('login_head',$data);
		$this->load->view($page,$data);
		$this->load->view('login_footer',$data);
	}

	public function audit($data = array()){
		$this->MY_Model->insert('tbl_audit',$data);
	}
}
