<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservationslogs extends MY_Controller {

	public function index(){
		$data['reservations'] = $this->MY_Model->getRows('tbl_reservation','tbl_reservation.*,tbl_package.package_name,FORMAT((SELECT sum(amount_paid) FROM tbl_payment WHERE reservation_id = tbl_reservation.id),2) as total_paid,FORMAT(tbl_reservation.paid_amount - (SELECT sum(amount_paid) FROM tbl_payment WHERE reservation_id = tbl_reservation.id),2) as balance',
		array('tbl_reservation.status '=> 1),array('tbl_package' => 'tbl_package.package_id = tbl_reservation.package_id'),'','','array');
		$this->load_page('index',$data);
	}

	public function invoice($id){
		$get_data = $this->MY_Model->getRows('tbl_reservation','tbl_reservation.lead_guest_name,tbl_reservation.transaction_id',array('tbl_reservation.id' => $id),array('tbl_package' => 'tbl_package.package_id = tbl_reservation.package_id'),'','','row');
		$data['details'] = $this->MY_Model->getRows('tbl_reservation','tbl_reservation.*,tbl_users.fullname,tbl_package.*',array('tbl_reservation.id' => $id),array('tbl_package' => 'tbl_package.package_id = tbl_reservation.package_id','tbl_users' => 'tbl_users.site_id = tbl_reservation.site'),'','','row');
		$data['payment_list'] = $this->MY_Model->getRows('tbl_payment','sum(amount_paid) as total_paid',array('tbl_payment.reservation_id' => $id),'','','','row');
		$this->load->library('Pdf');
		$html = $this->load->view('invoice',$data,true);
		$pdf = new Pdf();
		$this->pdf->render_pdf($html,ucwords($get_data->lead_guest_name).' '.$get_data->transaction_id,'','A4');
	}
	
}
