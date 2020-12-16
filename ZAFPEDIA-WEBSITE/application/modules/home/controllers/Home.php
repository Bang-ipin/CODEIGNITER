<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {	
    
	public function index() {	
	
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			$config 						= $this->Config_model->Get_All();
			$data['title']					= 'Dashboard';
			$data['situs']					= $config['nama'];
			$data['logo']					= $config['logo'];
			$data['author']					= $config['pemilik'];
			$data['favicon']				= $config['favicon'];
			$data['tema']					= $config['tema'];
			
			$data['totalartikel']			= $this->Beranda_model->totalartikel();
			$data['totalgaleri']			= $this->Beranda_model->totalgaleri();
			$data['totaldownload']			= $this->Beranda_model->totaldownload();
			$data['totalorders']			= $this->Beranda_model->totalorders();
			$data['totalomset']				= $this->Beranda_model->totalomset();
			$data['totalcustomers']			= $this->Beranda_model->totalcustomers();
			$data['lastpost']				= $this->Beranda_model->lastpost();
			$data['topselling']				= $this->Beranda_model->topselling();
			$data['topviewblog']			= $this->Beranda_model->topviewblog();
			$data['topviewproduk']			= $this->Beranda_model->topviewproduk();
			$data['newcustomer']			= $this->Beranda_model->newcustomer();
			$data['lastorder']				= $this->Beranda_model->toptenorder();
			$data['pendingorder']			= $this->Beranda_model->pendingordered();
			$data['paidorder']				= $this->Beranda_model->paidordered();
			$data['cancelorder']			= $this->Beranda_model->cancelordered();
			$data['komentarpending']		= $this->Beranda_model->getKomentarPending();
			$data['komentarapprove']		= $this->Beranda_model->getKomentarApprove();
			$data['komentarrejected']		= $this->Beranda_model->getKomentarRejected();
			$data['reviewsprodukapprove']	= $this->Beranda_model->getReviewProdukApprove();
			$data['reviewsprodukrejected']	= $this->Beranda_model->getReviewProdukRejected();

			$data['css']					= $this->load->view('css',$data,true);
			$data['js']						= $this->load->view('js',$data,true);
			$data['script']					= $this->load->view('script',$data,true);
			
			$data['content']				= $this->load->view('list',$data,true);
			$this->load->view('admin/template',$data);
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
}