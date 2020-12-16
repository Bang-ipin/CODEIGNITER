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
			$data['facebook']			= $query['facebook'];
			$data['instagram']			= $query['instagram'];
			$data['twitter'	]			= $query['twitter'];
			$data['youtube']			= $query['youtube'];
			$data['linkedin']			= $query['linkedin'];
			$data['blogger']			= $this->Landingpage_model->get_three_lastblog();
			$data['konten']				= $this->load->view('public/'.$template,$data,TRUE);
			$this->load->view('public/tema',$data);
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
		$data['konten']=$this->load->view('public/404',$data,TRUE);
		$this->load->view('public/tema',$data);
	}

}
	