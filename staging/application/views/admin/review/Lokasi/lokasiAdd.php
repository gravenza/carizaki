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
     <h3>Masukan Data Lokasi</h3>
    </div>
    <div class="box-body">
      <div class="table-responsive">
        <form action="<?php echo base_url('lokasi/save_data')?>" method="POST" enctype="multipart/form-data">
        <table class="table no-margin">
          <tr><td>Desc</td><td><input type="text" name="desc" class="form-control" required></td></tr>
          <tr><td>Latitude</td><td><input type="text" name="latitude" class="form-control" ></td></tr>
          <tr><td>Longitude</td><td><input type="text" name="longitude" class="form-control" ></td></tr>
          <tr><td>Propinsi</td><td><input type="text" name="propinsi" class="form-control" required></td></tr>
          <tr><td>Kota</td><td><input type="text" name="kota" class="form-control" required></td></tr>
          <tr><td>Alamat</td><td><textarea name="alamat" class="form-control" required></textarea></td></tr>
          <tr><td>Telpon</td><td><input type="text" name="telpon" class="form-control" ></td></tr>
          <tr><td>Whatsapp</td><td><input type="text" name="whatsapp" class="form-control"></td></tr>
          <tr><td>Image</td><td><input type="file" name="image" class="form-control" required></td></tr>
          <tr><td><input type="submit" value="save" class="btn btn-success btn-sm"></td>
    
        </table>
      </form>
      </div><!-- /.table-responsive -->
    </div><!-- /.box-body -->

  </div><!-- /.box -->
</div><!-- /.col -->
  
</div><!-- /.row -->