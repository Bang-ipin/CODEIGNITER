<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['404_override']			 								= '';
$route['translate_uri_dashes'] 									= FALSE;
$route['default_controller']									= 'welcome';

$route['administrator']											= 'login';
$route['administrator/logout']									= 'login/logout';
$route['administrator/home']									= 'home';

$route['administrator/landingpage-home']						= 'landingpage/landingpage/home';
$route['administrator/landingpage-features']					= 'landingpage/landingpage/features';
$route['administrator/landingpage-app']							= 'landingpage/landingpage/app';
$route['administrator/landingpage-video']						= 'landingpage/landingpage/video';
$route['administrator/landingpage-team']						= 'landingpage/landingpage/team';
$route['administrator/landingpage-pricing']						= 'landingpage/landingpage/pricing';
$route['administrator/landingpage-contact']						= 'landingpage/landingpage/contact';

$route['administrator/landingpage-gallery']						= 'gallery/gallery';
$route['administrator/landingpage-gallery/add']					= 'gallery/gallery/add';
$route['administrator/landingpage-gallery/edit/(:any)']			= 'gallery/gallery/edit/$1';
$route['administrator/landingpage-gallery/hapus/(:any)']		= 'gallery/gallery/hapus/$1';

$route['administrator/landingpage-testimoni']					= 'testimoni/testimoni';
$route['administrator/landingpage-testimoni/add']				= 'testimoni/testimoni/add';
$route['administrator/landingpage-testimoni/edit/(:any)']		= 'testimoni/testimoni/edit/$1';
$route['administrator/landingpage-testimoni/hapus/(:any)']		= 'testimoni/testimoni/hapus/$1';

$route['administrator/config']									= 'settings/config';
$route['administrator/config/logo']								= 'settings/config/logo';
$route['administrator/backupdb']								= 'settings/config/backup_db';

$route['administrator/maps']									= 'lokasi/maps';

$route['administrator/user']									= 'user/user';
$route['administrator/user/add']								= 'user/user/add';
$route['administrator/user/edit/(:any)']						= 'user/user/edit/$1';
$route['administrator/user/hapus/(:any)']						= 'user/user/hapus/$1';

$route['administrator/level']									= 'level/levels';
$route['administrator/level/add']								= 'level/levels/add';
$route['administrator/level/edit/(:any)']						= 'level/levels/edit/$1';
$route['administrator/level/hapus/(:any)']						= 'level/levels/hapus/$1';

$route['administrator/inbox']									= 'inbox/inbox';
$route['administrator/inbox/hapus/(:any)']						= 'inbox/inbox/hapus/$1';
$route['administrator/inbox/trash/(:any)/(:any)']				= 'inbox/inbox/move_to_trash/$1/$2';

$route['administrator/profile']									= 'inbox';

$route['(blog|artikel|article|news|berita)']					= 'blog/index/$1';
$route['(blog|artikel|article|news|berita)/(:any)']				= 'blog/category/$2';
$route['tag/(:any)']											= 'produk/tag/$2';
$route['(blog|artikel|article|news|berita)/(:any)/(:any)']		= 'blog/detail/$3';

$route['search']												= 'search/product';
$route['cari']													= 'search/blog';

$route['(galeri|gallery|media)']								= 'galeri';
$route['(galeri|gallery|media)/(:any)']							= 'galeri';

$route['(about|about_us|about-us|tentang-kami)']				= 'about';
$route['(kontak|kontak-kami|contact_us|contact-us|contact)']	= 'contact';

$route['sitemap\.xml']											= 'sitemap';

$route['(:any)']												= 'page/index/$1';
