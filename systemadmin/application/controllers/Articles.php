<?php

defined('BASEPATH') or exit('No direct script access allowed');


/**
 * Name : Sketsa.cms base controller.
 * 
 * @version 3.8.2
 *
 * @author : Arief Budiyono
 */
class Articles extends MX_Controller
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
    }


     /**
     * Default page.
     *
     * @return HTML
     **/
    public function view()
    {
        


    	 $this->load->model('M_articles' );


         $data = $this->M_articles->view();

         $this->load->view('article',$data);

    }



    function detail($videoId,$link='')
  {
    	$data['query'] = $this->db->query("select * from sketsa_articles where id = '$videoId'");
    	$data['query2'] = $this->db->query("select * from sketsa_articles_images where  articles_id ='$videoId' order by rand() limit 6");


      $newss = $this->db->query("select * from sketsa_articles where id = '$videoId'")->row_array();
      $hits = $newss['hits'];

      // Visitor Counter
    if (!$this->session->userdata('timeout') || $this->session->userdata('timeout') < time()) {
        $this->session->set_userdata('timeout', time() + 120);
        

           $data = array(
                    
                    'hits'=>$hits+1,
                    
                );
             
           $this->db->where('id', $videoId);
      $this->db->update('sketsa_articles', $data); 

    }

    	
        $this->load->view('article-detail',$data);
    
  }

  function category($slug)
  {
    
    //echo $slug;

    $articles_category = $this->db->query("select * from sketsa_articles_category where slug = '".$slug."'");

    $category = $articles_category->row_array();
    //echo $category['id'];


     $this->load->model('M_articles' );


         $data = $this->M_articles->view_by_category($category['id'],$slug);

         $this->load->view('article',$data);





  }






}