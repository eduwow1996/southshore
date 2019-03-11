<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packages extends MY_Controller {

	public function index(){
		$join = array('tbl_users' => 'tbl_users.user_id = tbl_package.added_by');
		$data['packages'] 		  =   $this->MY_Model->getRows('tbl_package','package_name,status,fullname','',$join,'','');
        $this->load_page('index',$data);
	}

	public function save_packages(){

		$data_package = array(
			'package_name'			 => $this->input->post('package_name'),
			'package_inclusions'	 => $this->input->post('Inclusions'),
			'package_complementary'	 => $this->input->post('Complementary'),
			'package_intinerary' 	 => $this->input->post('Intinerary'),
			'status' => 1,
			'added_by' => $this->session->userdata('user_id'),
		);
		$return_id = $this->MY_Model->insert('tbl_package',$data_package);
		$user_data = $this->MY_Model->getRows('tbl_users','fullname',array('user_id' => $this->session->userdata('user_id')),'','','row');
		$data_audit = array(
			'content' 			=> $user_data->fullname.' added '.$this->input->post('package_name').' package',
			'date_generated' 	=> date("Y-m-d h:m:s"),
			'user_id' 			=> $this->session->userdata('user_id'),
		);
		$this->audit($data_audit);
		foreach($this->input->post('price_per_person') as $key => $value){
			$data_sub_package = array(
				'fk_package_id'	 	=> $return_id,
				'price' 			=> $value,
				'per_person' 		=> $key + 1
			);
			$this->MY_Model->insert('tbl_sub_package',$data_sub_package);
		}
	}
}
