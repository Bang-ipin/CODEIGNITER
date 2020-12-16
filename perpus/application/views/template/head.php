<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php echo $title;?></title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<meta name="theme-color" content="#cd34f5">
		<meta name="msapplication-navbutton-color" content="#cd34f5">
		<meta name="apple-mobile-web-app-status-bar-style" content="#cd34f5">
		<link href="<?=config_item('asset');?>/image/favicon.png" size="120x120" rel="shortcut icon"   >
		<link href="<?=config_item('asset');?>/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" >
		<link href="<?=config_item('asset');?>/plugins/bootstrap/css/bootstrap.min.css"  rel="stylesheet" >
		<link href="<?=config_item('asset');?>/plugins/chat.css" rel="stylesheet"  >
		<link href="<?=config_item('asset');?>/plugins/adminLTE/css/AdminLTE.css" rel="stylesheet" >
		<link href="<?=config_item('asset');?>/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
		<link href="<?=config_item('asset');?>/plugins/datetimepicker/jquery.datetimepicker.css" rel="stylesheet">
		<link href="<?=config_item('asset');?>/plugins/select2/select2.css" rel="stylesheet" >
		<link href="<?=config_item('asset');?>/plugins/easyui/themes/material/easyui.css" rel="stylesheet"  >
		<link href="<?=config_item('asset');?>/plugins/easyui/themes/icon.css" rel="stylesheet"  >
		<link href="<?=config_item('asset');?>/plugins/adminLTE/css/mytable.css" rel="stylesheet"  >
		<link href="<?=config_item('asset');?>/plugins/adminLTE/css/skins/_all-skins.min.css" rel="stylesheet" >
			<!-- Javascript-->
		<script src="<?=config_item('asset');?>/plugins/jQuery/jquery.min.js" ></script>
		<script src="<?=config_item('asset');?>/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?=config_item('asset');?>/plugins/jQuery/jquery.validate.min.js"></script>
		<script src="<?=config_item('asset');?>/plugins/datatables/jquery.dataTables.js"></script>
		<script src="<?=config_item('asset');?>/plugins/datatables/dataTables.bootstrap.js"></script>
		<script src="<?=config_item('asset');?>/plugins/datetimepicker/jquery.datetimepicker.js"></script>
		<script src="<?=config_item('asset');?>/plugins/select2/select2.min.js"></script>
		<script src="<?=config_item('asset');?>/plugins/echo.min.js"></script>
		<script src="<?=config_item('asset');?>/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		<script src="<?=config_item('asset');?>/plugins/easyui/jquery.easyui.min.js"></script>
		<script src="<?=config_item('asset');?>/plugins/adminLTE/js/app.js"></script>
		<script>            
            $(document).ready(function() {
				$("#table").DataTable({
				    "sPaginationType":"full_numbers",
					"sort": false
				});
			});
                     
            $(document).ready(function() {
				$(".select2").select2();
			});								
		</script>
		<style>.modal-backdrop {position: fixed;top: 0;right: 0;bottom: 0;left: 0;z-index: 1040;background-color: #afacac21;} .modal-dialog{margin: 100px auto;} 
		#fixed-form-container{
			position: fixed;
			bottom: 0px;
			right: 3%;
			width: 94%;
			text-align: center;
			margin: 0;
			z-index: 99;
		}

		#fixed-form-container .button:before {
		   content: "+ ";
		}

		#fixed-form-container .expanded:before {
			content: "- ";
		}

		#fixed-form-container .button {
			font-size:1.1em;
			cursor: pointer;
			margin-left: auto;
			margin-right: auto;
			border: 2px solid #28a745;
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;
			border-radius: 5px 5px 0px 0px;
			padding: 5px 20px 5px 20px;
			background-color: #28a745;
			color: #fff;
			display: inline-block;
			text-align: center;
			text-decoration: none;
			-webkit-box-shadow: 4px 0px 5px 0px rgba(0,0,0,0.3);
			-moz-box-shadow: 4px 0px 5px 0px rgba(0,0,0,0.3);
			box-shadow: 4px 0px 5px 0px rgba(0,0,0,0.3);
		}

		#fixed-form-container .body{
			background-color: #fff;
			border-radius: 5px;
			border: 2px solid #e25454;
			padding: 10px;
			-webkit-box-shadow: 4px 4px 5px 0px rgba(0,0,0,0.3);
			-moz-box-shadow: 4px 4px 5px 0px rgba(0,0,0,0.3);
			box-shadow: 4px 4px 5px 0px rgba(0,0,0,0.3);
		}

		@media only screen and (min-width:768px){
			#fixed-form-container .button{
			   margin: 0;

			}
			#fixed-form-container {
				right: 20px;
				width: 390px;
				text-align: right;
			}

			#fixed-form-container .body{
				border-radius: 0px 5px 5px 5px;
			}
		}
		</style>
		
</head>