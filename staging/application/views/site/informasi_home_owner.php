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
                      <li><?php  if(!$this->session->userdata('id')){ ?><a class="top-menu" onClick="javascript:Registrasi();" class="btn-registrasi">Daftar</a> <?php } else { echo '<a class="top-menu" href="">'.$this->session->userdata("nama").'</a>';  }?></li>
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
        <div class="col-md-12">
          <h1><?php  echo $privasi->judul; ?></h1>
          <div class="main-content content-footer">
            <p><?php  echo $privasi->konten; ?></p>
          </div>
      
        </div>


      </div>
</div>
  
</section>
