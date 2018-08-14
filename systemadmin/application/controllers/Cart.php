<?php

class Cart extends CI_Controller{

	public function __construct(){
		 
        parent::__construct();
        $this->config->load('sketsanet');
        $this->load->library('output_view');
        $this->load->library(array('pagination','koperasi','cart','w_cart'));
		$this->load->helper('cookie');
		
		date_default_timezone_set('Asia/jakarta');

        //$this->lang->load('message','english');

        // Site
        $site = $this->config->item('site');
        $this->title = $site['title'];
        $this->logo = $site['logo'];

        // Template
        $template = $this->config->item('template');
        $this->admin_template = $template['backend_template'];
        $this->front_template = $template['front_template'];
        $this->auth_template = $template['auth_template'];
        $this->home = $template['home'];

        // Auth view
        $view = $this->config->item('view');
        $this->login_view = $view['login'];
        $this->register_view = $view['register'];
        $this->forgot_password_view = $view['forgot_password'];
        $this->reset_password_view = $view['reset_password'];

        // Default page
        $route = $this->config->item('route');
        $this->default_page = $route['default_page'];
        $this->login_success = $route['login_success'];
    }

	//
    function addcart(){
        
		if($this->session->userdata('m_cart') ==''){
			$this->session->set_userdata('m_cart', session_id());
		}
		
		$pid = $this->input->post('id');
		
		$row = $this->db->where('product_id',$pid)->get('product')->row();
		
		$price = $this->koperasi->pricing($pid);
		
		$prices = ($row->sale != 0 ? $price['sale'] : $price['price'] );
		
		
		$data = array(
			'id'      => $pid,
			'name'    => $row->productName,
			'qty'     => $this->input->post('qty'),
			'price'   => $prices,
			'picture' => $row->image_small
		);

		$cart = $this->cart->insert($data);
		
		foreach ($this->cart->contents() as $items){
			$sid[] = $items['rowid'];
		}
		
		$rowID = end($sid);
		//$ip = $_SERVER['REMOTE_ADDR'];
		$ip = $this->input->ip_address();
		$cid = ($this->session->userdata('c_id') !== NULL ? $this->session->userdata('c_id') : 0 );
		
		
		if($cart){		
			$datadb = array(
				
				'customer_id' => $cid,
				'ip' => $ip,
				'product_id' => $pid,
				'product_name' => $row->productName,
				'qty' => $this->input->post('qty'),
				'price' => $prices,
				'picture' => $row->image_small,
				'posting_date' => date('Y-m-d'),
				'rowid' => $rowID,
				'sid' => $this->session->userdata('m_cart')
			);
			$this->db->insert('cart',$datadb);
			redirect('cart/view');
		}
		
		
    }
	
	public function view(){
		
		if($this->session->userdata('logged_in') === NULL){
			if($this->input->cookie('email') !== NULL){
				redirect('home');	
			}
		}
		
		//UPDATE CART AFTER LOGIN
		if($this->session->userdata('m_cart') !== NULL && $this->session->userdata('logged_in') !== NULL ){
			
			$data = array(
				'customer_id' => $this->session->userdata('c_id')
			);
			
			$this->db->where('sid', $this->session->userdata('m_cart'));
			$this->db->update('cart',$data);
		}
		
		$this->load->view('cart');
	}
	
	public function login(){
		$this->load->view('login_payment');
	}
	
	public function login_pay(){
		
		$email 		= $this->input->post('email',true);
		$password 	= $this->input->post('password',true);

		$row = $this->db->where('email',$email)->where('password',$password)->where('banned','N')->get('customer')->row();
		
		if($row){
			$email 	= $row->email;
			$name 	= $row->cs_name;
			$id 	= $row->customer_id;
			
			$this->session->set_userdata('logged_in',true);
			$this->session->set_userdata('c_id',$id);
			$this->session->set_userdata('c_name',$name);
			$this->session->set_userdata('c_email',$email);
			
			$dataCookie = array(
				'name'   => 'loggedin',
				'value'  => 'The Value',
				'expire' => '86500',
				'domain' => 'koperasiserasi.com',
				'path'   => '/',
				'secure' => TRUE
			);
			
			$cookie_name ="login";
			$cookie_value = $this->session->userdata('c_id');
			
			$inputcookie = setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
			
			if($inputcookie){
				redirect('payment');
			}else{
				$this->session->sess_destroy();
				echo "Cookie Gagal";
			}
			
			
			
		}else{
			
			echo "<link rel='stylesheet' type='text/css' href='". base_url('css/bootstrap.css')."' />";
			echo "<link rel='stylesheet' type='text/css' href='". base_url('css/font-awesome.css')."' />";
			
			echo "
			<div class='container'>
				<div class='row'>
					<div class='col-md-6 col-md-offset-3 col-xs-12'>
						<div class='text-center' style='margin:50px 0 20px'><img style='width:50%' src='".base_url('images/logo.png')."'/></div>
						<div class='panel panel-default'>
							<div class='panel-heading'><h4 class='panel-title'><i class='fa fa-info-circle'></i> Login Gagal</h4></div>
							<div class='panel-body'>
								<p>Login kamu gagal, email atau password salah, silahkan ". anchor('cart/login','coba lagi','') .".</p>
							</div>
						</div>
					</div>
				</div>	
			</div>";	
				
		}			
	}
	
	public function updateqty(){
		
		$data = array(
		'qty' => $this->input->post('qty')
		);
		
		$this->db->where('cart_id', $this->input->post('cart_id'));
		$this->db->update('cart',$data);
		
		
	}
	
	public function updateresult($id){
		
		$row = $this->db->where('cart_id', $id)->get('cart')->row_array();
		$amount = $row['qty'] * $row['price']; 
		$price = number_format($amount,0,',','.');
		echo json_encode(array('price' => $price));
		
	}
	
	public function delete_item($rowid){
		$this->cart->remove($rowid);
		
		$this->db->where('rowid',$rowid);
		$this->db->delete('cart');
		
		redirect('cart/view');
	}
	
	public function delete(){
		$this->cart->destroy();
		session_destroy();
	}
	
	

}
?>