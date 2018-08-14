<?php include_once "template/include/header.php"; ?>
	<content>
	<section class="news">
    	<div class="container">
        	<div class="clearer">
			<?php 
			$news = $query->row();
			?>
			<ol class="breadcrumb">
			<li><a href="<?php echo site_url() ?>">Home</a></li>
			<li><a href="<?php echo site_url('articles') ?>">Artikel</a></li>
			<li class="active"><?php echo substr($news->header,0,30); ?></li>
			</ol>
			
            <div class="row">
  			<div class="col-md-8 col-sm-8 col-xs-12">
				
			<div class="detail-title">
			<h3><?php echo $news->header; ?></h3>
			<p class="date"><i class="fa fa-clock-o"></i> 13:36:12 | <i class="fa fa-calendar"></i> 15 Mar 2017</p>
			</div>
			
			<div class="detail-content">
			
			<!--<img src="<?php echo base_url().'/images/about.jpg' ?>" />-->
			<?php //$images = $query2->result(); ?>
			<?php 

			//print_r($images);
			//echo $query2->num_rows();
			?>
			<?php  if($query2->num_rows() >0):?>

			<?php foreach($query2->result_array() as $i) : ?>
			<img class="big-image" src="<?php echo base_url().'../uploads/articles/cat/'.$i['image']; ?>"><br>
			<?php endforeach; ?>

			<?php endif; ?>
	
			<p><?php echo $news->description; ?>
</p>


<?php 
 $arrayTags = explode(",",$news->tag);
      $countTags = count($arrayTags);
  if(count($arrayTags)>0):
        ?>  <b>TAGS:</b>
        <?php foreach($arrayTags as $key=>$tags) :?> 
        <?php $countTags = $countTags-1; ?>
          <?php if($countTags==0): ?>
          <?php echo  '<a href='.site_url('news/viewbytag/'.url_title($tags)).' class=tags>'.$tags.'</a>'; ?> 
        <?php else: ?>
          <?php echo  '<a href='.site_url('news/viewbytag/'.url_title($tags)).' class=tags>'.$tags.' /'.'</a>'; ?> 
        <?php endif; ?>

          <?php endforeach; ?>

        <?php endif;?>
		<br />
		<br />
		
			</div>
			
			</div>
				
		<?php include_once "template/include/tabright.php"; ?>



                
				</div>
			</div>
        </div>
	</section>	
    </content>
<?php include_once "template/include/footer.php"; ?>