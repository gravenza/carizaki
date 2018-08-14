<?php
class Page extends CI_Controller{
	
	public function detail($id){
		
		$data['queryPage'] = $this->db->where('id_informasi',$id)->get('tbl_informasi');
		
		$this->load->view('page-detail',$data);
	}
}