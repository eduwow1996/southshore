<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Audit extends MY_Controller {

	public function index($from_date = '',$to_date_d = ''){
		$current_date = date("Y-m-d");
		$to_date = date("Y-m-d",strtotime($current_date.' - 10 days'));
		if(!empty($from_date)){
			$data['audit_logs'] = $this->MY_Model->getRows('tbl_audit','tbl_audit.*,tbl_users.fullname',array('DATE(date_generated) >= ' => $from_date,'DATE(date_generated) <= ' => $to_date_d),array('tbl_users' => 'tbl_users.user_id = tbl_audit.user_id'),'audit_id DESC','','array');
		} else {
			$data['audit_logs'] = $this->MY_Model->getRows('tbl_audit','tbl_audit.*,tbl_users.fullname',array('DATE(date_generated) <= ' => $current_date,'DATE(date_generated) >= ' => $to_date),array('tbl_users' => 'tbl_users.user_id = tbl_audit.user_id'),'audit_id DESC','','array');
		}
		$data['current_date'] = (!empty($to_date_d)) ? $to_date_d : $current_date;
		$data['to_date'] = (!empty($from_date)) ? $from_date : $to_date;
        $this->load_page('index',$data);
	}

	public function search_date(){
		$from_date = $this->input->post('from_date');
		$to_date = $this->input->post('to_date');
		redirect(base_url('audit/index/'.$from_date.'/'.$to_date));
	}
}
