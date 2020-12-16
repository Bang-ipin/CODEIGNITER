<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profit extends CI_Controller {

	/**
	 * @author : Deddy Rusdiansyah,S.Kom
	 * @web : http://deddyrusdiansyah.blogspot.com
	 * @keterangan : Controller untuk halaman profil
	 **/
	
	public function index()
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$config=$this->app_model->Get_Config();
			
				$d['prg']= $config['author'];
				$d['web_prg']= $config['website'];
				
				$d['nama_program']= $config['aplikasi'];
				$d['instansi']= $config['instansi'];
				$d['usaha']= $config['usaha'];
				$d['alamat_instansi']= $config['alamat'];
				

			
			$d['judul']="Profit";
			
			$pesan1 = "SELECT * FROM booking";
			$d['pesan1'] = $this->app_model->manualQuery($pesan1);
			
			$d['CountBooking']= $this->app_model->CountBooking();
			$d['content'] = $this->load->view('profit/form', $d, true);		
			$this->load->view('home',$d);
		}else{
			header('location:'.base_url());
		}
	}
	
	public function lihat()
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			
			$d['judul']="Profit";
			
			$tgl1 = $this->app_model->tgl_sql($this->input->post('tgl1'));
			$tgl2 = $this->app_model->tgl_sql($this->input->post('tgl2'));
			
			$t = "SELECT sum(a.jmljual * a.hargajual) as jml_jual,
				sum(a.jmljual * c.harga_beli) as jml_beli
				FROM d_jual as a
				JOIN h_jual as b
				JOIN barang as c
				ON a.kodejual=b.kodejual AND a.kode_barang=c.kode_barang
				WHERE b.tgljual BETWEEN '$tgl1' AND '$tgl2'
				LIMIT 1";
			$data = $this->app_model->manualQuery($t);
			$r = $data->num_rows();
			if($r>0){
				foreach($data->result() as $h){
					$total_jual = $h->jml_jual;
					$total_beli = $h->jml_beli;
					$total = $total_jual-$total_beli;
				}
			}else{
				$total_jual = 0;
				$total_beli = 0;
				$total = $total_jual-$total_beli;
			}
			
			$d['total_beli'] = $total_beli;
			$d['total_jual'] = $total_jual;
			
			$d['total'] = $total;
			$pesan1 = "SELECT * FROM booking";
			$d['pesan1'] = $this->app_model->manualQuery($pesan1);
			
			$d['CountBooking']= $this->app_model->CountBooking();
			$this->load->view('profit/view',$d);
			
		}else{
			header('location:'.base_url());
		}
	}
	
	public function lihat_detail()
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			$tgl1 = $this->app_model->tgl_sql($this->input->post('tgl1'));
			$tgl2 = $this->app_model->tgl_sql($this->input->post('tgl2'));

			$where = " WHERE a.tgljual BETWEEN '$tgl1' AND '$tgl2'";
	
			
			$text = "SELECT a.kodejual,a.tgljual,
					b.kode_barang,b.jmljual,b.hargajual,
					c.nama_barang,c.size,c.harga_beli
					FROM h_jual as a
					JOIN d_jual as b
					JOIN barang as c
					ON a.kodejual=b.kodejual AND b.kode_barang=c.kode_barang
					$where 
					ORDER BY a.kodejual ASC ";
			$d['data'] = $this->app_model->manualQuery($text);
			
			$this->load->view('profit/view_detail',$d);
		}else{
			header('location:'.base_url());
		}
	}
	
	
}

/* End of file profil.php */
/* Location: ./application/controllers/profil.php */