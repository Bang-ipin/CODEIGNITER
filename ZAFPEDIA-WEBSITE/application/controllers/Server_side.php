<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Server_side extends CI_Controller {
	
	Public function __construct(){
		parent::__construct();
		
		if (!$this->session->userdata('level')==01) {
			$this->session->set_flashdata('pesan','Maaf Anda Bukan Administrator');
			redirect(site_url('appweb'));
			
		}
	}

	public function get_user()
	{
		$total=$this->db->count_all_results("admin");
		$length=intval($_REQUEST['length']);
		$length = $length < 0 ? $total: $length; 
		$start=intval($_REQUEST['start']);
		$draw=intval($_REQUEST['draw']);
		
		$search=$_REQUEST['search']["value"];
		
		$output=array();
		$output['data']=array();
		
		$end = $start + $length;
		$end = $end > $total ? $total : $end;

		if($search!=""){
		$this->db->like("username",$search);
		}
		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length,$start);

		$this->db->order_by('username','DESC');
		$query=$this->User_model->get_all_user();

		if($search!=""){
		$this->db->like("username",$search);
		$jum=$this->db->get('admin');
		$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$no=$start+1;
		foreach ($query as $user) {
			if(!empty($user['foto'])){
				$gambar = "<a href=".base_url('files/media/'.$user['foto'].'')." class='fancy-view'>
						   <img src=".base_url('files/media/'.$user['foto'].'')." alt='' border='0' class='img-responsive'>";
			}else{
				$gambar = "<a href=".base_url('files/images/blank.png')." class='fancy-view'>
						  <img src=".base_url('files/images/blank.png')." class='img-responsive' alt='' border='0'>";
			}
			$output['data'][]=
					array(
						$no,
						$user['username'],
						$user['email'],
						$user['nama_lengkap'],
						$user['telepon'],
						$user['level'],
						$user['status']=='0'?'<span class="label label-danger">Tidak Aktif</span>':'<span class="label label-success">Aktif</span>',
						$gambar,
						"<a href=".site_url('appweb/user/edit/'.$user['username'])." class='btn btn-sm btn-primary btn-editable'><i class='fa fa-pencil'></i> </a>
						<a href=".site_url('appweb/user/hapus/'.$user['username'])." class='btn btn-sm btn-danger btn-editable'><i class='fa fa-trash'></i> </a>",
					);
		$no++;
		}
		if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
			$records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
			$records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
		}
		
		$output['draw']=$draw;
		$output['recordsTotal']=$total;
		$output['recordsFiltered']=$total;
		
		echo json_encode($output);

	}
	
	public function get_level(){
		$total=$this->db->count_all_results("level");
		$length=intval($_REQUEST['length']);
		$length = $length < 0 ? $total: $length; 
		$start=intval($_REQUEST['start']);
		$draw=intval($_REQUEST['draw']);
		
		$search=$_REQUEST['search']["value"];
		
		$output=array();
		$output['data']=array();
		
		$end = $start + $length;
		$end = $end > $total ? $total : $end;

		if($search!=""){
		$this->db->like("level",$search);
		}
		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length,$start);

		$this->db->order_by('id_level','DESC');
		$query=$this->Level_model->get_all_level();

		if($search!=""){
		$this->db->like("level",$search);
		$jum=$this->db->get('level');
		$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$no=$start+1;
		foreach ($query as $level) {
			if($level['id_level']=='1'){
				$group = "<a href=".site_url('appweb/level/edit/'.$level['id_level'])." class='btn btn-sm btn-primary btn-editable'><i class='fa fa-pencil'></i> </a>";
			}else{
				$group = "<a href=".site_url('appweb/level/edit/'.$level['id_level'])." class='btn btn-sm btn-primary btn-editable'><i class='fa fa-pencil'></i> </a>
						 <a href=".site_url('appweb/level/hapus/'.$level['id_level'])." class='btn btn-sm btn-danger btn-editable'><i class='fa fa-trash'></i> </a>";
			
			}
			$output['data'][]=
					array(
						$no,
						$level['id_level'],
						$level['level'],
						$group,
					);
		$no++;
		}
		if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
			$records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
			$records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
		}
		
		$output['draw']=$draw;
		$output['recordsTotal']=$total;
		$output['recordsFiltered']=$total;
		
		echo json_encode($output);

	}
	public function get_tema(){
		$total=$this->db->count_all_results("tema");
		$length=intval($_REQUEST['length']);
		$length = $length < 0 ? $total: $length; 
		$start=intval($_REQUEST['start']);
		$draw=intval($_REQUEST['draw']);
		
		$search=$_REQUEST['search']["value"];
		
		$output=array();
		$output['data']=array();
		
		$end = $start + $length;
		$end = $end > $total ? $total : $end;

		if($search!=""){
		$this->db->like("tema",$search);
		}
		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length,$start);

		$this->db->order_by('id','ASC');
		$query=$this->Tema_model->get_tema();

		if($search!=""){
		$this->db->like("tema",$search);
		$jum=$this->db->get('tema');
		$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$no=$start+1;
		foreach ($query as $tema) {
			if(!empty($tema['image'])){
				$gambar = "<a href=".base_url('files/media/'.$tema['image'].'')." class='fancy-view'>
						   <img src=".base_url('files/media/'.$tema['image'].'')." alt='' border='0' class='img-responsive'>";
			}else{
				$gambar = "<a href=".base_url('assets/admin/layout/img/no-image.jpg')." class='fancy-view'>
						  <img src=".base_url('assets/admin/layout/img/no-image.jpg')." class='img-responsive' alt='' border='0'>";
			}
			$output['data'][]=
					array(
						$tema['id'],
						$tema['tema'],
						$tema['status']=='0'?'<span class="label label-danger">Tidak Aktif</span>':'<span class="label label-success">Aktif</span>',
						$gambar,
						"<a class='btn btn-primary btn-sm' type='button' data-toggle='tooltip'  title='Edit Tema'  href=".site_url('appweb/themes/edit/'.$tema['id'])."><i class='fa fa-pencil'></i></a>
						 <a data-href='' class='btn btn-danger btn-sm delete'  data-toggle='tooltip' title='Delete' href=".site_url('appweb/themes/hapus/'.$tema['id'])." ><span class='fa fa-times' title='delete'></span></a>	 
						 "
					);
		$no++;
		}
		if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
			$records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
			$records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
		}
		
		$output['draw']=$draw;
		$output['recordsTotal']=$total;
		$output['recordsFiltered']=$total;
		
		echo json_encode($output);

	}
	public function get_kategori()
	{
		$total=$this->db->count_all_results("kategori");
		$length=intval($_REQUEST['length']);
		$length = $length < 0 ? $total: $length; 
		$start=intval($_REQUEST['start']);
		$draw=intval($_REQUEST['draw']);
		
		$search=$_REQUEST['search']["value"];
		
		$output=array();
		$output['data']=array();
		
		$end = $start + $length;
		$end = $end > $total ? $total : $end;

		if($search!=""){
		$this->db->like("kategori",$search);
		}
		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length,$start);

		$this->db->order_by('id','ASC');
		$query=$this->db->query("SELECT * FROM kategori")->result_array();

		if($search!=""){
		$this->db->like("kategori",$search);
		$jum=$this->db->get('kategori');
		
		$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$no=$start+1;
		foreach ($query as $kategori) {
			date_default_timezone_set('Asia/Jakarta');
			$date=date('d-m-Y',strtotime($kategori['tgl_dibuat']));
			$output['data'][]=
					array(
						$no,
						$kategori['kategori'],
						$date,
						$kategori['posting'],
						$kategori['status']=='0'?'<span class="label label-danger">Not Publish</span>':'<span class="label label-success">Publish</span>',
						"<a href=".site_url('appweb/categories/edit/'.$kategori['id'])." class='btn btn-sm btn-primary'><i class='fa fa-pencil'></i> </a>
						<a href=".site_url('appweb/categories/hapus/'.$kategori['id'])." class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> </a>",
					);
		$no++;
		}
		if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
			$records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
			$records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
		}
		
		$output['draw']=$draw;
		$output['recordsTotal']=$total;
		$output['recordsFiltered']=$total;
		
		echo json_encode($output);

	}
	
	public function get_member()
	{
		$total=$this->db->count_all_results("customer");
		$length=intval($_REQUEST['length']);
		$length = $length < 0 ? $total: $length; 
		$start=intval($_REQUEST['start']);
		$draw=intval($_REQUEST['draw']);
		
		$search=$_REQUEST['search']["value"];
		
		$output=array();
		$output['data']=array();
		
		$end = $start + $length;
		$end = $end > $total ? $total : $end;

		if($search!=""){
		$this->db->like("nama_lengkap",$search);
		}
		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length,$start);

		$this->db->order_by('customer_id','DESC');
		$query=$this->Member_model->get_all_member();

		if($search!=""){
		$this->db->like("nama_lengkap",$search);
		$jum=$this->db->get('customer');
		$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$no=$start+1;
		foreach ($query as $member) {
			if(!empty($member['foto_member'])){
				$gambar = "<a href=".base_url('files/customer/'.$member['foto_member'])." class='fancy-view'>
						   <img src=".base_url('files/customer/'.$member['foto_member'])." alt='' border='0' class='img-responsive'>";
			}else{
				$gambar = "<a href=".base_url('assets/admin/layout/img/no-image.jpg')." class='fancy-view'>
						  <img src=".base_url('assets/admin/layout/img/no-image.jpg')." class='img-responsive' alt='' border='0'>";
			}
			$output['data'][]=
					array(
						$no,
						$member['nama_lengkap'],
						$member['jenis_kelamin']=='1'?'<span class="label label-danger">Pria</span>':'<span class="label label-success">Wanita</span>',
						$member['email'],
						$member['telepon'],
						$member['pekerjaan'],
						$member['perusahaan'],
						$member['status']=='0'?'<span class="label label-danger">Tidak Aktif</span>':'<span class="label label-success">Aktif</span>',
						$gambar,
						$member['status'] == '0'?'<a class="btn btn-danger btn-sm" data-toggle="tooltip" title="Tidak Aktif" href='.site_url().'appweb/members/status/'.$member['customer_id'].'/1><span  class="fa fa-ban" title="Tidak Aktif"></span></a>':
						'<a class="btn btn-sm btn-primary changestatus" data-toggle="tooltip" title="Aktif" href='.site_url().'appweb/members/status/'.$member['customer_id'].'/0><span  class="fa fa-check-circle-o" title="Aktif"></span></a>'.
						"<a data-toggle='tooltip' title='detail' href=".site_url('appweb/members/detail/'.$member['customer_id'])." class='btn btn-sm btn-info '><i class='fa fa-eye'></i> </a>
						<a data-toggle='tooltip' title='hapus' href=".site_url('appweb/members/hapus/'.$member['customer_id'])." class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> </a>",
					);
		$no++;
		}
		if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
			$records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
			$records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
		}
		
		$output['draw']=$draw;
		$output['recordsTotal']=$total;
		$output['recordsFiltered']=$total;
		
		echo json_encode($output);

	}
	public function get_download()
	{
		$total=$this->db->count_all_results("download");
		$length=intval($_REQUEST['length']);
		$length = $length < 0 ? $total: $length; 
		$start=intval($_REQUEST['start']);
		$draw=intval($_REQUEST['draw']);
		
		$search=$_REQUEST['search']["value"];
		
		$output=array();
		$output['data']=array();
		
		$end = $start + $length;
		$end = $end > $total ? $total : $end;

		if($search!=""){
		$this->db->like("judul",$search);
		}
		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length,$start);

		$this->db->order_by('id','DESC');
		$query=$this->Download_model->get_all_data();

		if($search!=""){
		$this->db->like("judul",$search);
		$jum=$this->db->get('download');
		$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$no=$start+1;
		foreach ($query as $down) {
			date_default_timezone_set('Asia/Jakarta');
			$date=date('d-m-Y',strtotime($down['tgl_posting']));
			$output['data'][]=
					array(
						$no,
						$down['judul'],
						$down['nama_file'],
						$date,
						$down['hits'],
						"<a data-toggle='tooltip' title='Edit' href=".site_url('appweb/downloads/edit/'.$down['id'])." class='btn btn-sm btn-info '><i class='fa fa-edit'></i> </a>
						<a data-toggle='tooltip' title='hapus' href=".site_url('appweb/downloads/hapus/'.$down['id'])." class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> </a>",
					);
		$no++;
		}
		if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
			$records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
			$records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
		}
		
		$output['draw']=$draw;
		$output['recordsTotal']=$total;
		$output['recordsFiltered']=$total;
		
		echo json_encode($output);

	}

	public function get_atribut()
	{
		$total=$this->db->count_all_results("atribut");
		$length=intval($_REQUEST['length']);
		$length = $length < 0 ? $total: $length; 
		$start=intval($_REQUEST['start']);
		$draw=intval($_REQUEST['draw']);
		
		$search=$_REQUEST['search']["value"];
		
		$output=array();
		$output['data']=array();
		
		$end = $start + $length;
		$end = $end > $total ? $total : $end;

		if($search!=""){
		$this->db->like("label",$search);
		}
		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length,$start);

		$this->db->order_by('id_atribut','DESC');
		$query=$this->Atribut_model->get_all_atribut();

		if($search!=""){
		$this->db->like("label",$search);
		$jum=$this->db->get('atribut');
		
		$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$no=$start+1;
		foreach ($query as $att) {
			date_default_timezone_set('Asia/Jakarta');
			$date=date('d-m-Y',strtotime($att['created_date']));
			$output['data'][]=
					array(
						
						$att['label'],
						$att['parent_id'],
						$att['keterangan'],
						$date,
						$att['status']=='0'?'<span class="label label-danger">Tidak Aktif</span>':'<span class="label label-info">Aktif</span>',
						$att['posisi'],
						$att['status'] == '0'?'<a class="btn btn-primary btn-sm changestatus" data-toggle="tooltip" title="Tidak Aktif" href='.site_url().'appweb/atributs/status/'.$att['id_atribut'].'/1><span  class="fa fa-ban" title="Tidak Aktif"></span></a>':'<a class="btn btn-primary btn-sm changestatus" data-toggle="tooltip" title="Aktif" href='.site_url().'appweb/atributs/status/'.$att['id_atribut'].'/0><span  class="fa fa-check-circle-o" title="Aktif"></span></a>'.
						 "<a class='btn btn-info btn-rounded btn-condensed btn-sm' type='button' data-toggle='tooltip'  title='Edit'  href=".site_url('appweb/atributs/edit/'.$att['id_atribut'])."><i class='fa fa-pencil'></i></a>
						 <a data-href='' class='btn btn-danger btn-rounded btn-condensed btn-sm delete'  data-toggle='tooltip' title='Delete' href=".site_url('appweb/atributs/hapus/'.$att['id_atribut'])." ><span class='fa fa-times' title='delete'></span></a>	 
						 "
					);
			$no++;
		}
		
		$output['draw']=$draw;
		$output['recordsTotal']=$total;
		$output['recordsFiltered']=$total;
		
		echo json_encode($output);

	}
	public function get_shop_kategori()
	{
		$total=$this->db->count_all_results("kategori_produk");
		$length=intval($_REQUEST['length']);
		$length = $length < 0 ? $total: $length; 
		$start=intval($_REQUEST['start']);
		$draw=intval($_REQUEST['draw']);
		
		$search=$_REQUEST['search']["value"];
		
		$output=array();
		$output['data']=array();
		
		$end = $start + $length;
		$end = $end > $total ? $total : $end;
		  
		if($search!=""){
		$this->db->like("kategori",$search);
		}
		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length,$start);

		$this->db->order_by('posisi','ASC');
		$query=$this->Categoryproduk_model->get_all_kategori();

		if($search!=""){
		$this->db->like("kategori",$search);
		$jum=$this->db->get('kategori_produk');
		
		$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$no=$start+1;
		foreach ($query as $cat) {
			date_default_timezone_set('Asia/Jakarta');
			$date=date('d-m-Y',strtotime($cat['tgl_dibuat']));
			$output['data'][]=
					array(
						$no,
						$cat['kategori'],
						$date,
						$cat['username'], 
						$cat['status']=='0'?'<span class="label label-danger">Tidak Aktif</span>':'<span class="label label-success">Aktif</span>',
						$cat['posisi'],
						$cat['status'] == '0'?'<a class="btn btn-danger btn-sm changestatus" data-toggle="tooltip" title="Tidak Aktif" href="'.site_url().'appweb/category-product/status/'.$cat['kode_kategori'].'/1"><span  class="fa fa-ban" title="Tidak Aktif"></span></a>':'<a class="btn btn-sm btn-primary changestatus" data-toggle="tooltip" title="Aktif" href="'.site_url().'appweb/category-product/status/'.$cat['kode_kategori'].'/0"><span  class="fa fa-check-circle-o" title="Aktif"></span></a>'.
						 "<a class='btn btn-primary btn-sm' type='button' data-toggle='tooltip'  title='Edit'  href=".site_url('appweb/category-product/edit/'.$cat['kode_kategori'])."><i class='fa fa-pencil'></i></a>
						 <a data-href='' class='btn btn-danger btn-sm delete'  data-toggle='tooltip' title='Delete' href=".site_url('appweb/category-product/hapus/'.$cat['kode_kategori'])." ><span class='fa fa-times' title='delete'></span></a>	 
						 "
					);
			$no++;
		}
		
		$output['draw']=$draw;
		$output['recordsTotal']=$total;
		$output['recordsFiltered']=$total;
		
		echo json_encode($output);

	}

	public function get_menu()
	{
		$total=$this->db->count_all_results("menu_parent");
		$length=intval($_REQUEST['length']);
		$length = $length < 0 ? $total: $length; 
		$start=intval($_REQUEST['start']);
		$draw=intval($_REQUEST['draw']);
		
		$search=$_REQUEST['search']["value"];
		
		$output=array();
		$output['data']=array();
		
		$end = $start + $length;
		$end = $end > $total ? $total : $end;

		if($search!=""){
		$this->db->like("nama",$search);
		}
		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length,$start);

		$this->db->order_by('id','ASC');
		$query=$this->Menu_model->get_all_menu_parent();

		if($search!=""){
		$this->db->like("nama",$search);
		$jum=$this->db->get('menu_parent');
		$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$no=$start+1;
		foreach ($query as $menu) {
			date_default_timezone_set('Asia/Jakarta');
			$date=date('d-m-Y',strtotime($menu['tanggal']));
			
			$id=$menu['id'];
			if($id=='1'){
				$type=$menu['kode'];
			}else 
			if ($id=='2'){
				$type=$menu['kode'];
			}else 
			if ($id=='3'){
				$type=$menu['kode'];
			}else 
			if ($id=='4'){
				$type=$menu['kode'];
			}else 
			if ($id=='5'){
				$type=$menu['kode'];
			}else 
			if ($id=='6'){
				$type=$menu['kode'];
			}else {
				$type='';
			}
			$output['data'][]=
					array(
						$no,
						$menu['kode'],
						$menu['nama'],
						$date,
						"<a href=".site_url('appweb/menu/'.$type)." class='btn btn-sm btn-primary btn-editable' title='Buat Menu'><i class='fa fa-pencil'></i> </a>",
			
					);
		$no++;
		}
		if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
			$records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
			$records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
		}
		
		$output['draw']=$draw;
		$output['recordsTotal']=$total;
		$output['recordsFiltered']=$total;
		
		echo json_encode($output);

	}
	
	public function get_iklan()
	{
		$total=$this->db->count_all_results("iklan");
		$length=intval($_REQUEST['length']);
		$length = $length < 0 ? $total: $length; 
		$start=intval($_REQUEST['start']);
		$draw=intval($_REQUEST['draw']);
		
		$search=$_REQUEST['search']["value"];
		
		$output=array();
		$output['data']=array();
		
		$end = $start + $length;
		$end = $end > $total ? $total : $end;

		if($search!=""){
		$this->db->like("nama",$search);
		}
		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length,$start);

		$this->db->order_by('id','ASC');
		$query=$this->Ads_model->get_all_ads_parent();

		if($search!=""){
		$this->db->like("nama",$search);
		$jum=$this->db->get('iklan');
		$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$no=$start+1;
		foreach ($query as $ads) {
			date_default_timezone_set('Asia/Jakarta');
			$date=date('d-m-Y',strtotime($ads['date']));
			
			$id=$ads['id'];
			if($id=='1'){
				$type=$ads['code'];
			}else 
			if ($id=='2'){
				$type=$ads['code'];
			}else {
				$type='';
			}
			$output['data'][]=
					array(
						$no,
						$ads['code'],
						$ads['nama'],
						$date,
						"<a href=".site_url('appweb/ads/'.$type.'')." class='btn btn-sm btn-primary btn-editable' title='Buat Menu'><i class='fa fa-pencil'></i> </a>
						 <a href=".site_url('appweb/ads/hapus/'.$ads['id'].'')." class='btn btn-sm btn-danger btn-editable' title='Hapus Menu'><i class='fa fa-trash'></i> </a>",
			
					);
		$no++;
		}
		if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
			$records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
			$records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
		}
		
		$output['draw']=$draw;
		$output['recordsTotal']=$total;
		$output['recordsFiltered']=$total;
		
		echo json_encode($output);

	}

	public function get_pages()
	{
		$total=$this->db->count_all_results("laman");
		$length=intval($_REQUEST['length']);
		$length = $length < 0 ? $total: $length; 
		$start=intval($_REQUEST['start']);
		$draw=intval($_REQUEST['draw']);
		
		$search=$_REQUEST['search']["value"];
		
		$output=array();
		$output['data']=array();
		
		$end = $start + $length;
		$end = $end > $total ? $total : $end;

		if($search!=""){
		$this->db->like("nama_laman",$search);
		}
		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length,$start);

		$this->db->order_by('id','DESC');
		$query=$this->Pages_model->get_all_pages();

		if($search!=""){
		$this->db->like("nama_laman",$search);
		$jum=$this->db->get('laman');
		$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$no=$start+1;
		foreach ($query as $pages) {
			$output['data'][]=
					array(
						$no,
						$pages['nama_laman'],
						$pages['laman_seo'],
						$pages['status']=='0'?'<span class="label label-danger">Tidak Aktif</span>':'<span class="label label-success">Aktif</span>',
						$pages['posisi'],
						$pages['layout'],
						"<a href=".site_url('appweb/pages/edit/'.$pages['id'])." class='btn btn-sm btn-primary btn-editable'><i class='fa fa-pencil'></i> </a>
						 <a href=".site_url('appweb/pages/hapus/'.$pages['id'])." class='btn btn-sm btn-danger btn-editable'><i class='fa fa-trash'></i> </a>",
			
					);
		$no++;
		}
		if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
			$records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
			$records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
		}
		
		$output['draw']=$draw;
		$output['recordsTotal']=$total;
		$output['recordsFiltered']=$total;
		
		echo json_encode($output);

	}
	
	public function get_payment()
	{
		$total=$this->db->count_all_results("metode_pembayaran");
		$length=intval($_REQUEST['length']);
		$length = $length < 0 ? $total: $length; 
		$start=intval($_REQUEST['start']);
		$draw=intval($_REQUEST['draw']);
		
		$search=$_REQUEST['search']["value"];
		
		$output=array();
		$output['data']=array();
		
		$end = $start + $length;
		$end = $end > $total ? $total : $end;

		if($search!=""){
		$this->db->like("judul",$search);
		}
		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length,$start);

		$this->db->order_by('id','ASC');
		$query=$this->Payment_model->get_all_payment();

		if($search!=""){
		$this->db->like("judul",$search);
		$jum=$this->db->get('metode_pembayaran');
		
		$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$no=$start+1;
		foreach ($query as $payment) {
			if(!empty($payment['gambar'])){
				$gambar = "<a href=".base_url('files/media/'.$payment['gambar'].'')." class='fancy-view'>
						   <img src=".base_url('files/media/'.$payment['gambar'].'')." alt='' border='0' class='img-responsive'>";
			}else{
				$gambar = "<a href=".base_url('assets/admin/layout/img/no-image.jpg')." class='fancy-view'>
						  <img src=".base_url('assets/admin/layout/img/no-image.jpg')." class='img-responsive' alt='' border='0'>";
			}
			$date=date('d F Y, H:i:s',strtotime($payment['tgl_dibuat']));
			$modifdate=date('d F Y, H:i:s',strtotime($payment['tgl_modif']));
			$output['data'][]=
					array(
						$no,
						$payment['judul'],
						$payment['caption'],
						$payment['status']=='0'?'<span class="label label-danger">Tidak Aktif</span>':'<span class="label label-info">Aktif</span>',
						$payment['posisi'],
						$gambar,
						$payment['status'] == '0'?'<a class="btn btn-danger btn-sm changestatus" data-toggle="tooltip" title="Tidak Aktif" href="'.site_url().'appweb/payments/status/'.$payment['id'].'/1"><span  class="fa fa-ban" title="Tidak Aktif"></span></a>':'<a class="btn btn-primary btn-sm changestatus"  data-toggle="tooltip" title="Aktif" href="'.site_url().'appweb/payments/status/'.$payment['id'].'/0"><span  class="fa fa-check-circle-o" title="Aktif"></span></a>'.
						 "<a class='btn btn-warning  btn-sm' type='button' data-toggle='tooltip'  title='Edit'  href=".site_url('appweb/payments/edit/'.$payment['id'])."><i class='fa fa-pencil'></i></a>
						  <a data-href='' class='btn btn-danger btn-sm delete'  data-toggle='tooltip' title='Delete' href=".site_url('appweb/payments/hapus/'.$payment['id'])." ><span class='fa fa-times' title='delete'></span></a>	 
						 "
					);
			$no++;
		}
		
		$output['draw']=$draw;
		$output['recordsTotal']=$total;
		$output['recordsFiltered']=$total;
		
		echo json_encode($output);

	}
	
	public function get_shipping()
	{
		$total=$this->db->count_all_results("ekspedisi");
		$length=intval($_REQUEST['length']);
		$length = $length < 0 ? $total: $length; 
		$start=intval($_REQUEST['start']);
		$draw=intval($_REQUEST['draw']);
		
		$search=$_REQUEST['search']["value"];
		
		$output=array();
		$output['data']=array();
		
		$end = $start + $length;
		$end = $end > $total ? $total : $end;

		if($search!=""){
		$this->db->like("nama",$search);
		}
		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length,$start);

		$this->db->order_by('id','ASC');
		$query=$this->Shipping_model->get_all_shipping();

		if($search!=""){
		$this->db->like("nama",$search);
		$jum=$this->db->get('ekspedisi');
		
		$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$no=$start+1;
		foreach ($query as $shipping) {
			if(!empty($shipping['gambar'])){
				$gambar = "<a href=".base_url('files/media/'.$shipping['gambar'].'')." class='fancy-view'>
						   <img src=".base_url('files/media/'.$shipping['gambar'].'')." alt='' border='0' class='img-responsive'>";
			}else{
				$gambar = "<a href=".base_url('assets/admin/layout/img/no-image.jpg')." class='fancy-view'>
						  <img src=".base_url('assets/admin/layout/img/no-image.jpg')." class='img-responsive' alt='' border='0'>";
			}
			$output['data'][]=
					array(
						$no,
						$shipping['nama'],
						$shipping['status']=='0'?'<span class="label label-danger">Tidak Aktif</span>':'<span class="label label-info">Aktif</span>',
						$shipping['posisi'],
						$gambar,
						$shipping['status'] == '0'?'<a class="btn btn-danger btn-sm changestatus" data-toggle="tooltip" title="Tidak Aktif" href='.site_url().'appweb/shippings/status/'.$shipping['id'].'/1><span  class="fa fa-ban" title="Tidak Aktif"></span></a>':'<a class="btn btn-primary btn-sm changestatus"  data-toggle="tooltip" title="Aktif" href='.site_url().'appweb/shippings/status/'.$shipping['id'].'/0><span  class="fa fa-check-circle-o" title="Aktif"></span></a>'.
						 "<a class='btn btn-warning  btn-sm' type='button' data-toggle='tooltip'  title='Edit'  href=".site_url('appweb/shippings/edit/'.$shipping['id'])."><i class='fa fa-pencil'></i></a>
						  <a data-href='' class='btn btn-danger btn-sm delete'  data-toggle='tooltip' title='Delete' href=".site_url('appweb/shippings/hapus/'.$shipping['id'])." ><span class='fa fa-times' title='delete'></span></a>	 
						 "
					);
			$no++;
		}
		
		$output['draw']=$draw;
		$output['recordsTotal']=$total;
		$output['recordsFiltered']=$total;
		
		echo json_encode($output);

	}
	
	public function get_produk()
	{
		$total=$this->db->count_all_results("produk");
		$length=intval($_REQUEST['length']);
		$length = $length < 0 ? $total: $length; 
		$start=intval($_REQUEST['start']);
		$draw=intval($_REQUEST['draw']);
		
		$search=$_REQUEST['search']["value"];
		
		$output=array();
		$output['data']=array();
		
		$end = $start + $length;
		$end = $end > $total ? $total : $end;

		if($search!=""){
		$this->db->like("produk",$search);
		}
		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length,$start);

		$this->db->order_by('id','DESC');
		$query=$this->Product_model->get_all_produk();

		if($search!=""){
		$this->db->like("produk",$search);
		$jum=$this->db->get('produk');
		
		$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$no=$start+1;
		foreach ($query as $barang) {
			if(!empty($barang['gambar'])){
				$gambar = "<a href=".base_url('files/media/'.$barang['gambar'].'')." class='fancy-view'>
						   <img src=".base_url('files/media/'.$barang['gambar'].'')." alt='' border='0' class='img-responsive'>";
			}else{
				$gambar = "<a href=".base_url('assets/admin/layout/img/no-image.jpg')." class='fancy-view'>
						  <img src=".base_url('assets/admin/layout/img/no-image.jpg')." class='img-responsive' alt='' border='0'>";
			}
			if($barang['label']== 1){
				$label = "<span class='label label-primary'>New</span>";
			}else if($barang['label']== 2){
				$label = "<span class='label label-success'>Sale</span>";
			}else if($barang['label']== 3){
				$label = "<span class='label label-info'>Best Seller</span>";
			}else{
				$label = "<span class='label label-warning'>None</span>";
			}
			date_default_timezone_set('Asia/Jakarta');
			$date=date('d-m-Y',strtotime($barang['tgl_dibuat']));
			$output['data'][]=
					array(
						$no,
						$barang['kode_barang'],
						$barang['produk'],
						$barang['kategori'],
						"Rp.".$barang['harga'],
						$barang['qty'],
						$label,
						$barang['status_barang']=='0'?'<span class="label label-danger">Not Published</span>':'<span class="label label-success">Published</span>',
						$gambar,
						"<a href=".site_url('appweb/products/edit/'.$barang['id'])." class='btn btn-sm btn-primary' title='Edit'><i class='fa fa-pencil'></i> </a>
						<a href=".site_url('appweb/products/stok/'.$barang['id'])." class='btn btn-sm btn-primary' title='Tambah Stok'><i class='fa fa-plus'></i> </a>
						<a href=".site_url('appweb/products/hapus/'.$barang['id'])." class='btn btn-sm btn-danger' title='Hapus'><i class='fa fa-trash'></i> </a>",
					);
		$no++;
		}
		if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
			$records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
			$records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
		}
		
		$output['draw']=$draw;
		$output['recordsTotal']=$total;
		$output['recordsFiltered']=$total;
		
		echo json_encode($output);

	}
	public function get_orders()
	{
		$total=$this->db->count_all_results("pesanan");
		$length=intval($_REQUEST['length']);
		$length = $length < 0 ? $total: $length; 
		$start=intval($_REQUEST['start']);
		$draw=intval($_REQUEST['draw']);
		
		$search=$_REQUEST['search']["value"];
		
		$output=array();
		$output['data']=array();
		
		$end = $start + $length;
		$end = $end > $total ? $total : $end;

		if($search!=""){
		$this->db->like("nama_lengkap",$search);
		}
		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length,$start);

		$this->db->order_by('id','DESC');
		$query=$this->Order_model->get_all_orders();

		if($search!=""){
		$this->db->like("nama_lengkap",$search);
		$jum=$this->db->get('shop_order');
		
		$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$no=$start+1;
		foreach ($query as $order) {
			if($order['status_pembayaran']== 1){
				$label = "<span class='label label-warning'>belum Bayar</span>";
			}else if($order['status_pembayaran']== 2){
				$label = "<span class='label label-success'>Sudah Bayar</span>";
			}else{
				$label = "<span class='label label-danger'>Dibatalkan</span>";
			}
			date_default_timezone_set('Asia/Jakarta');
			$date=date('d-m-Y',strtotime($order['tgl_pesan']));
			$output['data'][]=
					array(
						$no,
						$order['invoice'],
						$date,
						$order['nama_lengkap'],
						convertrp($order['total_harga']),
						$label,
						"<a href=".site_url('appweb/orders/edit/'.$order['id'])." class='btn btn-sm btn-primary'><i class='fa fa-pencil'></i> </a>
						<a href=".site_url('appweb/orders/hapus/'.$order['id'])." class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> </a>",
					);
		$no++;
		}
		if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
			$records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
			$records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
		}
		
		$output['draw']=$draw;
		$output['recordsTotal']=$total;
		$output['recordsFiltered']=$total;
		
		echo json_encode($output);

	}
	
	public function get_blog()
	{
		$total=$this->db->count_all_results("blog");
		$length=intval($_REQUEST['length']);
		$length = $length < 0 ? $total: $length; 
		$start=intval($_REQUEST['start']);
		$draw=intval($_REQUEST['draw']);
		
		$search=$_REQUEST['search']["value"];
		
		$output=array();
		$output['data']=array();
		
		$end = $start + $length;
		$end = $end > $total ? $total : $end;

		if($search!=""){
		$this->db->like("judul_blog",$search);
		}
		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length,$start);

		$this->db->order_by('id','DESC');
		$query=$this->Blog_model->get_all_blog();

		if($search!=""){
		$this->db->like("judul_blog",$search);
		$jum=$this->db->get('blog');
		
		$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$no=$start+1;
		foreach ($query as $blog) {
			if(!empty($blog['gambar'])){
				$gambar = "<a href=".base_url('files/media/'.$blog['gambar'].'')." class='fancy-view'>
						   <img src=".base_url('files/thumbnail/'.$blog['gambar'].'')." alt='' border='0' class='img-responsive'>";
			}else{
				$gambar = "<a href=".base_url('assets/admin/layout/img/no-image.jpg')." class='fancy-view'>
						  <img src=".base_url('assets/admin/layout/img/no-image.jpg')." class='img-responsive' alt='' border='0'>";
			}
			if($blog['status']== 1){
				$status = "<span class='label label-primary'>Aktif</span>";
			}else{
				$status = "<span class='label label-warning'>Tidak&nbsp;Aktif</span>";
			}
			date_default_timezone_set('Asia/Jakarta');
			$date=date('d-m-Y',strtotime($blog['tgl_posting']));
			
			$output['data'][]=
					array(
						$no,
						$blog['judul_blog'],
						$blog['kategori'],
						$blog['posting'],
						$status,
						$date,
						$blog['hits'],
						$gambar,
						"<a href=".site_url('appweb/articles/edit/'.$blog['id'])." class='btn btn-sm btn-primary'><i class='fa fa-pencil'></i> </a>
						<a href=".site_url('appweb/articles/hapus/'.$blog['id'])." class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> </a>",
					);
		$no++;
		}
		if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
			$records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
			$records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
		}
		
		$output['draw']=$draw;
		$output['recordsTotal']=$total;
		$output['recordsFiltered']=$total;
		
		echo json_encode($output);

	}
	
	public function get_faq()
	{
		$total=$this->db->count_all_results("faq");
		$length=intval($_REQUEST['length']);
		$length = $length < 0 ? $total: $length; 
		$start=intval($_REQUEST['start']);
		$draw=intval($_REQUEST['draw']);
		
		$search=$_REQUEST['search']["value"];
		
		$output=array();
		$output['data']=array();
		
		$end = $start + $length;
		$end = $end > $total ? $total : $end;

		if($search!=""){
		$this->db->like("pertanyaan",$search);
		}
		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length,$start);

		$this->db->order_by('id','ASC');
		$query=$this->Faq_model->get_all_faq();

		if($search!=""){
		$this->db->like("pertanyaan",$search);
		$jum=$this->db->get('faq');
		
		$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$no=$start+1;
		foreach ($query as $faqs) {
			$output['data'][]=
					array(
						$no,
						$faqs['pertanyaan'],
						$faqs['jawaban'],
						$faqs['collapse'],
						"<a href=".site_url('appweb/faqs/edit/'.$faqs['id'])." class='btn btn-sm btn-primary'><i class='fa fa-pencil'></i> </a>
						<a href=".site_url('appweb/faqs/hapus/'.$faqs['id'])." class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> </a>",
					);
		$no++;
		}
		if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
			$records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
			$records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
		}
		
		$output['draw']=$draw;
		$output['recordsTotal']=$total;
		$output['recordsFiltered']=$total;
		
		echo json_encode($output);

	}
	
	public function get_slider()
	{
		$total=$this->db->count_all_results("slider");
		$length=intval($_REQUEST['length']);
		$length = $length < 0 ? $total: $length; 
		$start=intval($_REQUEST['start']);
		$draw=intval($_REQUEST['draw']);
		
		$search=$_REQUEST['search']["value"];
		
		$output=array();
		$output['data']=array();
		
		$end = $start + $length;
		$end = $end > $total ? $total : $end;

		if($search!=""){
		$this->db->like("judul",$search);
		}
		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length,$start);

		$this->db->order_by('id','ASC');
		$query=$this->Slider_model->get_all_slider();

		if($search!=""){
		$this->db->like("judul",$search);
		$jum=$this->db->get('slider');
		
		$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$no=$start+1;
		foreach ($query as $slide) {
			if(!empty($slide['gambar'])){
				$gambar = "<a href=".base_url('files/media/'.$slide['gambar'].'')." class='fancy-view'>
						   <img src=".base_url('files/media/'.$slide['gambar'].'')." alt='' border='0' class='img-responsive'>";
			}else{
				$gambar = "<a href=".base_url('assets/admin/layout/img/no-image.jpg')." class='fancy-view'>
						  <img src=".base_url('assets/admin/layout/img/no-image.jpg')." class='img-responsive' alt='' border='0'>";
			}
			$date=date('d F Y, H:i:s',strtotime($slide['tgl_dibuat']));
			$modifdate=date('d F Y, H:i:s',strtotime($slide['tgl_modif']));
			$output['data'][]=
					array(
						$no,
						$slide['judul'],
						$slide['deskripsi'],
						$slide['tipe']=='0'?'<span class="label label-success">Bottom</span>':'<span class="label label-info">Top</span>',
						$slide['status']=='0'?'<span class="label label-danger">Tidak Aktif</span>':'<span class="label label-info">Aktif</span>',
						$gambar,
						$slide['status'] == '0'?'<a class="btn btn-danger btn-sm changestatus" data-toggle="tooltip" title="Tidak Aktif" href='.site_url().'appweb/sliders/status/'.$slide['id'].'/1><span  class="fa fa-ban" title="Tidak Aktif"></span></a>':'<a class="btn btn-primary btn-sm changestatus" data-toggle="tooltip" title="Aktif" href='.site_url().'appweb/sliders/status/'.$slide['id'].'/0><span  class="fa fa-check-circle-o" title="Aktif"></span></a>'.
						 "<a class='btn btn-warning btn-sm' type='button' data-toggle='tooltip'  title='Edit'  href=".site_url('appweb/sliders/edit/'.$slide['id'])."><i class='fa fa-pencil'></i></a>
						  <a data-href='' class='btn btn-danger btn-rounded btn-condensed btn-sm delete'  data-toggle='tooltip' title='Delete' href=".site_url('appweb/sliders/hapus/'.$slide['id'])." ><span class='fa fa-times' title='delete'></span></a>	 
						 "
					);
			$no++;
		}
		
		$output['draw']=$draw;
		$output['recordsTotal']=$total;
		$output['recordsFiltered']=$total;
		
		echo json_encode($output);

	}
	
	public function get_produsen()
	{
		$total=$this->db->count_all_results("supplier");
		$length=intval($_REQUEST['length']);
		$length = $length < 0 ? $total: $length; 
		$start=intval($_REQUEST['start']);
		$draw=intval($_REQUEST['draw']);
		
		$search=$_REQUEST['search']["value"];
		
		$output=array();
		$output['data']=array();
		
		$end = $start + $length;
		$end = $end > $total ? $total : $end;

		if($search!=""){
		$this->db->like("nama",$search);
		}
		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length,$start);

		$this->db->order_by('posisi','ASC');
		$query=$this->Supplier_model->get_all_produsen();

		if($search!=""){
		$this->db->like("nama",$search);
		$jum=$this->db->get('supplier');
		
		$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$no=$start+1;
		foreach ($query as $brand) {
			if(!empty($brand['gambar'])){
				$gambar = "<a href=".base_url('files/media/'.$brand['gambar'].'')." class='fancy-view'>
						   <img src=".base_url('files/media/'.$brand['gambar'].'')." alt='' border='0' class='img-responsive'>";
			}else{
				$gambar = "<a href=".base_url('assets/admin/layout/img/no-image.jpg')." class='fancy-view'>
						  <img src=".base_url('assets/admin/layout/img/no-image.jpg')." class='img-responsive' alt='' border='0'>";
			}
			date_default_timezone_set('Asia/Jakarta');
			$date=date('d-m-Y',strtotime($brand['tgl_dibuat']));
			
			$output['data'][]=
					array(
						$no,
						$brand['nama'],
						$brand['alamat'],
						$brand['telepon'],
						$date,
						$brand['posisi'],
						$brand['status']=='1'?'<span class="label label-info">Aktif</span>':'<span class="label label-warning">Tidak Aktif</span>',
						$gambar,
						"<a href=".site_url('appweb/supplier/edit/'.$brand['id'])." class='btn btn-sm btn-primary btn-editable'><i class='fa fa-pencil'></i> </a>
						<a href=".site_url('appweb/supplier/hapus/'.$brand['id'])." class='btn btn-sm btn-danger btn-editable'><i class='fa fa-trash'></i> </a>",
					);
		$no++;
		}
		if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
			$output["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
			$output["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
		}
		
		$output['draw']=$draw;
		$output['recordsTotal']=$total;
		$output['recordsFiltered']=$total;
		
		echo json_encode($output);

	}
	
	public function get_tag()
	{
		$total=$this->db->count_all_results("tags");
		$length=intval($_REQUEST['length']);
		$length = $length < 0 ? $total: $length; 
		$start=intval($_REQUEST['start']);
		$draw=intval($_REQUEST['draw']);
		
		$search=$_REQUEST['search']["value"];
		
		$output=array();
		$output['data']=array();
		
		$end = $start + $length;
		$end = $end > $total ? $total : $end;

		if($search!=""){
		$this->db->like("tag",$search);
		}
		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length,$start);

		$this->db->order_by('id','DESC');
		$query=$this->Tag_model->get_all_tag();

		if($search!=""){
		$this->db->like("tag",$search);
		$jum=$this->db->get('tags');
		
		$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$no=$start+1;
		foreach ($query as $tag) {
			date_default_timezone_set('Asia/Jakarta');
			$date=date('d-m-Y',strtotime($tag['tgl_dibuat']));
			$output['data'][]=
					array(
						$no,
						$tag['tag'],
						$tag['tag_seo'],
						$date,
						"<a class='btn btn-primary btn-rounded btn-condensed btn-sm' type='button' data-toggle='tooltip'  title='Edit'  href=".site_url('appweb/tags/edit/'.$tag['id'])."><i class='fa fa-pencil'></i></a>
						 <a data-href='' class='btn btn-danger btn-rounded btn-condensed btn-sm delete'  data-toggle='tooltip' title='Delete' href=".site_url('appweb/tags/hapus/'.$tag['id'])." ><span class='fa fa-times' title='delete'></span></a>	 
						 "
					);
			$no++;
		}
		
		$output['draw']=$draw;
		$output['recordsTotal']=$total;
		$output['recordsFiltered']=$total;
		
		echo json_encode($output);

	}
	
	public function get_inboxall()
	{
		$total=$this->db->count_all_results("kontak");
		$length=intval($_REQUEST['length']);
		$length = $length < 0 ? $total: $length; 
		$start=intval($_REQUEST['start']);
		$draw=intval($_REQUEST['draw']);
		
		$search=$_REQUEST['search']["value"];
		
		$output=array();
		$output['data']=array();
		
		$end = $start + $length;
		$end = $end > $total ? $total : $end;

		if($search!=""){
		$this->db->like("nama",$search);
		}
		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length,$start);

		$this->db->order_by('id','DESC');
		$query=$this->db->query("SELECT * FROM kontak")->result_array();

		if($search!=""){
		$this->db->like("nama",$search);
		$jum=$this->db->get('kontak');
		
		$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$no=$start+1;
		foreach ($query as $inbox) {
			//$date=date('d, H:i:s',strtotime($inbox['date']));
			if($inbox['dibaca']=='0'){
				$dibaca="unread";
			}else{
				$dibaca="read";
			}
			if($inbox['favorit']=='1'){
				$favorit="<i class='fa fa-star inbox-started'></i>";
			}else{
				$favorit="<i class='fa fa-star'></i>";
			}
			
			$output['data'][]=
					array(
						"<tr class='".$dibaca."' data-messageid='".$no."'>
							<td class='inbox-small-cells'>
								<input type='checkbox' class='mail-checkbox'>
						</td>
						<td class='inbox-small-cells'>
								".$favorit."
							</td>
					 	<td class='view-message'>
								".$inbox['nama']."
							</td>
					 	<td class='view-message'>
								 ".$inbox['pesan']."
							</td>
						<td class='view-message inbox-small-cells'>
								<i class='fa fa-paperclip'></i>
							</td>
					 	<td class='view-message text-right'>
								".$inbox['tanggal']."
						</td>"
						
					);
			$no++;
		}
		
		$output['draw']=$draw;
		$output['recordsTotal']=$total;
		$output['recordsFiltered']=$total;
		
		echo json_encode($output);

	}
	
	public function get_gallery()
	{
		$total=$this->db->count_all_results("gallery");
		$length=intval($_REQUEST['length']);
		$length = $length < 0 ? $total: $length; 
		$start=intval($_REQUEST['start']);
		$draw=intval($_REQUEST['draw']);
		
		$search=$_REQUEST['search']["value"];
		
		$output=array();
		$output['data']=array();
		
		$end = $start + $length;
		$end = $end > $total ? $total : $end;

		if($search!=""){
		$this->db->like("judul",$search);
		}
		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length,$start);

		$this->db->order_by('id','DESC');
		$query=$this->Landingpage_model->get_all_gallery();

		if($search!=""){
		$this->db->like("judul",$search);
		$jum=$this->db->get('gallery');
		
		$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$no=$start+1;
		foreach ($query as $gal) {
			if(!empty($gal['gambar'])){
				$gambar = "<a href=".base_url('files/media/'.$gal['gambar'].'')." class='fancy-view'>
						   <img src=".base_url('files/thumbnail/'.$gal['gambar'].'')." alt='' border='0' class='img-responsive' style='width:150px;height:150px;'>";
			}else{
				$gambar = "<a href=".base_url('assets/admin/layout/img/no-image.jpg')." class='fancy-view'>
						  <img src=".base_url('assets/admin/layout/img/no-image.jpg')." class='img-responsive' alt='' border='0' style='width:150px;height:150px;'>";
			}
			
			$output['data'][]=
					array(
						$no,
						$gal['judul'],
						$gambar,
						"<a href=".site_url('appweb/gallery/edit/'.$gal['id'])." class='btn btn-sm btn-primary'><i class='fa fa-pencil'></i> </a>
						<a href=".site_url('appweb/gallery/hapus/'.$gal['id'])." class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> </a>",
					);
		$no++;
		}
		if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
			$records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
			$records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
		}
		
		$output['draw']=$draw;
		$output['recordsTotal']=$total;
		$output['recordsFiltered']=$total;
		
		echo json_encode($output);

	}
	
	public function get_testimoni()
	{
		$total=$this->db->count_all_results("testimoni");
		$length=intval($_REQUEST['length']);
		$length = $length < 0 ? $total: $length; 
		$start=intval($_REQUEST['start']);
		$draw=intval($_REQUEST['draw']);
		
		$search=$_REQUEST['search']["value"];
		
		$output=array();
		$output['data']=array();
		
		$end = $start + $length;
		$end = $end > $total ? $total : $end;

		if($search!=""){
		$this->db->like("namaclient",$search);
		}
		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length,$start);

		$this->db->order_by('id','DESC');
		$query=$this->Landingpage_model->get_all_testimoni();

		if($search!=""){
		$this->db->like("judul",$search);
		$jum=$this->db->get('testimoni');
		
		$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$no=$start+1;
		foreach ($query as $test) {
			if(!empty($test['gambar'])){
				$gambar = "<a href=".base_url('files/media/'.$test['gambar'].'')." class='fancy-view'>
						   <img src=".base_url('files/thumbnail/'.$test['gambar'].'')." alt='' border='0' class='img-responsive' style='width:150px;height:150px;'>";
			}else{
				$gambar = "<a href=".base_url('assets/admin/layout/img/no-image.jpg')." class='fancy-view'>
						  <img src=".base_url('assets/admin/layout/img/no-image.jpg')." class='img-responsive' alt='' border='0' style='width:150px;height:150px;'>";
			}
			$output['data'][]=
					array(
						$no,
						$test['namaclient'],
						$test['emailclient'],
						$test['perusahaan'],	
						$test['testimoni'],	
						$gambar,	
						"<a href=".site_url('appweb/testimoni/edit/'.$test['id'])." class='btn btn-sm btn-primary'><i class='fa fa-pencil'></i> </a>
						<a href=".site_url('appweb/testimoni/hapus/'.$test['id'])." class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> </a>",
					);
		$no++;
		}
		if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
			$records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
			$records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
		}
		
		$output['draw']=$draw;
		$output['recordsTotal']=$total;
		$output['recordsFiltered']=$total;
		
		echo json_encode($output);

	}

	
}