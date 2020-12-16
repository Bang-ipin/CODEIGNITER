<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Categories extends CI_Controller {
	
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
				'tema'				=> $config['tema'],
				'title'				=> 'List Kategori',
			);
			$data['css']			= $this->load->view('css',$data,true);
			$data['js']				= $this->load->view('js',$data,true);
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
			
			$data['id']				='';
			$data['nama']			='';
			$data['parent']			='';
			$data['status']			='';
			
			$config=$this->Config_model->Get_All();
			
			$data['title'] 			= 'Tambah&nbsp;Kategori';
			$data['situs']			= $config['nama'];
			$data['logo']			= $config['logo'];
			$data['author']			= $config['pemilik'];
			$data['favicon']  		= $config['favicon'];
			$data['tema']			= $config['tema'];
			$data['dd_status']		= $this->Kategori_model->dd_status();
			
			
			$data['css']			= $this->load->view('cssform',$data,true);
			$data['js']				= $this->load->view('jsform',$data,true);
			$data['content']		= $this->load->view('form',$data,TRUE);
			
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
			
			$text 	= "SELECT * FROM kategori WHERE id = '$id'";
			$sql	= $this->db->query($text);
			
			if($sql->num_rows() > 0){
				
				foreach($sql->result() as $db){
					$data['id']				=$id;
					$data['nama']			=$db->kategori;
					$data['status']			=$db->status;
					$data['parent']			=$db->parent;
				}
			}
			else{
					$data['id']				=$id;
					$data['nama']			='';
					$data['status']			='';
					$data['parent']			='';
			}
			
			$config=$this->Config_model->Get_All();
			
			$data['title'] 					= 'Edit Category';
			$data['logo']					= $config['logo'];
			$data['situs']					= $config['nama'];
			$data['author']					= $config['pemilik'];
			$data['favicon']  				= $config['favicon'];
			$data['tema']					= $config['tema'];
			$data['dd_status']				= $this->Kategori_model->dd_status();
			
			$data['css']					= $this->load->view('cssform',$data,true);
			$data['js']						= $this->load->view('jsform',$data,true);
			$data['content']				= $this->load->view('form',$data,TRUE);
			
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
			$nama					= $this->input->post('nama',null,TRUE);
			$status					= $this->input->post('status',null,TRUE); 
			$create_date			= $this->indonesia_library->format_tanggal_jam(date('Y-m-d H:i:s'));
			
			$new['kategori']		= $nama;
			$new['kategori_seo']	= slug($nama);
			$new['tgl_dibuat'] 		= $create_date;
			$new['posting']			= $user_id;
			$new['status']			= $status; 
			
			
			
			$old['kategori']		= $nama;
			$old['kategori_seo']	= slug($nama);
			$old['posting']			= $user_id;
			$old['status']			= $status; 
			
			
			$id						= $this->input->post('id',null,TRUE);
			$d						= $this->db->get_where('kategori',array('id'=>$id));
			if($d->num_rows() > 0){
				$this->Kategori_model->update($id,$old);
				$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Update');
				redirect(site_url('appweb/categories'));
			}else{
				$this->Kategori_model->add($new);
				$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Tambah');
				redirect(site_url('appweb/categories'));
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
			
			$this->Kategori_model->update_status($id,$status);
			$this->session->set_flashdata('SUCCESSMSG','Kategori berhasil di update!!');
			redirect(site_url('appweb/categories'));
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
			$this->Kategori_model->hapus($id);
		    $this->session->set_flashdata('SUCCESSMSG','Kategori berhasil di hapus!!');
			redirect(site_url('appweb/categories'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
}
	
	