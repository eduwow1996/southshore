<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservations extends MY_Controller {

	public function index(){
		$data['reservations'] = $this->MY_Model->getRows('tbl_reservat')
        $this->load_page('index');
	}
}
