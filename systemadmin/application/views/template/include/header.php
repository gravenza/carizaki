<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>
www.koperasiserasi.com 
<?php
$detailTitle = $this->uri->segment(2);
if($detailTitle == 'detail'){
	$idProduct = $this->uri->segment(3);
	$this->db->where('product_id',$idProduct);
	$title = $this->db->get('product');
	$tt = $title->row_array();
	
	echo " - product/$tt[productName]";
}else{
	echo ": Belanja Online Gadget, Elektronik, Laptop & Komputer";
}
?>
</title>
<meta name="description" content="Koperasi Serasi Belanja Online Baju Muslim, Perlengkapan Ibadah, Buku Islam, Hijab, Gadget, Smartphone, Komputer &amp Laptop, Elektronik, Kamera, TV, dll."/>
<meta name="keywords" content="toko online, toko online muslim, toko online jakarta, toko online indonesia, muslim online store, online store jakarta, online store, online shop, online shop jakarta, online shop indonesia, muslim online shop"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.bxslider.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-select.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.number.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.slicknav.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/koperasi.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/ajax_category.js"></script>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">

<script type="text/javascript">		
		
	// $(document).ready(function(){
		// $('.slider').bxSlider({
			// auto:true,
			// controls:false,
			// mode:'horizontal'
		// });
		
		// $('.menu').slicknav();
		
		// $('table').addClass('table table-striped table-bordered');

		// $('.psw-control').click(function(){
			// if($(this).is(':checked')){
				// $('.psw,.cpsw').attr('type','text');
			// }else{
				// $('.psw,.cpsw').attr('type','password');
			// }
		// });	
	// });
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-88408680-1', 'auto');
  ga('send', 'pageview');

</script>

</head>

<body>

<header class="koperasi">
	<div class="top">
	<div class="container">
	<div class="row">
	<div class="col-md-4 col-xs-12 feature">
	<a target="_blank" href="https://web.whatsapp.com/"><i class="fa fa-whatsapp" aria-hidden="true"></i> +62 815 1110 8855</a>
	<a href=""><i class="fa fa-headphones" aria-hidden="true"></i> +62 811 8201 180</a>
	</div>
	
	<div class="col-md-4 hidden-xs"></div>
	
		<div class="col-md-4 col-xs-12 shopStuff">
        <?php
		if($this->session->userdata('logged_in')){
			$this->db->where('customer_id',$this->session->userdata('c_id'));
		}else{
			$this->db->where('sid',$this->session->userdata('m_cart'));
		}
			$dataCart = $this->db->get('cart');
			$amount = $dataCart->num_rows();
			
			if($amount == 1){
				echo "
				<a class='item' href='".site_url('cart/view')."'>
					<i class='fa fa-shopping-cart'></i> $amount Item
				</a>";
			}elseif($amount > 1){
				echo "
				<a class='item' href='".site_url('cart/view')."'>
					<i class='fa fa-shopping-cart'></i> $amount Items
				</a>";
			}else{
				echo "
				<a href='".site_url('cart/view')."'>
					<i class='fa fa-shopping-cart'></i> 0 Item
				</a>";
			}
		?>
        
        
        <?php if(!$this->session->userdata('logged_in')): ?>
        <a href="<?php echo site_url('customer/login'); ?>"><i class="fa fa-sign-in"></i> Login</a>
		<a href="<?php echo site_url('customer/register') ?>">
		<i class="fa fa-user-plus" aria-hidden="true"></i> Register</a>
        <?php else : ?>
        
		<a href="" class="dropdown dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			<i class="fa fa-user-circle"></i> <?php echo $this->session->userdata['c_name']; ?> <span class="caret"></span>
		</a>
		
		<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
			<li><a href="#"><i class="fa fa-heart"></i> My Wishlist</a></li>
			<li><a href="<?php echo site_url('shopping/history').'/'.$this->session->userdata('c_id') ?>"><i class="fa fa-history"></i> Shopping History</a></li>
			<li><a href="<?php echo site_url('setting/view').'/'.$this->session->userdata('c_id').'/'.url_title($this->session->userdata('c_name'),'-',true) ?>">
			<i class="fa fa-gear"></i> Setting</a></li>
			<li role="separator" class="divider"></li>
			<li><a href="<?php echo site_url('customer/logout'); ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
		</ul>
        
		<?php endif; ?>
		
        </div>
		
	</div>
	</div>
	</div>
	
	<div class="container">
    
    <div class="clearer" style="margin:0">
    <div class="row">
	
	<div class="col-md-3 col-xs-12">
    <div class="logo">
    	<a href="<?php echo site_url(); ?>"><img src="<?php echo base_url(); ?>images/logo.png"/></a>
    </div>
    </div>
    
    <div class="col-md-6 col-md-offset-3 col-xs-12">
    <div class="clearer search-box">
    <form method="get" action="<?php echo site_url('search/view') ?>" style="margin-bottom:0">
    <div class="input-group">
    
    <input type="text" name="search" class="form-control" placeholder="Cari Produk, Category, Brand...">
      <span class="input-group-btn">
        <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-search"></span></button>
      </span>
    </div>
    </form>
    </div>
    </div>
    
    
    
    </div>
</div>
    
</div>
</header>

<nav class="catMenu">
	<div class="container">
	<div class="row" style="position:relative;">
		<div class="col-md-12 col-xs-12" style="position:initial;">
    	<ul class="menu">
		<li><a href="#">New Product</a></li>
        	
            <?php
			$dataCat = $this->db->where('active','Y')->order_by('category_name asc')->get('category');
			
				foreach($dataCat->result_array() as $row){
				echo "<li><a href='". site_url('product/category')."/$row[slug]'>$row[category_name]</a>
				<div><ul class='wrapperMenu'>";
				$dataSub = $this->db->where('category_id',$row['category_id'])->where('active','Y')->order_by('subcategory_name asc')->get('subcategory');
				
				foreach($dataSub->result_array() as $sub){
				//Samakan ID
					
				echo "<li><a href='". site_url('product/subcategory')."/$sub[slug]'>$sub[subcategory_name]</a>
				<ul>";
				
				$dataSub2 = $this->db->where('category_id',$row['category_id'])->where('subcategory_id',$sub['subcategory_id'])->where('active','Y')->order_by('subcategory_name asc')->get('subcategory2');
				
				foreach($dataSub2->result_array() as $sub2){
				//Samakan ID
					
				echo "<li><a href='". site_url('product/subin')."/$sub2[slug]'>$sub2[subcategory_name]</a><li>";
				}
				echo "</ul>";
				echo "</li>";
				}
				echo"
				</ul></div>
				</li>";
			}
			?>
            
        </ul>
		</div>
	</div>
</div>	
</nav>
