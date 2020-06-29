<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pelanggan_model extends CI_Model {
   
	public function __construct() {
		parent::__construct();
			$this->load->database();
		}
	public function get_all_pelanggan(){
	return $this->db->order_by('id_pelanggan','asc')
					->get('pelanggan')
					->result();
	}
	
	
	function get_pelanggan_by_id($id){
		$this->db->where('id_pelanggan',$id);
		$query=$this->db->get('pelanggan');
		return $query->result();
		}
	function tambah_pelanggan($data){
		$query=$this->db->insert('pelanggan',$data);
		return $query;
	}
	function update_pelanggan($id,$data){
	$this->db->where('id_pelanggan',$id);
	$this->db->update('pelanggan',$data);
	}
	
    function delete_pelanggan($id){
        $this->db->where('id_pelanggan',$id);
        $delete = $this->db->delete('pelanggan');
        return $delete;
    }
	
	//    KODE Pelanggan
    function get_id_pelanggan()
    {
        $q = $this->db->query("select MAX(RIGHT(id_pelanggan,4)) as kode_max from pelanggan");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kode_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }
        else
        {
            $kd = "0001";
        }
        return "PL-".$kd;
    }
}
