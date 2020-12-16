<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();
		$this->load->model('Site_model');
	}
	
	public function index(){
		$query						= $this->Site_model->getConfig()->row_array();
		
		/*---------------SLIDER---------------*/
		$data['slider_top']			= $this->slider_lib->primary;
		$data['slideTop']			= $this->slider_lib->get_countsliderTop();
		$data['slider_bottom']		= $this->slider_lib->secondary;
		$data['slideBottom']		= $this->slider_lib->get_countsliderBottom();
		$data['iklantop']			= $this->ads_lib->getTopIklan()->result_array();
		$data['iklanbottom']		= $this->ads_lib->getBottomIklan()->result_array();
		
			/*---------------SHOP---------------*/
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
		$data['title']				= strip_tags($query['nama']);
		$data['slogan']				= strip_tags($query['slogan']);
		$data['deskripsi_web']		= strip_tags($query['deskripsi_situs']);
		$data['meta_deskripsi']		= strip_tags($query['meta_deskripsi']);
		$data['meta_keyword']		= strip_tags($query['meta_keyword']);
		$data['telp']				= strip_tags($query['telepon']);
		$data['email']				= strip_tags($query['email_website']);
		$data['alamat']				= strip_tags($query['alamat']);
		$data['author']				= strip_tags($query['pemilik']);
		$data['website']			= $query['website'];
		$data['logo']				= $query['logo'];
		$data['favicon']			= $query['favicon'];
		$data['facebook']			= $query['facebook'];
		$data['instagram']			= $query['instagram'];
		$data['twitter']			= $query['twitter'];
		$data['googleplus']			= $query['googleplus'];
		$data['tumblr']				= $query['tumblr'];
		$data['vimeo']				= $query['vimeo'];
		$data['youtube']			= $query['youtube'];
		$data['skype']				= $query['skype'];
		$data['linkedin']			= $query['linkedin'];
		$data['javascript_header']	= $query['javascript_header'];
        $data['javascript_footer']	= $query['javascript_footer'];
		
		$data['fullgallery']		= $this->Landingpage_model->get_nine_gallery();
		$data['testimoni']			= $this->Landingpage_model->get_six_testimoni();
		$data['blogger']			= $this->Landingpage_model->get_three_lastblog();
		$data['popblogger']			= $this->Landingpage_model->get_pop_lastblog();
		
		$data['header']				= 1;
		$data['konten']				= $this->load->view('index',$data,TRUE);
		$this->load->view('tema',$data);
	}
	
}

