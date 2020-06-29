<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author Ervin
 * @copyright 2016
 */

class Detail_barang_masuk extends CI_Controller {
	Public function __construct(){
		parent::__construct();
		if ($this->session->userdata('usergroup')!='Gudang') {
		$this->session->set_flashdata('pesan','Maaf Anda Bukan Admin Gudang');
		redirect(base_url());
		}
			$this->load->model('Detail_transaksi_model');
			$this->load->library('form_validation');
		}
  public function index(){
    $data=array('title'=>'List Detail Transaksi');
	$this->load->view('gudang/template/head',$data);
	$this->load->view('gudang/template/header');
	$this->load->view('gudang/template/menu');
	$this->load->view('gudang/transaksi/modal');
	$this->load->view('gudang/template/footer');	
	
 }
