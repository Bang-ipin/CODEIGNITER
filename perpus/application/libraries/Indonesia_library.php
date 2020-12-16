<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Indonesia_library {

	protected $CI;
    public function __construct(){
		$this->CI =& get_instance();
    }
	function format_rupiah($angka)

	{

		$rupiah="";

		$rp=strlen($angka);

			while ($rp>3)

			{

				$rupiah = ".". substr($angka,-3). $rupiah;

				$s=strlen($angka) - 3;

				$angka=substr($angka,0,$s);

				$rp=strlen($angka);

			}

		$rupiah = "Rp " . $angka . $rupiah . "";

		return $rupiah;

	}

	

	function format_tanggal()

	{

		date_default_timezone_set('Asia/Jakarta');

		$skrg=date("Y-m-d");	

		return $skrg;
	}	
	function format_tanggal_jam()
	{
		date_default_timezone_set('Asia/Jakarta');

		$skrg=date("Y-m-d H:i:s");	
		return $skrg;
	}
	
    function jumlahpeminjaman($id)
	{
		$t = "SELECT * FROM buku WHERE kode_buku='$id'";
		$d = $this->CI->db->query($t);
		$r = $d->num_rows();
		if($r>0){
			foreach($d->result() as $h){
				$hasil = $h->dipinjam;
			}
		}else{
			$hasil = '';
		}
		return $hasil;
	}
	function carikepalaperpus()
	{
		$t = "SELECT * FROM admin WHERE id_admin=1";
		$d = $this->CI->db->query($t);
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
	function carinamayayasan()
	{
		return $this->CI->config->item('yayasan');
	}
	function carinamasekolah()
	{
		return $this->CI->config->item('sekolah');
	}
	function carinamainstansi()
	{
		return $this->CI->config->item('instansi');
	}
	function carinamaakreditasi()
	{
		return $this->CI->config->item('akreditasi');
	}
	function carinamaalamat()
	{
		return $this->CI->config->item('alamat');
	}
	function konversi_tanggal($tanggal)

	{
		$format = array(
		'Sun' => 'Minggu', 'Mon' => 'Senin', 'Tue' => 'Selasa', 'Wed' => 'Rabu', 'Thu' => 'Kamis', 'Fri' => 'Jumat', 'Sat' => 'Sabtu', 'Jan' => 'Januari', 'Feb' => 'Februari', 'Mar' => 'Maret', 'Apr' => 'April', 'May' => 'Mei', 'Jun' => 'Juni', 'Jul' => 'Juli', 'Aug' => 'Agustus', 'Sep' => 'September', 'Oct' => 'Oktober', 'Nov' => 'November', 'Dec' => 'Desember'
		);
		$tanggal = date('D, d M Y', strtotime($tanggal));
		return strtr($tanggal, $format);
	}
}