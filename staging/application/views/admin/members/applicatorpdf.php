<style type="text/css">
    .header h3{
        text-align: center;
        padding-bottom: 20px;
    }
    .table{
        padding-left: 20px;
        border-collapse: collapse;
    }
    .table th{
        padding:5px;
       border:1px solid #006cb7; 
    }
    .table td{
        padding:10px;
       border:1px solid #006cb7; 
       font-size: 12px;
    }

</style>
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!--Import materialize.css-->
<link href="<?php echo base_url(); ?>assets/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="wimembersh=device-wimembersh, initial-scale=1.0"/>
 
<div class="col-md-12 header">
 
    <h3 class="col-md-12">Detail Applicator</h3>
   
    <div class="col-md-12 ">
        <div class="panel-body">
         
            <table wimembersh="85%"  class="table table-condensed"  >
                <thead>
 
                    <tr> 
                        <th data-field="name">No</th>
                        <th data-field="name">Nama</th>
                        <th data-field="name">Alamat</th>
                        <th data-field="name">Kota</th>
                        <th data-field="name">Telepon</th>
                        <th data-field="name">Email</th>          
                      
                    </tr>    
                </thead>
                <tbody>
                    <?php
                    $no=$this->uri->segment('3') + 1;
                   foreach ($members as $members) 
                    {
                        ?>

                        <tr><td><?php echo $no; ?></td>
                            <td><?php echo $members->nama; ?></td>
                            <td><?php echo $members->alamat; ?></td>
                            <td><?php echo $members->lokasi_nama; ?></td>
                            <td><?php echo $members->telpon; ?></td>
                            <td><?php echo $members->email; ?></td>
                        </tr>
 
                <?php 
                 $no++;
                } 
                ?> 
                </tbody>
            </table>
        </div></div>
</div>  
 
<div class="box-footer clearfix">
    <?php //echo $jum_penguji;  ?>
</div>
</div>    
 
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>