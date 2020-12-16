<!-- BEGIN FOOTER -->
		<div class="page-footer">
			<div class="page-footer-inner">
				<?php date_default_timezone_set('Asia/Jakarta');
				 echo date('Y');?> &copy; by Zaf Media .
			</div>
			<div class="scroll-to-top">
				<i class="fa fa-arrow-up"></i>
			</div>
		</div>
		<script src="<?=base_url('assets/global/plugins/jquery.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/global/plugins/bootstrap/js/bootstrap.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/global/plugins/jquery-ui/jquery-ui.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/global/plugins/jquery.blockui.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/global/plugins/uniform/jquery.uniform.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/global/plugins/fancybox/jquery.fancybox.pack.js');?>" type="text/javascript" ></script>
		<?php 
			if(isset($js)){
				echo $js;
			}
		?>
		<script src="<?=base_url('assets/global/scripts/metronic.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/admin/layout/scripts/layout.js');?>" type="text/javascript"></script>
		<?php 
			if(isset($script)){
				echo $script;
			}
		?>
	</body>
</html>