<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrator extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('usergroup')!='Administrator') {
		$this->session->set_flashdata('pesan','Maaf Anda Bukan Kepala Perpustakaan');
		redirect(base_url());
		}
		$this->load->model('M_administrator');
		$this->load->library('form_validation');
	}
	public function index() {	
		$data=array('title'=>'Dashboard',
				 	 'username'				=>$this->session->userdata('username'),
					 'total_admin'			=>$this->M_administrator->total_admin(),
					 'total_anggota'		=>$this->M_administrator->total_anggota(),
					 'total_buku'			=>$this->M_administrator->total_buku(),
					 'total_pengunjung'		=>$this->M_administrator->total_pengunjung(),
					 'total_peminjaman'		=>$this->M_administrator->total_peminjaman(),
					 'total_booking'		=>$this->M_administrator->total_booking(),
					 'total_ebook'			=>$this->M_administrator->total_ebook(),
					 'total_pembelajaran'	=>$this->M_administrator->total_pembelajaran(),
					 );
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('administrator/index',$data);
		$this->load->view('template/footer');
	}	
	public function admin(){
		$data=array('title'=>'Manajemen Admin');
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->listadmin();
		$this->load->view('template/footer');
	}
	public function listadmin()
	{	
		$data['title'] = 'List Admin'; 
        $data['query'] = $this->M_administrator->get_all_admin(); 
 
		$this->load->view('administrator/admin/listadmin',$data);
		
	}
	
	public function tambah_admin()
	{
	$data=array(
		'id_user'	=> $this->M_administrator->id_otomatis(),
		'title'		=> 'Tambah Admin',
		'dd_admin' 	=> $this->M_administrator->dd_admin(),
		'attribute'	=> "class='form-control select2'"
		);
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('administrator/admin/tambah_admin',$data);
		$this->load->view('template/footer');
	}
	
	public function simpanadmin()
	{
	$data=array(
		'id_admin'		=>$this->M_administrator->id_otomatis(),
        'username'		=>$this->input->post('username'),
        'password'		=>sha1($this->input->post('password')),
		'nama_pengguna'	=>$this->input->post('user'), 
		'id_usergroup'	=>$this->input->post('akses'), 
		);
		$this->M_administrator->tambah_admin($data);
		$this->session->set_flashdata('message','<div class="alert alert-success"> Data Berhasil Ditambahkan 
		
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
			redirect(base_url('administrator'));
	}
		
	 function edit($id){
		$data=array(
			'title'=>'Edit Admin',
			'query'=>$this->M_administrator->get_admin_by_id($id),
			'dd_admin' 	=> $this->M_administrator->dd_admin(),
			'attribute'=>"class='form-control select2'"
			);
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('administrator/admin/edit_admin',$data);
		$this->load->view('template/footer');
		}
		
	function simpanedit()
	{
		$id 			= $this->input->post('id');
		$pwd			= $this->input->post('password');
		$username		= $this->input->post('username');
		$nama_pengguna	= $this->input->post('user');
		$id_usergroup	= $this->input->post('akses'); 	
		
		$data=array(
			'id_admin'		=>$id,
			'username'		=>$username,
			'password'		=>sha1($pwd),
			'nama_pengguna'	=>$nama_pengguna,
			'id_usergroup'	=>$id_usergroup, 
		);
		
		if(empty($pwd)){
				$this->db->query("UPDATE admin SET username='$username',nama_pengguna='$nama_pengguna',id_usergroup='$id_usergroup' WHERE id_admin ='$id'");
			}
			else{
				$this->M_administrator->update($id,$data);
			}
		$this->session->set_flashdata('message','<div class="alert alert-success"> Data Berhasil Di Edit 
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
		redirect(base_url('administrator/admin'));
	}
	
	public function delete(){
        $id = $this->uri->segment(3);
        $this->M_administrator->delete($id);
		$this->session->set_flashdata('message','<div class="alert alert-danger"> Data Berhasil Dihapus 
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
        redirect(base_url('administrator'));
		}
	
	public function hapusadmin(){
        $id = $this->input->post('id');
        $this->M_administrator->delete($id);
		$this->session->set_flashdata('message','<div class="alert alert-danger"> Data Berhasil Dihapus 
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
        redirect(base_url('administrator/admin'));
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
					$update 	= $this->M_administrator->update_password($pass_new);
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
		$cek_user = $this->M_administrator->cek_password($pass);

		if($cek_user->num_rows() > 0)
		{
			return TRUE;
		}
		return FALSE;
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
        $data['query'] = $this->M_administrator->get_all_anggota(); 
 
		$this->load->view('administrator/anggota/listanggota',$data);
		
	}
	public function cetaksemuaanggota()
	{
			$d['nama_program']		= 'Anggota Perpustakaan';
			$d['instansi']			= 'SMK PIRI SLEMAN';
			$d['kepalaperpus']		= $this->M_administrator->CariKepalaPerpus(1);
			$d['judul'] 			= "Anggota Perpustakaan";
			
			$text = "SELECT nis,nama_anggota,alamat,jenis_kelamin,tgl_daftar FROM anggota";
			$d['query']= $this->db->query($text);
			$this->load->view('administrator/anggota/cetakanggota',$d);
		
	}
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
        $data['query'] = $this->M_administrator->get_all_kategori(); 
 
		$this->load->view('administrator/kategori/listkategori',$data);
		
	}
	public function cetaksemuakategori()
	{
			$d['nama_program']		= 'Kategori Buku';
			$d['instansi']			= 'SMK PIRI SLEMAN';
			$d['kepalaperpus']		= $this->M_administrator->CariKepalaPerpus(1);
			$d['judul'] 			= "Kategori Buku";
			
			$text = "SELECT nama_kategori FROM kategori";
			$d['query']= $this->db->query($text);
			$this->load->view('administrator/kategori/cetakkategori',$d);
		
	}
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
        $data['query'] = $this->M_administrator->get_all_rak(); 
 
		$this->load->view('administrator/rak/listrak',$data);
		
	}
	public function cetaksemuarak()
	{
			$d['nama_program']		= 'Rak Buku';
			$d['instansi']			= 'SMK PIRI SLEMAN';
			$d['kepalaperpus']		= $this->M_administrator->CariKepalaPerpus(1);
			$d['judul'] 			= "Rak Buku";
			
			$text = "SELECT nama_rak FROM rak";
			$d['query']= $this->db->query($text);
			$this->load->view('administrator/rak/cetakrak',$d);
		
	}
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
        $data['query'] = $this->M_administrator->get_all_buku(); 
 
		$this->load->view('administrator/buku/listbuku',$data);
		
	}
	public function cetaksemuabuku()
	{
		$d['nama_program']		= 'Buku';
		$d['instansi']			= 'SMK PIRI SLEMAN';
		$d['kepalaperpus']		= $this->M_administrator->CariKepalaPerpus(1);
		$d['title'] 			= "Koleksi Buku";
		$d['judul'] 			= "Koleksi Buku";
		
		$text = "SELECT a.kode_buku, a.judul_buku, a.nama_pengarang, a.penerbit, a.tahun_terbit,a.status_buku,b.nama_kategori,c.nama_rak FROM buku as a JOIN kategori as b ON a.id_kategori=b.id_kategori JOIN rak as c ON a.id_rak=c.id_rak";
		$d['query']= $this->db->query($text);
		$this->load->view('administrator/buku/cetakbuku',$d);
	
	}
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
        $data['query'] = $this->M_administrator->get_all_pengunjung(); 
 
		$this->load->view('administrator/pengunjung/listpengunjung',$data);
		
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
            'query'=> $this->M_administrator->laporanpengunjung($tgl_awal,$tgl_akhir),
            'tgl_awal'=>$this->M_administrator->tgl_indo($this->session->userdata('tgl_awal')),
            'tgl_akhir'=>$this->M_administrator->tgl_indo($this->session->userdata('tgl_akhir')),
        );
        $this->load->view('administrator/pengunjung/laporankunjungan',$data);
    }
	public function semuapengunjung()
	{
		$data=array(
            'query'=> $this->M_administrator->semuapengunjung(),
        );
        $this->load->view('administrator/pengunjung/laporankunjungan',$data);
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
			'dari'				=> date("d F Y",strtotime($this->session->userdata('tgl_awal'))),
			'sampai'			=> date("d F Y",strtotime($this->session->userdata('tgl_akhir'))),
		   	'title'				=> 'Data Kunjungan Perpustakaan SMK Piri SLeman',
	    	'query'				=> $this->M_administrator->laporanpengunjung($tgl_awal,$tgl_akhir),
			'kepalaperpus'		=> $this->M_administrator->CariKepalaPerpus(1)
	        );
		$this->load->view('administrator/pengunjung/cetakkunjunganpdf',$data);
	}
	public function printpdf()
	{	
		$data=array(
		   	'title'				=>'Data semua pengunjung Perpustakaan SMK Piri SLeman',
	    	'query'				=> $this->M_administrator->semuapengunjung(),
			'kepalaperpus'		=> $this->M_administrator->CariKepalaPerpus(1)
	        );
		$this->load->view('administrator/pengunjung/cetakkunjunganpdf',$data);
		 
	}
	public function peminjaman(){
		$data=array('title'=>'Daftar Peminjam Buku Perpustakaan');
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->listpeminjam();
		$this->load->view('template/footer');
	}
	public function listpeminjam()
	{	
		$data['title'] = 'List Peminjaman Buku Perpustakaan'; 
        $data['query'] = $this->M_administrator->get_all_peminjamanbuku(); 
 
		$this->load->view('administrator/peminjaman/listpeminjaman',$data);
		
	}
	public function caripeminjambuku()
	{
		$tgl_awal= date("Y-m-d",strtotime($this->input->post('tgl_awal')));
        $tgl_akhir= date("Y-m-d",strtotime($this->input->post('tgl_akhir')));
        $sess_data=array(
            'tgl_awal'=>$tgl_awal,
            'tgl_akhir'=>$tgl_akhir
        );
        $this->session->set_userdata($sess_data);
        $data=array(
            'query'=> $this->M_administrator->laporanpeminjamanbuku($tgl_awal,$tgl_akhir),
            'tgl_awal'=>$this->M_administrator->tgl_indo($this->session->userdata('tgl_awal')),
            'tgl_akhir'=>$this->M_administrator->tgl_indo($this->session->userdata('tgl_akhir')),
        );
        $this->load->view('administrator/peminjaman/laporanpeminjamanbuku',$data);
    }
	public function semuapeminjambuku()
	{
		$data=array(
            'query'=> $this->M_administrator->semuapeminjamanbuku(),
        );
        $this->load->view('administrator/peminjaman/laporanpeminjamanbuku',$data);
    }
	public function cetakpinjamanpdf()
	{	
		$tgl_awal=date("Y-m-d",strtotime($this->uri->segment(3)));
		$tgl_akhir=date("Y-m-d",strtotime($this->uri->segment(4)));
		$sess_data=array(
		'tgl_awal'=>$tgl_awal,
		'tgl_akhir'=>$tgl_akhir,
		);
		$this->session->set_userdata($sess_data);
		$data=array(
			'dari'				=>$this->M_administrator->tgl_indo($this->session->userdata('tgl_awal')),
			'sampai'			=>$this->M_administrator->tgl_indo($this->session->userdata('tgl_akhir')),
		   	'title'				=>'Data Peminjaman Buku Perpustakaan SMK Piri SLeman',
	    	'query'				=> $this->M_administrator->laporanpeminjamanbuku($tgl_awal,$tgl_akhir),
			'kepalaperpus'		=> $this->M_administrator->CariKepalaPerpus(1)
	        );
		$this->load->view('administrator/peminjaman/cetakpeminjaman',$data);
	}
	public function printpinjamanpdf()
	{	
		$data=array(
		   	'title'				=> 'Data semua pengunjung Perpustakaan SMK Piri SLeman',
	    	'query'				=> $this->M_administrator->semuapeminjamanbuku(),
			'kepalaperpus'		=> $this->M_administrator->CariKepalaPerpus(1)
	        );
		$this->load->view('administrator/peminjaman/cetakpeminjaman',$data);
		 
	}
	
	public function booking(){
		$data=array('title'=>'Daftar Pesanan Buku Siswa');
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->listbooking();
		$this->load->view('template/footer');
	}
	public function listbooking()
	{	
		$data['title'] = 'List Peminjaman Buku Perpustakaan'; 
        $data['query'] = $this->M_administrator->get_all_pemesananbuku(); 
		$this->load->view('administrator/booking/listpemesanan',$data);
		
	}
	public function caripemesananbuku()
	{
		$tgl_awal= date("Y-m-d",strtotime($this->input->post('tgl_awal')));
        $tgl_akhir= date("Y-m-d",strtotime($this->input->post('tgl_akhir')));
        $sess_data=array(
            'tgl_awal'=>$tgl_awal,
            'tgl_akhir'=>$tgl_akhir
        );
        $this->session->set_userdata($sess_data);
        $data=array(
            'query'=> $this->M_administrator->laporanpemesananbuku($tgl_awal,$tgl_akhir),
            'tgl_awal'=>$this->M_administrator->tgl_indo($this->session->userdata('tgl_awal')),
            'tgl_akhir'=>$this->M_administrator->tgl_indo($this->session->userdata('tgl_akhir')),
        );
        $this->load->view('administrator/booking/laporanpemesananbuku',$data);
    }
	public function semuapemesananbuku()
	{
		$data=array(
            'query'=> $this->M_administrator->semuapemesananbuku(),
        );
        $this->load->view('administrator/booking/laporanpemesananbuku',$data);
    }
	public function cetakpemesananpdf()
	{	
		$tgl_awal=date("Y-m-d",strtotime($this->uri->segment(3)));
		$tgl_akhir=date("Y-m-d",strtotime($this->uri->segment(4)));
		$sess_data=array(
		'tgl_awal'=>$tgl_awal,
		'tgl_akhir'=>$tgl_akhir,
		);
		$this->session->set_userdata($sess_data);
		$data=array(
			'dari'				=> $this->M_administrator->tgl_indo($this->session->userdata('tgl_awal')),
			'sampai'			=> $this->M_administrator->tgl_indo($this->session->userdata('tgl_akhir')),
		   	'title'				=> 'Data Pemesanan Buku Perpustakaan SMK Piri SLeman',
	    	'query'				=> $this->M_administrator->laporanpemesananbuku($tgl_awal,$tgl_akhir),
	        'kepalaperpus'		=> $this->M_administrator->CariKepalaPerpus(1)
		   );
		$this->load->view('administrator/booking/cetakpemesanan',$data);
	}
	public function printpemesananpdf()
	{	
		$data=array(
		   	'title'				=>'Data Semua Pemesanan Buku Perpustakaan SMK Piri SLeman',
	    	'query'				=> $this->M_administrator->semuapemesananbuku(),
	        'kepalaperpus'		=> $this->M_administrator->CariKepalaPerpus(1)
			);
		$this->load->view('administrator/booking/cetakpemesanan',$data);
		 
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
        $data['query'] = $this->M_administrator->get_all_ebook(); 
 
		$this->load->view('administrator/ebook/list',$data);
		
	}
	public function dataebook(){
		$id= $this->input->post('id');
		$text = "SELECT * FROM ebook WHERE id_ebook ='$id'";
		$data['data'] = $this->db->query($text);
		$this->load->view('administrator/ebook/read',$data);	
		
	}
	public function cetakebook()
	{
		$d['nama_program']		= 'E-Book';
		$d['instansi']			= 'SMK PIRI SLEMAN';
		$d['kepalaperpus']		= $this->M_administrator->CariKepalaPerpus(1);
		$d['title'] 			= "E-Book";
		$d['judul'] 			= "E-Book";
		
		$text = "SELECT a.judul_buku, a.nama_pengarang, a.penerbit, a.tahun_terbit,b.nama_kategori FROM ebook as a JOIN kategori as b ON a.id_kategori=b.id_kategori";
		$d['query']= $this->db->query($text);
		$this->load->view('administrator/ebook/cetak',$d);
	
	}
	/*----------------MATERI-----------------*/
	public function materi(){
		$data=array('title'=>'Pembelajaran');
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->listmateri();
		$this->load->view('template/footer');
	}
	public function listmateri()
	{	
		$data['title'] = 'Pembelajaran'; 
        $data['query'] = $this->M_administrator->get_all_materi(); 
 
		$this->load->view('administrator/materi/listmateri',$data);
		
	}

	public function datamateri(){
		$id= $this->input->post('id');
		$text = "SELECT * FROM materi WHERE id_materi ='$id'";
		$data['data'] = $this->db->query($text);
		$this->load->view('administrator/materi/read',$data);	
		
	}
	public function cetakpembelajaran()
	{
		$d['nama_program']		= 'Pembelajaran';
		$d['instansi']			= 'SMK PIRI SLEMAN';
		$d['kepalaperpus']		= $this->M_administrator->CariKepalaPerpus(1);
		$d['title'] 			= "Pembelajaran";
		$d['judul'] 			= "Pembelajaran";
		
		$text = "SELECT judul_materi, nama_pengampu, tanggal_upload FROM materi";
		$d['query']= $this->db->query($text);
		$this->load->view('administrator/materi/cetak',$d);
	
	}
}
	
	