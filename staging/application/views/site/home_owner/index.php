<section class="header-section home-owner-header">
    <nav class="navbar" role="navigation">
      <div class="row">
      <div class="col-md-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="800ms">
        <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" onclick="myFunction(this)">
            <span class="sr-only">Toggle navigation</span>
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
          </button>
          <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/logo-header.png" class="logo-home-owner "></a>
        </div>
      </div>
      <div class="col-md-6">
        <div id="navbar" class="navbar-collapse collapse">
           <ul class="nav navbar-nav navbar-left wow fadeInDown" data-wow-duration="1500ms" data-wow-delay="800ms">
                      <li><a class="top-menu" href="<?php echo base_url('site/home-owner'); ?>">Beranda</a></li>
                      <li><a class="top-menu" href="#tentang-kami">Tentang Kami</a></li>
                      <li><a href="#varian">Varian Produk</a></li>
                      <li><?php  if(!$this->session->userdata('id')){ ?><a class="top-menu" onClick="javascript:Registrasi();" class="btn-registrasi">Login</a> <?php } else { echo '<a class="top-menu" style="cursor:auto;">'.$this->session->userdata("nama").'</a>';  }?></li>
                        <?php  if($this->session->userdata('id')){ ?>
                         <li><li><a class="top-menu" href="<?php  echo base_url(); ?>members/logout">Logout</a></li></li>
                        <?php } ?>
                  </ul>
        </div><!--/.navbar-collapse -->
      </div>
     </div>
    </nav>
   <!-- HEADER -->
    <div class="jumbotron home-header-image">
      <div class="container">
       
        <div class="row">
        <div class="col-md-6 to-missing">
        </div>
        
           <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 landing-page-btn">
           <img src="<?php  echo base_url(); ?>assets/img/image-header-text.png" class="img-responsive wow fadeInDown" data-wow-duration="1500ms" data-wow-delay="800ms">
          <!--<p>This is a template for a simple marketing or informational website. It includes</p>-->
          <!--<p><a class="btn btn-primary" href="#" role="button">Learn more &raquo;</a> <a class="btn btn-primary" href="#" role="button">Learn more &raquo;</a></p>-->
          <ul>
          <li class="wow fadeInLeftBig" data-wow-duration="1500ms" data-wow-delay="800ms"><input type="radio" name="produk" value="Atap" id="atap" class="atap" onCLick="javascript:permintaan_produk('Atap');"> <label for="atap">Atap</label></li>
         <li class="wow fadeInRightBig" data-wow-duration="1500ms" data-wow-delay="800ms"><input class="rangka-baja" type="radio" name="produk" value="Rangka Baja Ringan" id="rangka-baja" onCLick="javascript:permintaan_produk('Rangka Baja Ringan');"> <label for="rangka-baja">Rangka Baja Ringan</label></li>
          <input type="hidden" id="id_users" name="id_users" value="<?php echo $this->session->userdata('id');?>">
          <input type="hidden" id="type" name="type" value="<?php echo $this->session->userdata('user');?>">
         </ul>
          
         <!-- <input type="text" id="autocomplete" class="form-control" placeholder="Atap"> <button class="btn-info" id="cari-produk">Cari</button>-->
         
  
        
          <!--<h2>JANGAN CARI MASALAH</h2>
          <H2><b>CARI BLUESCOPE ZACS<sup>TM</sup></b></H2>
          <h3>KUALITAS TERBAIK UNTUK ATAP,<BR>RANGKA BAJA RINGAN DAN DINDING ANDA</h3>-->
          
         
        </div>
        </div>
      </div>
    </div>
</section>

<!-- TENTANG KAMI -->
<section class="tentang-kami" id="tentang-kami">

      <div class="row">
       <!-- <div class="col-md-2 col-lg-2 col-sm-2 cl-xs-2">
          <img src="<?php echo base_url(); ?>assets/img/logo_bluescope.png" class="img-responsive">
        </div>-->
        <div class="col-md-9 col-lg-9 col-sm-10 col-xs-12 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="800ms">
          <img src="<?php echo base_url(); ?>assets/img/logo_bluescope.png" class="logo-bluescope"><h1>Tentang Kami</h1>
           <p>BlueScope adalah salah satu perusahaan baja lapis terdepan di dunia yang berdiri di Australia pada tahun 1885 dan menjadi pionir industri baja di dunia. BlueScope menjangkau pasar Amerika dan juga Asia, termasuk Indonesia.</p>

        <p>BlueScope mulai beroperasi di Indonesia pada tahun 1973 dan sejak saat itu, BlueScope terus berevolusi hingga pada tahun 2013 berubah nama menjadi PT. NS BlueScope Indonesia.</p>

      <p>BlueScope terus-menerus berkomitmen untuk memberikan produk-produk baja lapis yang berkualitas tinggi guna memenuhi kebutuhan dan permintaan konsumen di Indonesia.</p>
       
        </div>
        <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
          <img src="<?php echo base_url(); ?>assets/img/tentang-kami2.jpg" class="img-responsive right-img wow fadeInLeftBig" data-wow-duration="1500ms" data-wow-delay="800ms">
        </div>
      </div>
</section>   
  
</section>
 
          <section class="tentang-kami-bottom">
              <div class="container">
            <div class="col-md-10 col-lg-10 col-sm-10 col-xs-12 wow fadeInLeftBig" data-wow-duration="1500ms" data-wow-delay="800ms">
               <h1>Mengapa Pilih BlueScope Zacs™</h1>
              <p>BlueScope Zacs™ hadir sebagai inovasi pertama di Indonesia, memberikan kenyamanan sekaligus estetika bagi hunian Anda. Dilapisi substrat inovatif AZ100 (43,5% zinc 55% aluminium dan 1,5% silicon), BlueScope Zacs™ menjadikan suhu permukaan atap rumah lebih dingin hingga 6° Celcius dibandingkan dengan atap metal biasa. Hadir dengan berbagai pilihan warna, BlueScope Zacs™ memberikan jaminan ketahanan warna hingga 5 tahun serta ketahanan terhadap karat hingga 10 tahun.</p>
                  <div class="row">
                        <div class="col-md-6">
                           <img src="<?php echo base_url(); ?>assets/img/tentang-kami-logo.png" class="img-responsive">
                        </div>
                        <div class="col-md-6">
                          <h4 style="color:#fff;">KUALITAS TERBAIK UNTUK ATAP,<BR> RANGKA BAJA RINGAN DAN DINDING</h4>
                         
                        </div>
                   </div>
            </div>
            <div class="col-md-2 col-lg-2 col-sm-2 col-xs-12 wow fadeInRightBig" data-wow-duration="1500ms" data-wow-delay="800ms">
              <img src="<?php echo base_url(); ?>assets/img/sizaki.png" class="img-responsive">
            </div>
          </div>
      </section>
<!-- VIDEO -->
    <section class="event">
    <div class="container">
      <h1> <span>Video Zaki</span></h1>
      <div class="row">
        <?php foreach ($video as $videoR) {
        ?>
        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
          <div class="thumbnail" onClick="javascript:video(<?php  echo $videoR->id_video; ?>);">
         <img src="<?php  echo base_url(); ?>assets/file/video/<?php echo $videoR->id_video;  ?>.<?php echo $videoR->image;  ?>" class="img-responsive wow flipInY" data-wow-duration="1500ms" data-wow-delay="800ms">
          <h4> <?php echo $videoR->judul_video;  ?> </h4>
        </div>
        </div>
        <?php
      }
        ?>

      </div>
    </div>
  </section>  
<!-- TESTIMONIAL  -->
<!--<section class="testimoni" id="testimoni">
    <div class="container">

    <div class="row">
      <div class="col-md-12 col-centered">
            <h1> <span>GALLERY</span></h1>
            <br>
             
                <div id="carousel-galery" class="carousel slide" data-ride="carousel" data-type="multi" data-interval="false">
                  <div class="carousel-inner">
                   
                     <?php
                    $no=1;
                      foreach ($galery as $galeryR) {
                        ?>
                           <div class="item <?php  if($no==1){ echo "active";} ?>">
                              <div class="carousel-col">
                                <img src="<?php echo base_url(); ?>assets/file/galery/<?php echo $galeryR->id_news_galery.".".$galeryR->image;?>" class="block img-responsive" onClick="javascript:galery(<?php echo $galeryR->id_news_galery;?>);">
                                 <div class="carousel-caption" onClick="javascript:galery(<?php echo $galeryR->id_news_galery;?>);">
                                    <p><?php  echo $galeryR->title; ?></p>
                                  </div>
                              </div>
                            </div>
                        <?php
                       $no++;
                      }
                    ?>
                  </div>

       
        <div class="left carousel-control">
            <a class="left carousel-control" href="#carousel-galery" data-slide="prev">
                <span class="glyphicon nav-produk-left"><img src="<?php echo base_url(); ?>assets/img/produk_nav_left.png"></span>
                <span class="sr-only">Previous</span>
              </a>
        </div>
        <div class="right carousel-control">
          <a class="right carousel-control" href="#carousel-galery" data-slide="next">
                <span class="glyphicon nav-produk-right"><img src="<?php echo base_url(); ?>assets/img/produk_nav_right.png"></span>
                <span class="sr-only">Next</span>
              </a>
        </div>
      </div>   
        </div>
          </div> 
      
    </div>
  </div>
  </section>-->
<!-- VARIAN BLUESCOPE -->
  <section class="varian varian-home-owner" id="varian">
    <div class="container">
        <div class="row">
          <div class="col-md-12 col-centered">
            <h1><span>Varian Produk</span></h1>
            <br>
              <!-- SLIDER CAROUSEL-->
               <div id="carousel" class="carousel slide" data-ride="carousel" data-type="multi" data-interval="false">
                  <div class="carousel-inner">
                      <?php
                    $no=1;
                      foreach ($produk as $prod) {
                        ?>
                           <div class="item <?php  if($no==1){ echo "active";} ?>">
                              <div class="carousel-col">
                                <img src="<?php echo base_url(); ?>assets/file/produk/<?php echo $prod->id_produk.".".$prod->image;?>" class="block img-responsive wow flipInY" onClick="javascript:produk(<?php echo $prod->id_produk;?>);"  data-wow-duration="1500ms" data-wow-delay="800ms">
                              </div>
                            </div>
                        <?php
                       $no++;
                      }
                    ?>
                  </div>

        <!-- Controls -->
        <div class="left carousel-control">
            <a class="left carousel-control" href="#carousel" data-slide="prev">
                <span class="glyphicon nav-produk-left"><img src="<?php echo base_url(); ?>assets/img/produk_nav_left.png"></span>
                <span class="sr-only">Previous</span>
              </a>
        </div>
        <div class="right carousel-control">
          <a class="right carousel-control" href="#carousel" data-slide="next">
                <span class="glyphicon nav-produk-right"><img src="<?php echo base_url(); ?>assets/img/produk_nav_right.png"></span>
                <span class="sr-only">Next</span>
              </a>
        </div>
      </div>    
        </div>
      </div>
  </section>
  <!-- LOKASI TOKO -->
   <section class="lokasi lokasi-homeowner" id="lokasi">
     <div class="container">
      <h1><span>Lokasi Kami</span></h1>
      <div class="panel-body">
          <div class="row">
            <div class="navigator">
                  <span class="active" id="toko">
                          <a >TOKO</a>
                  </span>
                  <span id="applicator">
                          <a >APPLICATOR</a>
                  </span>
          </div>
            <div id="lokasi-toko">
                 <div class="col-md-12">
                            <?php  foreach ($lokasi as $lokasiR) {
                              ?>
                            <div class="col-md-2 col-lg-2 col-sm-4 col-xs-6">
                                <button style="background:url(<?php echo base_url(); ?>assets/file/lokasi/icon/<?php echo $lokasiR->id_lokasi;  ?>.png) no-repeat;" class="btn btn-info btn-lokasi wow flipInY" onClick="javascript:lokasi(<?php echo $lokasiR->id_lokasi;  ?>);" data-wow-duration="1500ms" data-wow-delay="800ms"><?php  echo $lokasiR->kota; ?></button>
                            </div>
                              <?php  } ?>
                               
                    </div>
              </div>
              <div id="lokasi-applicator">
                   <div class="col-md-12">
                        <?php  foreach ($applicator as $applicatorR) {
                              ?>
                            <div class="col-md-2 col-lg-2 col-sm-4 col-xs-6">
                                <button style="background:url(<?php echo base_url(); ?>assets/file/applicator/icon/<?php echo $applicatorR->kota;  ?>.png) no-repeat;" class="btn btn-info btn-applicator wow flipInY" onClick="javascript:ShowApp('<?php echo $applicatorR->kota;  ?>');" data-wow-duration="1500ms" data-wow-delay="800ms"><?php  echo $applicatorR->kota; ?></button>
                            </div>
                              <?php  } ?>
                   </div>
              </div>
              
          </div>
    </div>
  </div>
  </section>
  
  <!-- TIPS ZAKI -->
  <section class="tips tips-home-owner">
  <div id="slideshow-mudah" class="carousel slide" data-ride="false">
      <div class="row">
         <h1><span>Tips Zaki</span></h1>
      <div class="carousel-inner">
       
       <?php
              $no=1;
                foreach ($tips_zaki as $tips) {
                ?>
                <div class="item <?php if($no==1) {echo 'active';}?>">
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 tips-left wow flipInY" data-wow-duration="1500ms" data-wow-delay="800ms">
                <h2><?php  echo $tips->title; ?></h2>
                 <p> <?php echo $tips->deskripsi; ?></p>
                <a href="<?php echo base_url(); ?>site/tips_zaki/home_owner/<?php echo $tips->url; ?>"><i>Selengkapnya...</i></a>
               </div>
               <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 tips-right">
                <img src="<?php echo base_url(); ?>assets/file/tzaki/<?php echo $tips->id_tzaki.".".$tips->image;?>" style="height:100%;width:100%;">
               </div>
               </div>

                <?php 
                $no++;
              }?>
     
     
    </div>

  <!-- Controls, Ini adalah Panah Kanan dan Kiri. item ini dapat dihapus jika tidak diperlukan-->
  <a class="left carousel-control" href="#slideshow-mudah" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" style="padding-left: 21px; color:#fff;"></span>
  </a>
  <a class="right carousel-control" href="#slideshow-mudah" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" style="color: #fff;"></span>
  </a>
</div>
</section>
