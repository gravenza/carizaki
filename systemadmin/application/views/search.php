<?php include_once "template/include/header.php"; ?>
	<content>
	<section class="news">
    	<div class="container">
        	<div class="clearer">
			
			<ol class="breadcrumb">
			<li><a href="<?php echo site_url() ?>">Home</a></li>
			<li><a href="<?php echo site_url() ?>">Artikel</a></li>
			<li class="active">Index Artikel</li>
			</ol>
			
            	<div class="row">
  				<div class="col-md-8 col-sm-8 col-xs-12">
				

				<?php if($cekJlh>0): ?>

	<?php foreach($query->result_array() as $r):?>

		<?php //echo $r['TypeSearch']; ?>
	<p><a href="<?php echo base_url().$r['TypeSearch'].'/detail/'.$r['ID'].'/'.url_title($r['Title']); ?>"><?php echo $r['Title']; ?></a></p>

	

	<?php endforeach; ?>

<?php else: ?>

	<?php echo 'Data Not Found'; ?>

<?php endif; ?>
	
	
			<div class="clearer">
			<nav aria-label="Page navigation">
  
  <?php echo  $this->pagination->create_links() ; ?>

</nav>
			</div>
				</div>
				
		<?php include_once "template/include/tabright.php"; ?>



                
				</div>
			</div>
        </div>
	</section>	
    </content>
<?php include_once "template/include/footer.php"; ?>