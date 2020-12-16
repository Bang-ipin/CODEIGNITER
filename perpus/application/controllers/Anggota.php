<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Anggota extends CI_Controller {
	
	Public function __construct(){
		parent::__construct();
			if ($this->session->userdata('usergroup')!='Anggota') {
			$this->session->set_flashdata('pesan','Maaf Anda Belum Terdaftar Sebagai Anggota Perpustakaan');
			redirect(site_url());
			}
			$this->load->model('M_anggota');
			$this->load->library('indonesia_library');
		}

	public function index()
	{
		$data['title'] 				= 'Halaman Utama';
		$data['total_pesanan']		= $this->M_anggota->total_pesanan($this->session->userdata('nis'));
		$data['total_buku']			= $this->M_anggota->total_buku();
		$data['total_ebook']		=$this->M_anggota->total_ebook();
		$data['total_pembelajaran']	=$this->M_anggota->total_pembelajaran();
		
		$this->load->view('template/head',$data);
		$this->load->view('template/header_anggota');
		$this->load->view('template/menu');
		$this->load->view('anggota/home',$data);
		$this->load->view('template/footer');	
	}
		
	/*----------------BUKU-----------------*/
	public function buku(){
		$data=array('title'=>'Koleksi Buku');
		$this->load->view('template/head',$data);
		$this->load->view('template/header_anggota');
		$this->load->view('template/menu');
		$this->listbuku();
		$this->load->view('template/footer');
	}
	public function listbuku()
	{	
		$data['title'] = 'List Koleksi Buku'; 
        $data['query'] = $this->M_anggota->get_all_buku(); 
 
		$this->load->view('anggota/listbuku',$data);
		
	}
	/*----------------BOOKING-----------------*/
	public function booking(){
	$data=array(
		'id_booking'	=>$this->M_anggota->id_otomatis(),
		'kode_booking'	=>$this->M_anggota->kode_acak(),
		'title'			=> 'Pesan Buku Baru',
		);
		$this->load->view('template/head',$data);
		$this->load->view('template/header_anggota');
		$this->load->view('template/menu');
		$this->load->view('anggota/pesan_buku',$data);
		$this->load->view('template/footer');
	}
	public function simpanbooking()
	{
	$data=array(
		'id_booking'	=>$this->input->post('id'),
        'kode_booking'	=>$this->input->post('kode'),
        'nis'			=>$this->input->post('nis'), 
		'nama'			=>$this->input->post('nama'), 
		'judul_buku'	=>$this->input->post('judul'), 
		'pengarang'		=>$this->input->post('pengarang'), 
		'penerbit'		=>$this->input->post('penerbit'), 
		'tgl_pesan'		=>$this->M_anggota->tgl_sql($this->input->post('tglpesan')), 
		'status_booking'=>1, 
		);
		$this->M_anggota->tambah_booking($data);
		$this->session->set_flashdata('message','<div class="alert alert-success"> Data Berhasil Ditambahkan 
		
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
			redirect(base_url('anggota/lihatpesanan'));
	}
	public function lihatpesanan(){
	$data=array(
		'title'			=> 'Lihat Hasil Pesanan',
		'data'			=> $this->M_anggota->lihat_booking_by_id($this->session->userdata('nis')),
		);
		$this->load->view('template/head',$data);
		$this->load->view('template/header_anggota');
		$this->load->view('template/menu');
		$this->load->view('anggota/lihatpesanan',$data);
		$this->load->view('template/footer');
	}
	function view(){
		$id=$this->uri->segment(3);
		$data['title']='Cek Status Pesanan';
		$data['attribute']="class='form-control select2' readonly='true' ";
		$query=$this->M_anggota->get_booking_by_kode($id);
		foreach($query as $row){
			$data['nis']			=$row->nis;
			$data['nama']			=$row->nama;
			$data['judul_buku']		=$row->judul_buku;
			$data['pengarang']		=$row->pengarang;
			$data['penerbit']		=$row->penerbit;
			$data['tanggal']		=$this->M_anggota->tgl_indo($row->tgl_pesan);
			$data['status']			=$row->status_booking;
			$data['keterangan']		=$row->keterangan;
		}
		$this->load->view('template/head',$data);
		$this->load->view('template/header_anggota');
		$this->load->view('template/menu');
		$this->load->view('anggota/hasil-booking',$data);
		$this->load->view('template/footer');
		
	}	
	public function buatpesan(){
		$this->load->view('chats');
	}
	public function inboxdetail(){
		$inboxid			=$this->input->post('nis');
		$data =array(
			'komentar'		=>$this->M_anggota->caripesanbyid($inboxid),
		);
		$this->load->view('inboxdetail',$data);
	}
	public function kirimpesan(){
			date_default_timezone_set('Asia/Jakarta');
			$nama					= $this->session->userdata('nama_pengguna');
			$nis		 			= $this->session->userdata('nis');
			$inbox					= $this->input->post('inbox');
			$time					= $this->indonesia_library->format_tanggal_jam(date('Y-m-d H:i:s')); 
			
			$data['username']		= $nama;
			$data['inboxid']		= $nis;
			$data['nis']			= $nis;
			$data['pesan']			= $inbox;
			$data['tanggal']		= $time;
			$nis['inboxid']			= $nis;
			
			$this->M_anggota->UpdateStatus($nis);
			// $this->M_anggota->updateData("inbox",$status,$nis);
			$this->M_anggota->saveinbox($data);
	}
	public function materi(){
		$data=array('title'=>'Materi');
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->listmateri();
		$this->load->view('template/footer');
	}
	public function listmateri()
	{	
		$data['title'] = 'List Pembelajaran'; 
        $data['query'] = $this->M_anggota->get_all_materi(); 
 
		$this->load->view('anggota/listmateri',$data);
		
	}
	public function datamateri(){
		$id= $this->input->post('id');
		$text = "SELECT * FROM materi WHERE id_materi ='$id'";
		$data['data'] = $this->db->query($text);
		$this->load->view('anggota/read',$data);	
		
	}
	public function ebook(){
		$data=array('title'=>'E-Book');
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->listebook();
		$this->load->view('template/footer');
	}
	public function listebook()
	{	
		$data['title'] = 'List E-Book'; 
        $data['query'] = $this->M_anggota->get_all_ebook(); 
 
		$this->load->view('anggota/listebook',$data);
		
	}
	public function dataebook(){
		$id= $this->input->post('id');
		$text = "SELECT * FROM ebook WHERE id_ebook ='$id'";
		$data['data'] = $this->db->query($text);
		$this->load->view('anggota/readebook',$data);	
		
	}
}
	
	