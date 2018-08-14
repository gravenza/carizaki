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
<section class="content-detail content-footer">
<div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Hubungi Kami</h1>
          <div class="main-content">
            <!-- <div class="form-group">
                  <label class="control-label col-sm-2" for="pilih-kantor">Lihat Kantor</label>
                    <div class="col-sm-10">
                  <select name="pilih-kantor" id="pilih-kantor" class="form-control">
                    <option value="">Lihat Lokasi Kantor</option>
                    <option>PT NS BLUESCOPE INDONESIA (Kantor Pusat dan Pabrik) </option>
                    <option>PT NS BLUESCOPE INDONESIA JAKARTA (Sales dan Marketing) </option>
                    <option>PT NS BLUESCOPE INDONESIA SURABAYA (Sales dan Marketing) </option>
                  </select>
                    </div>
                </div>-->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.3513895500796!2d106.81168111460543!3d-6.217306995499338!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f41d6aaaaaab%3A0x4307268fdb84a454!2sPT+NS+BLUESCOPE+INDONESIA!5e0!3m2!1sen!2sid!4v1514605661707" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                <br>
                <form  action="<?php  echo base_url(); ?>site/send-mail-hubungi-kami/home_owner" method="POST"  class="form-horizontal">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="nama-hubungi-kami">Nama<sup>*</sup></label>
                    <div class="col-sm-10">
                    <input type="text" name="nama-hubungi-kami" id="nama-hubungi-kami" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="tipe-pertanyaan">Tipe Pertanyaan<sup>*</sup></label>
                    <div class="col-sm-10">
                  <select name="tipe-pertanyaan" id="tipe-pertanyaan" class="form-control" required>
                    <option value="">Pilih Tipe Pertanyaan</option>
                    <option value="Pertanyaan Sales">Pertanyaan Sales </option>
                    <option value="Pertanyaan Teknikal">Pertanyaan Teknikal </option>
                    <option value="Pertanyaan Produk">Pertanyaan Produk</option>
                    <option value="Lain - lain">Lain-lain</option>
                  </select>
                    </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="pertanyaan">Deskripsi Pertanyaan Anda<sup>*</sup></label>
                    <div class="col-sm-10">
                    <textarea name="pertanyaan" id="pertanyaan" class="form-control" required></textarea>
                    </div>
                </div>
                 <div class="form-group">
                  <label class="control-label col-sm-2" for="email-hubungi-kami">Email<sup>*</sup></label>
                    <div class="col-sm-10">
                    <input type="email" name="email-hubungi-kami" id="email-hubungi-kami" class="form-control" required>
                    </div>
                </div>
                 <div class="form-group">
                  <label class="control-label col-sm-2" for="kontak">Nomor Kontak<sup>*</sup></label>
                    <div class="col-sm-10">
                    <input type="text" name="kontak" id="kontak" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="posisi-pekerjaan">Posisi Pekerjaan<sup>*</sup></label>
                    <div class="col-sm-10">
                    <input type="text" name="posisi-pekerjaan" id="posisi-pekerjaan" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="perusahaan" >Perusahaan<sup>*</sup></label>
                    <div class="col-sm-10">
                    <input type="text" name="perusahaan" id="perusahaan" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2"></label>
                    <div class="col-sm-10">
                    <button class="btn btn-info">Ajukan</button>
                    </div>
                </div>
              </form>
          </div>
      
        </div>


      </div>
</div>
  
</section>
