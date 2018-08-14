<?php
class Danastra extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){

		$this->load->view('danastra');
	}

	public function gallery(){
		$this->load->view('gallery');
	}

	public function promoevent(){
		$this->load->view('events');
	}
}
