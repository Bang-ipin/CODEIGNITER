<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author Ervin
 * @copyright 2016
 */

class Penjualan extends CI_Controller {
	Public function __construct(){
		parent::__construct();
		if ($this->session->userdata('usergroup')!='TokoRingroad') {
		$this->session->set_flashdata('pesan','Maaf Anda Bukan admin Toko');
		redirect(base_url());
		}
			$this->load->model('Transaksi_model');
			$this->load->library('form_validation','cart');
		}

  public function index(){
	   $sql=("SELECT * from trans_toko2 a join pelanggan b on a.id_pelanggan=b.id_pelanggan where status=2 ORDER BY kode_transaksi DESC");
		$data=array(
			'title' => 'List Transaksi Penjualan', //judul title
			'query'=> $this->db->query($sql)->result(), //query model semua transaksi
			'attribute'=>"class='form-control select2' required",
			);
        $this->load->view('toko_ringroad/template/head',$data);
		$this->load->view('toko_ringroad/template/header');
		$this->load->view('toko_ringroad/template/menu');
		$this->load->view('toko_ringroad/v_penjualan',$data);
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
				'harga'=>$rows['harga_jual'],
				);
			}
			echo json_encode($data); // convert variable respon menjadi JSON, lalu tampilkan 
		}
	}
	function add(){
		$data=array(
			'title' => 'Tambah Transaksi Penjualan', //judul title
			'kode_transaksi' => $this->Transaksi_model->get_kode_penjualan1(),
			'query'=> $this->Transaksi_model->get_master_penjualan1(), //query model semua transaksi
			'dd_pelanggan' =>$this->Transaksi_model->dd_pelanggan(),
			'tgl_jual'	=> date('d-m-Y'),
			'attribute'=>"class='form-control select2'",
			);
        $this->load->view('toko_ringroad/template/head',$data);
		$this->load->view('toko_ringroad/template/header');
		$this->load->view('toko_ringroad/template/menu');
		$this->load->view('toko_ringroad/transaksi_keluar',$data);
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
    redirect(base_url('toko_ringroad/penjualan/add'));
    }
	
	function ajaxpelanggan(){
		$id_pelanggan="";
		if (isset($_GET['q'])){
			$id_pelanggan = strval( $_GET['q']);
		}
		if ($id_pelanggan == 'success'){
			echo 'Registration Success';
		}
		if($id_pelanggan){
		$sql=("select nama_pelanggan from pelanggan where id_pelanggan='$id_pelanggan'");
		$result=$this->db->query($sql);
		foreach($result->result_array() as $d){
				echo $d['nama_pelanggan'];
			}
		}
	}
	
	function lihat()
	{
		$this->load->view('toko_ringroad/cartjual');
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
		$data['kode_transaksi']=$this->Transaksi_model->get_kode_penjualan1();
		$temp=$data['kode_transaksi'];
		$data['tanggal_transaksi']=$this->Transaksi_model->tgl_sql($this->input->post('tanggal'));
		$data['id_pelanggan']=$this->input->post('pelanggan');
		$data['status']=2;
		$data['total_harga']=$this->input->post('total');
		$data['penerima']=$this->session->userdata('nama_pengguna');

		$this->Transaksi_model->tambah_penjualan1($data);
		
		foreach($this->cart->contents() as $items){
            $d_detail['kode_transaksi'] = $temp;
            $d_detail['kode_barang'] = $items['id'];
            $d_detail['nama_barang'] = $items['barang'];
			$d_detail['jumlah'] = $items['qty'];
			$d_detail['satuan'] = $items['satuan'];
            $d_detail['harga_jual'] = $items['price'];
            $d_detail['total'] = $items['subtotal'];
            $this->Transaksi_model->tambah_detail_penjualan1($d_detail);
			
            $d_u['stok'] = $this->Transaksi_model->getMinStok1($d_detail['kode_barang'],$d_detail['jumlah']);
            $key['kode_barang'] = $d_detail['kode_barang'];
            $this->Transaksi_model->updateData("stok_toko2",$d_u,$key);
        }
        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
		
        $this->session->set_flashdata('pesan','<div class="alert alert-success"> Transaksi Berhasil 
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
		redirect('toko_ringroad/penjualan');
	}
	
	function view(){
		$id= $this->uri->segment(4);
		$data['title']='Lihat Transaksi Penjualan';
		$query=$this->Transaksi_model->get_transaksi2_by_id($id);
		foreach($query as $row){
			$data['kode']=$row->kode_transaksi;
			$data['tanggal']=date('d F Y',strtotime($this->Transaksi_model->tgl_str($row->tanggal_transaksi)));
			$data['pelanggan']=$row->nama_pelanggan;
		}
		$sql="SELECT *,(select sum(total)as jumlah from dt_trans2 where kode_transaksi='$id')total_all from dt_trans2 where kode_transaksi='$id'";
		$data['cart']=$this->db->query($sql);
		$this->load->view('toko_ringroad/template/head',$data);
		$this->load->view('toko_ringroad/template/header');
		$this->load->view('toko_ringroad/template/menu');
		$this->load->view('toko_ringroad/view_transkeluar',$data);
		$this->load->view('toko_ringroad/template/footer');
		
	}
    function hapus(){
		$id['kode_transaksi']=$this->uri->segment(4);
		$q=$this->Transaksi_model->getSelectedData('dt_trans2',$id);
			foreach($q->result() as $d){
				$d_u['stok'] = $this->Transaksi_model->getAddStok1($d->kode_barang,$d->jumlah);
				$key['kode_barang'] = $d->kode_barang;
				$this->Transaksi_model->updateData("stok_toko2",$d_u,$key);
			}
        $this->Transaksi_model->deleteData('trans_toko2',$id);
		$this->Transaksi_model->deleteData('dt_trans2',$id);
        redirect('toko_ringroad/penjualan');
    }
 }
