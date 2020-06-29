<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {	
    public function __construct(){
		parent::__construct();
		if ($this->session->userdata('usergroup')!='Pimpinan') {
		$this->session->set_flashdata('pesan','Maaf Anda Bukan Pimpinan');
		redirect(base_url());
		}
	$this->load->helper('text');
		$this->load->model('Beranda_model');
	}
	public function index() {	
	$data=array(
				 'title'=>'Dashboard',
				 'barang_masuk'=>$this->Beranda_model->data(1),
				 'barang_keluar'=>$this->Beranda_model->data(2),
				 'daftar'=>$this->Beranda_model->Top(),
				 'pembelian'=>$this->Beranda_model->toko(1),
				 'penjualan'=>$this->Beranda_model->toko(2),
				 'daftartoko'=>$this->Beranda_model->TopToko(),
				 );
	$this->load->view('pimpinan/template/head',$data);
	$this->load->view('pimpinan/template/header');
	$this->load->view('pimpinan/template/menu');
	$this->load->view('pimpinan/index',$data);
	$this->load->view('pimpinan/template/footer');
	}
	
}