<section class="detail">
    <nav class="navbar" role="navigation">
      <div class="container">
     <div class="row">
      <div class="col-md-2">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" onclick="myFunction(this)">
            <span class="sr-only">Toggle navigation</span>
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
          </button>
          <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/logo-header.png" class="logo-detail"></a>
        </div>
         </div>
        <div class="col-md-10">
        <div id="navbar" class="navbar-collapse collapse">
           <ul class="nav navbar-nav navbar-left">
                      <li><a class="top-menu" href="<?php echo base_url('site/home-owner'); ?>">Beranda</a></li>
                      <li><a class="top-menu" href="<?php echo base_url('site/home-owner'); ?>#tentang-kami">Tentang Kami</a></li>
                      <li><a href="<?php echo base_url('site/home-owner'); ?>#varian">Varian Produk</a></li>
                      <li><?php  if(!$this->session->userdata('id')){ ?><a class="top-menu" onClick="javascript:Registrasi();" class="btn-registrasi">Login</a> <?php } else { echo '<a class="top-menu" style="cursor:auto;">'.$this->session->userdata("nama").'</a>';  }?></li>
                   <?php  if($this->session->userdata('id')){ ?>
                         <li><li><a class="top-menu" href="<?php  echo base_url(); ?>members/logout">Logout</a></li></li>
                        <?php } ?>
                  </ul>
        </div><!--/.navbar-collapse -->
       </div>
      </div>
     </div>
    </nav>

</section>

<!-- TENTANG KAMI -->
<section class="content-detail">
<div class="container">
      <div class="row">
        <div class="col-md-8">
          <h1><?php  echo $detail->title; ?></h1>
          <div class="share">
         
           <a href="http://www.facebook.com/sharer.php?u=<?php echo urlencode('http://staging.carizaki.com/site/tips_zaki/applicator/'.$detail->url.''); ?>" target="_blank">
            <img src="<?php echo base_url(); ?>assets/img/facebook.png">
          </a>
          <a href="https://twitter.com/share?url=<?php echo base_url(); ?>site/tips_zaki/<?php echo $detail->url; ?>&amp;hashtags=Bluescopezacs" target="_blank">
            <img src="<?php echo base_url(); ?>assets/img/twitter.png">
          </a>
           <a href="https://plus.google.com/share?url=<?php echo base_url(); ?>site/tips_zaki/<?php echo $detail->url; ?>" target="_blank">
            <img src="<?php echo base_url(); ?>assets/img/google_plus.png">
          </a>
      <!--    <div class="komentar">
            <img src="<?php echo base_url(); ?>assets/img/sh-com.png">
            <span>0 komentar</span>
          </div> -->
           
          </div>
          <div class="main-content">
            <img src="<?php echo base_url(); ?>assets/file/tzaki/<?php echo $detail->id_tzaki.".".$detail->image;?>" class="img-responsive">

            <br>
            <p><?php  echo $detail->content; ?></p>
          </div>
          <h3>ARTIKEL TERKAIT</h3>
          <div class="row">
          <div class="artikel-terkait">
            <?php  foreach ($related as $relatedR) {
            ?>
            <a href="<?php echo base_url();?>site/tips_zaki/home_owner/<?php echo $relatedR->url; ?>">
                  <div class="col-md-4">
                  <img src="<?php echo base_url(); ?>assets/file/tzaki/<?php echo $relatedR->id_tzaki."_thumb.".$relatedR->image;?>" class="img-responsive">
                  <h3><?php echo $relatedR->title;  ?> </h3>
                </div>
              </a>
            <?php  } ?>
               </div>
               
          </div>
        </div>
        <div class="col-md-4 artikel-populer">
         
            <table>
              <tr class="top"><td colspan="2"><h4>ARTIKEL TERPOPULER</h4></td></tr>
              <?php 
                $no=1;
                foreach ($populer as $pop) {   
                ?>
              <tr><td><h1><?php echo $no; ?>.</h1></td><td><a href="<?php  echo base_url(); ?>site/tips_zaki/home_owner/<?php echo $pop->url; ?>"><h4><?php echo $pop->title; ?></h4></a> </td></tr>
              <?php $no++; 
              } ?>
            </table>
           
            
           

        </div>

      </div>
</div>
  
</section>
