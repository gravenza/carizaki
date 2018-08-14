<?php include "include/header.php"; ?>

<content>
	<section class="homeSlider">
    	<?php include "include/slider.php"; ?>
    </section>
    
<section class="brand">
	<div class="container">
    <h3 style="margin:50px 0;" class="titleContent text-center">OUR <span>BRAND</span></h3>	
    	<div class="clearer" style="margin:0;">
        	<div class="row">
        	
            <div class="col-md-3 col-xs-6 text-center">
            <img src="<?php echo base_url(); ?>images/brand/brand1.png"/>
            <p>FIFASTRA untuk pembiayaan motor baru &amp Bekas</p>
            </div>
            
            <div class="col-md-3 col-xs-6 text-center">
            <img src="<?php echo base_url(); ?>images/brand/brand2.png"/>
            <p>SPEKTRA untuk pembiayaan multi guna </p>
            </div>
            
            <div class="col-md-3 col-xs-6 text-center hidden-xs">
            <img src="<?php echo base_url(); ?>images/brand/brand3.png"/>
            <p>DANASTRA untuk pembiayaan micro financing</p>
            </div>
            
            <div class="col-md-3 col-xs-6 text-center hidden-xs">
            <img src="<?php echo base_url(); ?>images/brand/brand4.png"/>
            <p>AMITRA untuk skema pembiayaan secara syariah</p>
            </div>
                 
        	</div>
        </div>
    </div>
</section>

<section class="achievement">
	<div class="container">
    <h3 style="margin:0 0 20px;color:#9b9b9b" class="titleContent text-center">ACHIEVEMENT</h3>	
    	<div class="clearer" style="margin:0;">
        	<div class="row">
        	
            <div class="col-md-3 col-xs-6 text-center">
			<div class="thumbnail">
            <img src="<?php echo base_url(); ?>images/achievement/1.jpg"/>
			</div>
            </div>
            
            <div class="col-md-3 col-xs-6 text-center">
			<div class="thumbnail">
            <img src="<?php echo base_url(); ?>images/achievement/2.jpg"/>
			</div>
            </div>
            
            <div class="col-md-3 col-xs-6 text-center hidden-xs">
			<div class="thumbnail">
            <img src="<?php echo base_url(); ?>images/achievement/3.jpg"/>
			</div>
            </div>
            
            <div class="col-md-3 col-xs-6 text-center hidden-xs">
			<div class="thumbnail">
            <img src="<?php echo base_url(); ?>images/achievement/4.jpg"/>
			</div>
            </div>
            
            
                 
        	</div>
        </div>
    </div>
</section>

<section class="news">
	<div class="container">
    <h3 style="margin:20px 0" class="titleContent BigTitle">BERITA <span>TERBARU</span>
    <span class="more text-right"><a href="<?php echo site_url('news'); ?>">More News</a></span>
    </h3>
    	<div class="clearer" style="margin-top:0">
        	<div class="row news-home">
            
            
            <?php 

            $newsQuery = $this->db->query("select * from sketsa_news where posting_date<= '".date('Y-m-d')."' and lang ='en' order by id desc limit 4 ");

            ?>

            <?php if($newsQuery->num_rows()>0): ?>

                <?php foreach($newsQuery->result_array() as $r): ?>


            <div class="col-md-6 col-xs-12 listNews">
            <div class="media">
  				<div class="media-left media-top">
    				<a href="#">
					<img class="media-object" src="<?php echo base_url().'../uploads/news/'.$r['image_small']; ?>" alt="">
					</a>
  				</div>
  				<div class="media-body">
    				<h4 class="media-heading">
					<a class="title-news" href="<?php echo site_url('news/detail/'.$r['id'].'/'.url_title($r['header'])) ?>"><?php echo $r['header']; ?></a>
					</h4>
    				<p class="date"><i class="fa fa-clock-o"></i> 13:21:01 | <i class="fa fa-calendar"></i> 16 Februari 2017</p>
					<div class="hidden-xs hidden-sm"><?php echo $r['resume']; ?></div>
  				</div>
				</div>
            </div>

        <?php endforeach; ?>
            
            <?php endif; ?>
            
            
            
                
        	</div>
        
        </div>
    </div>
</section>

<section class="banner">
	<div class="container">
    
    	<div class="clearer" style="border-top:solid thin #ccc; margin:0">
        	<div class="row">
            
            <div class="col-md-6 col-xs-12 listBanner">
            <div class="thumbnail">
			<a href=""><img src="<?php echo base_url().'/images/banner/banner1.jpg' ?>" alt="" title="" /></a>
			</div>
            </div>
			
			<div class="col-md-6 col-xs-12 listBanner">
            <div class="thumbnail">
			<a href=""><img src="<?php echo base_url().'/images/banner/banner2.jpg' ?>" alt="" title="" /></a>
			</div>
            </div>
            
            
                
        	</div>
        
        </div>
    </div>
</section>

<section class="video">
	<div class="container">
    <h3 class="titleContent BigTitle text-center">VIDEO <span>TERBARU</span>
    <span class="more text-right"><a href="<?php echo site_url('video'); ?>">More Video</a></span>
    </h3>
    
    <div class="clearer">
    	<div class="row">

            <?php 

            $videoQuery = $this->db->query("select * from video order by video_id desc  limit 1 ");

            ?>

        <div class="col-md-9 col-sm-6 col-xs-12">
        	<div class="videoImage">
            <?php

            if($videoQuery->num_rows()>0):

             ?>

            <?php 

            $video= $videoQuery->row_array();
            $video_id = $video['video_id'];

             ?>
            <a href="<?php echo site_url("video/detail/".$video['video_id'].'/'.url_title($video['title'])); ?>"><!-- <img src="<?php echo base_url(); ?>images/video/video1.jpg"/> -->
			
			<div class="embed-responsive embed-responsive-16by9">
			<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $video['uri'] ?>"></iframe>
			</div>
			</a>
            
            <?php endif; ?>

            <!-- <div class="link">
            <a href="<?php echo site_url("video/detail/".$video['video_id'].'/'.url_title($video['title'])); ?>" > &nbsp; </a>
            </div> -->
            </div>
        </div>
        
        <div class="col-md-3 col-sm-6 col-xs-12 video-sidebar hidden-xs">
        	
            <?php 

            $videoQuery2 = $this->db->query("select * from video where video_id != ".$video_id." order by video_id desc  limit 3 ");

            ?>

            <?php if($videoQuery2->num_rows()>0): ?>

                <?php foreach($videoQuery2->result_array()as $r):  ?>

            <div class="videoImage">
            <img src="<?php echo base_url().'assets/uploads/files/'.$r['image_small']; ?>"/>
            
            <div class="link">
            <a href="<?php echo site_url("video/detail/".$r['video_id'].'/'.url_title($r['title'])); ?>"> &nbsp; </a>
            </div>
            </div>

        <?php endforeach; ?>

        <?php endif; ?>
			
			<!--<div class="videoImage hidden-sm">
            <img src="<?php echo base_url(); ?>images/video/video1.jpg"/>
            
            <div class="link">
            <a href="#"> &nbsp; </a>
            </div>
            </div>
			
			<div class="videoImage hidden-sm">
            <img src="<?php echo base_url(); ?>images/video/video1.jpg"/>
            
            <div class="link">
            <a href="#"> &nbsp; </a>
            </div>
            </div>-->
			
        </div>
        </div>
    </div>
    
    </div>
</section>



<section class="article">
	<div class="container">
    <h3 style="margin:20px 0" class="titleContent bigTitle">ARTIKEL <span>TERBARU</span>
    <span class="more text-right"><a href="<?php echo site_url('articles'); ?>">More Article</a></span>
    </h3>
    	<div class="clearer" style="margin-top:0">
        	<div class="row">
        	
             <?php 

            $articlesQuery = $this->db->query("select * from sketsa_articles where posting_date<= '".date('Y-m-d')."' and lang ='id' order by id desc limit 3 ");

            ?>

            <?php if($articlesQuery->num_rows()>0): ?>

                <?php foreach($articlesQuery->result_array() as $r): ?>

            <div class="col-md-4 col-sm-4 col-xs-12">
            	<div class="thumbnail">
				<?php $query2 = $this->db->query("select * from sketsa_articles_images where  articles_id = '$r[id]' order by rand() limit 1");
				$i = $query2->row();
				
				
				?>
				<a href="#">
				<!-- <img class="media-object" src="<?php echo base_url().'../uploads/articles/cat/'.$i->image; ?>" /> -->
				<img class="media-object" src="<?php echo base_url().'../uploads/articles/'.$r['image_small']; ?>"/>
				</a>
				
				<div class="caption">
				<h4 class="media-heading">
				<a class="title-news" href="<?php echo site_url('articles/detail/'.$r['id'].'/'.url_title($r['header'])) ?>"><?php echo $r['header']; ?></a></h4>
				<p class="date"><i class="fa fa-clock-o"></i> 13:21:01 | <i class="fa fa-calendar"></i> 16 Februari 2017</p>
				</div>
				</div>
            </div>
			
			

        <?php endforeach; ?>
            <?php endif; ?>
            
          
                
        	</div>
        
        </div>
    </div>
</section>


</content>
<?php include "include/footer.php"; ?>