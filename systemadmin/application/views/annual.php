<?php include_once "template/include/header.php"; ?>
	<content>
	<section class="annual">
    	<div class="container">
        	<div class="clearer">
			
			<ol class="breadcrumb">
			<li><a href="<?php echo site_url() ?>">Home</a></li>
			<li class="active">Anggaran Dasar</li>
			</ol>
			
            	<div class="row">
  				<div class="col-md-8 col-sm-8 col-xs-12">
				
	<div class="table-responsive">
		<table class="table table-bordered table-striped">
		<tr>
		<th>File</th>
		<th>Title</th>
		<th>Size</th>
		</tr>
		<?php if($query->num_rows()>0): ?>
		<?php foreach($query->result_array() as $r): ?>

	<tr>
  		<td><img src="<?php echo base_url().'../uploads/annual/'?>pdf.gif"></td>
  		<td><a class="menu3" href="<?php echo base_url().'uploads/annual/'.$r['file'] ?>"><?php echo $r['name']; ?></a></td>
		<td><h4 class="media-heading"><?php echo $r['size']; ?>Kb</h4></td>
	</tr>
	
		<?php endforeach; ?>
        <?php endif; ?>
	
	</table>
	</div>
			<div class="clearer">
			<nav aria-label="Page navigation">
  
  <?php echo  $this->pagination->create_links() ; ?>

</nav>
			</div>
				</div>
				
		<div class="col-md-4 col-xs-12">

				<div class="news-widget">

					<!-- NEWS TERBARU -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="media-heading"><i class="fa fa-newspaper-o"></i> Latest News</h4>
						</div>

						<div class="panel-body">

			<div class="media">
		  		<div class="media-left media-top">
		    	<a href="<?php echo site_url('articles/detail') ?>">
					<img class="media-object" src="<?php echo base_url(); ?>images/video/video1.jpg" alt="">
				</a>
		  		</div>
		  		<div class="media-body">
					<h4 class="media-heading">
					<a class="title-news" href="<?php echo site_url('articles/detail') ?>">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</a>
					</h4>
		    		<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
		  		</div>
			</div>

			<div class="media">
		  		<div class="media-left media-top">
		    	<a href="<?php echo site_url('articles/detail') ?>">
					<img class="media-object" src="<?php echo base_url(); ?>images/video/video2.jpg" alt="">
				</a>
		  		</div>
		  		<div class="media-body">
					<h4 class="media-heading">
					<a class="title-news" href="<?php echo site_url('articles/detail') ?>">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</a>
					</h4>
		    		<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
		  		</div>
			</div>

			<div class="media">
		  		<div class="media-left media-top">
		    	<a href="<?php echo site_url('articles/detail') ?>">
					<img class="media-object" src="<?php echo base_url(); ?>images/video/video2.jpg" alt="">
				</a>
		  		</div>
		  		<div class="media-body">
					<h4 class="media-heading">
					<a class="title-news" href="<?php echo site_url('articles/detail') ?>">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</a>
					</h4>
		    		<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
		  		</div>
			</div>

			</div>
			</div>

			<!-- ARTIKEL TERBARU -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="media-heading"><i class="fa fa-edit"></i> Latest Articles</h4>
				</div>

				<div class="panel-body">

		<div class="media">
			<div class="media-left media-top">
			<a href="<?php echo site_url('articles/detail') ?>">
			<img class="media-object" src="<?php echo base_url(); ?>images/video/video1.jpg" alt="">
		</a>
			</div>
			<div class="media-body">
			<h4 class="media-heading">
			<a class="title-news" href="<?php echo site_url('articles/detail') ?>">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</a>
			</h4>
				<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
			</div>
		</div>

		<div class="media">
			<div class="media-left media-top">
			<a href="<?php echo site_url('articles/detail') ?>">
			<img class="media-object" src="<?php echo base_url(); ?>images/video/video2.jpg" alt="">
		</a>
			</div>
			<div class="media-body">
			<h4 class="media-heading">
			<a class="title-news" href="<?php echo site_url('articles/detail') ?>">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</a>
			</h4>
				<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
			</div>
		</div>

		<div class="media">
			<div class="media-left media-top">
			<a href="<?php echo site_url('articles/detail') ?>">
			<img class="media-object" src="<?php echo base_url(); ?>images/video/video2.jpg" alt="">
		</a>
			</div>
			<div class="media-body">
			<h4 class="media-heading">
			<a class="title-news" href="<?php echo site_url('articles/detail') ?>">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</a>
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
<?php include_once "template/include/footer.php"; ?>