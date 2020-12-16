<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('text');
		$this->load->library('Indonesia_library');
		
	}
	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$cari 		= $this->input->post('txt_cari');
			$nama 		= $this->input->post('nama');
			$barcode 	= $this->input->post('barcode');
			$telepon 	= $this->input->post('telepon');
			
			$where = "WHERE kode_barcode <>''";
			if(!empty($barcode)){
				$where .= " AND kode_barcode LIKE '%$barcode%'";
			}
			if(!empty($nama)){
				$where .= " AND nama LIKE '%$nama%'";
			}
			if(!empty($telepon)){
				$where .= " AND telp LIKE '%$telepon%'";
			}
			
			$config=$this->app_model->Get_Config();
		
			$d['prg']= $config['author'];
			$d['web_prg']= $config['website'];
			
			$d['nama_program']= $config['aplikasi'];
			$d['instansi']= $config['instansi'];
			$d['usaha']= $config['usaha'];
			$d['alamat_instansi']= $config['alamat'];
				
			
			$d['judul']="Data Pasien";
			
			//paging
			$page=$this->uri->segment(3);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$text = "SELECT * FROM pasien $where ";		
			$tot_hal = $this->app_model->manualQuery($text);		
			
			$d['tot_hal'] = $tot_hal->num_rows();
			
			$config['base_url'] = site_url() . '/pasien/index/';
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
			

			$text = "SELECT * FROM pasien $where 
					ORDER BY id_pasien ASC 
					LIMIT $limit OFFSET $offset";
			$d['data'] = $this->app_model->manualQuery($text);
			
			$pesan1 = "SELECT * FROM antrian WHERE status ='1'";
			$d['pesan1'] = $this->app_model->manualQuery($pesan1);
			
			
			$d['CountBooking']= $this->app_model->CountAntrian();
			$d['content'] = $this->load->view('pasien/view', $d, true);		
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
			
			$d['judul']="Data Pasien";
			
			$kode_barcode	= $this->app_model->no_registrasi();
			//$tgl			= date('d-m-Y');
			
			$d['kode_barcode']	=$kode_barcode;
			$d['nama']			='';
			$d['alamat']		='';
			$d['gender']		='';
			$d['stt']			='';
			$d['tempat_lahir']	='';
			$d['tgl_lahir']		='';
			$d['telp']			='';
			
			$pesan1 = "SELECT * FROM antrian WHERE status ='1'";
			$d['pesan1'] = $this->app_model->manualQuery($pesan1);
		
			$d['attr']		="style='width:100px;height:25px'";
			$d['l_gender']	=$this->app_model->dd_gender();
			$d['l_stt']		=$this->app_model->dd_status_pasien();
			$d['CountBooking']= $this->app_model->CountAntrian();
			$d['content'] = $this->load->view('pasien/form', $d, true);		
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
				
			
			$d['judul'] 	= "Data Pasien";
			$d['attr']		="style='width:100px;height:25px'";
			$d['l_gender']	=$this->app_model->dd_gender();
			$d['l_stt']		=$this->app_model->dd_status_pasien();
			
			$id = $this->uri->segment(3);
			$text = "SELECT * FROM pasien WHERE kode_barcode='$id'";
			$data = $this->app_model->manualQuery($text);
			if($data->num_rows() > 0){
				foreach($data->result() as $db){
					$d['kode_barcode']	=$id;
					$d['nama']			=$db->nama;
					$d['alamat']		=$db->alamat;
					$d['tempat_lahir']	=$db->tempat_lahir;
					$d['tgl_lahir']		=$this->app_model->tgl_str($db->tgl_lahir);
					$d['gender']		=$db->gender;
					$d['stt']			=$db->status_pasien;
					$d['telp']			=$db->telp;
				}
			}else{
					$d['kode_barcode']	=$id;
					$d['nama']			='';
					$d['alamat']		='';
					$d['tempat_lahir']	='';
					$d['tgl_lahir']		='';
					$d['gender']		='';
					$d['stt']			='';
					$d['telp']			='';
				}
			$pesan1 = "SELECT * FROM antrian WHERE status ='1'";
			$d['pesan1'] = $this->app_model->manualQuery($pesan1);
			
			$d['CountBooking']= $this->app_model->CountAntrian();			
			$d['content'] = $this->load->view('pasien/form', $d, true);		
			$this->load->view('home',$d);
		}else{
			header('location:'.base_url());
		}
	}
	public function status($id,$status) {
		
		$cek = $this->session->userdata('level')==01 || $this->session->userdata('level')==02;
		if(!empty($cek)){
			
			$this->app_model->PasienStatus($id,$status);
			$this->session->set_flashdata('SUCCESSMSG','Status berhasil diperbaharui!');
			redirect(site_url('pasien'));
		}
		else{
			header('location:'.base_url());
		}
	}
	public function hapus()
	{
		$cek = $this->session->userdata('level')==01 || $this->session->userdata('level')==02;
		if(!empty($cek)){			
			$id = $this->uri->segment(3);
			$this->app_model->manualQuery("DELETE FROM pasien WHERE kode_barcode='$id'");
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/pasien'>";			
		}else{
			header('location:'.base_url());
		}
	}
	
	public function simpan()
	{
		
		$cek = $this->session->userdata('level')==01 || $this->session->userdata('level')==02;
		if(!empty($cek)){
				
				$up['kode_barcode']	=$this->input->post('kode_barcode');
				$up['nama']			=$this->input->post('nama');
				$up['alamat']		=$this->input->post('alamat');
				$up['tempat_lahir']	=$this->input->post('tempat_lahir');
				$up['tgl_lahir']	=$this->app_model->tgl_sql($this->input->post('tgl_lahir'));
				$up['gender']		=$this->input->post('gender');
				$up['status_pasien']=$this->input->post('stt');
				$up['telp']			=$this->input->post('telp');
				$up['tgl_register']	=$this->indonesia_library->format_tanggal_jam(date('Y-m-d H:i:s'));
				
				$id['kode_barcode']=$this->input->post('kode_barcode');
				
				$data = $this->app_model->getSelectedData("pasien",$id);
				if($data->num_rows()>0){
					$this->app_model->updateData("pasien",$up,$id);
					echo 'Update data Sukses';
				}else{
					$this->app_model->insertData("pasien",$up);
					echo 'Simpan data Sukses';		
				}
		}else{
				header('location:'.base_url());
		}
	
	}
	
	public function save()
	{
		date_default_timezone_set('Asia/Jakarta');
		$date= $this->input->post('tanggal_lahir');
		$data=array(
			'nama'			=>$this->input->post('nama_pasien',null,TRUE),
			'alamat'		=>$this->input->post('alamat',null,TRUE),
			'tempat_lahir'	=>$this->input->post('tempat_lahir',null,TRUE),
			'tgl_lahir'		=>$this->app_model->tgl_sql($date),
			'tgl_register'	=>$this->indonesia_library->format_tanggal_jam(date('Y-m-d H:i:s')),
			'gender'		=>$this->input->post('gender',null,true),
			'status_pasien'	=>1,
			'verifikasi'	=>0,
			'telp'			=>$this->input->post('telp',null,true),
			'kode_barcode'	=>$this->input->post('registrasi',null,true),
		);
		$this->app_model->add_pasien($data);
		$this->session->set_flashdata('SUCCESSMSG','Berhasil mendaftar, Tunggu Verifikasi Operator');
		redirect(site_url('antrian'));
	}
	
	public function cetak()
	{
		$cek = $this->session->userdata('level')==01 || $this->session->userdata('level')==02;
		if(!empty($cek)){
			
			$config=$this->app_model->Get_Config();
			
			$d['prg']				= $config['author'];
			$d['web_prg']			= $config['website'];
			
			$d['nama_program']		= $config['aplikasi'];
			$d['instansi']			= $config['instansi'];
			$d['usaha']				= $config['usaha'];
			$d['alamat_instansi']	= $config['alamat'];
			
			
			$d['judul'] 			= "Kartu Pasien";
			
			$id = $this->uri->segment(3);
			
			$text = "SELECT * FROM pasien WHERE kode_barcode='$id'";
			$data = $this->app_model->manualQuery($text);
			if($data->num_rows() > 0){
				foreach($data->result() as $db){
					if($db->gender==1){
						$sex="Laki-Laki";
					}
					else{
						$sex="Perempuan";
					}
					$d['kode_barcode']	= $id;
					$d['nama']			= $db->nama;
					$d['alamat']		= $db->alamat;
					$d['tempat_lahir']	= $db->tempat_lahir;
					$d['tgl_lahir']		= $this->app_model->tgl_indo($db->tgl_lahir);
					$d['tgl_register']	= $this->app_model->tgl_indo($db->tgl_register);
					$d['gender']		= $sex;
					$d['telp']			= $db->telp;
				}
			}else{
					$d['kode_barcode']	= $id;
					$d['nama']			= '';
					$d['alamat']		= '';
					$d['tempat_lahir']	= '';
					$d['tgl_lahir']		= '';
					$d['tgl_register']	= '';
					$d['gender']		= '';
					$d['telp']			= '';
			}
			
			$text = "SELECT kode_barcode,nama,alamat,tempat_lahir,tgl_lahir,gender,telp FROM pasien WHERE kode_barcode='$id'";
			$d['data']= $this->app_model->manualQuery($text);
			$this->load->view('pasien/cetak',$d);
		}else{
			header('location:'.base_url());
		}
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
		$barcode=$this->db->escape_str($this->input->post('kode_barcode'));
		$cek_kode = $this->app_model->cek_barcode($barcode);
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