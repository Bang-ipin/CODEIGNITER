<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Articles extends CI_Controller {
	
	public function index(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$config=$this->Config_model->Get_All();
			$data=array(
				'title'				=> "List Artikel",
				'logo'				=> $config['logo'],
				'situs'				=> $config['nama'],
				'author'			=> $config['pemilik'],
				'favicon'			=> $config['favicon'],
				'tema'				=> $config['tema'],
				
			);
			$data['css']			= $this->load->view('css',$data,true);
			$data['js']				= $this->load->view('js',$data,true);
			$data['content']		= $this->load->view('list',$data,true);
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
				'id'				=>'',
				'judul_blog'		=>'',
				'kategori'			=>'',
				'isi_blog'			=>'',
				'status'			=>'',
				'img'				=>'',
				'tags'				=>'',
				'meta_deskripsi'	=>'',
				'meta_keyword'		=>'',
				
				'logo'				=>$config['logo'],
				'situs'				=>$config['nama'],
				'author'			=>$config['pemilik'],
				'favicon'			=>$config['favicon'],
				'tema'				=> $config['tema'],
				'title'				=> 'Tambah Artikel',
				'dd_status'			=>$this->Site_model->dd_status(),
				'dd_tag'			=>$this->Blog_model->dd_tag(),
				'dd_kategori'		=>$this->Blog_model->dd_kategori(),
			);
			$data['css']			= $this->load->view('cssform',$data,true);
			$data['js']				= $this->load->view('jsform',$data,true);
			$data['content']		= $this->load->view('form',$data,TRUE);
			
			$this->load->view('admin/template',$data);
		}
		else{
			redirect(site_url('appweb'));
		}
	}
		
	public function edit($id){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$text 	= "SELECT * FROM blog WHERE id='$id'";
			$sql	= $this->db->query($text);
			if($sql->num_rows() > 0){
				
				foreach($sql->result() as $db){
					$tagar 					= explode(',',$db->tag);
					$data['dd_tag']			= $this->Blog_model->dd_tag();
					
					$data['id']				=$id;
					$data['judul_blog']		=$db->judul_blog;
					$data['tags']			=$tagar;
					$data['kategori']		=$db->kategori;
					$data['status']			=$db->status;
					$data['isi_blog']		=$db->isi;
					$data['image']			=$db->gambar;
					$data['meta_deskripsi']	=$db->meta_deskripsi;
					$data['meta_keyword']	=$db->meta_keyword;
					
				}
			}
			else{
					$data['id']				=$id;
					$data['judul_blog']		='';
					$data['kategori']		='';
					$data['tags']			='';
					$data['status']			='';
					$data['isi_blog']		='';
					$data['image']			='';
					$data['meta_deskripsi']	='';
					$data['meta_keyword']	='';
			}
			
			$config=$this->Config_model->Get_All();
			$data['title']					=  'Edit Artikel';
			$data['logo']					= $config['logo'];
			$data['situs']					= $config['nama'];
			$data['author']					= $config['pemilik'];
			$data['favicon']				= $config['favicon'];
			$data['tema']					= $config['tema'];
			$data['dd_status']				= $this->Site_model->dd_status();
			$data['dd_kategori']			= $this->Blog_model->dd_kategori();
			$data['css']					= $this->load->view('cssform',$data,true);
			$data['js']						= $this->load->view('jsform',$data,true);
			$data['content']				= $this->load->view('form',$data,TRUE);
			
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
			$tag 			= $this->input->post('tags');
			
			if(!empty($tag)){
				$tag_id = implode(",", $tag);
			}else{
				$tag_id = '';
			}
			$blog					= ucwords($this->input->post('judul_blog'));
			$kategori				= $this->input->post('kategori'); 
			$status					= $this->input->post('status'); 
			$isi_blog				= $this->input->post('isi_blog'); 
			$meta_deskripsi			= $this->input->post('meta_deskripsi'); 
			$meta_keyword			= $this->input->post('meta_keyword'); 
			$posting				= $this->session->userdata('nama_lengkap'); 
			$postingDate			= $this->indonesia_library->format_tanggal_jam(date('Y-m-d')); 
			$modifDate				= $this->indonesia_library->format_tanggal_jam(date('Y-m-d')); 
				
			$path							='./files/media/';
			$nm_img							='blog-'.trim(substr(md5(rand()),0,4));
			$config['upload_path']          = $path;
			$config['allowed_types']        = 'jpg|jpeg|png';
			$config['file_name']            = $nm_img;
			$config['max_size']             = 712;
			$config['max_width']            = 900;;
			$config['max_height']           = 900;;
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
				redirect(site_url('appweb/articles'));
			} 
			else 
			{
				
				if(!$this->upload->do_upload('image'))
				{
					$add['judul_blog']		= $blog;
					$add['judul_seo']		= slug($blog);
					$add['kategori']		= strtolower($kategori);
					$add['isi']				= $isi_blog; 
					$add['posting']			= $posting; 
					$add['tgl_posting']		= $postingDate; 
					$add['tgl_modif']		= $modifDate; 
					$add['status']			= $status; 
					$add['tag']				= $tag_id;
					$add['meta_deskripsi']	= $meta_deskripsi; 
					$add['meta_keyword']	= $meta_keyword; 
					
					$edit['judul_blog']		= $blog;
					$edit['judul_seo']		= slug($blog);
					$edit['kategori']		= strtolower($kategori);
					$edit['isi']			= $isi_blog; 
					$edit['posting']		= $posting; 
					$edit['tgl_modif']		= $modifDate; 
					$edit['tag']			= $tag_id;
					$edit['status']			= $status; 
					$edit['meta_deskripsi']	= $meta_deskripsi; 
					$edit['meta_keyword']	= $meta_keyword; 
						
					$id						= $this->input->post('id');
					$d						= $this->db->get_where('blog',array('id'=>$id));
				}
				else
				{
					$file_img				= $this->upload->data();
					$img_name				= $file_img['file_name'];
					
					$path						='./files/media/';
					$tpath						='./files/thumbnail/';
					
					$config = array(
						// Image Thumbnail
						array(
							'image_library' 		=> 'gd2',
							'source_image' 			=> $path.$img_name,
							'new_image' 			=> $tpath,
							'create_thumb' 			=> FALSE,
							'maintain_ratio' 		=> FALSE,
							'width'         		=> 80,
							'height'       			=> 80,
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
						
					$add['judul_blog']		= $blog;
					$add['judul_seo']		= slug($blog);
					$add['kategori']		= strtolower($kategori);
					$add['isi']				= $isi_blog; 
					$add['posting']			= $posting; 
					$add['tgl_posting']		= $postingDate; 
					$add['tgl_modif']		= $modifDate; 
					$add['status']			= $status; 
					$add['gambar']			= $img_name; 
					$add['tag']		    	= $tag_id;
					$add['meta_deskripsi']	= $meta_deskripsi; 
					$add['meta_keyword']	= $meta_keyword; 
					
					$edit['judul_blog']		= $blog;
					$edit['judul_seo']		= slug($blog);
					$edit['kategori']		= strtolower($kategori);
					$edit['isi']			= $isi_blog; 
					$edit['posting']		= $posting; 
					$edit['tgl_modif']		= $modifDate; 
					$edit['gambar']			= $img_name; 
					$edit['status']			= $status; 
					$edit['tag']			= $tag_id;
					$edit['meta_deskripsi']	= $meta_deskripsi; 
					$edit['meta_keyword']	= $meta_keyword; 
					
					@unlink('./files/media/'.$image_lama);
					@unlink('./files/thumbnail/'.$image_lama);
					$id						= $this->input->post('id');
					$d						= $this->db->get_where('blog',array('id'=>$id));
				}
				if($d->num_rows() > 0){
					$this->Blog_model->update($id,$edit);
					$this->session->set_flashdata('SUCCESSMSG','Article Updated Successfully');
					redirect(site_url('appweb/articles'));
				}
				else{
					$this->Blog_model->add($add);
					$this->session->set_flashdata('SUCCESSMSG','Article Added Successfully');
					redirect(site_url('appweb/articles'));
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
		    $id     = $this->input->post('id');
			$query=$this->Blog_model->get_blog_by_id($id);
			foreach($query as $rows ){
				@unlink('./files/media/'.$rows->gambar);
				@unlink('./files/thumbnail/'.$rows->gambar);
			}
			$this->Blog_model->hapus($id);
			$this->session->set_flashdata('SUCCESSMSG','Article Deleted Successfully!!');
			redirect(site_url('appweb/articles'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}	
	
}