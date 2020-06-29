<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php echo $title;?></title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="shortcut icon"  href="<?=config_item('asset')?>/image/favicon.png" size="120x120" >
		<link rel="stylesheet" href="<?=config_item('asset')?>/fancyBox/jquery.fancybox.css">
		<link rel="stylesheet" href="<?=config_item('asset')?>/plugins/font-awesome/css/font-awesome.css">
		<link rel="stylesheet" href="<?=config_item('asset')?>/plugins/datetimepicker/jquery.datetimepicker.css"  type="text/css">
		<link rel="stylesheet" href="<?=config_item('asset')?>/plugins/select2/select2.css">
		<link rel="stylesheet" href="<?=config_item('asset')?>/easyui/themes/default/easyui.css"  type="text/css">
		<link rel="stylesheet" href="<?=config_item('asset')?>/easyui/themes/icon.css"  type="text/css">
		<link rel="stylesheet" href="<?=config_item('asset')?>/bootstrap/css/bootstrap.css" type="text/css" rel="stylesheet" >
		<link rel="stylesheet" href="<?=config_item('asset')?>/dist/css/AdminLTE.css" type="text/css">
		<link rel="stylesheet" href="<?=config_item('asset')?>/dist/css/mytable.css" type="text/css">
		<link rel="stylesheet" href="<?=config_item('asset')?>/plugins/datatables/dataTables.bootstrap.css"  type="text/css">
		<link rel="stylesheet" href="<?=config_item('asset')?>/dist/css/skins/_all-skins.css">
		<!-- Javascript-->
		<script type="text/javascript" src="<?=config_item('asset');?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="<?=config_item('asset');?>/plugins/jquery/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?=config_item('asset')?>/plugins/datatables/jquery.dataTables.js"></script>
		<script type="text/javascript" src="<?=config_item('asset');?>/plugins/datetimepicker/jquery.datetimepicker.js"></script>
		<script type="text/javascript" src="<?=config_item('asset')?>/plugins/datatables/dataTables.bootstrap.js"></script>
		<script type="text/javascript" src="<?=config_item('asset');?>/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?=config_item('asset');?>/easyui/jquery.easyui.min.js"></script>
		<script type="text/javascript" src="<?=config_item('asset');?>/plugins/select2/select2.full.js"></script>
		<script type="text/javascript" src="<?=config_item('asset');?>/fancyBox/jquery.fancybox.js"></script>
		<script type="text/javascript" src="<?=config_item('asset');?>/dist/js/app.min.js"></script>
		<script type="text/javascript" language="javascript">            
            $(document).ready(function() {
				$("#table").DataTable({
				    "sPaginationType":"full_numbers",
				});
			});
                        
            $(document).ready(function() {
				$(".select2").select2();
			});			
					
			
			$(document).ready(function(){ 
				$(".fancy").fancybox({
				    'autoScale'	:false,
                     
				});
			});
					
		function cekEmail() {
		   var cek = document.forms['cekForm']['Email'].value;
		   var atpos = cek.indexOf("@");
		   var dotpos = cek.lastIndexOf(".");
			   if(atpos<1 || dotpos<atpos+2 || dotpos+2>=cek.length)
			   {
				  alert("Alamat Email tidak lengkap !!!");
				  cekForm.Email.focus();
				  return false;
			   }
			}
	
	</script>
	</head>