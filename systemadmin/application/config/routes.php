<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller']   = 'sketsanet';
//$route['default_controller']   = 'home';
$route['404_override']         = 'sketsanet/page_404';
$route['translate_uri_dashes'] = FALSE;

/*
| sketsanet Route
*/
$route['login'] = 'systemadmin/login';
$route['table/(:any)']           = 'sketsanet/table/$1';
$route['login']                  = 'sketsanet/login';
$route['activate/(:num)/(:any)'] = 'sketsanet/activate/$1/$2';
$route['logout']                 = 'sketsanet/logout';
$route['register']               = 'sketsanet/register';
$route['forgot-password']        = 'sketsanet/forgot_password';
$route['reset-password/(:any)']  = 'sketsanet/reset_password/$1';



//pages
$route['pages/data-perusahaan']            = 'pages/view/17/data-perusahaan';
$route['pages/profil-perusahaan']            = 'pages/view/2/data-perusahaan';
$route['pages/struktur-organisasi']            = 'pages/view/3/data-perusahaan';
$route['pages/struktur-kepemilikan']            = 'pages/view/4/data-perusahaan';
$route['pages/struktur-grup']            = 'pages/view/5/data-perusahaan';
$route['pages/susunan-direktur']            = 'pages/view/6/data-perusahaan';
$route['pages/profil-komite']            = 'pages/view/7/data-perusahaan';
$route['pages/susunan-komisaris']            = 'pages/view/8/data-perusahaan';
$route['pages/profil-sekretaris-perusahaan']            = 'pages/view/9/data-perusahaan';
$route['pages/profil-profesi-dan-lembaga-penunjang']            = 'pages/view/10/data-perusahaan';
$route['pages/kebijakan-privasi']            = 'pages/view/11/data-perusahaan';


$route['fifgroup/pages/informasi-rups']            = 'pages/view/12/data-perusahaan';
$route['fifgroup/pages/informasi-saham']            = 'pages/view/13/data-perusahaan';
$route['fifgroup/pages/informasi-obligasi-dan-atau-sukuk']            = 'pages/view/14/data-perusahaan';
$route['fifgroup/pages/informasi-dividen']            = 'pages/view/15/data-perusahaan';
$route['fifgroup/pages/informasi-lain']            = 'pages/view/16/data-perusahaan';

$route['fifgroup/pages/dokumen-prospektus']		= 'pages/view/32/data-perusahaan';
$route['fifgroup/pages/informasi-keuangan']		= 'pages/view/40/data-perusahaan';
$route['fifgroup/pages/laporan-keuangan-tahunan']		= 'pages/view/38/data-perusahaan';
$route['fifgroup/pages/laporan-keuangan-tengah-tahunan']		= 'pages/view/39/data-perusahaan';




//en

$route['pages/company-profile']            = 'pages/view/1/company-profile';
$route['pages/data-perusahaan-en']            = 'pages/view/25/data-perusahaan';
$route['pages/board-of-director']            = 'pages/view/27/data-perusahaan';
$route['pages/board-of-commisioner']            = 'pages/view/28/data-perusahaan';



//Pages Amitra
$route['amitra/pages/about-amitra']            = 'pages/viewamitra/1/data-perusahaan';
$route['amitra/pages/product-knowledge']            = 'pages/viewamitra/2/data-perusahaan';
$route['amitra/pages/personal-corporate']            = 'pages/viewamitra/3/data-perusahaan';
$route['amitra/pages/partner']            = 'pages/viewamitra/4/data-perusahaan';


//pages FIFASTRA
$route['fifastra/pages/product-knowledge']            = 'pages/viewfifastra/1/data-perusahaan';
$route['fifastra/pages/personal-and-corporate']            = 'pages/viewfifastra/2/data-perusahaan';
$route['fifastra/pages/platform-info']            = 'pages/viewfifastra/3/data-perusahaan';
$route['fifastra/pages/brand-partner']            = 'pages/viewfifastra/4/data-perusahaan';




//pages FIFASTRA
$route['spektra/pages/product-knowledge-spektra']            = 'pages/viewspektra/1/data-perusahaan';
$route['spektra/pages/personal-and-corporate-spektra']            = 'pages/viewspektra/2/data-perusahaan';
$route['spektra/pages/platform-info-spektra']            = 'pages/viewspektra/3/data-perusahaan';
$route['spektra/pages/product-focus']            = 'pages/viewspektra/5/data-perusahaan';
$route['spektra/pages/store-partner']            = 'pages/viewspektra/4/data-perusahaan';
$route['spektra/pages/brand-partner-spektra']            = 'pages/viewspektra/6/data-perusahaan';


$route['anggarandasar'] = 'annual';