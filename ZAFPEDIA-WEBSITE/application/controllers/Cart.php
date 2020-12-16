<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
	
	public function index()
	{
		date_default_timezone_set('Asia/Jakarta');
		$slug						= $this->uri->segment(1);
		$query						= $this->Site_model->getConfig()->row_array();
			
		$data['situs']				= strip_tags($query['nama']);
		$data['title']				= "Shopping&nbsp;Cart";
		$data['produsen']			= $this->Site_model->getProdusen();
		$data['featured']			= $this->Site_model->getFeaturedProduk();
		$data['newitem']			= $this->Site_model->getNewProduk();
		$data['populer']			= $this->Site_model->getPopulerProduk();
		$data['bestseller']			= $this->Site_model->getBestProduk();
		$data['onsale']				= $this->Site_model->getOnSale();
		$data['toprate']			= $this->Site_model->getTopRateProduct();
		$data['item']				= $this->Site_model->getAllProduk();
		$data['sidebarcategory']	= $this->Site_model->getSidebarCategoryProduk();
		$data['tags']				= $this->Site_model->produk_tags();
		$data['payment']			= $this->Site_model->getPayment();
		$data['bank']				= $this->Site_model->getBank();
		$data['tema']				= $query['tema'];
		
		$data['telp']				= strip_tags($query['telepon']);
		$data['email']				= strip_tags($query['email_website']);
		$data['alamat']				= strip_tags($query['alamat']);
		$data['author'	]			= strip_tags($query['pemilik']);
		$data['deskripsi_web']		= strip_tags($query['deskripsi_situs']);
		$data['meta_deskripsi']		= strip_tags($query['meta_deskripsi']);
		$data['meta_keyword']		= strip_tags($query['meta_keyword']);
		$data['website']			= $query['website'];
		$data['tema']				= $query['tema'];
		$data['hak_cipta']			= $query['hak_cipta'];
		$data['facebook']			= $query['facebook'];
		$data['instagram']			= $query['instagram'];
		$data['twitter'	]			= $query['twitter'];
		$data['googleplus']			= $query['googleplus'];
		$data['tumblr']				= $query['tumblr'];
		$data['vimeo']				= $query['vimeo'];
		$data['youtube']			= $query['youtube'];
		$data['skype'	]			= $query['skype'];
		$data['linkedin']			= $query['linkedin'];
		$data['logo']				= $query['logo'];
		$data['favicon'	]			= $query['favicon'];
	    $data['javascript_header']	= $query['javascript_header'];
		$data['javascript_footer']	= $query['javascript_footer'];
		//$data['header']				= 1;
		
		$data['konten']=$this->load->view('cart',$data,TRUE);
		$this->load->view('tema',$data);
	}

	public function addcart(){
		$data = array(
			'id'     		=> $this->input->post('id',null,TRUE),
			'kode_barang'   => $this->input->post('kode_barang',null,TRUE),
			'name'   	 	=> $this->input->post('produk',null,TRUE),
			'image'   	 	=> $this->input->post('image',null,TRUE),
			'berat'   	 	=> $this->input->post('berat',null,TRUE),
			'kategori'		=> $this->input->post('kategori',null,TRUE),
			'produk_seo'   	=> $this->input->post('produk_seo',null,TRUE),
			'qty'  		   	=> 1,
			'price'   		=> $this->input->post('price',null,TRUE),
			);

		$this->cart->insert($data);
	}
	
	public function updatecart(){
		foreach( $this->input->post() as $item => $value){
			$rowid		= $value['rowid'];
			$qty 		= $value['qty'];
			$data 		= array(
						'rowid' => $rowid,
						'qty' 	=> $qty,
						);
			$this->cart->update($data);
			//redirect (site_url('shopping-cart'));
		}
	}

	public function additemcart(){
		$data = array(
			'id'     		=> $this->input->post('id',null,TRUE),
			'kode_barang' 	=> $this->input->post('kode_barang',null,TRUE),
			'name'   	 	=> $this->input->post('produk',null,TRUE),
			'image'   	 	=> $this->input->post('image',null,TRUE),
			'berat'   	 	=> $this->input->post('berat',null,TRUE),
			'kategori'		=> $this->input->post('kategori',null,TRUE),
			'produk_seo'   	=> $this->input->post('produk_seo',null,TRUE),
			'qty'     		=> $this->input->post('qty',null,TRUE),
			'price'   		=> $this->input->post('price',null,TRUE),
			);

		$this->cart->insert($data);
	}
	
	public function deletecart()
    {
	    $id=$this->input->post('id',null,TRUE);
	    $data = array
			(
			'rowid' => $id,
            'qty'   => 0
			);
        $this->cart->update($data);
	}
	
	public function show_popup_produk(){
	$id = $this->input->post('id');
	$data['pop_up']=$this->Site_model->get_produk_by_id($id);
	$this->load->view('produkpopup',$data);
	}
}