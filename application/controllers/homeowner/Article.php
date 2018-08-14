<?php
class Article extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		
	}
	
	public function detail($id){
		
		$data['artDetail'] = $this->db->where('id_tzaki',$id)->get('tbl_tzaki');
		$this->load->view('article-detail',$data);
	}
}