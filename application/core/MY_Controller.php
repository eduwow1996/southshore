<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends MX_Controller {

	public function __construct(){
		if($this->router->fetch_class() != 'login'){
			if(!$this->session->has_userdata('logged_in')){
				redirect(base_url('login'));
			}
		}
	}

	public function load_page($page,$data = array()){
		$data['site_name'] = 'Admin';
		if($this->session->userdata('user_type') == 1){
			$get_data = $this->MY_Model->getRows('tbl_users','*',array('user_id' => $this->session->userdata('user_id')),array('tbl_sites' => 'tbl_sites.site_id = tbl_users.site_id'),'','','row');
			$data['site_name'] = $get_data->site_name;
		} else {
			$data['site_name'] = 'Admin';
		}
		$data['reservations_count'] = $this->MY_Model->getRows('tbl_reservation','*',array('status' => 0),'','','','count');
		$data['reservations_logs_count'] = $this->MY_Model->getRows('tbl_reservation','*',array('status' => 1),'','','','count');
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
