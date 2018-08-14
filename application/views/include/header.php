<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>BlueScope Zacs Indonesia - Cari Zaki</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">

<link rel="shortcut icon" href="<?php echo base_url('favicon.png') ?>" type="image/x-icon">
<link rel="icon" href="<?php echo base_url('favicon.png') ?>" type="image/x-icon">

<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.countup.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/plugins/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/wow.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.bxslider.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/form.validation.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.slicknav.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/masonry.pkgd.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/imagesloaded.pkgd.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/sim.js"></script>

<!-- <link rel="shortcut icon" href="http://www.carizaki.com/assets/img/favicon.png"> -->

<?php if($this->uri->segment(1) == 'homeowner'): ?>
<script type="text/javascript" src="<?php echo base_url(); ?>js/homeowner.js"></script>
<?php endif ?>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '195125681119508');
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1"
src="https://www.facebook.com/tr?id=195125681119508&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112480351-1"></script>
		<script>		  window.dataLayer = window.dataLayer || [];		  function gtag(){dataLayer.push(arguments);}		  gtag('js', new Date());		  gtag('config', 'UA-112480351-1');
		</script>

</head>

<body>

<header class="l">

	<?php //var_dump( $this->session->all_userdata()); ?>

	<section class="ontop hidden">
	<div class="container">
	<div class="clearer" style="margin:0">
	<div class="row">
		<div class="col-md-4 col-xs-12">
		<div class="entry-account">
		<a href="#"><i class="fa fa-user-plus"></i> Register</a>
		<a href="#"><i class="fa fa-sign-in"></i> Login</a>
		</div>
		</div>

		<div class="col-md-4 col-md-offset-4 col-xs-12">
			<div class="socmed">
			<a href=""><i class="fa fa-search"></i></a>
			<a href=""><i class="fa fa-facebook"></i></a>
			<a href=""><i class="fa fa-twitter"></i></a>
			<a href=""><i class="fa fa-instagram"></i></a>
			</div>
		</div>
	</div>
	</div>
	</div>
	</section>

	<div class="container">

    <div class="clearer" style="margin:0;">
	<div class="row">

	<div class="col-md-3 col-xs-8">
		<div class="logo">
			<a href="<?php echo site_url(); ?>"><img src="<?php echo base_url(); ?>images/logo.png"/></a>
		</div>
    </div>

	<div class="col-md-9 hidden-xs">
		<?php if($this->uri->segment(1) == 'homeowner'): ?>
		<ul class="menu">
		<li><a class="<?php echo activate_menu('home') ?>" href="<?php echo site_url('homeowner'); ?>">Home</a></li>

		<?php if($this->uri->segment(2) == ''): ?>
        <li><a class="<?php echo activate_menu('about') ?>" href="#about">Tentang Kami</a></li>
        <li><a class="<?php echo activate_menu('services') ?>" href="#product">Varian Produk</a></li>
		<?php else: ?>
		<li><a id="anchor-about" data-url="homeowner" class="<?php echo activate_menu('about') ?>" href="#">Tentang Kami</a></li>
        <li><a id="anchor-product" data-url="homeowner" class="<?php echo activate_menu('product') ?>" href="#">Varian Produk</a></li>
		<?php endif ?>

        <li><a class="<?php echo activate_menu('homeowner/promo') ?>" href="<?php echo site_url('homeowner/promo') ?>">Promo</a></li>
		<?php if($this->session->userdata('logged_in') == Null): ?>
		<li><a href="#" data-toggle="modal" data-target="#modal-login">Login</a></li>
		<?php else: ?>
		<li><a href="<?php echo site_url('members/logout') ?>">Logout</a></li>
		<?php endif ?>
        </ul>
		<?php elseif($this->uri->segment(1) == 'applicator'): ?>
		<ul class="menu">
		<li><a class="<?php echo activate_menu('home') ?>" href="<?php echo site_url('applicator'); ?>">Home</a></li>

    <?php if($this->uri->segment(2) == ''): ?>
      <li><a class="<?php echo activate_menu('about') ?>" href="#about">Tentang Kami</a></li>
      <li><a class="<?php echo activate_menu('services') ?>" href="#product">Varian Produk</a></li>
		<?php else: ?>
		  <li><a id="anchor-about" data-url="applicator" class="<?php echo activate_menu('about') ?>" href="#">Tentang Kami</a></li>
      <li><a id="anchor-product" data-url="applicator" class="<?php echo activate_menu('product') ?>" href="#">Varian Produk</a></li>
		<?php endif ?>

      <li><a class="<?php echo activate_menu('homeowner/promo') ?>" href="<?php echo site_url('applicator/promo') ?>">Promo</a></li>

    <?php if($this->session->userdata('logged_in_app') == Null): ?>
		<li><a href="#" data-toggle="modal" data-target="#modal-login">Login</a></li>
		<?php else: ?>
		<li><a href="<?php echo site_url('members/logout') ?>">Logout</a></li>
		<?php endif ?>
    </ul>
		<?php else: ?>
		<ul class="menu menu-intro">
		<?php if($this->session->userdata('logged_in_app') != Null || $this->session->userdata('logged_in') != Null): ?>
		<!-- <li><a href="<?php echo site_url('members/logout') ?>">Logout</a></li> -->
		<?php else: ?>
		<!-- <li><a href="#" data-toggle="modal" data-target="#modal-login">Login</a></li> -->
		<?php endif ?>
    </ul>
		<?php endif ?>
	</div>

    </div>
	</div>

	</div>
</header>

<div id="modal-login" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

		<div class="container-fluid">
		<div class="row">
			<div class="col-md-5 col-md-offset-7 col-xs-12">
			<div class="middle">
			<div class="middle-frame">
			<div class="inner">
				<h3 class="title-formlogin">Login</h3>
				<div id="error-login"></div>
				<form id="login-form" class="form-login" method="POST" name="login-form" enctype="application/x-www-form-urlencoded" style="text-align:center">
					<div class="form-group">
						<input type="email" id="email-login" name="email-login" placeholder="Email" class="form-control" />
					</div>

					<div class="form-group">
						<input type="password" id="password-login" name="password-login" placeholder="Password" class="form-control" />
					</div>

					<div class="form-group">
						<?php if($this->uri->segment(1) == 'homeowner'): ?>
						<input type="button" id="btnLogin-homeowner" onclick="javascript=sign_in_homeowner();" name="" value="Login" class="btn btn-primary" />
						<?php else: ?>
						<input type="button" id="btnLogin-homeowner" onclick="javascript=sign_in_applicator();" name="" value="Login" class="btn btn-primary" />
						<?php endif ?>
					</div>

					<p><span class="btn-daftar">Daftar</span> | <span class="btn-forgot">Lupa Password</span></p></p>

				</form>

				<h3 class="title-formforgot">Forgot Password</h3>
				<div id="error-lp-password"></div>
				<form id="forgot-form" class="form-forgotpassword" method="post" action="<?php echo site_url('site/lupa_password_homeowner') ?>" enctype="application/x-www-form-urlencoded" style="text-align:center">

					<div class="form-group">
						<input type="email" id="email-lp-password" name="email" placeholder="Email" class="form-control" />
					</div>

					<div class="form-group">
						<?php if($this->uri->segment(1) == 'homeowner'): ?>
						<input type="button" onclick="javascript=lupa_password_homeowner();" name="" value="Forgot Password" class="btn btn-primary" />
						<?php else: ?>
						<input type="button" onclick="javascript=lupa_password_applicator();" name="" value="Forgot Password" class="btn btn-primary" />
						<?php endif ?>
					</div>

					<p><span class="btn-login">Login</span> | <span class="btn-daftar">Daftar</span></p>

				</form>
			</div>
			</div>
			</div>
			</div>
		</div>
		</div>

    </div>
  </div>
</div>

<div id="modal-register" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

		<div class="container-fluid">
		<div class="row">
			<div class="col-md-5 col-md-offset-7 col-xs-12">
			<div class="middle">
			<div class="middle-frame">
			<div class="inner">

				<h3 class="title-daftar">Daftar</h3>
				<div id="error"></div>
				<form id="register-form" class="form-daftar" method="POST" name="register-form" enctype="application/x-www-form-urlencoded" style="text-align:center">
					<div class="form-group">
						<input id="nama" type="text" name="nama" placeholder="Nama" class="form-control" />
					</div>
					<div class="form-group">
						<input id="alamat" type="text" name="alamat" placeholder="Alamat" class="form-control" />
					</div>
					<div class="form-group">
						<select onchange="ajaxkota(this.value)" id="provinsi" type="text" name="provinsi" placeholder="Provinsi" class="form-control">
							<option value="">==Pilih Provinsi==</option>
							<?php

							$dataProvinsi = $this->db->where('lokasi_ID <=',32)->order_by('lokasi_ID','ASC')->get('tbl_inf_lokasi');

							if($dataProvinsi->num_rows() > 0):
							foreach($dataProvinsi->result_array() as $row):
							?>

							<option value="<?php echo $row['lokasi_propinsi'] ?>"><?php echo $row['lokasi_nama'] ?></option>

							<?php endforeach ?>
							<?php endif ?>

						</select>
					</div>
					<div class="form-group">
						<select name="kota" id="kota" class="form-control">
							<option value="">==Pilih Kota==</option>
                        </select>
					</div>
					<div class="form-group">
						<input id="telepon" type="tel" name="telepon" placeholder="Telepon" class="form-control" />
					</div>
					<div class="form-group">
						<input id="email" type="text" name="email" placeholder="Email" class="form-control" />
					</div>
					<div class="form-group">
						<input id="password" type="password" name="password" placeholder="Password" class="form-control" />
					</div>

					<div class="form-group">
						<?php if($this->uri->segment(1) == 'homeowner'): ?>
						<input type="button" onclick="sign_up_homeowner();" name="" value="Daftar" class="btn btn-primary" />
						<?php else: ?>
						<input type="button" onclick="javascript=sign_up_applicator();" name="" value="Daftar" class="btn btn-primary" />
						<?php endif; ?>
					</div>

					<p><span class="btn-login">Login</span></p>

				</form>
			</div>
			</div>
			</div>
			</div>
		</div>
		</div>

    </div>
  </div>
</div>
