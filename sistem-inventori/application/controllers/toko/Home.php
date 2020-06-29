<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {	
    public function __construct(){
		parent::__construct();
		if ($this->session->userdata('usergroup')!='TokoRingroad') {
		$this->session->set_flashdata('pesan','Maaf Anda Bukan Admin Toko');
		redirect(base_url());
		}
	$this->load->helper('text');
		$this->load->model('Beranda_model');
	}
	public function index() {	
	$data=array('title'=>'Dashboard',
				 'pembelian'=>$this->Beranda_model->tokoringroad(1),
				 'penjualan'=>$this->Beranda_model->tokoringroad(2),
				 'daftar'=>$this->Beranda_model->TopToko2()
				 );
	$this->load->view('toko_ringroad/template/head',$data);
	$this->load->view('toko_ringroad/template/header');
	$this->load->view('toko_ringroad/template/menu');
	$this->load->view('toko_ringroad/index',$data);
	$this->load->view('toko_ringroad/template/footer');
	}
	
}