<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Stok_toko extends CI_Controller {
	Public function __construct(){
		parent::__construct();
		if ($this->session->userdata('usergroup')!='Toko') {
		$this->session->set_flashdata('pesan','Maaf Anda Bukan Admin Toko');
		redirect(base_url());
		}
		$this->load->model('Produk_model');
			$this->load->library('form_validation');
		}
	
	public function index()
	{	
		$data['title'] = 'List Produk'; //judul title
        $data['query'] = $this->Produk_model->get_Barang_Toko1(); //query model semua barang
		
		$this->load->view('toko/template/head',$data);
		$this->load->view('toko/template/header');
		$this->load->view('toko/template/menu');
		$this->load->view('toko/produk',$data);
		$this->load->view('toko/template/footer');	
	}
		
	
	public function add($error=NULL){
		$data=array(
			'error'=>$error['error'],
			'kode_barang'=>$this->Produk_model->kode_barang_toko1(),
			'title'=>'Tambah produk',
			'dd_kategori'=>$this->Produk_model->dd_kategori_produk(),
			'kategori_selected'=>$this->input->post('Kategori')? $this->input->post('Kategori'):'',
			'dd_jenis'=>$this->Produk_model->dd_jenis_produk(),
			'jenis_selected'=>$this->input->post('Jenis')? $this->input->post('Jenis'):'',
			'dd_satuan'=>$this->Produk_model->dd_satuan_produk(),
			'satuan_selected'=>$this->input->post('Satuan')? $this->input->post('Satuan'):'',
			'attribute'=>"class='form-control select2'",
			);
		$this->load->view('toko/template/head',$data);
		$this->load->view('toko/template/header');
		$this->load->view('toko/template/menu');
		$this->load->view('toko/tambah_produk',$data);
		$this->load->view('toko/template/footer');
	}
	
	public function checkout(){		
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
	if(!$this->form_validation->run()){
		$this->session->set_flashdata('error','<div class="alert alert-danger"> 
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
		$this->add();
		
	}else
	{
	$data=array(
		'kode_barang'=>$this->Produk_model->kode_barang_toko1(),
		'nama_barang'=>$this->input->post('Nama_Barang'),
		'kode_kategori'=>$this->input->post('Kategori'),
		'id_jenis'=>$this->input->post('Jenis'),
		'harga_beli'=>$this->input->post('Hargabeli'),
		'harga_jual'=>$this->input->post('Hargajual'),
		'stok'=>$this->input->post('Stock'),
		'id_satuan'=>$this->input->post('Satuan'),
		);
		$this->Produk_model->add_stok($data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success"> Data Berhasil Ditambahkan 
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
		redirect(base_url('toko/stok_toko'));
		}
	}		
	
	public function edit($id){
		$data=array(
			'query'=>$this->Produk_model->get_barang1_by_id($id),
			'title'=>'Edit Produk',
			'dd_kategori'=>$this->Produk_model->dd_kategori_produk(),
			'dd_jenis'=>$this->Produk_model->dd_jenis_produk(),
			'dd_satuan'=>$this->Produk_model->dd_satuan_produk(),
			
			);
		$this->load->view('toko/template/head',$data);
		$this->load->view('toko/template/header');
		$this->load->view('toko/template/menu');
		$this->load->view('toko/edit_produk',$data);
		$this->load->view('toko/template/footer');
		
		}
	
	public function checkout_edit(){
		$id=$this->input->post('kode');
		
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
		if(!$this->form_validation->run()){
			$this->session->set_flashdata('error','<div class="alert alert-danger"> 
			<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
			$this->edit($id);
		} else {
				$data=array(
					'kode_barang'=>$this->input->post('kode'),
					'nama_barang'=>$this->input->post('Nama_Barang'),
					'kode_kategori'=>$this->input->post('Kategori'),
					'id_jenis'=>$this->input->post('Jenis'),
					'harga_beli'=>$this->input->post('Hargabeli'),
					'harga_jual'=>$this->input->post('Hargajual'),
					'stok'=>$this->input->post('Stock'),
					'id_satuan'=>$this->input->post('Satuan'),
					);
			$this->Produk_model->update_produk2($id,$data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success"> Data Berhasil Di Edit
			<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
			redirect(base_url('toko/stok_toko'));
		}
	}
	
	
	public function delete(){
	$id=$this->uri->segment(4);
	$query=$this->Produk_model->get_barang2_by_id($id);
	$this->Produk_model->delete_produk2($id);
	$this->session->set_flashdata('message','<div class="alert alert-success"> Data Berhasil Di Hapus
	<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
	redirect(base_url('toko/stok_toko'));
	}
}