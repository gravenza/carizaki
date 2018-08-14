<?php
class W_cart {
	
	private $CI;
	
	function __construct(){
		$this->CI =& get_instance();
		$this->CI->load->database();
		
	}
	
	function total_items($item = 5){
		
		//$item = 5;
		
		return $item;
	}
	
	function delivery(){
		
		if($this->CI->session->userdata('logged_in')){
			
			$cs = $this->CI->db->where('customer_id',$this->CI->session->userdata('c_id'))->get('customer')->row();
			
			//kecamatan
			$kec = $this->CI->db->where('id_kecamatan',$cs->id_kecamatan)->get('kecamatan')->row();
			
			//kabupaten
			$kab = $this->CI->db->where('id_kabupaten',$cs->id_kabupaten)->get('kabupaten')->row();
			
			$jnekec = $this->CI->db->like('kecamatan',$kec->nama_kecamatan)->get('jne')->row();
			$jnekab = $this->CI->db->like('kota',$kab->nama_kabupaten)->get('jne')->row();
			
			if($jnekec){
				
				if(!isset($_GET['dlv'])){
					$price = $jnekec->reg;
				}else{
					switch($_GET['dlv']){
						default :
						$price = $jnekec->reg;
						break;
						case "reg";
						$price = $jnekec->reg;
						break;
						case "yes";
						$price = $jnekec->yes;
						break;
						case "oke";
						$price = $jnekec->oke;
						break;
					}	
				}	
				
			}
			elseif($jnekab){
				
				if(!isset($_GET['dlv'])){
					$price = $jnekab->reg;
				}else{
					switch($_GET['dlv']){
						default :
						$price = $jnekab->reg;
						break;
						case "reg";
						$price = $jnekab->reg;
						break;
						case "yes";
						$price = $jnekab->yes;
						break;
						case "oke";
						$price = $jnekab->oke;
						break;
					}	
				}				
				
			}else{
				
				$price = "Maaf Alamat anda tidak terjangkau oleh layanan pengiriman JNE";
			}
			
			return $price;
		}
		
	}
	
	function total(){
		
		if($this->CI->session->userdata('logged_in')){
			$this->CI->db->where('customer_id',$this->CI->session->userdata('c_id'));	
		}else{
			$this->CI->db->where('sid',$this->CI->session->userdata('m_cart'));
		}
		
		$dataPrice = $this->CI->db->get('cart');
		$total = 0;
		
		foreach($dataPrice->result() as $row){
			
			$total = $total + ($row->price * $row->qty);
		}
		
		return $total;
		
	}
	
	function grandTotal(){
		
		$grandTotal = ($this->delivery()) + ($this->total());
		
		return $grandTotal;
	}
}