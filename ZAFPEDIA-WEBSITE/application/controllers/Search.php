<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
class Search extends CI_Controller {

	public function product(){
		date_default_timezone_set('Asia/Jakarta');
		$query						= $this->Site_model->getConfig()->row_array();
		$key						= $this->input->post('keyproduct');
		$paging						=$this->input->get('per_page');
		$search						=array(
			'produk'	=>$key,
			'deskripsi'	=>$key
		);
		$limit=6; 
		if(!$paging):   
		   $offset = 0;
		else:
		   $offset = $paging;
		endif;
		$config['page_query_string']= TRUE; 
		$config['base_url'] 		= site_url('search?key='.$key); 
		$config['total_rows'] 		= $this->Site_model->count_all_search_produk($search); 
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
		$data['dataproduk'] 		= $this->Site_model->search_all_produk($search,$limit,$offset);
		$data['key']				= $key;
		$data['pagination']			= $this->pagination->create_links();
		
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
		
		$data['title']				= 'Hasil&nbsp;Pencarian';
		$data['situs']				= strip_tags($query['nama']);
		$data['deskripsi_web']		= strip_tags($query['deskripsi_situs']);
		$data['meta_deskripsi']		= strip_tags($query['meta_deskripsi']);
		$data['meta_keyword']		= strip_tags($query['meta_keyword']);
		$data['telp']				= strip_tags($query['telepon']);
		$data['email']				= strip_tags($query['email_website']);
		$data['alamat']				= strip_tags($query['alamat']);
		$data['author'	]			= strip_tags($query['pemilik']);
		$data['website']			= $query['website'];
		$data['logo']				= $query['logo'];
		$data['favicon']			= $query['favicon'];
		$data['tema']				= $query['tema'];
		$data['hak_cipta']			= $query['hak_cipta'];
		$data['facebook']			= $query['facebook'];
		$data['instagram']			= $query['instagram'];
		$data['twitter'	]			= $query['twitter'];
		$data['googleplus']			= $query['googleplus'];
		$data['tumblr'	]			= $query['tumblr'];
		$data['vimeo'	]			= $query['vimeo'];
		$data['youtube'	]			= $query['youtube'];
		$data['skype'	]			= $query['skype'];
		$data['linkedin']			= $query['linkedin'];
		$data['javascript_header']	= $query['javascript_header'];
        $data['javascript_footer']	= $query['javascript_footer'];
		
		$data['konten']=$this->load->view('result',$data,TRUE);
		$this->load->view('tema',$data);
	}
	public function blog(){
		date_default_timezone_set('Asia/Jakarta');
		$key						= $this->input->post('keyblog');
		$paging						= $this->input->get('per_page');
		$search						= array(
			'judul_blog'=>$key,
			'isi'		=>$key
		);
		$limit=3; 
		if(!$paging):   
		   $offset = 0;
		else:
		   $offset = $paging;
		endif;
		$config['page_query_string']= TRUE; 
		$config['base_url'] 		= site_url('cari?key='.$key); 
		$config['total_rows'] 		= $this->Site_model->count_all_search_blog($search); 
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
		$data['title']				="Hasil Pencarian";
		$data['jmlhpage']			= $paging;
		$data['datablog'] 			= $this->Site_model->search_all_blog($search,$limit,$offset);
		$data['key']				= $key;
		$data['pagination']			= $this->pagination->create_links();
		$query						= $this->Site_model->getConfig()->row_array();
		$data['situs']				= strip_tags($query['nama']);
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
		
		$data['konten']=$this->load->view('page/blog',$data,TRUE);
		$this->load->view('tema',$data);
	}
}
	