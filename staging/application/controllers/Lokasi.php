<?php
 
Class Lokasi extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->helper('sluq_helper');
        $this->load->model('admin_model');
        

    }
    public function table()
    {
        return 'tbl_lokasi';
    }
    public function id()
    {
        return 'id_lokasi';
    }
    public function delete_file($id)
    {
        $path= "./assets/file/lokasi/";
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
                $config['base_url'] = base_url().'/lokasi/index';
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
        $this->load->view('admin/lokasi/lokasi',$data);
        $this->load->view('design/footer');
        }
    public function dataAdd()
    {
         if(!$this->session->userdata('id_log')){
                redirect('access123/login');
            }
        $this->load->view('design/header');
        $this->load->view('admin/lokasi/lokasiAdd');
        $this->load->view('design/footer');
    }

    function save_data(){
        $exstImage=substr(strrchr($_FILES['image']['name'], '.'), 1);
        $data = array('id_lokasi' =>'',
                    'desc'=> $this->input->post('desc'),
                     'propinsi'=>$this->input->post('propinsi'),
                    'kota'=>$this->input->post('kota'),
                    'alamat'=>$this->input->post('alamat'),
                    'telpon'=>$this->input->post('telpon'),
                    'whatsapp'=>$this->input->post('whatsapp'),
                    'image' => substr(strrchr($_FILES['image']['name'], '.'), 1)
         );
        $inserLokasi = $this->Admin_model->insert($this->table(),$data);
        $config['file_name']    = $inserLokasi;
        $config['upload_path']    = "./assets/file/lokasi/";
        $config['allowed_types']  = 'gif|jpg|png|jpeg'; 
        $this->load->library('upload', $config);
    //    $this->upload->do_upload("image");
       if($this->upload->do_upload("image"))
       {
        $image_data = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/file/lokasi/'.$inserLokasi.'.'.$exstImage;
                    $config['create_thumb'] = TRUE;
                    $config['maintain_ratio'] = false;
                    $config['width']         = 280;
                    $config['height']       = 195;

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();
                    if ($this->image_lib->resize()) {
                        redirect('/lokasi');
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
             redirect('lokasi');
        }
    }

    public function edit_data($id)
    {
         if(!$this->session->userdata('id_log')){
                redirect('access123/login');
            }
        $data['lokasi']=$this->Admin_model->edit_data($id,$this->id(),$this->table());
        $this->load->view('design/header');
        $this->load->view('admin/lokasi/lokasiEdit',$data);
        $this->load->view('design/footer');
    }

    public function update_data()
    {
        $id=$this->input->post('id');
        if($_FILES["image"]["name"]!="")
        {
        $exstImage=substr(strrchr($_FILES['image']['name'], '.'), 1);
        $data = array(
                    'desc'=> $this->input->post('desc'),
                     'propinsi'=>$this->input->post('propinsi'),
                    'kota'=>$this->input->post('kota'),
                    'alamat'=>$this->input->post('alamat'),
                    'telpon'=>$this->input->post('telpon'),
                    'whatsapp'=>$this->input->post('whatsapp'),
                    'image' => substr(strrchr($_FILES['image']['name'], '.'), 1)
         );
        $this->delete_file($id);
        $exstImageOld = $this->Admin_model->edit_data($id,$this->id(),$this->table());
        $config['file_name']    = $id;
        $config['upload_path']    = "./assets/file/lokasi/";
        $config['allowed_types']  = 'gif|jpg|png|jpeg'; 
        $this->load->library('upload', $config);
      //  $this->upload->do_upload("image");
        if($this->upload->do_upload("image"))
       {
        $image_data = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/file/lokasi/'.$id.'.'.$exstImageOld->image;
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
                   'desc'=> $this->input->post('desc'),
                     'propinsi'=>$this->input->post('propinsi'),
                    'kota'=>$this->input->post('kota'),
                    'alamat'=>$this->input->post('alamat'),
                    'telpon'=>$this->input->post('telpon'),
                    'whatsapp'=>$this->input->post('whatsapp')
         );  
    }
        $update_data=$this->Admin_model->update_data($id,$this->id(),$this->table(),$data);
        if($update_data)
        {
            redirect('/lokasi');
        }
    }
    public function ajax_lokasi($no)
    {
        $lokasi = $this->Admin_model->select_data('tbl_lokasi','id_lokasi',$no);
        $ulasan = $this->Site_model->get_sum('tbl_review','kategori','lokasi','id',$lokasi->id_lokasi);
        $data = "<img src='".base_url()."assets/file/lokasi/".$lokasi->id_lokasi.".".$lokasi->image."' class='img-responsive'>";
        $data .= "<h4>".$lokasi->desc."</h4>";
        // $data .= "<img src='".base_url()."assets/img/stars.png'> <img src='".base_url()."assets/img/stars.png'> <img src='".base_url()."assets/img/stars.png'> <small>".$ulasan." ulasan</small>";
        $data .="<h5>Info Toko</h5>";
        $data .="<table><tr> <td>Alamat </td><td> : </td><td> ".$lokasi->alamat."</td></tr><tr> <td>Telepon </td><td> : </td><td> ".$lokasi->telpon."</td></tr><tr> <td>Email </td><td> : </td><td> ".$lokasi->whatsapp."</td></tr></table>";
        echo $data;
    }
    public function ajax_review($no)
    {
        $reviews = $this->Admin_model->select_data_param('tbl_review','id',$no,'kategori','lokasi');
        if(empty($reviews))
        {
            echo "<br><br><center>Belum ada Ulasan</center>";
        } else {
            foreach ($reviews as $review) {
            $data = "<table><tr><td width=30%><img src='".base_url()."assets/file/review/".$review->id_review.".".$review->image."' class='image-user-review'> <br><small>".$review->nama."</small></td>";
            $data .= "<td><small>".$review->content."</small></td></tr></table>";
            //return $data;
            }
            echo $data;
        }
    }
}