<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Supplier extends CI_Controller {
	
	public function index()
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$config=$this->Config_model->Get_All();
			$data=array(
				'situs'			=>$config['nama'],
				'logo'			=>$config['logo'],
				'author'		=>$config['pemilik'],
				'favicon'		=>$config['favicon'],
				'title'			=> 'List Supplier',
			);
			$data['css']			= $this->load->view('css',$data,true);
			$data['js']				= $this->load->view('js',$data,true);
			$data['script']			= $this->load->view('script',$data,true);
			
			$data['content']		= $this->load->view('list',$data,true);
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
				'nama'			=>'',
				'alamat'		=>'',
				'telepon'		=>'',
				'img'			=>'',
				'posisi'		=>'',
				'status'		=>'',
				'logo'			=>$config['logo'],
				'situs'			=>$config['nama'],
				'author'		=>$config['pemilik'],
				'favicon'		=>$config['favicon'],
				'dd_status'		=>$this->Site_model->dd_status(),
				'title'			=>'Tambah Supplier'
			);
			$data['css']			= $this->load->view('cssform',$data,true);
			$data['js']				= $this->load->view('jsform',$data,true);
			$data['script']			= $this->load->view('scriptform',$data,true);
			
			$data['content']		= $this->load->view('form',$data,true);
			
			$this->load->view('admin/template',$data);
			
		}
		else{
			redirect(site_url('adminstrator'));
		}
	}
	
	
	public function edit($id)
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$text ="SELECT * FROM supplier WHERE id ='$id'";
			$sql = $this->db->query($text);
			
			if($sql->num_rows() > 0){
				
				foreach($sql->result() as $db){
					$data['id']				=$id;
					$data['nama']			=$db->nama;
					$data['alamat']			=$db->alamat;
					$data['telepon']		=$db->telepon;
					$data['status']			=$db->status;
					$data['posisi']			=$db->posisi;
					$data['image']			=$db->gambar;
				}
			}
			else{
					$data['id']				=$id;
					$data['nama']			='';
					$data['alamat']			='';
					$data['telepon']		='';
					$data['status']			='';
					$data['posisi']			='';
					$data['image']			='';
					
			}
			
			$config=$this->Config_model->Get_All();
			
			$data['logo']				= $config['logo'];
			$data['situs']				= $config['nama'];
			$data['author']				= $config['pemilik'];
			$data['favicon']			= $config['favicon'];
			$data['dd_status']			= $this->Site_model->dd_status();
			$data['title']				= 'Edit Supplier';
			
			$data['css']				= $this->load->view('cssform',$data,true);
			$data['js']					= $this->load->view('jsform',$data,true);
			$data['script']				= $this->load->view('scriptform',$data,true);
			
			$data['content']		= $this->load->view('form',$data,true);
			
			$this->load->view('admin/template',$data);
		}
		else{
			redirect(site_url('appweb'));
		}
	}
		
	public function hapus($id){
	
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			$query=$this->Supplier_model->get_supplier_by_id($id);
			foreach($query as $rows ){
				@unlink('./files/media/'.$rows->gambar);
			}
			$this->Supplier_model->hapus_produsen($id);
			$this->session->set_flashdata('SUCCESSMSG','Berhasil Menghapus Produsen');
			redirect(site_url('appweb/supplier'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
	public function simpan(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			date_default_timezone_set('Asia/Jakarta');
			
			$posting 				= $this->session->userdata('username');
			$modif 					= $this->session->userdata('username');
			$nama					= $this->input->post('nama',null,TRUE);
			$alamat					= $this->input->post('alamat',null,TRUE);
			$telepon				= $this->input->post('telepon',null,TRUE);
			$status					= $this->input->post('status',null,TRUE);
			$tgl_create				= $this->indonesia_library->format_tanggal_jam(date('Y-m-d H:i:s'));
			$tgl_modif				= $this->indonesia_library->format_tanggal_jam(date('Y-m-d H:i:s'));
			$posisi					= $this->input->post('posisi',null,TRUE);
			//$gambar					= $this->input->post('image',null,TRUE);
			
			$path							='./files/media/';
			$nm_img							='supp-'.trim(substr(md5(rand()),0,4));
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
				redirect(site_url('appweb/sliders'));
			} 
			else 
			{
				
				if(!$this->upload->do_upload('image'))
				{
					$new['nama']			= $nama;
					$new['alamat']			= $alamat;
					$new['telepon'] 		= $telepon;
					$new['status']			= $status;
					$new['posting']			= $posting;
					$new['dimodif_oleh']	= $modif;
					$new['tgl_dibuat']		= $tgl_create;
					$new['tgl_modif']		= $tgl_modif;
					$new['posisi']			= $posisi;
					$new['gambar']			= $gambar;
					
					$old['nama']			= $nama;
					$old['alamat']			= $alamat;
					$old['telepon'] 		= $telepon;
					$old['status']			= $status;
					$old['posting']			= $posting;
					$old['dimodif_oleh']	= $modif;
					$old['tgl_modif']		= $tgl_modif;
					$old['posisi']			= $posisi;
					$old['gambar']			= $gambar;
					
					$id						= $this->input->post('id',null,TRUE);
					$d						= $this->db->get_where('supplier',array('id'=>$id));
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
					$config['width']         		= 80;
					$config['height']       		= 80;
					$this->image_lib->initialize($config);
					$this->image_lib->resize();
					$new['nama']			= $nama;
					$new['alamat']			= $alamat;
					$new['telepon'] 		= $telepon;
					$new['status']			= $status;
					$new['posting']			= $posting;
					$new['dimodif_oleh']		= $modif;
					$new['tgl_dibuat']		= $tgl_create;
					$new['tgl_modif']		= $tgl_modif;
					$new['posisi']			= $posisi;
					$new['gambar']			= $img_name;
					
					$old['nama']	= $nama;
					$old['alamat']	= $alamat;
					$old['telepon'] 		= $telepon;
					$old['status']			= $status;
					$old['posting']			= $posting;
					$old['dimodif_oleh']		= $modif;
					$old['tgl_modif']		= $tgl_modif;
					$old['posisi']			= $posisi;
					$old['gambar']			= $img_name;
					
					@unlink('./files/media/'.$image_lama);
					$id						= $this->input->post('id',null,TRUE);
					$d						= $this->db->get_where('supplier',array('id'=>$id));
				}
				if($d->num_rows() > 0){
					$this->Supplier_model->update_produsen($id,$old);
					$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Update');
					redirect(site_url('appweb/supplier'));
				}else{
					$this->Supplier_model->add_produsen($new);
					$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Tambah');
					redirect(site_url('appweb/supplier'));
				}
				
			}
		}
		else{
			redirect(site_url('appweb'));
		}	
	}

}
	
	