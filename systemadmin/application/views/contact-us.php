<?php include_once "template/include/header.php"; ?>
<content>
	<div class="container">
    	<div class="clearer about">
        
        
        <div class="row">
        	<div class="col-md-8 col-xs-12">
			
			<div class="clearer" style="margin-bottom:0">
			<ol class="breadcrumb">
			<li><a href="">Home</a></li>
			<li class="active"><strong>SEARCH BRANCH</strong></li>
			</ol>
			</div>
			
			<div class="row" style="margin-bottom:20px;">
			<div class="col-md-6 col-md-offset-3 col-xs-12">
			<!-- <div class="input-group">
			<input type="text" class="form-control" placeholder="Search for...">
			<span class="input-group-btn">
				<button class="btn btn-primary" type="button">Search</button>
			</span>
			</div> -->

			 <form name="myform" type="post" action="<?php echo site_url('branch/search') ?>">
			 <div class="input-group">
                        
                        <input name="param" type="hidden" />
                        <input type="text" name="key" id="searchText" class="form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-default" id="searchform" type="button" style="padding: 9px 12px;">
                                <i class="fa fa-search"></i>
                        </button>
                        </span>
                      
                    </div>
					</form>

			</div>
			</div>
			
			<div class="clearer" style="margin-bottom:0">
			<ol class="breadcrumb">
			<li><a href="<?php echo site_url() ?>">Home</a></li>
			<li class="active"><strong>FAQ</strong></li>
			</ol>
			</div>
			
			<div class="row">
			<div class="col-md-12 col-xs-12">
			
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
	
	<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          FIFGROUP
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        
		
		<div class="panel-group" id="accordionInner1" role="tablist" aria-multiselectable="true">
		
			<div class="panel panel-info">
			<div class="panel-heading">
				<a href="#innerCollapseOne" role="button" data-toggle="collapse" data-parent="#accordionInner1" aria-expanded="false" aria-controls="innercollapseOne">
					<i class="fa fa-plus"></i> Anim pariatur cliche reprehenderit, enim eiusmod high life
				</a>
			</div>
			
			<div id="innerCollapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="innerheadingOne">
				<div class="panel-body">
					Test
				</div>
			</div>
			</div>
			
			<div class="panel panel-info">
			<div class="panel-heading">
				<a href="#innerCollapseTwo" role="button" data-toggle="collapse" data-parent="#accordionInner1" aria-expanded="false" aria-controls="innercollapseOne">
					<i class="fa fa-plus"></i> Anim pariatur cliche reprehenderit, enim eiusmod high life
				</a>
			</div>
			
			<div id="innerCollapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="innerheadingOne">
				<div class="panel-body">
					Test
				</div>
			</div>
			</div>
		
		</div>
		
      </div>
    </div>
	</div>
  
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          FIFASTRA
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        
		<div class="panel-group" id="accordionInner2" role="tablist" aria-multiselectable="true">
		
			<div class="panel panel-info">
			<div class="panel-heading">
				<a href="#innerCollapse3" role="button" data-toggle="collapse" data-parent="#accordionInner2" aria-expanded="true" aria-controls="innercollapseOne">
					<i class="fa fa-plus"></i> Anim pariatur cliche reprehenderit, enim eiusmod high life
				</a>
			</div>
			
			<div id="innerCollapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="innerheadingOne">
				<div class="panel-body">
					Test
				</div>
			</div>
			</div>
			
			<div class="panel panel-info">
			<div class="panel-heading">
				<a href="#innerCollapse4" role="button" data-toggle="collapse" data-parent="#accordionInner2" aria-expanded="true" aria-controls="innercollapseTwo">
					<i class="fa fa-plus"></i> Anim pariatur cliche reprehenderit, enim eiusmod high life
				</a>
			</div>
			
			<div id="innerCollapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="innerheading2">
				<div class="panel-body">
					Test
				</div>
			</div>
			</div>
		
		</div>
		
      </div>
    </div>
  </div>
  
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          SPEKTRA
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        
		<div class="panel-group" id="accordionInner3" role="tablist" aria-multiselectable="true">
		
			<div class="panel panel-info">
			<div class="panel-heading">
				<a href="#innerCollapse31" role="button" data-toggle="collapse" data-parent="#accordionInner3" aria-expanded="true" aria-controls="innercollapseOne">
					<i class="fa fa-plus"></i> Anim pariatur cliche reprehenderit, enim eiusmod high life
				</a>
			</div>
			
			<div id="innerCollapse31" class="panel-collapse collapse" role="tabpanel" aria-labelledby="innerheadingOne">
				<div class="panel-body">
					Test
				</div>
			</div>
			</div>
			
			<div class="panel panel-info">
			<div class="panel-heading">
				<a href="#innerCollapse32" role="button" data-toggle="collapse" data-parent="#accordionInner3" aria-expanded="true" aria-controls="innercollapseTwo">
					<i class="fa fa-plus"></i> Anim pariatur cliche reprehenderit, enim eiusmod high life
				</a>
			</div>
			
			<div id="innerCollapse32" class="panel-collapse collapse" role="tabpanel" aria-labelledby="innerheading2">
				<div class="panel-body">
					Test
				</div>
			</div>
			</div>
		
		</div>
		
      </div>
    </div>
  </div>
  
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
          DANASTRA
        </a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        
		<div class="panel-group" id="accordionInner4" role="tablist" aria-multiselectable="true">
		
			<div class="panel panel-info">
			<div class="panel-heading">
				<a href="#innerCollapse41" role="button" data-toggle="collapse" data-parent="#accordionInner4" aria-expanded="true" aria-controls="innercollapseOne">
					<i class="fa fa-plus"></i> Anim pariatur cliche reprehenderit, enim eiusmod high life
				</a>
			</div>
			
			<div id="innerCollapse41" class="panel-collapse collapse" role="tabpanel" aria-labelledby="innerheadingOne">
				<div class="panel-body">
					Test
				</div>
			</div>
			</div>
			
			<div class="panel panel-info">
			<div class="panel-heading">
				<a href="#innerCollapse42" role="button" data-toggle="collapse" data-parent="#accordionInner4" aria-expanded="true" aria-controls="innercollapseTwo">
					<i class="fa fa-plus"></i> Anim pariatur cliche reprehenderit, enim eiusmod high life
				</a>
			</div>
			
			<div id="innerCollapse42" class="panel-collapse collapse" role="tabpanel" aria-labelledby="innerheading2">
				<div class="panel-body">
					Test
				</div>
			</div>
			</div>
		
		</div>
		
      </div>
    </div>
  </div>
  
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
          AMITRA
        </a>
      </h4>
    </div>
    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        
		<div class="panel-group" id="accordionInner5" role="tablist" aria-multiselectable="true">
		
			<div class="panel panel-info">
			<div class="panel-heading">
				<a href="#innerCollapse51" role="button" data-toggle="collapse" data-parent="#accordionInner5" aria-expanded="true" aria-controls="innercollapse5">
					<i class="fa fa-plus"></i> Anim pariatur cliche reprehenderit, enim eiusmod high life
				</a>
			</div>
			
			<div id="innerCollapse51" class="panel-collapse collapse" role="tabpanel" aria-labelledby="innerheadingOne">
				<div class="panel-body">
					Test
				</div>
			</div>
			</div>
			
			<div class="panel panel-info">
			<div class="panel-heading">
				<a href="#innerCollapse52" role="button" data-toggle="collapse" data-parent="#accordionInner5" aria-expanded="true" aria-controls="innercollapse5">
					<i class="fa fa-plus"></i> Anim pariatur cliche reprehenderit, enim eiusmod high life
				</a>
			</div>
			
			<div id="innerCollapse52" class="panel-collapse collapse" role="tabpanel" aria-labelledby="innerheading2">
				<div class="panel-body">
					Test
				</div>
			</div>
			</div>
		
		</div>
		
      </div>
    </div>
  </div>
  
</div>
			
			</div>
			</div>
			
			<div class="clearer" style="margin-bottom:0">
			<ol class="breadcrumb">
			<li><a href="<?php echo site_url() ?>">Home</a></li>
			<li class="active"><strong>CONTACT US</strong></li>
			</ol>
			</div>
			
				
			
            	

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
            
            <div class="col-md-4 col-xs-12">
                	
				<div class="news-widget">

			<!-- NEWS TERBARU -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="media-heading"><i class="fa fa-newspaper-o"></i> Latest News</h4>
				</div>

				<div class="panel-body">

	<div class="media">
  		<div class="media-left media-top">
    	<a href="<?php echo site_url('articles/detail') ?>">
			<img class="media-object" src="<?php echo base_url(); ?>images/video/video1.jpg" alt="">
		</a>
  		</div>
  		<div class="media-body">
			<h4 class="media-heading">
			<a class="title-news" href="<?php echo site_url('articles/detail') ?>">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</a>
			</h4>
    		<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
  		</div>
	</div>

	<div class="media">
  		<div class="media-left media-top">
    	<a href="<?php echo site_url('articles/detail') ?>">
			<img class="media-object" src="<?php echo base_url(); ?>images/video/video2.jpg" alt="">
		</a>
  		</div>
  		<div class="media-body">
			<h4 class="media-heading">
			<a class="title-news" href="<?php echo site_url('articles/detail') ?>">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</a>
			</h4>
    		<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
  		</div>
	</div>

	<div class="media">
  		<div class="media-left media-top">
    	<a href="<?php echo site_url('articles/detail') ?>">
			<img class="media-object" src="<?php echo base_url(); ?>images/video/video2.jpg" alt="">
		</a>
  		</div>
  		<div class="media-body">
			<h4 class="media-heading">
			<a class="title-news" href="<?php echo site_url('articles/detail') ?>">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</a>
			</h4>
    		<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
  		</div>
	</div>

	</div>
	</div>

	<!-- ARTIKEL TERBARU -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="media-heading"><i class="fa fa-edit"></i> Latest Articles</h4>
		</div>

		<div class="panel-body">

<div class="media">
	<div class="media-left media-top">
	<a href="<?php echo site_url('articles/detail') ?>">
	<img class="media-object" src="<?php echo base_url(); ?>images/video/video1.jpg" alt="">
</a>
	</div>
	<div class="media-body">
	<h4 class="media-heading">
	<a class="title-news" href="<?php echo site_url('articles/detail') ?>">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</a>
	</h4>
		<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
	</div>
</div>

<div class="media">
	<div class="media-left media-top">
	<a href="<?php echo site_url('articles/detail') ?>">
	<img class="media-object" src="<?php echo base_url(); ?>images/video/video2.jpg" alt="">
</a>
	</div>
	<div class="media-body">
	<h4 class="media-heading">
	<a class="title-news" href="<?php echo site_url('articles/detail') ?>">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</a>
	</h4>
		<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
	</div>
</div>

<div class="media">
	<div class="media-left media-top">
	<a href="<?php echo site_url('articles/detail') ?>">
	<img class="media-object" src="<?php echo base_url(); ?>images/video/video2.jpg" alt="">
</a>
	</div>
	<div class="media-body">
	<h4 class="media-heading">
	<a class="title-news" href="<?php echo site_url('articles/detail') ?>">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</a>
	</h4>
		<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
	</div>
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