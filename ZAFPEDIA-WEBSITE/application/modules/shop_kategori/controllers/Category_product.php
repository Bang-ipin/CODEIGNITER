<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Category_product extends CI_Controller {
	
	public function index()
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$config=$this->Config_model->Get_All();
			
			$data['situs']			= $config['nama'];
			$data['logo']			=  $config['logo'];
			$data['author']			=  $config['pemilik'];
			$data['favicon']		=  $config['favicon'];
			$data['tema']			=  $config['tema'];
			$data['title']			=  'List Product Category';
			
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
			
			$data['id']				='';
			$data['nama']			='';
			$data['root']			='';
			$data['posisi']			='';
			
			$config=$this->Config_model->Get_All();
			
			$data['title'] 			= 'Tambah Kategori Produk';
			$data['situs']			= $config['nama'];
			$data['logo']			= $config['logo'];
			$data['author']			= $config['pemilik'];
			$data['favicon']  		= $config['favicon'];
			$data['tema']			= $config['tema'];
			$data['dd_parent']		= $this->Site_model->dd_parent_kategori();
			
			$data['css']			= $this->load->view('cssform',$data,true);
			$data['js']				= $this->load->view('jsform',$data,true);
			$data['script']			= $this->load->view('scriptform',$data,true);
			
			$data['content']= $this->load->view('form',$data,TRUE);
			
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
			
			$text 	= "SELECT * FROM kategori_produk WHERE kode_kategori = '$id'";
			$sql	= $this->db->query($text);
			
			if($sql->num_rows() > 0){
				
				foreach($sql->result() as $db){
					$data['id']				=$id;
					$data['root']			=$db->parent_id;
					$data['nama']			=$db->kategori;
					$data['posisi']			=$db->posisi;
				}
			}
			else{
					$data['id']				=$id;
					$data['root']			='';
					$data['nama']			='';
					$data['posisi']			='';
			}
			
			$config=$this->Config_model->Get_All();
			
			$data['title'] 		= 'Edit Kategori Produk';
			$data['situs']		= $config['nama'];
			$data['logo']		= $config['logo'];
			$data['author']		= $config['pemilik'];
			$data['favicon']  	= $config['favicon'];
			$data['tema']		= $config['tema'];
			$data['dd_parent']		= $this->Site_model->dd_parent_kategori();
			
			$data['css']		= $this->load->view('cssform',$data,true);
			$data['js']			= $this->load->view('jsform',$data,true);
			$data['script']		= $this->load->view('scriptform',$data,true);
			
			$data['content']= $this->load->view('form',$data,TRUE);
			
			$this->load->view('admin/template',$data);
		}
		else{
			redirect(site_url('appweb'));
		}
	}

	public function simpan_kategori(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			date_default_timezone_set('Asia/Jakarta');
		
			$user_id 				= $this->session->userdata('username');
			$root					= 0;
			//$root					= $this->input->post('root',null,TRUE);
			$nama					= strtolower($this->input->post('nama',null,TRUE));
			$posisi					= $this->input->post('posisi',null,TRUE); 
			$create_date			= $this->indonesia_library->format_tanggal_jam(date('Y-m-d H:i:s'));
			$modif_date				= $this->indonesia_library->format_tanggal_jam(date('Y-m-d H:i:s'));
			
			$new['parent_id']		= $root;
			$new['kategori']		= $nama;
			$new['kategori_seo']	= slug($nama);
			$new['posisi']			= $posisi;
			$new['tgl_dibuat'] 		= $create_date;
			$new['tgl_modif'] 		= $modif_date;
			$new['username']		= $user_id;
			$new['status']			= 0; 
			
			
			$old['parent_id']		= $root;
			$old['kategori']		= $nama;
			$old['kategori_seo']	= slug($nama);
			$old['posisi']			= $posisi;
			$old['tgl_modif'] 		= $modif_date;
			$old['username']		= $user_id;
			$old['modifikasi_oleh'] = $user_id;
			
			$id						= $this->input->post('id',null,TRUE);
			$d						= $this->db->get_where('kategori_produk',array('kode_kategori'=>$id));
			if($d->num_rows() > 0){
				$this->Categoryproduk_model->update_kategori($id,$old);
				$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Update');
				redirect(site_url('appweb/category-product'));
			}else{
				$this->Categoryproduk_model->add_kategori($new);
				$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Tambah');
				redirect(site_url('appweb/category-product'));
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
			
			$this->Categoryproduk_model->status_kategori($id,$status);
			$this->session->set_flashdata('SUCCESSMSG','Kategori Produk berhasil di update!!');
			redirect(site_url('appweb/category-product'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
	public function hapus($id) 
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$this->Categoryproduk_model->hapus_kategori($id);
		
			$this->session->set_flashdata('SUCCESSMSG','Kategori Produk berhasil di hapus!!');
			redirect(site_url('appweb/category-product'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
}
	
	