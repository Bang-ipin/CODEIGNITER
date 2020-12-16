<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Orders extends CI_Controller {
	
	public function index()
	{	
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
		$config=$this->Config_model->Get_All();
		$data['situs']			= $config['nama'];
		$data['logo'] 			= $config['logo'];
		$data['author']			= $config['pemilik'];
		$data['favicon']		= $config['favicon'];
		$data['title']			=  'List Orders';
		
		$data['css']			= $this->load->view('css',$data,true);
		$data['js']				= $this->load->view('js',$data,true);
		$data['script']			= $this->load->view('script',$data,true);
		
		$data['content']		= $this->load->view('list',$data,true);
		$this->load->view('admin/template',$data);
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	public function show_order()
	{	
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$data['dataorder'] 				= $this->Order_model->get_all_orders();
			$this->load->view('order',$data,'refresh');
		}
		else{
			redirect(site_url('appweb'));
		}	
	}
	public function show_pending()
	{	
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$data['dataorder'] 				= $this->Order_model->getOrderPending();
			$this->load->view('pending',$data);
		}
		else{
			redirect(site_url('appweb'));
		}	
	}
	
	public function show_complete()
	{	
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$data['dataorder'] 				= $this->Order_model->getOrderComplete();
			$this->load->view('complete',$data);
		}
		else{
			redirect(site_url('appweb'));
		}	
	}
	public function show_cancel()
	{	
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$data['dataorder'] 				= $this->Order_model->getOrderCancel();
			$this->load->view('cancel',$data);
		}
		else{
			redirect(site_url('appweb'));
		}	
	}
	public function show_reject()
	{	
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$data['dataorder'] 				= $this->Order_model->getOrderReject();
			$this->load->view('reject',$data);
		}
		else{
			redirect(site_url('appweb'));
		}	
	}
	
	public function view_order()
	{	
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
		
			$id=$this->input->get('message_id');
			$data['order'] 				= $this->Order_model->detailOrder($id);
			$prov						= $data['order']['provinsi'];
			$kota						= $data['order']['kota'];
			$data['city']				= $this->Site_model->convert_city($prov,$kota);
			$data['provinsi']			= $this->Site_model->convert_province($prov);
			$data['vieworder'] 			= $this->Order_model->viewOrder($id);
			$this->load->view('vieworder',$data);
		
		}
		else{
			redirect(site_url('appweb'));
		}	
	}
	
	public function proccess($id,$status) 
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$this->Order_model->status($id,$status);
			$this->session->set_flashdata('SUCCESSMSG','Order berhasil di update!!');
			redirect(site_url('appweb/orders'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
	public function hapus($id){
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
				
			$ids['invoice']=$id;
			$q=$this->Order_model->getSelectedData('detail_pesanan',$ids);
				foreach($q->result() as $d){
					$d_u['qty'] = $this->Site_model->getTambahStok($d->kode_barang,$d->jumlah);
					$key['kode_barang'] = $d->kode_barang;
					$this->Order_model->updateData("produk",$d_u,$key);
				}
			$this->Order_model->deleteData('pesanan',$ids);
			$this->Order_model->deleteData('detail_pesanan',$ids);
			redirect('appweb/orders');
		}
		else{
			redirect(site_url('appweb'));
		}
    }

}