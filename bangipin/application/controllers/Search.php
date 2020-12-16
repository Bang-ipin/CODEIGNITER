<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
class Search extends CI_Controller {

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
		
		$data['telp']				= strip_tags($query['telepon']);
		$data['email']				= strip_tags($query['email_website']);
		$data['alamat']				= strip_tags($query['alamat']);
		$data['author'	]			= strip_tags($query['pemilik']);
		$data['deskripsi_web']		= strip_tags($query['deskripsi_situs']);
		$data['meta_deskripsi']		= strip_tags($query['meta_deskripsi']);
		$data['meta_keyword']		= strip_tags($query['meta_keyword']);
		$data['website']			= $query['website'];
		$data['logo']				= $query['logo'];
		$data['favicon'	]			= $query['favicon'];
		$data['tema']				= $query['tema'];
		$data['facebook']			= $query['facebook'];
		$data['instagram']			= $query['instagram'];
		$data['twitter'	]			= $query['twitter'];
		$data['youtube']			= $query['youtube'];
		$data['linkedin']			= $query['linkedin'];
		$data['blogger']			= $this->Landingpage_model->get_three_lastblog();
		$data['konten']=$this->load->view('public/blog',$data,TRUE);
		$this->load->view('public/tema',$data);
	}
}
	