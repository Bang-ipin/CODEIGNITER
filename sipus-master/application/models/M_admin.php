<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_admin extends CI_Model {
   
	public function __construct() {
		parent::__construct();
			
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
	public function  total_pengembalian() {
    return $this->db->get('pengembalian')
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
	public function get_all_anggota(){
	return $this->db->order_by('id_anggota','asc')
					->get('anggota a')
					->result();
	}
		
	
	public function get_anggota_by_id($id){
        $this->db->where('id_anggota',$id);
        $query = $this->db->get('anggota');
        return $query->result();
    }
	public function tambah_anggota($data){
		$query= $this->db->insert('anggota', $data);
		return $query;
	}
	public function update($id, $data){
		$this->db->where('id_anggota', $id);
		$update=$this->db->update('anggota',$data);
		return $update;
	}
	
	public function delete($id){
		$this->db->where('id_anggota', $id);
		$query= $this->db->delete('anggota');
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
	function dd_gender(){
	$dd['L']= 'Laki-laki';
	$dd['P']= 'Perempuan';
	return $dd;
	}
	public function id_otomatis()
    {
       $this->db->select('RIGHT(anggota.id_anggota,2) as kode',FALSE);
	   $this->db->order_by('id_anggota','DESC');
	   $this->db->limit(1);
	   $query = $this->db->get('anggota');
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

	function update_password($pass_new){
		$dt['password'] = sha1($pass_new);
		return $this->db->where('id_anggota',$this->session->userdata('id_anggota'))
						->update('anggota',$dt);
	}
	function cek_password($pass){
		return $this->db->select('id_anggota')
						->where('password', sha1($pass))
						->where('id_anggota',$this->session->userdata('id_anggota'))
						->limit(1)
						->get('anggota');
	}
	function cek_password_admin($pass){
		return $this->db->select('id_admin')
						->where('password', sha1($pass))
						->where('id_admin',$this->session->userdata('id_admin'))
						->limit(1)
						->get('admin');
	}
	
	/*----------------KATEGORI-----------------*/
	public function get_all_kategori(){
	return $this->db->order_by('id_kategori','asc')
					->get('kategori')
					->result();
	}
		
	
	public function get_kategori_by_id($id){
        $this->db->where('id_kategori',$id);
        $query = $this->db->get('kategori');
        return $query->result();
    }
	public function tambah_kategori($data){
		$query= $this->db->insert('kategori', $data);
		return $query;
	}
	public function update_kategori($id, $data){
		$this->db->where('id_kategori', $id);
		$update=$this->db->update('kategori',$data);
		return $update;
	}
	
	public function delete_kategori($id){
		$this->db->where('id_kategori', $id);
		$query= $this->db->delete('kategori');
		return $query;
	}
	public function id_otomatis_kategori()
    {
       $this->db->select('RIGHT(kategori.id_kategori,2) as kode',FALSE);
	   $this->db->order_by('id_kategori','DESC');
	   $this->db->limit(1);
	   $query = $this->db->get('kategori');
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
	function dd_kategori(){
		$this->db->order_by('id_kategori');
		$query=$this->db->get('kategori');
		$dd['']='---Pilih Kategori---';
		if($query->num_rows()>0){
			foreach($query->result() as $row){
				$dd[$row->id_kategori]= $row->nama_kategori;
				}
			}
			return $dd;
	}
	/*----------------RAK-----------------*/
	public function get_all_rak(){
	return $this->db->order_by('id_rak','asc')
					->get('rak')
					->result();
	}
		
	
	public function get_rak_by_id($id){
        $this->db->where('id_rak',$id);
        $query = $this->db->get('rak');
        return $query->result();
    }
	public function tambah_rak($data){
		$query= $this->db->insert('rak', $data);
		return $query;
	}
	public function update_rak($id, $data){
		$this->db->where('id_rak', $id);
		$update=$this->db->update('rak',$data);
		return $update;
	}
	
	public function delete_rak($id){
		$this->db->where('id_rak', $id);
		$query= $this->db->delete('rak');
		return $query;
	}
	public function id_otomatis_rak()
    {
       $this->db->select('RIGHT(rak.id_rak,2) as kode',FALSE);
	   $this->db->order_by('id_rak','DESC');
	   $this->db->limit(1);
	   $query = $this->db->get('rak');
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
	function dd_rak(){
		$this->db->order_by('id_rak');
		$query=$this->db->get('rak');
		$dd['']='---Pilih Rak Buku---';
		if($query->num_rows()>0){
			foreach($query->result() as $row){
				$dd[$row->id_rak]= $row->nama_rak;
				}
			}
			return $dd;
	}
	/*----------------BUKU-----------------*/
	public function get_all_buku(){
	return $this->db->join('kategori b','a.id_kategori=b.id_kategori')
					->join('rak c','a.id_rak =c.id_rak')
					->order_by('id_buku','asc')
					->get('buku a')
					->result();
	}
		
	
	public function get_buku_by_id($id){
        $this->db->where('id_buku',$id);
        $query = $this->db->get('buku');
        return $query->result();
    }
	public function tambah_buku($data){
		$query= $this->db->insert('buku', $data);
		return $query;
	}
	public function update_buku($id, $data){
		$this->db->where('id_buku', $id);
		$update=$this->db->update('buku',$data);
		return $update;
	}
	
	public function delete_buku($id){
		$this->db->where('id_buku', $id);
		$query= $this->db->delete('buku');
		return $query;
	}
	public function id_otomatis_buku()
    {
       $this->db->select('RIGHT(buku.id_buku,2) as kode',FALSE);
	   $this->db->order_by('id_buku','DESC');
	   $this->db->limit(1);
	   $query = $this->db->get('buku');
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
	public function getlokasirak($idrak){
		$query=$this->db->query("SELECT * FROM rak WHERE id_kategori='$idrak'")->result_array();
		foreach ($query as $row) { 
			echo "<option value='".$row['id_rak']."'>".$row['nama_rak']."</option>";
		}
		
	}
    /*----------------MATERI-----------------*/
	public function get_all_materi(){
	return $this->db->order_by('id_materi','asc')
					->get('materi a')
					->result();
	}
		
	
	public function get_materi_by_id($id){
        $this->db->where('id_materi',$id);
        $query = $this->db->get('materi');
        return $query->result();
    }
	public function tambah_materi($data){
		$query= $this->db->insert('materi', $data);
		return $query;
	}
	public function update_materi($id, $data){
		$this->db->where('id_materi', $id);
		$update=$this->db->update('materi',$data);
		return $update;
	}
	
	public function delete_materi($id){
		$this->db->where('id_materi', $id);
		$query= $this->db->delete('materi');
		return $query;
	}
	public function id_otomatis_materi()
    {
       $this->db->select('RIGHT(materi.id_materi,2) as kode',FALSE);
	   $this->db->order_by('id_materi','DESC');
	   $this->db->limit(1);
	   $query = $this->db->get('materi');
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
	public function get_tempo(){

        /* $tempo = array(0 => 'Pilih tahun'); */
		$tempo = array();
        for ($i = 1 ; $i <=14 ; $i++) { 
            $tempo[$i] = $i;
        }
        return $tempo;
	}
	public function get_tahun(){

        /* $thn = array(0 => 'Pilih tahun'); */
		$thn = array();

        for ($i = 1990 ; $i <=2020 ; $i++) { 

            $thn[$i] = $i;

        }



        return $thn;

	}
	function cek_barcode($kode){
		return $this->db->select('kode_buku')
						->where('kode_buku', $kode)
						->limit(1)
						->get('buku');
	}
	/*----------------PENGUNJUNG-----------------*/
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
	
	/*----------------PENGUNJUNG-----------------*/
	public function lihat_booking(){
	return $this->db->order_by('tgl_pesan','DESC')
					->get('booking')
					->result();
	}
	public function get_booking_by_kode($id){
	return $this->db->WHERE('kode_booking',$id)
					->get('booking')
					->result();
	}
	function dd_statuspesanan(){
	$dd['1']= 'Dalam Proses';
	$dd['2']= 'Di Tolak';
	$dd['3']= 'Sudah Tersedia';
	return $dd;
	}
	public function saveresponbooking($id, $data){
		$this->db->where('kode_booking', $id);
		$update=$this->db->update('booking',$data);
		return $update;
	}
	public function delete_pesanan($id){
		$this->db->where('kode_booking', $id);
		$query= $this->db->delete('booking');
		return $query;
	}
	/*----------------PEMINJAMAN-----------------*/
	public function get_kode_pinjam()
    {
        $q = $this->db->query("select MAX(RIGHT(kode_pinjam,5)) as kode_max from peminjaman");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kode_max)+1;
                $kd = sprintf("%05s", $tmp);
            }
        }
        else
        {
            $kd = "00001";
        }
		return "PJM-".$kd;
		
    }
	/*----------------PENGEMBALIAN-----------------*/
	public function get_kode_kembali()
    {
        $q = $this->db->query("select MAX(RIGHT(kode_kembali,5)) as kode_max from pengembalian");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kode_max)+1;
                $kd = sprintf("%05s", $tmp);
            }
        }
        else
        {
            $kd = "00001";
        }
		return "KMB-".$kd;
		
    }
	function get_buku()
	{	$query = $this->db->get('buku');
        if ($query->num_rows() > 0) { 
            return $query->result();
        }
    }
	function tambah_buku_keluar($data){
		$this->db->insert('peminjaman',$data);
	}
	function tambah_buku_kembali($data){
		$this->db->insert('pengembalian',$data);
	}
	function tambah_detail_buku_keluar($data){
		$this->db->insert('detail_peminjaman',$data);
	}
	function tambah_detail_buku_kembali($data){
		$this->db->insert('detail_pengembalian',$data);
	}
	public function getSelectedData($table,$data)
	{
		return $this->db->get_where($table, $data);
	}	
	function insertData($table,$data)
	{
		$this->db->insert($table,$data);
	}
	function updateData($table,$data,$field_key)
	{
		$this->db->update($table,$data,$field_key);
	}
	function deleteData($table,$data)
    {
        $this->db->delete($table,$data);
    }
	public function NamaAnggota($id){
		$t = "SELECT * FROM anggota WHERE nis ='$id'";
		$d = $this->db->query($t);
		$r = $d->num_rows();
		if($r>0){
			foreach($d->result() as $h){
				$hasil = $h->nama_anggota;
			}
		}else{
			$hasil = '';
		}
		return $hasil;

	}
	
	public function CariKodePinjam($kode){
		$t = "SELECT * FROM pengembalian WHERE kode_kembali='$kode'";
		$d = $this->db->query($t);
		$r = $d->num_rows();
		if($r>0){
			foreach($d->result() as $h){
				$hasil = $h->kode_pinjam;
			}
		}else{
			$hasil = '';
		}
		return $hasil;
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
	
	function Get_Denda()
	{
		$data = array();
		$this->db->order_by("id_denda", "DESC");
		$this->db->select("id_denda, denda");
		$this->db->limit(1);
		$q = $this->db->get('denda');
		  if($q->num_rows() > 0)
		  {
		  	$data = $q->row_array();
		  }else{
			  $data = $q->free_result();
		  }
		$q->free_result();
		return $data;
	}
	function adddenda($data){
		$this->db->insert("denda",$data);
	}
	
	function updatedenda($id,$data){
		$this->db->where("id_denda",$id);
		$this->db->update("denda",$data);
	}
	
	function kode_otomatis_denda()
    {
        $q = $this->db->query("select MAX(RIGHT(id_denda,1)) as kode_max from denda");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kode_max)+1;
                $kd = sprintf("%01s", $tmp);
            }
        }
        else
        {
            $kd = "1";
        }
		return $kd;
		
    }
	function status_peminjaman($id,$status) {
		$this->db->set('status_peminjaman', $status);
		$this->db->where('kode_pinjam',$id);
		$query = $this->db->update('peminjaman');
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
	
	public function count_all_inbox(){
		$query=$this->db->get('inbox')
						->num_rows();
		return $query;
	}
	
	function getInbox(){
		
		return $this->db->where('username !=','admin')
						->group_by('inboxid','DESC')
						->get('inbox')
						->result_array();
										
	}
	function getInboxs($limit=null,$offset=null,$key=null){
		
		$this->db->select('*');
		$this->db->from('inbox');
		$this->db->order_by('id','ASC');
		if($limit !=null){
			$this->db->limit($limit,$offset);
		}
		
		if ($key !=null){
			$this->db->or_like($key);
		}
		
		$query=$this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		else{
			return NULL;
		}						
										
	}
	
	function viewInbox($id){
	
	return $this->db->where('id',$id)
					->get('inbox')
					->result_array();
										
	}
	
	public function saveinbox($data){
		return $this->db->insert('inbox',$data);
	}
	
	function hapuspesan($id){
		return $this->db->where('id',$id)
						->OR_where('inboxid',$id)
						->delete('inbox');
	}
	function caripesanbyid($id){
		
		return $this->db->where('inboxid',$id)
						->order_by('tanggal','ASC')
						->get('inbox')
						->result_array();
										
	}

	/*----------------EBOOK-----------------*/
	public function get_all_ebook(){
	return $this->db->join('kategori b','a.id_kategori=b.id_kategori')
					->order_by('id_ebook','asc')
					->get('ebook a')
					->result();
	}
		
	
	public function get_ebook_by_id($id){
        $this->db->where('id_ebook',$id);
        $query = $this->db->get('ebook');
        return $query->result();
    }
	public function tambah_ebook($data){
		$query= $this->db->insert('ebook', $data);
		return $query;
	}
	public function update_ebook($id, $data){
		$this->db->where('id_ebook', $id);
		$update=$this->db->update('ebook',$data);
		return $update;
	}
	
	public function delete_ebook($id){
		$this->db->where('id_ebook', $id);
		$query= $this->db->delete('ebook');
		return $query;
	}
	public function id_otomatis_ebook()
    {
       $this->db->select('RIGHT(ebook.id_ebook,2) as kode',FALSE);
	   $this->db->order_by('id_ebook','DESC');
	   $this->db->limit(1);
	   $query = $this->db->get('ebook');
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

}		  
 
        