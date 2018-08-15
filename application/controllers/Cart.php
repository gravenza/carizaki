<?php

class Cart extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->view('client');
	}

	public function pilihproduk_homeowner(){
		$product_id = $this->input->post('item',true);
		$category 	= $this->input->post('category',true);
		$user_id 		= $this->session->userdata('id');
		$user_type 	= $this->session->userdata('type');
		$name 			= $this->session->userdata('nama');
		$email 			= $this->session->userdata('email');
		$date 			= date('Ymd');

		$data = array(
		'user_id' => $user_id,
		'type' => $user_type,
		'product_id' => $product_id,
		'category' => $category,
		'date_post' => $date
		);

		$insert = $this->db->insert('cart',$data);

		if($insert){
			$this->load->library('email');

			$config['smtp_host'] = 'mail.carizaki.com';
			$config['smtp_user'] = 'info@carizaki.com';
			$config['smtp_pass'] = 'useradmin1234';
			$config['smtp_port'] = 465;
			$config['mailtype'] = 'html';

			$this->email->initialize($config);

			$rowcart = $this->db->where('user_id',$user_id)->order_by('cart_id','DESC')->get('cart')->row_array();

			$rowprod = $this->db->where('id_produk',$rowcart['product_id'])->get('tbl_produk')->row_array();
			$productName = $rowprod['title'] == '' ? 'Rangka Baja Ringan' : $rowprod['title'];

			$customer = $this->db->where('id_homeowner',$user_id)->get('tbl_homeowner')->row();

			$content = "<h1>Pilihan Product</h1>";
			$content .= "<br />";
			$content .= "Nama: ".$name."<br />";
			$content .= "Customer: ".$user_type."<br />";
			$content .= "Phone: ".$customer->telpon."<br />";
			$content .= "Email: ".$customer->email."<br />";
			$content .= "Produk Pilihan: ".$productName."<br />";
			$content .= "Tipe Produk: ".$rowcart['category']."<br />";

			$this->email->from($email, $name);
			$this->email->to('andre.jatmika@bluescope.com');
			//$this->email->cc('another@another-example.com');
			$this->email->bcc('toniewibowo@gmail.com');

			$this->email->subject('Pilihan Produk - '.$name);
			$this->email->message($content);

			if($this->email->send()){
				echo 1;
			}else{
				echo 0;
			}
		}else{
			echo 0;
		}
	}

	public function pilihproduk_applicator(){
		$product_id = $this->input->post('item',true);
		$category 	= $this->input->post('category',true);
		$user_id	= $this->session->userdata('id_app');
		$user_type 	= $this->session->userdata('user_app');
		$name 		= $this->session->userdata('nama_app');
		$email 		= $this->session->userdata('email_app');
		$date 		= date('Ymd');

		$data = array(
		'user_id' => $user_id,
		'type' => $user_type,
		'product_id' => $product_id,
		'category' => $category,
		'date_post' => $date
		);

		$insert = $this->db->insert('cart',$data);

		if($insert){

			$this->load->library('email');

			$config['smtp_host'] = 'mail.carizaki.com';
			$config['smtp_user'] = 'info@carizaki.com';
			$config['smtp_pass'] = 'useradmin1234';
			$config['smtp_port'] = 465;
			$config['mailtype'] = 'html';

			$this->email->initialize($config);

			$rowcart = $this->db->where('user_id',$user_id)->order_by('cart_id','DESC')->get('cart')->row_array();

			$rowprod = $this->db->where('id_produk',$rowcart['product_id'])->get('tbl_produk')->row_array();
			$productName = $rowprod['title'] == '' ? 'Rangka Baja Ringan' : $rowprod['title'];

			$content = "<h1>Pilihan Product</h1>";
			$content .= "<br />";
			$content .= "Nama: ".$name."<br />";
			$content .= "Customer: ".$user_type."<br />";
			$content .= "Produk Pilihan: ".$productName."<br />";
			$content .= "Tipe Produk: ".$rowcart['category']."<br />";

			$this->email->from($email, $name);
			$this->email->to('andre.jatmika@bluescope.com');
			//$this->email->cc('another@another-example.com');
			$this->email->bcc('toniewibowo@gmail.com');

			$this->email->subject('Pilihan Produk - '.$name);
			$this->email->message($content);

			if($this->email->send()){
				echo 1;
			}else{
				echo 0;
			}
		}else{
			echo 0;
		}
	}

}
