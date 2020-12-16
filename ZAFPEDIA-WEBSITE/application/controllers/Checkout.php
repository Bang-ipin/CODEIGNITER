<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
	
	public function index(){
		
		date_default_timezone_set('Asia/Jakarta');
			$query					= $this->Site_model->getConfig()->row_array();
			$data['produsen']		= $this->Site_model->getProdusen();
			$data['featured']		= $this->Site_model->getFeaturedProduk();
			$data['populer'	]		= $this->Site_model->getPopulerProduk();
			$data['payment']		= $this->Site_model->getPayment();
			$data['bank'	]		= $this->Site_model->getBank();
			$data['item']			= $this->Site_model->getAllProduk();
			$data['produk']			= $this->Site_model->getAllProduk();
			$data['shipping']		= $this->Site_model->getShipping();
			$data['invoice']		= $this->Site_model->_invoice();
			$data['dd_kotaasal']	= $this->Site_model->get_city();
		$data['dd_provinsitujuan']	= $this->Site_model->get_province();
			$data['dd_kabupaten']	= $this->Site_model->dd_kabupaten();
			
			$data['title']		= 'Checkout';
			$data['situs']			= strip_tags($query['nama']);
			$data['deskripsi_web']	= strip_tags($query['deskripsi_situs']);
			$data['meta_deskripsi']	= strip_tags($query['meta_deskripsi']);
			$data['meta_keyword']	= strip_tags($query['meta_keyword']);
			$data['telp']			= strip_tags($query['telepon']);
			$data['email']			= strip_tags($query['email_website']);
			$data['alamat']			= strip_tags($query['alamat']);
			$data['author'	]		= strip_tags($query['pemilik']);
			$data['website']		= $query['website'];
			$data['provinsi']		= $query['provinsi'];
			$data['logo']			= $query['logo'];
			$data['favicon']		= $query['favicon'];
			$data['tema']			= $query['tema'];
			$data['hak_cipta']		= $query['hak_cipta'];
			$data['facebook']		= $query['facebook'];
			$data['instagram']		= $query['instagram'];
			$data['twitter'	]		= $query['twitter'];
			$data['googleplus']		= $query['googleplus'];
			$data['tumblr'	]		= $query['tumblr'];
			$data['vimeo'	]		= $query['vimeo'];
			$data['youtube'	]		= $query['youtube'];
			$data['skype'	]		= $query['skype'];
			$data['linkedin']		= $query['linkedin'];
			$data['javascript_header']	= $query['javascript_header'];
            $data['javascript_footer']	= $query['javascript_footer'];
		    $data['jscheckout']     = $this->load->view('js/js-checkout',$data,TRUE);
			$data['konten']=$this->load->view('checkout',$data,TRUE);
			$this->load->view('tema',$data);
	}
	
	public function guest(){
	
		date_default_timezone_set('Asia/Jakarta');
		$query					= $this->Site_model->getConfig()->row_array();
		$data['produsen']		= $this->Site_model->getProdusen();
		$data['featured']		= $this->Site_model->getFeaturedProduk();
		$data['populer'	]		= $this->Site_model->getPopulerProduk();
		$data['payment']		= $this->Site_model->getPayment();
		$data['bank'	]		= $this->Site_model->getBank();
		$data['item']			= $this->Site_model->getAllProduk();
		$data['produk']			= $this->Site_model->getAllProduk();
		$data['shipping']		= $this->Site_model->getShipping();
		$data['invoice']		= $this->Site_model->_invoice();
		$data['dd_kotaasal']	= $this->Site_model->get_city();
	$data['dd_provinsitujuan']	= $this->Site_model->get_province();
		$data['dd_kabupaten']	= $this->Site_model->dd_kabupaten();
			
		$data['title']			= 'Guest Checkout';
		$data['situs']			= strip_tags($query['nama']);
		$data['deskripsi_web']	= strip_tags($query['deskripsi_situs']);
		$data['meta_deskripsi']	= strip_tags($query['meta_deskripsi']);
		$data['meta_keyword']	= strip_tags($query['meta_keyword']);
		$data['telp']			= strip_tags($query['telepon']);
		$data['email']			= strip_tags($query['email_website']);
		$data['alamat']			= strip_tags($query['alamat']);
		$data['author'	]		= strip_tags($query['pemilik']);
		$data['provinsi']		= $query['provinsi'];
		$data['website']		= $query['website'];
		$data['logo']			= $query['logo'];
		$data['favicon']		= $query['favicon'];
		$data['tema']			= $query['tema'];
		$data['hak_cipta']		= $query['hak_cipta'];
		$data['facebook']		= $query['facebook'];
		$data['instagram']		= $query['instagram'];
		$data['twitter'	]		= $query['twitter'];
		$data['googleplus']		= $query['googleplus'];
		$data['tumblr'	]		= $query['tumblr'];
		$data['vimeo'	]		= $query['vimeo'];
		$data['youtube'	]		= $query['youtube'];
		$data['skype'	]		= $query['skype'];
		$data['linkedin']		= $query['linkedin'];
		$data['javascript_header']	= $query['javascript_header'];
        $data['javascript_footer']	= $query['javascript_footer'];
		$data['jscheckout']     = $this->load->view('js/js-checkout',$data,TRUE);	
		$data['konten']=$this->load->view('checkout',$data,TRUE);
		$this->load->view('tema',$data);
	}	
	
	
	public function confirm()
	{
		$data['invoice']			=$this->Site_model->_invoice();
		$temp						=$data['invoice'];
		$data['customer_id']		=$this->session->userdata('customer_id');
		$data['email']				=$this->input->post('email',null,TRUE);
		$data['telepon']			=$this->input->post('telepon',null,TRUE);
		$data['nama_lengkap']		=$this->input->post('fullname',null,TRUE);
		$data['jenis_kelamin']		=$this->input->post('gender',null,TRUE);
		$data['perusahaan']			=$this->input->post('perusahaan',null,TRUE);
		$data['alamat']				=$this->input->post('alamat',null,TRUE);
		$data['kota']				=$this->input->post('city',null,TRUE);
		$data['provinsi']			=$this->input->post('state',null,TRUE);
		$data['negara']				=$this->input->post('negara',null,TRUE);
		$data['kode_pos']			=$this->input->post('kode_pos',null,TRUE);
		$data['catatan']			=$this->input->post('remarks',null,TRUE);
		$data['tgl_pesan']			=$this->indonesia_library->format_tanggal_jam('Y-m-d H:i:s');
		$data['status_pembayaran']	=1;
		$data['metode_pembayaran']	=$this->input->post('payment',null,TRUE);
		$data['bank_tujuan']		=$this->input->post('tujuan',null,TRUE);
		$data['ekspedisi']			=$this->input->post('kurir',null,TRUE);
		$data['layanan_pengiriman']	=$this->input->post('servis',null,TRUE);
		$data['estimasi_waktu']		=$this->input->post('etd',null,TRUE);
		$data['subtotal']			=$this->input->post('subtotal',null,TRUE);
		$data['ongkir']				=$this->input->post('ongkir',null,TRUE);
		$data['total_harga']		=$this->input->post('grandtotal',null,TRUE);
		
		$this->Site_model->add_order($data);
		
		foreach($this->cart->contents() as $items){
			$d_detail['invoice'] 		= $temp;
			$d_detail['kode_barang'] 	= $items['kode_barang'];
			$d_detail['produk'] 		= $items['name'];
			$d_detail['kategori'] 		= $items['kategori'];
			$d_detail['jumlah'] 		= $items['qty'];
			$d_detail['harga'] 			= $items['price'];
			$d_detail['berat'] 			= $items['berat'];
			$this->Site_model->add_order_details($d_detail);
			
			$d_u['qty'] = $this->Site_model->get_min_qty($d_detail['kode_barang'],$d_detail['jumlah']);
			$key['kode_barang'] = $d_detail['kode_barang'];
			$this->Site_model->update_qty("produk",$d_u,$key);
		}
		
		$this->session->unset_userdata('limit_add_cart');
		$this->cart->destroy();
		
		$this->session->set_flashdata('SUCCESSMSG','Order Produk Berhasil');
		redirect(site_url());
	}
	
	public function simpan_guest(){
		
		$data['invoice']			=$this->Site_model->_invoice();
		$temp=$data['invoice'];
		$data['username']			=$this->input->post('username',null,TRUE);
		$data['email']				=$this->input->post('email',null,TRUE);
		$data['telepon']			=$this->input->post('telepon',null,TRUE);
		$data['nama_lengkap']		=$this->input->post('fullname',null,TRUE);
		$data['jenis_kelamin']		=$this->input->post('gender',null,TRUE);
		$data['alamat']				=$this->input->post('address',null,TRUE);
		$data['kota']				=$this->input->post('kabupaten',null,TRUE);
		$data['provinsi']			=$this->input->post('destinasi',null,TRUE);
		$data['negara']				=$this->input->post('country',null,TRUE);
		$data['kode_pos']			=$this->input->post('zip_code',null,TRUE);
		$data['catatan']			=$this->input->post('remarks',null,TRUE);
		$data['tgl_pesan']			=$this->indonesia_library->format_tanggal_jam('Y-m-d H:i:s');
		$data['status_pembayaran']	=1;
		$data['metode_pembayaran']	=$this->input->post('payment',null,TRUE);
		$data['bank_tujuan']		=$this->input->post('tujuan',null,TRUE);
		$data['ekspedisi']			=$this->input->post('kurir',null,TRUE);
		$data['layanan_pengiriman']	=$this->input->post('servis',null,TRUE);
		$data['estimasi_waktu']		=$this->input->post('etd',null,TRUE);
		$data['subtotal']			=$this->input->post('subtotal',null,TRUE);
		$data['ongkir']				=$this->input->post('ongkir',null,TRUE);
		$data['total_harga']		=$this->input->post('grandtotal',null,TRUE);
		
		$this->Site_model->add_order($data);
		
		foreach($this->cart->contents() as $items){
			$d_detail['invoice'] 		= $temp;
			$d_detail['kode_barang'] 	= $items['kode_barang'];
			$d_detail['produk'] 		= $items['name'];
			$d_detail['kategori'] 		= $items['kategori'];
			$d_detail['jumlah'] 		= $items['qty'];
			$d_detail['harga'] 			= $items['price'];
			$d_detail['berat'] 			= $items['berat'];
			$this->Site_model->add_order_details($d_detail);
			
			$d_u['qty'] = $this->Site_model->get_min_qty($d_detail['kode_barang'],$d_detail['jumlah']);
			$key['kode_barang'] = $d_detail['kode_barang'];
			$this->Site_model->update_qty("produk",$d_u,$key);
		}
		
		$this->session->unset_userdata('limit_add_cart');
		$this->cart->destroy();
		
		$this->session->set_flashdata('SUCCESSMSG','Order Produk Berhasil');
		redirect(site_url());
	}
	
	public function get_kabupaten(){
	$provinsi_id = $this->input->get('prov_id',null,TRUE);
	$this->Site_model->get_kabupaten($provinsi_id);
	
	}
	
	public function insert_ongkir()
	{
		$origin		  		= $this->input->post('origin',null,TRUE);
		$id_kabupaten 		= $this->input->post('kab_id',null,TRUE);
		$kurir 		  		= $this->input->post('kurir',null,TRUE);
		$berat 		  		= $this->input->post('berat',null,TRUE);	
		
		$data['response']	= $this->rajaongkir->cost($origin,$id_kabupaten,$berat,$kurir);
		$cekberat			= $this->input->post('berat',null,TRUE);
		$data['berat']		= $cekberat / 1000;
		$this->load->view('getongkir',$data);
	}
	
}