<?php

class Payment extends CI_Controller{

	public function __construct(){
		parent::__construct();
		
		date_default_timezone_set("Asia/Jakarta");
		
		$this->load->library(array('w_cart','PHPMailerAutoload.php'));
		$this->load->helper(array('cookie','form','string'));
	}

	public function index(){
		
		if($this->session->userdata('logged_in')){
			$data['cus'] = $this->db->where('customer_id',$this->session->userdata('c_id'))->get('customer')->row();
			$data['kel'] = $this->db->where('id_kelurahan',$data['cus']->id_kelurahan)->get('kelurahan')->row_array();
			$data['kec'] = $this->db->where('id_kecamatan',$data['cus']->id_kecamatan)->get('kecamatan')->row_array();
			$data['kab'] = $this->db->where('id_kabupaten',$data['cus']->id_kabupaten)->get('kabupaten')->row_array();
			$data['pro'] = $this->db->where('id_provinsi',$data['cus']->id_provinsi)->get('provinsi')->row_array();
			
			$this->load->view('payment',$data);	
		}else{
			redirect('home');
		}
		
	}
	
	public function dopayment(){
		
		if($this->session->userdata('logged_in')){
			
			//BUAT INVOICE
			
			$latevoice = $this->db->select_max('invoice')->get('orders')->row();
			$getNum = $latevoice->invoice + 1;
			$getSeries = strtoupper(random_string('alpha',4));
			
			$invoice = array(
			'customer_id' => $this->session->userdata('c_id'),
			'order_date' => date('Y-m-d'),
			'order_time' => date('H:i:s'),
			'invoice' => $getNum,
			'series' => $getSeries,
			'kurir' => $this->input->post('kurir')
			);
			
			$buatinvoice = $this->db->insert('orders',$invoice);
			
			if($buatinvoice){
				
				//PINDAHKAN PRODUCT DARI CART
				
				$ord = $this->db->select_max('order_id')->get('orders')->row();
				
				$cart = $this->db->where('customer_id',$this->session->userdata('c_id'))->get('cart');
				
				foreach($cart->result() as $row){
					$datacart = array(
					'order_id' => $ord->order_id,
					'customer_id' => $row->customer_id,
					'product_id' => $row->product_id,
					'product_name' => $row->product_name,
					'price' => $row->price,
					'picture' => $row->picture,
					'sid' => $row->sid,
					'picture' => $row->picture,
					'qty' => $row->qty
					);
					
					$this->db->insert('order_list',$datacart);
				}
				
				
				
				$this->db->where('customer_id',$this->session->userdata('c_id'));
				$this->db->delete('cart');
			}
			
			$domail = $this->mailinvoice();
			
			//$invonum = $ord->invoice . $ord->series;
			
			//echo $invonum;
			
			redirect('payment/invoices?rel=MN'.$getNum.$getSeries);	
		
				
		}else{
			redirect('home');
		}
		
	}
	
	public function invoices(){
		
		if($this->session->userdata('logged_in')){
			
			if(isset($_GET['rel'])){
				
				$invoice_no = substr($_GET['rel'],2,5);
				
				$data['order'] = $this->db->where('invoice',$invoice_no)->get('orders')->row();
				$data['listItem'] = $this->db->where('order_id',$data['order']->order_id)->get('order_list');
				
				$cs = $this->db->where('customer_id', $this->session->userdata('c_id'))->get('customer')->row_array();
				$kec = $this->db->where('id_kecamatan',$cs['id_kecamatan'])->get('kecamatan')->row_array();
				$kab = $this->db->where('id_kabupaten',$cs['id_kabupaten'])->get('kabupaten')->row_array();
				$ongkir = $this->db->select("".$data['order']->kurir." as ongkir")->like('kota',$kab['nama_kabupaten'])->like('kecamatan',$kec['nama_kecamatan'])->get('jne')->row_array();
				$data['ongkir'] = $ongkir['ongkir'];				
			
				$this->load->view('invoices',$data);
			}
			
			
				
		}else{
			redirect('home');
		}
		
	}
	
	function mailinvoice(){
		
		$cs = $this->db->where('customer_id', $this->session->userdata('c_id'))->get('customer')->row_array();
		$ord = $this->db->where('customer_id',$this->session->userdata('c_id'))->order_by('order_id','desc')->get('orders')->row_array();
		
		$subject = 'MN-'.$ord['invoice'].$ord['series'];
		
		$mail = new phpmailer();
				# Principal settings
							
				$mail->IsSMTP();
				$mail->Host     = "tridadi.idwebhost.com";
				$mail->SMTPAuth = true;     // turn on SMTP authentication
				$mail->Username = "tonny@gravenza.com";  // SMTP username
             	$mail->Password = "gravenza2015"; // SMTP password
							
							
				$mail->From     = 'tonny@gravenza.com';
				$mail->FromName = 'gravenza';
				
				$mail->AddAddress("toniewibowo@gmail.com","Toni");
				//$mail->AddBCC("hey_abud@yahoo.com","Arief");
											
				$mail->IsHTML(true); // send as HTML
				# Embed images
				//$mail->AddEmbeddedImage('img/mailings/logo.gif', "logo_header");
							
				$mail->Subject = 'INVOICE '.$subject;
				//$mail->Body = $this->load->view('email/mailing_view','',TRUE);
				$mail->Body       = $this->bodymail();
				//$mail->AltBody = "This is the text-only body";
							
				if(!$mail->Send()){
					echo "Message was not sent <br>";
					echo "Mailer Error: " . $mail->ErrorInfo;
					exit;
				}
				
	}
	
	function bodymail(){
		
		
		
		$message = "

<!doctype html>
<html xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'>
	<head>
		<!-- NAME: 1 COLUMN -->
		<!--[if gte mso 15]>
		<xml>
			<o:OfficeDocumentSettings>
			<o:AllowPNG/>
			<o:PixelsPerInch>96</o:PixelsPerInch>
			</o:OfficeDocumentSettings>
		</xml>
		<![endif]-->
		<meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
		
        
    <style type='text/css'>
		p{
			margin:10px 0;
			padding:0;
		}
		table{
			border-collapse:collapse;
		}
		h1,h2,h3,h4,h5,h6{
			display:block;
			margin:0;
			padding:0;
		}
		img,a img{
			border:0;
			height:auto;
			outline:none;
			text-decoration:none;
		}
		body,#bodyTable,#bodyCell{
			height:100%;
			margin:0;
			padding:0;
			width:100%;
		}
		.mcnPreviewText{
			display:none !important;
		}
		#outlook a{
			padding:0;
		}
		img{
			-ms-interpolation-mode:bicubic;
		}
		table{
			mso-table-lspace:0pt;
			mso-table-rspace:0pt;
		}
		.ReadMsgBody{
			width:100%;
		}
		.ExternalClass{
			width:100%;
		}
		p,a,li,td,blockquote{
			mso-line-height-rule:exactly;
		}
		a[href^=tel],a[href^=sms]{
			color:inherit;
			cursor:default;
			text-decoration:none;
		}
		p,a,li,td,body,table,blockquote{
			-ms-text-size-adjust:100%;
			-webkit-text-size-adjust:100%;
		}
		.ExternalClass,.ExternalClass p,.ExternalClass td,.ExternalClass div,.ExternalClass span,.ExternalClass font{
			line-height:100%;
		}
		a[x-apple-data-detectors]{
			color:inherit !important;
			text-decoration:none !important;
			font-size:inherit !important;
			font-family:inherit !important;
			font-weight:inherit !important;
			line-height:inherit !important;
		}
		#bodyCell{
			padding:10px;
		}
		.templateContainer{
			max-width:600px !important;
		}
		a.mcnButton{
			display:block;
		}
		.mcnImage{
			vertical-align:bottom;
		}
		.mcnTextContent{
			word-break:break-word;
		}
		.mcnTextContent img{
			height:auto !important;
		}
		.mcnDividerBlock{
			table-layout:fixed !important;
		}
	/*
	@tab Page
	@section Background Style
	@tip Set the background color and top border for your email. You may want to choose colors that match your company's branding.
	*/
		body,#bodyTable{
			/*@editable*/background-color:#FAFAFA;
		}
	/*
	@tab Page
	@section Background Style
	@tip Set the background color and top border for your email. You may want to choose colors that match your company's branding.
	*/
		#bodyCell{
			/*@editable*/border-top:0;
		}
	/*
	@tab Page
	@section Email Border
	@tip Set the border for your email.
	*/
		.templateContainer{
			/*@editable*/border:0;
		}
	/*
	@tab Page
	@section Heading 1
	@tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.
	@style heading 1
	*/
		h1{
			/*@editable*/color:#202020;
			/*@editable*/font-family:Helvetica;
			/*@editable*/font-size:26px;
			/*@editable*/font-style:normal;
			/*@editable*/font-weight:bold;
			/*@editable*/line-height:125%;
			/*@editable*/letter-spacing:normal;
			/*@editable*/text-align:left;
		}
	/*
	@tab Page
	@section Heading 2
	@tip Set the styling for all second-level headings in your emails.
	@style heading 2
	*/
		h2{
			/*@editable*/color:#202020;
			/*@editable*/font-family:Helvetica;
			/*@editable*/font-size:22px;
			/*@editable*/font-style:normal;
			/*@editable*/font-weight:bold;
			/*@editable*/line-height:125%;
			/*@editable*/letter-spacing:normal;
			/*@editable*/text-align:left;
		}
	/*
	@tab Page
	@section Heading 3
	@tip Set the styling for all third-level headings in your emails.
	@style heading 3
	*/
		h3{
			/*@editable*/color:#202020;
			/*@editable*/font-family:Helvetica;
			/*@editable*/font-size:20px;
			/*@editable*/font-style:normal;
			/*@editable*/font-weight:bold;
			/*@editable*/line-height:125%;
			/*@editable*/letter-spacing:normal;
			/*@editable*/text-align:left;
		}
	/*
	@tab Page
	@section Heading 4
	@tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.
	@style heading 4
	*/
		h4{
			/*@editable*/color:#202020;
			/*@editable*/font-family:Helvetica;
			/*@editable*/font-size:18px;
			/*@editable*/font-style:normal;
			/*@editable*/font-weight:bold;
			/*@editable*/line-height:125%;
			/*@editable*/letter-spacing:normal;
			/*@editable*/text-align:left;
		}
	/*
	@tab Preheader
	@section Preheader Style
	@tip Set the background color and borders for your email's preheader area.
	*/
		#templatePreheader{
			/*@editable*/background-color:#FAFAFA;
			/*@editable*/background-image:none;
			/*@editable*/background-repeat:no-repeat;
			/*@editable*/background-position:center;
			/*@editable*/background-size:cover;
			/*@editable*/border-top:0;
			/*@editable*/border-bottom:0;
			/*@editable*/padding-top:9px;
			/*@editable*/padding-bottom:9px;
		}
	/*
	@tab Preheader
	@section Preheader Text
	@tip Set the styling for your email's preheader text. Choose a size and color that is easy to read.
	*/
		#templatePreheader .mcnTextContent,#templatePreheader .mcnTextContent p{
			/*@editable*/color:#656565;
			/*@editable*/font-family:Helvetica;
			/*@editable*/font-size:12px;
			/*@editable*/line-height:150%;
			/*@editable*/text-align:left;
		}
	/*
	@tab Preheader
	@section Preheader Link
	@tip Set the styling for your email's preheader links. Choose a color that helps them stand out from your text.
	*/
		#templatePreheader .mcnTextContent a,#templatePreheader .mcnTextContent p a{
			/*@editable*/color:#656565;
			/*@editable*/font-weight:normal;
			/*@editable*/text-decoration:underline;
		}
	/*
	@tab Header
	@section Header Style
	@tip Set the background color and borders for your email's header area.
	*/
		#templateHeader{
			/*@editable*/background-color:#ffffff;
			/*@editable*/background-image:none;
			/*@editable*/background-repeat:no-repeat;
			/*@editable*/background-position:center;
			/*@editable*/background-size:cover;
			/*@editable*/border-top:0;
			/*@editable*/border-bottom:0;
			/*@editable*/padding-top:9px;
			/*@editable*/padding-bottom:0;
		}
	/*
	@tab Header
	@section Header Text
	@tip Set the styling for your email's header text. Choose a size and color that is easy to read.
	*/
		#templateHeader .mcnTextContent,#templateHeader .mcnTextContent p{
			/*@editable*/color:#202020;
			/*@editable*/font-family:Helvetica;
			/*@editable*/font-size:16px;
			/*@editable*/line-height:150%;
			/*@editable*/text-align:left;
		}
	/*
	@tab Header
	@section Header Link
	@tip Set the styling for your email's header links. Choose a color that helps them stand out from your text.
	*/
		#templateHeader .mcnTextContent a,#templateHeader .mcnTextContent p a{
			/*@editable*/color:#2BAADF;
			/*@editable*/font-weight:normal;
			/*@editable*/text-decoration:underline;
		}
	/*
	@tab Body
	@section Body Style
	@tip Set the background color and borders for your email's body area.
	*/
		#templateBody{
			/*@editable*/background-color:#ffffff;
			/*@editable*/background-image:none;
			/*@editable*/background-repeat:no-repeat;
			/*@editable*/background-position:center;
			/*@editable*/background-size:cover;
			/*@editable*/border-top:0;
			/*@editable*/border-bottom:2px solid #EAEAEA;
			/*@editable*/padding-top:0;
			/*@editable*/padding-bottom:9px;
		}
	/*
	@tab Body
	@section Body Text
	@tip Set the styling for your email's body text. Choose a size and color that is easy to read.
	*/
		#templateBody .mcnTextContent,#templateBody .mcnTextContent p{
			/*@editable*/color:#202020;
			/*@editable*/font-family:Helvetica;
			/*@editable*/font-size:16px;
			/*@editable*/line-height:150%;
			/*@editable*/text-align:left;
		}
	/*
	@tab Body
	@section Body Link
	@tip Set the styling for your email's body links. Choose a color that helps them stand out from your text.
	*/
		#templateBody .mcnTextContent a,#templateBody .mcnTextContent p a{
			/*@editable*/color:#2BAADF;
			/*@editable*/font-weight:normal;
			/*@editable*/text-decoration:underline;
		}
	/*
	@tab Footer
	@section Footer Style
	@tip Set the background color and borders for your email's footer area.
	*/
		#templateFooter{
			/*@editable*/background-color:#FAFAFA;
			/*@editable*/background-image:none;
			/*@editable*/background-repeat:no-repeat;
			/*@editable*/background-position:center;
			/*@editable*/background-size:cover;
			/*@editable*/border-top:0;
			/*@editable*/border-bottom:0;
			/*@editable*/padding-top:9px;
			/*@editable*/padding-bottom:9px;
		}
	/*
	@tab Footer
	@section Footer Text
	@tip Set the styling for your email's footer text. Choose a size and color that is easy to read.
	*/
		#templateFooter .mcnTextContent,#templateFooter .mcnTextContent p{
			/*@editable*/color:#656565;
			/*@editable*/font-family:Helvetica;
			/*@editable*/font-size:12px;
			/*@editable*/line-height:150%;
			/*@editable*/text-align:center;
		}
	/*
	@tab Footer
	@section Footer Link
	@tip Set the styling for your email's footer links. Choose a color that helps them stand out from your text.
	*/
		#templateFooter .mcnTextContent a,#templateFooter .mcnTextContent p a{
			/*@editable*/color:#656565;
			/*@editable*/font-weight:normal;
			/*@editable*/text-decoration:underline;
		}
	@media only screen and (min-width:768px){
		.templateContainer{
			width:600px !important;
		}

}	@media only screen and (max-width: 480px){
		body,table,td,p,a,li,blockquote{
			-webkit-text-size-adjust:none !important;
		}

}	@media only screen and (max-width: 480px){
		body{
			width:100% !important;
			min-width:100% !important;
		}

}	@media only screen and (max-width: 480px){
		#bodyCell{
			padding-top:10px !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnImage{
			width:100% !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnCartContainer,.mcnCaptionTopContent,.mcnRecContentContainer,.mcnCaptionBottomContent,.mcnTextContentContainer,.mcnBoxedTextContentContainer,.mcnImageGroupContentContainer,.mcnCaptionLeftTextContentContainer,.mcnCaptionRightTextContentContainer,.mcnCaptionLeftImageContentContainer,.mcnCaptionRightImageContentContainer,.mcnImageCardLeftTextContentContainer,.mcnImageCardRightTextContentContainer,.mcnImageCardLeftImageContentContainer,.mcnImageCardRightImageContentContainer{
			max-width:100% !important;
			width:100% !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnBoxedTextContentContainer{
			min-width:100% !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnImageGroupContent{
			padding:9px !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnCaptionLeftContentOuter .mcnTextContent,.mcnCaptionRightContentOuter .mcnTextContent{
			padding-top:9px !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnImageCardTopImageContent,.mcnCaptionBottomContent:last-child .mcnCaptionBottomImageContent,.mcnCaptionBlockInner .mcnCaptionTopContent:last-child .mcnTextContent{
			padding-top:18px !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnImageCardBottomImageContent{
			padding-bottom:9px !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnImageGroupBlockInner{
			padding-top:0 !important;
			padding-bottom:0 !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnImageGroupBlockOuter{
			padding-top:9px !important;
			padding-bottom:9px !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnTextContent,.mcnBoxedTextContentColumn{
			padding-right:18px !important;
			padding-left:18px !important;
		}

}	@media only screen and (max-width: 480px){
		.mcnImageCardLeftImageContent,.mcnImageCardRightImageContent{
			padding-right:18px !important;
			padding-bottom:0 !important;
			padding-left:18px !important;
		}

}	@media only screen and (max-width: 480px){
		.mcpreview-image-uploader{
			display:none !important;
			width:100% !important;
		}

}	@media only screen and (max-width: 480px){
	/*
	@tab Mobile Styles
	@section Heading 1
	@tip Make the first-level headings larger in size for better readability on small screens.
	*/
		h1{
			/*@editable*/font-size:22px !important;
			/*@editable*/line-height:125% !important;
		}

}	@media only screen and (max-width: 480px){
	/*
	@tab Mobile Styles
	@section Heading 2
	@tip Make the second-level headings larger in size for better readability on small screens.
	*/
		h2{
			/*@editable*/font-size:20px !important;
			/*@editable*/line-height:125% !important;
		}

}	@media only screen and (max-width: 480px){
	/*
	@tab Mobile Styles
	@section Heading 3
	@tip Make the third-level headings larger in size for better readability on small screens.
	*/
		h3{
			/*@editable*/font-size:18px !important;
			/*@editable*/line-height:125% !important;
		}

}	@media only screen and (max-width: 480px){
	/*
	@tab Mobile Styles
	@section Heading 4
	@tip Make the fourth-level headings larger in size for better readability on small screens.
	*/
		h4{
			/*@editable*/font-size:16px !important;
			/*@editable*/line-height:150% !important;
		}

}	@media only screen and (max-width: 480px){
	/*
	@tab Mobile Styles
	@section Boxed Text
	@tip Make the boxed text larger in size for better readability on small screens. We recommend a font size of at least 16px.
	*/
		.mcnBoxedTextContentContainer .mcnTextContent,.mcnBoxedTextContentContainer .mcnTextContent p{
			/*@editable*/font-size:14px !important;
			/*@editable*/line-height:150% !important;
		}

}	@media only screen and (max-width: 480px){
	/*
	@tab Mobile Styles
	@section Preheader Visibility
	@tip Set the visibility of the email's preheader on small screens. You can hide it to save space.
	*/
		#templatePreheader{
			/*@editable*/display:block !important;
		}

}	@media only screen and (max-width: 480px){
	/*
	@tab Mobile Styles
	@section Preheader Text
	@tip Make the preheader text larger in size for better readability on small screens.
	*/
		#templatePreheader .mcnTextContent,#templatePreheader .mcnTextContent p{
			/*@editable*/font-size:14px !important;
			/*@editable*/line-height:150% !important;
		}

}	@media only screen and (max-width: 480px){
	/*
	@tab Mobile Styles
	@section Header Text
	@tip Make the header text larger in size for better readability on small screens.
	*/
		#templateHeader .mcnTextContent,#templateHeader .mcnTextContent p{
			/*@editable*/font-size:16px !important;
			/*@editable*/line-height:150% !important;
		}

}	@media only screen and (max-width: 480px){
	/*
	@tab Mobile Styles
	@section Body Text
	@tip Make the body text larger in size for better readability on small screens. We recommend a font size of at least 16px.
	*/
		#templateBody .mcnTextContent,#templateBody .mcnTextContent p{
			/*@editable*/font-size:16px !important;
			/*@editable*/line-height:150% !important;
		}

}	@media only screen and (max-width: 480px){
	/*
	@tab Mobile Styles
	@section Footer Text
	@tip Make the footer content text larger in size for better readability on small screens.
	*/
		#templateFooter .mcnTextContent,#templateFooter .mcnTextContent p{
			/*@editable*/font-size:14px !important;
			/*@editable*/line-height:150% !important;
		}

}</style></head>
    <body>
		<!--*|IF:MC_PREVIEW_TEXT|*-->
		<!--[if !gte mso 9]><!----><span class='mcnPreviewText' style='display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;'>*|MC_PREVIEW_TEXT|*</span><!--<![endif]-->
		<!--*|END:IF|*-->
        <center>
            <table align='center' border='0' cellpadding='0' cellspacing='0' height='100%' width='100%' id='bodyTable'>
                <tr>
                    <td align='center' valign='top' id='bodyCell'>
                        <!-- BEGIN TEMPLATE // -->
						<!--[if (gte mso 9)|(IE)]>
						<table align='center' border='0' cellspacing='0' cellpadding='0' width='600' style='width:600px;'>
						<tr>
						<td align='center' valign='top' width='600' style='width:600px;'>
						<![endif]-->
                        <table border='0' cellpadding='0' cellspacing='0' width='100%' class='templateContainer'>
                            <tr>
                                <td valign='top' id='templatePreheader'><table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnTextBlock' style='min-width:100%;'>
    <tbody class='mcnTextBlockOuter'>
        <tr>
            <td valign='top' class='mcnTextBlockInner' style='padding-top:9px;'>
              	<!--[if mso]>
				<table align='left' border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100%;'>
				<tr>
				<![endif]-->
			    
				<!--[if mso]>
				<td valign='top' width='600' style='width:600px;'>
				<![endif]-->
                <table align='left' border='0' cellpadding='0' cellspacing='0' style='max-width:100%; min-width:100%;' width='100%' class='mcnTextContentContainer'>
                    <tbody><tr>
                        
                        <td valign='top' class='mcnTextContent' style='padding: 0px 18px 9px; text-align: center;'>
                        
                            <a href='*|ARCHIVE|*' target='_blank'>View this email in your browser</a>
                        </td>
                    </tr>
                </tbody></table>
				<!--[if mso]>
				</td>
				<![endif]-->
                
				<!--[if mso]>
				</tr>
				</table>
				<![endif]-->
            </td>
        </tr>
    </tbody>
</table></td>
                            </tr>
                            <tr>
                                <td valign='top' id='templateHeader'></td>
                            </tr>
                            <tr>
                                <td valign='top' id='templateBody'><table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnTextBlock' style='min-width:100%;'>
    <tbody class='mcnTextBlockOuter'>
        <tr>
            <td valign='top' class='mcnTextBlockInner' style='padding-top:9px;'>
              	<!--[if mso]>
				<table align='left' border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100%;'>
				<tr>
				<![endif]-->
			    
				<!--[if mso]>
				<td valign='top' width='600' style='width:600px;'>
				<![endif]-->
                <table align='left' border='0' cellpadding='0' cellspacing='0' style='max-width:100%; min-width:100%;' width='100%' class='mcnTextContentContainer'>
                    <tbody><tr>
                        
                        <td valign='top' class='mcnTextContent' style='padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;'>
                        
                            <table align='center' border='0' cellpadding='0' cellspacing='0' width='600'>
	<tbody>
		<tr>
			<td align='left'>";
			
			$cs = $this->db->where('customer_id', $this->session->userdata('c_id'))->get('customer')->row_array();
			$ord = $this->db->where('customer_id',$this->session->userdata('c_id'))->order_by('order_id','desc')->get('orders')->row_array();
		
			$listitem = $this->db->where('customer_id',$this->session->userdata('c_id'))->where('order_id',$ord['order_id'])->get('order_list');
		
		$message .=	"<table width='100%'>
				<tbody>
					<tr>
						<td height='20' width='15'>&nbsp;</td>
						<td height='20' width='550'>&nbsp;</td>
						<td height='20' width='15'>&nbsp;</td>
					</tr>
					<tr>
						<td width='15'>&nbsp;</td>
						<td width='550'><img width='50%' src='". base_url('images/logo.png') ."'></td>
						<td width='15'>&nbsp;</td>
					</tr>
					<tr>
						<td height='20' width='15'>&nbsp;</td>
						<td height='20' width='550'>&nbsp;</td>
						<td height='20' width='15'>&nbsp;</td>
					</tr>
				</tbody>
			</table>
			</td>
		</tr>
		<tr>
			<td bgcolor='#ffffff' id='m_6774962570962224605contentContainer'>
			<table align='left' width='100%'>
				<tbody>
					<tr>
						<td height='20' width='15'>&nbsp;</td>
						<td height='20' width='550'>&nbsp;</td>
						<td height='20' width='15'>&nbsp;</td>
					</tr>
					<tr>
						<td width='15'>&nbsp;</td>
						<td align='left' width='550'>
						<table align='left' width='100%'>
							<tbody>
								<tr>
									<td>Hai ". $cs['cs_name'] ."</td>
								</tr>
								<tr>
									<td>Pesanan <strong>";
									
									foreach($listitem->result_array() as $list){
									
										$message .= $list['product_name'];
									
									}
									
							$message .=	"</strong> kamu dengan nomor transaksi&nbsp;<strong>MN".$ord['invoice'].$ord['series']."</strong> sedang diproses.</td>
								</tr>
								<tr>
									<td>Berikut adalah detail transaksimu:</td>
								</tr>
								<tr>
									<td>
									<table bgcolor='#FFFFFF' border='0' cellpadding='5' cellspacing='0' id='m_6774962570962224605templateList' width='100%'>
										<tbody>
											<tr>
												<th bgcolor='#900135' colspan='4'>
												<h2 style='text-align: center;color:#f0f0f0'>Transaksi #MN". $ord['invoice'].$ord['series'] ."</h2>
												</th>
											</tr>
											<tr>
												<td align='left' bgcolor='#FFFFFF' colspan='3' valign='top'>Waktu Transaksi</td>
												<td align='left' bgcolor='#FFFFFF' valign='top'>". date('d-M-Y',strtotime($ord['order_date'])) .' '. $ord['order_time'] ." WIB</td>
											</tr>
											<tr>
												<td align='left' bgcolor='#FFFFFF' colspan='3' valign='top'>Pembeli</td>
												<td align='left' bgcolor='#FFFFFF' valign='top'>". $cs['cs_name'] ."</td>
											</tr>
											<tr>
												<td align='left' bgcolor='#FFFFFF' colspan='3' valign='top'>Jasa Pengiriman</td>
												<td align='left' bgcolor='#FFFFFF' valign='top'>JNE ".$ord['kurir']."</td>
											</tr>
											<tr>
												<td align='left' bgcolor='#FFFFFF' colspan='4' valign='top'><strong>Alamat Pengiriman:</strong>&nbsp;
												<p>Toni Wibowo&nbsp;</p>

												<p>".$cs['address']."</p>
												</td>
											</tr>
										</tbody>
									</table>
									</td>
								</tr>
								<tr>
									<td>
									<table border='0' cellpadding='0' cellspacing='0' width='100%'>
										<tbody>
											<tr>
												<td valign='top'>
												<table border='0' cellpadding='0' cellspacing='0' width='100%'>
													<tbody>
														<tr>
															<td align='center' bgcolor='#f0f0f0'>Daftar Barang</td>
														</tr>
													</tbody>
												</table>
												</td>
											</tr>
											<tr>
												<td>
												<table border='0' cellpadding='0' cellspacing='0' width='100%'>
													<tbody>
														<tr><td align='left' valign='top' width='100'>";
															
															$total = 0;
															$qty = 0;
															$kec = $this->db->where('id_kecamatan',$cs['id_kecamatan'])->get('kecamatan')->row_array();
															$kab = $this->db->where('id_kabupaten',$cs['id_kabupaten'])->get('kabupaten')->row_array();
															$ongkir = $this->db->select("$ord[kurir] as ongkir")->like('kota',$kab['nama_kabupaten'])->like('kecamatan',$kec['nama_kecamatan'])->get('jne')->row_array();
															$ongkir = $ongkir['ongkir'];
															
															foreach($listitem->result_array() as $cart){
																
																$message .= "
																<img alt='' height='100' src='". base_url('images/product/'). $cart['picture'] ."' width='100'>";
																
																$qty = $qty + $cart['qty'];
																$price = $cart['qty'] * $cart['price'];
																$total = $total + $price; 
																
															}
																$grandtotal = $ongkir + $total;
															
															
															$message .= "</td><td align='left' valign='top'>
															<table align='left' border='0' cellpadding='0' cellspacing='0' width='100%'>
																<tbody>
																	<tr><td>";
																	
																	foreach($listitem->result_array() as $cart){
																	
																	$message .= "<a href='' target='_blank'>$cart[product_name]</a>";
																	}
																	
															$message .= "</td>	
																	</tr>
																	<tr>
																		<td>Jumlah: ". $qty ." . Berat: $ord[weight]kg</td>
																	</tr>
																	<tr>
																		<td>Total harga: Rp. ".number_format($grandtotal,0,',','.')."</td>
																	</tr>
																	<tr>
																		<td>&nbsp;</td>
																	</tr>
																</tbody>
															</table>
															</td>
														</tr>
													</tbody>
												</table>
												</td>
											</tr>
										</tbody>
									</table>
									</td>
								</tr>
								<tr>
									<td>Barang pesananmu akan di kirim dalam waktu (1x24 jam). Setelah kami menerima konfirmasi pembayaran telah dilakukan.</td>
								</tr>
								<tr>
									<td>Terima kasih sudah berbelanja di Koperasi Serasi.</td>
								</tr>
							</tbody>
						</table>
						</td>
					</tr>
				</tbody>
			</table>
			</td>
		</tr>
	</tbody>
</table>

                        </td>
                    </tr>
                </tbody></table>
				<!--[if mso]>
				</td>
				<![endif]-->
                
				<!--[if mso]>
				</tr>
				</table>
				<![endif]-->
            </td>
        </tr>
    </tbody>
</table></td>
                            </tr>
                            <tr>
                                <td valign='top' id='templateFooter'><table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnFollowBlock' style='min-width:100%;'>
    <tbody class='mcnFollowBlockOuter'>
        <tr>
            <td align='center' valign='top' style='padding:9px' class='mcnFollowBlockInner'>
                <table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnFollowContentContainer' style='min-width:100%;'>
    <tbody><tr>
        <td align='center' style='padding-left:9px;padding-right:9px;'>
            <table border='0' cellpadding='0' cellspacing='0' width='100%' style='min-width:100%;' class='mcnFollowContent'>
                <tbody><tr>
                    <td align='center' valign='top' style='padding-top:9px; padding-right:9px; padding-left:9px;'>
                        <table align='center' border='0' cellpadding='0' cellspacing='0'>
                            <tbody><tr>
                                <td align='center' valign='top'>
                                    <!--[if mso]>
                                    <table align='center' border='0' cellspacing='0' cellpadding='0'>
                                    <tr>
                                    <![endif]-->
                                    
                                        <!--[if mso]>
                                        <td align='center' valign='top'>
                                        <![endif]-->
                                        
                                        
                                            <table align='left' border='0' cellpadding='0' cellspacing='0' style='display:inline;'>
                                                <tbody><tr>
                                                    <td valign='top' style='padding-right:10px; padding-bottom:9px;' class='mcnFollowContentItemContainer'>
                                                        <table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnFollowContentItem'>
                                                            <tbody><tr>
                                                                <td align='left' valign='middle' style='padding-top:5px; padding-right:10px; padding-bottom:5px; padding-left:9px;'>
                                                                    <table align='left' border='0' cellpadding='0' cellspacing='0' width=''>
                                                                        <tbody><tr>
                                                                            
                                                                                <td align='center' valign='middle' width='24' class='mcnFollowIconContent'>
                                                                                    <a href='http://www.twitter.com/' target='_blank'><img src='https://cdn-images.mailchimp.com/icons/social-block-v2/color-twitter-48.png' style='display:block;' height='24' width='24' class=''></a>
                                                                                </td>
                                                                            
                                                                            
                                                                        </tr>
                                                                    </tbody></table>
                                                                </td>
                                                            </tr>
                                                        </tbody></table>
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                        
                                        <!--[if mso]>
                                        </td>
                                        <![endif]-->
                                    
                                        <!--[if mso]>
                                        <td align='center' valign='top'>
                                        <![endif]-->
                                        
                                        
                                            <table align='left' border='0' cellpadding='0' cellspacing='0' style='display:inline;'>
                                                <tbody><tr>
                                                    <td valign='top' style='padding-right:10px; padding-bottom:9px;' class='mcnFollowContentItemContainer'>
                                                        <table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnFollowContentItem'>
                                                            <tbody><tr>
                                                                <td align='left' valign='middle' style='padding-top:5px; padding-right:10px; padding-bottom:5px; padding-left:9px;'>
                                                                    <table align='left' border='0' cellpadding='0' cellspacing='0' width=''>
                                                                        <tbody><tr>
                                                                            
                                                                                <td align='center' valign='middle' width='24' class='mcnFollowIconContent'>
                                                                                    <a href='http://www.facebook.com' target='_blank'><img src='https://cdn-images.mailchimp.com/icons/social-block-v2/color-facebook-48.png' style='display:block;' height='24' width='24' class=''></a>
                                                                                </td>
                                                                            
                                                                            
                                                                        </tr>
                                                                    </tbody></table>
                                                                </td>
                                                            </tr>
                                                        </tbody></table>
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                        
                                        <!--[if mso]>
                                        </td>
                                        <![endif]-->
                                    
                                        <!--[if mso]>
                                        <td align='center' valign='top'>
                                        <![endif]-->
                                        
                                        
                                            <table align='left' border='0' cellpadding='0' cellspacing='0' style='display:inline;'>
                                                <tbody><tr>
                                                    <td valign='top' style='padding-right:0; padding-bottom:9px;' class='mcnFollowContentItemContainer'>
                                                        <table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnFollowContentItem'>
                                                            <tbody><tr>
                                                                <td align='left' valign='middle' style='padding-top:5px; padding-right:10px; padding-bottom:5px; padding-left:9px;'>
                                                                    <table align='left' border='0' cellpadding='0' cellspacing='0' width=''>
                                                                        <tbody><tr>
                                                                            
                                                                                <td align='center' valign='middle' width='24' class='mcnFollowIconContent'>
                                                                                    <a href='http://mailchimp.com' target='_blank'><img src='https://cdn-images.mailchimp.com/icons/social-block-v2/color-link-48.png' style='display:block;' height='24' width='24' class=''></a>
                                                                                </td>
                                                                            
                                                                            
                                                                        </tr>
                                                                    </tbody></table>
                                                                </td>
                                                            </tr>
                                                        </tbody></table>
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                        
                                        <!--[if mso]>
                                        </td>
                                        <![endif]-->
                                    
                                    <!--[if mso]>
                                    </tr>
                                    </table>
                                    <![endif]-->
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody></table>
        </td>
    </tr>
</tbody></table>

            </td>
        </tr>
    </tbody>
</table><table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnDividerBlock' style='min-width:100%;'>
    <tbody class='mcnDividerBlockOuter'>
        <tr>
            <td class='mcnDividerBlockInner' style='min-width: 100%; padding: 10px 18px 25px;'>
                <table class='mcnDividerContent' border='0' cellpadding='0' cellspacing='0' width='100%' style='min-width: 100%;border-top: 2px solid #EEEEEE;'>
                    <tbody><tr>
                        <td>
                            <span></span>
                        </td>
                    </tr>
                </tbody></table>
<!--            
                <td class='mcnDividerBlockInner' style='padding: 18px;'>
                <hr class='mcnDividerContent' style='border-bottom-color:none; border-left-color:none; border-right-color:none; border-bottom-width:0; border-left-width:0; border-right-width:0; margin-top:0; margin-right:0; margin-bottom:0; margin-left:0;' />
-->
            </td>
        </tr>
    </tbody>
</table><table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnTextBlock' style='min-width:100%;'>
    <tbody class='mcnTextBlockOuter'>
        <tr>
            <td valign='top' class='mcnTextBlockInner' style='padding-top:9px;'>
              	<!--[if mso]>
				<table align='left' border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100%;'>
				<tr>
				<![endif]-->
			    
				<!--[if mso]>
				<td valign='top' width='600' style='width:600px;'>
				<![endif]-->
                <table align='left' border='0' cellpadding='0' cellspacing='0' style='max-width:100%; min-width:100%;' width='100%' class='mcnTextContentContainer'>
                    <tbody><tr>
                        
                        <td valign='top' class='mcnTextContent' style='padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;'>
                        
                            <em>Copyright © 2018 koperasiserasi.com, All rights reserved.</em>
                        </td>
                    </tr>
                </tbody></table>
				<!--[if mso]>
				</td>
				<![endif]-->
                
				<!--[if mso]>
				</tr>
				</table>
				<![endif]-->
            </td>
        </tr>
    </tbody>
</table></td>
                            </tr>
                        </table>
						<!--[if (gte mso 9)|(IE)]>
						</td>
						</tr>
						</table>
						<![endif]-->
                        <!-- // END TEMPLATE -->
                    </td>
                </tr>
            </table>
        </center>
    </body>
</html>


"; return $message;
	}
	
	function coba(){
		$cs = $this->db->where('customer_id', $this->session->userdata('c_id'))->get('customer')->row_array();
		$ord = $this->db->where('customer_id',$this->session->userdata('c_id'))->order_by('order_id','desc')->get('orders')->row_array();
		
		$kec = $this->db->where('id_kecamatan',$cs['id_kecamatan'])->get('kecamatan')->row_array();
		$kab = $this->db->where('id_kabupaten',$cs['id_kabupaten'])->get('kabupaten')->row_array();
		$ongkir = $this->db->select("$ord[kurir] as ongkir")->like('kota',$kab['nama_kabupaten'])->like('kecamatan',$kec['nama_kecamatan'])->get('jne')->row_array();
		$ongkir = $ongkir['ongkir'];
		
		echo $ongkir;
	}
}
