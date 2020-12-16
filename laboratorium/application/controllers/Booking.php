<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking extends CI_Controller {
public function __construct(){
		parent::__construct();
		$this->load->helper('text');
		$this->load->library('Indonesia_library');
		
	}
	public function index()
	{
		$cek = $this->session->userdata('level')==01 || $this->session->userdata('level')==02;
		if(!empty($cek)){
			$cari 		= $this->input->post('kode_barcode');
			if(empty($cari)){
				$where = ' ';
			}else{
				$where = " WHERE a.kode_barcode LIKE '%$cari%'";
			}
			$config=$this->app_model->Get_Config();
			
				$d['prg']= $config['author'];
				$d['web_prg']= $config['website'];
				
				$d['nama_program']= $config['aplikasi'];
				$d['instansi']= $config['instansi'];
				$d['usaha']= $config['usaha'];
				$d['alamat_instansi']= $config['alamat'];
				

			
			$d['judul']="Jadwal Pemeriksaan";
			
			//paging
			$page=$this->uri->segment(3);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$text = "SELECT * FROM antrian a JOIN pasien b on a.kode_barcode=b.kode_barcode $where";		
			$tot_hal = $this->app_model->manualQuery($text);		
			
			$d['tot_hal'] = $tot_hal->num_rows();
			
			$config['base_url'] = site_url() . '/booking/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['next_link'] = 'Lanjut &raquo;';
			$config['prev_link'] = '&laquo; Kembali';
			$config['last_link'] = '<b>Terakhir &raquo; </b>';
			$config['first_link'] = '<b> &laquo; Pertama</b>';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			$d['hal'] = $offset;
			

			$text = "SELECT * FROM antrian a JOIN pasien b on a.kode_barcode=b.kode_barcode $where
					ORDER BY a.no_antrian ASC 
					LIMIT $limit OFFSET $offset";
			$d['data'] = $this->app_model->manualQuery($text);
			
			$pesan1 = "SELECT * FROM antrian WHERE status ='1'";
			$d['pesan1'] = $this->app_model->manualQuery($pesan1);
			
			$d['CountBooking']= $this->app_model->CountAntrian();
			$d['content'] = $this->load->view('booking/view', $d, true);		
			$this->load->view('home',$d);
		}else{
			header('location:'.base_url());
		}
	}
	
	public function tambah()
	{
		$cek = $this->session->userdata('level')==01 || $this->session->userdata('level')==02;
		if(!empty($cek)){
			$config=$this->app_model->Get_Config();
			
			$d['prg']= $config['author'];
			$d['web_prg']= $config['website'];
			
			$d['nama_program']= $config['aplikasi'];
			$d['instansi']= $config['instansi'];
			$d['usaha']= $config['usaha'];
			$d['alamat_instansi']= $config['alamat'];
				

			$d['judul']="Booking Antrian Laboratorium";
			
			$no_antrian		= $this->app_model->no_antrian();
			
			$d['no_antrian']	= $no_antrian;
			$d['kode_barcode']	= '';
			
			$pesan1 = "SELECT * FROM antrian WHERE status=1";
			$d['pesan1'] = $this->app_model->manualQuery($pesan1);
			
			$d['CountBooking']= $this->app_model->CountAntrian();
			$d['content'] = $this->load->view('booking/form', $d, true);		
			$this->load->view('home',$d);
		}else{
			header('location:'.base_url());
		}
	}
	
	public function edit()
	{
		$cek = $this->session->userdata('level')==01 || $this->session->userdata('level')==02;
		if(!empty($cek)){
			
			$config=$this->app_model->Get_Config();
			
			$d['prg']= $config['author'];
			$d['web_prg']= $config['website'];
			
			$d['nama_program']= $config['aplikasi'];
			$d['instansi']= $config['instansi'];
			$d['usaha']= $config['usaha'];
			$d['alamat_instansi']= $config['alamat'];
			
			
			$d['judul'] = "Booking Antrian Laboratorium";
			
			$id = $this->uri->segment(3);
			$text = "SELECT * FROM antrian a JOIN pasien b on a.kode_barcode=b.kode_barcode WHERE a.kode_barcode='$id'";
			$data = $this->app_model->manualQuery($text);
			if($data->num_rows() > 0){
				foreach($data->result() as $db){
					$d['kode_barcode']	= $id;
					$d['no_antrian']	= $db->no_antrian;
				}
			}else{
					$d['kode_barcode']	=$id;
					$d['no_antrian']	= $this->app_model->no_antrian();
			}
			
			$pesan1 = "SELECT * FROM antrian WHERE status=1";
			$d['pesan1'] = $this->app_model->manualQuery($pesan1);
			
			$d['CountBooking']= $this->app_model->CountAntrian();
			$d['content'] = $this->load->view('booking/form', $d, true);		
			$this->load->view('home',$d);
		}else{
			header('location:'.base_url());
		}
	}
	
	public function status($id,$status) {
		
		$cek = $this->session->userdata('level')==01 || $this->session->userdata('level')==02;
		if(!empty($cek)){
			
			$this->app_model->BookingStatus($id,$status);
			$this->app_model->BookingStatusAntrian($id,$status);
			$this->session->set_flashdata('SUCCESSMSG','Status berhasil diperbaharui!');
			redirect(site_url('booking'));
		}
		else{
			header('location:'.base_url());
		}
	}
	
	public function hapus()
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){			
			$id = $this->uri->segment(3);
			$this->app_model->manualQuery("DELETE FROM antrian WHERE kode_barcode='$id'");
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/booking'>";			
		}else{
			header('location:'.base_url());
		}
	}
	
	public function simpan()
	{
		
		$cek = $this->session->userdata('level')==01 || $this->session->userdata('level')==02;
		if(!empty($cek)){
			date_default_timezone_set('Asia/Jakarta');
			$date= $this->indonesia_library->format_tanggal_jam(date('Y-m-d H:i:s'));
			$up['kode_barcode']	= $this->input->post('kode_barcode',null,true);
			$up['no_antrian']	= $this->input->post('no_antrian',null,true);
			$up['tgl_antrian']	= $date;
			$up['tempo']		= $date;
			$up['status']		= 1;
			
			$id['kode_barcode']	= $this->input->post('kode_barcode');
			
			$data = $this->app_model->getSelectedData("antrian",$id);
			if($data->num_rows()>0){
				$this->app_model->updateData("antrian",$up,$id);
				echo 'Update data Sukses';
			}else{
				$this->app_model->insertData("antrian",$up);
				$this->app_model->insertData("h_antrian",$up);
				echo 'Simpan data Sukses';		
			}
		
		}else{
				header('location:'.base_url());
		}
	
	}
	
	public function DataDetail()
	{
		$cek = $this->session->userdata('level')==01 || $this->session->userdata('level')==02;
		if(!empty($cek)){
			
			$id = $this->input->post('kode');
			$text = "SELECT a.kode_barcode,a.no_antrian,a.tgl_antrian,a.status,
					b.nama,b.alamat,b.tempat_lahir,b.tgl_lahir,b.gender,b.telp,b.status_pasien
					FROM antrian as a 
					JOIN pasien as b
					ON a.kode_barcode=b.kode_barcode
					WHERE a.kode_barcode='$id'";
			$d['data']= $this->app_model->manualQuery($text);

			$this->load->view('booking/detail',$d);
		}else{
			header('location:'.base_url());
		}
	}
	
}

/* End of file profil.php */
/* Location: ./application/controllers/profil.php */