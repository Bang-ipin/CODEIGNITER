<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hasiltest extends CI_Controller {
public function __construct(){
		parent::__construct();
		$this->load->helper('text');
		$this->load->library('Indonesia_library');
		
	}
	public function index()
	{
		$cek = $this->session->userdata('level')==01 || $this->session->userdata('level')==02 || $this->session->userdata('level')==03;
		if(!empty($cek)){
			$cari = $this->input->post('kode_barcode');
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
			

		
			$d['judul']="Hasil Pemeriksaan Laboratorum";
			
			//paging
			$page=$this->uri->segment(3);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$text = "SELECT * FROM hasil a JOIN pasien b ON a.kode_barcode=b.kode_barcode $where";		
			$tot_hal = $this->app_model->manualQuery($text);		
			
			$d['tot_hal'] = $tot_hal->num_rows();
			
			$config['base_url'] = site_url() . '/hasiltest/index/';
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
			

			$text = "SELECT * FROM hasil a JOIN pasien b ON a.kode_barcode=b.kode_barcode $where 
					ORDER BY kode_periksa ASC 
					LIMIT $limit OFFSET $offset";
			$d['data'] = $this->app_model->manualQuery($text);
			
			$pesan1 = "SELECT * FROM antrian WHERE status ='1'";
			$d['pesan1'] = $this->app_model->manualQuery($pesan1);
			
			$d['CountBooking']= $this->app_model->CountAntrian();
			$d['content'] = $this->load->view('hasiltest/view', $d, true);		
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
				

			$d['judul']="Tambah Hasil Pemeriksaan Pasien Laboratorium";
			
			$d['kode_periksa']	= '';
			
			$text = "SELECT * FROM diagnosa";
			$d['l_diagnosa'] = $this->app_model->manualQuery($text);
			
			$pesan1 = "SELECT * FROM antrian WHERE status=1";
			$d['pesan1'] = $this->app_model->manualQuery($pesan1);
			
			$d['CountBooking']= $this->app_model->CountAntrian();
			$d['content'] = $this->load->view('hasiltest/form', $d, true);		
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
			
			
			$d['judul'] = "Edit Hasil Pemeriksaan Pasien Laboratorium";
			
			$text = "SELECT * FROM diagnosa";
			$d['l_diagnosa'] = $this->app_model->manualQuery($text);
			
			$tgl	= date('d-m-Y');
			
			$id = $this->uri->segment(3);
			$text = "SELECT * FROM hasil a JOIN d_hasil b ON a.kode_periksa=b.kode_periksa WHERE a.kode_periksa='$id'";
			$data = $this->app_model->manualQuery($text);
			if($data->num_rows() > 0){
				foreach($data->result() as $db){
					$d['kode_periksa']		= $id;
					$d['tgl_periksa']		= $this->app_model->tgl_str($db->tgl_periksa);
					$d['pemeriksa']			= $db->id_dokter;
					$d['kode_barcode']		= $db->kode_barcode;
					$d['jenis_pemeriksaan']	= $db->id_diagnosa;
					
				}
			}else{
					$d['kode_periksa']		= $id;
					$d['tgl_periksa']		= $tgl;
					$d['pemeriksa']			= '';
					$d['kode_barcode']		= '';
					$d['jenis_pemeriksaan']	= '';
			}
			
			$pesan1 = "SELECT * FROM antrian WHERE status=1";
			$d['pesan1'] = $this->app_model->manualQuery($pesan1);
			
			$d['CountBooking']= $this->app_model->CountAntrian();
			$d['content'] = $this->load->view('hasiltest/form', $d, true);		
			$this->load->view('home',$d);
		}else{
			header('location:'.base_url());
		}
	}
	
	public function hapus()
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){			
			$id = $this->uri->segment(3);
			$this->app_model->manualQuery("DELETE FROM hasil a JOIN d_hasil b ON a.kode_periksa=b.kode_periksa WHERE kode_periksa='$id'");
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/hasiltest'>";			
		}else{
			header('location:'.base_url());
		}
	}
	
	public function simpan()
	{
		
		$cek = $this->session->userdata('level')==01 || $this->session->userdata('level')==02;
		if(!empty($cek)){
			date_default_timezone_set('Asia/Jakarta');
				
			$up['kode_periksa']			= $this->input->post('kode_periksa');
			$up['tgl_periksa']			= $this->app_model->tgl_sql($this->input->post('tgl_periksa'));
			$up['id_dokter']			= $this->input->post('id_dokter');
			$up['kode_barcode']			= $this->input->post('kode_barcode');
			
			$ud['kode_periksa']			= $this->input->post('kode_periksa');
			$ud['pasien']				= $this->input->post('nama_pasien'); 
			$ud['alamat']				= $this->input->post('alamat');
			$ud['tgl_lahir']			= $this->app_model->tgl_sql($this->input->post('tgl_lahir'));
			$ud['gender']				= $this->input->post('gender');
			$ud['id_diagnosa']			= $this->input->post('jenis_pemeriksaan');
			$ud['hasil']				= $this->input->post('hasilperiksa');
			$ud['catatan']				= $this->input->post('catatan');
			$ud['tarif']				= $this->input->post('tarif');
			
			$id['kode_periksa']			= $this->input->post('kode_periksa');
				
			$id_d['kode_periksa']   	= $this->input->post('kode_periksa');
			$id_d['id_diagnosa']  		= $this->input->post('jenis_pemeriksaan');
				
			$data = $this->app_model->getSelectedData("hasil",$id);
				if($data->num_rows()>0){
					$this->app_model->updateData("hasil",$up,$id);
						$data = $this->app_model->getSelectedData("d_hasil",$id_d);
						if($data->num_rows()>0){
							$this->app_model->updateData("d_hasil",$ud,$id_d);
						}else{
							$this->app_model->insertData("d_hasil",$ud);
						}
					echo 'Update data Sukses';
				}else{
					$this->app_model->insertData("hasil",$up);
					$this->app_model->insertData("d_hasil",$ud);
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
			$text = "SELECT a.kode_periksa,a.tgl_periksa,a.kode_barcode,a.id_dokter,
					b.pasien,b.alamat,b.tgl_lahir,b.gender,b.hasil,b.catatan,
					c.nama_dokter,
					d.nama_diagnosa,d.tarif
					FROM hasil as a 
					JOIN d_hasil as b
					ON a.kode_periksa=b.kode_periksa
					JOIN dokter as c
					ON a.id_dokter=c.id_dokter
					JOIN diagnosa as d
					ON b.id_diagnosa=d.id_diagnosa
					WHERE a.kode_periksa='$id'";
			$d['data']= $this->app_model->manualQuery($text);

			$this->load->view('hasiltest/detail',$d);
		}else{
			header('location:'.base_url());
		}
	}
	
	public function cetak()
	{
		$cek = $this->session->userdata('level')==01 || $this->session->userdata('level')==02 || $this->session->userdata('level')==03;
		if(!empty($cek)){
			
			$config=$this->app_model->Get_Config();
			
			$d['prg']= $config['author'];
			$d['web_prg']= $config['website'];
			
			$d['nama_program']= $config['aplikasi'];
			$d['instansi']= $config['instansi'];
			$d['usaha']= $config['usaha'];
			$d['alamat_instansi']= $config['alamat'];
			
			
			$d['judul'] = "Hasil Pemeriksaan Laboratorium";
			
			$id = $this->uri->segment(3);
			$text = "SELECT * FROM hasil a JOIN d_hasil b ON a.kode_periksa=b.kode_periksa JOIN dokter c ON a.id_dokter=c.id_dokter WHERE a.kode_periksa='$id'";
			$data = $this->app_model->manualQuery($text);
			if($data->num_rows() > 0){
				foreach($data->result() as $db){
					$d['kode_periksa']	= $id;
					$d['tgl_periksa']	= $this->app_model->tgl_indo($db->tgl_periksa);
					$d['kode_barcode']	= $db->kode_barcode;
					$d['nama']			= $db->pasien;
					$d['gender']		= $db->gender;
					$d['alamat']		= $db->alamat;
					$d['dokter']		= $db->nama_dokter;
				}
			}else{
					$d['kode_periksa']	=$id;
					$d['tgl_periksa']	='';
					$d['kode_barcode']	='';
					$d['nama']			='';
					$d['gender']		='';
					$d['alamat']		='';
					$d['dokter']		='';
			}
			
			$text = "SELECT a.kode_periksa,a.tgl_periksa,a.kode_barcode,a.id_dokter,
					b.pasien,b.alamat,b.tgl_lahir,b.gender,b.hasil,b.catatan,b.tarif,
					c.nama_dokter,
					d.nama_diagnosa
					FROM hasil as a 
					JOIN d_hasil as b
					ON a.kode_periksa=b.kode_periksa
					JOIN dokter as c
					ON a.id_dokter=c.id_dokter
					JOIN diagnosa as d
					ON b.id_diagnosa=d.id_diagnosa
					WHERE a.kode_periksa='$id'";
			$d['data']= $this->app_model->manualQuery($text);
			$this->load->view('hasiltest/cetak',$d);
		}else{
			header('location:'.base_url());
		}
	}
	public function cetakfaktur()
	{
		$cek = $this->session->userdata('level')==03;
		if(!empty($cek)){
			
			$config=$this->app_model->Get_Config();
			
			$d['prg']= $config['author'];
			$d['web_prg']= $config['website'];
			
			$d['nama_program']= $config['aplikasi'];
			$d['instansi']= $config['instansi'];
			$d['usaha']= $config['usaha'];
			$d['alamat_instansi']= $config['alamat'];
			
			
			$d['judul'] = "Cetak Faktur Hasil Pemeriksaan Laboratorium";
			
			$id = $this->uri->segment(3);
			$text = "SELECT * FROM hasil a JOIN d_hasil b ON a.kode_periksa=b.kode_periksa JOIN dokter c ON a.id_dokter=c.id_dokter WHERE a.kode_periksa='$id'";
			$data = $this->app_model->manualQuery($text);
			if($data->num_rows() > 0){
				foreach($data->result() as $db){
					$d['kode_periksa']	= $id;
					$d['tgl_periksa']	= $this->app_model->tgl_indo($db->tgl_periksa);
					$d['kode_barcode']	= $db->kode_barcode;
					$d['nama']			= $db->pasien;
					$d['gender']		= $db->gender;
					$d['alamat']		= $db->alamat;
					$d['dokter']		= $db->nama_dokter;
				}
			}else{
					$d['kode_periksa']	=$id;
					$d['tgl_periksa']	='';
					$d['kode_barcode']	='';
					$d['nama']			='';
					$d['gender']		='';
					$d['alamat']		='';
					$d['dokter']		='';
			}
			
			$text = "SELECT a.kode_periksa,a.tgl_periksa,a.kode_barcode,a.id_dokter,
					b.pasien,b.alamat,b.tgl_lahir,b.gender,b.hasil,b.catatan,b.tarif,
					c.nama_dokter,
					d.nama_diagnosa
					FROM hasil as a 
					JOIN d_hasil as b
					ON a.kode_periksa=b.kode_periksa
					JOIN dokter as c
					ON a.id_dokter=c.id_dokter
					JOIN diagnosa as d
					ON b.id_diagnosa=d.id_diagnosa
					WHERE a.kode_periksa='$id'";
			$d['data']= $this->app_model->manualQuery($text);
			$this->load->view('hasiltest/cetakfaktur',$d);
		}else{
			header('location:'.base_url());
		}
	}
	
}