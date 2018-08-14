<?php include_once "template/include/header.php"; ?>

	<content class="inside">
	<section class="paymen">
		<div class="container">
			<div class="clearer">
				<ol class="breadcrumb">
					<li><a href="<?php echo site_url() ?>">Home</a></li>
					<li class="active">Payment</li>
				</ol>
				
				<div class="row">
					<div class="col-md-8 col-xs-12">
						<div class="panel panel-default">
							<div class="panel-heading"><h4 class="panel-title"><i class="fa fa-info-circle"></i> Detail Pembeli</h4></div>
							
								<ul class="list-group">
									<li class="list-group-item"><?php echo $cus->cs_name ; ?></li>
									<li class="list-group-item">
										<?php echo $cus->address .'<p>'. ucwords(strtolower($kel['nama_kelurahan'])) .' - '. ucwords(strtolower($kec['nama_kecamatan'])) .'<br />'. $kab['nama_kabupaten'] .' - '. $pro['nama_provinsi'].'</p>'; ?>
										
									</li>
								</ul>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading"><h4 class="panel-title"><i class="fa fa-info-circle"></i> Detail Belanja</h4></div>
							
								<div class="panel-body">
									
									<?php 
										
										if($this->session->userdata('logged_in')){
											$this->db->where('customer_id', $this->session->userdata('c_id'));
										}else{
											$this->db->where('sid', $this->session->userdata('m_cart'));
										}
											$queryCart = $this->db->get('cart');											
									?>
									
									<?php if($queryCart->num_rows() > 0): ?>
										<?php $i = 0; ?>
										<?php foreach($queryCart->result_array() as $row): $i++; ?>
										<div class="row">
											<div class="col-md-2">
												<div class="thumbnail">
													<img src="<?php echo base_url('images/product/').$row['picture'] ?>"  />
												</div>
											</div>
											<div class="col-md-6">
												<p style="margin-bottom:10px;"><?php echo $row['product_name'] ?></p>
												<div class="col-md-6" style="padding-left:0;">
													<div class="input-group">
														  <span class="input-group-btn">
															  <button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quant[<?php echo $i ?>]">
																<span class="glyphicon glyphicon-minus"></span>
															  </button>
														  </span>
														  <input type="text" name="quant[<?php echo $i ?>]" data-id="<?php echo $row['cart_id'] ?>" class="form-control input-number" value="<?php echo $row['qty'] ?>" min="1" max="100" data-price="<?php echo $row['price'] ?>" data-num="<?php echo $i ?>">
														  <span class="input-group-btn">
															  <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[<?php echo $i ?>]">
																  <span class="glyphicon glyphicon-plus"></span>
															  </button>
														  </span>
													</div>
												</div>
											</div>
											<div class="col-md-4 text-right">
												<p id="priceid" class="price<?php echo $i ?>"><strong>Rp. <?php echo number_format($row['price']*$row['qty'],0,',','.'); ?></strong></p>
											</div>
										</div>
										<?php endforeach; ?>
										<?php endif ?>
								</div>
								<div class="panel-footer">
									<div class="row">
										<div class="col-md-2 col-xs-2">
											<p>Kurir :</p>
										</div>
										<div class="col-md-6 col-xs-6">
											<div class="form-group">
												<form name="?" method="get" action="" enctype="application/x-www-form-urlencoded">

												<select name="dlv" onchange="this.form.submit()" class="form-control">
													<option data-tokens="==PILIH KURIR==" >==PILIH KURIR==</option>
												  <option value="reg" <?php echo ($_GET['dlv']=='reg' ? 'selected' : '') ?>>JNE Reg</option>
												  <option value="oke" <?php echo ($_GET['dlv']=='oke' ? 'selected' : '') ?>>JNE Ok</option>
												  <option value="yes" <?php echo ($_GET['dlv']=='yes' ? 'selected' : '') ?>>JNE Yes</option>
												</select>
												</form>
											</div>
											<p>Untuk saat ini layanan jasa pengiriman yang tersedia adalaha JNE, kami akan terus meningkatkan kualitas dan kemudahan layanan dalam berbelanja di toko kami.</p>
										</div>
										<div class="col-md-4 col-xs-4">
											<p class="ongkir">Rp. <?php echo number_format($this->w_cart->delivery(),0,',','.'); ?></p>
										</div>
									</div>
									<hr />
									<div class="row">
										<div class="col-md-2 col-xs-2">
											<p>Catatan :</p>
										</div>
										<div class="col-md-6 col-xs-6">
											<div class="form-group">
											<textarea rows="6" name="note" class="form-control"></textarea>
											</div>
										</div>
									</div>
								</div>
						</div>
					</div>
					<div class="col-md-4 col-xs-12 box-total-payment">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><i class="fa fa-info-circle"></i> Total Pembayaran</h4>
							</div>
							<div class="panel-body">
								<dl>
									<dt>Total Harga Barang</dt>
									<dd><?php echo 'Rp. '. number_format($this->w_cart->total(),0,',','.') ?></dd>
								</dl>
								<dl>
									<dt>Biaya Kirim</dt>
									<dd><?php echo 'Rp. '. number_format($this->w_cart->delivery(),0,',','.'); ?></dd>
								</dl>
								<dl>
									<dt>Biaya Administrasi</dt>
									<dd><?php echo 'Rp. '. number_format(0,0,',','.') ?></dd>
								</dl>
								<hr />
								<dl>
									<dt>Total Belanja</dt>
									<dd><strong><?php echo 'Rp. '. number_format($this->w_cart->grandTotal(),0,',','.') ?></strong></dd>
								</dl>
								
								<div class="form-group" style="margin-bottom:0">
									<form method="post" action="<?php echo site_url('payment/dopayment') ?>" enctype="application/x-www-form-urlencoded">
									<?php echo form_hidden('kurir', $_GET['dlv']); ?>
									<button type="submit" class="btn btn-warning btn-block">Bayar Sekarang</button>
									</form>
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
