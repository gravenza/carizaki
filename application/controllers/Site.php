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
class Site extends CI_Controller{
    //put your code here
    
	public function __construct(){
        parent::__construct();
		
		$this->load->model('Admin_model');
		$this->load->model('Site_model');
       
    }	
    
    public function index() {        
        $this->load->view('site/index');
    }
    public function applicator()
    {
        $data['propinsi'] = $this->Site_model->get_propinsi();
        $data['event']=$this->Site_model->get_data_param_limit(3,0,'id_event','tbl_event');
        $data['tips_zaki']=$this->Site_model->get_data_param_limit_condition(3,0,'id_tzaki','tbl_tzaki','kategori','applicator');
        $data['produk']=$this->Site_model->get_data_param_limit(5,0,'id_produk','tbl_produk');
        $data['galery']=$this->Site_model->get_data_param_limit(3,0,'id_news_galery','tbl_news_galery');
        $data['lokasi']= $this->Site_model->get_data_desc('id_lokasi','tbl_lokasi');
        $this->load->view('site/applicator/header');
        $this->load->view('site/applicator/index',$data);
        $this->load->view('site/applicator/footer');
    }
    public function home_owner()
    {
        $data['lokasi']= $this->Site_model->get_data_desc('id_lokasi','tbl_lokasi');
        $data['applicator']= $this->Site_model->get_data_applicator('kota','tbl_applicator');
        $data['propinsi'] = $this->Site_model->get_propinsi();
        $data['galery']=$this->Site_model->get_data_param_limit(3,0,'id_news_galery','tbl_news_galery');
        $data['tips_zaki']=$this->Site_model->get_data_param_limit(3,0,'id_tzaki','tbl_tzaki','kategori','home_owner');
        $data['produk']=$this->Site_model->get_data_param_limit(5,0,'id_produk','tbl_produk');
        $data['video']=$this->Site_model->get_data_param_limit(3,0,'id_video','tbl_video');
        $this->load->view('site/home_owner/header');
        $this->load->view('site/home_owner/index',$data);
        $this->load->view('site/home_owner/footer');
    }
    public function tips_zaki($type,$url)
    {
        $data['propinsi'] = $this->Site_model->get_propinsi();
        $data['detail']=$this->Site_model->get_data_detail($url,'tbl_tzaki');
        $data['populer'] = $this->Site_model->get_data_param_limit(5,0,'view','tbl_tzaki');
        $data['related'] = $this->Site_model->get_data_related('id_tzaki',$url,'tbl_tzaki');
        $inform = $this->Site_model->get_row('url',$url,'tbl_tzaki');
        $view = $inform->view + 1;
        $data_view = array('view' => $view);
        $this->Admin_model->update_data($url,'url','tbl_tzaki',$data_view);
        $this->load->view('site/'.$type.'/header');
        $this->load->view('site/'.$type.'/detail',$data);
        $this->load->view('site/'.$type.'/footer');
    }
    public function sahabat_inspirasi_baja()
    {
        $data['propinsi'] = $this->Site_model->get_propinsi();
        $this->load->view('site/applicator/header');
        $this->load->view('site/applicator/sahabat_inspirasi_baja');
        $this->load->view('site/applicator/footer');
    }
    public function gabung()
    {
        $data['propinsi'] = $this->Site_model->get_propinsi();
      $this->load->view('site/applicator/header');
        $this->load->view('site/applicator/gabung');
        $this->load->view('site/applicator/footer');
    
    }
    public function event($url)
    {
        $data['propinsi'] = $this->Site_model->get_propinsi();
        $data['detail']=$this->Site_model->get_data_detail($url,'tbl_event');
        $data['populer'] = $this->Site_model->get_data_param_limit(5,0,'id_tzaki','tbl_tzaki');
        $this->load->view('site/applicator/header');
        $this->load->view('site/applicator/event',$data);
        $this->load->view('site/applicator/footer');
    }
    public function getkota($id)
        {

            $kota=$this->Site_model->get_kota($id);
            echo "<option value=''>Pilih Kota</option>";
            foreach ($kota as $kotaR) {
                echo "<option value='".$kotaR->lokasi_kabupatenkota."'&prop='".$id."''>".$kotaR->lokasi_nama."</option>";
            }
        }
    public function email_permintaan_produk_applicator($id)
    {
           
            $produk = $this->input->post('produk');
            $users = $this->Site_model->get_row('id_applicator',$id,'tbl_applicator');
            $htmlContent = 'Permintaan Produk<br>';
            $htmlContent .= 'berikut permintaan produk dari<br>';
            $htmlContent .= 'Nama : '.$users->nama.'<br>';
            $htmlContent .= 'Alamat : '.$users->alamat.'<br>';
            $htmlContent .= 'Email : '.$users->email.'<br>';
            $htmlContent .= 'Telepon : '.$users->telpon.'<br>';
            $htmlContent .= 'Produk yang diinginkan : '.$produk;
            $ci = get_instance();
                $ci->load->library('email');
                $config['protocol'] = "smtp";
                $config['smtp_host'] = "smtp.sendgrid.net";
                $config['smtp_port'] = "587";
                $config['smtp_user'] = "3motion";
                $config['smtp_pass'] = "oebidoe21990.com";
                $config['charset'] = "utf-8";
                $config['mailtype'] = "html";
                $config['newline'] = "\r\n";
                
                
                $ci->email->initialize($config);
         
                $ci->email->from('info@carizaki.com', 'Carizaki');
                
                $ci->email->to('contact.bluescopesteel@gmail.com');
                $ci->email->subject('Permintaan Produk');
                $ci->email->message($htmlContent);
              $this->email->send();
            //echo $produk;
    }
    public function email_permintaan_produk_homeowner($id)
    {
            //$id = $this->input->post('id');
            $produk = $this->input->post('produk');
            $users = $this->Site_model->get_row('id_homeowner',$id,'tbl_homeowner');
            $htmlContent = 'Permintaan Produk<br>';
            $htmlContent .= 'berikut permintaan produk dari<br>';
            $htmlContent .= 'Nama : '.$users->nama.'<br>';
            $htmlContent .= 'Alamat : '.$users->alamat.'<br>';
            $htmlContent .= 'Email : '.$users->email.'<br>';
            $htmlContent .= 'Telepon : '.$users->tlepon.'<br>';
            $htmlContent .= 'Produk yang diinginkan : '.$produk;
            $ci = get_instance();
                $ci->load->library('email');
                $config['protocol'] = "smtp";
                $config['smtp_host'] = "smtp.sendgrid.net";
                $config['smtp_port'] = "587";
                $config['smtp_user'] = "3motion";
                $config['smtp_pass'] = "oebidoe21990.com";
                $config['charset'] = "utf-8";
                $config['mailtype'] = "html";
                $config['newline'] = "\r\n";
                
                
                $ci->email->initialize($config);
         
                $ci->email->from('info@carizaki.com', 'Carizaki');
                
                $ci->email->to('contact.bluescopesteel@gmail.com');
                $ci->email->subject('Permintaan Produk');
                $ci->email->message($htmlContent);
                $this->email->send();
    }
    public function kebijakan_privasi($type)
    {
        $data['privasi'] =  $this->Site_model->get_row('id_informasi',2,'tbl_informasi');
        $this->load->view('site/'.$type.'/header');
        $this->load->view('site/informasi_'.$type.'',$data);
        $this->load->view('site/'.$type.'/footer');
    }
    public function syarat_dan_ketentuan($type)
    {
        $data['privasi'] =  $this->Site_model->get_row('id_informasi',4,'tbl_informasi');
        $this->load->view('site/'.$type.'/header');
        $this->load->view('site/informasi_'.$type.'',$data);
        $this->load->view('site/'.$type.'/footer');
    }
    public function hubungi_kami($type)
    {
       // $data['privasi'] =  $this->Site_model->get_row('id_informasi',4,'tbl_informasi');
        $this->load->view('site/'.$type.'/header');
        $this->load->view('site/hubungi_kami_'.$type.'');
        $this->load->view('site/'.$type.'/footer');
    }
    public function getvideo($id)
    {
        $result = $this->Site_model->get_row('id_video',$id,'tbl_video');
        echo $result->embed;
    }
    public function ajax_produk($no,$field)
    {
        $isi = $this->Site_model->get_row('id_produk',$no,'tbl_produk');
        echo $isi->$field;
    }
    public function lupa_password_applicator(){
        $email = $this->input->post('email');
		$cek = $this->Admin_model->sum_data_param('email',$email,'tbl_applicator');
        if($cek == 0){
            echo 0;
        }else if($cek > 0) {
            $encrypted_id = md5($email);
           
            $htmlContent = 'Silahkan klik link berikut untuk melakukan reset password '.base_url("site/reset_password_applicator/$encrypted_id");

            $this->load->library('email');

            $this->email->from('info@carizaki.com', 'Carizaki');
            $this->email->to($email); 

            $this->email->subject('Reset Password');
            $this->email->message($htmlContent);

            $this->email->send();
            echo 1;
        }
       // }
    }
     public function lupa_password_homeowner()
    {
       $email = $this->input->post('email');
       $cek = $this->db->where('email',$email)->get('tbl_homeowner')->num_rows();
        if($cek == 0){
            echo 0;
        } else if($cek > 0) {
            $encrypted_id = md5($email);
           
            $htmlContent = 'Silahkan klik link berikut untuk melakukan reset password '.base_url("site/reset_password_homeowner/$encrypted_id");

            $this->load->library('email');

            $this->email->from('info@carizaki.com', 'Carizaki');
            $this->email->to($email); 

            $this->email->subject('Reset Password');
            $this->email->message($htmlContent);

            $this->email->send();
            echo 1;
        }
       // }
    }
	
    public function reset_password_applicator($email)
    {
        $type = 'applicator';
        $password = $this->random();
        $data = array ('password' => $this->hash_password($password));
        $update = $this->Site_model->reset($type,$data,$email);
        if($update)
        {
             $htmlContent = 'Password Anda telah di reset . Gunakan '.$password.' untuk melakukan login';

            $this->load->library('email');

            $this->email->from('support@carizaki.com', 'Carizaki');
            $this->email->to($update); 

            $this->email->subject('Reset Password');
            $this->email->message($htmlContent);

            if($this->email->send())
            {
               print "<script type=\"text/javascript\">alert('Password Anda berhasil di reset. Mohon periksa email Anda.');window.location = '/site/applicator';</script>";
            }
        }

    }
     public function reset_password_homeowner($email)
    {
        $type = 'homeowner';
        $password = $this->random();
        $data = array ('password' => $this->hash_password($password));
        $update = $this->Site_model->reset($type,$data,$email);
        if($update)
        {
             $htmlContent = 'Password Anda telah di reset . Gunakan '.$password.' untuk melakukan login';

            $this->load->library('email');

            $this->email->from('support@carizaki.com', 'Carizaki');
            $this->email->to($update); 

            $this->email->subject('Reset Password');
            $this->email->message($htmlContent);

            if($this->email->send())
            {
               print "<script type=\"text/javascript\">alert('Password Anda berhasil di reset. Mohon periksa email Anda.');window.location = '/demo/homeowner';</script>";
            }
        }
    }
    public function send_mail_hubungi_kami($url)
    {
        $nama = $this->input->post('nama-hubungi-kami');
        $tipe_pertanyaan = $this->input->post('tipe-pertanyaan');
        $deskripsi_pertanyaan = $this->input->post('pertanyaan');
        $email = $this->input->post('email-hubungi-kami');
        $nomor_kontak = $this->input->post('kontak');
        $posisi_pekerjaan = $this->input->post('posisi-pekerjaan');
        $perusahaan = $this->input->post('perusahaan');
        if(!$nama || !$tipe_pertanyaan || !$deskripsi_pertanyaan || !$email || !$nomor_kontak || !$posisi_pekerjaan || !$perusahaan)
        {
            print "<script type=\"text/javascript\">alert('Mohon Lengkapi data.');window.location = '/".$url."/hubungi-kami';</script>";
        } else {
            $htmlContent = 'Hubungi Kami<br>';
            $htmlContent .= 'Berikut informasi dari : <br>';
            $htmlContent .= 'Nama : '.$nama.'<br>';
            $htmlContent .= 'Tipe Pertanyaan : '.$tipe_pertanyaan.'<br>';
            $htmlContent .= 'Deskripsi Pertanyaan : '.$deskripsi_pertanyaan.'<br>';
            $htmlContent .= 'Email : '.$email.'<br>';
            $htmlContent .= 'Nomor Kontak : '.$nomor_kontak.'<br>';
            $htmlContent .= 'Posisi pekerjaan : '.$posisi_pekerjaan.'<br>';
            $htmlContent .= 'Perusahaan : '.$perusahaan;
            $ci = get_instance();
                $ci->load->library('email');
                $config['protocol'] = "smtp";
                $config['smtp_host'] = "smtp.sendgrid.net";
                $config['smtp_port'] = "587";
                $config['smtp_user'] = "3motion";
                $config['smtp_pass'] = "oebidoe21990.com";
                $config['charset'] = "utf-8";
                $config['mailtype'] = "html";
                $config['newline'] = "\r\n";
                
                
                $ci->email->initialize($config);
         
                $ci->email->from('info@carizaki.com', 'Carizaki');
                
                $ci->email->to('contact.bluescopesteel@gmail.com');
                $ci->email->subject('Hubungi Kami');
                $ci->email->message($htmlContent);
                if ($this->email->send())
                {
                     print "<script type=\"text/javascript\">alert('Terimakasih telah menghubungi kami. Informasi Anda akan segera kami proses.');window.location = '/site/hubungi-kami/".$url."';</script>";
                }
        }

    }
    function random()  
         {  
          $karakter = 'abcdefghijklmnopqrstuvwxyz1234567890';  
          $string = '';  
          for($i = 0; $i < 8; $i++) {  
           $pos = rand(0, strlen($karakter)-1);  
           $string .= $karakter{$pos};  
          }  
          return $string;  
         } 
     public function tes_email()
    {
           
        
                $encrypted_id = md5(1);
                $htmlContent = 'Terimakasih telah mendaftar di carizaki<br>';
                $htmlContent .= 'Silahkan melakukan aktivasi dengan klik link berikut'.base_url("members/verification/applicator/$encrypted_id");
                
                $this->load->library('email');
                $config['charset'] = "utf-8";
                $config['mailtype'] = "html";
                $config['newline'] = "\r\n";
                $this->email->from('info@carizaki.com', 'Carizaki');
                $this->email->to('sazuke.somepunk211@gmail.com'); 

                $this->email->subject('Carizaki Aktivasi');
                $this->email->message($htmlContent);
        if ($this->email->send()) {
          echo 'berhasil';
        } else {
            show_error($this->email->print_debugger());
        }
            
    }
     private function hash_password($password) {
        
        return password_hash($password, PASSWORD_BCRYPT);
        
    }
}
