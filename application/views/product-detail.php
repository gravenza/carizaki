<?php include "include/header.php"; ?>
<content class="product">	
	
	<?php $row = $queryproduct->row_array(); ?>
	<?php $uri = $this->uri->segment(4) ?>
	
	<?php
		switch($uri){
			case 1:
			$pict = 'paint.jpg';
			break;
			case 2:
			$pict = 'natural.jpg';
			break;
			case 3:
			$pict = 'cool.jpg';
			break;
			case 4:
			$pict = 'bare.jpg';
			break;
			case 5:
			$pict = 'truss.jpg';
			break;
		}
	?>
	
	<section class="product-detail" style="background-image:url(<?php echo base_url('images/product').'/'.$row['image']; ?>)">
		<div class="container">
			<div class="row entry-content">
				<div class="col-md-6 col-xs-12">
					<div class="middle">
						<div class="middle-frame">
							<div class="inner">
								<?php echo $row['content'] ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-xs-12 text-center">
					<div class="middle">
						<div class="middle-frame">
							<div class="inner">
								<img src="<?php echo base_url('assets/file/produk').'/'.$row['id_produk'] ?>.jpg" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="caption">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-xs-12">
						<div class="middle">
							<div class="middle-frame">
								<div class="inner">
									<h3><strong>Produk Kami</strong></h3>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-8 col-xs-12">
						<div class="middle">
							<div class="middle-frame">
								<div class="inner">
									<ul>
									
									<?php $uri1 = $this->uri->segment(1)  ?>
										<li class="<?php echo $row['id_produk'] == 1 ? 'active' : '' ?>">
											<a href="<?php echo site_url($uri1.'/product/detail/1/bluescope-zacs-paint') ?>" onclick="nextproduct(1)">
											<img src="<?php echo base_url('assets/file/produk').'/1.jpg' ?>" />
											</a>
										</li>
										<li class="<?php echo $row['id_produk'] == 2 ? 'active' : '' ?>">
											<a href="<?php echo site_url($uri1.'/product/detail/2/bluescope-zacs-natural') ?>" onclick="nextproduct(2)">
											<img src="<?php echo base_url('assets/file/produk').'/2.jpg' ?>" />
											</a>
										</li>
										<li class="<?php echo $row['id_produk'] == 3 ? 'active' : '' ?>">
											<a href="<?php echo site_url($uri1.'/product/detail/3/bluescope-zacs-cool') ?>" onclick="nextproduct(3)">
											<img src="<?php echo base_url('assets/file/produk').'/3.jpg' ?>" />
											</a>
										</li>
										<li class="<?php echo $row['id_produk'] == 4 ? 'active' : '' ?>">
											<a href="<?php echo site_url($uri1.'/product/detail/4/bluescope-zacs-bare') ?>" onclick="nextproduct(4)">
											<img src="<?php echo base_url('assets/file/produk').'/4.jpg' ?>" />
											</a>
										</li>
										<li class="<?php echo $row['id_produk'] == 5 ? 'active' : '' ?>">
											<a href="<?php echo site_url($uri1.'/product/detail/5/bluescope-zacs-truss') ?>" onclick="nextproduct(5)">
											<img src="<?php echo base_url('assets/file/produk').'/5.jpg' ?>" />
											</a>
										</li>										
									</ul>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
</content>
<?php include "include/footer.php"; ?>