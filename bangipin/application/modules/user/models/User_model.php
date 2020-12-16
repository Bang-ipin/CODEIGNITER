<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {
	
	public function get_all_user(){
		return 	$this->db->get('admin')
						 ->result_array();
	
	}
	
	public function tambah_user($data){
		$query= $this->db->insert('admin', $data);
		return $query;
	}
	
	public function update_user($id, $data){
		$this->db->where('username', $id);
		$update=$this->db->update('admin',$data);
		return $update;
	}
	
	public function hapus($id){
		$this->db->where('username', $id);
		$query= $this->db->delete('admin');
		return $query;
	}
	
	public function dd_statusss($table,$field){
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
	
	function update_password($pass_new){
		$dt['password'] = sha1($pass_new);
		return $this->db->where('username',$this->session->userdata('username'))
						->update('admin',$dt);
	}
	function cek_password($pass){
		return $this->db->select('username')
						->where('password', sha1($pass))
						->where('username',$this->session->userdata('username'))
						->limit(1)
						->get('admin');
	}
	public function dd_level(){
	$this->db->order_by('id_level');
	$query=$this->db->get('level');
	$dd['']='---Select level---';
	if($query->num_rows()>0){
		foreach($query->result() as $row){
			$dd[$row->id_level]= $row->level;
			}
		}
		return $dd;
	}
}		   
        