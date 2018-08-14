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
     <h3>Masukan Data Testimoni</h3>
    </div>
    <div class="box-body">
      <div class="table-responsive">
        <form action="<?php echo base_url('testimoni/save_data')?>" method="POST" enctype="multipart/form-data">
        <table class="table no-margin">
          <tr><td>Nama</td><td><input type="text" name="title" class="form-control" required></td></tr>
         <tr><td>Deskripsi</td><td><input type="text" name="description" class="form-control" required></td></tr> 
          <tr><td>Konten</td>
         <td><textarea  name="content"  class="form-control" required></textarea>
            <script>

                    CKEDITOR.replace( 'content', {
                      fullPage: true,
                      allowedContent: true,

                      extraPlugins: 'wysiwygarea'
                    });

                  </script>
          </td></tr> 
          <tr><td>Image</td><td><input type="file" name="image" class="form-control" required></td></tr>
          
          <tr><td><input type="submit" value="save" class="btn btn-success btn-sm"></td><td><input type="reset" class="btn btn-success btn-sm"></td></tr>
        </table>
      </form>
      </div><!-- /.table-responsive -->
    </div><!-- /.box-body -->

  </div><!-- /.box -->
</div><!-- /.col -->
  
</div><!-- /.row -->