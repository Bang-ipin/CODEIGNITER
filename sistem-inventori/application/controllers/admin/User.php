<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('usergroup')!='Administrator') {
		$this->session->set_flashdata('pesan','Maaf Anda Bukan Admin');
		redirect(base_url());
		}
		$this->load->model('Admin_model');
			$this->load->library('form_validation');
			$this->load->library('encryption');
	}	
	public function index(){
		$data=array('title'=>'Manajemen User');
		$this->load->view('admin/template/head',$data);
		$this->load->view('admin/template/header');
		$this->load->view('admin/template/menu');
		$this->listuser();
		$this->load->view('admin/template/footer');
	}
	public function listuser()
	{	
		$data['password'] =$this->encryption->decrypt('password');
        $data['title'] = 'List User'; //judul title
        $data['query'] = $this->Admin_model->get_all_user(); //query model semua barang
 
		$this->load->view('admin/listuser',$data);
		
	}
	
	public function tambah_user()
	{
	$data=array(
		'id_user'=>$this->Admin_model->id_otomatis(),
		'title'=> 'Tambah User',
		'dd_usergroup'=>$this->Admin_model->dd_usergroup(),
		'usergroup_selected'=>$this->input->post('usergroup')? $this->input->post('post'):'',
		'attribute'=>"class='form-control select2'"
		);
		$this->load->view('admin/template/head',$data);
		$this->load->view('admin/template/header');
		$this->load->view('admin/template/menu');
		$this->load->view('admin/tambah_user',$data);
		$this->load->view('admin/template/footer');
	}
	
	public function checkout()
	{
			 $this->form_validation->set_rules('ID','ID','required');
			 $this->form_validation->set_rules('Username','Username','required');
			 $this->form_validation->set_rules('Password','Password','required');
			 $this->form_validation->set_rules('Email','Email','required');
			 $this->form_validation->set_rules('User','User','required');
			 $this->form_validation->set_rules('Level','Level','required');
			 $this->form_validation->set_error_delimiters('<div class="alert alert-danger"> 
			<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
			if ($this->form_validation->run() == FALSE)
			{
			$this->tambah_user();
			}else{
			$data=array(
			'id_user'=>$this->Admin_model->id_otomatis(),
            'username'=>$this->input->post('Username'),
            'password'=>sha1($this->input->post('Password')),
            'email'=>$this->input->post('Email'), 
			'nama_pengguna'=>$this->input->post('User'), 
			'id_usergroup'=>$this->input->post('Level')
			);
			$this->Admin_model->tambah_user($data);
			$this->session->set_flashdata('message','<div class="alert alert-success"> Data Berhasil Ditambahkan 
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
			redirect(base_url('admin/user'));
		}
	}
		
	 function edit($id){
		$data=array(
			'title'=>'Edit User',
			'query'=>$this->Admin_model->get_user_by_id($id),
			'dd_usergroup'=>$this->Admin_model->dd_usergroup(),
			'attribute'=>"class='form-control select2'"
			);
		$this->load->view('admin/template/head',$data);
		$this->load->view('admin/template/header');
		$this->load->view('admin/template/menu');
		$this->load->view('admin/edit_user',$data);
		$this->load->view('admin/template/footer');
		}
		
	function checkoutedit()
	{
		$id = $this->input->post('Id');
		$this->form_validation->set_rules('Id','Id','required');
		$this->form_validation->set_rules('Username','Username','required');
		 $this->form_validation->set_rules('Password','Password','required');
		 $this->form_validation->set_rules('Email','Email','required');
		 $this->form_validation->set_rules('User','User','required');
		 $this->form_validation->set_rules('Level','Level','required');
		 $this->form_validation->set_error_delimiters('<div class="alert alert-danger"> 
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
	if ($this->form_validation->run() ==TRUE)
		{
		$data=array(
				'id_user'=>$this->input->post('Id'),
				'username'=>$this->input->post('Username'),
				'password'=>sha1($this->input->post('Password')),
				'email'=>$this->input->post('Email'),
				'nama_pengguna'=>$this->input->post('User'),
				'id_usergroup'=>$this->input->post('Level')
				);
			$this->Admin_model->update($id,$data);
			$this->session->set_flashdata('message','<div class="alert alert-success"> Data Berhasil Di Edit 
			<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
			redirect(base_url('admin/user'));
		}else
			{
					$this->edit($id);	
			}
		}
	
	public function delete(){
        $id = $this->uri->segment(4);
        $this->Admin_model->delete($id);
		$this->session->set_flashdata('message','<div class="alert alert-danger"> Data Berhasil Dihapus 
		<button type="button" class="close" data-dismiss="alert">&times;</button>','</div>');
        redirect(base_url('admin/user'));
		}
	
	}
	