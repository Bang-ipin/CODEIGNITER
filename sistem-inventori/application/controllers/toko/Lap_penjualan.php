<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lap_penjualan extends CI_Controller {	
    public function __construct(){
		parent::__construct();
		if ($this->session->userdata('usergroup')!='TokoRingroad') {
		$this->session->set_flashdata('pesan','Maaf Anda Bukan admin Toko Ringroad');
		redirect(base_url());
		}
		$this->load->helper('text');
		$this->load->model('Laporan_model');
		$this->load->library('Dompdf_gen');
	}
	public function index() {	
	$data=array('title'=>'Dashboard',
				 );
				 
	$this->load->view('toko_ringroad/template/head',$data);
	$this->load->view('toko_ringroad/template/header');
	$this->load->view('toko_ringroad/template/menu');
	$this->load->view('toko_ringroad/laporan_keluar');
	$this->load->view('toko_ringroad/template/footer');
	}
	
	public function cari()
	{
		$tgl_awal= date("Y-m-d",strtotime($this->input->post('tgl_awal')));
        $tgl_akhir= date("Y-m-d",strtotime($this->input->post('tgl_akhir')));
        $sess_data=array(
            'tgl_awal'=>$tgl_awal,
            'tgl_akhir'=>$tgl_akhir
        );
        $this->session->set_userdata($sess_data);
        $data=array(
            'query'=> $this->Laporan_model->getLapPenjualanRingroad($tgl_awal,$tgl_akhir),
            'tgl_awal'=>date("d M Y",strtotime($this->session->userdata('tgl_awal'))),
            'tgl_akhir'=>date("d M Y",strtotime($this->session->userdata('tgl_akhir'))),
        );
        $this->load->view('toko_ringroad/vlapkeluar',$data);
    }
	public function all()
	{
		$data=array(
            'query'=> $this->Laporan_model->getLapPenjualanRingroadAll(),
        );
        $this->load->view('toko_ringroad/vlapkeluar',$data);
    }
	public function cetakpdf()
	{	
		$tgl_awal=date("Y-m-d",strtotime($this->uri->segment(4)));
		$tgl_akhir=date("Y-m-d",strtotime($this->uri->segment(5)));
		$sess_data=array(
		'tgl_awal'=>$tgl_awal,
		'tgl_akhir'=>$tgl_akhir,
		);
		$this->session->set_userdata($sess_data);
		$data=array(
			'dari'=>date("d M Y",strtotime($this->session->userdata('tgl_awal'))),
			'sampai'=>date("d M Y",strtotime($this->session->userdata('tgl_akhir'))),
		   	'title'=>'Data Penjualan Toko Ringroad',
	    	'query'=> $this->Laporan_model->getLapPenjualanRingroad($tgl_awal,$tgl_akhir),
	        );
		$this->load->view('toko_ringroad/cetakPenjualanPdf',$data);
		$paper_size  = 'A4'; //paper size
        $orientation = 'potrait'; //tipe format kertas
        $html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan-Penjualan-Barang-Toko-Ringroad.pdf", array('Attachment'=>0));
		
	}
	public function printpdf()
	{	
		$data=array(
		   	'title'=>'Data Penjualan Barang Toko Ring Road',
	    	'query'=> $this->Laporan_model->getLapPenjualanRingroadAll(),
	        );
		$this->load->view('toko_ringroad/cetakPenjualanPdf',$data);
		$paper_size  = 'A4'; //paper size
        $orientation = 'potrait'; //tipe format kertas
        $html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan-Penjualan-Barang-Toko-Ringroad.pdf", array('Attachment'=>0));
		
	}
	public function cetakexcel()
	{
		$tgl_awal=date("Y-m-d",strtotime($this->uri->segment(4)));
		$tgl_akhir=date("Y-m-d",strtotime($this->uri->segment(5)));
		$sess_data=array(
		'tgl_awal'=>$tgl_awal,
		'tgl_akhir'=>$tgl_akhir,
		);
		$this->session->set_userdata($sess_data);
		$data=array(
			'dari'=>date("d M Y",strtotime($this->session->userdata('tgl_awal'))),
			'sampai'=>date("d M Y",strtotime($this->session->userdata('tgl_akhir'))),
		   	'title'=>'Data Penjualan Toko Ringroad',
	    	'query'=> $this->Laporan_model->getLapPenjualanRingroad($tgl_awal,$tgl_akhir),
	        );
		$this->load->view('toko_ringroad/cetakPenjualanExcel',$data);
		
	}
	public function printexcel()
	{
		$data=array(
			'title'=>'Data Penjualan Barang Toko Ring Road',
	    	'query'=> $this->Laporan_model->getLapPenjualanRingroadAll(),
	        );
		$this->load->view('toko_ringroad/cetakPenjualanExcel',$data);
		
	}


}