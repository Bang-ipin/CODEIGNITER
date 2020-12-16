<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Periksa extends CI_Controller {
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
			
			$text = "SELECT * FROM periksa a JOIN pasien b ON a.kode_barcode=b.kode_barcode $where ";		
			$tot_hal = $this->app_model->manualQuery($text);		
			
			$d['tot_hal'] = $tot_hal->num_rows();
			
			$config['base_url'] = site_url() . '/periksa/index/';
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
			

			$text = "SELECT * FROM periksa a JOIN pasien b ON a.kode_barcode=b.kode_barcode $where 
					ORDER BY a.kode_periksa ASC 
					LIMIT $limit OFFSET $offset";
			$d['data'] = $this->app_model->manualQuery($text);
			
			$pesan1 = "SELECT * FROM antrian WHERE status ='1'";
			$d['pesan1'] = $this->app_model->manualQuery($pesan1);
			
			$d['CountBooking']= $this->app_model->CountAntrian();
			$d['content'] = $this->load->view('periksa/view', $d, true);		
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
				

			$d['judul']="Tambah Pemeriksaan Pasien Laboratorium";
			
			$no_antrian		= $this->app_model->no_antrian();
			$kode_periksa	= $this->app_model->MaxKodePeriksa();
			$tgl	= date('d-m-Y');
			
			$d['kode_periksa']		= $kode_periksa;
			$d['no_antrian']		= $no_antrian;
			$d['tgl_periksa']		= $tgl;
			$d['kode_barcode']		= '';
			$d['pemeriksa']			= '';
			$d['jenis_pemeriksaan']	= '';
			
			$text = "SELECT * FROM dokter";
			$d['l_pemeriksa'] = $this->app_model->manualQuery($text);
			
			$text1 = "SELECT * FROM diagnosa";
			$d['l_pemeriksaan'] = $this->app_model->manualQuery($text1);
			
			$pesan1 = "SELECT * FROM antrian WHERE status=1";
			$d['pesan1'] = $this->app_model->manualQuery($pesan1);
			
			$d['CountBooking']= $this->app_model->CountAntrian();
			$d['content'] = $this->load->view('periksa/form', $d, true);		
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
			
			
			$d['judul'] = "Edit Pemeriksaan Pasien Laboratorium";
			
			$text = "SELECT * FROM dokter";
			$d['l_pemeriksa'] = $this->app_model->manualQuery($text);
			
			$text1 = "SELECT * FROM diagnosa";
			$d['l_pemeriksaan'] = $this->app_model->manualQuery($text1);
			
			$tgl	= date('d-m-Y');
			
			$id = $this->uri->segment(3);
			$text = "SELECT * FROM periksa WHERE kode_periksa='$id'";
			$data = $this->app_model->manualQuery($text);
			if($data->num_rows() > 0){
				foreach($data->result() as $db){
					$d['kode_periksa']		= $id;
					$d['tgl_periksa']		= $this->app_model->tgl_str($db->tgl_periksa);
					$d['pemeriksa']			= $db->id_dokter;
					$d['kode_barcode']		= $db->kode_barcode;
					$d['jenis_pemeriksaan']	= $db->jenis_pemeriksaan;
					
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
			$d['content'] = $this->load->view('periksa/form', $d, true);		
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
			$this->app_model->manualQuery("DELETE FROM periksa WHERE kode_periksa='$id'");
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/periksa'>";			
		}else{
			header('location:'.base_url());
		}
	}
	
	public function simpan()
	{
		
		$cek = $this->session->userdata('level')==01 || $this->session->userdata('level')==02;
		if(!empty($cek)){
			date_default_timezone_set('Asia/Jakarta');
			//$date= $this->indonesia_library->format_tanggal_jam(date('Y-m-d H:i:s'));
			$jenis_periksa=$this->input->post('jenis_pemeriksaan',null,true);
			if(!empty($jenis_periksa)){
				$jenis_pemeriksaan = implode(",", $jenis_periksa);
			}else{
				$jenis_pemeriksaan= '';
			}
			$up2['status']			= 2;
			
			$up['kode_periksa']		= $this->input->post('kode_periksa',null,true);
			$up['tgl_periksa']		= $this->app_model->tgl_sql($this->input->post('tgl_periksa'));
			$up['id_dokter']		= $this->input->post('pemeriksa',null,true);
			$up['kode_barcode']		= $this->input->post('kode_barcode',null,true);
			$up['jenis_pemeriksaan']= $jenis_pemeriksaan;
			
			$id['kode_periksa']		= $this->input->post('kode_periksa');
			$id2['kode_barcode']	= $this->input->post('kode_barcode');
			
			$data = $this->app_model->getSelectedData("periksa",$id);
			if($data->num_rows()>0){
				$this->app_model->updateData("periksa",$up,$id);
				echo 'Update data Sukses';
			}else{
				$this->app_model->insertData("periksa",$up);
				$this->app_model->updateData("antrian",$up2,$id2);
				$this->app_model->updateData("h_antrian",$up2,$id2);
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
			$text = "SELECT a.kode_periksa,a.tgl_periksa,a.kode_barcode,
					b.nama,b.alamat,b.tgl_lahir,b.gender,
					c.nama_dokter
					FROM periksa as a 
					JOIN pasien as b
					ON a.kode_barcode=b.kode_barcode
					JOIN dokter as c
					ON a.id_dokter=c.id_dokter
					WHERE a.kode_periksa='$id'";
			$d['data']= $this->app_model->manualQuery($text);

			$this->load->view('periksa/detail',$d);
		}else{
			header('location:'.base_url());
		}
	}
	
}

/* End of file profil.php */
/* Location: ./application/controllers/profil.php */