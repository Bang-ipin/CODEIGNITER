<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Products extends CI_Controller {
	
	public function index()
	{	
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
		$config=$this->Config_model->Get_All();
		$data['logo'] 			= $config['logo'];
		$data['situs']			= $config['nama'];
		$data['author']			= $config['pemilik'];
		$data['favicon']		= $config['favicon'];
		$data['title']			=  'List Produk';
		
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
			$cat					='';
			$attrb					='';
			$data=array(
				'id'				=>'',
				'product_name'		=>'',
				'deskripsi'			=>'',
				'short_deskripsi'	=>'',
				'kategori'			=>'',
				'jumlah'			=>'',
				'price'				=>'',
				'diskon'			=>'',
				'favorit'			=>'',
				'tags'				=>'',
				'status'			=>'',
				'label'				=>'',
				'produsen'			=>'',
				'meta_description'	=>'',
				'meta_keywords'		=>'',
				'img'				=>'',
				'berat'				=>'',
				
				'title'				=>'Add Produk',
				'logo'				=>$config['logo'],
				'situs'				=>$config['nama'],
				'author'			=>$config['pemilik'],
				'favicon'			=>$config['favicon'],
				'kode_barang'		=>$this->Product_model->get_kode_barang(),
				'category'			=>$this->Site_model->dd_kategori_produk(),
				'tag'				=>$this->Site_model->dd_tag_produk(),
				'dd_status_barang'	=>$this->Site_model->dd_status(),
				'dd_favorit'		=>$this->Site_model->dd_favorit(),
				'dd_label'			=>$this->Site_model->dd_label(),
				'dd_produsen'		=>$this->Site_model->dd_produsen(),
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
			
			$text 	= "SELECT * FROM produk WHERE id = '$id'";
			$sql	= $this->db->query($text);
			
			if($sql->num_rows() > 0){
				
				foreach($sql->result() as $db){
					$cat 		= $db->kode_kategori;
					$tagar 		= explode(',',$db->tag);
					
					$data['tag'	]				= $this->Site_model->dd_tag_produk();
					
					$data['id']					= $id;
					$data['kode_barang']		= $db->kode_barang;
					$data['product_name']		= $db->produk;
					$data['deskripsi']			= $db->deskripsi;
					$data['short_deskripsi']	= $db->deskripsi_singkat;
					$data['kategori']			= $cat;
					$data['jumlah']				= $db->qty;
					$data['price']				= $db->harga;
					$data['diskon']				= $db->diskon;
					$data['favorit']			= $db->favorit_produk;
					$data['tags']				= $tagar;
					$data['status']				= $db->status_barang;
					$data['label']				= $db->label;
					$data['produsen']			= $db->id_produsen;
					$data['meta_description']	= $db->meta_deskripsi;
					$data['meta_keywords']		= $db->meta_keyword;
					$data['image']				= $db->gambar;
					$data['berat']				= $db->berat;
				}
			}
			else{
					$data['id']				= $id;
					$data['kode_barang']	= '';
					$data['product_name']	= '';
					$data['deskripsi']		= '';
					$data['short_deskripsi']= '';
					$data['kategori']		= '';
					$data['jumlah']			= '';
					$data['price']			= '';
					$data['diskon']			= '';
					$data['favorit']		= '';
					$data['tags']			= '';
					$data['status']			= '';
					$data['label']			= '';
					$data['produsen']		= '';
					$data['meta_description']='';
					$data['meta_keywords']	= '';
					$data['image']			= '';
					$data['berat']			= '';
					
			}
			
			$config=$this->Config_model->Get_All();
			
			$data['title']				= 'Edit Produk';
			$data['situs']				= $config['nama'];
			$data['logo']				= $config['logo'];
			$data['author']				= $config['pemilik'];
			$data['favicon'	]			= $config['favicon'];
			$data['kode_barang']		= $this->Product_model->get_kode_barang();
			$data['category']			= $this->Site_model->dd_kategori_produk();
			$data['dd_status_barang']	= $this->Site_model->dd_status();
			$data['dd_favorit'	]		= $this->Site_model->dd_favorit();
			$data['dd_label']			= $this->Site_model->dd_label();
			$data['dd_produsen']		= $this->Site_model->dd_produsen();
			
			$data['css']				= $this->load->view('cssform',$data,true);
			$data['js']					= $this->load->view('jsform',$data,true);
			$data['script']				= $this->load->view('scriptform',$data,true);
			
			$data['content']			=$this->load->view('form',$data,TRUE);
			
			$this->load->view('admin/template',$data);
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	public function tambahstok($id)
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$text 	= "SELECT * FROM produk WHERE id = '$id'";
			$sql	= $this->db->query($text);
			
			if($sql->num_rows() > 0){
				
				foreach($sql->result() as $db){
					$data['id']				= $id;
					$data['jumlah']			= $db->qty;
				}
			}
			else{
					$data['id']				= $id;
					$data['jumlah']			= '';
					
			}
			
			$config=$this->Config_model->Get_All();
			
			$data['title']				= 'Tambah Stok Produk';
			$data['situs']				= $config['nama'];
			$data['logo']				= $config['logo'];
			$data['author']				= $config['pemilik'];
			$data['favicon'	]			= $config['favicon'];
			$data['kode_barang']		= $this->Product_model->get_kode_barang();
			
			$data['css']				= $this->load->view('cssform',$data,true);
			$data['js']					= $this->load->view('jsform',$data,true);
			$data['script']				= $this->load->view('scriptform',$data,true);
			
			$data['content']			=$this->load->view('formstok',$data,TRUE);
			$this->load->view('admin/template',$data);
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	public function simpanstok()
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$id					= $this->input->post('id');
			$jumlahstok			= $this->input->post('jumlah');
			$d_u['qty'] 		= $this->Site_model->getTambahStok($id,$jumlahstok);
			$key['id'] 			= $id;
			$this->Site_model->update_qty("produk",$d_u,$key);
		
			$this->session->set_flashdata('SUCCESSMSG','Order Produk Berhasil');
			redirect(site_url('appweb/products'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	public function hapus($id){
	
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			$query=$this->Product_model->get_produk_by_id($id);
			foreach($query as $rows ){
				@unlink('./files/media/'.$rows->gambar);
				@unlink('./files/medium/'.$rows->gambar);
				@unlink('./files/thumbnail/'.$rows->gambar);
			}
			$this->Product_model->hapus_produk($id);
			$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Hapus');
			redirect(site_url('appweb/products'));
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
			$tag 			= $this->input->post('tags',null,TRUE);
			
			if(!empty($tag)){
				$tag_id = implode(",", $tag);
			}else{
				$tag_id = '';
			}
			
			$path							='./files/media/';
			$nm_img							='prod-'.trim(substr(md5(rand()),0,4));
			$config['upload_path']          = $path;
			$config['allowed_types']        = 'jpg|jpeg|png';
			$config['file_name']            = $nm_img;
			$config['max_size']             = 712;
			$config['max_width']            = 2000;;
			$config['max_height']           = 2000;;
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
				redirect(site_url('appweb/products'));
			} 
			else {
				
				if(!$this->upload->do_upload('image'))
				{
					$add=array(
					'kode_barang'		=>$this->input->post('kode',null,TRUE),
					'produk'			=>$this->input->post('product_name',null,TRUE),
					'produk_seo'		=>slug($this->input->post('product_name',null,TRUE)),
					'deskripsi'  		=>$this->input->post('deskripsi',null,TRUE),
					'deskripsi_singkat'	=>$this->input->post('short_deskripsi',null,TRUE),
					'kode_kategori'		=>$this->input->post('kategori',null,TRUE),
					'qty'				=>$this->input->post('jumlah',null,TRUE),
					'harga'				=>$this->input->post('price',null,TRUE),
					'diskon'			=>$this->input->post('diskon',null,TRUE),
					'favorit_produk'	=>$this->input->post('favorit',null,TRUE),
					'status_barang'		=>$this->input->post('status',null,TRUE),
					'label'				=>$this->input->post('label',null,TRUE),
					'id_produsen'		=>$this->input->post('produsen',null,TRUE),
					'meta_deskripsi'	=>$this->input->post('meta_description',null,TRUE),
					'meta_keyword'		=>$this->input->post('meta_keywords',null,TRUE),
					'tag'				=>$tag_id,
					'berat'				=>$this->input->post('berat',null,TRUE),
					'tgl_dibuat'		=>$this->indonesia_library->format_tanggal_jam('Y-m-d H:i:s'),
					);
					
				$edit = array(
					'kode_barang'		=>$this->input->post('kode',null,TRUE),
					'produk'			=>$this->input->post('product_name',null,TRUE),
					'produk_seo'		=>slug($this->input->post('product_name',null,TRUE)),
					'deskripsi'  		=>$this->input->post('deskripsi',null,TRUE),
					'deskripsi_singkat'	=>$this->input->post('short_deskripsi',null,TRUE),
					'kode_kategori'		=>$this->input->post('kategori',null,TRUE),
					'qty'				=>$this->input->post('jumlah',null,TRUE),
					'harga'				=>$this->input->post('price',null,TRUE),
					'diskon'			=>$this->input->post('diskon',null,TRUE),
					'favorit_produk'	=>$this->input->post('favorit',null,TRUE),
					'status_barang'		=>$this->input->post('status',null,TRUE),
					'label'				=>$this->input->post('label',null,TRUE),
					'id_produsen'		=>$this->input->post('produsen',null,TRUE),
					'meta_deskripsi'	=>$this->input->post('meta_description',null,TRUE),
					'meta_keyword'		=>$this->input->post('meta_keywords',null,TRUE),
					'tag'				=>$tag_id,
					'berat'				=>$this->input->post('berat',null,TRUE),
					);
					$id					= $this->input->post('id',null,TRUE);
					$d					= $this->db->get_where('produk',array('id'=>$id));
				}
				else
				{
					$file_img=$this->upload->data();
					$img_name=$file_img['file_name'];
					
					$path							='./files/media/';
					$tpath							='./files/thumbnail/';
					$mpath							='./files/medium/';
					
					$config = array(
						// Image Medium
						array(
							'image_library' 		=> 'gd2',
							'source_image' 			=> $path.$img_name,
							'new_image' 			=> $mpath,
							'create_thumb' 			=> FALSE,
							'maintain_ratio' 		=> FALSE,
							'width'         		=> 400,
							'height'       			=> 400,
							),
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
					$add=array(
						'kode_barang'		=>$this->input->post('kode',null,TRUE),
						'produk'			=>$this->input->post('product_name',null,TRUE),
						'produk_seo'		=>slug($this->input->post('product_name',null,TRUE)),
						'deskripsi'  		=>$this->input->post('deskripsi',null,TRUE),
						'deskripsi_singkat'	=>$this->input->post('short_deskripsi',null,TRUE),
						'kode_kategori'		=>$this->input->post('kategori',null,TRUE),
						'qty'				=>$this->input->post('jumlah',null,TRUE),
						'harga'				=>$this->input->post('price',null,TRUE),
						'diskon'			=>$this->input->post('diskon',null,TRUE),
						'favorit_produk'	=>$this->input->post('favorit',null,TRUE),
						'status_barang'		=>$this->input->post('status',null,TRUE),
						'label'				=>$this->input->post('label',null,TRUE),
						'id_produsen'		=>$this->input->post('produsen',null,TRUE),
						'meta_deskripsi'	=>$this->input->post('meta_description',null,TRUE),
						'meta_keyword'		=>$this->input->post('meta_keywords',null,TRUE),
						'tag'				=>$tag_id,
						'gambar'			=>$img_name,
						'berat'				=>$this->input->post('berat',null,TRUE),
						'tgl_dibuat'		=>$this->indonesia_library->format_tanggal_jam('Y-m-d H:i:s'),
						);
						
					$edit = array(
						'kode_barang'		=>$this->input->post('kode',null,TRUE),
						'produk'			=>$this->input->post('product_name',null,TRUE),
						'produk_seo'		=>slug($this->input->post('product_name',null,TRUE)),
						'deskripsi'  		=>$this->input->post('deskripsi',null,TRUE),
						'deskripsi_singkat'	=>$this->input->post('short_deskripsi',null,TRUE),
						'kode_kategori'		=>$this->input->post('kategori',null,TRUE),
						'qty'				=>$this->input->post('jumlah',null,TRUE),
						'harga'				=>$this->input->post('price',null,TRUE),
						'diskon'			=>$this->input->post('diskon',null,TRUE),
						'favorit_produk'	=>$this->input->post('favorit',null,TRUE),
						'status_barang'		=>$this->input->post('status',null,TRUE),
						'label'				=>$this->input->post('label',null,TRUE),
						'id_produsen'		=>$this->input->post('produsen',null,TRUE),
						'meta_deskripsi'	=>$this->input->post('meta_description',null,TRUE),
						'meta_keyword'		=>$this->input->post('meta_keywords',null,TRUE),
						'tag'				=>$tag_id,
						'gambar'			=>$img_name,
						'berat'				=>$this->input->post('berat',null,TRUE),
						);
					@unlink('./files/media/'.$image_lama);
					@unlink('./files/medium/'.$image_lama);
					@unlink('./files/thumbnail/'.$image_lama);
					$id						= $this->input->post('id',null,TRUE);
					$d						= $this->db->get_where('produk',array('id'=>$id));
				}
				if($d->num_rows() > 0){
					$this->Product_model->update_produk($id,$edit);
					$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Update');
					redirect(site_url('appweb/products'));
				}else{
					$this->Product_model->add_produk($add);
					$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Tambah');
					redirect(site_url('appweb/products'));
				}
			}
		}
		else{
			redirect(site_url('appweb'));
		}
	}
}