<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author Ervin
 * @copyright 2016
 */

class Tbk extends CI_Controller {
	Public function __construct(){
		parent::__construct();
		if ($this->session->userdata('usergroup')!='Gudang') {
		$this->session->set_flashdata('pesan','Maaf Anda Bukan admin Gudang');
		redirect(base_url());
		}
		$this->load->model('Transaksi_model');
			$this->load->library('form_validation','cart');
		}

  public function index(){
	   $sql=("SELECT * from transaksi a join toko b on a.id_toko=b.id_toko where status_pergerakan=2 ORDER BY kode_transaksi DESC");
		$data=array(
			'title' => 'List Transaksi Barang Keluar', //judul title
			'query'=> $this->db->query($sql)->result(), //query model semua transaksi
			//'query'=> $this->Transaksi_model->get_all_transaksi_keluar(), //query model semua transaksi
			'attribute'=>"class='form-control select2' required",
			);
        $this->load->view('gudang/template/head',$data);
		$this->load->view('gudang/template/header');
		$this->load->view('gudang/template/menu');
		$this->load->view('gudang/v_barangkeluar',$data);
		$this->load->view('gudang/template/footer');	

		$this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
	}
	
	function ubahTanggal($tanggal){
	
	 $pisah = explode('/',$tanggal);
	 $array = array($pisah[2],$pisah[0],$pisah[1]);
	 $satukan = implode('-',$array);
	 return $satukan;
	}
	
	function add(){
		$data=array(
			'title' => 'Tambah Transaksi Barang Keluar', //judul title
			'kode_transaksi' => $this->Transaksi_model->get_kode_transaksi_keluar(),
			'query'=> $this->Transaksi_model->get_master_barang_keluar(), //query model semua transaksi
			'dd_toko' =>$this->Transaksi_model->dd_Toko(),
			'tgl_jual'	=> date('d-m-Y'),
			'attribute'=>"class='form-control select2'",
			);
        $this->load->view('gudang/template/head',$data);
		$this->load->view('gudang/template/header');
		$this->load->view('gudang/template/menu');
		$this->load->view('gudang/transaksi_keluar',$data);
		$this->load->view('gudang/template/footer');		
	}
	
	public function cart(){
    $data = array(
        'id'      => $this->input->get('kode_barang'),
		'barang'  => $this->input->get('barang'),
        'qty'     => $this->input->get('jumlah'),
        'satuan'  => $this->input->get('satuan'),
        'price'   => $this->input->get('harga'),
        'name'    => $this->input->get('barang'),
        );

	$this->cart->insert($data);
    redirect(base_url('gudang/tbk/add'));
    }
	
	function ajaxtoko(){
		$id_toko="";
		if (isset($_GET['q'])){
			$id_toko = strval( $_GET['q']);
		}
		if ($id_toko == 'success'){
			echo 'Registration Success';
		}
		if($id_toko){
		$sql=("select nama_toko from toko where id_toko='$id_toko'");
		$result=$this->db->query($sql);
		foreach($result->result_array() as $d){
				echo $d['nama_toko'];
			}
		}
	}
	
	function lihat()
	{
		$this->load->view('gudang/cartjual');
	}
	
	public function delete_cart()
    {
     	$this->cart->destroy();
    }

	public function deleteitemcart()
    {
		$id=$this->input->post('id');
        $data = array
			(
			'rowid' => $id,
            'qty'   => 0
			);
        $this->cart->update($data);
       	}

	public function checkout(){
		$data['kode_transaksi']=$this->Transaksi_model->get_kode_transaksi_keluar();
		$temp=$data['kode_transaksi'];
		$data['tanggal_transaksi']=$this->Transaksi_model->tgl_sql($this->input->post('tanggal'));
		$data['id_toko']=$this->input->post('toko');
		$data['status_pergerakan']=2;
		$data['total_harga']=$this->input->post('total');
		$data['username']=$this->session->userdata('nama_pengguna');

		$this->Transaksi_model->tambah_barang_keluar($data);
		
		foreach($this->cart->contents() as $items){
            $d_detail['kode_transaksi'] = $temp;
            $d_detail['kode_barang'] = $items['id'];
            $d_detail['nama_barang'] = $items['barang'];
			$d_detail['jumlah'] = $items['qty'];
			$d_detail['satuan'] = $items['satuan'];
            $d_detail['harga_jual'] = $items['price'];
			$d_detail['total'] = $items['subtotal'];
            $this->Transaksi_model->tambah_detail_barang_keluar($d_detail);
			
            $d_u['stock_awal'] = $this->Transaksi_model->getKurangStok($d_detail['kode_barang'],$d_detail['jumlah']);
            $key['kode_barang'] = $d_detail['kode_barang'];
            $this->Transaksi_model->updateData("master_barang",$d_u,$key);
        }
        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
		
        $this->session->set_flashdata('pesan','<div class="alert alert-success"> Transaksi Berhasil 
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
		redirect('gudang/tbk');
	}
	
	function view(){
		$id=$this->uri->segment(4);
		$data['title']='Lihat Transaksi Barang Keluar';
		$data['dd_toko']=$this->Transaksi_model->dd_toko();
		$data['attribute']="class='form-control select2' readonly='true' ";
		$query=$this->Transaksi_model->get_transaksi_by_id($id);
		foreach($query as $row){
			$data['kode']=$row->kode_transaksi;
			$data['tanggal']=date('d F Y',strtotime($this->Transaksi_model->tgl_str($row->tanggal_transaksi)));
			$data['toko']=$row->nama_toko;
		}
		$sql="SELECT *,(select sum(total)as jumlah from detail_transaksi where kode_transaksi='$id')total_all from detail_transaksi where kode_transaksi='$id'";
		$data['cart']=$this->db->query($sql);
		$this->load->view('gudang/template/head',$data);
		$this->load->view('gudang/template/header');
		$this->load->view('gudang/template/menu');
		$this->load->view('gudang/view_transkeluar',$data);
		$this->load->view('gudang/template/footer');
		
	}	
	
    function hapus(){
		$id['kode_transaksi']=$this->uri->segment(4);
		$q=$this->Transaksi_model->getSelectedData('detail_transaksi',$id);
			foreach($q->result() as $d){
				$d_u['stock_awal'] = $this->Transaksi_model->getTambahStok($d->kode_barang,$d->jumlah);
				$key['kode_barang'] = $d->kode_barang;
				$this->Transaksi_model->updateData("master_barang",$d_u,$key);
			}
        $this->Transaksi_model->deleteData('transaksi',$id);
		$this->Transaksi_model->deleteData('detail_transaksi',$id);
        redirect('gudang/tbk');
    }
 }
