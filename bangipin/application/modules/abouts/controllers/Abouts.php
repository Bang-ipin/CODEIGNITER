<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Abouts extends CI_Controller {
	
	public function index(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$data['title']				= 'About Us';
			
			$abouts						= $this->About_model->Get_Data();
			$config						= $this->Config_model->Get_All();
			$data['logo']				= $config['logo'];
			$data['situs']				= $config['nama'];
			$data['author']				= $config['pemilik'];
			$data['favicon']			= $config['favicon'];
			$data['tema']				= $config['tema'];
			
			if(empty($abouts['id_about'])){
				$data['id']				= $this->About_model->kode_otomatis();
			}
			else{
				$data['id']				= 1;
			}
			$data['deskripsi1']			= $abouts['deskripsi1'];
			$data['deskripsi2']			= $abouts['deskripsi2'];
			$data['gambar']				= $abouts['gambar'];
			$data['judul1']				= $abouts['judul1'];
			$data['judul2']				= $abouts['judul2'];
			$data['judul3']				= $abouts['judul3'];
			$data['text1']				= $abouts['text1'];
			$data['text2']				= $abouts['text2'];
			$data['text3']				= $abouts['text3'];
			$data['css']				= $this->load->view('css',$data,true);
			$data['js']					= $this->load->view('js',$data,true);
			$data['content']			= $this->load->view('form',$data,TRUE);
			
			$this->load->view('admin/template',$data);
		}	
		else{
			redirect(site_url('appweb'));
		}
	}
	
	public function simpan() {
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			date_default_timezone_set('Asia/Jakarta');
			$deskripsi1				= $this->input->post('deskripsi1',null,TRUE);
			$deskripsi2				= $this->input->post('deskripsi2',null,TRUE); 
			$judul1					= $this->input->post('judul1',null,TRUE); 
			$judul2					= $this->input->post('judul2',null,TRUE); 
			$judul3					= $this->input->post('judul3',null,TRUE); 
			$text1					= $this->input->post('text1',null,TRUE); 
			$text2					= $this->input->post('text2',null,TRUE); 
			$text3					= $this->input->post('text3',null,TRUE); 
				
			$path							='./files/media/';
			$nm_img							='about-'.trim(substr(md5(rand()),0,4));
			$config['upload_path']          = $path;
			$config['allowed_types']        = 'jpg|jpeg|png';
			$config['file_name']            = $nm_img;
			$config['max_size']             = 712;
			$config['max_width']            = 5000;;
			$config['max_height']           = 5000;;
			$config['overwrite']            = TRUE;
			
			$this->upload->initialize($config);
			
			$image_lama	= $this->input->post('gambarlama');
		
			$check_file_upload= FALSE;
			if (isset($_FILES['gambar']['error'])&& $_FILES['gambar']['error'] != 4){
				$check_file_upload = TRUE;
			}
			if($check_file_upload && !$this->upload->do_upload('gambar')) {
				$this->session->set_flashdata('error',$this->upload->display_errors('<div class="alert alert-danger"> 
				<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>'));
				redirect(site_url('appweb/linkabout'));
			} 
			else {
				
				if(!$this->upload->do_upload('gambar'))
				{
				$data = array(
					'deskripsi1' 		=> ucwords($this->input->post('deskripsi1')),
					'deskripsi2' 		=> ucwords($this->input->post('deskripsi2')),
					'judul1' 			=> $this->input->post('judul1'),
					'judul2' 			=> $this->input->post('judul2'),
					'judul3' 			=> $this->input->post('judul3'),
					'text1' 			=> $this->input->post('text1'),
					'text2' 			=> $this->input->post('text2'),
					'text3' 			=> $this->input->post('text3'),
					);
					$id					= $this->input->post('id',null,TRUE);
					$d					= $this->db->get_where('about',array('id_about'=>$id));
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
					
					
					$data = array(
						'deskripsi1' 		=> $this->input->post('deskripsi1'),
						'deskripsi2' 		=> $this->input->post('deskripsi2'),
						'judul1' 			=> $this->input->post('judul1'),
						'judul2' 			=> $this->input->post('judul2'),
						'judul3' 			=> $this->input->post('judul3'),
						'text1' 			=> $this->input->post('text1'),
						'text2' 			=> $this->input->post('text2'),
						'text3' 			=> $this->input->post('text3'),
						'gambar'			=> $img_name
					);
					
					@unlink('./files/media/'.$image_lama);
					@unlink('./files/thumbnail/'.$image_lama);
					$id						= $this->input->post('id',null,TRUE);
					$d						= $this->db->get_where('about',array('id_about'=>$id));
				}
				if($d->num_rows() > 0){
					$this->About_model->update($id,$data);
					$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Update');
					redirect(site_url('appweb/linkabout'));
				}else{
					$this->About_model->add($data);
					$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Tambah');
					redirect(site_url('appweb/linkabout'));
				}
			}
		}
		else{
			redirect(site_url('appweb'));
		}		
	}
	
}