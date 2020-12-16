<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function index(){
		date_default_timezone_set('Asia/Jakarta');
		$slug						= $this->uri->segment(1);
		$query						= $this->Site_model->getConfig()->row_array();
		
		$data['situs']				= strip_tags($query['nama']);
		$template 					= 'blog'; 
		$data['title']				= $slug;
		
		$paging=$this->input->get('per_page');
		$limit=4; 
		if(!$paging):   
		   $offset = 0;
		else:
		   $offset = $paging;
		endif;
		$config['page_query_string']= TRUE; 
		$config['base_url'] 		= site_url($template); 
		$config['total_rows'] 		= $this->Site_model->count_all_blog(); 
		$config['per_page'] 		= $limit;  
		$config["uri_segment"] 		= $paging;  
		
		$config['full_tag_open'] 	= '<ul class="pagination blog-pagination">';
		$config['full_tag_close'] 	= '</ul>';
		$config['first_link'] 		= '&laquo; First';
		$config['first_tag_open'] 	= '<li class="page-link">';
		$config['first_tag_close'] 	= '</li>';

		$config['last_link'] 		= 'Last &raquo;';
		$config['last_tag_open']	= '<li class="page-link">';
		$config['last_tag_close'] 	= '</li>';

		$config['next_link'] 		= 'Next &rarr;';
		$config['next_tag_open'] 	= '<li class="page-link">';
		$config['next_tag_close'] 	= '</li>';

		$config['prev_link'] 		= '&larr; Prev';
		$config['prev_tag_open'] 	= '<li class="page-link">';
		$config['prev_tag_close'] 	= '</a></li>';

		$config['cur_tag_open'] 	= '<li class="page-item active"><a href="" class="page-link">';
		$config['cur_tag_close'] 	= '</a></li>';

		$config['num_tag_open'] 	= '<li class="page-link">';
		$config['num_tag_close'] 	= '</a></li>';

		$this->pagination->initialize($config);
			
		$data['jmlhpage']			= $paging;
		$data['datablog'] 			= $this->Site_model->get_all_blog($limit,$offset);
		$data['pagination']			= $this->pagination->create_links();
		$data['templatelayout']		= $template;
		$data['jumlahkomentar']		= $this->Site_model->count_all_komentar_blog($slug);
	
		/*---------------CONFIG---------------*/
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
		$data['konten']=$this->load->view('page/'.$template,$data,TRUE);
		$this->load->view('tema',$data);
	}
	
	public function category(){
		date_default_timezone_set('Asia/Jakarta');
		$slug						= $this->uri->segment(2);
		$query						= $this->Site_model->getConfig()->row_array();
		//$lokasi						= $this->Site_model->getLokasi()->result_array();
		$data['slug']	 			= $this->Site_model->FilterBlogByKategori($slug);
		$page						= $this->Site_model->getMenu("where menu_seo='$slug' AND status=1");
		
		$data['situs']				= strip_tags($query['nama']);
		$template 					= 'blog'; 
		$data['title']				= $data['slug']['kategori'];
		
		$paging=$this->input->get('per_page');
		$limit=5; 
		if(!$paging):   
		   $offset = 0;
		else:
		   $offset = $paging;
		endif;
		$config['page_query_string']= TRUE; 
		$config['base_url'] 		= site_url('blog/'.$slug); 
		$config['total_rows'] 		= $this->Site_model->count_blog_by_id($slug); 
		$config['per_page'] 		= $limit;  
		$config["uri_segment"] 		= $paging;  
		
		$config['full_tag_open'] 	= '<ul class="pagination">';
		$config['full_tag_close'] 	= '</ul>';
		$config['first_link'] 		= '&laquo; First';
		$config['first_tag_open'] 	= '<li class="page-link">';
		$config['first_tag_close'] 	= '</li>';

		$config['last_link'] 		= 'Last &raquo;';
		$config['last_tag_open']	= '<li class="page-link">';
		$config['last_tag_close'] 	= '</li>';

		$config['next_link'] 		= 'Next &rarr;';
		$config['next_tag_open'] 	= '<li class="page-link">';
		$config['next_tag_close'] 	= '</li>';

		$config['prev_link'] 		= '&larr; Prev';
		$config['prev_tag_open'] 	= '<li class="page-link">';
		$config['prev_tag_close'] 	= '</a></li>';

		$config['cur_tag_open'] 	= '<li class="page-item active"><a href="" class="page-link">';
		$config['cur_tag_close'] 	= '</a></li>';

		$config['num_tag_open'] 	= '<li class="page-link">';
		$config['num_tag_close'] 	= '</a></li>';

		$this->pagination->initialize($config);
		$data['jmlhpage']			= $paging;
		$data['datablog'] 			= $this->Site_model->get_artikel_by_id($slug,$limit,$offset);
		$data['pagination']			= $this->pagination->create_links();
		$data['jumlahkomentar']		= $this->Site_model->count_all_komentar_blog($slug);
		
		/*---------------CONFIG---------------*/
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
		$data['konten']=$this->load->view('page/'.$template,$data,TRUE);
		$this->load->view('tema',$data);
	}
	
	public function tag(){
		date_default_timezone_set('Asia/Jakarta');
		$slug_id					= $this->uri->segment(2);
		$slug						= $this->Site_model->CariTag($slug_id);
		$query						= $this->Site_model->getConfig()->row_array();
		$data['slug']	 			= $this->Site_model->FilterBlogByTags($slug);
		$page						= $this->Site_model->getMenu("where menu_seo='$slug_id' AND status=1");
		
		$data['situs']				= strip_tags($query['nama']);
		$template 					= 'tag'; 
		$data['title']				= $slug_id;
		
		$paging=$this->input->get('per_page');
		$limit=5; 
		if(!$paging):   
		   $offset = 0;
		else:
		   $offset = $paging;
		endif;
		$config['page_query_string']= TRUE; 
		$config['base_url'] 		= site_url('tag/'.$slug); 
		$config['total_rows'] 		= $this->Site_model->count_blog_by_tag($slug); 
		$config['per_page'] 		= $limit;  
		$config["uri_segment"] 		= $paging;  
		
		$config['full_tag_open'] 	= '<ul class="pagination">';
		$config['full_tag_close'] 	= '</ul>';
		$config['first_link'] 		= '&laquo; First';
		$config['first_tag_open'] 	= '<li class="page-link">';
		$config['first_tag_close'] 	= '</li>';

		$config['last_link'] 		= 'Last &raquo;';
		$config['last_tag_open']	= '<li class="page-link">';
		$config['last_tag_close'] 	= '</li>';

		$config['next_link'] 		= 'Next &rarr;';
		$config['next_tag_open'] 	= '<li class="page-link">';
		$config['next_tag_close'] 	= '</li>';

		$config['prev_link'] 		= '&larr; Prev';
		$config['prev_tag_open'] 	= '<li class="page-link">';
		$config['prev_tag_close'] 	= '</a></li>';

		$config['cur_tag_open'] 	= '<li class="page-item active"><a href="" class="page-link">';
		$config['cur_tag_close'] 	= '</a></li>';

		$config['num_tag_open'] 	= '<li class="page-link">';
		$config['num_tag_close'] 	= '</a></li>';


		$this->pagination->initialize($config);
		$data['jmlhpage']			= $paging;
		$data['datablog'] 			= $this->Site_model->get_artikel_by_tag($slug,$limit,$offset);
		$data['pagination']			= $this->pagination->create_links();
		$data['jumlahkomentar']		= $this->Site_model->count_all_komentar_blog($slug);
		
		/*---------------CONFIG---------------*/
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
		$data['konten']=$this->load->view('page/'.$template,$data,TRUE);
		$this->load->view('tema',$data);
	}
	
	public function detail(){		
		$slug						= $this->uri->segment(3);
		$data['slug']				= $this->Site_model->get_detail_artikel($slug);
		$query						= $this->Site_model->getConfig()->row_array();
				
		
		/*---------------BLOG---------------*/
		$data['title']				= $data['slug']['judul_blog'].'&nbsp;-&nbsp;'.$query['nama'];
		$data['titleblog']				= $data['slug']['judul_blog'];
		$data['detail'	]			= $this->Site_model->get_detail_artikel($slug);
		$data['meta_deskripsi']		= strip_tags($data['slug']['meta_deskripsi']);
		$data['meta_keyword']		= strip_tags($data['slug']['meta_keyword']);
		
		/*---------------CONFIG---------------*/
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
		$data['situs']				= strip_tags($query['nama']);
		
		$data['telp']				= strip_tags($query['telepon']);
		$data['email']				= strip_tags($query['email_website']);
		$data['alamat']				= strip_tags($query['alamat']);
		$data['author'	]			= strip_tags($query['pemilik']);
		$data['deskripsi_web']		= strip_tags($query['deskripsi_situs']);
		$data['website']			= $query['website'];
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
		
		$data['komentar']			= $this->Site_model->getKomentarBlogId($data['slug']['id']);
		$data['jumlahkomentar']		= $this->Site_model->count_all_komentar_blog($data['slug']['id']);
		$data['fullgallery']		= $this->Landingpage_model->get_nine_gallery();
		$data['testimoni']			= $this->Landingpage_model->get_six_testimoni();
		$data['blogger']			= $this->Landingpage_model->get_three_lastblog();
		$data['popblogger']			= $this->Landingpage_model->get_pop_lastblog();
			
		$data['jsblog']				= $this->load->view('js/js-blog',$data,TRUE);
		$data['konten']				= $this->load->view('page/blog-post',$data,TRUE);
		$this->load->view('tema',$data);
	}
}