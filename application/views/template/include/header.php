<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>Apartemen Jakarta</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.bxslider.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.slicknav.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/masonry.pkgd.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/imagesloaded.pkgd.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/apatojakarta.js"></script>


</head>

<body>

<header class="l">
	
	<section class="ontop hidden">
	<div class="container">
	<div class="clearer" style="margin:0">
	<div class="row">
		<div class="col-md-3 col-md-offset-9 col-xs-12">
		<div class="entry-account text-right">
		<a href="#"><i class="fa fa-user-plus"></i> Register</a>
		<a href="#"><i class="fa fa-sign-in"></i> Login</a>
		</div>
		</div>
		
	</div>
	</div>
	</div>
	</section>
	<div class="container">
    
    <div class="clearer">
	<div class="row">
	
	<div class="col-md-3 col-xs-12">
		<div class="logo">
    	<a href="<?php echo site_url(); ?>"><img src="<?php echo base_url(); ?>images/logo.png"/></a>
		</div>
    </div>
	
	<div class="col-md-7 hidden-xs">
		<ul class="menu">
		<li><a class="<?php echo activate_menu('home') ?>" href="<?php echo site_url(); ?>">Home</a></li>
        <li><a class="<?php echo activate_menu('about') ?>" href="<?php echo site_url('about'); ?>">About Us</a></li>
        <li><a class="<?php echo activate_menu('property') ?>" href="#">Listing</a>
			<ul>
				<li><a href="<?php echo base_url().'property/category/2'; ?>">Primary</a></li>
				<li><a href="<?php echo base_url().'property/category/3'; ?>">Secondary</a></li>
			</ul>
		</li>
		<li><a class="<?php echo activate_menu('our-service') ?>" href="<?php echo site_url('our-service'); ?>">Our Services</a></li>
        <li><a class="<?php echo activate_menu('blog') ?>" href="<?php echo site_url('blog/view'); ?>">Blog</a></li>
        <li><a class="<?php echo activate_menu('contact') ?>" href="<?php echo site_url('contact'); ?>">Contact Us</a></li>
        </ul>
	</div>
	
	<div class="col-md-2 col-xs-12">
		<div class="socmed">
		<a href="https://www.facebook.com/iloveapartments/" target="_blank"><i class="fa fa-facebook"></i></a>
		<a href="https://twitter.com/iloveapartments" target="_blank"><i class="fa fa-instagram"></i></a>
		</div>
	</div>
    
    </div>
	</div>
    
	</div>
</header>