<?php include "template/include/header.php"; ?>

<content class="inside">

	<section class="product-detail">
		<div class="container">
			<div class="clearer">

				<ol class="breadcrumb">
					<li><a href="<?php echo site_url() ?>">Home</a></li>
					<li><a href="<?php echo site_url($cat->slug) ?>"><?php echo $cat->category_name; ?></a></li>
					<li><a href="<?php echo site_url() ?>"><?php echo $suba->subcategory_name; ?></a></li>
					<?php if($pro->subcategory2_id != 0): ?>
					<li><a href="<?php echo site_url() ?>"><?php echo $subb->subcategory_name; ?></a></li>
					<?php endif ?>
					<li class="active hidden-xs"><?php echo $pro->productName ?></li>
				</ol>
			
				<div class="row">
					<div class="col-md-9 col-xs-12">
					<div class="main-detail">
					
					<div class="row">
						<div class="col-md-4 col-xs-12">
							<div class="thumbnail">
								<a href="#">
								<img onclick="openModal();currentSlide(1)" src="<?php echo base_url('images/product/').$pro->image_small; ?>" />
								</a>
								<div class="caption">
								<?php $totalImage = count(unserialize($pro->images)); ?>
								<?php if($totalImage > 0 ): ?>
								<?php $no = 1; ?>
								<?php foreach(unserialize($pro->images) as $pict): $no++; ?>
									<a class="thumb" onclick="openModal();currentSlide(<?php echo $no ?>)" href="#"><img src="<?php echo base_url('images/product/').$pict; ?>" /></a>
								<?php endforeach ?>
								<?php endif; ?>
								</div>
							</div>
						</div>
						
						<!-- Lightbox Modal Image Gallery Start -->
						<div id="myModal" class="modal" tabindex="-1" role="dialog">
							<div class="modal-dialog">
							<div class="modal-content">
							
								<span class="close cursor" onclick="closeModal()">&times;</span>
								
								<?php $num = 1; $totalImage = $totalImage + 1; ?>
								
								<div class="modal-body">
									<div class="mySlides">
										<div class="numbertext">1/<?php echo $totalImage ?></div>
										<img src="<?php echo base_url('images/product/').$pro->image_small; ?>" style="width:100%">
									</div>
									
									<?php if($totalImage > 0 ): ?>
									
									<?php foreach(unserialize($pro->images) as $pict): $num++; ?>
										<div class="mySlides">
											<div class="numbertext"><?php echo $num .'/'. $totalImage; ?></div>
											<img src="<?php echo base_url('images/product/').$pict; ?>" style="width:100%">
										</div>
									<?php endforeach ?>
									<?php endif; ?>
									
									<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
									<a class="next" onclick="plusSlides(1)">&#10095;</a>
								
								</div>
								<div class="modal-footer">
								<button type="button" class="btn btn-success">Beli Sekarang</button>
								<button type="button" class="btn btn-primary">Lanjut Belanja</button>
								</div>
							
							</div>
							</div>
						</div>
						<!-- Lightbox Modal Image Gallery End -->
						
						
						<div class="col-md-8 col-xs-12">
						<div class="summary">
						<div class="title-detail">
							<h3><?php echo $pro->productName ?></h3>
						</div>
						<?php if($pro->sale == 0): ?>
						<h2 class="price"><?php echo 'Rp. '. number_format($pro->price,'0',',','.'); ?> <small style="color:#5cb85c">Cicilan 0%</small></h2>
						<?php else: ?>
						<?php $rp = $this->koperasi->pricing($pro->product_id) ?>
						<h3 class="sale"><?php echo 'Rp. '. number_format($rp['price'],'0',',','.'); ?></h3>
						<h2 class="price"><?php echo 'Rp. '. number_format($rp['sale'],'0',',','.'); ?> <small style="color:#5cb85c">Cicilan 0%</small></h2>
						<?php endif ?>
						<ul>
							<?php
							$tiga_bulan = round($pro->price / 3);
							$enam_bulan = round($pro->price / 6);
							$satu_tahun = round($pro->price / 12);
							?>
							<li>Cicilan 0% - &nbsp;&nbsp;3 bulan : Rp. <?php echo number_format($tiga_bulan,'0',',','.') ?>/bulan</li>
							<li>Cicilan 0% - &nbsp;&nbsp;6 bulan : Rp. <?php echo number_format($enam_bulan,'0',',','.') ?>/bulan</li>
							<li>Cicilan 0% - 12 bulan : Rp. <?php echo number_format($satu_tahun,'0',',','.') ?>/bulan</li>
						</ul>
						
						<form name="cart" method="post" action="<?php echo site_url('cart/addcart') ?>" enctype="application/x-www-form-urlencoded">
						<div class="row">
							<div class="col-md-6 col-xs-12" style="margin-bottom:10px">
							<label for="qty">Masukkan jumlah yang diinginkan:</label>
							<input type="hidden" name="id" value="<?php echo $pro->product_id ?>" class="form-control" />
													<div class="input-group">
														  <span class="input-group-btn">
															  <button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="qty">
																<span class="glyphicon glyphicon-minus"></span>
															  </button>
														  </span>
														  <input type="text" name="qty" class="form-control input-number" value="1" min="1" max="100">
														  <span class="input-group-btn">
															  <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="qty">
																  <span class="glyphicon glyphicon-plus"></span>
															  </button>
														  </span>
													</div>
							</div>
							
							<div class="col-md-12 col-xs-12" style="margin-bottom:10px">
							<button type="button" name="btnBuy" class="btn btn-success btn-block">Beli Sekarang</button>
							</div>
							
							<div class="col-md-6 col-xs-12" style="margin-bottom:10px">
							<button type="submit" name="btnCart" class="btn btn-primary btn-block">Tambahkan ke Keranjang</button>
							</div>
							
							<div class="col-md-6 col-xs-12" style="margin-bottom:10px">
							<button type="button" onclick="javascript:location.href='<?php echo site_url() ?>'" class="btn btn-primary btn-block">Lihat Produk Lainnya</button>
							</div>
						
						</div>
						</form>

						</div>
					</div>
					</div>
					
					</div>
					
					<div class="clearer">
					<div class="main-detail">
					<?php echo $pro->description ?>
					</div>
					</div>
					</div>
					
					<div class="col-md-3 col-xs-12">
					<div class="widget-sidebar">
						<div class="panel panel-default">
							<div class="panel-heading">Pengiriman</div>
							<table class="table">	
								<tr align="left" valign="top">
									<td>Waktu Kirim</td>
									<td>1 - 3 hari kerja</td>
								</tr>
								
								<tr align="left" valign="middle">
									<td colspan="2">Jasa Pengiriman</td>
								</tr>
								
								<tr align="left" valign="top">
									<td class="delivery1">Waktu Kirim</td>
									<td class="delivery2">1 - 3 hari kerja</td>
								</tr>
								
								<tr align="left" valign="top">
									<td class="delivery3">Waktu Kirim</td>
									<td class="delivery4">1 - 3 hari kerja</td>
								</tr>
								
							</table>

						</div>
					</div>
					</div>
					
					<?php if($pro->tags !=''): ?>
					<div class="col-md-12 col-xs-12">
					<div class="clearer" style="margin-top:0">
						<div class="main-detail related-product">
						<h4 class="media-heading" style="padding-bottom:5px;">Produk Terkait</h4>
						
						<div class="row">
                
							<?php
							
							$tags = array();
							$tags = $pro->tags;
							
							$count = count($tags);
							
							$where = "";
							
							for($i=0; $i < $count; $i++){
								
								$where .="tags LIKE '%".$tags[$i]."%' || ";
								
							}
							
							$where .= "tags LIKE '% ". $tags[$count] ." %'";
							
							
							
							
							$dataNewproduct = $this->db->order_by('product_id','RANDOM')->where($where)->limit(6,0)->get('product');
							if($dataNewproduct->num_rows() > 0):
								foreach($dataNewproduct->result_array() as $row):
								$data = $this->koperasi->pricing($row['product_id']);
							?>	
							
								<div class="col-md-2 col-xs-6">
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
					</div>
					<?php endif; ?>
				</div>

			

			</div>
			</div>
			</div>
	</section>
</content>
<?php include "template/include/footer.php"; ?>
