<?php
	
	Class Video_model extends CI_Model{


	function get_video()
	{                        
		$query=$this->db->get('tbl_video'); //nama tabel                        
		if($query ->num_rows()>0)                        
			{                                    
			return $query->result(); //memunculkan semua isi query dalam database
			}                      
				else                        
				{                                    
				return array();                        
				}            
			}


	function aturvideo()
	{                        

		$this->load->library('grocery_CRUD');                        
		$this->grocery_crud->set_table('tbl_video')->set_field_upload('video','assets/uploads/files')->set_subject('video');  
        return $this->grocery_crud->render();
    }
	}