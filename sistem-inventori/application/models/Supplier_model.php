<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Supplier_model extends CI_Model {
   
	public function __construct() {
		parent::__construct();
			$this->load->database();
		}
	public function get_all_supplier(){
	return $this->db->order_by('kode_supplier','asc')
					->get('master_supplier')
					->result();

	}
	

	function get_supplier_by_id($id){
		$this->db->where('kode_supplier',$id);
		$query=$this->db->get('master_supplier');
		return $query->result();
		}
	function tambah_supplier($data){
		$query=$this->db->insert('master_supplier',$data);
		return $query;
	}
	function update_supplier($id,$data){
	$this->db->where('kode_supplier',$id);
	$this->db->update('master_supplier',$data);
	}
	
    function delete_supplier($id){
        $this->db->where('kode_supplier',$id);
        $delete = $this->db->delete('master_supplier');
        return $delete;
    }
	
	//    KODE BARANG
    function get_kode_supplier()
    {
        $q = $this->db->query("select MAX(RIGHT(kode_supplier,4)) as kode_max from master_supplier");
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
        return "SP-".$kd;
    }
}
