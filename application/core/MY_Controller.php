<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends MX_Controller {

	public function load_page($page,$data = array()){
		$this->load->view('head',$data);
		$this->load->view($page,$data);
		$this->load->view('footer',$data);
	}
}
