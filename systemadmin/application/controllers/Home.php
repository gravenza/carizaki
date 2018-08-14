<?php

defined('BASEPATH') or exit('No direct script access allowed');


/**
 * Name : Sketsa.cms base controller.
 * 
 * @version 3.8.2
 *
 * @author : Arief Budiyono
 */
class Home extends CI_Controller
{


	 // Site
    private $title;
    private $logo;

    // Template
    private $admin_template;
    private $front_template;
    private $auth_template;
    private $youtubeanak_template;

    // Auth view
    private $login_view;
    private $register_view;
    private $forgot_password_view;
    private $reset_password_view;

    // Default page
    private $default_page;
    private $login_success;

    public function __construct()
    {
        parent::__construct();
        $this->config->load('sketsanet');
        $this->load->library('output_view');
        $this->load->library(array('pagination','koperasi'));


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


     /**
     * Default page.
     *
     * @return HTML
     **/
    public function index(){

		$this->db->where("posting_date < NOW() and customer_id = 0");
		$this->db->delete('cart');
		
		if($this->input->cookie('email') !== NULL){
			
			$email = $this->input->cookie('email');
			$password = $this->input->cookie('password');
			
			$row = $this->db->where('email',$email)->where('password',$password)->where('banned','N')->get('customer')->row();
			
			if($row){
				$email 	= $row->email;
				$name 	= $row->cs_name;
				$id 	= $row->customer_id;
			
				$this->session->set_userdata('logged_in',true);
				$this->session->set_userdata('c_id',$id);
				$this->session->set_userdata('c_name',$name);
				$this->session->set_userdata('c_email',$email);
			}
		}
        
     	$this->load->view('template/home');
    }
	
	public function update_image(){
		$i = 0;
		for($no=2;$no <= 304;$no++){
			
			$queryImage = $this->db->where('id_product',$no)->get('ga_library');
			$jmlImg = $queryImage->num_rows();
			
			if($queryImage->num_rows() > 0){
				foreach($queryImage->result() as $row){
					$i++;					
					$rpc = $row->picture;	
					
					$img[$no] = $rpc;
					
					$count = count($img);
					$cal = $count - $jmlImg;
					
					$cut = array_slice($img,$cal);
					
					$images[$no] = serialize($cut);
					
					//echo "<p class='$no'>$no. $images[$no]".$jmlImg." - $count</p>";
					
					$data[$no] = array(
						'images' => $images[$no]
					);
			
					$this->db->where('id_product',$no);
					$this->db->update('product',$data[$no]);
					
				}
			}			
			
		}
	}

}