<?php include "include/header.php"; ?>

	<?php
	$uri 	= $_SERVER['PHP_SELF'];
	$ip 	= $_SERVER['REMOTE_ADDR'];
	//echo $_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];
	?>

<content>
	<section class="headline">
    	<div class="container">
    	<div class="clearer">
        
        <div class="row">
        
        <div class="col-md-8 col-xs-12">
        <?php include "include/slider.php"; ?>        
        </div>
        
        <div class="hotDeal col-md-4 col-xs-12">
        <h4 style="margin-top:0;padding-top:0;" class="catTitle">HOT DEALS</h4>
        
		<div class="row">
                
			<?php
			
			$dataNewproduct = $this->db->order_by('product.sale','RANDOM')->where('product.sale >',0)->where('product.publish','Y')->limit(2,0)->get('product');
			if($dataNewproduct->num_rows() > 0):
				foreach($dataNewproduct->result_array() as $row):
				$data = $this->koperasi->pricing($row['product_id']);
			?>	
			
				<div class="col-md-6 col-xs-6 col-sm-6 singleCol">
					<div class="thumbnail">
					
						<?php if($row['sale']!='0'){ echo "<span class='discount'>SALE</span>"; } ?>
					
						<a href="<?php echo site_url('product/detail').'/'.$row['product_id'].'/'.$row['slug']?>">
							<img src="<?php echo base_url().'images/product/'.$row['image_small'] ?>">
						</a>
					
						<div class='caption'>
							<a class='title' href="<?php echo site_url('product/detail').'/'.$row['product_id'].'/'.$row['slug']?>">
							<?php echo substr($row['productName'],0,40) ?></a>
							<p class='star'><?php //echo $this->review->rating($row['product_id'])?></p>
						
							<?php if($row['sale']!=0): ?>
							<p class="sale">IDR. <?php echo $data['price'] ?>,-</p>
							<p class='price'>IDR. <?php echo $data['sale'] ?>,-</p>
							<?php else: ?>
							<p class="sale">&nbsp;</p>
							<p class='price'>IDR. <?php echo $data['price'] ?>,-</p>
							<?php endif ?>
							
							<p style="margin:10px 0 0 0;">
							<a class="btn btn-danger" href="<?php echo site_url('cart/addtocart').'/'.$row['product_id'].'/'.$row['slug']?>"><i class='fa fa-shopping-cart'></i></a>
							<a class="btn btn-danger wishlist disabled" href="<?php echo site_url('wishlist/addWishlist').'/'.$row['product_id'] ?>"><i class='fa fa-heart-o'></i></a>
							</p>
						</div>
					
					</div>
				</div>
				<?php endforeach ?>
			<?php endif ?>
                
        </div>
        </div>
        
        
        </div><!--END ROW-->
        
        <div class="clearer">
        <div class="row">
        
        	
        
        <div class="col-md-12 col-xs-12">
        <div class="clearer">
        <div class="row">
        
        <?php
		$this->db->order_by('banner_id','DESC')->limit(3,0)->where('position',1);
		$dataBanner = $this->db->get('banner');
		
		if($dataBanner->num_rows() > 0):;
		foreach($dataBanner->result_array() as $ban):;
		?>
        
        <div class="col-md-4 col-xs-12 banner singleCol">
        <?php if($ban['url']!=''): ?>
        <a href="<?php echo $ban['url']; ?>"><img src="<?php echo base_url(); ?>images/banner/<?php echo $ban['file_banner']; ?>"></a>
        <?php else: ?>
        <img src="<?php echo base_url(); ?>images/banner/<?php echo $ban['file_banner']; ?>">
		<?php endif; ?>
        </div>
        
        <?php endforeach; ?>
		<?php endif; ?>
        
        </div>
        </div>
        <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">NEW PRODUCT</a></li>
    <!-- <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">COMING SOON</a></li> -->
    <!-- <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">PRODUCT RECOMENDED</a></li> -->
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
    <div class="clearer">
    <div class="row">
    
			<?php
			$this->db->where('archive','np')->where('product.publish','Y')->order_by('product_id','DESC')->limit(10);
			$dataNewproduct = $this->db->get('product');
			
			if($dataNewproduct->num_rows() > 0):
				foreach($dataNewproduct->result_array() as $row):
				$data = $this->koperasi->pricing($row['product_id']);
			?>
				<div class="col-md-3 col-xs-6 col-sm-6 singleCol">
					<div class="thumbnail">
					
						<?php if($row['sale']!='0'){ echo "<span class='discount'>SALE</span>"; } ?>
					
						<a href="<?php echo site_url('product/detail').'/'.$row['product_id'].'/'.$row['slug']?>">
							<img src="<?php echo base_url().'images/product/'.$row['image_small'] ?>">
						</a>
					
						<div class='caption'>
							<a class='title' href="<?php echo site_url('product/detail').'/'.$row['product_id'].'/'.$row['slug']?>">
							<?php echo substr($row['productName'],0,40) ?></a>
							<p class='star'><?php //echo $this->review->rating($row['product_id'])?></p>
						
							<?php if($row['sale']!=0): ?>
							<p class="sale">IDR. <?php echo $data['price'] ?>,-</p>
							<p class='price'>IDR. <?php echo $data['sale'] ?>,-</p>
							<?php else: ?>
							<p class="sale">&nbsp;</p>
							<p class='price'>IDR. <?php echo $data['price'] ?>,-</p>
							<?php endif ?>
							
							<p style="margin:10px 0 0 0;">
							<a class="btn btn-danger" href="<?php echo site_url('cart/addtocart').'/'.$row['product_id'].'/'.$row['slug']?>"><i class='fa fa-shopping-cart'></i></a>
							<a class="btn btn-danger wishlist disabled" href="<?php echo site_url('wishlist/addWishlist').'/'.$row['product_id'] ?>"><i class='fa fa-heart-o'></i></a>
							</p>
						</div>
					
					</div>
				</div>
				
				
			<?php endforeach ?>
			<?php endif ?>            
                
                
                
                
                
                
    </div>
    </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="profile">...</div>
    <div role="tabpanel" class="tab-pane" id="messages">...</div>
  </div>

		</div>
        </div>
        
        </div>
    </div>
		
	</div>
	</div>
    </section>
    
    <section class="category">
    <div class="container">
    <div class="clearer" style="margin:0;">
    <h1 class="catBigTitle"><span><strong>G</strong>ADGET</span></h1>
    </div>
    <div class="clearer">
		<div class="row">            
			<?php echo $this->koperasi->showcategory(9); ?> 
		</div>
    </div>
    </div>
    </section>
	
	<section class="category">
    <div class="container">
    <div class="clearer" style="margin:0;">
    <h1 class="catBigTitle"><span><strong>N</strong>OTEBOOK</span></h1>
    </div>
    <div class="clearer">
		<div class="row">             
			<?php echo $this->koperasi->showcategory(3); ?> 
		</div>
    </div>
    </div>
    </section>
	
	<section class="category">
    <div class="container">
    <div class="clearer" style="margin:0;">
    <h1 class="catBigTitle"><span><strong>P</strong>OTHOGRAPHY</span></h1>
    </div>
    <div class="clearer">
		<div class="row">             
			<?php echo $this->koperasi->showcategory(5); ?> 
		</div>
    </div>
    </div>
    </section>
	
	<section class="category">
    <div class="container">
    <div class="clearer" style="margin:0;">
    <h1 class="catBigTitle"><span><strong>P</strong>ERIPHERAL</span></h1>
    </div>
    <div class="clearer">
		<div class="row">             
			<?php echo $this->koperasi->showcategory(13); ?> 
		</div>
    </div>
    </div>
    </section>
	
	<section class="category">
    <div class="container">
    <div class="clearer" style="margin:0;">
    <h1 class="catBigTitle"><span><strong>O</strong>THERS</span></h1>
    </div>
    <div class="clearer">
		<div class="row">             
			<?php echo $this->koperasi->showcategory(14); ?> 
		</div>
    </div>
    </div>
    </section>


</content>
<?php include "include/footer.php"; ?>