<?php

class M_searchhome extends CI_Model {

	function __construct()
        {
		parent::__construct();
	}
	
	function view()
	{
		if(isset($_GET['param']))
	        {
			$data['key'] =$_GET['key']; //$this->input->post('key',TRUE);
		        //set session user data untuk pencarian, untuk paging pencarian
			//$this->session->set_userdata('sess_key', $data['key']);
	        }
		else
		{
			$data['key'] = $this->session->userdata('sess_key');
	     }
		
		//$string_query = "select collection_id as id, product_name as title, description as description, image_small as image_small, posting_date as posting_date, 'test' as start_date, 'test' as end_date, 'collection' as fieldtable from collection where (product_name like '%$data[key]%' or description like '%$data[key]%') union all select events_id, title, description, image_small as image_small, posting_date as posting_date, start_date as start_date, start_date as end_date, 'events' as fieldtable from events where (title like '%$data[key]%' or description like '%$data[key]%') union all select promo_id, title, description, image_small as image_small, posting_date as posting_date, 'test' as start_date, 'test' as end_date, 'promo' as fieldtable from promo where (title like '%$data[key]%' or description like '%$data[key]%') union all select tips_id, title, description, image_small as image_small, posting_date as posting_date, 'test' as start_date, 'test' as end_date, 'tips' as fieldtable from tips where (title like '%$data[key]%' or description like '%$data[key]%') union all select lady_corner_id, title, description, image_small as image_small, posting_date as posting_date, 'test' as start_date, 'test' as end_date, 'lady_corner' as fieldtable from lady_corner where (title like '%$data[key]%' or description like '%$data[key]%') union all select store_id, store_name, address as image_small, phone as posting_date, 'test' as start_date, 'test' as end_date, 'test' as description, 'store' as fieldtable from store where (store_name like '%$data[key]%')";
                
                //$string_query = "select * from article where (title like '%$data[key]%' or description like '%$data[key]%')";
	     $string_query = "select id as ID, header as Title, resume as Resume, description as Description,  'articles' as TypeSearch 
	     						from sketsa_articles where (header like '%$data[key]%' or description like '%$data[key]%') union all select news_id as ID, title as Title, resume as Resume, description as Description,  'news' as TypeSearch 
	     						from news where (title like '%$data[key]%' or description like '%$data[key]%')  ";
	  	$query          	  = $this->db->query($string_query);              
	  	$config['base_url']     = base_url().'search/view/';  
	  	$config['total_rows']   = $query->num_rows();  
	  	$config['per_page']     = '16';    
	  	$num            = $config['per_page'];
		$config['uri_segment'] = 3;
	  	$offset         = $this->uri->segment(3);  
	  	$offset         = ( ! is_numeric($offset) || $offset < 1) ? 0 : $offset;  
	  	if(empty($offset))  
	  	{  
	  	$offset=0;  
	  	}  
	  	$this->pagination->initialize($config);       
	  	$data['query']      = $this->db->query($string_query." limit $offset,$num");   
	  	$data['base']       = $this->config->item('base_url');
		$data['cekJlh'] = $data['query']->num_rows();
	  	return $data;
	}
}
?>