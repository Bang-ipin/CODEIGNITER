<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {	
    public function __construct(){
		parent::__construct();
		if ($this->session->userdata('usergroup')!='Gudang') {
		$this->session->set_flashdata('pesan','Maaf Anda Bukan Admin Gudang');
		redirect(base_url());
		}
		$this->load->helper('text');
		$this->load->model('Beranda_model');
	}
	public function index() {	
	$data=array('title'=>'Dashboard',
				 'username'=>$this->session->userdata('username'),
				 'barang_masuk'=>$this->Beranda_model->data(1),
				 'barang_keluar'=>$this->Beranda_model->data(2),
				 'daftar'=>$this->Beranda_model->Top()
				 );
	$this->load->view('gudang/template/head',$data);
	$this->load->view('gudang/template/header');
	$this->load->view('gudang/template/menu');
	$this->load->view('gudang/index',$data);
	$this->load->view('gudang/template/footer');
	}
	
}