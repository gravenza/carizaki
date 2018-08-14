<!-- Main row -->
<div class="row">
    <div class="col-md-12">
  <!-- TABLE: LATEST ORDERS -->
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Members Homeowner</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div><!-- /.box-header -->
     <div class="panel-heading">
      <div class="tombol-kanan">
          <a href="<?php echo base_url();?>members/printpdfhomeowner" class="btn btn-success btn-sm" target="_blank">Export PDF</a>
       
      </div>
    </div>
    <div class="box-body">
      <div class="table-responsive">
        <table class="table no-margin">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Alamat</th>
              
              <th>Kota</th>
              <th>Telepon</th>
              <th>Email</th>
      
            </tr>
          </thead>
          <tbody>
            <?php
            $no=$this->uri->segment('3') + 1;
           
            foreach ($member as $members) {
            
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $members->nama; ?></td>
              <td><?php echo $members->alamat;?></td>
              
              <td><?php echo $members->lokasi_nama; ?></td>
              <td><?php echo $members->telpon; ?></td>
              <td><?php echo $members->email;?></td>
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