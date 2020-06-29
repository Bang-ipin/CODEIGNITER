<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Barangkeluar extends CI_Controller {	
    public function __construct(){
		parent::__construct();
		if ($this->session->userdata('usergroup')!='Gudang') {
		$this->session->set_flashdata('pesan','Maaf Anda Bukan Admin Gudang');
		redirect(base_url());
		}
		$this->load->helper('text');
		$this->load->model('Laporan_model');
	}
	public function index() {	
	$data=array('title'=>'Dashboard',
				 );
				 
	$this->load->view('gudang/template/head',$data);
	$this->load->view('gudang/template/header');
	$this->load->view('gudang/template/menu');
	$this->load->view('gudang/laporan/barang_keluar',$data);
	$this->load->view('gudang/template/footer');
	}
	
}