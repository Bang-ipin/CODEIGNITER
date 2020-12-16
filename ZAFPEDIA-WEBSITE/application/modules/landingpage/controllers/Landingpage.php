<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landingpage extends CI_Controller {

	public function index() 
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$data['title']				= 'Landing Page';
			
			$config						= $this->Config_model->Get_All();
			$landing					= $this->Landingpage_model->Get_Data();
			
			$data['logo']				= $config['logo'];
			$data['situs']				= $config['nama'];
			$data['author']				= $config['pemilik'];
			$data['favicon']			= $config['favicon'];
			
			if(empty($landing['id'])){
				$data['id']				= $this->Landingpage_model->kode_otmts();
			}
			else{
				$data['id']				= 1;
			}
			$data['judul']				= $landing['judul'];
			$data['deskripsi']			= $landing['deskripsi'];
			$data['link']				= $landing['link'];
			$data['textlink']			= $landing['text_link'];
			$data['fonticon1']			= $landing['fonticon1'];
			$data['fonticon2']			= $landing['fonticon2'];
			$data['fonticon3']			= $landing['fonticon3'];
			$data['namafeatures1']		= $landing['title_features1'];
			$data['namafeatures2']		= $landing['title_features2'];
			$data['namafeatures3']		= $landing['title_features3'];
			$data['deskripsi1']			= $landing['deskripsi1'];
			$data['deskripsi2']			= $landing['deskripsi2'];
			$data['deskripsi3']			= $landing['deskripsi3'];
			$data['link1']				= $landing['link1'];
			$data['link2']				= $landing['link2'];
			$data['link3']				= $landing['link3'];
			$data['textlink1']			= $landing['text_link1'];
			$data['textlink2']			= $landing['text_link2'];
			$data['textlink3']			= $landing['text_link3'];
			
			$data['css']				= $this->load->view('cssform',$data,true);
			$data['js']					= $this->load->view('jsform',$data,true);
			$data['script']				= $this->load->view('scriptform',$data,true);
			$data['content']			= $this->load->view('form',$data,TRUE);
			
			$this->load->view('admin/template',$data);
			
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
	public function home() 
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$data['title']				= 'Landing Page Home';
			
			$config						= $this->Config_model->Get_All();
			$landing					= $this->Landingpage_model->Get_Data();
			
			$data['logo']				= $config['logo'];
			$data['situs']				= $config['nama'];
			$data['author']				= $config['pemilik'];
			$data['favicon']			= $config['favicon'];
			
			if(empty($landing['id'])){
				$data['id']				= $this->Landingpage_model->kode_otmts();
			}
			else{
				$data['id']				= 1;
			}
			$data['judul']				= $landing['judul'];
			$data['deskripsi']			= $landing['deskripsi'];
			$data['link']				= $landing['link'];
			$data['textlink']			= $landing['text_link'];
			$data['image']				= $landing['bghome'];
			
			$data['css']				= $this->load->view('cssform',$data,true);
			$data['js']					= $this->load->view('jsform',$data,true);
			$data['script']				= $this->load->view('scriptform',$data,true);
			$data['content']			= $this->load->view('home',$data,TRUE);
			
			$this->load->view('admin/template',$data);
			
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	public function features() 
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$data['title']				= 'Landing Page Features';
			
			$config						= $this->Config_model->Get_All();
			$landing					= $this->Landingpage_model->Get_Data();
			
			$data['logo']				= $config['logo'];
			$data['situs']				= $config['nama'];
			$data['author']				= $config['pemilik'];
			$data['favicon']			= $config['favicon'];
			
			if(empty($landing['id'])){
				$data['id']				= $this->Landingpage_model->kode_otmts();
			}
			else{
				$data['id']				= 1;
			}
			$data['fonticon1']			= $landing['fonticon1'];
			$data['fonticon2']			= $landing['fonticon2'];
			$data['fonticon3']			= $landing['fonticon3'];
			$data['namafeatures1']		= $landing['title_features1'];
			$data['namafeatures2']		= $landing['title_features2'];
			$data['namafeatures3']		= $landing['title_features3'];
			$data['deskripsi1']			= $landing['deskripsi1'];
			$data['deskripsi2']			= $landing['deskripsi2'];
			$data['deskripsi3']			= $landing['deskripsi3'];
			$data['link1']				= $landing['link1'];
			$data['link2']				= $landing['link2'];
			$data['link3']				= $landing['link3'];
			$data['textlink1']			= $landing['text_link1'];
			$data['textlink2']			= $landing['text_link2'];
			$data['textlink3']			= $landing['text_link3'];
			
			$data['css']				= $this->load->view('cssform',$data,true);
			$data['js']					= $this->load->view('jsform',$data,true);
			$data['script']				= $this->load->view('scriptform',$data,true);
			$data['content']			= $this->load->view('features',$data,TRUE);
			
			$this->load->view('admin/template',$data);
			
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	public function app() 
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$data['title']				= 'Landing Page App';
			
			$config						= $this->Config_model->Get_All();
			$landing					= $this->Landingpage_model->Get_Data();
			
			$data['logo']				= $config['logo'];
			$data['situs']				= $config['nama'];
			$data['author']				= $config['pemilik'];
			$data['favicon']			= $config['favicon'];
			
			if(empty($landing['id'])){
				$data['id']				= $this->Landingpage_model->kode_otmts();
			}
			else{
				$data['id']				= 1;
			}
			$data['appicon1']			= $landing['appicon1'];
			$data['appicon2']			= $landing['appicon2'];
			$data['appicon3']			= $landing['appicon3'];
			//$data['appicon4']			= $landing['appicon4'];
			$data['appfeatures1']		= $landing['appfeatures1'];
			$data['appfeatures2']		= $landing['appfeatures2'];
			$data['appfeatures3']		= $landing['appfeatures3'];
			//$data['appfeatures4']		= $landing['appfeatures4'];
			$data['appdeskripsi1']		= $landing['appdeskripsi1'];
			$data['appdeskripsi2']		= $landing['appdeskripsi2'];
			$data['appdeskripsi3']		= $landing['appdeskripsi3'];
			//$data['appdeskripsi4']		= $landing['appdeskripsi4'];
			//$data['image']				= $landing['imageapp'];
			
			$data['css']				= $this->load->view('cssform',$data,true);
			$data['js']					= $this->load->view('jsform',$data,true);
			$data['script']				= $this->load->view('scriptform',$data,true);
			$data['content']			= $this->load->view('app',$data,TRUE);
			
			$this->load->view('admin/template',$data);
			
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	public function video() 
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$data['title']				= 'Landing Page Video';
			
			$config						= $this->Config_model->Get_All();
			$landing					= $this->Landingpage_model->Get_Data();
			
			$data['logo']				= $config['logo'];
			$data['situs']				= $config['nama'];
			$data['author']				= $config['pemilik'];
			$data['favicon']			= $config['favicon'];
			
			if(empty($landing['id'])){
				$data['id']				= $this->Landingpage_model->kode_otmts();
			}
			else{
				$data['id']				= 1;
			}
			$data['judulvideo']			= $landing['judulvideo'];
			$data['deskripsivideo']		= $landing['deskripsivideo'];
			$data['image']				= $landing['backgroundvideo'];
			$data['idyoutube']			= $landing['idyoutube'];
			
			$data['css']				= $this->load->view('cssform',$data,true);
			$data['js']					= $this->load->view('jsform',$data,true);
			$data['script']				= $this->load->view('scriptform',$data,true);
			$data['content']			= $this->load->view('video',$data,TRUE);
			
			$this->load->view('admin/template',$data);
			
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	public function gallery() 
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$data['title']				= 'Landing Page Gallery';
			
			$config						= $this->Config_model->Get_All();
			$landing					= $this->Landingpage_model->Get_Data();
			
			$data['logo']				= $config['logo'];
			$data['situs']				= $config['nama'];
			$data['author']				= $config['pemilik'];
			$data['favicon']			= $config['favicon'];
			
			if(empty($landing['id'])){
				$data['id']				= $this->Landingpage_model->kode_otmts();
			}
			else{
				$data['id']				= 1;
			}
			$data['judulvideo']			= $landing['judulvideo'];
			$data['deskripsivideo']		= $landing['deskripsivideo'];
			$data['image']				= $landing['backgroundvideo'];
			
			$data['css']				= $this->load->view('cssform',$data,true);
			$data['js']					= $this->load->view('jsform',$data,true);
			$data['script']				= $this->load->view('scriptform',$data,true);
			
			$data['tampilgallery']		= $this->load->view('listgallery',$data,true);
			$data['content']			= $this->load->view('gallery',$data,TRUE);
			
			$this->load->view('admin/template',$data);
			
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	public function testimoni() 
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$data['title']				= 'Landing Page Testimoni';
			
			$config						= $this->Config_model->Get_All();
			$landing					= $this->Landingpage_model->Get_Data();
			
			$data['logo']				= $config['logo'];
			$data['situs']				= $config['nama'];
			$data['author']				= $config['pemilik'];
			$data['favicon']			= $config['favicon'];
			
			if(empty($landing['id'])){
				$data['id']				= $this->Landingpage_model->kode_otmts();
			}
			else{
				$data['id']				= 1;
			}
			$data['emailclient']		= $landing['emailclient'];
			$data['testimoni']			= $landing['testimoni'];
			$data['nama']				= $landing['namaclient'];
			
			$data['css']				= $this->load->view('cssform',$data,true);
			$data['js']					= $this->load->view('jsform',$data,true);
			$data['script']				= $this->load->view('scriptform',$data,true);
			$data['content']			= $this->load->view('testimoni',$data,TRUE);
			
			$this->load->view('admin/template',$data);
			
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	public function simpan(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
		
			$data['judul'] 			= $this->input->post('judul');
			$data['deskripsi'] 		= $this->input->post('deskripsi');
			$data['link'] 			= $this->input->post('link');
			$data['text_link'] 		= $this->input->post('textlink');
			$data['fonticon1'] 		= $this->input->post('fonticon1');
			$data['title_features1']= $this->input->post('namafeatures1');
			$data['deskripsi1'] 	= $this->input->post('deskripsi1');
			$data['link1'] 			= $this->input->post('link1');
			$data['text_link1'] 	= $this->input->post('textlink1');
			$data['fonticon2'] 		= $this->input->post('fonticon2');
			$data['title_features2']= $this->input->post('namafeatures2');
			$data['deskripsi2'] 	= $this->input->post('deskripsi2');
			$data['link2'] 			= $this->input->post('link2');
			$data['text_link2'] 	= $this->input->post('textlink2');
			$data['fonticon3'] 		= $this->input->post('fonticon3');
			$data['title_features3']= $this->input->post('namafeatures3');
			$data['deskripsi3'] 	= $this->input->post('deskripsi3');
			$data['link3'] 			= $this->input->post('link3');
			$data['text_link3'] 	= $this->input->post('textlink3');
				
			$id						= $this->input->post('id',null,TRUE);
			$d						= $this->db->get_where('landingpage',array('id'=>$id));
			
			if($d->num_rows() > 0){
				$this->Landingpage_model->update($id,$data);
				$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Update');
				redirect(site_url('appweb/landingpage'));
			}
			else{
				$this->Landingpage_model->add($data);
				$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Tambah');
				redirect(site_url('appweb/landingpage'));
			}
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	public function simpan_home(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$path							='./files/media/';
			$nm_img							='home-'.trim(substr(md5(rand()),0,4));
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
				redirect(site_url('appweb/landingpage-home'));
			} 
			else {
				
				if(!$this->upload->do_upload('image'))
				{
					$data['judul'] 			= $this->input->post('judul');
					$data['deskripsi'] 		= $this->input->post('deskripsi');
					$data['link'] 			= $this->input->post('link');
					$data['text_link'] 		= $this->input->post('textlink');
						
					$id						= $this->input->post('id',null,TRUE);
					$d						= $this->db->get_where('landingpage',array('id'=>$id));
				}
				else{
					$file_img=$this->upload->data();
					$img_name=$file_img['file_name'];
					
					$path							='./files/media/';
					$tpath							='./files/thumbnail/';
					$config['image_library'] 		= 'gd2';
					$config['source_image'] 		= $path.$img_name;
					$config['new_image'] 			= $tpath;
					$config['create_thumb'] 		= FALSE;
					$config['maintain_ratio'] 		= FALSE;
					$config['width']         		= 80;
					$config['height']       		= 80;
					$this->image_lib->initialize($config);
					$this->image_lib->resize();
					
					$data['judul'] 			= $this->input->post('judul');
					$data['deskripsi'] 		= $this->input->post('deskripsi');
					$data['link'] 			= $this->input->post('link');
					$data['text_link'] 		= $this->input->post('textlink');
					$data['bghome'] 		= $img_name;
					
					@unlink('./files/media/'.$image_lama);					
					$id						= $this->input->post('id',null,TRUE);
					$d						= $this->db->get_where('landingpage',array('id'=>$id));
				
				}
				if($d->num_rows() > 0){
					$this->Landingpage_model->update($id,$data);
					$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Update');
					redirect(site_url('appweb/landingpage-home'));
				}
				else{
					$this->Landingpage_model->add($data);
					$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Tambah');
					redirect(site_url('appweb/landingpage-home'));
				}
			}
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	public function simpan_features(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
		
			$data['fonticon1'] 		= $this->input->post('fonticon1');
			$data['title_features1']= $this->input->post('namafeatures1');
			$data['deskripsi1'] 	= $this->input->post('deskripsi1');
			$data['link1'] 			= $this->input->post('link1');
			$data['text_link1'] 	= $this->input->post('textlink1');
			$data['fonticon2'] 		= $this->input->post('fonticon2');
			$data['title_features2']= $this->input->post('namafeatures2');
			$data['deskripsi2'] 	= $this->input->post('deskripsi2');
			$data['link2'] 			= $this->input->post('link2');
			$data['text_link2'] 	= $this->input->post('textlink2');
			$data['fonticon3'] 		= $this->input->post('fonticon3');
			$data['title_features3']= $this->input->post('namafeatures3');
			$data['deskripsi3'] 	= $this->input->post('deskripsi3');
			$data['link3'] 			= $this->input->post('link3');
			$data['text_link3'] 	= $this->input->post('textlink3');
				
			$id						= $this->input->post('id',null,TRUE);
			$d						= $this->db->get_where('landingpage',array('id'=>$id));
			
			if($d->num_rows() > 0){
				$this->Landingpage_model->update($id,$data);
				$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Update');
				redirect(site_url('appweb/landingpage-features'));
			}
			else{
				$this->Landingpage_model->add($data);
				$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Tambah');
				redirect(site_url('appweb/landingpage-features'));
			}
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	public function simpan_app(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
		
			
			$data['appicon1'] 		= $this->input->post('appicon1');
			$data['appfeatures1']	= $this->input->post('appfeatures1');
			$data['appdeskripsi1'] 	= $this->input->post('appdeskripsi1');
			$data['appicon2'] 		= $this->input->post('appicon2');
			$data['appfeatures2']	= $this->input->post('appfeatures2');
			$data['appdeskripsi2'] 	= $this->input->post('appdeskripsi2');
			$data['appicon3'] 		= $this->input->post('appicon3');
			$data['appfeatures3']	= $this->input->post('appfeatures3');
			$data['appdeskripsi3'] 	= $this->input->post('appdeskripsi3');
			//$data['appicon4'] 		= $this->input->post('appicon4');
			//$data['appfeatures4']	= $this->input->post('appfeatures4');
			//$data['appdeskripsi4'] 	= $this->input->post('appdeskripsi4');
				
			$id						= $this->input->post('id',null,TRUE);
			$d						= $this->db->get_where('landingpage',array('id'=>$id));
					
			if($d->num_rows() > 0){
				$this->Landingpage_model->update($id,$data);
				$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Update');
				redirect(site_url('appweb/landingpage-app'));
			}
			else{
				$this->Landingpage_model->add($data);
				$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Tambah');
				redirect(site_url('appweb/landingpage-app'));
			}
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
	public function simpan_video(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$path							='./assets/frontend/img/video/';
			$nm_img							='video-area-bg';
			$config['upload_path']          = $path;
			$config['allowed_types']        = 'jpg|jpeg';
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
				redirect(site_url('appweb/landingpage-video'));
			} 
			else {
				
				if(!$this->upload->do_upload('image'))
				{
					
					$data['judulvideo'] 	 = $this->input->post('judulvideo',null,TRUE);
					$data['deskripsivideo']  = $this->input->post('deskripsivideo',null,TRUE);
					$data['idyoutube']  	 = $this->input->post('idyoutube',null,TRUE);

					$id						 = $this->input->post('id',null,TRUE);
					$d						 = $this->db->get_where('landingpage',array('id'=>$id));
				}
				else
				{
					$file_img=$this->upload->data();
					$img_name=$file_img['file_name'];
					
					$path							='./files/media/';
					$tpath							='./files/thumbnail/';
					$config['image_library'] 		= 'gd2';
					$config['source_image'] 		= $path.$img_name;
					$config['new_image'] 			= $tpath;
					$config['create_thumb'] 		= FALSE;
					$config['maintain_ratio'] 		= FALSE;
					$config['width']         		= 80;
					$config['height']       		= 80;
					$this->image_lib->initialize($config);
					$this->image_lib->resize();
					
					$data['judulvideo' ] 		= $this->input->post('judulvideo',null,TRUE);
					$data['deskripsivideo']  	= $this->input->post('deskripsivideo',null,TRUE);
					$data['idyoutube']  		= $this->input->post('idyoutube',null,TRUE);
					$data['backgroundvideo']	= $img_name;
						
					//@unlink('./files/media/'.$image_lama);
					$id						= $this->input->post('id',null,TRUE);
					$d						= $this->db->get_where('landingpage',array('id'=>$id));
				}
				if($d->num_rows() > 0){
					$this->Landingpage_model->update($id,$data);
					$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Update');
					redirect(site_url('appweb/landingpage-video'));
				}else{
					$this->Landingpage_model->add($data);
					$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Tambah');
					redirect(site_url('appweb/landingpage-video'));
				}
			}
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	public function sendinbox(){
		
		date_default_timezone_set('Asia/Jakarta');
	
		$nama					= $this->input->post('name',null,TRUE);
		$email					= $this->db->escape_str($this->input->post('email',null,TRUE)); 
		$subjek					= htmlspecialchars(strip_tags($this->input->post('subjek',null,TRUE))); 
		$pesan					= htmlspecialchars(strip_tags($this->input->post('pesan',null,TRUE))); 
		$date					= $this->indonesia_library->format_tanggal_jam(date('Y-m-d H:i:s'));
			
		$data['nama']			= $nama;
		$data['email']			= $email;
		$data['subjek']			= $subjek;
		$data['pesan']			= $pesan;
		$data['tanggal']		= $date;
		
		$cek=$this->Inbox_model->cek_inbox($email,$pesan)->num_rows();
		if(empty($cek)) {
			$this->Inbox_model->add_inbox($data);
			$this->session->set_flashdata('SUCCESSMSG','Pesan anda berhasil terkirim. Kami akan membalas pesan anda secepatnya.');
		}
		else {
			$this->session->set_flashdata('GAGALMSG', 'Anda sudah mengirim pesan ini sebelumnya');
		}
		redirect(site_url());
	}
}
?>