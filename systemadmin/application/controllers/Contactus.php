<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Contactus  extends MX_Controller {

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
        $this->load->library('pagination');


        // Site
        $site = $this->config->item('site');
        $this->title = $site['title'];
        $this->logo = $site['logo'];

        // Template
        $template = $this->config->item('template');
        $this->admin_template = $template['backend_template'];
        $this->front_template = $template['front_template'];
        $this->auth_template = $template['auth_template'];
        $this->plugkreasi_home_template = $template['plugkreasi_home_template'];

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


        $this->load->model("M_news");

        $this->load->helper('captcha');
    }
	
	function index()
	{
		
		$data['cap_img'] = $this -> _make_captcha();
		$data['cap_msg'] = "";


		$data['date']  			='';
		$data['name']			='';
		$data['alamat']			='';
		$data['kota']			='';
		$data['no_telp']		='';
		$data['email']			='';
		$data['pelanggan']		='';

		$data['no_kontrak']		='';
		$data['topik']			='';
		$data['sub_topik']		='';
		$data['judul_topik']	='';
		$data['pesan']			='';



		$this->load->view('contactus',$data);
	}
	
	function send()
	{	
		$date  			=date('Y-m-d');
		$name			=$_POST['name'];
		$alamat			=$_POST['alamat'];
		$kota			=$_POST['kota'];
		$no_telp		=$_POST['no_telp'];
		$email			=$_POST['email'];
		$pelanggan		=$_POST['pelanggan'];

		//$no_kontrak		=$_POST['no_kontrak'];
		$topik			=$_POST['topik'];
		//$sub_topik		=$_POST['sub_topik'];
		$sub_topik		='';
		$judul_topik	=$_POST['judul_topik'];
		$pesan			=$_POST['pesan'];


		$captcha = $this->input->post('captcha',TRUE);
		if ( $this -> _check_capthca($captcha) ) 
		{
			$insert = $this->db->query("insert into sketsa_contactsfifgroup(date,name,alamat,kota,no_telp,email,pelanggan,topik,sub_topik,judul_topik,pesan)
			 values('$date','$name','$alamat','$kota','$no_telp','$email','$pelanggan','$topik','$sub_topik','$judul_topik','$pesan')");
			if($insert)
			{
				$captcha_result = 'Contact Us CSR Succeed';
				$text = "Name : " . $name . "<br>";
				$text .= "Address : " . $alamat . "<br>";
				//$text .= "Phone : " . $phone . "<br>";
				//$text .= "E-mail : " . $email . "<br>";
				//$text .= "Comment :  <br>";
				$text .= $pesan;
				
				$this->load->library('PHPMailerAutoload');
		
				$mail = new phpmailer();
				# Principal settings
							
				$mail->IsSMTP();
				$mail->Host     = "mail.fifgroup.co.id";
				$mail->SMTPAuth = true;     // turn on SMTP authentication
				$mail->Username = "fifgroupsend@fifgroup.astra.co.id";  // SMTP username
             				 $mail->Password = "1o1_5End!"; // SMTP password
							
							
				$mail->From     = $email;
				$mail->FromName = $name;
				//$mail->AddAddress("lix_factor@yahoo.com","Felix Wijoyo");
				//$mail->AddAddress("lady_belle@ymail.com","Emmy");
				$mail->AddAddress("yudi@sketsa.net","Yudi");
				$mail->AddBCC("hey_abud@yahoo.com","Arief");
											
				$mail->IsHTML(true); // send as HTML
				# Embed images
				//$mail->AddEmbeddedImage('img/mailings/logo.gif', "logo_header");
							
				$mail->Subject = 'Contact to CSR';
				//$mail->Body = $this->load->view('email/mailing_view','',TRUE);
				$mail->Body       = $text;
				//$mail->AltBody = "This is the text-only body";
							
				if(!$mail->Send())
				{
					echo "Message was not sent <br>";
					echo "Mailer Error: " . $mail->ErrorInfo;
					exit;
				}
				else {
					echo "<script language='javascript'>alert('Thank you for your attention');</script>";
					?><meta http-equiv='refresh' content='0;URL=<?php echo site_url('contactus'); ?>'><?php
				}				
			}
		}
		else 
		{
			$captcha_result = 'Security Code Invalid';
		}
		
		$data['date']  			=date('Y-m-d');
		$data['name']			=$_POST['name'];
		$data['alamat']			=$_POST['alamat'];
		$data['kota']			=$_POST['kota'];
		$data['no_telp']		=$_POST['no_telp'];
		$data['email']			=$_POST['email'];
		$data['pelanggan']		=$_POST['pelanggan'];

		$data['no_kontrak']		=$_POST['no_kontrak'];
		$data['topik']			=$_POST['topik'];
		$data['sub_topik']		=$_POST['sub_topik'];
		$data['judul_topik']	=$_POST['judul_topik'];
		$data['pesan']			=$_POST['pesan'];


		$data['cap_msg'] = $captcha_result;
		$data['cap_img'] = $this -> _make_captcha();
		$this->load->view('contactus',$data);
	}
	
	function _make_captcha()
	  {
	    //$this -> load -> plugin( 'captcha' );
	    $vals = array(
	      'img_path' => './captcha/', // PATH for captcha ( *Must mkdir (htdocs)/captcha )
	      'img_url' => base_url() . 'captcha/', // URL for captcha img
	      'img_width' => 160, // width
	      'img_height' => 30, // height
	      'font_path'     => './system/fonts/comic.ttf',
	      'expiration' => 3600 ,
	      );
	    // Create captcha
	    $cap = create_captcha( $vals );
	    // Write to DB
	    if ( $cap ) {
	      $data = array(
	        //'captcha_id' => '',
	        'captcha_time' => $cap['time'],
	        'ip_address' => $this -> input -> ip_address(),
	        'word' => $cap['word'] ,
	        );
	      $query = $this -> db -> insert_string( 'captcha', $data );
	      $this -> db -> query( $query );
	    }else {
	      return "Umm captcha not work" ;
	    }
	    return $cap['image'] ;
	  }
	 
	  function _check_capthca()
	  {
	    // Delete old data ( 2hours)
	    $expiration = time()-3600 ;
	    $sql = " DELETE FROM captcha WHERE captcha_time < ? ";
	    $binds = array($expiration);
	    $query = $this->db->query($sql, $binds);
	 
	    //checking input
	    $sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
	    $binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
	    $query = $this->db->query($sql, $binds);
	    $row = $query->row();
	 
	  if ( $row -> count > 0 )
	    {
	      return true;
	    }
	    return false;
	 
	  }
}
?>