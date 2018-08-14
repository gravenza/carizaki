<?php 
class Articles extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$this->load->view('article');
	}
	
	public function detail(){
		$this->load->view('article-detail');
	}
}