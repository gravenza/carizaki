	<div class="col-md-4 col-sm-4 col-xs-12">
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
	<?php 

	$string_query       = "select * from sketsa_articles where posting_date <='".date('Y-m-d')."'  order by posting_date desc limit 4";
	$articsQuery = $this->db->query($string_query);

	?>
	<?php if($articsQuery->num_rows()>0): ?>
		<?php foreach($articsQuery->result_array() as $r): ?>
	<div class="media">
  		<div class="media-left media-top">
    	<a href="<?php echo site_url('article/detail') ?>">
			<img class="media-object" src="<?php echo base_url().'../uploads/articles/'.$r['image_small']; ?>" alt="">
		</a>
  		</div>
  		<div class="media-body">
			<h4 class="media-heading">
			<a class="title-news" href="<?php echo site_url('articles/detail/'.$r['id'].'/'.url_title($r['header'])) ?>"><?php echo $r['header']; ?></a>
			</h4>
    		
  		</div>
	</div>
	<?php endforeach; ?>
	<?php endif; ?>
	
	
	
	
	</div>
    
	
	
	<div role="tabpanel" class="tab-pane" id="profile">
	
	
	<?php 

	$string_query       = "select * from sketsa_news where posting_date <='".date('Y-m-d')."'  order by posting_date desc limit 4";
	$articsQuery = $this->db->query($string_query);

	?>
	<?php if($articsQuery->num_rows()>0): ?>
		<?php foreach($articsQuery->result_array() as $r): ?>
	<div class="media">
  		<div class="media-left media-top">
    	<a href="<?php echo site_url('article/detail') ?>">
			<img class="media-object" src="<?php echo base_url().'../uploads/news/'.$r['image_small']; ?>" alt="">
		</a>
  		</div>
  		<div class="media-body">
			<h4 class="media-heading">
			<a class="title-news" href="<?php echo site_url('news/detail/'.$r['id'].'/'.url_title($r['header'])) ?>"><?php echo $r['header']; ?></a>
			</h4>
    		
  		</div>
	</div>
	<?php endforeach; ?>
	<?php endif; ?>
	
	
	
	
	
	</div>
  </div>
		
		</div>
		
		<div class="brand">
		<div class="row">
        	
            <div class="col-md-12 col-xs-6 text-center">
            <div class="thumbnail">
			<img src="<?php echo base_url(); ?>images/brand/brand1.png"/>
            </div>
            </div>
            
            <div class="col-md-12 col-xs-6 text-center">
            <div class="thumbnail">
			<img src="<?php echo base_url(); ?>images/brand/brand2.png"/>
            </div>
            </div>
            
            <div class="col-md-12 col-xs-6 text-center hidden-xs">
            <div class="thumbnail">
			<img src="<?php echo base_url(); ?>images/brand/brand3.png"/>
            </div>
            </div>
            
            <div class="col-md-12 col-xs-6 text-center hidden-xs">
            <div class="thumbnail">
			<img src="<?php echo base_url(); ?>images/brand/brand4.png"/>
            </div>
            </div>
                 
        	</div>
		</div>
		</div>



