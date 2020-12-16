<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product_model extends CI_Model {
	
	public function get_all_produk(){
		return 	$this->db->join('kategori_produk b','a.kode_kategori = b.kode_kategori')
						 ->order_by('id','desc')
						 ->get('produk a')
						 ->result_array();
	
	}
	
	public function cari_produk($search=null){
		return 	$this->db->join('kategori_produk b','a.kode_kategori = b.kode_kategori')
						 ->order_by('id','DESC')
						 ->get('produk a');
						
				
	}
	public function get_produk_by_id($id){
        $this->db->where('id',$id);
        $query = $this->db->get('produk');
        return $query->result();
    }
    function add_produk($data){
        $query = $this->db->insert('produk',$data);
        return $query;
    }

    function update_produk($id,$data){
        $this->db->where('id',$id);
        $update = $this->db->update('produk',$data);
        return $update;
    }

    function hapus_produk($id){
        $this->db->where('id',$id);
        $delete = $this->db->delete('produk');
        return $delete;
    }
	
	//KODE BARANG
    function get_kode_barang()
    {
        $q = $this->db->query("select MAX(RIGHT(kode_barang,4)) as kode_max from produk");
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
		return "BAR-".$kd;
		
    }

	function get_kode_rupiah()
	{
		$q = $this->db->query("select harga as kode_max from produk");
		$kd = "";
		if($q->num_rows()>0)
		{
			foreach($q->result() as $k)
			{
				$tmp = ((int)$k->kode_max);
				$kd = sprintf("%", $tmp);
			}
		}
		else
		{
			$kd = "";
		}
		return "Rp. ".$kd;
		
	}
	
	function lihat_sub_category($id) {
        $this->db->where('parent_id',$id);
        $query = $this->db->get('kategori_produk');
        return $query->result();
    }
    function lihat_sub_atribut($id) {
		$this->db->where('parent_id',$id);
		$query = $this->db->get('atribut');
		return $query->result();
	}
}