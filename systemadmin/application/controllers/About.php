<?php
class About extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$this->load->view('about-us');
	}
	
	public function update($slug){
		
		$id = $this->db->where('slug',$slug)->get('category')->row();
		$sub = $this->db->where('slug',$slug)->get('category_sub')->row();
		
		$data = array(
		'category_id' => $sub->category_id,
		'subcategory_id' => $sub->subcategory_id
		);
		
		$this->db->where('subcategory_id',$slug);
		$this->db->update('category_sub2',$data);
	}
}