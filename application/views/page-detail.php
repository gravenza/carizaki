<?php include_once "include/header.php"; ?>
	<content class="news">
	<section class="news">
    	<div class="container">
        	<div class="clearer">
			
			<!-- <ol class="breadcrumb">
			<li><a href="<?php echo site_url() ?>">Home</a></li>
			<li><a href="<?php echo site_url('news') ?>">News</a></li>
			<li class="active">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</li>
			</ol> -->
			
			<?php $row = $queryPage->row(); ?>
			
            <div class="row">
  			<div class="col-md-12 col-xs-12">
				
			<div class="detail-title">
			<h3><?php echo $row->judul ?></h3>
			<!-- <p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p> -->
			</div>
			
			<div class="detail-content">
			<!-- <img style="margin-bottom:20px" src="<?php echo base_url().'/images/slider/slide.jpg' ?>" /> -->
			
			<?php echo $row->konten ?>
			
			</div>
			
			</div>
				
		<div class="col-md-4 col-sm-4 col-xs-12 hidden">
		<div class="news-widget">
		
		<!-- Nav tabs -->
	<ul class="nav nav-pills nav-justified" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Artikel Terbaru</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Berita Terbaru</a></li>
	</ul>

  <!-- Tab panes -->
  <div class="tab-content">
    
	<!-- ARTIKEL TERBARU -->
	<div role="tabpanel" class="tab-pane active" id="home">
	<div class="media">
  		<div class="media-left media-top">
    	<a href="<?php echo site_url('article/detail') ?>">
			<img class="media-object" src="<?php echo base_url(); ?>images/video/video2.jpg" alt="">
		</a>
  		</div>
  		<div class="media-body">
			<h4 class="media-heading">
			<a class="title-news" href="<?php echo site_url('article/detail') ?>">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</a>
			</h4>
    		<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
  		</div>
	</div>
	
	<div class="media">
  		<div class="media-left media-top">
    	<a href="<?php echo site_url('article/detail') ?>">
			<img class="media-object" src="<?php echo base_url(); ?>images/video/video3.jpg" alt="">
		</a>
  		</div>
  		<div class="media-body">
			<h4 class="media-heading">
			<a class="title-news" href="<?php echo site_url('article/detail') ?>">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</a>
			</h4>
    		<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
  		</div>
	</div>
	
	<div class="media">
  		<div class="media-left media-top">
    	<a href="<?php echo site_url('article/detail') ?>">
			<img class="media-object" src="<?php echo base_url(); ?>images/video/video1.jpg" alt="">
		</a>
  		</div>
  		<div class="media-body">
			<h4 class="media-heading">
			<a class="title-news" href="<?php echo site_url('article/detail') ?>">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</a>
			</h4>
    		<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
  		</div>
	</div>
	
	<div class="media">
  		<div class="media-left media-top">
    	<a href="<?php echo site_url('article/detail') ?>">
			<img class="media-object" src="<?php echo base_url(); ?>images/video/video2.jpg" alt="">
		</a>
  		</div>
  		<div class="media-body">
			<h4 class="media-heading">
			<a class="title-news" href="<?php echo site_url('article/detail') ?>">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</a>
			</h4>
    		<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
  		</div>
	</div>
	
	<div class="media">
  		<div class="media-left media-top">
    	<a href="<?php echo site_url('article/detail') ?>">
			<img class="media-object" src="<?php echo base_url(); ?>images/video/video2.jpg" alt="">
		</a>
  		</div>
  		<div class="media-body">
			<h4 class="media-heading">
			<a class="title-news" href="<?php echo site_url('article/detail') ?>">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</a>
			</h4>
    		<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
  		</div>
	</div>
	
	</div>
    
	
	
	<div role="tabpanel" class="tab-pane" id="profile">
	
	<div class="media">
  		<div class="media-left media-top">
    	<a href="<?php echo site_url('article/detail') ?>">
			<img class="media-object" src="<?php echo base_url(); ?>images/video/video3.jpg" alt="">
		</a>
  		</div>
  		<div class="media-body">
			<h4 class="media-heading">
			<a class="title-news" href="<?php echo site_url('article/detail') ?>">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</a>
			</h4>
    		<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
  		</div>
	</div>
	
	<div class="media">
  		<div class="media-left media-top">
    	<a href="<?php echo site_url('article/detail') ?>">
			<img class="media-object" src="<?php echo base_url(); ?>images/video/video2.jpg" alt="">
		</a>
  		</div>
  		<div class="media-body">
			<h4 class="media-heading">
			<a class="title-news" href="<?php echo site_url('article/detail') ?>">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</a>
			</h4>
    		<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
  		</div>
	</div>
	
	<div class="media">
  		<div class="media-left media-top">
    	<a href="<?php echo site_url('article/detail') ?>">
			<img class="media-object" src="<?php echo base_url(); ?>images/video/video3.jpg" alt="">
		</a>
  		</div>
  		<div class="media-body">
			<h4 class="media-heading">
			<a class="title-news" href="<?php echo site_url('article/detail') ?>">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</a>
			</h4>
    		<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
  		</div>
	</div>
	
	<div class="media">
  		<div class="media-left media-top">
    	<a href="<?php echo site_url('article/detail') ?>">
			<img class="media-object" src="<?php echo base_url(); ?>images/video/video1.jpg" alt="">
		</a>
  		</div>
  		<div class="media-body">
			<h4 class="media-heading">
			<a class="title-news" href="<?php echo site_url('article/detail') ?>">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</a>
			</h4>
    		<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
  		</div>
	</div>
	
	<div class="media">
  		<div class="media-left media-top">
    	<a href="<?php echo site_url('article/detail') ?>">
			<img class="media-object" src="<?php echo base_url(); ?>images/video/video2.jpg" alt="">
		</a>
  		</div>
  		<div class="media-body">
			<h4 class="media-heading">
			<a class="title-news" href="<?php echo site_url('article/detail') ?>">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</a>
			</h4>
    		<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
  		</div>
	</div>
	
	</div>
  </div>
		
		</div>
		
		
		</div>
                
				</div>
			</div>
        </div>
	</section>	
    </content>
<?php include_once "include/footer.php"; ?>