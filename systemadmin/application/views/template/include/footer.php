<footer>
	<div class="container">
	<div class="clearer">
    	<div class="row footer-stuff">
            
            <div class="col-md-3 col-xs-6">
            <h4 style="margin:0 0 10px">INFORMATION</h4>
            <ul>
			<?php
			$this->db->order_by('pages_id','DESC');
			$page = $this->db->get('pages');
			if($page->num_rows() > 0):
			foreach($page->result_array() as $p):
			?>
            <li><a href="<?php echo site_url('page/detail').'/'.$p['pages_id'].'/'.url_title($p['title'],'-',true) ?>"><?php echo $p['title'] ?></a></li>
            <?php endforeach ?>
			<?php endif ?>
			</ul>
            </div>
			
			<div class="col-md-3 col-xs-6">
            <h4 style="margin:0 0 10px">PEMBAYARAN</h4>
            <div class="iconList" >
			<i class="ico bca"></i>
			<i class="ico mandiri"></i>
			</div>
            </div>
            
            <div class="col-md-3 col-xs-12">
            <p><span class="fa-stack fa-lg">
  			<i class="fa fa-square fa-stack-2x"></i>
  			<i class="fa fa-phone fa-stack-1x fa-inverse"></i>
			</span>
			+62 811 8201 180</p>
            <p><span class="fa-stack fa-lg">
  			<i class="fa fa-square fa-stack-2x"></i>
  			<i class="fa fa-headphones fa-stack-1x fa-inverse"></i>
			</span>
			<strong>08.00 - 17.00</strong> Senin - Jumat</p>
            <p><span class="fa-stack fa-lg">
  			<i class="fa fa-square fa-stack-2x"></i>
  			<i class="fa fa-truck fa-stack-1x fa-inverse"></i>
			</span>
			Delivery Service</p>
            </div>
            
            <div class="col-md-3 col-xs-12 text-left">
            <form>
            <div class="form-group">
            	<label>SUBSCRIBE</label>
                <input type="text" class="form-control" placeholder="email here..." />
            </div>
            </form>
            </div>
        </div>
    </div>
    </div>
    
    <div class="container-fluid" style="background:#fd711c">
    <div class="clearer" style="margin:10px 0">
    	<div class="row">
        	<div class="col-sm-4 col-md-4">
            <p style="font-size:12px;">Copyright &copy; 2017 koperasiserasi.com, Allright Reserved</p>
            </div>
            
            <div style="display:none;" class="col-md-3 col-md-offset-5 follow text-right">
            <h4>FOLLOW US</h4>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
    </div>
    </div>
    
</footer>

<!--Start of Tawk.to Script-->
<!-- <script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/57ca90471c4ce90ce407978e/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script> -->
<!--End of Tawk.to Script-->

</body>
</html>