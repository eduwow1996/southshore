<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends MY_Controller {

	public function index(){
		$current_date = date("Y-m-d");
		$to_date = date("Y-m-d");
		$data['current_date'] = $current_date;
		$data['to_date'] = $to_date;
        $this->load_page('index',$data);
	}

	public function get_report(){
		$report_type = $this->input->post('report_type');
		if($report_type == 1){
			$from_date = $this->input->post('from_date');
			$to_date = $this->input->post('to_date');
			redirect(base_url('report/daterange/'.$from_date.'/'.$to_date));
		} else {
			$month = $this->input->post('report_month');
			$year = $this->input->post('report_year');
			redirect(base_url('report/month/'.$month.'/'.$year));
		}

	}

	public function daterange($from_date,$to_date){
		$data['from_date'] = $from_date;
		$data['to_date'] = $to_date;
		$data['report_daily'] = $this->MY_Model->getRows('tbl_payment','tbl_payment.*,tbl_reservation.lead_guest_name,transaction_id',array('DATE(date_paid) >= ' => str_replace("/",'-',$from_date),'DATE(date_paid) <= ' => str_replace("/",'-',$to_date)),array('tbl_reservation' => 'tbl_reservation.id = tbl_payment.reservation_id'),'date_paid DESC','','array');
		$this->load_page('range',$data);
	}

	public function month($month,$year){
		$long = array(
	        'January',
	        'February',
	        'March',
	        'April',
	        'May',
	        'June',
	        'July',
	        'August',
	        'September',
	        'October',
	        'November',
	        'December'
	    );
		$key_month = array_search($month, $long) + 1;
		$data['month'] = $month;
		$data['year'] = $year;
		$data['report_daily'] = $this->MY_Model->getRows('tbl_payment','tbl_payment.*,tbl_reservation.lead_guest_name,transaction_id',array('YEAR(date_paid)' => $year,'MONTH(date_paid)' => $key_month),array('tbl_reservation' => 'tbl_reservation.id = tbl_payment.reservation_id'),'date_paid DESC','','array');
		$this->load_page('month',$data);
	}
}
