<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrator extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('usergroup')!=1) {
		$this->session->set_flashdata('pesan','Maaf Anda Bukan Administrator');
		redirect(base_url());
		}
		$this->load->model('M_administrator');
		$this->load->library('form_validation');
	}
	public function index() {	
		$data=array('title'=>'Dashboard',
				 	 'username'				=>$this->session->userdata('username'),
					 'total_admin'			=>$this->M_administrator->total_admin(),
					 'totalinvoice'			=>$this->M_administrator->totalinvoice(),
					 'totalpelanggan'		=>$this->M_administrator->totalpelanggan(),
					 'totalsales'		    =>$this->M_administrator->totalsales(),
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
        'password'		=>$this->phpass->hash($this->input->post('password')),
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
			'password'		=>$this->phpass->hash($pwd),
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
	
	/*----------------Invoice-----------------*/
	public function invoice(){
	   $sql=("SELECT * from invoice a join detail_invoice b on a.kodeinvoice=b.kodeinvoice ORDER BY a.kodeinvoice DESC");
		$data=array(
			'title' 	=> 'Data Invoice', 
			'query'		=> $this->db->query($sql)->result(), 
			'attribute'	=> "class='form-control select2' required",
			);
        $this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('administrator/invoice/list',$data);
		$this->load->view('template/footer');	
	}
	
	function tambahinvoice(){
		$data=array(
			'title' 		=> 'Buat Invoice Baru', 
			'kode_invoice' 	=> $this->M_administrator->get_kode_invoice(),
			'dd_paket'		=> $this->M_administrator->dd_paket(),
			'dd_bank'		=> $this->M_administrator->dd_bank(),
			'tgl_invoice'	=> date('d-m-Y'),
			'attribute'		=> "class='form-control select2'",
			);
        $this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('administrator/invoice/tambah',$data);
		$this->load->view('template/footer');		
	}
	public function datadetail()
	{
		$id = $this->input->post('kode');
		$text = "SELECT a.kodeinvoice,a.nominal,a.paket,b.pelanggan 
				FROM detail_invoice as a
				JOIN invoice as b on a.kodeinvoice=b.kodeinvoice
				WHERE a.kodeinvoice='$id'";
		$data['data']= $this->db->query($text);

		$this->load->view('admin/invoice/detail',$data);
	}
	
	public function simpaninvoice()
	{
		date_default_timezone_set('Asia/Jakarta');
		
		$up['kodeinvoice']		= $this->input->post('kodeinvoice',null,true);
		$up['tanggal']			= $this->M_administrator->tgl_sql($this->input->post('tanggal'));
		$up['pelanggan']		= $this->input->post('pelanggan',null,true);
		
		$ud['kodeinvoice'] 		= $this->input->post('kodeinvoice',null,true);
		$ud['institusi']		= $this->input->post('institusi',null,true);
		$ud['kota']				= $this->input->post('kota',null,true);
		$ud['email']			= $this->input->post('email',null,true);
		$ud['telepon']			= $this->input->post('telepon',null,true);
		$ud['pembayaran']		= $this->input->post('bank',null,true);
		$ud['paket']			= $this->input->post('paket',null,true);
		$ud['nominal']			= $this->input->post('nominal',null,true);
		
		$pel['kode_invoice']	= $this->input->post('kodeinvoice',null,true);
		$pel['tanggal_invoice']	= $this->M_administrator->tgl_sql($this->input->post('tanggal'));
		$pel['pelanggan']		= $this->input->post('pelanggan',null,true);
		$pel['institusi']		= $this->input->post('institusi',null,true);
		$pel['kota']			= $this->input->post('kota',null,true);
		$pel['ttl']				= $this->M_administrator->tgl_sql($this->input->post('lahir'));
		$pel['email']			= $this->input->post('email',null,true);
		$pel['telepon']			= $this->input->post('telepon',null,true);
		$pel['pembayaran']		= $this->input->post('bank',null,true);
		$pel['paket']			= $this->input->post('paket',null,true);
		$pel['nominal']			= $this->input->post('nominal',null,true);
		
		$id['kodeinvoice']		= $this->input->post('kodeinvoice');
		
		$id2['kodeinvoice']		= $this->input->post('kodeinvoice');
		
		$data 					= $this->M_administrator->getSelectedData("invoice",$id);
		if($data->num_rows()>0){
			$this->M_administrator->updateData("invoice",$up,$id);
			$data = $this->M_administrator->getSelectedData("detail_invoice",$id2);
			if($data->num_rows()>0){
				$this->M_administrator->updateData("detail_invoice",$ud,$id2);
			}else{
				$this->M_administrator->insertData("detail_invoice",$ud);
			}
			echo 'Update data Sukses';
		}else{
			$this->M_administrator->insertData("invoice",$up);
			$this->M_administrator->insertData("pelanggan",$pel);
			$this->M_administrator->insertData("detail_invoice",$ud);
			echo 'Simpan data Sukses';		
		}

	}
	
	public function datainvoice(){
		$id= $this->input->post('id');
		$text = "SELECT * FROM detail_invoice WHERE kodeinvoice='$id'";
		$data['data'] = $this->db->query($text);
		
		$this->load->view('admin/invoice/datainvoice',$data);	
	}
    public function cetakinvoice(){
			$d['judul'] 			= "Invoice Pemasangan Iklan";
			$d['instansi'] 			= $this->config->item('instansi');
			$d['alamat'] 			= $this->config->item('alamat');
			$d['emailcompany'] 		= $this->config->item('emailcompany');
			$d['websitecompany'] 	= $this->config->item('websitecompany');
			$d['teleponcompany'] 	= $this->config->item('teleponcompany');
			
			$id = $this->uri->segment(3);
			$text = "SELECT b.kodeinvoice,a.pelanggan,b.kota,b.email,b.pembayaran,b.telepon, a.tanggal FROM invoice as a JOIN detail_invoice as b on a.kodeinvoice=b.kodeinvoice WHERE b.kodeinvoice='$id'";
			$data = $this->db->query($text);
			if($data->num_rows() > 0){
				foreach($data->result() as $db){
					$tgl					= $db->tanggal;
					$d['kodeinvoice']		= $id;
					$d['tanggal']			= $this->M_administrator->tgl_indo($db->tanggal);
					$d['pelanggan']			= $db->pelanggan;
					$d['kota']				= $db->kota;
					$d['email']				= $db->email;
					$d['telepon']			= $db->telepon;

				}

			}else{

					$d['kodeinvoice']		=$id;
					$d['tanggal']			='';
					$d['pelanggan']			='';
					$d['kota']				='';
					$d['email']				='';
					$d['telepon']			='';
			}
			$text = "SELECT a.kodeinvoice,a.institusi,a.kota,a.email,a.pembayaran,a.paket,a.nominal
					FROM detail_invoice as a 
					JOIN invoice as b 
					ON a.kodeinvoice=b.kodeinvoice
					WHERE a.kodeinvoice='$id'";
			$d['data']= $this->db->query($text);
			$this->load->view('administrator/invoice/cetak',$d);
	}
	public function hapus_detail()
	{
		$id 						= $this->uri->segment(3);
		$kode 						= $this->uri->segment(4);
		$this->db->query("DELETE FROM detail_invoice WHERE kodeinvoice='$id'");
		$this->tambahinvoice();
	}
	function hapusinvoice(){
		$id['kodeinvoice']			=$this->input->post('id');
		$id2['kode_invoice']		=$this->input->post('id');
		$q							=$this->M_administrator->getSelectedData('detail_invoice',$id);
		$this->M_administrator->deleteData('invoice',$id);
		$this->M_administrator->deleteData('pelanggan',$id2);
		$this->M_administrator->deleteData('detail_invoice',$id);
        $this->session->set_flashdata('message','<div class="alert alert-danger"> Data Berhasil Dihapus 
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
		redirect(site_url('administrator/invoice'));
    }

    /*----------------Invoice-----------------*/
	public function pelanggan(){
	   $sql=("SELECT * from pelanggan ORDER BY id DESC");
		$data=array(
			'title' 	=> 'Data Pelanggan', 
			'query'		=> $this->db->query($sql)->result(), 
			'attribute'	=> "class='form-control select2' required",
			);
        $this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('administrator/pelanggan/list',$data);
		$this->load->view('template/footer');	
	}
	public function editpostingan(){
	$id=$this->uri->segment(3);
	$data=array(
		'title'			=> 'Update Postingan',
		'dd_paket'		=> $this->M_administrator->dd_paket(),
		'dd_status'		=> $this->M_administrator->dd_status(),
		'dd_bank'		=> $this->M_administrator->dd_bank(),
		'dd_ig'			=> $this->M_administrator->get_post(),
		'dd_web'		=> $this->M_administrator->get_post(),
		'data'			=> $this->M_administrator->lihat_data($id),
		);
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('administrator/pelanggan/updatedata',$data);
		$this->load->view('template/footer');
	}
	public function updatepostingan(){
		$id     = $this->input->post('id');
		$kode   = $this->input->post('kodeinvoice');
		$data=array(
				'pelanggan'	=>$this->input->post('pelanggan'),
				'institusi'	=>$this->input->post('institusi'),
				'kota'	    =>$this->input->post('kota'),
				'email'	    =>$this->input->post('email'),
				'telepon'	=>$this->input->post('telepon'),
				'ttl'	    =>$this->M_administrator->tgl_sql($this->input->post('lahir')),
				'postig'	=>$this->input->post('postig'),
				'postweb'	=>$this->input->post('postweb'),
				'catatan'	=>$this->input->post('catatan'),
				'status'	=>$this->input->post('status'),
				);
		$datainvoice=array(
		        'institusi'	=>$this->input->post('institusi'),
				'kota'	    =>$this->input->post('kota'),
				'email'	    =>$this->input->post('email'),
				'telepon'	=>$this->input->post('telepon')
				
				);
			$this->M_administrator->savepostingan($id,$data);
			$this->M_administrator->savedetailpostingan($kode,$datainvoice);
			$this->session->set_flashdata('message','<div class="alert alert-success"> Data Berhasil Di Ubah
			<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
			redirect(base_url('administrator/pelanggan'));
	}
	function hapuspelanggan(){
		$id['id']					=$this->input->post('id');
		$this->M_administrator->deleteData('pelanggan',$id);
		$this->session->set_flashdata('message','<div class="alert alert-danger"> Data Berhasil Dihapus 
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
		redirect(site_url('administrator/pelanggan'));
    }
    
    /*----------------SALES AYAM-----------------*/
	public function sales(){
	   $sql=("SELECT * from sales ORDER BY id DESC");
		$data=array(
			'title' 	=> 'Data Konsumen', 
			'query'		=> $this->db->query($sql)->result(), 
			'attribute'	=> "class='form-control select2' required",
			);
        $this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('administrator/salesayam/list',$data);
		$this->load->view('template/footer');	
	}
	public function editkonsumen(){
		$id=$this->uri->segment(3);
		$d['title']			= 'Update Konsumen';
		$d['dd_area']		= $this->M_administrator->dd_area();
		$data				= $this->M_administrator->lihat_datapelanggan($id);
		if($data->num_rows() > 0){
			foreach($data->result() as $db){
				$d['id']				=$id;
				$d['nama']				=$db->nama;
				$d['alamat']			=$db->alamat;
				$d['pemilik']			=$db->pemilik;
				$d['area']			    =$db->area;
				$d['tanggal_kunjungan']	=$this->M_administrator->tgl_str($db->tanggal_kunjungan);
				$d['kontak']			=$db->kontak;
				$d['penanggungjawab']	=$db->penanggungjawab;
				$d['kebutuhan']			=$db->kebutuhan;
				$d['keterangan']		=$db->keterangan;
			}
		}
		$this->load->view('template/head',$d);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('administrator/salesayam/updatedata',$d);
		$this->load->view('template/footer');
	}
	public function updatekonsumen(){
		$id = $this->input->post('id');
		$data=array(
			'id'				=> $this->input->post('id',null,true),
			'tanggal_kunjungan' => $this->M_administrator->tgl_sql($this->input->post('tanggal')),
			'nama'				=> $this->input->post('pelanggan',null,true),
			'alamat'			=> $this->input->post('alamat',null,true),
			'kontak'			=> $this->input->post('kontak',null,true),
			'area'			    => $this->input->post('area',null,true),
			'pemilik'			=> $this->input->post('pemilik',null,true),
			'penanggungjawab'	=> $this->input->post('pj',null,true),
			'kebutuhan'			=> $this->input->post('kebutuhan',null,true),
			'keterangan'		=> $this->input->post('keterangan',null,true),
		);
		$this->M_administrator->savepostinganayam($id,$data);
		$this->session->set_flashdata('message','<div class="alert alert-success"> Data Berhasil Di Ubah
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
		redirect(site_url('administrator/sales'));
	}
	function hapuskonsumenayam(){
		$id['id']					=$this->input->post('id');
		$this->M_administrator->deleteData('sales',$id);
		$this->session->set_flashdata('message','<div class="alert alert-danger"> Data Berhasil Dihapus 
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
		redirect(site_url('administrator/sales'));
    }
}
	
	