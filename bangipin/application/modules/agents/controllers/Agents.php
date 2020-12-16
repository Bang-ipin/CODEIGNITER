<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agents extends CI_Controller {
    
	public function index(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$config=$this->Config_model->Get_All();
			$data=array(
				'logo'		=> $config['logo'],
				'situs'		=> $config['nama'],
				'author'	=> $config['pemilik'],
				'favicon'	=> $config['favicon'],
				'title'		=> 'List Visitor',
			);
			$data['css']				= $this->load->view('css',$data,true);
			$data['js']					= $this->load->view('js',$data,true);
			
			$data['content']            = $this->load->view('list',$data,TRUE);		
			$this->load->view('admin/template',$data);
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
}
	
	