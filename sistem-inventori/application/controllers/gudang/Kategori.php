<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Kategori extends CI_Controller {
	
	Public function __construct(){
		parent::__construct();
		if ($this->session->userdata('usergroup')!='Gudang') {
		$this->session->set_flashdata('pesan','Maaf Anda Bukan admin Gudang');
		redirect(base_url());
		}
			$this->load->model('Kategori_model');
		}

	public function index()
	{
		$data['title'] = 'List kategori'; //judul title
        $data['query'] = $this->Kategori_model->get_all_kategori(); //query model semua barang
 
		$this->load->view('gudang/template/head',$data);
		$this->load->view('gudang/template/header');
		$this->load->view('gudang/template/menu');
		$this->load->view('gudang/list_kategori',$data);
		$this->load->view('gudang/template/footer');	
	}
		
	public function tambah_kategori(){
		
		$data['title']='Add kategori';
		$this->load->view('gudang/template/head',$data);
		$this->load->view('gudang/template/header');
		$this->load->view('gudang/template/menu');
		$this->load->view('gudang/tambah_kategori_produk');
		$this->load->view('gudang/template/footer');
	}
	
	public function tambah_kategori_proses()
	{
		$this->form_validation->set_rules('kode','kode','required');
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"> 
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
		if ($this->form_validation->run() == FALSE)
        {
			$this->tambah_kategori();
		}else{
		$data=array(
			'kode_kategori'=>$this->input->post('kode'),
			'kategori'=>$this->input->post('nama')
			);
			$this->Kategori_model->tambah_kategori($data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success"> Data Berhasil Ditambahkan 
			<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
			redirect(base_url('gudang/kategori'));
		}
	}
	
	public function edit_kategori($id){
		$data['query']=$this->Kategori_model->get_kategori_by_id($id);
		$data['title']='Edit kategori';
		$this->load->view('gudang/template/head',$data);
		$this->load->view('gudang/template/header');
		$this->load->view('gudang/template/menu');
		$this->load->view('gudang/edit_kategori_produk',$data);
		$this->load->view('gudang/template/footer');
		}
	
	public function edit_kategori_proses(){
	$id=$this->input->post('kode');
	$this->form_validation->set_rules('kode','kode','required');
	$this->form_validation->set_rules('Nama','Nama','required');
	$this->form_validation->set_error_delimiters('<div class="alert alert-danger"> 
	<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
	if ($this->form_validation->run() == FALSE)
       {
		$this->edit_kategori($id);
	}else{
	$data=array(
		'kode_kategori'=>$this->input->post('kode'),
		'kategori'=>$this->input->post('Nama')
		);
		$this->Kategori_model->update_kategori($id,$data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success"> Data Berhasil Di Edit 
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
		redirect(base_url('gudang/kategori'));
		}
	}
	
	public function delete(){
	$id=$this->uri->segment(4);
	$this->Kategori_model->delete_kategori($id);
	redirect(base_url('gudang/kategori'));
	}
	
}
	
	