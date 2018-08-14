<?php include "include/header.php"; ?>
	<?php $row = $queryproduct->row_array(); ?>
	<content class="product-detail" style="background-image:url(<?php echo base_url('images/product').'/'.$row['id_produk'].'.png' ?>)">
    	<div class="container">
        	<div class="clearer cellpadding">
				
				<div class="row">
					<div class="col-md-4 col-xs-12 text-center">
					<img src="<?php echo base_url('assets/file/produk').'/'.$row['id_produk'].'.jpg'; ?>">
					</div>
            
					<div class="col-md-8 col-xs-12">
					<!-- <h1><?php echo $row['title'] ?></h1> -->
					<div class="clearer"></div>
					<div class="desc">
					<?php echo $row['content'] ?>
					</div>
					<div class="clearer hidden">
					<form>
						<div class="form-group">
						<div class="row">
						<div class="col-md-4 col-xs-6">
						<label>Qty</label>
						<input type="number" class="form-control">
						</div>
						</div>
						</div>
						
						<div class="form-group">
						<input type="submit" value="ADD TO CART" class="btn btn-info">
						<a class="btn btn-danger" href="#">CONTINUE SHOPPING</a>
						</div>
					</form>
					</div>
					</div>
				</div>
            </div>
            
            
            
        </div>
    </content>
<?php include "include/footer.php"; ?>