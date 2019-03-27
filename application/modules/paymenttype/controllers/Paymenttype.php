<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paymenttype extends MY_Controller {

	public function index(){
		$data['payment_type'] = $this->MY_Model->getRows('tbl_payment_type','','','','','','array');
		$this->load_page('index',$data);
	}

	public function save_payment_type(){
		$data = array(
			'payment_type' => $this->input->post('payment_type')
		);
		$this->MY_Model->insert('tbl_payment_type',$data);
	}
}
