<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Faq_model extends CI_Model {
   
	public function get_all_faq(){
		return 	$this->db->order_by('id','desc')
						 ->get('faq')
						 ->result_array();
	
	}
	public function get_faq_by_id($id){
        $this->db->where('id',$id);
        $query = $this->db->get('faq');
        return $query->result();
    }
    function add($data){
        $query = $this->db->insert('faq',$data);
        return $query;
    }
	
    function update($id,$data){
        $this->db->where('id',$id);
        $update = $this->db->update('faq',$data);
        return $update;
    }

    function hapus($id){
        $this->db->where('id',$id);
        $delete = $this->db->delete('faq');
        return $delete;
    }
	function kode_otomatis()
    {
        $q = $this->db->query("select MAX(RIGHT(id,1)) as kode_max from faq");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kode_max)+1;
                $kd = sprintf("%01s", $tmp);
            }
        }
        else
        {
            $kd = "1";
        }
		return "collapse".$kd;
		
    }
}
