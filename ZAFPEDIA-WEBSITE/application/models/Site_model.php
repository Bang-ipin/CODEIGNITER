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
        $tanggal = date("Y-m-d");
        $waktu   = time(); 
        $cekk = $this->db->query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
        $rowh = $cekk->row_array();
        if($cekk->num_rows() == 0){
            $datadb = array('ip'=>$ip, 'tanggal'=>$tanggal, 'hits'=>'1', 'online'=>$waktu);
            $this->db->insert('statistik',$datadb);
        }else{
            $hitss = $rowh['hits'] + 1;
            $datadb = array('ip'=>$ip, 'tanggal'=>$tanggal, 'hits'=>$hitss, 'online'=>$waktu);
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
	
	
	/*---------------------Produsen---------------------->*/
	public function getProdusen($slug=FALSE){	 
		if($slug === FALSE){
			return $query=$this->db->where('status',1)
						->order_by('posisi','asc')
						->get('supplier')
						->result_array();
		}
		return $query=$this->db ->where('status',1)
								->where('nama',$slug)
								->order_by('posisi','asc')
								->get('supplier')
								->row_array();
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
	
	/*---------------------BANK---------------------->*/
	public function getBank($slug=FALSE){	 
		if($slug === FALSE){
			return $query=$this->db->where('status',1)
						->order_by('posisi','asc')
						->get('metode_pembayaran')
						->result_array();
		}
		return $query=$this->db ->where('status',1)
								->where('judul',$slug)
								->order_by('posisi','asc')
								->get('metode_pembayaran')
								->row_array();
	}
	
	/*---------------------Shipping---------------------->*/
	public function getShipping($slug=FALSE){	 
		if($slug === FALSE){
			return $query=$this->db->where('status',1)
						->order_by('posisi','asc')
						->get('ekspedisi')
						->result_array();
		}
		return $query=$this->db ->where('status',1)
								->where('nama',$slug)
								->order_by('posisi','asc')
								->get('ekspedisi')
								->row_array();
	}
	
	/*---------------------Payment---------------------->*/
	public function getPayment($slug=FALSE){	 
		if($slug === FALSE){
			return $query=$this->db->where('status',1)
						->get('pembayaran')
						->result_array();
		}
		return $query=$this->db ->where('status',1)
								->where('judul',$slug)
								->get('pembayaran')
								->row_array();
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
	
	/*---------------------Produk---------------------->*/
	public function getSidebarCategoryProduk(){	 
		return $this->db->where('status',1)
						->where('parent_id',0)
						->order_by('posisi','asc')
						->limit(10)
						->get('kategori_produk')
						->result_array();
										
	}
	
	public function FilterProdukByKategori($slug){
	return $query=$this->db		->where('status',1)
								->where('kategori_seo',$slug)
								->get('kategori_produk')
								->row_array();
	}
	public function FilterProdukByTags($slug){
	return $query=$this->db		->where('tag_seo',$slug)
								->get('tags')
								->row_array();
	}
	public function getProdukAll($limit,$start){
	return $query=$this->db->join('kategori_produk b','a.kode_kategori=b.kode_kategori')
							->where('status_barang',1)
							->order_by('id','DESC')
							->limit($limit)
							->offset($start)
							->get('produk a')
							->result_array();
		
	}
	public function getProdukByKategori($kode,$limit,$start){
	return $query=$this->db->join('kategori_produk b','a.kode_kategori=b.kode_kategori')
							->where('status_barang',1)
							->where('a.kode_kategori',$kode)
							->order_by('id','DESC')
							->limit($limit)
							->offset($start)
							->get('produk a')
							->result_array();
		
	}
	
	public function getProdukBySubKategori($kode){
	return $query=$this->db->join('kategori_produk b','a.kode_kategori=b.kode_kategori')
							->where('status_barang',1)
							->where('a.subcat_id',$kode)
							->order_by('id','DESC')
							->limit(9)
							->get('produk a')
							->result_array();
		
	}
	
	public function getAllProduk($slug=FALSE){
		if($slug === FALSE){
		return $query=$this->db	->join('kategori_produk b','a.kode_kategori=b.kode_kategori')
								->where('status_barang',1)
								->order_by('id','ASC')
								->get('produk a')
								->result_array();
				
			}
		return $query=$this->db	->join('kategori_produk b','a.kode_kategori=b.kode_kategori')
								->where('status_barang',1)
								->where('produk_seo',$slug)
								->order_by('id','ASC')
								->get('produk a')
								->row_array();
										
	}
	
	public function getItemById($slug=FALSE){
		if($slug === FALSE){
		return $query=$this->db->join('kategori_produk b','a.kode_kategori=b.kode_kategori')
						->where('status_barang',1)
						->order_by('id','ASC')
						->get('produk a')
						->result_array();
		}
		return $query=$this->db	->join('kategori_produk b','a.kode_kategori=b.kode_kategori')
								->where('status_barang',1)
								->where('produk_seo',$slug)
								->order_by('id','ASC')
								->get('produk a')
								->row_array();
	}
	
	public function getFeaturedProduk($slug=FALSE){	 
		if($slug === FALSE){
			return $query=$this->db->join('kategori_produk b','a.kode_kategori=b.kode_kategori')
						->where('status_barang',1)
						->where('favorit_produk',1)
						->order_by('id','DESC')
						->limit(4)
						->get('produk a')
						->result_array();
		}
		
		return $query=$this->db	->join('kategori_produk b','a.kode_kategori=b.kode_kategori')
								->where('status_barang',1)
								->where('favorit_produk',1)
								->where('produk_seo',$slug)
								->order_by('id','DESC')
								->limit(4)
								->get('produk a')
								->row_array();
	}
	public function getPopulerProduk($slug=FALSE){	 
		if($slug === FALSE){
			return $query=$this->db->join('kategori_produk b','a.kode_kategori=b.kode_kategori')
								->where('status_barang',1)
								->order_by('dibaca','DESC')
								->limit(4)
								->get('produk a')
								->result_array();
		}
		return $query=$this->db	->join('kategori_produk b','a.kode_kategori=b.kode_kategori')
								->where('status_barang',1)
								->where('produk_seo',$slug)
								->order_by('dibaca','DESC')
								->limit(4)
								->get('produk a')
								->row_array();
										
	}
	public function getBestProduk($slug=FALSE){	 
		if($slug === FALSE){
			return $query=$this->db->join('kategori_produk b','a.kode_kategori=b.kode_kategori')
								->where('status_barang',1)
								->order_by('dibaca','DESC')
								->limit(4)
								->get('produk a')
								->result_array();
		}
		return $query=$this->db	->join('kategori_produk b','a.kode_kategori=b.kode_kategori')
								->where('status_barang',1)
								->where('produk_seo',$slug)
								->order_by('dibaca','DESC')
								->limit(4)
								->get('produk a')
								->row_array();
										
	}
	public function getNewProduk($slug=FALSE){	 
		if($slug === FALSE){
			return $query=$this->db->join('kategori_produk b','a.kode_kategori=b.kode_kategori')
								->where('status_barang',1)
								->order_by('id','DESC')
								->limit(12)
								->get('produk a')
								->result_array();
		}
		return $query=$this->db	->join('kategori_produk b','a.kode_kategori=b.kode_kategori')
								->where('status_barang',1)
								->where('produk_seo',$slug)
								->order_by('id','DESC')
								->limit(12)
								->get('produk a')
								->row_array();
										
	}
	public function getOnSale($slug=FALSE){	 
		if($slug === FALSE){
			return $query=$this->db->join('kategori_produk b','a.kode_kategori=b.kode_kategori')
								->where('status_barang',1)
								->where('label',2)
								->order_by('id','DESC')
								->limit(4)
								->get('produk a')
								->result_array();
		}
		return $query=$this->db	->join('kategori_produk b','a.kode_kategori=b.kode_kategori')
								->where('status_barang',1)
								->where('label',2)
								->where('produk_seo',$slug)
								->order_by('id','DESC')
								->limit(4)
								->get('produk a')
								->row_array();
										
	}
	public function getTopRateProduct($slug=FALSE){	 
		if($slug === FALSE){
		return $query=$this->db ->join('kategori_produk b','a.kode_kategori=b.kode_kategori')
								->join('ulasan c','a.id = c.produkid')
								->where('status_barang',1)
								->group_by('c.produkid')
								->order_by('c.votes')
								->limit(4)
								->get('produk a')
								->result_array();
		}
		return $query=$this->db	->join('kategori_produk b','a.kode_kategori=b.kode_kategori')
								->join('ulasan c','a.id = c.produkid')
								->where('status_barang',1)
								->where('produk_seo',$slug)
								->group_by('c.produkid')
								->order_by('c.votes')
								->limit(4)
								->get('produk a')
								->row_array();
										
	}
	public function get_produk_by_tag($slug,$start,$limit){
		return $this->db->query("SELECT * FROM produk a JOIN kategori_produk b ON a.kode_kategori=b.kode_kategori WHERE status_barang=1 AND tag LIKE '%$slug%' order by id ASC limit $limit,$start")->result_array();
	}
	public function search_all_produk($key,$start,$limit){
		return $this->db		->join('kategori_produk b','a.kode_kategori=b.kode_kategori')
								->or_like($key)
								->limit($start,$limit)
								->get('produk a')
								->result_array();
										
	}
	public function count_all_komentar_produk($slug){
		$query=$this->db->where('produkid',$slug)
						->where('disetujui',1)
						->get('ulasan')
						->num_rows();
		return $query;
	}
	public function count_produk_by_tag($slug){
		$query=$this->db->where('status_barang',1)
						->where('tag',$slug)
						->get('produk')
						->num_rows();
		return $query;
	}
	public function count_all_search_produk($key){
		return $this->db	->or_like($key)
							->get('produk')
							->num_rows();
	}
	public function count_all_produk(){
		$query=$this->db->where('status_barang',1)
						->get('produk')
						->num_rows();
		return $query;
	}
	public function count_all_produk_kategori($kode){
		$query=$this->db->where('status_barang',1)
						->where('kode_kategori',$kode)
						->get('produk')
						->num_rows();
		return $query;
	}
	function komentar_produk($data){
		return $this->db->insert('ulasan',$data);
	}
	function getKomentarId($id){
		return $this->db->where('produkid',$id)
						->where('komentar_id',0)
					    ->where('status',0)
					    ->order_by('id','ASC')
					    ->get('ulasan')
						->result_array();
	}
	public function count_all_komentar($slug){
		$query=$this->db->where('produkid',$slug)
						->get('ulasan')
						->num_rows();
		return $query;
	}
	
	public function produk_tags(){
		return 	$this->db->order_by('id','desc')
						 ->limit(10)
						 ->get('tags')
						 ->result_array();
	
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
	/*------------------Customer------------------------*/
	public function add_cust($data){
		return $this->db->insert('customer',$data);
	}
	
	public function UpdateCustomer($id,$data){
		return $this->db->where('username',$id)
						->update('customer',$data);
	}
	
	public function auth_cust($email,$password) {
		
	$em =$this->db->escape_str($email);
	$pass =$this->db->escape_str($password);
	
	return $this->db->where('email',$em)
					->where('password',$pass)
					->where('status',1)
					->get('customer');
	}
	function _get_customer_by_id($id){
		return $this->db->where('username',$id)
						->get('customer');
		
	}
	
	function update_avatar($avatarnew){
		$dt['foto_member'] = $avatarnew;
		return $this->db->where('username',$this->session->userdata('username'))
						->update('customer',$dt);
	}
	function update_password($pass_new){
		$dt['password'] = sha1($pass_new);
		return $this->db->where('username',$this->session->userdata('username'))
						->update('customer',$dt);
	}
	function cek_password($pass){
		return $this->db->select('username')
						->where('password', sha1($pass))
						->where('username',$this->session->userdata('username'))
						->limit(1)
						->get('customer');
	}
	function cek_email($email){
		return $this->db->select('email')
						->where('email',strtolower($email))
						->limit(1)
						->get('customer');
	}
	function cek_username($username){
		return $this->db->select('username')
						->where('username',strtolower($username))
						->limit(1)
						->get('customer');
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
	
	public function _invoice()
    {
        $q = $this->db->query("select MAX(RIGHT(invoice,6)) as no_invoice from pesanan WHERE DATE(tgl_pesan)=CURDATE()");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->no_invoice)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }
        else
        {
            $kd = "000001";
        }
		date_default_timezone_set('Asia/Jakarta');
		return "INV".date('dmy').$kd;
		
    }
	/*---------------------ORDERS---------------------->*/
    function add_order($data){
		$this->db->insert('pesanan',$data);
	}

    function add_order_details($data){
		$this->db->insert('detail_pesanan',$data);
	}

    public function get_min_qty($kode_barang,$min)
    {
        $q = $this->db->query("select qty from produk where kode_barang='".$kode_barang."'");
        $qty = "";
        foreach($q->result() as $d)
        {
            $qty = $d->qty - $min;
        }
        return $qty;
    }

     public function getTambahStok($id,$tambah)
    {
        $q = $this->db->query("select qty from produk where id='".$id."'");
        $stock = "";
        foreach($q->result() as $d)
        {
            $stock = $d->qty + $tambah;
        }
        return $stock;
    }

	function update_qty($table,$data,$field_key)
    {
        $this->db->update($table,$data,$field_key);
    }
		
	/*-------------------- RAJAONGKIR--------------------*/
	function dd_kabupaten(){
		$dd['']='Kab/Kota';
		return $dd;
	}
	
	public function get_province(){
		error_reporting(0);
		$response=$this->rajaongkir->province();
		$dd['']='Pilih Provinsi';
		$data = json_decode($response, true);
		foreach ($data['rajaongkir']['results'] as $row) {
			$dd[$row['province_id']] = $row['province'];
			}
		return $dd;
	}
	public function convert_province($prov){
		error_reporting(0);
		$response	=$this->rajaongkir->province($prov);
		$dd['']		='Pilih Provinsi';
		$data 		= json_decode($response, true);
		$hasil 		= $data['rajaongkir']['results']['province']; 
		return $hasil;
	}
	
	public function get_city(){
		error_reporting(0);
		$response=$this->rajaongkir->city();
		$dd['']='Kota Asal';
		$data = json_decode($response, true);
		foreach ($data['rajaongkir']['results'] as $row ) {
			$dd[$row['city_id']] = $row['city_name'];
		}
		return $dd; 
	}
	public function convert_city($prov,$kota){
		error_reporting(0);
		$response=$this->rajaongkir->city($prov,$kota);
		$data = json_decode($response, true);
		$hasil= $data['rajaongkir']['results']['city_name']; 
		return $hasil; 
	}
	
	public function get_kabupaten($provinsi_id){
		error_reporting(0);
		$provinsi_id = $this->input->get('prov_id');
		$response=$this->rajaongkir->city($provinsi_id);
		$data = json_decode($response, true);
		foreach ($data['rajaongkir']['results'] as $row) { 
			echo "<option value='".$row['city_id']."'>".$row['city_name']."</option>";
		}
		
	}
	
	public function insert_ongkir($origin,$id_kabupaten,$berat,$kurir)
	{
		error_reporting(0);
		$response=$this->rajaongkir->cost($origin,$id_kabupaten,$berat,$kurir);
		$data = json_decode($response, true);
		return $data;

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
	public function CariStokAsli($id){

		$t = "SELECT * FROM produk WHERE id='$id'";

		$d = $this->db->query($t);

		$r = $d->num_rows();

		if($r>0){

			foreach($d->result() as $h){

				$hasil = $h->qty;

			}

		}else{

			$hasil = '';

		}

		return $hasil;

	}
	public function nilai_votes($id){

		$t = "SELECT AVG(votes) AS jml FROM ulasan WHERE produkid='$id'";

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
	
	public function CariKodeKategori($id){

		$t = "SELECT * FROM kategori_produk WHERE kategori_seo='$id'";

		$d = $this->db->query($t);

		$r = $d->num_rows();

		if($r>0){

			foreach($d->result() as $h){

				$hasil = $h->kode_kategori;

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
	public function CariKategori($id){

		$t = "SELECT * FROM kategori_produk WHERE kode_kategori='$id'";

		$d = $this->db->query($t);

		$r = $d->num_rows();

		if($r>0){

			foreach($d->result() as $h){

				$hasil = $h->kategori;

			}

		}else{

			$hasil = '';

		}

		return $hasil;

	}
	public function CariKategoriSeo($id){

		$t = "SELECT * FROM kategori_produk WHERE kode_kategori='$id'";

		$d = $this->db->query($t);

		$r = $d->num_rows();

		if($r>0){

			foreach($d->result() as $h){

				$hasil = $h->kategori_seo;

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
	
	function dd_kategori_produk(){
	$this->db->where('parent_id',0);
	$this->db->where('status',1);
	$this->db->order_by('kode_kategori','ASC');
	$query=$this->db->get('kategori_produk');
	$dd[]='';
	if($query->num_rows()> 0){
		foreach($query->result() as $row){
			$dd[$row->kode_kategori]= $row->kategori;
			}
		}
		return $dd;
	}
	
	function dd_subkategori_produk($id){
	$this->db->where('parent_id',$id);
	$this->db->where('status',1);
	$query=$this->db->get('kategori_produk');
	$dd[]='';
	if($query->num_rows()>0){
		foreach($query->result() as $row){
			$dd[$row->kode_kategori]= $row->kategori;
			}
		}
		return $dd;
	}
	
	function dd_atribut(){
	$this->db->where('parent_id',0);
	$this->db->where('status',1);
	$this->db->order_by('id_atribut','ASC');
	$query=$this->db->get('atribut');
	$dd[]='';
	if($query->num_rows()>0){
		foreach($query->result() as $row){
			$dd[$row->id_atribut]= $row->label;
			}
		}
		return $dd;
	}
	
	
	function dd_subatribut_produk($id){
	$this->db->where('parent_id',$id);
	$this->db->where('status',1);
	$query = $this->db->get('atribut');
	$dd[]='';
	if($query->num_rows()>0){
		foreach($query->result() as $row){
			$dd[$row->id_atribut]= $row->label;
			}
		}
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
	
	function dd_produsen(){
	$this->db->order_by('id');
	$query=$this->db->get('supplier');
	$dd['']='---Pilih---';
	if($query->num_rows()>0){
		foreach($query->result() as $row){
			$dd[$row->id]= $row->nama;
			}
		}
		return $dd;
	}
	
	public function checkbox_kategori(){
	$kat=$this->db->query("SELECT * FROM kategori_produk ORDER BY kategori ASC");
	if($kat->num_rows() > 0){
		echo '<ul class="list-unstyled">';
		foreach($kat->result_array() as $row){
			$kat_id=$row['kode_kategori'];
			$subcat=$this->db->query("SELECT * FROM subkategori_produk WHERE parent_category_id='$kat_id'");
		echo'<li><label>'.form_checkbox('kategori[]',$row['kode_kategori']).$row['kategori'].'</label>';
			echo '<ul class="list-unstyled">';
				foreach($subcat->result_array() as $row2){
					echo '<li><label>'.form_checkbox('subkategori[]',$row2['parent_category_id']).$row2['subcategory_name'].'</label></li>';
					}
				echo '</ul>';
			echo '</li>';
			}
		echo '</ul>';
		}
	}
	
	function dd_favorit(){
	$dd['']='---Status---';
	$dd['1']= 'Ya';
	$dd['0']= 'Tidak';
	return $dd;
	}
	
	function dd_label(){
	$dd['']='---Label---';
	$dd['0']= 'None';
	$dd['1']= 'New';
	$dd['2']= 'Sale';
	$dd['3']= 'Best Seller';
	return $dd;
	}
	
	function dd_tax(){
	$this->db->order_by('id');
	$query=$this->db->get('negara');
	$dd['']='---Select---';
	if($query->num_rows()>0){
		foreach($query->result() as $row){
			$dd[$row->id]= $row->nama;
			}
		}
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
	
	public function dd_parent_kategori(){
	$this->db->where('parent_id',0);
	$this->db->order_by('kode_kategori');
	$query=$this->db->get('kategori_produk');
	$dd['0']='Menu&nbsp;Root';
	if($query->num_rows()>0){
		foreach($query->result() as $row){
			$dd[$row->kode_kategori]= $row->kategori;
			}
		}
		return $dd;
	}
	public function dd_parent_atribut(){
	$this->db->where('parent_id',0);
	$this->db->order_by('id_atribut');
	$query=$this->db->get('atribut');
	$dd['0']='Menu&nbsp;Root';
	if($query->num_rows()>0){
		foreach($query->result() as $row){
			$dd[$row->id_atribut]= $row->label;
			}
		}
		return $dd;
	}
	
	function SitemapProduk() {
        return $this->db->join('kategori_produk b','a.kode_kategori=b.kode_kategori')
						->order_by('id','ASC')
						->get('produk a')
						->result();
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

	}function ambilBln($tgl){
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
