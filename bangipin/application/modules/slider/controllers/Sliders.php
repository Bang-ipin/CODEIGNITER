<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Sliders extends CI_Controller {
	
	public function index()
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$config=$this->Config_model->Get_All();
			$data=array(
				'logo'				=> $config['logo'],
				'situs'				=> $config['nama'],
				'author'			=> $config['pemilik'],
				'favicon'			=> $config['favicon'],
				'title' 			=> 'List Slider',
			);
			$data['css']			= $this->load->view('css',$data,true);
			$data['js']				= $this->load->view('js',$data,true);
			$data['content']		= $this->load->view('list',$data,TRUE);
			$this->load->view('admin/template',$data);
		}else{
			redirect(site_url('appweb'));
		}
	}
		
	
	public function add()
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$config=$this->Config_model->Get_All();
			$data=array(
				'id'			=>'',
				'name'			=>'',
				'deskripsi'		=>'',
				'img'			=>'',
				'link'			=>'',
				'textlink'		=>'',
				'status'		=>'',
				'type'			=>'',
				'posisi'		=>'',
				
				'logo'			=>$config['logo'],
				'situs'			=>$config['nama'],
				'author'		=>$config['pemilik'],
				'favicon'		=>$config['favicon'],
				'title'			=>'Add Slider',
				'dd_status'		=>$this->Site_model->dd_status(),
				'dd_type'		=>$this->Slider_model->dd_type(),
				);
			$data['css']		= $this->load->view('cssform',$data,true);
			$data['js']			= $this->load->view('jsform',$data,true);
			$data['content']	= $this->load->view('form',$data,TRUE);
			
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
			
			$text = "SELECT * FROM slider WHERE id='$id'";
			$sql 	= $this->db->query($text);
			if($sql->num_rows() > 0 ){
				
				foreach ($sql->result() as $db ){
					
					$data['id']				= $id;
					$data['name']			= $db->judul;
					$data['deskripsi']		= $db->deskripsi;
					$data['image']			= $db->gambar;
					$data['link']			= $db->link;
					$data['textlink']		= $db->textlink;
					$data['status']			= $db->status;
					$data['posisi']			= $db->posisi;
					$data['type']			= $db->tipe;
					
				}
			}
			else{
					$data['id']				= $id;
					$data['name']			= '';
					$data['deskripsi']		= '';
					$data['image']			= '';
					$data['link']			= '';
					$data['textlink']		= '';
					$data['status']			= '';
					$data['posisi']			= '';
					$data['type']			= '';
			}
			
			$config					=$this->Config_model->Get_All();
			$data['situs']			= $config['nama'];
			$data['logo']			= $config['logo'];
			$data['author']			= $config['pemilik'];
			$data['favicon']		= $config['favicon'];
			$data['dd_status']		= $this->Site_model->dd_status();
			$data['dd_type']		= $this->Slider_model->dd_type();
			$data['title']			= 'Edit Slider';
			
			$data['css']			= $this->load->view('cssform',$data,true);
			$data['js']				= $this->load->view('jsform',$data,true);
			$data['content']		= $this->load->view('form',$data,TRUE);
			
			$this->load->view('admin/template',$data);
		}
		else{
			redirect(site_url('appweb'));
		}
	}

	public function simpan() 
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			date_default_timezone_set('Asia/Jakarta');
			
			$name 				= $this->input->post('name',null,TRUE);
			$deskripsi 			= $this->input->post('deskripsi',null,TRUE);
			$link 				= $this->input->post('link',null,TRUE);
			$textbutton 		= $this->input->post('textbutton',null,TRUE);
			$status 			= $this->input->post('status',null,TRUE);
			$posisi 			= $this->input->post('posisi',null,TRUE);
			$type 				= $this->input->post('type',null,TRUE);
			$created_by			= $this->session->userdata('username');
			$created_date 		= $this->indonesia_library->format_tanggal_jam(date('Y-m-d H:i:s'));
			$modified_by 		= $this->session->userdata('username');
			$modified_date 		= $this->indonesia_library->format_tanggal_jam(date('Y-m-d H:i:s'));
			
			$path							='./files/media/';
			$nm_img							='sli-'.trim(substr(md5(rand()),0,4));
			$config['upload_path']          = $path;
			$config['allowed_types']        = 'jpg|jpeg|png';
			$config['file_name']            = $nm_img;
			$config['max_size']             = 712;
			$config['max_width']            = 5000;;
			$config['max_height']           = 5000;;
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
				redirect(site_url('appweb/sliders'));
			} 
			else 
			{
				
				if(!$this->upload->do_upload('image'))
				{
					$add['judul']			= $name;
					$add['deskripsi']		= $deskripsi;
					$add['link']			= $link;
					$add['textlink']		= $textbutton;
					$add['status']			= $status;
					$add['tipe']			= $type;	
					$add['posisi']			= $posisi;	
					$add['dibuat_oleh']  	= $created_by;
					$add['dimodif_oleh'] 	= $modified_by;
					$add['tgl_dibuat']	    = $created_date;
					$add['tgl_modif']	    = $modified_date;
					
					$edit['judul']			= $name;
					$edit['deskripsi']		= $deskripsi;
					$edit['link']			= $link;
					$edit['textlink']		= $textbutton;
					$edit['status']			= $status;
					$edit['tipe']			= $type;	
					$edit['posisi']			= $posisi;	
					$edit['dimodif_oleh'] 	= $modified_by;
					$edit['tgl_modif']	= $modified_date;
					
					$id 					= $this->input->post('id',null,TRUE);
					$d 						= $this->db->get_where('slider',array('id'=>$id));
				}
				else
				{
					$file_img				= $this->upload->data();
					$img_name				= $file_img['file_name'];
					
					$path							='./files/media/';
					$tpath							='./files/thumbnail/';
					$config['image_library'] 		= 'gd2';
					$config['source_image'] 		= $path.$img_name;
					$config['new_image'] 			= $tpath;
					$config['create_thumb'] 		= FALSE;
					$config['maintain_ratio'] 		= FALSE;
					$config['width']         		= 800;
					$config['height']       		= 471;
					$this->image_lib->initialize($config);
					$this->image_lib->resize();
					
					$add['judul']			= $name;
					$add['deskripsi']		= $deskripsi;
					$add['gambar']			= $img_name;
					$add['status']			= $status;
					$add['link']			= $link;
					$add['textlink']		= $textbutton;
					$add['tipe']			= $type;	
					$add['posisi']			= $posisi;	
					$add['dibuat_oleh']  	= $created_by;
					$add['dimodif_oleh'] 	= $modified_by;
					$add['tgl_dibuat']		= $created_date;
					$add['tgl_modif']		= $modified_date;
					
					$edit['judul']			= $name;
					$edit['deskripsi']		= $deskripsi;
					$edit['gambar']			= $img_name;
				    $edit['link']			= $link;
					$edit['textlink']		= $textbutton;
					$edit['status']			= $status;
					$edit['tipe']			= $type;	
					$edit['posisi']			= $posisi;	
					$edit['dimodif_oleh']	= $modified_by;
					$edit['tgl_modif']	= $modified_date;
					
					@unlink('./files/media/'.$image_lama);
					@unlink('./files/thumbnail/'.$image_lama);
					$id 					= $this->input->post('id',null,TRUE);
					$d 						= $this->db->get_where('slider',array('id'=>$id));
				}
				
				if($d->num_rows() > 0){
					$this->Slider_model->edit($id,$edit);
					$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Update');
					redirect(site_url('appweb/sliders'));
				}else{
					$this->Slider_model->add($add);
					$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Tambah');
					redirect(site_url('appweb/sliders'));	
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
			
			$this->Slider_model->SliderStatus($id,$status);
			$this->session->set_flashdata('SUCCESSMSG','Slider Updated Successfully!!');
			redirect(site_url('appweb/sliders'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
	public function hapus(){
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
		    $id=$this->input->post('id');
			$query=$this->Slider_model->get_slider_by_id($id);
			foreach($query as $rows ){
				@unlink('./files/media/'.$rows->gambar);
				@unlink('./files/thumbnail/'.$rows->gambar);
			}
			$this->Slider_model->hapus($id);
			$this->session->set_flashdata('SUCCESSMSG','Slider Deleted Successfully!!');
			redirect(site_url('appweb/sliders'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}

}
	
	