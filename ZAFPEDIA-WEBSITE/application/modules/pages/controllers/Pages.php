<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pages extends CI_Controller {
	
	public function index(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$config=$this->Config_model->Get_All();
			$data=array(
				'logo'				=>$config['logo'],
				'situs'				=>$config['nama'],
				'author'			=>$config['pemilik'],
				'favicon'			=>$config['favicon'],
				'tema'				=> $config['tema'],
				'title'				=> "Semua Laman",
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
	
	public function add(){
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$config=$this->Config_model->Get_All();
			$data=array(
				'id'				=>'',
				'pages'				=>'',
				'status'			=>'',
				'konten'			=>'',
				'posisi'			=>'',
				'layout'			=>'',
				'logo'				=>$config['logo'],
				'author'			=>$config['pemilik'],
				'favicon'			=>$config['favicon'],
				'tema'				=> $config['tema'],
				'title'				=> 'Add Laman',
				'situs'				=>$config['nama'],
				'dd_status'			=>$this->Site_model->dd_status(),
				'dd_layout'			=>$this->Pages_model->dd_layout(),
			);
			$data['css']			= $this->load->view('cssform',$data,true);
			$data['js']				= $this->load->view('jsform',$data,true);
			$data['script']			= $this->load->view('scriptform',$data,true);
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
			
			$text 	= "SELECT * FROM laman WHERE id='$id'";
			$sql	= $this->db->query($text);
			if($sql->num_rows() > 0){
				
				foreach($sql->result() as $db){
					$data['id']				=$id;
					$data['pages']			=$db->nama_laman;
					$data['konten']			=$db->konten;
					$data['status']			=$db->status;
					$data['posisi']			=$db->posisi;
					$data['layout']			=$db->layout;
					
				}
			}
			else{
					$data['id']				=$id;
					$data['pages']			='';
					$data['konten']			='';
					$data['status']			='';
					$data['posisi']			='';
					$data['layout']			='';
			}
			
			$config=$this->Config_model->Get_All();
			$data['title']				=  'Edit Laman';
			$data['logo']				= $config['logo'];
			$data['situs']				= $config['nama'];
			$data['author']				= $config['pemilik'];
			$data['favicon']			= $config['favicon'];
			$data['dd_status']			= $this->Site_model->dd_status();
			$data['dd_layout']			= $this->Pages_model->dd_layout();
			$data['css']				= $this->load->view('cssform',$data,true);
			$data['js']					= $this->load->view('jsform',$data,true);
			$data['script']				= $this->load->view('scriptform',$data,true);
			$data['content']			= $this->load->view('form',$data,TRUE);
			
			$this->load->view('admin/template',$data);
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
	public function simpan() {
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
		
			$pages					= ucwords($this->input->post('pages',null,TRUE));
			$posisi					= $this->input->post('posisi',null,TRUE); 
			$status					= $this->input->post('status',null,TRUE); 
			$konten					= $this->input->post('konten',null,TRUE); 
			$layout					= $this->input->post('layout',null,TRUE); 
				
			$data['nama_laman']		= $pages;
			$data['laman_seo']		= slug($pages);
			$data['posisi']			= $posisi;
			$data['konten']			= $konten; 
			$data['status']			= $status; 
			$data['layout']			= $layout; 
				
			$id						= $this->input->post('id',null,TRUE);
			$d						= $this->db->get_where('laman',array('id'=>$id));
			if($d->num_rows() > 0){
				$this->Pages_model->update($id,$data);
				$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Update');
				redirect(site_url('appweb/pages'));
			}
			else{
				$this->Pages_model->add($data);
				$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Tambah');
				redirect(site_url('appweb/pages'));
			}
		}
		else{
			redirect(site_url('appweb'));
		}		
	}

	public function hapus($id) 
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$this->Pages_model->hapus($id);
			$this->session->set_flashdata('SUCCESSMSG','Pages Deleted Successfully!!');
			redirect(site_url('appweb/pages'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}	
}