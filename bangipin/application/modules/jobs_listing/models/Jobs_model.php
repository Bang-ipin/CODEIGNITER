<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Jobs_model extends CI_Model {
	
	public function get_all_pekerjaan(){
		return 	$this->db->join('kategori_pekerjaan b','a.kode_kategori = b.kode_kategori')
						 ->order_by('id','desc')
						 ->get('pekerjaan a')
						 ->result_array();
	
	}
	
	public function cari_pekerjaan($search=null){
		return 	$this->db->join('kategori_pekerjaan b','a.kode_kategori = b.kode_kategori')
						 ->order_by('id','DESC')
						 ->get('pekerjaan a');
						
				
	}
	public function get_pekerjaan_by_id($id){
        $this->db->where('id',$id);
        $query = $this->db->get('pekerjaan');
        return $query->result();
    }
    function add($data){
        $query = $this->db->insert('pekerjaan',$data);
        return $query;
    }

    function update($id,$data){
        $this->db->where('id',$id);
        $update = $this->db->update('pekerjaan',$data);
        return $update;
    }

    function hapus($id){
        $this->db->where('id',$id);
        $delete = $this->db->delete('pekerjaan');
        return $delete;
    }
	
	//KODE BARANG
    function get_kode_pekerjaan()
    {
        $q = $this->db->query("select MAX(RIGHT(kode_pekerjaan,4)) as kode_max from pekerjaan");
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
		return "JOB-".$kd;
		
    }

	function get_kode_rupiah()
	{
		$q = $this->db->query("select gajiminimum as kode_max from pekerjaan");
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
	function dd_kategori_pekerjaan(){
		$this->db->where('parent_id',0);
		$this->db->where('status',1);
		$this->db->order_by('kode_kategori','ASC');
		$query=$this->db->get('kategori_pekerjaan');
		$dd[]='';
		if($query->num_rows()> 0){
			foreach($query->result() as $row){
				$dd[$row->kode_kategori]= $row->kategori;
				}
			}
			return $dd;
	}
	function dd_provinsi(){
		$this->db->order_by('id_propinsi','ASC');
		$query=$this->db->get('provinsi');
		$dd['']='Pilih Provinsi';
		if($query->num_rows()> 0){
			foreach($query->result() as $row){
				$dd[$row->id_propinsi]= $row->nama_propinsi;
				}
			}
			return $dd;
	}
	/* public function get_city(){
		$dd['']='Pilih Kota/Kab';
		return $dd; 
	} */
	public function get_city($slug=FALSE){	 
		if($slug === FALSE){
			$dd['']='Pilih Kota/Kab';
			return $dd; 
		}
		$query=$this->db ->where('id_kabkota',$slug)
								->get('kota');
		$dd['']='Pilih Kota/Kab';
		if($query->num_rows()> 0){
			foreach($query->result() as $row){
				$dd[$row->id_kabkota]= $row->nama_kabkota;
				}
			}
			return $dd;
	}
	
	function dd_kabupaten($provinsi_id){
		$this->db->where('id_propinsi',$provinsi_id);
		$this->db->order_by('id_kabkota','ASC');
		$query=$this->db->get('kota');
		//$dd['']='Pilih Kota/Kab';
		if($query->num_rows()> 0){
			foreach($query->result() as $row){
				//$dd[$row->id_kabkota]= $row->nama_kabkota;
				echo "<option value='".$row->id_kabkota."'>".$row->nama_kabkota."</option>";
				}
			}
			//return $dd;
	}
	function dd_level_pendidikan(){
		$this->db->order_by('id','ASC');
		$query=$this->db->get('pendidikan');
		$dd['']='-- Lulusan --';
		if($query->num_rows()>0){
			foreach($query->result() as $row){
				$dd[$row->id]= $row->pendidikan;
				}
			}
			return $dd;
	}
	function dd_status(){
		$dd['']='---Status---';
		$dd['1']= 'Publish';
		$dd['0']= 'Not&nbsp;Publish';
		return $dd;
	}
	
	function dd_label(){
	$dd['']='---Label---';
	$dd['0']= 'Freelance';
	$dd['1']= 'Full Time';
	$dd['2']= 'Part Time';
	return $dd;
	}
	
	function lihat_sub_category($id) {
        $this->db->where('parent_id',$id);
        $query = $this->db->get('kategori_pekerjaan');
        return $query->result();
    }
    function lihat_sub_atribut($id) {
		$this->db->where('parent_id',$id);
		$query = $this->db->get('atribut');
		return $query->result();
	}
	public function tgl_sql($date){
		$exp = explode('-',$date);
		if(count($exp) == 3) {
			$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
		}
		return $date;
	}
	public function tgl_str($date){
		$exp = explode('-',$date);
		if(count($exp) == 3) {
			$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
		}
		return $date;
	}
	public function Selisih($id){

         date_default_timezone_set('Asia/Jakarta');
		$t = "SELECT *,DATEDIFF(DATE_ADD(batas_waktu, INTERVAL 0 DAY), CURDATE()) as selisih FROM pekerjaan WHERE id='$id'";
		$d = $this->db->query($t);
		$r = $d->num_rows();
		if($r>0){
			foreach($d->result() as $h){
				$hasil = $h->selisih;
			}
		}else{
			$hasil = 0;
		}
		return $hasil;
	}
}