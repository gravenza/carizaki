<section class="detail">
    <nav class="navbar sahabat" role="navigation">
      <div class="row">
      <div class="col-md-2">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url(); ?>site/applicator"><img src="<?php echo base_url(); ?>assets/img/logo-header.png" class="logo-detail"></a>
        </div>
      </div>
      <div class="col-md-10">
        <div id="navbar" class="navbar-collapse collapse">
           <ul class="nav navbar-nav navbar-left">
                      <li><a class="top-menu" href="<?php echo base_url('site/applicator'); ?>">Beranda</a></li>
                      <li><a class="top-menu" href="<?php echo base_url('site/applicator/'); ?>#tentang-kami">Tentang Kami</a></li>
                      <li><a class="top-menu" href="<?php echo base_url('site/applicator/'); ?>#varian">Varian Produk</a></li>
                      <!--<li><a class="top-menu" href="<?php echo base_url('site/sahabat-inspirasi-baja'); ?>">Sahabat Inspirasi Baja</a></li>-->
                      <li> <?php  if(!$this->session->userdata('id')){ ?><a class="top-menu" onClick="javascript:Registrasi();" class="btn-registrasi">Daftar</a> <?php } else { echo '<a class="top-menu" href="">'.$this->session->userdata("nama").'</a>';  }?></li>
                  </ul>
        </div><!--/.navbar-collapse -->
      </div>
     </div>
    </nav>

</section>

<!-- TENTANG KAMI -->
<section class="sahabat-inspirasi-baja">
<img src="<?php  echo base_url(); ?>assets/img/sahabat-inspirasi-baja.png" onClick="javascript:gabung();" class="img-responsive">
</section>
