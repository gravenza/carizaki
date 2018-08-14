<?php

class Customer extends CI_Controller{

	 public function __construct(){
        parent::__construct();
        $this->config->load('sketsanet');
        $this->load->library('output_view');
        $this->load->library('pagination');
		
		$this->load->helper('cookie');

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
    function index()
    {
        $data['query'] = $this->db->query("select * from branch");
        $this->load->view('branch',$data);
    }
	
	public function login(){
		$this->load->view('login_customer');
	}
	
	public function dologin(){
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
			
			if($this->input->post('rememberme') == 'on'){
				$cookie_email 	="email";
				$value_email 	= $email;
			
				$cookie_pass 	="password";
				$value_pass 	= $password;
			
				$inputcookie = setcookie($cookie_email, $value_email, time() + (86400 * 30), "/"); // 86400 = 1 day
				$inputcookie .= setcookie($cookie_pass, $value_pass, time() + (86400 * 30), "/"); // 86400 = 1 day	
			}
			
			if($inputcookie){
				redirect('cart/view');
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
								<p>Login kamu gagal, email atau password salah, silahkan ". anchor('customer/login','coba lagi','') .".</p>
							</div>
						</div>
					</div>
				</div>	
			</div>";	
				
		}
	}
	
	function kabupaten($id = 0){
		
		$query = $this->db->where('id_provinsi',$id)->get('kabupaten');
		
		echo "<select name='id_kabupaten' onchange='loadKec(this.value)' class='form-control'>";
		foreach($query->result_array() as $row){
			echo "<option value='$row[id_kabupaten]'>$row[nama_kabupaten]</option>";
		}
		echo "</select>";
	}
	
	function kecamatan($id = 0){
		
		$query = $this->db->where('id_kabupaten',$id)->get('kecamatan');
		
		echo "<select name='id_kecamatan' onchange='loadKel(this.value)' class='form-control'>";
		foreach($query->result_array() as $row){
			echo "<option value='$row[id_kecamatan]'>$row[nama_kecamatan]</option>";
		}
		echo "</select>";
	}
	
	function kelurahan($id = 0){
		
		$query = $this->db->where('id_kecamatan',$id)->get('kelurahan');
		
		echo "<select id='field-id_kelurahan' name='id_kelurahan' class='chosen-select form-control' data-placeholder='Select Id Kelurahan'>";
		foreach($query->result_array() as $row){
			echo "<option value='$row[id_kelurahan]'>$row[nama_kelurahan]</option>";
		}
		echo "</select>";
	}


    function logout(){
        
		$this->session->sess_destroy();
		delete_cookie('login');
		
		redirect('customer/login');
		
    }
}
?>