<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packages extends MY_Controller {

	public function index(){
		$join = array('tbl_users' => 'tbl_users.user_id = tbl_package.added_by');
		$data['packages'] 		  =   $this->MY_Model->getRows('tbl_package','package_id,package_name,status,fullname','',$join,'','');
        $this->load_page('index',$data);
	}

	public function get_package_price(){
		$id = $this->input->post('id');
		$join = array('tbl_sub_package' => 'tbl_package.package_id = tbl_sub_package.fk_package_id');
		$data['packages_details'] 		  =   $this->MY_Model->getRows('tbl_package','package_name',array('package_id' => $id),'','','','row');
		$data['packages_price'] 		  =   $this->MY_Model->getRows('tbl_package','package_id,price,per_person,id',array('fk_package_id' => $id),$join,'','');
		echo json_encode($data);
	}

	public function save_packages(){

		$data_package = array(
			'package_name'			 => $this->input->post('package_name'),
			'package_inclusions'	 => $this->input->post('Inclusions'),
			'package_complementary'	 => $this->input->post('Complementary'),
			'package_intinerary' 	 => $this->input->post('Intinerary'),
			'excess_payment' 	 => $this->input->post('excess_payment'),
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

	public function edit_price_packages(){
		if($this->input->post('trans_type') == 1){
			foreach($_POST['package_price'] as $key => $value){
				$this->MY_Model->update('tbl_sub_package',array('price' => $value),array('id' => $key));
			}
		} else {
			foreach($_POST['package_price'] as $key => $value){
				$this->MY_Model->insert('tbl_sub_package',array('per_person' => $key,'price' => $value));
			}
		}
	}
}
