<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lap_stock extends CI_Controller {	
    public function __construct(){
		parent::__construct();
		if ($this->session->userdata('usergroup')!='Gudang') {
		$this->session->set_flashdata('pesan','Maaf Anda Bukan Admin Gudang');
		redirect(base_url());
		}
	
		$this->load->helper('text');
		$this->load->model('Laporan_model');
		$this->load->library('Dompdf_gen');
	}
	public function index() {	
	$data=array('title'=>'Laporan Stok Barang',
				);
				 
	$this->load->view('gudang/template/head',$data);
	$this->load->view('gudang/template/header');
	$this->load->view('gudang/template/menu');
	$this->load->view('gudang/laporan_stock',$data);
	$this->load->view('gudang/template/footer');
	}
	
	public function lihat()
	{
		$kode=$this->input->post('kode');
		$pilih=$this->input->post('pilih');
		if($pilih=='all'){
				$where = ' ';
			}else{
				$where = "WHERE  a.nama_barang LIKE '%$kode%' OR a.stock_awal < '$kode'";
			}
		$sql="SELECT * from master_barang a join satuan b on a.id_satuan=b.id_satuan 
		join master_jenisbarang c on a.id_jenis=c.id_jenis $where order by kode_barang ASC";
		$d['query']=$this->db->query($sql)->result();		
		$this->load->view('gudang/lap_view',$d);
			
	}
	
	public function cetakpdf()
	{
		$kode=$this->uri->segment(5);
		$pilih=$this->uri->segment(4);
		if($pilih=='all'){
				$where = ' ';
			}else{
				$where = "WHERE  a.nama_barang LIKE '%$kode%' OR a.stock_awal < '$kode'";
			}
		$sql="SELECT * from master_barang a join satuan b on a.id_satuan=b.id_satuan 
		join master_jenisbarang c on a.id_jenis=c.id_jenis $where order by kode_barang ASC";
		
		$data['title'] = 'Laporan Stok Barang'; //judul title
		$data['query']=$this->db->query($sql)->result();		
		
        $this->load->view('gudang/cetakpdf', $data);
		$paper_size  = 'A4'; //paper size
        $orientation = 'potrait'; //tipe format kertas
        $html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporanstokgudang.pdf", array('Attachment'=>0));
    }
		
	public function cetakexcel()
	{
		$kode=$this->uri->segment(5);
		$pilih=$this->uri->segment(4);
		if($pilih=='all'){
				$where = ' ';
			}else{
				$where = "WHERE  a.nama_barang LIKE '%$kode%' OR a.stock_awal < '$kode'";
			}
		$sql="SELECT * from master_barang a join satuan b on a.id_satuan=b.id_satuan 
		join master_jenisbarang c on a.id_jenis=c.id_jenis $where order by kode_barang ASC";
		
		$data['title'] = 'Laporan Stok Gudang'; //judul title
		$data['query'] = $this->db->query($sql)->result(); //query model semua barang
 
        $this->load->view('gudang/cetakexcel', $data);
	}

}

