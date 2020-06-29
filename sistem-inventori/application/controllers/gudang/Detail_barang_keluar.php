<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author Ervin
 * @copyright 2016
 */

class Barang_keluar extends CI_Controller {
	Public function __construct(){
		parent::__construct();
		if ($this->session->userdata('usergroup')!='Gudang') {
		$this->session->set_flashdata('pesan','Maaf Anda Bukan Admin Gudang');
		redirect(base_url());
		}
	
			$this->load->model('Transaksi_model');
			$this->load->library('form_validation');
		}
  public function index(){
        $data=array(
			'title' => 'List Barang Keluar', //judul title
			'paging'=>$this->pagination->create_links(),
			'jmlhpage'=>$page,
			'kode_transaksi' => $this->Transaksi_model->get_kode_transaksi_keluar(),
			'query'=> $this->Transaksi_model->get_all_transaksi_keluar(), //query model semua Transaksi
			'nama_transaksi'=>$this->Transaksi_model->get_jenis_transaksi(),
			'transaksi_selected'=>$this->input->post('jenis')? $this->input->post('jenis'):'',
			'nama_supplier' => $this->Transaksi_model->get_supplier(),
			'supplier_selected'=>$this->input->post('supplier')? $this->input->post('supplier'):'',
			'barang'=>$this->Transaksi_model->get_master_Barang(),
			'barang_selected'=>$this->input->post('barang')? $this->input->post('barang'):'',
			'attribute'=>"class='form-control select2' required",
			);
        $this->load->view('gudang/template/head',$data);
		$this->load->view('gudang/template/header');
		$this->load->view('gudang/template/menu');
		$this->load->view('gudang/transaksi/v_barangkeluar',$data);
		$this->load->view('gudang/transaksi/modal',$data);
		$this->load->view('gudang/template/footer');
	}
	
	public function proses_transaksi_keluar(){
		$data=array(
				'kode_transaksi'=>$this->input->post('kode'),
				'id_jenis_transaksi'=>$this->input->post('jenis'),
				'tanggal_transaksi'=>date('y:m:d h:i:s'),
				'kode_supplier'=>$this->input->post('supplier'),
				'kode_barang'=>$this->input->post('barang'),
				'jumlah'=>$this->input->post('jumlah'),
                'status_pergerakan'=>2,
				'username'=>$this->session->userdata('nama_pengguna')
				);
		$this->Transaksi_model->tambah_barang_keluar($data);
        $this->session->set_flashdata('pesan','<div class="alert alert-success"> Transaksi Berhasil 
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
		redirect('gudang/transaksi/barang_keluar');
	}
	
	public function delete($id){
		$this->Transaksi_model->delete_barang_keluar($id);
		redirect('gudang/transaksi/barang_keluar');
	}
	
	
 }
