<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['translate_uri_dashes'] 							= FALSE;
$route['default_controller']							= 'welcome';

$route['appweb']										= 'login';
$route['appweb/logout']									= 'login/logout';
$route['appweb/home']									= 'home';

$route['appweb/category-product']						= 'shop_kategori/category_product';
$route['appweb/category-product/add']					= 'shop_kategori/category_product/add';
$route['appweb/category-product/edit/(:any)']			= 'shop_kategori/category_product/edit/$1';
$route['appweb/category-product/hapus/(:any)']			= 'shop_kategori/category_product/hapus/$1';
$route['appweb/category-product/status/(:any)/(:any)']	= 'shop_kategori/category_product/status/$1/$2';

$route['appweb/products']								= 'shop_produk/products';
$route['appweb/products/add']							= 'shop_produk/products/add';
$route['appweb/products/edit/(:any)']					= 'shop_produk/products/edit/$1';
$route['appweb/products/stok/(:any)']					= 'shop_produk/products/tambahstok/$1';
$route['appweb/products/hapus/(:any)']					= 'shop_produk/products/hapus/$1';

$route['appweb/orders']									= 'shop_order/orders';
$route['appweb/orders/add']								= 'shop_order/orders/add';
$route['appweb/orders/edit/(:any)']						= 'shop_order/orders/edit/$1';
$route['appweb/orders/hapus/(:any)']					= 'shop_order/orders/hapus/$1';
$route['appweb/orders/proccess/(:any)/(:any)']			= 'shop_order/orders/proccess/$1/$2';
$route['appweb/orders/cancel/(:any)/(:any)']			= 'shop_order/orders/proccess/$1/$2';

$route['appweb/atributs']								= 'shop_atribut/atributs';
$route['appweb/atributs/add']							= 'shop_atribut/atributs/add';
$route['appweb/atributs/edit/(:any)']					= 'shop_atribut/atributs/edit/$1';
$route['appweb/atributs/hapus/(:any)']					= 'shop_atribut/atributs/hapus/$1';
$route['appweb/atributs/status/(:any)/(:any)']			= 'shop_atribut/atributs/status/$1/$2';

$route['appweb/supplier']								= 'shop_supplier/supplier';
$route['appweb/supplier/add']							= 'shop_supplier/supplier/add';
$route['appweb/supplier/edit/(:any)']					= 'shop_supplier/supplier/edit/$1';
$route['appweb/supplier/hapus/(:any)']					= 'shop_supplier/supplier/hapus/$1';

$route['appweb/review-product']							= 'shop_ulasan/ulasan_produk';
$route['appweb/review-product/hapus/(:any)']			= 'shop_ulasan/ulasan_produk/hapus/$1';
$route['appweb/review-product/trash/(:any)/(:any)']		= 'shop_ulasan/ulasan_produk/move_to_trash/$1/$2';

$route['appweb/menu']									= 'menu/menu';
$route['appweb/menu/primary']							= 'menu/menu/primary';
$route['appweb/menu/sidebar']							= 'menu/menu/sidebar';
$route['appweb/menu/footer']							= 'menu/menu/footer';
$route['appweb/menu/simpan']							= 'menu/menu/simpan';

$route['appweb/ads']									= 'ads/advertising';
$route['appweb/ads/top']								= 'ads/advertising/top';
$route['appweb/ads/bottom']								= 'ads/advertising/bottom';

$route['appweb/themes']									= 'tema/themes';
$route['appweb/themes/add']								= 'tema/themes/add';
$route['appweb/themes/edit/(:any)']						= 'tema/themes/edit/$1';
$route['appweb/themes/hapus/(:any)']					= 'tema/themes/hapus/$1';
$route['appweb/themes/background']						= 'tema/themes/background';

$route['appweb/sliders']								= 'slider/sliders';
$route['appweb/sliders/add']							= 'slider/sliders/add';
$route['appweb/sliders/edit/(:any)']					= 'slider/sliders/edit/$1';
$route['appweb/sliders/hapus/(:any)']					= 'slider/sliders/hapus/$1';
$route['appweb/sliders/status/(:any)/(:any)']			= 'slider/sliders/status/$1/$2';

$route['appweb/payments']								= 'shop_payment/payments';
$route['appweb/payments/add']							= 'shop_payment/payments/add';
$route['appweb/payments/edit/(:any)']					= 'shop_payment/payments/edit/$1';
$route['appweb/payments/hapus/(:any)']					= 'shop_payment/payments/hapus/$1';
$route['appweb/payments/status/(:any)/(:any)']			= 'shop_payment/payments/status/$1/$2';

$route['appweb/members']								= 'members/members';
$route['appweb/members/detail/(:any)']					= 'members/members/detail/$1';
$route['appweb/members/hapus/(:any)']					= 'members/members/hapus/$1';
$route['appweb/members/status/(:any)/(:any)']			= 'members/members/status/$1/$2';

$route['appweb/shippings']								= 'shop_shipping/shippings';
$route['appweb/shippings/add']							= 'shop_shipping/shippings/add';
$route['appweb/shippings/edit/(:any)']					= 'shop_shipping/shippings/edit/$1';
$route['appweb/shippings/hapus/(:any)']					= 'shop_shipping/shippings/hapus/$1';
$route['appweb/shippings/status/(:any)/(:any)']			= 'shop_shipping/shippings/status/$1/$2';

$route['appweb/categories']								= 'kategori/categories';
$route['appweb/categories/add']							= 'kategori/categories/add';
$route['appweb/categories/edit/(:any)']					= 'kategori/categories/edit/$1';
$route['appweb/categories/hapus/(:any)']				= 'kategori/categories/hapus/$1';

$route['appweb/tags']									= 'tag/tags';
$route['appweb/tags/add']								= 'tag/tags/add';
$route['appweb/tags/edit/(:any)']						= 'tag/tags/edit/$1';
$route['appweb/tags/hapus/(:any)']						= 'tag/tags/hapus/$1';

$route['appweb/pages']									= 'pages/pages';
$route['appweb/pages/add']								= 'pages/pages/add';
$route['appweb/pages/edit/(:any)']						= 'pages/pages/edit/$1';
$route['appweb/pages/hapus/(:any)']						= 'pages/pages/hapus/$1';

$route['appweb/linkabout']								= 'abouts/abouts';

$route['appweb/linkfaq']								= 'faqs/faqs';
$route['appweb/faqs/add']								= 'faqs/faqs/add';
$route['appweb/faqs/edit/(:any)']						= 'faqs/faqs/edit/$1';
$route['appweb/faqs/hapus/(:any)']						= 'faqs/faqs/hapus/$1';

$route['appweb/articles']								= 'blogs/articles';
$route['appweb/articles/add']							= 'blogs/articles/add';
$route['appweb/articles/edit/(:any)']					= 'blogs/articles/edit/$1';
$route['appweb/articles/hapus/(:any)']					= 'blogs/articles/hapus/$1';

$route['appweb/comments']								= 'comments/comments';
$route['appweb/comments/hapus/(:any)']					= 'comments/comments/hapus/$1';
$route['appweb/comments/trash/(:any)/(:any)']			= 'comments/comments/move_to_trash/$1/$2';
$route['appweb/comments/approve/(:any)/(:any)']			= 'comments/comments/approve/$1/$2';
$route['appweb/comments/approvecomments/(:any)/(:any)']	= 'comments/comments/approvecomments/$1/$2';
$route['appweb/comments/reject/(:any)/(:any)']			= 'comments/comments/move_trash/$1/2';

$route['appweb/downloads']								= 'downloads/downloads';
$route['appweb/downloads/add']							= 'downloads/downloads/add';
$route['appweb/downloads/edit/(:any)']					= 'downloads/downloads/edit/$1';
$route['appweb/downloads/hapus/(:any)']					= 'downloads/downloads/hapus/$1';

$route['appweb/config']									= 'settings/config';
$route['appweb/config/logo']							= 'settings/config/logo';
$route['appweb/backupdb']								= 'settings/config/backup_db';

$route['appweb/maps']									= 'lokasi/maps';
$route['appweb/fanpage']								= 'fb/fbpage';

$route['appweb/user']									= 'user/user';
$route['appweb/user/add']								= 'user/user/add';
$route['appweb/user/edit/(:any)']						= 'user/user/edit/$1';
$route['appweb/user/hapus/(:any)']						= 'user/user/hapus/$1';

$route['appweb/level']									= 'level/levels';
$route['appweb/level/add']								= 'level/levels/add';
$route['appweb/level/edit/(:any)']						= 'level/levels/edit/$1';
$route['appweb/level/hapus/(:any)']						= 'level/levels/hapus/$1';

$route['appweb/landingpage-home']						= 'landingpage/landingpage/home';
$route['appweb/landingpage-features']					= 'landingpage/landingpage/features';
$route['appweb/landingpage-app']						= 'landingpage/landingpage/app';
$route['appweb/landingpage-video']						= 'landingpage/landingpage/video';
$route['appweb/landingpage-team']						= 'landingpage/landingpage/team';
$route['appweb/landingpage-pricing']					= 'landingpage/landingpage/pricing';
$route['appweb/landingpage-contact']					= 'landingpage/landingpage/contact';

$route['appweb/gallery']								= 'gallery/gallery';
$route['appweb/gallery/add']							= 'gallery/gallery/add';
$route['appweb/gallery/edit/(:any)']					= 'gallery/gallery/edit/$1';
$route['appweb/gallery/hapus/(:any)']					= 'gallery/gallery/hapus/$1';

$route['appweb/testimoni']								= 'testimoni/testimoni';
$route['appweb/testimoni/add']							= 'testimoni/testimoni/add';
$route['appweb/testimoni/edit/(:any)']					= 'testimoni/testimoni/edit/$1';
$route['appweb/testimoni/hapus/(:any)']					= 'testimoni/testimoni/hapus/$1';

$route['appweb/inbox']									= 'inbox/inbox';
$route['appweb/inbox/hapus/(:any)']						= 'inbox/inbox/hapus/$1';
$route['appweb/inbox/trash/(:any)/(:any)']				= 'inbox/inbox/move_to_trash/$1/$2';

$route['appweb/profile']								= 'inbox';

$route['member/login']									= 'member/login';
$route['member/account/profile/(:any)']					= 'account/profile';

$route['(blog|artikel|article|news|berita)']			= 'blog/index/$1';
$route['(blog|artikel|article|news|berita)/(:any)']		= 'blog/category/$2';
$route['tag/(:any)']									= 'produk/tag/$2';
$route['(blog|artikel|article|news|berita)/(:any)/(:any)']		= 'blog/detail/$3';

$route['(download|unduh)']										= 'download/index/$1';

$route['search']												= 'search/product';
$route['cari']													= 'search/blog';

$route['(produk|shop|barang)']									= 'produk/index/$1';
$route['(produk|shop|barang)/(:any)']							= 'produk/category/$2';
$route['(produk|shop|barang)/(:any)/(:any)']					= 'produk/detail/$3';

$route['(galeri|gallery|media)']								= 'galeri';
$route['(galeri|gallery|media)/(:any)']							= 'galeri';

$route['(faq|f-a-q|frequently-asked-questions|faqs)']			= 'faq';
$route['(about|about_us|about-us|tentang-kami)']				= 'about';
$route['(kontak|kontak-kami|contact_us|contact-us|contact)']	= 'contact';
$route['(lacak-pesanan|tracking|track-order)']					= 'tracking';

$route['(cart|shopping-cart|keranjang|keranjang-belanja)']		= 'cart/index/$1';
$route['checkout']												= 'checkout/index/$1';
$route['admin/comments/trash/(:any)/(:any)']					= 'admin/comments/move_to_trash/$1/$2';
$route['admin/comments/reject/(:any)/(:any)']					= 'admin/comments/move_trash/$1/$2';
$route['sitemap\.xml']											= 'sitemap';

$route['404_override']			 								= 'page';
$route['(:any)']												= 'page/index/$1';
