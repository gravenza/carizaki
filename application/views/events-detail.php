<?php include "include/header.php" ?>
<?php
$row = $query->row_array();
?>
<content class="l">
	<div class="wrapper">

  <?php 
      //  $data=$this->db->query("select a.*,b.* from news a inner join imagenews b on a.news_id=b.news_id");
        $datad=$query->row_array();?>

    <div class="container l dSpace">
    	<div class="clearer l">
        
        <div class="contentLeft l">
        
        <div class="rowsDetail">
        <div class="caption">
        <p class="cat">Jakarta Event | Bussiness | <i class="fa fa-clock-o"></i> 15 September 2015</p>
        <?php echo stripslashes($datad['title']); ?>
        </div>
        
        <img src="<?php echo base_url() . $datad['image_small'];?>"/>
        
       <p><?php echo stripslashes($datad['description']); ?></p>


       <?php if($query2->num_rows()>0): ?>
                <?php foreach($query2->result_array() as $row): ?>
                <img src="<?php echo base_url() . $row['file_image']; ?>" class="merchant-gambar" />
              <?php endforeach; ?>
              <?php endif; ?>
        </div>


          <?php if($datad['tag']!=''): ?>

      <?php //echo $n['tag']; 

      $tags = explode(',', $datad['tag']);



      ?>

      <?php foreach($tags as $t): ?>
      <a href="<?php echo base_url().'event/viewbytag/'.str_replace(' ', '-', $t); ?>"><?php echo $t.'/'; ?></a>
    <?php endforeach; ?>
    <br>
    <?php endif; ?>

        
        <div class="clearer l">
        <h3 style="margin-bottom:0">Related Article</h3>
        </div>
        
 	<div class="clearer l gallery" style="margin-top:0;">
        
    <div class="rowsGallery">
    <img src="<?php echo base_url(); ?>images/news/news1.jpg"/>
    <div style="text-align:left" class="description">
    <a href="#">Lorem Ipsum is simply dummy text of the printing</a>
    <p>Lorem Ipsum is simply dummy text of the printing</p>
    </div>
    </div>
    
    <div class="rowsGallery">
    <img src="<?php echo base_url(); ?>images/news/news2.jpg"/>
    <div style="text-align:left" class="description">
    <a href="#">Lorem Ipsum is simply dummy text of the printing</a>
    <p>Lorem Ipsum is simply dummy text of the printing</p>
    </div>
    </div>
    
    <div class="rowsGallery">
    <img src="<?php echo base_url(); ?>images/news/news3.jpg"/>
    <div style="text-align:left" class="description">
    <a href="#">Lorem Ipsum is simply dummy text of the printing</a>
    <p>Lorem Ipsum is simply dummy text of the printing</p>
    </div>
    </div>
    
    </div><!--END CLEARER GALLERY-->
        
        
        
        
        
        
    
    </div>
    
    <?php include_once "include/sidebar.php";?>
        
        </div><!--END CLEARER-->
    </div><!--END CONTAINER-->
    </div><!--END WRAPPER-->
</content>
<?php include "include/footer.php" ?>
