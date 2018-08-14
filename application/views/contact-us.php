<?php include_once "include/header.php"; ?>
<content class="contact">
	<div class="container">
    	<div class="clearer about">
        <!-- <ol class="breadcrumb">
			<li><a href="">Home</a></li>
			<li class="active">Contact Us</li>
		</ol> -->
		
		<address>
			<h3>PT NS BLUESCOPE INDONESIA</h3>
			BRI II Building 9th Floor, Suite 902, RT.14/RW.1,<br />
			Bend. Hilir, Tanah Abang, Kota Jakarta Pusat,<br />
			Daerah Khusus Ibukota Jakarta 10210  
		</address>
        
        <div class="row">
        	<div class="col-md-6 col-xs-12">
			
            	<form name="contactForm" method="post" action="<?php echo site_url('contact/sendmessage') ?>" onsubmit="return validateForm()" enctype="application/x-www-form-urlencoded">
					<div class="row">
						<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label>Name :</label>
							<input type="text" name="name" class="form-control"/>
							<input type="hidden" name="url" value="<?php echo $this->uri->segment(1) ?>" class="form-control"/>
						</div>
						</div>
						
						<div class="col-md-6 col-xs-12">
							<div class="form-group">
								<label>Email :</label>
								<input type="email" name="email" class="form-control"/>
							</div>
						</div>
						
						<div class="col-md-6 col-xs-12">
							<div class="form-group">
								<label>Phone :</label>
								<input type="tel" name="phone" class="form-control"/>
							</div>
						</div>
						
						<div class="col-md-6 col-xs-12">
							<div class="form-group">
								<label>Subject :</label>
								<input type="text" name="subject" class="form-control"/>
							</div>
						</div>
						
						<div class="col-xs-12 col-md-12">
							<div class="form-group">
								<label>Message :</label>
								<textarea class="form-control" name="message" rows="6"></textarea>
							</div>
						</div>
						
						<div class="col-md-4 col-xs-12">
							<div class="form-group">
							<input type="submit" class="btn btn-primary btn-block" value="KIRIM"/>
							</div>
						</div>
					</div>
                </form>
            </div>
            
            <div class="col-md-6 col-xs-12 myMaps">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.351429767914!2d106.81168111420453!3d-6.217301662625233!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f41d6aaaaaab%3A0x4307268fdb84a454!2sPT+NS+BLUESCOPE+INDONESIA!5e0!3m2!1sen!2sid!4v1526450155368" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>	
			</div>
        </div>
        
        </div>
    </div>		
</content>
<?php include_once "include/footer.php"; ?>