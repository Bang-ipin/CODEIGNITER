<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Themes extends CI_Controller {

	public function index() 
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$data['title']				= 'Themes';
			
			$config						= $this->Config_model->Get_All();
			$data['logo']				= $config['logo'];
			$data['author']				= $config['pemilik'];
			$data['favicon']			= $config['favicon'];
			$data['situs']				= $config['nama'];
			
			$data['css']				= $this->load->view('css',$data,true);
			$data['js']					= $this->load->view('js',$data,true);
			
			$data['content']			= $this->load->view('list',$data,true);
			$this->load->view('admin/template',$data);
			
		}
		else{
			redirect(site_url('appweb'));
		}
	}

	public function add(){
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$config=$this->Config_model->Get_All();
			$data=array(
				'id'			=> '',
				'themes'		=> '',
				'status'		=> '',
				'img'			=> '',
				
				'logo'			=> $config['logo'],
				'author'		=> $config['pemilik'],
				'favicon'		=> $config['favicon'],
				'situs'			=> $config['nama'],
				'title'			=> 'Tambah Tema',
				'dd_status'		=> $this->Site_model->dd_status(),
			);
			$data['css']		= $this->load->view('cssform',$data,true);
			$data['js']			= $this->load->view('jsform',$data,true);
			
			$data['content']= $this->load->view('form',$data,TRUE);
			$this->load->view('admin/template',$data);
		}
		else{
			redirect(site_url('appweb'));
		}
	}
		
	public function edit($id){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$text 	= "SELECT * FROM tema WHERE id='$id'";
			$sql	= $this->db->query($text);
			if($sql->num_rows() > 0){
				
				foreach($sql->result() as $db){
					$data['id']				=$id;
					$data['themes']			=$db->tema;
					$data['status']			=$db->status;
					$data['image']			=$db->image;
					
				}
			}
			else{
					$data['id']				=$id;
					$data['themes']			='';
					$data['status']			='';
					$data['image']			='';
			}
			
			$config=$this->Config_model->Get_All();
			$data['title']			= 'Edit Tema';
			$data['logo']			= $config['logo'];
			$data['author']			= $config['pemilik'];
			$data['favicon']		= $config['favicon'];
			$data['situs']			= $config['nama'];
			$data['dd_status']		= $this->Site_model->dd_status();
			
			$data['css']			= $this->load->view('cssform',$data,true);
			$data['js']				= $this->load->view('jsform',$data,true);
			
			$data['content']= $this->load->view('form',$data,TRUE);
			$this->load->view('admin/template',$data);
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
	public function simpan(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			$path							='./assets/admin/img/';
			$nm_img							='themes-'.trim(substr(md5(rand()),0,4));
			$config['upload_path']          = $path;
			$config['file_name']            = $nm_img;
			$config['allowed_types']        = 'jpg|jpeg|png|';
			$config['max_size']             = 1024;
			$config['max_width']	        = 5000;
			$config['max_height']	        = 5000;
			$config['overwrite']            = TRUE;
			
			$this->upload->initialize($config);
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			
			$file_lama				= $this->input->post('imagelama');
			
			$tema					= strtolower($this->input->post('themes',null,TRUE));
			$status					= $this->input->post('status',null,TRUE); 
			$check_file_upload= FALSE;
			if (isset($_FILES['image']['error'])&& $_FILES['image']['error'] != 4){
				$check_file_upload = TRUE;
			}
			if($check_file_upload && !$this->upload->do_upload('image')) {
				$this->session->set_flashdata('error',$this->upload->display_errors('<div class="alert alert-danger"> 
				<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>'));
				redirect(site_url('appweb/themes'));
			} else{
				if(!$this->upload->do_upload('image')){
					
					$data['tema']			= $tema;
					$data['status']			= $status; 
					//$data['image']		= $this->input->post('image',null,TRUE); 
						
					$id						= $this->input->post('id',null,TRUE);
					$d						= $this->db->get_where('tema',array('id'=>$id));
				}
				else{
					$file_upload 			= $this->upload->data();
					$img_name				= $file_upload['file_name'];
					
					$path							='./assets/admin/img/';
					$config['image_library'] 		= 'gd2';
					$config['source_image'] 		= $path.$img_name;
					$config['create_thumb'] 		= FALSE;
					$config['maintain_ratio'] 		= FALSE;
					$config['width']         		= 150;
					$config['height']       		= 150;
					$this->image_lib->initialize($config);
					$this->image_lib->resize();
					
					$data['tema']			= $tema;
					$data['status']			= $status; 
					$data['image']			= $img_name;
					
					@unlink('./assets/admin/img/'.$file_lama);
						
					$id						= $this->input->post('id',null,TRUE);
					$d						= $this->db->get_where('tema',array('id'=>$id));
				}
			}
			if($d->num_rows() > 0){
				$this->Tema_model->update_tema($id,$data);
				$this->session->set_flashdata('SUCCESSMSG','Tema Berhasil Di Update');
				redirect(site_url('appweb/themes'));
			}
			else{
				$this->Tema_model->add_tema($data);
				$this->session->set_flashdata('SUCCESSMSG','Tema Berhasil Di Tambah');
				redirect(site_url('appweb/themes'));
			}
		}
		else{
			redirect(site_url('appweb'));
		}		
	}
	
	public function background() 
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$data['title']				= 'Background Tema';
			
			$config						= $this->Config_model->Get_All();
			$data['id']					= $config['id_config'];
			$data['logo']				= $config['logo'];
			$data['author']				= $config['pemilik'];
			$data['favicon']			= $config['favicon'];
			$data['tematerpilih']		= $config['tema'];
			$data['situs']				= $config['nama'];
			
			
			$data['pilihtema']			= $this->Tema_model->get_tema();
			$data['dd_tema']			= $this->Tema_model->dd_tema();
			
			$data['css']				= $this->load->view('css',$data,true);
			$data['js']					= $this->load->view('js',$data,true);
			
			$data['content']			= $this->load->view('background',$data,TRUE);
			$this->load->view('admin/template',$data);
			
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
	public function hapus() 
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			$id=$this->input->post('id');
			$query=$this->Tema_model->get_blog_by_id($id);
			foreach($query as $rows ){
				@unlink('./assets/admin/img/'.$rows->gambar);
			}
			$this->Tema_model->hapus_tema($id);
			$this->session->set_flashdata('SUCCESSMSG','Themes Deleted Successfully!!');
			redirect(site_url('appweb/themes'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
	public function save(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$id						= $this->input->post('id',null,TRUE);
			$data['tema']			= $this->input->post('tema',null,TRUE); 
				
			$d						= $this->db->get_where('setting',array('id_config'=>$id));
			if($d->num_rows() > 0){
				$this->Tema_model->update_background($id,$data);
				$this->session->set_flashdata('SUCCESSMSG','Tema berhasil di pilih');
				redirect(site_url('appweb/themes/background'));
			}
		}
		else{
			redirect(site_url('appweb'));
		}
	}
}
?>