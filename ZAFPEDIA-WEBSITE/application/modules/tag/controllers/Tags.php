<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Tags extends CI_Controller {
	
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
				'title'				=> 'List Tag',
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
				'id'					=>'',
				'tags'					=>'',
				'title'					=> 'Add Tag',
				'logo'					=>$config['logo'],
				'situs'					=>$config['nama'],
				'author'				=>$config['pemilik'],
				'favicon'				=>$config['favicon'],
			);
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
	
	public function edit($id)
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$text 							= "SELECT * FROM tags WHERE id='$id'";
			$sql							= $this->db->query($text);
			if($sql->num_rows() > 0){
				
				foreach($sql->result() as $db){
					$data['id']				=$id;
					$data['tags']			=$db->tag;
					
				}
			}
			else{
					$data['id']				=$id;
					$data['tags']			='';
					
			}
			
			$config=$this->Config_model->Get_All();
			
			$data['title']			= 'Edit Tag';
			$data['situs']			= $config['nama'];
			$data['logo']			= $config['logo'];
			$data['author']			= $config['pemilik'];
			$data['favicon']		= $config['favicon'];
			
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
	
	public function hapus($id) 
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$this->Tag_model->hapus($id);
			$this->session->set_flashdata('SUCCESSMSG','Tag Deleted Successfully!!');
			redirect(site_url('appweb/tags'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
	public function simpan(){
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			date_default_timezone_set('Asia/Jakarta');
		
			$user_id 				= $this->session->userdata('username');
			$tag					= strtolower($this->input->post('tags',null,TRUE));
			$tgl_create				= $this->indonesia_library->format_tanggal_jam(date('Y-m-d H:i:s'));
				
			$new['tag']				= $tag;
			$new['tag_seo']			= slug($tag);
			$new['tgl_dibuat'] 		= $tgl_create;
			$new['user_id']			= $user_id;
			
			
			$old['tag']				= $tag;
			$old['tag_seo']			= slug($tag);
			$old['user_id']			= $user_id;
			
			$id						= $this->input->post('id',null,TRUE);
			$d						= $this->db->get_where('tags',array('id'=>$id));
			if($d->num_rows() > 0){
				$this->Tag_model->update($id,$old);
				$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Update');
				redirect(site_url('appweb/tags'));
			}else{
				$this->Tag_model->add($new);
				$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Tambah');
				redirect(site_url('appweb/tags/add'));
			}
			
		}
		else{
			redirect(site_url('appweb'));
		}
	}

}
	
	