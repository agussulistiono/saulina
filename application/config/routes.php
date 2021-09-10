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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'Home';
$route['berita'] = 'Home/berita';
$route['profil'] = 'Home/profil';
$route['kontak'] = 'Home/kontak';
$route['produk'] = 'Home/produk';
$route['jasa'] = 'Home/jasa';
$route['galeri'] = 'Home/galeri';
$route['login'] = 'Home/login';
$route['fdaftar'] = 'Home/formDaftar';
$route['tagihan'] = 'User_login/tagihan';
$route['home'] = 'Admin/home';
$route['home'] = 'Admin/home';
$route['admin/kontak'] = 'Kontak/index';
$route['admin/profil'] = 'Profil/index';
$route['admin/team'] = 'Team/index';
$route['admin/user'] = 'User/index';
$route['admin/admin'] = 'Admin1/index';
$route['admin/produk'] = 'Produk/index';
$route['admin/jasa'] = 'Jasa/index';
$route['admin/foto'] = 'Foto/index';
$route['admin/slider'] = 'Slider/index';
$route['admin/laporan'] = 'Laporan/index';
$route['admin/view'] = 'Laporan/viewcetak';
$route['admin/video'] = 'Video/index';
$route['admin/sewa_produk'] = 'Sewa_Produk/index';
$route['admin/sewa_jasa'] = 'Sewa_Jasa/index';
$route['admin/pembayaran'] = 'Pembayaran/index';
$route['admin/agenda'] = 'Agenda/index';
$route['admin/biodata'] = 'Biodata/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
