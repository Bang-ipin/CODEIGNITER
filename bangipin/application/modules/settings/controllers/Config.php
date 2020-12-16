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
			$data['tema']				= $config['tema'];
			
		
			$data['id']				    = 1;
			$data['judul']				= $config['nama'];
			$data['slog']				= $config['slogan'];
			$data['deskripsi']			= $config['deskripsi_situs'];
			$data['telp']				= $config['telepon'];
			$data['almt']				= $config['alamat'];
			$data['email']				= $config['email_website'];
			$data['owner']				= $config['pemilik'];
			$data['web']				= $config['website'];
			$data['kmntr']				= $config['komentar'];
			$data['mekeyword']			= $config['meta_keyword'];
			$data['medeskripsi']		= $config['meta_deskripsi'];
			$data['lg']					= $config['logo'];
			$data['fvc']				= $config['favicon'];
			$data['facebook']			= $config['facebook'];
			$data['twitter']			= $config['twitter'];
			$data['instagram']			= $config['instagram'];
			$data['linkedin']			= $config['linkedin'];
			$data['youtube']			= $config['youtube'];
		   
			$data['css']				= $this->load->view('cssform',$data,true);
			$data['js']					= $this->load->view('jsform',$data,true);
			$data['content']			= $this->load->view('form',$data,TRUE);
			$this->load->view('admin/template',$data);
			
		}
		else{
			redirect(site_url('appweb'));
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
			$data['tema']				= $config['tema'];
			
			
			$data['id'] 				= 1;
			$data['lg']					= $config['logo'];
			
			$data['css']				= $this->load->view('cssform',$data,true);
			$data['js']					= $this->load->view('jsform',$data,true);
			$data['content']			= $this->load->view('logo',$data,TRUE);
			$this->load->view('admin/template',$data);
			
		}
		else{
			redirect(site_url('appweb'));
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
			$config['max_size']             = 1024;
			$config['max_width']            = 5000;
			$config['max_height']           = 5000;
			$config['overwrite']            = TRUE;
			
			$this->upload->initialize($config);
			
			$image_lama	= $this->input->post('logolama');
		
			$check_file_upload= FALSE;
			if (isset($_FILES['logo']['error'])&& $_FILES['logo']['error'] != 4){
				$check_file_upload = TRUE;
			}
			if($check_file_upload && !$this->upload->do_upload('logo')) {
				$this->session->set_flashdata('error',$this->upload->display_errors('<div class="alert alert-danger"> 
				<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>'));
				redirect(site_url('appweb/config/logo'));
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
					
					$path							='./files/media/';
					$tpath							='./files/thumbnail/';
					
					$config = array(
						// Image Thumbnail
						array(
							'image_library' 		=> 'gd2',
							'source_image' 			=> $path.$img_name,
							'new_image' 			=> $tpath,
							'create_thumb' 			=> FALSE,
							'maintain_ratio' 		=> FALSE,
							'width'         		=> 150,
							'height'       			=> 60,
							)
						);
					 $this->load->library('image_lib', $config[0]);
					 foreach ($config as $item){
						$this->image_lib->initialize($item);
						if(!$this->image_lib->resize()){
							 return false;
							}
							$this->image_lib->clear();
						}
						
					$data = array(
						'logo' 				=> $img_name
					);
					@unlink('./files/media/'.$image_lama);
					@unlink('./files/thumbnail/'.$image_lama);
					
				}
				$d						= $this->db->get_where('setting',array('id_config'=>$id));
				$this->db->update('setting', $data);
				$this->session->set_flashdata('SUCCESSMSG','Logo berhasil di ubah');
				redirect(site_url('appweb/config/logo'));
			}
		}
		else{
			redirect(site_url('appweb'));
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
			$config['max_size']             = 100;
			$config['max_width']            = 300;
			$config['max_height']           = 300;
			$config['overwrite']            = TRUE;
			
			$this->upload->initialize($config);
			
			$image_lama	= $this->input->post('faviconlama');
		
			$check_file_upload= FALSE;
			if (isset($_FILES['favicon']['error'])&& $_FILES['favicon']['error'] != 4){
				$check_file_upload = TRUE;
			}
			if($check_file_upload && !$this->upload->do_upload('favicon')) {
				$this->session->set_flashdata('error',$this->upload->display_errors('<div class="alert alert-danger"> 
				<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>'));
				redirect(site_url('appweb/config'));
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
						'telepon' 			=> $this->input->post('telp'),
						'email_website' 	=> $this->input->post('email_web'),
						'website' 			=> $this->input->post('website'),
						'komentar' 			=> $this->input->post('komentar'),
						'meta_deskripsi' 	=> $this->input->post('meta_deskripsi'),
						'meta_keyword' 		=> $this->input->post('meta_keyword'),
						'facebook' 			=> $this->input->post('facebook'),
						'linkedin' 			=> $this->input->post('linkedin'),
						'twitter' 			=> $this->input->post('twitter'),
						'instagram' 		=> $this->input->post('instagram'),
						'youtube' 			=> $this->input->post('youtube'),
						);
						$id						= $this->input->post('id',null,TRUE);
			        	$d						= $this->db->get_where('setting',array('id_config'=>$id));
			  
				}
				else{
					$file_img=$this->upload->data();
					$img_name=$file_img['file_name'];
					
					$path							='./files/media/';
					$tpath							='./files/thumbnail/';
					
					$config = array(
							// Image Thumbnail
						array(
							'image_library' 		=> 'gd2',
							'source_image' 			=> $path.$img_name,
							'new_image' 			=> $tpath,
							'create_thumb' 			=> FALSE,
							'maintain_ratio' 		=> FALSE,
							'width'         		=> 64,
							'height'       			=> 64,
							)
						);
					 $this->load->library('image_lib', $config[0]);
					 foreach ($config as $item){
						$this->image_lib->initialize($item);
						if(!$this->image_lib->resize()){
							 return false;
							}
							$this->image_lib->clear();
						}
					
					$data = array(
					    'nama' 				=> ucwords($this->input->post('judul_situs')),
						'slogan' 			=> ucwords($this->input->post('slogan')),
						'deskripsi_situs' 	=> $this->input->post('deskripsi_situs'),
						'pemilik' 			=> strtoupper($this->input->post('pemilik')),
						'alamat' 			=> $this->input->post('alamat'),
						'telepon' 			=> $this->input->post('telp'),
						'email_website' 	=> $this->input->post('email_web'),
						'website' 			=> $this->input->post('website'),
						'komentar' 			=> $this->input->post('komentar'),
						'meta_deskripsi' 	=> $this->input->post('meta_deskripsi'),
						'meta_keyword' 		=> $this->input->post('meta_keyword'),
						'favicon' 			=> $img_name,
						'facebook' 			=> $this->input->post('facebook'),
						'linkedin' 			=> $this->input->post('linkedin'),
						'twitter' 			=> $this->input->post('twitter'),
						'instagram' 		=> $this->input->post('instagram'),
						'youtube' 			=> $this->input->post('youtube'),
					);
			        @unlink('./files/media/'.$image_lama);
					@unlink('./files/thumbnail/'.$image_lama);
					
						$id						= $this->input->post('id',null,TRUE);
			        	$d						= $this->db->get_where('setting',array('id_config'=>$id));
			  
				}
		          if($d->num_rows() > 0){
					$this->Config_model->update($id,$data);
					$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Update');
					redirect(site_url('appweb/config'));
				}else{
					$this->Config_model->add($data);
					$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Tambah');
					redirect(site_url('appweb/config'));
				}
			}
		}
		else{
			redirect(site_url('appweb'));
		}
	}
		
		
	function backup_db()
	{
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			// Load the DB utility class
			$this->load->dbutil();
			
			// Backup your entire database and assign it to a variable
			$prefs = array(
					'format'      => 'zip',
					'filename'    => 'backupdb_retrocms.sql',
					'newline'     => "\n"
				  );
			$backup = $this->dbutil->backup($prefs);
			
			// Load the file helper and write the file to your server
			$this->load->helper('file');
			//write_file('C:xampp/htdocs/retrocms/files/backupdb/backupdb_retrocms#'.gmdate("d-m-Y", time()+60*60*7).'.zip', $backup);
            write_file('/public_html/files/backupdb/backupdb_retrocms#'.gmdate("d-m-Y", time()+60*60*7).'.zip', $backup);
		
		
        		
			// Load the download helper and send the file to your desktop
			$this->load->helper('download');
			force_download('backupdb_retrocms#'.gmdate("d-m-Y", time()+60*60*7).'.zip', $backup); 
		}
		else{
			redirect(site_url('appweb'));
		}
	}
}
?>