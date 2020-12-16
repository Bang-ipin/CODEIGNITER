<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_administrator extends CI_Model {
   
	public function __construct() {
		parent::__construct();
			
		}
	public function tgl_sql($date){
		$exp = explode('-',$date);
		if(count($exp) == 3) {
			$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
		}
		return $date;
	}
	public function tgl_str($date){
		$exp = explode('-',$date);
		if(count($exp) == 3) {
			$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
		}
		return $date;
	}
	public function tgl_indo($tgl){

			date_default_timezone_set('Asia/Jakarta');

			$jam = substr($tgl,11,10);

			$tgl = substr($tgl,0,10);

			$tanggal = substr($tgl,8,2);

			$bulan = $this->getBulan(substr($tgl,5,2));

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
	public function  total_admin() {
    return $this->db->get('admin')
					->num_rows();
	}
	public function  total_anggota() {
    return $this->db->get('anggota')
					->num_rows();
	}
	public function  total_buku() {
    return $this->db->get('buku')
					->num_rows();
	}
	public function  total_pengunjung() {
    return $this->db->get('pengunjung')
					->num_rows();
	}
	public function  total_peminjaman() {
    return $this->db->WHERE('status_peminjaman',0)
					->get('peminjaman')
					->num_rows();
	}
	public function  total_booking() {
    return $this->db->get('booking')
					->num_rows();
	}
	public function  total_ebook() {
    return $this->db->get('ebook')
					->num_rows();
	}
	public function  total_pembelajaran() {
    return $this->db->get('materi')
					->num_rows();
	}
	public function get_all_admin(){
	return $this->db->join('usergroup b','a.id_usergroup = b.id_usergroup')
				->order_by('id_admin','asc')
				->get('admin a')
				->result();
	}
		
	
	public function get_admin_by_id($id){
        $this->db->where('id_admin',$id);
        $query = $this->db->get('admin');
        return $query->result();
    }
	public function tambah_admin($data){
		$query= $this->db->insert('admin', $data);
		return $query;
	}
	public function update($id, $data){
		$this->db->where('id_admin', $id);
		$update=$this->db->update('admin',$data);
		return $update;
	}
	
	public function delete($id){
		$this->db->where('id_admin', $id);
		$query= $this->db->delete('admin');
		return $query;
	}
	
	public function get_option(){
	$this->db->select('*');
	$this->db->from('usergroup');
	$query=$this->db->get();
	return $query->result();
	}
	
	public function dd_usergroup(){
	$this->db->order_by('id_usergroup');
	$query=$this->db->get('usergroup');
	$dd['']='---Select level---';
	if($query->num_rows()>0){
		foreach($query->result() as $row){
			$dd[$row->id_usergroup]= $row->usergroup;
			}
		}
		return $dd;
	}
	
	public function dd_status($table,$field){
	$query= "SHOW COLUMNS FROM {$table} LIKE '{$field}' ";
	$row=$this->db->query($query)->row()->Type;
	$regex= "/'(.*?)'/";
	$enums['']='---Pilih---';
	preg_match_all($regex,$row,$enum_array);
	$enum_field=$enum_array[1];
		foreach($enum_field as $key =>$value){
			$enums[$value]= $value;
			}
	return $enums;
	}
	
	public function id_otomatis()
    {
       $this->db->select('RIGHT(admin.id_admin,2) as kode',FALSE);
	   $this->db->order_by('id_admin','DESC');
	   $this->db->limit(1);
	   $query = $this->db->get('admin');
        if($query->num_rows()<>0)
        {
            $data=$query->row();
			$kode=intval($data->kode)+1;
		}else
		{
        $kode=1;
        }$kodemax=str_pad($kode,2,"0",STR_PAD_LEFT);
        $kdjadi =$kodemax;
        return "".$kdjadi;
		
    }

	function update_password($pass_new){
		$dt['password'] = sha1($pass_new);
		return $this->db->where('id_admin',$this->session->userdata('id_admin'))
						->update('admin',$dt);
	}
	function cek_password($pass){
		return $this->db->select('id_admin')
						->where('password', sha1($pass))
						->where('id_admin',$this->session->userdata('id_admin'))
						->limit(1)
						->get('admin');
	}
	function dd_admin(){
		$dd['1']= 'Administrator';
		$dd['2']= 'Admin';
		return $dd;
	}
	
	public function get_all_anggota(){
	return $this->db->order_by('id_anggota','asc')
					->get('anggota a')
					->result();
	}
	public function get_all_kategori(){
	return $this->db->order_by('id_kategori','asc')
					->get('kategori')
					->result();
	}
	public function get_all_rak(){
	return $this->db->order_by('id_rak','asc')
					->get('rak')
					->result();
	}
	public function get_all_buku(){
	return $this->db->join('kategori b','a.id_kategori=b.id_kategori')
					->join('rak c','a.id_rak =c.id_rak')
					->order_by('id_buku','asc')
					->get('buku a')
					->result();
	}
	public function get_all_pengunjung(){
	return $this->db->join('anggota b','a.nis=b.nis')
					->order_by('tgl_kunjungan','DESC')
					->get('pengunjung a')
					->result();
	}
	function laporanpengunjung($tgl_awal,$tgl_akhir){
        return $this->db->join('anggota b','a.nis=b.nis')
						->where("a.tgl_kunjungan >=",$tgl_awal)
						->where("a.tgl_kunjungan <=",$tgl_akhir)
						->order_by("a.tgl_kunjungan DESC")
						->get("pengunjung a")
						->result();
		}
	function semuapengunjung(){
        return $this->db->join('anggota b','a.nis=b.nis')
						->order_by("a.tgl_kunjungan DESC")
						->get("pengunjung a")
						->result();
		}
	public function get_all_peminjamanbuku(){
	return $this->db->join('detail_pengembalian b','a.kode_kembali=b.kode_kembali')
					->order_by('tgl_kembali','DESC')
					->get('pengembalian a')
					->result();
	}
	function laporanpeminjamanbuku($tgl_awal,$tgl_akhir){
        return $this->db->join('detail_pengembalian b','a.kode_kembali=b.kode_kembali')
						->join('peminjaman c','a.kode_pinjam=c.kode_pinjam')
						->join('buku d','b.kode_buku=d.kode_buku')
						->join('anggota e','a.nis=e.nis')
						->where("c.tanggal_pinjam >=",$tgl_awal)
						->where("c.tanggal_pinjam <=",$tgl_akhir)
						->order_by("c.tanggal_pinjam DESC")
						->get("pengembalian a")
						->result();
		}
	function semuapeminjamanbuku(){
        return $this->db->join('detail_pengembalian b','a.kode_kembali=b.kode_kembali')
						->join('peminjaman c','a.kode_pinjam=c.kode_pinjam')
						->join('buku d','b.kode_buku=d.kode_buku')
						->join('anggota e','a.nis=e.nis')
						->order_by("c.tanggal_pinjam DESC")
						->get("pengembalian a")
						->result();
		}
		
	public function get_all_pemesananbuku(){
	return $this->db->order_by('id_booking','DESC')
					->get('booking a')
					->result();
	}
	function laporanpemesananbuku($tgl_awal,$tgl_akhir){
        return $this->db->where("tgl_pesan >=",$tgl_awal)
						->where("tgl_pesan <=",$tgl_akhir)
						->order_by("id_booking DESC")
						->get("booking a")
						->result();
		}
	function semuapemesananbuku(){
        return $this->db->order_by("id_booking DESC")
						->get("booking a")
						->result();
		}
	public function CariTanggal($kode){
		$t = "SELECT * FROM peminjaman WHERE kode_pinjam='$kode'";
		$d = $this->db->query($t);
		$r = $d->num_rows();
		if($r>0){
			foreach($d->result() as $h){
				$hasil = $h->tanggal_pinjam;
			}
		}else{
			$hasil = '';
		}
		return $hasil;
	}
	public function CariTempo($kode){
		$t = "SELECT * FROM peminjaman WHERE kode_pinjam='$kode'";
		$d = $this->db->query($t);
		$r = $d->num_rows();
		if($r>0){
			foreach($d->result() as $h){
				$hasil = $h->batas_waktu;
			}
		}else{
			$hasil = '';
		}
		return $hasil;
	}

	public function CariDenda($kode){
		$t = "SELECT * FROM denda WHERE id_denda='$kode'";
		$d = $this->db->query($t);
		$r = $d->num_rows();
		if($r>0){
			foreach($d->result() as $h){
				$hasil = $h->denda;
			}
		}else{
			$hasil = '';
		}
		return $hasil;
	}
	public function CariKepalaPerpus($kode){
		$t = "SELECT * FROM admin WHERE id_admin='$kode'";
		$d = $this->db->query($t);
		$r = $d->num_rows();
		if($r>0){
			foreach($d->result() as $h){
				$hasil = $h->nama_pengguna;
			}
		}else{
			$hasil = '';
		}
		return $hasil;
	}
	/*----------------EBOOK-----------------*/
	public function get_all_ebook(){
	return $this->db->join('kategori b','a.id_kategori=b.id_kategori')
					->order_by('id_ebook','asc')
					->get('ebook a')
					->result();
	}
	public function get_all_materi(){
	return $this->db->order_by('id_materi','asc')
					->get('materi a')
					->result();
	}	
}		   

        