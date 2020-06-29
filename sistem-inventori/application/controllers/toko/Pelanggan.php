<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Pelanggan extends CI_Controller {
	
	Public function __construct(){
		parent::__construct();
		if ($this->session->userdata('usergroup')!='TokoRingroad') {
		$this->session->set_flashdata('pesan','Maaf Anda Bukan Admin Toko Ringroad');
		redirect(base_url());
		}
			$this->load->model('Pelanggan_model');
		}

	public function index()
	{
		$data['title'] = 'List Pelanggan'; //judul title
        $data['query'] = $this->Pelanggan_model->get_all_pelanggan(); //query model semua Pelanggan
 
		$this->load->view('toko_ringroad/template/head',$data);
		$this->load->view('toko_ringroad/template/header');
		$this->load->view('toko_ringroad/template/menu');
		$this->load->view('toko_ringroad/list_pelanggan',$data);
		$this->load->view('toko_ringroad/template/footer');	
	}
		
	public function tambah_pelanggan(){
		$data=array
			(
			'title'=>'Add Pelanggan',
			'id_pelanggan'=>$this->Pelanggan_model->get_id_pelanggan(),
			);
		$this->load->view('toko_ringroad/template/head',$data);
		$this->load->view('toko_ringroad/template/header');
		$this->load->view('toko_ringroad/template/menu');
		$this->load->view('toko_ringroad/tambah_pelanggan',$data);
		$this->load->view('toko_ringroad/template/footer');
	}
	
	public function AddCheckout()
	{
		$this->form_validation->set_rules('Id','Id','required');
		$this->form_validation->set_rules('Nama','Nama','required');
		$this->form_validation->set_rules('Alamat','Alamat','required');
		$this->form_validation->set_rules('Telepon','Telepon','required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"> 
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
		if ($this->form_validation->run() == FALSE)
        {
			$this->tambah_pelanggan();
		}else{
		$data=array(
			'id_pelanggan'=>$this->input->post('Id'),
			'nama_pelanggan'=>$this->input->post('Nama'),
			'alamat'=>$this->input->post('Alamat'),
			'telepon'=>$this->input->post('Telepon'),
			);
			$this->Pelanggan_model->tambah_pelanggan($data);
			redirect(base_url('toko_ringroad/pelanggan'));
		}
	}
	
	public function edit($id){

		$data['query']=$this->Pelanggan_model->get_pelanggan_by_id($id);
		$data['title']='Edit Pelanggan';
		
		$this->load->view('toko_ringroad/template/head',$data);
		$this->load->view('toko_ringroad/template/header');
		$this->load->view('toko_ringroad/template/menu');
		$this->load->view('toko_ringroad/edit_pelanggan',$data);
		$this->load->view('toko_ringroad/template/footer');
		}
	
	public function EditCheckout(){
	$id=$this->input->post('Id');
	$this->form_validation->set_rules('Id','Id','required');
	$this->form_validation->set_rules('Nama','Nama','required');
	$this->form_validation->set_rules('Alamat','Alamat','required');
	$this->form_validation->set_rules('Telepon','Telepon','required');
	$this->form_validation->set_error_delimiters('<div class="alert alert-danger"> 
	<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
	if ($this->form_validation->run() == FALSE)
       {
		$this->edit($id);
	}else{
	$data=array(
		'id_pelanggan'=>$this->input->post('Id'),
		'nama_pelanggan'=>$this->input->post('Nama'),
		'alamat'=>$this->input->post('Alamat'),
		'telepon'=>$this->input->post('Telepon'),
			);
		$this->Pelanggan_model->update_pelanggan($id,$data);
		redirect(base_url('toko_ringroad/pelanggan'));
		}
	}
	
	public function delete(){
	$id=$this->uri->segment(4);
	$this->Pelanggan_model->delete_pelanggan($id);
	redirect(base_url('toko_ringroad/pelanggan'));
	}
	
}
	
	