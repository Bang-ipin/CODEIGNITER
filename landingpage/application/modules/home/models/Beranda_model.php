<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Beranda_model extends CI_Model {
	
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
        