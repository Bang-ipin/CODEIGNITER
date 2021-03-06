<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Petasitus extends CI_Controller {

	public function index($slug){		
		
		$data['slug']			= $this->Site_model->getAllArtikel($slug);
		$query					= $this->Site_model->getConfig()->row_array();
					
		$data['primarymenu']	= $this->menu_lib->primary;
		$data['secondarymenu']	= $this->menu_lib->secondary;
		$data['detail']			= $this->Site_model->getAllArtikel($slug);
		$data['title'] 			= $data['slug']['judul_blog'];
		$data['situs']			= strip_tags($query['nama']);
		$data['deskripsi_web']	= strip_tags($query['deskripsi_situs']);
		$data['meta_deskripsi']	= strip_tags($query['meta_deskripsi']);
		$data['meta_keyword']	= strip_tags($query['meta_keyword']);
		$data['telp']			= strip_tags($query['telepon']);
		$data['email']			= strip_tags($query['email_website']);
		$data['alamat']			= strip_tags($query['alamat']);
		$data['author'	]		= strip_tags($query['pemilik']);
		$data['website']		= $query['website'];
		$data['logo']			= $query['logo'];
		$data['favicon']		= $query['favicon'];
		$data['tema']			= $query['tema'];
		$data['hak_cipta']		= $query['hak_cipta'];
		$data['facebook']		= $query['facebook'];
		$data['instagram']		= $query['instagram'];
		$data['twitter'	]		= $query['twitter'];
		$data['googleplus']		= $query['googleplus'];
		$data['tumblr'	]		= $query['tumblr'];
		$data['vimeo'	]		= $query['vimeo'];
		$data['youtube'	]		= $query['youtube'];
		$data['skype'	]		= $query['skype'];
		$data['linkedin']		= $query['linkedin'];
		$data['javascript_header']	= $query['javascript_header'];
        $data['javascript_footer']	= $query['javascript_footer'];
		
		$data['konten']=$this->load->view('page-sitemap',$data,TRUE);
		$this->load->view('tema',$data);
	}
}