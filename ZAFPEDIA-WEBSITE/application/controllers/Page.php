<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	
	public function index() {
		$slug							= $this->uri->segment(1);
		$sql							= $this->Site_model->getMenu(" where menu_seo='$slug' AND status=1");
		if ($sql->num_rows() > 0){
			date_default_timezone_set('Asia/Jakarta');
			$query						= $this->Site_model->getConfig()->row_array();
			$lokasi						= $this->Site_model->getLokasi()->row_array();
			$page						= $this->Site_model->getPage("where laman_seo='$slug' AND status=1")->row_array();
			
			
			$template 					= $this->Site_model->CariTemplate($slug); 
			
			/*---------------PAGE---------------*/
			$data['situs']				= strip_tags($query['nama']);
			$data['title']				= $page['nama_laman'];
			$data['konten']				= $page['konten'];
			
			/*---------------SHOP---------------*/
			$data['featured']			= $this->Site_model->getFeaturedProduk();
			$data['onsale']				= $this->Site_model->getOnSale();
			$data['toprate']			= $this->Site_model->getTopRateProduct();
			$data['item']				= $this->Site_model->getAllProduk();
			$data['payment']			= $this->Site_model->getPayment();
			$data['bank']				= $this->Site_model->getBank();
			
			/*---------------CONFIG---------------*/
			$data['meta_deskripsi']		= strip_tags($query['meta_deskripsi']);
			$data['meta_keyword']		= strip_tags($query['meta_keyword']);
			$data['deskripsi_web']		= strip_tags($query['deskripsi_situs']);
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
		else{
			$this->show404();
		}
	}
	
	public function show404(){
		date_default_timezone_set('Asia/Jakarta');
		$query						= $this->Site_model->getConfig()->row_array();
		
		$data['situs']				= strip_tags($query['nama']);
		$data['title']				= 'Halaman&nbsp;Tidak&nbsp;Ditemukan';
		
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
		$data['konten']=$this->load->view('404',$data,TRUE);
		$this->load->view('tema',$data);
	}

}
	