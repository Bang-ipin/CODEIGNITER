<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {

	public function index(){
		date_default_timezone_set('Asia/Jakarta');
		$slug						= $this->uri->segment(1);
		$query						= $this->Site_model->getConfig()->row_array();
		$page						= $this->Site_model->getPage("where laman_seo='$slug' AND status=1")->row_array();
		if (empty($page)){
			show_404();
		}
		
		$data['situs']				= strip_tags($query['nama']);
		$data['title']				= $page['nama_laman'];
		$data['konten']				= $page['konten'];
		$template 					= 'list'; 
		$data['title']				= $slug;
		
		$paging=$this->input->get('per_page');
		$limit=10; 
		if(!$paging):   
		   $offset = 0;
		else:
		   $offset = $paging;
		endif;
		$config['page_query_string']= TRUE; 
		$config['base_url'] 		= site_url('download'); 
		$config['total_rows'] 		= $this->Site_model->count_all_data_download(); 
		$config['per_page'] 		= $limit;  
		$config["uri_segment"] 		= $paging;  
		
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = 'Next &rarr;';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&larr; Prev';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
			
		$data['jmlhpage']			= $paging;
		$data['datadownload'] 		= $this->Site_model->get_all_data_download($limit,$offset);
		$data['pagination']			= $this->pagination->create_links();
		$data['templatelayout']		= $template;
		//$data['jumlahkomentar']		= $this->Site_model->count_all_komentar_blog($slug);
	
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
		$data['payment']			= $this->Site_model->getPayment();
		$data['bank']				= $this->Site_model->getBank();
		$data['javascript_header']	= $query['javascript_header'];
        $data['javascript_footer']	= $query['javascript_footer'];
		$data['fullgallery']		= $this->Landingpage_model->get_nine_gallery();
		$data['testimoni']			= $this->Landingpage_model->get_six_testimoni();
		$data['blogger']			= $this->Landingpage_model->get_three_lastblog();
		$data['popblogger']			= $this->Landingpage_model->get_pop_lastblog();
		
		$data['konten']=$this->load->view($template,$data,TRUE);
		$this->load->view('tema',$data);
	}
	
	function file(){
		$id = $this->uri->segment(3);
		$name = $this->uri->segment(4);
		$this->Site_model->updatehitsdownload($id);
		$data = file_get_contents("files/download/".$name);
		$this->load->helper('download');
		force_download($name, $data);
	}
}