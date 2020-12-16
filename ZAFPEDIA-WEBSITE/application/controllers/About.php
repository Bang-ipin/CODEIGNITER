<?php defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('Site_model');
	
	}
	public function index(){
		
		date_default_timezone_set('Asia/Jakarta');
		$slug						= $this->uri->segment(1);
		$query						= $this->Site_model->getConfig()->row_array();
		$page						= $this->Site_model->getPage("where laman_seo='$slug' AND status=1")->row_array();
		
		$data['situs']				= strip_tags($query['nama']);
		$template 					= 'about'; 
		$data['title']				= $slug;
		/*---------------CONFIG---------------*/
		$data['featured']			= $this->Site_model->getFeaturedProduk();
		$data['onsale']				= $this->Site_model->getOnSale();
		$data['toprate']			= $this->Site_model->getTopRateProduct();
		$data['item']				= $this->Site_model->getAllProduk();
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
		$data['dataabout']			= $this->Site_model->get_about_data();
		
		$data['konten']				=$this->load->view('page/'.$template,$data,TRUE);
		$this->load->view('tema',$data);
	}
	
}