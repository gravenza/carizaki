<?php include "include/header.php"; ?>

<content>
	<?php include "include/slider.php"; ?>
    
<section class="news-article">
	<div class="container">
    	<div class="clearer">
        
		<h2 class="secTitle"><span>NEWS &amp ARTICLES</span></h2>
		<p class="sectagline">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        
		<div class="row">
        	<div class="col-md-8 col-xs-12">
			<div class="row grid">
			
			
			<?php 
			$where = "posting_date <= NOW() AND category = 'News'";
			$this->db->where($where);
			$this->db->order_by('article_id','DESC');
			$this->db->limit(4);
			$data_news = $this->db->get('article');
			
			if($data_news->num_rows() > 0):
			foreach($data_news->result_array() as $n):
			?>
			<div class="col-md-6 col-xs-12 grid-item">
			<div class="thumbnail">
			<img src="<?php echo base_url().'assets/uploads/files/'.$n['image_small']; ?>"/>
			<div class="caption">
			<p class="post-date"><i class="fa fa-calendar"></i> <?php echo date('d/m/Y',strtotime($n['posting_date'])); ?></p>
			<h4><a href="<?php echo site_url('news/detail').'/'.$n['article_id'].'/'.url_title($n['title']) ?>"><?php echo $n['title'] ?></a></h4>
			<?php echo $n['resume'] ?>
			</div>
			</div>
			</div>
			<?php endforeach ?>
			
			<?php else : ?>
			<div class="col-md-12 col-xs-12 grid-item">
			<h4 class="text-center bg-primary">No News Post Found !</h4>
			</div>
			<?php endif ?>
			
			</div>
            </div>
			
			<div class="col-md-4 col-xs-12 side-articles">
			<div class="panel panel-default">
			<div class="panel-heading">List of Articles</div>
			
			<div class="panel-body">
			
			<?php 
			$where = "posting_date <= NOW() AND category = 'Article'";
			$this->db->where($where);
			$this->db->order_by('article_id','DESC');
			$this->db->limit(6);
			$data_news = $this->db->get('article');
			
			if($data_news->num_rows() > 0):
			foreach($data_news->result_array() as $art):
			?>
			<div class="media">
			<div class="media-left">
			<img src="<?php echo base_url().'assets/uploads/files/'.$art['image_small'] ?>"  />
			</div>
			<div class="media-body">
			<h4 class="media-heading"><a href="<?php echo site_url('article/detail').'/'.$art['article_id'].'/'.url_title($art['title'],'-',true) ?>"><?php echo $art['title'] ?></a></h4>
			<p class="post-date"><i class="fa fa-calendar"></i> <?php echo date('d/m/Y',strtotime($art['posting_date'])); ?></p>
			</div>
			</div>
			
			<?php endforeach ?>
			
			<?php else : ?>
			<h4 class="text-center bg-primary">No Article Post Found !</h4>
			<?php endif ?>
			
			</div>
			
			</div>
			</div>
			
        </div>
        
		</div>
		</div>
    </div>
</section>

<section class="intro-1">
		<div class="middle">
		<div class="middle-frame">
		<div class="inner">

		<h1>Neque porro quisquam est qui dolorem ipsum</h1>

		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

		</div>
		</div>
		</div>
</section>

<section class="tourism">
	<div class="container">
	<div class="clearer">
	<h2 class="secTitle"><span>TOURISM</span></h2>
	<p class="sectagline">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
	<div class="row grid">
	
	<?php 
		$where = "posting_date <= NOW() AND category = 'Tourism'";
		$this->db->where($where);
		$this->db->order_by('article_id','DESC');
		$this->db->limit(4);
		$data_news = $this->db->get('article');
			
		if($data_news->num_rows() > 0):
		foreach($data_news->result_array() as $tr):
	?>
	
	<div class="col-md-4 col-xs-12 grid-item">
	<div class="thumbnail">
	<img src="<?php echo base_url().'assets/uploads/files/'.$tr['image_small'] ?>"  />
	<div class="caption">
	<h3 class="media-heading"><a href="<?php echo site_url('tourism/detail').'/'.$tr['article_id'].'/'.url_title($tr['title'],'-',true) ?>"><?php echo $tr['title'] ?></a></h3>
	</div>
	</div>
	</div>
	
	<?php endforeach ?>
	
	<?php else : ?>
	<div class="col-md-12 col-xs-12 grid-item">
	<h4 class="text-center bg-primary">No Tourims Post Found !</h4>
	</div>
	<?php endif ?>
	
	</div>
	</div>
	</div>
</section>

<section class="intro-2">
		<div class="middle">
		<div class="middle-frame">
		<div class="inner">

		<h1>Neque porro quisquam est qui dolorem ipsum</h1>

		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

		</div>
		</div>
		</div>
</section>

<section class="gallery">
	<div class="container">
    	<div class="clearer">
        
		<h2 class="secTitle"><span>PHOTO &amp VIDEO GALLERIES</span></h2>
		<p class="sectagline">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
		
		<div class="nav-gallery">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">ALL</a></li>
		<li role="presentation"><a href="#photos" aria-controls="photos" role="tab" data-toggle="tab">PHOTOS</a></li>
		<li role="presentation"><a href="#videos" aria-controls="videos" role="tab" data-toggle="tab">VIDEOS</a></li>
		</ul>
		</div>
		
		<!-- Tab panes -->
		<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="home">
		<div class="row grid">
			
			<?php 
			$where = "posting_date <= NOW()";
			$this->db->where($where);
			$this->db->order_by('gallery_id','DESC');
			$this->db->limit(8);
			$data_news = $this->db->get('gallery');
			
			if($data_news->num_rows() > 0):
			foreach($data_news->result_array() as $gal):
			?>
        	
			<div class="col-md-3 col-xs-12 grid-item porto-box text-center">
			<div class="thumbnail">
			<img src="<?php echo base_url().'assets/uploads/files/'.$gal['image_small']; ?>"/>
			<div class="caption">
			<h4><?php echo $gal['title'] ?></h4>
			</div>
			<?php if($gal['uri']!=''){ ?>
			<a class="btn-play" href=""><i class="fa fa-play-circle-o" aria-hidden="true"></i></a>
			<?php } ?>
			</div>
            </div>
			
			<?php endforeach ?>
			
			<?php else : ?>
			<div class="col-md-12 col-xs-12 grid-item porto-box">
			<h4 class="text-center bg-primary">No Gallery Post Found !</h4>
			</div>
			<?php endif ?>
			
        </div>
		</div>
		
		<div role="tabpanel" class="tab-pane" id="photos">
		<div class="row">
        	
			<?php 
			$where = "posting_date <= NOW() AND category = 'Photo'";
			$this->db->where($where);
			$this->db->order_by('gallery_id','DESC');
			$this->db->limit(8);
			$data_news = $this->db->get('gallery');
			
			if($data_news->num_rows() > 0):
			foreach($data_news->result_array() as $gal):
			?>
        	
			<div class="col-md-3 col-xs-12 grid-item porto-box text-center">
			<div class="thumbnail">
			<img src="<?php echo base_url().'assets/uploads/files/'.$gal['image_small']; ?>"/>
			<div class="caption">
			<h4><?php echo $gal['title'] ?></h4>
			</div>
			<?php if($gal['uri']!=''){ ?>
			<a class="btn-play" href=""><i class="fa fa-play-circle-o" aria-hidden="true"></i></a>
			<?php } ?>
			</div>
            </div>
			
			<?php endforeach ?>
			
			<?php else : ?>
			<div class="col-md-12 col-xs-12 grid-item porto-box">
			<h4 class="text-center bg-primary">No Gallery Post Found !</h4>
			</div>
			<?php endif ?>
			
        </div>
		</div>
		
		<div role="tabpanel" class="tab-pane" id="videos">
		
		<div class="row">
        				
			<?php 
			$where = "posting_date <= NOW() AND category = 'Video'";
			$this->db->where($where);
			$this->db->order_by('gallery_id','DESC');
			$this->db->limit(1);
			$data_news = $this->db->get('gallery');
			
			if($data_news->num_rows() > 0):
			foreach($data_news->result_array() as $gal):
			?>
        	
			<div class="col-md-6 col-xs-12 grid-item porto-box text-center">
			<div class="thumbnail">
			<img src="<?php echo base_url().'assets/uploads/files/'.$gal['image_small']; ?>"/>
			<div class="caption">
			<h4><?php echo $gal['title'] ?></h4>
			</div>
			<?php if($gal['uri']!=''){ ?>
			<a class="btn-play" href=""><i class="fa fa-play-circle-o" aria-hidden="true"></i></a>
			<?php } ?>
			</div>
            </div>
			
			<?php endforeach ?>
			
			<?php else : ?>
			<div class="col-md-6 col-xs-12 grid-item porto-box">
			<h4 class="text-center bg-primary">No Video Post Found !</h4>
			</div>
			<?php endif ?>
            
            <?php 
			$where = "start_date <= NOW() AND end_date >= NOW() AND category = 'Video'";
			$this->db->where($where);
			$this->db->order_by('gallery_id','DESC');
			$this->db->limit(8,1);
			$data_news = $this->db->get('gallery');
			
			if($data_news->num_rows() > 0):
			foreach($data_news->result_array() as $gal):
			?>
        	
			<div class="col-md-3 col-xs-12 grid-item porto-box text-center">
			<div class="thumbnail">
			<img src="<?php echo base_url().'assets/uploads/files/'.$gal['image_small']; ?>"/>
			<div class="caption">
			<h4><?php echo $gal['title'] ?></h4>
			</div>
			<?php if($gal['uri']!=''){ ?>
			<a class="btn-play" href=""><i class="fa fa-play-circle-o" aria-hidden="true"></i></a>
			<?php } ?>
			</div>
            </div>
			
			<?php endforeach ?>
			
			<?php else : ?>
			<div class="col-md-6 col-xs-12 grid-item porto-box">
			<h4 class="text-center bg-primary">No Video Post Found !</h4>
			</div>
			<?php endif ?>
			
        </div>
		
		
		</div>
		</div>
        
		</div>
		</div>
    </div>
</section>

<section class="intro-3">
		
		<div class="entry-message">
		<div class="container">
			<div class="row">
			<div class="col-md-4 col-md-offset-8 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading"><i class="fa fa-envelope"></i> SEND US A MESSAGE !</div>
				<div class="panel-body">
				<form name="?" method="post" action="" enctype="application/x-www-form-urlencoded" style="margin-bottom:0;">
				<div class="form-group">
				<input type="text" name="" placeholder="Your Name" class="form-control" maxlength="30" />
				</div>
				
				<div class="form-group">
				<input type="email" name="" placeholder="Email" class="form-control" />
				</div>
				
				<div class="form-group">
				<textarea name="" rows="5" placeholder="Message" class="form-control"></textarea>
				</div>
				
				<div class="form-group">
				<button class="btn btn-danger">SEND</button>
				</div>
				
				</form>
				</div>
			</div>
			</div>
			</div>
		</div>
		</div>
</section>

<section class="subscribe">
	<div class="container">
	<div class="clearer">
	
	<h3 class="secTitle">SUBSCRIBE<span>TO OUR NEWSLATTER</span></h3>
	<p class="sectagline">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
		
	<div class="row">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
	<form name="" method="" action="">
	<div class="input-group">
      <input type="text" class="form-control" placeholder="Subscribe...">
      <span class="input-group-btn">
        <button class="btn btn-warning" type="button">Subscribe</button>
      </span>
    </div>
	</form>
	</div>
	</div>
	</div>
	</div>
</section>


</content>
<?php include "include/footer.php"; ?>