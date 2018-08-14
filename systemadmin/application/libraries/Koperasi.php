<?php
class Koperasi {
	
	//private $CI;
	
	function __construct(){
		$this->CI =& get_instance();
		$this->CI->load->database();
	}
	
	public function pricing($id){
		$row = $this->CI->db->where('product_id',$id)->get('product')->row();
		$countSale 	= ($row->sale/100) * $row->price;
		$amount		= $row->price - $countSale;
		$roundSale		= round($amount);
		$data['price']	= $row->price;
		$data['sale']	= $roundSale;
		
		return $data;
	}
	
	function showcategory($id){
			
			//$queryGadget = $this->CI->db->where('category_id',$id)->where('publish','Y')->limit(12)->order_by('product_id','DESC')->get('product');
			$queryGadget = $this->CI->db->where('category_id',$id)->limit(12)->order_by('product_id','DESC')->get('product');
			
			if($queryGadget->num_rows() > 0){
				
				foreach($queryGadget->result_array() as $row){
				
					$data = $this->pricing($row['product_id']);
					$title = (strlen($row['productName']) > 40 ? substr($row['productName'],0,40).'...' : $row['productName']);
				
					echo "<div class='col-md-2 col-xs-6 col-sm-6 singleCol'>
						<div class='thumbnail'>".
						
							($row['sale']!= 0 ? '<span class="discount">SALE</span>' : '') ."
						
							<a href='". site_url('product/detail').'/'.$row['product_id'].'/'.$row['slug']."'>
								<img src='". base_url().'images/product/'.$row['image_small'] ."'/>
							</a>
						
							<div class='caption'>
								<a class='title' href='". site_url('product/detail').'/'.$row['product_id'].'/'.$row['slug']."'>$title </a>";
								//<p class='star'>&nbsp;</p>";
							
							if($row['sale']!=0){
								echo "<p class='sale'>IDR. ". number_format($data['price'],0,',','.') .",-</p>
								<p class='price'>IDR. ". number_format($data['sale'],0,',','.') .",-</p>";
							}else{ 
								echo "<p class='sale'>&nbsp;</p>
								<p class='price'>IDR. ". number_format($data['price'],0,',','.') .",-</p>";
							}
								
					echo "<p style='margin:10px 0 0 0;'>
								<a class='btn btn-danger' href='". site_url('cart/addtocart').'/'.$row['product_id'].'/'.$row['slug']."'><i class='fa fa-shopping-cart'></i> BUY NOW</a>
								<a class='btn btn-danger wishlist disabled' href='". site_url('wishlist/addWishlist').'/'.$row['product_id'] ."'><i class='fa fa-heart-o'></i></a>
								</p>
							</div>
						
						</div>
					</div>";
				
				
				}
				
			}
				
			//return true;	
			
	}
	
	function test(){
		
		$data = array('Apple','Orange','Pineaplle');
		
		foreach($data as $key){
			$post = $key;
			
			return $post;
		}
		
		
	}
}