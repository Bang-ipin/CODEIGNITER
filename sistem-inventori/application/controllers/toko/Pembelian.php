<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author Ervin
 * @copyright 2016
 */

class Pembelian extends CI_Controller {
	Public function __construct(){
		parent::__construct();
		if ($this->session->userdata('usergroup')!='TokoRingroad') {
		$this->session->set_flashdata('pesan','Maaf Anda Bukan admin Toko Ringroad');
		redirect(base_url());
		}
			$this->load->model('Transaksi_model');
			$this->load->library('form_validation','cart');
		}

  public function index(){
	  $sql=("SELECT * from trans_toko2 a join master_supplier b on a.kode_supplier=b.kode_supplier where status=1 ORDER BY kode_transaksi DESC");
		$data=array(
			'title' => 'List Transaksi Pembelian', //judul title
			'query'=>  $this->db->query($sql)->result(), //query model semua transaksi
			'attribute'=>"class='form-control select2'",
			);
        $this->load->view('toko_ringroad/template/head',$data);
		$this->load->view('toko_ringroad/template/header');
		$this->load->view('toko_ringroad/template/menu');
		$this->load->view('toko_ringroad/v_pembelian',$data);
		$this->load->view('toko_ringroad/template/footer');	

		$this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
	}
	
	function ubahTanggal($tanggal){
	
	 $pisah = explode('/',$tanggal);
	 $array = array($pisah[2],$pisah[0],$pisah[1]);
	 $satukan = implode('-',$array);
	 return $satukan;
	}
	
	function getBarang(){
	$sql="select * from master_barang join satuan on master_barang.id_satuan=satuan.id_satuan
	where kode_barang='$_POST[parent_id]'";
	$response = array(); // siapkan respon yang nanti akan di convert menjadi JSON
	$query =$this->db->query($sql);		
	if($query->num_rows()>0){
		foreach($query->result_array() as $rows){
			$data[]=array(
				'kode_barang'=>$rows['kode_barang'],
				'nama_barang'=>$rows['nama_barang'],
				'stock'=>$rows['stock_awal'],
				'satuan'=>$rows['nama_satuan'],
				'harga'=>$rows['harga_beli'],
				);
			}
			echo json_encode($data); // convert variable respon menjadi JSON, lalu tampilkan 
		}
	}
	function add(){
		$data=array(
			'title' => 'Tambah Transaksi Pembelian', //judul title
			'kode_transaksi' => $this->Transaksi_model->get_kode_pembelian1(),
			'query'=> $this->Transaksi_model->get_master_pembelian1(), //query model semua transaksi
			'dd_supplier' =>$this->Transaksi_model->dd_supplier(),
			'satuan'=>$this->Transaksi_model->get_satuan(),
			'tanggal'=>date('d-m-Y'),
			'attribute'=>"class='form-control select2'",
			);
        $this->load->view('toko_ringroad/template/head',$data);
		$this->load->view('toko_ringroad/template/header');
		$this->load->view('toko_ringroad/template/menu');
		$this->load->view('toko_ringroad/transaksi_masuk',$data);
		$this->load->view('toko_ringroad/template/footer');		
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
    redirect(base_url('toko_ringroad/pembelian/add'));
    }
	
	function ajaxsupplier(){
		$kode_supplier="";
		if (isset($_GET['q'])){
			$kode_supplier = strval( $_GET['q']);
		}
		if ($kode_supplier == 'success'){
			echo 'Registration Success';
		}
		if($kode_supplier){
		$sql=("select nama_supplier from master_supplier where kode_supplier='$kode_supplier'");
		$result=$this->db->query($sql);
		foreach($result->result_array() as $d){
				echo $d['nama_supplier'];
			}
		}
	}
	
	function lihat()
	{
		$this->load->view('toko_ringroad/cartbeli');
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
		$data['kode_transaksi']=$this->Transaksi_model->get_kode_pembelian1();
		$temp=$data['kode_transaksi'];
		$data['tanggal_transaksi']=$this->Transaksi_model->tgl_sql($this->input->post('tanggal'));
		$data['kode_supplier']=$this->input->post('supplier');
		$data['status']=1;
		$data['total_harga']=$this->input->post('total');
		$data['penerima']=$this->session->userdata('nama_pengguna');

		$this->Transaksi_model->tambah_pembelian1($data);
		
		foreach($this->cart->contents() as $items){
            $d_detail['kode_transaksi'] = $temp;
            $d_detail['kode_barang'] = $items['id'];
            $d_detail['nama_barang'] = $items['barang'];
			$d_detail['jumlah'] = $items['qty'];
			$d_detail['satuan'] = $items['satuan'];
            $d_detail['harga_beli'] = $items['price'];
            $d_detail['total'] = $items['subtotal'];
            $this->Transaksi_model->tambah_detail_pembelian1($d_detail);
			
            $d_u['stok'] = $this->Transaksi_model->getAddStok1($d_detail['kode_barang'],$d_detail['jumlah']);
            $key['kode_barang'] = $d_detail['kode_barang'];
            $this->Transaksi_model->updateData("stok_toko2",$d_u,$key);
        }
        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
		
        $this->session->set_flashdata('pesan','<div class="alert alert-success"> Transaksi Berhasil 
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
		redirect('toko_ringroad/pembelian');
	}
		
	function view(){
		$id= $this->uri->segment(4);
		$data['title']='Lihat Transaksi Pembelian';
		$query=$this->Transaksi_model->get_transaksi2_by_id($id);
		foreach($query as $row){
			$data['kode']=$row->kode_transaksi;
			$data['tanggal']=date('d F Y',strtotime($this->Transaksi_model->tgl_str($row->tanggal_transaksi)));
			$data['supplier']=$row->nama_supplier;
		}
		$sql="SELECT *,(select sum(total)as jumlah from dt_trans2 where kode_transaksi='$id')total_all from dt_trans2 where kode_transaksi='$id'";
		$data['cart']=$this->db->query($sql);
		$this->load->view('toko_ringroad/template/head',$data);
		$this->load->view('toko_ringroad/template/header');
		$this->load->view('toko_ringroad/template/menu');
		$this->load->view('toko_ringroad/view_transmasuk',$data);
		$this->load->view('toko_ringroad/template/footer');
		
	}	
	
	function hapus(){
		$id['kode_transaksi']=$this->uri->segment(4);
		$q=$this->Transaksi_model->getSelectedData('dt_trans2',$id);
			foreach($q->result() as $d){
				$d_u['stok'] = $this->Transaksi_model->getMinStok1($d->kode_barang,$d->jumlah);
				$key['kode_barang'] = $d->kode_barang;
				$this->Transaksi_model->updateData("stok_toko2",$d_u,$key);
			}
        $this->Transaksi_model->deleteData('trans_toko2',$id);
		$this->Transaksi_model->deleteData('dt_trans2',$id);
        redirect('toko_ringroad/pembelian');
    }
 }
