<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Testimoni extends CI_Controller {
	
	public function index()
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$config=$this->Config_model->Get_All();
			$data=array(
				'logo'				=> $config['logo'],
				'author'			=> $config['pemilik'],
				'favicon'			=> $config['favicon'],
				'situs'				=> $config['nama'],
				'title'				=> 'List Testimoni',
			);
			$data['css']			= $this->load->view('css',$data,true);
			$data['js']				= $this->load->view('js',$data,true);
			$data['script']			= $this->load->view('script',$data,true);
			$data['content']		= $this->load->view('list',$data,TRUE);
			$this->load->view('admin/template',$data);
		}
		else{
			redirect(site_url('administrator'));
		}	
	}
	
	public function add()
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			$config=$this->Config_model->Get_All();
			
			$data['title'] 			= 'Add&nbsp;Testimoni';
			$data['logo']			= $config['logo'];
			$data['author']			= $config['pemilik'];
			$data['favicon']  		= $config['favicon'];
			$data['situs']			= $config['nama'];
			
			$data['id']				='';
			$data['namaclient']		='';
			$data['emailclient']	='';
			$data['testimoni']		='';
			
			
			$data['css']			= $this->load->view('cssform',$data,true);
			$data['js']				= $this->load->view('jsform',$data,true);
			$data['script']			= $this->load->view('scriptform',$data,true);
			$data['content']		= $this->load->view('form',$data,TRUE);
			$this->load->view('admin/template',$data);
		
		}
		else{
			redirect(site_url('administrator'));
		}
	}
	
	public function edit($id)
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$text 	= "SELECT * FROM testimoni WHERE id = '$id'";
			$sql	= $this->db->query($text);
			
			if($sql->num_rows() > 0){
				
				foreach($sql->result() as $db){
					$data['id']				=$id;
					$data['namaclient']		=$db->namaclient;
					$data['emailclient']	=$db->emailclient;
					$data['testimoni']		=$db->testimoni;
					
				
				}
			}
			else{
					$data['id']				=$id;
					$data['namaclient']		='';
					$data['emailclient']	='';
					$data['testimoni']		='';
					
			}
			
			$config=$this->Config_model->Get_All();
			
			$data['title'] 					= 'Edit&nbsp;Testimoni';
			$data['logo']					= $config['logo'];
			$data['author']					= $config['pemilik'];
			$data['favicon']  				= $config['favicon'];
			$data['situs']					= $config['nama'];
		
			$data['css']					= $this->load->view('cssform',$data,true);
			$data['js']						= $this->load->view('jsform',$data,true);
			$data['script']					= $this->load->view('scriptform',$data,true);
			$data['content']				= $this->load->view('form',$data,TRUE);
			$this->load->view('admin/template',$data);
		}
		else{
			redirect(site_url('administrator'));
		}
	}

	public function simpan(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$nama					= $this->input->post('namaclient',null,TRUE);
			$email					= $this->input->post('emailclient',null,TRUE);
			$testimoni				= $this->input->post('testimoni',null,TRUE);
			
			$data['namaclient']		= $nama;
			$data['emailclient']	= $email;
			$data['testimoni']		= $testimoni;
					
			
			$id						= $this->input->post('id',null,TRUE);
			$d						= $this->db->get_where('testimoni',array('id'=>$id));
			if($d->num_rows() > 0){
				$this->Testimoni_model->update($id,$data);
				$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Update');
				redirect(site_url('administrator/landingpage-testimoni'));
			}else{
				$this->Testimoni_model->add($data);
				$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Tambah');
				redirect(site_url('administrator/landingpage-testimoni'));
			}
		
		}
		else{
			redirect(site_url('administrator'));
		}
	}
	
	public function hapus($id) 
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			$query=$this->Testimoni_model->get_data_by_id($id);
			
			$this->Testimoni_model->hapus($id);
			$this->session->set_flashdata('SUCCESSMSG','Data berhasil di hapus!!');
			redirect(site_url('administrator/landingpage-testimoni'));
		}
		else{
			redirect(site_url('administrator'));
		}
	}
	
}
	
	