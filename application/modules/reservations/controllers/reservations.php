<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservations extends MY_Controller {

	public function index(){
		$data['packages'] 		  =   $this->MY_Model->getRows('tbl_package','*','','','','');
		$data['payment_type'] 		  =   $this->MY_Model->getRows('tbl_payment_type','*','','','','');
		if($this->session->userdata('user_type') == 1){
			$get_data = $this->MY_Model->getRows('tbl_users','*',array('user_id' => $this->session->userdata('user_id')),array('tbl_sites' => 'tbl_sites.site_id = tbl_users.site_id'),'','','row');
			$data['reservations'] = $this->MY_Model->getRows('tbl_reservation','tbl_reservation.*,tbl_package.package_name,FORMAT((SELECT sum(amount_paid) FROM tbl_payment WHERE reservation_id = tbl_reservation.id),2) as total_paid,FORMAT(tbl_reservation.paid_amount - (SELECT sum(amount_paid) FROM tbl_payment WHERE reservation_id = tbl_reservation.id),2) as balance',array('tbl_reservation.status' => 0,'tbl_reservation.site' => $get_data->site_id),array('tbl_package' => 'tbl_package.package_id = tbl_reservation.package_id'),'','','array');
		} else {
			$data['reservations'] = $this->MY_Model->getRows('tbl_reservation','tbl_reservation.*,tbl_package.package_name,FORMAT((SELECT sum(amount_paid) FROM tbl_payment WHERE reservation_id = tbl_reservation.id),2) as total_paid,FORMAT(tbl_reservation.paid_amount - (SELECT sum(amount_paid) FROM tbl_payment WHERE reservation_id = tbl_reservation.id),2) as balance',array('tbl_reservation.status' => 0),array('tbl_package' => 'tbl_package.package_id = tbl_reservation.package_id'),'','','array');
		}
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

	public function create_new_payment(){
		$payment_amount = $this->input->post('payment_amount');
		$package = $this->input->post('package');
		$paid_amount = $this->input->post('paid_amount');
		$total_number_of_people = $this->input->post('total_number_of_people');
		$payment_type = $this->input->post('payment_type');
		$payment_description = $this->input->post('payment_description');
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$pickup_address = $this->input->post('pickup_address');
		$tour_date = $this->input->post('tour_date');
		$email = $this->input->post('email');
		$phone_number = $this->input->post('phone_number');
		$special_request = $this->input->post('special_request');
		$transaction_id = $this->input->post('transaction_id');
		$data = array(
			'transaction_id' => $transaction_id,
			'trans_date' => date("Y/m/d"),
			'package_id' => $package,
			'paid_amount' => $payment_amount,
			'lead_guest_name' => $first_name.' '.$last_name,
			'number_of_people' => $total_number_of_people,
			'number_of_filipino' => 0,
			'pickup_address' => $pickup_address,
			'tour_date' => $tour_date,
			'phone_number' => $phone_number,
			'email_address' => $email,
			'special_request' => $special_request,
			'payment_gateway' => $payment_type,
			'payment_type' => $payment_description,
			'payment_status' => '0',
			'site' => 1,
			'status' => '0',
		);
		$id = $this->MY_Model->insert('tbl_reservation',$data);
		$data_payment = array(
			'reservation_id' =>  $id,
			'amount_paid' =>  $paid_amount,
			'added_by' =>  0,
			'date_paid' =>  date("Y/m/d"),
		);
		$this->MY_Model->insert('tbl_payment',$data_payment);
	}

	public function add_payment(){
		$trans_id = $this->input->post('trans_id');
		$data_row = $this->MY_Model->getRows('tbl_reservation','transaction_id',array('tbl_reservation.id' => $trans_id),'','','','row');
		$payment_amount = 0;
		if(strpos($this->input->post('payment_amount'),',') !== false){
			$payment_amount = str_replace(",","",$this->input->post('payment_amount'));
		} else {
			$payment_amount = $this->input->post('payment_amount');
		}
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

	public function invoice($id){
		$get_data = $this->MY_Model->getRows('tbl_reservation','tbl_reservation.lead_guest_name,tbl_reservation.transaction_id',array('tbl_reservation.id' => $id),array('tbl_package' => 'tbl_package.package_id = tbl_reservation.package_id'),'','','row');
		$data['details'] = $this->MY_Model->getRows('tbl_reservation','tbl_reservation.*,tbl_users.fullname,tbl_package.*',array('tbl_reservation.id' => $id),array('tbl_package' => 'tbl_package.package_id = tbl_reservation.package_id','tbl_users' => 'tbl_users.site_id = tbl_reservation.site'),'','','row');
		$data['payment_list'] = $this->MY_Model->getRows('tbl_payment','sum(amount_paid) as total_paid',array('tbl_payment.reservation_id' => $id),'','','','row');
		$this->load->library('Pdf');
		$html = $this->load->view('invoice',$data,true);
		$pdf = new Pdf();
		$this->pdf->render_pdf($html,ucwords($get_data->lead_guest_name).' '.$get_data->transaction_id,'','A4');
	}

	public function downloadinvoice($id){
		$get_data = $this->MY_Model->getRows('tbl_reservation','tbl_reservation.lead_guest_name,tbl_reservation.transaction_id',array('tbl_reservation.id' => $id),array('tbl_package' => 'tbl_package.package_id = tbl_reservation.package_id'),'','','row');
		$data['details'] = $this->MY_Model->getRows('tbl_reservation','tbl_reservation.*,tbl_package.*',array('tbl_reservation.id' => $id),array('tbl_package' => 'tbl_package.package_id = tbl_reservation.package_id'),'','','row');
		$data['payment_list'] = $this->MY_Model->getRows('tbl_payment','sum(amount_paid) as total_paid',array('tbl_payment.reservation_id' => $id),'','','','row');
		$this->load->library('Pdf');
		$html = $this->load->view('invoice',$data,true);
		$pdf = new Pdf();
		$this->pdf->render_pdf($html,ucwords($get_data->lead_guest_name).' '.$get_data->transaction_id,true,'A4');
	}
}
