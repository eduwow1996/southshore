<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservations extends MY_Controller {

	public function index(){
		$data['reservations'] = $this->MY_Model->getRows('tbl_reservation','tbl_reservation.*,tbl_package.package_name','',array('tbl_package' => 'tbl_package.package_id = tbl_reservation.package_id'),'','','array');
		$this->load_page('index',$data);
	}
}
