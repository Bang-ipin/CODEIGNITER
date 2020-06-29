<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Produk extends CI_Controller {
	Public function __construct(){
		parent::__construct();
		if ($this->session->userdata('usergroup')!='Administrator') {
		$this->session->set_flashdata('pesan','Maaf Anda Bukan Admin');
		redirect(base_url());
		}
	
			$this->load->model('Produk_model');
			$this->load->library('form_validation');
			$this->load->library('upload');
		}
	
	public function index()
	{	
		$data['title'] = 'List Produk'; //judul title
        $data['query'] = $this->Produk_model->get_all_produk(); //query model semua barang
		
		$this->load->view('admin/template/head',$data);
		$this->load->view('admin/template/header');
		$this->load->view('admin/template/menu');
		$this->load->view('admin/produk',$data);
		$this->load->view('admin/template/footer');	
	}
		
	
	public function tambah_produk($error=NULL){
		$data=array(
			'error'=>$error['error'],
			'kode_barang'=>$this->Produk_model->get_kode_barang(),
			'title'=>'Add produk',
			'dd_kategori'=>$this->Produk_model->dd_kategori_produk(),
			'kategori_selected'=>$this->input->post('Kategori')? $this->input->post('Kategori'):'',
			'dd_jenis'=>$this->Produk_model->dd_jenis_produk(),
			'jenis_selected'=>$this->input->post('Jenis')? $this->input->post('Jenis'):'',
			'dd_satuan'=>$this->Produk_model->dd_satuan_produk(),
			'satuan_selected'=>$this->input->post('Satuan')? $this->input->post('Satuan'):'',
			//'dd_keterangan'=>$this->Produk_model->dd_keterangan('master_barang','Keterangan'),
			'attribute'=>"class='form-control select2'",
			);
		$this->load->view('admin/template/head',$data);
		$this->load->view('admin/template/header');
		$this->load->view('admin/template/menu');
		$this->load->view('admin/tambah_produk',$data);
		$this->load->view('admin/template/footer');
	}
	
	public function tambah_produk_proses(){		
		
		$path							='./uploads/';
		$nm_img							='IMG-'.trim(substr(md5(rand()),0,4));
		$config['upload_path']          = $path;
		$config['allowed_types']        = 'gif|jpg|jpeg|png';
		$config['file_name']            = $nm_img;
		$config['max_size']             = 2048;
		$config['max_width']            = 5000;
		$config['max_height']           = 5000;
		$config['overwrite']            = TRUE;
		
		$this->upload->initialize($config);
		
	$this->form_validation->set_rules('kode','kode','required');
	$this->form_validation->set_rules('Nama_Barang','Nama_Barang','required');
	$this->form_validation->set_rules('Kategori','Kategori','required');
	$this->form_validation->set_rules('Jenis','Jenis','required');
	$this->form_validation->set_rules('Hargabeli','Hargabeli','required');
	$this->form_validation->set_rules('Hargajual','Hargajual','required');
	$this->form_validation->set_rules('Stock','Stock','required|is_numeric');
	$this->form_validation->set_rules('Satuan','Satuan','required|is_numeric');
	$this->form_validation->set_error_delimiters('<div class="alert alert-danger"> 
	<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
	$check_file_upload= FALSE;
	if (isset($_FILES['Gambar']['error'])&& $_FILES['Gambar']['error'] != 4){
		$check_file_upload = TRUE;
	}
	if(!$this->form_validation->run()|| ($check_file_upload && !$this->upload->do_upload('Gambar')))
	{
		$error=$this->session->set_flashdata('error',$this->upload->display_errors('<div class="alert alert-danger"> 
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>'));
		$this->tambah_produk($error);
		
	} else
		{
			$file_img=$this->upload->data();
			$data=array(
					'kode_barang'=>$this->Produk_model->get_kode_barang(),
					'nama_barang'=>$this->input->post('Nama_Barang'),
					'kode_kategori'=>$this->input->post('Kategori'),
					'id_jenis'=>$this->input->post('Jenis'),
					'harga_beli'=>$this->input->post('Hargabeli'),
					'harga_jual'=>$this->input->post('Hargajual'),
					'stock_awal'=>$this->input->post('Stock'),
					'id_satuan'=>$this->input->post('Satuan'),
					'gambar'=>$file_img['file_name'],
					);
			$this->Produk_model->tambah_barang($data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success"> Data Berhasil Ditambahkan 
			<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
			redirect(base_url('admin/produk'));
		}
	}		
	
	public function edit($id,$error=NULL){
		$data=array(
			'error'=>$error['error'],
			'query'=>$this->Produk_model->get_barang_by_id($id),
			'title'=>'Edit Produk',
			'dd_kategori'=>$this->Produk_model->dd_kategori_produk(),
			//'dd_keterangan'=>$this->Produk_model->dd_keterangan('master_barang','keterangan'),
			'dd_jenis'=>$this->Produk_model->dd_jenis_produk(),
			'dd_satuan'=>$this->Produk_model->dd_satuan_produk(),
			
			);
		$this->load->view('admin/template/head',$data);
		$this->load->view('admin/template/header');
		$this->load->view('admin/template/menu');
		$this->load->view('admin/edit_produk',$data);
		$this->load->view('admin/template/footer');
		
		}
	
	public function update_produk_proses(){
		$path							='./asset/uploads/';
		$nm_img							='IMG-'.trim(substr(md5(rand()),0,4));
		$config['upload_path']          = $path;
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            = $nm_img;
		$config['max_size']             = 2048;
		$config['max_width']            = 5000;
		$config['max_height']           = 5000;
		$config['overwrite']            = TRUE;
		$this->upload->initialize($config);
		
		$id=$this->input->post('kode');
		$img_lama= $this->input->post('imglama');
		
				
		$this->form_validation->set_rules('kode','kode','required');
		$this->form_validation->set_rules('Nama_Barang','Nama_Barang','required');
		$this->form_validation->set_rules('Kategori','Kategori','required');
		$this->form_validation->set_rules('Jenis','Jenis','required');
		$this->form_validation->set_rules('Hargabeli','Hargabeli','required');
		$this->form_validation->set_rules('Hargajual','Hargajual','required');
		$this->form_validation->set_rules('Stock','Stock','required');
		$this->form_validation->set_rules('Satuan','Satuan','required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"> 
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
		$check_file_upload= FALSE;
		if (isset($_FILES['Gambar']['error'])&& $_FILES['Gambar']['error'] != 4){
			$check_file_upload = TRUE;
		}
		if(!$this->form_validation->run()|| ($check_file_upload && !$this->upload->do_upload('Gambar')))
		{
			$error=$this->session->set_flashdata('error',$this->upload->display_errors('<div class="alert alert-danger"> 
			<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>'));
			$this->edit($id,$error);
		} else {
			if(!$this->upload->do_upload('Gambar'))
			{
				$data=array(
					'kode_barang'=>$this->input->post('kode'),
					'nama_barang'=>$this->input->post('Nama_Barang'),
					'kode_kategori'=>$this->input->post('Kategori'),
					'id_jenis'=>$this->input->post('Jenis'),
					'harga_beli'=>$this->input->post('Hargabeli'),
					'harga_jual'=>$this->input->post('Hargajual'),
					'stock_awal'=>$this->input->post('Stock'),
					'id_satuan'=>$this->input->post('Satuan'),
					);
			} else {
				$file_img=$this->upload->data();
				$img_name=$file_img['file_name'];
				$data=array(
					'kode_barang'=>$this->input->post('kode'),
					'nama_barang'=>$this->input->post('Nama_Barang'),
					'kode_kategori'=>$this->input->post('Kategori'),
					'id_jenis'=>$this->input->post('Jenis'),
					'harga_beli'=>$this->input->post('Hargabeli'),
					'harga_jual'=>$this->input->post('Hargajual'),
					'stock_awal'=>$this->input->post('Stock'),
					'id_satuan'=>$this->input->post('Satuan'),
					'gambar'=>$img_name,
					);
				@unlink('./asset/uploads/'.$img_lama);
				}
			$this->Produk_model->update_produk($id,$data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success"> Data Berhasil Di Edit
			<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
			redirect(base_url('admin/produk'));
		}
	}
	
	
	public function delete(){
	$id=$this->uri->segment(4);
	$query=$this->Produk_model->get_barang_by_id($id);
	foreach($query as $rows ){
			@unlink('./uploads/'.$rows->gambar);
		}
	$this->Produk_model->delete_produk($id);
	$this->session->set_flashdata('message','<div class="alert alert-success"> Data Berhasil Di Hapus
	<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
	redirect(base_url('admin/produk'));
	}
}