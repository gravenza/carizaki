//$(document).ready(function(){
	
	var link = 'http://www.carizaki.com/';
	
	function validateForm() {
		var name 	= document.forms["contactForm"]["name"].value;
		var email 	= document.forms["contactForm"]["email"].value;
		var phone 	= document.forms["contactForm"]["phone"].value;
		var subject = document.forms["contactForm"]["subject"].value;
		var message = document.forms["contactForm"]["message"].value;
		
		if (name == "") {
			alert("Name must be filled out");
			return false;
		}
		
		if (email == "") {
			alert("Email must be filled out");
			return false;
		}
		
		if (phone == "") {
			alert("Phone must be filled out");
			return false;
		}
		
		if (subject == "") {
			alert("Subject must be filled out");
			return false;
		}
		
		if (message == "") {
			alert("Message must be filled out");
			return false;
		}
	}
	
	function sign_up_homeowner(){

		var nama = $('#nama').val();
		var alamat = $('#alamat').val();
		var provinsi = $('#provinsi').val();
		var kota = $('#kota').val();
		var telepon = $('#telepon').val();
		var email = $('#email').val();
		var password = $('#password').val();
		
		if(!nama || !alamat || !provinsi || !kota || !telepon || !email){
			$('#error').html('<i class="fa fa-warning"></i> Mohon Lengkapi Data Anda');
		} else {
		var data = $('#register-form').serialize();
			$.ajax({
			type : "POST",
			data: data,
			url:link+"members/registrasi_homeowner",
			success: function(a){
				if(a==0){
					$('#error').html('<i class="fa fa-warning"></i> Email Sudah Digunakan');
				} else{
					alert('Pendaftaran berhasil mohon periksa email Anda.Mohon periksa juga folder spam/junk/bulk.');
					location.reload();
				}
			}
		});
	}
	}
	
	//==================================SIGN IN==================================//
	
	function sign_in_homeowner(){
		var email = $('#email-login').val();
		var password = $('#password-login').val();
		if(!email || !password){
			$('#error-login').html('<i class="fa fa-warning"></i> Mohon Lengkapi Login Anda');
		}
		else{
			var data = $('#login-form').serialize();
			$.ajax({
			type : "POST",
			data: data,
			url:link+"members/login_homeowner",
			success: function(a){
				if(a==0){
					$('#error-login').html('<i class="fa fa-warning"></i> Login Gagal');
				}else{
					alert('Login Berhasil');
					location.reload();
				}
			}
			});
		}
	}
	
	function sign_up_applicator(){

		var nama = $('#nama').val();
		var alamat = $('#alamat').val();
		var provinsi = $('#provinsi').val();
		var kota = $('#kota').val();
		var telepon = $('#telepon').val();
		var email = $('#email').val();
		var password = $('#password').val();
		
		if(!nama || !alamat || !provinsi || !kota || !telepon || !email || !password){
			$('#error').html('Mohon Lengkapi Data Anda');
		} else {
			var data = $('#register-form').serialize();
			$.ajax({
				type : "POST",
				data: data,
				url:link+"members/registrasi_applicator",
				success: function(a){
					if(a==0){
					$('#error').html('Email Sudah Digunakan');
					} else{
					alert('Pendaftaran berhasil mohon periksa email Anda.Mohon periksa juga folder spam/junk/bulk.');
					location.reload();
				}
			}
		});
		}
	}
	
	function sign_in_applicator(){
		var email = $('#email-login').val();
		var password = $('#password-login').val();
		
		if(!email || !password){
			$('#error-login').html('Mohon Lengkapi Login Anda');
		}
		else{
			var data = $('#login-form').serialize();
			$.ajax({
			type : "POST",
			data: data,
				url:link+"members/login_applicator",
				success: function(a){
				if(a==0){
					$('#error-login').html('Login Gagal');
				}else{
					alert('Login Berhasil');
					location.reload();
				}
			}
			});
		}
	}
	
	function lupa_password_applicator(){
		var email = $('#email-lp-password').val();
		//$('#email-lp-password').val('');
		$.ajax({  
			url: link + "/site/lupa_password_applicator/",
			type: "POST",
			data:'email='+email,
            success: function(data){
				if(data==1){
					$('#error-lp-password').html('Terimakasih , silahkan periksa email Anda.');
				} else if(data==0){
					$('#error-lp-password').html('Email Anda belum terdaftar');
				}

            }
        });
	}
	
	function lupa_password_homeowner(){
		var email = $('#email-lp-password').val();
		if(!email){
			$('#error-lp-password').html('<i class="fa fa-warning"></i> Mohon isi field email Anda');
		}else{
			$.ajax({  
				url: link + "/site/lupa_password_homeowner/",
				type: "POST",
				data:'email='+email,
				success: function(data){
              if(data==1)
              {
                $('#error-lp-password').html('Terimakasih , silahkan periksa email Anda.');
              } else if(data==0)
              {
                $('#error-lp-password').html('Email Anda belum terdaftar');
              }

              }
			});
		}
	}
	
	
	//==================================AJAX KOTA==================================//
	
	function ajaxkota(id)
    {

      $.ajax({
        
        url: link + "/site/getkota/"+id,
        type: "GET",
            
            success: function(data)
            {
              $("#kota").html(data);
              $("#idprop").val(id);

            }
        });
      
    }
	
	function pilihproduk(n){
		
		var produk = n;
		
		$.ajax({  
				url: link + "/cart/pilihproduk_homeowner/",
				type: "POST",
				data:{item:produk,category:'warna'},
				success: function(data){
					if(data==1){
						$('.modal-atap-warna').modal('hide');
						$('.modal-atap-notification').modal('show');
				
						$('.modal-atap-notification').on('hidden.bs.modal',function(e){
							$('body').css('padding','0');
						})
					} else if(data==0){
						alert('Maaf!, Request produk gagal, silahkan coba kembali');
					}

				}
		});
	}
	
	function produkapp(n){
		
		var produk = n;
		
		$.ajax({  
				url: link + "/cart/pilihproduk_applicator/",
				type: "POST",
				data:{item:produk,category:'warna'},
				success: function(data){
					if(data==1){
						$('.modal-atap-warna').modal('hide');
						$('.modal-atap-notification').modal('show');
				
						$('.modal-atap-notification').on('hidden.bs.modal',function(e){
							$('body').css('padding','0');
						})
					} else if(data==0){
						alert('Maaf!, Request produk gagal, silahkan coba kembali');
					}

				}
		});
	}
	
	function pilihnocolor(n){
		
		if(n == 4){
			
			var produk = 4;
		
			$.ajax({  
					url: link + "/cart/pilihproduk_homeowner/",
					type: "POST",
					data:{item:produk,category:'non warna'},
					success: function(data){
						if(data==1){
							$('.modal-atap').modal('hide');
							$('.modal-atap-notification').modal('show');
				
							$('.modal-atap-notification').on('hidden.bs.modal',function(e){
								$('body').css('padding','0');
							})
						} else if(data==0){
							alert('Maaf!, Request produk gagal, silahkan coba kembali');
						}

					}
			});	
			
		}else if(n == 60){
			
			var produk = 4;
		
			$.ajax({  
					url: link + "/cart/pilihproduk_applicator/",
					type: "POST",
					data:{item:produk,category:'non warna'},
					success: function(data){
						if(data==1){
							$('.modal-atap').modal('hide');
							$('.modal-atap-notification').modal('show');
				
							$('.modal-atap-notification').on('hidden.bs.modal',function(e){
								$('body').css('padding','0');
							})
						} else if(data==0){
							alert('Maaf!, Request produk gagal, silahkan coba kembali');
						}

					}
			});
			
		}else if(n == 70){
			
			var produk = 6;
			
			$.ajax({  
					url: link + "/cart/pilihproduk_applicator/",
					type: "POST",
					data:{item:produk,category:'Rangka Baja Ringan'},
					success: function(data){
						if(data==1){
							$('.modal-atap-notification').modal('show');
						} else if(data==0){
							alert('Maaf!, Request produk gagal, silahkan coba kembali');
						}

					}
			});
			
		}else{
			var produk = 6;
			$.ajax({  
					url: link + "/cart/pilihproduk_homeowner/",
					type: "POST",
					data:{item:produk,category:'Rangka Baja Ringan'},
					success: function(data){
						if(data==1){
							$('.modal-atap-notification').modal('show');
						} else if(data==0){
							alert('Maaf!, Request produk gagal, silahkan coba kembali');
						}

					}
			});
		}
		
	}
	
//});