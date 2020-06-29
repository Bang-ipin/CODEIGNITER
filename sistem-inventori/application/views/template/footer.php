			<div id="dlg" class="easyui-dialog" title="Daftar Transaksi" style="width:900px;height:400px; padding:5px;" data-options="closed:true">
				<div class="box-body">
					<div class="col-xs-1" style="font-size:14pt;"></div>
						<div class="col-xs-6">
							<input type="hidden" name="text_cari" class="form-control" id="text_cari" />
						</div>
					</br>
					<div>&nbsp;</div>
					<div id="daftar_transaksi"></div>
				</div>
			</div>
			<div class="modal" id="ModalGue" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa fa-times-circle'></i></button>
							<h4 class="modal-title" id="ModalHeader"></h4>
						</div>
						<div class="modal-body" id="ModalContent"></div>
						<div class="modal-footer">
							<input type="submit" id="simpan" name="submit" value="Simpan Perubahan"/>
							<input id="batal" type="reset" value="Batal"/>
						</div>
					</div>
				</div>
			</div>
			<script>
			$('#ModalGue').on('hide.bs.modal', function () {
			   setTimeout(function(){ 
					$('#ModalHeader, #ModalContent, #ModalFooter').html('');
			   }, 500);
			});
			</script>
			<footer class="main-footer">
				<strong>Copyright &copy; <?=date('Y')?>	<a href="https://www.go-freshener.com"> Go-freshener</a>.</strong> All rights
				reserved.
			</footer>
		</div>
	</body>