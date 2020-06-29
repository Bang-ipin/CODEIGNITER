<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Beranda_model extends CI_Model {
   
	public function __construct() {
		parent::__construct();
			$this->load->database();
		}
	
	public function top(){
	return $this ->db->select('a.nama_barang,sum(if(status_pergerakan,jumlah,-jumlah)) as total')
					->join('master_barang c','a.kode_barang=c.kode_barang')
					->join('transaksi b','a.kode_transaksi=b.kode_transaksi')
					->group_by('a.kode_barang')
					->order_by('total','DESC')
					->limit(10)
					->get('detail_transaksi a')
					->result();
	}
	public function TopGudang(){
	return $this ->db->select('a.nama_barang,sum(if(status_pergerakan,jumlah,-jumlah)) as total')
					->join('master_barang c','a.kode_barang=c.kode_barang')
					->join('transaksi b','a.kode_transaksi=b.kode_transaksi')
					->group_by('a.kode_barang')
					->order_by('total','desc')
					->limit(10)
					->get('detail_transaksi a')
					->result();
	}
	public function TopToko(){
	return $this ->db->select('a.nama_barang,sum(if(status,jumlah,-jumlah)) as total')
					->join('stok_toko c','a.kode_barang=c.kode_barang')
					->join('trans_toko b','a.kode_transaksi=b.kode_transaksi')
					->group_by('a.kode_barang')
					->order_by('total','desc')
					->limit(10)
					->get('dt_trans a')
					->result();
	}
	
	public function  data($status) {
    return $this->db->select('sum(jumlah) as total')
					->join('transaksi b','a.kode_transaksi=b.kode_transaksi')
					->where('b.status_pergerakan',$status)
					->get('detail_transaksi a')
					->row_array();
	}
	public function  datagudang($status) {
    return $this->db->select('sum(jumlah) as total')
					->join('transaksi b','a.kode_transaksi=b.kode_transaksi')
					->where('b.status_pergerakan',$status)
					->get('detail_transaksi a')
					->row_array();
	}
	public function  toko($status) {
    return $this->db->select('sum(jumlah) as total')
					->join('trans_toko b','a.kode_transaksi=b.kode_transaksi')
					->where('b.status',$status)
					->get('dt_trans a')
					->row_array();
	}
	
}		   
        