<?php include_once "include/header.php"; ?>
	<content class="danastra-inner">

	<section class="danastra-slider">

		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

		<ol class="carousel-indicators">
		<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		<li data-target="#carousel-example-generic" data-slide-to="1"></li>
		</ol>

		<div class="carousel-inner" role="listbox">

		<div class="item active parallax parallax-slider" data-speed="4" style="background-image:url(<?php echo base_url().'images/slider/slide1.jpg' ?>)">
		<!-- <img src="..." alt="..."> -->
		<div class="carousel-caption">
        ...
		</div>
		</div>

		<div class="item parallax parallax-slider" data-speed="4" style="background-image:url(<?php echo base_url().'images/slider/slide.jpg' ?>)">
		<!-- <img src="..." alt="..."> -->
		<div class="carousel-caption">
        ...
		</div>
		</div>

		</div>
		</div>
	</section>

	<section class="network services services-inner" style="overflow:hidden">
	<div class="container">
	<div class="clearer cellpadding">

	<h2 class="secTitle servicesOnScroll" style="visibility:hidden" data-animation="fadeInLeftBig" data-timeout="100">OUR NETWORK</h2>
	<p class="sectagline text-center servicesOnScroll" data-animation="fadeInRightBig" data-timeout="100" style="visibility:hidden">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

	<div class="row" style="overflow:hidden">
	<div class="col-md-4 col-xs-12 servicesOnScroll" data-animation="bounceInLeft" data-timeout="100" style="visibility:hidden">
	<div class="thumbnail">
		<img src="<?php echo base_url().'images/articles/article1.jpg' ?>"  />
		<div class="caption">
		<h4 class="media-heading text"><a href="#">NETWORK 1</a></h4>
		</div>
	</div>
	</div>

	<div class="col-md-4 col-xs-12 servicesOnScroll" data-animation="bounceInDown" data-timeout="100" style="visibility:hidden">
	<div class="thumbnail">
		<img src="<?php echo base_url().'images/articles/article1.jpg' ?>"  />
		<div class="caption">
		<h4 class="media-heading text"><a href="#">NETWORK 2</a></h4>
		</div>
	</div>
	</div>

	<div class="col-md-4 col-xs-12 servicesOnScroll" data-animation="bounceInRight" data-timeout="100" style="visibility:hidden">
	<div class="thumbnail">
		<img src="<?php echo base_url().'images/articles/article1.jpg' ?>"  />
		<div class="caption">
		<h4 class="media-heading text"><a href="#">NETWORK 3</a></h4>
		</div>
	</div>
	</div>

	</div>
	</div>
	</div>
	</section>

	</content>
<?php include_once "include/footer.php"; ?>
