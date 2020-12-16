<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App_Model extends CI_Model {
	public function getAllData($table)
	{
		return $this->db->get($table);
	}
	
	public function getAllDataLimited($table,$limit,$offset)
	{
		return $this->db->get($table, $limit, $offset);
	}
	
	public function getSelectedDataLimited($table,$data,$limit,$offset)
	{
		return $this->db->get_where($table, $data, $limit, $offset);
	}
		
	//select table
	public function getSelectedData($table,$data)
	{
		return $this->db->get_where($table, $data);
	}
	
	//update table
	function updateData($table,$data,$field_key)
	{
		$this->db->update($table,$data,$field_key);
	}
	function deleteData($table,$data)
	{
		$this->db->delete($table,$data);
	}
	
	function insertData($table,$data)
	{
		$this->db->insert($table,$data);
	}
	
	//Query manual
	function manualQuery($q)
	{
		return $this->db->query($q);
	}
		public function add_pasien($data){		return $this->db->insert('pasien',$data);	}	public function add_antrian($data){		return $this->db->insert('antrian',$data);	}
	public function CariLevel($id){
		$t = "SELECT * FROM level WHERE id_level='$id'";
		$d = $this->app_model->manualQuery($t);
		$r = $d->num_rows();
		if($r>0){
			foreach($d->result() as $h){
				$hasil = $h->level;
			}
		}else{
			$hasil = '';
		}
		return $hasil;
	}		public function Tempo($id){
         date_default_timezone_set('Asia/Jakarta');
		$t = "SELECT *,DATEDIFF(DATE_ADD(tempo, INTERVAL 0 DAY), CURDATE()) as selisih FROM antrian WHERE kode_barcode='$id'";
		$d = $this->app_model->manualQuery($t);
		$r = $d->num_rows();
		if($r>0){
			foreach($d->result() as $h){
				$hasil = $h->selisih;
			}
		}else{
			$hasil = 0;
		}
		return $hasil;
	}	public function Grafik($bln,$thn){
		$t = "SELECT month(a.tgljual) as bln, year(a.tgljual) as th, count(*) as jml 
			FROM h_jual as a
			JOIN d_jual as b
			ON a.kodejual=b.kodejual 
			WHERE month(a.tgljual)='$bln' AND year(a.tgljual)='$thn'
			GROUP BY month(a.tgljual),year(a.tgljual)";
		$d = $this->app_model->manualQuery($t);
		$r = $d->num_rows();
		if($r>0){
			foreach($d->result() as $h){
				$hasil = $h->jml;
			}
		}else{
			$hasil = 0;
		}
		return $hasil;
	}
	public function CariNamaPengguna(){
		$id = $this->session->userdata('username');
		$t = "SELECT * FROM admins WHERE username='$id'";
		$d = $this->app_model->manualQuery($t);
		$r = $d->num_rows();
		if($r>0){
			foreach($d->result() as $h){
				$hasil = $h->nama_lengkap;
			}
		}else{
			$hasil = '';
		}
		return $hasil;
	}
	public function CariFotoPengguna(){
		$id = $this->session->userdata('username');
		$t = "SELECT * FROM admins WHERE username='$id'";
		$d = $this->app_model->manualQuery($t);
		$r = $d->num_rows();
		if($r>0){
			foreach($d->result() as $h){
				$hasil = $h->foto;
			}
		}else{
			$hasil = '';
		}
		return $hasil;
	}	public function TotalAntrian($tgl1,$tgl2){
		$t = "SELECT sum(a.jmlbooking * a.harga_jual) as jml 
				FROM booking as a
				JOIN barang as b
				ON a.kode_barang=b.kode_barang 
				WHERE b.tglbooking BETWEEN '$tgl1' AND '$tgl2'";
		$d = $this->app_model->manualQuery($t);
		$r = $d->num_rows();
		if($r>0){
			foreach($d->result() as $h){
				$hasil = $h->jml;
			}
		}else{
			$hasil = 0;
		}
		return $hasil;
	}	public function MaxKodePeriksa(){		date_default_timezone_set('Asia/Jakarta');        $bln = date('m');		$th = date('y');		$text = "SELECT max(kode_periksa) as no FROM periksa";		$data = $this->app_model->manualQuery($text);		if($data->num_rows() > 0 ){			foreach($data->result() as $t){				$no = $t->no; 				$tmp = ((int) substr($no,2,5))+1;				$hasil = 'LB'.sprintf("%05s", $tmp);			}		}else{			$hasil = 'LB'.'00001';		}		return $hasil;	}
	public function no_registrasi()    {        $q = $this->db->query("select MAX(RIGHT(kode_barcode,2)) as no_registrasi from pasien WHERE DATE(tgl_register)=CURDATE()");        $kd = "";        if($q->num_rows()>0)        {            foreach($q->result() as $k)            {                $tmp = ((int)$k->no_registrasi)+1;                $kd = sprintf("%02s", $tmp);            }        }        else        {            $kd = "01";        }		date_default_timezone_set('Asia/Jakarta');		$acak = substr(rand(),0,6);		return "BR".$acak.$kd;		    }	function PasienStatus($id,$status) {		$this->db->set('verifikasi', $status);		$this->db->where('kode_barcode',$id);		$query = $this->db->update('pasien');	}	function BookingStatus($id,$status) {		$this->db->set('status', $status);		$this->db->where('kode_barcode',$id);		$query = $this->db->update('antrian');	}	function BookingStatusAntrian($id,$status) {		$this->db->set('status', $status);		$this->db->where('kode_barcode',$id);		$query = $this->db->update('h_antrian');	}	public function no_antrian()    {        $q = $this->db->query("select MAX(RIGHT(no_antrian,3)) as no_antrian from antrian WHERE DATE(tgl_antrian)=CURDATE()");        $kd = "";        if($q->num_rows()>0)        {            foreach($q->result() as $k)            {                $tmp = ((int)$k->no_antrian)+1;                $kd = sprintf("%03s", $tmp);            }        }        else        {            $kd = "001";        }		date_default_timezone_set('Asia/Jakarta');		return $kd;		    }	function cek_antrian($barcode){		return $this->db->select('kode_barcode')						->where('kode_barcode',strtoupper($barcode))						->limit(1)						->get('antrian');	}	function cek_barcode($barcode){		return $this->db->select('kode_barcode')						->where('kode_barcode',strtoupper($barcode))						->where('verifikasi',1)						->get('pasien');	}	
	//Konversi tanggal	public function tgl_sql($date){
                date_default_timezone_set('Asia/Jakarta');
		$exp = explode('-',$date);
		if(count($exp) == 3) {
			$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
		}
		return $date;
	}
	public function tgl_str($date){
                date_default_timezone_set('Asia/Jakarta');
		$exp = explode('-',$date);
		if(count($exp) == 3) {
			$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
		}
		return $date;
	}
	
	public function ambilTgl($tgl){
                date_default_timezone_set('Asia/Jakarta');
		$exp = explode('-',$tgl);
		$tgl = $exp[2];
		return $tgl;
	}
	
	public function ambilBln($tgl){
                 date_default_timezone_set('Asia/Jakarta');
		$exp = explode('-',$tgl);
		$tgl = $exp[1];
		$bln = $this->app_model->getBulan($tgl);
		$hasil = substr($bln,0,3);
		return $hasil;
	}
	
	public function tgl_indo($tgl){
                        date_default_timezone_set('Asia/Jakarta');
			$jam = substr($tgl,11,10);
			$tgl = substr($tgl,0,10);
			$tanggal = substr($tgl,8,2);
			$bulan = $this->app_model->getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.' '.$bulan.' '.$tahun.' '.$jam;		 
	}	

	public function getBulan($bln){
		switch ($bln){
			case 1: 
				return "Januari";
				break;
			case 2:
				return "Februari";
				break;
			case 3:
				return "Maret";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Juni";
				break;
			case 7:
				return "Juli";
				break;
			case 8:
				return "Agustus";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "Oktober";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "Desember";
				break;
		}
	} 
	
	public function hari_ini($hari){
		date_default_timezone_set('Asia/Jakarta'); // PHP 6 mengharuskan penyebutan timezone.
		$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
		//$hari = date("w");
		$hari_ini = $seminggu[$hari];
		return $hari_ini;
	}
	
	//query login
	public function getLoginData($usr,$psw)
	{
		$u = $this->db->escape_str($usr);
		$p = md5($this->db->escape_str($psw));
		$q_cek_login = $this->db->get_where('admins', array('username' => $u, 'password' => $p));
		if(count($q_cek_login->result())>0)
		{
			foreach($q_cek_login->result() as $qck)
			{
					foreach($q_cek_login->result() as $qad)
					{
						$sess_data['logged_in'] = 'aingLoginYeuh';
						$sess_data['username'] = $qad->username;
						$sess_data['nama_lengkap'] = $qad->nama_lengkap;
						$sess_data['foto'] = $qad->foto;
						$sess_data['level'] = $qad->level;
						$this->session->set_userdata($sess_data);
					}
					header('location:'.base_url().'index.php/home');
			}
		}
		else
		{
			$this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
			header('location:'.base_url().'index.php/login');
		}
	}
	
	//query login
	public function getLogin($usr)
	{
		$u =$this->db->escape_str($usr);
		return $this->db->get_where('admins', array('username' => $u));
	}
	
	
	function Get_Config()
	{
		$data = array();
		$this->db->order_by("id", "DESC");
		$this->db->select("id, instansi,telp,alamat,email,website,aplikasi,usaha,author");
		$this->db->limit(1);
		$q = $this->db->get('config');
		  if($q->num_rows() > 0)
		  {
		  	$data = $q->row_array();
		  }
		$q->free_result();
		return $data;
	}
	
	function UpdateConfig($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('config', $data);
	}
	
	function dd_type($table,$field){
		$query= "SHOW COLUMNS FROM {$table} LIKE '{$field}' ";
		$row=$this->db->query($query)->row()->Type;
		$regex= "/'(.*?)'/";
		$enums['']='---PILIH---';
		preg_match_all($regex,$row,$enum_array);
		$enum_field=$enum_array[1];
			foreach($enum_field as $key =>$value){
				$enums[$value]= $value;
				}
		return $enums;
	}
	function dd_keterangan(){
	$dd['1']= 'Lunas';
	$dd['2']= 'Netral';
	$dd['3']= 'Cancel';
	return $dd;
	}		function dd_gender(){
	$dd['1']= 'Laki-Laki';
	$dd['0']= 'Perempuan';
	return $dd;
	}	function dd_status_pasien(){
	$dd['1']= 'Umum';
	$dd['2']= 'Home Care';
	return $dd;
	}
		public function CountAntrian(){
		$t = "SELECT count(*) as jml FROM antrian  WHERE status='1'";
		$d = $this->app_model->manualQuery($t);
		$r = $d->num_rows();
		if($r>0){
			foreach($d->result() as $h){
				$hasil = $h->jml;
			}
		}else{
			$hasil = 0;
		}
		return $hasil;
	}
}
	
/* End of file app_model.php */
/* Location: ./application/models/app_model.php */