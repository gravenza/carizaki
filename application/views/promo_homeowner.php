<?php include "include/header.php" ?>
	<section class="promo cellpadding">
		<div class="container">
			<div class="clearer">
				<div class="row">
					<div class="col-md-4 col-xs-12">
						<form name="formsearch" method="get" action="<?php echo site_url($this->uri->segment(1).'/promo/search') ?>" enctype="application/x-www-form-urlencoded">
						<div class="row">
							<div class="col-md-8 col-xs-7">
								<input type="text" name="key" placeholder="Search your region" class="form-control input-lg" />
							</div>
							<div class="col-md-4 col-xs-5">
								<button type="submit" class="btn btn-primary btn-lg">Search</button>
							</div>
						</div>
						</form>

						<div class="clearer">
							<p>BlueScope adalah salah satu perusahaan baja lapis terdepan di dunia yang berdiri di Australia pada tahun 1885 dan menjadi pionir industri baja di dunia. BlueScope menjangkau pasar Amerika dan juga Asia termasuk Indonesia.  </p>
						</div>

						<div class="row hidden">
						<div class="col-md-4 col-xs-6">
							<a class="btn btn-primary btn-block" href="#">Download</a>
						</div>
						<div class="col-md-4 col-xs-6">
							<a class="btn btn-primary btn-block" href="#">Print</a>
						</div>
						</div>
					</div>
					<div class="col-md-8 col-xs-12">
						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						  <!-- Indicators -->
						  <ol class="carousel-indicators">
							<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-example-generic" data-slide-to="1"></li>
						  </ol>

						<!-- Wrapper for slides -->
						<div class="carousel-inner" role="listbox">
							<?php $uri = $this->uri->segment(1); ?>
							<?php if($promo->num_rows() > 0): ?>
								<?php foreach($promo->result() as $row): ?>
							<div class="item">

								<a href="<?php echo site_url($uri.'/promo/detail').'/'.$row->promo_id.'/'.url_title($row->title,'-',true); ?>">
							  <img src="<?php echo base_url('images/promo').'/'.$row->image_small ?>" alt="...">
							</a>
							<!-- <div class="carousel-caption"></div> -->
							</div>
						<?php endforeach ?>
						<?php endif ?>
						</div>

						  <!-- Controls -->
						  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						  </a>
						  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						  </a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php include "include/footer.php" ?>
