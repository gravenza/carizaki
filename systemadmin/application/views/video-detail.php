<?php include_once "template/include/header.php"; ?>
	<content>
	<section class="news">
    	<div class="container">
        	<div class="clearer">
			<?php 
			$video = $query->row();
			?>
			<ol class="breadcrumb">
			<li><a href="<?php echo site_url() ?>">Home</a></li>
			<li><a href="<?php echo site_url('news') ?>">Video</a></li>
			<li class="active"><?php echo $video->title; ?></li>
			</ol>
			
            <div class="row">
  			<div class="col-md-8 col-sm-8 col-xs-12">
				
			<div class="detail-title">
			<h3><?php echo $video->title; ?></h3>
			<?php //echo $video['uri'];?>

			<div class="embed-responsive embed-responsive-16by9">
	<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $video->uri; ?>"></iframe>
	</div>
			
			</div>
			
			<div class="detail-content">
			
			








			
			</div>
			
			</div>
				
		<?php include_once "template/include/tabright.php"; ?>



                
				</div>
			</div>
        </div>
	</section>	
    </content>
<?php include_once "template/include/footer.php"; ?>