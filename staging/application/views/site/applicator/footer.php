<!--FOOTER-->
    <section class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12 footer-one wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="800ms">

            <img src="<?php echo base_url(); ?>assets/img/logo-header.png" class="img-responsive logo-footer">
            <p>Copyright <?php echo '20'.date('y');  ?> PT NS BlueScope Indonesia</p>
          </div>
          <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 footer-two wow fadeInDown" data-wow-duration="1500ms" data-wow-delay="800ms">
            <ul>
              <li><a href="<?php  echo base_url(); ?>site/syarat-dan-ketentuan/applicator">Syarat dan Ketentuan</a></li>
              <li><a href="<?php  echo base_url(); ?>site/kebijakan-privasi/applicator">Kebijakan Privasi</a></li>
              <!--<li><a href="">Peta Situs</a></li>-->
              <!--<li><a href="">Blog</a></li>-->
              <li><a href="<?php  echo base_url(); ?>site/hubungi-kami/applicator">Hubungi Kami</a></li>
            </ul>
          </div>
          <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12 newsletter footer-three wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="800ms">
            <h4>SUBSCRIBE NEWSLETTER</h4>
            <form action="https://3motion.us17.list-manage.com/subscribe/post?u=8c9be6d2edc13f11b03c2dfd2&amp;id=17ac29c58d" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <input type="email" placeholder="Email" name="EMAIL" class="required form-control" id="mce-EMAIL"> <button class="btn-info" id="mc-embedded-subscribe">Subscribe</button>
            </form>

            <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>

          </div>
          
        </div>
      </div>
    </section> <!-- /container -->  

    <div id="myModal" class="modal fade" role="dialog">
     <div class="container">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
               
              </div>
             
            </div>

          </div>
      </div>
</div>
  <div id="myModalNews" class="modal fade" role="dialog">
        <div class="container">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <img src="<?php echo base_url(); ?>assets/file/galery/1.png" class="img-responsive">
              </div>
             
            </div>

          </div>
        </div>
</div>
    <div id="myModal_lokasi" class="modal fade" role="dialog">
        <div class="container">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                       <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 image-popup">
                        </div>
                        <!--<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 review-popup">
                        </div>-->
                  </div>
              </div>
               
              </div>
             
            </div>

          </div>
        </div>
</div>
    <div id="myModal_registrasi" class="modal fade" role="dialog">
        <div class="container">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
              
                <div class="row">
                  <div class="col-md-12 registrasi-align">
                      <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 register-left">
                          <img src="<?php echo base_url(); ?>assets/img/logo-header.png" class="img-responsive register-logo">
                                                  <img src="<?php echo base_url(); ?>assets/img/desc.png" class="img-responsive">
                      
                      </div>
                       <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <form name="register-form" id="register-form" method="POST">
                       
                        <table>
                          <tr><td class="register-top"><strong>Daftarkan Diri Anda Sekarang</strong> </td></tr>
                          <tr><td><div id="error"></div></td></tr>
                          <tr> <td> <input type="text" name="nama" id="nama" class="form-control" Placeholder="Nama"> </td> </tr>
                          <tr> <td> <input type="text" name="alamat" id="alamat" class="form-control" Placeholder="Alamat"> </td> </tr>
                          <tr> <td> <select name="provinsi" id="provinsi" class="form-control" onchange="ajaxkota(this.value)">
                          <option value="">Pilih Provinsi</option>
                          <?php 
                          foreach ($propinsi as $key) {
                           echo '<option value="'.$key->lokasi_propinsi.'">'.$key->lokasi_nama.'</option>';
                          }
                           ?>
                          </select></td> </tr>
                            <tr> <td> <select name="kota" id="kota" class="form-control">
                          <option value="">Pilih Kota</option>
                          </select></td> </tr>

                          <tr> <td> <input type="text" name="telepon" id="telepon" class="form-control" Placeholder="Telepon"> </td> </tr>
                          <tr> <td> <input type="email" name="email" id="email" class="form-control" Placeholder="Email"> </td> </tr>
                          <tr> <td> <input type="password" name="password" id="password" class="form-control" Placeholder="Password"> </td> </tr>
                          <tr><td></td></tr>
                          <tr> <td class="register-bottom"> <span onClick="javascript=sign_up_applicator();">Daftar</span></td> </tr>
                        <tr> <td class="register-bottom"> <strong id="btn-login" class="btn-login">Login</strong></td> </tr>
                        </table>
                          </form>
                        <form name="login-form" id="login-form" method="POST">
                       
                        <table>
                          <tr><td class="register-top"><strong>Login</strong></td></tr>
                          <tr><td><div id="error-login"></div></td></tr>
                         
                          <tr> <td> <input type="email" name="email-login" id="email-login" class="form-control" Placeholder="Email"> </td> </tr>
                          <tr> <td> <input type="password" name="password-login" id="password-login" class="form-control" Placeholder="Password"> </td> </tr>
                          <tr><td></td></tr>
                          <tr> <td class="register-bottom"> <span  onClick="javascript=sign_in_applicator();">Login</span></td> </tr>
                          <tr> <td class="register-bottom"> <strong class="btn-daftar" id="btn-daftar">Daftar</strong> | <strong class="btn-daftar" id="btn-lupa-password">Lupa Password</strong></td> </tr>
                        
                        </table>
                         
                          </form>
                           <form name="lupa-password" id="lupa-password-form" method="POST">
                       
                        <table>
                          <tr><td class="register-top"><strong>Lupa Password</strong></td></tr>
                          <tr><td><div id="error-lp-password"></div></td></tr>
                         
                          <tr> <td> <input type="email" name="email-lp-password" id="email-lp-password" class="form-control" Placeholder="Masukkan email Anda"> </td> </tr>
                        
                          <tr><td></td></tr>
                          <tr> <td class="register-bottom"> <span  onClick="javascript=lupa_password_applicator();">Proses</span></td> </tr>
                          <tr> <td class="register-bottom"> <strong class="btn-daftar" id="btn-daftar-lp">Daftar</strong> | <strong id="btn-login-lp" class="btn-login">Login</strong></td> </tr>
                        
                        </table>
                         
                          </form>
                          
                        </div>

                  </div>
              </div>
               
              </div>
             
            </div>

          </div>
        </div>
</div>
 <div id="myModal_permintaan_produk" class="modal fade" role="dialog">
    <div class="container">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <!--<div class="modal-header">
              </div>-->
              <div class="modal-body">
                <div class="col-md-12" id="warna">
                    <img src="<?php echo base_url(); ?>assets/img/button-close.png" class="close" data-dismiss="modal">
                   <!-- <img src="<?php echo base_url(); ?>assets/img/progress1.png" class="img-responsive">
            
                  <h2>Pilih Produk Yang Kamu Inginkan</h2>
                  <div class="warna">
                   <center> <h3>Warna</h3> </center>
                  </div>
                  <div class="non-warna">
                   <center>  <h3>Non Warna</h3> </center>
                  </div>-->
                  <div class="row">
                  <div class="col-md-8 col-sm-8 col-xs-12">
                    <h3>Pilih produk BlueScope Zacs™ yang Anda inginkan</h3>
                  </div>
                  <div class="col-md-4 col-sm-8 col-xs-12">
                     <button class="btn btn-warna" id="img-warna">Warna</button> <button class="btn btn-non-warna" id="img-non-warna">Non warna</button>
                   <!-- <img src="<?php echo base_url(); ?>assets/img/warna.png" class="img-responsive" id="img-warna">
                    <img src="<?php echo base_url(); ?>assets/img/non-warna.png" class="img-responsive" id="img-non-warna">-->
                  </div>
                </div>
              </div>
              <div class="col-md-12" id="pilih-warna">
                   
                   <div class="row row-head">
                      <div class="col-md-8">
                        <h3>Pilih varian BlueScope Zacs™ sesuai kebutuhan Anda</h3>
                      </div>
                      <div class="col-md-4">

                         <img src="<?php echo base_url(); ?>assets/img/button-close.png" class="close" data-dismiss="modal">
                      </div>
                   </div>
                  <div class="row">
                      <div class="col-md-12 back-prod">
                          <!--<img src="<?php echo base_url(); ?>assets/img/produk.jpg" class="img-responsive">-->
                          <div class="overlay0" onClick="terimakasih(1);"><!--<div class="in-over"></div>--></div>
                          <div class="overlay1" onClick="terimakasih(2);"></div>
                           <div class="overlay2" onClick="terimakasih(3);"></div>
                            <div class="overlay3" onClick="terimakasih(4);"></div>
                      </div>
                  </div>
                   
              </div>
              <div class="col-md-12" id="last-popup">
                  <img src="<?php echo base_url(); ?>assets/img/button-close.png" class="close" data-dismiss="modal">
                <div class="row">

                   <div class="col-md-8 col-sm-8 col-xs-12">
                        <h3>Terimakasih atas ketertarikan Anda. Permintaan informasi telah di terima. Kami akan segera menghubungi Anda.</h3>
                      </div>
                       <div class="col-md-4 col-sm-8 col-xs-12">
                         <img src="<?php echo base_url(); ?>assets/img/button-ceklist.png" class="close ceklist-popup" data-dismiss="modal">
                      </div>
                </div>
              </div>
           
            </div>

          </div>
    </div>
</div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.js"><\/script>')</script>

        <script src="<?php echo base_url(); ?>assets/js/vendor/bootstrap.min.js"></script>
         <script src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/main.js?ver=1.1"></script>
        <script type="text/javascript" src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/vendor/jquery.autocomplete.min.js"></script>
       <script src="<?php echo base_url();?>assets/js/vendor/jquery.rwdImageMaps.js"></script>			<!-- Global site tag (gtag.js) - Google Analytics -->		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112480351-1"></script>		<script>		  window.dataLayer = window.dataLayer || [];		  function gtag(){dataLayer.push(arguments);}		  gtag('js', new Date());		  gtag('config', 'UA-112480351-1');		</script>
    
        
    </body>
</html>