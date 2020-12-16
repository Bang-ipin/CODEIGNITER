<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Comments extends CI_Controller {
	
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
				'tema'				=> $config['tema'],
				'title'				=> 'List Komentar',
			);
			
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
	
	public function show_komentar()
	{	
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$data['datakomentar'] 				= $this->Komentar_model->getKomentar();
			$this->load->view('komentar',$data,'refresh');
		}
		else{
			redirect(site_url('appweb'));
		}	
	}
	public function tulis_komentar()
	{	
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$this->load->view('compose','refresh');
		}
		else{
			redirect(site_url('appweb'));
		}	
	}
	public function show_sent()
	{	
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$data['datakomentar'] 				= $this->Komentar_model->getSentKomentar();
			$this->load->view('sent',$data,'refresh');
		}
		else{
			redirect(site_url('appweb'));
		}	
	}
	
	public function show_trash()
	{	
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$data['datakomentar'] 				= $this->Komentar_model->getTrashKomentar();
			$this->load->view('trash',$data,'refresh');
		}
		else{
			redirect(site_url('appweb'));
		}	
	}
	
	public function view_komentar()
	{	
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
		
			$id=$this->input->get('message_id');
			$data['viewkomentar'] 			= $this->Komentar_model->viewKomentar($id);
			$this->load->view('view',$data,'refresh');
		
		}
		else{
			redirect(site_url('appweb'));
		}	
	}
	public function balas_komentar()
	{	
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			$id=$this->input->get('messageid');
			$data['viewkomentar'] 			= $this->Komentar_model->viewKomentar($id);
			$this->load->view('reply',$data,'refresh');
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
	public function sendkomentar(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			date_default_timezone_set('Asia/Jakarta');

			$nama					= "Admin";
			$email					= $this->session->userdata('email');
			$blogid					= $this->input->post('blogid',null,TRUE); 
			$commentid				= $this->input->post('commentid',null,TRUE); 
			$indukid				= $this->input->post('indukid',null,TRUE); 
			$review					= $this->input->post('review',null,TRUE); 
			$time					= $this->indonesia_library->format_tanggal_jam(date('Y-m-d H:i:s'));

			$d['username']			= strip_tags($nama);
			$d['email']				= strip_tags($email);
			$d['review']			= htmlentities(strip_tags($review));
			$d['blogid']			= htmlentities(strip_tags($blogid));
			$d['komentar_id']		= htmlentities(strip_tags($commentid));
			$d['status']			= 1;
			$d['disetujui']			= 1;
			$d['tanggal']			= $time;
			
			$r['username']			= strip_tags($nama);
			$r['email']				= strip_tags($email);
			$r['review']			= htmlentities(strip_tags($review));
			$r['blogid']			= htmlentities(strip_tags($blogid));
			$r['komentar_id']		= htmlentities(strip_tags($indukid));
			$r['status']			= 1;
			$r['disetujui']			= 1;
			$r['tanggal']			= $time;
			
			$cek=$this->Komentar_model->cek_komentar($commentid)->num_rows();
			if($cek == TRUE ) {
				$this->Komentar_model->add_komentar($d);
				$this->session->set_flashdata('SUCCESSMSG','berhasil membalas komentar');
			}
			else {
				$this->Komentar_model->add_komentar($r);
				$this->session->set_flashdata('SUCCESSMSG','berhasil membalas komentar');
			}
			redirect(site_url('appweb/comments'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	public function approvecomments($id,$status) 
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$this->Komentar_model->Approve($id,$status);
			$this->session->set_flashdata('SUCCESSMSG','Comment approved Successfully!!');
			redirect(site_url('appweb/home'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	public function approve($id,$status) 
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$this->Komentar_model->Approve($id,$status);
			$this->session->set_flashdata('SUCCESSMSG','Komentar berhasil disetujui!!');
			redirect(site_url('appweb/comments'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	public function move_to_trash($id,$status){
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			$this->Komentar_model->trash($id,$status);
			$this->session->set_flashdata('SUCCESSMSG','Pesan Berhasil Di Pindah'); 
			redirect(site_url('appweb/comments'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	public function move_trash($id,$status){
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			$this->Komentar_model->trash($id,$status);
			$this->session->set_flashdata('SUCCESSMSG','Pesan Berhasil Di Pindah'); 
			redirect(site_url('appweb/home'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	public function hapus($id){
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			$this->Komentar_model->hapus($id);
			$this->session->set_flashdata('SUCCESSMSG','Pesan Berhasil Dihapus'); 
			redirect(site_url('appweb/comments'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
}
	
	