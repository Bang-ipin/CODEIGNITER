<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Server_side extends CI_Controller {
	
	Public function __construct(){
		parent::__construct();
		
		if (!$this->session->userdata('level')==01) {
			$this->session->set_flashdata('pesan','Maaf Anda Bukan Administrator');
			redirect(site_url('appweb'));
			
		}
	}
	public function get_jobs_category()
	{
		$total=$this->db->count_all_results("kategori_pekerjaan");
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
		$this->db->limit($length,$start);

		$this->db->order_by('kode_kategori','ASC');
		$query=$this->Categoryjobs_model->get_all_kategori();

		if($search!=""){
		$this->db->like("kategori",$search);
		$jum=$this->db->get('kategori_pekerjaan');
		
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
						$cat['status'] == '0'?'<a class="btn btn-danger btn-sm changestatus" data-toggle="tooltip" title="Tidak Aktif" href="'.site_url().'appweb/category-jobs/status/'.$cat['kode_kategori'].'/1"><span  class="fa fa-ban" title="Tidak Aktif"></span></a>':'<a class="btn btn-sm btn-primary changestatus" data-toggle="tooltip" title="Aktif" href="'.site_url().'appweb/category-jobs/status/'.$cat['kode_kategori'].'/0"><span  class="fa fa-check-circle-o" title="Aktif"></span></a>'.
						 "<a class='btn btn-primary btn-sm' type='button' data-toggle='tooltip'  title='Edit'  href=".site_url('appweb/category-jobs/edit/'.$cat['kode_kategori'])."><i class='fa fa-pencil'></i></a>
						 <a href='javascript:void(0);' onclick='hapusid($cat[kode_kategori])' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> </a>" 
					);
			$no++;
		}
		
		$output['draw']=$draw;
		$output['recordsTotal']=$total;
		$output['recordsFiltered']=$total;
		
		echo json_encode($output);

	}
	public function get_pekerjaan()
	{
		$total=$this->db->count_all_results("pekerjaan");
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
		$this->db->like("pekerjaan",$search);
		}
		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length,$start);

		$this->db->order_by('id','DESC');
		$query=$this->Jobs_model->get_all_pekerjaan();

		if($search!=""){
		$this->db->like("pekerjaan",$search);
		$jum=$this->db->get('pekerjaan');
		
		$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$no=$start+1;
		foreach ($query as $pekerjaan) {
			if(!empty($pekerjaan['gambar'])){
				$gambar = "<a href=".base_url('files/media/'.$pekerjaan['gambar'].'')." class='fancy-view'>
						   <img src=".base_url('files/media/'.$pekerjaan['gambar'].'')." alt='' border='0' style='width:100px;height:100px;'>";
			}else{
				$gambar = "<a href=".base_url('assets/admin/img/no-image.jpg')." class='fancy-view'>
						  <img src=".base_url('assets/admin/img/no-image.jpg')." class='img-responsive' alt='' border='0'>";
			}
			if($pekerjaan['label']== 0){
				$label = "<span class='label label-primary'>Freelance</span>";
			}else if($pekerjaan['label']== 1){
				$label = "<span class='label label-success'>Full Time</span>";
			}else if($pekerjaan['label']== 2){
				$label = "<span class='label label-info'>Part Time</span>";
			}
			date_default_timezone_set('Asia/Jakarta');
			$date=date('d-m-Y',strtotime($pekerjaan['tgl_dibuat']));
			$output['data'][]=
					array(
						$no,
						$pekerjaan['pekerjaan'],
						$pekerjaan['kategori'],
						convertrp($pekerjaan['gaji']),
						$label,
						$pekerjaan['status_pekerjaan']=='0'?'<span class="label label-danger">Tidak Dipublikasi</span>':'<span class="label label-success">Dipublikasi</span>',
						$gambar,
						"<a href=".site_url('appweb/jobs/edit/'.$pekerjaan['id'])." class='btn btn-sm btn-primary' title='Edit'><i class='fa fa-pencil'></i> </a>
						<a href='javascript:void(0);' onclick='hapusid($pekerjaan[id])' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> </a>",
					);
		$no++;
		}
		
		$output['draw']=$draw;
		$output['recordsTotal']=$total;
		$output['recordsFiltered']=$total;
		
		echo json_encode($output);

	}
	public function get_pendidikan()
	{
		$total=$this->db->count_all_results("pendidikan");
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
		$this->db->like("pendidikan",$search);
		}
		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length,$start);

		$this->db->order_by('id','DESC');
		$query=$this->Jobslevel_model->get_all_pendidikan();

		if($search!=""){
		$this->db->like("pendidikan",$search);
		$jum=$this->db->get('pendidikan');
		
		$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$no=$start+1;
		foreach ($query as $pend) {
			date_default_timezone_set('Asia/Jakarta');
			$date=date('d-m-Y',strtotime($pend['tgl_dibuat']));
			$output['data'][]=
					array(
						$no,
						strtoupper($pend['pendidikan']),
						"<a class='btn btn-primary btn-rounded btn-condensed btn-sm' type='button' data-toggle='tooltip'  title='Edit'  href=".site_url('appweb/jobs-level/edit/'.$pend['id'])."><i class='fa fa-pencil'></i></a>
						 <a href='javascript:void(0);' onclick='hapusid($pend[id])' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> </a>"
					);
			$no++;
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
		$output['draw']=$draw;
		$output['recordsTotal']=$total;
		$output['recordsFiltered']=$total;
		
		echo json_encode($output);

	}
	public function get_agents()
	{
		$total=$this->db->count_all_results("statistik");
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
		$this->db->like("ip",$search);
		}
		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length,$start);

		$this->db->order_by('tanggal','DESC');
		$query=$this->Agents_model->get_all_agents();

		if($search!=""){
		$this->db->like("ip",$search);
		$jum=$this->db->get('statistik');
		$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$no=$start+1;
		foreach ($query as $stsk) {
		    $output['data'][]=
					array(
						$no,
						$stsk['ip'],
						$stsk['tanggal'],
						$stsk['user_agent'],
						$stsk['hits']
					);
		$no++;
		}
		
		$output['draw']=$draw;
		$output['recordsTotal']=$total;
		$output['recordsFiltered']=$total;
		
		echo json_encode($output);

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
				$gambar = "<a href=".base_url('assets/public/img/avatar.jpg')." class='fancy-view'>
						  <img src=".base_url('assets/public/img/avatar.jpg')." class='img-responsive' alt='' border='0'>";
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
						<a href='javascript:void(0);' onclick='hapusid($user[username])' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> </a>",
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
						 <a href='javascript:void(0);' onclick='hapusid($level[id_level])' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> </a>";
			
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
				$gambar = "<a href=".base_url('assets/admin/img/'.$tema['image'].'')." class='fancy-view'>
						   <img src=".base_url('assets/admin/img/'.$tema['image'].'')." alt='' border='0' class='img-responsive'>";
			}else{
				$gambar = "<a href=".base_url('assets/admin/img/no-image.jpg')." class='fancy-view'>
						  <img src=".base_url('assets/admin/img/no-image.jpg')." class='img-responsive' alt='' border='0'>";
			}
			$output['data'][]=
					array(
						$tema['id'],
						$tema['tema'],
						$tema['status']=='0'?'<span class="label label-danger">Tidak Aktif</span>':'<span class="label label-success">Aktif</span>',
						$gambar,
						"<a class='btn btn-primary btn-sm' type='button' data-toggle='tooltip'  title='Edit Tema'  href=".site_url('appweb/themes/edit/'.$tema['id'])."><i class='fa fa-pencil'></i></a>
						 <a href='javascript:void(0);' onclick='hapusid($tema[id])' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> </a>",
					);
		$no++;
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
						<a href='javascript:void(0);' onclick='hapusid($kategori[id])' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> </a>",
					);
		$no++;
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
				    	<a href='javascript:void(0);' onclick='hapusid($down[id])' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> </a>",
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
						<a href='javascript:void(0);' onclick='hapusid($ads[id])' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> </a>",
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
						<a href='javascript:void(0);' onclick='hapusid($pages[id])' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> </a>",
					);
		$no++;
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
				$gambar = "<a href=".base_url('assets/admin/img/no-image.jpg')." class='fancy-view'>
						  <img src=".base_url('assets/admin/img/no-image.jpg')." class='img-responsive' alt='' border='0'>";
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
						<a href='javascript:void(0);' onclick='hapusid($blog[id])' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> </a>",
					);
		$no++;
		}
		
		$output['draw']=$draw;
		$output['recordsTotal']=$total;
		$output['recordsFiltered']=$total;
		
		echo json_encode($output);

	}
	public function get_berita()
	{
		$total=$this->db->count_all_results("news");
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
		$this->db->like("judul_berita",$search);
		}
		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length,$start);

		$this->db->order_by('id','DESC');
		$query=$this->Berita_model->get_all_berita();

		if($search!=""){
		$this->db->like("judul_berita",$search);
		$jum=$this->db->get('news');
		
		$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$no=$start+1;
		foreach ($query as $berita) {
			if(!empty($berita['gambar'])){
				$gambar = "<a href=".base_url('files/media/'.$berita['gambar'].'')." class='fancy-view'>
						   <img src=".base_url('files/thumbnail/'.$berita['gambar'].'')." alt='' border='0' class='img-responsive'>";
			}else{
				$gambar = "<a href=".base_url('assets/admin/img/no-image.jpg')." class='fancy-view'>
						  <img src=".base_url('assets/admin/img/no-image.jpg')." class='img-responsive' alt='' border='0'>";
			}
			if($berita['status']== 1){
				$status = "<span class='label label-primary'>Aktif</span>";
			}else{
				$status = "<span class='label label-warning'>Tidak&nbsp;Aktif</span>";
			}
			date_default_timezone_set('Asia/Jakarta');
			$date=date('d-m-Y',strtotime($berita['tgl_posting']));
			
			$output['data'][]=
					array(
						$no,
						$berita['judul_berita'],
						$berita['kategori'],
						$berita['posting'],
						$status,
						$date,
						$berita['hits'],
						$gambar,
						"<a href=".site_url('appweb/news/edit/'.$berita['id'])." class='btn btn-sm btn-primary'><i class='fa fa-pencil'></i> </a>
						<a href='javascript:void(0);' onclick='hapusid($berita[id])' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> </a>",
					);
		$no++;
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
				        <a href='javascript:void(0);' onclick='hapusid($faqs[id])' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> </a>",
				);
		$no++;
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
				$gambar = "<a href=".base_url('assets/admin/img/no-image.jpg')." class='fancy-view'>
						  <img src=".base_url('assets/admin/img/no-image.jpg')." class='img-responsive' alt='' border='0'>";
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
						  <a href='javascript:void(0);' onclick='hapusid($slide[id])' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> </a>"
					);
			$no++;
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
						 <a href='javascript:void(0);' onclick='hapusid($tag[id])' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> </a>"
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
		$query=$this->Gallery_model->get_all_data();

		if($search!=""){
		$this->db->like("judul",$search);
		$jum=$this->db->get('gallery');
		
		$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$no=$start+1;
		foreach ($query as $gal) {
			if($gal['code']==0){
				if(!empty($gal['gambar'])){
					$input = "<a href=".base_url('files/media/'.$gal['gambar'].'')." class='fancy-view'>
							   <img src=".base_url('files/thumbnail/'.$gal['gambar'].'')." alt='' border='0' class='img-responsive' >";
				}else{
					$input = "<a href=".base_url('assets/admin/img/no-image.jpg')." class='fancy-view'>
							  <img src=".base_url('assets/admin/img/no-image.jpg')." class='img-responsive' alt='' border='0' >";
				}
			}
			else{
				$input = "<iframe style='width:150px;height:150px;' src='' frameborder='0' allowfullscreen></iframe>";
			}
			if($gal['code']== 0){
				$tipe = "<span class='label label-primary'>Foto</span>";
			}else{
				$tipe = "<span class='label label-info'>Video</span>";
			}
			$output['data'][]=
					array(
						$no,
						$gal['judul'],
						$tipe,
						$input,
						"<a href=".site_url('appweb/gallery/edit/'.$gal['id'])." class='btn btn-sm btn-primary'><i class='fa fa-pencil'></i> </a>
					    <a href='javascript:void(0);' onclick='hapusid($gal[id])' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> </a>",
					);
		$no++;
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
		$query=$this->Site_model->get_all_testimoni();

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
				$gambar = "<a href=".base_url('assets/admin/img/no-image.jpg')." class='fancy-view'>
						  <img src=".base_url('assets/admin/img/no-image.jpg')." class='img-responsive' alt='' border='0' style='width:150px;height:150px;'>";
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
					    <a href='javascript:void(0);' onclick='hapusid($test[id])' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> </a>",
					);
		$no++;
		}
		
		$output['draw']=$draw;
		$output['recordsTotal']=$total;
		$output['recordsFiltered']=$total;
		
		echo json_encode($output);

	}
	public function get_modul()
	{
		$total=$this->db->count_all_results("modul");
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
		$query=$this->Modul_model->get_all_modul();

		if($search!=""){
		$this->db->like("nama",$search);
		$jum=$this->db->get('modul');
		
		$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$no=$start+1;
		foreach ($query as $mod) {
			$output['data'][]=
					array(
						$no,
						$mod['nama'],
						$mod['url_modul'],
						 "<a class='btn btn-warning btn-sm' type='button' data-toggle='tooltip'  title='Edit'  href=".site_url('appweb/modul/edit/'.$mod['id'])."><i class='fa fa-pencil'></i></a>
						  <a href='javascript:void(0);' onclick='hapusid($mod[id])' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> </a>"
					);
		$no++;
		}
		
		$output['draw']=$draw;
		$output['recordsTotal']=$total;
		$output['recordsFiltered']=$total;
		
		echo json_encode($output);

	}

	
}