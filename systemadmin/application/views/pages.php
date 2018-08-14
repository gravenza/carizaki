<?php include_once "template/include/header.php"; ?>
	<content>
	<section class="pages">
    	<div class="container">
        	<div class="clearer">
			<?php

			$pages = $query->row_array();

			//echo $this->lang->line('welcome_message');
			//print_r($this->session->userdata());
			 ?>
			<ol class="breadcrumb">
			<li><a href="<?php echo site_url() ?>">Home</a></li>
			<li><a href="<?php echo site_url('page') ?>">Page</a></li>
			<li class="active"><?php echo $pages['title']; ?></li>
			</ol>
			
            <div class="row">
  			<div class="col-md-8 col-sm-8 col-xs-12">
				
			<div class="detail-title">
			<h3 style="color:#337ab7"><?php echo $pages['title']; ?></h3>
			<!-- <p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p> -->
			</div>
			
			<div class="detail-content">
			<?php if($pages['image_small']!=''): ?>
			<img src="<?php echo base_url().'/images/about.jpg' ?>" />

			<?php endif; ?>
			<p><?php echo $pages['description']; ?></p>
			
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
				
	<?php
	$where = "posting_date <= '".date('Y-m-d')."' and lang = 'en'";
	$queryNews = $this->db->where($where)->limit(3)->order_by('id','DESC')->get('sketsa_news');
	
	if($queryNews->num_rows() > 0):
	foreach($queryNews->result_array() as $n):
	
	if(strlen($n['header']) > 60){
		$title = substr($n['header'],0,60).'...';	
	}else{
		$title = $n['header'];
	}
	
	if(strlen($n['resume']) > 150){
		$desc = substr($n['resume'],0,150).'...';	
	}else{
		$desc = $n['resume'];
	}
	
	?>

	<div class="media">
  		<div class="media-left media-top">
    	<a href="<?php echo site_url('news/detail').'/'. $n['id'] .'/'.url_title($n['header'],'-',true); ?>">
			<img class="media-object" src="<?php echo 'http://www.fifgroup.co.id/uploads/news/'.$n['image_small']; ?>" alt="">
		</a>
  		</div>
  		<div class="media-body">
			<h4 class="media-heading">
			<a class="title-news" href="<?php echo site_url('news/detail').'/'. $n['id'] .'/'.url_title($n['header'],'-',true); ?>"><?php echo $title ?></a>
			</h4>
    		<p class="date"><i class="fa fa-calendar"></i> <?php echo date('d-M-Y',strtotime($n['posting_date'])) ?></p>
  		</div>
	</div>
	
	<?php endforeach ?>
	<?php endif ?>

	</div>
	</div>

	<!-- ARTIKEL TERBARU -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="media-heading"><i class="fa fa-edit"></i> Latest Articles</h4>
		</div>

		<div class="panel-body">

	<?php
	$where = "posting_date <= '".date('Y-m-d')."' and lang = 'id'";
	$queryNews = $this->db->where($where)->limit(3)->order_by('id','DESC')->get('sketsa_articles');
	
	if($queryNews->num_rows() > 0):
	foreach($queryNews->result_array() as $art):
	
	if(strlen($art['header']) > 60){
		$title = substr($art['header'],0,60).'...';	
	}else{
		$title = $art['header'];
	}
	
	if(strlen($art['resume']) > 150){
		$desc = substr($art['resume'],0,150).'...';	
	}else{
		$desc = $art['resume'];
	}
	
	?>

	<div class="media">
  		<div class="media-left media-top">
    	<a href="<?php echo site_url('news/detail').'/'. $art['id'] .'/'.url_title($art['header'],'-',true); ?>">
			<img class="media-object" src="<?php echo 'http://www.fifgroup.co.id/uploads/articles/'.$art['image_small']; ?>" alt="">
		</a>
  		</div>
  		<div class="media-body">
			<h4 class="media-heading">
			<a class="title-news" href="<?php echo site_url('news/detail').'/'. $art['id'] .'/'.url_title($art['header'],'-',true); ?>"><?php echo $title ?></a>
			</h4>
    		<p class="date"><i class="fa fa-calendar"></i> <?php echo date('d-M-Y',strtotime($art['posting_date'])) ?></p>
  		</div>
	</div>
	
	<?php endforeach ?>
	<?php endif ?>





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