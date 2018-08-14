<?php
class Promo extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}

	public function index(){

		$data['promo'] = $this->db->order_by('promo_id','desc')->get('tbl_promo');
		$this->load->view('promo_homeowner',$data);
	}

	public function search(){
		$data['querySearch'] = $this->db->where('kota',$_GET['key'])->get('tbl_promo');

		$this->load->view('promo-search',$data);
	}

	public function detail($id){
		$data['detailPromo'] = $this->db->where('promo_id',$id)->get('tbl_promo');
		$this->load->view('promo-detail',$data);
	}

}
