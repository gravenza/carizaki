	<section class="home-slider">
	
		<div id="carousel" class="carousel slide" data-ride="carousel">
		
		<ol class="carousel-indicators">
		<li data-target="#carousel" data-slide-to="0" class="active"></li>
		<li data-target="#carousel" data-slide-to="1"></li>
		</ol>
		
		<div class="carousel-inner" role="listbox">
		
		<div class="item active parallax parallax-slider" data-speed="4" style="background-image:url(<?php echo base_url().'images/slider/slide1.jpg' ?>)">
		<!-- <img src="..." alt="..."> -->
			<div class="carousel-caption">
				<img src="<?php echo base_url().'images/slider/caption-slider.png' ?>"  />
				<div class="nav-feature row">
				<?php if($this->session->userdata('logged_in') == Null): ?>
				<a class="col-md-4 col-xs-4 bounceIn text-left" data-toggle="modal" data-target="#modal-login" data-wow-duration="0.5s" data-wow-delay="1s" href="#">
					<img src="<?php echo base_url('images/btn-atap.png') ?>" />
				</a>
				<a class="col-md-8 col-xs-8 bounceIn text-left" data-toggle="modal" data-target="#modal-login" data-wow-duration="0.5s" data-wow-delay="1s" href="#">
					<img src="<?php echo base_url('images/btn-rangka.png') ?>" />
				</a>
				<?php else: ?>
				<a class="col-md-4 col-xs-4 bounceIn text-left" data-toggle="modal" data-target=".modal-atap" data-wow-duration="0.5s" data-wow-delay="1s" href="#"><img src="<?php echo base_url('images/btn-atap.png') ?>" /></a>
				<a class="col-md-8 col-xs-8 bounceIn text-left" onclick="pilihnocolor(6)" data-wow-duration="0.5s" data-wow-delay="1s" href="#"><img src="<?php echo base_url('images/btn-rangka.png') ?>" /></a>
				<?php endif ?>
				</div>							
			</div>
		</div>
		
		<div class="item parallax parallax-slider" data-speed="4" style="background-image:url(<?php echo base_url().'images/slider/slide2.jpg' ?>)">
		<!-- <img src="..." alt="..."> -->
			<div class="carousel-caption">
			<img src="<?php echo base_url().'images/slider/caption-slider.png' ?>"  />
			<div class="nav-feature row">
				<?php if($this->session->userdata('logged_in') == Null): ?>
				<a class="col-md-4 col-xs-4 bounceIn text-left" data-toggle="modal" data-target="#modal-login" data-wow-duration="0.5s" data-wow-delay="1s" href="#">
					<img src="<?php echo base_url('images/btn-atap.png') ?>" />
				</a>
				<a class="col-md-8 col-xs-8 bounceIn text-left" data-toggle="modal" data-target="#modal-login" data-wow-duration="0.5s" data-wow-delay="1s" href="#">
					<img src="<?php echo base_url('images/btn-rangka.png') ?>" />
				</a>
				<?php else: ?>
				<a class="col-md-4 col-xs-4 bounceIn text-left" data-toggle="modal" data-target=".modal-atap" data-wow-duration="0.5s" data-wow-delay="1s" href="#"><img src="<?php echo base_url('images/btn-atap.png') ?>" /></a>
				<a class="col-md-8 col-xs-8 bounceIn text-left" onclick="pilihnocolor(6)" data-wow-duration="0.5s" data-wow-delay="1s" href="#"><img src="<?php echo base_url('images/btn-rangka.png') ?>" /></a>
				<?php endif ?>
			</div>
			</div>
		</div>    
		</div>
		</div>
		<div class="triangle-slide"></div>
	</section>
	
	<!-- =================MODAL ATAP START================= -->
		<div class="modal fade modal-atap" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		  <div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6 col-xs-12 caption-atap">
							<div class="middle">
								<div class="middle-frame">
									<div class="inner">
										<img src="<?php echo base_url('images/caption-atap.png') ?>" />
										<div class="row nav-optional-color">
											<a class="col-md-6 col-xs-12" id="btn-warna" href="#"><img src="<?php echo base_url('images/btn-warna.png') ?>" /></a>
											<a class="col-md-6 col-xs-12" href="#" id="btn-nonwarna" onclick="pilihnocolor(4)"><img src="<?php echo base_url('images/btn-nonwarna.png') ?>" /></a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-xs-12">
							<div class="bg-atap">
								<img src="<?php echo base_url('images/bg-atap.png') ?>" />
							</div>
						</div>
					</div>
				</div>
			</div>
		  </div>
		</div>
	<!-- =================MODAL ATAP END================= -->
	
	<!-- =================MODAL ATAP WARNA START================= -->
		<div class="modal fade modal-atap-warna" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		  <div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-4 col-xs-12 caption-atap">
							<div class="middle">
								<div class="middle-frame">
									<div class="inner">
										<img src="<?php echo base_url('images/caption-atap.png') ?>" />
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-8 col-xs-12">
							<div class="optional-atap row">
								<div class="col-md-3 col-xs-3">
									<div class="thumbnail natural" onclick="pilihproduk(2)">
										<img src="<?php echo base_url('assets/file/produk').'/2.jpg' ?>" />
									</div>
								</div>
								<div class="col-md-3 col-xs-3">
									<div class="thumbnail cool" onclick="pilihproduk(3)">
										<img src="<?php echo base_url('assets/file/produk').'/3.jpg' ?>" />
									</div>
								</div>
								<div class="col-md-3 col-xs-3">
									<div class="thumbnail truss" onclick="pilihproduk(5)">
										<img src="<?php echo base_url('assets/file/produk').'/5.jpg' ?>" />
									</div>
								</div>
								<div class="col-md-3 col-xs-3">
									<div class="thumbnail paint" onclick="pilihproduk(1)">
										<img src="<?php echo base_url('assets/file/produk').'/1.jpg' ?>" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		  </div>
		</div>
	<!-- =================MODAL ATAP WARNA END================= -->
	
	<!-- =================MODAL ATAP NOTIFICATION START================= -->
		<div class="modal fade modal-atap-notification" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		  <div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12 col-xs-12 caption-notification">
							<div class="thumbnail">
								<img src="<?php echo base_url('images/product/product-notification.jpg') ?>" />
							</div>
						</div>
					</div>
				</div>
			</div>
		  </div>
		</div>
	<!-- =================MODAL ATAP NOTIFICATION END================= -->