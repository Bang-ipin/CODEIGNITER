<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Advertising extends CI_Controller {
	
	public function index(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$config=$this->Config_model->Get_All();
			$data['logo']			=  $config['logo'];
			$data['author']			=  $config['pemilik'];
			$data['favicon']		=  $config['favicon'];
			$data['tema']			=  $config['tema'];
			$data['title']			=  "Semua Iklan";
			
			$data['css']			= $this->load->view('css',$data,true);
			$data['js']				= $this->load->view('js',$data,true);
			$data['script']			= $this->load->view('script',$data,true);
			
			$data['content']		=  $this->load->view('list',$data,true);
			$this->load->view('admin/template',$data);
		}	
		else{
			redirect(site_url('appweb'));
		}
	}
	public function top(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$config=$this->Config_model->Get_All();
			$data['logo']			=  $config['logo'];
			$data['author']			=  $config['pemilik'];
			$data['favicon']		=  $config['favicon'];
			$data['tema']			=  $config['tema'];
			$data['title']			=  "Iklan Atas";
			$data['dd_status']		= $this->Site_model->dd_status();
				
			$data['css']			= $this->load->view('top/css',$data,true);
			$data['js']				= $this->load->view('top/js',$data,true);
			$data['script']			= $this->load->view('top/script',$data,true);
			
			$data['tampiliklan']	=  $this->load->view('top/tampiliklan',$data,true);
			$data['content']		=  $this->load->view('top/topiklan',$data,true);
			$this->load->view('admin/template',$data);
		}	
		else{
			redirect(site_url('appweb'));
		}
	}
	public function bottom(){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$config=$this->Config_model->Get_All();
			$data['logo']			=  $config['logo'];
			$data['author']			=  $config['pemilik'];
			$data['favicon']		=  $config['favicon'];
			$data['tema']			=  $config['tema'];
			$data['title']			=  "Iklan Bawah";
			$data['dd_status']		= $this->Site_model->dd_status();
			
			$data['css']			= $this->load->view('bottom/css',$data,true);
			$data['js']				= $this->load->view('bottom/js',$data,true);
			$data['script']			= $this->load->view('bottom/script',$data,true);
			
			$data['tampiliklan']	=  $this->load->view('bottom/tampiliklan',$data,true);
			$data['content']		=  $this->load->view('bottom/bottomiklan',$data,true);
			$this->load->view('admin/template',$data);
		}	
		else{
			redirect(site_url('appweb'));
		}
	}
	
	public function adds(){
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$config=$this->Config_model->Get_All();
			$data=array(
				'id'		=>'',
				'parent_id'	=>'',
				'menu'		=>'',
				'root'		=>'',
				'status'	=>'',
				'url'		=>'',
				'type'		=>'',
				'posisi'	=>'',
				'logo'		=>$config['logo'],
				'author'	=>$config['pemilik'],
				'favicon'	=>$config['favicon'],
				'tema'		=> $config['tema'],
				'title'		=> 'Add Menu',
				'dd_parent'	=>$this->Menu_model->dd_parent(),
				'dd_type'	=>$this->Menu_model->dd_type(),
				'dd_status'	=>$this->Menu_model->dd_status(),

			);
			$data['content']	= $this->load->view('admin/menu/form',$data,TRUE);
			$this->load->view('admin/template',$data);
		}
		else{
			redirect(site_url('appweb'));
		}
	}
		
	public function edits($id){
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$text 	= "SELECT * FROM cms_menu WHERE id_menu='$id'";
			$sql	= $this->db->query($text);
			if($sql->num_rows() > 0){
				
				foreach($sql->result() as $db){
					$data['id']				=$id;
					$data['parent_id']		=$db->id_parent;
					$data['root']			=$db->id_parent;
					$data['menu']			=$db->nama_menu;
					$data['status']			=$db->status;
					$data['type']			=$db->type;
					$data['url']			=$db->url;
					$data['posisi']			=$db->posisi;
					
				}
			}
			else{
					$data['id']				=$id;
					$data['parent_id']		='';
					$data['root']			='';
					$data['menu']			='';
					$data['status']			='';
					$data['type']			='';
					$data['url']			='';
					$data['posisi']			='';
			}
			
			$config=$this->Config_model->Get_All();
			$data['title']		=  'Edit Menu';
			$data['logo']		= $config['logo'];
			$data['author']		= $config['pemilik'];
			$data['favicon']	= $config['favicon'];
			$data['tema']		= $config['tema'];
			$data['dd_parent']	= $this->Menu_model->dd_parent();
			$data['dd_status']	= $this->Menu_model->dd_status();
			$data['dd_type']	= $this->Menu_model->dd_type();
			$data['content']=$this->load->view('admin/menu/form',$data,TRUE);
			$this->load->view('admin/template',$data);
		}
		else{
			redirect(site_url('appweb'));
		}
	}
	
	public function simpans() {
		
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
		
			$menu					= ucwords($this->input->post('menu',null,TRUE));
			$root					= $this->input->post('root',null,TRUE); 
			$posisi					= $this->input->post('posisi',null,TRUE); 
			$status					= $this->input->post('status',null,TRUE); 
			$type					= $this->input->post('type',null,TRUE); 
			$url					= strtolower($this->input->post('url',null,TRUE)); 
				
			$data['nama_menu']		= $menu;
			$data['menu_seo']		= slug($menu);
			$data['id_parent']		= $root;
			$data['posisi']			= $posisi;
			$data['status']			= $status; 
			$data['type']			= $type; 
			$data['url']			= $url; 
				
			$id						= $this->input->post('id',null,TRUE);
			$d						= $this->db->get_where('cms_menu',array('id_menu'=>$id));
			if($d->num_rows() > 0){
				$this->Menu_model->update($id,$data);
				$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Update');
				redirect(site_url('admin/menu'));
			}
			else{
				$this->Menu_model->add($data);
				$this->session->set_flashdata('SUCCESSMSG','Data Berhasil Di Tambah');
				redirect(site_url('admin/menu'));
			}
		}
		else{
			redirect(site_url('appweb'));
		}		
	}

	public function hapus($id) 
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			
			$this->Menu_model->hapus($id);
			$this->session->set_flashdata('SUCCESSMSG','Menu Deleted Successfully!!');
			redirect(site_url('admin/menu'));
		}
		else{
			redirect(site_url('appweb'));
		}
	}	
	public function hapusadsid() 
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){

			$id=$this->input->post('id');
			$this->Ads_model->hapus($id);
			
		}
		else{
			redirect(site_url('appweb'));
		}
	}	

	public function update_struktur()
	{
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){
			if(isset($_POST['output']))
			{
				$this->ads_lib->updatestructure();
			}
			else {
			    echo "ERROR!";
			}
		}
		else{
			redirect(site_url('appweb'));
		}
	}

	public function addadscustom(){
		$cek = $this->session->userdata('level')==01;
		if(!empty($cek)){

			$nama 		=$this->input->post("nama-ads-custom");
			$url 		=$this->input->post("url-ads-custom");
			$type 		=$this->input->post("type-ads-custom");
			$image 		=$this->input->post("image-ads-custom");
			$status 	=$this->input->post("status-ads-custom");
			
			$data['nama_iklan']	=ucwords($nama);
			$data['type']		=$type;
			$data['iklan_seo']	=slug($nama);
			$data['image']		=$image;
			$data['status']		=$status;
			if(empty($url)){
				$data['url']		= site_url();
			}else{
				$data['url']		= $url;
			}
			$this->Ads_model->add($data);

		}
		else{
			redirect(site_url('appweb'));
		}
		
	}

	function tampiladstop(){
		$this->load->view('top/tampiliklan');
	}
	function tampiladsbottom(){
		$this->load->view('bottom/tampiliklan');
	}

}