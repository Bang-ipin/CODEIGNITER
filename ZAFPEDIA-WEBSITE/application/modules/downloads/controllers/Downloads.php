<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Downloads extends CI_Controller {
	
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
				'title'				=> 'List Download',
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
	
	public function add()
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			$config=$this->Config_model->Get_All();
			
			$data['title'] 			= 'Add&nbsp;File&nbsp;Download';
			$data['logo']			= $config['logo'];
			$data['author']			= $config['pemilik'];
			$data['favicon']  		= $config['favicon'];
			$data['situs']			= $config['nama'];
			
			$data['id']				='';
			$data['judul']			='';
			$data['nama_file']		='';
			$data['url']			='';
			$data['img']			='';
			
			
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
			
			$text 	= "SELECT * FROM download WHERE id = '$id'";
			$sql	= $this->db->query($text);
			
			if($sql->num_rows() > 0){
				
				foreach($sql->result() as $db){
					$data['id']				=$id;
					$data['judul']			=$db->judul;
					$data['nama_file']		=$db->nama_file;
					$data['url']			=$db->url;
					$data['image']			=$db->background;
					
				
				}
			}
			else{
					$data['id']				=$id;
					$data['judul']			='';
					$data['nama_file']		='';
					$data['url']			='';
					$data['image']			='';
					
			}
			
			$config=$this->Config_model->Get_All();
			
			$data['title'] 					= 'Edit&nbsp;File&nbsp;Download';
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
			redirect(site_url('appweb'));
		}
	}

	public function simpan(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			date_default_timezone_set('Asia/Jakarta');
			$path							='./files/download/';
			$config['upload_path']          = $path;
			$config['allowed_types']        = 'jpg|jpeg|png|gif|bmp|zip|rar|pdf|doc|docx|xls|xlsx|tar';
			$config['max_size']             = 1024;
			$config['max_width']            = 1024;;
			$config['max_height']           = 1024;;
			$config['overwrite']            = TRUE;
			
			$this->upload->initialize($config);
			
			$file_lama				= $this->input->post('file_lama');
			
			$judul					= $this->input->post('judul',null,TRUE);
			$url					= $this->input->post('url',null,true);
			$nama_file				= $this->input->post('nama_file',null,true);
			//$image					= $this->input->post('image',null,true);
			$create_date			= $this->indonesia_library->format_tanggal_jam(date('Y-m-d H:i:s'));
			$modif_date				= $this->indonesia_library->format_tanggal_jam(date('Y-m-d H:i:s'));
			
			$check_file_upload= FALSE;
			if (isset($_FILES['nama_file']['error'])&& $_FILES['nama_file']['error'] != 4){
				$check_file_upload = TRUE;
			}
			if($check_file_upload && !$this->upload->do_upload('nama_file')) {
				$this->session->set_flashdata('error',$this->upload->display_errors('<div class="alert alert-danger"> 
				<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>'));
				redirect(site_url('appweb/downloads/add'));
			} else{
				if(!$this->upload->do_upload('nama_file')){
					$new['judul']			= $judul;
					$new['url']				= $url;
					$new['nama_file']		= $file_name;
					//$new['background']		= $image;
					$new['tgl_posting']		= $create_date;
					$new['modif_date'] 		= $modif_date;
					
					$old['judul']			= $judul;
					$old['url']				= $url;
					//$old['background']		= $image;
					$old['nama_file']		= $file_lama;
					$old['modif_date']		= $modif_date;
				
				}
				else{
					$file_upload 			= $this->upload->data();
					$file_name				= $file_upload['file_name'];
					
					$new['judul']			= $judul;
					$new['url']				= $url;
					$new['nama_file']		= $file_name;
					//$new['background']		= $image;
					$new['tgl_posting']		= $create_date;
					$new['modif_date'] 		= $modif_date;
					
					$old['judul']			= $judul;
					$old['url']				= $url;
					//$old['background']		= $image;
					$old['nama_file']		= $file_name;
					$old['modif_date']		= $modif_date;
					
					@unlink('./files/download/'.$file_lama);
				}
			
				$id						= $this->input->post('id',null,TRUE);
				$d						= $this->db->get_where('download',array('id'=>$id));
				if($d->num_rows() > 0){
					$this->Download_model->update($id,$old);
					$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Update');
					redirect(site_url('appweb/downloads'));
				}else{
					$this->Download_model->add($new);
					$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Tambah');
					redirect(site_url('appweb/downloads'));
				}
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
			
			$this->Download_model->status($id,$status);
			$this->session->set_flashdata('SUCCESSMSG','Status berhasil di update!!');
			redirect(site_url('appweb/downloads'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
	public function hapus($id) 
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			$query=$this->Download_model->get_data_by_id($id);
			foreach($query as $rows ){
				@unlink('./files/download/'.$rows->nama_file);
			}
			$this->Download_model->hapus($id);
			$this->session->set_flashdata('SUCCESSMSG','Data berhasil di hapus!!');
			redirect(site_url('appweb/downloads'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
}
	
	