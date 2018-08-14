<?php

defined('BASEPATH') or exit('No direct script access allowed');


/**
 * Name : Sketsa.cms base controller.
 * 
 * @version 3.8.2
 *
 * @author : Arief Budiyono
 */
class Video extends MX_Controller
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
    public function index()
    {
        


    	$this->load->model('M_video' );


         $data = $this->M_video->view();

         $this->load->view('video',$data);



    }



    function detail($videoId,$link='')
  {
    	$data['query'] = $this->db->query("select * from video where video_id = '$videoId'");
    	//$data['query2'] = $this->db->query("select * from sketsa_news_images where  news_id ='$videoId' order by rand() limit 6");



    	
        $this->load->view('video-detail',$data);
    
  }







}