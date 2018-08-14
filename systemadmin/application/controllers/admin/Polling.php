<?php

defined('BASEPATH') or exit('No direct script access allowed');


/**
 * Name : Sketsa.cms base controller.
 * 
 * @version 1.0.0
 *
 * @author : Arief Budiyono
 */
class Polling extends MX_Controller
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

        // Site
        $site = $this->config->item('site');
        $this->title = $site['title'];
        $this->logo = $site['logo'];

        // Template
        $template = $this->config->item('template');
        $this->admin_template = $template['backend_template'];
        $this->front_template = $template['front_template'];
        $this->auth_template = $template['auth_template'];
       // $this->youtubeanak_template = $template['youtubeanak_template'];

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
        if (!$this->ion_auth->logged_in()) {
            if ($this->default_page == '') {
                $this->login();
            } else {
               //$this->page($this->default_page);
                //echo $this->default_page;
            }
        } else {
           

        	  /*==============tampilan grucery crud====================================================*/
        	  $table_name = 'polling';
        	  $this->db->where('table_name', $table_name);
        $table = $this->db->get('table')->row();
        //echo $table->action.'';

        $this->load->library('Grocery_CRUD');
        $crud = new grocery_CRUD();

        $crud->set_table($table_name);
        $crud->set_subject($table->subject);

        // Required field		
        if ($table->required != '') {
            $crud->required_fields(json_decode($table->required));
        }
        // Columns view
        if ($table->columns != '') {
            $crud->columns(json_decode($table->columns));
        }
        // Field view
        if ($table->field != '') {
            $crud->fields(json_decode($table->field),'');
        }
        
        $crud->fields('question','list');
        $crud->callback_field('list',array($this,'add_field_callback_1'));
        
        $crud->callback_after_insert(array($this, 'list_answer_polling_after_insert'));
        $crud->callback_after_update(array($this, 'list_answer_polling_after_update'));
        //$crud->callback_add_field('vote',array($this,'add_field_callback_1'));
        //$crud->callback_add_field('vote','add_field_callback_1');
        
        // Field upload
        if ($table->uploads != '') {
            $fields_upload = json_decode($table->uploads);
            foreach ($fields_upload as $field_upload) {
                $crud->set_field_upload($field_upload, 'assets/uploads/files');
            }
        }
        // Relation 1-n
        if ($table->relation_1 != 'null') {
            $fields_relation = json_decode($table->relation_1);
            foreach ($fields_relation as $field_relation) {
                $crud->set_relation($field_relation->field, $field_relation->table_name, $field_relation->field_view);
            }
        }
        // Unset action
        if ($table->action != '') {
            $action = json_decode($table->action);
            if (!in_array('Create', $action)) {
                $crud->unset_add();
            }
            if (!in_array('Read', $action)) {
                $crud->unset_read();
            }
            if (!in_array('Update', $action)) {
                $crud->unset_edit();
            }
            if (!in_array('Delete', $action)) {
                $crud->unset_delete();
            }
        }
        
        
       

        $crud->set_theme('flexigrid');
        $data = (array) $crud->render();
        if ($table->breadcrumb != 'null') {
            $crumbs = json_decode($table->breadcrumb);
            foreach ($crumbs as $value) {
                $add_crumb[$value->label] = $value->link;
            }
        } else {
            $add_crumb['table'] = '';
        }

        $this->output_view->set_wrapper('page', 'grocery', $data, false);
        $this->output_view->auth();

        $template_data['grocery_css'] = $data['css_files'];
        $template_data['grocery_js'] = $data['js_files'];
        
        $template_data['js_dependent'] = '';
        
        //$template_data['grocery_js'] .= $data['output'];

        $template_data['judul'] = $table->title;
        $template_data['crumb'] = $add_crumb;
        $template = $this->admin_template;

        //print_r($template_data);
       $this->output_view->output($template, $template_data);


        	  /*===============end tampilan grocery crud================================================*/



        }
    }
    
    
    
    function add_field_callback_1($value = '', $primary_key = null)
    {
        //$answers = unserialize($value);
        $answers = array();
	$vote = array();
        if($primary_key!=null)
        {
        
            $polling_answer = $this->db->query("select * from polling_answer where polling_id = ".$primary_key)->row_array();
        
        $answer = $polling_answer['answer'];
	$vote = $polling_answer['vote'];
        
        //echo $answer;
         $answers = unserialize($answer);
	$vote = unserialize($vote);
            
        }
        
	//$value = unserialize($value);
        $html = '';
        
        for($i=0;$i<6;$i++)
        {
            $text = "";
            $voting = 0;
            if(isset($answers[$i]))
            {
		$text = htmlentities(stripslashes($answers[$i]));
            }
	    if(isset($vote[$i]))
            {
		$voting = $vote[$i];
            }
        
                                        
                       $html .= "Answer
                                        	<input type=\"text\" name=\"answer[". $i. "]\" class=\"inputtext\" maxlength=\"255\" style=\"width:500px\" value=\" ". $text."\">
                                            Vote : 
                                        	<input type=\"text\" name=\"vote[". $i. "]\" class=\"inputtext\" size=\"5\" value=\" ".$voting ."\">
                                        ";
                                        
								  }
										
       return $html; 
    }
    
    
    
    function list_answer_polling_after_insert($post_array,$primary_key)
    {
        if(count($post_array['answer'])==6)
        {
            
            $answer = serialize($post_array['answer']);
	$vote = serialize($post_array['vote']);
        
        
        $user_logs_insert = array(
        "polling_id" => $primary_key,
        "answer" => $answer,
        "vote" => $vote
            );
 
          $this->db->insert('polling_answer',$user_logs_insert);
          
          return true;
            
            
        }
        
        return false;
        
        
        
    }
    
    
    
    
     function list_answer_polling_after_update($post_array,$primary_key)
    {
        if(count($post_array['answer'])==6)
        {
            
            $answer = serialize($post_array['answer']);
	$vote = serialize($post_array['vote']);
        
        
        $user_logs_update = array(
        "polling_id" => $primary_key,
        "answer" => $answer,
        "vote" => $vote
            );
 
          //$this->db->insert('polling_answer',$user_logs_insert);
        $this->db->update('polling_answer',$user_logs_update,array('polling_id' => $primary_key));
          
          return true;
            
            
        }
        
        return false;
        
        
        
    }



}