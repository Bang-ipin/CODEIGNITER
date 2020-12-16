<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Levels extends CI_Controller {
	
	public function index(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$data['title']			= 'List Level';
			
			$config 				= $this->Config_model->Get_All();
			$data['logo']			= $config['logo'];
			$data['situs']			= $config['nama'];
			$data['author']			= $config['pemilik'];
			$data['favicon']		= $config['favicon'];
			$data['tema']			= $config['tema'];
			
			$data['css']			= $this->load->view('css',$data,true);
			$data['js']				= $this->load->view('js',$data,true);
			$data['script']			= $this->load->view('script',$data,true);
			$data['content'] = $this->load->view('list',$data,TRUE);
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
			
			$data['title']			= 'Tambah Level';
		
			$config			 		= $this->Config_model->Get_All();
			$data['logo']			= $config['logo'];
			$data['situs']			= $config['nama'];
			$data['author']			= $config['pemilik'];
			$data['favicon']		= $config['favicon'];
			$data['tema']			= $config['tema'];
			
			$data['id']				= '';
			$data['level']			= '';
			
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
		
	public function edit($id)
	{
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$text 	= "SELECT * FROM level WHERE id_level = '$id'";
			$sql	= $this->db->query($text);
			
			if($sql->num_rows() > 0){
				
				foreach($sql->result() as $db){
					
					$data['id']			= $id;
					$data['level']		= $db->level;
				}
			}
			else{
					
					$data['id']			= $id;
					$data['level']		= '';
				}
			
			$config			 			= $this->Config_model->Get_All();
			
			$data['title']  			= 'Edit Level';
			$data['situs']				= $config['nama'];
			$data['logo']				= $config['logo'];
			$data['author']				= $config['pemilik'];
			$data['favicon']			= $config['favicon'];
			$data['tema']				= $config['tema'];
			
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
		
	public function hapus($id){
        
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$this->Level_model->delete_level($id);
			$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Dihapus'); 
			redirect(site_url('appweb/level'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
	public function simpan(){
		 
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$id					= $this->input->post('id',null,TRUE); 
			$level				= $this->input->post('level',null,TRUE); 
			
			$data['id_level']	= $id; 
			$data['level']		= $level; 
			
			$d= $this->db->get_where('level',array('id_level'=>$id));
			if($d->num_rows() > 0){
				$this->Level_model->update_level($id,$data);
				$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Update');
				redirect(site_url('appweb/level'));
			}else{
				$this->Level_model->add_level($data);
				$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Tambah');
				redirect(site_url('appweb/level'));	
			}
		}
		else{
			redirect(site_url('appweb'));
		}
	}
		
}
	
	