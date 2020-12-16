<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Payments extends CI_Controller {
	
	public function index()
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$config=$this->Config_model->Get_All();
			$data=array(
				'logo'			=> $config['logo'],
				'situs'			=> $config['nama'],
				'author'		=> $config['pemilik'],
				'favicon'		=> $config['favicon'],
				'title' 		=> 'List Payment',
			);
			$data['css']		= $this->load->view('css',$data,true);
			$data['js']			= $this->load->view('js',$data,true);
			$data['script']		= $this->load->view('script',$data,true);
			$data['content']	= $this->load->view('list',$data,TRUE);
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
			$data=array(
				'id'			=>'',
				'name'			=>'',
				'img'			=>'',
				'caption'		=>'',
				'status'		=>'',
				'posisi'		=>'',
				
				'logo'			=>$config['logo'],
				'situs'			=>$config['nama'],
				'author'		=>$config['pemilik'],
				'favicon'		=>$config['favicon'],
				'title'			=>'Add Payment',
				'dd_status'		=>$this->Site_model->dd_status(),
				);
			$data['css']		= $this->load->view('cssform',$data,true);
			$data['js']			= $this->load->view('jsform',$data,true);
			$data['script']		= $this->load->view('scriptform',$data,true);
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
			
			$text= "SELECT * FROM metode_pembayaran WHERE id ='$id'";
			$sql=$this->db->query($text);
			if($sql->num_rows() > 0 ){
				
				foreach ($sql->result() as $db ){
						
					$data['id']			= $id;
					$data['name']		= $db->judul;
					$data['image']		= $db->gambar;
					$data['caption']	= $db->caption;
					$data['status']		= $db->status;
					$data['posisi']		= $db->posisi;
				}
			}
			else{
					$data['id']				= $id;
					$data['name']			= '';
					$data['image']			= '';
					$data['caption']		= '';
					$data['status']			= '';
					$data['posisi']			= '';
			}
			
			$config=$this->Config_model->Get_All();
			$data['logo']					= $config['logo'];
			$data['situs']					= $config['nama'];
			$data['author']					= $config['pemilik'];
			$data['favicon']				= $config['favicon'];
			$data['dd_status']				= $this->Site_model->dd_status();
			$data['title']					= 'Edit payment';
		
			$data['css']		= $this->load->view('cssform',$data,true);
			$data['js']			= $this->load->view('jsform',$data,true);
			$data['script']		= $this->load->view('scriptform',$data,true);
			$data['content']	= $this->load->view('form',$data,TRUE);
			
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
			$name					= $this->input->post('name',null,TRUE); 
			$caption				= $this->input->post('caption',null,TRUE); 
			//$image					= $this->input->post('image',null,TRUE); 
			$status					= $this->input->post('status',null,TRUE); 
			$posisi					= $this->input->post('posisi',null,TRUE); 
			$created_by				= $this->session->userdata('username');
			$created_date 			= $this->indonesia_library->format_tanggal_jam(date('Y-m-d H:i:s'));
			$modified_by 			= $this->session->userdata('username');
			$modified_date 			= $this->indonesia_library->format_tanggal_jam(date('Y-m-d H:i:s'));
			
			$path							='./files/media/';
			$nm_img							='payment-'.trim(substr(md5(rand()),0,4));
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
				redirect(site_url('appweb/payments'));
			} 
			else 
			{
				
				if(!$this->upload->do_upload('image'))
				{
					$add['judul']			= $name; 
					$add['caption']			= $caption; 
					//$add['image']			= $image; 
					$add['caption']			= $caption; 
					$add['dibuat_oleh']		= $created_by; 
					$add['tgl_dibuat']		= $created_date; 
					$add['dimodif_oleh']	= $modified_by; 
					$add['tgl_modif']		= $modified_date; 
					$add['status']			= $status;
					$add['posisi']			= $posisi; 
					
					$edit['judul']			= $name; 
					$edit['caption']		= $caption; 
					//$edit['image']			= $image; 
					$edit['caption']		= $caption; 
					$edit['dimodif_oleh']	= $modified_by; 
					$edit['tgl_modif']		= $modified_date; 
					$edit['status']			= $status;
					$edit['posisi']			= $posisi; 
			
					$id 					= $this->input->post('id',null,TRUE);
					$d						= $this->db->get_where('metode_pembayaran',array('id'=>$id));
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
					$config['width']         		= 80;
					$config['height']       		= 80;
					$this->image_lib->initialize($config);
					$this->image_lib->resize();
					$add['judul']			= $name; 
					$add['caption']			= $caption; 
					$add['gambar']			= $img_name; 
					$add['caption']			= $caption; 
					$add['dibuat_oleh']		= $created_by; 
					$add['tgl_dibuat']		= $created_date; 
					$add['dimodif_oleh']	= $modified_by; 
					$add['tgl_modif']		= $modified_date; 
					$add['status']			= $status;
					$add['posisi']			= $posisi; 
					
					$edit['judul']			= $name; 
					$edit['caption']		= $caption; 
					$edit['gambar']			= $img_name; 
					$edit['caption']		= $caption; 
					$edit['dimodif_oleh']	= $modified_by; 
					$edit['tgl_modif']		= $modified_date; 
					$edit['status']			= $status;
					$edit['posisi']			= $posisi; 
					
					@unlink('./files/media/'.$image_lama);
					$id 					= $this->input->post('id',null,TRUE);
					$d						= $this->db->get_where('metode_pembayaran',array('id'=>$id));
				}
				if($d->num_rows() > 0){
					$this->Payment_model->update_payment($id,$edit);
					$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Update');
					redirect(site_url('appweb/payments'));
				}else{
					$this->Payment_model->add_payment($add);
					$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Tambah');
					redirect(site_url('appweb/payments'));	
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
			
			$this->Payment_model->PaymentStatus($id,$status);
			$this->session->set_flashdata('SUCCESSMSG','Payment Updated Successfully!!');
			redirect(site_url('appweb/payments'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
	public function hapus($id){
	
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$this->Payment_model->hapus_payment($id);
			redirect(site_url('appweb/payments'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}

}
	
	