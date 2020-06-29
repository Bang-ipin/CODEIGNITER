<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site_model extends CI_Model {
	
	function insertdata($tabel, $data){
		
		return $this->db->insert($tabel,$data);
	}
	public function getSelectedData($table,$id){
        return $this->db->get_where($table, $id);
    }
	
	function getLokasi(){
		return $this->db->query("SELECT * FROM lokasi");
	}

	/*---------------------Visitor---------------------->*/
	function kunjungan(){
        $ip      = $_SERVER['REMOTE_ADDR'];
        $tanggal = date("Y-m-d");
        $waktu   = time(); 
        $cekk = $this->db->query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
        $rowh = $cekk->row_array();
        if($cekk->num_rows() == 0){
            $datadb = array('ip'=>$ip, 'tanggal'=>$tanggal, 'hits'=>'1', 'online'=>$waktu);
            $this->db->insert('statistik',$datadb);
        }else{
            $hitss = $rowh['hits'] + 1;
            $datadb = array('ip'=>$ip, 'tanggal'=>$tanggal, 'hits'=>$hitss, 'online'=>$waktu);
            $array = array('ip' => $ip, 'tanggal' => $tanggal);
            $this->db->where($array);
            $this->db->update('statistik',$datadb);
        }
    }
	
	function grafik_kunjungan(){
        return $this->db->query("SELECT count(*) as jumlah, tanggal FROM statistik GROUP BY tanggal ORDER BY tanggal DESC LIMIT 10");
    }

    function pengunjung(){
        return $this->db->query("SELECT * FROM statistik WHERE tanggal='".date("Y-m-d")."' GROUP BY ip");
    }

    function totalpengunjung(){
        return $this->db->query("SELECT COUNT(hits) as total FROM statistik");
    }

    function hits(){
        return $this->db->query("SELECT SUM(hits) as total FROM statistik WHERE tanggal='".date("Y-m-d")."' GROUP BY tanggal");
    }

    function totalhits(){
        return $this->db->query("SELECT SUM(hits) as total FROM statistik");
    }

    function pengunjungonline(){
        $bataswaktu       = time() - 300;
        return $this->db->query("SELECT * FROM statistik WHERE online > '$bataswaktu'");
    }
	
	/*---------------------Download---------------------->*/
	public function getPortofolio(){
	return $query=$this->db	->order_by('id','ASC')
							->limit(12)
							->get('download')
							->result_array();
										
	}

	function getConfig(){
		return $this->db->where('id_config',1)
					    ->get('setting');
	}
	
	//konversi Tanggal Dan Waktu Ke Indonesia
	public function tgl_sql($date){
		$exp = explode('-',$date);
		if(count($exp) == 3) {
			$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
		}
		return $date;
	}
	
	function dd_status(){
		$dd['']='---Status---';
		$dd['1']= 'Publish';
		$dd['0']= 'Not&nbsp;Publish';
		return $dd;
	}

}
