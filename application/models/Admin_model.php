<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin_model class.
 * Author : Wahyu Nurhoho
 * @extends CI_Model
 */



class Admin_model extends CI_Model {
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
   	public function insert($table,$data)
   	{
   		$this->db->insert($table,$data);
   		return $this->db->insert_id();
   	}
   		public function insert_register($table,$data)
   	{
   		$this->db->insert($table,$data);
   		return $this->db->insert();
   	}
   	public function sum_data_param($condition,$value,$table)
   	{
   		$this->db->where($condition,$value);
   		return $this->db->get($table)->num_rows();
   	}
   	public function sum_data($table)
   	{
   		return $this->db->get($table)->num_rows();
   	}
   	public function get_data($number,$offset,$table)
	{

		$this->db->limit($number,$offset);
		//$this->db->order_by('id_top_slider',"desc");
		return $this->db->get($table)->result();
	}
		public function get_data_param($number,$offset,$table,$condition,$value)
	{
		$this->db->where($condition,$value);
		$this->db->limit($number,$offset);
		//$this->db->order_by('id_top_slider',"desc");
		return $this->db->get($table)->result();
	}
		public function select_data($table,$condition,$value)
	{
		$this->db->where($condition,$value);
		return $this->db->get($table)->row();
	}
	public function select_data_all($table,$condition,$value)
	{
		$this->db->where($condition,$value);
		return $this->db->get($table)->result();
	}
	public function select_data_param($table,$condition,$value,$condition1,$value1)
	{
		$this->db->where($condition,$value);
		$this->db->where($condition1,$value1);
		return $this->db->get($table)->result();
	}
	public function get_data_no_limit($table)
	{
		
		return $this->db->get($table)->result();
	}
	public function delete_data($id,$id_table,$table)
	{
		$this->db->from($table);
		$this->db->where($id_table,$id);
		return $this->db->delete();
	}
	public function edit_data($id,$id_table,$table)
	{
		$this->db->from($table);
		$this->db->where($id_table,$id);
		return $this->db->get()->row();
	}
	public function update_data($id,$id_table,$table,$data)
	{
		$this->db->where($id_table, $id);
		return $this->db->update($table, $data);
	}
    /*=============================
    Login
    ==============================*/
    	public function resolve_admin_login($email, $password) {
		
		$this->db->select('password');
		$this->db->from('tbl_users');
		$this->db->where('email', $email);
		
		$hash = $this->db->get()->row('password');
		
		return $this->verify_password_hash($password, $hash);
		
	}
	public function get_user($email)
	{
		$this->db->where('email',$email);
		return $this->db->get('tbl_users')->row();
	}
	 
	/*============================
	Berita
	=============================*/

	public function get_tbl_berita($slug = FALSE)
    {
        if ($sluq === FALSE)
        {
            $query = $this->db->get('tbl_berita');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('tbl_berita', array('url' => $slug));
        return $query->row_array();
    }
	/*=====MEMBERS====*/
	public function applicator($number,$offset,$type,$value)
	{
	
		$this->db->from('tbl_applicator');
		$this->db->where($type,$value);

		$this->db->join('tbl_inf_lokasi','tbl_applicator.kota=tbl_inf_lokasi.lokasi_kabupatenkota AND tbl_applicator.propinsi = tbl_inf_lokasi.lokasi_propinsi');
		$this->db->where('tbl_inf_lokasi.lokasi_kecamatan',00);
		$this->db->where('tbl_inf_lokasi.lokasi_kelurahan',0000);
		$this->db->limit($number,$offset);
		$this->db->order_by('tbl_applicator.id_applicator','desc');
		return $this->db->get()->result();

	}	
		public function applicatorprint($type,$value)
	{
	
		$this->db->from('tbl_applicator');
		$this->db->where($type,$value);

		$this->db->join('tbl_inf_lokasi','tbl_applicator.kota=tbl_inf_lokasi.lokasi_kabupatenkota AND tbl_applicator.propinsi = tbl_inf_lokasi.lokasi_propinsi');
		$this->db->where('tbl_inf_lokasi.lokasi_kecamatan',00);
		$this->db->where('tbl_inf_lokasi.lokasi_kelurahan',0000);
	//	$this->db->limit($number,$offset);
		$this->db->order_by('tbl_applicator.id_applicator','desc');
		return $this->db->get()->result();

	}
	public function homeowner($number,$offset)
	{
		
		$this->db->from('tbl_homeowner');
		$this->db->join('tbl_inf_lokasi','tbl_homeowner.kota=tbl_inf_lokasi.lokasi_kabupatenkota AND tbl_homeowner.propinsi = tbl_inf_lokasi.lokasi_propinsi');
		$this->db->where('tbl_inf_lokasi.lokasi_kecamatan',00);
		$this->db->where('tbl_inf_lokasi.lokasi_kelurahan',0000);
		$this->db->limit($number,$offset);
		$this->db->order_by('tbl_homeowner.id_homeowner','desc');
		return $this->db->get()->result();


	}
	public function homeownerprint()
	{
		
		$this->db->from('tbl_homeowner');
	//	$this->db->where($type,$value);

		$this->db->join('tbl_inf_lokasi','tbl_homeowner.kota=tbl_inf_lokasi.lokasi_kabupatenkota AND tbl_homeowner.propinsi = tbl_inf_lokasi.lokasi_propinsi');
		$this->db->where('tbl_inf_lokasi.lokasi_kecamatan',00);
		$this->db->where('tbl_inf_lokasi.lokasi_kelurahan',0000);
		//$this->db->limit($number,$offset);
		$this->db->order_by('tbl_homeowner.id_homeowner','desc');
		return $this->db->get()->result();
	}


/**
	 * hash_password function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @return string|bool could be a string on success, or bool false on failure
	 */
	private function hash_password($password) {
		
		return password_hash($password, PASSWORD_BCRYPT);
		
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