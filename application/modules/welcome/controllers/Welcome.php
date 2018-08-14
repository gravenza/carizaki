<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends MX_Controller
{
    /**
     * Modules instalation.
     *
     * @return JSON
     **/
    public function module()
    {
        $module = [
            'name' => 'Welcome',
            'menu_link' => ['welcome/index' => 'View welcome page'],
            'table' => '',
            'description' => 'Example default welcome page Codeigniter',
        ];

        return $module;
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     *
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->load->view('welcome_message');
    }
}
