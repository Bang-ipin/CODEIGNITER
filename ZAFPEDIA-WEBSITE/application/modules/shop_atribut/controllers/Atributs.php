<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Atributs extends CI_Controller {
	
	public function index()
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$config=$this->Config_model->Get_All();
			$data['logo'] 			= $config['logo'];
			$data['situs']			= $config['nama'];
			$data['author']			= $config['pemilik'];
			$data['favicon']		= $config['favicon'];
			$data['title']			= 'List Atribut';
			
			$data['css']			= $this->load->view('css',$data,true);
			$data['js']				= $this->load->view('js',$data,true);
			$data['script']			= $this->load->view('script',$data,true);
			
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
			
			$config=$this->Config_model->Get_All();
			$data=array(
				'id'		=>'',
				'root'		=>'',
				'label'		=>'',
				'keterangan'=>'',
				'status'	=>'',
				'posisi'	=>'',
				'logo'		=>$config['logo'],
				'author'	=>$config['pemilik'],
				'favicon'	=>$config['favicon'],
				'situs'		=> $config['nama'],
				'title'		=>'Add Atribut',
				'dd_status'	=>$this->Site_model->dd_status(),
				'dd_parent'=> $this->Site_model->dd_parent_atribut(),
			);
			$data['css']		= $this->load->view('cssform',$data,true);
			$data['js']			= $this->load->view('jsform',$data,true);
			//$data['script']		= $this->load->view('scriptform',$data,true);
			
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
			$text 		 	="SELECT * FROM atribut WHERE id_atribut='$id'";
			$sql			= $this->db->query($text);
			if($sql->num_rows() > 0){
				
				foreach($sql->result() as $db){
					$data['id']				=$id;
					$data['label']			=$db->label;
					$data['root']			=$db->parent_id;
					$data['keterangan']		=$db->keterangan;
					$data['posisi']			=$db->posisi;
					$data['status']			=$db->status;
				}
			}
			else{
					$data['id']				=$id;
					$data['label']			='';
					$data['root']			='';
					$data['keterangan']		='';
					$data['posisi']			='';
					$data['status']			='';
			}
			
			$config=$this->Config_model->Get_All();
			
			$data['logo']		= $config['logo'];
			$data['author']		= $config['pemilik'];
			$data['favicon']	= $config['favicon'];
			$data['situs']		= $config['nama'];
			$data['title']		= 'Edit Atribut';
			$data['dd_status']	= $this->Site_model->dd_status();
			$data['dd_parent']	= $this->Site_model->dd_parent_atribut();
			$data['css']		= $this->load->view('cssform',$data,true);
			$data['js']			= $this->load->view('jsform',$data,true);
			//$data['script']		= $this->load->view('scriptform',$data,true);
			
			$data['content']= $this->load->view('form',$data,TRUE);
			
			$this->load->view('admin/template',$data);
		}
		else{
			redirect(site_url('appweb'));
		}
	}

	public function simpan()
	{
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			date_default_timezone_set('Asia/Jakarta');
		
			$label					= strtolower($this->input->post('label',null,TRUE));
			$root					= $this->input->post('root',null,TRUE);
			$keterangan				= $this->input->post('keterangan',null,TRUE); 
			$posisi					= $this->input->post('posisi',null,TRUE); 
			$status					= $this->input->post('status',null,TRUE); 
			$create_date			= $this->indonesia_library->format_tanggal_jam(date('Y-m-d H:i:s'));
			
			$new['label']			= $label;
			$new['parent_id']		= $root;
			$new['keterangan']		= $keterangan;
			$new['posisi']			= $posisi;
			$new['created_date'] 	= $create_date;
			$new['status']			= $status; 
			
			
			$old['label']			= $label;
			$old['parent_id']		= $root;
			$old['keterangan']		= $keterangan;
			$old['posisi']			= $posisi;
			$old['status']			= $status; 
			
			$id						= $this->input->post('id',null,TRUE);
			$d						= $this->db->get_where('atribut',array('id_atribut'=>$id));
			if($d->num_rows() > 0){
				$this->Atribut_model->update_atribut($id,$old);
				$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Update');
				redirect(site_url('appweb/atributs'));
			}else{
				$this->Atribut_model->add_atribut($new);
				$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Tambah');
				redirect(site_url('appweb/atributs'));
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
			$this->Atribut_model->AtributStatus($id,$status);
			$this->session->set_flashdata('SUCCESSMSG','Atribut Updated Successfully!!');
			redirect(site_url('appweb/atributs'));
		}
		else{
			redirect(site_url('adminstrator'));
		}
	}
	
	public function hapus($id) 
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$this->Atribut_model->hapus_atribut($id);
			$this->session->set_flashdata('SUCCESSMSG','Atribut Deleted Successfully!!');
			redirect(site_url('appweb/atributs'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}		

}
	
	