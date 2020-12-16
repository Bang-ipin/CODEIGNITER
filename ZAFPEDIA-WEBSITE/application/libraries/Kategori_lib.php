<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sidebar_lib {

	protected $CI;
	public function __construct(){
		$this->CI =& get_instance();
	}

	public function kategori_blog()
    {
        $query = $this->CI->db->query("SELECT * FROM kategori WHERE status='1' ORDER BY posisi ASC");
        return $query;
    }

	public function getSidebarMenu()
    {
        $query = $this->CI->db->query("SELECT * FROM menu WHERE status='1' AND type='2' AND menu_parent IN('0') ORDER BY posisi ASC");
        return $query;
    }
	public function tag_blog
    {
        $query = $this->CI->db->query("SELECT * FROM tags WHERE status='1' AND relasi='1' ORDER BY posisi ASC");
        return $query;
    }
	public function tag_produk()
    {
        $query = $this->CI->db->query("SELECT * FROM tags WHERE status='1' AND relasi='2' ORDER BY posisi ASC");
        return $query;
    }

}