<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author Ervin
 * @copyright 2016
 */

class Detail_barang_masuk extends CI_Controller {
	Public function __construct(){
		parent::__construct();
		if ($this->session->userdata('usergroup')!='Toko') {
		$this->session->set_flashdata('pesan','Maaf Anda Bukan Admin Toko');
		redirect(base_url());
		}
			$this->load->model('Detail_transaksi_model');
			$this->load->library('form_validation');
		}
  public function index(){
    $data=array('title'=>'List Detail Transaksi');
	$this->load->view('toko/template/head',$data);
	$this->load->view('toko/template/header');
	$this->load->view('toko/template/menu');
	$this->load->view('toko/transaksi/modal');
	$this->load->view('toko/template/footer');	
	
 }
