<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller{


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
        //$this->youtubeanak_template = $template['youtubeanak_template'];

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

        $this->load->model('M_product' );
		$this->load->library('koperasi');
    }


     /**
     * Default page.
     *
     * @return HTML
     **/
    public function index(){
		
         $data = $this->M_eventspektra->view();

         $this->load->view('events-spektra',$data);



    }



    function detail($id,$slug=''){
    	$data['query'] = $this->db->where('product_id',$id)->get('product');
		$row = $data['query']->row();
		$data['pro'] = $data['query']->row();
		
    	$data['querycategory'] = $this->db->where('category_id',$row->category_id)->get('category');
		$data['cat'] = $data['querycategory']->row();
		
		$data['querysubcategory'] = $this->db->where('subcategory_id',$row->subcategory_id)->get('subcategory');
		$data['suba'] = $data['querysubcategory']->row();
		
		$data['querysubcategory2'] = $this->db->where('subcategory2_id',$row->subcategory2_id)->get('subcategory2');
		$data['subb'] = $data['querysubcategory2']->row();
		
		$data['querybrand'] = $this->db->where('brand_id',$row->brand_id)->get('brand');
		$data['brand'] = $data['querybrand']->row();
    	
        $this->load->view('product-detail',$data);
    
	}


  function category($slug){
  	 
		//cari kategori news id

  		$categoryQuery = $this->db->query("select * from category where slug = '".$slug."'");
  		$category = $categoryQuery->row_array();
  		$category_id = $category['category_id'];


  		$data = $this->M_product->category($category_id,$slug);

  		$this->load->view('category',$data);
  }
  
  function subcategory($slug){
  	 
		//cari kategori news id

  		$categoryQuery = $this->db->query("select * from subcategory where slug = '".$slug."'");
  		$category = $categoryQuery->row_array();
  		$category_id = $category['subcategory_id'];


  		$data = $this->M_product->subcategory($category_id,$slug);

  		$this->load->view('subcategory',$data);
  }
  
  function subin($slug){
  	 
		//cari kategori news id

  		$categoryQuery = $this->db->query("select * from subcategory2 where slug = '".$slug."'");
  		$category = $categoryQuery->row_array();
  		$category_id = $category['subcategory2_id'];


  		$data = $this->M_product->subin($category_id,$slug);

  		$this->load->view('subcategory',$data);
  }





}