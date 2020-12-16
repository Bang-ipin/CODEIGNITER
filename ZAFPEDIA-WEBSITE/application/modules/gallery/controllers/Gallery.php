<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Gallery extends CI_Controller {
	
	public function index()
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$config=$this->Config_model->Get_All();
			$data=array(
				'logo'				=> $config['logo'],
				'author'			=> $config['pemilik'],
				'favicon'			=> $config['favicon'],
				'situs'				=> $config['nama'],
				'title'				=> 'List Gallery',
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
	
	public function add()
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			$config=$this->Config_model->Get_All();
			
			$data['title'] 			= 'Add&nbsp;File&nbsp;Gallery';
			$data['logo']			= $config['logo'];
			$data['author']			= $config['pemilik'];
			$data['favicon']  		= $config['favicon'];
			$data['situs']			= $config['nama'];
			
			$data['id']				='';
			$data['judul']			='';
			$data['image']			='';
			
			
			$data['css']			= $this->load->view('cssform',$data,true);
			$data['js']				= $this->load->view('jsform',$data,true);
			$data['script']			= $this->load->view('scriptform',$data,true);
			$data['content']		= $this->load->view('form',$data,TRUE);
			
			$this->load->view('admin/template',$data);
		
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
	public function edit($id)
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$text 	= "SELECT * FROM gallery WHERE id = '$id'";
			$sql	= $this->db->query($text);
			
			if($sql->num_rows() > 0){
				
				foreach($sql->result() as $db){
					$data['id']				=$id;
					$data['judul']			=$db->judul;
					$data['image']			=$db->gambar;
					
				
				}
			}
			else{
					$data['id']				=$id;
					$data['judul']			='';
					$data['image']			='';
					
			}
			
			$config=$this->Config_model->Get_All();
			
			$data['title'] 					= 'Edit&nbsp;File&nbsp;Gallery';
			$data['logo']					= $config['logo'];
			$data['author']					= $config['pemilik'];
			$data['favicon']  				= $config['favicon'];
			$data['situs']					= $config['nama'];
		
			$data['css']					= $this->load->view('cssform',$data,true);
			$data['js']						= $this->load->view('jsform',$data,true);
			$data['script']					= $this->load->view('scriptform',$data,true);
			$data['content']				= $this->load->view('form',$data,TRUE);
			
			$this->load->view('admin/template',$data);
		}
		else{
			redirect(site_url('appweb'));
		}
	}

	public function simpan(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			date_default_timezone_set('Asia/Jakarta');
			$path							='./files/media/';
			$nm_img							='gal-'.trim(substr(md5(rand()),0,4));
			$config['upload_path']          = $path;
			$config['file_name']            = $nm_img;
			$config['allowed_types']        = 'jpg|jpeg|png|';
			$config['max_size']             = 1024;
			$config['max_width']	        = 1024;
			$config['max_height']	        = 1024;
			$config['overwrite']            = TRUE;
			
			$this->upload->initialize($config);
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			
			$file_lama				= $this->input->post('imagelama');
			
			$judul					= $this->input->post('judul',null,TRUE);
			$image					= $this->input->post('image',null,true);
			$check_file_upload= FALSE;
			if (isset($_FILES['image']['error'])&& $_FILES['image']['error'] != 4){
				$check_file_upload = TRUE;
			}
			if($check_file_upload && !$this->upload->do_upload('image')) {
				$this->session->set_flashdata('error',$this->upload->display_errors('<div class="alert alert-danger"> 
				<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>'));
				redirect(site_url('appweb/gallery/add'));
			} else{
				if(!$this->upload->do_upload('image')){
					$data['judul']			= $judul;
				
				}
				else{
					$file_upload 			= $this->upload->data();
					$img_name				= $file_upload['file_name'];
					
					$path							='./files/media/';
					$tpath							='./files/thumbnail/';
					$mpath							='./files/medium/';
					
					$config = array(
						// Image Medium
						array(
							'image_library' 		=> 'gd2',
							'source_image' 			=> $path.$img_name,
							'new_image' 			=> $mpath,
							'create_thumb' 			=> FALSE,
							'maintain_ratio' 		=> FALSE,
							'width'         		=> 400,
							'height'       			=> 400,
							),
						// Image Thumbnail
						array(
							'image_library' 		=> 'gd2',
							'source_image' 			=> $path.$img_name,
							'new_image' 			=> $tpath,
							'create_thumb' 			=> FALSE,
							'maintain_ratio' 		=> FALSE,
							'width'         		=> 150,
							'height'       			=> 150,
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
					$data['judul']			= $judul;
					$data['gambar']			= $img_name;
					
					@unlink('./files/media/'.$file_lama);
					@unlink('./files/medium/'.$file_lama);
					@unlink('./files/thumbnail/'.$file_lama);
				}
			
				$id						= $this->input->post('id',null,TRUE);
				$d						= $this->db->get_where('gallery',array('id'=>$id));
				if($d->num_rows() > 0){
					$this->Gallery_model->update($id,$data);
					$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Update');
					redirect(site_url('appweb/gallery'));
				}else{
					$this->Gallery_model->add($data);
					$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Tambah');
					redirect(site_url('appweb/gallery'));
				}
			}
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
	public function status($id,$status) 
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$this->Gallery_model->status($id,$status);
			$this->session->set_flashdata('SUCCESSMSG','Status berhasil di update!!');
			redirect(site_url('appweb/gallery'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
	public function hapus($id) 
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			$query=$this->Gallery_model->get_data_by_id($id);
			foreach($query as $rows ){
				@unlink('./files/media/'.$rows->gambar);
				@unlink('./files/medium/'.$rows->gambar);
				@unlink('./files/thumbnail//'.$rows->gambar);
			}
			$this->Gallery_model->hapus($id);
			$this->session->set_flashdata('SUCCESSMSG','Data berhasil di hapus!!');
			redirect(site_url('appweb/gallery'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
}
	
	