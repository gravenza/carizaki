<!-- Main row -->
<div class="row">
    <div class="col-md-12">
  <!-- TABLE: LATEST ORDERS -->
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Testimoni</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div><!-- /.box-header -->
     <div class="panel-heading">
      <div class="tombol-kanan">
        <a href="<?php  echo base_url('testimoni/dataAdd')?>" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus" style="margin-left: 0px; color: #fff"></i> &nbsp;&nbsp;Tambah Data</a>
        
      </div>
    </div>
    <div class="box-body">
      <div class="table-responsive">
        <table class="table no-margin">
          <thead>
            <tr>
              <th>No</th>
              <th>Judul</th>
               <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no=$this->uri->segment('3') + 1;
           
            foreach ($testimoni as $key) {
            
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $key->title; ?></td>
              <td> <a class="btn btn-info btn-xs" href="<?php echo base_url();?>testimoni/edit_data/<?php echo $key->id_testimoni; ?>"><i class="glyphicon glyphicon-pencil" style="margin-left: 0px; color: #fff"></i> &nbsp;&nbsp;Edit</a>
                <a class="btn btn-warning btn-xs" href="<?php echo base_url();?>testimoni/delete_data/<?php echo $key->id_testimoni; ?>"><i class="glyphicon glyphicon-remove" style="margin-left: 0px; color: #fff"></i> &nbsp;&nbsp;Hapus</a></td>
            </tr>
            <?php
            $no++;
          }
            ?>
          </tbody>
        </table>
              <?php 
  echo $this->pagination->create_links();
  ?>
      </div><!-- /.table-responsive -->
    </div><!-- /.box-body -->
   
  </div><!-- /.box -->
</div><!-- /.col -->
  
</div><!-- /.row -->