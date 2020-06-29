<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Buku extends CI_Controller {
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
		
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('public/produk',$data);
		$this->load->view('template/footer');	
	}
		
	
	public function tambah_produk($error=NULL){
		$data=array(
			'error'=>$error['error'],
			'kode_barang'=>$this->Produk_model->get_kode_barang(),
			'title'=>'Add produk',
			'dd_kategori'=>$this->Produk_model->dd_kategori_produk(),
			'dd_jenis'=>$this->Produk_model->dd_jenis_produk(),
			'dd_satuan'=>$this->Produk_model->dd_satuan_produk(),
			'attribute'=>"class='form-control select2'",
			);
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('public/tambah_produk',$data);
		$this->load->view('template/footer');
	}
	
	public function checkout(){		
		
		$data=array(
				'kode_barang'=>$this->Produk_model->get_kode_barang(),
				'nama_barang'=>$this->input->post('nama_barang'),
				'kode_kategori'=>$this->input->post('kategori'),
				'id_jenis'=>$this->input->post('jenis'),
				'harga_beli'=>$this->input->post('hargabeli'),
				'harga_jual'=>$this->input->post('hargajual'),
				'stock_awal'=>$this->input->post('stock'),
				'id_satuan'=>$this->input->post('satuan'),
				);
		$this->Produk_model->tambah_barang($data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success"> Data Berhasil Ditambahkan 
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
		redirect(base_url('produk'));
		
	}		
	
	public function edit($id,$error=NULL){
		$data=array(
			'error'=>$error['error'],
			'query'=>$this->Produk_model->get_barang_by_id($id),
			'title'=>'Edit Produk',
			'dd_kategori'=>$this->Produk_model->dd_kategori_produk(),
			'dd_jenis'=>$this->Produk_model->dd_jenis_produk(),
			'dd_satuan'=>$this->Produk_model->dd_satuan_produk(),
			
			);
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('public/edit_produk',$data);
		$this->load->view('template/footer');
		
		}
	
	public function edit_checkout(){
		$data=array(
			'kode_barang'=>$this->input->post('kode'),
			'nama_barang'=>$this->input->post('nama_barang'),
			'kode_kategori'=>$this->input->post('kategori'),
			'id_jenis'=>$this->input->post('jenis'),
			'harga_beli'=>$this->input->post('hargabeli'),
			'harga_jual'=>$this->input->post('hargajual'),
			'stock_awal'=>$this->input->post('stock'),
			'id_satuan'=>$this->input->post('satuan'),
			'gambar'=>$img_name,
			);
		$this->Produk_model->update_produk($id,$data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success"> Data Berhasil Di Edit
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
		redirect(base_url('produk'));
	}
	
	
	public function delete(){
	$id=$this->input->post('id');
	$query=$this->Produk_model->get_barang_by_id($id);
	$this->Produk_model->delete_produk($id);
	$this->session->set_flashdata('message','<div class="alert alert-success"> Data Berhasil Di Hapus
	<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
	redirect(base_url('produk'));
	}
}