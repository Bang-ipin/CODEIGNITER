<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi_model extends CI_Model{
	public function __construct() {
		parent::__construct();
			$this->load->database();
		}

		
    //<!-- Transaksi Barang Masuk-->
    		
	public function getToko(){
		$this->db->order_by('id_toko');
        $query = $this->db->get('toko');
        if ($query->num_rows() > 0) { //jika ada maka jalankan
            return $query->result();
        }
	}
	
	function dd_toko(){
	$this->db->order_by('id_toko');
	$query=$this->db->get('toko');
	$dd['']='---Pilih---';
	if($query->num_rows()>0){
		foreach($query->result() as $row){
			$dd[$row->id_toko]= $row->nama_toko;
			}
		}
		return $dd;
	}
	
    public function get_all_transaksi_masuk(){
    return $this->db->join('detail_transaksi b','a.kode_transaksi=b.kode_transaksi')
					->where('a.status_pergerakan',1)
					->order_by('a.kode_transaksi','DESC')
					->get('transaksi a')
					->result();
                 
	}   
	
    public function get_all_trans_masuk(){
		$sql=("select a.kode_transaksi,a.tanggal_transaksi,a.kode_supplier,a.username,
			b.kode_barang,b.jumlah,a.total_harga('select count(kode_transaksi) as 
			total_harga from detail_transaksi where kode_transaksi=a.kode_transaksi')
			as total_harga from transaksi a order by a.kode_transaksi DESC");
		$hasil=$this->db->query($sql)->result();
		return $hasil;
					
	}
	public function  total_pencarian_masuk($kunci) {
    $query = $this->db->get('transaksi');
	$this->db->or_like($kunci);
	return $query->num_rows();
	}
	
	public function total_row_masuk(){
		$query=$this->db->get('transaksi')->num_rows();
		return $query;
	}
	
	public function get_barangmasuk_by_id($id){
        $this->db->where('kode_transaksi',$id);
        $query = $this->db->get('transaksi');
        return $query->result();
    }
 

	public function get_kode_transaksi_masuk()
    {
        $q = $this->db->query("select MAX(RIGHT(kode_transaksi,5)) as kode_max from transaksi");
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
		return "TRM-".$kd;
		
    }
	public function get_kode_pembelian()
    {
        $q = $this->db->query("select MAX(RIGHT(kode_transaksi,5)) as kode_max from trans_toko");
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
		return "BL-".$kd;
		
    }
	
	public function get_kode_penjualan()
    {
        $q = $this->db->query("select MAX(RIGHT(kode_transaksi,5)) as kode_max from trans_toko");
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
		return "JL-".$kd;
		
    }

	public function get_transaksi_by_id($id){
        return $this->db->join('master_supplier b','a.kode_supplier=b.kode_supplier','LEFT')
						->join('toko c','a.id_toko=c.id_toko','LEFT')
						->where('a.kode_transaksi',$id)
						->get('transaksi a')
						->result();
		}
	public function get_transaksi1_by_id($id){
        return $this->db->join('master_supplier b','a.kode_supplier=b.kode_supplier','LEFT')
						->join('pelanggan c','a.id_pelanggan=c.id_pelanggan','LEFT')
						->where('a.kode_transaksi',$id)
						->get('trans_toko a')
						->result();
	}
	
	function get_master_barang_masuk()
	{	$this->db->join('satuan','master_barang.id_satuan=satuan.id_satuan');		
		$query = $this->db->get('master_barang');
        if ($query->num_rows() > 0) { //jika ada maka jalankan
            return $query->result();
        }
    }
	
	function get_master_pembelian()
	{	$this->db->join('satuan b','a.id_satuan=b.id_satuan');		
		$query = $this->db->get('stok_toko a');
        if ($query->num_rows() > 0) { //jika ada maka jalankan
            return $query->result();
        }
    }
	function get_master_penjualan()
	{	$this->db->join('satuan b','a.id_satuan=b.id_satuan');		
		$query = $this->db->get('stok_toko a');
        if ($query->num_rows() > 0) { //jika ada maka jalankan
            return $query->result();
        }
    }
	public function get_barang_by_id($kode){
        $this->db->where('kode_barang',$kode);
        $query = $this->db->get('master_barang');
        return $query->result();
    }
	
	function get_satuan() {
        $query = $this->db->get('satuan');
        if ($query->num_rows() > 0) { //jika ada maka jalankan
            return $query->result();
        }
    }

	function supplier() {
		$this->db->order_by('kode_supplier');
        $query = $this->db->get('master_supplier');
        if ($query->num_rows() > 0) { //jika ada maka jalankan
            return $query->result_array();
        }
    }
	function pelanggan() {
		$this->db->order_by('id_pelanggan');
        $query = $this->db->get('pelanggan');
        if ($query->num_rows() > 0) { //jika ada maka jalankan
            return $query->result_array();
        }
    }
	
	function dd_supplier(){
	$this->db->order_by('kode_supplier');
	$query=$this->db->get('master_supplier');
	$dd['']='---Pilih---';
	if($query->num_rows()>0){
		foreach($query->result() as $row){
			$dd[$row->kode_supplier]= $row->nama_supplier;
			}
		}
		return $dd;
	}
	function dd_pelanggan(){
	$this->db->order_by('id_pelanggan');
	$query=$this->db->get('pelanggan');
	$dd['']='---Pilih---';
	if($query->num_rows()>0){
		foreach($query->result() as $row){
			$dd[$row->id_pelanggan]= $row->nama_pelanggan;
			}
		}
		return $dd;
	}
	
	function daftar_barang_masuk(){
	return $this->db->get_where('pergerakan_barang',1)
		->get('transaksi')
		->result();
	}
	
	function tambah_barang_masuk($data){
		$this->db->insert('transaksi',$data);
	}
	function tambah_detail_barang_masuk($data){
		$this->db->insert('detail_transaksi',$data);
	}
	
	function tambah_pembelian($data){
		$this->db->insert('trans_toko',$data);
	}
	function tambah_detail_pembelian($data){
		$this->db->insert('dt_trans',$data);
	}
	
	function tambah_penjualan($data){
		$this->db->insert('trans_toko',$data);
	}
	function tambah_detail_penjualan($data){
		$this->db->insert('dt_trans',$data);
	}
	
	function get_detail_by_id($id){
		return  $this->db->where('kode_transaksi',$id)
					 ->get('detail_transaksi')
					 ->result();
	}

	function delete_det_trans($id){
		return $this->db->where('kode_transaksi',$id)
				->delete('detail_transaksi');
			}
            
	

    function delete_trans($id){
		return $this->db->where('kode_transaksi',$id)
				->delete('transaksi');
			}
    
	 
	 
   // Transaksi Barang Keluar		
   public function get_all_transaksi_keluar(){
    return $this->db->join('detail_transaksi b','a.kode_transaksi=b.kode_transaksi')
					->where('a.status_pergerakan',2)
					->order_by('a.kode_transaksi','DESC')
					->get('transaksi a')
					->result();
                 
	} 
	public function  total_pencarian_keluar($kunci) {
    $query = $this->db->get('transaksi');
	$this->db->or_like($kunci);
	return $query->num_rows();
	}
	
	public function total_row_keluar(){
		$query=$this->db->get('transaksi')->num_rows();
		return $query;
	}
	
	public function get_barangkeluar_by_id($id){
        $this->db->where('kode_transaksi',$id);
        $query = $this->db->get('transaksi');
        return $query->result();
    }
 
    public function get_kode_transaksi_keluar()
    {
        $q = $this->db->query("select MAX(RIGHT(kode_transaksi,5)) as kode_max from transaksi");
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
		return "TRK-".$kd;
		
    }
    
	function get_master_barang_keluar()
	{	$this->db->join('satuan','master_barang.id_satuan=satuan.id_satuan');		
		$query = $this->db->get('master_barang');
        if ($query->num_rows() > 0) { //jika ada maka jalankan
            return $query->result();
        }
    }
	
    function daftar_barang_keluar(){
	return $this->db->get_where('pergerakan_barang',2)
		->get('transaksi')
		->result();
	}
	
	function tambah_barang_keluar($data){
		$this->db->insert('transaksi',$data);
	}
	
	
	function tambah_detail_barang_keluar($data){
		$this->db->insert('detail_transaksi',$data);
	}
	
	        
    //konversi Tanggal Dan Waktu Ke Indonesia
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
	
	public function ambilTgl($tgl){
		$exp = explode('-',$tgl);
		$tgl = $exp[2];
		return $tgl;
	}
	
	public function ambilBln($tgl){
		$exp = explode('-',$tgl);
		$tgl = $exp[1];
		$bln = $this->app_model->getBulan($tgl);
		$hasil = substr($bln,0,3);
		return $hasil;
	}
	
	public function tgl_indo($tgl){
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
	
	
	public function getKurangStok($kode_barang,$kurang)
    {
        $q = $this->db->query("select stock_awal from master_barang where kode_barang='".$kode_barang."'");
        $stock = "";
        foreach($q->result() as $d)
        {
            $stock = $d->stock_awal - $kurang;
        }
        return $stock;
    }
	
	public function getMinStok($kode_barang,$kurang)
    {
        $q = $this->db->query("select stok from stok_toko where kode_barang='".$kode_barang."'");
        $stock = "";
        foreach($q->result() as $d)
        {
            $stock = $d->stok - $kurang;
        }
        return $stock;
    }
	
    public function getTambahStok($kode_barang,$tambah)
    {
        $q = $this->db->query("select stock_awal from master_barang where kode_barang='".$kode_barang."'");
        $stock = "";
        foreach($q->result() as $d)
        {
            $stock = $d->stock_awal + $tambah;
        }
        return $stock;
    }
	public function getAddStok($kode_barang,$tambah)
    {
        $q = $this->db->query("select stok from stok_toko where kode_barang='".$kode_barang."'");
        $stock = "";
        foreach($q->result() as $d)
        {
            $stock = $d->stok + $tambah;
        }
        return $stock;
    }
	
	public function getKembalikanStok($kode_barang)
    {
        $q = $this->db->query("select stock_awal from master_barang where kode_barang='".$kode_barang."'");
        $stock = "";
        foreach($q->result() as $d)
        {
            $stock = $d->stock_awal;
        }
        return $stock;
    }
	
	function updateData($table,$data,$field_key)
    {
        $this->db->update($table,$data,$field_key);
    }
	 
	public function getSelectedData($table,$id)
    {
        return $this->db->get_where($table, $id);
    }
        
	function deleteData($table,$data)
    {
        $this->db->delete($table,$data);
    }

}
	