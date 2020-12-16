<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function index(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$config=$this->Config_model->Get_All();
			$data=array(
				'logo'		=>$config['logo'],
				'situs'		=>$config['nama'],
				'author'	=>$config['pemilik'],
				'favicon'	=>$config['favicon'],
				'title'		=> 'List User',
			);
			$data['css']				= $this->load->view('css',$data,true);
			$data['js']					= $this->load->view('js',$data,true);
			$data['script']				= $this->load->view('script',$data,true);
			
			$data['content']= $this->load->view('list',$data,TRUE);		
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
			
			$data['username']		='';
			$data['password']		='';
			$data['email']			='';
			$data['user']			='';
			$data['telepon']		='';
			$data['img']			='';
			$data['status']			='';
			$data['level']			='';
			
			$config=$this->Config_model->Get_All();
			
			$data['title']			= 'Add User';
			$data['situs']			= $config['nama'];
			$data['logo']			= $config['logo'];
			$data['author']			= $config['pemilik'];
			$data['favicon']		= $config['favicon'];
			$data['dd_level']		= $this->User_model->dd_level();
			$data['dd_status']		= $this->Site_model->dd_status();
			
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
			
			$text 	= "SELECT * FROM admin WHERE username = '$id'";
			$sql	= $this->db->query($text);
			
			if($sql->num_rows() > 0){
				
				foreach($sql->result() as $db){
					
					$data['username']		= $id;
					$data['password']		= '';
					$data['email']			= $db->email;
					$data['user']			= $db->nama_lengkap;
					$data['telepon']		= $db->telepon;
					$data['image']			= $db->foto;
					$data['status']			= $db->status;
					$data['level']			= $db->level;
				
				}
			}
			else
			{
				
				$data['username']		= $id;
				$data['password']		= '';
				$data['email']			= '';
				$data['user']			= '';
				$data['telepon']		= '';
				$data['image']			= '';
				$data['status']			= '';
				$data['level']			= '';
			}
			
			$config =$this->Config_model->Get_All();
			
			$data['title']  			= 'Edit User';
			$data['situs']				= $config['nama'];
			$data['logo']				= $config['logo'];
			$data['author']				= $config['pemilik'];
			$data['favicon']			= $config['favicon'];
			$data['dd_level']			= $this->User_model->dd_level();
			$data['dd_status']  		= $this->Site_model->dd_status();
			
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
			
			$this->User_model->hapus($id);
			$this->session->set_flashdata('SUCCESSMSG','User Berhasil Dihapus'); 
			redirect(site_url('appweb/user'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
	public function simpan(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$user 					= $this->db->escape_str($this->input->post('username',null,TRUE));
			$pwd					= $this->input->post('password',null,TRUE);
			$email					= $this->input->post('email',null,TRUE); 
			$fullname				= $this->input->post('user',null,TRUE); 
			$telepon				= $this->input->post('telepon',null,TRUE); 
			$level					= $this->input->post('level',null,TRUE);
			//$foto					= $this->input->post('foto',null,TRUE);
			$status					= $this->input->post('status',null,TRUE);
				
			$path							='./files/media/';
			$nm_img							='user-'.trim(substr(md5(rand()),0,4));
			$config['upload_path']          = $path;
			$config['allowed_types']        = 'jpg|jpeg|png';
			$config['file_name']            = $nm_img;
			$config['max_size']             = 1024;
			$config['max_width']            = 1024;;
			$config['max_height']           = 1024;;
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
				redirect(site_url('appweb/sliders'));
			} 
			else 
			{
				
				if(!$this->upload->do_upload('image'))
				{
					$data['username']		= $user;
					$data['password']		= $this->phpass->hash($pwd);
					$data['email']			= $email;
					$data['nama_lengkap']	= $fullname; 
					$data['telepon']		= $telepon; 
					$data['level']			= $level;
					//$data['foto']			= $foto;
					$data['status']			= $status;
					
					$id						= $this->input->post('username',null,TRUE);
					
					$d= $this->db->get_where('admin',array('username'=>$id));
				}
				else{
					$file_img				= $this->upload->data();
					$img_name				= $file_img['file_name'];
					
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
					$data['username']		= $user;
					$data['password']		= $this->phpass->hash($pwd);
					$data['email']			= $email;
					$data['nama_lengkap']	= $fullname; 
					$data['telepon']		= $telepon; 
					$data['level']			= $level;
					$data['foto']			= $img_name;
					$data['status']			= $status;
					
					$id						= $this->input->post('username',null,TRUE);
					
					$d= $this->db->get_where('admin',array('username'=>$id));
					@unlink('./files/media/'.$image_lama);
					
				}
				if($d->num_rows() > 0)
				{
					if(empty($pwd)){
						$this->db->query("UPDATE admin SET email='$email',nama_lengkap='$fullname',telepon='$telepon',level='$level',foto='$img_name',status='$status' WHERE username ='$user'");
					}else{
						$this->User_model->update_user($id,$data);
					}
					$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Update');
					redirect(site_url('appweb/user'));
				}
				else{
					$this->User_model->tambah_user($data);
					$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Tambah');
					redirect(site_url('appweb/user'));	
				}
			}
		}
		else{
			redirect(site_url('appweb'));
		}
	}
}
	
	