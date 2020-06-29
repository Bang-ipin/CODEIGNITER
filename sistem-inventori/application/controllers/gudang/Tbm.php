<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author Ervin
 * @copyright 2016
 */

class Tbm extends CI_Controller {
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
	  $sql=("SELECT * from transaksi a join master_supplier b on a.kode_supplier=b.kode_supplier where status_pergerakan=1 ORDER BY kode_transaksi DESC");
		$data=array(
			'title' => 'List Transaksi Barang Masuk', //judul title
			'query'=>  $this->db->query($sql)->result(), //query model semua transaksi
			'attribute'=>"class='form-control select2' required",
			);
        $this->load->view('gudang/template/head',$data);
		$this->load->view('gudang/template/header');
		$this->load->view('gudang/template/menu');
		$this->load->view('gudang/v_barangmasuk',$data);
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
			'title' => 'Tambah Transaksi Barang Masuk', //judul title
			'kode_transaksi' => $this->Transaksi_model->get_kode_transaksi_masuk(),
			'query'=> $this->Transaksi_model->get_master_barang_masuk(), //query model semua transaksi
			'dd_supplier' =>$this->Transaksi_model->dd_supplier(),
			'satuan'=>$this->Transaksi_model->get_satuan(),
			'tanggal'=>date('d-m-Y'),
			'attribute'=>"class='form-control select2 col-xs-6'",
			);
        $this->load->view('gudang/template/head',$data);
		$this->load->view('gudang/template/header');
		$this->load->view('gudang/template/menu');
		$this->load->view('gudang/transaksi_masuk',$data);
		$this->load->view('gudang/template/footer');		
	}
	
	public function cart(){
    $data = array(
        'id'      => $this->input->post('kode_barang'),
		'barang'  => $this->input->post('barang'),
        'qty'     => $this->input->post('jumlah'),
        'satuan'  => $this->input->post('satuan'),
        'price'   => $this->input->post('harga'),
        'name'    => $this->input->post('barang'),
        );

	$this->cart->insert($data);
    redirect(base_url('gudang/tbm/add'));
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
		$this->load->view('gudang/cartbeli');
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
		$data['kode_transaksi']=$this->Transaksi_model->get_kode_transaksi_masuk();
		$temp=$data['kode_transaksi'];
		$data['tanggal_transaksi']=$this->Transaksi_model->tgl_sql($this->input->post('tanggal'));
		$data['kode_supplier']=$this->input->post('supplier');
		$data['status_pergerakan']=1;
		$data['total_harga']=$this->input->post('total');
		$data['username']=$this->session->userdata('nama_pengguna');

		$this->Transaksi_model->tambah_barang_masuk($data);
		
		foreach($this->cart->contents() as $items){
            $d_detail['kode_transaksi'] = $temp;
            $d_detail['kode_barang'] = $items['id'];
            $d_detail['nama_barang'] = $items['barang'];
			$d_detail['jumlah'] = $items['qty'];
			$d_detail['satuan'] = $items['satuan'];
            $d_detail['harga_beli'] = $items['price'];
            $d_detail['total'] = $items['subtotal'];
            $this->Transaksi_model->tambah_detail_barang_masuk($d_detail);
			
            $d_u['stock_awal'] = $this->Transaksi_model->getTambahStok($d_detail['kode_barang'],$d_detail['jumlah']);
            $key['kode_barang'] = $d_detail['kode_barang'];
            $this->Transaksi_model->updateData("master_barang",$d_u,$key);
        }
        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
		
        $this->session->set_flashdata('pesan','<div class="alert alert-success"> Transaksi Berhasil 
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
		redirect('gudang/tbm');
	}
	
	function view(){
		$id= $this->uri->segment(4);
		$data['title']='Lihat Transaksi Barang Masuk';
		$query=$this->Transaksi_model->get_transaksi_by_id($id);
		foreach($query as $row){
			$data['kode']=$row->kode_transaksi;
			$data['tanggal']=date('d F Y',strtotime($this->Transaksi_model->tgl_str($row->tanggal_transaksi)));
			$data['supplier']=$row->nama_supplier;
		}
		$sql="SELECT *,(select sum(total)as jumlah from detail_transaksi where kode_transaksi='$id')total_all from detail_transaksi where kode_transaksi='$id'";
		$data['cart']=$this->db->query($sql);
		$this->load->view('gudang/template/head',$data);
		$this->load->view('gudang/template/header');
		$this->load->view('gudang/template/menu');
		$this->load->view('gudang/view_transmasuk',$data);
		$this->load->view('gudang/template/footer');
		
	}	
	
	function edit(){
		$id=$this->uri->segment(4);
		$data['title']='Edit Transaksi Barang Masuk';
		$data['dd_supplier']=$this->Transaksi_model->dd_supplier();
		$data['attribute']="class='form-control select2' readonly='true' ";
		$query=$this->Transaksi_model->get_transaksi_by_id($id);
		foreach($query as $row){
			$data['kode']=$row->kode_transaksi;
			$data['tanggal']=$this->Transaksi_model->tgl_str($row->tanggal_transaksi);
			$data['supplier']=$row->kode_supplier;
		}
		$sql="SELECT *,(select sum(total)as jumlah from detail_transaksi where kode_transaksi='$id')total_all from detail_transaksi where kode_transaksi='$id'";
		$data['cart']=$this->db->query($sql);
		$this->load->view('gudang/template/head',$data);
		$this->load->view('gudang/template/header');
		$this->load->view('gudang/template/menu');
		$this->load->view('gudang/edit_transmasuk',$data);
		$this->load->view('gudang/template/footer');
		
	}	
	function hapus(){
		$id['kode_transaksi']=$this->uri->segment(4);
		$q=$this->Transaksi_model->getSelectedData('detail_transaksi',$id);
			foreach($q->result() as $d){
				$d_u['stock_awal'] = $this->Transaksi_model->getKurangStok($d->kode_barang,$d->jumlah);
				$key['kode_barang'] = $d->kode_barang;
				$this->Transaksi_model->updateData("master_barang",$d_u,$key);
			}
        $this->Transaksi_model->deleteData('transaksi',$id);
		$this->Transaksi_model->deleteData('detail_transaksi',$id);
        redirect('gudang/tbm');
    }
 }
