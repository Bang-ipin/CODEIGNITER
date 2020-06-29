<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maps extends CI_Controller {

	public function index() 
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$data['title']				= 'Maps';
			
			$config						= $this->Config_model->Get_All();
			$data['logo']				= $config['logo'];
			$data['situs']				= $config['nama'];
			$data['author']				= $config['pemilik'];
			$data['favicon']			= $config['favicon'];
			$data['tema']				= $config['tema'];
			
			$Map						= $this->Maps_model->Get_Map();
			
			if(empty($Map['id'])){
				$data['id']				= $this->Maps_model->kode_otomatis();
			}
			else{
				$data['id']				= 1;
			}
			$data['name']				= $Map['name'];
			$data['caption']			= $Map['caption'];
			$data['lat']				= $Map['lat'];
			$data['lng']				= $Map['lng'];
			$data['status']				= $Map['status'];
			$data['dd_status']			= $this->Site_model->dd_status();
			
			$data['css']				= $this->load->view('cssform',$data,true);
			$data['js']					= $this->load->view('jsform',$data,true);
			$data['script']				= $this->load->view('scriptform',$data,true);
			$data['content']			= $this->load->view('form',$data,TRUE);
			$this->load->view('admin/template',$data);
			
		}
		else{
			redirect(site_url('administrator'));
		}
	}

	public function simpan(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$data = array(
				'name' 				=> ucwords($this->input->post('name')),
				'caption' 			=> ucwords($this->input->post('caption')),
				'lat' 				=> $this->input->post('lat'),
				'lng' 				=> $this->input->post('lng'),
				'status' 			=> $this->input->post('status'),
			);
			
			$id						= $this->input->post('id',null,TRUE);
			$d						= $this->db->get_where('lokasi',array('id'=>$id));
			if($d->num_rows() > 0){
				$this->Maps_model->update($id,$data);
				$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Update');
				redirect(site_url('administrator/maps'));
			}
			else{
				$this->Maps_model->add($data);
				$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Tambah');
				redirect(site_url('administrator/maps'));
			}
		}
		else{
			redirect(site_url('administrator'));
		}
	}
}
?>