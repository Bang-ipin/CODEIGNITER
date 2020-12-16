<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Testimoni extends CI_Controller {
	
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
				'title'				=> 'List Testimoni',
			);
			$data['css']			= $this->load->view('css',$data,true);
			$data['js']				= $this->load->view('js',$data,true);
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
			
			$data['title'] 			= 'Add&nbsp;Testimoni';
			$data['logo']			= $config['logo'];
			$data['author']			= $config['pemilik'];
			$data['favicon']  		= $config['favicon'];
			$data['situs']			= $config['nama'];
			
			$data['id']				='';
			$data['namaclient']		='';
			$data['emailclient']	='';
			$data['perusahaan']		='';
			$data['testimoni']		='';
			$data['img']			='';
			
			
			$data['css']			= $this->load->view('cssform',$data,true);
			$data['js']				= $this->load->view('jsform',$data,true);
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
			
			$text 	= "SELECT * FROM testimoni WHERE id = '$id'";
			$sql	= $this->db->query($text);
			
			if($sql->num_rows() > 0){
				
				foreach($sql->result() as $db){
					$data['id']				=$id;
					$data['namaclient']		=$db->namaclient;
					$data['emailclient']	=$db->emailclient;
					$data['perusahaan']		=$db->perusahaan;
					$data['testimoni']		=$db->testimoni;
					$data['image']			=$db->gambar;
					
				
				}
			}
			else{
					$data['id']				=$id;
					$data['namaclient']		='';
					$data['emailclient']	='';
					$data['perusahaan']		='';
					$data['testimoni']		='';
					$data['image']			='';
					
			}
			
			$config=$this->Config_model->Get_All();
			
			$data['title'] 					= 'Edit&nbsp;Testimoni';
			$data['logo']					= $config['logo'];
			$data['author']					= $config['pemilik'];
			$data['favicon']  				= $config['favicon'];
			$data['situs']					= $config['nama'];
		
			$data['css']					= $this->load->view('cssform',$data,true);
			$data['js']						= $this->load->view('jsform',$data,true);
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
			
			$nama					= $this->input->post('namaclient',null,TRUE);
			$email					= $this->input->post('emailclient',null,TRUE);
			$perusahaan				= $this->input->post('perusahaan',null,TRUE);
			$testimoni				= $this->input->post('testimoni',null,TRUE);

			$path							='./files/media/';
			$nm_img							='testi-'.trim(substr(md5(rand()),0,4));
			$config['upload_path']          = $path;
			$config['allowed_types']        = 'jpg|jpeg|png';
			$config['file_name']            = $nm_img;
			$config['max_size']             = 1024;
			$config['max_width']            = 1024;;
			$config['max_height']           = 1024;;
			$config['overwrite']            = TRUE;
			
			$this->upload->initialize($config);
			
			$image_lama	= $this->input->post('imagelama');
		
			$check_file_upload= FALSE;
			if (isset($_FILES['image']['error'])&& $_FILES['image']['error'] != 4){
				$check_file_upload = TRUE;
			}
			if($check_file_upload && !$this->upload->do_upload('image')) {
				$this->session->set_flashdata('error',$this->upload->display_errors('<div class="alert alert-danger"> 
				<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>'));
				redirect(site_url('appweb/testimoni'));
			} 
			else 
			{
				
				if(!$this->upload->do_upload('image'))
				{
					
					$data['namaclient']		= $nama;
					$data['emailclient']	= $email;
					$data['perusahaan']		= $perusahaan;
					$data['testimoni']		= $testimoni;
										
					$id						= $this->input->post('id',null,TRUE);
					$d						= $this->db->get_where('testimoni',array('id'=>$id));
				}
				else{
					$file_img				= $this->upload->data();
					$img_name				= $file_img['file_name'];
					
					$path							='./files/media/';
					$tpath							='./files/thumbnail/';
					
					$config['image_library'] 		= 'gd2';
					$config['source_image'] 		= $path.$img_name;
					$config['new_image'] 			= $tpath;
					$config['create_thumb'] 		= FALSE;
					$config['maintain_ratio'] 		= FALSE;
					$config['width']         		= 320;
					$config['height']       		= 180;
					
					$this->image_lib->initialize($config);
					$this->image_lib->resize();
					
					$data['namaclient']		= $nama;
					$data['emailclient']	= $email;
					$data['perusahaan']		= $perusahaan;
					$data['testimoni']		= $testimoni;
					$data['gambar']			= $img_name;
					
					@unlink('./files/media/'.$image_lama);
					@unlink('./files/thumbnail/'.$image_lama);
					$id						= $this->input->post('id',null,TRUE);
					$d						= $this->db->get_where('testimoni',array('id'=>$id));
				
					
				}
				if($d->num_rows() > 0){
					$this->Testimoni_model->update($id,$data);
					$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Update');
					redirect(site_url('appweb/testimoni'));
				}else{
					$this->Testimoni_model->add($data);
					$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Tambah');
					redirect(site_url('appweb/testimoni'));
				}
			}
		
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
			$query=$this->Testimoni_model->get_data_by_id($id);
			foreach($query as $rows ){
				@unlink('./files/media/'.$rows->gambar);
				@unlink('./files/thumbnail/'.$rows->gambar);
			}
			$this->Testimoni_model->hapus($id);
			$this->session->set_flashdata('SUCCESSMSG','Data berhasil di hapus!!');
			redirect(site_url('appweb/testimoni'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
}
	
	