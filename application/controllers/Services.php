<?php
class Services extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->view('service');
	}

	public function detail(){
		$this->load->view('service-detail');
	}
}
