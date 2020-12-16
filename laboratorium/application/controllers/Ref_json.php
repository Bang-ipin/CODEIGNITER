<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ref_json extends CI_Controller {

	/**
	 * @author : Deddy Rusdiansyah,S.Kom
	 * @web : http://deddyrusdiansyah.blogspot.com
	 * @keterangan : Controller untuk halaman profil
	 **/
	
	public function InfoPasien()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$kode = $this->input->post('kode_barcode');
			$text = "SELECT * FROM pasien WHERE kode_barcode='$kode'";
			$tabel = $this->app_model->manualQuery($text);
			$row = $tabel->num_rows();
			if($row>0){
				foreach($tabel->result() as $t){
					$data['kode_barcode']	 = $t->kode_barcode;
					echo json_encode($data);
				}
			}else{
					$data['kode_barcode'] 		 = '';
				echo json_encode($data);
			}
		}else{
			header('location:'.base_url());
		}
	}
	
	public function InfoAntrian()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$kode = $this->input->post('kode');
			$text = "SELECT * FROM antrian a JOIN pasien b on a.kode_barcode=b.kode_barcode WHERE kode_barcode='$kode'";
			$tabel = $this->app_model->manualQuery($text);
			$row = $tabel->num_rows();
			if($row>0){
				foreach($tabel->result() as $t){
					$data['kode_barcode']	= $t->kode_barcode;
					$data['tgl_antrian']	= $this->app_model->tgl_str($t->tgl_antrian);
					$data['pasien']		   	= $t->nama;
					$data['alamat']		  	= $t->alamat;
					$data['gender'] 	 	= $t->gender;
					$data['tempat_lahir'] 	= $t->tempat_lahir;
					$data['tgl_lahir']		= $this->app_model->tgl_str($t->tgl_lahir);
					$data['telp']		 	= $t->telp;
					$data['status']		 	= $t->status;
					echo json_encode($data);
				}
			}else{
					$data['kode_barcode']	= '';
					$data['tgl_antrian']	= '';
					$data['pasien']		   	= '';
					$data['alamat']		  	= '';
					$data['gender'] 	 	= '';
					$data['tempat_lahir'] 	= '';
					$data['tgl_lahir']		= '';
					$data['telp']		 	= '';
					$data['status']		 	= '';
				echo json_encode($data);
			}
		}else{
			header('location:'.base_url());
		}
	}
	
	public function InfoHasilLab()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$kode = $this->input->post('kode');
			$text = "SELECT * FROM periksa a JOIN dokter b on a.id_dokter=b.id_dokter JOIN pasien c ON a.kode_barcode=c.kode_barcode WHERE kode_periksa='$kode'";
			$tabel = $this->app_model->manualQuery($text);
			$row = $tabel->num_rows();
			if($row>0){
				foreach($tabel->result() as $t){
					if($t->gender==0){
						$sex ="Perempuan";
					}else{
						$sex ="Laki-Laki";
					}
					
					$data['kode_periksa']	= $t->kode_periksa;
					$data['kode_barcode']	= $t->kode_barcode;
					$data['tgl_periksa']	= $this->app_model->tgl_str($t->tgl_periksa);
					$data['id_dokter']		= $t->id_dokter;
					$data['dokter']			= $t->nama_dokter;
					$data['nama_pasien']	= $t->nama;
					$data['alamat']			= $t->alamat;
					$data['tgl_lahir']		= $this->app_model->tgl_str($t->tgl_lahir);
					$data['gender']			= $sex;
					echo json_encode($data);
				}
			}else{
					$data['kode_periksa']	= '';
					$data['kode_barcode']	= '';
					$data['tgl_periksa']	= '';
					$data['id_dokter']		= '';
					$data['dokter']			= '';
					$data['nama_pasien']	= '';
					$data['alamat']			= '';
					$data['tgl_lahir']		= '';
					$data['gender']			= '';
				echo json_encode($data);
			}
		}else{
			header('location:'.base_url());
		}
	}
	
	public function InfoTarifDiagnosa()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$kode = $this->input->post('kode');
			$text = "SELECT * FROM diagnosa WHERE id_diagnosa='$kode'";
			$tabel = $this->app_model->manualQuery($text);
			$row = $tabel->num_rows();
			if($row>0){
				foreach($tabel->result() as $t){
					$data['tarif']		= $t->tarif;
					echo json_encode($data);
				}
			}else{
					$data['tarif']		= '';
				echo json_encode($data);
			}
		}else{
			header('location:'.base_url());
		}
	}
	
	public function DataHasilLab(){
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$cari= $this->input->post('cari');
			if(empty($cari)){
				$text = "SELECT * FROM periksa a JOIN dokter b ON a.id_dokter=b.id_dokter JOIN pasien c ON a.kode_barcode=c.kode_barcode";
			}else{
				$text = "SELECT * FROM periksa a JOIN dokter b ON a.id_dokter=b.id_dokter JOIN pasien c ON a.kode_barcode=c.kode_barcode WHERE kode_periksa LIKE '%$cari%' ";
			}
			$d['data'] = $this->app_model->manualQuery($text);
			
			$this->load->view('data_hasillab',$d);
		}else{
			header('location:'.site_url());
		}
	}
	public function DataPasien(){
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$cari= $this->input->post('cari');
			if(empty($cari)){
				$text = "SELECT * FROM pasien";
			}else{
				$text = "SELECT * FROM pasien WHERE kode_barcode LIKE '%$cari%' ";
			}
			$d['data'] = $this->app_model->manualQuery($text);
			
			$this->load->view('data_pasien',$d);
		}else{
			header('location:'.site_url());
		}
	}
	public function DataAntrian(){
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$cari= $this->input->post('cari');
			if(empty($cari)){
				$text = "SELECT * FROM antrian a JOIN pasien b on a.kode_barcode=b.kode_barcode WHERE status=1 AND DATE(tgl_antrian)=CURDATE()";
			}else{
				$text = "SELECT * FROM antrian a JOIN pasien b on a.kode_barcode=b.kode_barcode WHERE kode_barcode LIKE '%$cari%' ";
			}
			$d['data'] = $this->app_model->manualQuery($text);
			
			$this->load->view('data_pasien',$d);
		}else{
			header('location:'.site_url());
		}
	}
	
	public function LihatAntrian(){
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$cari= $this->input->post('cari');
			if(empty($cari)){
				$text = "SELECT * FROM antrian a JOIN pasien b on a.kode_barcode=b.kode_barcode ORDER BY no_antrian ASC";
			}else{
				$text = "SELECT * FROM antrian a JOIN pasien b on a.kode_barcode=b.kode_barcode WHERE a.kode_barcode LIKE '%$cari%' ORDER BY no_antrian ASC";
			}
			$d['data'] = $this->app_model->manualQuery($text);
			
			$this->load->view('lihat_antrian',$d);
		}else{
			header('location:'.site_url());
		}
	}
	
	public function LihatHistoryAntrian(){
		$cek = $this->session->userdata('logged_in');
		$limit=10;
		if(!empty($cek)){
			$cari= $this->input->post('cari');
			if(empty($cari)){
				$text = "SELECT * FROM h_antrian a JOIN pasien b on a.kode_barcode=b.kode_barcode ORDER BY no ASC ";
			}else{
				$text = "SELECT * FROM h_antrian a JOIN pasien b on a.kode_barcode=b.kode_barcode WHERE kode_barcode LIKE '%$cari%' ORDER BY no ASC";
			}
			$d['data'] = $this->app_model->manualQuery($text);
			
			$this->load->view('lihat_history_antrian',$d);
		}else{
			header('location:'.site_url());
		}
	}
	
	public function KosongkanHistoryAntrian(){
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$text = "TRUNCATE h_antrian";
			$d['data'] = $this->app_model->manualQuery($text);
			$this->load->view('lihat_history_antrian',$d);
		}else{
			header('location:'.site_url());
		}
	}
	
	
}

/* End of file profil.php */
/* Location: ./application/controllers/profil.php */