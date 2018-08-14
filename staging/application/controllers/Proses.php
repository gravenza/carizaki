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
class Proses extends CI_Controller{
    //put your code here
    public function __construct()
    {
        parent::__construct();
       
    }    
    
    public function index() {        
        echo '<center> <h1> Site Migration In Progress </h1> </center>'; 
    }


}