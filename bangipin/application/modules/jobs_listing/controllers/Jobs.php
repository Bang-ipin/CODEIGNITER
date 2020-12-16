<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Jobs extends CI_Controller {
	
	public function index()
	{	
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
		$config					= $this->Config_model->Get_All();
		$data['logo'] 			= $config['logo'];
		$data['situs']			= $config['nama'];
		$data['author']			= $config['pemilik'];
		$data['favicon']		= $config['favicon'];
		$data['title']			=  'List Pekerjaan';
		
		$data['css']			= $this->load->view('css',$data,true);
		$data['js']				= $this->load->view('js',$data,true);
		
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
				'id'				=>'',
				'nama_pekerjaan'	=>'',
				'deskripsi'			=>'',
				'short_deskripsi'	=>'',
				'kategori'			=>'',
				'provinsi'			=>'',
				'kota'				=>'',
				'gaji'				=>'',
				'pendidikan'		=>'',
				'status'			=>'',
				'email'				=>'',
				'label'				=>'',
				'bataswaktu'		=>'',
				'perusahaan'		=>'',
				'meta_description'	=>'',
				'meta_keywords'		=>'',
				'img'				=>'',
				
				'title'				=>'Tambah Pekerjaan',
				'logo'				=>$config['logo'],
				'situs'				=>$config['nama'],
				'author'			=>$config['pemilik'],
				'favicon'			=>$config['favicon'],
				'category'			=>$this->Jobs_model->dd_kategori_pekerjaan(),
				'levelpendidikan'	=>$this->Jobs_model->dd_level_pendidikan(),
			'dd_status_pekerjaan'	=>$this->Jobs_model->dd_status(),
				'dd_label'			=>$this->Jobs_model->dd_label(),
				'dd_province'		=>$this->Jobs_model->dd_provinsi(),
				'dd_kotakab'		=>$this->Jobs_model->get_city(),
			
				);
			$data['css']			= $this->load->view('cssform',$data,true);
			$data['js']				= $this->load->view('jsform',$data,true);
			
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
			
			$text 	= "SELECT * FROM pekerjaan WHERE id = '$id'";
			$sql	= $this->db->query($text);
			
			if($sql->num_rows() > 0){
				
				foreach($sql->result() as $db){
					$cat 		= $db->kode_kategori;
					
					$data['levelpendidikan'	]	= $this->Jobs_model->dd_level_pendidikan();
					
					$data['id']					= $id;
					$data['nama_pekerjaan']		= $db->pekerjaan;
					$data['deskripsi']			= $db->deskripsi;
					$data['short_deskripsi']	= $db->deskripsi_singkat;
					$data['kategori']			= $cat;
					$data['provinsi']			= $db->provinsi;
					$data['kota']				= $db->kota;
					$data['gaji']				= $db->gaji;
					$data['pendidikan']			= $db->pendidikan;
					$data['status']				= $db->status_pekerjaan;
					$data['email']				= $db->email;
					$data['label']				= $db->label;
					$data['bataswaktu']			= $this->Jobs_model->tgl_str($db->batas_waktu);
					$data['perusahaan']			= $db->perusahaan;
					$data['meta_description']	= $db->meta_deskripsi;
					$data['meta_keywords']		= $db->meta_keyword;
					$data['image']				= $db->gambar;
				}
			}
			else{
					$data['id']					= $id;
					$data['nama_pekerjaan']		= '';
					$data['deskripsi']			= '';
					$data['short_deskripsi']	= '';
					$data['kategori']			= '';
					$data['provinsi']			= '';
					$data['kota']				= '';
					$data['gaji']				= '';
					$data['pendidikan']			= '';
					$data['status']				= '';
					$data['email']				= '';
					$data['label']				= '';
					$data['bataswaktu']			= '';
					$data['perusahaan']			= '';
					$data['meta_description']	='';
					$data['meta_keywords']		= '';
					$data['image']				= '';
					
			}
			
			$config=$this->Config_model->Get_All();
			
			$data['title']				= 'Edit Pekerjaan';
			$data['situs']				= $config['nama'];
			$data['logo']				= $config['logo'];
			$data['author']				= $config['pemilik'];
			$data['favicon'	]			= $config['favicon'];
			$data['category']			= $this->Jobs_model->dd_kategori_pekerjaan();
		$data['dd_status_pekerjaan']	= $this->Jobs_model->dd_status();
			$data['dd_label']			= $this->Jobs_model->dd_label();
			$data['dd_province']		= $this->Jobs_model->dd_provinsi();
			$data['dd_kotakab']			= $this->Jobs_model->get_city($data['kota']);
			
			$data['css']				= $this->load->view('cssform',$data,true);
			$data['js']					= $this->load->view('jsform',$data,true);
			
			$data['content']			=$this->load->view('form',$data,TRUE);
			
			$this->load->view('admin/template',$data);
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
	public function hapus(){
	
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			$id=$this->input->post('id');
			$query=$this->Jobs_model->get_pekerjaan_by_id($id);
			foreach($query as $rows ){
				@unlink('./files/media/'.$rows->gambar);
				@unlink('./files/medium/'.$rows->gambar);
				@unlink('./files/thumbnail/'.$rows->gambar);
			}
			$this->Jobs_model->hapus($id);
			$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Hapus');
			redirect(site_url('appweb/jobs'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
	public function simpan(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$idP = $this->input->post('id',null,TRUE);
			date_default_timezone_set('Asia/Jakarta');
			$pend 			= $this->input->post('pendidikan',null,TRUE);
			
			/* if(!empty($pend)){
				$pend_id = implode(",", $pend);
			}else{
				$pend_id = '';
			} */
			
			$path							='./files/media/';
			$nm_img							='job-'.trim(substr(md5(rand()),0,4));
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
				redirect(site_url('appweb/jobs'));
			} 
			else {
				
				if(!$this->upload->do_upload('image'))
				{
					$add=array(
					'pekerjaan'			=>$this->input->post('nama_pekerjaan',null,TRUE),
					'pekerjaan_seo'		=>slug($this->input->post('nama_pekerjaan',null,TRUE)),
					'deskripsi'  		=>$this->input->post('deskripsi',null,TRUE),
					'deskripsi_singkat'	=>$this->input->post('short_deskripsi',null,TRUE),
					'kode_kategori'		=>$this->input->post('kategori',null,TRUE),
					'provinsi'			=>$this->input->post('province',null,TRUE),
					'kota'				=>$this->input->post('kota',null,TRUE),
					'gaji'				=>$this->input->post('gaji',null,TRUE),
					'status_pekerjaan'	=>$this->input->post('status',null,TRUE),
					'email'				=>$this->input->post('email',null,TRUE),
					'label'				=>$this->input->post('label',null,TRUE),
					'batas_waktu'		=>$this->Jobs_model->tgl_sql($this->input->post('bataswaktu',null,TRUE)),
					'perusahaan'		=>$this->input->post('perusahaan',null,TRUE),
					'meta_deskripsi'	=>$this->input->post('meta_description',null,TRUE),
					'meta_keyword'		=>$this->input->post('meta_keywords',null,TRUE),
					'pendidikan'		=>$pend,
					'tgl_dibuat'		=>$this->indonesia_library->format_tanggal_jam('Y-m-d H:i:s'),
					);
					
				$edit = array(
					'pekerjaan'			=>$this->input->post('nama_pekerjaan',null,TRUE),
					'pekerjaan_seo'		=>slug($this->input->post('nama_pekerjaan',null,TRUE)),
					'deskripsi'  		=>$this->input->post('deskripsi',null,TRUE),
					'deskripsi_singkat'	=>$this->input->post('short_deskripsi',null,TRUE),
					'kode_kategori'		=>$this->input->post('kategori',null,TRUE),
					'provinsi'			=>$this->input->post('province',null,TRUE),
					'kota'				=>$this->input->post('kota',null,TRUE),
					'gaji'				=>$this->input->post('gaji',null,TRUE),
					'status_pekerjaan'	=>$this->input->post('status',null,TRUE),
					'email'				=>$this->input->post('email',null,TRUE),
					'label'				=>$this->input->post('label',null,TRUE),
					'batas_waktu'		=>$this->Jobs_model->tgl_sql($this->input->post('bataswaktu',null,TRUE)),
					'perusahaan'		=>$this->input->post('perusahaan',null,TRUE),
					'meta_deskripsi'	=>$this->input->post('meta_description',null,TRUE),
					'meta_keyword'		=>$this->input->post('meta_keywords',null,TRUE),
					'pendidikan'		=>$pend,
					);
					$id					= $this->input->post('id',null,TRUE);
					$d					= $this->db->get_where('pekerjaan',array('id'=>$id));
				}
				else
				{
					$file_img=$this->upload->data();
					$img_name=$file_img['file_name'];
					
					$path							='./files/media/';
					$tpath							='./files/thumbnail/';
					$mpath							='./files/medium/';
					
					$config = array(
						/* // Image Medium
						array(
							'image_library' 		=> 'gd2',
							'source_image' 			=> $path.$img_name,
							'new_image' 			=> $mpath,
							'create_thumb' 			=> FALSE,
							'maintain_ratio' 		=> FALSE,
							'width'         		=> 600,
							'height'       			=> 600,
							),
						// Image Thumbnail */
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
					$add=array(
						'pekerjaan'			=>$this->input->post('nama_pekerjaan',null,TRUE),
						'pekerjaan_seo'		=>slug($this->input->post('nama_pekerjaan',null,TRUE)),
						'deskripsi'  		=>$this->input->post('deskripsi',null,TRUE),
						'deskripsi_singkat'	=>$this->input->post('short_deskripsi',null,TRUE),
						'kode_kategori'		=>$this->input->post('kategori',null,TRUE),
						'provinsi'			=>$this->input->post('province',null,TRUE),
						'kota'				=>$this->input->post('kota',null,TRUE),
						'gaji'				=>$this->input->post('gaji',null,TRUE),
						'status_pekerjaan'	=>$this->input->post('status',null,TRUE),
						'email'				=>$this->input->post('email',null,TRUE),
						'label'				=>$this->input->post('label',null,TRUE),
						'batas_waktu'		=>$this->Jobs_model->tgl_sql($this->input->post('bataswaktu',null,TRUE)),
						'perusahaan'		=>$this->input->post('perusahaan',null,TRUE),
						'meta_deskripsi'	=>$this->input->post('meta_description',null,TRUE),
						'meta_keyword'		=>$this->input->post('meta_keywords',null,TRUE),
						'pendidikan'		=>$pend,
						'gambar'			=>$img_name,
						'tgl_dibuat'		=>$this->indonesia_library->format_tanggal_jam('Y-m-d H:i:s'),
						);
						
					$edit = array(
						'pekerjaan'			=>$this->input->post('nama_pekerjaan',null,TRUE),
						'pekerjaan_seo'		=>slug($this->input->post('nama_pekerjaan',null,TRUE)),
						'deskripsi'  		=>$this->input->post('deskripsi',null,TRUE),
						'deskripsi_singkat'	=>$this->input->post('short_deskripsi',null,TRUE),
						'kode_kategori'		=>$this->input->post('kategori',null,TRUE),
						'provinsi'			=>$this->input->post('province',null,TRUE),
						'kota'				=>$this->input->post('kota',null,TRUE),
						'gaji'				=>$this->input->post('gaji',null,TRUE),
						'status_pekerjaan'	=>$this->input->post('status',null,TRUE),
						'email'				=>$this->input->post('email',null,TRUE),
						'label'				=>$this->input->post('label',null,TRUE),
						'batas_waktu'		=>$this->Jobs_model->tgl_sql($this->input->post('bataswaktu',null,TRUE)),
						'perusahaan'		=>$this->input->post('perusahaan',null,TRUE),
						'meta_deskripsi'	=>$this->input->post('meta_description',null,TRUE),
						'meta_keyword'		=>$this->input->post('meta_keywords',null,TRUE),
						'pendidikan'		=>$pend,
						'gambar'			=>$img_name,
						);
					@unlink('./files/media/'.$image_lama);
					@unlink('./files/medium/'.$image_lama);
					@unlink('./files/thumbnail/'.$image_lama);
					$id						= $this->input->post('id',null,TRUE);
					$d						= $this->db->get_where('pekerjaan',array('id'=>$id));
				}
				if($d->num_rows() > 0){
					$this->Jobs_model->update($id,$edit);
					$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Update');
					redirect(site_url('appweb/jobs'));
				}else{
					$this->Jobs_model->add($add);
					$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Tambah');
					redirect(site_url('appweb/jobs'));
				}
			}
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	public function get_kabupaten(){
		$provinsi_id = $this->input->get('prov_id',null,TRUE);
		$this->Jobs_model->dd_kabupaten($provinsi_id);
	
	}
}