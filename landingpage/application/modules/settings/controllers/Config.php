<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends CI_Controller {

	public function index() 
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$data['title']				= 'Konfigurasi Website';
			
			$config						= $this->Config_model->Get_All();
			$data['logo']				= $config['logo'];
			$data['situs']				= $config['nama'];
			$data['author']				= $config['pemilik'];
			$data['favicon']			= $config['favicon'];
			
			if(empty($config['id_config'])){
				$data['id']				= $this->Config_model->kode_otomatis();
			}
			else{
				$data['id']				= 1;
			}
			$data['judul']				= $config['nama'];
			$data['slog']				= $config['slogan'];
			$data['deskripsi']			= $config['deskripsi_situs'];
			$data['telp']				= $config['telepon'];
			$data['almt']				= $config['alamat'];
			$data['email']				= $config['email_website'];
			$data['owner']				= $config['pemilik'];
			$data['web']				= $config['website'];
			$data['mekeyword']			= $config['meta_keyword'];
			$data['medeskripsi']		= $config['meta_deskripsi'];
			$data['lg']					= $config['logo'];
			$data['fvc']				= $config['favicon'];
			$data['facebook']			= $config['facebook'];
			$data['twitter']			= $config['twitter'];
			$data['instagram']			= $config['instagram'];
			$data['linkedin']			= $config['linkedin'];
			$data['hak_cipta']			= $config['hak_cipta'];
			
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
	
	public function logo() 
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$data['title']				= 'Logo';
			
			$config						= $this->Config_model->Get_All();
			$data['logo']				= $config['logo'];
			$data['situs']				= $config['nama'];
			$data['author']				= $config['pemilik'];
			$data['favicon']			= $config['favicon'];
			
			if(empty($config['id_config'])){
				$data['id']				= $this->Config_model->kode_otomatis();
			}
			else{
				$data['id']				= 1;
			}
			$data['lg']					= $config['logo'];
			
			$data['css']				= $this->load->view('cssform',$data,true);
			$data['js']					= $this->load->view('jsform',$data,true);
			$data['script']				= $this->load->view('scriptform',$data,true);
			$data['content']			= $this->load->view('logo',$data,TRUE);
			$this->load->view('admin/template',$data);
			
		}
		else{
			redirect(site_url('administrator'));
		}
	}
	
	public function savelogo(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			$id								= $this->input->post('id',null,TRUE);
			
			$path							='./files/media/';
			$nm_img							='logo-'.trim(substr(md5(rand()),0,4));
			$config['upload_path']          = $path;
			$config['allowed_types']        = 'jpg|jpeg|png';
			$config['file_name']            = $nm_img;
			$config['max_size']             = 2048;
			$config['max_width']            = 5000;
			$config['max_height']           = 5000;
			$config['overwrite']            = TRUE;
			
			$this->upload->initialize($config);
			
			$logo_lama	= $this->input->post('logolama');
		
			$check_file_upload= FALSE;
			if (isset($_FILES['logo']['error'])&& $_FILES['logo']['error'] != 4){
				$check_file_upload = TRUE;
			}
			if($check_file_upload && !$this->upload->do_upload('logo')) {
				$this->session->set_flashdata('error',$this->upload->display_errors('<div class="alert alert-danger"> 
				<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>'));
				redirect(site_url('administrator/config'));
			} 
			else {
				
				if(!$this->upload->do_upload('logo'))
				{
					$data = array(
						'logo' 				=>$logo_lama
					);
				}
				else{
					$file_img=$this->upload->data();
					$img_name=$file_img['file_name'];
					$data = array(
						'logo' 				=> $img_name
					);
					@unlink('./files/media/'.$logo_lama);
					
				}
				$d						= $this->db->get_where('setting',array('id_config'=>$id));
				$this->db->update('setting', $data);
				$this->session->set_flashdata('SUCCESSMSG','Logo berhasil di ubah');
				redirect(site_url('administrator/config/logo'));
			}
		}
		else{
			redirect(site_url('administrator'));
		}
	}
	public function simpan(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$path							='./files/media/';
			$nm_img							='fvc-'.trim(substr(md5(rand()),0,4));
			$config['upload_path']          = $path;
			$config['allowed_types']        = 'jpg|jpeg|png';
			$config['file_name']            = $nm_img;
			$config['max_size']             = 2048;
			$config['max_width']            = 5000;
			$config['max_height']           = 5000;
			$config['overwrite']            = TRUE;
			
			$this->upload->initialize($config);
			
			$fvc_lama	= $this->input->post('faviconlama');
		
			$check_file_upload= FALSE;
			if (isset($_FILES['favicon']['error'])&& $_FILES['favicon']['error'] != 4){
				$check_file_upload = TRUE;
			}
			if($check_file_upload && !$this->upload->do_upload('favicon')) {
				$this->session->set_flashdata('error',$this->upload->display_errors('<div class="alert alert-danger"> 
				<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>'));
				redirect(site_url('administrator/config'));
			} 
			else {
				
				if(!$this->upload->do_upload('favicon'))
				{
					$data = array(
						'nama' 				=> ucwords($this->input->post('judul_situs')),
						'slogan' 			=> ucwords($this->input->post('slogan')),
						'deskripsi_situs' 	=> $this->input->post('deskripsi_situs'),
						'pemilik' 			=> strtoupper($this->input->post('pemilik')),
						'alamat' 			=> $this->input->post('alamat'),
						'telepon' 				=> $this->input->post('telp'),
						'email_website' 	=> $this->input->post('email_web'),
						'website' 			=> $this->input->post('website'),
						'meta_deskripsi' 	=> $this->input->post('meta_deskripsi'),
						'meta_keyword' 		=> $this->input->post('meta_keyword'),
						'facebook' 			=> $this->input->post('facebook'),
						'linkedin' 			=> $this->input->post('linkedin'),
						'twitter' 			=> $this->input->post('twitter'),
						'instagram' 		=> $this->input->post('instagram'),
						'hak_cipta' 		=> $this->input->post('hak_cipta'),
					);
					$id						= $this->input->post('id',null,TRUE);
					$d						= $this->db->get_where('setting',array('id_config'=>$id));
				}
				else{
					$file_img=$this->upload->data();
					$img_name=$file_img['file_name'];
					$data = array(
						'nama' 				=> ucwords($this->input->post('judul_situs')),
						'slogan' 			=> ucwords($this->input->post('slogan')),
						'deskripsi_situs' 	=> $this->input->post('deskripsi_situs'),
						'pemilik' 			=> strtoupper($this->input->post('pemilik')),
						'alamat' 			=> $this->input->post('alamat'),
						'telepon' 				=> $this->input->post('telp'),
						'email_website' 	=> $this->input->post('email_web'),
						'website' 			=> $this->input->post('website'),
						'meta_deskripsi' 	=> $this->input->post('meta_deskripsi'),
						'meta_keyword' 		=> $this->input->post('meta_keyword'),
						'favicon' 			=> $img_name,
						'facebook' 			=> $this->input->post('facebook'),
						'linkedin' 			=> $this->input->post('linkedin'),
						'twitter' 			=> $this->input->post('twitter'),
						'instagram' 		=> $this->input->post('instagram'),
						'hak_cipta' 		=> $this->input->post('hak_cipta'),
					);
					@unlink('./files/media/'.$fvc_lama);
					$id						= $this->input->post('id',null,TRUE);
					$d						= $this->db->get_where('setting',array('id_config'=>$id));
				}
				if($d->num_rows() > 0){
					$this->Config_model->update($id,$data);
					$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Update');
					redirect(site_url('administrator/config'));
				}else{
					$this->Config_model->add($data);
					$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Tambah');
					redirect(site_url('administrator/config'));
				}
			}
		}
		else{
			redirect(site_url('administrator'));
		}
	}
}
?>