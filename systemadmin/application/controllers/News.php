<?php

defined('BASEPATH') or exit('No direct script access allowed');


/**
 * Name : Sketsa.cms base controller.
 * 
 * @version 3.8.2
 *
 * @author : Arief Budiyono
 */
class News extends MX_Controller
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
        $this->load->library('pagination');


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

         $this->load->model('M_news' );
    }


     /**
     * Default page.
     *
     * @return HTML
     **/
    public function index()
    {
        


    	
    	 


         $data = $this->M_news->view();

         $this->load->view('news',$data);



    }



    function detail($newsId,$link=''){
    	$data['query'] = $this->db->query("select * from sketsa_news where id = '$newsId'");
    	$data['query2'] = $this->db->query("select * from sketsa_news_images where  news_id ='$newsId' order by rand() limit 6");


    	$newss = $this->db->query("select * from sketsa_news where id = '$newsId'")->row_array();
    	$hits = $newss['hits'];

    	// Visitor Counter
		if (!$this->session->userdata('timeout') || $this->session->userdata('timeout') < time()) {
			
			$this->session->set_userdata('timeout', time() + 120);
        	$thedata = array(
                    
                    'hits'=>$hits+1,
                    
                );
             
        	$this->db->where('id', $newsId);
			$this->db->update('sketsa_news', $thedata); 

		}

    	
        $this->load->view('news-detail',$data);
    
	}


  function category($slug)
  {
  	 //cari kategori news id

  		$categoryQuery = $this->db->query("select * from sketsa_news_category where slug = '".$slug."'");
  		$category = $categoryQuery->row_array();
  		$category_id = $category['id'];


  		$data = $this->M_news->category($category_id,$slug);

  		$this->load->view('news',$data);
  }





}