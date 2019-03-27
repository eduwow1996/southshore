<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservations extends MY_Controller {

	public function index(){
		$data['reservations'] = $this->MY_Model->getRows('tbl_reservation','tbl_reservation.*,tbl_package.package_name,FORMAT((SELECT sum(amount_paid) FROM tbl_payment WHERE reservation_id = tbl_reservation.id),2) as total_paid,FORMAT(tbl_reservation.paid_amount - (SELECT sum(amount_paid) FROM tbl_payment WHERE reservation_id = tbl_reservation.id),2) as balance',array('FORMAT(tbl_reservation.paid_amount - (SELECT sum(amount_paid) FROM tbl_payment WHERE reservation_id = tbl_reservation.id),2) <>' => 0),array('tbl_package' => 'tbl_package.package_id = tbl_reservation.package_id'),'','','array');
		$this->load_page('index',$data);
	}

	public function get_reservation_details(){
		$id = $this->input->post('id');
		$data = $this->MY_Model->getRows('tbl_reservation','tbl_reservation.*,tbl_package.package_name','',array('tbl_package' => 'tbl_package.package_id = tbl_reservation.package_id'),'','','row');
		echo json_encode($data);
	}
}
