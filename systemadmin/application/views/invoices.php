<?php include_once "template/include/header.php"; ?>
	<content class="inside">
		<section>
			<div class="container">
				<div class="clearer">
					<ol class="breadcrumb">
						<li><a href="<?php echo site_url() ?>">Home</a></li>
						<li class="active">Invoice</li>
					</ol>
					
					<div class="row">
					<div class="col-md-8 col-xs-12">
						
						<div class="panel panel-default">
							<div class="panel-heading"><h4 class="panel-title"><i class="fa fa-info-circle"></i> Daftar Pembelian</h4></div>
							
								<div class="panel-body">
									
									<?php if($listItem->num_rows() > 0): ?>
										<?php $total = 0; ?>
										<?php foreach($listItem->result_array() as $row): ?>
										
										<?php $total = $total + $row['price']; ?>
										
										<div class="row">
											<div class="col-md-2">
												<div class="thumbnail">
													<img src="<?php echo base_url('images/product/').$row['picture'] ?>"  />
												</div>
											</div>
											<div class="col-md-6">
												<p style="margin-bottom:10px;"><?php echo $row['product_name'] ?></p>
											</div>
											<div class="col-md-4 text-right">
												<p id="priceid" class="price"><strong>Rp. <?php echo number_format($row['price']*$row['qty'],0,',','.'); ?></strong></p>
											</div>
										</div>
										<?php endforeach; ?>
										<?php endif ?>
								</div>
								
								<table class="table table-bordered table-striped">
								
									<tr>
										<td colspan="3">
											<p>Status Pembelian :</p>
											<?php
												if($order->progress == 25){
													echo "<ul class='buy buy-proccess'>";
												}
												elseif($order->progress == 50){
													echo "<ul class='buy buy-send'>";
												}
												elseif($order->progress == 50){
													echo "<ul class='buy buy-arrived'>";
												}
												elseif($order->progress == 50){
													echo "<ul class='buy buy-finish'>";
												}
												else{
													echo "<ul class='buy'>";
												}
											?>
												<li><i class="fa fa-dropbox"></i> Diproses</li>
												<li><i class="fa fa-truck"></i> Dikirim</li>
												<li><i class="fa fa-cube"></i> Sampai</li>
												<li><i class="fa fa-gift"></i> Selesai</li>
											</ul>

										</td>
									</tr>
									
									<tr>
										<td width="30%">
											<p>Jasa Pengiriman :</p>
											<h4>JNE <?php echo $order->kurir ?></h4>
										</td>
										<td>
											<p>No. Resi :</p>
											<?php $resi = ($order->no_resi != '' ? $order->no_resi : '-') ?>
											<h4><?php echo $resi ?></h4>
										</td>
										<td width="30%" style="vertical-align:middle;text-align:center">
											<a href="#"><i style="color:#fd711c" class="fa fa-truck"></i> Tracking Pengiriman</a>
										</td>
									</tr>
								
								</table>
						</div>
					</div>
					<div class="col-md-4 col-xs-12 box-total-payment">
						<div class="panel panel-default">
							
							<table class="table table-bordered table-striped">
								<tr>
									<td>
										<p style="color:#666">No. Tagihan :</p>
										<h4 style="font-size:16px"><?php echo 'MN'.$order->invoice.$order->series ?></h4>
									</td>
								</tr>
								
								<tr align="left" valign="middle">
									<td>
										<p style="color:#666">Status Tagihan</p>
										<?php if($order->status == 'Prepaid'): ?>
										<h4 style="font-size:16px"><?php echo 'Menunggu Pembayaran' ?></h4>
										<?php elseif($order->status == 'Expired'): ?>
										<h4 style="font-size:16px"><?php echo 'Kedaluwarsa' ?></h4>
										<?php else: ?>
										<h4 style="font-size:16px"><?php echo 'Dibayar' ?></h4>
										<?php endif ?>
									</td>
								</tr>
								
								<tr>
									<td>
										<p style="color:#666">Total Pembayaran :</p>
										<?php $grandTotal = $total + $ongkir; ?>
										<h4 style="font-size:16px">Rp. <?php echo number_format($grandTotal,0,',','.');  ?></h4>
									</td>
								</tr>
								
								<tr>
									<td>
										<p style="color:#666">Alamat Pengiriman :</p>
										
										<?php 
										$cs = $this->db->where('customer_id', $this->session->userdata('c_id'))->get('customer')->row_array();
										$kel = $this->db->where('id_kelurahan',$cs['id_kelurahan'])->get('kelurahan')->row_array();
										$kec = $this->db->where('id_kecamatan',$cs['id_kecamatan'])->get('kecamatan')->row_array();
										$kab = $this->db->where('id_kabupaten',$cs['id_kabupaten'])->get('kabupaten')->row_array();
										$pro = $this->db->where('id_provinsi',$cs['id_provinsi'])->get('provinsi')->row_array();
										?>
										
										<p style="margin-top:10px;margin-bottom:5px;"><strong><?php echo $cs['cs_name']  ?></strong></p>
										<?php echo $cs['address']  ?>
										<p> <?php echo ucwords(strtolower($kel['nama_kelurahan'])).' - '.ucwords(strtolower($kec['nama_kecamatan']))  ?></p>
										<p> <?php echo $kab['nama_kabupaten'].' - '.$pro['nama_provinsi']  ?></p>
									</td>
								</tr>
								
							</table>

						</div>
					</div>
				</div>
					
				</div>
			</div>
		</section>
	</content>
<?php include_once "template/include/footer.php"; ?>
