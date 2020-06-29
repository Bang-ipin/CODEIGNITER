<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_anggota extends CI_Model {
	public function  total_buku() {
    return $this->db->get('buku')
					->num_rows();
	}
	public function  total_pesanan($kode) {
    return $this->db->where('nis',$kode)
					->get('booking')
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
	public function tambah_pengunjung($data){
		$query= $this->db->insert('pengunjung', $data);
		return $query;
	}
	
	public function get_all_buku(){
	return $this->db->join('kategori b','a.id_kategori=b.id_kategori')
					->join('rak c','a.id_rak =c.id_rak')
					->order_by('id_buku','asc')
					->get('buku a')
					->result();
	}
	public function get_user($nis,$password) {
		
		$user =$this->db->escape_str($nis);
		$pass =$this->db->escape_str($password);
		
		$this->db->select('*');
		$this->db->from('anggota a');
		$this->db->join('usergroup b','a.id_usergroup=b.id_usergroup');
		
		if($nis !=NULL){
			$this->db->where('nis',$user);
		}
		if ($password !=NULL){
			$this->db->where('password',$pass);
		}
		
        return  $this->db->get();
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
	
	public function id_otomatis()
    {
       $this->db->select('RIGHT(booking.id_booking,2) as kode',FALSE);
	   $this->db->order_by('id_booking','DESC');
	   $this->db->limit(1);
	   $query = $this->db->get('booking');
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
	public function kode_acak()
    {
        $q = $this->db->query("select MAX(RIGHT(id_booking,2)) as kode_acak from booking WHERE DATE(tgl_pesan)=CURDATE()");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kode_acak)+1;
                $kd = sprintf("%02s", $tmp);
            }
        }
        else
        {
            $kd = "01";
        }
		date_default_timezone_set('Asia/Jakarta');
		$acak = substr(rand(),0,3);
		return "BK".$acak.$kd;
		
    }
	public function tambah_booking($data){
		$query= $this->db->insert('booking', $data);
		return $query;
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
	public function ambilTgl($tgl){

                date_default_timezone_set('Asia/Jakarta');

		$exp = explode('-',$tgl);

		$tgl = $exp[2];

		return $tgl;

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
	public function lihat_booking_by_id($id){
	return $this->db->WHERE('nis',$id)
					->order_by('tgl_pesan','DESC')
					->get('booking')
					->result();
	}
	public function get_booking_by_kode($id){
	return $this->db->WHERE('kode_booking',$id)
					->get('booking')
					->result();
	}
	function cek_kunjungan($id,$tgl){
		return $this->db->select('nis')
						->where('nis',strtoupper($id))
						->where('tgl_kunjungan',$tgl)
						->limit(1)
						->get('pengunjung');
	}
	function cek_anggota($barcode){
		return $this->db->select('nis')
						->where('nis',strtoupper($barcode))
						->get('anggota');
	}
	public function CariNamaAnggota($kode){
		$t = "SELECT * FROM anggota WHERE nis='$kode'";
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

	function caripesanbyid($id){
		
		return $this->db->where('inboxid',$id)
						->order_by('tanggal','ASC')
						->get('inbox')
						->result_array();
										
	}
	
	function saveinbox($data){
		return $this->db->insert('inbox',$data);
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
    public function get_all_ebook(){
	return $this->db->JOIN('kategori b','a.id_kategori=b.id_kategori')
					->order_by('id_ebook','asc')
					->get('ebook a')
					->result();
	}
		
	
	public function get_ebook_by_id($id){
        $this->db->where('id_ebook',$id);
        $query = $this->db->get('ebook');
        return $query->result();
    }
    function updateData($table,$data,$field_key)
	{
		$this->db->update($table,$data,$field_key);
	}
	function UpdateStatus($nis){
		$this->db->query("UPDATE inbox SET status=1 WHERE inboxid='$nis' and username='admin'");
	}
 }	
		  
 
        