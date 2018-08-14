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
     <h3>Edit Data Tzaki</h3>
    </div>
    <div class="box-body">
      <div class="table-responsive">
        <form action="<?php echo base_url('tzaki/update_data')?>" method="POST" enctype="multipart/form-data">
        <table class="table no-margin">
          <input type="hidden" name="id" value="<?php echo $tzaki->id_tzaki; ?>">
           <tr><td>Kategori</td><td>
                <select name="kategori" class="form-control">
                  <option <?php  if($tzaki->kategori=='applicator') { echo 'selected';  }?> value="applicator">Applicator</option>
                  <option <?php  if($tzaki->kategori=='home_owner') { echo 'selected';  }?> value="home_owner">Home Owner</option>
                </select>
             </td></tr>
      
          <tr><td>Judul</td><td><input type="text" name="title" class="form-control" required value="<?php  echo $tzaki->title; ?>"></td></tr>
         
          <tr><td>Konten</td><td><textarea name="content"  class="form-control" required><?php  echo $tzaki->content; ?></textarea>
            <script>

                    CKEDITOR.replace( 'content', {
                      fullPage: true,
                      allowedContent: true,
                      extraPlugins: 'wysiwygarea'
                    });

                  </script>
          </td></tr> 
          <tr><td>Image</td><td><input type="file" name="image" class="form-control"></td></tr>

          <tr><td>Deskripsi</td><td><textarea name="deskripsi"  class="form-control" required> <?php  echo $tzaki->deskripsi; ?></textarea>
          
          <tr><td><input type="submit" value="save" class="btn btn-success btn-sm"></td><td><input type="reset" class="btn btn-success btn-sm"></td></tr>
        </table>
      </form>
      </div><!-- /.table-responsive -->
    </div><!-- /.box-body -->

  </div><!-- /.box -->
</div><!-- /.col -->
  
</div><!-- /.row -->