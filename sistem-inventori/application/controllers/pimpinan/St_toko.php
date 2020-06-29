<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class St_toko extends CI_Controller {	
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
	$data=array('title'=>'Laporan Stok Barang Toko',
				);
				 
	$this->load->view('pimpinan/template/head',$data);
	$this->load->view('pimpinan/template/header');
	$this->load->view('pimpinan/template/menu');
	$this->load->view('pimpinan/stoktoko',$data);
	$this->load->view('pimpinan/template/footer');
	}
	
	public function lihat()
	{
		$kode=$this->input->post('kode');
		$pilih=$this->input->post('pilih');
		if($pilih=='all'){
				$where = ' ';
			}else{
				$where = "WHERE  a.nama_barang LIKE '%$kode%' OR a.stok < '$kode'";
			}
		$sql="SELECT * from stok_toko a join satuan b on a.id_satuan=b.id_satuan 
		join master_jenisbarang c on a.id_jenis=c.id_jenis $where order by kode_barang ASC";
		$d['query']=$this->db->query($sql)->result();		
		$this->load->view('pimpinan/viewstoktoko',$d);
			
	}
	
	public function cetakpdf()
	{
		$kode=$this->uri->segment(5);
		$pilih=$this->uri->segment(4);
		if($pilih=='all'){
				$where = ' ';
			}else{
				$where = "WHERE  a.nama_barang LIKE '%$kode%' OR a.stok < '$kode'";
			}
		$sql="SELECT * from stok_toko a join satuan b on a.id_satuan=b.id_satuan 
		join master_jenisbarang c on a.id_jenis=c.id_jenis $where order by kode_barang ASC";
		
		$data['title'] = 'Laporan Stok Barang Toko'; //judul title
		$data['query']=$this->db->query($sql)->result();		
		
        $this->load->view('pimpinan/cetakstoktokopdf', $data);
		$paper_size  = 'A4'; //paper size
        $orientation = 'potrait'; //tipe format kertas
        $html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan-stok-barang-toko.pdf", array('Attachment'=>0));
    }
		
	public function cetakexcel()
	{
		$kode=$this->uri->segment(5);
		$pilih=$this->uri->segment(4);
		if($pilih=='all'){
				$where = ' ';
			}else{
				$where = "WHERE  a.nama_barang LIKE '%$kode%' OR a.stok < '$kode'";
			}
		$sql="SELECT * from stok_toko a join satuan b on a.id_satuan=b.id_satuan 
		join master_jenisbarang c on a.id_jenis=c.id_jenis $where order by kode_barang ASC";
		
		$data['title'] = 'Laporan Stok Barang Toko'; //judul title
		$data['query'] = $this->db->query($sql)->result(); //query model semua barang
		$this->load->view('pimpinan/cetakstoktokoexcel', $data);
    }

}

