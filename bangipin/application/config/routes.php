<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['translate_uri_dashes'] 								= FALSE;
$route['default_controller']								= 'welcome';

$route['appweb']											= 'login';
$route['appweb/logout']										= 'login/logout';
$route['appweb/home']										= 'home';

$route['appweb/visitor']									= 'agents/agents';

$route['appweb/menu']										= 'menu/menu';
$route['appweb/menu/primary']								= 'menu/menu/primary';
$route['appweb/menu/sidebar']								= 'menu/menu/sidebar';
$route['appweb/menu/footer']								= 'menu/menu/footer';
$route['appweb/menu/simpan']								= 'menu/menu/simpan';

$route['appweb/ads']										= 'ads/advertising';
$route['appweb/ads/top']									= 'ads/advertising/top';
$route['appweb/ads/bottom']									= 'ads/advertising/bottom';

$route['appweb/themes']										= 'tema/themes';
$route['appweb/themes/add']									= 'tema/themes/add';
$route['appweb/themes/edit/(:any)']							= 'tema/themes/edit/$1';
$route['appweb/themes/hapus']						        = 'tema/themes/hapus';
$route['appweb/themes/background']							= 'tema/themes/background';

$route['appweb/sliders']									= 'slider/sliders';
$route['appweb/sliders/add']								= 'slider/sliders/add';
$route['appweb/sliders/edit/(:any)']						= 'slider/sliders/edit/$1';
$route['appweb/sliders/hapus']      						= 'slider/sliders/hapus';
$route['appweb/sliders/status/(:any)/(:any)']				= 'slider/sliders/status/$1/$2';

$route['appweb/categories']									= 'categories/categories';
$route['appweb/categories/add']								= 'categories/categories/add';
$route['appweb/categories/edit/(:any)']						= 'categories/categories/edit/$1';
$route['appweb/categories/hapus']       					= 'categories/categories/hapus';

$route['appweb/tags']										= 'tag/tags';
$route['appweb/tags/add']									= 'tag/tags/add';
$route['appweb/tags/edit/(:any)']							= 'tag/tags/edit/$1';
$route['appweb/tags/hapus']	        						= 'tag/tags/hapus';

$route['appweb/pages']										= 'pages/pages';
$route['appweb/pages/add']									= 'pages/pages/add';
$route['appweb/pages/edit/(:any)']							= 'pages/pages/edit/$1';
$route['appweb/pages/hapus']	    						= 'pages/pages/hapus';

$route['appweb/linkabout']									= 'abouts/abouts';

$route['appweb/linkfaq']									= 'faqs/faqs';
$route['appweb/faqs/add']									= 'faqs/faqs/add';
$route['appweb/faqs/edit/(:any)']							= 'faqs/faqs/edit/$1';
$route['appweb/faqs/hapus']     							= 'faqs/faqs/hapus';

$route['appweb/articles']									= 'blogs/articles';
$route['appweb/articles/add']								= 'blogs/articles/add';
$route['appweb/articles/edit/(:any)']						= 'blogs/articles/edit/$1';
$route['appweb/articles/hapus']						        = 'blogs/articles/hapus';

$route['appweb/news']										= 'news/news';
$route['appweb/news/add']									= 'news/news/add';
$route['appweb/news/edit/(:any)']							= 'news/news/edit/$1';
$route['appweb/news/hapus']						       		= 'news/news/hapus';

$route['appweb/comments']									= 'comments/comments';
$route['appweb/comments/hapus/(:any)']						= 'comments/comments/hapus/$1';
$route['appweb/comments/trash/(:any)/(:any)']				= 'comments/comments/move_to_trash/$1/$2';
$route['appweb/comments/approve/(:any)/(:any)']				= 'comments/comments/approve/$1/$2';
$route['appweb/comments/approvecomments/(:any)/(:any)']		= 'comments/comments/approvecomments/$1/$2';
$route['appweb/comments/reject/(:any)/(:any)']				= 'comments/comments/move_trash/$1/2';

$route['appweb/downloads']									= 'downloads/downloads';
$route['appweb/downloads/add']								= 'downloads/downloads/add';
$route['appweb/downloads/edit/(:any)']						= 'downloads/downloads/edit/$1';
$route['appweb/downloads/hapus']    						= 'downloads/downloads/hapus';

$route['appweb/config']										= 'settings/config';
$route['appweb/config/logo']								= 'settings/config/logo';
$route['appweb/backupdb']									= 'settings/config/backup_db';

$route['appweb/maps']										= 'lokasi/maps';
$route['appweb/fanpage']									= 'fb/fbpage';

$route['appweb/user']										= 'user/user';
$route['appweb/user/add']									= 'user/user/add';
$route['appweb/user/edit/(:any)']							= 'user/user/edit/$1';
$route['appweb/user/hapus']							        = 'user/user/hapus';
	
$route['appweb/level']										= 'level/levels';
$route['appweb/level/add']									= 'level/levels/add';
$route['appweb/level/edit/(:any)']							= 'level/levels/edit/$1';
$route['appweb/level/hapus']    							= 'level/levels/hapus';

$route['appweb/linkhome']							        = 'landingpage/landingpage/home';
$route['appweb/linkfeatures']						        = 'landingpage/landingpage/features';
$route['appweb/linkapp']							        = 'landingpage/landingpage/app';
$route['appweb/linkvideo']							        = 'landingpage/landingpage/video';

$route['appweb/gallery']									= 'gallery/gallery';
$route['appweb/gallery/add']								= 'gallery/gallery/add';
$route['appweb/gallery/edit/(:any)']						= 'gallery/gallery/edit/$1';
$route['appweb/gallery/hapus']	        					= 'gallery/gallery/hapus';

$route['appweb/testimoni']									= 'testimoni/testimoni';
$route['appweb/testimoni/add']								= 'testimoni/testimoni/add';
$route['appweb/testimoni/edit/(:any)']						= 'testimoni/testimoni/edit/$1';
$route['appweb/testimoni/hapus']    						= 'testimoni/testimoni/hapus';

$route['appweb/modul']										= 'modul/modul';
$route['appweb/modul/add']									= 'modul/modul/add';
$route['appweb/modul/edit/(:any)']							= 'modul/modul/edit/$1';
$route['appweb/modul/hapus']    							= 'modul/modul/hapus';

$route['appweb/inbox']										= 'inbox/inbox';
$route['appweb/inbox/hapus/(:any)']							= 'inbox/inbox/hapus/$1';
$route['appweb/inbox/trash/(:any)/(:any)']					= 'inbox/inbox/move_to_trash/$1/$2';

$route['appweb/profile']									= 'inbox';

$route['appweb/category-jobs']								= 'jobs_kategori/category_jobs';
$route['appweb/category-jobs/add']							= 'jobs_kategori/category_jobs/add';
$route['appweb/category-jobs/edit/(:any)']					= 'jobs_kategori/category_jobs/edit/$1';
$route['appweb/category-jobs/hapus']						= 'jobs_kategori/category_jobs/hapus';
$route['appweb/category-jobs/status/(:any)/(:any)']			= 'jobs_kategori/category_jobs/status/$1/$2';

$route['appweb/jobs']										= 'jobs_listing/jobs';
$route['appweb/jobs/add']									= 'jobs_listing/jobs/add';
$route['appweb/jobs/edit/(:any)']							= 'jobs_listing/jobs/edit/$1';
$route['appweb/jobs/hapus']									= 'jobs_listing/jobs/hapus';

$route['appweb/jobs-level']									= 'jobs_level/jobs_level';
$route['appweb/jobs-level/add']								= 'jobs_level/jobs_level/add';
$route['appweb/jobs-level/edit/(:any)']						= 'jobs_level/jobs_level/edit/$1';
$route['appweb/jobs-level/hapus']	        				= 'jobs_level/jobs_level/hapus';

$route['(semua-artikel|artikel|article|news|berita)']		= 'blog/all';
$route['blog']                      			        	= 'blog/index/$1';
$route['blog/(:any)']		                            	= 'blog/category/$2';
$route['(topik|tag)/(:any)']								= 'blog/tag/$2';
$route['(blog|artikel|article|news|berita)/(:any)/(:any)']	= 'blog/detail/$3';

$route['(download|unduh)']									= 'download';

$route['cari']												= 'search/blog';

$route['(galeri|gallery|media)']							= 'galeri';
$route['(galeri|gallery|media)/(:any)']						= 'galeri';

$route['(faq|f-a-q|frequently-asked-questions|faqs)']		= 'faq';
$route['(profil|about|about_us|about-us|tentang-kami)']			= 'profil';
$route['(kontak|kontak-kami|contact_us|contact-us|contact)']= 'kontak';

$route['admin/comments/trash/(:any)/(:any)']				= 'admin/comments/move_to_trash/$1/$2';
$route['admin/comments/reject/(:any)/(:any)']				= 'admin/comments/move_trash/$1/$2';
$route['sitemap\.xml']										= 'sitemap';

$route['404_override']			 							= 'page';
$route['(:any)']											= 'page/index/$1';
