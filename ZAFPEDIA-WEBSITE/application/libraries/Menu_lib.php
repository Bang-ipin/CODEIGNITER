<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_lib {

	protected $CI;
	public $primary;
	public $sidebar;
	public $footer1;
	public $footer2;
	public $footer3;
	public $footer4;


	public function __construct(){
		$this->CI =& get_instance();


		$utama=$this->CI->db->query("SELECT * FROM menu WHERE status='1' AND menu_parent='0' AND type='1' ORDER BY posisi ASC ");
		$this->primary=$utama->result_array();

		$side=$this->CI->db->query("SELECT * FROM menu WHERE status='1' AND menu_parent='0' AND type='2'  ORDER BY posisi ASC ");
		$this->sidebar=$side->result_array();
		
		$one=$this->CI->db->query("SELECT * FROM menu WHERE status='1' AND menu_parent='0' AND type='3'  ORDER BY posisi ASC ");
		$this->footer1=$one->result_array();
		
		$two=$this->CI->db->query("SELECT * FROM menu WHERE status='1' AND menu_parent='0' AND type='4'  ORDER BY posisi ASC ");
		$this->footer2=$two->result_array();
		
		$tri=$this->CI->db->query("SELECT * FROM menu WHERE status='1' AND menu_parent='0' AND type='5'  ORDER BY posisi ASC ");
		$this->footer3=$tri->result_array();
		
		$four=$this->CI->db->query("SELECT * FROM menu WHERE status='1' AND menu_parent='0' AND type='6'  ORDER BY posisi ASC ");
		$this->footer4=$four->result_array();
	}

	public function getPrimaryMenu()
    {
        $query = $this->CI->db->query("SELECT * FROM menu WHERE status='1' AND type='1' AND menu_parent IN('0') ORDER BY posisi ASC");
        return $query;
    }

	public function getSidebarMenu()
    {
        $query = $this->CI->db->query("SELECT * FROM menu WHERE status='1' AND type='2' AND menu_parent IN('0') ORDER BY posisi ASC");
        return $query;
    }
	public function getFooterMenu1()
    {
        $query = $this->CI->db->query("SELECT * FROM menu WHERE status='1' AND type='3' AND menu_parent IN('0') ORDER BY posisi ASC");
        return $query;
    }
	public function getFooterMenu2()
    {
        $query = $this->CI->db->query("SELECT * FROM menu WHERE status='1' AND type='4' AND menu_parent IN('0') ORDER BY posisi ASC");
        return $query;
    }
	public function getFooterMenu3()
    {
        $query = $this->CI->db->query("SELECT * FROM menu WHERE status='1' AND type='5' AND menu_parent IN('0') ORDER BY posisi ASC");
        return $query;
    }
	public function getFooterMenu4()
    {
        $query = $this->CI->db->query("SELECT * FROM menu WHERE status='1' AND type='6' AND menu_parent IN('0') ORDER BY posisi ASC");
        return $query;
    }

	public function getMenuChild($param = 0)
    {
        $query = $this->CI->db->query("SELECT * FROM menu WHERE menu_parent IN('{$param}') ORDER BY posisi ASC");
        return $query;
    }

    public function updatestructure($param = 0)
    {
        //Creating from_db unnested array
        $from_db = array();
        $query = $this->CI->db->query("SELECT * FROM menu WHERE menu_parent != '0'");
        foreach($query->result() as $row):
            $from_db[$row->id_menu] = ['parent'=>$row->menu_parent,'order'=>$row->posisi];
        endforeach;
        //Creating the post_db unnested array
        $post_db = array();
        $array = json_decode($_POST['output']);
        $post_db = $this->run_array_parent($array,'0');
        //Comparing the arrays and adding changed values to $to_db
        $to_db =array();
        foreach($post_db as $key => $value):
        
            if( !array_key_exists($key,$from_db) || ($from_db[$key]['parent'] != $value['parent']) || ($from_db[$key]['order'] !=$value['order']))
            {
                $to_db[$key] = $value;
            }  
       endforeach;
        // Generate Query
        if (count($to_db) > 0)
        {
            $query          = "UPDATE menu";
            $query_parent   = " SET menu_parent = CASE id_menu";
            $query_order    = " posisi = CASE id_menu";
            $query_ids      = " WHERE id_menu IN (".implode(", ",array_keys($to_db)).")";
            foreach ($to_db as $id => $value):
                $query_parent .= " WHEN ".$id." THEN ".$value['parent'];
                $query_order  .= " WHEN ".$id." THEN ".$value['order'];
            endforeach;
            $query_parent .= " END,";
            $query_order  .= " END";
            $query = $query.$query_parent.$query_order.$query_ids;
            //Executing query
            $this->CI->db->query($query);
        }
    }

    private function run_array_parent($array, $parent){  
        $post_db = array();    
        foreach(@$array as $head => $body)
        {
            if(isset($body->children))
            {
                $head++;
                $post_db[$body->id] = ['parent'=>$parent,'order'=>$head];
                $post_db 			= $post_db + $this->run_array_parent($body->children, $body->id);
            } else {
                $head++;
                $post_db[$body->id] = ['parent'=>$parent,'order'=>$head];
            }
        }
        return $post_db;
    }
}