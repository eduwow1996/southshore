<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Audit extends MY_Controller {

	public function index(){
		$current_date = date("Y-m-d");
		$to_date = date("Y-m-d",strtotime($current_date.' - 10 days'));
		$data['audit_logs'] = $this->MY_Model->getRows('tbl_audit','tbl_audit.*,tbl_users.fullname',array('DATE(date_generated) <= ' => $current_date,'DATE(date_generated) >= ' => $to_date),array('tbl_users' => 'tbl_users.user_id = tbl_audit.user_id'),'audit_id DESC','','array');		
		$data['current_date'] = $current_date;
		$data['to_date'] = $to_date;
        $this->load_page('index',$data);
	}
}
