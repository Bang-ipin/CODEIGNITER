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
			redirect(site_url('administrator'));
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
			redirect(site_url('administrator'));
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
			redirect(site_url('administrator'));
		}
	}

	public function simpan(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			date_default_timezone_set('Asia/Jakarta');
			$path							='./files/gallery/';
			$nm_img							='gal-'.trim(substr(md5(rand()),0,4));
			$config['upload_path']          = $path;
			$config['file_name']            = $nm_img;
			$config['allowed_types']        = 'jpg|jpeg|png|';
			$config['max_size']             = 2048;
			$config['max_width']            = 5000;
			$config['max_height']           = 5000;
			$config['overwrite']            = TRUE;
			
			$this->upload->initialize($config);
			
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
				redirect(site_url('administrator/landingpage-gallery/add'));
			} else{
				if(!$this->upload->do_upload('image')){
					$data['judul']			= $judul;
				
				}
				else{
					$file_upload 			= $this->upload->data();
					$file_name				= $file_upload['file_name'];
					
					$data['judul']			= $judul;
					$data['gambar']			= $file_name;
					
					@unlink('./files/gallery/'.$file_lama);
				}
			
				$id						= $this->input->post('id',null,TRUE);
				$d						= $this->db->get_where('gallery',array('id'=>$id));
				if($d->num_rows() > 0){
					$this->Gallery_model->update($id,$data);
					$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Update');
					redirect(site_url('administrator/landingpage-gallery'));
				}else{
					$this->Gallery_model->add($data);
					$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Tambah');
					redirect(site_url('administrator/landingpage-gallery'));
				}
			}
		}
		else{
			redirect(site_url('administrator'));
		}
	}
	
	public function status($id,$status) 
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$this->Gallery_model->status($id,$status);
			$this->session->set_flashdata('SUCCESSMSG','Status berhasil di update!!');
			redirect(site_url('administrator/landingpage-gallery'));
		}
		else{
			redirect(site_url('administrator'));
		}
	}
	
	public function hapus($id) 
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			$query=$this->Gallery_model->get_data_by_id($id);
			foreach($query as $rows ){
				@unlink('./files/gallery/'.$rows->gambar);
			}
			$this->Gallery_model->hapus($id);
			$this->session->set_flashdata('SUCCESSMSG','Data berhasil di hapus!!');
			redirect(site_url('administrator/landingpage-gallery'));
		}
		else{
			redirect(site_url('administrator'));
		}
	}
	
}
	
	