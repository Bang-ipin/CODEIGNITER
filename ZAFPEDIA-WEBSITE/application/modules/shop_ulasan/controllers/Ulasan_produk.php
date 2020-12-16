<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Ulasan_produk extends CI_Controller {
	
	public function index()
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$config=$this->Config_model->Get_All();
			$data=array(
				'situs'			=> $config['nama'],
				'logo'			=> $config['logo'],
				'author'		=> $config['pemilik'],
				'favicon'		=> $config['favicon'],
				'tema'			=> $config['tema'],
				'title'			=> 'List ULasan Produk',
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
	
	public function show_ulasan()
	{	
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$data['dataulasan'] 				= $this->Ulasan_model->getUlasan();
			$this->load->view('ulasan',$data);
		}
		else{
			redirect(site_url('appweb'));
		}	
	}
	public function show_sent()
	{	
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$data['dataulasan'] 				= $this->Ulasan_model->getSentUlasan();
			$this->load->view('sent',$data);
		}
		else{
			redirect(site_url('appweb'));
		}	
	}
	
	public function show_trash()
	{	
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$data['dataulasan'] 				= $this->Ulasan_model->getTrashUlasan();
			$this->load->view('trash',$data);
		}
		else{
			redirect(site_url('appweb'));
		}	
	}
	
	public function view_ulasan()
	{	
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
		
			$id=$this->input->get('message_id');
			$data['viewulasan'] 			= $this->Ulasan_model->viewUlasan($id);
			$this->load->view('view',$data);
		
		}
		else{
			redirect(site_url('appweb'));
		}	
	}
	public function balas_ulasan()
	{	
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			$id=$this->input->get('messageid');
			$data['viewulasan'] 			= $this->Ulasan_model->viewULasan($id);
			$this->load->view('reply',$data,'refresh');
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
	public function sendulasan(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			date_default_timezone_set('Asia/Jakarta');

			$nama					= "Admin";
			$email					= $this->session->userdata('email');
			$produkid				= $this->input->post('produkid',null,TRUE); 
			$commentid				= $this->input->post('commentid',null,TRUE); 
			$indukid				= $this->input->post('indukid',null,TRUE); 
			$review					= $this->input->post('review',null,TRUE); 
			$time					= $this->indonesia_library->format_tanggal_jam(date('Y-m-d H:i:s'));

			$d['username']			= strip_tags($nama);
			$d['email']				= strip_tags($email);
			$d['review']			= htmlentities(strip_tags($review));
			$d['produkid']			= htmlentities(strip_tags($produkid));
			$d['komentar_id']		= htmlentities(strip_tags($commentid));
			$d['status']			= 1;
			$d['tanggal']				= $time;
			
			$r['username']			= strip_tags($nama);
			$r['email']				= strip_tags($email);
			$r['review']			= htmlentities(strip_tags($review));
			$r['produkid']			= htmlentities(strip_tags($produkid));
			$r['komentar_id']		= htmlentities(strip_tags($indukid));
			$r['status']			= 1;
			$r['tanggal']			= $time;
			
			$cek=$this->Ulasan_model->cek_ulasan($commentid)->num_rows();
			if($cek == TRUE ) {
				$this->Ulasan_model->add_ulasan($d);
				$this->session->set_flashdata('SUCCESSMSG','Berhasil Membalas Ulasan');
			}
			else {
				$this->Ulasan_model->add_ulasan($r);
				$this->session->set_flashdata('SUCCESSMSG','Berhasil Membalas Ulasan');
			}
			redirect(site_url('appweb/review-product'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
	public function move_to_trash($id,$status){
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			$this->Ulasan_model->trash($id,$status);
			$this->session->set_flashdata('SUCCESSMSG','Ulasan Produk Berhasil Di Pindah'); 
			redirect(site_url('appweb/review-product'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	public function hapus($id){
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			$this->Ulasan_model->hapus($id);
			$this->session->set_flashdata('SUCCESSMSG','Ulasan Produk Berhasil Dihapus'); 
			redirect(site_url('appweb/review-product'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
}
	
	