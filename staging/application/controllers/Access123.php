<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access123 extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }  
    
    public function index()
    {
         $this->load->view('access/login');
    }
    
    public function validate() {
        $this->form_validation->set_rules('usermail', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('userpass', 'Password', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('access/login');
        }else{
            redirect('dashboard');
        }
    }
    public function login()
   {
        // create the data object
        $data = new stdClass();
        
        // load form helper and validation library
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        // set validation rules
        $this->form_validation->set_rules('usermail', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('userpass', 'Password', 'required');
        
        if ($this->form_validation->run() == false) {
            
            // validation not ok, send validation errors to the view
            $this->load->view('access/login');
            
        } else {
            
            // set variables from the form
            $email = $this->input->post('usermail');
            $password = $this->input->post('userpass');
            
            if ($this->Admin_model->resolve_admin_login($email, $password)) {
                
               // $user_id = $this->user_model->get_user_id_from_username($username);
                $user    = $this->Admin_model->get_user($email);
                $newSession= array(
                                    'id_log'    => (int)$user->id_users,
                                    'username_log'   => (string)$user->username,
                                   'logged_in'   => (bool)true);
                $this->session->set_userdata($newSession);
                redirect('Dashboard');
                
            } else {
                
                // login failed
                $data->error = 'Wrong username or password.';
                
                // send error to the view
                $this->load->view('access/login');
                
            }
            
        }
        
    }
    public function logout() 

    {
        
        // create the data object
        $data = new stdClass();
        
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            
            // remove session datas
            foreach ($_SESSION as $key => $value) {
                unset($_SESSION[$key]);
            }
            
            // user logout ok
            redirect(base_url('Access123','refresh'));
            
        } else {
            
            // there user was not logged in, we cannot logged him out,
            // redirect him to site root
            redirect('/');
            
        }
        
    }
}
