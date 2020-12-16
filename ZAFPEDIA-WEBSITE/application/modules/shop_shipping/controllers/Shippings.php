<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Shippings extends CI_Controller {
	
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
				'title' 			=> 'List Shipping',
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
			$data=array(
				'id'				=>'',
				'name'				=>'',
				'img'				=>'',
				'status'			=>'',
				'posisi'			=>'',
					
				'logo'				=>$config['logo'],
				'situs'				=>$config['nama'],
				'author'			=>$config['pemilik'],
				'favicon'			=>$config['favicon'],
				'title'				=>'Add Ekspedisi',
				'dd_status'			=>$this->Site_model->dd_status(),
				);
			$data['css']			= $this->load->view('cssform',$data,true);
			$data['js']				= $this->load->view('jsform',$data,true);
			$data['script']			= $this->load->view('scriptform',$data,true);
			$data['content']		=$this->load->view('form',$data,TRUE);
			
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
			
			$text= "SELECT * FROM ekspedisi WHERE id ='$id'";
			$sql=$this->db->query($text);
			if($sql->num_rows() > 0 ){
				
				foreach ($sql->result() as $db ){
						
					$data['id']			= $id;
					$data['name']		= $db->nama;
					$data['image']		= $db->gambar;
					$data['status']		= $db->status;
					$data['posisi']		= $db->posisi;
				}
			}
			else{
					$data['id']				= $id;
					$data['name']			= '';
					$data['image']			= '';
					$data['status']			= '';
					$data['posisi']			= '';
			}
			
			$config							=$this->Config_model->Get_All();
			$data['situs']					= $config['nama'];
			$data['logo']					= $config['logo'];
			$data['author']					= $config['pemilik'];
			$data['favicon']				= $config['favicon'];
			$data['dd_status']				= $this->Site_model->dd_status();
			$data['title']					= 'Edit Ekspedisi';
		
			$data['css']					= $this->load->view('cssform',$data,true);
			$data['js']						= $this->load->view('jsform',$data,true);
			$data['script']					= $this->load->view('scriptform',$data,true);
			$data['content']				=$this->load->view('form',$data,TRUE);
			
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
			$name							= strtolower($this->input->post('name',null,TRUE)); 
			//$image						= $this->input->post('image',null,TRUE); 
			$status							= $this->input->post('status',null,TRUE); 
			$posisi							= $this->input->post('posisi',null,TRUE); 
			
			$path							='./files/media/';
			$nm_img							='ship-'.trim(substr(md5(rand()),0,4));
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
				redirect(site_url('appweb/shippings'));
			} 
			else 
			{
				
				if(!$this->upload->do_upload('image'))
				{
					$add['nama']		= $name; 
					//$add['image']		= $image; 
					$add['status']		= $status;
					$add['posisi']		= $posisi;

					$edit['nama']		= $name; 
					//$edit['image']	= $image; 
					$edit['status']		= $status;
					$edit['posisi']		= $posisi; 
					
					$id 				= $this->input->post('id',null,TRUE);
					$d					= $this->db->get_where('ekspedisi',array('id'=>$id));
				}
				else{
					$file_img			= $this->upload->data();
					$img_name			= $file_img['file_name'];
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
					$add['nama']		= $name; 
					$add['gambar']		= $img_name; 
					$add['status']		= $status;
					$add['posisi']		= $posisi; 
					
					$edit['nama']		= $name; 
					$edit['gambar']		= $img_name; 
					$edit['status']		= $status;
					$edit['posisi']		= $posisi; 
					
					$id 				= $this->input->post('id',null,TRUE);
					$d					= $this->db->get_where('ekspedisi',array('id'=>$id));
					@unlink('./files/media/'.$image_lama);
				}
			
				if($d->num_rows() > 0){
					$this->Shipping_model->update_shipping($id,$edit);
					$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Update');
					redirect(site_url('appweb/shippings'));
				}else{
					$this->Shipping_model->add_shipping($add);
					$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Tambah');
					redirect(site_url('appweb/shippings'));	
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
			
			$this->Shipping_model->ShippingStatus($id,$status);
			$this->session->set_flashdata('SUCCESSMSG','Shipping Updated Successfully!!');
			redirect(site_url('appweb/shippings'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
	public function hapus($id){
	
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			$query=$this->Shipping_model->get_shipping_by_id($id);
			foreach($query as $rows ){
				@unlink('./files/media/'.$rows->gambar);
			}
			$this->Shipping_model->hapus_shipping($id);
			redirect(site_url('appweb/shippings'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}

}
	
	