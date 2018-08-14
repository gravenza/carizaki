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
class Testimoni extends CI_Controller{

    //put your code here
    //public $table;
    //public $id_table;
    public function __construct() {
        
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->helper('sluq_helper');
        $this->load->model('admin_model');
        
        if(!$this->session->userdata('id_log')){
                redirect('access123/login');
            }
    }
    
    public function table()
    {
        return 'tbl_testimoni';
    }
    public function id()
    {
        return 'id_testimoni';
    }
    public function delete_file($id)
    {
        $path= "./assets/file/testimoni/";
        $exstImage = $this->Admin_model->edit_data($id,$this->id(),$this->table());
        $nm_gbr = $id.".".$exstImage->image;
        $nm_gbr_thumb = $id."_thumb.".$exstImage->image;
        $nm_gbr_mntnc = $id."1.".$exstImage->image;
        @unlink($path.$nm_gbr);
        @unlink($path.$nm_gbr_thumb);
        @unlink($path.$nm_gbr_mntnc);
        
    }
    public function index() {  
          
                $jumlah_data=$this->Admin_model->sum_data($this->table());  
                $this->load->library('pagination');
                $config['base_url'] = base_url().'/testimoni/index';
                $config['total_rows'] = $jumlah_data;
                $config['per_page'] = 10;
                $config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
                $config['full_tag_close'] ="</ul>";
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
                $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
                $config['next_tag_open'] = "<li>";
                $config['next_tagl_close'] = "</li>";
                $config['prev_tag_open'] = "<li>";
                $config['prev_tagl_close'] = "</li>";
                $config['first_tag_open'] = "<li>";
                $config['first_tagl_close'] = "</li>";
                $config['last_tag_open'] = "<li>";
                $config['last_tagl_close'] = "</li>";
                $from = $this->uri->segment(3);
                $this->pagination->initialize($config);          
    $data['testimoni']=$this->Admin_model->get_data($config['per_page'],$from,$this->table());   
        $this->load->view('design/header');
        $this->load->view('admin/testimoni/testimoni',$data);
        $this->load->view('design/footer');
    }
    public function dataAdd()
    {
        $this->load->view('design/header');
        $this->load->view('admin/testimoni/testimoniAdd');
        $this->load->view('design/footer');
    }
    public function save_data()
    {
        $exstImage=substr(strrchr($_FILES['image']['name'], '.'), 1);
        $data = array('id_testimoni' =>'',
                    'title'=> $this->input->post('title'),
                    'content' =>$this->input->post('content'),
                    'description' =>$this->input->post('description'),
                    'url' => str_replace(' ','-',$this->input->post('title')),
                    'image' => substr(strrchr($_FILES['image']['name'], '.'), 1)
         );
        $inserttestimoni=$this->Admin_model->insert($this->table(),$data);
        $config['file_name']    = $inserttestimoni;
        $config['upload_path']    = "./assets/file/testimoni/";
        $config['allowed_types']  = 'gif|jpg|png|jpeg'; 
        $this->load->library('upload', $config);
    //    $this->upload->do_upload("image");
       if($this->upload->do_upload("image"))
       {
        $image_data = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/file/testimoni/'.$inserttestimoni.'.'.$exstImage;
                    $config['create_thumb'] = TRUE;
                    //$config['maintain_ratio'] = TRUE;
                    $config['width']         = 280;
                    $config['height']       = 195;

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();
                    if ($this->image_lib->resize()) {
                        redirect('/testimoni');
                    }
       }
    }
    public function delete_data($id)
    {
        $this->delete_file($id);
        $delete=$this->Admin_model->delete_data($id,$this->id(),$this->table());
        if($delete){
             redirect('testimoni');
        }
    }
    public function edit_data($id)
    {
        $data['testimoni']=$this->Admin_model->edit_data($id,$this->id(),$this->table());
        $this->load->view('design/header');
        $this->load->view('admin/testimoni/testimoniEdit',$data);
        $this->load->view('design/footer');
    }
    public function update_data()
    {
        $id=$this->input->post('id');
        if($_FILES["image"]["name"]!="")
        {
        $exstImage=substr(strrchr($_FILES['image']['name'], '.'), 1);
        $data = array(
                    'title'=> $this->input->post('title'),
                     'description' =>$this->input->post('description'),
                    'content' =>$this->input->post('content'),
                    'url' => str_replace(' ','-',$this->input->post('title')),
                    'image' => substr(strrchr($_FILES['image']['name'], '.'), 1)
         );
        $this->delete_file($id);
        $exstImageOld = $this->Admin_model->edit_data($id,$this->id(),$this->table());
        $config['file_name']    = $id;
        $config['upload_path']    = "./assets/file/testimoni/";
        $config['allowed_types']  = 'gif|jpg|png|jpeg'; 
        $this->load->library('upload', $config);
    //    $this->upload->do_upload("image");
        if($this->upload->do_upload("image"))
       {
        $image_data = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/file/testimoni/'.$id.'.'.$exstImageOld->image;
                    $config['create_thumb'] = TRUE;
                    //$config['maintain_ratio'] = TRUE;
                    $config['width']         = 280;
                    $config['height']       = 195;

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();

       }
    }
    else if(empty($_FILES["image"]["name"]))
    {
       $data = array(
                    'title'=> $this->input->post('title'),
                    'content' =>$this->input->post('content'),
                     'description' =>$this->input->post('description'),
                    'url' => str_replace(' ','-',$this->input->post('title'))
         );  
    }
        $update_data=$this->Admin_model->update_data($id,$this->id(),$this->table(),$data);
        if($update_data)
        {
            redirect('/testimoni');
        }
    }

  public function view($slug = NULL)
    {
        $data['tbl_testimoni'] = $this->Admin_model->get_tbl_testimoni($slug);
        
        if (empty($data['tbl_testimoni']))
        {
            show_404();
        }
 
        $data['title'] = $data['tbl_testimoni']['title'];
 
        $this->load->view('design/header');
        $this->load->view('admin/testimoni/testimoniEdit',$data);
        $this->load->view('design/footer');
    }
}
