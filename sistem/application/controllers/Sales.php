<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sales extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('usergroup')!=3) {
		$this->session->set_flashdata('pesan','Maaf Anda Bukan Sales');
		redirect(base_url());
		}
		$this->load->model('M_sales');
		$this->load->library('indonesia_library');
	}
	public function index() {	
		$data=array('title'					=>'Dashboard',
					 'username'				=>$this->session->userdata('username'),
					 'totalsales'			=>$this->M_sales->totalsales(),
					 'totalpelanggan'		=>$this->M_sales->totalpelanggan(),
					 );
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('sales/index',$data);
		$this->load->view('template/footer');
	}	

	/*----------------konsumen-----------------*/
	public function kunjungan(){
	   $sql=("SELECT * from sales ORDER BY id DESC");
		$data=array(
			'title' 	=> 'Data Kunjungan', 
			'query'		=> $this->db->query($sql)->result(), 
			'attribute'	=> "class='form-control select2' required",
			);
        $this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('sales/kunjungan/list',$data);
		$this->load->view('template/footer');	
	}
	
	function tambahkunjungan(){
		$data=array(
			'title' 		=> 'Buat Data Pelanggan Baru', 
			'id'			=> $this->M_sales->get_id(),
			'dd_area'	    => $this->M_sales->dd_area(),
			'tgl_kunjungan'	=> date('d-m-Y'),
			'attribute'		=> "class='form-control select2'",
			);
        $this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('sales/kunjungan/tambah',$data);
		$this->load->view('template/footer');		
	}
	public function datadetail()
	{
		$id = $this->input->post('id');
		$text = "SELECT * FROM sales WHERE id='$id'";
		$data['data']= $this->db->query($text);

		$this->load->view('sales/kunjungan/detail',$data);
	}
	
	public function simpankunjungan()
	{
		date_default_timezone_set('Asia/Jakarta');
		$path							='./asset/files/';
		$config['upload_path']          = $path;
		$config['allowed_types']        = 'png|jpg|jpeg';
		$config['file_name']            = 'file-'.trim(substr(md5(rand()),0,4));
		$config['max_size']             = 3000;
		$config['overwrite']            = TRUE;
		
		$this->upload->initialize($config);
		
		//$image_lama	= $this->input->post('imagelama');
	
		$check_file_upload= FALSE;
		if (isset($_FILES['files']['error']) && $_FILES['files']['error'] != 4){
			$check_file_upload = TRUE;
		}
		if($check_file_upload && !$this->upload->do_upload('files')) {
			$this->session->set_flashdata('error',$this->upload->display_errors('<div class="alert alert-danger"> 
			<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>'));
			redirect(site_url('sales/tambahkunjungan'));
		} 
		else 
		{
			
			if(!$this->upload->do_upload('files'))
			{		
				$data=array(
					'id'				=> $this->input->post('id',null,true),
					'tanggal_kunjungan' => $this->M_sales->tgl_sql($this->input->post('tanggal')),
					'nama'				=> $this->input->post('pelanggan',null,true),
					'alamat'			=> $this->input->post('alamat',null,true),
					'kontak'			=> $this->input->post('kontak',null,true),
					'area'			    => $this->input->post('area',null,true),
					'pemilik'			=> $this->input->post('pemilik',null,true),
					'penanggungjawab'	=> $this->input->post('pj',null,true),
					'kebutuhan'			=> $this->input->post('kebutuhan',null,true),
					'keterangan'		=> $this->input->post('keterangan',null,true)
				);
				$this->M_sales->insertData("sales",$data);
				echo 'Simpan data Sukses';	
			}else{
				$file					= $this->upload->data();
				$files					= $file['file_name'];
				$datar=array(
					'id'				=> $this->input->post('id',null,true),
					'tanggal_kunjungan' => $this->M_sales->tgl_sql($this->input->post('tanggal')),
					'nama'				=> $this->input->post('pelanggan',null,true),
					'alamat'			=> $this->input->post('alamat',null,true),
					'kontak'			=> $this->input->post('kontak',null,true),
					'area'			    => $this->input->post('area',null,true),
				    'pemilik'			=> $this->input->post('pemilik',null,true),
					'penanggungjawab'	=> $this->input->post('pj',null,true),
					'kebutuhan'			=> $this->input->post('kebutuhan',null,true),
					'keterangan'		=> $this->input->post('keterangan',null,true),
					'foto'				=> $files
				);
				$this->M_sales->insertData("sales",$datar);
				echo 'Simpan data Sukses';		
			}
		}

	}
	
	function hapuskunjungan(){
		$id['id']					=$this->input->post('id');
		$q							=$this->M_sales->getSelectedData('sales',$id);
		$this->M_sales->deleteData('sales',$id);
		$this->session->set_flashdata('message','<div class="alert alert-danger"> Data Berhasil Dihapus 
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
		redirect(site_url('sales/kunjungan'));
    }

    /*----------------Invoice-----------------*/
	public function konsumen(){
	   $sql=("SELECT * from sales ORDER BY id DESC");
		$data=array(
			'title' 	=> 'Data Konsumen', 
			'query'		=> $this->db->query($sql)->result(), 
			'attribute'	=> "class='form-control select2' required",
			);
        $this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('sales/konsumen/list',$data);
		$this->load->view('template/footer');	
	}
	public function editkonsumen(){
		$id=$this->uri->segment(3);
		$d['title']			= 'Update Konsumen';
		$data				= $this->M_sales->lihat_data($id);
		if($data->num_rows() > 0){
			foreach($data->result() as $db){
				$d['id']				=$id;
				$d['nama']				=$db->nama;
				$d['alamat']			=$db->alamat;
				$d['pemilik']			=$db->pemilik;
				$d['tanggal_kunjungan']	=$this->M_sales->tgl_str($db->tanggal_kunjungan);
				$d['area']			    =$db->area;
				$d['kontak']			=$db->kontak;
				$d['penanggungjawab']	=$db->penanggungjawab;
				$d['kebutuhan']			=$db->kebutuhan;
				$d['keterangan']		=$db->keterangan;
			}
		}
		$this->load->view('template/head',$d);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('sales/konsumen/updatedata',$d);
		$this->load->view('template/footer');
	}
	public function updatekonsumen(){
		$id = $this->input->post('id');
		$data=array(
			'id'				=> $this->input->post('id',null,true),
			'tanggal_kunjungan' => $this->M_sales->tgl_sql($this->input->post('tanggal')),
			'nama'				=> $this->input->post('pelanggan',null,true),
			'alamat'			=> $this->input->post('alamat',null,true),
			'kontak'			=> $this->input->post('kontak',null,true),
			'area'			    => $this->input->post('area',null,true),
			'pemilik'			=> $this->input->post('pemilik',null,true),
			'penanggungjawab'	=> $this->input->post('pj',null,true),
			'kebutuhan'			=> $this->input->post('kebutuhan',null,true),
			'keterangan'		=> $this->input->post('keterangan',null,true),
		);
		$this->M_sales->savepostingan($id,$data);
		$this->session->set_flashdata('message','<div class="alert alert-success"> Data Berhasil Di Ubah
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
		redirect(site_url('sales/konsumen'));
	}
	function hapuskonsumen(){
		$id['id']					=$this->input->post('id');
		$this->M_sales->deleteData('sales',$id);
		$this->session->set_flashdata('message','<div class="alert alert-danger"> Data Berhasil Dihapus 
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
		redirect(site_url('sales/konsumen'));
    }
    
    /*----------------Invoice-----------------*/
	public function invoicedaging(){
	   $sql=("SELECT * from fakturdaging ORDER BY faktur DESC");
		$data=array(
			'title' 	=> 'Invoice Penjualan Daging', 
			'query'		=> $this->db->query($sql)->result(), 
			'attribute'	=> "class='form-control select2' required",
			);
        $this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('sales/invoice/list',$data);
		$this->load->view('template/footer');	
	}
	function createinvoice(){
		$data=array(
			'title' 		=> 'Buat Invoice Baru', 
			'faktur' 		=> $this->M_sales->get_kode_invoice(),
			'tgl_jual'		=> date('d-m-Y'),
			'attribute'		=> "class='form-control select2'",
			);
        $this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('sales/invoice/tambah',$data);
		$this->load->view('template/footer');		
	}
	public function datadetailfaktur()
	{
		$id = $this->input->post('kode');
		$text = "SELECT a.faktur,a.harga,a.items,a.jumlah,a.subtotal,b.outlet 
				FROM d_fakturdaging as a
				JOIN fakturdaging as b on a.faktur=b.faktur
				WHERE a.faktur='$id'";
		$data['data']= $this->db->query($text);

		$this->load->view('sales/invoice/detail',$data);
	}
	
	public function simpaninvoicedaging()
	{
		date_default_timezone_set('Asia/Jakarta');
		
		$up['faktur']			= $this->input->post('faktur',null,true);
		$up['tanggal_jual']		= $this->M_sales->tgl_sql($this->input->post('tanggal'));
		$up['outlet']			= $this->input->post('outlet',null,true);
		$up['alamat']			= $this->input->post('alamat',null,true);
		$up['telepon']			= $this->input->post('telepon',null,true);
		$up['pemilik']			= $this->input->post('pemilik',null,true);
		
		$ud['faktur']			= $this->input->post('faktur',null,true);
		$ud['items']			= $this->input->post('items',null,true);
		$ud['jumlah']			= $this->input->post('qty',null,true);
		$ud['harga']			= $this->input->post('harga',null,true);
		$ud['subtotal']			= $this->input->post('subtotal',null,true);
		
		$id['faktur']			= $this->input->post('faktur');
		$id2['items']			= $this->input->post('items');
		
		$data 					= $this->M_sales->getSelectedData("fakturdaging",$id);
		if($data->num_rows() > 0){
			$this->M_sales->updateData("fakturdaging",$up,$id);
			$data = $this->M_sales->getSelectedData("d_fakturdaging",$id2);
			if($data->num_rows()>0){
				$this->M_sales->updateData("d_fakturdaging",$ud,$id2);
			}else{
				$this->M_sales->insertData("d_fakturdaging",$ud);
			}
			echo 'Update data Sukses';
		}else{
			$this->M_sales->insertData("fakturdaging",$up);
			$this->M_sales->insertData("d_fakturdaging",$ud);
			echo 'Simpan data Sukses';		
		}

	}
	
	public function datainvoice(){
		$id= $this->input->post('id');
		$text = "SELECT * FROM d_fakturdaging WHERE faktur='$id'";
		$data['data'] = $this->db->query($text);
		
		$this->load->view('sales/invoice/datainvoice',$data);	
	}
    public function cetakinvoice(){
			$d['judul'] 			= "Invoice Pemesanan Barang";
			$d['alamat'] 			= "Jl. Pleret KM 4 Gunung Kelir, Pleret, Bantul. D.I. Yogyakarta";
			$d['emailcompany'] 		= "estutamagroup@gmail.com";
			$d['websitecompany'] 	= "www.estutama.com";
			$d['teleponcompany'] 	= "0817 285 1000";
			
			$id = $this->uri->segment(3);
			$text = "SELECT a.outlet, a.tanggal_jual,a.alamat,a.pemilik,a.telepon,b.items,b.jumlah,b.harga,b.subtotal FROM fakturdaging as a JOIN d_fakturdaging as b on a.faktur=b.faktur WHERE b.faktur='$id'";
			$data = $this->db->query($text);
			if($data->num_rows() > 0){
				foreach($data->result() as $db){
					$tgl					= $db->tanggal_jual;
					$d['faktur']			= $id;
					$d['tanggal']			= $this->M_sales->tgl_indo($db->tanggal_jual);
					$d['outlet']			= $db->outlet;
					$d['alamat']			= $db->alamat;
					$d['pemilik']			= $db->pemilik;
					$d['telepon']			= $db->telepon;

				}

			}else{

					$d['faktur']			=$id;
					$d['tanggal']			='';
					$d['outlet']			='';
					$d['alamat']			='';
					$d['pemilik']			='';
					$d['telepon']			='';
			}
			$text = "SELECT a.faktur,a.items,a.jumlah,a.harga,a.subtotal
					FROM d_fakturdaging as a 
					JOIN fakturdaging as b 
					ON a.faktur=b.faktur
					WHERE a.faktur='$id'";
			$d['data']= $this->db->query($text);
			$this->load->view('sales/invoice/cetak',$d);
	}
	public function hapus_detail()
	{
		$id 						= $this->uri->segment(3);
		$kode 						= $this->uri->segment(4);
		$this->db->query("DELETE FROM d_fakturdaging WHERE faktur='$id'");
		$this->createinvoice();
	}
	function hapusinvoice(){
		$id['faktur']				=$this->input->post('id');
		$id2['faktur']				=$this->input->post('id');
		$q							=$this->M_sales->getSelectedData('d_fakturdaging',$id);
		$this->M_sales->deleteData('fakturdaging',$id);
		$this->M_sales->deleteData('d_fakturdaging',$id);
        $this->session->set_flashdata('message','<div class="alert alert-danger"> Data Berhasil Dihapus 
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
		redirect(site_url('sales/invoicedaging'));
    }
}
	
	