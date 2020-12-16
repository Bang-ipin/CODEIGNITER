<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	
	public function index(){		
		date_default_timezone_set('Asia/Jakarta');
		$slug						= $this->uri->segment(1);
		//$data['slug']				= $this->Site_model->FilterProdukByKategori($slug);
		$query						= $this->Site_model->getConfig()->row_array();
		
		$data['situs']				= strip_tags($query['nama']);
		$data['title']				= $slug;
		
		$paging=abs($this->input->get('per_page'));
		$limit=12; 
		if(!$paging):   
		   $offset = 0;
		else:
		   $offset = $paging;
		endif;
		
		$config['page_query_string']= TRUE; 
		$config['base_url'] 		= site_url($slug); 
		$config['total_rows'] 		= $this->Site_model->count_all_produk(); 
		$config['per_page'] 		= $limit;  
		$config["uri_segment"] 		= $paging;  
		$config['num_links'] 		= 3;
		
		$config['full_tag_open'] 	= '<ul class="pagination">';
		$config['full_tag_close'] 	= '</ul>';
		$config['first_link'] 		= '&laquo;';
		$config['first_tag_open']	= '<li class="prev page">';
		$config['first_tag_close']	= '</li>';
 
		$config['last_link'] 		= '&raquo;';
		$config['last_tag_open'] 	= '<li class="next page">';
		$config['last_tag_close'] 	= '</li>';
 
		$config['next_link'] 		= '&rarr;';
		$config['next_tag_open'] 	= '<li class="next page">';
		$config['next_tag_close'] 	= '</li>';
 
		$config['prev_link'] 		= '&larr;';
		$config['prev_tag_open'] 	= '<li class="prev page">';
		$config['prev_tag_close'] 	= '</li>';
 
		$config['cur_tag_open'] 	= '<li class="current"><a href="">';
		$config['cur_tag_close'] 	= '</a></li>';
 
		$config['num_tag_open'] 	= '<li class="page">';
		$config['num_tag_close'] 	= '</li>';
 
		$this->pagination->initialize($config);
		
		$data['jmlhpage']			= $paging;
		$data['pagination']			= $this->pagination->create_links();
		$data['dd_itemshow']		= $this->Site_model->dd_itemshow();
		
		$data['produkall']			= $this->Site_model->getProdukAll($limit,$offset);
		$data['produsen']			= $this->Site_model->getProdusen();
		$data['featured']			= $this->Site_model->getFeaturedProduk();
		$data['newitem']			= $this->Site_model->getNewProduk();
		$data['populer']			= $this->Site_model->getPopulerProduk();
		$data['bestseller']			= $this->Site_model->getBestProduk();
		$data['onsale']				= $this->Site_model->getOnSale();
		$data['toprate']			= $this->Site_model->getTopRateProduct();
		$data['item']				= $this->Site_model->getAllProduk();
		$data['sidebarcategory']	= $this->Site_model->getSidebarCategoryProduk();
		$data['tags']				= $this->Site_model->produk_tags();
		$data['payment']			= $this->Site_model->getPayment();
		$data['bank']				= $this->Site_model->getBank();
		
		$data['telp']				= strip_tags($query['telepon']);
		$data['email']				= strip_tags($query['email_website']);
		$data['alamat']				= strip_tags($query['alamat']);
		$data['author'	]			= strip_tags($query['pemilik']);
		$data['deskripsi_web']		= strip_tags($query['deskripsi_situs']);
		$data['meta_deskripsi']		= strip_tags($query['meta_deskripsi']);
		$data['meta_keyword']		= strip_tags($query['meta_keyword']);
		$data['website']			= $query['website'];
		$data['tema']				= $query['tema'];
		$data['hak_cipta']			= $query['hak_cipta'];
		$data['facebook']			= $query['facebook'];
		$data['instagram']			= $query['instagram'];
		$data['twitter'	]			= $query['twitter'];
		$data['googleplus']			= $query['googleplus'];
		$data['tumblr']				= $query['tumblr'];
		$data['vimeo']				= $query['vimeo'];
		$data['youtube']			= $query['youtube'];
		$data['skype'	]			= $query['skype'];
		$data['linkedin']			= $query['linkedin'];
		$data['logo']				= $query['logo'];
		$data['favicon'	]			= $query['favicon'];
		$data['javascript_header']	= $query['javascript_header'];
        $data['javascript_footer']	= $query['javascript_footer'];
		//$data['header']				= 1;
		$data['konten']=$this->load->view('produk-all',$data,TRUE);
		$this->load->view('tema',$data);
	}
	
	public function category(){
		date_default_timezone_set('Asia/Jakarta');
		$slug						= $this->uri->segment(2);
		$data['slug']				= $this->Site_model->FilterProdukByKategori($slug);
		$query						= $this->Site_model->getConfig()->row_array();
		$kode 						= $this->Site_model->CariKodeKategori($slug); 
		
		$data['situs']				= strip_tags($query['nama']);
		$data['title']				= $data['slug']['kategori'];
		
		$paging=abs($this->input->get('per_page'));
		$limit=6; 
		if(!$paging):   
		   $offset = 0;
		else:
		   $offset = $paging;
		endif;

		$config['page_query_string']= TRUE; 
		$config['base_url'] 		= site_url('produk/'.$slug); 
		$config['total_rows'] 		= $this->Site_model->count_all_produk_kategori($kode); 
		$config['per_page'] 		= $limit;  
		$config["uri_segment"] 		= $paging;  
		$config['num_links'] 		= 3;
		
		$config['full_tag_open'] 	= '<ul class="pagination">';
		$config['full_tag_close'] 	= '</ul>';
		$config['first_link'] 		= '&laquo;';
		$config['first_tag_open']	= '<li class="prev page">';
		$config['first_tag_close']	= '</li>';
 
		$config['last_link'] 		= '&raquo;';
		$config['last_tag_open'] 	= '<li class="next page">';
		$config['last_tag_close'] 	= '</li>';
 
		$config['next_link'] 		= '&rarr;';
		$config['next_tag_open'] 	= '<li class="next page">';
		$config['next_tag_close'] 	= '</li>';
 
		$config['prev_link'] 		= '&larr;';
		$config['prev_tag_open'] 	= '<li class="prev page">';
		$config['prev_tag_close'] 	= '</li>';
 
		$config['cur_tag_open'] 	= '<li class="current"><a href="">';
		$config['cur_tag_close'] 	= '</a></li>';
 
		$config['num_tag_open'] 	= '<li class="page">';
		$config['num_tag_close'] 	= '</li>';
 
		$this->pagination->initialize($config);
		
		$data['jmlhpage']			= $paging;
		$data['pagination']			= $this->pagination->create_links();
		$data['dd_itemshow']		= $this->Site_model->dd_itemshow();
		
		$data['produkkategori']		= $this->Site_model->getProdukByKategori($kode,$limit,$offset);
		$data['produsen']			= $this->Site_model->getProdusen();
		$data['featured']			= $this->Site_model->getFeaturedProduk();
		$data['newitem']			= $this->Site_model->getNewProduk();
		$data['populer']			= $this->Site_model->getPopulerProduk();
		$data['bestseller']			= $this->Site_model->getBestProduk();
		$data['onsale']				= $this->Site_model->getOnSale();
		$data['toprate']			= $this->Site_model->getTopRateProduct();
		$data['item']				= $this->Site_model->getAllProduk();
		$data['sidebarcategory']	= $this->Site_model->getSidebarCategoryProduk();
		$data['tags']				= $this->Site_model->produk_tags();
		$data['payment']			= $this->Site_model->getPayment();
		$data['bank']				= $this->Site_model->getBank();
		
		$data['telp']				= strip_tags($query['telepon']);
		$data['email']				= strip_tags($query['email_website']);
		$data['alamat']				= strip_tags($query['alamat']);
		$data['author']				= strip_tags($query['pemilik']);
		$data['deskripsi_web']		= strip_tags($query['deskripsi_situs']);
		$data['meta_deskripsi']		= strip_tags($data['slug']['kategori']);
		$data['meta_keyword']		= strip_tags($data['slug']['kategori']);
		$data['website']			= $query['website'];
		$data['tema']				= $query['tema'];
		$data['hak_cipta']			= $query['hak_cipta'];
		$data['facebook']			= $query['facebook'];
		$data['instagram']			= $query['instagram'];
		$data['twitter'	]			= $query['twitter'];
		$data['googleplus']			= $query['googleplus'];
		$data['tumblr']				= $query['tumblr'];
		$data['vimeo']				= $query['vimeo'];
		$data['youtube']			= $query['youtube'];
		$data['skype']				= $query['skype'];
		$data['linkedin']			= $query['linkedin'];
		$data['logo']				= $query['logo'];
		$data['favicon'	]			= $query['favicon'];
		$data['javascript_header']	= $query['javascript_header'];
        $data['javascript_footer']	= $query['javascript_footer'];
		$data['fullgallery']		= $this->Landingpage_model->get_nine_gallery();
		$data['testimoni']			= $this->Landingpage_model->get_six_testimoni();
		$data['blogger']			= $this->Landingpage_model->get_three_lastblog();
		$data['popblogger']			= $this->Landingpage_model->get_pop_lastblog();
		//$data['header']				= 1;
		$data['konten']=$this->load->view('category-grid',$data,TRUE);
		$this->load->view('tema',$data);
	}
	
	public function detail(){		
		date_default_timezone_set('Asia/Jakarta');
		$slug						= $this->uri->segment(3);
		$query						= $this->Site_model->getConfig()->row_array();
		//$lokasi					= $this->Site_model->getLokasi()->result_array();
		
		$data['slug']				= $this->Site_model->getAllProduk($slug);
		
		$data['produsen']			= $this->Site_model->getProdusen();
		$data['featured']			= $this->Site_model->getFeaturedProduk();
		$data['newitem']			= $this->Site_model->getNewProduk();
		$data['populer']			= $this->Site_model->getPopulerProduk();
		$data['bestseller']			= $this->Site_model->getBestProduk();
		$data['onsale']				= $this->Site_model->getOnSale();
		$data['toprate']			= $this->Site_model->getTopRateProduct();
		$data['item']				= $this->Site_model->getAllProduk();
		$data['sidebarcategory']	= $this->Site_model->getSidebarCategoryProduk();
		$data['tags']				= $this->Site_model->produk_tags();
		$data['payment']			= $this->Site_model->getPayment();
		$data['bank']				= $this->Site_model->getBank();
		$data['tema']				= $query['tema'];
		$data['detail']				= $this->Site_model->getAllProduk($slug);
		$data['komentar']			= $this->Site_model->getKomentarId($data['slug']['id']);
		$data['jumlahkomentar']		= $this->Site_model->count_all_komentar($data['slug']['id']);
		
		$data['situs']				= strip_tags($query['nama']);
		$data['title']				= ucwords($data['slug']['produk']);
		$data['deskripsi_web']		= strip_tags($query['deskripsi_situs']);
		$data['telp']				= strip_tags($query['telepon']);
		$data['email']				= strip_tags($query['email_website']);
		$data['alamat']				= strip_tags($query['alamat']);
		$data['author'	]			= strip_tags($query['pemilik']);
		$data['meta_deskripsi']		= strip_tags($data['slug']['meta_deskripsi']);
		$data['meta_keyword']		= strip_tags($data['slug']['meta_keyword']);
		$data['website']			= $query['website'];
		$data['tema']				= $query['tema'];
		$data['hak_cipta']			= $query['hak_cipta'];
		$data['facebook']			= $query['facebook'];
		$data['instagram']			= $query['instagram'];
		$data['twitter'	]			= $query['twitter'];
		$data['googleplus']			= $query['googleplus'];
		$data['tumblr']				= $query['tumblr'];
		$data['vimeo']				= $query['vimeo'];
		$data['youtube']			= $query['youtube'];
		$data['skype'	]			= $query['skype'];
		$data['linkedin']			= $query['linkedin'];
		$data['logo']				= $query['logo'];
		$data['favicon'	]			= $query['favicon'];
		$data['javascript_header']	= $query['javascript_header'];
        $data['javascript_footer']	= $query['javascript_footer'];
		$data['fullgallery']		= $this->Landingpage_model->get_nine_gallery();
		$data['testimoni']			= $this->Landingpage_model->get_six_testimoni();
		$data['blogger']			= $this->Landingpage_model->get_three_lastblog();
		$data['popblogger']			= $this->Landingpage_model->get_pop_lastblog();
		$data['css']                = $this->load->view('css/css',$data,TRUE);
		$data['jsproduk']           = $this->load->view('js/js-produk',$data,TRUE);
		$data['konten']             =$this->load->view('single-product',$data,TRUE);
		$this->load->view('tema',$data);
	}
	public function tag(){
		date_default_timezone_set('Asia/Jakarta');
		$slug_id					= $this->uri->segment(2);
		$slug						= $this->Site_model->CariTag($slug_id);
		$query						= $this->Site_model->getConfig()->row_array();
		$data['slug']	 			= $this->Site_model->FilterProdukByTags($slug);
		$page						= $this->Site_model->getMenu("where menu_seo='$slug_id' AND status=1");
		$cariTitle					= $this->Site_model->CariTitleTag($slug_id);
		$data['situs']				= strip_tags($query['nama']);
		$template 					= 'tag'; 
		$data['title']				= $cariTitle;
		
		$paging=$this->input->get('per_page');
		$limit=12; 
		if(!$paging):   
		   $offset = 0;
		else:
		   $offset = $paging;
		endif;
		$config['page_query_string']= TRUE; 
		$config['base_url'] 		= site_url('tag/'.$slug_id); 
		$config['total_rows'] 		= $this->Site_model->count_produk_by_tag($slug); 
		$config['per_page'] 		= $limit;  
		$config["uri_segment"] 		= $paging;  
		
		$config['full_tag_open'] 	= '<ul class="pagination">';
		$config['full_tag_close'] 	= '</ul>';
		$config['first_link'] 		= '&laquo;';
		$config['first_tag_open']	= '<li class="prev page">';
		$config['first_tag_close']	= '</li>';
 
		$config['last_link'] 		= '&raquo;';
		$config['last_tag_open'] 	= '<li class="next page">';
		$config['last_tag_close'] 	= '</li>';
 
		$config['next_link'] 		= '&rarr;';
		$config['next_tag_open'] 	= '<li class="next page">';
		$config['next_tag_close'] 	= '</li>';
 
		$config['prev_link'] 		= '&larr;';
		$config['prev_tag_open'] 	= '<li class="prev page">';
		$config['prev_tag_close'] 	= '</li>';
 
		$config['cur_tag_open'] 	= '<li class="current"><a href="">';
		$config['cur_tag_close'] 	= '</a></li>';
 
		$config['num_tag_open'] 	= '<li class="page">';
		$config['num_tag_close'] 	= '</li>';
 
		$this->pagination->initialize($config);
		
		$data['jmlhpage']			= $paging;
		$data['dataproduk'] 		= $this->Site_model->get_produk_by_tag($slug,$limit,$offset);
		$data['pagination']			= $this->pagination->create_links();
		$data['jumlahkomentar']		= $this->Site_model->count_all_komentar_produk($slug);
		
			$data['produsen']			= $this->Site_model->getProdusen();
		$data['featured']			= $this->Site_model->getFeaturedProduk();
		$data['newitem']			= $this->Site_model->getNewProduk();
		$data['populer']			= $this->Site_model->getPopulerProduk();
		$data['bestseller']			= $this->Site_model->getBestProduk();
		$data['onsale']				= $this->Site_model->getOnSale();
		$data['toprate']			= $this->Site_model->getTopRateProduct();
		$data['item']				= $this->Site_model->getAllProduk();
		$data['sidebarcategory']	= $this->Site_model->getSidebarCategoryProduk();
		$data['tags']				= $this->Site_model->produk_tags();
		$data['payment']			= $this->Site_model->getPayment();
		$data['bank']				= $this->Site_model->getBank();
		
		$data['detail']				= $this->Site_model->getAllProduk($slug);
		$data['komentar']			= $this->Site_model->getKomentarId($data['slug']['id']);
		$data['jumlahkomentar']		= $this->Site_model->count_all_komentar($data['slug']['id']);
		
		/*---------------CONFIG---------------*/
		$data['deskripsi_web']		= strip_tags($query['deskripsi_situs']);
		$data['meta_deskripsi']		= strip_tags($query['meta_deskripsi']);
		$data['meta_keyword']		= strip_tags($query['meta_keyword']);
		$data['telp'	]			= strip_tags($query['telepon']);
		$data['email']				= strip_tags($query['email_website']);
		$data['alamat']				= strip_tags($query['alamat']);
		$data['author'	]			= strip_tags($query['pemilik']);
		$data['website']			= $query['website'];
		$data['tema']				= $query['tema'];
		$data['logo']				= $query['logo'];
		$data['favicon']			= $query['favicon'];
		$data['hak_cipta']			= $query['hak_cipta'];
		$data['facebook']			= $query['facebook'];
		$data['instagram']			= $query['instagram'];
		$data['twitter'	]			= $query['twitter'];
		$data['googleplus']			= $query['googleplus'];
		$data['tumblr']				= $query['tumblr'];
		$data['vimeo']				= $query['vimeo'];
		$data['youtube']			= $query['youtube'];
		$data['skype']				= $query['skype'];
		$data['linkedin']			= $query['linkedin'];
		$data['javascript_header']	= $query['javascript_header'];
        $data['javascript_footer']	= $query['javascript_footer'];
		
		$data['konten']=$this->load->view('page/'.$template,$data,TRUE);
		$this->load->view('tema',$data);
	}
	
}
	