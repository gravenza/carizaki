<?php include_once "template/include/header.php"; ?>
	<content>
	<section class="page">
    	<div class="container">
        	<div class="clearer">
			<?php

			$pages = $query->row_array();

			//echo $this->lang->line('welcome_message');
			//print_r($this->session->userdata());
			 ?>
			<ol class="breadcrumb">
			<li><a href="<?php echo site_url() ?>">Home</a></li>
			<li><a href="<?php echo site_url('contact') ?>">Branch</a></li>
			<li class="active"><?php echo $pages['nama_kantor_cabang']; ?></li>
			</ol>
			
            <div class="row">
  			<div class="col-md-8 col-sm-8 col-xs-12">
			
			<div class="row" style="margin-bottom:20px;">
			<div class="col-md-6 col-md-offset-3 col-xs-12">
			<!-- <div class="input-group">
			<input type="text" class="form-control" placeholder="Search for...">
			<span class="input-group-btn">
				<button class="btn btn-primary" type="button">Search</button>
			</span>
			</div> -->

			 <form name="myform" type="post" action="<?php echo site_url('branch/search') ?>">
			 <div class="input-group">
                        
                        <input name="param" type="hidden" />
                        <input type="text" name="key" id="searchText" class="form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-default" id="searchform" type="button" style="padding: 9px 12px;">
                                <i class="fa fa-search"></i>
                        </button>
                        </span>
                      
                    </div>
					</form>

			</div>
			</div>
				
			<div class="detail-title">
			<h3 style="color:#337ab7"><?php echo $pages['nama_kantor_cabang']; ?></h3>
			<p><?php echo $pages['alamat']; ?></p>
			<p>Kode Pos : <?php echo $pages['kode_pos']; ?></p>
			
			<p>No Telp : <?php echo $pages['nomor_telpon']; ?></p>
			
			<!-- <p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p> -->
			</div>
			
			<div class="detail-content">
			
			
			</div>
			
			</div>
				
	<div class="col-md-4 col-sm-4 col-xs-12">
		<div class="news-widget">

			<!-- NEWS TERBARU -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="media-heading"><i class="fa fa-newspaper-o"></i> Latest News</h4>
				</div>

				<div class="panel-body">

	<div class="media">
  		<div class="media-left media-top">
    	<a href="<?php echo site_url('news/detail') ?>">
			<img class="media-object" src="<?php echo base_url(); ?>images/video/video1.jpg" alt="">
		</a>
  		</div>
  		<div class="media-body">
			<h4 class="media-heading">
			<a class="title-news" href="<?php echo site_url('news/detail') ?>">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</a>
			</h4>
    		<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
  		</div>
	</div>

	<div class="media">
  		<div class="media-left media-top">
    	<a href="<?php echo site_url('news/detail') ?>">
			<img class="media-object" src="<?php echo base_url(); ?>images/video/video2.jpg" alt="">
		</a>
  		</div>
  		<div class="media-body">
			<h4 class="media-heading">
			<a class="title-news" href="<?php echo site_url('news/detail') ?>">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</a>
			</h4>
    		<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
  		</div>
	</div>

	<div class="media">
  		<div class="media-left media-top">
    	<a href="<?php echo site_url('news/detail') ?>">
			<img class="media-object" src="<?php echo base_url(); ?>images/video/video2.jpg" alt="">
		</a>
  		</div>
  		<div class="media-body">
			<h4 class="media-heading">
			<a class="title-news" href="<?php echo site_url('news/detail') ?>">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</a>
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
	<a href="<?php echo site_url('news/detail') ?>">
	<img class="media-object" src="<?php echo base_url(); ?>images/video/video1.jpg" alt="">
</a>
	</div>
	<div class="media-body">
	<h4 class="media-heading">
	<a class="title-news" href="<?php echo site_url('news/detail') ?>">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</a>
	</h4>
		<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
	</div>
</div>

<div class="media">
	<div class="media-left media-top">
	<a href="<?php echo site_url('news/detail') ?>">
	<img class="media-object" src="<?php echo base_url(); ?>images/video/video2.jpg" alt="">
</a>
	</div>
	<div class="media-body">
	<h4 class="media-heading">
	<a class="title-news" href="<?php echo site_url('news/detail') ?>">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</a>
	</h4>
		<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
	</div>
</div>

<div class="media">
	<div class="media-left media-top">
	<a href="<?php echo site_url('news/detail') ?>">
	<img class="media-object" src="<?php echo base_url(); ?>images/video/video2.jpg" alt="">
</a>
	</div>
	<div class="media-body">
	<h4 class="media-heading">
	<a class="title-news" href="<?php echo site_url('news/detail') ?>">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</a>
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


     <script>
    

    $(function () {
    
      $( "#searchform" ).click(function() {

          var text = $("#searchText").val();
          //alert(text);
          if(text !='')
          {
            document.myform.submit();
          }
});

}); 

    </script>
<?php include_once "template/include/footer.php"; ?>