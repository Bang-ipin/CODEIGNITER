<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lap_beli extends CI_Controller {	
    public function __construct(){
		parent::__construct();
		if ($this->session->userdata('usergroup')!='Pimpinan') {
		$this->session->set_flashdata('pesan','Maaf Anda Bukan Pimpinan');
		redirect(base_url());
		}
		$this->load->helper('text');
		$this->load->model('Laporan_model');
		$this->load->library('Dompdf_gen');
	}
	public function index() {	
	$data=array('title'=>'Dashboard',
				 );
				 
	$this->load->view('pimpinan/template/head',$data);
	$this->load->view('pimpinan/template/header');
	$this->load->view('pimpinan/template/menu');
	$this->load->view('pimpinan/lap_tokomasuk');
	$this->load->view('pimpinan/template/footer');
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
            'query'=> $this->Laporan_model->getLapPembelianToko($tgl_awal,$tgl_akhir),
            'tgl_awal'=>date("d M Y",strtotime($this->session->userdata('tgl_awal'))),
            'tgl_akhir'=>date("d M Y",strtotime($this->session->userdata('tgl_akhir'))),
        );
        $this->load->view('pimpinan/vlaptokomasuk',$data);
    }
	
	public function all()
	{
		$data=array(
            'query'=> $this->Laporan_model->getLapPembelianTokoAll(),
        );
        $this->load->view('pimpinan/vlaptokomasuk',$data);
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
		   	'title'=>'Data Pembelian Toko',
	    	'query'=> $this->Laporan_model->getLapPembelianToko($tgl_awal,$tgl_akhir),
	        );
		$this->load->view('pimpinan/cetaktokomasukPdf',$data);
		$paper_size  = 'A4'; //paper size
        $orientation = 'potrait'; //tipe format kertas
        $html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan-pembelian-toko.pdf", array('Attachment'=>0));
		
	}
	public function printpdf()
	{	
		$data=array(
		   	'title'=>'Data Pembelian Barang Toko',
	    	'query'=> $this->Laporan_model->getLapPembelianTokoAll(),
	        );
		$this->load->view('pimpinan/cetaktokomasukPdf',$data);
		$paper_size  = 'A4'; //paper size
        $orientation = 'potrait'; //tipe format kertas
        $html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan-barang-masuk-toko.pdf", array('Attachment'=>0));
		
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
		   	'title'=>'Data Barang Masuk',
	    	'query'=> $this->Laporan_model->getLapPembelianToko($tgl_awal,$tgl_akhir),
	        );
		$this->load->view('pimpinan/cetaktokomasukExcel',$data);
		
	}
	
	public function printexcel()
	{
		$data=array(
			'title'=>'Data Pembelian Toko',
	    	'query'=> $this->Laporan_model->getLapPembelianTokoAll(),
	        );
		$this->load->view('pimpinan/cetaktokomasukExcel',$data);
		
	}

}