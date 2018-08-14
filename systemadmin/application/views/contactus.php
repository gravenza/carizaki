<?php include_once "template/include/header.php"; ?>
<content>
	<div class="container">
    	<div class="clearer about">
        <ol class="breadcrumb">
		<li><a href="<?php echo site_url() ?>">Home</a></li>
		<li class="active">Contact Us</li>
		</ol>
        
        <div class="row">
        	<div class="col-md-8 col-xs-12">
            	

        		<?php echo form_open('contactus/send')?>



                            <?php //echo form_error('recaptcha_response_field') ?>
<p>Jika Anda mempunyai pertanyaan mengenai layanan FIFGROUP atau ingin menyampaikan Informasi, 
    Saran, Pengalaman, ataupun Keluhan yang dapat memperbaiki kinerja kami, silakan mengisi formulir dibawah</p>
<table class="table">
<style type="text/css">
.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td{
	border-top:0;
}
</style>
<tbody>
        <tr>
            <td>Nama Lengkap</td>
            <td width="30" align="center">:</td>
            <td><input type="text" name="name" size="20" value="<?php echo $name; ?>" class="form-control"></td>
        </tr>
<tr>
            <td>Alamat E-mail</td>
            <td width="30" align="center">:</td>
            <td><input type="text" name="email" value="<?php echo $email; ?>" size="20" class="form-control"></td>
        </tr>

        <tr>
            <td valign="top">Alamat</td>
            <td width="30" valign="top" align="center">:</td>
            <td><input type="text" name="alamat" size="20" value="<?php echo $alamat; ?>"  class="form-control"></td>
            
        </tr>

        <tr>
            <td>Kota</td>
            <td width="30" align="center">:</td>
            
            <td><input type="text" name="kota" size="20" value="<?php echo $kota; ?>"  class="form-control"></td>
                </tr>

        <tr>
            <td>Nomor Telepon</td>
            <td width="30" align="center">
             <div style="font-family:FF_DIN_Regular; font-size:15px;">:</div>
            </td><td><input type="text" name="no_telp" value="<?php echo $no_telp; ?>" size="20" class="form-control"></td>
        </tr>

        <tr>
            <td>Apakah Anda Pelanggan Kami ?</td>
            <td width="30" align="center">:</td>
            
            <?php
            
           $pelanggan = array('Pelanggan FIFASTRA','Pelanggan SPEKTRA','Umum');
            
            ?>
            
            <td>
                <select name="pelanggan" class="form-control" id="tipePelanggan">
                <option>Silahkan Pilih</option>
                
                <?php foreach($pelanggan as $p): ?>
                
                <option value="<?php echo $p; ?>" <?php if($pelanggan ==$p){ echo 'selected';} ?> ><?php echo $p ?></option>
                
                <?php endforeach; ?>
                
                </select></td>
        </tr>


         <tr id="subTipePelanggan">
            
        </tr>
        
        
        <tr>
            <td>Jenis Topik </td>
            <td width="30" align="center">:</td>
            
            <?php
            
            //$topik = array('Informasi','Saran','Pengalaman','Komplain');
            $topik = array('Complain','Pertanyaan umum','Terkait penawaran kerjasama bisnis','dll');
            
            ?>
            <td>
                <select name="topik" class="form-control" id="topik">
                <option>Silahkan Pilih</option>
                <?php foreach($topik as $p): ?>
                <option value="<?php echo $p; ?>" <?php if($topik ==$p){ echo 'selected';} ?> ><?php echo $p ?></option>
                <?php endforeach; ?>
                
                </select>
            </td>
        </tr>


         <tr id="subTopik">
            
        </tr>
        
        
        
        
        <tr>
            <td>Judul Topik</td>
            <td width="30"  align="center">:</td>
            <td><input type="text" name="judul_topik" value="<?php echo $judul_topik; ?>" size="20" class="form-control"></td>
        </tr>

        <tr>
            <td>Pesan</td>
            <td width="30" align="center">:</td>
            <td><textarea rows="5" name="pesan" cols="48" class="form-control"> <?php echo $pesan; ?></textarea></td>
        </tr>
        
        <tr>
             <td>Kode Verifikasi</td>
             <td width="30" align="center"></td>
            <td>  <?php echo $cap_img; ?></td>
            
        </tr>
        
       
        <tr>
             <td>Masukan Verifikasi</td>
             <td width="30" align="center">:</td>
            <td><input type="text" name="captcha" /><?php echo $cap_msg; ?></td>
            
        </tr>
        
        <tr>
        <td></td><td></td><td><input type="submit" name="Submit" class="btn btn-primary" value="Submit">
		<input class="btn btn-warning" type="reset" name="Reset" value="Reset"></td>
        </tr>
</tbody></table>

                        
</form>



				
				<div class="clearer">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.7791653709255!2d106.78101021516395!3d-6.292728095445562!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1dd70ec5701%3A0xabebdaadd9ba9204!2sMenara+FIF!5e0!3m2!1sen!2sid!4v1496101555701" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
            </div>
            
            <div class="col-md-4 col-sm-4 col-xs-12 sidebar">
		<div class="news-widget">
		
		<!-- Nav tabs -->
	<ul class="nav nav-pills nav-justified" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Artikel Terbaru</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Berita Terbaru</a></li>
	</ul>

  <!-- Tab panes -->
  <div class="tab-content">
    
	<!-- ARTIKEL TERBARU -->
	<div role="tabpanel" class="tab-pane active" id="home">
	<div class="media">
  		<div class="media-left media-top">
    	<a href="<?php echo site_url('article/detail') ?>">
			<img class="media-object" src="<?php echo base_url(); ?>images/news/news2.jpg" alt="">
		</a>
  		</div>
  		<div class="media-body">
			<h4 class="media-heading">
			<a class="title-news" href="<?php echo site_url('article/detail') ?>">SPEKTRA MERIAH Surabaya Banjir Hadiah</a>
			</h4>
    		<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
  		</div>
	</div>
	
	<div class="media">
  		<div class="media-left media-top">
    	<a href="<?php echo site_url('article/detail') ?>">
			<img class="media-object" src="<?php echo base_url(); ?>images/article/article3.jpg" alt="">
		</a>
  		</div>
  		<div class="media-body">
			<h4 class="media-heading">
			<a class="title-news" href="<?php echo site_url('article/detail') ?>">SPEKTRA MERIAH Surabaya Banjir Hadiah</a>
			</h4>
    		<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
  		</div>
	</div>
	
	<div class="media">
  		<div class="media-left media-top">
    	<a href="<?php echo site_url('article/detail') ?>">
			<img class="media-object" src="<?php echo base_url(); ?>images/article/article1.jpg" alt="">
		</a>
  		</div>
  		<div class="media-body">
			<h4 class="media-heading">
			<a class="title-news" href="<?php echo site_url('article/detail') ?>">SPEKTRA MERIAH Surabaya Banjir Hadiah</a>
			</h4>
    		<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
  		</div>
	</div>
	
	<div class="media">
  		<div class="media-left media-top">
    	<a href="<?php echo site_url('article/detail') ?>">
			<img class="media-object" src="<?php echo base_url(); ?>images/news/news2.jpg" alt="">
		</a>
  		</div>
  		<div class="media-body">
			<h4 class="media-heading">
			<a class="title-news" href="<?php echo site_url('article/detail') ?>">SPEKTRA MERIAH Surabaya Banjir Hadiah</a>
			</h4>
    		<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
  		</div>
	</div>
	
	<div class="media">
  		<div class="media-left media-top">
    	<a href="<?php echo site_url('article/detail') ?>">
			<img class="media-object" src="<?php echo base_url(); ?>images/article/article2.jpg" alt="">
		</a>
  		</div>
  		<div class="media-body">
			<h4 class="media-heading">
			<a class="title-news" href="<?php echo site_url('article/detail') ?>">SPEKTRA MERIAH Surabaya Banjir Hadiah</a>
			</h4>
    		<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
  		</div>
	</div>
	
	</div>
    
	
	
	<div role="tabpanel" class="tab-pane" id="profile">
	
	<div class="media">
  		<div class="media-left media-top">
    	<a href="<?php echo site_url('article/detail') ?>">
			<img class="media-object" src="<?php echo base_url(); ?>images/article/article3.jpg" alt="">
		</a>
  		</div>
  		<div class="media-body">
			<h4 class="media-heading">
			<a class="title-news" href="<?php echo site_url('article/detail') ?>">SPEKTRA MERIAH Surabaya Banjir Hadiah</a>
			</h4>
    		<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
  		</div>
	</div>
	
	<div class="media">
  		<div class="media-left media-top">
    	<a href="<?php echo site_url('article/detail') ?>">
			<img class="media-object" src="<?php echo base_url(); ?>images/article/article2.jpg" alt="">
		</a>
  		</div>
  		<div class="media-body">
			<h4 class="media-heading">
			<a class="title-news" href="<?php echo site_url('article/detail') ?>">SPEKTRA MERIAH Surabaya Banjir Hadiah</a>
			</h4>
    		<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
  		</div>
	</div>
	
	<div class="media">
  		<div class="media-left media-top">
    	<a href="<?php echo site_url('article/detail') ?>">
			<img class="media-object" src="<?php echo base_url(); ?>images/article/article3.jpg" alt="">
		</a>
  		</div>
  		<div class="media-body">
			<h4 class="media-heading">
			<a class="title-news" href="<?php echo site_url('article/detail') ?>">SPEKTRA MERIAH Surabaya Banjir Hadiah</a>
			</h4>
    		<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
  		</div>
	</div>
	
	<div class="media">
  		<div class="media-left media-top">
    	<a href="<?php echo site_url('article/detail') ?>">
			<img class="media-object" src="<?php echo base_url(); ?>images/article/article1.jpg" alt="">
		</a>
  		</div>
  		<div class="media-body">
			<h4 class="media-heading">
			<a class="title-news" href="<?php echo site_url('article/detail') ?>">SPEKTRA MERIAH Surabaya Banjir Hadiah</a>
			</h4>
    		<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
  		</div>
	</div>
	
	<div class="media">
  		<div class="media-left media-top">
    	<a href="<?php echo site_url('article/detail') ?>">
			<img class="media-object" src="<?php echo base_url(); ?>images/article/article2.jpg" alt="">
		</a>
  		</div>
  		<div class="media-body">
			<h4 class="media-heading">
			<a class="title-news" href="<?php echo site_url('article/detail') ?>">SPEKTRA MERIAH Surabaya Banjir Hadiah</a>
			</h4>
    		<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
  		</div>
	</div>
	
	</div>
  </div>
		
		</div>
		
		<div class="brand">
		<div class="row">
        	
            <div class="col-md-12 col-xs-6 text-center">
            <div class="thumbnail">
			<img src="<?php echo base_url(); ?>images/brand/brand1.png"/>
            </div>
            </div>
            
            <div class="col-md-12 col-xs-6 text-center">
            <div class="thumbnail">
			<img src="<?php echo base_url(); ?>images/brand/brand2.png"/>
            </div>
            </div>
            
            <div class="col-md-12 col-xs-6 text-center hidden-xs">
            <div class="thumbnail">
			<img src="<?php echo base_url(); ?>images/brand/brand3.png"/>
            </div>
            </div>
            
            <div class="col-md-12 col-xs-6 text-center hidden-xs">
            <div class="thumbnail">
			<img src="<?php echo base_url(); ?>images/brand/brand4.png"/>
            </div>
            </div>
                 
        	</div>
		</div>
		</div>
        </div>
        
        </div>
    </div>
</content>
<?php include_once "template/include/footer.php"; ?>