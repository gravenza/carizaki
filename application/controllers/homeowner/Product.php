<?php
class Product extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function demo($id){
		$data['queryproduct'] = $this->db->where('id_produk',$id)->get('tbl_produk');
		$this->load->view('product',$data);
	}

	public function detail($id){
		
		$data['queryproduct'] = $this->db->where('id_produk',$id)->get('tbl_produk');
		
		$this->load->view('product-detail',$data);
	}

	public function promoevent(){
		$this->load->view('events');
	}
}
