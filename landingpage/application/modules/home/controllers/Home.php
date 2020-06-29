<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {	
    
	public function index() {	
	
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			$config 						= $this->Config_model->Get_All();
			$data['title']					= 'Dashboard';
			$data['situs']					= $config['nama'];
			$data['logo']					= $config['logo'];
			$data['author']					= $config['pemilik'];
			$data['favicon']				= $config['favicon'];
			$data['tema']					= $config['tema'];
			
			$data['css']					= $this->load->view('css',$data,true);
			$data['js']						= $this->load->view('js',$data,true);
			$data['script']					= $this->load->view('script',$data,true);
			
			$data['content']				= $this->load->view('list',$data,true);
			$this->load->view('admin/template',$data);
		}
		else{
			redirect(site_url('administrator'));
		}
	}
	
}