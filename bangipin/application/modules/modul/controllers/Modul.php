<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Modul extends CI_Controller {
	
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
				'title'				=> 'List Modul',
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
			$data['url_modul']		='';
			
			
			$config=$this->Config_model->Get_All();
			
			$data['title'] 			= 'Tambah&nbsp;Modul';
			$data['situs']			= $config['nama'];
			$data['logo']			= $config['logo'];
			$data['author']			= $config['pemilik'];
			$data['favicon']  		= $config['favicon'];
			$data['tema']			= $config['tema'];
			
			
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
			
			$text 	= "SELECT * FROM modul WHERE id = '$id'";
			$sql	= $this->db->query($text);
			
			if($sql->num_rows() > 0){
				
				foreach($sql->result() as $db){
					$data['id']				=$id;
					$data['nama']			=$db->nama;
					$data['url_modul']		=$db->url_modul;
					
				}
			}
			else{
					$data['id']				=$id;
					$data['nama']			='';
					$data['url_modul']		='';
				
			}
			
			$config=$this->Config_model->Get_All();
			
			$data['title'] 					= 'Edit Modul';
			$data['logo']					= $config['logo'];
			$data['situs']					= $config['nama'];
			$data['author']					= $config['pemilik'];
			$data['favicon']  				= $config['favicon'];
			$data['tema']					= $config['tema'];
			
			$data['css']					= $this->load->view('cssform',$data,true);
			$data['js']						= $this->load->view('jsform',$data,true);
			$data['content']				= $this->load->view('form',$data,TRUE);
			
			$this->load->view('admin/template',$data);
		}
		else{
			redirect(site_url('appweb'));
		}
	}

	public function simpan(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			date_default_timezone_set('Asia/Jakarta');
		
			$nama					= $this->input->post('nama',null,TRUE);
			$url					= $this->input->post('url_modul',null,TRUE);
			
			
			$data['nama']			= $nama;
			$data['url_modul'] 		= $url;
			
			
			$id						= $this->input->post('id',null,TRUE);
			$d						= $this->db->get_where('modul',array('id'=>$id));
			if($d->num_rows() > 0){
				$this->Modul_model->update($id,$data);
				$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Update');
				redirect(site_url('appweb/modul'));
			}else{
				$this->Modul_model->add($data);
				$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Tambah');
				redirect(site_url('appweb/modul'));
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
			$id = $this->input->post('id');
			$this->Modul_model->hapus($id);
		    $this->session->set_flashdata('SUCCESSMSG','Modul berhasil di hapus!!');
			redirect(site_url('appweb/modul'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
}
	
	