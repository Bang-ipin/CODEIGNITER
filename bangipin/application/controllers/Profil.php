<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
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
		$data['dataabout']			= $this->Site_model->get_about_data();
		$data['popblogger']			= $this->Landingpage_model->get_pop_lastblog();
		$data['blogger']			= $this->Landingpage_model->get_three_lastblog();
		
		$data['konten']				= $this->load->view('public/'.$template,$data,TRUE);
		$this->load->view('public/tema',$data);
	}
	
}