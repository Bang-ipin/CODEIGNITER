<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Beranda_model extends CI_Model {
   
	public function topselling(){
	return $this ->db->select('b.produk,b.kategori,sum(harga*jumlah)as totalprice,sum(jumlah) as totaljumlah')
					->join('detail_pesanan b','a.invoice=b.invoice')
					->group_by('b.kode_barang')
					->order_by('totaljumlah','DESC')
					->limit(5)
					->get('pesanan a')
					->result();
	}

	public function lastpost(){
	return $this ->db->order_by('id','DESC')
					->limit(5)
					->get('blog')
					->result();
	}
	public function topviewproduk(){
	return $this ->db->join('kategori_produk b','a.kode_kategori=b.kode_kategori')
					->order_by('dibaca','DESC')
					->limit(5)
					->get('produk a')
					->result();
	}
	public function topviewblog(){
	return $this ->db->order_by('hits','DESC')
					->limit(5)
					->get('blog')
					->result();
	}
	public function newcustomer(){
	return $this ->db->join('detail_pesanan b','a.invoice=b.invoice')
					->order_by('id','DESC')
					->limit(5)
					->get('pesanan a')
					->result();
	}
	public function newcustomers(){
	return $this ->db->select('a.nama_lengkap,sum(jumlah) as totaljumlah,sum(harga*jumlah)as totalprice')
					->join('detail_pesanan b','a.invoice=b.invoice')
					->order_by('id','DESC')
					->limit(5)
					->get('pesanan a')
					->result();
	}
	
	public function toptenorder(){
	return $this ->db->join('detail_pesanan b','a.invoice=b.invoice')
					->order_by('tgl_pesan','DESC')
					->limit(5)
					->get('pesanan a')
					->result();
	}
	public function pendingordered(){
	return $this ->db->join('detail_pesanan b','a.invoice=b.invoice')
					->where('status_pesanan',0)
					->order_by('tgl_pesan','DESC')
					->get('pesanan a')
					->result();
	}
	public function paidordered(){
	return $this ->db->join('detail_pesanan b','a.invoice=b.invoice')
					->where('status_pembayaran',2)
					->where('status_pesanan',1)
					->order_by('tgl_pesan','DESC')
					->get('pesanan a')
					->result();
	}
	public function cancelordered(){
	return $this ->db->join('detail_pesanan b','a.invoice=b.invoice')
					->where('status_pesanan',2)
					->order_by('tgl_pesan','DESC')
					->get('pesanan a')
					->result();
	}
	
	public function  getKomentarPending() {
    return $this->db->where('status',0)
					->where('disetujui',0)
					->order_by('id','DESC')
					->limit(5)
					->get('komentar')
					->result_array();
	}
	public function  getKomentarApprove() {
    return $this->db->where('status',0)
					->where('disetujui',1)
					->order_by('id','DESC')
					->limit(5)
					->get('komentar')
					->result_array();
	}
	public function  getKomentarRejected() {
    return $this->db->where('status',3)
					->order_by('id','DESC')
					->limit(5)
					->get('komentar')
					->result_array();
	}
	public function  getReviewProdukApprove() {
    return $this->db->where('status',0)
					->order_by('id','DESC')
					->limit(5)
					->get('ulasan')
					->result_array();
	}
	public function  getReviewProdukRejected() {
    return $this->db->where('status',3)
					->order_by('id','DESC')
					->limit(5)
					->get('ulasan')
					->result_array();
	}
	public function  totalcustomers() {
    return $this->db->select('count(*) as user')
					->get('customer')
					->row_array();
	}
	public function  totalgaleri() {
    return $this->db->select('count(*) as galeri')
					->get('gallery')
					->row_array();
	}
	public function  totalorders() {
    return $this->db->select('sum(jumlah) as total')
					->join('pesanan b','a.invoice=b.invoice')
					->get('detail_pesanan a')
					->row_array();
	}
	
	public function  totalomset() {
    return $this->db->select('sum(harga) as harga')
					->join('pesanan b','a.invoice=b.invoice')
					->get('detail_pesanan a')
					->row_array();
	}
	public function  totalartikel() {
    return $this->db->select('count(*) as artikel')
					->get('blog')
					->row_array();
	}
	public function  totaldownload() {
    return $this->db->select('count(*) as download')
					->get('download')
					->row_array();
	}
	public function  totalkategori() {
    return $this->db->select('count(*) as kategori')
					->get('kategori_produk')
					->row_array();
	}
	
	public function TotalVisitorPerhari($hari,$bln,$thn){
    $SQL= "SELECT month(tanggal) as bln, year(tanggal)as th,COUNT(ip) as jumlah
			FROM statistik WHERE day(tanggal)='$hari' AND month(tanggal)='$bln' AND year(tanggal)='$thn'
			GROUP BY day(tanggal), month(tanggal), year(tanggal)";

		$query=$this->db->query($SQL);
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				$hasil=$row->jumlah;
			}
		}
		else{
			$hasil=0;
		}
		return $hasil;
	}
	public function TotalVisitorPerbulan($bln,$thn){
    $SQL= "SELECT month(tanggal) as bln, year(tanggal)as th,sum(hits) as jumlah
			FROM statistik WHERE month(tanggal)='$bln' AND year(tanggal)='$thn'
			GROUP BY month(tanggal), year(tanggal)";

		$query=$this->db->query($SQL);
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				$hasil=$row->jumlah;
			}
		}
		else{
			$hasil=0;
		}
		return $hasil;
	} 
	
}		   
        