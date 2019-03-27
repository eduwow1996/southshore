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
		$data['reservations_count'] = $this->MY_Model->getRows('tbl_reservation','*',array('FORMAT(tbl_reservation.paid_amount - (SELECT sum(amount_paid) FROM tbl_payment WHERE reservation_id = tbl_reservation.id),2) <>' => 0),'','','','count');
		$data['reservations_logs_count'] = $this->MY_Model->getRows('tbl_reservation','*',array('FORMAT(tbl_reservation.paid_amount - (SELECT sum(amount_paid) FROM tbl_payment WHERE reservation_id = tbl_reservation.id),2) =' => 0),'','','','count');
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
