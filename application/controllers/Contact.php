<?php
class Contact extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('contact_model');
	}
	
	public function index(){
		$this->load->view('contact-us');
	}
	
	public function sendmessage(){
		
		$name 		= $this->input->post('name',true);
		$email 		= $this->input->post('email',true);
		$phone 		= $this->input->post('phone',true);
		$subject 	= $this->input->post('subject',true);
		$message	= $this->input->post('message',true);
		
		$url		= $this->input->post('url',true);
		
		$data = array(
		'name' => $name,
		'email' => $email,
		'phone' => $phone,
		'subject' => $subject,
		'message' => $message,
		'type' => $url
		);
		
		$insert = $this->db->insert('contact',$data);
		
		if($insert){
			$htmlContent = "Nama: ".$name."<br />";
			$htmlContent .= "Type: ".$url."<br />";
			$htmlContent .= "Telp: ".$phone."<br />";
			$htmlContent .= "Pesan: ".$message;

			$this->load->library('email');
			$config['charset'] = "utf-8";
		    $config['mailtype'] = "html";
		    $config['newline'] = "\r\n";
			
			$this->email->initialize($config);
			
			$this->email->from($email, $name);
			$this->email->to('andre.jatmika@bluescope.com');
			$this->email->bcc('toniewibowo@gmail.com,khadad@3motion.co,uci@3motion.co');	

			$this->email->subject($subject);
			$this->email->message($htmlContent);

			if($this->email->send()){
				echo '<script language="javascript">';
				echo 'alert("Thank You, message successfully sent")';
				echo '</script>';
				
				$yourURL= base_url().$url;
				echo ("<script>location.href='$yourURL'</script>");
			}
		}
		
	}
	
	
}