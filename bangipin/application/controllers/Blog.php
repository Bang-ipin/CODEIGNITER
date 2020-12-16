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
		$limit=5; 
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
		$data['telp']				= strip_tags($query['telepon']);
		$data['email']				= strip_tags($query['email_website']);
		$data['alamat']				= strip_tags($query['alamat']);
		$data['author'	]			= strip_tags($query['pemilik']);
		$data['deskripsi_web']		= strip_tags($query['deskripsi_situs']);
		$data['meta_deskripsi']		= strip_tags($query['meta_deskripsi']);
		$data['meta_keyword']		= strip_tags($query['meta_keyword']);
		$data['website']			= $query['website'];
		$data['tema']				= $query['tema'];
		$data['facebook']			= $query['facebook'];
		$data['instagram']			= $query['instagram'];
		$data['twitter'	]			= $query['twitter'];
		$data['youtube']			= $query['youtube'];
		$data['linkedin']			= $query['linkedin'];
		$data['logo']				= $query['logo'];
		$data['favicon'	]			= $query['favicon'];
		
		$data['blogger']			= $this->Landingpage_model->get_three_lastblog();
		
		$data['konten']=$this->load->view('public/'.$template,$data,TRUE);
		$this->load->view('public/tema',$data);
	}
	
	public function all(){
		date_default_timezone_set('Asia/Jakarta');
		$slug						= $this->uri->segment(1);
		$query						= $this->Site_model->getConfig()->row_array();
		
		$data['situs']				= strip_tags($query['nama']);
		$template 					= 'semua-blog'; 
		$data['title']				= $slug;
		
		$paging=$this->input->get('per_page');
		$limit=12; 
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
		$data['telp']				= strip_tags($query['telepon']);
		$data['email']				= strip_tags($query['email_website']);
		$data['alamat']				= strip_tags($query['alamat']);
		$data['author'	]			= strip_tags($query['pemilik']);
		$data['deskripsi_web']		= strip_tags($query['deskripsi_situs']);
		$data['meta_deskripsi']		= strip_tags($query['meta_deskripsi']);
		$data['meta_keyword']		= strip_tags($query['meta_keyword']);
		$data['website']			= $query['website'];
		$data['tema']				= $query['tema'];
		$data['facebook']			= $query['facebook'];
		$data['instagram']			= $query['instagram'];
		$data['twitter'	]			= $query['twitter'];
		$data['youtube']			= $query['youtube'];
		$data['linkedin']			= $query['linkedin'];
		$data['logo']				= $query['logo'];
		$data['favicon'	]			= $query['favicon'];
		
		$data['blogger']			= $this->Landingpage_model->get_three_lastblog();
		
		$data['konten']=$this->load->view('public/'.$template,$data,TRUE);
		$this->load->view('public/tema',$data);
	}
	
	public function category(){
		date_default_timezone_set('Asia/Jakarta');
		$slug						= $this->uri->segment(2);
		$query						= $this->Site_model->getConfig()->row_array();
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
		$data['telp']				= strip_tags($query['telepon']);
		$data['email']				= strip_tags($query['email_website']);
		$data['alamat']				= strip_tags($query['alamat']);
		$data['author'	]			= strip_tags($query['pemilik']);
		$data['deskripsi_web']		= strip_tags($query['deskripsi_situs']);
		$data['meta_deskripsi']		= strip_tags($query['meta_deskripsi']);
		$data['meta_keyword']		= strip_tags($query['meta_keyword']);
		$data['website']			= $query['website'];
		$data['tema']				= $query['tema'];
		$data['facebook']			= $query['facebook'];
		$data['instagram']			= $query['instagram'];
		$data['twitter'	]			= $query['twitter'];
		$data['youtube']			= $query['youtube'];
		$data['linkedin']			= $query['linkedin'];
		$data['logo']				= $query['logo'];
		$data['favicon'	]			= $query['favicon'];
		
		$data['blogger']			= $this->Landingpage_model->get_three_lastblog();
		
		$data['konten']=$this->load->view('public/'.$template,$data,TRUE);
		$this->load->view('public/tema',$data);
	}
	
	public function tag(){
		date_default_timezone_set('Asia/Jakarta');
		$slug_id					= $this->uri->segment(2);
		$slug						= $this->Site_model->CariTag($slug_id);
		$namatag					= $this->Site_model->CariNamaTag($slug_id);
		$query						= $this->Site_model->getConfig()->row_array();
		$data['slug']	 			= $this->Site_model->FilterBlogByTags($slug);
		$page						= $this->Site_model->getMenu("where menu_seo='$slug_id' AND status=1");
		
		$data['situs']				= strip_tags($query['nama']);
		$template 					= 'tag'; 
		$data['title']				= $namatag;
		
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
		$data['telp']				= strip_tags($query['telepon']);
		$data['email']				= strip_tags($query['email_website']);
		$data['alamat']				= strip_tags($query['alamat']);
		$data['author'	]			= strip_tags($query['pemilik']);
		$data['deskripsi_web']		= strip_tags($query['deskripsi_situs']);
		$data['meta_deskripsi']		= strip_tags($query['meta_deskripsi']);
		$data['meta_keyword']		= strip_tags($query['meta_keyword']);
		$data['website']			= $query['website'];
		$data['tema']				= $query['tema'];
		$data['facebook']			= $query['facebook'];
		$data['instagram']			= $query['instagram'];
		$data['twitter'	]			= $query['twitter'];
		$data['youtube']			= $query['youtube'];
		$data['linkedin']			= $query['linkedin'];
		$data['logo']				= $query['logo'];
		$data['favicon'	]			= $query['favicon'];
			
		$data['blogger']			= $this->Landingpage_model->get_three_lastblog();
		
		$data['konten']=$this->load->view('public/'.$template,$data,TRUE);
		$this->load->view('public/tema',$data);
	}
	
	public function detail(){		
		$slug1						= $this->uri->segment(1);
		$slug2						= $this->uri->segment(2);
		$slug3						= $this->uri->segment(3);
		$data['slug']				= $this->Site_model->get_detail_artikel($slug3);
		$query						= $this->Site_model->getConfig()->row_array();
				
		
		/*---------------BLOG---------------*/
		$data['kanonik']			= site_url($slug1.'/'.$slug2.'/'.$slug3);
		$data['title']				= $data['slug']['judul_blog'].' - '.$query['nama'];
		$data['titleblog']			= $data['slug']['judul_blog'];
		$data['detail'	]			= $this->Site_model->get_detail_artikel($slug3);
		$data['meta_deskripsi']		= strip_tags($data['slug']['meta_deskripsi']);
		$data['meta_keyword']		= strip_tags($data['slug']['meta_keyword']);
		
		/*---------------CONFIG---------------*/
		$data['tema']				= $query['tema'];
		$data['situs']				= strip_tags($query['nama']);
		
		$data['telp']				= strip_tags($query['telepon']);
		$data['email']				= strip_tags($query['email_website']);
		$data['alamat']				= strip_tags($query['alamat']);
		$data['author'	]			= strip_tags($query['pemilik']);
		$data['deskripsi_web']		= strip_tags($query['deskripsi_situs']);
		$data['website']			= $query['website'];
		$data['facebook']			= $query['facebook'];
		$data['instagram']			= $query['instagram'];
		$data['twitter'	]			= $query['twitter'];
		$data['youtube']			= $query['youtube'];
		$data['linkedin']			= $query['linkedin'];
		$data['logo']				= $query['logo'];
		$data['favicon'	]			= $query['favicon'];
    		
		$data['komentar']			= $this->Site_model->getKomentarBlogId($data['slug']['id']);
		$data['jumlahkomentar']		= $this->Site_model->count_all_komentar_blog($data['slug']['id']);
		$data['fullgallery']		= $this->Landingpage_model->get_nine_gallery();
		$data['testimoni']			= $this->Landingpage_model->get_six_testimoni();
		$data['blogger']			= $this->Landingpage_model->get_three_lastblog();
		
		$data['blogger']			= $this->Landingpage_model->get_three_lastblog();
			
		$data['jsblog']				= $this->load->view('public/js/js-blog',$data,TRUE);
		$data['css']				= $this->load->view('public/css/css',$data,TRUE);
		$data['konten']				= $this->load->view('public/blog-post',$data,TRUE);
		//$data['header']             = 1;
		$this->load->view('public/tema',$data);
	}
}