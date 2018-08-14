<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Site_model class.
 * Author : Wahyu Nurhoho
 * @extends CI_Model
 */



class Site_model extends CI_Model {
	  /**
     * __construct function.
     * 
     * @access public
     * @return void
     */
    public function __construct() {
        
        parent::__construct();
        $this->load->database();
        
    }
    /*=============================
    All
    ==============================*/
   	
   	public function get_data($id_table,$table)
	{

		//$this->db->limit($number,$offset);
		$this->db->order_by($id_table,"desc");
		return $this->db->get($table)->result();
	}
	public function get_data_asc($id_table,$table)
	{

		//$this->db->limit($number,$offset);
		$this->db->order_by($id_table,"asc");
		return $this->db->get($table)->result();
	}
	public function get_data_desc($id_table,$table)
	{

		//$this->db->limit($number,$offset);
		$this->db->order_by($id_table,"desc");
		return $this->db->get($table)->result();
	}
	public function get_data_applicator($id_table,$table)
	{

		//$this->db->limit($number,$offset);
		$this->db->distinct();
		$this->db->select('kota');
		$this->db->where('type',NULL);
		$this->db->order_by($id_table,"asc");
		return $this->db->get($table)->result();
	}
	public function get_sum($table,$condition,$value,$condition1,$value1){
		$this->db->where($condition,$value);
		$this->db->where($condition1,$value1);
		return $this->db->get($table)->num_rows();
	}
	public function get_data_param_limit($number,$offset,$id_table,$table)
	{

		$this->db->limit($number,$offset);
		//$this->db->where($condition,$value);
		$this->db->order_by($id_table,"desc");
		return $this->db->get($table)->result();
	}
	public function get_data_param_limit_condition($number,$offset,$id_table,$table,$condition,$value)
	{

		$this->db->limit($number,$offset);
		$this->db->where($condition,$value);
		$this->db->order_by($id_table,"desc");
		return $this->db->get($table)->result();
	}
	public function get_data_limit($id_table,$limit,$table)
	{

		//$this->db->limit($number,$offset);
		$this->db->order_by($id_table,"desc");
		return $this->db->get($table,$limit,0)->result();
	}
	public function get_data_detail($url,$table)
	{
		$this->db->where('url',$url);
		return $this->db->get($table)->row();
	}
	public function get_row($field,$id,$table)
	{
		$this->db->where($field,$id);
		return $this->db->get($table)->row();
	}
	public function get_data_related($id_table,$url,$table)
	{
		$this->db->order_by($id_table,"desc");
		$this->db->where('url !=',$url);
		return $this->db->get($table,3,0)->result();
	}

	public function get_propinsi()
	{
	return $this->db->query("SELECT * FROM tbl_inf_lokasi where lokasi_kabupatenkota=0 and lokasi_kecamatan=0 and lokasi_kelurahan=0 order by lokasi_nama")->result();
	}
	public function get_kota($id)
	{
		return $this->db->query("SELECT * FROM tbl_inf_lokasi where lokasi_propinsi=$id and lokasi_kecamatan=0 and lokasi_kelurahan=0 and lokasi_kabupatenkota!=0 order by lokasi_nama")->result();
	}
	
	public function resolve_user_login($email, $password, $table) {
		
		$this->db->select('password');
		$this->db->from($table);
		$this->db->where('email', $email);
		$this->db->where('status', 1);
		$hash = $this->db->get()->row('password');
		
		return $this->verify_password_hash($password, $hash);
		
	}
	public function getSess($email,$table)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('email', $email);
		return $this->db->get()->row();
	}
		public function verification($key,$type,$data)
	{
		if($type=='applicator')
		{
			$id_table = 'id_applicator';
			$table = 'tbl_applicator';
		} else if($type=='home-owner')
		{
			$id_table = 'id_homeowner';
			$table = 'tbl_homeowner';
		}
		$this->db->where('md5('.$id_table.')', $key);
		return $this->db->update($table, $data);
	}
	public function reset($type,$data,$email)
	{
		if($type=='applicator')
		{
			$id_table = 'id_applicator';
			$table = 'tbl_applicator';
		} else if($type=='homeowner')
		{
			$id_table = 'id_homeowner';
			$table = 'tbl_homeowner';
		}
		$this->db->where('md5(email)', $email);
		$update = $this->db->update($table, $data);
		if($update)
		{
			$this->db->where('md5(email)', $email);
			$get = $this->db->get($table)->row();
			return $get->email;
		}
	}
	/**
	 * verify_password_hash function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @param mixed $hash
	 * @return bool
	 */
	private function verify_password_hash($password, $hash) {
		
		return password_verify($password, $hash);
		
	}

}