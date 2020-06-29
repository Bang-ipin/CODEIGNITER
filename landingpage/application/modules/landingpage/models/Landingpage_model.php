<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Landingpage_model extends CI_Model{
	
	function Get_Data(){
		$data = array();
		$this->db->order_by("id", "DESC");
		$this->db->select("id,judul,deskripsi,link,text_link,bghome,fonticon1,deskripsi1,title_features1,deskripsi1,link1,text_link1,fonticon2,title_features2,deskripsi2,link2,text_link2,fonticon3,title_features3,deskripsi3,link3,text_link3,appicon1,appfeatures1,appdeskripsi1,appicon2,appfeatures2,appdeskripsi2,appicon3,appfeatures3,appdeskripsi3,appicon4,appfeatures4,appdeskripsi4,imageapp,judulvideo,deskripsivideo,backgroundvideo,idyoutube");
		$this->db->limit(1);
		$q = $this->db->get('landingpage');
		  if($q->num_rows() > 0)
		  {
		  	$data = $q->row_array();
		  }else{
			  $data = $q->free_result();
		  }
		$q->free_result();
		return $data;
	}
	function add($data){
		$this->db->insert("landingpage",$data);
	}
	
	function update($id,$data){
		$this->db->where("id",$id);
		$this->db->update("landingpage",$data);
	}
	function kode_otmts()
    {
        $q = $this->db->query("select MAX(RIGHT(id,1)) as kode_max from landingpage");
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
		return $kd;
		
    }
	
	public function get_all_gallery(){
		return 	$this->db->order_by('id','desc')
						 ->get('gallery')
						 ->result_array();
	
	}
	public function get_all_testimoni(){
		return 	$this->db->order_by('id','desc')
						 ->get('testimoni')
						 ->result_array();
	
	}
}
