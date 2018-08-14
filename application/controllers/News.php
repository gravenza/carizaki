<?php
class News extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$this->load->view('news');
	}
	
	public function detail(){
		$this->load->view('news-detail');
	}
}