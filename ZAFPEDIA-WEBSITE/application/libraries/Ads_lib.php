<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ads_lib {

	protected $CI;
	public $top;
	public $bottom;
	
	public function __construct(){
		$this->CI =& get_instance();


		$utama=$this->CI->db->query("SELECT * FROM iklan_child WHERE status='1' AND type='1' ORDER BY id_iklan ASC ");
		$this->top=$utama->result_array();

		$side=$this->CI->db->query("SELECT * FROM iklan_child WHERE status='1' AND type='2'  ORDER BY id_iklan ASC ");
		$this->bottom=$side->result_array();
	}

	public function getTopIklan()
    {
        $query = $this->CI->db->query("SELECT * FROM iklan_child WHERE status='1' AND type='1' ORDER BY id_iklan ASC limit 1");
        return $query;
    }

	public function getBottomIklan()
    {
        $query = $this->CI->db->query("SELECT * FROM iklan_child WHERE status='1' AND type='2' ORDER BY id_iklan ASC limit 1");
        return $query;
    }
}