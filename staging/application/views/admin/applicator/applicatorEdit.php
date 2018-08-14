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
     <h3>Edit Data Applicator</h3>
    </div>
    <div class="box-body">
      <div class="table-responsive">
        <form action="<?php echo base_url('applicator/update_data')?>" method="POST" enctype="multipart/form-data">
        <table class="table no-margin">
          <input type="hidden" name="id" value="<?php echo $lokasi->id_applicator; ?>">
          <tr><td>nama</td><td><input type="text" name="nama" class="form-control" required value="<?php  echo $lokasi->nama; ?>"></td></tr>
          <tr><td>Alamat</td><td><input type="text" name="alamat" class="form-control" required value="<?php  echo $lokasi->alamat; ?>"></td></tr>
          <tr><td>Propinsi</td><td><input type="text" name="propinsi" class="form-control" required value="<?php  echo $lokasi->propinsi; ?>"></td></tr>
          <tr><td>Kota</td><td><input type="text" name="kota" class="form-control" required value="<?php  echo $lokasi->kota; ?>"></td></tr>
          <tr><td>Telpon</td><td><input type="text" name="telpon" class="form-control" required value="<?php  echo $lokasi->telpon; ?>"></td></tr>
          <tr><td>Email</td><td><input type="text" name="email" class="form-control" required value="<?php  echo $lokasi->email; ?>"></td></tr>
          <tr><td>Password</td><td><input type="password" name="password" class="form-control" required value="<?php  echo $lokasi->password; ?>"></td></tr>
          <tr><td>Image</td><td><input type="file" name="image" class="form-control"></td></tr>
        
          <tr><td><input type="submit" value="save" class="btn btn-success btn-sm"></td></tr>
        </table>
      </form>
      </div><!-- /.table-responsive -->
    </div><!-- /.box-body -->

  </div><!-- /.box -->
</div><!-- /.col -->
  
</div><!-- /.row -->