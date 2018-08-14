<?php
 
Class Applicator extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->helper('sluq_helper');
        $this->load->model('admin_model');
        
        

    }
    public function table()
    {
        return 'tbl_applicator';
    }
    public function id()
    {
        return 'id_applicator';
    }
     public function delete_file($id)
    {
        $path= "./assets/file/applicator/";
        $exstImage = $this->Admin_model->edit_data($id,$this->id(),$this->table());
        $nm_gbr = $id.".".$exstImage->image;
        $nm_gbr_thumb = $id."_thumb.".$exstImage->image;
        $nm_gbr_mntnc = $id."1.".$exstImage->image;
        @unlink($path.$nm_gbr);
        @unlink($path.$nm_gbr_thumb);
        @unlink($path.$nm_gbr_mntnc);
        
    }
    function index() {
          if(!$this->session->userdata('id_log')){
                redirect('access123/login');
            }
        // instance object
       // $crud = new grocery_CRUD();
        // pilih tabel yang akan digunakan
       // $crud->set_table('tbl_lokasi');
        // custom field yang ingin ditampilkan
        //$crud->columns('desc','latitude','longitude');
        // simpan hasilnya kedalam variabel output
        $jumlah_data=$this->Admin_model->sum_data($this->table());  
                $this->load->library('pagination');
                $config['base_url'] = base_url().'/applicator/index';
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
    $data['lokasi']=$this->Admin_model->get_data($config['per_page'],$from,$this->table());   
        $this->load->view('design/header');
        $this->load->view('admin/applicator/applicator',$data);
        $this->load->view('design/footer');
        }
    public function dataAdd()
    {
        if(!$this->session->userdata('id_log')){
                redirect('access123/login');
            }
        $this->load->view('design/header');
        $this->load->view('admin/applicator/applicatorAdd');
        $this->load->view('design/footer');
    }

    function save_data(){

       $exstImage=substr(strrchr($_FILES['image']['name'], '.'), 1);
        $data = array('id_applicator' =>'',
                    'nama'=> $this->input->post('nama'),
                    'alamat' =>$this->input->post('alamat'),
                     'propinsi'=>$this->input->post('propinsi'),
                    'kota'=>$this->input->post('kota'),
                    'telpon'=>$this->input->post('telpon'),
                    'email'=>$this->input->post('email'),
                    'password'=>$this->input->post('password'),
                    'image' => substr(strrchr($_FILES['image']['name'], '.'), 1)
         );
        $inserLokasi = $this->Admin_model->insert($this->table(),$data);
        $config['file_name']    = $inserLokasi;
        $config['upload_path']    = "./assets/file/applicator/";
        $config['allowed_types']  = 'gif|jpg|png|jpeg'; 
        $this->load->library('upload', $config);
      //  $this->upload->do_upload("image");
       if($this->upload->do_upload("image"))
       {
        $image_data = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/file/applicator/'.$inserLokasi.'.'.$exstImage;
                    $config['create_thumb'] = TRUE;
                    $config['maintain_ratio'] = false;
                    $config['width']         = 280;
                    $config['height']       = 195;

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();
                    if ($this->image_lib->resize()) {
                        redirect('/applicator');
                    }
       }
       
        }

    public function delete_data($id)
    {
       if(!$this->session->userdata('id_log')){
                redirect('access123/login');
            }
        $this->delete_file($id);
        $delete=$this->Admin_model->delete_data($id,$this->id(),$this->table());
        if($delete){
             redirect('applicator');
        }
    }

    public function edit_data($id)
    {
        if(!$this->session->userdata('id_log')){
                redirect('access123/login');
            }
        $data['lokasi']=$this->Admin_model->edit_data($id,$this->id(),$this->table());
        $this->load->view('design/header');
        $this->load->view('admin/applicator/applicatorEdit',$data);
        $this->load->view('design/footer');
    }

    public function update_data()
    {
        if(!$this->session->userdata('id_log')){
                redirect('access123/login');
            }
        $id=$this->input->post('id');
        if($_FILES["image"]["name"]!="")
        {
        $exstImage=substr(strrchr($_FILES['image']['name'], '.'), 1);
        $data = array(
                    'nama'=> $this->input->post('nama'),
                    'alamat' =>$this->input->post('alamat'),
                     'propinsi'=>$this->input->post('propinsi'),
                    'kota'=>$this->input->post('kota'),
                    'telpon'=>$this->input->post('telpon'),
                    'email'=>$this->input->post('email'),
                    'password'=>$this->input->post('password'),
                    'image' => substr(strrchr($_FILES['image']['name'], '.'), 1)
         );
        $this->delete_file($id);
        $exstImageOld = $this->Admin_model->edit_data($id,$this->id(),$this->table());
        $config['file_name']    = $id;
        $config['upload_path']    = "./assets/file/applicator/";
        $config['allowed_types']  = 'gif|jpg|png|jpeg'; 
        $this->load->library('upload', $config);
      //  $this->upload->do_upload("image");
        if($this->upload->do_upload("image"))
       {
        $image_data = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/file/applicator/'.$id.'.'.$exstImageOld->image;
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
                    'nama'=> $this->input->post('nama'),
                    'alamat' =>$this->input->post('alamat'),
                     'propinsi'=>$this->input->post('propinsi'),
                    'kota'=>$this->input->post('kota'),
                    'telpon'=>$this->input->post('telpon'),
                    'email'=>$this->input->post('email'),
                    'password'=>$this->input->post('password')
         );  
    }
        $update_data=$this->Admin_model->update_data($id,$this->id(),$this->table(),$data);
        if($update_data)
        {
            redirect('/applicator');
        }
    }
    public function ajax_applicator($kota)
    {
        $applicator = $this->Admin_model->select_data_all('tbl_applicator','kota',$kota);
        foreach ($applicator as $key) {
            $ulasan = $this->Site_model->get_sum('tbl_review','kategori','applicator','id',$key->id_applicator);
            $data = "<div class='col-md-12'><div class='col-md-6 image-popup'> <img src='".base_url()."assets/img/applicator-image.png' class='img-responsive'><h3>".$key->nama."</h3><b>".$key->telpon."</b><br>";
            $data .= "<img src='".base_url()."assets/img/stars.png'> <img src='".base_url()."assets/img/stars.png'> <img src='".base_url()."assets/img/stars.png'> <small>".$ulasan." ulasan</small></div>";
             $reviews = $this->Admin_model->select_data_param('tbl_review','id',$key->id_applicator,'kategori','applicator');
                if(empty($reviews))
                {
                    $data .= "<div class='col-md-6 review-popup'> <br><br><center><p>Belum ada Ulasan</p></center></div></div>";
                } else {
                    $data .="<div class='col-md-6 review-popup'>";
                    foreach ($reviews as $review) {
                    $data .= "<div class='row'> <div class='col-md-3'><img src='".base_url()."assets/file/review/".$review->id_review.".".$review->image."' class='image-user-review'> <br><b>".$review->nama."</b></div><div class='col-md-9'><p>".$review->content."</p></div></div>";
                    //$data .= "<p>".$review->content."</p>";
                    //return $data;
                    }
                    $data .= "</div></div>";
                    
                }
            echo $data;

        }

    }
}