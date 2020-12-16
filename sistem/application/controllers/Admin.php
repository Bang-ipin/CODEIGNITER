<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('usergroup')!=2) {
		$this->session->set_flashdata('pesan','Maaf Anda Bukan Admin');
		redirect(base_url());
		}
		$this->load->model('M_admin');
		$this->load->library('indonesia_library');
	}
	public function index() {	
		$data=array('title'					=>'Dashboard',
					 'username'				=>$this->session->userdata('username'),
					 'totalinvoice'			=>$this->M_admin->totalinvoice(),
					 'totalpelanggan'		=>$this->M_admin->totalpelanggan(),
					 );
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('admin/index',$data);
		$this->load->view('template/footer');
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
		$this->load->view('admin/invoice/list',$data);
		$this->load->view('template/footer');	
	}
	
	function tambahinvoice(){
		$data=array(
			'title' 		=> 'Buat Invoice Baru', 
			'kode_invoice' 	=> $this->M_admin->get_kode_invoice(),
			'dd_paket'		=> $this->M_admin->dd_paket(),
			'dd_bank'		=> $this->M_admin->dd_bank(),
			'tgl_invoice'	=> date('d-m-Y'),
			'attribute'		=> "class='form-control select2'",
			);
        $this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('admin/invoice/tambah',$data);
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
		$up['tanggal']			= $this->M_admin->tgl_sql($this->input->post('tanggal'));
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
		$pel['tanggal_invoice']	= $this->M_admin->tgl_sql($this->input->post('tanggal'));
		$pel['pelanggan']		= $this->input->post('pelanggan',null,true);
		$pel['institusi']		= $this->input->post('institusi',null,true);
		$pel['kota']			= $this->input->post('kota',null,true);
		$pel['ttl']				= $this->M_admin->tgl_sql($this->input->post('lahir'));
		$pel['email']			= $this->input->post('email',null,true);
		$pel['telepon']			= $this->input->post('telepon',null,true);
		$pel['pembayaran']		= $this->input->post('bank',null,true);
		$pel['paket']			= $this->input->post('paket',null,true);
		$pel['nominal']			= $this->input->post('nominal',null,true);
		
		$id['kodeinvoice']		= $this->input->post('kodeinvoice');
		
		$id2['kodeinvoice']		= $this->input->post('kodeinvoice');
		
		$data 					= $this->M_admin->getSelectedData("invoice",$id);
		if($data->num_rows()>0){
			$this->M_admin->updateData("invoice",$up,$id);
			$data = $this->M_admin->getSelectedData("detail_invoice",$id2);
			if($data->num_rows()>0){
				$this->M_admin->updateData("detail_invoice",$ud,$id2);
			}else{
				$this->M_admin->insertData("detail_invoice",$ud);
			}
			echo 'Update data Sukses';
		}else{
			$this->M_admin->insertData("invoice",$up);
			$this->M_admin->insertData("pelanggan",$pel);
			$this->M_admin->insertData("detail_invoice",$ud);
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
			$text = "SELECT a.tanggal,a.pelanggan,b.kodeinvoice, b.kota,b.email,b.pembayaran,b.telepon, b.institusi  FROM invoice as a JOIN detail_invoice as b on a.kodeinvoice=b.kodeinvoice WHERE b.kodeinvoice='$id'";
			$data = $this->db->query($text);
			if($data->num_rows() > 0){
				foreach($data->result() as $db){
					$tgl					= $db->tanggal;
					$d['kodeinvoice']		= $id;
					$d['tanggal']			= $this->M_admin->tgl_indo($db->tanggal);
					$d['pelanggan']			= $db->pelanggan;
					$d['institusi']			= $db->institusi;
					$d['kota']				= $db->kota;
					$d['email']				= $db->email;
					$d['telepon']			= $db->telepon;

				}

			}else{

					$d['kodeinvoice']		=$id;
					$d['tanggal']			='';
					$d['pelanggan']			='';
					$d['institusi']			='';
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
			$this->load->view('admin/invoice/cetak',$d);
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
		$q							=$this->M_admin->getSelectedData('detail_invoice',$id);
		$this->M_admin->deleteData('invoice',$id);
		$this->M_admin->deleteData('pelanggan',$id2);
		$this->M_admin->deleteData('detail_invoice',$id);
        $this->session->set_flashdata('message','<div class="alert alert-danger"> Data Berhasil Dihapus 
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
		redirect(site_url('admin/invoice'));
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
		$this->load->view('admin/pelanggan/list',$data);
		$this->load->view('template/footer');	
	}
	public function editpostingan(){
	$id=$this->uri->segment(3);
	$data=array(
		'title'			=> 'Update Postingan',
		'dd_paket'		=> $this->M_admin->dd_paket(),
		'dd_status'		=> $this->M_admin->dd_status(),
		'dd_bank'		=> $this->M_admin->dd_bank(),
		'dd_ig'			=> $this->M_admin->get_post(),
		'dd_web'		=> $this->M_admin->get_post(),
		'data'			=> $this->M_admin->lihat_data($id),
		);
		$this->load->view('template/head',$data);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('admin/pelanggan/updatedata',$data);
		$this->load->view('template/footer');
	}
	public function updatepostingan(){
		$id = $this->input->post('id');
		$data=array(
				'postig'	=>$this->input->post('postig'),
				'postweb'	=>$this->input->post('postweb'),
				'catatan'	=>$this->input->post('catatan'),
				'status'	=>$this->input->post('status'),
				);
			$this->M_admin->savepostingan($id,$data);
			$this->session->set_flashdata('message','<div class="alert alert-success"> Data Berhasil Di Ubah
			<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
			redirect(base_url('admin/pelanggan'));
	}
	function hapuspelanggan(){
		$id['id']					=$this->input->post('id');
		$this->M_admin->deleteData('pelanggan',$id);
		$this->session->set_flashdata('message','<div class="alert alert-danger"> Data Berhasil Dihapus 
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
		redirect(site_url('admin/pelanggan'));
    }
}
	
	