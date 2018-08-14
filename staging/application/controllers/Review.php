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
class Review extends CI_Controller{

    //put your code here
    //public $table;
    //public $id_table;
    public function __construct() {
        
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->helper('sluq_helper');
        $this->load->model('admin_model');
        $this->load->helper('form');
        if(!$this->session->userdata('id_log')){
                redirect('access123/login');
            }
    }
    
    public function table()
    {
        return 'tbl_review';
    }
    public function id()
    {
        return 'id_review';
    }
    public function delete_file($id)
    {
        $path= "./assets/file/review/";
        $exstImage = $this->Admin_model->edit_data($id,$this->id(),$this->table());
        $nm_gbr = $id.".".$exstImage->image;
        $nm_gbr_thumb = $id."_thumb.".$exstImage->image;
        $nm_gbr_mntnc = $id."1.".$exstImage->image;
        @unlink($path.$nm_gbr);
        @unlink($path.$nm_gbr_thumb);
        @unlink($path.$nm_gbr_mntnc);
        
    }
    public function lokasi() {  
                $jumlah_data=$this->Admin_model->sum_data_param('kategori','lokasi',$this->table());  
                $this->load->library('pagination');
                $config['base_url'] = base_url().'/review/lokasi/index';
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
                $data['kategori'] = "lokasi";          
        $data['review']=$this->Admin_model->get_data_param($config['per_page'],$from,$this->table(),'kategori','lokasi');   
        $this->load->view('design/header');
        $this->load->view('admin/review/review',$data);
        $this->load->view('design/footer');
    }
     public function applicator() {  
                $jumlah_data=$this->Admin_model->sum_data_param('kategori','applicator',$this->table());  
                $this->load->library('pagination');
                $config['base_url'] = base_url().'/review/applicator/index';
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
                $data['kategori'] = "applicator";          
        $data['review']=$this->Admin_model->get_data_param($config['per_page'],$from,$this->table(),'kategori','applicator');   
        $this->load->view('design/header');
        $this->load->view('admin/review/review',$data);
        $this->load->view('design/footer');
    }
    public function dataAdd($kategori)
    {
        $data['kategori'] = $kategori;
        if($kategori=='lokasi')
        {
        $data['review'] = $this->Admin_model->get_data_no_limit('tbl_lokasi');
        $data['id'] = 'id_lokasi';
        $data['nama'] = 'desc';
        } else if($kategori=='applicator')
        {
            $data['review'] = $this->Admin_model->get_data_no_limit('tbl_applicator');
            $data['id'] = 'id_applicator';
            $data['nama'] = 'nama';
        }

        $this->load->view('design/header');
        $this->load->view('admin/review/reviewAdd',$data);
        $this->load->view('design/footer');
    }
    public function dataAdd_applicator()
    {
        $data['kategori'] = 'applicator';
        $this->load->view('design/header');
        $this->load->view('admin/review/reviewAdd',$data);
        $this->load->view('design/footer');
    }
    public function save_data($kategori)
    {
        $exstImage=substr(strrchr($_FILES['image']['name'], '.'), 1);
        $data = array('id_review' =>'',
                    'nama'=> $this->input->post('nama'),
                    'id'=> $this->input->post('id'),
                    'kategori'=>$kategori,
                    'content' =>$this->input->post('content'),
                    'image' => substr(strrchr($_FILES['image']['name'], '.'), 1)
         );
        $insertreview=$this->Admin_model->insert($this->table(),$data);
        $config['file_name']    = $insertreview;
        $config['upload_path']    = "./assets/file/review/";
        $config['allowed_types']  = 'gif|jpg|png|jpeg'; 
        $this->load->library('upload', $config);
    //    $this->upload->do_upload("image");
       if($this->upload->do_upload("image"))
       {
        $image_data = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/file/review/'.$insertreview.'.'.$exstImage;
                    $config['create_thumb'] = TRUE;
                    //$config['maintain_ratio'] = TRUE;
                    $config['width']         = 280;
                    $config['height']       = 195;

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();
                    if ($this->image_lib->resize()) {
                        redirect('/review/'.$kategori.'');
                    }
       }
    }
    public function delete_data($kategori,$id)
    {
         $data['kategori'] = $kategori;
        $this->delete_file($id);
        $delete=$this->Admin_model->delete_data($id,$this->id(),$this->table());
        if($delete){
             redirect('/review/'.$kategori.'');
        }
    }
    public function edit_data($kategori,$id)
    {
        $data['review']=$this->Admin_model->edit_data($id,$this->id(),$this->table());
        $data['kategori'] = $kategori;
        $this->load->view('design/header');
        $this->load->view('admin/review/reviewEdit',$data);
        $this->load->view('design/footer');
    }
    public function update_data($kategori)
    {
        $id=$this->input->post('id');
        if($_FILES["image"]["name"]!="")
        {
        $exstImage=substr(strrchr($_FILES['image']['name'], '.'), 1);
        $data = array(
                    'nama'=> $this->input->post('nama'),
                     'kategori'=>$this->input->post('kategori'),
                    'content' =>$this->input->post('content'),
                    
                    'image' => substr(strrchr($_FILES['image']['name'], '.'), 1)
         );
        $this->delete_file($id);
        $exstImageOld = $this->Admin_model->edit_data($id,$this->id(),$this->table());
        $config['file_name']    = $id;
        $config['upload_path']    = "./assets/file/review/";
        $config['allowed_types']  = 'gif|jpg|png|jpeg'; 
        $this->load->library('upload', $config);
   //    $this->upload->do_upload("image");
        if($this->upload->do_upload("image"))
       {
        $image_data = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/file/review/'.$id.'.'.$exstImageOld->image;
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
                    'nama'=> $this->input->post('nama'),
                    'content' =>$this->input->post('content'),
                    
         );  
    }
        $update_data=$this->Admin_model->update_data($id,$this->id(),$this->table(),$data);
        if($update_data)
        {
            redirect('/review/'.$kategori.'');
        }
    }
}
