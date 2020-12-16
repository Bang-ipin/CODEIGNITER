<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Members extends CI_Controller {
	
	public function index(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$config=$this->Config_model->Get_All();
			$data=array(
				'logo'				=> $config['logo'],
				'situs'				=> $config['nama'],
				'author'			=> $config['pemilik'],
				'favicon'			=> $config['favicon'],
				'tema'				=> $config['tema'],
				'title'				=> 'List Member',
			);
			$data['css']			= $this->load->view('css',$data,true);
			$data['js']				= $this->load->view('js',$data,true);
			$data['script']			= $this->load->view('script',$data,true);
			$data['content']		= $this->load->view('list',$data,TRUE);
			$this->load->view('admin/template',$data);
			
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
	public function status($id,$status) {
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$this->Member_model->MemberStatus($id,$status);
			$this->session->set_flashdata('SUCCESSMSG','Member Updated Successfully!!');
			redirect(site_url('appweb/members'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
	public function hapus($id){
        
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$this->Member_model->delete($id);
			$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Dihapus'); 
			redirect(site_url('appweb/members'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
}
	
	