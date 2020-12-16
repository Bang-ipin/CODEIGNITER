<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Faqs extends CI_Controller {
	
	public function index(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$config=$this->Config_model->Get_All();
			$data=array(
				'logo'				=>$config['logo'],
				'author'			=>$config['pemilik'],
				'favicon'			=>$config['favicon'],
				'tema'				=> $config['tema'],
				'title'				=> "List FAQ",
				'situs'				=> $config['nama'],
			
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
				'pertanyaan'		=>'',
				'jawaban'			=>'',
				'collapse'			=>$this->Faq_model->kode_otomatis(),
				
				'logo'				=>$config['logo'],
				'situs'				=>$config['nama'],
				'author'			=>$config['pemilik'],
				'favicon'			=>$config['favicon'],
				'tema'				=> $config['tema'],
				'title'				=> 'Tambah FAQ',
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
			
			$text 	= "SELECT * FROM faq WHERE id='$id'";
			$sql	= $this->db->query($text);
			if($sql->num_rows() > 0){
				
				foreach($sql->result() as $db){
					$data['id']				=$id;
					$data['pertanyaan']		=$db->pertanyaan;
					$data['jawaban']		=$db->jawaban;
					$data['collapse']		=$db->collapse;
					
				}
			}
			else{
					$data['id']				=$id;
					$data['pertanyaan']		='';
					$data['jawaban']		='';
					$data['collapse']		='';
					
			}
			
			$config=$this->Config_model->Get_All();
			$data['title']					=  'Edit FAQ';
			$data['logo']					= $config['logo'];
			$data['situs']					= $config['nama'];
			$data['author']					= $config['pemilik'];
			$data['favicon']				= $config['favicon'];
			$data['tema']					= $config['tema'];
			
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
	
	public function simpan() {
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			date_default_timezone_set('Asia/Jakarta');
			
			$pertanyaan					= ucwords($this->input->post('pertanyaan',null,TRUE));
			$jawaban					= $this->input->post('jawaban',null,TRUE); 
			$collapse					= $this->input->post('collapse',null,TRUE); 
			$tgl_update					= $this->indonesia_library->format_tanggal_jam(date('Y-m-d')); 
				
			$data['pertanyaan']			= $pertanyaan;
			$data['jawaban']			= $jawaban;
			$data['collapse']			= $collapse;
			$data['tgl_update']			= $tgl_update; 
				
			$id							= $this->input->post('id',null,TRUE);
			$d							= $this->db->get_where('faq',array('id'=>$id));
		
			if($d->num_rows() > 0){
				$this->Faq_model->update($id,$data);
				$this->session->set_flashdata('SUCCESSMSG','FAQ Updated Successfully');
				redirect(site_url('appweb/linkfaq'));
			}
			else{
				$this->Faq_model->add($data);
				$this->session->set_flashdata('SUCCESSMSG','FAQ Added Successfully');
				redirect(site_url('appweb/linkfaq'));
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
			$query=$this->Faq_model->get_faq_by_id($id);
			$this->Faq_model->hapus($id);
			$this->session->set_flashdata('SUCCESSMSG','FAQ Deleted Successfully!!');
			redirect(site_url('appweb/linkfaq'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}	
	
}