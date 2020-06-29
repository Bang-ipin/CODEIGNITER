<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {	
    public function __construct(){
		parent::__construct();
	if ($this->session->userdata('usergroup')!='Administrator') {
		$this->session->set_flashdata('pesan','Maaf Anda Bukan Admin');
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
			 'pembelianmundu'=>$this->Beranda_model->toko(1),
			 'penjualanmundu'=>$this->Beranda_model->toko(2),
			 'daftartoko'=>$this->Beranda_model->TopToko(),
			 );
	$this->load->view('admin/template/head',$data);
	$this->load->view('admin/template/header');
	$this->load->view('admin/template/menu');
	$this->load->view('admin/index',$data);
	$this->load->view('admin/template/footer');
	}
	
}