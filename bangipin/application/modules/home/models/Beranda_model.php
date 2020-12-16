<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Beranda_model extends CI_Model {
    private $statistik = 'statistik';
	function __construct() {
        
    }
	public function lastpost(){
	return $this ->db->order_by('id','DESC')
					->limit(5)
					->get('blog')
					->result();
	}
	
	public function topviewblog(){
	return $this ->db->order_by('hits','DESC')
					->limit(5)
					->get('blog')
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

	public function  totalgaleri() {
    return $this->db->select('count(*) as galeri')
					->get('gallery')
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

	
	//STATISTIK
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
	
	function get_site_data_for_today() {
	    date_default_timezone_set('Asia/Jakarta');
        $results = array();
        $query = $this->db->query('SELECT SUM(hits) as visits 
            FROM ' . $this->statistik . ' 
            WHERE CURDATE()=DATE(tanggal)
            LIMIT 1');
        if ($query->num_rows() == 1) {
            $row = $query->row();
            $results['visits'] = $row->visits;
        }

        return $results;
    }

    function get_site_data_for_last_week() {
        date_default_timezone_set('Asia/Jakarta');
        $results = array();
        $query = $this->db->query('SELECT SUM(hits) as visits
            FROM ' . $this->statistik . '
            WHERE DATE(tanggal) >= CURDATE() - INTERVAL DAYOFWEEK(CURDATE())+6 DAY
            AND DATE(tanggal) < CURDATE() - INTERVAL DAYOFWEEK(CURDATE())-1 DAY 
            LIMIT 1');
        if ($query->num_rows() == 1) {
            $row = $query->row();
            $results['visits'] = $row->visits;

            return $results;
        }
    }

    function get_chart_data_for_today() {
        date_default_timezone_set('Asia/Jakarta');
        $query = $this->db->query('SELECT SUM(hits) as visits,
                DATE_FORMAT(tanggal,"%h %p") AS hour
                FROM ' . $this->statistik . '
                WHERE CURDATE()=DATE(tanggal)
                GROUP BY HOUR(tanggal)');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return NULL;
    }

    function get_chart_data_for_month_year($month = 0, $year = 0) {
        date_default_timezone_set('Asia/Jakarta');
        if ($month == 0 && $year == 0) {
            $month = date('m');
            $year = date('Y');
            $query = $this->db->query('SELECT SUM(hits) as visits,
                DATE_FORMAT(tanggal,"%d-%m-%Y") AS day 
                FROM ' . $this->statistik . '
                WHERE MONTH(tanggal)=' . $month . '
                AND YEAR(tanggal)=' . $year . '
                GROUP BY DATE(tanggal)');
            if ($query->num_rows() > 0) {
                return $query->result();
            }
        }
        if ($month == 0 && $year > 0) {
            $query = $this->db->query('SELECT SUM(hits) as visits,
                DATE_FORMAT(timestamp,"%M") AS day
                FROM ' . $this->statistik . '
                WHERE YEAR(tanggal)=' . $year . '
                GROUP BY MONTH(tanggal)');
            if ($query->num_rows() > 0) {
                return $query->result();
            }
        }
        if ($year == 0 && $month > 0) {
            $year = date('Y');
            $query = $this->db->query('SELECT SUM(hits) as visits,
                DATE_FORMAT(tanggal,"%d-%m-%Y") AS day
                FROM ' . $this->statistik . '
                WHERE MONTH(tanggal)=' . $month . '
                AND YEAR(tanggal)=' . $year . '
                GROUP BY DATE(tanggal)');
            if ($query->num_rows() > 0) {
                return $query->result();
            }
        }

        if ($year > 0 && $month > 0) {
            $query = $this->db->query('SELECT SUM(hits) as visits,
                DATE_FORMAT(tanggal,"%d-%m-%Y") AS day
                FROM ' . $this->statistik . '
                WHERE MONTH(tanggal)=' . $month . '
                AND YEAR(tanggal)=' . $year . '
                GROUP BY DATE(tanggal)');
            if ($query->num_rows() > 0) {
                return $query->result();
            }
        }

        return NULL;
    }
	
	function grafik_kunjungan(){
	    date_default_timezone_set('Asia/Jakarta');
        return $this->db->query("SELECT count(*) as jumlah, tanggal FROM statistik GROUP BY tanggal ORDER BY tanggal DESC LIMIT 10");
    }

    function pengunjung(){
        date_default_timezone_set('Asia/Jakarta');
        return $this->db->query("SELECT * FROM statistik WHERE tanggal='".date("Y-m-d")."' GROUP BY ip");
    }

    function totalpengunjung(){
       date_default_timezone_set('Asia/Jakarta');
       return $this->db->query("SELECT COUNT(hits) as total FROM statistik");
    }

    function hits(){
        date_default_timezone_set('Asia/Jakarta');
        return $this->db->query("SELECT SUM(hits) as total FROM statistik WHERE tanggal='".date("Y-m-d")."' GROUP BY tanggal");
    }

    function totalhits(){
        date_default_timezone_set('Asia/Jakarta');
        return $this->db->query("SELECT SUM(hits) as total FROM statistik");
    }

    function pengunjungonline(){
        date_default_timezone_set('Asia/Jakarta');
        $results = array();
        $bataswaktu       = time() - 300;
        $query = $this->db->query("SELECT  online as ol
        FROM statistik WHERE online > '$bataswaktu'");
        if ($query->num_rows() == 1) {
            $row = $query->row();
            $results['pengunjungonline'] = $row->ol;
        }
    }
}		   
        