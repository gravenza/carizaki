<?php
 
Class Video extends CI_Controller {

    function __construct() {
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
        return 'tbl_video';
    }
    public function id()
    {
        return 'id_video';
    }
    public function delete_file($id)
    {
        $path= "./assets/file/video/";
        $exstImage = $this->Admin_model->edit_data($id,$this->id(),$this->table());
        $nm_gbr = $id.".".$exstImage->image;
        $nm_gbr_thumb = $id."_thumb.".$exstImage->image;
        $nm_gbr_mntnc = $id."1.".$exstImage->image;
        @unlink($path.$nm_gbr);
        @unlink($path.$nm_gbr_thumb);
        @unlink($path.$nm_gbr_mntnc);
        
    }
    function index() {
        
        // instance object
       // $crud = new grocery_CRUD();
        // pilih tabel yang akan digunakan
       // $crud->set_table('tbl_video');
        // custom field yang ingin ditampilkan
        //$crud->columns('desc','latitude','longitude');
        // simpan hasilnya kedalam variabel output
        $jumlah_data=$this->Admin_model->sum_data($this->table());  
                $this->load->library('pagination');
                $config['base_url'] = base_url().'/video/index';
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
    $data['video']=$this->Admin_model->get_data($config['per_page'],$from,$this->table());   
        $this->load->view('design/header');
        $this->load->view('admin/video/video',$data);
        $this->load->view('design/footer');
        }
    public function dataAdd()
    {
        $this->load->view('design/header');
        $this->load->view('admin/video/videoAdd');
        $this->load->view('design/footer');
    }

    function save_data()
    {
        
       $exstImage=substr(strrchr($_FILES['image']['name'], '.'), 1);
        $data = array('id_video' =>'',
                    'judul_video'=> $this->input->post('judul_video'),
                    'embed' =>$this->input->post('embed'),
                    'url' => str_replace(' ','-',$this->input->post('judul_video')),
                    'image' => substr(strrchr($_FILES['image']['name'], '.'), 1)
         );
        $inservideo = $this->Admin_model->insert($this->table(),$data);
        $config['file_name']    = $inservideo;
        $config['upload_path']    = "./assets/file/video/";
        $config['allowed_types']  = 'gif|jpg|png|jpeg'; 
        $this->load->library('upload', $config);
    //    $this->upload->do_upload("image");
       if($this->upload->do_upload("image"))
       {
        $image_data = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/file/video/'.$inservideo.'.'.$exstImage;
                    $config['create_thumb'] = TRUE;
                    $config['maintain_ratio'] = false;
                    $config['width']         = 280;
                    $config['height']       = 195;

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();
                    if ($this->image_lib->resize()) {
                        redirect('/video');
                    }
       }
       
    }

    public function delete_data($id)
    {
        $this->delete_file($id);
        $delete=$this->Admin_model->delete_data($id,$this->id(),$this->table());
        if($delete){
             redirect('video');
        }
    }

    public function edit_data($id)
    {
        $data['video']=$this->Admin_model->edit_data($id,$this->id(),$this->table());
        $this->load->view('design/header');
        $this->load->view('admin/video/videoEdit',$data);
        $this->load->view('design/footer');
    }

    public function update_data()
    {
         $id=$this->input->post('id');
        if($_FILES["image"]["name"]!="")
        {
        $exstImage=substr(strrchr($_FILES['image']['name'], '.'), 1);
        $data = array(
                    'judul_video'=> $this->input->post('judul_video'),
                    'embed' =>$this->input->post('embed'),
                    'url' => str_replace(' ','-',$this->input->post('judul_video')),
                    'image' => substr(strrchr($_FILES['image']['name'], '.'), 1)
         );
        $this->delete_file($id);
        $exstImageOld = $this->Admin_model->edit_data($id,$this->id(),$this->table());
        $config['file_name']    = $id;
        $config['upload_path']    = "./assets/file/video/";
        $config['allowed_types']  = 'gif|jpg|png|jpeg'; 
        $this->load->library('upload', $config);
      //  $this->upload->do_upload("image");
        if($this->upload->do_upload("image"))
       {
        $image_data = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/file/video/'.$id.'.'.$exstImageOld->image;
                    $config['create_thumb'] = TRUE;
                    $config['maintain_ratio'] = false;
                    $config['width']         = 280;
                    $config['height']       = 195;

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();

       }
    }
    else if(empty($_FILES["image"]["name"]))
    {
       $data = array(
                   'judul_video'=> $this->input->post('judul_video'),
                    'embed' =>$this->input->post('embed'),
                    'url' => str_replace(' ','-',$this->input->post('judul_video')),
         );  
    }
        $update_data=$this->Admin_model->update_data($id,$this->id(),$this->table(),$data);
        if($update_data)
        {
            redirect('/video');
        }
    }
}