<?php include_once "template/include/header.php"; ?>
	<content class="inside">
	<section class="news">
    	<div class="container">
        	<div class="clearer">
			
            	<div class="row">
					<div class="col-md-4 col-md-offset-4 col-xs-12">
						<div class="panel panel-default" style="margin-bottom:0">
							<div class="panel-heading"><h4 class="panel-title"><i class="fa fa-lock"></i> Login</h4></div>
							<div class="panel-body">
								<form name="formLogin" method="post" action="<?php echo site_url('cart/login_pay') ?>" enctype="application/x-www-form-urlencoded" style="margin-bottom:0;">
													
									<div class="form-group">
										<label for="email">Email :</label>
										<input type="email" name="email" class="form-control" />
									</div>
													
									<div class="form-group">
										<label for="email">Password :</label>
										<input type="password" name="password" class="form-control" />
									</div>
													
									<div class="form-group">
										<button type="submit" name="btnSubmit" class="btn btn-warning">Login</button>
									</div>
									
									<div class="form-group">
										<fb:login-button 
										  scope="public_profile,email"
										  onlogin="checkLoginState();">
										</fb:login-button>
									</div>
													
								</form>
							</div>
							<div class="panel-footer">
								<p>Belum punya akun? Daftar <?php echo anchor('customer/register','disini','') ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
	</section>	
    </content>
<?php include_once "template/include/footer.php"; ?>