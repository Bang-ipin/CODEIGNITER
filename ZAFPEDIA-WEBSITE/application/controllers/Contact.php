<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function index(){
		date_default_timezone_set('Asia/Jakarta');
		$slug						= $this->uri->segment(1);
		$query						= $this->Site_model->getConfig()->row_array();
		$lokasi						= $this->Site_model->getLokasi()->row_array();
		$page						= $this->Site_model->getMenu("where menu_seo='$slug' AND status=1")->row_array();
		
		$data['situs']				= strip_tags($query['nama']);
		if(!empty($page['pages'])){	
				$data['title']		= $page['laman'];
		}else{
				$data['title']		= 'Contact';
		}
		if(!empty($page['layout'])){	
				$template			= $page['layout'];
		}else{
				$template			= 'contact';
		}
		if(!empty($page['konten'])){	
				$data['konten']		= $page['konten'];
		}else{
				$data['konten']		= '';
		}
		
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
		
		$data['latitude']           =$lokasi['lat'];
		$data['longitude']           =$lokasi['lng'];
		$data['key']                =$lokasi['key'];
		//$data['header']				= 1;
		$data['fullgallery']		= $this->Landingpage_model->get_nine_gallery();
		$data['testimoni']			= $this->Landingpage_model->get_six_testimoni();
		$data['blogger']			= $this->Landingpage_model->get_three_lastblog();
		$data['popblogger']			= $this->Landingpage_model->get_pop_lastblog();
		$data['captcha']            = $this->recaptcha->getWidget();
		$data['scriptcaptcha']      = $this->recaptcha->getScriptTag();
		$data['maps']				= $this->load->view('js/maps',$data,TRUE);
		$data['jsmaps']				= $this->load->view('js/js-map',$data,TRUE);
		$data['konten']				= $this->load->view('page/'.$template,$data,TRUE);
		$this->load->view('tema',$data);
	}
	
}