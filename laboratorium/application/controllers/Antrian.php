<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Antrian extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('text');
		$this->load->library('Indonesia_library');
		
	}
	public function index(){
		$d['judul'] = "RS Poltekkes Jogja";
		
		$config=$this->app_model->Get_Config();
			
		$d['prg']= $config['author'];
		$d['web_prg']= $config['website'];
		
		$d['nama_program']= $config['aplikasi'];
		$d['instansi']= $config['instansi'];
		$d['alamat_instansi']= $config['alamat'];
		$d['no_registrasi']= $this->app_model->no_registrasi();
		$this->load->view('login_pasien',$d);
		
	}
	public function reg(){
		$id  =$this->input->post('kode_barcode');
		$cek = $this->app_model->cek_antrian($id);
		if($cek->num_rows() == 0)
		{
			date_default_timezone_set('Asia/Jakarta');
			$date= $this->indonesia_library->format_tanggal_jam(date('Y-m-d H:i:s'));
			$antre=$this->app_model->no_antrian();
			$data=array(
				'kode_barcode'	=> $this->input->post('kode_barcode',null,true),
				'no_antrian'	=> $this->app_model->no_antrian(),
				'tgl_antrian'	=> $date,
				'tempo'			=> $date,
				'status'		=> 1,
				
			);
			$this->app_model->add_antrian($data);
			$this->app_model->insertData("h_antrian",$data);
			$this->session->set_flashdata('SUCCESSMSG','<center>Nomor Antrian Anda <h1>'.$antre.'</h1></center>');
			redirect(site_url('antrian'));
		}
		else{
			$this->session->set_flashdata('SUCCESSMSG','<center> Perhari Hanya Diperbolehkan 1x Pendaftaran</center>');
			redirect(site_url('antrian'));
		}
	}

	
}