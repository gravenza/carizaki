var cekLebar = window.innerWidth;
var cekTinggi = window.innerHeight;
var headerHeight = $('header').height();
var footerHeight = $('footer').height();

console.log('width: '+ cekLebar);
console.log('height: '+ cekTinggi);

$(document).ready(function(){

		$('.btn-daftar').click(function(){
			$('#modal-login').modal('hide');
			$('#modal-register').modal('show');

			$('#modal-register').on('hidden.bs.modal',function(e){
				$('body').css('padding','0');
			})
		});

		$('.btn-login').click(function(){
			$('#modal-register').modal('hide');
			$('#modal-login').modal('show');
		});

		$('.location-slider').bxSlider({
			auto:false,
			pager:false,
			minSlides:2,
			maxSlides:5,
			slideWidth:240
		})

		$('.slider').bxSlider({
			controls:false,
			speed:600,
			mode:'horizontal',
			infiniteLoop:false,
			onSliderLoad: function () {
			new WOW().init();
			},
			onSlideAfter: function () {
			new WOW().init();
			},
			onSlideBefore: function () {
			new WOW().init();
			}
		});

		$('#anchor-about').click(function(){
			location.reload();
			window.location.replace('http://www.carizaki.com/'+ $(this).data('url') +'#about');
		});

		$('#anchor-product').click(function(){
			location.reload();
			window.location.replace('http://www.carizaki.com/'+ $(this).data('url') +'#product');
		});

		$('#btn-warna').click(function(){
			$('.modal-atap').modal('hide');
			$('.modal-atap-warna').modal('show');

			$('.modal-atap-warna').on('hidden.bs.modal',function(e){
				$('body').css('padding','0');
			})
		});

		$('.btn-forgot').click(function(){
			$('.title-formlogin').hide('slow','linear');
			$('#error-login,.form-login').hide('slow','linear');

			$('.title-formforgot').show('slow','linear');
			$('#error-lp-password,.form-forgotpassword').show('slow','linear');
		});

		$('.btn-login').click(function(){
			$('.title-formforgot').hide('slow','linear');
			$('#error-lp-password,.form-forgotpassword').hide('slow','linear');

			$('.title-formlogin').show('slow','linear');
			$('#error-login,.form-login').show('slow','linear');
		});

		$(".menu li a").on('click', function(event) {

				// Make sure this.hash has a value before overriding default behavior
				if (this.hash !== "") {
				  // Prevent default anchor click behavior
				  event.preventDefault();

				  // Store hash
				  var hash = this.hash;

				  // Using jQuery's animate() method to add smooth page scroll
				  // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
				  $('html, body').animate({
					scrollTop: $(hash).offset().top
				  }, 800, function(){

					// Add hash (#) to URL when done scrolling (default click behavior)
					//window.location.hash = hash;
				  });
				} // End if
		});

		$('.counter').countUp();

		$('#carousel-product').each(function(){
			//new WOW().init();
		});

		$('section.product').each(function(){
		    $('#carousel-product').on('slid.bs.carousel', function () {
			    //new WOW().init();
		    });
		});

		$('#carousel-tips').each(function(){
				//new WOW().init();
		});

		$('section.tips').each(function(){
		    $('#carousel-tips').on('slide.bs.carousel', function () {
    			if ($('.wow').hasClass('animated')) {
                    $(this).removeClass('animated');
                    $(this).removeAttr('style');
                    new WOW().init();
                }
		    });
		});

		$('.menu').slicknav();
		var $grid = $('.grid').masonry({
			//columnWidth: 200,
			itemSelector: '.grid-item'
		});

		// layout Masonry after each image loads
		$grid.imagesLoaded().progress( function() {
		$grid.masonry('layout');
		});

		$('#carousel-tips .carousel-inner .item:nth-child(2)').addClass('active');
		$('#carousel-product .carousel-inner .item:first-child').addClass('active');
		$('#carousel-product .carousel-indicators li:first-child').addClass('active');
		$('#carousel-example-generic .carousel-inner .item:first-child').addClass('active');

		// Cache the Window object
		var $window = $(window);
		if($(window).width() > 768){
			$('section.about').each(function(){

				$window.on('scroll', servicesOnScroll);

				function servicesOnScroll(){

					var scrolled = $window.scrollTop();

					$(".servicesOnScroll:not(.animated)").each(function(){
					var $this 		= $(this),
						offsetTop 	= $('section.about').offset().top;
					if (scrolled > ($('section.about').offset().top - 600)) {
						if($this.data('timeout')){
							window.setTimeout(function(){
							$this.addClass('animated ' + $this.data('animation'));
							$this.css('visibility','visible');
							}, parseInt($this.data('timeout'),10));
						}else{
							$this.addClass('animated ' + $this.data('animation'));
							$this.css('visibility','visible');
						};
					};
				});

				$(".servicesOnScroll.animated").each(function(index) {
					var $this   = $(this),
					offsetTop 	= $this.offset().top;
					if (scrolled < ($('section.about').offset().top - 600)) {
						$this.removeClass('animated bounceInUp bounceInDown bounceInLeft bounceInRight');
						$this.css('visibility','hidden');
					}
				});
				};
				servicesOnScroll();
			});

			// SECTION PARALLAX SERVICES
			$('section.inovation').each(function(){
				var $thisSection = $(this);
				$window.on('scroll', inovationOnScroll);
			function inovationOnScroll(){
				var scrolled 			= $window.scrollTop();
				$(".inovationOnScroll:not(.animated)").each(function(){
					var $this 		= $(this);
					if (scrolled > ($('section.inovation').offset().top - 500)) {
						if($this.data('timeout')){
							window.setTimeout(function(){
							$this.addClass('animated ' + $this.data('animation'));
							$this.css('visibility','visible');
							}, parseInt($this.data('timeout'),10));
						}else{
							$this.addClass('animated ' + $this.data('animation'));
							$this.css('visibility','visible');
						};
					};
				});
				$(".inovationOnScroll.animated").each(function(index) {
					var $this   = $(this),
					offsetTop 	= $this.offset().top;
					if (scrolled < ($('section.inovation').offset().top - 500)) {
						$this.removeClass('animated bounceInLeft bounceInRight fadeInUp fadeInDown flipInX lightSpeedIn fadeInUpBig');
						$this.css('visibility','hidden');
					}
				});
			};
			inovationOnScroll();
		});


		$('section.location').each(function(){
			var $ini = $(this);

				$window.on('scroll', contentOnScroll);

				function contentOnScroll(){

					var scrolled = $window.scrollTop();

					$(".contentOnScroll:not(.animated)").each(function(){
					var $this = $(this);
					if (scrolled > ($ini.offset().top - 500)) {
						if($this.data('timeout')){
							window.setTimeout(function(){
							$this.addClass('animated ' + $this.data('animation'));
							$this.css('visibility','visible');
							}, parseInt($this.data('timeout'),10));
						}else{
							$this.addClass('animated ' + $this.data('animation'));
							$this.css('visibility','visible');
						};
					};
				});
				$(".contentOnScroll.animated").each(function(index) {
					var $this 		= $(this);
					if (scrolled < ($ini.offset().top - 500)) {
						$this.removeClass('animated bounceInDown bounceInLeft bounceInRight fadeInUp flipInX lightSpeedIn fadeInUpBig');
						$this.css('visibility','hidden');
					}
				});
				};
				contentOnScroll();
			});

			$('section.client').each(function(){

				$window.on('scroll', clientOnScroll);

				function clientOnScroll(){

					var scrolled = $window.scrollTop();

					$(".clientOnScroll:not(.animated)").each(function(){
					var $this 		= $(this),
						offsetTop 	= $('section.client').offset().top;
					if (scrolled > ($('section.client').offset().top - 300)) {
						if($this.data('timeout')){
							window.setTimeout(function(){
							$this.addClass('animated ' + $this.data('animation'));
							$this.css('visibility','visible');
							}, parseInt($this.data('timeout'),10));
						}else{
							$this.addClass('animated ' + $this.data('animation'));
							$this.css('visibility','visible');
						};
					};
				});
				$(".clientOnScroll.animated").each(function(index) {
					var $this   = $(this),
					offsetTop 	= $this.offset().top;
					if (scrolled < ($('section.client').offset().top - 500)) {
						$this.removeClass('animated bounceInLeft bounceInUp bounceInRight fadeInUp flipInX lightSpeedIn fadeInUpBig');
						$this.css('visibility','hidden');
					}
				});
				};
				clientOnScroll();
			});
		// SECTION DANASTRA
		$('section.danastra').each(function(){
			var $thisSection = $(this);
			$window.on('scroll', danastraOnScroll);
			function danastraOnScroll(){
				var scrolled 			= $window.scrollTop();
				$(".danastraOnScroll:not(.animated)").each(function(){
					var $this 		= $(this),
						offsetTop 	= $('section.parallax-services').offset().top;
					if (scrolled > ($('.parallax-danastra').offset().top - 300)) {
						if($this.data('timeout')){
							window.setTimeout(function(){
							$this.addClass('animated ' + $this.data('animation'));
							$this.css('visibility','visible');
							}, parseInt($this.data('timeout'),10));
						};
					};
				});
				$(".danastraOnScroll.animated").each(function(index) {
					var $this   = $(this),
					offsetTop 	= $this.offset().top;
					if (scrolled < ($('.parallax-danastra').offset().top - 500)) {
						$this.removeClass('animated bounceInLeft bounceInRight fadeInUp flipInX lightSpeedIn fadeInUpBig');
						$this.css('visibility','hidden');
					}
				});
			};
			danastraOnScroll();
		});
		// SECTION AMITRA
		$('section.amitra').each(function(){
			var $thisSection = $(this);
			$window.on('scroll', amitraOnScroll);
			function amitraOnScroll(){
				var scrolled 			= $window.scrollTop();
				$(".amitraOnScroll:not(.animated)").each(function(){
					var $this 		= $(this),
						offsetTop 	= $('section.parallax-services').offset().top;
					if (scrolled > ($('.parallax-amitra').offset().top - 300)) {
						if($this.data('timeout')){
							window.setTimeout(function(){
							$this.addClass('animated ' + $this.data('animation'));
							$this.css('visibility','visible');
							}, parseInt($this.data('timeout'),10));
						};
					};
				});
				$(".amitraOnScroll.animated").each(function(index) {
					var $this   = $(this),
					offsetTop 	= $this.offset().top;
					if (scrolled < ($('.parallax-amitra').offset().top - 500)) {
						$this.removeClass('animated bounceInLeft bounceInRight fadeInUp flipInX lightSpeedIn fadeInUpBig');
						$this.css('visibility','hidden');
					}
				});
			};
			amitraOnScroll();
		});
		// Parallax Backgrounds
		// Tutorial: http://code.tutsplus.com/tutorials/a-simple-parallax-scrolling-technique--net-27641
				$('.middle-logo').click(function(){
					var x = $(".parallax-fifastra").offset();
	        alert("Top: " + x.top + " Left: " + x.left);
				});
		$('section[data-type="background"]').each(function(){
			var $bgobj = $(this); // assigning the object
			$(window).scroll(function() {
			// Scroll the background at var speed
			// the yPos is a negative value because we're scrolling it UP!
			if($bgobj.data('order')==0){
			if($window.scrollTop() > 0){
				var yPos = -(($window.scrollTop() - $('.fifgroup-slider').offset().top) / $bgobj.data('speed'));
			}
			}
			if($bgobj.data('order')==1){
			if($window.scrollTop() > 200){
			var yPos = -(($window.scrollTop() - $('.parallax-services').offset().top) / $bgobj.data('speed'));
			}
			}
			if($bgobj.data('order')==2){
			if($window.scrollTop() > ($('.parallax-intro_1').offset().top - 400)){
			var yPos = -(($window.scrollTop() - $('.parallax-intro_1').offset().top) / $bgobj.data('speed'));
			}
			}
			if($bgobj.data('order')==3){
			if($window.scrollTop() > ($('.parallax-intro_2').offset().top - 400)){
			var yPos = -(($window.scrollTop() - $('.parallax-intro_2').offset().top) / $bgobj.data('speed'));
			}
			}
			if($bgobj.data('order')==4){
			if($window.scrollTop() > ($('.parallax-intro_3').offset().top - 400)){
			var yPos = -(($window.scrollTop() - $('.parallax-intro_3').offset().top) / $bgobj.data('speed'));
			}
			}

			if($bgobj.data('order')==5){
			if($window.scrollTop() > ($('.parallax-intro_4').offset().top - 400)){
			var yPos = -(($window.scrollTop() - $('.parallax-intro_4').offset().top) / $bgobj.data('speed'));
			}
			}
			// Put together our final background position
			if($window.scrollTop() == 0){
			var coords = 'center';
			$('.bx-controls').removeClass('hidden');
			}else{
				$('.slider ul li:eq(1)').each(function(){
					var coords = '-225% '+ yPos + 'px';
				});
				$('.slider ul li:eq(2)').each(function(){
					var coords = '-200% '+ yPos + 'px';
				});
				var coords = '50% '+ yPos + 'px';
				$('.bx-controls').addClass('hidden');
			}
			// Move the background
			$bgobj.css({ backgroundPosition: coords });
			//$bgobj.css({ zIndex: $window.scrollTop() });
			}); // end window scroll
		});
		$('.fifastra-inner').each(function(){
		var $fifastraSpriterCaption = $(window).width() - ($('.fifastra-spriter').offset().left + $('.fifastra-spriter').outerWidth(true));
		$('.fifastra-spriter .caption').css('width', + $fifastraSpriterCaption );
		});
		$('.fifastra-spriter').each(function(){
			new WOW().init();
		});
		$('.parallax-slider').each(function(){
			var $this = $(this);
			$(window).scroll(function() {
				if($window.scrollTop() > 0){
					var yPos = -(($window.scrollTop()) / $this.data('speed'));
				}
				if($window.scrollTop() == 0){
					var coords = 'center';
				}else{
					var coords = '50% '+ yPos + 'px';
				}
				$this.css({ backgroundPosition: coords });
			});
		});
		$('.danastra-slider .slide-spriter').each(function(){
			$(window).on('load', function(){
				$(window).scroll(function() {
				if($window.scrollTop() == 0){
					$('.slide-spriter').each(function(){
					new WOW().init();
					});
				}
				});
				new WOW().init();
			});
		});
	};
});

function nextproduct(n){

}
