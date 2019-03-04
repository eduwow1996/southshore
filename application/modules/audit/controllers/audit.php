<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Audit extends MY_Controller {

	public function index(){
		$data['audit_logs'] = $this->MY_Model->getRows('tbl_audit','*','','','audit_id DESC','','array');
        $this->load_page('index',$data);
	}
}
