<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Welcome extends CI_Controller {
	
	Public function __construct(){
		parent::__construct();
			$this->load->model('M_admin');
			$this->load->model('M_anggota');
			$this->load->library('indonesia_library');
			
		}

	public function index()
	{
		$data['title'] = 'Halaman Utama';
		
		$this->load->view('template/head',$data);
		$this->load->view('template/header_anggota');
		$this->load->view('template/menu');
		$this->load->view('anggota/index',$data);
		$this->load->view('template/footer');	
	}
		
	public function simpanpengunjung(){
		$id  				= $this->input->post('nis');
		$tglknj 			= date('Y-m-d');
		$cek 				= $this->M_anggota->cek_kunjungan($id,$tglknj);
		$carinamaanggota	= $this->M_anggota->CariNamaAnggota($id);
		if($cek->num_rows() == 0)
		{
			date_default_timezone_set('Asia/Jakarta');
			$date= $this->indonesia_library->format_tanggal(date('Y-m-d'));
			$data=array(
				 'nis'				=>$this->input->post('nis'), 
				 'tgl_kunjungan'	=>$date
			);
			$this->M_anggota->tambah_pengunjung($data);
			$this->session->set_flashdata('message','Terima Kasih '.$carinamaanggota.' sudah berkunjung ke Perpustakaan SMK Piri Sleman');
				redirect(base_url());
		}
		else{
			$this->session->set_flashdata('message','<center> Hai '.$carinamaanggota.', kami sudah input pengunjung hari ini</center>');
			redirect(site_url());
		}
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

	public function masuk()
	{
		$data['title'] = 'Login Anggota';
		
		$this->load->view('template/head',$data);
		$this->load->view('template/header_anggota');
		$this->load->view('template/menu');
		$this->load->view('anggota/masuk',$data);
		$this->load->view('template/footer');	
	}
	
	public function ceklogin() {

		$username = $this->input->post('username');
		$password = sha1($this->input->post('password'));
		
		$hasil = $this->M_anggota->get_user($username, $password);
		if ($hasil->num_rows()==1)
			{
			foreach ($hasil->result() as $sess) {
			    $sess_data['logged_in']			= TRUE;
				$sess_data['id_anggota'] 		= $sess->id_anggota;
				$sess_data['password'] 			= $sess->password;
				$sess_data['nis'] 				= $sess->nis;
				$sess_data['nama_pengguna'] 	= $sess->nama_anggota;
				$sess_data['usergroup'] 		= $sess->usergroup;
				$this->session->set_userdata($sess_data);
			}
			if($this->session->userdata('usergroup')=='Anggota'){
				redirect (site_url('anggota'));
			}
		}else{
			$this->session->set_flashdata('message','Maaf kombinasi Id dan Password Salah');
			redirect('masuk');
					
		}
	}
	public function cek_kodenis()
	{
		$barcode=$this->db->escape_str($this->input->post('nis'));
		$cek_kode = $this->M_anggota->cek_anggota($barcode);
		if($cek_kode->num_rows() == 0)
		{
			echo "false";
		
		}
		else
		{
			echo "true";
		}
	}
	public function cek_password()
	{
		$pass=$this->db->escape_str($this->input->post('pass_old'));
		$cek_kode = $this->M_admin->cek_password_admin($pass);
		if($cek_kode->num_rows() == 0)
		{
			echo "false";
		
		}
		else
		{
			echo "true";
		}
	}
	public function cek_password_anggota()
	{
		$pass=$this->db->escape_str($this->input->post('pass_old'));
		$cek_kode = $this->M_anggota->cek_password($pass);
		if($cek_kode->num_rows() == 0)
		{
			echo "false";
		
		}
		else
		{
			echo "true";
		}
	}
}
	
	