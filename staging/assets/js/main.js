var link = 'http://carizaki.com/';
function Registrasi()
{
  //$('#myModal_registrasi .modal-dialog').css('padding-top','10%');
  $('#myModal_registrasi').modal('show');
}
function validate()
{
  $("#register-form").validate({
        rules:
        {
            nama: {
                required: true
            },
            alamat: {
               required: true
            },
            provinsi: {
               required: true
            },
            kota: {
               required: true
            },
            telepon: {
                required: true
            },
            email: {
                required: true,
                email: true
            }
        },
        messages:
        {
            nama: "Nama Harus Di Isi",
            nama: "Alamat Harus Di Isi",
            nama: "Provinsi Harus Di Isi",
            nama: "kota Harus Di Isi",
            nama: "Telepon Harus Di Isi",
            email:{
                required: "Email harus di isi",
                email: "Masukkan emai yang valid"
            }
        },
        submitHandler: sign_in
    });
    /* validation */
}
function sign_up_applicator()
{

   var nama = $('#nama').val();
   var alamat = $('#alamat').val();
   var provinsi = $('#provinsi').val();
   var kota = $('#kota').val();
   var telepon = $('#telepon').val();
   var email = $('#email').val();
   var password = $('#password').val();
   if(!nama || !alamat || !provinsi || !kota || !telepon || !email || !password)
   {
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
function sign_in_applicator()
{
    var email = $('#email-login').val();
   var password = $('#password-login').val();
   if(!email || !password)
   {
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
          } else{
            alert('Login Berhasil');
            location.reload();
          }
          }
  });
   }
}
function sign_up_homeowner()
{

   var nama = $('#nama').val();
   var alamat = $('#alamat').val();
   var provinsi = $('#provinsi').val();
   var kota = $('#kota').val();
   var telepon = $('#telepon').val();
   var email = $('#email').val();
   var password = $('#password').val();
   if(!nama || !alamat || !provinsi || !kota || !telepon || !email)
   {
    $('#error').html('Mohon Lengkapi Data Anda');
   } else {
  var data = $('#register-form').serialize();
   $.ajax({
    type : "POST",
    data: data,
          url:link+"members/registrasi_homeowner",
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
function sign_in_homeowner()
{
    var email = $('#email-login').val();
   var password = $('#password-login').val();
   if(!email || !password)
   {
       $('#error-login').html('Mohon Lengkapi Login Anda');
   }
   else{
    var data = $('#login-form').serialize();
   $.ajax({
    type : "POST",
    data: data,
          url:link+"members/login_homeowner",
          success: function(a){
          if(a==0){
            $('#error-login').html('Login Gagal');
          } else{
            alert('Login Berhasil');
            location.reload();
          }
          }
  });
   }
}
function lupa_password_applicator()
{
 var email = $('#email-lp-password').val();
 //$('#email-lp-password').val('');
  $.ajax({  
          url: link + "/site/lupa_password_applicator/",
          type: "POST",
          data:'email='+email,
              success: function(data)
              {
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
function lupa_password_homeowner()
{
 var email = $('#email-lp-password').val();
 //$('#email-lp-password').val('');
  $.ajax({  
          url: link + "/site/lupa_password_homeowner/",
          type: "POST",
          data:'email='+email,
              success: function(data)
              {
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
function ajax_produk(no)
{
   var result="";
     $.ajax({
          url:link+"site/ajax_produk/"+no,
           async: false, 
          success: function(a){
          result = a;
          }
});
     return result;
}
function produk(no)
//var img = '<img src="'+link+'assets/img/'+no+'.jpg" class="img-responsive">';
  //$('#myModal .modal-body').html(img);
  {
  /*if (no === 1)
  {
    var desc = '<p>Untuk keawetan rumah Anda, kualitas BlueScope Zacs™ Paint tidak mengenal kata kompromi. BlueScope Zacs™ Paint adalah material baja lapis untuk atap dan dinding bangunan dengan berbagai varian warna indah. Produk ini juga memiliki ketahanan korosi yang maksimal.</p><p>Kualitas produk BlueScope Zacs™ didukung oleh jaminan garansi hingga 10 tahun* terhadap perforasi yang disebabkan oleh korosi (karat) serta jaminan warna hingga 3 tahun.</p>';
  } 
  else if(no===2)
  {
    var desc ='<p>BlueScope Zacs™ Natural menawarkan warna bertekstur yang ramah, alami, segar dan sempurna sebagai elemen yang melengkapi rumah atau bangunan Anda. Pilihan warna telah dipilih dengan penuh seksama oleh PT. NS BlueScope Indonesia untuk mencapai keseimbangan kinerja dan penampilan.</p>';
  }
  else if(no===3)
  {
     var desc ='<p>BlueScope Zacs™ Cool adalah baja lapis cat yang memiliki substrat AZ100 (100g/m2) dengan komposisi 55% aluminium, 43,5% zinc, dan 1,5% silicon yang merupakan hasil inovasi dari PT. NS BlueScope Indonesia untuk menghadirkan atap rumah yang lebih dingin daripada atap metal rumah biasa dengan mengurangi temperatur permukaan atap sebesar 6<sup>o</sup>C sehingga lebih sejuk untuk rumah Anda, serta ketahanan korosi dan ketahanan warna pudar untuk aplikasi atap ataupun material eksterior lainnya.</p>';
  }
  else if (no === 4)
  {
    var desc ='<p>BlueScope Zacs™ Bare dirancang dan diciptakan dari produk baja lapis yang dapat membuat rumah Anda tetap nyaman sesuai keinginan Anda. Dengan melalui riset mengenai berbagai faktor, khususnya dalam pemilihan material yang tepat untuk kenyamanan maksimal. Riset membuktikan jika baja lapis  BlueScope Zacs™ memberikan kenyamanan lebih baik bagi pemilik rumah.</p>';

  }
  else if (no === 5)
  {
    var desc = '<p>BlueScope Zacs™ Truss adalah baja ringan bermutu tinggi G550 dengan komposisi 55% aluminium, 43.5% zinc dan 1.5% silicon serta memiliki ketebalan antara 0.40 BMT hingga 1.00 BMT. Sangat cocok untuk aplikasi rangka atap dan rangka dinding.</p>';
  }*/
  var desc = ajax_produk(no);
if(no===1)
{
   var isi ='<div class="col-md-4">'+
                  '<img src="'+link+'assets/file/produk/'+no+'.jpg" class="img-responsive">'+
                '</div>'+
                '<div class="col-md-8">'+
                  '<div class="row">'+
                    '<div class="col-md-12 deskripsi-produk">'+ desc+'</div>'+
                    '<div class="col-md-12 logo-produk-footer">'+
                  '<img src="'+link+'assets/img/logo/LOGO_1.png">'+
                  '<img src="'+link+'assets/img/logo/LOGO_2.png">'+
                  '<img src="'+link+'assets/img/logo/LOGO_3.png">'+
                  '<img src="'+link+'assets/img/logo/LOGO_4.png">'+
                  '<img src="'+link+'assets/img/logo/LOGO_5.png">'+
                '</div>'+
                '</div>'+
              '</div>'+
                '<div class="col-md-12 produk-main-image">'+
                '<div class="col-md-6 pop-prod-left">'+
                    '<h3>THE COLOR CHOICE</h3>'+
                    '<h5>STANDARD</h5>'+
                    '<ul><li><button class="standard1">Biru Bromo</button></li><li><button class="standard2">Merah Carita</button></li><li><button class="standard3">Merah Merapi</button></li><li><button class="standard4">Hijau Borneo</button></li><li><button class="standard5">Coklat Jati</button></li></ul>'+
                    '<h5>NON STANDARD</h5>'+
                    '<ul><li><button class="non-standard1">Hijau Ubud</button></li><li><button class="non-standard2">Merah Batavia</button></li><li><button class="non-standard3">Coklat Toraja</button></li></ul>'+
                    '<br><small>*Warna sebagai referensi. Untuk warna sebenarnya gunakan sample coupon warna.</small>'+
                '</div>'+
                '<div class="col-md-6 pop-prod-right">'+
                '<img src="'+link+'assets/img/produk/'+no+'.png" class="img-responsive">'+
                '</div>'+
                '</div>';
}
else{
   var isi ='<div class="col-md-4">'+
                  '<img src="'+link+'assets/file/produk/'+no+'.jpg" class="img-responsive">'+
                '</div>'+
                '<div class="col-md-8">'+
                  '<div class="row">'+
                    '<div class="col-md-12 deskripsi-produk">'+ desc+'</div>'+
                    '<div class="col-md-12 logo-produk-footer">'+
                  '<img src="'+link+'assets/img/logo/LOGO_1.png">'+
                  '<img src="'+link+'assets/img/logo/LOGO_2.png">'+
                  '<img src="'+link+'assets/img/logo/LOGO_3.png">'+
                  '<img src="'+link+'assets/img/logo/LOGO_4.png">'+
                  '<img src="'+link+'assets/img/logo/LOGO_5.png">'+
                '</div>'+
                '</div>'+
              '</div>'+
                '<div class="col-md-12 produk-main-image">'+
                  '<img src="'+link+'assets/img/produk/'+no+'.png" class="img-responsive">'+
                '</div>';
}
$('#myModal .modal-body').css('height','auto');
$('#myModal .modal-body').css('background','#fff');
$('#myModal').css('overflow-y','hidden');
$('#myModal .modal-body').css('overflow-y','hidden');
$('#myModal .modal-body').css('padding','3%');

  $('#myModal .modal-body').html(isi);
  $('#myModal').modal('show');

}
function galery(no)
{

   $('#myModalNews').modal('show');

}
function lokasi(no)
{
 //var link = 'http://localhost/bluescope/';

 $.ajax({
          url:link+"lokasi/ajax_lokasi/"+no,
          success: function(a){
            $('#myModal_lokasi .image-popup').html('');
           $('#myModal_lokasi .image-popup').html(a);
          }
});
$.ajax({
          url:link+"lokasi/ajax_review/"+no,
          success: function(data){
            $('#myModal_lokasi .review-popup').html('');
           $('#myModal_lokasi .review-popup').html(data);
          }
});
$('#myModal_lokasi').modal('show');
}
function ShowApp(kota)
{
   $.ajax({
          url:link+"applicator/ajax_applicator/"+kota,
          success: function(a){
            $('#myModal_applicator .modal-body').css("overflow-y","scroll");
           $('#myModal_applicator .row').html(a);
          }
  
});
   $('#myModal_applicator').modal('show'); 
}
$(function() {

    $('#toko').click(function(e) {
    $("#lokasi-toko").delay(100).fadeIn(100);
    $("#lokasi-applicator").fadeOut(100);
    $('#applicator').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });
  $('#applicator').click(function(e) {
    $("#lokasi-applicator").delay(100).fadeIn(100);
    $("#lokasi-toko").fadeOut(100);
    $('#toko').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });

});
function scrollTo() {
            $('html, body').animate({ scrollTop: $('#tentang-kami').offset().top }, 'slow');
            return false;
        }
$('#varian .carousel[data-type="multi"] .item').each(function() {
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));

  for (var i = 0; i < 2; i++) {
    next = next.next();
    if (!next.length) {
      next = $(this).siblings(':first');
    }

    next.children(':first-child').clone().appendTo($(this));
  }
});
$('#testimoni .carousel[data-type="multi"] .item').each(function() {
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));

  for (var i = 0; i < 2; i++) {
    next = next.next();
    if (!next.length) {
      next = $(this).siblings(':first');
    }

    next.children(':first-child').clone().appendTo($(this));
  }
});
$('a[href=#tentang-kami]').
    click(function(){

        
        var target = $('#tentang-kami');
        if (target.length)
        {
            var top = target.offset().top;
            $('html,body').animate({scrollTop: top}, 1000);
            return false;
        }
    });
    $('a[href=#varian]').
    click(function(){
        var target = $('#varian');
        if (target.length)
        {
            var top = target.offset().top;
            $('html,body').animate({scrollTop: top}, 1000);
            return false;
        }
    });
    $('a[href=#lokasi]').
    click(function(){
        var target = $('#lokasi');
        if (target.length)
        {
            var top = target.offset().top;
            $('html,body').animate({scrollTop: top}, 1000);
            return false;
        }
    });
/*$('.testimoni .carousel[data-type="multi"] .item').each(function() {
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));

  for (var i = 0; i < 1; i++) {
    next = next.next();
    if (!next.length) {
      next = $(this).siblings(':first');
    }

    next.children(':first-child').clone().appendTo($(this));
  }
});*/
var data =[];
$( document ).ready(function() {

//#homepage
  var slideHeight = $(window).height();
  var windowWidth = $(window).width();
if(windowWidth < 768){
  $('.main-pages').css('height',slideHeight);
  $('.main-pages').css('overflow-x','hidden');
  $(window).resize(function(){'use strict',
    $('.main-pages').css('height',slideHeight);
  });
}

  $('#warna').show();
  $('#pilih-warna').hide();
  $('#pilih-toko').hide();
   $('#information').hide();
   $('#last-popup').hide();
   $('#button-applicator small').hide();
   $('#button-homeowner small').hide();
    $('#button-homeowner span').hide();
   $('#button-applicator span').hide();
   $('#button-homeowner').css('background','url('+link+'assets/img/home-owner.png) no-repeat');
   $('#button-homeowner').css('background-size','contain');
   $('#button-homeowner').css('background-position','center');
   $('#button-applicator').css('background','url('+link+'assets/img/applicator.png) no-repeat');
   $('#button-applicator').css('background-size','contain');
   $('#button-applicator').css('background-position','center');

  function insertData(param)
  {
    data.push(param);
  }

$('.nav li a').click(function() {
$('#navbar').removeClass('in');
        $('.navbar-toggle').removeClass('change');
  });
$('.atap').click(function() {
      var id = $('#id_users').val();
          if(!id){
            $('#myModal_registrasi').modal('show');
          } else {
              var produk = $('#atap').val();   
              insertData(produk);
              //$('#myModal_permintaan_produk #warna').css('background','url('+link+'assets/img/background-popup1.jpg) no-repeat');
                 $('#myModal_permintaan_produk .back-prod').css('background','url('+link+'assets/img/produk.jpg) no-repeat');
                $('#warna').hide();
                $('#last-popup').hide();
                $('#pilih-warna').show();
              
               $('#myModal_permintaan_produk').modal('show');
        }
    });
$('.rangka-baja').click(function() {
    var id = $('#id_users').val();
    var type = $('#type').val();
    if(!id){
      $('#myModal_registrasi').modal('show');
    } else {
      var produk = $('#rangka-baja').val();
        insertData(produk);
           $.ajax({  
          url: link + "/site/email_permintaan_produk_"+type+"/"+id,
          type: "POST",
          data:'produk='+produk,
              success: function(data)
              {
              

              }
        });

        $('#myModal_permintaan_produk #last-popup').css('background','url('+link+'assets/img/terimakasih.jpg) no-repeat');
        $('#warna').hide();
        $('#pilih-warna').hide();
        $('#last-popup').show();
         $('#myModal_permintaan_produk').modal('show');
       }

    });
  $('#img-warna').click(function() {
    
      var warna = "warna";
        insertData(warna);

        $('#myModal_permintaan_produk .back-prod').css('background','url('+link+'assets/img/produk.jpg) no-repeat');
        $('#warna').hide();
        $('#pilih-toko').hide();
        $('#information').hide();
        $('#pilih-warna').show();

    });
  $('#img-non-warna').click(function() {
    
      var warna = "non warna";
        insertData(warna);
        $('#myModal_permintaan_produk #last-popup').css('background','url('+link+'assets/img/terimakasih.jpg) no-repeat');
        $('#warna').hide();
        $('#pilih-warna').hide();
        $('#last-popup').show();
        //$('#pilih-warna').show();
         //alert('Terimakasih atas ketertarikan anda. Request anda telah kami terima. Kami akan segera menghubungi anda.');
        //location.reload();
    });

   $('#btn-daftar-lp').click(function() {
    $('#login-form').hide();
    $('#lupa-password-form').hide();
    //$('#myModal_registrasi .modal-dialog').css('padding-top','3%');
    $('#myModal_registrasi .modal-body').css('background','url('+link+'assets/img/background-registrasi.png) no-repeat');
    $('#register-form').show();
   });
   $('#btn-login-lp').click(function() {
    $('#register-form').hide();
    $('#lupa-password-form').hide();
    //$('#myModal_registrasi .modal-dialog').css('padding-top','10%');
    $('#myModal_registrasi .modal-body').css('background','url('+link+'assets/img/background-popup1.jpg) no-repeat');
    $('#login-form').show();
    });
  $('#btn-daftar').click(function() {
    $('#login-form').hide();
    $('#lupa-password-form').hide();
    //$('#myModal_registrasi .modal-dialog').css('padding-top','3%');
    $('#myModal_registrasi .modal-body').css('background','url('+link+'assets/img/background-registrasi.png) no-repeat');
    $('#register-form').show();
    });
  $('#btn-login').click(function() {
    $('#register-form').hide();
    $('#lupa-password-form').hide();
    //$('#myModal_registrasi .modal-dialog').css('padding-top','10%');
     $('#myModal_registrasi .modal-body').css('background','url('+link+'assets/img/background-popup1.jpg) no-repeat');
    //$('#myModal_registrasi .modal-dialog').css('-webkit-transform','translate(0, 40%) !important');
    $('#login-form').show();
    });
  
  $('#btn-lupa-password').click(function() {
    $('#register-form').hide();
    $('#login-form').hide();
     $('#myModal_registrasi .modal-body').css('background','url('+link+'assets/img/background-popup1.jpg) no-repeat');
    //$('#myModal_registrasi .modal-dialog').css('-webkit-transform','translate(0, 40%) !important');
    $('#lupa-password-form').show();
    });
  $('#myModal_permintaan_produk .close').click(function() {
        $('#last-popup').hide();
        $('#pilih-toko').hide();
        $('#pilih-warna').hide();
        $('#warna').show();
    });
  $('#myModal_registrasi .close').click(function() {
          $('#register-form').hide();
        $('#lupa-password-form').hide();
        $('#login-form').show();
        
    });
});
function pilihDataProduk(no)
{
  data.push(no);
        $('#warna').hide();
        $('#pilih-toko').show();
        $('#information').hide();
        $('#pilih-warna').hide();
         $('#myModal_permintaan_produk #last-popup').css('background','url('+link+'assets/img/background-popup1.png) no-repeat');
       // alert('Terimakasih atas ketertarikan anda. Request anda telah kami terima. Kami akan segera menghubungi anda.');
        //location.reload();

}
 function terimakasih(no)
{
 var id = $('#id_users').val();
  var type = $('#type').val();
      //var produk = $('#rangka-baja').val();
        if (no==1)
        {
          var produk = 'Atap Paint';
        } else if(no==2)
        {
          var produk = 'Atap Natural';
        } else if(no==3)
        {
          var produk = 'Atap Cool';
        } else if (no==4)
        {
           var produk = 'Atap Bare';
        }
           $.ajax({  
          url: link + "/site/email_permintaan_produk_"+type+"/"+id,
          type: "POST",
          data:'produk='+produk,
              success: function(data)
              {
              

              }
        });
  $('#myModal_permintaan_produk #last-popup').css('background','url('+link+'assets/img/terimakasih.jpg) no-repeat');
      $('#warna').hide();
        $('#pilih-warna').hide();
        $('#last-popup').show();
}
function pilihDataToko(no)
{
  data.push(no);
        $('#warna').hide();
        $('#pilih-toko').hide();
        $('#pilih-warna').hide();
        $('#information').hide();
        $('#information').show();
}
function joinEvent(no)
{
  var id = $('#id_members').val();
  if(!id){
    alert('Anda belum login');
  }
  else{
    alert('Anda telah join pada event ini');
  }
}
$(function(){

 var currencies = [
    { value: 'Atap', data: 'Atap' },
    { value: 'Rangka Baja Ringan', data: 'Rangka Baja Ringan' },
  ];

          // setup autocomplete function pulling from currencies[] array
          $('#autocomplete').autocomplete({
            lookup: currencies,
            onSelect: function (suggestion) {
              var thehtml = '<strong>Currency Name:</strong> ' + suggestion.value + ' <br> <strong>Symbol:</strong> ' + suggestion.data;
              $('#outputcontent').html(thehtml);
            }
          });
  
          

});  
$(document).ready(function(e) {
  //$('.carousel-caption').hide();
  $('#register-form').hide();
  $('#lupa-password-form').hide();
   $("#lokasi-applicator").hide();
    $('img[usemap]').rwdImageMaps();
     /* $('#testimoni .item img').mouseenter(function() {
        $('.carousel-caption').show();
      });
      $('#testimoni .item img').mouseleave(function() {
        $('.carousel-caption').hide();
      });*/
});

(function(){
  $('#myCarouselTesti .item').each(function(){
    var itemToClone = $(this);

    for (var i=1;i<2;i++) {
      itemToClone = itemToClone.next();

      // wrap around if at end of item collection
      if (!itemToClone.length) {
        itemToClone = $(this).siblings(':first');
      }

      // grab item, clone, add marker class, add to collection
      itemToClone.children(':first-child').clone()
        .addClass("cloneditem-"+(i))
        .appendTo($(this));
    }
  });
}());
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
function daftar()
{
$('#login-form').hide();
$('#register-form').show();
}
function daftar()
{
$('#register-form').hide();
$('#login-form').show();
}
function gabung () {
$('#login-form').hide();
$('#register-form').show();
$('#myModal_registrasi').modal('show');
}
function myFunction(x) {
    x.classList.toggle("change");
    }

function button_applicator_in()
{
  $('#button-applicator span').hide();
  $('#button-applicator').css('background','url('+link+'assets/img/back-button-app.png) no-repeat');
  //$('#button-applicator').css('background-size','cover');
  $('#button-applicator').css('background-size','contain');
   $('#button-applicator').css('background-position','center');
  $('#button-applicator small').show();
  $('#button-applicator').css('font-size','inherit');
 
}
function button_applicator_out()
{
  
  $('#button-applicator small').hide();
  //$('#button-applicator').css('background','#2A3270');
  //$('#button-applicator span').show();
  $('#button-applicator').css('background','url('+link+'assets/img/applicator.png) no-repeat');
  $('#button-applicator').css('background-size','contain');
   $('#button-applicator').css('background-position','center');
  //$('#button-applicator').css('font-size','20px');
}
function button_homeowner_in()
{
  $('#button-homeowner span').hide();
   $('#button-homeowner').css('background','url('+link+'assets/img/back-button-home.png) no-repeat');
   $('#button-homeowner').css('background-size','contain');
   $('#button-homeowner').css('background-position','center');
   //$('#button-homeowner').css('background-size','cover');
  $('#button-homeowner small').show();
  $('#button-homeowner').css('font-size','inherit');
 
}
function button_homeowner_out()
{
  
 $('#button-homeowner small').hide();
  //$('#button-homeowner').css('background','#2A3270');
  //$('#button-homeowner span').show();
  $('#button-homeowner').css('background','url('+link+'assets/img/home-owner.png) no-repeat');
  $('#button-homeowner').css('background-size','contain');
   $('#button-homeowner').css('background-position','center');
}
function video(id)
{
    $.ajax({
        
        url: link + "/site/getvideo/"+id,
        type: "GET",
            
            success: function(data)
            {
              
        $('#myModalVideo .modal-body').html(data);        
    $('#myModalVideo').modal('show');
            }
        });
   
     
}
//ANIMATE 
//Initiat WOW JS
  new WOW().init();
