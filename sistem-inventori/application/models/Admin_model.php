<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_model extends CI_Model {
   
	public function __construct() {
		parent::__construct();
			$this->load->database();
		}
	
	public function get_all_user(){
	return $this->db->join('usergroup b','a.id_usergroup = b.id_usergroup')
				->order_by('id_user','asc')
				->get('user_akses a')
				->result();
	}
		
	
	public function get_user_by_id($id){
        $this->db->where('id_user',$id);
        $query = $this->db->get('user_akses');
        return $query->result();
    }
	public function tambah_user($data){
		$query= $this->db->insert('user_akses', $data);
		return $query;
	}
	public function update($id, $data){
		$this->db->where('id_user', $id);
		$update=$this->db->update('user_akses',$data);
		return $update;
	}
	
	public function delete($id){
		$this->db->where('id_user', $id);
		$query= $this->db->delete('user_akses');
		return $query;
	}
	
	public function get_option(){
	$this->db->select('*');
	$this->db->from('usergroup');
	$query=$this->db->get();
	return $query->result();
	}
	
	public function dd_usergroup(){
	$this->db->order_by('id_usergroup');
	$query=$this->db->get('usergroup');
	$dd['']='---Select level---';
	if($query->num_rows()>0){
		foreach($query->result() as $row){
			$dd[$row->id_usergroup]= $row->usergroup;
			}
		}
		return $dd;
	}
	
	public function dd_status($table,$field){
	$query= "SHOW COLUMNS FROM {$table} LIKE '{$field}' ";
	$row=$this->db->query($query)->row()->Type;
	$regex= "/'(.*?)'/";
	$enums['']='---Pilih---';
	preg_match_all($regex,$row,$enum_array);
	$enum_field=$enum_array[1];
		foreach($enum_field as $key =>$value){
			$enums[$value]= $value;
			}
	return $enums;
	}
	
	public function id_otomatis()
    {
       $this->db->select('RIGHT(user_akses.id_user,2) as kode',FALSE);
	   $this->db->order_by('id_user','DESC');
	   $this->db->limit(1);
	   $query = $this->db->get('user_akses');
        if($query->num_rows()<>0)
        {
            $data=$query->row();
			$kode=intval($data->kode)+1;
		}else
		{
        $kode=1;
        }$kodemax=str_pad($kode,2,"0",STR_PAD_LEFT);
        $kdjadi =$kodemax;
        return "".$kdjadi;
		
    }

	function update_password($pass_new){
		$dt['password'] = sha1($pass_new);
		return $this->db->where('id_user', $this->session->userdata('id_user'))
						->update('user_akses', $dt);
	}
	function cek_password($pass){
		return $this->db->select('id_user')
						->where('password', sha1($pass))
						->where('id_user', $this->session->userdata('id_user'))
						->limit(1)
						->get('user_akses');
	}
}		   
        