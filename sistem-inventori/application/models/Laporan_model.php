<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_model extends CI_Model{
	public function __construct() {
		parent::__construct();
			$this->load->database();
		}

	//Get Data Stock Barang 	
	public function stock_akhir(){
		return $this->db->select('a.kode_barang, a.nama_barang,a.harga_jual,a.harga_beli,a.stock_awal,b.nama_satuan,c.jenis_barang')
						->join('satuan b','a.id_satuan=b.id_satuan')
						->join('master_jenisbarang c','a.id_jenis=c.id_jenis')
						->order_by('a.kode_barang ASC') 
						->get('master_barang a')
						->result();
	}
	public function stock_akhir_by_barang($kode){
		return $this->db->select('a.kode_barang, a.nama_barang,a.harga_jual,a.harga_beli,a.stock_awal,b.nama_satuan,c.jenis_barang')
						->join('satuan b','a.id_satuan=b.id_satuan')
						->join('master_jenisbarang c','a.id_jenis=c.id_jenis')
						->where('a.nama_barang LIKE=%'.$kode.'%')
						->order_by('a.kode_barang ASC') 
						->get('master_barang a')
						->result();
	}
	public function stock_toko(){
		return $this->db->select('a.kode_barang, a.nama_barang,a.harga_jual,a.harga_beli,a.stok,b.nama_satuan,c.jenis_barang')
						->join('satuan b','a.id_satuan=b.id_satuan')
						->join('master_jenisbarang c','a.id_jenis=c.id_jenis')
						->order_by('a.kode_barang ASC') 
						->get('stok_toko a')
						->result();
	}
				 
	function kode_barang() {
		$this->db->order_by('kode_barang');
        $query = $this->db->get('master_barang');
        if ($query->num_rows() > 0) { //jika ada maka jalankan
            return $query->result_array();
        }
    }
	
	public function StokAwal($kode){
		$this->db->select('kode_barang,stock_awal');
		$this->db->where('kode_barang',$kode);
		$query=$this->db->get('master_barang');
		 if($query->num_rows() > 0){
			foreach($d->result() as $h){
				$hasil = $h->stok_awal;
			}
		}else{
			$hasil = 0;
		}
		return $hasil;
	}
	
	public function CariJmlMasuk($kode){
		$this->db->select('a.kode_barang,b.status_pergerakan=1,sum(jumlah) as jumlah');
		$this->db->join('transaksi b','a.kode_transaksi=b.kode_transaksi');
		$this->db->where('a.kode_barang',$kode);
		$this->db->group_by('kode_barang');
		$query=$this->db->get('detail_transaksi a');
		if($query->num_rows() >0){
			foreach($d->result() as $h){
				$hasil = $h->jumlah;
			}
		}else{
			$hasil = 0;
		}
		return $hasil;
	}
	
	public function CariJmlKeluar($kode){
		$this->db->select('kode_barang,b.status_pergerakan=2,sum(jumlah) as jumlah');
		$this->db->join('transaksi b','a.kode_transaksi=b.kode_transaksi');
		$this->db->where('a.kode_barang',$kode);
		$this->db->group_by('kode_barang');
		$query=$this->db->get('detail_transaksi a');
		if($query->num_rows() >0){
		foreach($query->result() as $h){
				$hasil = $h->jumlah;
			}
		}else{
			$hasil = 0;
		}
		return $hasil;
	}
	
	
	
	public function StokAkhir($kode){
		$awal = $this->laporan_model->CariStokAwal($kode);
		$in = $this->app_model->CariJmlMasuk($kode);
		$out = $this->app_model->CariJmlKeluar($kode);
		$hasil = ($awal+$in)-$out;
		return $hasil;
		}
		
	function getLapPembelian($tgl_awal,$tgl_akhir){
        return $this->db->select("*,(select sum(b.total)as jumlah from detail_transaksi b join transaksi a on a.kode_transaksi=b.kode_transaksi where a.status_pergerakan=1 and a.tanggal_transaksi BETWEEN '$tgl_awal' and '$tgl_akhir')as total_all")
						->join('detail_transaksi b','a.kode_transaksi=b.kode_transaksi')
						->join('master_supplier c','a.kode_supplier=c.kode_supplier')
						->where("a.tanggal_transaksi >=",$tgl_awal)
						->where("a.tanggal_transaksi <=",$tgl_akhir)
						->where("a.status_pergerakan",1)
						->order_by("a.tanggal_transaksi ASC")
						->get("transaksi a")
						->result();
		}
	function getLapPembelianAll(){
        return $this->db->select("*,(select sum(b.total)as jumlah from detail_transaksi b join transaksi a on a.kode_transaksi=b.kode_transaksi where a.status_pergerakan=1)as total_all")
						->join('detail_transaksi b','a.kode_transaksi=b.kode_transaksi')
						->join('master_supplier c','a.kode_supplier=c.kode_supplier')
						->where("a.status_pergerakan",1)
						->order_by("a.tanggal_transaksi ASC")
						->get("transaksi a")
						->result();
		}
	function getLapPembelianToko($tgl_awal,$tgl_akhir){
        return $this->db->select("*,(select sum(b.total)as jumlah from dt_trans1 b join trans_toko a on a.kode_transaksi=b.kode_transaksi where a.status=1 and a.tanggal_transaksi BETWEEN '$tgl_awal' and '$tgl_akhir')as total_all")
						->join('dt_trans b','a.kode_transaksi=b.kode_transaksi')
						->join('master_supplier c','a.kode_supplier=c.kode_supplier')
						->where("a.tanggal_transaksi >=",$tgl_awal)
						->where("a.tanggal_transaksi <=",$tgl_akhir)
						->where("a.status",1)
						->order_by("a.tanggal_transaksi ASC")
						->get("trans_toko a")
						->result();
		}
	
	function getLapPembelianTokoAll(){
        return $this->db->select("*,(select sum(b.total)as jumlah from dt_trans b join trans_toko a on a.kode_transaksi=b.kode_transaksi where a.status=1)as total_all")
						->join('dt_trans b','a.kode_transaksi=b.kode_transaksi')
						->join('master_supplier c','a.kode_supplier=c.kode_supplier')
						->where("a.status",1)
						->order_by("a.tanggal_transaksi ASC")
						->get("trans_toko a")
						->result();
		}
	
	function getLapPenjualan($tgl_awal,$tgl_akhir){
        return $this->db->select("*,(select sum(b.total)as jumlah from detail_transaksi b join transaksi a on a.kode_transaksi=b.kode_transaksi where status_pergerakan=2 and tanggal_transaksi between '$tgl_awal' and '$tgl_akhir')as total_all")
						->join('detail_transaksi b','a.kode_transaksi=b.kode_transaksi')
						->join('master_barang c','b.kode_barang=c.kode_barang')
						->where("a.tanggal_transaksi>=",$tgl_awal)
						->where("a.tanggal_transaksi<=",$tgl_akhir)
						->where("a.status_pergerakan",2)
						->order_by("a.tanggal_transaksi ASC")
						->get("transaksi a")
						->result();
		}
	function getLapDistribusiAll(){
        return $this->db->select("*,(select sum(b.total)as jumlah from detail_transaksi b join transaksi a on a.kode_transaksi=b.kode_transaksi where a.status_pergerakan=2)as total_all")
						->join('detail_transaksi b','a.kode_transaksi=b.kode_transaksi')
						->join('toko c','a.id_toko=c.id_toko')
						->where("a.status_pergerakan",2)
						->order_by("a.tanggal_transaksi ASC")
						->get("transaksi a")
						->result();
		}
		
	function getLapDistribusi($tgl_awal,$tgl_akhir){
        return $this->db->select("*,(select sum(b.total)as jumlah from detail_transaksi b join transaksi a on a.kode_transaksi=b.kode_transaksi where status_pergerakan=2 and tanggal_transaksi between '$tgl_awal' and '$tgl_akhir')as total_all")
						->join('detail_transaksi b','a.kode_transaksi=b.kode_transaksi')
						->join('master_barang c','b.kode_barang=c.kode_barang')
						->join('toko d','a.id_toko=d.id_toko')
						->where("a.tanggal_transaksi>=",$tgl_awal)
						->where("a.tanggal_transaksi<=",$tgl_akhir)
						->where("a.status_pergerakan",2)
						->order_by("a.tanggal_transaksi ASC")
						->get("transaksi a")
						->result();
		}
	
	function getLapPenjualanToko($tgl_awal,$tgl_akhir){
        return $this->db->select("*,(select sum(b.total)as jumlah from dt_trans b join trans_toko a on a.kode_transaksi=b.kode_transaksi where status=2 and tanggal_transaksi between '$tgl_awal' and '$tgl_akhir')as total_all")
						->join('dt_trans b','a.kode_transaksi=b.kode_transaksi')
						->join('master_barang c','b.kode_barang=c.kode_barang')
						->join('pelanggan d','a.id_pelanggan=d.id_pelanggan')
						->where("a.tanggal_transaksi>=",$tgl_awal)
						->where("a.tanggal_transaksi<=",$tgl_akhir)
						->where("a.status",2)
						->order_by("a.tanggal_transaksi ASC")
						->get("trans_toko a")
						->result();
		}
	function getLapPenjualanTokoAll(){
        return $this->db->select("*,(select sum(b.total)as jumlah from dt_trans b join trans_toko a on a.kode_transaksi=b.kode_transaksi where status=2)as total_all")
						->join('dt_trans b','a.kode_transaksi=b.kode_transaksi')
						->join('master_barang c','b.kode_barang=c.kode_barang')
						->join('pelanggan d','a.id_pelanggan=d.id_pelanggan')
						->where("a.status",2)
						->order_by("a.tanggal_transaksi ASC")
						->get("trans_toko a")
						->result();
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
	
	
	}
		