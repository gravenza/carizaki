<?php include_once "include/header.php"; ?>

	<content class="location-inner">
	<section class="location">

		<div class="container">
			<div class="clearer cellpadding">
				<div class="row hidden">
					<div class="col-md-4 col-md-offset-6 col-xs-8">
						<input type="text" name="" placeholder="Cari daerah" class="form-control" />
					</div>
					<div class="col-md-2 col-xs-4">
						<button type="button" name="" class="btn btn-primary btn-block">Cari</button>
					</div>
				</div>
				
				<div class="clearer" style="margin-top:0"></div>
				
				<div class="row">
					<div class="col-md-12 col-xs-12 location-wrapper">
						<ul class="location-slider">
						
							<?php $dataLocation = $this->db->order_by('id_lokasi','DESC')->get('tbl_lokasi');
							$no = 0;
							foreach($dataLocation->result_array() as $loc):
							$no++;
							?>
							
							<li>
								<a href="#" data-toggle="modal" data-target=".bs-modal-location<?php echo $loc['id_lokasi'] ?>">
								<div class="thumbnail">
								<img src="<?php echo base_url('images/location').'/'.$loc['id_lokasi'].'.png' ?>" />
								<div class="caption">
									<h3><?php echo $loc['kota'] ?></h3>
								</div>
								</div>
								</a>
							</li>
							
							<?php endforeach ?>
						</ul>
						
						<?php $dataLocation = $this->db->order_by('id_lokasi','DESC')->get('tbl_lokasi');
							$no = 0;
							foreach($dataLocation->result_array() as $loc):
							$no++;
						?>
							
						<div id="modalLocation" class="modal fade bs-modal-location<?php echo $loc['id_lokasi'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
						  <div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="container-fluid">
								<div class="row">
									<div class="col-md-6 col-xs-12 modalLeft">
										<div class="middle">
										<div class="middle-frame">
										<div class="inner">
											<h3><strong><?php echo $loc['desc'] ?></strong></h3>
											<h4><b>Alamat</b></h4>
											<p><?php echo $loc['alamat'] ?></p>
											<h4><b>Kontak</b></h4>
											<p><?php echo $loc['telpon'] !='' ? $loc['telpon'] : '-' ?></p>
										</div>
										</div>
										</div>
									</div>
									<div class="col-md-6 col-xs-12 imgLocation">
										<img src="<?php echo base_url('assets/uploads').'/files/icon/'.$loc['id_lokasi'].'.png' ?>" />
									</div>
								</div>
								</div>
							</div>
						  </div>
						</div>
						
						<?php endforeach ?>					

					</div>
				</div>
			</div>
		</div>

	</section>
	</content>

<?php include_once "include/footer.php"; ?>