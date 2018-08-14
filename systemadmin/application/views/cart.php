<?php include_once "template/include/header.php"; ?>
	<content class="inside">
	<section class="cart">
    	<div class="container">
        	<div class="clearer">
			
				<ol class="breadcrumb">
					<li><a href="<?php echo site_url() ?>">Home</a></li>
					<li class="active">Keranjang Belanja</li>
				</ol>
			
					<div class="row">
						<div class="col-md-8 col-sm-8 col-xs-12">
						
							<form name="myCart" method="post" action="<?php echo site_url('cart/delete') ?>" enctype="application/x-www-form-urlencoded">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><i class="fa fa-shopping-cart"></i> Keranjang Belanja</h4>
									</div>
									
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
										<div class="row" id="cartid">
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
															  <button type="button" class="btn btn-danger btn-number btn-numeric"  data-type="minus" data-field="quant[<?php echo $i ?>]">
																<span class="glyphicon glyphicon-minus"></span>
															  </button>
														  </span>
														  <input type="text" name="quant[<?php echo $i ?>]" data-id="<?php echo $row['cart_id'] ?>" class="form-control input-number" value="<?php echo $row['qty'] ?>" min="1" max="100" data-price="<?php echo $row['price'] ?>" data-num="<?php echo $i ?>">
														  <span class="input-group-btn">
															  <button type="button" class="btn btn-success btn-number btn-numeric" data-type="plus" data-field="quant[<?php echo $i ?>]">
																  <span class="glyphicon glyphicon-plus"></span>
															  </button>
														  </span>
													</div>
												</div>
											</div>
											<div class="col-md-3 text-right">
												<p id="priceid" class="price<?php echo $i ?>"><strong>Rp. <?php echo number_format($row['price']*$row['qty'],0,',','.'); ?></strong></p>
											</div>
											<div class="col-md-1 text-center">
												<a class="btn-delete del-item<?php echo $i; ?>" data-id="<?php echo $row['rowid'] ?>" data-name="<?php echo $row['product_name'] ?>" href="#remove_item" onclick="showModaldelete();currentDelete(<?php echo $i ?>)"><i class="fa fa-remove"></i></a>
											</div>
										</div>
										<?php endforeach; ?>
										<?php else: ?>
										<div class="text-center">
										<h2 style="color:#001e78"><i class="fa fa-shopping-basket"></i></h2>
										<h4>Belum ada barang di keranjang belanja kamu</h4>
										<p>Ayo mulai belanja di Koperasi Serasi dan nikmati kemudahannya</p>
										</div>
										<?php endif ?>
									</div>
									
									<?php if($this->w_cart->total_items() > 0): ?>
									<div class="panel-footer">
										<div class="row">
											<div class="col-md-6">
												<h4 id="grandtotal" class="media-heading">Total: <strong>Rp. <?php echo number_format($this->w_cart->total(),0,',','.'); ?></strong></h4>
												<p>Belum termasuk ongkos kirim</p>
											</div>
											<div class="col-md-3 col-md-offset-3 text-right">
												<?php if($this->session->userdata('logged_in') !== NULL): ?>
													<a href="<?php echo site_url('payment?dlv=reg') ?>" class="btn btn-danger btn-block">Bayar</a>
												<?php else: ?>
													<a href="#" class="btn btn-danger btn-block" onclick="modalLogin()">Bayar</a>
												<?php endif ?>	
											</div>
										</div>			
									</div>
									<?php endif ?>	
								
								</div>
							</form>
						
						</div>
						
						<div class="col-md-4 col-sm-4 col-xs-12">
				
						</div>
					
					</div>
					
					<div class="modal" id="myModal">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  
						  <div class="modal-body">
							<div class="row">
								<div class="col-md-8 col-md-offset-2 col-xs-12">
									<div class="thumbnail text-center" style="margin-bottom:0;border:0">
										<img class="img-responsive" src="<?php echo base_url('images/trash.png') ?>" width="60px" />
										<div class="caption">
										<h4><i style="color:#ff0000" class="fa fa-warning"></i> Hapus Produk</h4>
										<p id="del-item" style="margin-bottom:15px;"></p>
										<a id="btnDelete" class="btn btn-warning btn-block" href="">Ya, Hapus!</a>
										<button onclick="closeModal()" class="btn btn-default btn-block">Tidak, lanjut belanja</button>
										</div>
									</div>
								</div>
							</div>
						  </div>
						  
						</div>
					  </div>
					</div>
					
					<div class="modal" id="modalLogin">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
														  
								<div class="modal-body">
									<div class="row">
										<div class="col-md-12 col-xs-12">
											<p class="bg-info" style="padding:10px;margin-bottom:15px;"><i class="fa fa-info-circle"></i> Untuk dapat melakukan pembayaran silahkan login : </p>
											<div class="panel panel-warning" style="margin:0;">
												<div class="panel-heading">
													<h4 class="panel-title"><i class="fa fa-lock"></i> Login</h4>
												</div>
												<div class="panel-body">
													<form name="formLogin" method="post" action="<?php echo site_url('cart/login_pay') ?>" enctype="application/x-www-form-urlencoded" style="margin-bottom:0;">
													
													<div class="form-group">
													<label for="email">Email :</label>
													<input type="email" name="email" class="form-control" />
													</div>
													
													<div class="form-group">
													<label for="email">Password :</label>
													<input type="password" name="password" class="form-control" />
													</div>
													
													<div class="form-group">
													<button type="submit" name="btnSubmit" class="btn btn-warning">Login</button>
													</div>
													
													</form>
												</div>
												
												<div class="panel-footer">
													<div class="row">
														<div class="col-md-6 col-xs-6">
															<p>Belum punya akun? Daftar <a href="#">disini</a></p>
														</div>
													</div>
												</div>
											</div>
										</div>
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