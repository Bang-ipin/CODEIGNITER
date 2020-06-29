<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Supplier extends CI_Controller {
	
	Public function __construct(){
		parent::__construct();
		if ($this->session->userdata('usergroup')!='Administrator') {
		$this->session->set_flashdata('pesan','Maaf Anda Bukan Admin');
		redirect(base_url());
		}
			$this->load->model('Supplier_model');
		}

	public function index()
	{
		$data['title'] = 'List Supplier'; //judul title
        $data['query'] = $this->Supplier_model->get_all_supplier(); //query model semua supplier
 
		$this->load->view('admin/template/head',$data);
		$this->load->view('admin/template/header');
		$this->load->view('admin/template/menu');
		$this->load->view('admin/list_supplier',$data);
		$this->load->view('admin/template/footer');	
	}
	
	public function tambah_supplier(){
		$data=array(
				'kode_supplier'=>$this->Supplier_model->get_kode_supplier(),
				'title'=>'Add Supplier'
				);
		$this->load->view('admin/template/head',$data);
		$this->load->view('admin/template/header');
		$this->load->view('admin/template/menu');
		$this->load->view('admin/tambah_supplier',$data);
		$this->load->view('admin/template/footer');
	}
	
	public function tambah_supplier_proses()
	{
		$this->form_validation->set_rules('kode','kode','required');
		$this->form_validation->set_rules('Nama','Nama','required');
		$this->form_validation->set_rules('Alamat','Alamat','required');
		$this->form_validation->set_rules('Telepon','Telepon','required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"> 
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
		if ($this->form_validation->run() == FALSE)
        {
			$this->tambah_supplier();
		}else{
		$data=array(
			'kode_supplier'=>$this->Supplier_model->get_kode_supplier(),
			'nama_supplier'=>$this->input->post('Nama'),
			'alamat_supplier'=>$this->input->post('Alamat'),
			'telepon'=>$this->input->post('Telepon'),
			);
			$this->Supplier_model->tambah_supplier($data);
			redirect(base_url('admin/supplier'));
		}
	}
	
	public function edit_supplier($id){

		$data['query']=$this->Supplier_model->get_supplier_by_id($id);
		$data['title']='Edit supplier';
		$this->load->view('admin/template/head',$data);
		$this->load->view('admin/template/header');
		$this->load->view('admin/template/menu');
		$this->load->view('admin/edit_supplier',$data);
		$this->load->view('admin/template/footer');
		}
	
	public function edit_supplier_proses(){
	$id=$this->input->post('kode');
	$this->form_validation->set_rules('kode','kode','required');
	$this->form_validation->set_rules('Nama','Nama','required');
	$this->form_validation->set_rules('Alamat','Alamat','required');
	$this->form_validation->set_rules('Telepon','Telepon','required');
	$this->form_validation->set_error_delimiters('<div class="alert alert-danger"> 
	<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
	if ($this->form_validation->run() == FALSE)
       {
		$this->edit_supplier($id);
	}else{
	$data=array(
		'kode_supplier'=>$this->input->post('kode'),
		'nama_supplier'=>$this->input->post('Nama'),
		'alamat_supplier'=>$this->input->post('Alamat'),
		'telepon'=>$this->input->post('Telepon'),
			);
		$this->Supplier_model->update_supplier($id,$data);
		redirect(base_url('admin/supplier'));
		}
	}
	
	public function delete(){
	$id=$this->uri->segment(4);
	$this->Supplier_model->delete_supplier($id);
	redirect(base_url('admin/supplier'));
	}
	
}
	
	