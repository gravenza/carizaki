<?php

class Pages extends MX_Controller
{

	 public function __construct()
    {
        parent::__construct();
        $this->config->load('sketsanet');
        $this->load->library('output_view');
        $this->load->library('pagination');

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

	//FIFGROUP
	function view($pages_id,$title)
  	{
		$data['query'] = $this->db->query("select * from pages where pages_id = '$pages_id'");
		$this->load->view('pages',$data);
  	}


    function viewamitra($pages_id,$title)
    {
        $data['query'] = $this->db->query("select * from pages_amitra where pages_amitra_id = '$pages_id'");
        $this->load->view('pages',$data);
    }


    function viewfifastra($pages_id,$title)
    {
        $data['query'] = $this->db->query("select * from pages_astra where pages_astra_id = '$pages_id'");
        $this->load->view('pages',$data);
    }


    function viewspektra($pages_id,$title)
    {
        $data['query'] = $this->db->query("select * from pages_spektra where pages_spektra_id = '$pages_id'");
        $this->load->view('pages',$data);
    }

}
?>