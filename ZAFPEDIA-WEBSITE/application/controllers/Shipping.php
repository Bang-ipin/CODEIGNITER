<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shipping extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('text');
		$this->load->model('Site_Model');
	}
	
	public function index()
	{
		$data=array(
			'title'				=> 'Ongkir',
			'dd_kotaasal'		=> $this->Site_Model->_get_city(),
			'dd_provinsitujuan'	=> $this->Site_Model->_get_province(),
			'dd_kabupaten'		=> '',
			
		);
		$this->load->view('ongkir',$data);
		
	}
	public function get_kabupaten()
	{
		$provinsi_id = 3;//$this->input->get('prov_id');
		$this->Site_Model->get_kabupaten($provinsi_id);
		$this->index();
	}

}