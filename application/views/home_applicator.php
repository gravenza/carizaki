<?php include "include/header.php"; ?>

<content class="applicator">
	<?php include "include/slider-applicator.php"; ?>

<section class="about" id="about">
	<div class="skew skew-about">	<div class="container">
    	<div class="clearer cellpadding" style="overflow:hidden;">
			<div class="row">
				<div class="col-md-8 col-xs-12 servicesOnScroll" data-animation="bounceInLeft" data-timeout="100">
				<img src="<?php echo base_url('images/bluescope.png') ?>"  />
				<p>BlueScope adalah salah satu perusahaan baja lapis terdepan di dunia yang berdiri di Australia pada tahun 1885 dan menjadi pionir industri baja di dunia. BlueScope menjangkau pasar Amerika dan juga Asia, termasuk Indonesia. BlueScope mulai beroperasi di Indonesia pada tahun 1973 dan sejak saat itu, BlueScope terus berevolusi hingga pada tahun 2013 berubah nama menjadi PT NS BlueScope Indonesia.</p>
				<p>BlueScope terus-menerus berkomitmen untuk memberikan produk-produk baja lapis yang berkualitas tinggi guna memenuhi kebutuhan dan permintaan konsumen di Indonesia.</p>
			</div>
			<div class="col-md-4 hidden-xs tomodel servicesOnScroll" data-animation="bounceInUp" data-timeout="100">
				<img src="<?php echo base_url('images/model-1.png') ?>"  />
				</div>
				</div>
		</div>
	</div>	</div>
</section>

<section class="inovation">	<div class="entry-triangle">
		<div class="triangle-gray"></div>	</div>		<div class="container">	<div class="row" style="position:relative">	<div class="col-md-6 btn-zacs">		<img src="<?php echo base_url('images/sprite/inovasi-zacs.png') ?>"  />	</div>	</div>	</div>		<div class="skew skew-inovation">		<div class="container" style="overflow:hidden">		<div class="clearer cellpadding">			<div class="row inovationOnScroll" data-animation="fadeInDown" data-timeout="100">				<div class="col-md-4 col-xs-12">					<img src="<?php echo base_url('images/bluescope-zacs.png') ?>"  />					<p>BlueScope Zacs™ hadir sebagai inovasi pertama di Indonesia, memberikan kenyamanan sekaligus estetika bagi hunian Anda.  </p>				</div>				<div class="col-md-7 col-md-offset-1 col-xs-12">					<div class="row">					<div class="col-md-3 col-xs-6">						<div class="thumbnail">							<img src="<?php echo base_url('images/sprite/sni.png') ?>"  />						</div>					</div>
		<div class="col-md-3 col-xs-6">
		<div class="thumbnail">
		<img src="<?php echo base_url('images/sprite/guarantee.png') ?>"  />						</div>					</div>					<div class="col-md-3 col-xs-6">						<div class="thumbnail">
		<img src="<?php echo base_url('images/sprite/certified.png') ?>"  />						</div>					</div>					<div class="col-md-3 col-xs-6">						<div class="thumbnail">							<img src="<?php echo base_url('images/sprite/color-guarantee.png') ?>"  />						</div>					</div>					</div>				</div>			</div>		</div>		</div>	</div>
</section>

<section class="product" id="product">
	<div id="carousel-product" class="carousel slide" data-ride="carousel">

		<?php
			$slideProduct = $this->db->order_by('id_produk','DESC')->get('tbl_produk');
			$countSlide = $slideProduct->num_rows();
		?>

		<ol class="carousel-indicators">
			<?php
			for($no=0; $no < $countSlide; $no++){
				echo "<li data-target='#carousel-product' data-slide-to='$no' class=''></li>";
			}
			?>
		</ol>

			<div class="carousel-inner" role="listbox">
				<?php foreach($slideProduct->result_array() as $sld): ?>
				<div class="item">
					<img src="<?php echo base_url().'images/product/'.$sld['banner'] ?>">
					<div class="carousel-caption">
						<h1 class="wow bounceInDown text-left" data-wow-duration="1s" data-wow-delay="1s">
						<span>Produk Kami</span></h1>
						<div class="media" style="overflow:hidden">
							<div class="media-left wow bounceInLeft" data-wow-duration="1s" data-wow-delay="1s">					<img src="<?php echo base_url('images/product').'/'.$sld['thumb'] ?>" alt="">
							</div>
							<div class="media-body wow bounceInRight hidden-xs" data-wow-duration="1s" data-wow-delay="1s">
								<?php echo $sld['resume'].'<a href="'. site_url('applicator/product/detail').'/'.$sld['id_produk'].'/'.url_title($sld['title'],'-',true).'">[Selengkapnya]</a>'; ?>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-product" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#carousel-product" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
			</a>
	</div>


</section>
<section class="location location-applicator">
	<div class="container">
		<div class="clearer cellpadding">
			<div class="row" style="overflow:hidden">
				<div class="col-md-5 col-xs-12 contentOnScroll" data-animation="bounceInLeft" data-timeout="100">
				<h1>Temukan Kami di <br /><span>PEKANBARU</span></h1>
				<p>BlueScope Zacs&trade; telah hadir di Pekanbaru! Pekanbaru, ibukota provinsi Riau, merupakan salah satu sentra ekonomi di pulau Sumatra. Terkenal dengan Sungai Siak dan keberagamannya, kota Pekanbaru yang berusia lebih dari 200 tahun ini kini menjadi salah satu lokasi authorized dealer BlueScope Zacs.   </p>
				<a class="btn btn-primary btn-lg" href="<?php echo site_url('applicator/location') ?>">Lokasi Lainnya</a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="video hidden">	<div class="skew skew-video">		<div class="container-fluid">			<div class="row">				<div class="col-md-6 col-xs-12">					<div class="thumbnail">						<img src="<?php echo base_url('images/video/video1.jpg') ?>"  />					</div>				</div>				<div class="col-md-3 col-xs-6">					<div class="thumbnail">						<img src="<?php echo base_url('images/video/video2.jpg') ?>"  />					</div>				</div>				<div class="col-md-3 col-xs-6">					<div class="thumbnail">						<img src="<?php echo base_url('images/video/video3.jpg') ?>"  />					</div>				</div>			</div>		</div>	</div></section>

<section class="tips tips-applicator">
	<div class="btn-tips">
		<img src="<?php echo base_url().'images/sprite/btn-tips.png' ?>" alt="">
	</div>

	<div id="carousel-tips" class="carousel slide" data-ride="carousel">

		<!-- <ol class="carousel-indicators">
			<li data-target="#carousel-tips" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-tips" data-slide-to="1"></li>
		</ol> -->

		<div class="carousel-inner" role="listbox">


			<?php
				$dataTips = $this->db->where('kategori','applicator')->limit(5)->order_by('id_tzaki','DESC')->get('tbl_tzaki');

				if($dataTips->num_rows() > 0):
				foreach($dataTips->result_array() as $row):
			?>

			<div class="item">
			<?php if($row['image'] == ''): ?>
			<img src="<?php echo base_url().'images/bg-tips.jpg' ?>" alt="">
			<?php else: ?>
			<img src="<?php echo base_url('images/articles').'/'.$row['image'] ?>">
			<?php endif ?>
			<div class="carousel-caption">
				<h1 class="wow bounceInDown text-left" data-wow-duration="1s" data-wow-delay="1s" >
					<span><?php echo $row['title'] ?></span>
				</h1>
				<p class="wow bounceInRight text-left hidden-xs" data-wow-duration="1s" data-wow-delay="1.5s">
					<?php echo substr($row['deskripsi'],0,200) ?>
				</p>

				<a class="btn btn-primary btn-lg wow bounceInUp" data-wow-duration="1s" data-wow-delay="2s" href="<?php echo site_url('applicator/article/detail').'/'.$row['id_tzaki'].'/'.url_title($row['title'],'-',true) ?>">Selengkapnya</a>
			</div>
			</div>

			<?php endforeach ?>
			<?php endif ?>
    	</div>

		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-tips" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#carousel-tips" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
		</a>
		</div>
</section>

</content>

<?php include "include/footer.php"; ?>
