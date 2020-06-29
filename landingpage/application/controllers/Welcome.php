<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();
		$this->load->model('Site_model');
	}
	
	public function index(){
		$query						= $this->Site_model->getConfig()->row_array();
		$landing					= $this->Landingpage_model->Get_Data();
		$lokasi						= $this->Site_model->getLokasi()->row_array();
		
		$config=array();
		$config['center']			= "".$lokasi['lat'].",".$lokasi['lng'].""	;
		$config['zoom']				= 17;
		$config['map_height']		= "400px";
		$this->googlemaps->initialize($config);
		$marker=array();
		$marker['position']			= "".$lokasi['lat'].",".$lokasi['lng']."";
		$marker['title']			= "".$lokasi['caption']."";
		$marker['infowindow_content']= "".$lokasi['caption']."";
		$marker['animation']		= "BOUNCE";
		$this->googlemaps->add_marker($marker);
		$data['map']				= $this->googlemaps->create_map();
		
		$data['lokasi_name']		= $lokasi['name'];
		$data['peta']				= $lokasi['caption'];
		/*---------------SLIDER---------------*/
		
		$data['situs']				= strip_tags($query['nama']);
		$data['title']				= strip_tags($query['nama']);
		$data['slogan']				= strip_tags($query['slogan']);
		$data['deskripsi_web']		= strip_tags($query['deskripsi_situs']);
		$data['meta_deskripsi']		= strip_tags($query['meta_deskripsi']);
		$data['meta_keyword']		= strip_tags($query['meta_keyword']);
		$data['author']				= strip_tags($query['pemilik']);
		$data['alamat']				= strip_tags($query['alamat']);
		$data['telp']				= strip_tags($query['telepon']);
		$data['email']				= strip_tags($query['email_website']);
		$data['logo']				= $query['logo'];
		$data['favicon']			= $query['favicon'];
		$data['website']			= $query['website'];
		$data['hak_cipta']			= $query['hak_cipta'];
		$data['livechat']			= $query['livechat'];
		$data['analityc']			= $query['analityc'];
		$data['sharethis']			= $query['sharethis'];
		$data['fb']					= $query['facebook'];
		$data['twitter']			= $query['twitter'];
		$data['instagram']			= $query['instagram'];
		$data['youtube']			= $query['youtube'];
		$data['gplus']				= $query['googleplus'];
		$data['tumblr']				= $query['tumblr'];
		$data['linked']				= $query['linkedin'];
		$data['skype']				= $query['skype'];
		$data['vimeo']				= $query['vimeo'];
		
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
		
		$data['fullgallery']		= $this->Landingpage_model->get_all_gallery();
		$data['testimoni']			= $this->Landingpage_model->get_all_testimoni();
		
		$this->load->view('header',$data);
		$this->load->view('index',$data);
		$this->load->view('footer',$data);
	}
	
}

