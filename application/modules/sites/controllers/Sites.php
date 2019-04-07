<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sites extends MY_Controller {

	public function index(){
		$data['sites'] = $this->MY_Model->getRows('tbl_sites','*','','','','');
        $this->load_page('index',$data);
	}

	public function create_sites(){
		$site_name = $this->input->post('site_name');
		$site_url = $this->input->post('site_url');
		$data = array(
			'site_name' => $site_name,
			'site_url' => $site_url,
		);
		if($this->MY_Model->insert('tbl_sites',$data)){
			echo 1;
		}
	}

}
