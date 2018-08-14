<?php include "include/header.php" ?>
<?php $row = $detailPromo->row() ?>
<content>
  <div class="container">
    <div class="clearer cellpadding">
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <iframe src="<?php echo base_url('images/promo').'/'.$row->files; ?>" width="100%" height="750"></iframe>
        </div>
      </div>
    </div>
  </div>
</content>
<?php include "include/footer.php" ?>
