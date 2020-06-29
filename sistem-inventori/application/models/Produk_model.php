<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Produk_model extends CI_Model {
   
	public function __construct() {
		parent::__construct();
			$this->load->database();
		}
	public function get_all_produk(){
		return 	$this->db->join('master_kategori b','a.kode_kategori = b.kode_kategori')
						 ->join('master_jenisbarang c','a.id_jenis = c.id_jenis')
						 ->join('satuan d','a.id_satuan= d.id_satuan')
						 ->order_by('kode_barang','desc')
						 ->get('master_barang a')
						 ->result();
	
	}
	public function get_Barang_Toko1(){
		return 	$this->db->join('master_kategori b','a.kode_kategori = b.kode_kategori')
						 ->join('master_jenisbarang c','a.id_jenis = c.id_jenis')
						 ->join('satuan d','a.id_satuan= d.id_satuan')
						 ->order_by('kode_barang','desc')
						 ->get('stok_toko a')
						 ->result();
	
	}
	
	public function get_barang_by_id($id){
        $this->db->where('kode_barang',$id);
        $query = $this->db->get('master_barang');
        return $query->result();
    }
	public function get_barang1_by_id($id){
        $this->db->where('kode_barang',$id);
        $query = $this->db->get('stok_toko');
        return $query->result();
    }
	
//    INSERT DATA

    function tambah_barang($data){
        $query = $this->db->insert('master_barang',$data);
        return $query;
    }
	function add_stock($data){
        $query = $this->db->insert('stok_toko',$data);
        return $query;
    }
	
//    UPDATE DATA
    function update_produk($id,$data){
        $this->db->where('kode_barang',$id);
        $update = $this->db->update('master_barang',$data);
        return $update;
    }
	
	function update_produk1($id,$data){
        $this->db->where('kode_barang',$id);
        $update = $this->db->update('stok_toko',$data);
        return $update;
    }

//    DELETE DATA
    function delete_produk($id){
        $this->db->where('kode_barang',$id);
        $delete = $this->db->delete('master_barang');
        return $delete;
    }
	function delete_produk1($id){
        $this->db->where('kode_barang',$id);
        $delete = $this->db->delete('stok_toko');
        return $delete;
    }
//    KODE BARANG
    function get_kode_barang()
    {
        $q = $this->db->query("select MAX(RIGHT(kode_barang,4)) as kode_max from master_barang");
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
	
	function kode_barang_toko1()
    {
        $q = $this->db->query("select MAX(RIGHT(kode_barang,4)) as kode_max from stok_toko");
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
			$q = $this->db->query("select harga_barang as kode_max from master_barang");
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
	
	function dd_kategori_produk(){
	$this->db->order_by('kode_kategori');
	$query=$this->db->get('master_kategori');
	$dd['']='---Select Category---';
	if($query->num_rows()>0){
		foreach($query->result() as $row){
			$dd[$row->kode_kategori]= $row->kategori;
			}
		}
		return $dd;
	}
	
	function dd_jenis_produk(){
	$this->db->order_by('id_jenis');
	$query=$this->db->get('master_jenisbarang');
	$dd['']='---Select Jenis---';
	if($query->num_rows()>0){
		foreach($query->result() as $row){
			$dd[$row->id_jenis]= $row->jenis_barang;
			}
		}
		return $dd;
	}
	
	function dd_satuan_produk(){
	$this->db->order_by('id_satuan');
	$query=$this->db->get('satuan');
	$dd['']='---Satuan---';
	if($query->num_rows()>0){
		foreach($query->result() as $row){
			$dd[$row->id_satuan]= $row->nama_satuan;
			}
		}
		return $dd;
	}
	
	function dd_keterangan($table,$field){
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
	
	public function do_upload()
        {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|jpeg|png|bmp';
            $config['file_name']            = 'gambar-'.trim(str_replace("","",date('dmYHis')));
			$config['max_width']            = 1024;
            $config['max_height']           = 768;
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('gambar'))
            {	
				$this->form_validation->set_message('upload_image',$this->upload->display_errors());
		        return false;
			}
            else
            {
				$data = array('upload_data' => $this->upload->data());
				return $data; 
            }
		}
}
