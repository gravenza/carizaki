<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller {

	/**
	 * author : wahyu nugroho
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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function registrasi_applicator()
	{
		$data = array(
			'id_applicator' => '',
		'nama' => $this->input->post('nama'),
		'telpon' => $this->input->post('telepon'),
		'email' => $this->input->post('email'),
		'alamat' => $this->input->post('alamat'),
		'propinsi' => $this->input->post('provinsi'),
		'kota' => $this->input->post('kota'),
		'type' => 1,
		'image' => '',
		'password' => $this->hash_password($this->input->post('password')),
		'status' => 0
		);
		$cek = $this->Admin_model->sum_data_param('email',$this->input->post('email'),'tbl_applicator');
		if($cek > 0)
		{
			echo 0;
		} else {
		$insert = $this->Admin_model->insert('tbl_applicator',$data);
			if($insert){
				/*$this->session->set_userdata('id',$insert);
				$this->session->set_userdata('nama',$this->input->post('nama'));
				$this->session->set_userdata('email',$this->input->post('email'));
				$this->session->set_userdata('type','applicator');
				$this->session->set_userdata('propinsi',$this->input->post('propinsi'));
				echo $insert;*/
				$email= $this->input->post('email');
				$encrypted_id = md5($insert);
				$htmlContent = 'Terimakasih telah mendaftar di carizaki.';
				$htmlContent .= 'Silahkan melakukan aktivasi dengan klik link berikut '.base_url("members/verification/applicator/$encrypted_id");

				$this->load->library('email');
				$config['charset'] = "utf-8";
		        $config['mailtype'] = "html";
		        $config['newline'] = "\r\n";
				$this->email->from('info@carizaki.com', 'Carizaki');
				$this->email->to($email); 

				$this->email->subject('Carizaki Aktivasi');
				$this->email->message($htmlContent);

				if($this->email->send())
				{
					echo $insert;
				}
			}
		}
	
	}
		function login_applicator()
		{
			$email = $this->input->post('email-login');
			$password = $this->input->post('password-login');
			if($this->Site_model->resolve_user_login($email, $password, 'tbl_applicator'))
			{
				$getSess = $this->Site_model->getSess($email,'tbl_applicator');
				$this->session->set_userdata('id',$getSess->id_applicator);
				$this->session->set_userdata('nama',$getSess->nama);
				$this->session->set_userdata('email',$email);
				$this->session->set_userdata('type',$getSess->type);
				$this->session->set_userdata('user','applicator');
				$this->session->set_userdata('propinsi',$getSess->propinsi);

				echo $getSess->id_applicator;
			}
			else
			{
				echo 0 ;
			}
	
		}

	public function registrasi_homeowner()
	{
		$data = array(
			'id_homeowner' => '',
		'nama' => $this->input->post('nama'),
		'telpon' => $this->input->post('telepon'),
		'email' => $this->input->post('email'),
		'alamat' => $this->input->post('alamat'),
		'propinsi' => $this->input->post('provinsi'),
		'kota' => $this->input->post('kota'),
		'image' => '',
		'password' => $this->hash_password($this->input->post('password')),
		'status' => 0
		);
		$cek = $this->Admin_model->sum_data_param('email',$this->input->post('email'),'tbl_homeowner');
		if($cek > 0)
		{
			echo 0;
		} else {
		$insert = $this->Admin_model->insert('tbl_homeowner',$data);
		if($insert){
			/*$this->session->set_userdata('id',$insert);
			$this->session->set_userdata('nama',$this->input->post('nama'));
			$this->session->set_userdata('email',$this->input->post('email'));
			$this->session->set_userdata('type','homeowner');
			$this->session->set_userdata('propinsi',$this->input->post('propinsi'));
			echo $insert;*/
			$email= $this->input->post('email');
			$encrypted_id = md5($insert);
				$htmlContent = 'Terimakasih telah mendaftar di carizaki. ';
				$htmlContent .= 'Silahkan melakukan aktivasi dengan klik link berikut '.base_url("members/verification/homeowner/$encrypted_id");

				$this->load->library('email');
				$config['charset'] = "utf-8";
		        $config['mailtype'] = "html";
		        $config['newline'] = "\r\n";
				$this->email->from('info@carizaki.com', 'Carizaki');
				$this->email->to($email); 

				$this->email->subject('Carizaki Aktivasi');
				$this->email->message($htmlContent);

				//$this->email->send();
				if($this->email->send())
				{
					echo $insert;
				}
		}
		}

	}
	public function applicator()
    {
    	 $jumlah_data=$this->Admin_model->sum_data_param('type',1,'tbl_applicator');  
                $this->load->library('pagination');
                $config['base_url'] = base_url().'members/applicator/';
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
        $data['member']=$this->Admin_model->applicator($config['per_page'],$from,'tbl_applicator.type',1);  
     
        $this->load->view('design/header');
        $this->load->view('admin/members/applicator',$data);
        $this->load->view('design/footer');
    }
    public function homeowner()
    {
             
         $jumlah_data=$this->Admin_model->sum_data('tbl_homeowner');  
                $this->load->library('pagination');
                $config['base_url'] = base_url().'members/homeowner/';
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
               
       $data['member']=$this->Admin_model->homeowner($config['per_page'],$from,'tbl_homeowner'); 
        $this->load->view('design/header');
        $this->load->view('admin/members/homeowner',$data);
        $this->load->view('design/footer');
    }

		function login_homeowner()
		{
			$email = $this->input->post('email-login');
			$password = $this->input->post('password-login');
			if($this->Site_model->resolve_user_login($email, $password, 'tbl_homeowner'))
			{
				$getSess = $this->Site_model->getSess($email,'tbl_homeowner');
				$this->session->set_userdata('id',$getSess->id_homeowner);
				$this->session->set_userdata('nama',$getSess->nama);
				$this->session->set_userdata('email',$email);
				$this->session->set_userdata('type','homeowner');
				$this->session->set_userdata('user','homeowner');
				$this->session->set_userdata('propinsi',$getSess->propinsi);

				echo $getSess->id_homeowner;
			}
			else
			{
				echo 0 ;
			}
	
		}
	public function printpdf(){
		$this->load->library('dompdf_gen');
        $data['title'] = 'Member Applicator pdf'; 
        $data['members'] = $this->Admin_model->applicatorprint('tbl_applicator.type',1);
        $this->load->view('admin/members/applicatorpdf',$data);
 
        $paper_size  = 'A4'; //paper size
        $orientation = 'potrait'; //tipe format kertas
        $html = $this->output->get_output();
 
        $this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan.pdf", array('Attachment'=>0));
    }
    public function printpdfhomeowner(){
    	$this->load->library('dompdf_gen');
        $data['title'] = 'Member Homeowner pdf'; 
        $data['members'] = $this->Admin_model->homeownerprint();
        $this->load->view('admin/members/homeownerpdf',$data);
 
        $paper_size  = 'A4'; //paper size
        $orientation = 'potrait'; //tipe format kertas
        $html = $this->output->get_output();
 
        $this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan.pdf", array('Attachment'=>0));
    }
	public function logout()
	{
		$this->load->library('session');
		$this->session->set_userdata('id', FALSE);
		$this->session->sess_destroy();
    	redirect('/site');
	}


	
	private function hash_password($password) {
		
		return password_hash($password, PASSWORD_BCRYPT);
		
	}
	public function verification($type,$key)
	{
		
		$data = array('status'=>1);
		$update = $this->Site_model->verification($key,$type,$data);
		if($update)
		{
			redirect('/');
		}
	
	}
		
            
	
}
