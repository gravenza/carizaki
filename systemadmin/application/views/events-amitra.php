<?php include_once "template/include/header.php"; ?>
	<content>
	<section class="news">
    	<div class="container">
        	<div class="clearer">
			
			<ol class="breadcrumb">
			<li><a href="<?php echo site_url() ?>">Home</a></li>
			<li><a href="<?php echo site_url() ?>">Amitra</a></li>
			<li class="active">Index Events Amitra</li>
			</ol>
			
            	<div class="row">
  				<div class="col-md-8 col-sm-8 col-xs-12">
				
	
	
		
				 <?php if($query->num_rows()>0): ?>

                <?php foreach($query->result_array() as $r): ?>

	<div class="media">
  		<div class="media-left media-top">
    	<a href="<?php echo site_url('article/detail') ?>">
			<img class="media-object" src="<?php echo base_url().'../uploads/eventspektra/'.$r['image_thumb']; ?>" alt="">
		</a>
  		</div>
  		<div class="media-body">
			<h4 class="media-heading">
			<a class="title-news" href="<?php echo site_url('eventspektra/detail/'.$r['id'].'/'.url_title($r['header'])) ?>"><?php echo $r['header']; ?></a>
			</h4>
    		<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
			<?php echo $r['resume']; ?>
  		</div>
	</div>
	
	<?php endforeach; ?>
            <?php endif; ?>
	
	
			<div class="clearer">
			<nav aria-label="Page navigation">
  
  <?php echo  $this->pagination->create_links() ; ?>

</nav>
			</div>
	
	
	
	
			
				</div>
				
		<?php include_once "template/include/tabright.php"; ?>


                
				</div>
			</div>
        </div>
	</section>	
    </content>
<?php include_once "template/include/footer.php"; ?>