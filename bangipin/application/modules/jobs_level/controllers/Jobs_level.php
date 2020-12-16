<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Jobs_level extends CI_Controller {
	
	public function index()
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$config=$this->Config_model->Get_All();
			$data=array(
				'logo'				=>$config['logo'],
				'situs'				=>$config['nama'],
				'author'			=>$config['pemilik'],
				'favicon'			=>$config['favicon'],
				'title'				=> 'List Pendidikan',
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
	
	public function add(){

		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$config=$this->Config_model->Get_All();
			$data=array(
				'id'					=>'',
				'pendidikan'			=>'',
				'title'					=> 'Tambah Pendidikan',
				'logo'					=>$config['logo'],
				'situs'					=>$config['nama'],
				'author'				=>$config['pemilik'],
				'favicon'				=>$config['favicon'],
			);
			$data['css']				= $this->load->view('cssform',$data,true);
			$data['js']					= $this->load->view('jsform',$data,true);
			$data['content']			= $this->load->view('form',$data,TRUE);
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
			
			$text 							= "SELECT * FROM pendidikan WHERE id='$id'";
			$sql							= $this->db->query($text);
			if($sql->num_rows() > 0){
				
				foreach($sql->result() as $db){
					$data['id']				=$id;
					$data['pendidikan']		=$db->pendidikan;
					
				}
			}
			else{
					$data['id']				=$id;
					$data['pendidikan']		='';
					
			}
			
			$config=$this->Config_model->Get_All();
			
			$data['title']			= 'Edit Pendidikan';
			$data['situs']			= $config['nama'];
			$data['logo']			= $config['logo'];
			$data['author']			= $config['pemilik'];
			$data['favicon']		= $config['favicon'];
			
			$data['css']			= $this->load->view('cssform',$data,true);
			$data['js']				= $this->load->view('jsform',$data,true);
			$data['content']		= $this->load->view('form',$data,TRUE);
			$this->load->view('admin/template',$data);
			
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
	public function hapus() 
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			$id=$this->input->post('id');
			$this->Jobslevel_model->hapus($id);
			$this->session->set_flashdata('SUCCESSMSG','Pendidikan Deleted Successfully!!');
			redirect(site_url('appweb/jobs-level'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
	public function simpan(){
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			date_default_timezone_set('Asia/Jakarta');
		
			$user_id 				= $this->session->userdata('nama_lengkap');
			$pendidikan				= strtoupper($this->input->post('pendidikan',null,TRUE));
			$tgl_create				= $this->indonesia_library->format_tanggal_jam(date('Y-m-d H:i:s'));
				
			$new['pendidikan']		= $pendidikan;
			$new['pendidikan_seo']	= slug($pendidikan);
			$new['tgl_dibuat'] 		= $tgl_create;
			$new['user_id']			= $user_id;
			
			
			$old['pendidikan']		= $pendidikan;
			$old['pendidikan_seo']	= slug($pendidikan);
			$old['user_id']			= $user_id;
			
			$id						= $this->input->post('id',null,TRUE);
			$d						= $this->db->get_where('pendidikan',array('id'=>$id));
			if($d->num_rows() > 0){
				$this->Jobslevel_model->update($id,$old);
				$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Update');
				redirect(site_url('appweb/jobs-level'));
			}else{
				$this->Jobslevel_model->add($new);
				$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Tambah');
				redirect(site_url('appweb/jobs-level/add'));
			}
			
		}
		else{
			redirect(site_url('appweb'));
		}
	}

}
	
	