<section class="detail">
    <nav class="navbar" role="navigation">
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
<section class="content-detail">
<div class="container">
      <div class="row">
        <div class="col-md-8">
          <h1><?php  echo $detail->title; ?></h1>

          <div class="main-content">
            <p><?php  echo $detail->content; ?></p>
            <br>
            <table class="event-detail">
              <tr><td><img src="<?php echo base_url(); ?>assets/img/events.png"></td> <td> <b>Event Name</b>  <p>Lorem ipsum</p></td></tr>
                <tr><td><img src="<?php echo base_url(); ?>assets/img/title.png"></td> <td><b>Title</b> <p>Lorem ipsum</p></td></tr>
              <tr><td><img src="<?php echo base_url(); ?>assets/img/event.png"></td> <td><b>Date</b> <p>28 Desember 2017 , 13.00 - 15.00</p></td></tr>
              <tr><td><img src="<?php echo base_url(); ?>assets/img/address.png"></td> <td><b>Address</b><p>Kuningan</p></td></tr>
               <tr><td><img src="<?php echo base_url(); ?>assets/img/contact.png"></td> <td><b>Contact Person</b> <p>085719247322</p></td></tr>
                <tr><td><img src="<?php echo base_url(); ?>assets/img/followers.png"></td> <td><b>Followers</b> <p>1 - Persons</p></td></tr>
            </table>
            <button onClick="javascript:joinEvent(<?php echo $detail->id_event;?>);" class="btn btn-info btn-join">Join</button>
          </div>
       
        </div>
         <div class="col-md-4 artikel-populer">
         
            <table>
              <tr class="top"><td colspan="2"><h4>ARTIKEL TERPOPULER</h4></td></tr>
              <?php 
                $no=1;
                foreach ($populer as $pop) {   
                ?>
              <tr><td><h1><?php echo $no; ?>.</h1></td><td><a href="<?php  echo base_url(); ?>site/tips_zaki/applicator/<?php echo $pop->url; ?>"><h4><?php echo $pop->title; ?></h4></a> </td></tr>
              <?php $no++; 
              } ?>
            </table>
           
            
           

        </div>

      </div>
</div>
  
</section>
