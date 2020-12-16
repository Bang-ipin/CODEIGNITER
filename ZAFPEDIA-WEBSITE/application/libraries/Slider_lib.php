<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_lib
{
	protected $CI;
	public $primary;
	public $secondary;
	
	public function __construct(){
		$this->CI =& get_instance();
		
		$top=$this->CI->db->query("SELECT * FROM slider where status=1 AND tipe=1 ORDER BY posisi limit 5");
		$this->primary=$top->result_array();
		
		$bottom=$this->CI->db->query("SELECT * FROM slider where status=1 AND tipe=0 ORDER BY posisi limit 5");
		$this->secondary=$bottom->result_array();
		
	}
	
	public function get_slider_top(){
		return $this->CI->db->query("SELECT * FROM slider where status=1 AND tipe=1 ORDER BY posisi limit 5")->result_array();
	}
	
	public function get_slider_bottom(){
		return $this->CI->db->query("SELECT * FROM slider where status=1 AND tipe=0 ORDER BY posisi limit 5")->result_array();
	}
	
	public function get_countsliderTop(){
		return $this->CI->db->query("select count(*) from slider where status=1 AND tipe=1 order by posisi limit 5")->result();
	}
	public function get_countsliderBottom(){
		return $this->CI->db->query("select count(*) from slider where status=1 AND tipe=0 order by posisi limit 5")->result();
	}
	
}