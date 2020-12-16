<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Category_jobs extends CI_Controller {
	
	public function index()
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$config=$this->Config_model->Get_All();
			
			$data['situs']			= $config['nama'];
			$data['logo']			= $config['logo'];
			$data['author']			= $config['pemilik'];
			$data['favicon']		= $config['favicon'];
			$data['tema']			= $config['tema'];
			$data['title']			= 'Kategori Pekerjaan';
			
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
			
			$data['id']				='';
			$data['nama']			='';
			$data['root']			='';
			
			$config=$this->Config_model->Get_All();
			
			$data['title'] 			= 'Tambah Kategori Pekerjaan';
			$data['situs']			= $config['nama'];
			$data['logo']			= $config['logo'];
			$data['author']			= $config['pemilik'];
			$data['favicon']  		= $config['favicon'];
			$data['tema']			= $config['tema'];
			
			$data['css']			= $this->load->view('cssform',$data,true);
			$data['js']				= $this->load->view('jsform',$data,true);
			
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
			
			$text 	= "SELECT * FROM kategori_pekerjaan WHERE kode_kategori = '$id'";
			$sql	= $this->db->query($text);
			
			if($sql->num_rows() > 0){
				
				foreach($sql->result() as $db){
					$data['id']				=$id;
					$data['root']			=$db->parent_id;
					$data['nama']			=$db->kategori;
				}
			}
			else{
					$data['id']				=$id;
					$data['root']			='';
					$data['nama']			='';
				}
			
			$config=$this->Config_model->Get_All();
			
			$data['title'] 		= 'Edit Kategori Pekerjaan';
			$data['situs']		= $config['nama'];
			$data['logo']		= $config['logo'];
			$data['author']		= $config['pemilik'];
			$data['favicon']  	= $config['favicon'];
			$data['tema']		= $config['tema'];
			
			$data['css']		= $this->load->view('cssform',$data,true);
			$data['js']			= $this->load->view('jsform',$data,true);
			
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
		
			$user_id 				= $this->session->userdata('nama_lengkap');
			$root					= 0;
			//$root					= $this->input->post('root',null,TRUE);
			$nama					= strtolower($this->input->post('nama',null,TRUE));
			$create_date			= $this->indonesia_library->format_tanggal_jam(date('Y-m-d H:i:s'));
			$modif_date				= $this->indonesia_library->format_tanggal_jam(date('Y-m-d H:i:s'));
			
			$new['parent_id']		= $root;
			$new['kategori']		= $nama;
			$new['kategori_seo']	= slug($nama);
			$new['tgl_dibuat'] 		= $create_date;
			$new['tgl_modif'] 		= $modif_date;
			$new['username']		= $user_id;
			$new['status']			= 1; 
			
			
			$old['parent_id']		= $root;
			$old['kategori']		= $nama;
			$old['kategori_seo']	= slug($nama);
			$old['tgl_modif'] 		= $modif_date;
			$old['username']		= $user_id;
			$old['modifikasi_oleh'] = $user_id;
			
			$id						= $this->input->post('id',null,TRUE);
			$d						= $this->db->get_where('kategori_pekerjaan',array('kode_kategori'=>$id));
			if($d->num_rows() > 0){
				$this->Categoryjobs_model->update_kategori($id,$old);
				$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Update');
				redirect(site_url('appweb/category-jobs'));
			}else{
				$this->Categoryjobs_model->add_kategori($new);
				$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Tambah');
				redirect(site_url('appweb/category-jobs'));
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
			
			$this->Categoryjobs_model->status_kategori($id,$status);
			$this->session->set_flashdata('SUCCESSMSG','Kategori Pekerjaan berhasil di update!!');
			redirect(site_url('appweb/category-jobs'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
	public function hapus() 
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			$id = $this->input->post('id');
			$this->Categoryjobs_model->hapus_kategori($id);
		
			$this->session->set_flashdata('SUCCESSMSG','Kategori Pekerjaan berhasil di hapus!!');
			redirect(site_url('appweb/category-jobs'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
}
	
	