<?php
/*if($_SESSION['user_id']=="")
{
  redirect(base_url('Access'));
}*/
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>BC</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?=base_url('assets/admin/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?=base_url('assets/admin/plugins/fontawesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="<?=base_url('assets/admin/plugins/ionicons/css/ionicons.min.css');?>" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="<?=base_url('assets/admin/plugins/datatables/dataTables.bootstrap.css');?>" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?=base_url('assets/admin/dist/css/AdminLTE.min.css');?>" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?=base_url('assets/admin/dist/css/skins/_all-skins.min.css');?>" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
    <!-- jQuery 2.1.3 -->
    <script src="<?=base_url('assets/admin/plugins/jQuery/jQuery-2.1.3.min.js');?>"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?=base_url('assets/admin/bootstrap/js/bootstrap.min.js');?>" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?=base_url('assets/admin/plugins/slimScroll/jquery.slimscroll.min.js');?>" type="text/javascript"></script>    
    <!-- FastClick -->
    <script src='<?=base_url('assets/admin/plugins/fastclick/fastclick.min.js');?>'></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url('assets/admin/dist/js/app.min.js');?>" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="<?=base_url('assets/admin/plugins/datatables/jquery.dataTables.js');?>" type="text/javascript"></script>
    <script src="<?=base_url('assets/admin/plugins/datatables/dataTables.bootstrap.js');?>" type="text/javascript"></script>
    <script src="<?=base_url('assets/admin/dist/js/aplikasi.js');?>" type="text/javascript"></script>

    <script src="<?=base_url('assets/ckeditor/ckeditor.js');?>"></script>
  </head>
  <body class="skin-red fixed">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="<?=base_url();?>" class="logo">BLUESCOPE</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
          
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url()?>assets/img/logo-header.png" class="user-image" alt="User Image"/>
                  <span class="hidden-xs">Administrator</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url()?>assets/img/logo-header.png" class="img-circle" alt="User Image" />
                    <p>
                     Administrator
                     
                    </p>
                  </li>
                  <!-- Menu Body -->
               
                  <!-- Menu Footer-->
                  <li class="user-footer">
                   
                    <div class="pull-right">
                     <a href="<?php echo base_url()?>/Access123/logout" class="btn btn-default btn-flat">Sign out</a> 
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url()?>assets/img/logo-header.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Administrator</p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
         <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>-->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
              <a href="<?=base_url('dashboard');?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            
           <!-- <li class="treeview">
              <a href="#">
                <span>Master Data</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="#"><i class="fa fa-circle-o"></i> Pengguna</a></li>
              </ul>
              
            </li>
              <li class="treeview">
              <a href="#">
                <span>slider</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="<?=base_url('Topslider');?>"><i class="fa fa-circle-o"></i>Top Slider</a></li>
              </ul>
              <ul class="treeview-menu">
                <li class=""><a href="<?=base_url('Bottomslider');?>"><i class="fa fa-circle-o"></i>Bottom Slider</a></li>
              </ul>
              
            </li> -->
            
            <li class="treeview">
              <a href="#">
                <span>BERITA</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="<?=base_url('berita');?>"><i class="fa fa-circle-o"></i> BERITA</a></li>
              </ul>
              
            </li>
          
            
             <li class="treeview">
              <a href="#">
                <span>TESTIMONI</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li class=""><a href="<?=base_url('testimoni');?>"><i class="fa fa-circle-o"></i> TESTIMONI</a></li>
              </ul>
              
            </li>
               <li class="treeview">
              <a href="#">
                <span>PRODUK</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="<?=base_url('produk');?>"><i class="fa fa-circle-o"></i>PRODUK</a></li>
              </ul>
              
          </li>
              <li class="treeview">
              <a href="#">
                <span>EVENT</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="<?=base_url('event');?>"><i class="fa fa-circle-o"></i> EVENT</a></li>
              </ul>
              
            </li>
                <li class="treeview">
              <a href="#">
                <span>TZAKI</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="<?=base_url('tzaki');?>"><i class="fa fa-circle-o"></i>TZAKI</a></li>
              </ul>
              
          <!--  </li>
                  <li class="treeview">
              <a href="#">
                <span>Kategori</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="#"><i class="fa fa-circle-o"></i> Kategori</a></li>
              </ul> -->
              
            </li>
              <li class="treeview">
              <a href="#">
                <span>VIDEO</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="<?=base_url('video');?>"><i class="fa fa-circle-o"></i>VIDEO</a></li>
              </ul>
              
            </li>
             <li class="treeview">
              <a href="#">
                <span>LOKASI</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="<?=base_url('lokasi');?>"><i class="fa fa-circle-o"></i>LOKASI</a></li>
                <li class=""><a href="<?=base_url('review/lokasi');?>"><i class="fa fa-circle-o"></i>REVIEW</a></li>
              </ul>
              
            </li>
             <li class="treeview">
              <a href="#">
                <span>APPLICATOR</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="<?=base_url('applicator');?>"><i class="fa fa-circle-o"></i>APPLICATOR</a></li>
                <li class=""><a href="<?=base_url('review/applicator');?>"><i class="fa fa-circle-o"></i>REVIEW</a></li>
              </ul>
              
            </li>
            <li class="treeview">
              <a href="#">
                <span>MEMBERS</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="<?=base_url('members/applicator');?>"><i class="fa fa-circle-o"></i>APPLICATOR</a></li>
                <li class=""><a href="<?=base_url('members/homeowner');?>"><i class="fa fa-circle-o"></i>HOME OWNER</a></li>
              </ul>
              
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Welcome back
            <small>Administrator</small>
          </h1>
        </section>
        
        <!-- Main content -->
        <section class="content">

          <!-- Info boxes -->