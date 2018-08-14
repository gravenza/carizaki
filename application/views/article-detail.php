<?php include_once "include/header.php"; ?>
	<content class="news">
	<section class="news">
    	<div class="container">
        	<div class="clearer">

			<?php
			$segment = $this->uri->segment(1);
			$row = $artDetail->row_array(); ?>

			<ol class="breadcrumb hidden">
			<li><a href="<?php echo site_url() ?>">Home</a></li>
			<li><a href="<?php echo site_url('articles') ?>">Articles</a></li>
			<li class="active"><?php echo $row['title'] ?></li>
			</ol>

            <div class="row">
  			<div class="col-md-8 col-sm-8 col-xs-12">

			<div class="detail-title">
			<h3><?php echo $row['title'] ?></h3>
			<p class="date"><i class="fa fa-calendar"></i> <?php echo date('d-M-Y',strtotime($row['date'])) ?></p>
			</div>

			<div class="detail-content">

			<?php if(count(unserialize($row['file_images'])) > 0): ?>
				<?php foreach (unserialize($row['file_images']) as $key => $pict):  ?>
					<img style="margin-bottom:20px" src="<?php echo base_url().'images/articles/'.$pict ?>" />
				<?php endforeach ?>
			<?php endif ?>

			<?php echo $row['content'] ?>

			</div>

			</div>

			<div class="col-md-4 col-sm-4 col-xs-12">
				<div class="news-widget">

					<?php $segment_cat = $this->uri->segment(1) == 'homeowner' ? 'home_owner' : 'applicator' ?>

					<?php $populerArticle = $this->db->where('kategori',$segment_cat)->order_by('view','DESC')->limit(5)->get('tbl_tzaki'); ?>
					<div class="panel panel-primary">
						<div class="panel-heading">ARTIKEL TERPOPULER</div>
						<div class="list-group">
							<?php if($populerArticle->num_rows() > 0): ?>
							<?php foreach($populerArticle->result_array() as $pop): ?>
							<a href="<?php echo site_url($segment.'/article/detail').'/'.$pop['id_tzaki'].'/'.url_title($pop['title'],'-',true) ?>" class="list-group-item">
								<?php echo $pop['title'] ?>
							</a>
							<?php endforeach ?>
							<?php endif ?>
						</div>
					</div>

					<?php $populerArticle = $this->db->where('kategori',$segment_cat)->order_by('id_tzaki','DESC')->limit(5)->get('tbl_tzaki'); ?>
					<div class="panel panel-primary">
						<div class="panel-heading">ARTIKEL TERKAIT</div>
						<div class="list-group">
							<?php if($populerArticle->num_rows() > 0): ?>
							<?php foreach($populerArticle->result_array() as $pop): ?>
							<a href="<?php echo site_url($segment.'/article/detail').'/'.$pop['id_tzaki'].'/'.url_title($pop['title'],'-',true) ?>" class="list-group-item">
								<?php echo $pop['title'] ?>
							</a>
							<?php endforeach ?>
							<?php endif ?>
						</div>
					</div>


				</div>
			</div>

				</div>
			</div>
        </div>
	</section>
    </content>
<?php include_once "include/footer.php"; ?>
