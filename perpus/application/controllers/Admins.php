<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('usergroup')!='Admin') {
		$this->session->set_flashdata('pesan','Maaf Anda Bukan Admin');
		redirect(base_url());
		}
		$this->load->model('M_admin');
		$this->load->model('M_administrator');
		$this->load->library('indonesia_library');
	}
	public function index() {	
		$data=array('title'					=>'Dashboard',
					 'username'				=>$this->session->userdata('username'),
					 'total_anggota'		=>$this->M_admin->total_anggota(),
					 'total_buku'			=>$this->M_admin->total_buku(),
					 'total_pengunjung'		=>$this->M_admin->total_pengunjung(),
					 'total_peminjaman'		=>$this->M_admin->total_peminjaman(),
					 'total_pengembalian'	=>$this->M_admin->total_pengembalian(),
					 'total_booking'		=>$this->M_admin->total_booking(),
					 'total_ebook'			=>$this->M_admin->total_ebook(),
					 'total_pembelajaran'	=>$this->M_admin->total_pembelajaran(),
					 );
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('admin/index',$data);
		$this->load->view('template/footer');
	}	
	public function anggota(){
		$data=array('title'=>'Manajemen Anggota');
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->listanggota();
		$this->load->view('template/footer');
	}
	public function listanggota()
	{	
		$data['title'] = 'List Anggota'; 
        $data['query'] = $this->M_admin->get_all_anggota(); 
 
		$this->load->view('admin/anggota/listanggota',$data);
		
	}
	
	public function tambah_anggota()
	{
	date_default_timezone_set('Asia/Jakarta');
	$data=array(
		'id_anggota'=>$this->M_admin->id_otomatis(),
		'title'		=> 'Tambah Anggota',
		'tgldaftar'	=> date('d-m-Y'),
		'dd_gender'	=> $this->M_admin->dd_gender(),
		'attribute'	=>"class='form-control select2'"
		);
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('admin/anggota/tambah_anggota',$data);
		$this->load->view('template/footer');
	}
	
	public function simpananggota()
	{
	$data=array(
		'id_anggota'	=>$this->M_admin->id_otomatis(),
        'nis'			=>strtoupper($this->input->post('nis')), 
		'nama_anggota'	=>$this->input->post('nama'), 
		'jenis_kelamin'	=>$this->input->post('gender'), 
		'alamat'		=>$this->input->post('alamat'), 
		'tgl_daftar'	=>$this->M_admin->tgl_sql($this->input->post('tgldaftar')), 
		'password'		=>sha1($this->input->post('password')),
		'id_usergroup'	=>3
		);
		$this->M_admin->tambah_anggota($data);
		$this->session->set_flashdata('message','<div class="alert alert-success"> Data Berhasil Ditambahkan 
		
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
			redirect(base_url('admin/anggota'));
	}
		
	 function edit($id){
		$data=array(
			'title'=>'Edit Anggota',
			'query'=>$this->M_admin->get_anggota_by_id($id),
			'dd_gender'	=> $this->M_admin->dd_gender(),
			'attribute'	=>"class='form-control select2'"
		);
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('admin/anggota/edit_anggota',$data);
		$this->load->view('template/footer');
		}
		
	function simpaneditanggota()
	{
		$id 			= $this->input->post('id');
		$nis			= strtoupper($this->input->post('nis')); 
		$nama_anggota	= $this->input->post('nama'); 
		$jenis_kelamin	= $this->input->post('gender'); 
		$alamat			= $this->input->post('alamat'); 
		$tgl_daftar		= $this->M_admin->tgl_sql($this->input->post('tgldaftar')); 
		$password		= $this->input->post('password');
		$id_usergroup	= 3;
		
		$data=array(
				'id_anggota'	=>$id,
				'nis'			=>$nis, 
				'nama_anggota'	=>$nama_anggota, 
				'jenis_kelamin'	=>$jenis_kelamin, 
				'alamat'		=>$alamat, 
				'tgl_daftar'	=>$tgl_daftar, 
				'password'		=>sha1($password),
				'id_usergroup'	=>$id_usergroup
				);
			if(empty($password)){
			$this->db->query("UPDATE anggota SET nis='$nis',nama_anggota='$nama_anggota',jenis_kelamin='$jenis_kelamin',alamat='$alamat',tgl_daftar='$tgl_daftar',id_usergroup='$id_usergroup' WHERE id_anggota ='$id'");
			}else{
				$this->M_admin->update($id,$data);
			}
			$this->session->set_flashdata('message','<div class="alert alert-success"> Data Berhasil Di Edit 
			<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
			redirect(base_url('admin/anggota'));
	}
	public function cetak()
	{
			
			
			$d['nama_program']		= 'Kartu Anggota Perpustakaan';
			$d['instansi']			= 'SMK PIRI SLEMAN';
			
			$d['judul'] 			= "Kartu Anggota Perpustakaan";
			
			$id = $this->uri->segment(3);
			
			$text = "SELECT * FROM anggota WHERE nis='$id'";
			$data = $this->db->query($text);
			if($data->num_rows() > 0){
				foreach($data->result() as $db){
					if($db->jenis_kelamin==0){
						$sex="Laki-Laki";
					}
					else{
						$sex="Perempuan";
					}
					$d['nis']			= $id;
					$d['nama']			= $db->nama_anggota;
					$d['alamat']		= $db->alamat;
					$d['tgl_daftar']	= $this->M_admin->tgl_indo($db->tgl_daftar);
					$d['jenis_kelamin']	= $sex;
				}
			}else{
					$d['nis']			= $id;
					$d['nama']			= '';
					$d['alamat']		= '';
					$d['tgl_daftar']	= '';
					$d['jenis_kelamin']	= '';
			}
			
			$text = "SELECT nis,nama_anggota,alamat,jenis_kelamin,tgl_daftar FROM anggota WHERE nis='$id'";
			$d['data']= $this->db->query($text);
			$this->load->view('admin/anggota/cetakkartu',$d);
		
	}
	public function bebasperpus()
	{
			
			$d['nama_yayasan']		= $this->config->item('yayasan');
			$d['sekolah']			= $this->config->item('sekolah');
			$d['instansi']			= $this->config->item('instansi');
			$d['akreditasi']		= $this->config->item('akreditasi');
			$d['alamat']			= $this->config->item('alamat');
			$d['keterangan']		= $this->config->item('keterangan');
			$d['bebas']				= $this->config->item('bebas');
			$d['pembuka']			= $this->config->item('pembuka');
			$d['isi']				= $this->config->item('isi');
			$d['penutup']			= $this->config->item('penutup');
			$d['kepalaperpus']		= $this->M_admin->CariKepalaPerpus(1);
			
			$d['judul'] 			= "Kartu Bebas Perpustakaan";
			
			$id = $this->uri->segment(3);
			
			$text = "SELECT * FROM anggota WHERE nis='$id'";
			$data = $this->db->query($text);
			if($data->num_rows() > 0){
				foreach($data->result() as $db){
					if($db->jenis_kelamin==0){
						$sex="Laki-Laki";
					}
					else{
						$sex="Perempuan";
					}
					$d['nis']			= $id;
					$d['nama']			= $db->nama_anggota;
				}
			}else{
					$d['nis']			= $id;
					$d['nama']			= '';
			}
			
			$text = "SELECT nis,nama_anggota FROM anggota WHERE nis='$id'";
			$d['data']= $this->db->query($text);
			$this->load->view('admin/anggota/bebasperpus',$d);
		
	}
	public function generate($kode){
		$this->set_barcode($kode);		
	}
	private function set_barcode($code)
	{
		//load library
		$this->load->library('Zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		//generate barcode
		Zend_Barcode::render('code128', 'image', array('text'=>$code), array());
	}
	
	public function cek_kodebarcode()
	{
		$barcode	= $this->db->escape_str($this->input->post('kode'));
		$cek_kode 	= $this->M_admin->cek_barcode($barcode);
		if($cek_kode->num_rows() == 0)
		{
			echo "true";
		
		}
		else
		{
			echo "false";
		}
	}
	public function delete(){
        $id = $this->uri->segment(3);
        $this->M_admin->delete($id);
		$this->session->set_flashdata('message','<div class="alert alert-danger"> Data Berhasil Dihapus 
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
        redirect(base_url('admin/anggota'));
		}
	
	public function hapusanggota(){
        $id = $this->input->post('id');
        $this->M_admin->delete($id);
		$this->session->set_flashdata('message','<div class="alert alert-danger"> Data Berhasil Dihapus 
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
        redirect(base_url('admin'));
		}
	
	public function change_pass()
	{
		$data['title']= 'Ubah Password';
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('ubah_password');
		$this->load->view('template/footer');
	}
	public function update_password(){
	if($this->input->is_ajax_request())
	{
		if($_POST)
		{
			$this->form_validation->set_rules('pass_old','Password Lama','trim|required|max_length[60]|callback_check_pass[pass_old]');
			$this->form_validation->set_rules('pass_new','Password Baru','trim|required|max_length[60]');
			$this->form_validation->set_rules('pass_new_confirm','Ulangi Password Baru','trim|required|max_length[60]|matches[pass_new]');
			$this->form_validation->set_message('required','%s harus diisi !');
			$this->form_validation->set_message('check_pass','%s anda salah !');

		if($this->form_validation->run() == TRUE)
				{
					$pass_new 	= $this->input->post('pass_new');
					$update 	= $this->M_admin->update_password($pass_new);
					if($update)
					{
						$this->session->set_userdata('password', sha1($pass_new));

						echo json_encode(array(
							'pesan' => "<div class='alert alert-success'><i class='fa fa-check'></i> Password berhasil diupdate.</div>"
						));
					}
					else
					{
						$this->query_error();
					}
				}
				else
				{
					$this->input_error();
				}
			}
			else
			{
				$this->load->view('ubah_password');
			}
		}
	}

	public function check_pass($pass)
	{
		$cek_user = $this->M_admin->cek_password($pass);

		if($cek_user->num_rows() > 0)
		{
			return TRUE;
		}
		return FALSE;
	}

	/*----------------KATEGORI-----------------*/
	public function kategori(){
		$data=array('title'=>'Kategori Buku');
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->listkategori();
		$this->load->view('template/footer');
	}
	public function listkategori()
	{	
		$data['title'] = 'List Kategori Buku'; 
        $data['query'] = $this->M_admin->get_all_kategori(); 
 
		$this->load->view('admin/kategori/listkategori',$data);
		
	}
	
	public function tambah_kategori()
	{
	$data=array(
		'id_kategori'=>$this->M_admin->id_otomatis_kategori(),
		'title'		=> 'Tambah Kategori',
		'dd_gender'	=> $this->M_admin->dd_gender(),
		'attribute'	=>"class='form-control select2'"
		);
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('admin/kategori/tambah_kategori',$data);
		$this->load->view('template/footer');
	}
	
	public function simpankategori()
	{
	$data=array(
		'id_kategori'		=>$this->M_admin->id_otomatis_kategori(),
        'nama_kategori'		=>$this->input->post('namakategori'),
		);
		$this->M_admin->tambah_kategori($data);
		$this->session->set_flashdata('message','<div class="alert alert-success"> Data Berhasil Ditambahkan 
		
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
			redirect(base_url('admin/kategori'));
	}
		
	 function edit_kategori($id){
		$data=array(
			'title'=>'Edit Kategori Buku',
			'query'=>$this->M_admin->get_kategori_by_id($id),
		);
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('admin/kategori/edit_kategori',$data);
		$this->load->view('template/footer');
		}
		
	function simpaneditkategori()
	{
		$id = $this->input->post('id');
		$data=array(
				'id_kategori'	=>$this->input->post('id'),
				'nama_kategori'		=>$this->input->post('namakategori'), 
				);
			$this->M_admin->update_kategori($id,$data);
			$this->session->set_flashdata('message','<div class="alert alert-success"> Data Berhasil Di Edit 
			<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
			redirect(base_url('admin/kategori'));
	}
	public function hapuskategori(){
        $id = $this->input->post('id');
        $this->M_admin->delete_kategori($id);
		$this->session->set_flashdata('message','<div class="alert alert-danger"> Data Berhasil Dihapus 
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
        redirect(base_url('admin/kategori'));
		}
		
	/*----------------RAK-----------------*/
	public function rak(){
		$data=array('title'=>'Rak Buku');
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->listrak();
		$this->load->view('template/footer');
	}
	public function listrak()
	{	
		$data['title'] = 'List Rak Buku'; 
        $data['query'] = $this->M_admin->get_all_rak(); 
 
		$this->load->view('admin/rak/listrak',$data);
		
	}
	
	public function tambah_rak()
	{
	$data=array(
		'id_rak'		=>$this->M_admin->id_otomatis_rak(),
		'dd_kategori'	=> $this->M_admin->dd_kategori(),
		'attribute'		=>"class='form-control select2'",
		'title'			=> 'Tambah Rak'
		);
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('admin/rak/tambah_rak',$data);
		$this->load->view('template/footer');
	}
	
	public function simpanrak()
	{
	$data=array(
		'id_rak'			=>$this->M_admin->id_otomatis_rak(),
		'id_kategori'		=>$this->input->post('kategori'),
		'nama_rak'			=>$this->input->post('namarak'),
		);
		$this->M_admin->tambah_rak($data);
		$this->session->set_flashdata('message','<div class="alert alert-success"> Data Berhasil Ditambahkan 
		
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
			redirect(base_url('admin/rak'));
	}
		
	 function edit_rak($id){
		$data=array(
			'title'=>'Edit Rak Buku',
			'dd_kategori'	=> $this->M_admin->dd_kategori(),
			'attribute'		=>"class='form-control select2'",
			'query'=>$this->M_admin->get_rak_by_id($id),
		);
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('admin/rak/edit_rak',$data);
		$this->load->view('template/footer');
		}
		
	function simpaneditrak()
	{
		$id = $this->input->post('id');
		$data=array(
				'id_rak'			=>$this->input->post('id'),
				'id_kategori'		=>$this->input->post('kategori'),
				'nama_rak'			=>$this->input->post('namarak'), 
				);
			$this->M_admin->update_rak($id,$data);
			$this->session->set_flashdata('message','<div class="alert alert-success"> Data Berhasil Di Edit 
			<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
			redirect(base_url('admin/rak'));
	}
	public function hapusrak(){
        $id = $this->input->post('id');
        $this->M_admin->delete_rak($id);
		$this->session->set_flashdata('message','<div class="alert alert-danger"> Data Berhasil Dihapus 
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
        redirect(base_url('admin/rak'));
		}
		
	/*----------------BUKU-----------------*/
	public function buku(){
		$data=array('title'=>'Koleksi Buku');
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->listbuku();
		$this->load->view('template/footer');
	}
	public function listbuku()
	{	
		$data['title'] = 'List Koleksi Buku'; 
        $data['query'] = $this->M_admin->get_all_buku(); 
 
		$this->load->view('admin/buku/listbuku',$data);
		
	}
	
	public function tambah_buku()
	{
	$data=array(
		'id_buku'		=>$this->M_admin->id_otomatis_buku(),
		'title'			=> 'Tambah Koleksi Buku',
		'dd_kategori'	=> $this->M_admin->dd_kategori(),
		'dd_rak'		=> $this->M_admin->dd_rak(),
		'dd_tahun'		=>$this->M_admin->get_tahun(),
		'attribute'		=>"class='form-control select2'"
		);
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('admin/buku/tambah_buku',$data);
		$this->load->view('template/footer');
	}
	
	public function simpanbuku()
	{
	$data=array(
		'id_buku'			=>$this->M_admin->id_otomatis_buku(),
        'kode_buku'			=>$this->input->post('kode'),
		'judul_buku'		=>$this->input->post('judulbuku'),
		'id_kategori'		=>$this->input->post('kategori'),
		'nama_pengarang'	=>$this->input->post('pengarang'),
		'penerbit'			=>$this->input->post('penerbit'),
		'tahun_terbit'		=>$this->input->post('tahunterbit'),
		'id_rak'			=>$this->input->post('rak'),
		'status_buku'		=>1
		);
		$this->M_admin->tambah_buku($data);
		$this->session->set_flashdata('message','<div class="alert alert-success"> Data Berhasil Ditambahkan 
		
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
			redirect(base_url('admin/buku'));
	}
		
	 function edit_buku($id){
		$data=array(
			'title'			=>'Edit Koleksi Buku',
			'query'			=>$this->M_admin->get_buku_by_id($id),
			'dd_kategori'	=> $this->M_admin->dd_kategori(),
			'dd_rak'		=> $this->M_admin->dd_rak(),
			'dd_tahun'		=>$this->M_admin->get_tahun(),
			
		);
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('admin/buku/edit_buku',$data);
		$this->load->view('template/footer');
		}
		
	function simpaneditbuku()
	{
		$id = $this->input->post('id');
		$data=array(
				'id_buku'			=>$this->M_admin->id_otomatis_buku(),
				'kode_buku'			=>$this->input->post('kode'),
				'judul_buku'		=>$this->input->post('judulbuku'),
				'id_kategori'		=>$this->input->post('kategori'),
				'nama_pengarang'	=>$this->input->post('pengarang'),
				'penerbit'			=>$this->input->post('penerbit'),
				'tahun_terbit'		=>$this->input->post('tahunterbit'),
				'id_rak'			=>$this->input->post('rak'),
				'status_buku'		=>$this->input->post('status'),
				);
			$this->M_admin->update_buku($id,$data);
			$this->session->set_flashdata('message','<div class="alert alert-success"> Data Berhasil Di Edit 
			<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
			redirect(base_url('admin/buku'));
	}
	public function hapusbuku(){
	$id = $this->input->post('id');
	$this->M_admin->delete_buku($id);
	$this->session->set_flashdata('message','<div class="alert alert-danger"> Data Berhasil Dihapus 
	<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
	redirect(base_url('admin/buku'));
	}
	public function cetakbarcodebarang()
	{
		$data['title']		 	= "Kode Barcode Buku";
		$data['judul'] 			= "Semua Kode Barcode Buku";
			
		$this->load->view('admin/buku/cetakbarcodebarang',$data);
	
	}
	public function cetakkodebarcode()
	{
		$data['id']				= $this->uri->segment(3);
		$data['title']		 	= "Kode Barcode Buku";
		$data['judul'] 			= "Kode Barcode ";
			
		$this->load->view('admin/buku/cetakbarcode',$data);
	
	}
	public function cetaksemuabuku()
	{
		$d['nama_program']		= 'Buku';
		$d['instansi']			= 'SMK PIRI SLEMAN';
		$d['kepalaperpus']		= $this->M_administrator->CariKepalaPerpus(1);
		$d['title'] 			= "Koleksi Buku";
		$d['judul'] 			= "Koleksi Buku";
		
		$text = "SELECT a.kode_buku, a.judul_buku, a.nama_pengarang, a.dipinjam,a.penerbit, a.tahun_terbit,a.status_buku,b.nama_kategori,c.nama_rak FROM buku as a JOIN kategori as b ON a.id_kategori=b.id_kategori JOIN rak as c ON a.id_rak=c.id_rak";
		$d['query']= $this->db->query($text);
		$this->load->view('admin/buku/cetakbuku',$d);
	
	}
	public function getlokasirak(){
		$idrak= $this->input->get('rakid');
		$this->M_admin->getlokasirak($idrak);

	}
	/*-----------------EBOOK----------------*/
	public function ebook(){
		$data=array('title'=>'Koleksi E-Book');
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->listebook();
		$this->load->view('template/footer');
	}
	public function listebook()
	{	
		$data['title'] = 'List E-Book'; 
        $data['query'] = $this->M_admin->get_all_ebook(); 
 
		$this->load->view('admin/ebook/list',$data);
		
	}
	
	public function tambah_ebook()
	{
	$data=array(
		'id_ebook'		=>$this->M_admin->id_otomatis_ebook(),
		'title'			=> 'Tambah Koleksi E-Book',
		'dd_kategori'	=> $this->M_admin->dd_kategori(),
		'dd_tahun'		=>$this->M_admin->get_tahun(),
		'attribute'		=>"class='form-control select2'"
		);
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('admin/ebook/tambah',$data);
		$this->load->view('template/footer');
	}
	
	public function simpanebook()
	{
		$path							='./asset/files/';
		$config['upload_path']          = $path;
		$config['allowed_types']        = 'pdf|txt|doc|docx|text';
		$config['file_name']            = '';
		$config['max_size']             = 5000;
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
			redirect(site_url('admin/tambah_ebook'));
		} 
		else 
		{
			
			if(!$this->upload->do_upload('files'))
			{		
				$data=array(
					'id_ebook'			=>$this->M_admin->id_otomatis_ebook(),
			        'judul_buku'		=>$this->input->post('judulbuku'),
					'id_kategori'		=>$this->input->post('kategori'),
					'nama_pengarang'	=>$this->input->post('pengarang'),
					'penerbit'			=>$this->input->post('penerbit'),
					'tahun_terbit'		=>$this->input->post('tahunterbit'),
				);
				$this->M_admin->tambah_ebook($data);
				$this->session->set_flashdata('message','<div class="alert alert-success"> Data Berhasil Ditambahkan 
					<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
				redirect(base_url('admin/ebook'));
			}else{

				$file					= $this->upload->data();
				$files					= $file['file_name'];
				$data=array(
					'id_ebook'			=>$this->M_admin->id_otomatis_ebook(),
			        'judul_buku'		=>$this->input->post('judulbuku'),
					'id_kategori'		=>$this->input->post('kategori'),
					'nama_pengarang'	=>$this->input->post('pengarang'),
					'penerbit'			=>$this->input->post('penerbit'),
					'tahun_terbit'		=>$this->input->post('tahunterbit'),
					'files'				=>$files
				);
				$this->M_admin->tambah_ebook($data);
				$this->session->set_flashdata('message','<div class="alert alert-success"> Data Berhasil Ditambahkan 		
					<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
				redirect(base_url('admin/ebook'));
			}
		}

	}
		
	 function edit_ebook($id){
		$data=array(
			'title'			=>'Edit Koleksi E-Book',
			'query'			=>$this->M_admin->get_ebook_by_id($id),
			'dd_kategori'	=> $this->M_admin->dd_kategori(),
			'dd_tahun'		=>$this->M_admin->get_tahun(),
			
		);
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('admin/ebook/edit',$data);
		$this->load->view('template/footer');
		}
		
	function simpaneditebook()
	{
		$id = $this->input->post('id');
		$path							='./asset/files/';
		$config['upload_path']          = $path;
		$config['allowed_types']        = 'pdf|txt|doc|docx|text';
		$config['file_name']            = '';
		$config['max_size']             = 5000;
		$config['overwrite']            = TRUE;
		
		$this->upload->initialize($config);
		
		$filelama	= $this->input->post('filelama');
	
		$check_file_upload= FALSE;
		if (isset($_FILES['files']['error']) && $_FILES['files']['error'] != 4){
			$check_file_upload = TRUE;
		}
		if($check_file_upload && !$this->upload->do_upload('files')) {
			$this->session->set_flashdata('error',$this->upload->display_errors('<div class="alert alert-danger"> 
			<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>'));
			redirect(site_url('admin/edit_ebook/'.$id));
		} 
		else 
		{
			
			if(!$this->upload->do_upload('files'))
			{
				$data=array(
					'id_ebook'			=>$this->input->post('id'),
					'judul_buku'		=>$this->input->post('judulbuku'),
					'id_kategori'		=>$this->input->post('kategori'),
					'nama_pengarang'	=>$this->input->post('pengarang'),
					'penerbit'			=>$this->input->post('penerbit'),
					'tahun_terbit'		=>$this->input->post('tahunterbit'),
					'files'				=>$filelama,
				);
				$this->M_admin->update_ebook($id,$data);
				$this->session->set_flashdata('message','<div class="alert alert-success"> Data Berhasil Di Edit 
				<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
				redirect(base_url('admin/ebook'));
			}else{
				$file					= $this->upload->data();
				$files					= $file['file_name'];
				$data=array(
					'id_ebook'			=>$this->input->post('id'),
					'judul_buku'		=>$this->input->post('judulbuku'),
					'id_kategori'		=>$this->input->post('kategori'),
					'nama_pengarang'	=>$this->input->post('pengarang'),
					'penerbit'			=>$this->input->post('penerbit'),
					'tahun_terbit'		=>$this->input->post('tahunterbit'),
					'files'				=>$files
					);
				$query=$this->M_admin->get_ebook_by_id($id);
					foreach($query as $rows ){
					@unlink('./asset/files/'.$rows->files);
				}
				$this->M_admin->update_ebook($id,$data);
				$this->session->set_flashdata('message','<div class="alert alert-success"> Data Berhasil Ditambahkan 
				
				<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
				redirect(base_url('admin/ebook'));
			}
		}
	}
	public function hapusebook(){
	$id = $this->input->post('id');
	$query=$this->M_admin->get_ebook_by_id($id);
		foreach($query as $rows ){
			@unlink('./asset/files/'.$rows->files);
		}
	$this->M_admin->delete_ebook($id);
	$this->session->set_flashdata('message','<div class="alert alert-danger"> Data Berhasil Dihapus 
	<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
	redirect(base_url('admin/ebook'));
	}
	public function dataebook(){
		$id= $this->input->post('id');
		$text = "SELECT * FROM ebook WHERE id_ebook ='$id'";
		$data['data'] = $this->db->query($text);
		$this->load->view('admin/ebook/read',$data);	
		
	}
	/*----------------MATERI-----------------*/
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
		$data['title'] = 'Pembelajaran'; 
        $data['query'] = $this->M_admin->get_all_materi(); 
 
		$this->load->view('admin/materi/listmateri',$data);
		
	}
	
	public function tambah_materi()
	{
	$data=array(
		'title'			=> 'Tambah Pembelajaran',
		'dd_tahun'		=>$this->M_admin->get_tahun(),
		'attribute'		=>"class='form-control select2'"
		);
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('admin/materi/tambah_materi',$data);
		$this->load->view('template/footer');
	}
	
	public function simpanmateri()
	{
		$path							='./asset/files/';
		$nm_file						='file-'.trim(substr(md5(rand()),0,4));
		$config['upload_path']          = $path;
		$config['allowed_types']        = 'pdf|txt|doc|docx|text';
		$config['file_name']            = $nm_file;
		$config['max_size']             = 5000;
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
			redirect(site_url('admin/tambah_materi'));
		} 
		else 
		{
			
			if(!$this->upload->do_upload('files'))
			{
				$data=array(
					'judul_materi'		=>$this->input->post('judulmateri'),
					'nama_pengampu'		=>$this->input->post('pengampu'),
					'tanggal_upload'	=>$this->M_admin->tgl_sql($this->input->post('tanggal_upload')),
					);
					$this->M_admin->tambah_materi($data);
					$this->session->set_flashdata('message','<div class="alert alert-success"> Data Berhasil Ditambahkan 
					
					<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
						redirect(base_url('admin/materi'));
			}else{
				$file					= $this->upload->data();
				$files					= $file['file_name'];
				$data=array(
					'judul_materi'		=>$this->input->post('judulmateri'),
					'nama_pengampu'		=>$this->input->post('pengampu'),
					'tanggal_upload'	=>$this->M_admin->tgl_sql($this->input->post('tanggal_upload')),
					'files'				=>$files
					);
					$this->M_admin->tambah_materi($data);
					$this->session->set_flashdata('message','<div class="alert alert-success"> Data Berhasil Ditambahkan 
					
					<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
						redirect(base_url('admin/materi'));
			}
		}
	}
		
	 function edit_materi($id){
		$data=array(
			'title'			=>'Edit Pembelajaran',
			'query'			=>$this->M_admin->get_materi_by_id($id),
			
		);
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('admin/materi/edit_materi',$data);
		$this->load->view('template/footer');
		}
		
	function simpaneditmateri()
	{
		$id = $this->input->post('id');
		$path							='./asset/files/';
		$nm_file						='file-'.trim(substr(md5(rand()),0,4));
		$config['upload_path']          = $path;
		$config['allowed_types']        = 'pdf|txt|doc|docx|text';
		$config['file_name']            = $nm_file;
		$config['max_size']             = 5000;
		$config['overwrite']            = TRUE;
		
		$this->upload->initialize($config);
		
		$filelama	= $this->input->post('filelama');
	
		$check_file_upload= FALSE;
		if (isset($_FILES['files']['error']) && $_FILES['files']['error'] != 4){
			$check_file_upload = TRUE;
		}
		if($check_file_upload && !$this->upload->do_upload('files')) {
			$this->session->set_flashdata('error',$this->upload->display_errors('<div class="alert alert-danger"> 
			<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>'));
			redirect(site_url('materi/edit_materi/'.$id));
		} 
		else 
		{
			
			if(!$this->upload->do_upload('files'))
			{
				$data=array(
					'judul_materi'		=>$this->input->post('judulmateri'),
					'nama_pengampu'		=>$this->input->post('pengampu'),
					'tanggal_upload'	=>$this->M_admin->tgl_sql($this->input->post('tanggal_upload')),
					);
					$this->M_admin->update_materi($id,$data);
					$this->session->set_flashdata('message','<div class="alert alert-success"> Data Berhasil di update 
					
					<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
						redirect(base_url('admin/materi'));
			}else{
				$file					= $this->upload->data();
				$files					= $file['file_name'];
				$data=array(
					'judul_materi'		=>$this->input->post('judulmateri'),
					'nama_pengampu'		=>$this->input->post('pengampu'),
					'tanggal_upload'	=>$this->M_admin->tgl_sql($this->input->post('tanggal_upload')),
					'files'				=>$files
					);
					$query=$this->M_admin->get_materi_by_id($id);
						foreach($query as $rows ){
							@unlink('./asset/files/'.$rows->files);
						}
					$this->M_admin->update_materi($id,$data);
					$this->session->set_flashdata('message','<div class="alert alert-success"> Data Berhasil Di Update
					
					<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
						redirect(base_url('admin/materi'));
			}
		}
	}
	public function hapusmateri(){
	$id = $this->input->post('id');
	$query=$this->M_admin->get_materi_by_id($id);
		foreach($query as $rows ){
			@unlink('./asset/files/'.$rows->files);
		}
	$this->M_admin->delete_materi($id);
	$this->session->set_flashdata('message','<div class="alert alert-danger"> Data Berhasil Dihapus 
	<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
	redirect(base_url('admin/materi'));
	}

	public function datamateri(){
		$id= $this->input->post('id');
		$text = "SELECT * FROM materi WHERE id_materi ='$id'";
		$data['data'] = $this->db->query($text);
		$this->load->view('admin/materi/read',$data);	
		
	}
	
	/*----------------PENGUNJUNG-----------------*/
	public function pengunjung(){
		$data=array('title'=>'Pengunjung Perpustakaan');
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->listpengunjung();
		$this->load->view('template/footer');
	}
	public function listpengunjung()
	{	
		$data['title'] = 'List Pengunjung Perpustakaan'; 
        $data['query'] = $this->M_admin->get_all_pengunjung(); 
 
		$this->load->view('admin/pengunjung/listpengunjung',$data);
		
	}
	public function caripengunjung()
	{
		$tgl_awal= date("Y-m-d",strtotime($this->input->post('tgl_awal')));
        $tgl_akhir= date("Y-m-d",strtotime($this->input->post('tgl_akhir')));
        $sess_data=array(
            'tgl_awal'=>$tgl_awal,
            'tgl_akhir'=>$tgl_akhir
        );
        $this->session->set_userdata($sess_data);
        $data=array(
            'query'=> $this->M_admin->laporanpengunjung($tgl_awal,$tgl_akhir),
            'tgl_awal'=>$this->M_admin->tgl_indo($this->session->userdata('tgl_awal')),
            'tgl_akhir'=>$this->M_admin->tgl_indo($this->session->userdata('tgl_akhir')),
        );
        $this->load->view('admin/pengunjung/laporankunjungan',$data);
    }
	public function semuapengunjung()
	{
		$data=array(
            'query'=> $this->M_admin->semuapengunjung(),
        );
        $this->load->view('admin/pengunjung/laporankunjungan',$data);
    }
	public function cetakpdf()
	{	
		$tgl_awal=date("Y-m-d",strtotime($this->uri->segment(3)));
		$tgl_akhir=date("Y-m-d",strtotime($this->uri->segment(4)));
		$sess_data=array(
		'tgl_awal'=>$tgl_awal,
		'tgl_akhir'=>$tgl_akhir,
		);
		$this->session->set_userdata($sess_data);
		$data=array(
			'dari'=>$this->M_admin->tgl_indo($this->session->userdata('tgl_awal')),
			'sampai'=>$this->M_admin->tgl_indo($this->session->userdata('tgl_akhir')),
		  	'query'=> $this->M_admin->laporanpengunjung($tgl_awal,$tgl_akhir),
	        );
		$this->load->view('admin/pengunjung/cetakkunjunganpdf',$data);
	}
	public function printpdf()
	{	
		$data=array(
		   	'query'=> $this->M_admin->semuapengunjung(),
	        );
		$this->load->view('admin/pengunjung/cetakkunjunganpdf',$data);
		 
	}
	
	
	/*----------------PEMINJAMAN-----------------*/
	public function peminjaman(){
	   $sql=("SELECT * from peminjaman a join anggota b on a.nis=b.nis WHERE status_peminjaman=0 ORDER BY kode_pinjam DESC");
		$data=array(
			'title' 	=> 'Data Peminjaman', 
			'query'		=> $this->db->query($sql)->result(), 
			'attribute'	=> "class='form-control select2' required",
			);
        $this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('admin/peminjaman/listpeminjaman',$data);
		$this->load->view('template/footer');	
	}
	
	function ubahTanggal($tanggal){
	
	 $pisah = explode('/',$tanggal);
	 $array = array($pisah[2],$pisah[0],$pisah[1]);
	 $satukan = implode('-',$array);
	 return $satukan;
	}
	
	function tambahpeminjaman(){
		$data=array(
			'title' 		=> 'Tambah Peminjaman Buku', 
			'kode_pinjam' 	=> $this->M_admin->get_kode_pinjam(),
			'dd_tempo'		=> $this->M_admin->get_tempo(),
			'query'			=> $this->M_admin->get_buku(), 
			'tgl_pinjam'	=> date('d-m-Y'),
			'attribute'		=> "class='form-control select2'",
			);
        $this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('admin/peminjaman/tambahpeminjaman',$data);
		$this->load->view('template/footer');		
	}
	public function datadetail()
	{
		$id = $this->input->post('kode');
		$text = "SELECT a.kode_pinjam,a.kode_buku,b.judul_buku,b.nama_pengarang,b.penerbit 
				FROM detail_peminjaman as a 
				JOIN buku as b
				on a.kode_buku=b.kode_buku
				WHERE kode_pinjam='$id'";
		$data['data']= $this->db->query($text);

		$this->load->view('admin/peminjaman/detail',$data);
	}
	public function InfoBuku()
	{
			$kode = $this->input->post('kode');
			$text = "SELECT * FROM buku WHERE kode_buku='$kode'";
			$tabel = $this->db->query($text);
			$row = $tabel->num_rows();
			if($row>0){
				foreach($tabel->result() as $t){
					$data['kode_buku']		= $t->kode_buku;
					$data['judul_buku']	  	= $t->judul_buku;
					$data['pengarang']	 	= $t->nama_pengarang;
					$data['penerbit'] 	 	= $t->penerbit;
					echo json_encode($data);
				}
			}else{
					$data['kode_buku']		= '';
					$data['judul_buku']	  	= '';
					$data['pengarang']	 	= '';
					$data['penerbit'] 	 	= '';
					echo json_encode($data);
			}
		
	}
	public function infokodepinjam()
	{
			$kode = $this->input->post('kode');
			$text = "SELECT * FROM peminjaman a JOIN anggota b ON a.nis=b.nis WHERE kode_pinjam='$kode'";
			$tabel = $this->db->query($text);
			$row = $tabel->num_rows();
			if($row>0){
				foreach($tabel->result() as $t){
					$data['nis']			= $t->nis;
					$data['siswa']			= $t->nama_anggota;
					echo json_encode($data);
				}
			}else{
					$data['nis']			= '';
					$data['siswa']			= '';
					echo json_encode($data);
			}
		
	}
	public function infokodesiswa()
	{
			$kode = $this->input->post('kode');
			$text = "SELECT * FROM anggota WHERE nis='$kode'";
			$tabel = $this->db->query($text);
			$row = $tabel->num_rows();
			if($row>0){
				foreach($tabel->result() as $t){
					$data['nis']			= $t->nis;
					$data['siswa']			= $t->nama_anggota;
					echo json_encode($data);
				}
			}else{
					$data['nis']			= '';
					$data['siswa']			= '';
					echo json_encode($data);
			}
		
	}
	public function databuku(){
		$cari= $this->input->post('cari');
		if(empty($cari)){
			$text = "SELECT * FROM buku WHERE status_buku=1";
		}else{
			$text = "SELECT * FROM buku WHERE status_buku=1 AND kode_buku LIKE '%$cari%' OR status_buku=1 AND judul_buku LIKE '%$cari%' OR status_buku=1 AND nama_pengarang LIKE '%$cari%' OR status_buku=1 AND penerbit LIKE '%$cari%' ";
		}
		$data['data'] = $this->db->query($text);
		
		$this->load->view('admin/peminjaman/data_buku',$data);	
	}
	public function datakodesiswa(){
		$cari= $this->input->post('cari');
		if(empty($cari)){
			$text = "SELECT * FROM anggota order by id_anggota DESC";
		}else{
			$text = "SELECT * FROM anggota WHERE nis LIKE '%$cari%' OR nama_anggota LIKE '%$cari%' order by id_anggota DESC ";
		}
		$data['data'] = $this->db->query($text);
		
		$this->load->view('admin/peminjaman/data_kodesiswa',$data);	
	}
	public function simpanpinjaman()
	{
		date_default_timezone_set('Asia/Jakarta');
		
		$up['kode_pinjam']		= $this->input->post('kodepinjam',null,true);
		$up['tanggal_pinjam']	= $this->M_admin->tgl_sql($this->input->post('tanggal'));
		$up['batas_waktu']		= $this->input->post('tempo');
		$up['nis']				= $this->input->post('nis',null,true);
		$up['status_peminjaman']= 0;
		$up2['status_buku']		= 0;
		
		$ud['kode_pinjam'] 		= $this->input->post('kodepinjam',null,true);
		$ud['kode_buku']		= $this->input->post('kode_buku',null,true);
		
		$id['kode_pinjam']		= $this->input->post('kodepinjam');
		
		$id2['kode_pinjam']		= $this->input->post('kodepinjam');
		$id2['kode_buku']		= $this->input->post('kode_buku');
		$id5['kode_buku']		= $this->input->post('kode_buku');
		$kodebk 				= $this->input->post('kode_buku');
		
		$berapa					= $this->M_admin->jumlahpeminjaman($kodebk);
		$data 					= $this->M_admin->getSelectedData("peminjaman",$id);
		if($data->num_rows()>0){
			$this->M_admin->updateData("peminjaman",$up,$id);
			$data = $this->M_admin->getSelectedData("detail_peminjaman",$id2);
			if($data->num_rows()>0){
				$this->M_admin->updateData("detail_peminjaman",$ud,$id2);
			}else{
				$this->M_admin->insertData("detail_peminjaman",$ud);
				$this->M_admin->updateData("buku",$up2,$id5);
				$this->db->query("UPDATE buku SET dipinjam='$berapa+1' WHERE kode_buku='$kodebk'");
			}
			echo 'Update data Sukses';
		}else{
			$this->M_admin->insertData("peminjaman",$up);
			$this->M_admin->insertData("detail_peminjaman",$ud);
			$this->M_admin->updateData("buku",$up2,$id5);
			$this->db->query("UPDATE buku SET dipinjam='$berapa+1' WHERE kode_buku='$kodebk'");
			echo 'Simpan data Sukses';		
		}

	}
	
	public function datapinjam(){
		$id= $this->input->post('id');
		$text = "SELECT * FROM detail_peminjaman as a join buku as b on a.kode_buku=b.kode_buku WHERE kode_pinjam='$id'";
		$data['data'] = $this->db->query($text);
		
		$this->load->view('admin/peminjaman/data_pinjam',$data);	
	}
    public function cetakpeminjamanbuku(){
			$d['judul'] 		= "Faktur Peminjaman Buku";
			$d['instansi'] 		= $this->config->item('instansi');
			$d['alamat'] 		= $this->config->item('alamat');
			
			$id = $this->uri->segment(3);
			$text = "SELECT * FROM peminjaman WHERE kode_pinjam='$id'";
			$data = $this->db->query($text);
			if($data->num_rows() > 0){
				foreach($data->result() as $db){
					$pinjam					= $db->tanggal_pinjam;
					$tgl2					= $db->batas_waktu;
					$tempo					= date('Y-m-d', strtotime('+'.$tgl2.'days',strtotime($pinjam)));
					$d['kode_pinjam']		= $id;
					$d['tempo']				= $this->M_admin->tgl_indo($tempo);
					$d['tanggal_pinjam']	= $this->M_admin->tgl_indo($db->tanggal_pinjam);
					$d['nis']				= $db->nis.' - '.$this->M_admin->NamaAnggota($db->nis);

				}

			}else{

					$d['kode_pinjam']		=$id;
					$d['tempo']				='';
					$d['tanggal_pinjam']	='';
					$d['nis']				='';
			}
			$text = "SELECT a.kode_pinjam,a.kode_buku,b.judul_buku,b.nama_pengarang,b.penerbit
					FROM detail_peminjaman as a 
					JOIN buku as b
					ON a.kode_buku=b.kode_buku
					JOIN peminjaman as c 
					ON a.kode_pinjam=c.kode_pinjam
					WHERE a.kode_pinjam='$id'";
			$d['data']= $this->db->query($text);
			$this->load->view('admin/peminjaman/cetak',$d);
	}
	public function hapus_detail()
	{
		$id 						= $this->uri->segment(3);
		$kode 						= $this->uri->segment(4);
		$key['kode_buku'] 			= $this->uri->segment(4);
		$d_u['status_buku']			= 1;
		$this->M_admin->updateData("buku",$d_u,$key);
		$this->db->query("DELETE FROM detail_peminjaman WHERE kode_pinjam='$id' AND kode_buku='$kode'");
		$this->tambahpeminjaman();
	}
	function hapuspinjaman(){
		$id['kode_pinjam']			=$this->input->post('id');
		$q							=$this->M_admin->getSelectedData('detail_peminjaman',$id);
		foreach($q->result() as $d){
			$berapa					= $this->indonesia_library->jumlahpeminjaman($d->kode_buku);
			$d_u2['dipinjam'] 		= $berapa - 1;
			$d_u['status_buku'] 	= 1;
			$key['kode_buku']		= $d->kode_buku;
			$this->M_admin->updateData("buku",$d_u,$key);
			$this->M_admin->updateData("buku",$d_u2,$key);
		}
        $this->M_admin->deleteData('peminjaman',$id);
		$this->M_admin->deleteData('detail_peminjaman',$id);
        $this->session->set_flashdata('message','<div class="alert alert-danger"> Data Berhasil Dihapus 
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
		redirect(site_url('admin/peminjaman'));
    }
	/*---------------------PENGEMBALIAN--------------------------*/
	
	public function pengembalian(){
	   $sql=("SELECT * from pengembalian a join anggota b on a.nis=b.nis ORDER BY kode_kembali DESC");
		$data=array(
			'title' 	=> 'Data Pengembalian Buku', 
			'query'		=> $this->db->query($sql)->result(), 
			'attribute'	=> "class='form-control select2' required",
			);
        $this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('admin/pengembalian/listpengembalian',$data);
		$this->load->view('template/footer');	
	}
	
	function tambahpengembalian(){
		$data=array(
			'title' 		=> 'Tambah Pengembalian Buku', 
			'kode_kembali' 	=> $this->M_admin->get_kode_kembali(),
			'tgl_kembali'	=> date('d-m-Y'),
			'query'			=> $this->M_admin->get_buku(), 
			'attribute'		=> "class='form-control select2'",
			);
        $this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('admin/pengembalian/tambahpengembalian',$data);
		$this->load->view('template/footer');		
	}
	public function datadetailkembali()
	{
		$id = $this->input->post('kode');
		$text = "SELECT a.kode_kembali,a.kode_buku,b.judul_buku,b.nama_pengarang,b.penerbit 
				FROM detail_pengembalian as a 
				JOIN buku as b
				on a.kode_buku=b.kode_buku
				WHERE kode_kembali='$id'";
		$data['data']= $this->db->query($text);

		$this->load->view('admin/pengembalian/detail',$data);
	}
	public function infokodepinjaman()
	{
			$kode = $this->input->post('kode');
			$text = "SELECT * FROM peminjaman a JOIN anggota b ON a.nis=b.nis WHERE kode_pinjam='$kode'";
			$tabel = $this->db->query($text);
			$row = $tabel->num_rows();
			if($row>0){
				foreach($tabel->result() as $t){
					$data['kodepinjam']		= $t->kode_pinjam;
					$data['nis']			= $t->nis;
					$data['siswa']			= $t->nama_anggota;
					echo json_encode($data);
				}
			}else{
					$data['kodepinjam']		= '';
					$data['nis']			= '';
					$data['siswa']			= '';
					echo json_encode($data);
			}
		
	}
	public function datakodepinjaman(){
		$cari= $this->input->post('cari');
		if(empty($cari)){
			$text = "SELECT * FROM peminjaman a JOIN anggota b ON a.nis=b.nis WHERE status_peminjaman=0 order by kode_pinjam DESC";
		}else{
			$text = "SELECT * FROM peminjaman a JOIN anggota b ON a.nis=b.nis WHERE status_peminjaman=0 AND kode_pinjam LIKE '%$cari%' OR status_peminjaman=0 AND nama_anggota LIKE '%$cari%' OR status_peminjaman=0 AND a.nis LIKE '%$cari%' order by kode_pinjam DESC ";
		}
		$data['data'] = $this->db->query($text);
		
		$this->load->view('admin/pengembalian/data_kodedipinjam',$data);	
	}
	public function databukudipinjam(){
		$cari= $this->input->post('cari');
		$text = "SELECT * FROM detail_peminjaman as a JOIN buku as b ON a.kode_buku=b.kode_buku WHERE kode_pinjam='$cari' AND status_buku='0'";	
		$data['data'] = $this->db->query($text);
		
		$this->load->view('admin/pengembalian/data_bukudipinjam',$data);	
	}
	public function simpanpengembalian()
	{
		date_default_timezone_set('Asia/Jakarta');
		
		$up['kode_kembali']			= $this->input->post('kodekembali',null,true);
		$up['kode_pinjam']			= $this->input->post('kodepinjam',null,true);
		$up['nis']					= $this->input->post('nis',null,true);
		$up['id_denda']				= 1;
		$up['tgl_kembali']			= $this->M_admin->tgl_sql($this->input->post('tglkembali'));
		$up2['status_buku']			= 1;
		$up3['status_peminjaman']	= 1;
		
		$ud['kode_kembali'] 	= $this->input->post('kodekembali',null,true);
		$ud['kode_buku']		= $this->input->post('kode_buku',null,true);
		
		$id['kode_kembali']		= $this->input->post('kodekembali');
		
		$id2['kode_kembali']	= $this->input->post('kodekembali');
		$id2['kode_buku']		= $this->input->post('kode_buku');
		$id5['kode_buku']		= $this->input->post('kode_buku');
		$id4['kode_pinjam']		= $this->input->post('kodepinjam');
		
		$data 					= $this->M_admin->getSelectedData("pengembalian",$id);
		if($data->num_rows()>0){
			$this->M_admin->updateData("pengembalian",$up,$id);
			$data = $this->M_admin->getSelectedData("detail_pengembalian",$id2);
			if($data->num_rows()>0){
				$this->M_admin->updateData("detail_pengembalian",$ud,$id2);
			}else{
				$this->M_admin->insertData("detail_pengembalian",$ud);
				$this->M_admin->updateData("buku",$up2,$id5);
				$this->M_admin->updateData("peminjaman",$up3,$id4);
			}
			echo 'Update data Sukses';
		}else{
			$this->M_admin->insertData("pengembalian",$up);
			$this->M_admin->insertData("detail_pengembalian",$ud);
			$this->M_admin->updateData("buku",$up2,$id5);
			$this->M_admin->updateData("peminjaman",$up3,$id4);
			echo 'Simpan data Sukses';		
		}

	}
	
	public function databukukembali(){
		$id= $this->input->post('id');
		$text = "SELECT * FROM detail_pengembalian as a join buku as b on a.kode_buku=b.kode_buku WHERE kode_kembali='$id'";
		$data['data'] = $this->db->query($text);
		
		$this->load->view('admin/pengembalian/data_bukukembali',$data);	
	}
     public function cetakpengembalianbuku(){
			$d['judul'] 		= "Faktur Pengembalian Buku";
			$d['instansi'] 		= "SMK PIRI SLEMAN YOGYAKARTA";
			$d['alamat'] 		= $this->config->item('alamat');
			
			$id = $this->uri->segment(3);
			$text = "SELECT * FROM pengembalian WHERE kode_kembali='$id'";
			$data = $this->db->query($text);
			if($data->num_rows() > 0){
				foreach($data->result() as $db){
					$d['kode_kembali']		= $id;
					$d['tanggal_kembali']	= $this->M_admin->tgl_str($db->tgl_kembali);
					$d['kode_pinjam']		= $db->kode_pinjam;
					$d['id_denda']			= $db->id_denda;
					$d['nis']				= $db->nis.' - '.$this->M_admin->NamaAnggota($db->nis);

				}

			}else{

					$d['kode_kembali']		=$id;
					$d['tanggal_kembali']	='';
					$d['kode_pinjam']		='';
					$d['id_denda']			='';
					$d['nis']				='';
			}
			$text = "SELECT a.kode_kembali,a.kode_buku,b.judul_buku,b.nama_pengarang,b.penerbit,c.kode_pinjam,c.tgl_kembali
					FROM detail_pengembalian as a 
					JOIN buku as b
					ON a.kode_buku=b.kode_buku
					JOIN pengembalian as c 
					ON a.kode_kembali=c.kode_kembali
					WHERE a.kode_kembali='$id'";
			$d['data']= $this->db->query($text);
			$this->load->view('admin/pengembalian/cetakfaktur',$d);
	}
	function hapuspengembalian(){
		$id['kode_kembali']			=$this->input->post('id');
		$id2						=$this->input->post('id');
		$id3						=$this->M_admin->CariKodePinjam($id2);
		$q							=$this->M_admin->getSelectedData('detail_pengembalian',$id);
		foreach($q->result() as $d){
			$d_u['status_buku'] 	= 0;
			$key['kode_buku']		= $d->kode_buku;
			$this->M_admin->updateData("buku",$d_u,$key);
		}
		$d_u2					 	= 0;
		$this->M_admin->status_peminjaman($id3,$d_u2);
		$this->M_admin->deleteData('pengembalian',$id);
		$this->M_admin->deleteData('detail_pengembalian',$id);
        $this->session->set_flashdata('message','<div class="alert alert-danger"> Data Berhasil Dihapus 
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
		redirect(site_url('admin/pengembalian'));
    }
	/*----------------Pesanan-----------------*/
	public function lihatpesanan(){
	$data=array(
		'title'			=> 'Lihat Pesanan Buku',
		'data'			=> $this->M_admin->lihat_booking(),
		);
		$this->load->view('template/head',$data);
		$this->load->view('template/header_anggota');
		$this->load->view('template/menu');
		$this->load->view('admin/booking/lihatpesanan',$data);
		$this->load->view('template/footer');
	}
	public function respon(){
	$id					= $this->uri->segment(3);
	$query				= $this->M_admin->get_booking_by_kode($id);
	$data['dd_status']	= $this->M_admin->dd_statuspesanan();
	$data['title']		= 'Respon Pesanan Buku';
		foreach($query as $row){
			$data['kode_booking']	=$row->kode_booking;
			$data['nis']			=$row->nis;
			$data['nama']			=$row->nama;
			$data['judul_buku']		=$row->judul_buku;
			$data['pengarang']		=$row->pengarang;
			$data['penerbit']		=$row->penerbit;
			$data['tanggal']		=$this->M_admin->tgl_str($row->tgl_pesan);
			$data['status']			=$row->status_booking;
			$data['keterangan']		=$row->keterangan;
		}
		$this->load->view('template/head',$data);
		$this->load->view('template/header_anggota');
		$this->load->view('template/menu');
		$this->load->view('admin/booking/responpesanan',$data);
		$this->load->view('template/footer');
	}
	public function saveresponbooking(){
		$id = $this->input->post('kode');
		$data=array(
				'status_booking'	=>$this->input->post('dd_status'),
				'keterangan'		=>$this->input->post('keterangan'),
				);
			$this->M_admin->saveresponbooking($id,$data);
			$this->session->set_flashdata('message','<div class="alert alert-success"> Data Berhasil Di Ubah
			<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
			redirect(base_url('admin/lihatpesanan'));
	}
	public function hapuspesanan(){
        $id = $this->input->post('id');
        $this->M_admin->delete_pesanan($id);
		$this->session->set_flashdata('message','<div class="alert alert-danger"> Data Berhasil Dihapus 
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
        redirect(base_url('admin/lihatpesanan'));
		}
	
	/*----------------Denda-----------------*/
	public function denda(){
		$data['title']	= 'Denda';
		$config			= $this->M_admin->Get_Denda();
		$data['denda']	= $config['denda'];
		$data['id']	    = 1;
			
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('admin/denda/denda',$data);
		$this->load->view('template/footer');
	}
	
	function simpandenda(){
		$data 	= array(
				'denda' 		=> $this->input->post('denda'),
			);
		$id						= $this->input->post('id',null,TRUE);
		$d						= $this->db->get_where('denda',array('id_denda'=>$id));
  
		if($d->num_rows() > 0){
			$this->M_admin->updatedenda($id,$data);
			$this->session->set_flashdata(
				'message', '<div class="bs-example">
							<div class="alert alert-success">
							<a href="#" class="close" data-dismiss="alert">&times;</a>
							<strong>Success!</strong> Updated.
							</div>
							</div>');
					echo '<script>location.href="'.base_url().'admin/denda"; </script>';
		}else{
			$this->M_admin->adddenda($data);
			$this->session->set_flashdata(
				'message', '<div class="bs-example">
							<div class="alert alert-success">
							<a href="#" class="close" data-dismiss="alert">&times;</a>
							<strong>Success!</strong> Updated.
							</div>
							</div>');
					echo '<script>location.href="'.base_url().'admin/denda"; </script>';
		}
	}

	public function inbox()
	{
		
			$data=array(
				'title'				=> 'List Inbox',
				'datainbox' 		=> $this->M_admin->getInbox()
			);
			
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('admin/inbox/inbox',$data);
		$this->load->view('template/footer');
	
	}
	
	public function balas_pesan()
	{	
		$data['viewinbox']			= $this->uri->segment(3);
		$this->load->view('admin/inbox/reply',$data);
	}
	public function inboxdetail(){
		$id					= $this->input->post('id');
		$data =array(
			'komentar'		=>$this->M_admin->caripesanbyid($id),
		);
		$this->load->view('admin/inbox/inboxdetail',$data);
	}
	public function kirimbalasan(){
		date_default_timezone_set('Asia/Jakarta');
		$idpesan				= $this->input->post('inboxid');
		$nama					= $this->session->userdata('username');
		$inbox					= $this->input->post('inbox');
		$time					= $this->indonesia_library->format_tanggal_jam(date('Y-m-d H:i:s')); 
		
		$data['inboxid']		= $idpesan;
		$data['username']		= $nama;
		$data['pesan']			= $inbox;
		$data['tanggal']		= $time;
		$status['status'] 		= 1;
		$nis['nis'] 			= $idpesan;

		$this->M_admin->updateData("inbox",$status,$nis);
		$this->M_admin->saveinbox($data);
}
	public function hapuspesan($id){
			$this->M_admin->hapuspesan($id);
			$this->session->set_flashdata('SUCCESSMSG','Pesan Berhasil Dihapus'); 
			redirect(site_url('admin/inbox'));
	}
	

}
	
	