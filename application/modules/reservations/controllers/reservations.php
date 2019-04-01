<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservations extends MY_Controller {

	public function index(){
		$data['reservations'] = $this->MY_Model->getRows('tbl_reservation','tbl_reservation.*,tbl_package.package_name,FORMAT((SELECT sum(amount_paid) FROM tbl_payment WHERE reservation_id = tbl_reservation.id),2) as total_paid,FORMAT(tbl_reservation.paid_amount - (SELECT sum(amount_paid) FROM tbl_payment WHERE reservation_id = tbl_reservation.id),2) as balance',array('tbl_reservation.status' => 0),array('tbl_package' => 'tbl_package.package_id = tbl_reservation.package_id'),'','','array');
		$this->load_page('index',$data);
	}

	public function get_reservation_details(){
		$id = $this->input->post('id');
		$data['details'] = $this->MY_Model->getRows('tbl_reservation','tbl_reservation.*,tbl_package.package_name',array('tbl_reservation.id' => $id),array('tbl_package' => 'tbl_package.package_id = tbl_reservation.package_id'),'','','row');
		$data['payment_list'] = $this->MY_Model->getRows('tbl_payment','*',array('tbl_payment.reservation_id' => $id),'','','','array');
		echo json_encode($data);
	}

	public function complete_transaction(){
		$id = $this->input->post('id');
		$data_row = $this->MY_Model->getRows('tbl_reservation','transaction_id',array('tbl_reservation.id' => $id),'','','','row');
		if($this->MY_Model->update('tbl_reservation',array('status'=>1),array('id' => $id))){
			$data_audit = array(
				'content' => ' Completed Transaction #'.$data_row->transaction_id,
				'date_generated' => date("Y-m-d h:m:s"),
				'user_id' => $this->session->userdata('user_id'),
			);
			$this->audit($data_audit);
			echo 1;
		}
	}

	public function add_payment(){
		$trans_id = $this->input->post('trans_id');
		$data_row = $this->MY_Model->getRows('tbl_reservation','transaction_id',array('tbl_reservation.id' => $trans_id),'','','','row');
		$payment_amount = $this->input->post('payment_amount');
		$data = array(
			'reservation_id' => $trans_id,
			'amount_paid' => $payment_amount,
			'added_by' => $this->session->userdata('user_id'),
			'date_paid' => date("Y/m/d")
		);
		if($this->MY_Model->insert('tbl_payment',$data)){
			$data_audit = array(
				'content' => ' Added payment, Amount PHP'.$payment_amount.' on Transaction #'.$data_row->transaction_id,
				'date_generated' => date("Y-m-d h:m:s"),
				'user_id' => $this->session->userdata('user_id'),
			);
			$this->audit($data_audit);
			echo 1;
		}
	}
}
