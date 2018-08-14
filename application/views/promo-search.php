<?php include "include/header.php"; ?>
  <content>
    <div class="container">
      <div class="clearer cellpadding">
        <div class="row">
          <div class="col-md-12 col-xs-12">
            <div class="table-responsive">
              <?php if($querySearch->num_rows() > 0): ?>
                <table class="table table-striped table-bordered">
                  <tr>
                    <th>No.</th>
                    <th>Nama File</th>
                    <th>Aksi</th>
                  </tr>
                  <?php $no = 0; ?>
                  <?php foreach($querySearch->result() as $row): ?>
                    <?php $no++; ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row->title ?></td>
                      <td width="20%" align="center">
                        <?php $uri = $this->uri->segment(1); ?>
                        <a class="btn btn-default" href="<?php echo site_url($uri.'/promo/detail').'/'.$row->promo_id.'/'.url_title($row->title,'-',true) ?>">Buka &amp; Unduh File</a>
                        <!-- <a class="btn btn-default" href="">Download File</a> -->
                      </td>
                    </tr>
                  <?php endforeach ?>
                </table>
                <?php else: ?>
                  <div class="alert alert-info" role="alert">
                    <i class="fa fa-warning"></i> Data Tidak Ditemukan
                  </div>
                <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </content>
<?php include "include/footer.php"; ?>
