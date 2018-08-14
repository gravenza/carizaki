<!-- Main row -->
<div class="row">
    <div class="col-md-12">
  <!-- TABLE: LATEST ORDERS -->
  <div class="box box-info">
    <div class="box-header with-border">
    
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div><!-- /.box-header -->
     <div class="panel-heading">
      <div class="tombol-kanan">
     <h3>Edit Data lokasi</h3>
    </div>
    <div class="box-body">
      <div class="table-responsive">
        <form action="<?php echo base_url('lokasi/update_data')?>" method="POST" enctype="multipart/form-data">
        <table class="table no-margin">
          <input type="hidden" name="id" value="<?php echo $lokasi->id_lokasi; ?>">
          <tr><td>Desc</td><td><input type="text" name="desc" class="form-control" required value="<?php  echo $lokasi->desc; ?>"></td></tr>
          <tr><td>Propinsi</td><td><input type="text" name="propinsi" class="form-control" required value="<?php  echo $lokasi->propinsi; ?>"></td></tr>
          <tr><td>Kota</td><td><input type="text" name="kota" class="form-control" required value="<?php  echo $lokasi->kota; ?>"></td></tr>
          <tr><td>Alamat</td><td><textarea name="alamat" class="form-control" required><?php  echo $lokasi->alamat; ?></textarea></td></tr>
          <tr><td>Telpon</td><td><input type="text" name="telpon" class="form-control" value="<?php  echo $lokasi->telpon; ?>"></td></tr>
          <tr><td>Whatsapp</td><td><input type="text" name="whatsapp" class="form-control" value="<?php  echo $lokasi->whatsapp; ?>"></td></tr>

          <tr><td><input type="submit" value="save" class="btn btn-success btn-sm"></td></tr>
        </table>
      </form>
      </div><!-- /.table-responsive -->
    </div><!-- /.box-body -->

  </div><!-- /.box -->
</div><!-- /.col -->
  
</div><!-- /.row -->