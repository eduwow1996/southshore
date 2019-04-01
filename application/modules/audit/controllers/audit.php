<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Audit extends MY_Controller {

	public function index(){
		$current_date = date("Y-m-d");

		$data['audit_logs'] = $this->MY_Model->getRows('tbl_audit','tbl_audit.*,tbl_users.fullname','',array('tbl_users' => 'tbl_users.user_id = tbl_audit.user_id'),'audit_id DESC','','array');
        $this->load_page('index',$data);
	}
}
