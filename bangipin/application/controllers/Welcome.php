<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();
		$this->load->model('Site_model');
	}
	
	public function index(){
		$query						= $this->Site_model->getConfig()->row_array();
		$landing					= $this->Landingpage_model->Get_Data();
		/*---------------SLIDER---------------*/
		$data['slider']				= $this->slider_lib->primary;
		$data['jmlslide']			= $this->slider_lib->get_countsliderTop();
		
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
		$data['tema']				= $query['tema'];
		$data['logo']				= $query['logo'];
		$data['favicon']			= $query['favicon'];
		$data['facebook']			= $query['facebook'];
		$data['instagram']			= $query['instagram'];
		$data['twitter']			= $query['twitter'];
		$data['youtube']			= $query['youtube'];
		$data['linkedin']			= $query['linkedin'];
		
		$data['landingsitus']		= $landing['judul'];
		$data['bghome']				= $landing['bghome'];
		$data['landingdeskripsi']	= $landing['deskripsi'];
		$data['landinglink']		= $landing['link'];
		$data['landingtextlink']	= $landing['text_link'];
		
		$data['fonticon1']			= $landing['fonticon1'];
		$data['fonticon2']			= $landing['fonticon2'];
		$data['fonticon3']			= $landing['fonticon3'];
		$data['title_features1']	= $landing['title_features1'];
		$data['title_features2']	= $landing['title_features2'];
		$data['title_features3']	= $landing['title_features3'];
		$data['deskripsi1']			= $landing['deskripsi1'];
		$data['deskripsi2']			= $landing['deskripsi2'];
		$data['deskripsi3']			= $landing['deskripsi3'];
		$data['link1']				= $landing['link1'];
		$data['link2']				= $landing['link2'];
		$data['link3']				= $landing['link3'];
		$data['textlink1']			= $landing['text_link1'];
		$data['textlink2']			= $landing['text_link2'];
		$data['textlink3']			= $landing['text_link3'];
		
		$data['appicon1']			= $landing['appicon1'];
		$data['appicon2']			= $landing['appicon2'];
		$data['appicon3']			= $landing['appicon3'];
		$data['appicon4']			= $landing['appicon4'];
		$data['appfeatures1']		= $landing['appfeatures1'];
		$data['appfeatures2']		= $landing['appfeatures2'];
		$data['appfeatures3']		= $landing['appfeatures3'];
		$data['appfeatures4']		= $landing['appfeatures4'];
		$data['appdeskripsi1']		= $landing['appdeskripsi1'];
		$data['appdeskripsi2']		= $landing['appdeskripsi2'];
		$data['appdeskripsi3']		= $landing['appdeskripsi3'];
		$data['appdeskripsi4']		= $landing['appdeskripsi4'];
		
		$data['judulvideo']			= $landing['judulvideo'];
		$data['deskripsivideo']		= $landing['deskripsivideo'];
		$data['backgroundvideo']	= $landing['backgroundvideo'];
		$data['idyoutube']			= $landing['idyoutube'];
		
		$data['fullgallery']		= $this->Landingpage_model->get_nine_gallery();
		$data['testimoni']			= $this->Landingpage_model->get_six_testimoni();
		$data['blogger']			= $this->Landingpage_model->get_three_lastblog();
		$data['eightblog']			= $this->Landingpage_model->get_eight_lastblog();
		$data['konten']				= $this->load->view('public/index',$data,TRUE);
		$this->load->view('public/tema',$data);
	}
	
}

