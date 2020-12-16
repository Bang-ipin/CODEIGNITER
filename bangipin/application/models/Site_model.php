<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site_model extends CI_Model {
	
	function insertdata($tabel, $data){
		
		return $this->db->insert($tabel,$data);
	}
	public function getSelectedData($table,$id){
        return $this->db->get_where($table, $id);
    }
	
	function getPage($where= ''){
		return $this->db->query("SELECT * FROM laman $where;");
	}
	function getCategory($where= ''){
		return $this->db->query("SELECT * FROM kategori $where;");
	}
	function getMenu($where= ''){
		return $this->db->query("SELECT * FROM menu $where;");
		
	}
	function getLokasi(){
		return $this->db->query("SELECT * FROM lokasi");
	}
	
	function getTags(){
		return $this->db->get('tags')
						->result_array();
	}
	/*---------------------Visitor---------------------->*/
	function kunjungan(){
        $ip      = $_SERVER['REMOTE_ADDR'];
        $tanggal = date("Y-m-d H:i:s");
        $waktu   = time(); 
        if ($this->agent->is_browser()){
			$agent = $this->agent->browser().' '.$this->agent->version();
		}elseif ($this->agent->is_mobile()){
			$agent = $this->agent->mobile();
		}else{
			$agent = 'Data user gagal di dapatkan';
		}
        $cekk = $this->db->query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
        $rowh = $cekk->row_array();
        if($cekk->num_rows() == 0){
            $datadb = array('ip'=>$ip, 'tanggal'=>$tanggal, 'hits'=>'1', 'online'=>$waktu, 'user_agent'=>$agent);
            $this->db->insert('statistik',$datadb);
        }else{
            $hitss = $rowh['hits'] + 1;
            $datadb = array('ip'=>$ip, 'tanggal'=>$tanggal, 'hits'=>$hitss, 'online'=>$waktu, 'user_agent'=>$agent);
            $array = array('ip' => $ip, 'tanggal' => $tanggal);
            $this->db->where($array);
            $this->db->update('statistik',$datadb);
        }
    }
	
	function grafik_kunjungan(){
        return $this->db->query("SELECT count(*) as jumlah, tanggal FROM statistik GROUP BY tanggal ORDER BY tanggal DESC LIMIT 10");
    }

    function pengunjung(){
        return $this->db->query("SELECT * FROM statistik WHERE tanggal='".date("Y-m-d")."' GROUP BY ip");
    }

    function totalpengunjung(){
        return $this->db->query("SELECT COUNT(hits) as total FROM statistik");
    }

    function hits(){
        return $this->db->query("SELECT SUM(hits) as total FROM statistik WHERE tanggal='".date("Y-m-d")."' GROUP BY tanggal");
    }

    function totalhits(){
        return $this->db->query("SELECT SUM(hits) as total FROM statistik");
    }

    function pengunjungonline(){
        $bataswaktu       = time() - 300;
        return $this->db->query("SELECT * FROM statistik WHERE online > '$bataswaktu'");
    }
	
	/*---------------------IKLAN---------------------->*/
	public function getIklanTop1(){	 
	return $this->db	->where('status',1)
						->where('tipe',1)
						->order_by('id_iklan','asc')
						->limit(1)
						->get('iklan_child')
						->result_array();
		
	}
	public function getIklanTop2(){	 
	return $this->db	->where('status',1)
						->where('tipe',1)
						->order_by('id_iklan','DESC')
						->limit(1)
						->get('iklan_child')
						->result_array();
		
	}
	/*---------------------IKLAN---------------------->*/
	public function getIklanBottom(){	 
	return $this->db	->where('status',1)
						->where('tipe',2)
						->order_by('id_iklan','asc')
						->limit(1)
						->get('iklan_child')
						->result_array();
		
	}
	
	/*---------------------Blog---------------------->*/
	public function get_blog(){
	return $query=$this->db	->where('status',1)
								->order_by('id','DESC')
								->get('blog')
								->result_array();
										
	}
	public function get_all_blog($start,$limit){
	return $query=$this->db	->where('status',1)
								->order_by('id','ASC')
								->limit($start,$limit)
								->get('blog')
								->result_array();
										
	}
	public function search_all_blog($key,$start,$limit){
		return $this->db		->or_like($key)
								->limit($start,$limit)
								->get('blog')
								->result_array();
										
	}
	
	public function get_artikel_by_tag($slug,$start,$limit){
		return $this->db->query("SELECT * FROM blog WHERE status=1 AND tag LIKE '%$slug%' order by id ASC limit $limit,$start")->result_array();
	}
	public function get_artikel_by_id($slug,$start,$limit){
		return $query=$this->db	->where('status',1)
								->where('kategori',$slug)
								->order_by('id','ASC')
								->limit($start,$limit)
								->get('blog')
								->result_array();
										
	}
	
	public function get_detail_artikel($slug){
		return $query=$this->db	->where('status',1)
								->where('judul_seo',$slug)
								->order_by('id','ASC')
								->get('blog')
								->row_array();
										
	}
	public function count_all_blog(){
		$query=$this->db->where('status',1)
						->get('blog')
						->num_rows();
		return $query;
	}
	public function count_all_search_blog($key){
		return $this->db	->or_like($key)
							->get('blog')
							->num_rows();
	}
	public function count_blog_by_tag($slug){
		$query=$this->db->where('status',1)
						->where('tag',$slug)
						->get('blog')
						->num_rows();
		return $query;
	}
	public function count_blog_by_id($slug){
		$query=$this->db->where('status',1)
						->where('kategori',$slug)
						->get('blog')
						->num_rows();
		return $query;
	}
	/*---------------------Download---------------------->*/
	public function get_all_data_download($start,$limit){
	return $query=$this->db	->order_by('id','ASC')
							->limit($start,$limit)
							->get('download')
							->result_array();
										
	}
	function updatehitsdownload($id){
        return $this->db->query("UPDATE download set hits=hits+1 where id='$id'");
    }
	public function count_all_data_download(){
		$query=$this->db->get('download')
						->num_rows();
		return $query;
	}
	
	/*---------------------GALERI---------------------->*/
	public function get_all_data_galeri($start,$limit){
	return $query=$this->db	->order_by('id','ASC')
							->limit($start,$limit)
							->get('gallery')
							->result_array();
										
	}
	
	public function count_all_data_galeri(){
		$query=$this->db->get('gallery')
						->num_rows();
		return $query;
	}
	
	public function GetParentKategori(){	 
		return $this->db->where('status',1)
						->order_by('posisi','asc')
						->get('kategori');
										
	}
	public function FilterBlogByKategori($slug){
	return $query=$this->db		->where('status',1)
								->where('kategori_seo',$slug)
								->get('kategori')
								->row_array();
	}
	public function FilterBlogByTags($slug){
	return $this->db->query("SELECT * FROM blog WHERE tag IN ($slug) ")->row_array();										
	}
	
	function komentar_blog($data){
		return $this->db->insert('komentar',$data);
	}
	function getKomentarBlogId($id){
		return $this->db->where('blogid',$id)
						->where('komentar_id',0)
					    ->where('status',0)
						->where('disetujui',1)
					    ->order_by('id','ASC')
					    ->get('komentar')
						->result_array();
	}
	public function count_all_komentar_blog($slug){
		$query=$this->db->where('blogid',$slug)
						->where('disetujui',1)
						->get('komentar')
						->num_rows();
		return $query;
	}
	
	/*------------------ABOUT------------------------*/
	public function get_about_data(){
		return $query=$this->db	->get('about')
								->result_array();
										
	}
	/*------------------FAQ------------------------*/
	public function get_faq_data(){
		return $query=$this->db	->get('faq')
								->result_array();
										
	}

	/*---------------------MAPS---------------------->*/
	function _get_kota_by_id($id){
		return $this->db->where('provinsi',$id)
						->get('lokasi');
		
	}

	function getConfig(){
		return $this->db->where('id_config',1)
					    ->get('setting');
	}
	
	public function CariTag($id){

		$t = "SELECT * FROM tags WHERE tag_seo='$id'";

		$d = $this->db->query($t);

		$r = $d->num_rows();

		if($r>0){

			foreach($d->result() as $h){

				$hasil = $h->id;

			}

		}else{

			$hasil = '';

		}

		return $hasil;

	}
	public function CariNamaTag($id){

		$t = "SELECT * FROM tags WHERE tag_seo='$id'";

		$d = $this->db->query($t);

		$r = $d->num_rows();

		if($r>0){

			foreach($d->result() as $h){

				$hasil = $h->tag;

			}

		}else{

			$hasil = '';

		}

		return $hasil;

	}
	public function CariTemplate($id){

		$t = "SELECT * FROM laman WHERE laman_seo='$id'";

		$d = $this->db->query($t);

		$r = $d->num_rows();

		if($r>0){

			foreach($d->result() as $h){

				$hasil = $h->layout;

			}

		}else{

			$hasil = '';

		}

		return $hasil;

	}
	
	public function nilai_votes($id){

		$t = "SELECT AVG(votes) AS jml FROM komentar WHERE blogid='$id'";

		$d = $this->db->query($t);

		$r = $d->num_rows();

		if($r>0){

			foreach($d->result() as $h){

				$hasil = $h->jml;

			}

		}else{

			$hasil = '';

		}

		return $hasil;

	}
	
	public function CariTitleTag($id){

		$t = "SELECT * FROM tags WHERE tag_seo='$id'";

		$d = $this->db->query($t);

		$r = $d->num_rows();

		if($r>0){

			foreach($d->result() as $h){

				$hasil = $h->tag;

			}

		}else{

			$hasil = '';

		}

		return $hasil;

	}
	/*---------------------DROPDOWN---------------------->*/
	function dd_gender(){
		$dd['']='---Choose---';
		$dd['1']= 'Pria';
		$dd['0']= 'Wanita';
		return $dd;
	}
	
	function dd_itemshow(){
		$dd['9']	= '9';
		$dd['24']	= '24';
		$dd['50']	= '50';
		$dd['75']	= '75';
		$dd['100']	= '100';
		return $dd;
	}
	
	function dd_tag_produk(){
	$this->db->order_by('id','ASC');
	$query=$this->db->get('tags');
	$dd[]='';
	if($query->num_rows()>0){
		foreach($query->result() as $row){
			$dd[$row->id]= $row->tag;
			}
		}
		return $dd;
	}
	
	function dd_favorit(){
	$dd['']='---Status---';
	$dd['1']= 'Ya';
	$dd['0']= 'Tidak';
	return $dd;
	}
	
	function dd_keterangan($table,$field){
	$query= "SHOW COLUMNS FROM {$table} LIKE '{$field}' ";
	$row=$this->db->query($query)->row()->Tipe;
	$regex= "/'(.*?)'/";
	$enums['']='---Pilih---';
	preg_match_all($regex,$row,$enum_array);
	$enum_field=$enum_array[1];
		foreach($enum_field as $key =>$value){
			$enums[$value]= $value;
			}
	return $enums;
	}
	
	//konversi Tanggal Dan Waktu Ke Indonesia
	public function tgl_sql($date){
		$exp = explode('-',$date);
		if(count($exp) == 3) {
			$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
		}
		return $date;
	}
	
	function dd_status(){
		$dd['']='---Status---';
		$dd['1']= 'Publish';
		$dd['0']= 'Not&nbsp;Publish';
		return $dd;
	}
	function dd_show_status(){
		$dd['true']= 'true';
		$dd['false']= 'false';
		return $dd;
	}
	
	function dd_type(){
		$dd['']='---Type---';
		$dd['1']= 'Top';
		$dd['0']= 'Bottom';
		return $dd;
	}
	
	function SitemapBlog() {
        return $this->db->order_by('id','ASC')
						->get('blog')
						->result();
    }
	function SitemapPage() {
        return $this->db->order_by('id','ASC')
						->get('laman')
						->result();
    }
	
	public function ambilTgl($tgl){

        date_default_timezone_set('Asia/Jakarta');

		$exp = explode('-',$tgl);

		$tgl = $exp[2];

		return $tgl;

	}
	function ambilBln($tgl){
		//$this->load->model('Site_model');
		date_default_timezone_set('Asia/Jakarta');

		$exp = explode('-',$tgl);

		$tgl = $exp[1];

		$bln = $this->Site_model->getBulan($tgl);

		$hasil = substr($bln,0,3);

		return $hasil;

	}
	public function getBulan($bln){

		switch ($bln){

			case 1: 

				return "Januari";

				break;

			case 2:

				return "Februari";

				break;

			case 3:

				return "Maret";

				break;

			case 4:

				return "April";

				break;

			case 5:

				return "Mei";

				break;

			case 6:

				return "Juni";

				break;

			case 7:

				return "Juli";

				break;

			case 8:

				return "Agustus";

				break;

			case 9:

				return "September";

				break;

			case 10:

				return "Oktober";

				break;

			case 11:

				return "November";

				break;

			case 12:

				return "Desember";

				break;

		}

	} 
}
