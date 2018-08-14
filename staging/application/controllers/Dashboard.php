<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * ***************************************************************
 
 * ***************************************************************
 */

/**
 * Description of Dashboard
 *
 * @author wahyu
 */
class Dashboard extends CI_Controller{
    //put your code here
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        if(!$this->session->userdata('id_log')){
                redirect('access123/login');
            }
       
    }    
    
    public function index() { 
      
    

        $this->load->view('design/header');
        $this->load->view('admin/dashboard');
        $this->load->view('design/footer');
    }
}
