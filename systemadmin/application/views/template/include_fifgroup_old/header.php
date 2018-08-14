<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>FIFGROUP | Kredit Motor | Kredit Elektronik | Kredit Motor Bekas | Kredit Motor Second | Kredit Motor Seken</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.bxslider.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.slicknav.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('.slider').bxSlider({
			auto:true,
			controls:true,
			pager:false,
			mode:'horizontal'
		});
		
		$('#sidebar_brand').bxSlider({
			auto:true,
			controls:false,
			pager:false,
			mode:'horizontal'
		});
		
		$('.menu').slicknav({
			label:'',
			allowParentLinks:true
		});	


        $( "#searchform" ).click(function() {

          var text = $("#searchText").val();
          //alert(text);
          if(text !='')
          {
            document.myform.submit();
          }
});

	});
</script>
</head>

<body>
<nav id="mobile">
<ul class="topMenu hidden-sm hidden-md hidden-lg">
		<li class="lang"><a class="active" href="<?php echo base_url(); ?>LanguageSwitcher/switchLang/indonesian">ID</a></li>
		<li class="lang"><a href="<?php echo base_url(); ?>LanguageSwitcher/switchLang/english">EN</a></li>
		<li class="lang"><a href="#"><i class="fa fa-search"></i></a></li>
</ul>
</nav>

<header class="l">
	<div class="top hidden-xs">
	<div class="container">
	
	<div class="row">
	<div class="col-md-12 col-xs-12 text-center">
	<div class="fif-network">
	
	
	<ul class="network">
	<li><label>FIFGROUP NETWORK <i class="fa fa-angle-right"></i></label></li>
	<li><a target="_blank" href="http://www.fifgroup.co.id">FIFGROUP</a></li>
	<li><a target="_blank" href="http://www.spektrakredit.com">SPEKTRA KREDIT</a></li>
	<li><a target="_blank" href="http://www.fifclub.com">FIFCLUB</a></li>
	</ul>

	</div>
	</div>
	</div>
	
	</div>
	</div>
	
	<div class="container">
    
    <div class="clearer">
    	<div class="row">
	<div class="logo col-md-3 col-sm-3 col-xs-12 text-left hidden-xs">
    	<a href="<?php echo site_url(); ?>"><img src="<?php echo base_url(); ?>images/logo.png"/></a>
    </div>
    
    <nav class="col-md-9 col-sm-9 col-xs-12 text-right callCenter">
	
    	<ul class="topMenu">
        <li><a href="<?php echo site_url(); ?>">Home</a></li>
        <li><a href="<?php echo site_url('branch'); ?>">Kantor Cabang</a></li>
		<!-- <li><a href="#">Simulasi Kredit</a></li> -->
		<li><a href="<?php echo site_url('articles') ?>">Artikel</a>
			<ul>
			
			<?php

            $articles_category = $this->db->query("select * from sketsa_articles_category");
             ?>
             <?php foreach($articles_category->result_array() as $r): ?>
			
            <li><a href="<?php echo site_url('articles/category/'.$r['slug']); ?>"><?php echo $r['name'] ?></a></li>

                <?php endforeach; ?>
			
			</ul>
		</li>
		<li><a href="http://recruitment.fifgroup.co.id/fif-erec-applicant/applicant/home" target="_blank">Karir</a></li>
        <li><a href="#">Peta Situs</a></li>
        <li><a href="<?php echo site_url('contactus'); ?>">Hubungi Kami</a></li>
		<li class="lang hidden-xs"><a <?php if($this->session->userdata('site_lang') == 'indonesian') echo 'class="active"'; ?>  href="<?php echo base_url(); ?>LanguageSwitcher/switchLang/indonesian">ID</a></li>
		<li class="lang hidden-xs"><a <?php if($this->session->userdata('site_lang') == 'english') echo 'class="active"'; ?>  href="<?php echo base_url(); ?>LanguageSwitcher/switchLang/english">EN</a></li>
        </ul>


        <form name="myform" style="margin:0;" type="post" action="<?php echo site_url('search/view') ?>">
     <div class="input-group">
        <input name="param" type="hidden" />
        <input type="text" name="key" id="searchText" class="form-control" placeholder="Search">
            <span class="input-group-btn">
                <button class="btn btn-default" id="searchform" type="button">
            Search
                        </button>
                        </span>
                        </div>
                      </form>
    
	</nav>
    
    
    </div>
</div>
    
</div>
</header>


    <nav class="mainMenu text-center hidden-xs">
    <div class="container">
    <div class="row">
    	<div class="col-md-12">
            <?php if( $this->session->userdata('site_lang')=='english'): ?>
    	<ul class="menu">
        	<li><a href="<?php echo site_url('about'); ?>">About Us <i class="fa fa-angle-down"></i></a>
			<ul>
				<li><a href="<?php echo site_url('fifgroup/pages/data-perusahaan-en'); ?>">Data Perusahaan <?php //echo $this->session->userdata('site_lang').'tess'; ?></a></li>
                <li><a href="<?php echo site_url('pages/view/1/Company-profile') ?>">Company Profile</a></li>
                <li><a href="<?php echo base_url().'fifgroup/pages/struktur-organisasi'; ?>">Struktur Organisasi</a></li>
                <li><a href="<?php echo base_url().'fifgroup/pages/struktur-kepemilikan'; ?>">Struktur Kepemilikan</a></li>       
                <li><a href="<?php echo base_url().'fifgroup/pages/struktur-grup'; ?>">Struktur Grup</a></li>   
                <li><a href="<?php echo base_url().'fifgroup/pages/board-of-director'; ?>">Board Of Director</a></li>
                <li><a href="<?php echo base_url().'fifgroup/pages/board-of-comisioner'; ?>">Board of Commisioner</a></li>
                <li><a href="#">Profil Komite</a></li>
                <li><a href="<?php echo base_url().'fifgroup/pages/profil-sekretaris-perusahaan'; ?>">Profil Sekretaris Perusahaan</a></li>
                <li><a href="<?php echo base_url().'fifgroup/pages/profil-profesi-dan-lembaga-penunjang'; ?>">Profil Profesi &amp; Lembaga Penunjang</a></li>       
<li><a href="<?php echo base_url().'anggarandasar'; ?>">Dokumen Anggaran Dasar</a></li>
                <li><a href="<?php echo base_url().'fifgroup/pages/kebijakan-privasi'; ?>">Kebijakan Privasi</a></li>   
				</ul>
			</li>
        	<li><a href="<?php echo site_url('page'); ?>">Our Brand <i class="fa fa-angle-down"></i></a>
			<ul>
			
            <li><a href="">FIFASTRA</a>

            <ul> 
                    <li><a href="<?php //echo site_url('#') ?>">About FIFASTRA</a>
                        
                        <ul>
                            <li><a href="<?php echo site_url('fifastra/pages/product-knowledge') ?>">Product Knowledge</a></li>
                            <li><a href="<?php echo site_url('fifastra/pages/personal-and-corporate') ?>">Personal & Corporate</a></li>
                            <li><a href="<?php echo site_url('fifastra/pages/platform-info') ?>">Platform Info</a></li>
                            <li><a href="<?php echo site_url('fifastra/pages/brand-partner') ?>">Brand Partner</a></li>
                        </ul>

                    </li>
                    <li><a href="<?php echo site_url('eventamitra') ?>">Promotion & Event </a></li>
                    <li><a href="">Credit Info </a></li>
                    <li><a href="#">Online Transaction </a></li>
                    </ul>

            </li>

			<li><a href="">SPEKTRA</a>
				 <ul> 
                    <li><a href="<?php //echo site_url('#') ?>">About SPEKTRA</a>
                        
                       	 <ul>
                            <li><a href="<?php echo site_url('spektra/pages/product-knowledge-spektra') ?>">Product Knowledge</a></li>
                            <li><a href="<?php echo site_url('spektra/pages//personal-and-corporate-spektra') ?>">Personal & Corporate</a></li>
                            <li><a href="<?php echo site_url('spektra/pages/platform-info-spektra') ?>">Platform Info</a></li>
                            <li><a href="<?php echo site_url('spektra/pages/brand-partner-spektra') ?>">Brand Partner</a></li>
                        </ul> 

                    </li>
                    <li><a href="<?php echo site_url('eventspektra') ?>">Promotion & Event </a></li>
                    <li><a href="<?php echo site_url('spektra/pages/product-focus'); ?>">Product Focus </a></li>
                    <li><a href="<?php echo site_url('spektra/pages/store-partner'); ?>">Store Partner</a></li>
                    </ul>

			</li>


			<li><a href="">Amitra <i class="fa fa-angle-down"></i></a>
				<ul> 
                    <li><a href="<?php echo site_url('amitra/pages/about-amitra') ?>">About AMITRA</a>
                    	
                    	<ul style="left: 100%; top: 100px; display: none;" class="dropdown-menu dop " role="menu">
                    		<li><a href="<?php echo site_url('amitra/pages/product-knowledge') ?>">Product Knowledge</a></li>
                    		<li><a href="<?php echo site_url('amitra/pages/personal-corporate') ?>">Personal & Corporate</a></li>
                    		<li><a href="<?php echo site_url('amitra/pages/partner') ?>">Partner</a></li>
                    	</ul>

                    </li>
                    <li><a href="<?php echo site_url('eventamitra') ?>">Promotion & Event </a></li>
                    <li><a href="#">Product Info </a></li>
                    </ul>
			</li>
			</ul>
			</li>
        	<li><a href="<?php echo site_url('news'); ?>">News <i class="fa fa-angle-down"></i></a>
			<ul>
			<li><a href="<?php echo site_url('news/category/corporate'); ?>">Corporate</a></li>
			<li><a href="<?php echo site_url('news/category/csr'); ?>">CSR</a></li>
			</ul>
			</li>
            <li><a href="<?php echo site_url('page'); ?>">Good Corporate Governance <i class="fa fa-angle-down"></i></a>
			<ul> 
                <li><a href="<?php echo site_url('pages/view/18/pedoman-kerja-direksi-dewan-komisaris') ?>">Pedoman Kerja Direksi &amp; Dewan Komisaris</a></li>
          		<li><a href="<?php echo site_url('pages/view/19/sekretaris-perusahaan') ?>">Sekretaris Perusahaan</a></li>
                <li><a href="<?php echo site_url('pages/view/20/piagam-unit-audit-internal') ?>">Piagam Unit Audit Internal</a></li>
                <li><a href="<?php echo site_url('pages/view/21/kode-etik') ?>">Kode Etik</a></li>
                <li><a href="<?php echo site_url('pages/view/22/komite-audit') ?>">Komite Audit</a>
					<ul style="left: 100%; top: 100px; display: none;" class="dropdown-menu dop " role="menu">
                    <li><a href="#">Pedoman Kerja</a></li>
                    <li><a href="#">Pengangkatan Komite Audit</a></li>
                    </ul>
				</li>
                <li><a href="<?php echo site_url('pages/view/23/kebijakan-nominasi') ?>">Kebijakan Nominasi &amp; Remunerasi</a></li>
                <li><a href="<?php echo site_url('pages/view/24/kebijakan-manajemen-resiko') ?>">Kebijakan Manajemen Risiko</a></li>  
              </ul>
			</li>
            <li><a href="<?php echo site_url('page'); ?>">Investor Relations <i class="fa fa-angle-down"></i></a>
            <ul>
                <li><a href="<?php echo base_url().'fifgroup/pages/dokumen-prospektus'; ?>">Dokumen Prospektus</a></li>    
                <li><a href="<?php echo site_url('annual'); ?>">Annual Report</a></li>
                <li><a href="<?php echo base_url().'fifgroup/pages/informasi-keuangan'; ?>">Informasi Keuangan</a> 
                    <ul>
                    <li><a href="<?php echo base_url().'fifgroup/pages/laporan-keuangan-tahunan'; ?>">Laporan Keuangan Tahunan</a></li>
                    <li><a href="<?php echo base_url().'fifgroup/pages/laporan-keuangan-tengah-tahunan'; ?>">Laporan Keuangan Tengah Tahunan</a></li>
                    <li><a href="<?php echo base_url().'fifgroup/pages/informasi-keuangan'; ?>">Ikhtisar Data Keuangan</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo base_url().'fifgroup/pages/informasi-rups'; ?>">Informasi RUPS</a></li>   
                <li><a href="<?php echo base_url().'fifgroup/pages/informasi-saham'; ?>">Informasi Saham</a></li>           
                <li><a href="<?php echo base_url().'fifgroup/pages/informasi-obligasi-dan-atau-sukuk'; ?>">Informasi Obligasi dan/atau Sukuk</a></li> 
                <li><a href="<?php echo base_url().'fifgroup/pages/informasi-dividen'; ?>">Informasi Dividen</a></li>     
                <li><a href="<?php echo base_url().'fifgroup/pages/informasi-lain'; ?>">Informasi Lain</a></li>           
            </ul>
            </li>
            <li><a href="<?php echo site_url('page'); ?>">Business Partner <i class="fa fa-angle-down"></i></a>
			<ul>
            <li><a href="https://dis.fifkredit.com/dis/index.php" target="_blank">Dealer (FIF Solution)</a></li>
			<li><a href="https://tms.fifkredit.com:8090/tms-vendor/faces/login/login.jsf">Vendor</a></li>       
            </ul>
			</li>
			<li><a href="<?php echo site_url('page'); ?>">Social Responsibility <i class="fa fa-angle-down"></i></a>
			<ul>
                <li><a href="#">Vision, Mission, Objective</a></li>
                <li><a href="#">Kebijakan</a></li>
                <li><a href="#">Laporan Kegiatan</a></li>        
                <li><a href="#">What They Feel</a></li>
                <li><a href="#">Let's Go Synergy</a></li>
                <li><a href="#">CSR Program</a></li>
            </ul>
			</li>
        </ul>
            <?php else: ?>
            
            <ul class="menu">
        	<li><a href="<?php echo site_url('about'); ?>">Tentang Kami <i class="fa fa-angle-down"></i></a>
			<ul>
				<li><a href="<?php echo base_url().'fifgroup/pages/data-perusahaan'; ?>">Data Perusahaan <?php //echo $this->session->userdata('site_lang').'tess'; ?></a></li>
                <li><a href="<?php echo base_url().'fifgroup/pages/profil-perusahaan'; ?>">Profil Perusahaan</a></li>
                <li><a href="<?php echo base_url().'fifgroup/pages/struktur-organisasi'; ?>">Struktur Organisasi</a></li>
                <li><a href="<?php echo base_url().'fifgroup/pages/struktur-kepemilikan'; ?>">Struktur Kepemilikan</a></li>       
                <li><a href="<?php echo base_url().'fifgroup/pages/struktur-grup'; ?>">Struktur Grup</a></li>   
                <li><a href="<?php echo base_url().'fifgroup/pages/susunan-direktur'; ?>">Profil Direksi</a></li>
                <li><a href="<?php echo base_url().'fifgroup/pages/profil-komite'; ?>">Profil Komite</a></li>
                <li><a href="<?php echo base_url().'fifgroup/pages/susunan-komisaris'; ?>">Profil Dewan Komisaris</a></li>
                <li><a href="<?php echo base_url().'fifgroup/pages/profil-sekretaris-perusahaan'; ?>">Profil Sekretaris Perusahaan</a></li>
                <li><a href="<?php echo base_url().'fifgroup/pages/profil-profesi-dan-lembaga-penunjang'; ?>">Profil Profesi &amp; Lembaga Penunjang</a></li>       
                <li><a href="<?php echo base_url().'anggarandasar'; ?>">Dokumen Anggaran Dasar</a></li>
				<li><a href="<?php echo base_url().'fifgroup/pages/kebijakan-privasi'; ?>">Kebijakan Privasi</a></li>	
				</ul>
			</li>
        	<li><a href="<?php echo site_url('page'); ?>">Our Brand <i class="fa fa-angle-down"></i></a>
			<ul>
			<li><a href="">FIFASTRA</a>

             <ul> 
                    <li><a href="<?php //echo site_url('#') ?>">About FIFASTRA</a>
                        
                        <ul>
                            <li><a href="<?php echo site_url('fifastra/pages/product-knowledge') ?>">Product Knowledge</a></li>
                            <li><a href="<?php echo site_url('fifastra/pages/personal-and-corporate') ?>">Personal & Corporate</a></li>
                            <li><a href="<?php echo site_url('fifastra/pages/platform-info') ?>">Platform Info</a></li>
                            <li><a href="<?php echo site_url('fifastra/pages/brand-partner') ?>">Brand Partner</a></li>
                        </ul>

                    </li>
                    <li><a href="<?php echo site_url('eventamitra') ?>">Promotion & Event </a></li>
                    <li><a href="">Credit Info </a></li>
                    <li><a href="#">Online Transaction </a></li>
                    </ul>

            </li>
			<li><a href="">SPEKTRA</a>
				 <ul> 
                    <li><a href="<?php //echo site_url('#') ?>">About SPEKTRA</a>
                        
                       	 <ul>
                            <li><a href="<?php echo site_url('spektra/pages/product-knowledge-spektra') ?>">Product Knowledge</a></li>
                            <li><a href="<?php echo site_url('spektra/pages//personal-and-corporate-spektra') ?>">Personal & Corporate</a></li>
                            <li><a href="<?php echo site_url('spektra/pages/platform-info-spektra') ?>">Platform Info</a></li>
                            <li><a href="<?php echo site_url('spektra/pages/brand-partner-spektra') ?>">Brand Partner</a></li>
                        </ul> 

                    </li>
                    <li><a href="<?php echo site_url('eventspektra') ?>">Promotion & Event </a></li>
                    <li><a href="<?php echo site_url('spektra/pages/product-focus'); ?>">Product Focus </a></li>
                    <li><a href="<?php echo site_url('spektra/pages/store-partner'); ?>">Store Partner</a></li>
                    </ul>

			</li>
			<li><a href="">Amitra <i class="fa fa-angle-down"></i></a>
				<ul> 
                    <li><a href="<?php echo site_url('amitra/pages/about-amitra') ?>">About AMITRA</a>
                        
                        <ul>
                            <li><a href="<?php echo site_url('amitra/pages/product-knowledge') ?>">Product Knowledge</a></li>
                            <li><a href="<?php echo site_url('amitra/pages/personal-corporate') ?>">Personal & Corporate</a></li>
                            <li><a href="<?php echo site_url('amitra/pages/partner') ?>">Partner</a></li>
                        </ul>

                    </li>
                    <li><a href="<?php echo site_url('eventamitra') ?>">Promotion & Event </a></li>
                    <li><a href="#">Product Info </a></li>
                    </ul>
			</li>
			</ul>
			</li>
        	<li><a href="<?php echo site_url('news'); ?>">Berita<i class="fa fa-angle-down"></i></a>
			<ul>
                <li><a href="<?php echo site_url('news/category/corporate'); ?>">Perusahaan</a></li>
            <li><a href="<?php echo site_url('news/category/csr'); ?>">Kepedulian Sosial</a></li>
			</ul>
			</li>
            <li><a href="<?php echo site_url('page'); ?>">Good Corporate Governance <i class="fa fa-angle-down"></i></a>
			<ul> 
                <li><a href="<?php echo site_url('pages/view/18/pedoman-kerja-direksi-dewan-komisaris') ?>">Pedoman Kerja Direksi &amp; Dewan Komisaris</a></li>
          		<li><a href="<?php echo site_url('pages/view/19/sekretaris-perusahaan') ?>">Sekretaris Perusahaan</a></li>
                <li><a href="<?php echo site_url('pages/view/20/piagam-unit-audit-internal') ?>">Piagam Unit Audit Internal</a></li>
                <li><a href="<?php echo site_url('pages/view/21/kode-etik') ?>">Kode Etik</a></li>
                <li><a href="<?php echo site_url('pages/view/22/komite-audit') ?>">Komite Audit</a>
					<ul style="left: 100%; top: 100px; display: none;" class="dropdown-menu dop " role="menu">
                    <li><a href="#">Pedoman Kerja</a></li>
                    <li><a href="#">Pengangkatan Komite Audit</a></li>
                    </ul>
				</li>
                <li><a href="<?php echo site_url('pages/view/23/kebijakan-nominasi') ?>">Kebijakan Nominasi &amp; Remunerasi</a></li>
                <li><a href="<?php echo site_url('pages/view/24/kebijakan-manajemen-resiko') ?>">Kebijakan Manajemen Risiko</a></li>   
              </ul>
			</li>
            <li><a href="<?php echo site_url('page'); ?>">Investor Relations <i class="fa fa-angle-down"></i></a>
			<ul>
                <li><a href="<?php echo base_url().'fifgroup/pages/dokumen-prospektus'; ?>">Dokumen Prospektus</a></li>    
                <li><a href="<?php echo site_url('annual'); ?>">Annual Report</a></li>
                <li><a href="<?php echo base_url().'fifgroup/pages/informasi-keuangan'; ?>">Informasi Keuangan</a> 
                    <ul>
                    <li><a href="<?php echo base_url().'fifgroup/pages/laporan-keuangan-tahunan'; ?>">Laporan Keuangan Tahunan</a></li>
                    <li><a href="<?php echo base_url().'fifgroup/pages/laporan-keuangan-tengah-tahunan'; ?>">Laporan Keuangan Tengah Tahunan</a></li>
                    <li><a href="<?php echo base_url().'fifgroup/pages/informasi-keuangan'; ?>">Ikhtisar Data Keuangan</a></li>
                    </ul>
                </li>
				<li><a href="<?php echo base_url().'fifgroup/pages/informasi-rups'; ?>">Informasi RUPS</a></li>   
                <li><a href="<?php echo base_url().'fifgroup/pages/informasi-saham'; ?>">Informasi Saham</a></li>           
				<li><a href="<?php echo base_url().'fifgroup/pages/informasi-obligasi-dan-atau-sukuk'; ?>">Informasi Obligasi dan/atau Sukuk</a></li> 
				<li><a href="<?php echo base_url().'fifgroup/pages/informasi-dividen'; ?>">Informasi Dividen</a></li>     
                <li><a href="<?php echo base_url().'fifgroup/pages/informasi-lain'; ?>">Informasi Lain</a></li>           
            </ul>
			</li>
            <li><a href="<?php echo site_url('page'); ?>">Business Partner <i class="fa fa-angle-down"></i></a>
			<ul>
            
            <li><a href="https://dis.fifkredit.com/dis/index.php" target="_blank">Dealer (FIF Solution)</a></li>
            <li><a href="https://tms.fifkredit.com:8090/tms-vendor/faces/login/login.jsf">Vendor</a></li>       

            </ul>
			</li>
			<li><a href="http://www.fifgroup.co.id/csr/">Social Responsibility </a>
			<!--<ul>
                <li><a href="#">Vision, Mission, Objective</a></li>
                <li><a href="#">Kebijakan</a></li>
                <li><a href="#">Laporan Kegiatan</a></li>        
                <li><a href="#">What They Feel</a></li>
                <li><a href="#">Let's Go Synergy</a></li>
                <li><a href="#">CSR Program</a></li>
            </ul>-->
			</li>
        </ul>
            
            <?php endif; ?>
            
    	</div>
            
    </div>
    </div>
    </nav>
